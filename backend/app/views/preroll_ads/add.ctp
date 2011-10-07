<div id="contentsub">
    <div class="actions">
        <h3><?php __('Actions'); ?></h3>
        <ul>
            <li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
            <li><?php echo $this->Html->link(__('List Preroll Ads', true), array('action' => 'index'));?></li>
        </ul>
    </div>
</div>
<div class="prerollAds form">
<?php echo $this->Form->create('PrerollAd');?>
	<fieldset>
		<legend><?php __('Add Preroll Ad'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('status_id');
		echo $this->Form->input('image_url',array('label'=>'Ad URL'));
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
