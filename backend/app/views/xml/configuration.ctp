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
            <?php $place_holder = 'http://' . $_SERVER['HTTP_HOST'] . $this->Html->webroot . $configuration['Configuration']['placeholder'] . $configuration['Configuration']['placeholder_file'];
            __('<![CDATA['); echo $place_holder; __(']]>'); ?>
        <?php __('</placeholder>'); ?>
    <?php  __('</configuration>');?>
<?php  __('</root>');

