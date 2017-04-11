/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : social-laravel

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-04-11 22:24:03
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO `album` VALUES ('1', '默认相册', '5');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '2', 'gg发大水', '5', '2', '2', '0', '0', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of a_w_time
-- ----------------------------
INSERT INTO `a_w_time` VALUES ('1', '0', '1', '5', '1', '2');
INSERT INTO `a_w_time` VALUES ('2', '1', '0', '5', '2', '2');
INSERT INTO `a_w_time` VALUES ('3', '0', '2', '5', '3', '2');

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
  `parent` int(11) DEFAULT NULL COMMENT '0 为根评论',
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment_write
-- ----------------------------
INSERT INTO `comment_write` VALUES ('1', '1', '123', '1491575209', '5', '0');
INSERT INTO `comment_write` VALUES ('2', '1', '456', '1491575214', '5', '0');

-- ----------------------------
-- Table structure for friend
-- ----------------------------
DROP TABLE IF EXISTS `friend`;
CREATE TABLE `friend` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userFromId` int(11) NOT NULL COMMENT '自己的id',
  `userToId` int(11) NOT NULL COMMENT '好友的id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friend
-- ----------------------------
INSERT INTO `friend` VALUES ('1', '5', '6');
INSERT INTO `friend` VALUES ('2', '5', '7');
INSERT INTO `friend` VALUES ('3', '6', '5');
INSERT INTO `friend` VALUES ('4', '7', '5');

-- ----------------------------
-- Table structure for image
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `xc` int(11) NOT NULL COMMENT '相册id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image-write
-- ----------------------------
INSERT INTO `image-write` VALUES ('1', '1', '1', 'user');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('5', '376522507qqcom', '1', '376522507@qq.com');
INSERT INTO `user` VALUES ('6', '123qqcom', '1', '123@qq.com');
INSERT INTO `user` VALUES ('7', '456qqcom', '1', '456@qq.com');

-- ----------------------------
-- Table structure for user-image
-- ----------------------------
DROP TABLE IF EXISTS `user-image`;
CREATE TABLE `user-image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user-image
-- ----------------------------
INSERT INTO `user-image` VALUES ('1', '5', 'user');
INSERT INTO `user-image` VALUES ('2', '6', 'user');
INSERT INTO `user-image` VALUES ('3', '7', 'user');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of write
-- ----------------------------
INSERT INTO `write` VALUES ('1', '5', '1', '1', '0', '2', '0');
INSERT INTO `write` VALUES ('2', '5', '3', '3', '0', '2', '0');
SET FOREIGN_KEY_CHECKS=1;
