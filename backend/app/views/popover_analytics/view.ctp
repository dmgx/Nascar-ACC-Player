<div class="popoverAnalytics view">
<h2><?php  __('Popover Analytic');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $popoverAnalytic['PopoverAnalytic']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Popover Ad Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $popoverAnalytic['PopoverAnalytic']['popover_ad_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Event Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $popoverAnalytic['PopoverAnalytic']['event_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Contact Type Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $popoverAnalytic['PopoverAnalytic']['contact_type_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Popover Analytic', true), array('action' => 'edit', $popoverAnalytic['PopoverAnalytic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Popover Analytic', true), array('action' => 'delete', $popoverAnalytic['PopoverAnalytic']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $popoverAnalytic['PopoverAnalytic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Popover Analytics', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Popover Analytic', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Popover Ads', true), array('controller' => 'popover_ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Popover Ad', true), array('controller' => 'popover_ads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contact Types', true), array('controller' => 'contact_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact Type', true), array('controller' => 'contact_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php __('Related Popover Ads');?></h3>
	<?php if (!empty($popoverAnalytic['PopoverAd'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $popoverAnalytic['PopoverAd']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $popoverAnalytic['PopoverAd']['name'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $popoverAnalytic['PopoverAd']['description'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $popoverAnalytic['PopoverAd']['status_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ad Type Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $popoverAnalytic['PopoverAd']['ad_type_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image Url');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $popoverAnalytic['PopoverAd']['image_url'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Link Url');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $popoverAnalytic['PopoverAd']['link_url'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Start Time');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $popoverAnalytic['PopoverAd']['start_time'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('End Time');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $popoverAnalytic['PopoverAd']['end_time'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created Date');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $popoverAnalytic['PopoverAd']['created_date'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated Date');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $popoverAnalytic['PopoverAd']['updated_date'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Popover Ad', true), array('controller' => 'popover_ads', 'action' => 'edit', $popoverAnalytic['PopoverAd']['id'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php __('Related Contact Types');?></h3>
	<?php if (!empty($popoverAnalytic['ContactType'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $popoverAnalytic['ContactType']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $popoverAnalytic['ContactType']['name'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $popoverAnalytic['ContactType']['description'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Contact Type', true), array('controller' => 'contact_types', 'action' => 'edit', $popoverAnalytic['ContactType']['id'])); ?></li>
			</ul>
		</div>
	</div>
	