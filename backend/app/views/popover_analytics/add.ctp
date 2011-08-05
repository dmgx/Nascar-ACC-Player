<div class="popoverAnalytics form">
<?php echo $this->Form->create('PopoverAnalytic');?>
	<fieldset>
		<legend><?php __('Add Popover Analytic'); ?></legend>
	<?php
		echo $this->Form->input('popover_ad_id');
		echo $this->Form->input('event_time');
		echo $this->Form->input('contact_type_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Popover Analytics', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Popover Ads', true), array('controller' => 'popover_ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Popover Ad', true), array('controller' => 'popover_ads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contact Types', true), array('controller' => 'contact_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact Type', true), array('controller' => 'contact_types', 'action' => 'add')); ?> </li>
	</ul>
</div>