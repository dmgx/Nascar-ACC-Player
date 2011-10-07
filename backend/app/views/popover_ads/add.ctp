<!-- document javascripts -->
<script type="text/javascript">
function modify_pick(index_value,startup){
    var url_elem = document.getElementById('PopoverAdImageUrl');
    var url_label = url_elem.parentNode.children[0];
    var link_elem = document.getElementById('PopoverAdLinkUrl');
    var link_parent = link_elem.parentNode;
    switch(index_value){
        case "1":
            url_label.innerHTML = "SWF Location"
            if(!startup) url_elem.innerHTML ="<?php echo $configuration['Configuration']['swf_url_path']?>";
            link_parent.style.display = "none";
            break;
        case "2":
            url_label.innerHTML = "Image Location"
            if(!startup) url_elem.innerHTML ="<?php echo $configuration['Configuration']['image_url_path']?>";
            link_parent.style.display = "";
            break;
        case "3":
            url_label.innerHTML = "Ad Text"
            if(!startup) url_elem.innerHTML = "";
            link_parent.style.display = "";
            break;
    }
}
</script>

<!-- document form -->
<div id="contentsub">
    <div class="actions">
        <h3><?php __('Actions'); ?></h3>
        <ul>
            <li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
            <li><?php echo $this->Html->link(__('List Popover Ads', true), array('action' => 'index'));?></li>
        </ul>
    </div>
</div>
<div class="popoverAds form">
<?php echo $this->Form->create('PopoverAd');?>
	<fieldset>
		<legend><?php __('Add Popover Ad'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('status_id');
		echo $this->Form->input('ad_type_id',array('onchange'=>'modify_pick(this.value,false);'));       
		echo $this->Form->input('image_url');
		echo $this->Form->input('link_url');
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<script type="text/javascript">
window.onload = modify_pick("1",false);
</script>