# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.200.200 (MySQL 5.7.9)
# Database: social-laravel
# Generation Time: 2017-04-05 09:31:45 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table a_w_time
# ------------------------------------------------------------

DROP TABLE IF EXISTS `a_w_time`;

CREATE TABLE `a_w_time` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleId` int(11) NOT NULL COMMENT '0  不存在',
  `writeId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `see` int(11) NOT NULL COMMENT '什么人可见',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `a_w_time` WRITE;
/*!40000 ALTER TABLE `a_w_time` DISABLE KEYS */;

INSERT INTO `a_w_time` (`id`, `articleId`, `writeId`, `userId`, `time`, `see`)
VALUES
	(1,0,1,5,1,2),
	(2,1,0,5,2,2),
	(3,0,2,5,3,2),
	(4,0,3,5,1491314612,0),
	(5,0,15,5,1491315645,0),
	(6,0,16,5,1491315754,0),
	(7,0,17,5,1491315850,0),
	(8,0,18,5,1491315895,0),
	(9,0,19,5,1491316100,0),
	(10,0,20,5,1491316123,0),
	(11,0,21,5,1491316275,0),
	(12,0,22,5,1491316399,0),
	(13,0,24,5,1491316522,0),
	(14,0,25,5,1491316536,0),
	(15,0,26,5,1491316575,0);

/*!40000 ALTER TABLE `a_w_time` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table album
# ------------------------------------------------------------

DROP TABLE IF EXISTS `album`;

CREATE TABLE `album` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;

INSERT INTO `album` (`id`, `name`, `userId`)
VALUES
	(1,'默认相册',5);

/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table article
# ------------------------------------------------------------

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `userId` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `hasImg` int(11) NOT NULL COMMENT '0无图  1有图',
  `see` tinyint(4) NOT NULL COMMENT '0自己可见 ，1好友可见，2所有人可见',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;

INSERT INTO `article` (`id`, `content`, `title`, `userId`, `time`, `hasImg`, `see`)
VALUES
	(1,'2','gg发大水',5,2,0,2);

/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comment_article
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comment_article`;

CREATE TABLE `comment_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleId` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL COMMENT '0 为根评论',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table comment_write
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comment_write`;

CREATE TABLE `comment_write` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `writeId` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `parent` int(11) NOT NULL COMMENT '0 为根评论',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table friend
# ------------------------------------------------------------

DROP TABLE IF EXISTS `friend`;

CREATE TABLE `friend` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userFromId` int(11) NOT NULL COMMENT '自己的id',
  `userToId` int(11) NOT NULL COMMENT '好友的id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `friend` WRITE;
/*!40000 ALTER TABLE `friend` DISABLE KEYS */;

INSERT INTO `friend` (`id`, `userFromId`, `userToId`)
VALUES
	(1,5,6),
	(2,5,7),
	(3,6,5),
	(4,7,5);

/*!40000 ALTER TABLE `friend` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table image
# ------------------------------------------------------------

DROP TABLE IF EXISTS `image`;

CREATE TABLE `image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `xc` int(11) NOT NULL COMMENT '相册id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table image-article
# ------------------------------------------------------------

DROP TABLE IF EXISTS `image-article`;

CREATE TABLE `image-article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleId` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `image-article` WRITE;
/*!40000 ALTER TABLE `image-article` DISABLE KEYS */;

INSERT INTO `image-article` (`id`, `articleId`, `time`, `name`)
VALUES
	(1,1,1,'image1'),
	(2,1,1,'image2');

/*!40000 ALTER TABLE `image-article` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table image-write
# ------------------------------------------------------------

DROP TABLE IF EXISTS `image-write`;

CREATE TABLE `image-write` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `writeId` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `image-write` WRITE;
/*!40000 ALTER TABLE `image-write` DISABLE KEYS */;

INSERT INTO `image-write` (`id`, `writeId`, `time`, `name`)
VALUES
	(1,1,1,'image1'),
	(2,26,1491316575,'2017-04-04-14-28-08-58e3ad78905aa.png');

/*!40000 ALTER TABLE `image-write` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `name`, `password`, `email`)
VALUES
	(5,'376522507qqcom','1','376522507@qq.com'),
	(6,'123qqcom','1','123@qq.com'),
	(7,'456qqcom','1','456@qq.com');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user-image
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user-image`;

CREATE TABLE `user-image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user-image` WRITE;
/*!40000 ALTER TABLE `user-image` DISABLE KEYS */;

INSERT INTO `user-image` (`id`, `userId`, `name`)
VALUES
	(1,5,'user'),
	(2,6,'user'),
	(3,7,'user');

/*!40000 ALTER TABLE `user-image` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table write
# ------------------------------------------------------------

DROP TABLE IF EXISTS `write`;

CREATE TABLE `write` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `content` varchar(255) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL,
  `zf` text NOT NULL COMMENT '是否转发  0否 ',
  `see` tinyint(2) NOT NULL COMMENT '0自己可见 ，1好友可见，2所有人可见',
  `hasImg` tinyint(1) NOT NULL COMMENT '0 没有上传图片  1有',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `write` WRITE;
/*!40000 ALTER TABLE `write` DISABLE KEYS */;

INSERT INTO `write` (`id`, `userId`, `content`, `time`, `zf`, `see`, `hasImg`)
VALUES
	(1,5,'1',1,'0',2,0),
	(2,5,'3',3,'0',2,0),
	(3,5,'4月4好的测试',1491314612,'0',0,0),
	(15,5,'fasd',1491315645,'0',0,0),
	(16,5,'999',1491315754,'0',0,0),
	(17,5,'呵呵呵呵',1491315850,'0',0,0),
	(18,5,'刚刚刚刚刚',1491315895,'0',0,0),
	(19,5,'沙发上',1491316100,'0',0,0),
	(20,5,'沙发上',1491316123,'0',0,0),
	(21,5,'沙发上hhh',1491316275,'0',0,0),
	(22,5,'沙发上hhh',1491316399,'0',0,1),
	(23,5,'沙发上hhh',1491316430,'0',0,1),
	(24,5,'沙发上hhh',1491316522,'0',0,1),
	(25,5,'沙发上hhh',1491316536,'0',0,1),
	(26,5,'沙发上hhh',1491316575,'0',0,1),
	(27,5,'沙发上hhh',1491316598,'0',0,1);

/*!40000 ALTER TABLE `write` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
