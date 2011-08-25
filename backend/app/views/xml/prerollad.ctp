<?php  __('<root>');?>
	<?php
	foreach ($prerollAds as $prerollAd):
	?>
        <?php  __('<prerollad id="'); echo $prerollAd['PrerollAd']['id']; __('">'); ?>
            <?php __('<url>'); ?>
                <?php __('<![CDATA['); echo $prerollAd['PrerollAd']['link_url']; __(']]>'); ?>
            <?php __('</url>'); ?>
        <?php  __('</prerollad>');?>
    <?php endforeach; ?>
<?php  __('</root>');