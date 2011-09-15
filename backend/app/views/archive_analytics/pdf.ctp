<?php
    echo $html->css('chart', 'stylesheet', array("media"=>"all" ), false);
    echo $html->css('pdf', 'stylesheet', array("media"=>"all" ), false);
?> 
<div class="archiveAnalytics index">
	<h2><?php __('Archive Stream Analytics Report');?></h2>
    
    <p>
        <div class="dates">
            Start Date: <?php echo $this->data['ArchiveAnalytics']['start']; ?>
            &nbsp;  &nbsp;
            End Date: <?php echo $this->data['ArchiveAnalytics']['end']; ?>
            &nbsp;  &nbsp;
            Number of viewed archive streams: <?php echo $this->data['ArchiveAnalytics']['count']; ?>
        </div>
    </p>

    <table cellpadding="0" class='maintable'>
	<tr class='tophead'>
        <th class='topid'>ID</th>
        <th class='topname'>Archive Name</th>
        <th class='topcount'>Total View Count</th>
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
            <td class='rowid'><?php echo $archiveAnalytic['ArchiveAnalytic']['archive_feed_id']; ?></td>
            <td class='rowname'><?php echo $archiveAnalytic['ArchiveFeed']['name']; ?></td>
            <td class='rowcount'><?php echo $archiveAnalytic[0]['Count_Views']; ?></td>
        </tr>
    <?php endforeach; ?>
	</table>
    <p> &nbsp; </p>
    <div class="caption">Traffic Chart</div>
    <div>
        <?php $this->Chart->drawChart($this->data['ArchiveAnalytics']['chartdata'],'Archive Name','Total View Count'); ?>
    </div>   
</div>
