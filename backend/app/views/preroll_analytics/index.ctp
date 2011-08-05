<div class="prerollAnalytics index">
	<h2><?php __('Preroll Analytics');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('preroll_ad_id');?></th>
			<th><?php echo $this->Paginator->sort('event_time');?></th>
			<th><?php echo $this->Paginator->sort('contact_type_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($prerollAnalytics as $prerollAnalytic):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $prerollAnalytic['PrerollAnalytic']['id']; ?>&nbsp;</td>
		<td><?php echo $prerollAnalytic['PrerollAnalytic']['preroll_ad_id']; ?>&nbsp;</td>
		<td><?php echo $prerollAnalytic['PrerollAnalytic']['event_time']; ?>&nbsp;</td>
		<td><?php echo $prerollAnalytic['PrerollAnalytic']['contact_type_id']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $prerollAnalytic['PrerollAnalytic']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $prerollAnalytic['PrerollAnalytic']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $prerollAnalytic['PrerollAnalytic']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $prerollAnalytic['PrerollAnalytic']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Preroll Analytic', true), array('action' => 'add')); ?></li>
	</ul>
</div>