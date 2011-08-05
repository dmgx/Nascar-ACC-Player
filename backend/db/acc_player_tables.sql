DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `firstname` varchar(16) NOT NULL,
  `lastname` varchar(24) NOT NULL,
  `password` varchar(40) NOT NULL,
  `useremail` text NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime,
  PRIMARY KEY (`id`)
);

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `password`, `useremail`, `created_date`, `updated_date`) VALUES
(1, 'test', 'Test', 'Testy', 'e70c3dc1bd4f74abfee646a5c2b8c825fb44ccd3', 'rktest@gametruckparty.com', '2011-08-04 16:37:00', '2011-08-04 16:37:00');
-- test user pw 123456

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `description` text,
  `created_date` datetime NOT NULL,
  `updated_date` datetime,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `statuses`; -- ENUM ('Draft', 'Published', 'Archive')
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `team_icons`;
CREATE TABLE IF NOT EXISTS `team_icons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `icon` text NOT NULL,
  PRIMARY KEY (`id`)
);

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
  `created_date` datetime NOT NULL,
  `updated_date` datetime,
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
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `left_icon_id` int(11) NOT NULL,
  `right_icon_id` int(11) NOT NULL,
  `background` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime,
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
  `link_url` text,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime,
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
  `created_date` datetime NOT NULL,
  `updated_date` datetime,
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

DROP TABLE IF EXISTS `preroll_analytics`;
CREATE TABLE IF NOT EXISTS `preroll_analytics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preroll_ad_id` int(11) NOT NULL,
  `event_time` datetime NOT NULL,
  `contact_type_id` varchar(5),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`preroll_ad_id`) REFERENCES `preroll_ads`(`id`),
  FOREIGN KEY (`contact_type_id`) REFERENCES `contact_types`(`id`)
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



