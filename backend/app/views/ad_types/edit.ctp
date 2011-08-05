<div class="adTypes form">
<?php echo $this->Form->create('AdType');?>
	<fieldset>
		<legend><?php __('Edit Ad Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('AdType.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('AdType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ad Types', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Popover Ads', true), array('controller' => 'popover_ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Popover Ad', true), array('controller' => 'popover_ads', 'action' => 'add')); ?> </li>
	</ul>
</div>