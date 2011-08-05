<div class="statuses index">
	<h2><?php __('Statuses');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($statuses as $status):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $status['Status']['id']; ?>&nbsp;</td>
		<td><?php echo $status['Status']['name']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $status['Status']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $status['Status']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $status['Status']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $status['Status']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Status', true), array('action' => 'add')); ?></li>
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