<?php
    echo $html->css('chart', 'stylesheet', array("media"=>"all" ), false);
?> 
<div class="livestreamAnalytics index">
	<h2><?php __('Livestream Analytics');?></h2>
    <?php
        echo $this->Form->create('LivestreamAnalytics');
        echo $this->Form->input('start',array('type'=>'date','value'=>$this->data['LivestreamAnalytics']['start']));
        echo $this->Form->input('end',array('type'=>'date','value'=>$this->data['LivestreamAnalytics']['end']));
        echo $this->Form->submit('Submit', array('url'=> array('controller'=>'livestream_analytics', 'action'=>'index')));
        echo $this->Form->end();
    ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
        <th><?php echo $this->Paginator->sort('Livestream ID');?></th>
        <th><?php echo $this->Paginator->sort('Livestream Name');?></th>
        <th><?php echo $this->Paginator->sort('View Count');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($livestreamAnalytics as $livestreamAnalytic):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $livestreamAnalytic['LivestreamAnalytic']['livestream_feed_id']; ?>&nbsp;</td>
		<td><?php echo $livestreamAnalytic['LivestreamFeed']['name']; ?>&nbsp;</td>
		<td><?php echo $livestreamAnalytic[0]['Count_Views']; ?>&nbsp;</td>
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
        <?php $this->Chart->drawChart($this->data['LivestreamAnalytics']['chartdata'],'Livestream Name','View Count'); ?>
    </div>   
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
        <p>&nbsp</p>
		<li><?php echo $this->Html->link(__('List Livestream Feeds', true), array('controller' => 'livestream_feeds', 'action' => 'index')); ?> </li>
	</ul>
</div>