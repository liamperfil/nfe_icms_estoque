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

 Date: 11/01/2023 18:32:32
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
-- Table structure for estoque
-- ----------------------------
DROP TABLE IF EXISTS `estoque`;
CREATE TABLE `estoque`  (
  `cProd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `xProd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `NCM` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `orig` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CFOP` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `uCom` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `qCom` float NULL DEFAULT NULL,
  `vUnCom` float NULL DEFAULT NULL,
  `vDesc` float NULL DEFAULT NULL,
  `pICMS` float NULL DEFAULT NULL,
  `pIPI` float NULL DEFAULT NULL,
  `vFrete` float NULL DEFAULT NULL,
  `vProd` float NULL DEFAULT NULL,
  `cEAN` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nNF` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `emitCNPJ` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `emit_xNome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dhEmi` date NULL DEFAULT NULL,
  `UF` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dest_CNPJ` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chNFe` varchar(44) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `familia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dataRecebi` date NULL DEFAULT NULL,
  `qtd_est` float NULL DEFAULT NULL,
  `valor_total_est` float NULL DEFAULT NULL,
  `infAdic` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for xml_n_localizado
-- ----------------------------
DROP TABLE IF EXISTS `xml_n_localizado`;
CREATE TABLE `xml_n_localizado`  (
  `xmlN` varchar(44) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`xmlN`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
