<div id="contentsub">
    <div class="actions">
        <h3><?php __('Actions'); ?></h3>
        <ul>
            <li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
            <li><?php echo $this->Html->link(__('View Configuration', true), array('controller' => 'Configurations', 'action' => 'index'));?></li>
            <li><?php echo $this->Html->link(__('List Monthly Emails', true), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Monthly Email', true), array('action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('Edit Monthly Email', true), array('action' => 'edit', $monthlyEmailList['MonthlyEmailList']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('Delete Monthly Email', true), array('action' => 'delete', $monthlyEmailList['MonthlyEmailList']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $monthlyEmailList['MonthlyEmailList']['id'])); ?> </li>
        </ul>
    </div>
</div>
<div class="monthlyEmailLists view">
<h2><?php  __('Monthly Email List');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $monthlyEmailList['MonthlyEmailList']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $monthlyEmailList['MonthlyEmailList']['email']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
