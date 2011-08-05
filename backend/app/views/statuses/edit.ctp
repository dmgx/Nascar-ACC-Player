<div class="statuses form">
<?php echo $this->Form->create('Status');?>
	<fieldset>
		<legend><?php __('Edit Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Status.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Status.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Statuses', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Archive Feeds', true), array('controller' => 'archive_feeds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Feed', true), array('controller' => 'archive_feeds', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Livestream Feeds', true), array('controller' => 'livestream_feeds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Livestream Feed', true), array('controller' => 'livestream_feeds', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Popover Ads', true), array('controller' => 'popover_ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Popover Ad', true), array('controller' => 'popover_ads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Preroll Ads', true), array('controller' => 'preroll_ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Preroll Ad', true), array('controller' => 'preroll_ads', 'action' => 'add')); ?> </li>
	</ul>
</div>