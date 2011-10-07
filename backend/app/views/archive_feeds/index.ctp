<div id="contentsub">
    <div class="actions">
        <h3><?php __('Actions'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('Archive Analytics', true), array('controller' => 'archive_analytics', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Archive Feed', true), array('action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
            <li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        </ul>
    </div>
</div>
<div class="archiveFeeds index">
	<h2><?php __('Archive Feeds');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('status_id');?></th>
			<th><?php echo $this->Paginator->sort('category_id');?></th>
			<th><?php echo $this->Paginator->sort('display_rank');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
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
		<td><?php echo $archiveFeed['ArchiveFeed']['name']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['Status']['name']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['Category']['name']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['display_rank']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['created']; ?>&nbsp;</td>
		<td><?php echo $archiveFeed['ArchiveFeed']['modified']; ?>&nbsp;</td>
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
