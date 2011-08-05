<div class="archiveAnalytics view">
<h2><?php  __('Archive Analytic');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archiveAnalytic['ArchiveAnalytic']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Archive Feed Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archiveAnalytic['ArchiveAnalytic']['archive_feed_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('View Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archiveAnalytic['ArchiveAnalytic']['view_time']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Archive Analytic', true), array('action' => 'edit', $archiveAnalytic['ArchiveAnalytic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Archive Analytic', true), array('action' => 'delete', $archiveAnalytic['ArchiveAnalytic']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $archiveAnalytic['ArchiveAnalytic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Archive Analytics', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Analytic', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Archive Feeds', true), array('controller' => 'archive_feeds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Feed', true), array('controller' => 'archive_feeds', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php __('Related Archive Feeds');?></h3>
	<?php if (!empty($archiveAnalytic['ArchiveFeed'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $archiveAnalytic['ArchiveFeed']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $archiveAnalytic['ArchiveFeed']['name'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $archiveAnalytic['ArchiveFeed']['description'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $archiveAnalytic['ArchiveFeed']['status_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Low Res Url');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $archiveAnalytic['ArchiveFeed']['low_res_url'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('High Res Url');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $archiveAnalytic['ArchiveFeed']['high_res_url'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Thumbnail Url');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $archiveAnalytic['ArchiveFeed']['thumbnail_url'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Left Icon Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $archiveAnalytic['ArchiveFeed']['left_icon_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Right Icon Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $archiveAnalytic['ArchiveFeed']['right_icon_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Background');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $archiveAnalytic['ArchiveFeed']['background'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $archiveAnalytic['ArchiveFeed']['category_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created Date');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $archiveAnalytic['ArchiveFeed']['created_date'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated Date');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $archiveAnalytic['ArchiveFeed']['updated_date'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Archive Feed', true), array('controller' => 'archive_feeds', 'action' => 'edit', $archiveAnalytic['ArchiveFeed']['id'])); ?></li>
			</ul>
		</div>
	</div>
	