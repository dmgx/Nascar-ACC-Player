<div id="contentsub">
    <div class="actions">
        <h3><?php __('Actions'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('Edit Configuration', true), array('action' => 'edit', $configuration['Configuration']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('Monthly Email List', true), array('controller' => 'MonthlyEmailLists','action' => 'index'));?></li>
            <li><?php echo $this->Html->link(__('Weekly Email List', true), array('controller' => 'WeeklyEmailLists','action' => 'index'));?></li>
            <li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        </ul>
    </div>
</div>
<div class="configurations index">
<h2><?php  __('Configuration');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Popover Frequency (In Seconds)'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['popover_frequency']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Twitter URL'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['twitter']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Facebook URL'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['facebook']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Placeholder Server Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['placeholder']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Placeholder File'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['placeholder_file']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Default Image URL Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['image_url_path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Default SWF URL Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['swf_url_path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Default Livefeed URL Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['livefeed_url_path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Default Archive High-Res URL Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['archive_hr_url_path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Default Archive Low-Res URL Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['archive_lr_url_path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Thumbnail Server Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['thumbnail_url_path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Background Server Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['background_url_path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sending Email Address'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['sender_email_address']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Live Test Stream'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['live_stream_test']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
