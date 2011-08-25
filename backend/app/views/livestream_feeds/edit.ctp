<div class="livestreamFeeds form">
<?php echo $form->create('LivestreamFeed', array('type' => 'file')); ?>
<?php echo $this->Form->create('LivestreamFeed');?>
	<fieldset>
		<legend><?php __('Edit Livestream Feed'); ?></legend>
	<?php
		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('status_id');
		echo $this->Form->input('url');
        echo $this->Form->input('thumbnail_url',array('label' => 'Thumbnail','type' => 'file','name'=>'thumbnail_url_file', 'style'=>'display: none;', 'onchange'=>'thumbnail_url_text.value=thumbnail_url_file.value;'));
    ?>
    <input type="text" class="input buttontext" name="thumbnail_url_text" value="
        <?php echo $this->data['LivestreamFeed']['thumbnail_url']; ?>
    ">
    <input type="button" class="input textbutton"
        onClick="thumbnail_url_file.click();"
        value="Pick File..."> 
    <?php
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
		echo $this->Form->input('left_icon_id',array('options' => $left_icons));
		echo $this->Form->input('right_icon_id',array('options' => $right_icons));
		echo $this->Form->input('background',array('type' => 'file','name'=>'background_file', 'style'=>'display: none;', 'onchange'=>'background_text.value=background_file.value;'));
    ?>
    <input type="text" class="input buttontext" name="background_text" value="
        <?php echo $this->data['LivestreamFeed']['background']; ?>
    ">
    <input type="button" class="input textbutton"
        onClick="background_file.click();"
        value="Pick File..."> 
    <?php
		echo $this->Form->input('category_id');
	?>
	</fieldset>
    <?php
        echo $this->Form->submit('Submit', array('url'=> array('controller'=>'livestream_feeds', 'action'=>'edit'), 'onclick' => 'thumbnail_url_file.name ="data[LivestreamFeed][thumbnail_url]";background_file.name ="data[LivestreamFeed][background]";'));
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
		<li><?php echo $this->Html->link(__('List Livestream Feeds', true), array('action' => 'index'));?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('LivestreamFeed.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('LivestreamFeed.id'))); ?></li>
	</ul>
</div>