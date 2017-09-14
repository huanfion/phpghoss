/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : sms

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-14 11:08:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `logintime` int(11) DEFAULT NULL,
  `logincount` int(11) DEFAULT NULL,
  `isdelete` int(2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('2', 'huanfion11', 'e10adc3949ba59abbe56e057f20f883e', '648890146@qq.com', '0', '1', '1504859977', '1504859977', '1504859977', '4', '0');
INSERT INTO `admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '648890146@qq.com', '1', '1', '1504859977', '1504859977', '1504859977', '5', '0');

-- ----------------------------
-- Table structure for stu
-- ----------------------------
DROP TABLE IF EXISTS `stu`;
CREATE TABLE `stu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `age` int(6) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stu
-- ----------------------------
INSERT INTO `stu` VALUES ('1', '刘欢', '28', '男', '一年一班');
INSERT INTO `stu` VALUES ('2', '谢慧文', '29', '女', '一年一班');
INSERT INTO `stu` VALUES ('3', '徐海岩', '15', '女', '一年二班');
INSERT INTO `stu` VALUES ('4', '王梓先', '27', '男', '一年二班');
INSERT INTO `stu` VALUES ('5', '涂吉祥', '28', '男', '一年二班');
INSERT INTO `stu` VALUES ('6', '宁秀云', '27', '女', '一年一班');
INSERT INTO `stu` VALUES ('8', '刘晖', '28', '男', '一年一班');
