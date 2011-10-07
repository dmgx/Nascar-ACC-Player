<div id="contentsub">
    <div class="actions">
        <h3><?php __('Actions'); ?></h3>
        <ul>
            <li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
            <li><?php echo $this->Html->link(__('New Preroll Ad', true), array('action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('Preroll Analytics', true), array('controller' => 'preroll_analytics', 'action' => 'index')); ?> </li>
        </ul>
    </div>
</div>
<div class="prerollAds index">
	<h2><?php __('Preroll Ads');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('status_id');?></th>
			<th><?php echo $this->Paginator->sort('start_time');?></th>
			<th><?php echo $this->Paginator->sort('end_time');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($prerollAds as $prerollAd):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $prerollAd['PrerollAd']['name']; ?>&nbsp;</td>
		<td><?php echo $prerollAd['Status']['name']; ?>&nbsp;</td>
		<td><?php echo $prerollAd['PrerollAd']['start_time']; ?>&nbsp;</td>
		<td><?php echo $prerollAd['PrerollAd']['end_time']; ?>&nbsp;</td>
		<td><?php echo $prerollAd['PrerollAd']['created']; ?>&nbsp;</td>
		<td><?php echo $prerollAd['PrerollAd']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $prerollAd['PrerollAd']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $prerollAd['PrerollAd']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $prerollAd['PrerollAd']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $prerollAd['PrerollAd']['id'])); ?>
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
