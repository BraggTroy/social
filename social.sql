/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : social-laravel

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-05-20 17:11:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for album
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO `album` VALUES ('1', '默认相册', '5');
INSERT INTO `album` VALUES ('4', '我的相册', '13');
INSERT INTO `album` VALUES ('5', '我的相册', '19');
INSERT INTO `album` VALUES ('6', '我的相册', '20');
INSERT INTO `album` VALUES ('7', '我的相册', '21');
INSERT INTO `album` VALUES ('8', '我的相册', '22');
INSERT INTO `album` VALUES ('9', '我的相册', '23');

-- ----------------------------
-- Table structure for article
-- ----------------------------
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
  `state` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('6', '<p style=\"margin-left: auto;\"><strong>input失去焦点和获得焦点</strong>&nbsp;<br>鼠标在搜索框中点击的时候里面的文字就消失了。&nbsp;<br>我们在做网站的时候经常会用到搜索框的获得焦点和失去焦点的事件，因为懒，每次都去写非常的烦，于是就一劳永逸，遇到类似情况就来调用一下就OK 了 。</p><p style=\"margin-left: auto;\">相关js代码如下：</p><p>12345678910111213141516171819202122232425262728293031323334353637</p><p>input失去焦点和获得焦点jquery焦点事件插件，<br><strong style=\"color: rgb(255, 0, 0);\">鼠标在搜索框中点击的时候里面的文字就消失了</strong>。</p><p style=\"margin-left: auto;\">　　<strong>jquery获取和失去焦点事件</strong>&nbsp;</p><p>1234567891011121314</p>', 'juqey焦点', '5', '1493728553', '2', '0', '0', '', '1', '33', '0', '0', '0');
INSERT INTO `article` VALUES ('8', '<p><span style=\"font-size: 14px;\">&nbsp; &nbsp; 《人生三部曲》是高尔基著名</span><a href=\"http://baike.so.com/doc/2461402-2601676.html\" target=\"_blank\">自传体小说</a><span style=\"font-size: 14px;\">三部曲中的第三部，也是高尔基《人生三部曲》之一。其余两部为《童年》、《在人间》。作者描写了他青年时代的生活经历。从这个被真实记述下来的过程中，我们可以看出青少年时代的高尔基对</span><a href=\"http://baike.so.com/doc/3416870-3596296.html\" target=\"_blank\">小市民</a><span style=\"font-size: 14px;\">习气的</span><a href=\"http://baike.so.com/doc/455712-482551.html\" target=\"_blank\">深恶痛绝</a><span style=\"font-size: 14px;\">，对自由的热烈追求，对美好生活的强烈向往，在生活底层与劳苦大众的直接接触，深入社会，接受革命者思想影响和如饥似渴地从书籍中汲取知识养料使他得以成长，从生活底层攀上文化高峰的重要条件。</span><br></p>', '读高尔基书有感', '6', '1493899628', '2', '0', '0', '', '1', '107', '0', '1', '0');

-- ----------------------------
-- Table structure for article-extra
-- ----------------------------
DROP TABLE IF EXISTS `article-extra`;
CREATE TABLE `article-extra` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `zan` tinyint(4) NOT NULL,
  `shou` tinyint(4) NOT NULL,
  `fan` tinyint(4) NOT NULL,
  `articleId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article-extra
-- ----------------------------

-- ----------------------------
-- Table structure for article-zf
-- ----------------------------
DROP TABLE IF EXISTS `article-zf`;
CREATE TABLE `article-zf` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `z` tinyint(11) NOT NULL COMMENT '赞成',
  `f` tinyint(11) NOT NULL COMMENT '反对',
  `time` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article-zf
-- ----------------------------
INSERT INTO `article-zf` VALUES ('2', '5', '1', '0', '1494403102', '8');
INSERT INTO `article-zf` VALUES ('4', '5', '1', '0', '1494472394', '6');

-- ----------------------------
-- Table structure for a_w_time
-- ----------------------------
DROP TABLE IF EXISTS `a_w_time`;
CREATE TABLE `a_w_time` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleId` int(11) NOT NULL COMMENT '0  不存在',
  `writeId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `see` int(11) NOT NULL COMMENT '什么人可见',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of a_w_time
-- ----------------------------
INSERT INTO `a_w_time` VALUES ('5', '0', '3', '5', '1493728100', '2');
INSERT INTO `a_w_time` VALUES ('6', '6', '0', '5', '1493728553', '2');
INSERT INTO `a_w_time` VALUES ('7', '8', '0', '6', '1493899628', '2');
INSERT INTO `a_w_time` VALUES ('8', '0', '4', '6', '1494384864', '2');
INSERT INTO `a_w_time` VALUES ('9', '0', '5', '5', '1495247903', '0');

-- ----------------------------
-- Table structure for chat_not_read
-- ----------------------------
DROP TABLE IF EXISTS `chat_not_read`;
CREATE TABLE `chat_not_read` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `friendId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chat_not_read
-- ----------------------------
INSERT INTO `chat_not_read` VALUES ('3', '6', '5');
INSERT INTO `chat_not_read` VALUES ('4', '5', '6');
INSERT INTO `chat_not_read` VALUES ('5', '5', '6');
INSERT INTO `chat_not_read` VALUES ('6', '6', '5');
INSERT INTO `chat_not_read` VALUES ('7', '5', '6');
INSERT INTO `chat_not_read` VALUES ('8', '5', '6');
INSERT INTO `chat_not_read` VALUES ('9', '6', '5');
INSERT INTO `chat_not_read` VALUES ('10', '5', '6');
INSERT INTO `chat_not_read` VALUES ('11', '6', '5');
INSERT INTO `chat_not_read` VALUES ('12', '5', '7');
INSERT INTO `chat_not_read` VALUES ('13', '7', '5');
INSERT INTO `chat_not_read` VALUES ('14', '5', '7');
INSERT INTO `chat_not_read` VALUES ('15', '5', '7');
INSERT INTO `chat_not_read` VALUES ('16', '5', '7');
INSERT INTO `chat_not_read` VALUES ('17', '7', '5');
INSERT INTO `chat_not_read` VALUES ('18', '20', '5');
INSERT INTO `chat_not_read` VALUES ('19', '5', '20');
INSERT INTO `chat_not_read` VALUES ('20', '5', '20');
INSERT INTO `chat_not_read` VALUES ('21', '20', '5');
INSERT INTO `chat_not_read` VALUES ('22', '20', '5');
INSERT INTO `chat_not_read` VALUES ('23', '20', '5');
INSERT INTO `chat_not_read` VALUES ('24', '5', '6');
INSERT INTO `chat_not_read` VALUES ('25', '5', '6');
INSERT INTO `chat_not_read` VALUES ('26', '5', '6');
INSERT INTO `chat_not_read` VALUES ('27', '5', '6');
INSERT INTO `chat_not_read` VALUES ('28', '6', '5');
INSERT INTO `chat_not_read` VALUES ('29', '5', '6');
INSERT INTO `chat_not_read` VALUES ('30', '6', '5');
INSERT INTO `chat_not_read` VALUES ('31', '5', '6');

-- ----------------------------
-- Table structure for chat_record
-- ----------------------------
DROP TABLE IF EXISTS `chat_record`;
CREATE TABLE `chat_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `friendId` int(11) NOT NULL,
  `content` varchar(255) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chat_record
-- ----------------------------
INSERT INTO `chat_record` VALUES ('1', '5', '6', '1231231231', '1492753298');
INSERT INTO `chat_record` VALUES ('2', '6', '5', 'fasfdsa', '1492753337');
INSERT INTO `chat_record` VALUES ('3', '6', '5', 'fadsfadsvv555', '1492753425');
INSERT INTO `chat_record` VALUES ('4', '5', '6', 'fasfads', '1492753435');
INSERT INTO `chat_record` VALUES ('5', '6', '5', 'kkk', '1492867132');
INSERT INTO `chat_record` VALUES ('6', '6', '5', '8888', '1492867143');
INSERT INTO `chat_record` VALUES ('7', '5', '6', 'mini6tfgjj', '1492867151');
INSERT INTO `chat_record` VALUES ('8', '6', '5', 'nini', '1492867176');
INSERT INTO `chat_record` VALUES ('9', '5', '6', 'nk', '1492867227');
INSERT INTO `chat_record` VALUES ('10', '7', '5', 'hjjj', '1493819787');
INSERT INTO `chat_record` VALUES ('11', '5', '7', 'face[馋嘴] ', '1493819795');
INSERT INTO `chat_record` VALUES ('12', '7', '5', 'tretr ', '1493896100');
INSERT INTO `chat_record` VALUES ('13', '7', '5', 'fads', '1494749780');
INSERT INTO `chat_record` VALUES ('14', '7', '5', 'rwerew', '1494749821');
INSERT INTO `chat_record` VALUES ('15', '5', '7', '哈哈哈', '1494749826');
INSERT INTO `chat_record` VALUES ('16', '5', '20', '今天天气不错啊', '1495099448');
INSERT INTO `chat_record` VALUES ('17', '20', '5', 'face[黑线] ', '1495099464');
INSERT INTO `chat_record` VALUES ('18', '20', '5', '还可以啊', '1495099468');
INSERT INTO `chat_record` VALUES ('19', '5', '20', '方法\n', '1495101099');
INSERT INTO `chat_record` VALUES ('20', '5', '20', '[pre class=layui-code]的发生的[/pre]', '1495101301');
INSERT INTO `chat_record` VALUES ('21', '5', '20', '[pre class=layui-code]$a=rando[/pre]', '1495101331');
INSERT INTO `chat_record` VALUES ('22', '6', '5', 'fds', '1495239387');
INSERT INTO `chat_record` VALUES ('23', '6', '5', 'fds', '1495239395');
INSERT INTO `chat_record` VALUES ('24', '6', '5', 'face[熊猫] ', '1495242632');
INSERT INTO `chat_record` VALUES ('25', '6', '5', '32', '1495257336');
INSERT INTO `chat_record` VALUES ('26', '5', '6', 'face[熊猫] face[抓狂] ', '1495257342');
INSERT INTO `chat_record` VALUES ('27', '6', '5', 'dingsing', '1495257392');
INSERT INTO `chat_record` VALUES ('28', '5', '6', 'face[衰] ', '1495257400');
INSERT INTO `chat_record` VALUES ('29', '6', '5', 'face[兔子] ', '1495257449');

-- ----------------------------
-- Table structure for comment_article
-- ----------------------------
DROP TABLE IF EXISTS `comment_article`;
CREATE TABLE `comment_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleId` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `parent` int(11) NOT NULL COMMENT '0 为根评论',
  `subcom` int(11) NOT NULL COMMENT '回复的那一个',
  `state` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment_article
-- ----------------------------
INSERT INTO `comment_article` VALUES ('36', '8', 'fdas', '1494400003', '5', '0', '0', '0');
INSERT INTO `comment_article` VALUES ('37', '6', '冯绍峰官方', '1494472002', '5', '0', '0', '0');
INSERT INTO `comment_article` VALUES ('38', '6', '1', '1494472067', '5', '37', '37', '0');
INSERT INTO `comment_article` VALUES ('39', '8', '个人', '1494749622', '5', '0', '0', '0');
INSERT INTO `comment_article` VALUES ('40', '6', '范德萨', '1495192199', '5', '0', '0', '0');
INSERT INTO `comment_article` VALUES ('41', '6', '666', '1495245492', '6', '40', '40', '0');
INSERT INTO `comment_article` VALUES ('42', '6', '666', '1495245505', '6', '40', '40', '0');
INSERT INTO `comment_article` VALUES ('43', '6', '555', '1495245573', '6', '40', '40', '0');
INSERT INTO `comment_article` VALUES ('44', '6', '666', '1495245607', '6', '40', '40', '0');

-- ----------------------------
-- Table structure for comment_write
-- ----------------------------
DROP TABLE IF EXISTS `comment_write`;
CREATE TABLE `comment_write` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `writeId` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `parent` int(11) NOT NULL COMMENT '0 为根评论',
  `state` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment_write
-- ----------------------------
INSERT INTO `comment_write` VALUES ('4', '3', '图片真不错', '1493732654', '6', '0', '0');
INSERT INTO `comment_write` VALUES ('5', '3', '写的不错', '1493732723', '7', '0', '0');
INSERT INTO `comment_write` VALUES ('6', '3', '美女好看', '1494383021', '5', '0', '0');
INSERT INTO `comment_write` VALUES ('15', '4', '还是remove()好用', '1494390572', '5', '0', '0');
INSERT INTO `comment_write` VALUES ('20', '4', 'r', '1494494102', '5', '0', '0');
INSERT INTO `comment_write` VALUES ('21', '4', '见客户', '1495239590', '5', '0', '0');
INSERT INTO `comment_write` VALUES ('22', '3', 'hjk', '1495243185', '5', '0', '0');
INSERT INTO `comment_write` VALUES ('23', '3', '321', '1495243340', '5', '22', '0');
INSERT INTO `comment_write` VALUES ('24', '3', '666', '1495243622', '6', '23', '0');

-- ----------------------------
-- Table structure for friend
-- ----------------------------
DROP TABLE IF EXISTS `friend`;
CREATE TABLE `friend` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL COMMENT '自己的id',
  `friendId` int(11) NOT NULL COMMENT '好友的id',
  `groupId` int(11) NOT NULL COMMENT '分组id',
  `nickname` varchar(255) NOT NULL DEFAULT '' COMMENT '好友备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friend
-- ----------------------------
INSERT INTO `friend` VALUES ('2', '5', '7', '1', 'fd');
INSERT INTO `friend` VALUES ('4', '7', '5', '4', '678');
INSERT INTO `friend` VALUES ('5', '6', '5', '3', '123');
INSERT INTO `friend` VALUES ('6', '5', '6', '1', '请求');
INSERT INTO `friend` VALUES ('9', '5', '23', '1', '');
INSERT INTO `friend` VALUES ('10', '23', '5', '9', '');
INSERT INTO `friend` VALUES ('11', '5', '20', '1', '');
INSERT INTO `friend` VALUES ('12', '20', '5', '6', '');

-- ----------------------------
-- Table structure for friend-group
-- ----------------------------
DROP TABLE IF EXISTS `friend-group`;
CREATE TABLE `friend-group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friend-group
-- ----------------------------
INSERT INTO `friend-group` VALUES ('1', '我的好友', '5');
INSERT INTO `friend-group` VALUES ('2', '我的好友', '13');
INSERT INTO `friend-group` VALUES ('3', '我的好友', '6');
INSERT INTO `friend-group` VALUES ('4', '我的好友', '7');
INSERT INTO `friend-group` VALUES ('5', '我的好友', '19');
INSERT INTO `friend-group` VALUES ('6', '我的好友', '20');
INSERT INTO `friend-group` VALUES ('7', '我的好友', '21');
INSERT INTO `friend-group` VALUES ('8', '我的好友', '22');
INSERT INTO `friend-group` VALUES ('9', '我的好友', '23');
INSERT INTO `friend-group` VALUES ('10', '蛋蛋', '5');

-- ----------------------------
-- Table structure for friend_request
-- ----------------------------
DROP TABLE IF EXISTS `friend_request`;
CREATE TABLE `friend_request` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `friendId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0等待 1同意  2拒绝',
  `time` int(11) NOT NULL,
  `actTime` int(11) DEFAULT NULL COMMENT '操作时间',
  `remark` varchar(255) DEFAULT '' COMMENT '附加消息',
  `read` tinyint(4) NOT NULL COMMENT '0未读  1已读',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friend_request
-- ----------------------------
INSERT INTO `friend_request` VALUES ('1', '23', '5', '1', '1492753298', '1494489457', 'gfds', '1');
INSERT INTO `friend_request` VALUES ('2', '5', '7', '2', '1492753298', '1492753298', 'dd', '1');
INSERT INTO `friend_request` VALUES ('15', '5', '22', '0', '1494475574', null, 'fr', '0');
INSERT INTO `friend_request` VALUES ('16', '20', '5', '1', '1495099385', '1495099406', 'reqw', '1');
INSERT INTO `friend_request` VALUES ('17', '19', '5', '0', '1495115163', null, '5432', '1');

-- ----------------------------
-- Table structure for image
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '存储名',
  `xc` int(11) NOT NULL COMMENT '相册id',
  `time` int(11) NOT NULL,
  `oriname` varchar(255) NOT NULL DEFAULT '' COMMENT '原始名',
  `userId` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image
-- ----------------------------
INSERT INTO `image` VALUES ('1', '2017-04-22-21-21-03-58fb58bfbcef6.jpg', '1', '1492867263', 'a4.jpg', '5', '0');
INSERT INTO `image` VALUES ('2', '2017-05-02-22-01-31-5908913b921f3.jpg', '1', '1493733691', '582aae9caa3bc.jpg', '5', '0');
INSERT INTO `image` VALUES ('3', '2017-05-20-13-27-15-591fd3b334511.jpg', '1', '1495258035', 'studio_0004.jpg', '5', '0');
INSERT INTO `image` VALUES ('4', '2017-05-20-13-27-16-591fd3b48ae5b.jpg', '1', '1495258036', 'studio_0005.jpg', '5', '0');

-- ----------------------------
-- Table structure for image-article
-- ----------------------------
DROP TABLE IF EXISTS `image-article`;
CREATE TABLE `image-article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleId` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image-article
-- ----------------------------
INSERT INTO `image-article` VALUES ('1', '1', '1', 'image1');
INSERT INTO `image-article` VALUES ('2', '1', '1', 'image2');

-- ----------------------------
-- Table structure for image-write
-- ----------------------------
DROP TABLE IF EXISTS `image-write`;
CREATE TABLE `image-write` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `writeId` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image-write
-- ----------------------------
INSERT INTO `image-write` VALUES ('1', '1', '1', 'user');
INSERT INTO `image-write` VALUES ('2', '3', '1493728100', '2017-05-02-20-28-10-59087b5a84139.jpg');
INSERT INTO `image-write` VALUES ('3', '4', '1494384864', '');
INSERT INTO `image-write` VALUES ('4', '5', '1495247903', '');

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `acterId` int(11) NOT NULL,
  `content` varchar(255) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL,
  `lianjie` varchar(500) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL COMMENT '0唯独1已读',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES ('1', '5', '6', '评论了你的说说', '1494494102', '/write/sf/3', '0');
INSERT INTO `log` VALUES ('2', '5', '23', '评论了你的说说', '1494494102', '/write/sf/4', '0');
INSERT INTO `log` VALUES ('3', '6', '5', '点赞了你的说说', '1495162607', '/write/sf/3', '0');
INSERT INTO `log` VALUES ('4', '7', '5', '取消了点赞', '1495162609', '/write/sf/3', '0');
INSERT INTO `log` VALUES ('5', '5', '5', '点赞了你的文章', '1495162609', '/show/6', '0');
INSERT INTO `log` VALUES ('6', '5', '5', '评论了你的文章', '1495192199', '/show/6', '0');
INSERT INTO `log` VALUES ('7', '6', '5', '评论了你的说说', '1495239591', '/write/sf/4', '0');
INSERT INTO `log` VALUES ('8', '6', '5', '点赞了你的说说', '1495239595', '/write/sf/4', '0');
INSERT INTO `log` VALUES ('9', '5', '5', '评论了你的说说', '1495243185', '/write/sf/3', '0');
INSERT INTO `log` VALUES ('10', '5', '5', '点赞了你的说说', '1495243256', '/write/sf/3', '0');
INSERT INTO `log` VALUES ('11', '5', '5', '评论了你的说说', '1495243341', '/write/sf/3', '0');
INSERT INTO `log` VALUES ('12', '5', '6', '评论了你的说说', '1495243623', '/write/sf/3', '0');
INSERT INTO `log` VALUES ('13', '5', '6', '评论了你的文章', '1495245608', '/show/6', '0');
INSERT INTO `log` VALUES ('14', '5', '5', '点赞了你的说说', '1495247912', '/write/sf/5', '0');

-- ----------------------------
-- Table structure for mail
-- ----------------------------
DROP TABLE IF EXISTS `mail`;
CREATE TABLE `mail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `time` int(11) NOT NULL,
  `userId` int(11) NOT NULL COMMENT '发送给谁',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mail
-- ----------------------------

-- ----------------------------
-- Table structure for mail-password
-- ----------------------------
DROP TABLE IF EXISTS `mail-password`;
CREATE TABLE `mail-password` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(225) NOT NULL DEFAULT '',
  `state` tinyint(4) NOT NULL COMMENT '0未激活1已激活2已失效',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mail-password
-- ----------------------------
INSERT INTO `mail-password` VALUES ('14', '376522507@qq.com', '1', '1494469160');
INSERT INTO `mail-password` VALUES ('15', '376522507@qq.com', '1', '1495200144');
INSERT INTO `mail-password` VALUES ('16', '376522507@qq.com', '2', '1495207608');
INSERT INTO `mail-password` VALUES ('17', '376522507@qq.com', '0', '1495239981');

-- ----------------------------
-- Table structure for notify
-- ----------------------------
DROP TABLE IF EXISTS `notify`;
CREATE TABLE `notify` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `care_f` tinyint(4) NOT NULL COMMENT '评论了文章',
  `comment_a` tinyint(4) NOT NULL COMMENT '回复我的评论',
  `write_z` tinyint(11) NOT NULL COMMENT '评论了说说',
  `friend` tinyint(11) NOT NULL COMMENT '添加好友',
  `comment_w` tinyint(11) NOT NULL COMMENT '回复说说评论',
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notify
-- ----------------------------
INSERT INTO `notify` VALUES ('1', '1', '0', '1', '1', '1', '5');
INSERT INTO `notify` VALUES ('2', '0', '0', '0', '0', '0', '19');
INSERT INTO `notify` VALUES ('3', '0', '0', '0', '0', '0', '20');
INSERT INTO `notify` VALUES ('4', '0', '0', '0', '0', '0', '21');
INSERT INTO `notify` VALUES ('5', '0', '0', '0', '0', '0', '22');
INSERT INTO `notify` VALUES ('6', '0', '0', '0', '0', '0', '23');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `state` tinyint(4) NOT NULL COMMENT '邮箱验证',
  `online` varchar(30) NOT NULL DEFAULT '' COMMENT 'online在线  hide隐身',
  `sign` varchar(255) DEFAULT '' COMMENT '签名',
  `statee` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('5', '白加嘿呀嘿', '111111', '376522507@qq.com', '1', 'online', '发生的发生', '0');
INSERT INTO `user` VALUES ('6', '123', '111111', '123@qq.com', '1', 'online', '他惹他玩儿', '0');
INSERT INTO `user` VALUES ('7', '456', '111111', '456@qq.com', '1', 'online', '不过辅导班地方', '0');
INSERT INTO `user` VALUES ('13', '123123', '111111', '123123@qq.com', '1', 'online', '好热好热', '0');
INSERT INTO `user` VALUES ('19', '爱你哦', '111111', '534@qw.com', '0', 'offline', '', '0');
INSERT INTO `user` VALUES ('20', '逆势', '111111', 'dw@qw.com', '0', 'offline', '', '0');
INSERT INTO `user` VALUES ('21', '啦啦啦', '111111', 'jhfg@qw.com', '0', 'offline', '', '0');
INSERT INTO `user` VALUES ('22', '不拒绝', '111111', 'vfdf@qw.com', '0', 'offline', '', '0');
INSERT INTO `user` VALUES ('23', '金葵花个', '111111', 'kfg@qw.com', '0', 'offline', '', '0');

-- ----------------------------
-- Table structure for user-image
-- ----------------------------
DROP TABLE IF EXISTS `user-image`;
CREATE TABLE `user-image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user-image
-- ----------------------------
INSERT INTO `user-image` VALUES ('1', '5', 'user');
INSERT INTO `user-image` VALUES ('2', '6', 'y.jpg');
INSERT INTO `user-image` VALUES ('3', '7', 'zly.jpg');
INSERT INTO `user-image` VALUES ('4', '13', 'user');
INSERT INTO `user-image` VALUES ('5', '19', 'u1.jpg');
INSERT INTO `user-image` VALUES ('6', '20', 'u2.jpg');
INSERT INTO `user-image` VALUES ('7', '21', 'u3.jpg');
INSERT INTO `user-image` VALUES ('8', '22', 'u4.png');
INSERT INTO `user-image` VALUES ('9', '23', 'u5.jpg');

-- ----------------------------
-- Table structure for user-setting
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user-setting
-- ----------------------------
INSERT INTO `user-setting` VALUES ('1', '5', '13661657075', '够快', 'php工程师', '23', '常熟理工学院', '1', '江苏', '上海市');
INSERT INTO `user-setting` VALUES ('2', '13', '', null, null, null, null, '2', null, null);
INSERT INTO `user-setting` VALUES ('3', '6', '123', '发点啥', 'fsdfsd', '44', '发低烧', '2', '发的', '发低烧');
INSERT INTO `user-setting` VALUES ('4', '19', '', null, null, null, null, '2', null, null);
INSERT INTO `user-setting` VALUES ('5', '20', '', null, null, null, null, '2', null, null);
INSERT INTO `user-setting` VALUES ('6', '21', '', null, null, null, null, '2', null, null);
INSERT INTO `user-setting` VALUES ('7', '22', '', null, null, null, null, '2', null, null);
INSERT INTO `user-setting` VALUES ('8', '23', '', null, null, null, null, '2', null, null);

-- ----------------------------
-- Table structure for visit
-- ----------------------------
DROP TABLE IF EXISTS `visit`;
CREATE TABLE `visit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `visitId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of visit
-- ----------------------------
INSERT INTO `visit` VALUES ('1', '23', '5');
INSERT INTO `visit` VALUES ('2', '5', '5');
INSERT INTO `visit` VALUES ('3', '5', '5');
INSERT INTO `visit` VALUES ('4', '5', '5');
INSERT INTO `visit` VALUES ('5', '5', '5');
INSERT INTO `visit` VALUES ('6', '22', '5');
INSERT INTO `visit` VALUES ('7', '22', '5');
INSERT INTO `visit` VALUES ('8', '22', '5');
INSERT INTO `visit` VALUES ('9', '22', '5');
INSERT INTO `visit` VALUES ('10', '22', '5');
INSERT INTO `visit` VALUES ('11', '22', '5');
INSERT INTO `visit` VALUES ('12', '22', '5');
INSERT INTO `visit` VALUES ('13', '22', '5');
INSERT INTO `visit` VALUES ('14', '22', '5');
INSERT INTO `visit` VALUES ('15', '22', '5');
INSERT INTO `visit` VALUES ('16', '22', '5');
INSERT INTO `visit` VALUES ('17', '5', '5');
INSERT INTO `visit` VALUES ('18', '5', '5');
INSERT INTO `visit` VALUES ('19', '22', '5');
INSERT INTO `visit` VALUES ('20', '22', '5');
INSERT INTO `visit` VALUES ('21', '7', '5');
INSERT INTO `visit` VALUES ('22', '7', '5');
INSERT INTO `visit` VALUES ('23', '22', '5');
INSERT INTO `visit` VALUES ('24', '22', '5');
INSERT INTO `visit` VALUES ('25', '22', '5');
INSERT INTO `visit` VALUES ('26', '5', '5');
INSERT INTO `visit` VALUES ('27', '5', '5');
INSERT INTO `visit` VALUES ('28', '20', '20');
INSERT INTO `visit` VALUES ('29', '5', '5');
INSERT INTO `visit` VALUES ('30', '5', '20');
INSERT INTO `visit` VALUES ('31', '5', '5');
INSERT INTO `visit` VALUES ('32', '20', '20');
INSERT INTO `visit` VALUES ('33', '19', '19');
INSERT INTO `visit` VALUES ('34', '5', '19');
INSERT INTO `visit` VALUES ('35', '13', '5');
INSERT INTO `visit` VALUES ('36', '5', '5');
INSERT INTO `visit` VALUES ('37', '5', '5');
INSERT INTO `visit` VALUES ('38', '23', '5');
INSERT INTO `visit` VALUES ('39', '6', '5');
INSERT INTO `visit` VALUES ('40', '5', '5');
INSERT INTO `visit` VALUES ('41', '5', '5');
INSERT INTO `visit` VALUES ('42', '6', '5');
INSERT INTO `visit` VALUES ('43', '6', '5');
INSERT INTO `visit` VALUES ('44', '7', '5');
INSERT INTO `visit` VALUES ('45', '13', '5');
INSERT INTO `visit` VALUES ('46', '13', '5');
INSERT INTO `visit` VALUES ('47', '6', '5');
INSERT INTO `visit` VALUES ('48', '5', '5');
INSERT INTO `visit` VALUES ('49', '5', '5');
INSERT INTO `visit` VALUES ('50', '5', '5');
INSERT INTO `visit` VALUES ('51', '5', '5');
INSERT INTO `visit` VALUES ('52', '5', '5');
INSERT INTO `visit` VALUES ('53', '5', '5');
INSERT INTO `visit` VALUES ('54', '5', '5');
INSERT INTO `visit` VALUES ('55', '5', '5');
INSERT INTO `visit` VALUES ('56', '20', '5');
INSERT INTO `visit` VALUES ('57', '20', '5');
INSERT INTO `visit` VALUES ('58', '5', '5');
INSERT INTO `visit` VALUES ('59', '21', '5');
INSERT INTO `visit` VALUES ('60', '21', '5');
INSERT INTO `visit` VALUES ('61', '5', '5');
INSERT INTO `visit` VALUES ('62', '13', '5');
INSERT INTO `visit` VALUES ('63', '19', '5');
INSERT INTO `visit` VALUES ('64', '19', '5');
INSERT INTO `visit` VALUES ('65', '19', '5');
INSERT INTO `visit` VALUES ('66', '5', '5');
INSERT INTO `visit` VALUES ('67', '6', '5');
INSERT INTO `visit` VALUES ('68', '6', '5');
INSERT INTO `visit` VALUES ('69', '21', '5');
INSERT INTO `visit` VALUES ('70', '5', '5');
INSERT INTO `visit` VALUES ('71', '5', '5');

-- ----------------------------
-- Table structure for write
-- ----------------------------
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
  `state` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of write
-- ----------------------------
INSERT INTO `write` VALUES ('3', '5', '接上一篇实践，绘制出来了六边形（多边形）以后再地图上面，然后把点存下来 判断marker点是否在多边形范围内并且不相邻的两条边不相交，才可以提交。上篇文章已经绘制出来了六边形 基于 porint = [lng,lat] 这个中心点如下图：首先判断中心店 porint是否在编辑后的多边形区域内，高德api可以直接调用下面方法判断不相邻的两条边是否相交然后获取编辑好的多边形每个点的经纬', '1493728100', '0', '2', '1', null, '0');
INSERT INTO `write` VALUES ('4', '6', 'detach()和remove()一样，也是从DOM中去掉所有匹配的元素。但需要注意的是，这个方法不会把匹配的元素从jQuery对象中删除，因而可以在将来再使用这些匹配的元素。与remove()不同的是，所有绑定的事件、附加的数据都会保留下来。 ', '1494384864', '0', '2', '1', null, '0');
INSERT INTO `write` VALUES ('5', '5', '购买一套400多万的房子就交了将近10万元的中介费，最费解的是，交易200万的房子与400万的房子，在流程和难度上并没差别啊。”今年1月份，刚刚在北京购置房产的吴先生告诉记者。', '1495247903', '0', '0', '1', null, '0');

-- ----------------------------
-- Table structure for write-zan
-- ----------------------------
DROP TABLE IF EXISTS `write-zan`;
CREATE TABLE `write-zan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `writeId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL COMMENT '1取消赞',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of write-zan
-- ----------------------------
INSERT INTO `write-zan` VALUES ('1', '1', '6', '1492867263', '0');
INSERT INTO `write-zan` VALUES ('2', '3', '7', '1492867263', '0');
INSERT INTO `write-zan` VALUES ('3', '3', '5', '1494380090', '0');
INSERT INTO `write-zan` VALUES ('4', '4', '5', '1494384990', '0');
INSERT INTO `write-zan` VALUES ('5', '5', '5', '1495247912', '0');
SET FOREIGN_KEY_CHECKS=1;
