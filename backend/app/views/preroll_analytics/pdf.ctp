<?php
    echo $html->css('chart', 'stylesheet', array("media"=>"all" ), false);
    echo $html->css('pdf', 'stylesheet', array("media"=>"all" ), false);
?> 
<div class="prerollAnalytics index">
	<h2><?php __('Pre-Roll Add Analytics Report');?></h2>
    
    <p>
        <div class="dates">
            Start Date: <?php echo $this->data['PrerollAnalytics']['start']; ?>
            &nbsp;  &nbsp;
            End Date: <?php echo $this->data['PrerollAnalytics']['end']; ?>
            &nbsp;  &nbsp;
            Number of viewed livestream streams: <?php echo $this->data['PrerollAnalytics']['count']; ?>
        </div>
    </p>

    <table cellpadding="0" class='maintable'>
	<tr class='tophead'>
        <th class='topid'>ID</th>
        <th class='topname'>Pop Over Add Name</th>
        <th class='topcount'>Total View Count</th>
	</tr>
	<?php
	$i = 0;
	foreach ($prerollAnalytics as $prerollAnalytic):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
        <tr<?php echo $class;?>>
            <td class='rowid'><?php echo $prerollAnalytic['PrerollAnalytic']['preroll_ad_id']; ?></td>
            <td class='rowname'><?php echo $prerollAnalytic['PrerollAd']['name']; ?></td>
            <td class='rowcount'><?php echo $prerollAnalytic[0]['Count_Views']; ?></td>
        </tr>
    <?php endforeach; ?>
	</table>
    <p> &nbsp; </p>
    <div class="caption">Traffic Chart</div>
    <div>
        <?php $this->Chart->drawChart($this->data['PrerollAnalytics']['chartdata'],'Pop Over Add Name','View Count'); ?>
    </div>   
</div>
