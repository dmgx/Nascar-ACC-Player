<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$this->layout = 'header';
if (Configure::read() == 0):
	$this->cakeError('error404');
endif;
?>
<h2><?php echo sprintf(__('NASCAR ACC Web Video Player Management Tool', true), Configure::version()); ?></h2>
<?php
if (Configure::read() > 0):
	Debugger::checkSecurityKeys();
endif;
?>

<ul>
	<li><a href="configurations"><?php __('Configurations'); ?> </a>
	<ul><li><?php __('Managing configuration parameters'); ?></li></ul></li>
	<li><a href="users"><?php __('Users'); ?> </a>
	<ul><li><?php __('Managing users'); ?></li></ul></li>
	<li><a href="archive_feeds"><?php __('Archive Feeds'); ?> </a>
	<ul><li><?php __('Manage archived video feeds'); ?></li></ul></li>
	<li><a href="livestream_feeds"><?php __('Livestream Feeds'); ?> </a>
	<ul><li><?php __('Manage live video streams'); ?></li></ul></li>
	<li><a href="preroll_ads"><?php __('Preroll Ads'); ?> </a>
	<ul><li><?php __('Manage preroll video ads'); ?></li></ul></li>
	<li><a href="popover_ads"><?php __('Popover Ads'); ?> </a>
	<ul><li><?php __('Manage Popover Ads'); ?></li></ul></li>
	<li><?php echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?> </a>
	<ul><li><?php __('Logout of CMS'); ?></li></ul></li>
</ul>
