# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.17)
# Database: social-laravel
# Generation Time: 2017-05-10 10:01:57 +0000
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
	(5,0,3,5,1493728100,2),
	(6,6,0,5,1493728553,2),
	(7,8,0,6,1493899628,2),
	(8,0,4,6,1494384864,2);

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
	(1,'默认相册',5),
	(4,'我的相册',13),
	(5,'我的相册',19),
	(6,'我的相册',20),
	(7,'我的相册',21),
	(8,'我的相册',22),
	(9,'我的相册',23);

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
  `see` tinyint(4) NOT NULL COMMENT '0自己可见 ，1好友可见，2所有人可见',
  `canpl` tinyint(4) NOT NULL,
  `yc` tinyint(4) NOT NULL,
  `wz` varchar(255) DEFAULT '',
  `zan` int(11) NOT NULL COMMENT '赞成',
  `read` int(11) NOT NULL COMMENT '阅读',
  `fandui` int(11) NOT NULL COMMENT '反对',
  `fav` int(11) NOT NULL COMMENT '收藏',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;

INSERT INTO `article` (`id`, `content`, `title`, `userId`, `time`, `see`, `canpl`, `yc`, `wz`, `zan`, `read`, `fandui`, `fav`)
VALUES
	(6,'<p style=\"margin-left: auto;\"><strong>input失去焦点和获得焦点</strong>&nbsp;<br>鼠标在搜索框中点击的时候里面的文字就消失了。&nbsp;<br>我们在做网站的时候经常会用到搜索框的获得焦点和失去焦点的事件，因为懒，每次都去写非常的烦，于是就一劳永逸，遇到类似情况就来调用一下就OK 了 。</p><p style=\"margin-left: auto;\">相关js代码如下：</p><p>12345678910111213141516171819202122232425262728293031323334353637</p><p>input失去焦点和获得焦点jquery焦点事件插件，<br><strong style=\"color: rgb(255, 0, 0);\">鼠标在搜索框中点击的时候里面的文字就消失了</strong>。</p><p style=\"margin-left: auto;\">　　<strong>jquery获取和失去焦点事件</strong>&nbsp;</p><p>1234567891011121314</p>','juqey焦点',5,1493728553,2,0,0,'',0,5,0,0),
	(8,'<p><span style=\"font-size: 14px;\">&nbsp; &nbsp; 《人生三部曲》是高尔基著名</span><a href=\"http://baike.so.com/doc/2461402-2601676.html\" target=\"_blank\">自传体小说</a><span style=\"font-size: 14px;\">三部曲中的第三部，也是高尔基《人生三部曲》之一。其余两部为《童年》、《在人间》。作者描写了他青年时代的生活经历。从这个被真实记述下来的过程中，我们可以看出青少年时代的高尔基对</span><a href=\"http://baike.so.com/doc/3416870-3596296.html\" target=\"_blank\">小市民</a><span style=\"font-size: 14px;\">习气的</span><a href=\"http://baike.so.com/doc/455712-482551.html\" target=\"_blank\">深恶痛绝</a><span style=\"font-size: 14px;\">，对自由的热烈追求，对美好生活的强烈向往，在生活底层与劳苦大众的直接接触，深入社会，接受革命者思想影响和如饥似渴地从书籍中汲取知识养料使他得以成长，从生活底层攀上文化高峰的重要条件。</span><br></p>','读高尔基书有感',6,1493899628,2,0,0,'',1,97,0,1);

/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table article-extra
# ------------------------------------------------------------

DROP TABLE IF EXISTS `article-extra`;

CREATE TABLE `article-extra` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `zan` tinyint(4) NOT NULL,
  `shou` tinyint(4) NOT NULL,
  `fan` tinyint(4) NOT NULL,
  `articleId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table article-zf
# ------------------------------------------------------------

DROP TABLE IF EXISTS `article-zf`;

CREATE TABLE `article-zf` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `z` tinyint(11) NOT NULL COMMENT '赞成',
  `f` tinyint(11) NOT NULL COMMENT '反对',
  `time` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `article-zf` WRITE;
/*!40000 ALTER TABLE `article-zf` DISABLE KEYS */;

INSERT INTO `article-zf` (`id`, `userId`, `z`, `f`, `time`, `articleId`)
VALUES
	(2,5,1,0,1494403102,8);

/*!40000 ALTER TABLE `article-zf` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table chat_not_read
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chat_not_read`;

CREATE TABLE `chat_not_read` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `friendId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `chat_not_read` WRITE;
/*!40000 ALTER TABLE `chat_not_read` DISABLE KEYS */;

INSERT INTO `chat_not_read` (`id`, `userId`, `friendId`)
VALUES
	(3,6,5),
	(4,5,6),
	(5,5,6),
	(6,6,5),
	(7,5,6),
	(8,5,6),
	(9,6,5),
	(10,5,6),
	(11,6,5),
	(12,5,7),
	(13,7,5),
	(14,5,7);

/*!40000 ALTER TABLE `chat_not_read` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table chat_record
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chat_record`;

CREATE TABLE `chat_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `friendId` int(11) NOT NULL,
  `content` varchar(255) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `chat_record` WRITE;
/*!40000 ALTER TABLE `chat_record` DISABLE KEYS */;

INSERT INTO `chat_record` (`id`, `userId`, `friendId`, `content`, `time`)
VALUES
	(1,5,6,'1231231231',1492753298),
	(2,6,5,'fasfdsa',1492753337),
	(3,6,5,'fadsfadsvv555',1492753425),
	(4,5,6,'fasfads',1492753435),
	(5,6,5,'kkk',1492867132),
	(6,6,5,'8888',1492867143),
	(7,5,6,'mini6tfgjj',1492867151),
	(8,6,5,'nini',1492867176),
	(9,5,6,'nk',1492867227),
	(10,7,5,'hjjj',1493819787),
	(11,5,7,'face[馋嘴] ',1493819795),
	(12,7,5,'tretr ',1493896100);

/*!40000 ALTER TABLE `chat_record` ENABLE KEYS */;
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
  `parent` int(11) NOT NULL COMMENT '0 为根评论',
  `subcom` int(11) NOT NULL COMMENT '回复的那一个',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comment_article` WRITE;
/*!40000 ALTER TABLE `comment_article` DISABLE KEYS */;

INSERT INTO `comment_article` (`id`, `articleId`, `comment`, `time`, `userId`, `parent`, `subcom`)
VALUES
	(36,8,'fdas',1494400003,5,0,0);

/*!40000 ALTER TABLE `comment_article` ENABLE KEYS */;
UNLOCK TABLES;


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

LOCK TABLES `comment_write` WRITE;
/*!40000 ALTER TABLE `comment_write` DISABLE KEYS */;

INSERT INTO `comment_write` (`id`, `writeId`, `comment`, `time`, `userId`, `parent`)
VALUES
	(4,3,'图片真不错',1493732654,6,0),
	(5,3,'写的不错',1493732723,7,0),
	(6,3,'美女好看',1494383021,5,0),
	(15,4,'还是remove()好用',1494390572,5,0);

/*!40000 ALTER TABLE `comment_write` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table friend
# ------------------------------------------------------------

DROP TABLE IF EXISTS `friend`;

CREATE TABLE `friend` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL COMMENT '自己的id',
  `friendId` int(11) NOT NULL COMMENT '好友的id',
  `groupId` int(11) NOT NULL COMMENT '分组id',
  `nickname` varchar(255) NOT NULL DEFAULT '' COMMENT '好友备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `friend` WRITE;
/*!40000 ALTER TABLE `friend` DISABLE KEYS */;

INSERT INTO `friend` (`id`, `userId`, `friendId`, `groupId`, `nickname`)
VALUES
	(2,5,7,1,'fd'),
	(4,7,5,4,'678'),
	(5,6,5,3,'123'),
	(6,5,6,1,'请求');

/*!40000 ALTER TABLE `friend` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table friend_request
# ------------------------------------------------------------

DROP TABLE IF EXISTS `friend_request`;

CREATE TABLE `friend_request` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `friendId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0等待 1同意  2拒绝',
  `time` int(11) NOT NULL,
  `actTime` int(11) DEFAULT NULL COMMENT '操作时间',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '附加消息',
  `read` tinyint(4) NOT NULL COMMENT '0未读  1已读',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `friend_request` WRITE;
/*!40000 ALTER TABLE `friend_request` DISABLE KEYS */;

INSERT INTO `friend_request` (`id`, `userId`, `friendId`, `status`, `time`, `actTime`, `remark`, `read`)
VALUES
	(1,6,5,2,1492753298,NULL,'gfds',1),
	(2,5,7,2,1492753298,1492753298,'dd',1),
	(3,6,5,2,1492753298,NULL,'gfds',1),
	(4,5,7,2,1492753298,1492753298,'dd',1),
	(5,6,5,2,1492753298,NULL,'gfds',1),
	(6,5,7,2,1492753298,1492753298,'dd',1),
	(7,6,5,2,1492753298,NULL,'gfds',1),
	(8,5,7,2,1492753298,1492753298,'dd',1),
	(9,6,5,2,1492753298,NULL,'gfds',1),
	(10,5,7,2,1492753298,1492753298,'dd',1),
	(11,6,5,2,1492753298,NULL,'gfds',1),
	(12,5,7,2,1492753298,1492753298,'dd',1),
	(13,6,5,2,1492753298,NULL,'gfds',1);

/*!40000 ALTER TABLE `friend_request` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table friend-group
# ------------------------------------------------------------

DROP TABLE IF EXISTS `friend-group`;

CREATE TABLE `friend-group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `friend-group` WRITE;
/*!40000 ALTER TABLE `friend-group` DISABLE KEYS */;

INSERT INTO `friend-group` (`id`, `name`, `userId`)
VALUES
	(1,'我的好友',5),
	(2,'我的好友',13),
	(3,'我的好友',6),
	(4,'我的好友',7),
	(5,'我的好友',19),
	(6,'我的好友',20),
	(7,'我的好友',21),
	(8,'我的好友',22),
	(9,'我的好友',23);

/*!40000 ALTER TABLE `friend-group` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table image
# ------------------------------------------------------------

DROP TABLE IF EXISTS `image`;

CREATE TABLE `image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '存储名',
  `xc` int(11) NOT NULL COMMENT '相册id',
  `time` int(11) NOT NULL,
  `oriname` varchar(255) NOT NULL DEFAULT '' COMMENT '原始名',
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;

INSERT INTO `image` (`id`, `name`, `xc`, `time`, `oriname`, `userId`)
VALUES
	(1,'2017-04-22-21-21-03-58fb58bfbcef6.jpg',1,1492867263,'a4.jpg',5),
	(2,'2017-05-02-22-01-31-5908913b921f3.jpg',1,1493733691,'582aae9caa3bc.jpg',5);

/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;


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
	(1,1,1,'user'),
	(2,3,1493728100,'2017-05-02-20-28-10-59087b5a84139.jpg'),
	(3,4,1494384864,'');

/*!40000 ALTER TABLE `image-write` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mail`;

CREATE TABLE `mail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `time` int(11) NOT NULL,
  `userId` int(11) NOT NULL COMMENT '发送给谁',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table mail-password
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mail-password`;

CREATE TABLE `mail-password` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(225) NOT NULL DEFAULT '',
  `state` tinyint(4) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table notify
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notify`;

CREATE TABLE `notify` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article_z` tinyint(4) NOT NULL COMMENT '评论了文章',
  `comment_a` tinyint(4) NOT NULL COMMENT '回复我的评论',
  `write_z` tinyint(11) NOT NULL COMMENT '评论了说说',
  `friend` tinyint(11) NOT NULL COMMENT '添加好友',
  `comment_w` tinyint(11) NOT NULL COMMENT '回复说说评论',
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `notify` WRITE;
/*!40000 ALTER TABLE `notify` DISABLE KEYS */;

INSERT INTO `notify` (`id`, `article_z`, `comment_a`, `write_z`, `friend`, `comment_w`, `userId`)
VALUES
	(1,0,0,1,1,0,5),
	(2,0,0,0,0,0,19),
	(3,0,0,0,0,0,20),
	(4,0,0,0,0,0,21),
	(5,0,0,0,0,0,22),
	(6,0,0,0,0,0,23);

/*!40000 ALTER TABLE `notify` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `state` tinyint(4) NOT NULL COMMENT '邮箱验证',
  `online` varchar(30) NOT NULL DEFAULT '' COMMENT 'online在线  hide隐身',
  `sign` varchar(255) DEFAULT '' COMMENT '签名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `name`, `password`, `email`, `state`, `online`, `sign`)
VALUES
	(5,'白加嘿呀嘿','111111','376522507@qq.com',1,'online','发生的发生'),
	(6,'123','111111','123@qq.com',1,'online','他惹他玩儿'),
	(7,'456','111111','456@qq.com',1,'online','不过辅导班地方'),
	(13,'123123','111111','123123@qq.com',1,'online','好热好热'),
	(19,'爱你哦','111111','534@qw.com',0,'offline',''),
	(20,'逆势','111111','dw@qw.com',0,'offline',''),
	(21,'啦啦啦','111111','jhfg@qw.com',0,'offline',''),
	(22,'不拒绝','111111','vfdf@qw.com',0,'offline',''),
	(23,'金葵花个','111111','kfg@qw.com',0,'offline','');

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
	(2,6,'y.jpg'),
	(3,7,'zly.jpg'),
	(4,13,'user'),
	(5,19,'u1.jpg'),
	(6,20,'u2.jpg'),
	(7,21,'u3.jpg'),
	(8,22,'u4.png'),
	(9,23,'u5.jpg');

/*!40000 ALTER TABLE `user-image` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user-setting
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user-setting`;

CREATE TABLE `user-setting` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `tel` varchar(11) DEFAULT '' COMMENT '手机',
  `company` varchar(225) DEFAULT NULL COMMENT '公司',
  `zw` varchar(255) DEFAULT NULL COMMENT '职位',
  `age` int(11) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL COMMENT '大学',
  `sex` tinyint(4) DEFAULT NULL COMMENT '0女  1男',
  `home` varchar(255) DEFAULT NULL COMMENT '家乡',
  `jz` varchar(255) DEFAULT NULL COMMENT '居住地',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user-setting` WRITE;
/*!40000 ALTER TABLE `user-setting` DISABLE KEYS */;

INSERT INTO `user-setting` (`id`, `userId`, `tel`, `company`, `zw`, `age`, `college`, `sex`, `home`, `jz`)
VALUES
	(1,5,'13661657075','够快','php工程师',23,'常熟理工学院',1,'江苏','上海市'),
	(2,13,'',NULL,NULL,NULL,NULL,2,NULL,NULL),
	(3,6,'123','发点啥','fsdfsd',44,'发低烧',2,'发的','发低烧'),
	(4,19,'',NULL,NULL,NULL,NULL,2,NULL,NULL),
	(5,20,'',NULL,NULL,NULL,NULL,2,NULL,NULL),
	(6,21,'',NULL,NULL,NULL,NULL,2,NULL,NULL),
	(7,22,'',NULL,NULL,NULL,NULL,2,NULL,NULL),
	(8,23,'',NULL,NULL,NULL,NULL,2,NULL,NULL);

/*!40000 ALTER TABLE `user-setting` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table visit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `visit`;

CREATE TABLE `visit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `visitId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `visit` WRITE;
/*!40000 ALTER TABLE `visit` DISABLE KEYS */;

INSERT INTO `visit` (`id`, `userId`, `visitId`)
VALUES
	(1,23,5),
	(2,5,5),
	(3,5,5),
	(4,5,5),
	(5,5,5);

/*!40000 ALTER TABLE `visit` ENABLE KEYS */;
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
  `zan` int(11) DEFAULT NULL COMMENT '赞',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `write` WRITE;
/*!40000 ALTER TABLE `write` DISABLE KEYS */;

INSERT INTO `write` (`id`, `userId`, `content`, `time`, `zf`, `see`, `hasImg`, `zan`)
VALUES
	(3,5,'接上一篇实践，绘制出来了六边形（多边形）以后再地图上面，然后把点存下来 判断marker点是否在多边形范围内并且不相邻的两条边不相交，才可以提交。上篇文章已经绘制出来了六边形 基于 porint = [lng,lat] 这个中心点如下图：首先判断中心店 porint是否在编辑后的多边形区域内，高德api可以直接调用下面方法判断不相邻的两条边是否相交然后获取编辑好的多边形每个点的经纬',1493728100,'0',2,1,NULL),
	(4,6,'detach()和remove()一样，也是从DOM中去掉所有匹配的元素。但需要注意的是，这个方法不会把匹配的元素从jQuery对象中删除，因而可以在将来再使用这些匹配的元素。与remove()不同的是，所有绑定的事件、附加的数据都会保留下来。 ',1494384864,'0',2,1,NULL);

/*!40000 ALTER TABLE `write` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table write-zan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `write-zan`;

CREATE TABLE `write-zan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `writeId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL COMMENT '1取消赞',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `write-zan` WRITE;
/*!40000 ALTER TABLE `write-zan` DISABLE KEYS */;

INSERT INTO `write-zan` (`id`, `writeId`, `userId`, `time`, `state`)
VALUES
	(1,1,6,1492867263,0),
	(2,3,7,1492867263,0),
	(3,3,5,1494380090,0),
	(4,4,5,1494384990,0);

/*!40000 ALTER TABLE `write-zan` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
