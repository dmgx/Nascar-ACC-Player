<?php  __('<root>');?>
	<?php
	foreach ($postReturn as $postRtn):
	?>
        <?php  __('<analytic_post>'); ?>
            <?php __('<![CDATA['); echo $postRtn; __(']]>'); ?>
        <?php  __('</analytic_post>');?>
    <?php endforeach; ?>
	<?php
	foreach ($popoverAds as $popoverAd):
	?>
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
<?php  __('</root>');

