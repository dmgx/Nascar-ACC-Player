<?php  __('<root>');?>
	<?php
	foreach ($popoverAds as $popoverAd):
	?>
        <?php  __('<opover id="'); echo $popoverAd['PopoverAd']['id'];
          __(' type="'); echo $popoverAd['AdType']['name']; __('">'); ?>
            <?php __('<url>'); ?>
                <?php __('<![CDATA['); echo $popoverAd['PopoverAd']['link_url']; __(']]>'); ?>
            <?php __('</url>'); ?>
        <?php  __('</popoverad>');?>
    <?php endforeach; ?>
<?php  __('</root>');?>

