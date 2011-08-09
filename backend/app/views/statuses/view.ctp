<div class="statuses view">
<h2><?php  __('Status');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $status['Status']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $status['Status']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Status', true), array('action' => 'edit', $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Status', true), array('action' => 'delete', $status['Status']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Archive Feeds', true), array('controller' => 'archive_feeds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Feed', true), array('controller' => 'archive_feeds', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Livestream Feeds', true), array('controller' => 'livestream_feeds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Livestream Feed', true), array('controller' => 'livestream_feeds', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Popover Ads', true), array('controller' => 'popover_ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Popover Ad', true), array('controller' => 'popover_ads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Preroll Ads', true), array('controller' => 'preroll_ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Preroll Ad', true), array('controller' => 'preroll_ads', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Archive Feeds');?></h3>
	<?php if (!empty($status['ArchiveFeed'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Status Id'); ?></th>
		<th><?php __('Low Res Url'); ?></th>
		<th><?php __('High Res Url'); ?></th>
		<th><?php __('Thumbnail Url'); ?></th>
		<th><?php __('Left Icon Id'); ?></th>
		<th><?php __('Right Icon Id'); ?></th>
		<th><?php __('Background'); ?></th>
		<th><?php __('Category Id'); ?></th>
		<th><?php __('Created Date'); ?></th>
		<th><?php __('Updated Date'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($status['ArchiveFeed'] as $archiveFeed):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $archiveFeed['id'];?></td>
			<td><?php echo $archiveFeed['name'];?></td>
			<td><?php echo $archiveFeed['description'];?></td>
			<td><?php echo $archiveFeed['status_id'];?></td>
			<td><?php echo $archiveFeed['low_res_url'];?></td>
			<td><?php echo $archiveFeed['high_res_url'];?></td>
			<td><?php echo $archiveFeed['thumbnail_url'];?></td>
			<td><?php echo $archiveFeed['left_icon_id'];?></td>
			<td><?php echo $archiveFeed['right_icon_id'];?></td>
			<td><?php echo $archiveFeed['background'];?></td>
			<td><?php echo $archiveFeed['category_id'];?></td>
			<td><?php echo $archiveFeed['created'];?></td>
			<td><?php echo $archiveFeed['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'archive_feeds', 'action' => 'view', $archiveFeed['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'archive_feeds', 'action' => 'edit', $archiveFeed['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'archive_feeds', 'action' => 'delete', $archiveFeed['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $archiveFeed['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Archive Feed', true), array('controller' => 'archive_feeds', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Livestream Feeds');?></h3>
	<?php if (!empty($status['LivestreamFeed'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Status Id'); ?></th>
		<th><?php __('Url'); ?></th>
		<th><?php __('Start Time'); ?></th>
		<th><?php __('End Time'); ?></th>
		<th><?php __('Left Icon Id'); ?></th>
		<th><?php __('Right Icon Id'); ?></th>
		<th><?php __('Background'); ?></th>
		<th><?php __('Category Id'); ?></th>
		<th><?php __('Created Date'); ?></th>
		<th><?php __('Updated Date'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($status['LivestreamFeed'] as $livestreamFeed):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $livestreamFeed['id'];?></td>
			<td><?php echo $livestreamFeed['name'];?></td>
			<td><?php echo $livestreamFeed['description'];?></td>
			<td><?php echo $livestreamFeed['status_id'];?></td>
			<td><?php echo $livestreamFeed['url'];?></td>
			<td><?php echo $livestreamFeed['start_time'];?></td>
			<td><?php echo $livestreamFeed['end_time'];?></td>
			<td><?php echo $livestreamFeed['left_icon_id'];?></td>
			<td><?php echo $livestreamFeed['right_icon_id'];?></td>
			<td><?php echo $livestreamFeed['background'];?></td>
			<td><?php echo $livestreamFeed['category_id'];?></td>
			<td><?php echo $livestreamFeed['created'];?></td>
			<td><?php echo $livestreamFeed['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'livestream_feeds', 'action' => 'view', $livestreamFeed['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'livestream_feeds', 'action' => 'edit', $livestreamFeed['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'livestream_feeds', 'action' => 'delete', $livestreamFeed['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $livestreamFeed['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Livestream Feed', true), array('controller' => 'livestream_feeds', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Popover Ads');?></h3>
	<?php if (!empty($status['PopoverAd'])):?>
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
		foreach ($status['PopoverAd'] as $popoverAd):
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
<div class="related">
	<h3><?php __('Related Preroll Ads');?></h3>
	<?php if (!empty($status['PrerollAd'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Status Id'); ?></th>
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
		foreach ($status['PrerollAd'] as $prerollAd):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $prerollAd['id'];?></td>
			<td><?php echo $prerollAd['name'];?></td>
			<td><?php echo $prerollAd['description'];?></td>
			<td><?php echo $prerollAd['status_id'];?></td>
			<td><?php echo $prerollAd['image_url'];?></td>
			<td><?php echo $prerollAd['link_url'];?></td>
			<td><?php echo $prerollAd['start_time'];?></td>
			<td><?php echo $prerollAd['end_time'];?></td>
			<td><?php echo $prerollAd['created'];?></td>
			<td><?php echo $prerollAd['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'preroll_ads', 'action' => 'view', $prerollAd['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'preroll_ads', 'action' => 'edit', $prerollAd['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'preroll_ads', 'action' => 'delete', $prerollAd['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $prerollAd['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Preroll Ad', true), array('controller' => 'preroll_ads', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
