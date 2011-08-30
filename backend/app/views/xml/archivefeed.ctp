<?php  __('<root>');?>
	<?php
	foreach ($postReturn as $postRtn):
	?>
        <?php  __('<analytic_post>'); ?>
            <?php __('<![CDATA['); echo $postRtn; __(']]>'); ?>
        <?php  __('</analytic_post>');?>
    <?php endforeach; ?>
	<?php
	foreach ($archiveFeeds as $archiveFeed):
	?>
        <?php  __('<archive_feed id="'); echo $archiveFeed['ArchiveFeed']['id']; __('">'); ?>
            <?php __('<name>'); ?>
                <?php __('<![CDATA['); echo $archiveFeed['ArchiveFeed']['name']; __(']]>'); ?>
            <?php __('</name>'); ?>
            <?php __('<description>'); ?>
                <?php __('<![CDATA['); echo $archiveFeed['ArchiveFeed']['description']; __(']]>'); ?>
            <?php __('</description>'); ?>
            <?php __('<high_res>'); ?>
                <?php __('<![CDATA['); echo $archiveFeed['ArchiveFeed']['high_res_url']; __(']]>'); ?>
            <?php __('</high_res>'); ?>
            <?php __('<low_res>'); ?>
                <?php __('<![CDATA['); echo $archiveFeed['ArchiveFeed']['low_res_url']; __(']]>'); ?>
            <?php __('</low_res>'); ?>
            <?php __('<left_icon>'); ?>
                <?php __('<![CDATA['); echo $archiveFeed['LeftIcon']['icon']; __(']]>'); ?>
            <?php __('</left_icon>'); ?>
            <?php __('<right_icon>'); ?>
                <?php __('<![CDATA['); echo $archiveFeed['RightIcon']['icon']; __(']]>'); ?>
            <?php __('</right_icon>'); ?>
            <?php __('<background>'); ?>
                <?php __('<![CDATA['); echo $archiveFeed['ArchiveFeed']['background']; __(']]>'); ?>
            <?php __('</background>'); ?>
            <?php __('<thumbnail>'); ?>
                <?php __('<![CDATA['); echo $archiveFeed['ArchiveFeed']['thumbnail_url']; __(']]>'); ?>
            <?php __('</thumbnail>'); ?>
        <?php  __('</archive_feed>');?>
    <?php endforeach; ?>
<?php  __('</root>');

