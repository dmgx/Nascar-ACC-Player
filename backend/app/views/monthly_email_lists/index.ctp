<div class="monthlyEmailLists index">
	<h2><?php __('Monthly Email Lists');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($monthlyEmailLists as $monthlyEmailList):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $monthlyEmailList['MonthlyEmailList']['id']; ?>&nbsp;</td>
		<td><?php echo $monthlyEmailList['MonthlyEmailList']['email']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $monthlyEmailList['MonthlyEmailList']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $monthlyEmailList['MonthlyEmailList']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $monthlyEmailList['MonthlyEmailList']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $monthlyEmailList['MonthlyEmailList']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('View Configuration', true), array('controller' => 'Configurations', 'action' => 'index'));?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('New Monthly Email', true), array('action' => 'add')); ?></li>
	</ul>
</div>