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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Display Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['display_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['Status']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Thumbnail Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['thumbnail_url']; ?>
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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Left Icon'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LeftIcon']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Right Icon'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['RightIcon']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Background'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['background']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['Category']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $livestreamFeed['LivestreamFeed']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('List Livestream Feed', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Livestream Feed', true), array('action' => 'add')); ?> </li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('Edit Livestream Feed', true), array('action' => 'edit', $livestreamFeed['LivestreamFeed']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Livestream Feed', true), array('action' => 'delete', $livestreamFeed['LivestreamFeed']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $livestreamFeed['LivestreamFeed']['id'])); ?> </li>
	</ul>
</div>

