<div class="weeklyEmailLists form">
<?php echo $this->Form->create('WeeklyEmailList');?>
	<fieldset>
		<legend><?php __('Add Weekly Email List'); ?></legend>
	<?php
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('View Configuration', true), array('controller' => 'Configurations', 'action' => 'index'));?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('List Weekly Emails', true), array('action' => 'index'));?></li>
	</ul>
</div>