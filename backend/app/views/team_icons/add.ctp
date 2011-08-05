<div class="teamIcons form">
<?php echo $this->Form->create('TeamIcon');?>
	<fieldset>
		<legend><?php __('Add Team Icon'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('icon');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Team Icons', true), array('action' => 'index'));?></li>
	</ul>
</div>