<div class="adTypes index">
	<h2><?php __('Ad Types');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($adTypes as $adType):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $adType['AdType']['id']; ?>&nbsp;</td>
		<td><?php echo $adType['AdType']['name']; ?>&nbsp;</td>
		<td><?php echo $adType['AdType']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $adType['AdType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $adType['AdType']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $adType['AdType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $adType['AdType']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ad Type', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Popover Ads', true), array('controller' => 'popover_ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Popover Ad', true), array('controller' => 'popover_ads', 'action' => 'add')); ?> </li>
	</ul>
</div>