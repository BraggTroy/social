/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : social-laravel

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-05-09 23:32:39
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
  `wz` varchar(255) NOT NULL,
  `zan` int(11) DEFAULT NULL COMMENT '赞成',
  `read` int(11) DEFAULT NULL COMMENT '阅读',
  `fandui` int(11) DEFAULT NULL COMMENT '反对',
  `fav` int(11) DEFAULT NULL COMMENT '收藏',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('6', '<p style=\"margin-left: auto;\"><strong>input失去焦点和获得焦点</strong>&nbsp;<br>鼠标在搜索框中点击的时候里面的文字就消失了。&nbsp;<br>我们在做网站的时候经常会用到搜索框的获得焦点和失去焦点的事件，因为懒，每次都去写非常的烦，于是就一劳永逸，遇到类似情况就来调用一下就OK 了 。</p><p style=\"margin-left: auto;\">相关js代码如下：</p><p>12345678910111213141516171819202122232425262728293031323334353637</p><p>input失去焦点和获得焦点jquery焦点事件插件，<br><strong style=\"color: rgb(255, 0, 0);\">鼠标在搜索框中点击的时候里面的文字就消失了</strong>。</p><p style=\"margin-left: auto;\">　　<strong>jquery获取和失去焦点事件</strong>&nbsp;</p><p>1234567891011121314</p>', 'juqey焦点', '5', '1493728553', '2', '0', '0', '', null, null, null, null);
INSERT INTO `article` VALUES ('8', '<p><span style=\"font-size: 14px;\">&nbsp; &nbsp; 《人生三部曲》是高尔基著名</span><a href=\"http://baike.so.com/doc/2461402-2601676.html\" target=\"_blank\">自传体小说</a><span style=\"font-size: 14px;\">三部曲中的第三部，也是高尔基《人生三部曲》之一。其余两部为《童年》、《在人间》。作者描写了他青年时代的生活经历。从这个被真实记述下来的过程中，我们可以看出青少年时代的高尔基对</span><a href=\"http://baike.so.com/doc/3416870-3596296.html\" target=\"_blank\">小市民</a><span style=\"font-size: 14px;\">习气的</span><a href=\"http://baike.so.com/doc/455712-482551.html\" target=\"_blank\">深恶痛绝</a><span style=\"font-size: 14px;\">，对自由的热烈追求，对美好生活的强烈向往，在生活底层与劳苦大众的直接接触，深入社会，接受革命者思想影响和如饥似渴地从书籍中汲取知识养料使他得以成长，从生活底层攀上文化高峰的重要条件。</span><br></p>', '读高尔基书有感', '6', '1493899628', '2', '0', '0', '', null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of a_w_time
-- ----------------------------
INSERT INTO `a_w_time` VALUES ('5', '0', '3', '5', '1493728100', '2');
INSERT INTO `a_w_time` VALUES ('6', '6', '0', '5', '1493728553', '2');
INSERT INTO `a_w_time` VALUES ('7', '8', '0', '6', '1493899628', '2');

-- ----------------------------
-- Table structure for chat_not_read
-- ----------------------------
DROP TABLE IF EXISTS `chat_not_read`;
CREATE TABLE `chat_not_read` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `friendId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment_article
-- ----------------------------

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment_write
-- ----------------------------
INSERT INTO `comment_write` VALUES ('4', '3', '图片真不错', '1493732654', '6', '0');
INSERT INTO `comment_write` VALUES ('5', '3', '写的不错', '1493732723', '7', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friend
-- ----------------------------
INSERT INTO `friend` VALUES ('2', '5', '7', '1', 'fd');
INSERT INTO `friend` VALUES ('4', '7', '5', '4', '678');
INSERT INTO `friend` VALUES ('5', '6', '5', '3', '123');
INSERT INTO `friend` VALUES ('6', '5', '6', '1', '请求');

-- ----------------------------
-- Table structure for friend-group
-- ----------------------------
DROP TABLE IF EXISTS `friend-group`;
CREATE TABLE `friend-group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '附加消息',
  `read` tinyint(4) NOT NULL COMMENT '0未读  1已读',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friend_request
-- ----------------------------
INSERT INTO `friend_request` VALUES ('1', '6', '5', '2', '1492753298', null, 'gfds', '1');
INSERT INTO `friend_request` VALUES ('2', '5', '7', '2', '1492753298', '1492753298', 'dd', '1');
INSERT INTO `friend_request` VALUES ('3', '6', '5', '2', '1492753298', null, 'gfds', '1');
INSERT INTO `friend_request` VALUES ('4', '5', '7', '2', '1492753298', '1492753298', 'dd', '1');
INSERT INTO `friend_request` VALUES ('5', '6', '5', '2', '1492753298', null, 'gfds', '1');
INSERT INTO `friend_request` VALUES ('6', '5', '7', '2', '1492753298', '1492753298', 'dd', '1');
INSERT INTO `friend_request` VALUES ('7', '6', '5', '2', '1492753298', null, 'gfds', '1');
INSERT INTO `friend_request` VALUES ('8', '5', '7', '2', '1492753298', '1492753298', 'dd', '1');
INSERT INTO `friend_request` VALUES ('9', '6', '5', '2', '1492753298', null, 'gfds', '1');
INSERT INTO `friend_request` VALUES ('10', '5', '7', '2', '1492753298', '1492753298', 'dd', '1');
INSERT INTO `friend_request` VALUES ('11', '6', '5', '2', '1492753298', null, 'gfds', '1');
INSERT INTO `friend_request` VALUES ('12', '5', '7', '2', '1492753298', '1492753298', 'dd', '1');
INSERT INTO `friend_request` VALUES ('13', '6', '5', '2', '1492753298', null, 'gfds', '1');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image
-- ----------------------------
INSERT INTO `image` VALUES ('1', '2017-04-22-21-21-03-58fb58bfbcef6.jpg', '1', '1492867263', 'a4.jpg', '5');
INSERT INTO `image` VALUES ('2', '2017-05-02-22-01-31-5908913b921f3.jpg', '1', '1493733691', '582aae9caa3bc.jpg', '5');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image-write
-- ----------------------------
INSERT INTO `image-write` VALUES ('1', '1', '1', 'user');
INSERT INTO `image-write` VALUES ('2', '3', '1493728100', '2017-05-02-20-28-10-59087b5a84139.jpg');

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
  `state` tinyint(4) NOT NULL,
  `content` text NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mail-password
-- ----------------------------

-- ----------------------------
-- Table structure for notify
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notify
-- ----------------------------
INSERT INTO `notify` VALUES ('1', '0', '0', '1', '1', '0', '5');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('5', '白加嘿呀嘿', '111111', '376522507@qq.com', '1', 'online', '发生的发生');
INSERT INTO `user` VALUES ('6', '123', '111111', '123@qq.com', '1', 'online', '他惹他玩儿');
INSERT INTO `user` VALUES ('7', '456', '111111', '456@qq.com', '1', 'online', '不过辅导班地方');
INSERT INTO `user` VALUES ('13', '123123', '111111', '123123@qq.com', '1', 'online', '好热好热');
INSERT INTO `user` VALUES ('19', '爱你哦', '111111', '534@qw.com', '0', 'offline', '');
INSERT INTO `user` VALUES ('20', '逆势', '111111', 'dw@qw.com', '0', 'offline', '');
INSERT INTO `user` VALUES ('21', '啦啦啦', '111111', 'jhfg@qw.com', '0', 'offline', '');
INSERT INTO `user` VALUES ('22', '不拒绝', '111111', 'vfdf@qw.com', '0', 'offline', '');
INSERT INTO `user` VALUES ('23', '金葵花个', '111111', 'kfg@qw.com', '0', 'offline', '');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of write
-- ----------------------------
INSERT INTO `write` VALUES ('3', '5', '接上一篇实践，绘制出来了六边形（多边形）以后再地图上面，然后把点存下来 判断marker点是否在多边形范围内并且不相邻的两条边不相交，才可以提交。上篇文章已经绘制出来了六边形 基于 porint = [lng,lat] 这个中心点如下图：首先判断中心店 porint是否在编辑后的多边形区域内，高德api可以直接调用下面方法判断不相邻的两条边是否相交然后获取编辑好的多边形每个点的经纬', '1493728100', '0', '2', '1', null);

-- ----------------------------
-- Table structure for write-zan
-- ----------------------------
DROP TABLE IF EXISTS `write-zan`;
CREATE TABLE `write-zan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `writeId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of write-zan
-- ----------------------------
INSERT INTO `write-zan` VALUES ('1', '1', '6');
INSERT INTO `write-zan` VALUES ('2', '2', '7');
SET FOREIGN_KEY_CHECKS=1;
