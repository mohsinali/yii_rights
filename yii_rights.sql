--
-- MySQL 5.5.22
-- Sat, 23 Feb 2013 07:22:42 +0000
--

CREATE TABLE `AuthAssignment` (
   `itemname` varchar(64) not null,
   `userid` varchar(64) not null,
   `bizrule` text,
   `data` text,
   PRIMARY KEY (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES 
('Admin', 'demo', '', 'N;'),
('Admin', '1', '', 'N;'),
('Site.Contact', '1', '', 'N;'),
('Authenticated', '28', '', 'N;'),
('Salon', '29', '', 'N;'),
('Authenticated', '30', '', 'N;');

CREATE TABLE `AuthItem` (
   `name` varchar(64) not null,
   `type` int(11) not null,
   `description` text,
   `bizrule` text,
   `data` text,
   PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES 
('Admin', '2', '', '', 'N;'),
('Authenticated', '2', '', '', 'N;'),
('Guest', '2', '', '', 'N;'),
('Site.Contact', '0', '', '', 'N;'),
('New Task', '1', 'task_description', '', 'N;'),
('Clerk', '2', 'Data entry operator', '', 'N;');

CREATE TABLE `AuthItemChild` (
   `parent` varchar(64) not null,
   `child` varchar(64) not null,
   PRIMARY KEY (`parent`,`child`),
   KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES 
('Authenticated', 'Voucher.Index'),
('Authenticated', 'Voucher.View'),
('Guest', 'Voucher.Index'),
('Guest', 'Voucher.View'),
('Salon', 'Voucher.Create'),
('Salon', 'Voucher.Index'),
('Salon', 'Voucher.View');

CREATE TABLE `Rights` (
   `itemname` varchar(64) not null,
   `type` int(11) not null,
   `weight` int(11) not null,
   PRIMARY KEY (`itemname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- [Table `Rights` is empty]

CREATE TABLE `tbl_migration` (
   `version` varchar(255) not null,
   `apply_time` int(11),
   PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES 
('m000000_000000_base', '1350561211'),
('m121018_111031_create_user_table', '1350562185'),
('m121018_121209_create_country_table', '1350564189'),
('m121018_121620_create_city_table', '1350564189'),
('m121031_104521_create_role_table', '1351686160'),
('m121101_113606_add_column_role_id_city_id', '1351771858'),
('m121102_085249_add_column_profile_image', '1351846481'),
('m121112_110327_drop_role_id_column_from_tbl_user', '1352718315'),
('m121113_114947_create_table_tbl_profile_salon', '1352811364'),
('m121113_131154_create_table_tbl_salon_type', '1352812657'),
('m121114_051943_add_column_user_id_in_tbl_profile_salon', '1352870623');

CREATE TABLE `user` (
   `id` int(11) not null auto_increment,
   `username` varchar(100),
   `first_name` varchar(200) not null,
   `last_name` varchar(200) not null,
   `email` varchar(100) not null,
   `password` varchar(255) not null,
   `city_id` int(11),
   `profile_image` varchar(200),
   PRIMARY KEY (`id`),
   UNIQUE KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=31;

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `city_id`, `profile_image`) VALUES 
('1', 'admin', 'Mohsin', 'Ali', 'ma@yahoo.com', '202cb962ac59075b964b07152d234b70', '1', '2833-product_3.jpg'),
('2', 'demo', 'Ikram', 'Haq', 'ik@yahoo.com', '202cb962ac59075b964b07152d234b70', '2', ''),
('8', 'nm', 'Noman', 'Ahmed', 'nm@yahoo.com', '202cb962ac59075b964b07152d234b70', '3', ''),
('15', 'john', 'John', 'Smith', 'john@yahoo.com', '202cb962ac59075b964b07152d234b70', '4', '2879-right-banner-4.jpg'),
('17', 'new', 'New', 'Password', 'new@yahoo.com', '3d186804534370c3c817db0563f0e461', '4', '765-right-banner-2.jpg'),
('20', 'ma22', 'New', 'Password', 'ma22@yahoo.com', '3d186804534370c3c817db0563f0e461', '4', '1558-'),
('21', 'ma33', 'New', 'Password', 'ma33@yahoo.com', '3d186804534370c3c817db0563f0e461', '3', '7900-'),
('25', 'hello', 'New user', 'last', 'hello@hotmail.com', '3d186804534370c3c817db0563f0e461', '2', '2833-product_3.jpg'),
('28', 'test', 'New', 'User', 'geoff@folloh.com', '4297f44b13955235245b2497399d7a93', '1', '5072-ik_1.jpg'),
('29', 'golden_salon', 'Golden', 'Salon', 'customer1@yahoo.com', '202cb962ac59075b964b07152d234b70', '4', '4748-ik_1.jpg'),
('30', 'test1', 'Test', 'One', 'mail@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '946-face1.jpeg');
