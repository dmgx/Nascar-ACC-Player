<?php
    echo $html->css('chart', 'stylesheet', array("media"=>"all" ), false);
?> 
<div id="contentsub">
    <div class="actions">
        <h3><?php __('Actions'); ?></h3>
        <ul>
            <li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?></li>
            <li><?php echo $this->Html->link(__('List Archive Feeds', true), array('controller' => 'archive_feeds', 'action' => 'index')); ?> </li>
        </ul>
    </div>
</div>
<div class="archiveAnalytics index">
	<h2><?php __('Archive Analytics');?></h2>
    <?php
        echo $this->Form->create('ArchiveAnalytics');
        echo $this->Form->input('start',array('type'=>'date','value'=>$this->data['ArchiveAnalytics']['start']));
        echo $this->Form->input('end',array('type'=>'date','value'=>$this->data['ArchiveAnalytics']['end']));
        echo $this->Form->submit('Submit', array('name'=> 'Submit', 'value'=> 'Submit'));
        echo $this->Form->submit('Create PDF', array('name'=> 'pdf', 'value'=> 'pdf'));
        echo $this->Form->end();
    ?>
    <table cellpadding="0" cellspacing="0">
	<tr>
        <th><?php echo $this->Paginator->sort('Archive ID');?></th>
        <th><?php echo $this->Paginator->sort('Archive Name');?></th>
        <th><?php echo $this->Paginator->sort('View Count');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($archiveAnalytics as $archiveAnalytic):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $archiveAnalytic['ArchiveAnalytic']['archive_feed_id']; ?>&nbsp;</td>
		<td><?php echo $archiveAnalytic['ArchiveFeed']['name']; ?>&nbsp;</td>
		<td><?php echo $archiveAnalytic[0]['Count_Views']; ?>&nbsp;</td>
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
        <?php $this->Chart->drawChart($this->data['ArchiveAnalytics']['chartdata'],'Archive Name','View Count'); ?>
    </div>   
</div>

