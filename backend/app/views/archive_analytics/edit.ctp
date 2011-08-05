<div class="archiveAnalytics form">
<?php echo $this->Form->create('ArchiveAnalytic');?>
	<fieldset>
		<legend><?php __('Edit Archive Analytic'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('archive_feed_id');
		echo $this->Form->input('view_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ArchiveAnalytic.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ArchiveAnalytic.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Archive Analytics', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Archive Feeds', true), array('controller' => 'archive_feeds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Feed', true), array('controller' => 'archive_feeds', 'action' => 'add')); ?> </li>
	</ul>
</div>