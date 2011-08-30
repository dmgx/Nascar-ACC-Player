<?php  __('<root>');?>
	<?php
	foreach ($postReturn as $postRtn):
	?>
        <?php  __('<analytic_post>'); ?>
            <?php __('<![CDATA['); echo $postRtn; __(']]>'); ?>
        <?php  __('</analytic_post>');?>
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
<?php  __('</root>');