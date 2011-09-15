<?php
    echo $html->css('chart', 'stylesheet', array("media"=>"all" ), false);
    echo $html->css('pdf', 'stylesheet', array("media"=>"all" ), false);
?> 
<div class="popoverAnalytics index">
	<h2><?php __('Pop Over Add Analytics Report');?></h2>
    
    <p>
        <div class="dates">
            Start Date: <?php echo $this->data['PopoverAnalytics']['start']; ?>
            &nbsp;  &nbsp;
            End Date: <?php echo $this->data['PopoverAnalytics']['end']; ?>
            &nbsp;  &nbsp;
            Number of viewed livestream streams: <?php echo $this->data['PopoverAnalytics']['count']; ?>
        </div>
    </p>

    <table cellpadding="0" class='maintable'>
	<tr class='tophead'>
        <th class='topid'>ID</th>
        <th class='topname'>Pop Over Add Name</th>
        <th class='topcount'>Total View Count</th>
        <th class='topcount'>Total Click Count</th>
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
            <td class='rowid'><?php echo $popoverAnalytic['PopoverAnalytic']['popover_ad_id']; ?></td>
            <td class='rowname'><?php echo $popoverAnalytic['PopoverAd']['name']; ?></td>
            <td class='rowcount'><?php echo $popoverAnalytic[0]['Count_Views']; ?></td>
            <td class='rowcount'><?php echo $popoverAnalytic[0]['Count_Clicks']; ?></td>
        </tr>
    <?php endforeach; ?>
	</table>
    <p> &nbsp; </p>
    <div class="caption">Traffic Chart</div>
    <div>
        <?php $this->Chart->drawChart2($this->data['PopoverAnalytics']['chartdata'],'Pop Over Add Name',array('View Count','Click Count')); ?>
    </div>   
</div>
