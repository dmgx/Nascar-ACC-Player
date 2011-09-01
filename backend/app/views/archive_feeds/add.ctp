<div class="archiveFeeds form">
<?php echo $form->create('ArchiveFeed', array('type' => 'file')); ?>
<?php echo $this->Form->create('ArchiveFeed');?>
    <fieldset>
		<legend><?php __('Add Archive Feed'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('status_id');
		echo $this->Form->input('low_res_url',array('value'=>$configuration['Configuration']['archive_lr_url_path']));
		echo $this->Form->input('high_res_url',array('value'=>$configuration['Configuration']['archive_hr_url_path']));
		echo $this->Form->input('thumbnail_url',array('label' => 'Thumbnail','type' => 'file','name'=>'thumbnail_url_file', 'style'=>'display: none;', 'onchange'=>'thumbnail_url_text.value=thumbnail_url_file.value;'));
    ?>
    <input type="text" class="input buttontext" name="thumbnail_url_text">
    <input type="button" class="input textbutton"
        onClick="thumbnail_url_file.click();"
        value="Pick File..."> 
    <?php
		echo $this->Form->input('left_icon_id',array('options' => $left_icons));
		echo $this->Form->input('right_icon_id',array('options' => $right_icons));
		echo $this->Form->input('background',array('type' => 'file','name'=>'background_file', 'style'=>'display: none;', 'onchange'=>'background_text.value=background_file.value;'));
    ?>
    <input type="text" class="input buttontext" name="background_text">
    <input type="button" class="input textbutton"
        onClick="background_file.click();"
        value="Pick File..."> 
    <?php
		echo $this->Form->input('category_id');
		echo $this->Form->input('display_rank');
	?>
	</fieldset>
<?php
    echo $this->Form->submit('Submit', array('url'=> array('controller'=>'archive_feeds', 'action'=>'add'), 'onclick' => 'thumbnail_url_file.name ="data[ArchiveFeed][thumbnail_url]";background_file.name ="data[ArchiveFeed][background]";'));
    echo $this->Form->end();
    ?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('List Archive Feeds', true), array('action' => 'index'));?></li>
	</ul>
</div>