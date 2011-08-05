<div class="livestreamAnalytics form">
<?php echo $this->Form->create('LivestreamAnalytic');?>
	<fieldset>
		<legend><?php __('Add Livestream Analytic'); ?></legend>
	<?php
		echo $this->Form->input('livestream_feed_id');
		echo $this->Form->input('view_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Livestream Analytics', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Livestream Feeds', true), array('controller' => 'livestream_feeds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Livestream Feed', true), array('controller' => 'livestream_feeds', 'action' => 'add')); ?> </li>
	</ul>
</div>