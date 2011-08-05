<div class="livestreamFeeds form">
<?php echo $this->Form->create('LivestreamFeed');?>
	<fieldset>
		<legend><?php __('Add Livestream Feed'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('status_id');
		echo $this->Form->input('url');
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
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

		<li><?php echo $this->Html->link(__('List Livestream Feeds', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Statuses', true), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status', true), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Left Icons', true), array('controller' => 'left_icons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Left Icon', true), array('controller' => 'left_icons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Right Icons', true), array('controller' => 'right_icons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Right Icon', true), array('controller' => 'right_icons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Livestream Analytics', true), array('controller' => 'livestream_analytics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Livestream Analytic', true), array('controller' => 'livestream_analytics', 'action' => 'add')); ?> </li>
	</ul>
</div>