<div class="archiveAnalytics form">
<?php echo $this->Form->create('ArchiveAnalytic');?>
	<fieldset>
		<legend><?php __('Add Archive Analytic'); ?></legend>
	<?php
		echo $this->Form->input('archive_feed_id');
		echo $this->Form->input('view_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Archive Analytics', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Archive Feeds', true), array('controller' => 'archive_feeds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Feed', true), array('controller' => 'archive_feeds', 'action' => 'add')); ?> </li>
	</ul>
</div>