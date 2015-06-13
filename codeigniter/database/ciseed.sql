/*
 Navicat MySQL Data Transfer

 Source Server         : letsdofunshit.today
 Source Server Version : 50542
 Source Host           : localhost
 Source Database       : ciseed

 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 06/12/2015 21:56:23 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `usr_users`
-- ----------------------------
DROP TABLE IF EXISTS `usr_users`;
CREATE TABLE `usr_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(128) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_hash` varchar(256) NOT NULL,
  `user_added` datetime NOT NULL,
  `user_modified` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS = 1;
