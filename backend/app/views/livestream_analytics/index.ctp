<div class="livestreamAnalytics index">
	<h2><?php __('Livestream Analytics');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('livestream_feed_id');?></th>
			<th><?php echo $this->Paginator->sort('view_time');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($livestreamAnalytics as $livestreamAnalytic):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $livestreamAnalytic['LivestreamAnalytic']['id']; ?>&nbsp;</td>
		<td><?php echo $livestreamAnalytic['LivestreamAnalytic']['livestream_feed_id']; ?>&nbsp;</td>
		<td><?php echo $livestreamAnalytic['LivestreamAnalytic']['view_time']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $livestreamAnalytic['LivestreamAnalytic']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $livestreamAnalytic['LivestreamAnalytic']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $livestreamAnalytic['LivestreamAnalytic']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $livestreamAnalytic['LivestreamAnalytic']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Livestream Analytic', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Livestream Feeds', true), array('controller' => 'livestream_feeds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Livestream Feed', true), array('controller' => 'livestream_feeds', 'action' => 'add')); ?> </li>
	</ul>
</div>