<div class="archiveFeeds index">
	<h2><?php __('Archive Feeds');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('status_id');?></th>
			<th><?php echo $this->Paginator->sort('low_res_url');?></th>
			<th><?php echo $this->Paginator->sort('high_res_url');?></th>
			<th><?php echo $this->Paginator->sort('thumbnail_url');?></th>
			<th><?php echo $this->Paginator->sort('left_icon_id');?></th>
			<th><?php echo $this->Paginator->sort('right_icon_id');?></th>
			<th><?php echo $this->Paginator->sort('background');?></th>
			<th><?php echo $this->Paginator->sort('category_id');?></th>
			<th><?php echo $this->Paginator->sort('created_date');?></th>
			<th><?php echo $this->Paginator->sort('updated_date');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($archiveFeeds as $archiveFeed):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $archiveFeed['ArchiveFeed']['id']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['name']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['description']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['status_id']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['low_res_url']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['high_res_url']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['thumbnail_url']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['left_icon_id']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['right_icon_id']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['background']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['category_id']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['created_date']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['updated_date']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $archiveFeed['ArchiveFeed']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $archiveFeed['ArchiveFeed']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $archiveFeed['ArchiveFeed']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $archiveFeed['ArchiveFeed']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Archive Feed', true), array('action' => 'add')); ?></li>
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