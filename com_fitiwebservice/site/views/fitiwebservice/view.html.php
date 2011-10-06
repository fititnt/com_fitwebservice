<?php
/**
 * @package     FitiWebservice Component
 * @author      Emerson Rocha Luiz - emerson@webdesign.eng.br - @fititnt
 * @copyright   Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.. All rights reserved.
 * @license     GNU General Public License version 3. See license.txt
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class FitiWebserviceViewFitiWebservice extends JView
{
    function display($tpl = null) 
    {
        $this->item = $this->get('item');

        $this->params = JFactory::getApplication()->getParams('com_fitiwebservice');        
        $this->pageclass_sfx    = htmlspecialchars($this->params->get('pageclass_sfx'));
        $this->page_title       =  $this->escape($this->params->get('page_title'));

        // Display the view
         // Assign data to the view
        $this->item = $this->get('item');

        // Display the view
        parent::display($tpl);
    }
}
