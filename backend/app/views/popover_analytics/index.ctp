<div class="popoverAnalytics index">
	<h2><?php __('Popover Analytics');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('popover_ad_id');?></th>
			<th><?php echo $this->Paginator->sort('event_time');?></th>
			<th><?php echo $this->Paginator->sort('contact_type_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($popoverAnalytics as $popoverAnalytic):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $popoverAnalytic['PopoverAnalytic']['id']; ?>&nbsp;</td>
		<td><?php echo $popoverAnalytic['PopoverAnalytic']['popover_ad_id']; ?>&nbsp;</td>
		<td><?php echo $popoverAnalytic['PopoverAnalytic']['event_time']; ?>&nbsp;</td>
		<td><?php echo $popoverAnalytic['PopoverAnalytic']['contact_type_id']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $popoverAnalytic['PopoverAnalytic']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $popoverAnalytic['PopoverAnalytic']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $popoverAnalytic['PopoverAnalytic']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $popoverAnalytic['PopoverAnalytic']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Popover Analytic', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Popover Ads', true), array('controller' => 'popover_ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Popover Ad', true), array('controller' => 'popover_ads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contact Types', true), array('controller' => 'contact_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact Type', true), array('controller' => 'contact_types', 'action' => 'add')); ?> </li>
	</ul>
</div>