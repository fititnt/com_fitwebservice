<?php
/**
 * @package     FitiWebservice Component
 * @author      Emerson Rocha Luiz - emerson@webdesign.eng.br - @fititnt
 * @copyright   Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.. All rights reserved.
 * @license     GNU General Public License version 3. See license.txt
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

class FitiWebserviceHelper
{
	public static function addSubmenu($submenu) 
	{
		JSubMenuHelper::addEntry(JText::_('COM_FITIWEBSERVICE_SUBMENU_MESSAGES'), 
			'index.php?option=com_fitiwebservice', $submenu == 'messages');
		JSubMenuHelper::addEntry(JText::_('COM_FITIWEBSERVICE_SUBMENU_CATEGORIES'), 
			'index.php?option=com_categories&view=categories&extension=com_fitiwebservice', $submenu == 'categories');
		$document = JFactory::getDocument();
		if ($submenu == 'categories'){ 
			$document->setTitle(JText::_('COM_FITIWEBSERVICE_ADMINISTRATION_CATEGORIES'));
		}
	}

	public static function getActions($messageId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($messageId)) {
			$assetName = 'com_fitiwebservice';
		}
		else {
			$assetName = 'com_fitiwebservice.message.'.(int) $messageId;
		}

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}
}
