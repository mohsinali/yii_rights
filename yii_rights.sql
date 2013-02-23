--
-- MySQL 5.5.22
-- Sat, 23 Feb 2013 07:07:32 +0000
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
('Voucher.*', '1', '', '', 'N;'),
('Voucher.View', '0', '', '', 'N;'),
('Voucher.Create', '0', '', '', 'N;'),
('Voucher.Update', '0', '', '', 'N;'),
('Voucher.Delete', '0', '', '', 'N;'),
('Voucher.Index', '0', '', '', 'N;'),
('Voucher.Admin', '0', '', '', 'N;'),
('Salon', '2', 'Salon Role', '', 'N;');

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

CREATE TABLE `city` (
   `id` int(11) not null auto_increment,
   `name` varchar(150) not null,
   `country_id` int(11) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;

INSERT INTO `city` (`id`, `name`, `country_id`) VALUES 
('1', 'Karachi', '1'),
('2', 'Lahore', '1'),
('3', 'Beijing', '3'),
('4', 'Kolkata', '2');

CREATE TABLE `country` (
   `id` int(11) not null auto_increment,
   `name` varchar(150) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;

INSERT INTO `country` (`id`, `name`) VALUES 
('1', 'Pakistan'),
('2', 'India'),
('3', 'China'),
('4', 'UK');

CREATE TABLE `profile_salon` (
   `id` int(11) not null auto_increment,
   `salon_name` varchar(200) not null,
   `phone` varchar(100),
   `address1` varchar(255),
   `address2` varchar(255),
   `contact_person` varchar(255),
   `contact_email` varchar(255),
   `salon_type` int(11),
   `salon_picture` varchar(200),
   `business_description` text,
   `services_offered` text,
   `lattitude` decimal(17,15),
   `longitude` decimal(17,15),
   `user_id` int(11),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3;

INSERT INTO `profile_salon` (`id`, `salon_name`, `phone`, `address1`, `address2`, `contact_person`, `contact_email`, `salon_type`, `salon_picture`, `business_description`, `services_offered`, `lattitude`, `longitude`, `user_id`) VALUES 
('1', 'Golden Salon', '321321', 'M.C. Green Town', '', 'Shahid', 'email@yahoo.com', '1', '', 'loren ipos', 'lorem ipos', '24.369852800000000', '73.147852900000000', '25'),
('2', 'Golden Salon', '021326598', 'M.C. 1081', 'Green Town Karachi', 'John Smith', 'info@yahoo.com', '2', '', 'Business Description', 'Services Offered\r\n- Top two', '24.326598700000000', '72.326598700000000', '29');

CREATE TABLE `salon_type` (
   `id` int(11) not null auto_increment,
   `name` varchar(150),
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;

INSERT INTO `salon_type` (`id`, `name`) VALUES 
('1', 'Men'),
('2', 'Women'),
('3', 'Unisex');

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

CREATE TABLE `tbl_role` (
   `id` int(11) not null auto_increment,
   `name` varchar(150) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;

INSERT INTO `tbl_role` (`id`, `name`) VALUES 
('1', 'Salon'),
('2', 'Freelancer'),
('3', 'Authenticated'),
('4', 'test');

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

CREATE TABLE `user_old` (
   `id` int(11) not null auto_increment,
   `username` varchar(100) not null,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;

INSERT INTO `user_old` (`id`, `username`) VALUES 
('1', 'admin'),
('2', 'golden'),
('3', 'freelancer');

CREATE TABLE `voucher` (
   `id` int(11) not null auto_increment,
   `name` varchar(200) not null,
   `discount` int(11) not null,
   `quantity` int(11) not null default '1',
   `validity` date not null,
   `saving` int(11) not null,
   `description` text,
   `conditions` text,
   `is_active` tinyint(4) default '1',
   `user_id` int(11) not null,
   PRIMARY KEY (`id`),
   UNIQUE KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;

INSERT INTO `voucher` (`id`, `name`, `discount`, `quantity`, `validity`, `saving`, `description`, `conditions`, `is_active`, `user_id`) VALUES 
('1', 'Beauty Spa', '50', '20', '2013-01-05', '500', 'Lorem iposum', '- Condition\r\n- Two\r\n- Three', '', '1'),
('2', 'Auto Wheel Voucher', '50', '50', '2013-02-09', '500', 'Lorem iposum', '- Condition\r\n- Two\r\n- Three', '', '29'),
('3', 'Money for Monay', '15', '20', '2012-09-03', '400', 'hkjhljk', 'hoh oiu yyub ', '', '29');
