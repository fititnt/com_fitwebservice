<?php
/**
 * @package     FitiWebservice Component
 * @author      Emerson Rocha Luiz - emerson@webdesign.eng.br - @fititnt
 * @copyright   Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.. All rights reserved.
 * @license     GNU General Public License version 3. See license.txt
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.helper');

JFormHelper::loadFieldClass('list');

class JFormFieldFitiWebservice extends JFormFieldList
{
	protected $type = 'FitiWebservice';

	protected function getOptions() 
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('a.id as id, a.greeting as greeting, b.title as category, b.id as catid');
		$query->from('#__fitiwebservice a');
		$query->leftJoin('#__categories b on a.catid=b.id');
		$db->setQuery((string)$query);
		$messages = $db->loadObjectList();
		$options = array();
		if($messages){
			foreach($messages as $message){
				$options[] = JHtml::_('select.option', $message->id, 
					$message->greeting . ($message->catid ? ' (' . $message->category . ')' : ''));
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}
