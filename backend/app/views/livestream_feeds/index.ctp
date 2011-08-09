<div class="livestreamFeeds index">
	<h2><?php __('Livestream Feeds');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('Satus','status_id',array('type' => 'text','label' => 'Satus'));?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('start_time');?></th>
			<th><?php echo $this->Paginator->sort('end_time');?></th>
			<th><?php echo $this->Paginator->sort('Left Icon','left_icon_id',array('type' => 'text','label' => 'Left Icon'));?></th>
			<th><?php echo $this->Paginator->sort('Right Icon','right_icon_id',array('type' => 'text','label' => 'Right Icon'));?></th>
			<th><?php echo $this->Paginator->sort('background');?></th>
			<th><?php echo $this->Paginator->sort('Category','category_id',array('type' => 'text','label' => 'Category'));?></th>
			<th><?php echo $this->Paginator->sort('Created','created',array('label' => 'Created'));?></th>
			<th><?php echo $this->Paginator->sort('Updated','modified',array('label' => 'Updated'));?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($livestreamFeeds as $livestreamFeed):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $livestreamFeed['LivestreamFeed']['id']; ?>&nbsp;</td>
		<td><?php echo $livestreamFeed['LivestreamFeed']['name']; ?>&nbsp;</td>
		<td><?php echo $livestreamFeed['LivestreamFeed']['description']; ?>&nbsp;</td>
		<td><?php echo $livestreamFeed['Status']['name']; ?>&nbsp;</td>
		<td><?php echo $livestreamFeed['LivestreamFeed']['url']; ?>&nbsp;</td>
		<td><?php echo $livestreamFeed['LivestreamFeed']['start_time']; ?>&nbsp;</td>
		<td><?php echo $livestreamFeed['LivestreamFeed']['end_time']; ?>&nbsp;</td>
		<td><?php echo $livestreamFeed['LeftIcon']['name']; ?>&nbsp;</td>
		<td><?php echo $livestreamFeed['RightIcon']['name']; ?>&nbsp;</td>
		<td><?php echo $livestreamFeed['LivestreamFeed']['background']; ?>&nbsp;</td>
		<td><?php echo $livestreamFeed['Category']['name']; ?>&nbsp;</td>
		<td><?php echo $livestreamFeed['LivestreamFeed']['created']; ?>&nbsp;</td>
		<td><?php echo $livestreamFeed['LivestreamFeed']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $livestreamFeed['LivestreamFeed']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $livestreamFeed['LivestreamFeed']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $livestreamFeed['LivestreamFeed']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $livestreamFeed['LivestreamFeed']['id'])); ?>
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
		<li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('New Livestream Feed', true), array('action' => 'add')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('View Livestream Analytics', true), array('controller' => 'livestream_analytics', 'action' => 'index')); ?> </li>
	</ul>
</div>