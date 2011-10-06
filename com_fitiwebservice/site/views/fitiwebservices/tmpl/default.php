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
?>
<div class="fitiwebservice-main<?php echo $this->pageclass_sfx?>">
<?php if ($this->params->get('show_page_heading')) : ?>
    <h1><?php echo $this->page_title; ?></h1>
<?php endif; ?>
<form action="<?php echo JRoute::_('index.php?option=com_fitiwebservice'); ?>" method="post" name="adminForm">
	<table class="adminlist">
		<thead><?php echo $this->loadTemplate('head');?></thead>
		<tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
		<tbody><?php echo $this->loadTemplate('body');?></tbody>
	</table>
	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
</div>