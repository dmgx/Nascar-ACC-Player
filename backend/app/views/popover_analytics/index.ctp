<?php
    echo $html->css('chart', 'stylesheet', array("media"=>"all" ), false);
?> 
<div class="popoverAnalytics index">
	<h2><?php __('Popover Analytics');?></h2>
    <?php
        echo $this->Form->create('PopoverAnalytics');
        echo $this->Form->input('start',array('type'=>'date','value'=>$this->data['PopoverAnalytics']['start']));
        echo $this->Form->input('end',array('type'=>'date','value'=>$this->data['PopoverAnalytics']['end']));
        echo $this->Form->submit('Submit', array('name'=> 'Submit', 'value'=> 'Submit'));
        echo $this->Form->submit('Create PDF', array('name'=> 'pdf', 'value'=> 'pdf'));
        echo $this->Form->end();
    ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Popover ID');?></th>
			<th><?php echo $this->Paginator->sort('Popover Name');?></th>
			<th><?php echo $this->Paginator->sort('View Count');?></th>
			<th><?php echo $this->Paginator->sort('Click Count');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($popoverAnalytics as $popoverAnalytic):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $popoverAnalytic['PopoverAnalytic']['popover_ad_id']; ?>&nbsp;</td>
		<td><?php echo $popoverAnalytic['PopoverAd']['name']; ?>&nbsp;</td>
		<td><?php echo $popoverAnalytic[0]['Count_Views']; ?>&nbsp;</td>
		<td><?php echo $popoverAnalytic[0]['Count_Clicks']; ?>&nbsp;</td>
	</tr>
    <?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>

    <div class="caption">Traffic Chart</div>
    <div id="result">
        <?php $this->Chart->drawChart2($this->data['PopoverAnalytics']['chartdata'],'Popover Name',array('View Count','Click Count')); ?>
    </div>   
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('List Popover Ads', true), array('controller' => 'popover_ads', 'action' => 'index')); ?> </li>
	</ul>
</div>