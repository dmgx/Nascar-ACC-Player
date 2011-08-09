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
		echo $this->Form->input('created');
		echo $this->Form->input('modified');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('List Popover Ads', true), array('action' => 'index'));?></li>
	</ul>
</div>