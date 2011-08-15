<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username',array('label'=>'User Name'));
		echo $this->Form->input('firstname',array('label'=>'First Name'));
		echo $this->Form->input('lastname',array('label'=>'Last Name'));
		echo $this->Form->input('password',array('label'=>'Password'));
		echo $this->Form->input('useremail',array('label'=>'Email Address'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
	</ul>
</div>