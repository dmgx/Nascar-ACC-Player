<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
    Router::connect('/users/index/*', array('controller' => 'users', 'action' => 'index'));
    Router::connect('/users/add', array('controller' => 'users', 'action' => 'add'));
    Router::connect('/users/edit/*', array('controller' => 'users', 'action' => 'edit'));
    Router::connect('/users/delete/*', array('controller' => 'users', 'action' => 'delete'));
    Router::connect('/ArchiveFeeds/index/*', array('controller' => 'ArchiveFeeds', 'action' => 'index'));
    Router::connect('/ArchiveFeeds/add', array('controller' => 'ArchiveFeeds', 'action' => 'add'));
    Router::connect('/ArchiveFeeds/edit/*', array('controller' => 'ArchiveFeeds', 'action' => 'edit'));
    Router::connect('/ArchiveFeeds/delete/*', array('controller' => 'ArchiveFeeds', 'action' => 'delete'));
/**
 * Add in support for web services by enabling generating output based on extension
 */
    Router::parseExtensions();
    Router::connect('/xml/*', array('controller' => 'xml', 'action' => 'index'));
