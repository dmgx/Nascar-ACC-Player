<div class="adTypes view">
<h2><?php  __('Ad Type');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adType['AdType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adType['AdType']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adType['AdType']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ad Type', true), array('action' => 'edit', $adType['AdType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ad Type', true), array('action' => 'delete', $adType['AdType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $adType['AdType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ad Types', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad Type', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Popover Ads', true), array('controller' => 'popover_ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Popover Ad', true), array('controller' => 'popover_ads', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Popover Ads');?></h3>
	<?php if (!empty($adType['PopoverAd'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Status Id'); ?></th>
		<th><?php __('Ad Type Id'); ?></th>
		<th><?php __('Image Url'); ?></th>
		<th><?php __('Link Url'); ?></th>
		<th><?php __('Start Time'); ?></th>
		<th><?php __('End Time'); ?></th>
		<th><?php __('Created Date'); ?></th>
		<th><?php __('Updated Date'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($adType['PopoverAd'] as $popoverAd):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $popoverAd['id'];?></td>
			<td><?php echo $popoverAd['name'];?></td>
			<td><?php echo $popoverAd['description'];?></td>
			<td><?php echo $popoverAd['status_id'];?></td>
			<td><?php echo $popoverAd['ad_type_id'];?></td>
			<td><?php echo $popoverAd['image_url'];?></td>
			<td><?php echo $popoverAd['link_url'];?></td>
			<td><?php echo $popoverAd['start_time'];?></td>
			<td><?php echo $popoverAd['end_time'];?></td>
			<td><?php echo $popoverAd['created'];?></td>
			<td><?php echo $popoverAd['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'popover_ads', 'action' => 'view', $popoverAd['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'popover_ads', 'action' => 'edit', $popoverAd['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'popover_ads', 'action' => 'delete', $popoverAd['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $popoverAd['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Popover Ad', true), array('controller' => 'popover_ads', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
