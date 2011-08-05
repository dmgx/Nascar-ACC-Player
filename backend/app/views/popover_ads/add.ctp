<div class="popoverAds form">
<?php echo $this->Form->create('PopoverAd');?>
	<fieldset>
		<legend><?php __('Add Popover Ad'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('status_id');
		echo $this->Form->input('ad_type_id');
		echo $this->Form->input('image_url');
		echo $this->Form->input('link_url');
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
		echo $this->Form->input('created_date');
		echo $this->Form->input('updated_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Popover Ads', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Statuses', true), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status', true), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ad Types', true), array('controller' => 'ad_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad Type', true), array('controller' => 'ad_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Popover Analytics', true), array('controller' => 'popover_analytics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Popover Analytic', true), array('controller' => 'popover_analytics', 'action' => 'add')); ?> </li>
	</ul>
</div>