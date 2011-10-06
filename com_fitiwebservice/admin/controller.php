<?php
/**
 * @package     FitiWebservice Component
 * @author      Emerson Rocha Luiz - emerson@webdesign.eng.br - @fititnt
 * @copyright   Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.. All rights reserved.
 * @license     GNU General Public License version 3. See license.txt
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

class FitiWebserviceController extends JController
{
	function display($cachable = false) 
	{
		// Set default view if not set
		JRequest::setVar('view', JRequest::getCmd('view', 'FitiWebservices'));
		
		parent::display($cachable);
		
		// Add submenu
		FitiWebserviceHelper::addSubmenu('messages');
	}
}
