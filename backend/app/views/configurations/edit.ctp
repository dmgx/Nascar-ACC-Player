<div class="configurations form">
<?php echo $form->create('Configuration', array('type' => 'file')); ?>
<?php echo $this->Form->create('Configuration');?>
	<fieldset>
		<legend><?php __('Edit Configuration'); ?></legend>
	<?php
		echo $this->Form->input('popover_frequency', array('label' => 'Popover Frequency (In Seconds)'));
		echo $this->Form->input('twitter', array('label' => 'Twitter URL'));
		echo $this->Form->input('facebook', array('label' => 'Facebook URL'));
		echo $this->Form->input('placeholder', array('label' => 'Placeholder Server Path'));
		echo $this->Form->input('placeholder_file', array('label' => 'Placholder File','type' => 'file','name'=>'placeholder_file_file', 'onchange'=>'placeholder_file_text.value=placeholder_file_file.value;'));
    ?>
    <input type="text" class="input buttontext" name="placeholder_file_text" value="
        <?php echo $this->data['Configuration']['placeholder_file']; ?>
    ">
    <input type="button" class="input textbutton"
        onClick="placeholder_file_file.click();"
        value="Upload File..."> 
    <?php
		echo $this->Form->input('image_url_path', array('label' => 'Default Image URL Path'));
		echo $this->Form->input('swf_url_path', array('label' => 'Default SWF URL Path'));
		echo $this->Form->input('livefeed_url_path', array('label' => 'Default Livestream URL Path'));
		echo $this->Form->input('archive_hr_url_path', array('label' => 'Default Archive High-Res URL Path'));
		echo $this->Form->input('archive_lr_url_path', array('label' => 'Default Archive Low-Res URL Path'));
		echo $this->Form->input('thumbnail_url_path', array('label' => 'Thumbnail Server Path'));
		echo $this->Form->input('background_url_path', array('label' => 'Background Server Path'));
        echo $this->Form->input('sender_email_address');
        echo $this->Form->input('live_stream_test');
	?>
	</fieldset>
    <?php
        echo $this->Form->submit('Submit', array('onclick' => 'placeholder_file_file.name ="data[Configuration][placeholder_file]";'));
        echo $this->Form->end();
    ?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('View Configuration', true), array('action' => 'index'));?></li>
	</ul>
</div>