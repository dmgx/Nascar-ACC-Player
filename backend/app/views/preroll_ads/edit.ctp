<div class="prerollAds form">
<?php echo $this->Form->create('PrerollAd');?>
	<fieldset>
		<legend><?php __('Edit Preroll Ad'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('status_id');
		echo $this->Form->input('image_url');
		echo $this->Form->input('link_url');
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('List Preroll Ads', true), array('action' => 'index'));?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PrerollAd.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PrerollAd.id'))); ?></li>
	</ul>
</div>