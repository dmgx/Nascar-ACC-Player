<?php
    echo $html->css('chart', 'stylesheet', array("media"=>"all" ), false);
    echo $html->css('pdf', 'stylesheet', array("media"=>"all" ), false);
?> 
<div class="livestreamAnalytics index">
	<h2><?php __('Livestream Stream Analytics Weekly Report');?></h2>
    
    <p>
        <div class="dates">
            Start Date: <?php echo $this->data['LivestreamAnalytics']['start']; ?>
            &nbsp;  &nbsp;
            End Date: <?php echo $this->data['LivestreamAnalytics']['end']; ?>
            &nbsp;  &nbsp;
            Number of viewed livestream streams: <?php echo $this->data['LivestreamAnalytics']['count']; ?>
        </div>
    </p>

    <table cellpadding="0" class='maintable'>
	<tr class='tophead'>
        <th class='topid'>ID</th>
        <th class='topname'>Livestream Name</th>
        <th class='topcount'>Total View Count</th>
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
		<td class='rowid'><?php echo $livestreamAnalytic['LivestreamAnalytic']['livestream_feed_id']; ?></td>
		<td class='rowname'><?php echo $livestreamAnalytic['LivestreamFeed']['display_name']; ?></td>
		<td class='rowcount'><?php echo $livestreamAnalytic[0]['Count_Views']; ?></td>
	</tr>
<?php endforeach; ?>
	</table>
    <p> &nbsp; </p>
    <div class="caption">Traffic Chart</div>
    <div>
        <?php $this->Chart->drawChart($this->data['LivestreamAnalytics']['chartdata'],'Livestream Name','Total View Count'); ?>
    </div>   
</div>
