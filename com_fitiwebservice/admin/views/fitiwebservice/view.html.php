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
	public function display($tpl = null) 
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');

		// Assign the Data
		$this->form = $form;
		$this->item = $item;

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	protected function addToolBar() 
	{
		JRequest::setVar('hidemainmenu', true);
		$isNew = ($this->item->id == 0);
		$user = JFactory::getUser();
		$userId = $user->id;
		$canDo = FitiWebserviceHelper::getActions($this->item->id);
		JToolBarHelper::title($isNew ? JText::_('COM_FITIWEBSERVICE_MANAGER_HELLOWORLD_NEW') : JText::_('COM_FITIWEBSERVICE_MANAGER_HELLOWORLD_EDIT'), 'fitiwebservice');
		// Built the actions for new and existing records.
		if ($isNew) 
		{
			// For new records, check the create permission.
			if ($canDo->get('core.create')) 
			{
				JToolBarHelper::apply('fitiwebservice.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('fitiwebservice.save', 'JTOOLBAR_SAVE');
				JToolBarHelper::custom('fitiwebservice.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
			}
			JToolBarHelper::cancel('fitiwebservice.cancel', 'JTOOLBAR_CANCEL');
		}
		else
		{
			if ($canDo->get('core.edit'))
			{
				// We can save the new record
				JToolBarHelper::apply('fitiwebservice.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('fitiwebservice.save', 'JTOOLBAR_SAVE');

				// We can save this record, but check the create permission to see if we can return to make a new one.
				if ($canDo->get('core.create')) 
				{
					JToolBarHelper::custom('fitiwebservice.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
				}
			}
			if ($canDo->get('core.create')) 
			{
				JToolBarHelper::custom('fitiwebservice.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
			}
			JToolBarHelper::cancel('fitiwebservice.cancel', 'JTOOLBAR_CLOSE');
		}
	}

	protected function setDocument() 
	{
		$isNew = ($this->item->id < 1);
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('COM_FITIWEBSERVICE_HELLOWORLD_CREATING') : JText::_('COM_FITIWEBSERVICE_HELLOWORLD_EDITING'));
		$document->addScript(JURI::root() . "media/com_fitiwebservice/js/fitiwebservice.js");
	}
}
