<div class="teamIcons view">
<h2><?php  __('Team Icon');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $teamIcon['TeamIcon']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $teamIcon['TeamIcon']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Icon'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $teamIcon['TeamIcon']['icon']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Team Icon', true), array('action' => 'edit', $teamIcon['TeamIcon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Team Icon', true), array('action' => 'delete', $teamIcon['TeamIcon']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $teamIcon['TeamIcon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Team Icons', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team Icon', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
