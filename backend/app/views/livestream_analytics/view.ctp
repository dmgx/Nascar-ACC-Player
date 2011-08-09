<div class="livestreamAnalytics view">
<h2><?php  __('Livestream Analytic');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamAnalytic['LivestreamAnalytic']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Livestream Feed Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamAnalytic['LivestreamAnalytic']['livestream_feed_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('View Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamAnalytic['LivestreamAnalytic']['view_time']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Livestream Analytic', true), array('action' => 'edit', $livestreamAnalytic['LivestreamAnalytic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Livestream Analytic', true), array('action' => 'delete', $livestreamAnalytic['LivestreamAnalytic']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $livestreamAnalytic['LivestreamAnalytic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Livestream Analytics', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Livestream Analytic', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Livestream Feeds', true), array('controller' => 'livestream_feeds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Livestream Feed', true), array('controller' => 'livestream_feeds', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php __('Related Livestream Feeds');?></h3>
	<?php if (!empty($livestreamAnalytic['LivestreamFeed'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamAnalytic['LivestreamFeed']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamAnalytic['LivestreamFeed']['name'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamAnalytic['LivestreamFeed']['description'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamAnalytic['LivestreamFeed']['status_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamAnalytic['LivestreamFeed']['url'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Start Time');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamAnalytic['LivestreamFeed']['start_time'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('End Time');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamAnalytic['LivestreamFeed']['end_time'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Left Icon Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamAnalytic['LivestreamFeed']['left_icon_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Right Icon Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamAnalytic['LivestreamFeed']['right_icon_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Background');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamAnalytic['LivestreamFeed']['background'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamAnalytic['LivestreamFeed']['category_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created Date');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamAnalytic['LivestreamFeed']['created'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated Date');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamAnalytic['LivestreamFeed']['modified'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Livestream Feed', true), array('controller' => 'livestream_feeds', 'action' => 'edit', $livestreamAnalytic['LivestreamFeed']['id'])); ?></li>
			</ul>
		</div>
	</div>
	