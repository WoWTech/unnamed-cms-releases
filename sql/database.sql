/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

DROP TABLE IF EXISTS `account_permission`;
CREATE TABLE IF NOT EXISTS `account_permission` (
  `permission_id` int(10) unsigned NOT NULL,
  `account_id` int(10) unsigned NOT NULL,
  `user_type` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`account_id`,`permission_id`,`user_type`),
  KEY `account_permission_permission_id_foreign` (`permission_id`),
  CONSTRAINT `account_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `account_permission`;
/*!40000 ALTER TABLE `account_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_permission` ENABLE KEYS */;


DROP TABLE IF EXISTS `account_role`;
CREATE TABLE IF NOT EXISTS `account_role` (
  `role_id` int(10) unsigned NOT NULL,
  `account_id` int(10) unsigned NOT NULL,
  `user_type` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`account_id`,`role_id`,`user_type`),
  KEY `account_role_role_id_foreign` (`role_id`),
  CONSTRAINT `account_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `account_role`;
/*!40000 ALTER TABLE `account_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_role` ENABLE KEYS */;


DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2017_06_28_005713_create_posts_table', 1),
	(8, '2017_07_01_201843_create_comments_table', 2),
	(9, '2017_07_17_180107_create_roles_permissions', 2),
	(11, '2017_07_20_131915_laratrust_setup_tables', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'view-dashboard', 'View Dashboard', 'View Dashboard', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(2, 'create-user', 'Create User', 'Create User', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(3, 'view-user', 'View User', 'View User', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(4, 'update-user', 'Update User', 'Update User', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(5, 'delete-user', 'Delete User', 'Delete User', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(6, 'create-post', 'Create Post', 'Create Post', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(7, 'update-post', 'Update Post', 'Update Post', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(8, 'delete-post', 'Delete Post', 'Delete Post', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(9, 'view-comment', 'View Comment', 'View Comment', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(10, 'update-comment', 'Update Comment', 'Update Comment', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(11, 'delete-comment', 'Delete Comment', 'Delete Comment', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(12, 'view-post', 'View Post', 'View Post', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(13, 'create-comment', 'Create Comment', 'Create Comment', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(14, 'update-own-comment', 'Update Own-comment', 'Update Own-comment', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(15, 'update-own-post', 'Update Own-post', 'Update Own-post', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(16, 'delete-own-post', 'Delete Own Post', 'Delete Own Post', '2017-07-23 22:51:11', '2017-07-23 22:51:12'),
	(17, 'delete-own-comment', 'Delete Own Comment', 'Delete Own Comment', '2017-07-23 23:54:21', '2017-07-23 23:54:22'),
	(18, 'create-role', 'Create Role', 'Create Role', '2017-07-24 16:47:25', '2017-07-24 16:47:27'),
	(19, 'update-role', 'Update Role', 'Update Role', '2017-07-24 16:47:42', '2017-07-24 16:47:43'),
	(20, 'delete-role', 'Delete Role', 'Delete Role', '2017-07-24 16:47:59', '2017-07-24 16:47:59');
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
	(18, 1),
	(19, 1),
	(20, 1),
	(6, 2),
	(7, 2),
	(8, 2),
	(9, 2),
	(10, 2),
	(11, 2),
	(16, 2),
	(12, 3),
	(13, 3),
	(14, 3),
	(15, 3),
	(17, 3);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', 'Administrator', 'Administrator', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(2, 'moderator', 'Moderator', 'Moderator', '2017-07-23 16:05:38', '2017-07-23 16:05:38'),
	(3, 'user', 'User', 'User', '2017-07-23 16:05:38', '2017-07-23 16:05:38');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
