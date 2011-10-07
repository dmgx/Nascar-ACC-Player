<div id="contentsub">
    <div class="actions">
        <h3><?php __('Actions'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('Delete Weekly Email', true), array('action' => 'delete', $this->Form->value('WeeklyEmailList.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('WeeklyEmailList.id'))); ?></li>
            <li><?php echo $this->Html->link(__('List Weekly Emails', true), array('action' => 'index'));?></li>
            <li><?php echo $this->Html->link(__('View Configuration', true), array('controller' => 'Configurations', 'action' => 'index'));?></li>
            <li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        </ul>
    </div>
</div>
<div class="weeklyEmailLists form">
<?php echo $this->Form->create('WeeklyEmailList');?>
	<fieldset>
		<legend><?php __('Edit Weekly Email List'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
