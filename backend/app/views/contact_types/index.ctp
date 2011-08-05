<div class="contactTypes index">
	<h2><?php __('Contact Types');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($contactTypes as $contactType):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $contactType['ContactType']['id']; ?>&nbsp;</td>
		<td><?php echo $contactType['ContactType']['name']; ?>&nbsp;</td>
		<td><?php echo $contactType['ContactType']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $contactType['ContactType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $contactType['ContactType']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $contactType['ContactType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contactType['ContactType']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Contact Type', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Popover Analytics', true), array('controller' => 'popover_analytics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Popover Analytic', true), array('controller' => 'popover_analytics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Preroll Analytics', true), array('controller' => 'preroll_analytics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Preroll Analytic', true), array('controller' => 'preroll_analytics', 'action' => 'add')); ?> </li>
	</ul>
</div>