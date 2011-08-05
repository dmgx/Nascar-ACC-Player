<div class="contactTypes form">
<?php echo $this->Form->create('ContactType');?>
	<fieldset>
		<legend><?php __('Add Contact Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contact Types', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Popover Analytics', true), array('controller' => 'popover_analytics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Popover Analytic', true), array('controller' => 'popover_analytics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Preroll Analytics', true), array('controller' => 'preroll_analytics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Preroll Analytic', true), array('controller' => 'preroll_analytics', 'action' => 'add')); ?> </li>
	</ul>
</div>