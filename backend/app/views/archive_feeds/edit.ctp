<div class="archiveFeeds form">
<?php echo $this->Form->create('ArchiveFeed');?>
	<fieldset>
		<legend><?php __('Edit Archive Feed'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('status_id');
		echo $this->Form->input('low_res_url');
		echo $this->Form->input('high_res_url');
		echo $this->Form->input('thumbnail_url');
		echo $this->Form->input('left_icon_id',array('options' => $left_icons));
		echo $this->Form->input('right_icon_id',array('options' => $right_icons));
		echo $this->Form->input('background');
		echo $this->Form->input('category_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('List Archive Feeds', true), array('action' => 'index'));?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ArchiveFeed.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ArchiveFeed.id'))); ?></li>
	</ul>
</div>