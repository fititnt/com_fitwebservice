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

class fitiwebserviceViewFitiwebservices extends JView
{
    function display($tpl = null) 
    {
        // Get data from the model
        $items = $this->get('Items');
        $pagination = $this->get('Pagination');

        // Assign data to the view
        $this->items = $items;
        $this->pagination = $pagination;
        
        $this->params = JFactory::getApplication()->getParams('com_fitiwebservice');        
        $this->pageclass_sfx    = htmlspecialchars($this->params->get('pageclass_sfx'));
        $this->page_title       =  $this->escape($this->params->get('page_title'));


        // Set the toolbar
        $this->addToolBar();

        // Display the template
        parent::display($tpl);

        // Set the document
        $this->setDocument();
    }

    protected function addToolBar() 
    {
        /*
        $canDo = FitiWebserviceHelper::getActions();
        JToolBarHelper::title(JText::_('COM_FITIWEBSERVICE_MANAGER_HELLOWORLDS'), 'fitiwebservice');
        if ($canDo->get('core.create')) 
        {
            JToolBarHelper::addNew('fitiwebservice.add', 'JTOOLBAR_NEW');
        }
        if ($canDo->get('core.edit')) 
        {
            JToolBarHelper::editList('fitiwebservice.edit', 'JTOOLBAR_EDIT');
        }
        if ($canDo->get('core.delete')) 
        {
            JToolBarHelper::deleteList('', 'fitiwebservices.delete', 'JTOOLBAR_DELETE');
        }
        if ($canDo->get('core.admin')) 
        {
            JToolBarHelper::divider();
            JToolBarHelper::preferences('com_fitiwebservice');
        }
        */
    }

    protected function setDocument() 
    {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_FITIWEBSERVICE_ADMINISTRATION'));
    }
}
