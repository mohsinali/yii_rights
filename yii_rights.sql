--
-- MySQL 5.5.22
-- Sat, 17 Nov 2012 08:33:53 +0000
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
('Site.Contact', '1', '', 'N;');

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
('New Task', '1', 'task_description', '', 'N;');

CREATE TABLE `AuthItemChild` (
   `parent` varchar(64) not null,
   `child` varchar(64) not null,
   PRIMARY KEY (`parent`,`child`),
   KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- [Table `AuthItemChild` is empty]

CREATE TABLE `Rights` (
   `itemname` varchar(64) not null,
   `type` int(11) not null,
   `weight` int(11) not null,
   PRIMARY KEY (`itemname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- [Table `Rights` is empty]

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=26;

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `city_id`, `profile_image`) VALUES 
('1', 'admin', 'Mohsin', 'Ali', 'ma@yahoo.com', '202cb962ac59075b964b07152d234b70', '1', ''),
('2', 'demo', 'Ikram', 'Haq', 'ik@yahoo.com', '202cb962ac59075b964b07152d234b70', '2', ''),
('8', '', 'Noman', 'Ahmed', 'nm@yahoo.com', '202cb962ac59075b964b07152d234b70', '3', ''),
('15', '', 'John', 'Smith', 'john@yahoo.com', '202cb962ac59075b964b07152d234b70', '4', '2879-right-banner-4.jpg'),
('17', '', 'New', 'Password', 'new@yahoo.com', '3d186804534370c3c817db0563f0e461', '4', '765-right-banner-2.jpg'),
('20', '', 'New', 'Password', 'ma22@yahoo.com', '3d186804534370c3c817db0563f0e461', '4', '1558-'),
('21', '', 'New', 'Password', 'ma33@yahoo.com', '3d186804534370c3c817db0563f0e461', '3', '7900-'),
('25', '', 'New user', 'last', 'hello@hotmail.com', '3d186804534370c3c817db0563f0e461', '2', '2833-product_3.jpg');
