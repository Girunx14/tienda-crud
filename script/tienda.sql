/*
 Navicat Premium Data Transfer

 Source Server         : tienda
 Source Server Type    : MySQL
 Source Server Version : 90600 (9.6.0)
 Source Host           : localhost:3306
 Source Schema         : tienda

 Target Server Type    : MySQL
 Target Server Version : 90600 (9.6.0)
 File Encoding         : 65001

 Date: 17/03/2026 16:16:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `apellido_paterno` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `apellido_materno` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rfc` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES (1, 'Juan de Dios', 'Díaz', 'Gómez', 'jddg305785123');
INSERT INTO `cliente` VALUES (2, 'Luna', 'Díaz', 'Morales', 'lunedm1479535');
INSERT INTO `cliente` VALUES (3, 'Kenai', 'Rodríguez', 'Castillo', 'kenirc1247856');
INSERT INTO `cliente` VALUES (4, 'Gerardo', 'Segura', 'Navarro', 'girunsn786124');
INSERT INTO `cliente` VALUES (5, 'José Francisco ', 'Quevedo', 'Hérnandez', 'panchoqh72036');
INSERT INTO `cliente` VALUES (6, 'Marcos ', 'Cardenas', 'Magaña', 'marcardma5978');
INSERT INTO `cliente` VALUES (7, 'Carlitos', 'Jirafales', 'Díaz', 'carli1234');
INSERT INTO `cliente` VALUES (8, 'Matias', 'Hernández', 'Fuentes', 'matiherfu1234');

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cantidad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `precio` decimal(10, 2) NULL DEFAULT NULL,
  `categoria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES (1, 'thinkpad lenovo', '4', 12000.00, 'Laptos');
INSERT INTO `producto` VALUES (2, 'asus zenbook', '7', 7800.00, 'Laptos');
INSERT INTO `producto` VALUES (3, 'ASUS Laptop TUF Gaming A15', '5', 19000.00, 'Laptos');
INSERT INTO `producto` VALUES (4, 'ASUS ROG Strix G16 2025', '2', 31000.00, 'Laptos');

SET FOREIGN_KEY_CHECKS = 1;
