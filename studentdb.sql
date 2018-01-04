/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : studentdb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-09 12:36:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `section`
-- ----------------------------
DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of section
-- ----------------------------
INSERT INTO `section` VALUES ('1', 'Mapagmahal');
INSERT INTO `section` VALUES ('2', 'Dalisay');
INSERT INTO `section` VALUES ('3', 'Marangal');

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', 'ced', 'ced', '20', 'new york cubao, quezon city 1', '1');
INSERT INTO `student` VALUES ('5', 'vincent1', 'pogi', '40', 'jan lang sa cubao din1', '2');
INSERT INTO `student` VALUES ('6', 'jen', 'makulit', '25', 'sa bundok', '3');
INSERT INTO `student` VALUES ('7', 'sample', 'sample', '25', 'test', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '$2y$08$cU83N25RdExEelU4M2VGR.leCSK5L.PuPXNCL2nD2ZzYNrBbZi502', 'admin');
INSERT INTO `user` VALUES ('2', 'user', '$2y$08$cU83N25RdExEelU4M2VGR.leCSK5L.PuPXNCL2nD2ZzYNrBbZi502', 'user');
