<div class="archiveFeeds form">
<?php echo $this->Form->create('ArchiveFeed');?>
	<fieldset>
		<legend><?php __('Edit Archive Feed'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('status_id');
		echo $this->Form->input('low_res_url');
		echo $this->Form->input('high_res_url');
		echo $this->Form->input('thumbnail_url');
		echo $this->Form->input('left_icon_id');
		echo $this->Form->input('right_icon_id');
		echo $this->Form->input('background');
		echo $this->Form->input('category_id');
		echo $this->Form->input('created_date');
		echo $this->Form->input('updated_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ArchiveFeed.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ArchiveFeed.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Archive Feeds', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Statuses', true), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status', true), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Left Icons', true), array('controller' => 'left_icons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Left Icon', true), array('controller' => 'left_icons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Right Icons', true), array('controller' => 'right_icons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Right Icon', true), array('controller' => 'right_icons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Archive Analytics', true), array('controller' => 'archive_analytics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Analytic', true), array('controller' => 'archive_analytics', 'action' => 'add')); ?> </li>
	</ul>
</div>