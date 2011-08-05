<div class="prerollAds form">
<?php echo $this->Form->create('PrerollAd');?>
	<fieldset>
		<legend><?php __('Add Preroll Ad'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('status_id');
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

		<li><?php echo $this->Html->link(__('List Preroll Ads', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Statuses', true), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status', true), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Preroll Analytics', true), array('controller' => 'preroll_analytics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Preroll Analytic', true), array('controller' => 'preroll_analytics', 'action' => 'add')); ?> </li>
	</ul>
</div>