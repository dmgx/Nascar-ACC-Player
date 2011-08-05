<div class="archiveAnalytics index">
	<h2><?php __('Archive Analytics');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('archive_feed_id');?></th>
			<th><?php echo $this->Paginator->sort('view_time');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($archiveAnalytics as $archiveAnalytic):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $archiveAnalytic['ArchiveAnalytic']['id']; ?>&nbsp;</td>
		<td><?php echo $archiveAnalytic['ArchiveAnalytic']['archive_feed_id']; ?>&nbsp;</td>
		<td><?php echo $archiveAnalytic['ArchiveAnalytic']['view_time']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $archiveAnalytic['ArchiveAnalytic']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $archiveAnalytic['ArchiveAnalytic']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $archiveAnalytic['ArchiveAnalytic']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $archiveAnalytic['ArchiveAnalytic']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Archive Analytic', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Archive Feeds', true), array('controller' => 'archive_feeds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Feed', true), array('controller' => 'archive_feeds', 'action' => 'add')); ?> </li>
	</ul>
</div>