<div class="livestreamFeeds view">
<h2><?php  __('Livestream Feed');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['status_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Start Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['start_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('End Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['end_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Left Icon Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['left_icon_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Right Icon Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['right_icon_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Background'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['background']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['category_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['created_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['updated_date']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Livestream Feed', true), array('action' => 'edit', $livestreamFeed['LivestreamFeed']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Livestream Feed', true), array('action' => 'delete', $livestreamFeed['LivestreamFeed']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $livestreamFeed['LivestreamFeed']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Livestream Feeds', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Livestream Feed', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses', true), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status', true), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Left Icons', true), array('controller' => 'left_icons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Left Icon', true), array('controller' => 'left_icons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Right Icons', true), array('controller' => 'right_icons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Right Icon', true), array('controller' => 'right_icons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Livestream Analytics', true), array('controller' => 'livestream_analytics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Livestream Analytic', true), array('controller' => 'livestream_analytics', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php __('Related Statuses');?></h3>
	<?php if (!empty($livestreamFeed['Status'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamFeed['Status']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamFeed['Status']['name'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Status', true), array('controller' => 'statuses', 'action' => 'edit', $livestreamFeed['Status']['id'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php __('Related Left Icons');?></h3>
	<?php if (!empty($livestreamFeed['LeftIcon'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamFeed['LeftIcon']['id'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Left Icon', true), array('controller' => 'left_icons', 'action' => 'edit', $livestreamFeed['LeftIcon']['id'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php __('Related Right Icons');?></h3>
	<?php if (!empty($livestreamFeed['RightIcon'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamFeed['RightIcon']['id'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Right Icon', true), array('controller' => 'right_icons', 'action' => 'edit', $livestreamFeed['RightIcon']['id'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php __('Related Categories');?></h3>
	<?php if (!empty($livestreamFeed['Category'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamFeed['Category']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamFeed['Category']['name'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamFeed['Category']['description'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created Date');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamFeed['Category']['created_date'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated Date');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $livestreamFeed['Category']['updated_date'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Category', true), array('controller' => 'categories', 'action' => 'edit', $livestreamFeed['Category']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php __('Related Livestream Analytics');?></h3>
	<?php if (!empty($livestreamFeed['LivestreamAnalytic'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Livestream Feed Id'); ?></th>
		<th><?php __('View Time'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($livestreamFeed['LivestreamAnalytic'] as $livestreamAnalytic):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $livestreamAnalytic['id'];?></td>
			<td><?php echo $livestreamAnalytic['livestream_feed_id'];?></td>
			<td><?php echo $livestreamAnalytic['view_time'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'livestream_analytics', 'action' => 'view', $livestreamAnalytic['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'livestream_analytics', 'action' => 'edit', $livestreamAnalytic['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'livestream_analytics', 'action' => 'delete', $livestreamAnalytic['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $livestreamAnalytic['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Livestream Analytic', true), array('controller' => 'livestream_analytics', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
