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

// Set some global property
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-48-fitiwebservice {background-image: url(../media/com_fitiwebservice/images/tux-48x48.png);}');

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_fitiwebservice')) 
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Require helper file
JLoader::register('FitiWebserviceHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'fitiwebservice.php');

// Get an instance of the controller prefixed by FitiWebservice
$controller = JController::getInstance('FitiWebservice');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
