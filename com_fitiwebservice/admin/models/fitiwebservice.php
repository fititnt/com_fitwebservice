<?php
/**
 * @package     FitiWebservice Component
 * @author      Emerson Rocha Luiz - emerson@webdesign.eng.br - @fititnt
 * @copyright   Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.. All rights reserved.
 * @license     GNU General Public License version 3. See license.txt
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modeladmin');

class FitiWebserviceModelFitiWebservice extends JModelAdmin
{
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_fitiwebservice.fitiwebservice', 'fitiwebservice', array('control' => 'jform', 'load_data' => $loadData));
		return $form;
	}

	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_fitiwebservice.edit.fitiwebservice.data', array());
		if(empty($data)){
			$data = $this->getItem();
		}
		return $data;
	}
    
	public function getTable($name = '', $prefix = 'FitiWebserviceTable', $options = array())
	{
		return parent::getTable($name, $prefix, $options);
	}

	protected function allowEdit($data = array(), $key = 'id')
	{
		// Check specific edit permission then general edit permission.
		return JFactory::getUser()->authorise('core.edit', 'com_fitiwebservice.message.'.((int) isset($data[$key]) ? $data[$key] : 0)) or parent::allowEdit($data, $key);
	}
}
