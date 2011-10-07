<div id="contentsub">
    <div class="actions">
        <h3><?php __('Actions'); ?></h3>
        <ul>
            <li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
            <li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
            <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('User.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('User.id'))); ?></li>
        </ul>
    </div>
</div>
<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('password_temp',array('label' => 'Password'));
		echo $this->Form->input('useremail');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
