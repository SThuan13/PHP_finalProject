/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50730
 Source Host           : localhost:3306
 Source Schema         : mvc

 Target Server Type    : MySQL
 Target Server Version : 50730
 File Encoding         : 65001

 Date: 19/01/2021 13:33:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'nguyen', 'cam');
INSERT INTO `users` VALUES (2, 'nguyen', 'cong');
INSERT INTO `users` VALUES (3, 'i', 'o');
INSERT INTO `users` VALUES (4, '5', '6');
INSERT INTO `users` VALUES (9, '92', '2');
INSERT INTO `users` VALUES (10, 'camnh', 'campro47');
INSERT INTO `users` VALUES (11, '', '');
INSERT INTO `users` VALUES (12, '', '');
INSERT INTO `users` VALUES (13, '', '');
INSERT INTO `users` VALUES (14, '', '');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
