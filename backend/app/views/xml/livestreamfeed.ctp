<?php  __('<root>');?>
	<?php
	foreach ($livestreamFeeds as $livestreamFeed):
	?>
        <?php  __('<livestream id="'); echo $livestreamFeed['LivestreamFeed']['id']; __('">');?>
            <?php __('<name>'); ?>
                <?php __('<![CDATA['); echo $livestreamFeed['LivestreamFeed']['name']; __(']]>'); ?>
            <?php __('</name>'); ?>
            <?php __('<description>'); ?>
                <?php __('<![CDATA['); echo $livestreamFeed['LivestreamFeed']['description']; __(']]>'); ?>
            <?php __('</description>'); ?>
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
<?php  __('</root>');?>

