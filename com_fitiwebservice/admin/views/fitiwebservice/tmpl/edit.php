<?php
/**
 * @package     FitiWebservice Component
 * @author      Emerson Rocha Luiz - emerson@webdesign.eng.br - @fititnt
 * @copyright   Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.. All rights reserved.
 * @license     GNU General Public License version 3. See license.txt
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
$params = $this->form->getFieldsets('params');
?>
<form action="<?php echo JRoute::_('index.php?option=com_fitiwebservice&layout=edit&id='.(int) $this->item->id); ?>" 
	method="post" name="adminForm" id="fitiwebservice-form" class="form-validate">
 	<div class="width-60 fltlft">
		<fieldset class="adminform">
		<legend><?php echo JText::_( 'COM_FITIWEBSERVICE_HELLOWORLD_DETAILS' ); ?></legend>
		<ul class="adminformlist">
			<?php foreach($this->form->getFieldset('details') as $field): ?>
				<li><?php echo $field->label;echo $field->input;?></li>
			<?php endforeach; ?>
		</ul>
		</fieldset>
	</div>
	<div class="width-40 fltrt">
		<?php echo JHtml::_('sliders.start', 'fitiwebservice-slider'); ?>
		<?php foreach ($params as $name => $fieldset): ?>
			<?php echo JHtml::_('sliders.panel', JText::_($fieldset->label), $name.'-params');?>
			<?php if (isset($fieldset->description) && trim($fieldset->description)): ?>
				<p class="tip"><?php echo $this->escape(JText::_($fieldset->description));?></p>
			<?php endif;?>
			<fieldset class="panelform" >
				<ul class="adminformlist">
					<?php foreach ($this->form->getFieldset($name) as $field) : ?>
						<li><?php echo $field->label; ?><?php echo $field->input; ?></li>
					<?php endforeach; ?>
				</ul>
			</fieldset>
		<?php endforeach; ?>
		<?php echo JHtml::_('sliders.end'); ?>
	</div>

	<div>
		<input type="hidden" name="task" value="fitiwebservice.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
