<div class="weeklyEmailLists view">
<h2><?php  __('Weekly Email List');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $weeklyEmailList['WeeklyEmailList']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $weeklyEmailList['WeeklyEmailList']['email']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('View Configuration', true), array('controller' => 'Configurations', 'action' => 'index'));?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('List Weekly Emails', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Weekly Email', true), array('action' => 'add')); ?> </li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('Edit Weekly Email', true), array('action' => 'edit', $weeklyEmailList['WeeklyEmailList']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Weekly Email', true), array('action' => 'delete', $weeklyEmailList['WeeklyEmailList']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $weeklyEmailList['WeeklyEmailList']['id'])); ?> </li>
	</ul>
</div>
