<div class="prerollAds view">
<h2><?php  __('Preroll Ad');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prerollAd['PrerollAd']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prerollAd['PrerollAd']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prerollAd['PrerollAd']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prerollAd['PrerollAd']['status_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prerollAd['PrerollAd']['image_url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Link Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prerollAd['PrerollAd']['link_url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Start Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prerollAd['PrerollAd']['start_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('End Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prerollAd['PrerollAd']['end_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prerollAd['PrerollAd']['created_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prerollAd['PrerollAd']['updated_date']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Preroll Ad', true), array('action' => 'edit', $prerollAd['PrerollAd']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Preroll Ad', true), array('action' => 'delete', $prerollAd['PrerollAd']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $prerollAd['PrerollAd']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Preroll Ads', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Preroll Ad', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses', true), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status', true), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Preroll Analytics', true), array('controller' => 'preroll_analytics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Preroll Analytic', true), array('controller' => 'preroll_analytics', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php __('Related Statuses');?></h3>
	<?php if (!empty($prerollAd['Status'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $prerollAd['Status']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $prerollAd['Status']['name'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Status', true), array('controller' => 'statuses', 'action' => 'edit', $prerollAd['Status']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php __('Related Preroll Analytics');?></h3>
	<?php if (!empty($prerollAd['PrerollAnalytic'])):?>
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
		foreach ($prerollAd['PrerollAnalytic'] as $prerollAnalytic):
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
