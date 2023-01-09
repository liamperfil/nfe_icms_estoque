/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : my_database

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 06/01/2023 22:53:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for entrada_icms
-- ----------------------------
DROP TABLE IF EXISTS `entrada_icms`;
CREATE TABLE `entrada_icms`  (
  `nf` int NOT NULL,
  `emit` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `data` date NOT NULL,
  `vNF` float NOT NULL,
  `vICMS` float NULL DEFAULT NULL,
  `chNFe` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `infAdic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`chNFe`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for xml_n_localizado
-- ----------------------------
DROP TABLE IF EXISTS `xml_n_localizado`;
CREATE TABLE `xml_n_localizado`  (
  `xmlN` varchar(44) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`xmlN`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
