<?php  __('<root>');?>
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
            <?php __('<![CDATA['); echo $configuration['Configuration']['placeholder']; __(']]>'); ?>
        <?php __('</placeholder>'); ?>
    <?php  __('</configuration>');?>
<?php  __('</root>');

