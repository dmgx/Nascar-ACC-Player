DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `firstname` varchar(16) NOT NULL,
  `lastname` varchar(24) NOT NULL,
  `password` varchar(40) NOT NULL,
  `useremail` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime,
  PRIMARY KEY (`id`)
);

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `password`, `useremail`, `created`, `modified`) VALUES
(1, 'test', 'Test', 'Testy', 'e70c3dc1bd4f74abfee646a5c2b8c825fb44ccd3', 'rktest@gametruckparty.com', '2011-08-04 16:37:00', '2011-08-04 16:37:00');
-- test user pw 123456

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `description` text,
  `created` datetime NOT NULL,
  `modified` datetime,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `statuses`; -- ENUM ('Draft', 'Published', 'Archive')
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Draft'),
(2, 'Published'),
(3, 'Archive');

DROP TABLE IF EXISTS `team_icons`;
CREATE TABLE IF NOT EXISTS `team_icons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `icon` text NOT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `team_icons` (`id`, `name`, `icon`) VALUES
(1, 'Boston College', 'BostonCollegeIcon.png'),
(2, 'Clemson', 'Clemson.png'),
(3, 'Duke', 'Duke.png'),
(4, 'Flordia State', 'FlordiaState.png'),
(5, 'Georgia Tech', 'GeorgiaTech.png'),
(6, 'Maryland', 'Maryland.png'),
(7, 'Miami', 'Miami.png'),
(8, 'North Carolina', 'NorthCarolina.png'),
(9, 'NC State', 'NCState.png'),
(10, 'Virginia', 'Virginia.png'),
(11, 'Virginia Tech', 'VirginiaTech.png'),
(12, 'Wake Forest', 'WakeForest.png');

DROP TABLE IF EXISTS `archive_feeds`;
CREATE TABLE IF NOT EXISTS `archive_feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text,
  `status_id` int(11) NOT NULL,
  `low_res_url` text NOT NULL,
  `high_res_url` text NOT NULL,
  `thumbnail_url` text NOT NULL,
  `left_icon_id` int(11) NOT NULL,
  `right_icon_id` int(11) NOT NULL,
  `background` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`), 
  FOREIGN KEY (`left_icon_id`) REFERENCES `team_icons`(`id`), 
  FOREIGN KEY (`right_icon_id`) REFERENCES `team_icons`(`id`),
  FOREIGN KEY (`status_id`) REFERENCES `statuses`(`id`) 
);

DROP TABLE IF EXISTS `livestream_feeds`;
CREATE TABLE IF NOT EXISTS `livestream_feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text,
  `status_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `thumbnail_url` text NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `left_icon_id` int(11) NOT NULL,
  `right_icon_id` int(11) NOT NULL,
  `background` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`), 
  FOREIGN KEY (`left_icon_id`) REFERENCES `team_icons`(`id`), 
  FOREIGN KEY (`right_icon_id`) REFERENCES `team_icons`(`id`),
  FOREIGN KEY (`status_id`) REFERENCES `statuses`(`id`) 
);

DROP TABLE IF EXISTS `preroll_ads`;
CREATE TABLE IF NOT EXISTS `preroll_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text,
  `status_id` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`status_id`) REFERENCES `statuses`(`id`)
);

DROP TABLE IF EXISTS `ad_types`;
CREATE TABLE IF NOT EXISTS `ad_types` ( -- ENUM ('SWF', 'Image', 'Text'),
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
);
INSERT INTO `ad_types` (`id`, `name`) VALUES
(1, 'SWF'),
(2, 'Image'),
(3, 'Text');

DROP TABLE IF EXISTS `popover_ads`;
CREATE TABLE IF NOT EXISTS `popover_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text,
  `status_id` int(11) NOT NULL,
  `ad_type_id`  int(11) NOT NULL, 
  `image_url` text NOT NULL,
  `link_url` text,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`ad_type_id`) REFERENCES `ad_types`(`id`),
  FOREIGN KEY (`status_id`) REFERENCES `statuses`(`id`)
);

DROP TABLE IF EXISTS `archive_analytics`;
CREATE TABLE IF NOT EXISTS `archive_analytics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `archive_feed_id` int(11) NOT NULL,
  `view_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`archive_feed_id`) REFERENCES `archive_feeds`(`id`)
);

DROP TABLE IF EXISTS `livestream_analytics`;
CREATE TABLE IF NOT EXISTS `livestream_analytics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `livestream_feed_id` int(11) NOT NULL,
  `view_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`livestream_feed_id`) REFERENCES `livestream_feeds`(`id`)
);

DROP TABLE IF EXISTS `contact_types`;
CREATE TABLE IF NOT EXISTS `contact_types` ( -- ENUM ('view', 'click')
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
);
INSERT INTO `contact_types` (`id`, `name`) VALUES
(1, 'view'),
(2, 'click');

DROP TABLE IF EXISTS `preroll_analytics`;
CREATE TABLE IF NOT EXISTS `preroll_analytics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preroll_ad_id` int(11) NOT NULL,
  `event_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`preroll_ad_id`) REFERENCES `preroll_ads`(`id`)
);

DROP TABLE IF EXISTS `popover_analytics`;
CREATE TABLE IF NOT EXISTS `popover_analytics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `popover_ad_id` int(11) NOT NULL,
  `event_time` datetime NOT NULL,
  `contact_type_id` varchar(5),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`popover_ad_id`) REFERENCES `popover_ads`(`id`),
  FOREIGN KEY (`contact_type_id`) REFERENCES `contact_types`(`id`)
);

DROP TABLE IF EXISTS `configurations`;
CREATE TABLE IF NOT EXISTS `configurations` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`twitter` text,
	`facebook` text,
	`popover_frequency` real,
	`placeholder` text,
    `image_url_path` text,
	`swf_url_path` text,
	`livefeed_url_path` text,
	`archive_hr_url_path` text,
	`archive_lr_url_path` text,
	`thumbnail_url_path` text,
	`background_url_path` text,
   PRIMARY KEY (`id`)
);
INSERT INTO `configurations` (`popover_frequency`, `twitter`, `facebook`, `placeholder`, `image_url_path`, `swf_url_path`, `livefeed_url_path`, `archive_hr_url_path`, `archive_lr_url_path`, `thumbnail_url_path`, `background_url_path`) VALUES
    (180,
    'http://twitter.com/statuses/user_timeline/theacc.xml?count=25',
    'http://facebook.com/theacc',
    'http://acc.nascarmediagroup.com/assets/static_placeholder.png',
    'http://acc.nascarmediagroup.com/assets/images/',
    'http://acc.nascarmediagroup.com/assets/swf/',
    'http://acc.nascarmediagroup.com/assets/livefeed/',
    'http://acc.nascarmediagroup.com/assets/archive_hr/',
    'http://acc.nascarmediagroup.com/assets/archive_lr/',
    'http://acc.nascarmediagroup.com/assets/thumbnail/',
    'http://acc.nascarmediagroup.com/assets/background/'
);

DROP TABLE IF EXISTS `weekly_email_lists`;
CREATE TABLE IF NOT EXISTS `weekly_email_lists` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`email` text,
   PRIMARY KEY (`id`)
);
DROP TABLE IF EXISTS `monthly_email_lists`;
CREATE TABLE IF NOT EXISTS `monthly_email_lists` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`email` text,
   PRIMARY KEY (`id`)
);

