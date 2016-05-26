/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : aulaphp

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-04-18 16:35:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for galerias
-- ----------------------------
DROP TABLE IF EXISTS `galerias`;
CREATE TABLE `galerias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `foto_capa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of galerias
-- ----------------------------
INSERT INTO `galerias` VALUES ('1', 'Galeria 1', '1461002326.jpg');
INSERT INTO `galerias` VALUES ('8', 'Tigre', '1461008068.jpg');
INSERT INTO `galerias` VALUES ('9', 'Deserto', '1461007967.jpg');

-- ----------------------------
-- Table structure for galeria_fotos
-- ----------------------------
DROP TABLE IF EXISTS `galeria_fotos`;
CREATE TABLE `galeria_fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_galeria` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of galeria_fotos
-- ----------------------------
INSERT INTO `galeria_fotos` VALUES ('34', '1', 'o_1aglb3lad1n9k1tfqncu1i0r1lgb6.jpg');
INSERT INTO `galeria_fotos` VALUES ('35', '1', 'o_1aglb3lad119v17bb1luo1h4l1l4m7.jpg');
INSERT INTO `galeria_fotos` VALUES ('36', '1', 'o_1aglb509d1bmi1a62o9lhfnkfn6.jpg');

-- ----------------------------
-- Table structure for noticias
-- ----------------------------
DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `noticia` text,
  `data_publicacao` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of noticias
-- ----------------------------

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `senha` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `nome` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `arquivo` varchar(255) DEFAULT NULL,
  `arquivo_original` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=sjis;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'pauloalberto', '202cb962ac59075b964b07152d234b70', 'Paulo Alberto', '1461002221.jpg', 'Koala.jpg');
