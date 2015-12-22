-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 07, 2011 at 10:43 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `erp_develop_transactions`
--

CREATE TABLE IF NOT EXISTS `erp_develop_transactions` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `erp_develop_transactions`
--

INSERT INTO `erp_develop_transactions` (`id`, `code`, `name_en`, `name_ar`, `notes`) VALUES
(7, '', 'Supplier Payment', '', NULL),
(6, '', 'Purchase Returned', '', NULL),
(5, '', 'Purchase Invoice', '', NULL),
(4, '', 'Receiving Voucher', '', NULL),
(3, '', 'Purchase Order', '', NULL),
(2, '', 'Purchase Quatation', '', NULL),
(1, '', 'Materials Request', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gl_accounts`
--

CREATE TABLE IF NOT EXISTS `gl_accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `slave` binary(1) NOT NULL DEFAULT '0',
  `notes` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `are_canceled` tinyint(4) NOT NULL,
  `canceled_at` datetime NOT NULL,
  `cancel_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=116 ;

--
-- Dumping data for table `gl_accounts`
--

INSERT INTO `gl_accounts` (`id`, `code`, `name`, `position`, `parent_id`, `slave`, `notes`, `created_at`, `create_user`, `updated_at`, `update_user`, `are_canceled`, `canceled_at`, `cancel_user`) VALUES
(57, 'c1', 'BBBBBfff', 3, 0, '0', 'aaa aaa aaaa aaa a aa aaaa', '0000-00-00 00:00:00', 0, '2011-07-01 16:35:46', 1, 0, '0000-00-00 00:00:00', 0),
(74, '', 'CCCCC', 0, 84, '0', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(81, '', 'ZX C', 0, 57, '0', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(84, '', 'نود', 1, 0, '0', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(88, 'qqqq', 'qqqq', 2, 0, '0', 'qqqqqqq', '0000-00-00 00:00:00', 0, '2011-06-17 14:16:31', 1, 0, '0000-00-00 00:00:00', 0),
(91, '', 'DDDDD', 0, 99, '1', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(99, '111', 'sssssss', 0, 81, '0', 'AX ZX AC', '0000-00-00 00:00:00', 0, '2011-06-17 14:16:52', 1, 0, '0000-00-00 00:00:00', 0),
(100, 'd', 'ddddddddddddddddddd', 0, 0, '0', 'dgdsssssssss dssssssssssss', '2011-06-17 13:53:16', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(101, '11111', '111', 0, 0, '0', '111', '2011-06-17 13:59:09', 1, '2011-06-17 14:13:25', 1, 0, '0000-00-00 00:00:00', 0),
(102, 'qq', 'qqq', 0, 0, '0', 'qq', '2011-06-17 13:59:24', 1, '2011-06-17 14:13:45', 1, 0, '0000-00-00 00:00:00', 0),
(103, 'ddddd', 'd', 0, 101, '0', 'ddddddddd', '2011-06-17 13:59:33', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(104, 'sasa', 'aaaaaaaaaa', 0, 102, '0', 'aaaaaaaaaaaaaa', '2011-06-17 14:03:15', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(105, 'oooo', 'ooooooooooo', 0, 100, '0', 'ooooooooooooooooooo', '2011-06-17 14:06:53', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(106, 'yu', 'uuuuuuuuuu', 0, 100, '0', 'uuuuuuuuuuuu', '2011-06-17 14:08:54', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(107, 'dddddddddd', 'dddddddddddddd', 0, 100, '0', 'ddddddddddddddddddddddd', '2011-06-17 14:10:08', 1, '2011-06-30 14:36:51', 1, 0, '0000-00-00 00:00:00', 0),
(108, 'sssssss', 'sss', 0, 107, '0', 's', '2011-06-17 14:10:27', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(109, 'vvvvvvvvvv', 'vvvvvvvvvvvvvvvvvvvvvv', 0, 0, '0', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', '2011-06-17 14:20:05', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(110, '123456', 'ZZZZ XXXXX CCCCC', 0, 0, '0', 'Notes', '2011-06-17 14:20:35', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(111, 'f', 'ffffff', 0, 107, '0', 'f', '2011-06-30 14:36:40', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(112, 'ddddddddd', 'ddddddddddddd', 0, 106, '0', 'ddddddddddddddddd', '2011-07-01 16:25:59', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(113, 'ssss', 'ddddddddddddddddddddddd', 0, 112, '0', 'ddddddddddddddddddddddd', '2011-07-01 16:26:18', 1, '2011-07-01 16:26:37', 1, 0, '0000-00-00 00:00:00', 0),
(114, 'ffffffffff', 'fffffffffffff', 0, 105, '0', 'fffffffffffffffffffffffffffff', '2011-07-01 16:36:22', 1, '2011-07-01 16:36:47', 1, 0, '0000-00-00 00:00:00', 0),
(115, 'tttttttttt', 'tt', 0, 81, '0', 'tttttttttt', '2011-07-07 14:14:40', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gl_currencies`
--

CREATE TABLE IF NOT EXISTS `gl_currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `symbol` varchar(10) NOT NULL,
  `short_name` varchar(10) NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `hundred_unit` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `are_canceled` tinyint(4) NOT NULL,
  `canceled_at` datetime NOT NULL,
  `cancel_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `gl_currencies`
--


-- --------------------------------------------------------

--
-- Table structure for table `gl_currencies_exchange_rates`
--

CREATE TABLE IF NOT EXISTS `gl_currencies_exchange_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_id` int(11) NOT NULL,
  `exchange_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `are_canceled` tinyint(4) NOT NULL,
  `canceled_at` datetime NOT NULL,
  `cancel_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `gl_currencies_exchange_rates`
--


-- --------------------------------------------------------

--
-- Table structure for table `gl_develop_accounts_classes`
--

CREATE TABLE IF NOT EXISTS `gl_develop_accounts_classes` (
  `id` int(11) NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `notes` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gl_develop_accounts_classes`
--

INSERT INTO `gl_develop_accounts_classes` (`id`, `name_en`, `name_ar`, `notes`) VALUES
(1, 'costs', 'المصروفات', NULL),
(2, 'liabilities', 'الخصوم', NULL),
(3, 'assets', 'الاصول', NULL),
(4, 'incomes', 'الايرادات', NULL),
(5, '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE IF NOT EXISTS `inventory_items` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `notes` varchar(200) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `are_canceled` tinyint(4) NOT NULL,
  `canceled_at` datetime NOT NULL,
  `cancel_user` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inventory_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `inventory_items_groups`
--

CREATE TABLE IF NOT EXISTS `inventory_items_groups` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `notes` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `are_canceled` tinyint(4) NOT NULL,
  `canceled_at` datetime NOT NULL,
  `cancel_user` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inventory_items_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `inventory_stocks`
--

CREATE TABLE IF NOT EXISTS `inventory_stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stock_manager` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `are_canceled` tinyint(4) NOT NULL,
  `canceled_at` datetime NOT NULL,
  `cancel_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=60 ;

--
-- Dumping data for table `inventory_stocks`
--

INSERT INTO `inventory_stocks` (`id`, `code`, `name`, `stock_manager`, `address`, `phone`, `mobile`, `fax`, `email`, `notes`, `created_at`, `create_user`, `updated_at`, `update_user`, `are_canceled`, `canceled_at`, `cancel_user`) VALUES
(56, '1', 'w', '', '', '', '', '', '', '', '2011-05-06 14:07:22', 1, '2011-05-06 14:10:25', 1, 0, '2011-05-06 14:10:27', 1),
(58, 'g', 'gggggggggggg', 'ggggggggggggg', 'gggggggggg', '', 'ggggggggggggggggggggggg', 'gggggggggg', 'mansour_2000@yahoo.com', 'gggggggggggggggggg', '2011-05-06 14:13:39', 1, '2011-05-06 17:12:29', 1, 0, '0000-00-00 00:00:00', 0),
(59, 'sd', 'ddddddddddddddddddd', '', '', '', '', '', '', '', '2011-05-06 17:12:36', 1, '0000-00-00 00:00:00', 0, 0, '2011-05-19 12:44:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_units`
--

CREATE TABLE IF NOT EXISTS `inventory_units` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `slave` binary(1) NOT NULL DEFAULT '0',
  `notes` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `are_canceled` tinyint(4) NOT NULL,
  `canceled_at` datetime NOT NULL,
  `cancel_user` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inventory_units`
--


-- --------------------------------------------------------

--
-- Table structure for table `pr_materials_requests`
--

CREATE TABLE IF NOT EXISTS `pr_materials_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `serial_for_user` int(11) NOT NULL,
  `the_date` datetime NOT NULL,
  `are_confirmed` tinyint(4) NOT NULL,
  `confirm_user` int(11) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `are_canceled` tinyint(4) NOT NULL,
  `canceled_at` datetime NOT NULL,
  `cancel_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pr_materials_requests`
--


-- --------------------------------------------------------

--
-- Table structure for table `pr_materials_requests_details`
--

CREATE TABLE IF NOT EXISTS `pr_materials_requests_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) NOT NULL,
  `serial_for_request` tinyint(4) NOT NULL,
  `item_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `quantity` decimal(10,3) NOT NULL,
  `quantity_purchased` decimal(10,3) NOT NULL,
  `notes` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pr_materials_requests_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `pr_purchase_orders`
--

CREATE TABLE IF NOT EXISTS `pr_purchase_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `the_date` datetime NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `serial_for_supplier` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `are_canceled` tinyint(4) NOT NULL,
  `canceled_at` datetime NOT NULL,
  `cancel_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pr_purchase_orders`
--


-- --------------------------------------------------------

--
-- Table structure for table `pr_purchase_orders_details`
--

CREATE TABLE IF NOT EXISTS `pr_purchase_orders_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_id` int(11) NOT NULL,
  `serial_for_po` tinyint(4) NOT NULL,
  `item_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_detail_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `quantity` decimal(10,3) NOT NULL,
  `unit_price` decimal(10,3) NOT NULL,
  `quantity_received` decimal(10,3) NOT NULL,
  `quantity_invoiced` decimal(10,3) NOT NULL,
  `notes` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pr_purchase_orders_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `ums_develop_screens`
--

CREATE TABLE IF NOT EXISTS `ums_develop_screens` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `access_id` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_develop_screens`
--

INSERT INTO `ums_develop_screens` (`id`, `code`, `name_en`, `name_ar`, `notes`, `access_id`, `parent_id`) VALUES
(6, 'ums_users', 'Users', 'المستخدمين', NULL, 1, 4),
(5, 'ums_users_groups', 'User Groups', 'مجموعات المستخدمين', NULL, 1, 4),
(4, 'ums', 'User Management System', 'نظام ادارة المستخدمين', NULL, 1, 0),
(3, 'gl_currencies', 'Currencies', 'العملات', NULL, 1, 1),
(2, 'gl_accounts', 'Gl Accounts', 'حسابات الاستاذ العام', NULL, 1, 1),
(1, 'gl', 'General Ledger', 'الاستاذ العام', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ums_develop_screens_access`
--

CREATE TABLE IF NOT EXISTS `ums_develop_screens_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ums_develop_screens_access`
--

INSERT INTO `ums_develop_screens_access` (`id`, `code`, `name_en`, `name_ar`) VALUES
(1, '', 'public (read, write)', 'عام (قراة وكتابة)'),
(2, '', 'public (read)', 'عام (قراة)'),
(3, '', 'private', 'خاص');

-- --------------------------------------------------------

--
-- Table structure for table `ums_users`
--

CREATE TABLE IF NOT EXISTS `ums_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `notes` varchar(200) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `user_rule_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `are_canceled` tinyint(4) NOT NULL,
  `canceled_at` datetime NOT NULL,
  `cancel_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ums_users`
--

INSERT INTO `ums_users` (`id`, `username`, `password`, `name`, `mobile`, `telephone`, `email`, `address`, `notes`, `user_group_id`, `user_rule_id`, `created_at`, `create_user`, `updated_at`, `update_user`, `are_canceled`, `canceled_at`, `cancel_user`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administartor', '', '', '', '', 'ملاحظات', 289, 209, '2010-09-15 22:02:17', 1, '2011-09-24 13:27:26', 1, 0, '2011-08-26 17:46:05', 1),
(6, 'fdfdfd', 'dasdsa', 'dsdsds', '', 'dsd', '', '', '', 292, 215, '2011-09-24 13:48:13', 1, '2011-09-24 13:55:08', 1, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ums_users_groups`
--

CREATE TABLE IF NOT EXISTS `ums_users_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `are_canceled` tinyint(4) NOT NULL,
  `canceled_at` datetime NOT NULL,
  `cancel_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=295 ;

--
-- Dumping data for table `ums_users_groups`
--

INSERT INTO `ums_users_groups` (`id`, `code`, `name`, `notes`, `created_at`, `create_user`, `updated_at`, `update_user`, `are_canceled`, `canceled_at`, `cancel_user`) VALUES
(216, 's', 'ddddddddda', 'من هذة المجموعة ترع كل شئ عن البرنامج', '2011-03-19 12:04:43', 1, '2011-06-30 16:18:23', 1, 1, '2011-05-20 16:04:33', 1),
(289, 'a', 'ssssssssssss', 'dddddddddddd', '2011-05-19 13:33:55', 1, '2011-06-30 16:13:53', 1, 0, '2011-05-20 16:04:20', 1),
(292, 'sssssss', 'saaaaaaaa', 'ssssss', '2011-05-19 14:04:35', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(293, 'fffffffff', 'fffffffffffffff', 'fffffffffffffff', '2011-05-19 14:23:47', 1, '2011-07-07 18:05:52', 1, 1, '2011-07-07 18:06:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ums_users_groups_screens_privielges`
--

CREATE TABLE IF NOT EXISTS `ums_users_groups_screens_privielges` (
  `user_group_id` int(11) NOT NULL,
  `screen_code` varchar(50) NOT NULL,
  `view` bit(1) NOT NULL,
  `add` bit(1) NOT NULL,
  `edit` bit(1) NOT NULL,
  `delete` bit(1) NOT NULL,
  `cancel` bit(1) NOT NULL,
  PRIMARY KEY (`user_group_id`,`screen_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_users_groups_screens_privielges`
--

INSERT INTO `ums_users_groups_screens_privielges` (`user_group_id`, `screen_code`, `view`, `add`, `edit`, `delete`, `cancel`) VALUES
(216, 'ums_users', b'1', b'1', b'1', b'1', b'0'),
(216, 'ums_users_groups', b'1', b'1', b'1', b'1', b'0'),
(216, 'gl_currencies', b'1', b'1', b'1', b'1', b'0'),
(216, 'gl_accounts', b'1', b'1', b'1', b'1', b'0'),
(289, 'ums_users', b'1', b'0', b'1', b'1', b'0'),
(289, 'ums_users_groups', b'1', b'1', b'0', b'0', b'0'),
(289, 'gl_currencies', b'1', b'1', b'1', b'1', b'1'),
(289, 'gl_accounts', b'1', b'0', b'0', b'0', b'1'),
(292, 'ums_users', b'1', b'1', b'0', b'1', b'0'),
(292, 'ums_users_groups', b'0', b'0', b'0', b'0', b'0'),
(292, 'gl_currencies', b'1', b'1', b'0', b'0', b'0'),
(292, 'gl_accounts', b'1', b'0', b'1', b'0', b'0'),
(293, 'ums_users', b'1', b'0', b'0', b'0', b'1'),
(293, 'ums_users_groups', b'1', b'0', b'1', b'0', b'1'),
(293, 'gl_currencies', b'1', b'0', b'0', b'0', b'1'),
(293, 'gl_accounts', b'1', b'0', b'0', b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `ums_users_rules`
--

CREATE TABLE IF NOT EXISTS `ums_users_rules` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `notes` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `are_canceled` tinyint(4) NOT NULL,
  `canceled_at` datetime NOT NULL,
  `cancel_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=218 ;

--
-- Dumping data for table `ums_users_rules`
--

INSERT INTO `ums_users_rules` (`id`, `code`, `name`, `position`, `parent_id`, `notes`, `created_at`, `create_user`, `updated_at`, `update_user`, `are_canceled`, `canceled_at`, `cancel_user`) VALUES
(209, 'sasa', 'sasssads', 0, 0, 'adasdsadc sasassssssssss', '2011-08-13 17:33:09', 1, '2011-08-13 17:36:16', 1, 0, '0000-00-00 00:00:00', 0),
(215, 'dddddddd', 'ddddddddddddd', 0, 209, 'ddddddddddd', '2011-08-13 21:58:22', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(216, 'ddd', 'ddddddd', 0, 215, 'dddddd', '2011-08-13 21:58:45', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(217, 'rtrtr', 'trtrtr', 0, 216, 'trtr', '2011-09-01 16:39:04', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);
