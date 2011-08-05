<div class="prerollAnalytics view">
<h2><?php  __('Preroll Analytic');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prerollAnalytic['PrerollAnalytic']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Preroll Ad Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prerollAnalytic['PrerollAnalytic']['preroll_ad_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Event Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prerollAnalytic['PrerollAnalytic']['event_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Contact Type Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prerollAnalytic['PrerollAnalytic']['contact_type_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Preroll Analytic', true), array('action' => 'edit', $prerollAnalytic['PrerollAnalytic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Preroll Analytic', true), array('action' => 'delete', $prerollAnalytic['PrerollAnalytic']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $prerollAnalytic['PrerollAnalytic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Preroll Analytics', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Preroll Analytic', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
