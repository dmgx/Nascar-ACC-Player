<div class="popoverAds index">
	<h2><?php __('Popover Ads');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('status_id');?></th>
			<th><?php echo $this->Paginator->sort('ad_type_id');?></th>
			<th><?php echo $this->Paginator->sort('image_url');?></th>
			<th><?php echo $this->Paginator->sort('link_url');?></th>
			<th><?php echo $this->Paginator->sort('start_time');?></th>
			<th><?php echo $this->Paginator->sort('end_time');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($popoverAds as $popoverAd):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $popoverAd['PopoverAd']['id']; ?>&nbsp;</td>
		<td><?php echo $popoverAd['PopoverAd']['name']; ?>&nbsp;</td>
		<td><?php echo $popoverAd['PopoverAd']['description']; ?>&nbsp;</td>
		<td><?php echo $popoverAd['Status']['name']; ?>&nbsp;</td>
		<td><?php echo $popoverAd['AdType']['name']; ?>&nbsp;</td>
		<td><?php echo $popoverAd['PopoverAd']['image_url']; ?>&nbsp;</td>
		<td><?php echo $popoverAd['PopoverAd']['link_url']; ?>&nbsp;</td>
		<td><?php echo $popoverAd['PopoverAd']['start_time']; ?>&nbsp;</td>
		<td><?php echo $popoverAd['PopoverAd']['end_time']; ?>&nbsp;</td>
		<td><?php echo $popoverAd['PopoverAd']['created']; ?>&nbsp;</td>
		<td><?php echo $popoverAd['PopoverAd']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $popoverAd['PopoverAd']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $popoverAd['PopoverAd']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $popoverAd['PopoverAd']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $popoverAd['PopoverAd']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Popover Ad', true), array('action' => 'add')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('View Popover Analytics', true), array('controller' => 'popover_analytics', 'action' => 'index')); ?> </li>
	</ul>
</div>