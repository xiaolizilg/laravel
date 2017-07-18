-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        10.1.19-MariaDB - mariadb.org binary distribution
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 导出 laravel 的数据库结构
CREATE DATABASE IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `laravel`;


-- 导出  表 laravel.la_admin 结构
CREATE TABLE IF NOT EXISTS `la_admin` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `name` varchar(50) DEFAULT NULL COMMENT '权限名',
  `url` text COMMENT '权限地址',
  `status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态1:正常0:隐藏',
  `delete_at` timestamp NULL DEFAULT NULL COMMENT '删除标记',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- 正在导出表  laravel.la_admin 的数据：~12 rows (大约)
/*!40000 ALTER TABLE `la_admin` DISABLE KEYS */;
REPLACE INTO `la_admin` (`id`, `pid`, `name`, `url`, `status`, `delete_at`, `created_at`, `updated_at`) VALUES
	(1, 0, '菜单管理', 'admin/admin/index', 1, '0000-00-00 00:00:00', '2017-06-28 09:20:56', '2017-06-28 09:20:56'),
	(2, 0, '用户管理', 'admin/user/index', 1, '2017-06-30 15:32:11', '2017-06-28 09:22:12', '2017-06-28 09:22:12'),
	(3, 0, '权限管理', 'admin/admin/index', 1, '2017-06-30 15:32:12', '2017-06-28 09:22:33', '2017-06-28 09:22:33'),
	(4, 0, '广告管理', 'admin/advs/index', 1, '2017-06-30 15:32:14', '2017-06-28 09:23:13', '2017-06-28 09:23:13'),
	(8, 1, '菜单列表', 'admin/menu/index', 1, '2017-06-30 15:32:14', '2017-06-28 10:22:39', '2017-06-28 10:22:39'),
	(9, 2, '用户列表', 'admin/user/index', 1, '2017-06-30 15:32:17', '2017-06-30 07:00:33', '2017-06-30 07:00:33'),
	(10, 3, '权限列表', 'admin/admin/index', 1, '2017-06-30 15:32:16', '2017-06-30 07:00:58', '2017-06-30 07:00:58'),
	(11, 4, '广告列表', 'admin/advs/index', 1, '2017-06-30 15:32:18', '2017-06-30 07:01:20', '2017-06-30 07:01:20'),
	(12, 1, '添加菜单', 'admin/menu/create', 1, '2017-06-30 15:32:19', '2017-06-30 07:01:45', '2017-06-30 07:01:45'),
	(13, 1, '编辑菜单', 'admin/menu/update', 1, '2017-06-30 15:32:20', '2017-06-30 07:02:58', '2017-06-30 07:02:58'),
	(14, 0, '爱的发声', '大师傅', 1, '2017-06-30 15:32:24', '2017-06-30 07:25:31', '2017-06-30 07:25:31');
/*!40000 ALTER TABLE `la_admin` ENABLE KEYS */;


-- 导出  表 laravel.la_advs 结构
CREATE TABLE IF NOT EXISTS `la_advs` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `title` varchar(255) NOT NULL COMMENT '菜单名称',
  `desc` varchar(255) NOT NULL DEFAULT '0' COMMENT '广告描述',
  `position` varchar(50) DEFAULT '' COMMENT '广告位置',
  `img` varchar(30) DEFAULT '' COMMENT '图片id',
  `url` varchar(30) DEFAULT '' COMMENT '链接地址',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态1:正常0:隐藏',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '软删除',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='广告表';

-- 正在导出表  laravel.la_advs 的数据：~4 rows (大约)
/*!40000 ALTER TABLE `la_advs` DISABLE KEYS */;
REPLACE INTO `la_advs` (`id`, `title`, `desc`, `position`, `img`, `url`, `sort`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'banner', 'adsfasd', '4', NULL, '', 3, 1, '2017-07-07 06:57:36', '2017-07-06 08:25:08', '2017-07-07 06:57:36'),
	(2, 'ffffff', 'afasfd', '4', '24', 'wwww.baidu.com', 0, 1, NULL, '2017-07-06 08:30:53', '2017-07-06 09:14:12'),
	(3, 'asdfs', 'asfs', '4', '25', 'asfsaf', 0, 0, '2017-07-06 08:58:24', '2017-07-06 08:34:00', '2017-07-06 08:58:24'),
	(4, 'ffffff', 'afasfd', '4', '26', 'wwww.baidu.com', 0, 1, '2017-07-07 07:00:19', '2017-07-06 09:42:20', '2017-07-07 07:00:19');
/*!40000 ALTER TABLE `la_advs` ENABLE KEYS */;


-- 导出  表 laravel.la_advs_position 结构
CREATE TABLE IF NOT EXISTS `la_advs_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '广告标识',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '广告标题',
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '描述',
  `sort` tinyint(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '软删除',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  laravel.la_advs_position 的数据：~4 rows (大约)
/*!40000 ALTER TABLE `la_advs_position` DISABLE KEYS */;
REPLACE INTO `la_advs_position` (`id`, `name`, `title`, `desc`, `sort`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'test', '测试', 'aksfksadf', 0, 1, '2017-07-06 05:53:04', '2017-07-06 05:45:55', '2017-07-06 05:53:04'),
	(2, 'test2', 'ceshi2', '测试2', 0, 1, '2017-07-06 05:50:53', '2017-07-06 05:49:50', '2017-07-06 05:50:53'),
	(3, 'asdfsd', 'asdf', 'asdf', 0, 1, '2017-07-06 05:52:33', '2017-07-06 05:52:29', '2017-07-06 05:52:33'),
	(4, 'afds', 'asdf', 'asdfasdf', 1, 0, NULL, '2017-07-06 05:53:16', '2017-07-06 08:48:23'),
	(5, 'adsf', 'afdf', 'adsf', 0, 1, '2017-07-06 05:54:37', '2017-07-06 05:53:22', '2017-07-06 05:54:37');
/*!40000 ALTER TABLE `la_advs_position` ENABLE KEYS */;


-- 导出  表 laravel.la_document 结构
CREATE TABLE IF NOT EXISTS `la_document` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '描述',
  `cover_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '封面id',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态1显示,0禁用',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '内容',
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '关键字',
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'seo标题',
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'seo描述',
  `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击量',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  laravel.la_document 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `la_document` DISABLE KEYS */;
REPLACE INTO `la_document` (`id`, `title`, `cate_id`, `desc`, `cover_id`, `sort`, `status`, `content`, `keywords`, `seo_title`, `seo_description`, `view`, `deleted_at`, `updated_at`, `created_at`) VALUES
	(1, NULL, 0, NULL, 0, 0, 1, 'g', NULL, NULL, NULL, 0, '2017-07-07 07:02:36', '2017-07-07 07:02:36', '2017-07-07 06:43:37'),
	(2, '诶我去若群翁反反复复', 0, '额外若群无若', 0, 0, 1, '<p>g阿斯蒂芬三发发发</p>', NULL, NULL, NULL, 0, NULL, '2017-07-07 07:25:21', '2017-07-07 06:46:52');
/*!40000 ALTER TABLE `la_document` ENABLE KEYS */;


-- 导出  表 laravel.la_menu 结构
CREATE TABLE IF NOT EXISTS `la_menu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `name` varchar(50) NOT NULL COMMENT '菜单名称',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `url` varchar(50) DEFAULT '' COMMENT '链接地址',
  `icon` varchar(30) DEFAULT '' COMMENT 'icon 图标',
  `status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态1:正常0:隐藏',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='菜单表';

-- 正在导出表  laravel.la_menu 的数据：~13 rows (大约)
/*!40000 ALTER TABLE `la_menu` DISABLE KEYS */;
REPLACE INTO `la_menu` (`id`, `name`, `pid`, `url`, `icon`, `status`, `created_at`, `updated_at`) VALUES
	(1, '用户管理', 0, 'admin/user/index', 'glyphicon glyphicon-user', 1, '2017-06-23 02:02:21', '0000-00-00 00:00:00'),
	(2, '菜单管理', 0, 'admin/menu/index', 'glyphicon glyphicon-th-list', 0, '2017-06-23 02:02:21', '2017-06-23 02:02:21'),
	(3, '菜单列表', 2, 'admin/menu/index', NULL, 0, '2017-06-23 02:13:38', '2017-06-23 02:13:38'),
	(4, '用户列表', 1, 'admin/user', 'icon', 0, '2017-06-23 02:16:21', '2017-06-23 02:16:21'),
	(5, '广告管理', 0, 'admin/advs/index', 'fa fa-desktop', 0, '2017-06-23 03:12:57', '2017-06-23 03:12:57'),
	(6, '广告列表', 5, 'admin/advs/index', NULL, 0, '2017-06-23 07:54:41', '2017-06-23 07:54:41'),
	(7, '权限', 0, 'admin/admin/index', 'fa fa-lock', 0, '2017-06-28 05:40:13', '2017-06-28 05:40:13'),
	(8, '管理员', 7, 'admin/role/index', NULL, 0, '2017-06-28 05:42:19', '2017-06-28 05:42:19'),
	(9, '权限列表', 7, 'admin/admin/index', NULL, 0, '2017-06-28 05:44:14', '2017-06-28 05:44:14'),
	(10, '广告位置', 5, 'admin/advsposition/index', NULL, 0, '2017-07-04 01:10:46', '2017-07-04 01:10:46'),
	(11, '文章管理', 0, 'admin/document/index', 'glyphicon glyphicon-file', 0, '2017-07-07 03:26:26', '2017-07-07 03:26:26'),
	(12, '文章列表', 11, 'admin/document/index', NULL, 0, '2017-07-07 03:27:12', '2017-07-07 03:27:12'),
	(13, '文章分类', 11, 'admin/category/index', NULL, 0, '2017-07-07 03:27:27', '2017-07-07 03:27:27');
/*!40000 ALTER TABLE `la_menu` ENABLE KEYS */;


-- 导出  表 laravel.la_picture 结构
CREATE TABLE IF NOT EXISTS `la_picture` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `path` varchar(255) DEFAULT NULL COMMENT '权限地址',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='图片表';

-- 正在导出表  laravel.la_picture 的数据：~25 rows (大约)
/*!40000 ALTER TABLE `la_picture` DISABLE KEYS */;
REPLACE INTO `la_picture` (`id`, `path`, `deleted_at`) VALUES
	(1, 'storage/app/upload/6GbsJmBnWdhpjfIbFyZ7xnFYz6lVqcuXVVbiViZY.jpeg', NULL),
	(2, 'storage/app/upload/RKQjdY1qtxtnqNjA15S7pPu93wk1It13RaBZHxwu.jpeg', NULL),
	(3, 'storage/app/upload/aJEq0hxDPEFBX06R3rTn4mQhjPjUEk4HsXuASVyQ.jpeg', NULL),
	(4, 'upload/cBF7jb7swSGhdqBBn2qxEG6Pvp9XyR1kKYkSmb3U.jpeg', NULL),
	(5, 'upload/TE5ecwvjIkxU8dXQ0UVyphi9X4RRgnvBEkVfKZZw.jpeg', NULL),
	(6, 'upload/VcqqhNKaaoMidEnBluOikzxKqaCIugnLvZdCgM1E.jpeg', NULL),
	(7, '/Uploads/upload/mPyMsNyUmkCH8kOYQfr9dDLJSkaO6dkaEBilZFYi.jpeg', NULL),
	(8, '/Uploads/upload/oW79UZHW496UXFHMtKkKdx2S94ezONoue0Z8ATzQ.jpeg', NULL),
	(9, '/Uploads/upload/QA8QG5EzSQuwaIUCEN1dzN47Y3VOq9bGtZnEzkZ0.jpeg', NULL),
	(10, '/Uploads/upload/TqO3q50mQdM9IXIwqo7sDEFB1dXCkl6EGkFW7Cno.jpeg', NULL),
	(11, '/Uploads/upload/h3CAewrDDE5hja4MGYqPHJR3cDpPWNgsgNVr4GXv.jpeg', NULL),
	(12, '/Uploads/upload/2rymeC2FohWPsy64PHzZSwLafCnch9341dfaYP1Y.jpeg', NULL),
	(13, '/Uploads/upload/hYFkq5FqgjMkdbagVTg1IhtYIbwiYT59Fk7uTTh1.jpeg', NULL),
	(14, '/Uploads/upload/AxNylTk6WG7HrRiAPW4mSfEolHg8l5gC7FvEoQYH.jpeg', NULL),
	(15, '/Uploads/upload/hIIfLYQYRHM4op6d4ZNaoVXuibqB95Ut9dw7SzuW.jpeg', NULL),
	(16, '/Uploads/upload/UCxupECiVoO5fYJuqgetJjos9s03Gy2vHgIzLFCU.jpeg', NULL),
	(17, '/Uploads/upload/IvjCNBWRH6wsjdcq28RclN4eIhci9DdRDBP4dACu.jpeg', NULL),
	(18, '/Uploads/upload/4lbP1KFYebg2OXmdf2BVbInpmZ5y3tNfY25ucnpP.jpeg', NULL),
	(19, '/Uploads/upload/pSBgGkIloq39AnMBBjqlKShcGzgjxTBwlHkNBYhq.jpeg', NULL),
	(20, '/Uploads/upload/BUH14AeXq8qlCNq1qFleZwulgxDtWoxcmUXyj38m.jpeg', NULL),
	(21, '/Uploads/upload/nNin1DO7MjftR1hAj9drNeuwM6WYE7X02RDbV3UZ.jpeg', NULL),
	(22, '/Uploads/upload/I0OgA1LN92Q2PWAWyCvVqllUAlWQOoSkySG4Xz8y.jpeg', NULL),
	(23, '/Uploads/upload/EAM1OkqjUrrWdglQmchGxjM4jK1PuiRkMKBPiaWq.jpeg', NULL),
	(24, '/Uploads/upload/af32u9wQzVREqLPSfKqrggQDJPNMBucgy6dIiMQX.jpeg', NULL),
	(25, '/Uploads/upload/EM02618reV8nQ0SlaOxyVED4C7d3jKMBEEzGANPm.jpeg', NULL),
	(26, '/Uploads/upload/0GTTtIrJ8Hl6pg5mOyhQhczwA9AMxCdlMQfPXEdG.jpeg', NULL),
	(27, '/Uploads/upload/Re8IoVEYb9jqnQpPcz7Y3BG8hFMq58MQ7Yz6NXV6.jpeg', NULL),
	(28, '/Uploads/upload/AsF8UGwdip1XdrGeWYVQHgWV42Zhlp2hSsKP3Kiz.jpeg', NULL),
	(29, '/Uploads/upload/jLO5X2oEPmzqGkMyel4LnpJR5jLeF2xPXFb6l3kA.jpeg', NULL),
	(30, '/Uploads/upload/oYVLNa5I1lDXkQamHAIEa1xPXSZuNQJqDiZxx1n5.jpeg', NULL),
	(31, '/Uploads/upload/QLF2njGaD01UPuvR4y0XmQxaG5fC1D0EwCv43mj2.jpeg', NULL),
	(32, '/Uploads/upload/DnaEQ1lzNVLEQ3cfcYfSOo5e1Qit0hbIMdapWigh.jpeg', NULL),
	(33, '/Uploads/upload/YzcAP3OETKRdheFWCHfPMln2nV8r7Lnj0eKZPDHA.jpeg', NULL),
	(34, '/Uploads/upload/CeXi6K7pccgGezd1kul3EdkWTTOmIuWi5VtvnafV.jpeg', NULL),
	(35, '/Uploads/upload/g9cxWWhe7ElHpNPqLn5M4uFPv7O2efL7ko63GtCS.jpeg', NULL),
	(36, '/Uploads/upload/skXoeSOXHxFYUY7EzHitbZxQ0DkeRZ4okGlIslB4.jpeg', NULL),
	(37, '/Uploads/upload/ppmFifg8oBpRLHymitdKxMODKyPuBpZZvEgbvbe0.jpeg', NULL);
/*!40000 ALTER TABLE `la_picture` ENABLE KEYS */;


-- 导出  表 laravel.la_role 结构
CREATE TABLE IF NOT EXISTS `la_role` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `name` varchar(50) NOT NULL COMMENT '角色名',
  `admin_id` text COMMENT '权限id',
  `status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态1:正常0:隐藏',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '软删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- 正在导出表  laravel.la_role 的数据：~2 rows (大约)
/*!40000 ALTER TABLE `la_role` DISABLE KEYS */;
REPLACE INTO `la_role` (`id`, `name`, `admin_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'fff', '1,8,12,13,2,9,3,10,4,11,14', 0, '2017-07-03 09:34:43', '2017-07-03 09:34:43', NULL),
	(2, 'ddd', '1,8,12,13,2,9,3,10,4,11,14', 1, '2017-07-03 09:34:58', '2017-07-03 10:20:13', NULL);
/*!40000 ALTER TABLE `la_role` ENABLE KEYS */;


-- 导出  表 laravel.la_users 结构
CREATE TABLE IF NOT EXISTS `la_users` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `email` char(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0 保密 1 男 2 女',
  `phone` varchar(11) DEFAULT NULL COMMENT '手机',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '显示状态：1显示0隐藏',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reg_time` timestamp NULL DEFAULT NULL COMMENT '注册时间',
  `last_login` timestamp NULL DEFAULT NULL COMMENT '最后登录时间',
  `last_ip` varchar(15) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  PRIMARY KEY (`user_id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- 正在导出表  laravel.la_users 的数据：~4 rows (大约)
/*!40000 ALTER TABLE `la_users` DISABLE KEYS */;
REPLACE INTO `la_users` (`user_id`, `user_name`, `email`, `password`, `sex`, `phone`, `status`, `deleted_at`, `created_at`, `updated_at`, `reg_time`, `last_login`, `last_ip`) VALUES
	(1, 'admin', '123456@qq.com', '123456', 0, '13402858313', 1, NULL, '2017-07-03 03:31:01', '2017-07-06 06:48:47', NULL, NULL, ''),
	(2, 'user', '123456@qq.com', '123456', 0, '15775733612', 0, NULL, '2017-07-03 03:32:34', '2017-07-03 03:32:34', NULL, NULL, ''),
	(3, 'test', 'test@qq.com', '123456', 0, '15760155482', 0, NULL, '2017-07-03 03:33:12', '2017-07-03 03:33:12', NULL, NULL, ''),
	(4, 'xiaolizi', 'xiaolizi@qq.com', '123456', 0, '12345667', 0, NULL, '2017-07-03 03:34:12', '2017-07-03 03:34:12', NULL, NULL, '');
/*!40000 ALTER TABLE `la_users` ENABLE KEYS */;


-- 导出  表 laravel.la_user_role 结构
CREATE TABLE IF NOT EXISTS `la_user_role` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `role_id` int(50) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户角色表';

-- 正在导出表  laravel.la_user_role 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `la_user_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `la_user_role` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
