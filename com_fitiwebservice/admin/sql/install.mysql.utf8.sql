DROP TABLE IF EXISTS `#__fitiwebservice`;

CREATE TABLE `#__fitiwebservice` (
  `id` int(11) NOT NULL auto_increment,
  `greeting` varchar(25) NOT NULL,
  `catid` int(11) NOT NULL DEFAULT '0',
  `params` TEXT NOT NULL DEFAULT '',
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__fitiwebservice` (`greeting`) VALUES
	('FitiWebservice!'),
	('Good bye World!');