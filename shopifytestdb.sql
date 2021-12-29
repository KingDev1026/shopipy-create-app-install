/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : shopifytestdb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-12-29 22:02:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for discount_code
-- ----------------------------
DROP TABLE IF EXISTS `discount_code`;
CREATE TABLE `discount_code` (
  `iindexid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cur_discount_code` varchar(50) DEFAULT NULL,
  `shop_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`iindexid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of discount_code
-- ----------------------------
INSERT INTO `discount_code` VALUES ('13', '57TCTHPK76', 'kingdev10260522.myshopify.com');
INSERT INTO `discount_code` VALUES ('14', '5EFA1026KLO', 'kingdev10260522.myshopify.com');
INSERT INTO `discount_code` VALUES ('15', '5EFA1026KLO', 'kingdev10260522.myshopify.com');
INSERT INTO `discount_code` VALUES ('16', '5EFA1026KLO', 'kingdev10260522.myshopify.com');

-- ----------------------------
-- Table structure for testshopify
-- ----------------------------
DROP TABLE IF EXISTS `testshopify`;
CREATE TABLE `testshopify` (
  `iindexid` int(11) NOT NULL AUTO_INCREMENT,
  `gmail` varchar(100) DEFAULT NULL,
  `discount_code` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`iindexid`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of testshopify
-- ----------------------------
INSERT INTO `testshopify` VALUES ('44', 'Asdfasdf', '5EFA1026KLO');
INSERT INTO `testshopify` VALUES ('45', 'sdfg@asdf', '5EFA1026KLO');
