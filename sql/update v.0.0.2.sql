/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_category_slug_unique` (`category_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `category_slug`, `category_description`, `parent_id`, `created_at`, `updated_at`) VALUES
	(1, 'Support', NULL, NULL, NULL, '2017-08-07 01:09:46', '2017-09-13 22:31:35'),
	(2, 'Customer Support', 'support_service', 'Blizzard Support Agent moderated forum to discuss and inquire about in-game and account related issues.', 1, NULL, '2017-09-13 23:07:45');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2017_06_28_005713_create_posts_table', 1),
	(8, '2017_07_01_201843_create_comments_table', 2),
	(9, '2017_07_17_180107_create_roles_permissions', 2),
	(11, '2017_07_20_131915_laratrust_setup_tables', 3),
	(12, '2017_08_06_215104_create_categories_table', 4),
	(13, '2017_08_06_215654_create_topics_table', 4),
	(14, '2017_08_06_215954_create_replies_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'view-dashboard', 'View Dashboard', 'View Dashboard', '2017-09-18 13:52:52', '2017-09-18 13:52:52'),
	(2, 'create-user', 'Create User', 'Create User', '2017-09-18 13:52:52', '2017-09-18 13:52:52'),
	(3, 'view-user', 'View User', 'View User', '2017-09-18 13:52:52', '2017-09-18 13:52:52'),
	(4, 'update-user', 'Update User', 'Update User', '2017-09-18 13:52:52', '2017-09-18 13:52:52'),
	(5, 'delete-user', 'Delete User', 'Delete User', '2017-09-18 13:52:52', '2017-09-18 13:52:52'),
	(6, 'create-role', 'Create Role', 'Create Role', '2017-09-18 13:52:52', '2017-09-18 13:52:52'),
	(7, 'view-role', 'View Role', 'View Role', '2017-09-18 13:52:52', '2017-09-18 13:52:52'),
	(8, 'update-role', 'Update Role', 'Update Role', '2017-09-18 13:52:52', '2017-09-18 13:52:52'),
	(9, 'delete-role', 'Delete Role', 'Delete Role', '2017-09-18 13:52:52', '2017-09-18 13:52:52'),
	(10, 'create-post', 'Create Post', 'Create Post', '2017-09-18 13:52:52', '2017-09-18 13:52:52'),
	(11, 'update-post', 'Update Post', 'Update Post', '2017-09-18 13:52:52', '2017-09-18 13:52:52'),
	(12, 'delete-post', 'Delete Post', 'Delete Post', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(13, 'view-comment', 'View Comment', 'View Comment', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(14, 'update-comment', 'Update Comment', 'Update Comment', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(15, 'delete-comment', 'Delete Comment', 'Delete Comment', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(16, 'update-forum-topic', 'Update Forum-topic', 'Update Forum-topic', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(17, 'delete-forum-topic', 'Delete Forum-topic', 'Delete Forum-topic', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(18, 'update-topic-reply', 'Update Topic-reply', 'Update Topic-reply', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(19, 'delete-topic-reply', 'Delete Topic-reply', 'Delete Topic-reply', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(20, 'create-forum-category', 'Create Forum-category', 'Create Forum-category', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(21, 'update-forum-category', 'Update Forum-category', 'Update Forum-category', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(22, 'delete-forum-category', 'Delete Forum-category', 'Delete Forum-category', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(23, 'view-post', 'View Post', 'View Post', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(24, 'create-comment', 'Create Comment', 'Create Comment', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(25, 'update-own-comment', 'Update Own-comment', 'Update Own-comment', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(26, 'update-own-post', 'Update Own-post', 'Update Own-post', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(27, 'create-forum-topic', 'Create Forum-topic', 'Create Forum-topic', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(28, 'view-forum-topic', 'View Forum-topic', 'View Forum-topic', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(29, 'create-topic-reply', 'Create Topic-reply', 'Create Topic-reply', '2017-09-18 13:52:53', '2017-09-18 13:52:53'),
	(30, 'update-own-topic-reply', 'Update Own-topic-reply', 'Update Own-topic-reply', '2017-09-18 13:52:53', '2017-09-18 13:52:53');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `permission_role`;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 2),
	(11, 2),
	(12, 2),
	(13, 2),
	(14, 2),
	(15, 2),
	(16, 2),
	(17, 2),
	(18, 2),
	(19, 2),
	(20, 2),
	(21, 2),
	(22, 2),
	(23, 3),
	(24, 3),
	(25, 3),
	(26, 3),
	(27, 3),
	(28, 3),
	(29, 3),
	(30, 3);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `replies`;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
