<div class="configurations form">
<?php echo $this->Form->create('Configuration');?>
	<fieldset>
		<legend><?php __('Edit Configuration'); ?></legend>
	<?php
		echo $this->Form->input('twitter');
		echo $this->Form->input('facebook');
		echo $this->Form->input('popover_frequency', array('label' => 'Popover Frequency (In Seconds)'));
		echo $this->Form->input('placeholder');
		echo $this->Form->input('image_url_path');
		echo $this->Form->input('swf_url_path');
		echo $this->Form->input('livefeed_url_path');
		echo $this->Form->input('archive_hr_url_path');
		echo $this->Form->input('archive_lr_url_path');
		echo $this->Form->input('thumbnail_url_path');
		echo $this->Form->input('background_url_path');
        echo $this->Form->input('sender_email_address');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('View Configuration', true), array('action' => 'index'));?></li>
	</ul>
</div>