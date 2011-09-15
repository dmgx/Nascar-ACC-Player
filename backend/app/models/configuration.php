<?php
class Configuration extends AppModel {
	var $name = 'Configuration';

    function beforeSave($created) {
        $Configuration = ClassRegistry::init('Configuration');
        $configuration = $Configuration->find('first');

        extract($this->data['Configuration']['placeholder_file']);
        $dest = $configuration['Configuration']['placeholder'];
        if ($size && !$error && $name) {
            $t0 = move_uploaded_file($tmp_name, $dest.$name);
            $this->data['Configuration']['placeholder_file'] = $name;
            $t0=0;
        } else {
            unset($this->data['Configuration']['placeholder_file']);
        }
        return true;
    } 
}