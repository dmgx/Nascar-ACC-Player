<?php  __('<root>');?>
	<?php
	foreach ($livestreamFeeds as $livestreamFeed):
	?>
        <?php  __('<livestream id="'); echo $livestreamFeed['LivestreamFeed']['id']; __('">');?>
            <?php __('<display_name>'); ?>
                <?php __('<![CDATA['); echo $livestreamFeed['LivestreamFeed']['display_name']; __(']]>'); ?>
            <?php __('</display_name>'); ?>
            <?php __('<description>'); ?>
                <?php __('<![CDATA['); echo $livestreamFeed['LivestreamFeed']['description']; __(']]>'); ?>
            <?php __('</description>'); ?>
            <?php __('<name>'); ?>
                <?php __('<![CDATA['); echo $livestreamFeed['LivestreamFeed']['name']; __(']]>'); ?>
            <?php __('</name>'); ?>
            <?php __('<url>'); ?>
                <?php __('<![CDATA['); echo $livestreamFeed['LivestreamFeed']['url']; __(']]>'); ?>
            <?php __('</url>'); ?>
            <?php __('<left_icon>'); ?>
                <?php __('<![CDATA['); echo $livestreamFeed['LeftIcon']['icon']; __(']]>'); ?>
            <?php __('</left_icon>'); ?>
            <?php __('<right_icon>'); ?>
                <?php __('<![CDATA['); echo $livestreamFeed['RightIcon']['icon']; __(']]>'); ?>
            <?php __('</right_icon>'); ?>
            <?php __('<background>'); ?>
                <?php __('<![CDATA['); echo $livestreamFeed['LivestreamFeed']['background']; __(']]>'); ?>
            <?php __('</background>'); ?>
            <?php __('<thumbnail>'); ?>
                <?php __('<![CDATA['); echo $livestreamFeed['LivestreamFeed']['thumbnail_url']; __(']]>'); ?>
            <?php __('</thumbnail>'); ?>
        <?php  __('</livestream>');?>
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
	<?php
	foreach ($prerollAds as $prerollAd):
	?>
        <?php  __('<prerollad id="'); echo $prerollAd['PrerollAd']['id']; __('">'); ?>
            <?php __('<url>'); ?>
                <?php __('<![CDATA['); echo $prerollAd['PrerollAd']['image_url']; __(']]>'); ?>
            <?php __('</url>'); ?>
        <?php  __('</prerollad>');?>
    <?php endforeach; ?>
	<?php foreach ($popoverAds as $popoverAd): ?>
        <?php  __('<popoverad id="'); echo $popoverAd['PopoverAd']['id'];
          __('" type="'); echo $popoverAd['AdType']['name']; __('">'); ?>
            <?php
                switch($popoverAd['PopoverAd']['ad_type_id']){
                    case 1:
                        __('<asset>');
                        __('<![CDATA['); echo $popoverAd['PopoverAd']['image_url']; __(']]>');
                        __('</asset>');
                        break;
                    case 2:
                        __('<asset>');
                        __('<![CDATA['); echo $popoverAd['PopoverAd']['image_url']; __(']]>');
                        __('</asset>');
                        __('<url>');
                        __('<![CDATA['); echo $popoverAd['PopoverAd']['link_url']; __(']]>');
                        __('</url>');
                        break;
                    case 3:
                        __('<content>');
                        __('<![CDATA['); echo $popoverAd['PopoverAd']['image_url']; __(']]>');
                        __('</content>');
                        __('<url>');
                        __('<![CDATA['); echo $popoverAd['PopoverAd']['link_url']; __(']]>');
                        __('</url>');
                        break;
                }
            ?>
        <?php  __('</popoverad>');?>
    <?php endforeach; ?>
    <?php  __('<configuration>');?>
        <?php __('<twitter>'); ?>
            <?php __('<![CDATA['); echo $configuration['Configuration']['twitter']; __(']]>'); ?>
        <?php __('</twitter>'); ?>
        <?php __('<facebook>'); ?>
            <?php __('<![CDATA['); echo $configuration['Configuration']['facebook']; __(']]>'); ?>
        <?php __('</facebook>'); ?>
        <?php __('<popover_frequency>'); ?>
            <?php __('<![CDATA['); echo $configuration['Configuration']['popover_frequency']; __(']]>'); ?>
        <?php __('</popover_frequency>'); ?>
        <?php __('<placeholder>'); ?>
            <?php $place_holder = 'http://' . $_SERVER['HTTP_HOST'] . $this->Html->webroot . $configuration['Configuration']['placeholder'] . $configuration['Configuration']['placeholder_file'];
            __('<![CDATA['); echo $place_holder; __(']]>'); ?>
        <?php __('</placeholder>'); ?>
    <?php  __('</configuration>');?>
<?php  __('</root>');

