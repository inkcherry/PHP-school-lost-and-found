/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : realone

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-10-18 21:00:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lost_message
-- ----------------------------
DROP TABLE IF EXISTS `lost_message`;
CREATE TABLE `lost_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `publish_time` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `fname` varchar(50) DEFAULT NULL,
  `lostname` varchar(255) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `time` varchar(100) DEFAULT '0000-00-00 00:00:00.0',
  `place` varchar(10) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ps` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=285 DEFAULT CHARSET=utf8;
