<div class="prerollAnalytics form">
<?php echo $this->Form->create('PrerollAnalytic');?>
	<fieldset>
		<legend><?php __('Add Preroll Analytic'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Preroll Analytics', true), array('action' => 'index'));?></li>
	</ul>
</div>