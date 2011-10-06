<?php
/**
 * @package     FitiWebservice Component
 * @author      Emerson Rocha Luiz - emerson@webdesign.eng.br - @fititnt
 * @copyright   Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.. All rights reserved.
 * @license     GNU General Public License version 3. See license.txt
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modelitem');

class FitiWebserviceModelFitiWebservice extends JModelItem
{
	protected $item;

	protected function populateState() 
	{
		$app = JFactory::getApplication();
		// Get the message id
		$id = JRequest::getInt('id');
		$this->setState('message.id', $id);

		// Load the parameters.
		$params = $app->getParams();
		$this->setState('params', $params);
		parent::populateState();
	}

	/**
	 * Get the message
	 * @return object The message to be displayed to the user
	 */
	public function getItem() 
	{
		if (!isset($this->item)) {
			$id = $this->getState('message.id');
			$this->_db->setQuery($this->_db->getQuery(true)
				->from('#__fitiwebservice as h')
				->leftJoin('#__categories as c ON h.catid = c.id')
				->select('h.greeting, h.params, c.title as category')
				->where('h.id=' . (int)$id));
			if (!$this->item = $this->_db->loadObject()) {
				$this->setError($this->_db->getError());
			} else {
				// Load the JSON string
				$params = new JRegistry;
				$params->loadJSON($this->item->params);
				$this->item->params = $params;

				// Merge global params with item params
				$params = clone $this->getState('params');
				$params->merge($this->item->params);
				$this->item->params = $params;
			}
		}
		return $this->item;
	}
}
