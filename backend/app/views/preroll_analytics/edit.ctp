<div class="prerollAnalytics form">
<?php echo $this->Form->create('PrerollAnalytic');?>
	<fieldset>
		<legend><?php __('Edit Preroll Analytic'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('preroll_ad_id');
		echo $this->Form->input('event_time');
		echo $this->Form->input('contact_type_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PrerollAnalytic.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PrerollAnalytic.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Preroll Analytics', true), array('action' => 'index'));?></li>
	</ul>
</div>