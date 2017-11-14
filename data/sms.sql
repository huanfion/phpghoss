/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : sms

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-11-14 09:51:10
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
  `roleid` tinyint(1) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `logintime` int(11) DEFAULT NULL,
  `logincount` int(11) DEFAULT NULL,
  `isdelete` int(2) unsigned DEFAULT NULL,
  `deletetime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '648890146@qq.com', '1', '1', '1504859977', '1509433409', '1509433409', '45', '0', null);
INSERT INTO `admin` VALUES ('2', 'huanfion', 'c56d0e9a7ccec67b4ea131655038d604', '6488901462@qq.com', '2', '1', '1504859977', '1506569675', '1504859977', '4', '0', null);
INSERT INTO `admin` VALUES ('3', 'test1', 'e10adc3949ba59abbe56e057f20f883e', '6888@qq.com', '3', '1', '1505813833', '1505872331', '1505872331', '2', '0', null);

-- ----------------------------
-- Table structure for auth_group
-- ----------------------------
DROP TABLE IF EXISTS `auth_group`;
CREATE TABLE `auth_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `isdelete` int(11) DEFAULT NULL,
  `deletetime` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `rule` char(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_group
-- ----------------------------
INSERT INTO `auth_group` VALUES ('1', '超级管理员', '系统最高权限管理人员', '0', null, '1508120689', '1510558075', '1', null);
INSERT INTO `auth_group` VALUES ('2', '销售', '销售订单人员', '0', null, '1508120689', '0', '1', null);
INSERT INTO `auth_group` VALUES ('3', '客服', '售前售后跟踪服务人员', '0', null, '1508120689', '2017', '1', null);
INSERT INTO `auth_group` VALUES ('4', '安装师傅', '工程部安装人员', '0', null, '1508120689', '2017', '1', null);
INSERT INTO `auth_group` VALUES ('5', '运营', '运营管理人员', '0', null, '1508120689', '2017', '1', null);
INSERT INTO `auth_group` VALUES ('6', '财务', '财务审批人员', '0', null, '1508120689', '2017', '1', null);
INSERT INTO `auth_group` VALUES ('7', '商务', '商务审核人员', '0', null, '1508120689', '2017', '1', null);
INSERT INTO `auth_group` VALUES ('8', '行政', '行政人员', '0', null, '1508120689', '2017', '1', null);
INSERT INTO `auth_group` VALUES ('9', '产品', '产品设计人员', '0', null, '1508120689', '2017', '1', null);
INSERT INTO `auth_group` VALUES ('10', '技术', '技术团队成员', '0', null, '1508120689', '2017', '1', null);
INSERT INTO `auth_group` VALUES ('11', '法务', '合同法务审核人员', '0', null, '1508120689', '2017', '1', null);
INSERT INTO `auth_group` VALUES ('12', '仓管', '仓库管理人员', '0', null, '1508120689', '2017', '1', null);
INSERT INTO `auth_group` VALUES ('13', '老板', '想干嘛就干嘛11', '0', null, '1508120689', '1508120651', '1', null);
INSERT INTO `auth_group` VALUES ('18', '秘书', '老板说干什么就干什么', '1', null, '1508120689', '1508293457', '1', null);

-- ----------------------------
-- Table structure for auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `auth_group_access`;
CREATE TABLE `auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_group_access
-- ----------------------------

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for goodtype
-- ----------------------------
DROP TABLE IF EXISTS `goodtype`;
CREATE TABLE `goodtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goodtype
-- ----------------------------

-- ----------------------------
-- Table structure for grade
-- ----------------------------
DROP TABLE IF EXISTS `grade`;
CREATE TABLE `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `length` varchar(20) DEFAULT NULL COMMENT '学制',
  `price` int(11) DEFAULT NULL COMMENT '学费',
  `status` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `deletetime` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL COMMENT '允许删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of grade
-- ----------------------------
INSERT INTO `grade` VALUES ('1', 'PHP开发工程师就业班', '6个月', '16800', '1', '1505974772', '1506567630', null, '1');
INSERT INTO `grade` VALUES ('2', 'PHP开发工程师提高班', '3个月', '12000', '1', '1505974772', '1507791499', null, '1');
INSERT INTO `grade` VALUES ('3', 'C#基础班', '3个月', '15000', '1', '1505974772', '1505987495', null, '1');
INSERT INTO `grade` VALUES ('4', 'C#提高班', '6个月', '20000', '1', '1505974925', '1505987495', null, '1');
INSERT INTO `grade` VALUES ('5', 'java基础班', '3个月', '1880', '1', '1506570410', '1506570410', null, '1');
INSERT INTO `grade` VALUES ('6', '论语学习班', '6个月', '10000', '1', '1507794371', '1507794371', null, '1');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `menuurl` varchar(255) DEFAULT NULL,
  `ordernumber` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `deletetime` int(11) DEFAULT NULL,
  `isdelete` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '系统管理', '0', '', '1', null, 'fa fa-address-book', null, null);
INSERT INTO `menu` VALUES ('2', '管理员列表', '1', '/admin.php/user/adminlist.html', '3', null, null, null, null);
INSERT INTO `menu` VALUES ('3', '角色列表', '1', '/admin.php/role/rolelist.html', '2', null, null, null, null);
INSERT INTO `menu` VALUES ('4', '学生列表', '5', '/admin.php/student/studentlist.html', '2', null, '', null, null);
INSERT INTO `menu` VALUES ('5', '教学管理', '0', '', '3', null, 'fa fa-user', null, null);
INSERT INTO `menu` VALUES ('6', '班级管理', '5', '/admin/grade/gradelist.html', '3', null, '', null, null);
INSERT INTO `menu` VALUES ('7', '教师列表', '5', '/admin.php/teacher/teacherlist.html', '1', null, '', null, null);
INSERT INTO `menu` VALUES ('8', '设备管理', '0', '', '5', null, 'fa fa-cogs', null, null);
INSERT INTO `menu` VALUES ('9', '设备列表', '8', '/admin/dev/devlist.html', '1', null, '', null, null);

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `age` int(6) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `starttime` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `createtime` int(11) NOT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `deletetime` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL COMMENT '允许删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', '刘欢', '28', '1', '18565055096', '648890146@qq.com', '1505974772', '1', '1', '0', '1507794440', null, null);
INSERT INTO `student` VALUES ('2', '谢慧文', '29', '0', '18565055096', '648890146@qq.com', '0', '1', '1', '0', null, null, null);
INSERT INTO `student` VALUES ('3', '徐海岩', '26', '1', '17707061227', '648890146@qq.com', '1360166400', '5', '1', '0', '1507790846', null, null);
INSERT INTO `student` VALUES ('4', '王梓先', '27', '1', '18565055096', '648890146@qq.com', '1505974772', '1', '1', '0', null, null, null);
INSERT INTO `student` VALUES ('5', '涂吉祥', '28', '1', '18565055096', '648890146@qq.com', '0', '2', '1', '0', '1507791482', null, null);
INSERT INTO `student` VALUES ('6', '宁秀云', '27', '0', '18565055096', '648890146@qq.com', '1505974772', '1', '1', '0', null, null, null);
INSERT INTO `student` VALUES ('8', '刘晖', '28', '1', '18565055096', '648890146@qq.com', '1505974772', '1', '1', '0', '1507792477', null, '1');
INSERT INTO `student` VALUES ('13', '刘建华', '52', '1', '15170837538', '155748544@qq.com', '1436457600', '3', '1', '1507793936', '1507793948', null, null);
INSERT INTO `student` VALUES ('14', '颜回', '1000', '1', '1008601', '', '0', '6', '1', '1507794431', '1507794431', null, null);

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `degree` int(11) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `hiredate` int(11) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `deletetime` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL COMMENT '允许删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('1', '张老师', '1', '华东交通大学', '15174859854', '1505491200', '1', '1', '5', null, '1507776702', null, '1');
INSERT INTO `teacher` VALUES ('2', '李老师', '1', '华东交通大学', '15170825187', '0', '0', '1', '5', null, '1506581108', null, '1');
INSERT INTO `teacher` VALUES ('3', '刘欢', '1', '清华大学', '15187485965', '1505318400', null, '1', '4', '1506570368', '1506570368', null, null);
INSERT INTO `teacher` VALUES ('4', '徐丹', '3', '北大', '18574859621', '1504195200', null, '1', '5', '1506570439', '1506570439', null, null);
INSERT INTO `teacher` VALUES ('5', '孔夫子', '1', '春秋鲁国', '10086', '-28800', null, '1', '6', '1507794312', '1507794392', null, null);
