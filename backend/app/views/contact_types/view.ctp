<div class="contactTypes view">
<h2><?php  __('Contact Type');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contactType['ContactType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contactType['ContactType']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contactType['ContactType']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contact Type', true), array('action' => 'edit', $contactType['ContactType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Contact Type', true), array('action' => 'delete', $contactType['ContactType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contactType['ContactType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contact Types', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact Type', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Popover Analytics', true), array('controller' => 'popover_analytics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Popover Analytic', true), array('controller' => 'popover_analytics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Preroll Analytics', true), array('controller' => 'preroll_analytics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Preroll Analytic', true), array('controller' => 'preroll_analytics', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Popover Analytics');?></h3>
	<?php if (!empty($contactType['PopoverAnalytic'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Popover Ad Id'); ?></th>
		<th><?php __('Event Time'); ?></th>
		<th><?php __('Contact Type Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($contactType['PopoverAnalytic'] as $popoverAnalytic):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $popoverAnalytic['id'];?></td>
			<td><?php echo $popoverAnalytic['popover_ad_id'];?></td>
			<td><?php echo $popoverAnalytic['event_time'];?></td>
			<td><?php echo $popoverAnalytic['contact_type_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'popover_analytics', 'action' => 'view', $popoverAnalytic['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'popover_analytics', 'action' => 'edit', $popoverAnalytic['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'popover_analytics', 'action' => 'delete', $popoverAnalytic['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $popoverAnalytic['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Popover Analytic', true), array('controller' => 'popover_analytics', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Preroll Analytics');?></h3>
	<?php if (!empty($contactType['PrerollAnalytic'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Preroll Ad Id'); ?></th>
		<th><?php __('Event Time'); ?></th>
		<th><?php __('Contact Type Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($contactType['PrerollAnalytic'] as $prerollAnalytic):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $prerollAnalytic['id'];?></td>
			<td><?php echo $prerollAnalytic['preroll_ad_id'];?></td>
			<td><?php echo $prerollAnalytic['event_time'];?></td>
			<td><?php echo $prerollAnalytic['contact_type_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'preroll_analytics', 'action' => 'view', $prerollAnalytic['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'preroll_analytics', 'action' => 'edit', $prerollAnalytic['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'preroll_analytics', 'action' => 'delete', $prerollAnalytic['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $prerollAnalytic['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Preroll Analytic', true), array('controller' => 'preroll_analytics', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
