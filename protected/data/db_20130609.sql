-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2013 at 09:54 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `mfops`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting_rule`
--

CREATE TABLE `accounting_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `input` tinyint(1) NOT NULL,
  `type_id` int(11) NOT NULL,
  `debitAccount1` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `creditAccount1` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bank` tinyint(1) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `accounting_rule`
--

INSERT INTO `accounting_rule` VALUES(1, 0, 1, '173120001', '11000100101', 1, '2013-05-30 07:45:12', '0000-00-00 00:00:00', 'Compra de mobiliario en efectivo', 0, 2);
INSERT INTO `accounting_rule` VALUES(2, 1, 6, '11000200101', '31100100101', 1, '2013-05-30 07:45:12', '0000-00-00 00:00:00', 'Venta de acciones a socio con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(3, 0, 8, '41100100106', '11000200101', 1, '2013-05-30 07:45:12', '0000-00-00 00:00:00', 'Pago de servicios profesionales con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(4, 1, 1, '11000100101', '173120001', 1, '2013-05-30 07:45:12', '0000-00-00 00:00:00', 'Venta de mobiliario en efectivo', 0, 2);
INSERT INTO `accounting_rule` VALUES(5, 0, 13, '11000100201', '11000100101', 1, '2013-05-30 07:45:12', '0000-00-00 00:00:00', 'Paso dinero de caja chica al banco', 0, 2);
INSERT INTO `accounting_rule` VALUES(6, 1, 14, '11000100101', '11000200101', 1, '2013-05-30 07:45:12', '0000-00-00 00:00:00', 'Paso dinero del banco a la caja chica', 1, 2);
INSERT INTO `accounting_rule` VALUES(7, 0, 14, '10', '20', 1, '2013-05-30 07:45:12', '0000-00-00 00:00:00', 'test', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `AuthAssignment`
--

CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `userid` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `bizrule` text COLLATE utf8_spanish_ci,
  `data` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `AuthAssignment`
--

INSERT INTO `AuthAssignment` VALUES('app-user', '4', NULL, 'N;');
INSERT INTO `AuthAssignment` VALUES('arckanto-admin', '5', NULL, 'N;');
INSERT INTO `AuthAssignment` VALUES('company-admin', '3', NULL, 'N;');
INSERT INTO `AuthAssignment` VALUES('master-admin', '2', NULL, 'N;');
INSERT INTO `AuthAssignment` VALUES('super-admin', '1', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItem`
--

CREATE TABLE `AuthItem` (
  `name` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_spanish_ci,
  `bizrule` text COLLATE utf8_spanish_ci,
  `data` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `AuthItem`
--

INSERT INTO `AuthItem` VALUES('app-user', 2, 'Application user', NULL, 'N;');
INSERT INTO `AuthItem` VALUES('arckanto-admin', 2, 'Arckanto Admin user', NULL, 'N;');
INSERT INTO `AuthItem` VALUES('company-admin', 2, 'Company Admin user', NULL, 'N;');
INSERT INTO `AuthItem` VALUES('master-admin', 2, 'Master Admin user', NULL, 'N;');
INSERT INTO `AuthItem` VALUES('notDeleteOwnUser', 0, 'Not allow to delete own user', 'return Yii::app()->user->id != $params["user"]->id;', 'N;');
INSERT INTO `AuthItem` VALUES('super-admin', 2, 'Super Admin user', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItemChild`
--

CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `AuthItemChild`
--

INSERT INTO `AuthItemChild` VALUES('company-admin', 'app-user');
INSERT INTO `AuthItemChild` VALUES('super-admin', 'arckanto-admin');
INSERT INTO `AuthItemChild` VALUES('master-admin', 'company-admin');
INSERT INTO `AuthItemChild` VALUES('arckanto-admin', 'master-admin');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_number` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `address_line_1` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `address_line_2` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tenant_url` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tenant_user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tenant_password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `identifier` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` VALUES(1, 'Arckanto software', '3-101-202234', 'De la entrada principal del Colegio Técnico de Calle Blancos', '50 Sur, 25 Oeste. Urbanización La Católica', 'San José', 'Costa Rica', '8399-1039', 'info@arckanto.com', 'http://www.arckanto.com', 'https://sacrinsa.sandbox.mambu.com', 'lucor123', 'lmcr1963', 1, '2013-05-27 00:00:00', '0000-00-00 00:00:00', 'arckanto');
INSERT INTO `company` VALUES(2, 'Empresa para el Desarrollo EDESA, S.A.', '3-101-123456', '200 metros norte y 25 metros este del parqueo del hotel San José Palacio', '', 'San José', 'Costa Rica', '2520 2076', 'info@edesacr.com', 'http://edesacr.com', 'https://sacrinsa.sandbox.mambu.com', 'lucor123', 'lmcr1963', 1, '2013-05-27 00:00:00', '0000-00-00 00:00:00', 'edesa');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documentType_id` int(11) NOT NULL,
  `number` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `document_date` date NOT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `entity_name` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish_ci,
  `user_id` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=340 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` VALUES(1, 1, '2', '2013-02-05', 1, 'Uno', 'Uno', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(2, 2, '2', '2013-02-06', 2, 'Dos', 'Dos Desc', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(3, 1, '32', '2013-02-07', 3, 'Tres', 'Tres', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(4, 1, '4', '2013-02-08', 2, 'Ocho', 'Ocho Documento', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(5, 1, '5', '2013-02-09', 2, 'Nueve', 'Nueve', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(6, 2, '6', '2013-02-05', 1, 'Uno', 'Uno', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(7, 2, '10', '2013-02-06', 1, 'uno', 'uno', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(8, 1, '3', '2013-02-08', 1, 'Leopoldo Rojas', 'desc', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(9, 1, '2', '2013-02-08', 2, 'eeeed', 'dddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(10, 2, '4', '2013-02-07', 1, 'eeeed', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(11, 2, '4', '2013-02-07', 1, 'eeeed', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(12, 1, '2', '2013-02-08', 1, 'e', 'dddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(13, 1, '100', '2013-03-01', 1, 'Por fin. Entidad Documento.', 'Por fin funciono. Descripcion Documento.', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(14, 1, '100', '2013-03-01', 1, 'Por fin. Entidad Documento.', 'Por fin funciono. Descripcion Documento.', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(15, 1, 'dd', '2013-02-08', 1, 'dd', 'daddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(16, 1, '100', '2013-02-08', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(17, 1, '100', '2013-02-08', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(18, 1, '100', '2013-02-08', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(19, 1, '100', '2013-02-08', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(20, 2, 'R001', '2013-02-06', 3, 'Entidad Dionicio', 'Primer movimiento ya con todo alambrado', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(21, 1, 'sss', '2013-02-08', 1, '', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(22, 1, '22122', '2013-02-08', 2, '', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(23, 2, '323', '2013-02-08', 1, '', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(24, 2, '323', '2013-02-08', 1, '', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(25, 1, '233', '2013-02-08', NULL, '', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(26, 1, '233', '2013-02-08', NULL, '', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(27, 1, '333', '2013-02-08', NULL, '', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(28, 1, '333', '2013-02-08', NULL, '', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(29, 1, '333', '2013-02-08', 1, '', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(30, 1, '1233', '2013-02-08', 1, '', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(31, 1, '100', '2013-02-08', 1, 'rrrrrr', 'Con detalles para Mambu', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(32, 1, '1200', '2013-02-07', 1, 'Creo que si. Esta es la entidad', 'Con detalles para Mambu 2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(33, 1, '200', '2013-03-01', 2, 'sssss', 'ssss', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(34, 1, 'A101', '2013-02-21', 1, 'Arckanto software', 'Prueba global para revisar la validación de reglas contables', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(48, 1, '222', '2013-02-21', 1, 'Uno Componente', 'Uno componente', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(47, 1, '222', '2013-02-21', 1, 'Uno Componente', 'Uno componente', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(46, 1, '222', '2013-02-21', 1, 'Uno Componente', 'Uno componente', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(45, 1, '222', '2013-02-21', 1, 'Uno Componente', 'Uno componente', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(44, 1, '222', '2013-02-21', 1, 'Uno Componente', 'Uno componente', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(40, 1, '222', '2013-02-21', 1, 'Uno Componente', 'Uno componente', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(51, 1, '444', '2013-03-01', 1, 'Comp2', 'Comp2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(50, 1, '444', '2013-03-01', 1, 'Comp2', 'Comp2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(49, 1, '222', '2013-02-21', 1, 'Uno Componente', 'Uno componente', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(52, 1, '444', '2013-03-01', 1, 'Comp2', 'Comp2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(53, 1, '444', '2013-03-01', 1, 'Comp2', 'Comp2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(54, 1, '444', '2013-03-01', 1, 'Comp2', 'Comp2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(55, 1, '444', '2013-03-01', 1, 'Comp2', 'Comp2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(56, 1, '444', '2013-03-01', 1, 'Comp2', 'Comp2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(57, 1, '444', '2013-03-01', 1, 'Comp2', 'Comp2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(58, 1, '444', '2013-03-01', 1, 'Comp2', 'Comp2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(59, 1, '444', '2013-03-01', 1, 'Comp2', 'Comp2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(60, 1, '444', '2013-03-01', 1, 'Comp2', 'Comp2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(61, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(62, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(63, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(64, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(65, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(66, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(67, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(68, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(69, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(70, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(71, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(72, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(73, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(74, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(75, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(76, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(77, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(78, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(79, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(80, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(81, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(82, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(83, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(84, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(85, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(86, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(87, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(88, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(89, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(90, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(91, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(92, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(93, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(94, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(95, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(96, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(97, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(98, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(99, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(100, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(101, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(102, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(103, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(104, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(105, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(106, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(107, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(108, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(109, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(110, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(111, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(112, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(113, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(114, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(115, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(116, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(117, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(118, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(119, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(120, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(121, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(122, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(123, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(124, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(125, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(126, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(127, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(128, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(129, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(130, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(131, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(132, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(133, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(134, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(135, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(136, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(137, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(138, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(139, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(140, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(141, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(142, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(143, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(144, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(145, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(146, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(147, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(148, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(149, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(150, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(151, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(152, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(153, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(154, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(155, 1, '444', '2013-02-21', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(156, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(157, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(158, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(159, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(160, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(161, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(162, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(163, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(164, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(165, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(166, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(167, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(168, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(169, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(170, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(171, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(172, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(173, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(174, 1, '1009', '2013-02-24', 1, 'Con test conexion', 'Con test conexion', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(175, 1, 'A10012', '2013-02-25', 1, '25', '25', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(176, 1, 'A10012', '2013-02-25', 1, '25', '25', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(177, 1, 'A10012', '2013-02-25', 1, '25', '25', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(178, 1, 'A10012', '2013-02-25', 1, '25', '25', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(179, 1, 'A10012', '2013-02-25', 1, '25', '25', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(180, 1, 'A10012', '2013-02-25', 1, '25', '25', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(181, 1, 'A10012', '2013-02-25', 1, '25', '25', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(182, 1, 'A10012', '2013-02-25', 1, '25', '25', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(183, 1, 'A1000', '2013-02-28', 1, 'Entidad uno header', 'Entidad uno header', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(184, 1, 'A1000', '2013-02-28', 1, 'Entidad uno header', 'Entidad uno header', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(185, 1, 'A1000', '2013-02-28', 1, 'Entidad uno header', 'Entidad uno header', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(186, 1, 'A100', '2013-02-21', 1, 'Hola', 'Hola', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(187, 1, 'A100', '2013-02-21', 1, 'Hola', 'Hola', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(188, 1, 'A100', '2013-02-21', 1, 'Hola', 'Hola', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(189, 1, 'A100', '2013-02-21', 1, 'Hola', 'Hola', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(190, 1, 'A100', '2013-02-21', 1, 'Hola', 'Hola', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(191, 1, 'A100', '2013-02-21', 1, 'Hola', 'Hola', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(192, 1, 'A100', '2013-02-21', 1, 'Hola', 'Hola', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(193, 1, 'A101100', '2013-02-08', 1, 'Este es muy esparódico', 'Esta factura es el pago de .....', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(194, 1, 'A100002', '2013-03-27', 1, 'Header con Abrahan', 'Primer detalle a nivel header. SS.', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(195, 1, 'A100002', '2013-03-27', 1, 'Header con Abrahan', 'Primer detalle a nivel header. SS.', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(196, 1, 'A22222', '2013-03-27', 1, 'Entidad primera', 'Descripción primera del header', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(197, 1, 'A333332', '2013-03-26', 1, 'Primera', 'DE las 3 y 32', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(198, 1, 'A324342', '2013-03-21', 1, 'Primera de las 3 y 51', 'Descripcion de las 3 y 51', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(199, 1, 'A324342', '2013-03-21', 1, 'Primera de las 3 y 51', 'Descripcion de las 3 y 51', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(200, 1, 'A203923', '2013-03-20', 1, 'Mas', 'Y mas ahora de las 3 y 56', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(201, 1, 'A203923', '2013-03-20', 1, 'Mas', 'Y mas ahora de las 3 y 56', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(202, 1, 'A203923', '2013-03-20', 1, 'Mas', 'Y mas ahora de las 3 y 56', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(203, 1, 'A203923', '2013-03-20', 1, 'Mas', 'Y mas ahora de las 3 y 56', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(204, 1, 'A203923', '2013-03-20', 1, 'Mas', 'Y mas ahora de las 3 y 56', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(205, 1, 'A203923', '2013-03-20', 1, 'Mas', 'Y mas ahora de las 3 y 56', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(206, 1, 'A392742', '2013-03-19', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(207, 1, 'A3429874', '2013-03-19', 1, 'dsdsd', 'sdsds', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(208, 1, 'A320984', '2013-03-19', 2, 'dsdfsf', 'dfdf', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(209, 1, 'A2084', '2013-03-19', 1, 'sdd', 'sdd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(210, 1, 'gdhjsg', '2013-02-03', 1, 'jjkjsd', 'jflkjdkljf', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(211, 1, '24', '2013-03-01', 1, 'dd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(212, 1, 'sdhksd2', '2013-03-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(213, 1, '66', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(214, 1, 'ddd', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(215, 2, 'dsdsd2', '2013-02-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(216, 1, 'dlkjlsd2', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(217, 1, 'wweew', '2013-02-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(218, 1, 'kkjsd2', '0000-00-00', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(219, 1, 'ddsdsd', '0000-00-00', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(220, 1, 'ddd2', '2013-03-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(221, 2, 'sfsff', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(222, 1, 'ddds2', '2013-02-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(223, 1, 'ddd', '2013-02-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(224, 1, '232322', '2013-02-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(225, 1, 'ddd2', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(226, 1, 'dsds2', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(227, 1, 'dsdds', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(228, 1, 'sdjklsd', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(229, 1, 'sdsdd', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(230, 1, 'ald', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(231, 1, 'dd', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(232, 1, 'ljkjlkl', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(233, 1, 'ddd', '2013-03-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(234, 1, 'sss', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(235, 1, 'dsd2', '2013-02-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(236, 1, 'ddd', '2013-03-19', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(237, 1, 'sdsdds2', '2013-03-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(238, 1, 'dsd', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(239, 1, 'dsd', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(240, 1, 'dsd', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(241, 1, 'sddsds', '2013-02-21', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(242, 1, 'sddss', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(243, 1, 'sdsd', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(244, 1, 'sdsd2', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(245, 1, 'sdsdd2', '2013-02-08', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(246, 1, 'sddds', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(247, 1, 'sdsd', '2013-03-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(248, 1, 'adsd2', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(249, 1, '3434', '2013-03-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(250, 1, '3434', '2013-03-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(251, 1, 'sdds', '2013-02-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(252, 1, 'A339', '0000-00-00', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(253, 1, 'A339', '0000-00-00', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(254, 1, 'ddssf', '0000-00-00', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(255, 1, 'sdds', '2013-02-21', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(256, 1, 'dsddds', '2013-02-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(257, 1, 'Leo123', '2013-04-07', 1, 'dd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(258, 1, 'Leo1234', '2013-04-06', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(259, 1, 'Leo12345', '2013-04-05', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(260, 1, 'Leo4321', '2013-04-03', 2, 'sfsf', 'fddf', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(261, 1, 'Leojdd', '2013-04-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(262, 2, 'sljdkljsd2', '2013-03-03', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(263, 2, 'dddad', '2013-01-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(264, 2, 'sddssdsd2', '2013-03-03', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(265, 2, '3', '2013-01-01', 1, '', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(266, 2, '4', '2013-01-01', 1, 'dddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(267, 2, '5', '2013-01-01', 1, 'ddd', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(268, 2, '5', '2013-01-01', 1, '', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(269, 2, '6', '2013-01-01', 1, '', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(270, 2, '7', '2013-01-01', NULL, '', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(271, 2, '8', '2013-01-01', 2, 'dsdd', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(272, 2, '9', '2013-01-01', 2, 'dsdd', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(273, 2, '10', '2013-01-01', 2, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(274, 2, '11', '2013-01-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(275, 1, 'A1002', '2013-05-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(276, 1, 'ldlksja', '2013-05-01', 1, 'hhh', 'jjj', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(277, 1, 'jjjh', '2013-01-01', 2, 'eee', 'eee', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(278, 1, 'jjjj2', '2013-01-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(279, 1, 'klkjkjl', '2013-01-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(280, 1, 'sdds2', '2013-01-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(281, 1, 'ddd', '2013-01-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(282, 1, 'sdsd', '2013-01-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(283, 1, 'sddd', '2013-01-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(284, 1, 'sffddfdfdf', '2013-01-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(285, 1, 'sdsdds', '2013-01-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(286, 1, 'klkjjk', '2013-01-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(287, 1, 'A1020', '2013-01-01', 1, 'perfecto', 'perfecto el documento', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(288, 1, 'A10023', '2013-01-01', 1, 'Ninguna nota', 'Este documento es perfecto', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(289, 1, 'jahjaaa', '2013-01-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(290, 1, 'eeeeee2', '2013-01-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(291, 1, 'A3009', '2013-05-26', 1, NULL, 'Con fecha', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(292, 1, 'A09092', '2013-01-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(293, 1, 'asadadd', '2013-01-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(294, 1, 'lklkl', '2013-01-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(295, 1, 'A36776', '2013-04-26', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(296, 1, '3333', '2013-01-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(297, 1, '3333d', '2013-01-01', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(298, 1, 'wewewewe', '2013-01-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(299, 1, '32ed777', '2013-01-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(300, 1, 'rrrr', '2013-01-01', 2, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(301, 1, 'dsdsd', '0000-00-00', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(302, 1, 'ddsd', '2013-05-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(303, 1, 'adaddad', '2013-04-26', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(304, 1, 'perfrcto', '2013-04-26', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(305, 1, 'A1111', '2013-01-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(306, 1, 'dsdsd', '2013-05-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(307, 1, 'sgdhjhgsd', '2013-05-02', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(308, 1, 'lklkd', '2013-05-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(309, 1, 'klklkj', '2013-05-06', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(310, 1, '3333', '2013-04-26', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(311, 1, 'Agggg', '2013-05-02', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(312, 1, 'Agggg', '2013-05-02', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(313, 1, 'Agggg', '2013-05-02', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(314, 1, 'saddsd', '2013-05-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(315, 1, 'A32424', '2013-05-09', 3, 'Esta se refleja abajo', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(316, 1, 'dddd', '2013-05-09', NULL, 'Se refleja en detalles', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(317, 1, 'Ass', '2013-05-03', 2, 'ddddd', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(318, 1, 'ssdsd', '2013-05-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(319, 1, 'jkkjkj', '2013-05-01', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(320, 1, 'kkkjkj', '2013-05-02', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(321, 1, 'A1020', '2013-05-13', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(322, 1, 'kjkjkjkjkj', '2013-05-12', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(323, 1, 'jjkhjhkhjk', '2013-05-11', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(324, 1, 'A100', '2013-05-09', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(325, 1, 'A0309283', '2013-05-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(326, 1, 'A0309283', '2013-05-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(327, 1, 'A02380923', '2013-05-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(328, 1, 'A02380923', '2013-05-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(329, 1, 'kkkkjl', '2013-05-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(330, 1, 'fkldfkf', '2013-05-02', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(331, 1, 'ssss', '2013-05-15', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(332, 2, '12', '2013-05-08', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(333, 2, '13', '2013-05-09', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(334, 2, '14', '2013-05-07', 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(335, 1, 'ssdd', '2013-05-09', NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `document` VALUES(339, 1, 'A10290', '2013-05-22', 1, 'Primera para imprimir', 'Veamos que es lo que se debe imprimir.\nVeamos que es lo que se debe imprimir.\nVeamos que es lo que se debe imprimir.\nVeamos que es lo que se debe imprimir.\nVeamos que es lo que se debe imprimir.\nVeamos que es lo que se debe imprimir.', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `document_type`
--

CREATE TABLE `document_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `next_number` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `document_type`
--

INSERT INTO `document_type` VALUES(1, 'Factura', 0, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `document_type` VALUES(2, 'Recibo', 0, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `journal_entry`
--

CREATE TABLE `journal_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `debitAccount` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `debitAmount` decimal(19,4) NOT NULL,
  `creditAccount` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `creditAmount` decimal(19,4) NOT NULL,
  `branchID` int(11) DEFAULT NULL,
  `journalEntry_date` date NOT NULL,
  `notes` text COLLATE utf8_spanish_ci,
  `user_id` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=183 ;

--
-- Dumping data for table `journal_entry`
--

INSERT INTO `journal_entry` VALUES(1, '173120001', 1000.0000, '11000100101', 1000.0000, 0, '2012-12-20', 'Mfops', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(2, '173120001', 500.0000, '11000100101', 500.0000, 0, '2012-12-20', 'Mfops con 500', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(3, '173120001', 200.0000, '11000100101', 200.0000, 0, '2012-12-20', 'Sin echo', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(4, '173120001', 204.0000, '11000100101', 204.0000, 0, '2012-12-20', 'A ver', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(5, '173120001', 451.0000, '11000100101', 451.0000, NULL, '2012-12-16', 'Todo el ciclo demo OK con 451 de platas', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(6, '173120001', 1000.0000, '11000100101', 1000.0000, NULL, '2012-12-16', 'hola', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(7, '173120001', 5000.0000, '11000100101', 5000.0000, NULL, '2012-12-16', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(8, '173120001', 5000.0000, '11000100101', 5000.0000, NULL, '2013-01-24', 'Prueba FINCA 2013', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(9, '173120001', 10000.0000, '11000100101', 10000.0000, NULL, '2013-01-30', 'Compra de mobiliario en efectivo', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(10, '11000100101', 20000.0000, '173120001', 20000.0000, NULL, '2013-01-30', 'Venta de mobiliario en efectivo', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(11, '11000100201', 25000.0000, '11000100101', 25000.0000, NULL, '2013-01-24', 'Paso de dinero de caja a bancos. Vía Salida-Caja.', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(12, '11000100201', 41000.0000, '11000100101', 41000.0000, NULL, '2013-01-30', 'Paso de dinero de caja a bancos. Vía Salida-Caja', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(13, '11000200101', 5003.0000, '31100100101', 5003.0000, NULL, '2013-01-30', 'Venta de acciones a socio con cheque', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(14, '11000100101', 1.0000, '173120001', 1.0000, NULL, '2012-12-20', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(15, '11000100101', 1200.0000, '173120001', 1200.0000, NULL, '2012-12-20', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(16, '11000100101', 12.0000, '173120001', 12.0000, NULL, '0000-00-00', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(17, '11000100101', 980.0000, '173120001', 980.0000, NULL, '2013-01-30', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(18, '11000100101', 105.0000, '173120001', 105.0000, NULL, '2013-01-24', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(19, '11000100101', 1000.0000, '173120001', 1000.0000, NULL, '2013-05-02', 'Para Mambu', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(20, '11000100101', 505.0000, '173120001', 505.0000, NULL, '2013-02-07', 'Descripcion para Mambu', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(21, '11000100101', 3500.0000, '173120001', 3500.0000, NULL, '2013-02-21', 'Primer movimiento detallado del 21 de feb', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(22, '11000100101', 1000.0000, '173120001', 1000.0000, NULL, '2013-05-02', 'Componente', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(23, '11000100101', 1000.0000, '173120001', 1000.0000, NULL, '2013-05-02', 'Componente', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(24, '11000100101', 1000.0000, '173120001', 1000.0000, NULL, '2013-05-02', 'Componente', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(25, '11000100101', 1000.0000, '173120001', 1000.0000, NULL, '2013-05-02', 'Componente', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(26, '11000100101', 333.0000, '173120001', 333.0000, NULL, '2013-05-02', 'c2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(27, '11000100101', 333.0000, '173120001', 333.0000, NULL, '2013-05-02', 'c2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(28, '11000100101', 333.0000, '173120001', 333.0000, NULL, '2013-05-02', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(29, '11000100101', 333.0000, '173120001', 333.0000, NULL, '2013-05-02', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(30, '11000100101', 333.0000, '173120001', 333.0000, NULL, '2013-05-02', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(31, '11000100101', 333.0000, '173120001', 333.0000, NULL, '2013-05-02', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(32, '11000100101', 333.0000, '173120001', 333.0000, NULL, '2013-05-02', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(33, '11000100101', 333.0000, '173120001', 333.0000, NULL, '2013-05-02', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(34, '11000100101', 333.0000, '173120001', 333.0000, NULL, '2013-05-02', 'ddd122', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(35, '11000100101', 444.0000, '173120001', 444.0000, NULL, '2013-02-10', 'ddd123', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(36, '11000100101', 333.0000, '173120001', 333.0000, NULL, '2013-05-02', 'ddd122', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(37, '11000100101', 444.0000, '173120001', 444.0000, NULL, '2013-02-10', 'ddd123', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(38, '11000100101', 333.0000, '173120001', 333.0000, NULL, '2013-05-02', 'ddd122', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(39, '11000100101', 444.0000, '173120001', 444.0000, NULL, '2013-02-10', 'ddd123', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(40, '11000100101', 333.0000, '173120001', 333.0000, NULL, '2013-05-02', 'ddd122', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(41, '11000100101', 444.0000, '173120001', 444.0000, NULL, '2013-02-10', 'ddd123', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(42, '11000100101', 333.0000, '173120001', 333.0000, NULL, '2013-05-02', 'ddd122', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(43, '11000100101', 444.0000, '173120001', 444.0000, NULL, '2013-02-10', 'ddd123', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(44, '11000100101', 1009.0000, '173120001', 1009.0000, NULL, '2013-05-02', 'test1', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(45, '11000100101', 1008.0000, '173120001', 1008.0000, NULL, '2013-02-10', 'test2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(46, '11000100101', 2500.0000, '173120001', 2500.0000, NULL, '2013-05-25', '25', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(47, '11000100101', 2600.0000, '173120001', 2600.0000, NULL, '2013-02-26', '26', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(48, '11000100101', 100000.0000, '173120001', 100000.0000, NULL, '2013-02-28', 'Primer detalle sacrinsa', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(49, '11000100101', 100000.0000, '173120001', 100000.0000, NULL, '2013-02-28', 'Primer detalle sacrinsa', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(50, '11000100101', 100.0000, '173120001', 100.0000, NULL, '2013-03-08', 'hola', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(51, '11000100101', 60.0000, '173120001', 60.0000, NULL, '2013-03-08', 'hola', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(52, '173120001', 40.0000, '11000100101', 40.0000, NULL, '2013-03-08', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(53, '11000100101', 200.0000, '173120001', 200.0000, NULL, '2013-03-08', 'hola222', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(54, '11000100101', 190.0000, '173120001', 190.0000, NULL, '2013-03-07', 'hola222', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(55, '11000100101', 1902.0000, '173120001', 1902.0000, NULL, '2013-03-07', 'hola222', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(56, '11000100101', 50000.0000, '173120001', 50000.0000, NULL, '2013-03-06', 'Reunion FNCA', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(57, '11000100101', 20000.0000, '173120001', 20000.0000, NULL, '2013-03-26', 'Primer detalle. SS', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(58, '11000100101', 20000.0000, '173120001', 20000.0000, NULL, '2013-03-26', 'Primer detalle. SS', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(59, '11000100101', 30000.0000, '173120001', 30000.0000, NULL, '2013-03-25', 'Otro más de SS', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(60, '11000100101', 15000.0000, '173120001', 15000.0000, NULL, '2013-03-24', 'el segundo de esta vez', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(61, '11000100101', 10000.0000, '173120001', 10000.0000, NULL, '2013-03-23', 'Primer detalle de 3 y 32', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(62, '11000100101', 20000.0000, '173120001', 20000.0000, NULL, '2013-03-22', 'Segundo detalle de 3 y 32', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(63, '11000100101', 444.0000, '173120001', 444.0000, NULL, '2013-01-21', 'Detalle de las 3 y 51', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(64, '11000100101', 444.0000, '173120001', 444.0000, NULL, '2013-01-21', 'Detalle de las 3 y 51', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(65, '11000100101', 40000.0000, '173120001', 40000.0000, NULL, '2013-03-20', 'de las 3 y 57', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(66, '11000100101', 40000.0000, '173120001', 40000.0000, NULL, '2013-03-20', 'de las 3 y 57', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(67, '11000100101', 40000.0000, '173120001', 40000.0000, NULL, '2013-03-20', 'de las 3 y 57', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(68, '11000100101', 40000.0000, '173120001', 40000.0000, NULL, '2013-03-20', 'de las 3 y 57', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(69, '11000100101', 40000.0000, '173120001', 40000.0000, NULL, '2013-03-20', 'de las 3 y 57', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(70, '11000100101', 40001.0000, '173120001', 40001.0000, NULL, '2013-03-20', 'de las 3 y 57', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(71, '11000100101', 12000.0000, '173120001', 12000.0000, NULL, '2013-03-19', 'Detalle 4 y 6', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(72, '11000100101', 1000.0000, '173120001', 1000.0000, NULL, '2013-03-19', '4 y 11', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(73, '11000100101', 3000.0000, '173120001', 3000.0000, NULL, '2013-03-19', '4 y 15', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(74, '11000100101', 4000.0000, '173120001', 4000.0000, NULL, '2013-03-19', '4 y 16', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(75, '11000100101', 5000.0000, '173120001', 5000.0000, NULL, '2013-03-19', '4 y 21', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(76, '11000100101', 6000.0000, '173120001', 6000.0000, NULL, '2013-03-19', 'dsdd 4 y 24', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(77, '11000100101', 7000.0000, '173120001', 7000.0000, NULL, '2013-03-19', '4 y 28', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(78, '11000100101', 8000.0000, '173120001', 8000.0000, NULL, '2013-03-19', '4 y 29', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(79, '11000100101', 9000.0000, '173120001', 9000.0000, NULL, '2013-03-19', '4 y 36', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(80, '11000100101', 1000.0000, '173120001', 1000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(81, '11000100101', 2000.0000, '173120001', 2000.0000, NULL, '2013-03-19', '4 y 42', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(82, '11000100101', 3000.0000, '173120001', 3000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(83, '11000100101', 4000.0000, '173120001', 4000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(84, '11000100101', 5000.0000, '173120001', 5000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(85, '11000100101', 7000.0000, '173120001', 7000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(86, '11000100101', 8000.0000, '173120001', 8000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(87, '11000100101', 1000.0000, '173120001', 1000.0000, NULL, '2013-03-19', '5 y 03', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(88, '11000100101', 2000.0000, '173120001', 2000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(89, '11000100101', 5000.0000, '173120001', 5000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(90, '11000100101', 9000.0000, '173120001', 9000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(91, '11000100101', 3000.0000, '173120001', 3000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(92, '11000100101', 4000.0000, '173120001', 4000.0000, NULL, '2013-03-26', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(93, '11000100101', 6000.0000, '173120001', 6000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(94, '11000100101', 7000.0000, '173120001', 7000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(95, '11000100101', 8000.0000, '173120001', 8000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(96, '11000100101', 9000.0000, '173120001', 9000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(97, '11000100101', 1000.0000, '173120001', 1000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(98, '11000100101', 2000.0000, '173120001', 2000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(99, '11000100101', 2000.0000, '173120001', 2000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(100, '11000100101', 4000.0000, '173120001', 4000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(101, '11000100101', 5000.0000, '173120001', 5000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(102, '11000100101', 6000.0000, '173120001', 6000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(103, '11000100101', 7000.0000, '173120001', 7000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(104, '11000100101', 7000.0000, '173120001', 7000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(105, '11000100101', 8000.0000, '173120001', 8000.0000, NULL, '2013-03-19', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(106, '11000100101', 6500.0000, '173120001', 6500.0000, NULL, '2013-03-18', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(107, '11000100101', 7500.0000, '173120001', 7500.0000, NULL, '2013-03-18', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(108, '11000100101', 8500.0000, '173120001', 8500.0000, NULL, '2013-03-18', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(109, '11000100101', 9500.0000, '173120001', 9500.0000, NULL, '2013-03-18', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(110, '11000100101', 1500.0000, '173120001', 1500.0000, NULL, '2013-03-18', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(111, '11000100101', 2500.0000, '173120001', 2500.0000, NULL, '2013-03-18', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(112, '11000100101', 3500.0000, '173120001', 3500.0000, NULL, '2013-03-18', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(113, '41100100106', 4500.0000, '11000200101', 4500.0000, NULL, '2013-03-18', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(114, '11000100101', 9300.0000, '173120001', 9300.0000, NULL, '2013-03-18', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(115, '11000100101', 9300.0000, '173120001', 9300.0000, NULL, '2013-03-18', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(116, '11000100101', 9400.0000, '173120001', 9400.0000, NULL, '2013-03-18', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(117, '11000100101', 1000.0000, '173120001', 1000.0000, NULL, '2013-04-07', 'validator', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(118, '11000100101', 8000.0000, '173120001', 8000.0000, NULL, '2013-04-06', 'Movto 1', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(119, '11000100101', 765.0000, '173120001', 765.0000, NULL, '2013-04-05', 'Movto 2', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(120, '11000100101', 2000.0000, '173120001', 2000.0000, NULL, '2013-04-05', 'dia5', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(121, '11000100101', 1000.0000, '173120001', 1000.0000, NULL, '2013-04-06', 'dia6', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(122, '11000100101', 1000.0000, '173120001', 1000.0000, NULL, '2013-04-03', 'dia 3 second', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(123, '11000100101', 500.0000, '173120001', 500.0000, NULL, '2013-04-02', 'dia 2 second', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(124, '11000100101', 9999.0000, '173120001', 9999.0000, NULL, '2013-04-01', 'perfecto', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(125, '11000100101', 100.0000, '173120001', 100.0000, NULL, '2013-04-29', 'ddd', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(126, '11000100101', 100.0000, '173120001', 100.0000, NULL, '2013-04-29', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(127, '11000100101', 100.0000, '173120001', 100.0000, NULL, '2013-04-29', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(128, '11000100101', 200.0000, '173120001', 200.0000, NULL, '2013-04-29', 'lkjkj', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(129, '11000100101', 200.0000, '173120001', 200.0000, NULL, '2013-04-29', 'lkjkj', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(130, '11000100101', 300.0000, '173120001', 300.0000, NULL, '2013-04-29', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(131, '11000100101', 500.0000, '173120001', 500.0000, NULL, '2013-04-29', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(132, '11000100101', 160.0000, '173120001', 160.0000, NULL, '2013-04-30', 'hjjh. Documento en Sistema de Operaciones: 279', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(133, '11000100101', 180.0000, '173120001', 180.0000, NULL, '2013-04-30', 'detalle 1. Documento en Sistema de Operaciones: 287 En Mambu => ID Asiento1: 11293, ID Asiento2: 11294, Identificador Transacción: 604AUB00IC446 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(134, '11000100101', 181.0000, '173120001', 181.0000, NULL, '2013-04-30', 'detalle 2. Documento en Sistema de Operaciones: 287 En Mambu => ID Asiento1: 11295, ID Asiento2: 11296, Identificador Transacción: 599DEO15YF678 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(135, '11000100101', 200.0000, '173120001', 200.0000, NULL, '2013-05-02', '. Documento en Sistema de Operaciones: 288 En Mambu => ID Asiento1: 11301, ID Asiento2: 11302, Identificador Transacción: 796KMI81GB857 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(136, '11000100101', 234.0000, '173120001', 234.0000, NULL, '2013-05-02', '. Documento en Sistema de Operaciones: 289 En Mambu => ID Asiento1: 11303, ID Asiento2: 11304, Identificador Transacción: 307KMX09UA025 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(137, '11000100101', 134.0000, '173120001', 134.0000, NULL, '2013-05-02', '. Documento en Sistema de Operaciones: 290 En Mambu => ID Asiento1: 11305, ID Asiento2: 11306, Identificador Transacción: 186OPB56GJ316 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(138, '11000100101', 193.0000, '173120001', 193.0000, NULL, '2013-05-05', '. Documento en Sistema de Operaciones: 293 En Mambu => ID Asiento1: 13971, ID Asiento2: 13972, Identificador Transacción: 384BWO95DN724 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(139, '11000100101', 195.0000, '173120001', 195.0000, NULL, '2013-05-05', '. Documento en Sistema de Operaciones: 294 En Mambu => ID Asiento1: 13973, ID Asiento2: 13974, Identificador Transacción: 593VWM21DL114 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(140, '11000100101', 197.0000, '173120001', 197.0000, NULL, '2013-04-25', '. Documento en Sistema de Operaciones: 295 En Mambu => ID Asiento1: 13975, ID Asiento2: 13976, Identificador Transacción: 683TLT83HC954 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(141, '11000100101', 200.0000, '173120001', 200.0000, NULL, '2013-05-05', '. Documento en Sistema de Operaciones: 296 En Mambu => ID Asiento1: 13977, ID Asiento2: 13978, Identificador Transacción: 412GOU73QB975 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(142, '11000100101', 333.0000, '173120001', 333.0000, NULL, '2013-05-05', '. Documento en Sistema de Operaciones: 297 En Mambu => ID Asiento1: 13979, ID Asiento2: 13980, Identificador Transacción: 249BOV97LQ965 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(143, '11000100101', 3333.0000, '173120001', 3333.0000, NULL, '2013-05-05', '. Documento en Sistema de Operaciones: 298 En Mambu => ID Asiento1: 13981, ID Asiento2: 13982, Identificador Transacción: 631YPI59ON821 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(144, '11000100101', 323.0000, '173120001', 323.0000, NULL, '2013-05-05', '. Documento en Sistema de Operaciones: 299 En Mambu => ID Asiento1: 13983, ID Asiento2: 13984, Identificador Transacción: 513TXF09WG382 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(145, '11000100101', 344.0000, '173120001', 344.0000, NULL, '2013-05-05', '. Documento en Sistema de Operaciones: 300 En Mambu => ID Asiento1: 13985, ID Asiento2: 13986, Identificador Transacción: 213DYH50BC853 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(146, '11000100101', 3333.0000, '173120001', 3333.0000, NULL, '2013-05-05', '. Documento en Sistema de Operaciones: 301 En Mambu => ID Asiento1: 13987, ID Asiento2: 13988, Identificador Transacción: 046VPN87DU977 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(147, '11000100101', 99.0000, '173120001', 99.0000, NULL, '2013-04-26', '. Documento en Sistema de Operaciones: 308 En Mambu => ID Asiento1: 13989, ID Asiento2: 13990, Identificador Transacción: 094LDI35OK839 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(148, '11000100101', 111.0000, '173120001', 111.0000, NULL, '2013-04-29', '. Documento en Sistema de Operaciones: 309 En Mambu => ID Asiento1: 13991, ID Asiento2: 13992, Identificador Transacción: 027ONV18OR301 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(149, '11000100101', 89.0000, '173120001', 89.0000, NULL, '2013-04-28', '. Documento en Sistema de Operaciones: 309 En Mambu => ID Asiento1: 13993, ID Asiento2: 13994, Identificador Transacción: 392IIG29PN635 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(150, '11000100101', 99.0000, '173120001', 99.0000, NULL, '2013-04-25', '. Documento en Sistema de Operaciones: 310 En Mambu => ID Asiento1: 13995, ID Asiento2: 13996, Identificador Transacción: 418ONJ81LI671 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(151, '11000100101', 101.0000, '173120001', 101.0000, NULL, '2013-04-24', '. Documento en Sistema de Operaciones: 310 En Mambu => ID Asiento1: 13997, ID Asiento2: 13998, Identificador Transacción: 032GXP87XE749 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(152, '11000100101', 34.0000, '173120001', 34.0000, NULL, '2013-05-08', '. Información del Sistema de Operaciones: ID de Documento: 313 En Mambu => ID Asiento1: 13999, ID Asiento2: 14000, Identificador Transacción: 731HLU00PF327 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(153, '11000100101', 99.0000, '173120001', 99.0000, NULL, '2013-05-08', '. Información del Sistema de Operaciones: ID de Documento: 314 y Número de Documento: saddsd En Mambu => ID Asiento1: 14001, ID Asiento2: 14002, Identificador Transacción: 095AAN03RO171 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(154, '11000100101', 100.0000, '173120001', 100.0000, NULL, '2013-05-08', 'Detalle del uno. Informacion del Sistema de Operaciones: ID de Documento: 315 y Numero de Documento: A32424 En Mambu => ID Asiento1: 14003, ID Asiento2: 14004, Identificador Transacción: 868USX76YC592 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(155, '11000100101', 200.0000, '173120001', 200.0000, NULL, '2013-05-07', 'Detalle del dos. Informacion del Sistema de Operaciones: ID de Documento: 315 y Numero de Documento: A32424 En Mambu => ID Asiento1: 14005, ID Asiento2: 14006, Identificador Transacción: 178UVV86SO686 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(156, '11000100101', 300.0000, '173120001', 300.0000, NULL, '2013-05-06', 'Detalle del 3. Informacion del Sistema de Operaciones: ID de Documento: 315 y Numero de Documento: A32424 En Mambu => ID Asiento1: 14007, ID Asiento2: 14008, Identificador Transacción: 354TEM22GF011 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(157, '11000100101', 400.0000, '173120001', 400.0000, NULL, '2013-05-05', 'Detalle del 4. Informacion del Sistema de Operaciones: ID de Documento: 315 y Numero de Documento: A32424 En Mambu => ID Asiento1: 14009, ID Asiento2: 14010, Identificador Transacción: 082TAI14XD109 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(158, '11000100101', 500.0000, '173120001', 500.0000, NULL, '2013-05-04', 'Detalle del 5. Informacion del Sistema de Operaciones: ID de Documento: 315 y Numero de Documento: A32424 En Mambu => ID Asiento1: 14011, ID Asiento2: 14012, Identificador Transacción: 050RAR19HM215 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(159, '11000100101', 600.0000, '173120001', 600.0000, NULL, '2013-05-03', 'Detalle del 6. Informacion del Sistema de Operaciones: ID de Documento: 315 y Numero de Documento: A32424 En Mambu => ID Asiento1: 14013, ID Asiento2: 14014, Identificador Transacción: 522ZIN70WE940 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(160, '11000100101', 400.0000, '173120001', 400.0000, NULL, '2013-05-07', '. Informacion del Sistema de Operaciones: ID de Documento: 316 y Numero de Documento: dddd En Mambu => ID Asiento1: 14015, ID Asiento2: 14016, Identificador Transacción: 604IUA51LE896 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(161, '11000100101', 200.0000, '173120001', 200.0000, NULL, '2013-05-03', '. Informacion del Sistema de Operaciones: ID de Documento: 317 y Numero de Documento: Ass En Mambu => ID Asiento1: 14017, ID Asiento2: 14018, Identificador Transacción: 463TRF97KB347 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(162, '11000100101', 290.0000, '173120001', 290.0000, NULL, '2013-05-09', '. Informacion del Sistema de Operaciones: ID de Documento: 318 y Numero de Documento: ssdsd En Mambu => ID Asiento1: 14019, ID Asiento2: 14020, Identificador Transacción: 019CUB73HS624 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(163, '11000100101', 188.0000, '173120001', 188.0000, NULL, '2013-05-01', '. Informacion del Sistema de Operaciones: ID de Documento: 319 y Numero de Documento: jkkjkj En Mambu => ID Asiento1: 14021, ID Asiento2: 14022, Identificador Transacción: 474GNU96WV103 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(164, '11000100101', 192.0000, '173120001', 192.0000, NULL, '2013-05-02', '. Informacion del Sistema de Operaciones: ID de Documento: 320 y Numero de Documento: kkkjkj En Mambu => ID Asiento1: 14023, ID Asiento2: 14024, Identificador Transacción: 579VWG71WH006 ', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(165, '11000100101', 190.0000, '173120001', 190.0000, NULL, '2013-05-13', 'Detalle uno real\n\nInformación Mambu:\nID Asiento1 => 14025,\nID Asiento2 => 14026,\nIdentificador Transacción => 818QFV25WA233', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(166, '11000100101', 10.0000, '173120001', 10.0000, NULL, '2013-05-13', '\n\nInformación Mambu:\nID Asiento1 => 14027,\nID Asiento2 => 14028,\nIdentificador Transacción => 438KIS90RS435', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(167, '11000100101', 180.0000, '173120001', 180.0000, NULL, '2013-05-12', 'UNO UNO\n\nInformación Mambu:\nID Asiento1 => 14029,\nID Asiento2 => 14030,\nIdentificador Transacción => 051BYA86FN683', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(168, '11000100101', 20.0000, '173120001', 20.0000, NULL, '2013-05-12', '\n\nInformación Mambu:\nID Asiento1 => 14031,\nID Asiento2 => 14032,\nIdentificador Transacción => 534ABI70WX678', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(169, '11000100101', 170.0000, '173120001', 170.0000, NULL, '2013-05-11', 'Información Mambu:\nID Asiento1 => 14033,\nID Asiento2 => 14034,\nIdentificador Transacción => 766HEL27ZU118', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(170, '11000100101', 30.0000, '173120001', 30.0000, NULL, '2013-05-11', 'Detalle dos\n\nInformación Mambu:\nID Asiento1 => 14035,\nID Asiento2 => 14036,\nIdentificador Transacción => 110OMB23XE715', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(171, '11000100101', 223.0000, '173120001', 223.0000, NULL, '2013-05-02', 'Información Mambu:\nID Asiento1 => 14041,\nID Asiento2 => 14042,\nIdentificador Transacción => 957UBD00OE373', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(172, '11000100101', 19.0000, '173120001', 19.0000, NULL, '2013-05-15', 'Información Mambu:\nID Asiento1 => 14051,\nID Asiento2 => 14052,\nIdentificador Transacción => 035MFF67BC256', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(173, '11000100101', 222.0000, '173120001', 222.0000, NULL, '2013-05-09', 'Información Mambu:\nID Asiento1 => 14053,\nID Asiento2 => 14054,\nIdentificador Transacción => 953YZV26ZT761', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(174, '11000100101', 1.0000, '173120001', 1.0000, NULL, '2013-05-09', 'Información Mambu:\nID Asiento1 => 14055,\nID Asiento2 => 14056,\nIdentificador Transacción => 617BGU54JV955', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(175, '11000100101', 2431902.0000, '173120001', 2431902.0000, NULL, '2013-05-14', 'Información Mambu:\nID Asiento1 => 14057,\nID Asiento2 => 14058,\nIdentificador Transacción => 632NZW17OI578', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(176, '11000200101', 50890.0000, '31100100101', 50890.0000, NULL, '2013-05-15', 'Información Mambu:\nID Asiento1 => 14059,\nID Asiento2 => 14060,\nIdentificador Transacción => 036YHX53VZ118', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(181, '11000100101', 76290.0000, '173120001', 76290.0000, NULL, '2013-05-20', 'Este es la segunda parte del detalle uno de la linea uno de los documentos\n\nInformación Mambu:\nID Asiento1 => 14069,\nID Asiento2 => 14070,\nIdentificador Transacción => 533SAZ34PR413', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(180, '11000100101', 56789.0000, '173120001', 56789.0000, NULL, '2013-05-21', 'Este es la parte del detalle uno de la linea uno de los documentos\n\nInformación Mambu:\nID Asiento1 => 14067,\nID Asiento2 => 14068,\nIdentificador Transacción => 212HQZ96AC055', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `journal_entry` VALUES(182, '11000100101', 672000.0000, '173120001', 672000.0000, NULL, '2013-05-19', 'Este es la tercer parte del detalle uno de la linea uno de los documentos\n\nInformación Mambu:\nID Asiento1 => 14071,\nID Asiento2 => 14072,\nIdentificador Transacción => 166RWK75JM681', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `movement_category`
--

CREATE TABLE `movement_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `movement_category`
--

INSERT INTO `movement_category` VALUES(1, 'Activo Fijo', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `movement_category` VALUES(2, 'Otros Activos', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `movement_category` VALUES(3, 'Venta de Acciones', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `movement_category` VALUES(4, 'Gasto Operativo', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `movement_category` VALUES(5, 'Movimiento de Pasivo', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `movement_category` VALUES(6, 'Movimiento interno Caja Bancos', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `movement_type`
--

CREATE TABLE `movement_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movement_category_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `with_price` tinyint(1) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `movement_type`
--

INSERT INTO `movement_type` VALUES(1, 1, 'Mobiliario y Equipo de Oficina', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(3, 1, 'Equipo de Cómputo', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(4, 2, 'Inversiones en EDESA', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(5, 2, 'Inventarios (Bienes en Venta)', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(6, 3, 'Capital en acciones', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 1, 2);
INSERT INTO `movement_type` VALUES(7, 3, 'Capital aportado adicional', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 1, 2);
INSERT INTO `movement_type` VALUES(8, 4, 'Servicios Profesionales', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(9, 4, 'Servicios de Vigilancia', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(11, 5, 'Documentos por pagar', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(12, 5, 'Intereses sobre préstamos', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(13, 6, 'Pasar dinero de caja a bancos', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(14, 6, 'Pasar dinero de bancos a caja', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `operation_date` date NOT NULL,
  `amount` decimal(19,4) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `entity_name` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `reference_price` decimal(19,4) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text COLLATE utf8_spanish_ci,
  `bank` tinyint(1) NOT NULL,
  `input` tinyint(1) NOT NULL,
  `document_id` int(11) NOT NULL,
  `journal_entry_id` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=220 ;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` VALUES(5, 1, '2012-11-08', 500.8700, 1, 'Cliente UNO', 50.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Este es el quinto cliente creado', 1, 1, 0, NULL, 2);
INSERT INTO `operation` VALUES(3, 3, '2012-11-06', 300.0000, 3, 'Cliente Tres', 30.0000, 0, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Este es el tercer cliente creado', 0, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(4, 4, '2012-11-07', 400.0000, 4, 'Cliente Cuatro', 40.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Este es el cuarto cliente', 0, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(6, 2, '2012-11-09', 600.0000, 2, 'Cliente Dos', 60.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Este es el sexto cliente creado', 1, 1, 0, NULL, 2);
INSERT INTO `operation` VALUES(7, 3, '2012-11-10', 700.0000, 3, 'Cliente TRES', 30.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Este es el cliente numero 7 creado. Y esta vez con actualizacion para ver el TS. Otra vez. Y nuevamente. Y una vez m''as.', 0, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(27, 1, '2012-12-20', 204.0000, 1, '', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'A ver', 0, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(28, 1, '2012-12-16', 451.0000, 1, '', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Todo el ciclo demo OK con 451 de platas', 0, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(25, 1, '2012-12-20', 500.0000, 1, '', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Mfops con 500', 0, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(32, 1, '2013-01-30', 10000.0000, 1, 'La artística', 1000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Compra de mobiliario en efectivo', 0, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(31, 1, '2013-01-24', 5000.0000, NULL, '', 5000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Prueba FINCA 2013', 0, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(30, 1, '2012-12-16', 5000.0000, NULL, '', 5000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '', 0, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(29, 1, '2012-12-16', 1000.0000, NULL, 'Artistica', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'hola', 0, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(24, 1, '2012-12-20', 1000.0000, NULL, '', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Mfops', 0, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(33, 1, '2013-01-30', 20000.0000, 3, '', 2000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Venta de mobiliario en efectivo', 0, 1, 0, NULL, 2);
INSERT INTO `operation` VALUES(34, 13, '2013-01-24', 25000.0000, NULL, 'Leopoldo Rojas Moguel', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Paso de dinero de caja a bancos. Vía Salida-Caja.', 0, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(35, 13, '2013-01-30', 41000.0000, 1, '', 2000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Paso de dinero de caja a bancos. Vía Salida-Caja', 0, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(36, 6, '2013-01-30', 5003.0000, 2, 'Con Gabriel Alberto', 10.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Venta de acciones a socio con cheque', 1, 1, 0, NULL, 2);
INSERT INTO `operation` VALUES(37, 1, '2013-05-02', 1000.0000, 1, 'detalle uno', 100.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'desc i', 0, 1, 0, NULL, 2);
INSERT INTO `operation` VALUES(38, 3, '2013-02-10', 2000.0000, 3, 'detalle dos2', 200.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddddd', 1, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(39, 1, '2013-05-02', 1000.0000, 1, 'Entidad nombre', 100.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd', 0, 1, 0, NULL, 2);
INSERT INTO `operation` VALUES(40, 3, '2013-02-09', 2000.0000, 2, 'Detalle Dos', 200.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'dsdsd', 1, 0, 0, NULL, 2);
INSERT INTO `operation` VALUES(41, 1, '2013-05-02', 2000.0000, 1, 'd', 100.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'sssfdOJO', 0, 1, 0, NULL, 2);
INSERT INTO `operation` VALUES(42, 1, '2013-05-02', 2000.0000, 1, 'd', 100.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'sssfdOJO', 0, 1, 0, NULL, 2);
INSERT INTO `operation` VALUES(43, 1, '2013-05-02', 2000.0000, 1, 'd', 100.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'sssfdOJO', 0, 1, 0, NULL, 2);
INSERT INTO `operation` VALUES(44, 4, '2013-02-10', 3000.0000, 1, 'dsfsf', 100.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'OJO2', 1, 1, 0, NULL, 2);
INSERT INTO `operation` VALUES(45, 14, '2013-05-02', 5000.0000, 1, 'Abraham Entidad', 500.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Primer detalle descrito', 1, 0, 20, NULL, 2);
INSERT INTO `operation` VALUES(46, 13, '2013-02-10', 15000.0000, 2, 'Gabriel Entidad', 1500.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Segundo detalle descrito', 0, 1, 20, NULL, 2);
INSERT INTO `operation` VALUES(47, 1, '2012-12-20', 1.0000, NULL, '', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '', 0, 1, 0, NULL, 2);
INSERT INTO `operation` VALUES(48, 1, '2012-12-20', 1200.0000, NULL, '', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '', 0, 1, 0, NULL, 2);
INSERT INTO `operation` VALUES(49, 1, '2013-05-02', 0.0000, NULL, '', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '', 0, 1, 21, NULL, 2);
INSERT INTO `operation` VALUES(50, 1, '2013-03-02', 0.0000, 1, '', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '', 0, 1, 22, NULL, 2);
INSERT INTO `operation` VALUES(51, 1, '0000-00-00', 12.0000, 1, '', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '', 0, 0, 29, NULL, 2);
INSERT INTO `operation` VALUES(52, 1, '0000-00-00', 899.0000, 1, 'Abrahm siiiii', 1000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'OJO. SI PASO.', 0, 1, 30, NULL, 2);
INSERT INTO `operation` VALUES(53, 1, '0000-00-00', 12.0000, NULL, '', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '', 0, 1, 0, NULL, 2);
INSERT INTO `operation` VALUES(54, 1, '2013-01-30', 980.0000, 1, '', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '', 0, 1, 0, NULL, 2);
INSERT INTO `operation` VALUES(55, 1, '2013-01-24', 105.0000, NULL, '', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '', 0, 1, 21, NULL, 2);
INSERT INTO `operation` VALUES(56, 1, '2013-05-02', 1000.0000, 1, 'Perfecto', 100.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Para Mambu', 0, 1, 31, NULL, 2);
INSERT INTO `operation` VALUES(57, 1, '2013-02-07', 505.0000, 1, 'Entidad Mambu', 101.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Descripcion para Mambu', 0, 1, 32, NULL, 2);
INSERT INTO `operation` VALUES(58, 1, '2013-02-21', 3500.0000, 1, 'Arckanto detalle', 500.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Primer movimiento detallado del 21 de feb', 0, 1, 34, NULL, 2);
INSERT INTO `operation` VALUES(59, 1, '2013-05-02', 1000.0000, 1, 'Componente', 100.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Componente', 0, 1, 38, NULL, 2);
INSERT INTO `operation` VALUES(60, 1, '2013-05-02', 1000.0000, 1, 'Componente', 100.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Componente', 0, 1, 39, NULL, 2);
INSERT INTO `operation` VALUES(61, 1, '2013-05-02', 1000.0000, 1, 'Componente', 100.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Componente', 0, 1, 43, NULL, 2);
INSERT INTO `operation` VALUES(62, 1, '2013-05-02', 1000.0000, 1, 'Componente', 100.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Componente', 0, 1, 48, NULL, 2);
INSERT INTO `operation` VALUES(63, 1, '2013-05-02', 333.0000, 1, 'c2', 3.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'c2', 0, 1, 54, NULL, 2);
INSERT INTO `operation` VALUES(64, 1, '2013-05-02', 333.0000, 1, 'c2', 3.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'c2', 0, 1, 55, NULL, 2);
INSERT INTO `operation` VALUES(65, 1, '2013-05-02', 333.0000, 1, 'eewe', 3.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd', 0, 1, 105, NULL, 2);
INSERT INTO `operation` VALUES(66, 1, '2013-05-02', 333.0000, 1, 'eewe', 3.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd', 0, 1, 107, NULL, 2);
INSERT INTO `operation` VALUES(67, 1, '2013-05-02', 333.0000, 1, 'eewe', 3.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd', 0, 1, 109, NULL, 2);
INSERT INTO `operation` VALUES(68, 1, '2013-05-02', 333.0000, 1, 'eewe', 3.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd', 0, 1, 113, NULL, 2);
INSERT INTO `operation` VALUES(69, 1, '2013-05-02', 333.0000, 1, 'eewe', 3.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd', 0, 1, 120, NULL, 2);
INSERT INTO `operation` VALUES(70, 1, '2013-05-02', 333.0000, 1, 'eewe', 3.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd', 0, 1, 127, NULL, 2);
INSERT INTO `operation` VALUES(71, 1, '2013-05-02', 333.0000, 1, 'eewe122', 3.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd122', 0, 1, 128, NULL, 2);
INSERT INTO `operation` VALUES(72, 1, '2013-02-10', 444.0000, 1, 'dddd123', 4.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd123', 0, 1, 128, NULL, 2);
INSERT INTO `operation` VALUES(73, 1, '2013-05-02', 333.0000, 1, 'eewe122', 3.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd122', 0, 1, 142, NULL, 2);
INSERT INTO `operation` VALUES(74, 1, '2013-02-10', 444.0000, 1, 'dddd123', 4.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd123', 0, 1, 142, NULL, 2);
INSERT INTO `operation` VALUES(75, 1, '2013-05-02', 333.0000, 1, 'eewe122', 3.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd122', 0, 1, 143, NULL, 2);
INSERT INTO `operation` VALUES(76, 1, '2013-02-10', 444.0000, 1, 'dddd123', 4.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd123', 0, 1, 143, NULL, 2);
INSERT INTO `operation` VALUES(77, 1, '2013-05-02', 333.0000, 1, 'eewe122', 3.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd122', 0, 1, 145, NULL, 2);
INSERT INTO `operation` VALUES(78, 1, '2013-02-10', 444.0000, 1, 'dddd123', 4.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd123', 0, 1, 145, NULL, 2);
INSERT INTO `operation` VALUES(79, 1, '2013-05-02', 333.0000, 1, 'eewe122', 3.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd122', 0, 1, 151, NULL, 2);
INSERT INTO `operation` VALUES(80, 1, '2013-02-10', 444.0000, 1, 'dddd123', 4.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd123', 0, 1, 151, NULL, 2);
INSERT INTO `operation` VALUES(81, 1, '2013-05-02', 1009.0000, 1, 'test1', 9.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'test1', 0, 1, 157, NULL, 2);
INSERT INTO `operation` VALUES(82, 1, '2013-02-10', 1008.0000, 1, 'test2', 8.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'test2', 0, 1, 157, NULL, 2);
INSERT INTO `operation` VALUES(83, 1, '2013-05-25', 2500.0000, 1, '25', 25.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '25', 0, 1, 176, NULL, 2);
INSERT INTO `operation` VALUES(84, 1, '2013-02-26', 2600.0000, 1, '26', 26.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '26', 0, 1, 176, NULL, 2);
INSERT INTO `operation` VALUES(85, 1, '2013-02-28', 100000.0000, 1, 'Entidad Detalle uno', 1000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Primer detalle sacrinsa', 0, 1, 184, NULL, 2);
INSERT INTO `operation` VALUES(86, 1, '2013-02-28', 100000.0000, 1, 'Entidad Detalle uno', 1000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Primer detalle sacrinsa', 0, 1, 185, NULL, 2);
INSERT INTO `operation` VALUES(87, 1, '2013-03-08', 100.0000, 1, 'hola', 10.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'hola', 0, 1, 187, NULL, 2);
INSERT INTO `operation` VALUES(88, 1, '2013-03-08', 60.0000, 1, 'hola', 10.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'hola', 0, 1, 188, NULL, 2);
INSERT INTO `operation` VALUES(89, 1, '2013-03-08', 40.0000, 1, 'bien', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '', 0, 0, 188, NULL, 2);
INSERT INTO `operation` VALUES(90, 1, '2013-03-08', 200.0000, 1, 'hola', 10.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'hola222', 0, 1, 189, NULL, 2);
INSERT INTO `operation` VALUES(91, 1, '2013-03-07', 190.0000, 1, 'hola', 10.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'hola222', 0, 1, 191, NULL, 2);
INSERT INTO `operation` VALUES(92, 1, '2013-03-07', 1902.0000, 1, 'hola', 10.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'hola222', 0, 1, 192, NULL, 2);
INSERT INTO `operation` VALUES(93, 1, '2013-03-06', 50000.0000, NULL, 'Ferretería', 5000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Reunion FNCA', 0, 1, 193, NULL, 2);
INSERT INTO `operation` VALUES(94, 1, '2013-03-26', 20000.0000, 2, 'Gabriel Nota', 2000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Primer detalle. SS', 0, 1, 194, NULL, 2);
INSERT INTO `operation` VALUES(95, 1, '2013-03-26', 20000.0000, 2, 'Gabriel Nota', 2000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Primer detalle. SS', 0, 1, 195, NULL, 2);
INSERT INTO `operation` VALUES(96, 1, '2013-03-25', 30000.0000, 2, 'Otra entidad', 3000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Otro más de SS', 0, 1, 196, NULL, 2);
INSERT INTO `operation` VALUES(97, 1, '2013-03-24', 15000.0000, 3, 'Mas de mas1', 5000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'el segundo de esta vez', 0, 1, 196, NULL, 2);
INSERT INTO `operation` VALUES(98, 1, '2013-03-23', 10000.0000, 1, 'primera', 1000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Primer detalle de 3 y 32', 0, 1, 197, NULL, 2);
INSERT INTO `operation` VALUES(99, 1, '2013-03-22', 20000.0000, 3, 'segunda', 2000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Segundo detalle de 3 y 32', 0, 1, 197, NULL, 2);
INSERT INTO `operation` VALUES(100, 1, '2013-01-21', 444.0000, 1, 'Primero', 222.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Detalle de las 3 y 51', 0, 1, 198, NULL, 2);
INSERT INTO `operation` VALUES(101, 1, '2013-01-21', 444.0000, 1, 'Primero', 222.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Detalle de las 3 y 51', 0, 1, 199, NULL, 2);
INSERT INTO `operation` VALUES(102, 1, '2013-03-20', 40000.0000, 1, 'mas', 2000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'de las 3 y 57', 0, 1, 200, NULL, 2);
INSERT INTO `operation` VALUES(103, 1, '2013-03-20', 40000.0000, 1, 'mas', 2000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'de las 3 y 57', 0, 1, 201, NULL, 2);
INSERT INTO `operation` VALUES(104, 1, '2013-03-20', 40000.0000, 1, 'mas', 2000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'de las 3 y 57', 0, 1, 202, NULL, 2);
INSERT INTO `operation` VALUES(105, 1, '2013-03-20', 40000.0000, 1, 'mas', 2000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'de las 3 y 57', 0, 1, 203, NULL, 2);
INSERT INTO `operation` VALUES(106, 1, '2013-03-20', 40000.0000, 1, 'mas', 2000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'de las 3 y 57', 0, 1, 204, NULL, 2);
INSERT INTO `operation` VALUES(107, 1, '2013-03-20', 40001.0000, 1, 'mas', 2000.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'de las 3 y 57', 0, 1, 205, NULL, 2);
INSERT INTO `operation` VALUES(108, 1, '2013-03-19', 12000.0000, 1, 'ddd', 100.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Detalle 4 y 6', 0, 1, 206, NULL, 2);
INSERT INTO `operation` VALUES(109, 1, '2013-03-19', 1000.0000, 1, 'dsds', 10.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '4 y 11', 0, 1, 207, NULL, 2);
INSERT INTO `operation` VALUES(110, 1, '2013-03-19', 3000.0000, 1, 'shdkjhf', 300.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '4 y 15', 0, 1, 208, NULL, 2);
INSERT INTO `operation` VALUES(111, 1, '2013-03-19', 4000.0000, 2, 'ddd', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '4 y 16', 0, 1, 209, NULL, 2);
INSERT INTO `operation` VALUES(112, 1, '2013-03-19', 5000.0000, 1, 'fdfdff', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '4 y 21', 0, 1, 210, NULL, 2);
INSERT INTO `operation` VALUES(113, 1, '2013-03-19', 6000.0000, 1, '424', 23.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'dsdd 4 y 24', 0, 1, 211, NULL, 2);
INSERT INTO `operation` VALUES(114, 1, '2013-03-19', 7000.0000, 1, 'llkd', 33.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '4 y 28', 0, 1, 212, NULL, 2);
INSERT INTO `operation` VALUES(115, 1, '2013-03-19', 8000.0000, 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '4 y 29', 0, 1, 213, NULL, 2);
INSERT INTO `operation` VALUES(116, 1, '2013-03-19', 9000.0000, 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '4 y 36', 0, 1, 214, NULL, 2);
INSERT INTO `operation` VALUES(117, 1, '2013-03-19', 1000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 215, NULL, 2);
INSERT INTO `operation` VALUES(118, 1, '2013-03-19', 2000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '4 y 42', 0, 1, 216, NULL, 2);
INSERT INTO `operation` VALUES(119, 1, '2013-03-19', 3000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 217, NULL, 2);
INSERT INTO `operation` VALUES(120, 1, '2013-03-19', 4000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 218, NULL, 2);
INSERT INTO `operation` VALUES(121, 1, '2013-03-19', 5000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 219, NULL, 2);
INSERT INTO `operation` VALUES(122, 1, '2013-03-19', 7000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 220, NULL, 2);
INSERT INTO `operation` VALUES(123, 1, '2013-03-19', 8000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 221, NULL, 2);
INSERT INTO `operation` VALUES(124, 1, '2013-03-19', 1000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', '5 y 03', 0, 1, 222, NULL, 2);
INSERT INTO `operation` VALUES(125, 1, '2013-03-19', 2000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 223, NULL, 2);
INSERT INTO `operation` VALUES(126, 1, '2013-03-19', 5000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 224, NULL, 2);
INSERT INTO `operation` VALUES(127, 1, '2013-03-19', 9000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 225, NULL, 2);
INSERT INTO `operation` VALUES(128, 1, '2013-03-19', 3000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 226, NULL, 2);
INSERT INTO `operation` VALUES(129, 1, '2013-03-26', 4000.0000, 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 227, NULL, 2);
INSERT INTO `operation` VALUES(130, 1, '2013-03-19', 6000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 228, NULL, 2);
INSERT INTO `operation` VALUES(131, 1, '2013-03-19', 7000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 229, NULL, 2);
INSERT INTO `operation` VALUES(132, 1, '2013-03-19', 8000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 230, NULL, 2);
INSERT INTO `operation` VALUES(133, 1, '2013-03-19', 9000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 231, NULL, 2);
INSERT INTO `operation` VALUES(134, 1, '2013-03-19', 1000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 232, NULL, 2);
INSERT INTO `operation` VALUES(135, 1, '2013-03-19', 2000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 233, NULL, 2);
INSERT INTO `operation` VALUES(136, 1, '2013-03-19', 2000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 234, NULL, 2);
INSERT INTO `operation` VALUES(137, 1, '2013-03-19', 4000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 235, NULL, 2);
INSERT INTO `operation` VALUES(138, 1, '2013-03-19', 5000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 236, NULL, 2);
INSERT INTO `operation` VALUES(139, 1, '2013-03-19', 6000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 237, NULL, 2);
INSERT INTO `operation` VALUES(140, 1, '2013-03-19', 7000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 238, NULL, 2);
INSERT INTO `operation` VALUES(141, 1, '2013-03-19', 7000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 239, NULL, 2);
INSERT INTO `operation` VALUES(142, 1, '2013-03-19', 8000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 240, NULL, 2);
INSERT INTO `operation` VALUES(143, 1, '2013-03-18', 6500.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 241, NULL, 2);
INSERT INTO `operation` VALUES(144, 1, '2013-03-18', 7500.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 242, NULL, 2);
INSERT INTO `operation` VALUES(145, 1, '2013-03-18', 8500.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 243, NULL, 2);
INSERT INTO `operation` VALUES(146, 1, '2013-03-18', 9500.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 244, NULL, 2);
INSERT INTO `operation` VALUES(147, 1, '2013-03-18', 1500.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 245, NULL, 2);
INSERT INTO `operation` VALUES(148, 1, '2013-03-18', 2500.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 246, NULL, 2);
INSERT INTO `operation` VALUES(149, 1, '2013-03-18', 3500.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 247, NULL, 2);
INSERT INTO `operation` VALUES(150, 8, '2013-03-18', 4500.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 1, 0, 248, NULL, 2);
INSERT INTO `operation` VALUES(151, 1, '2013-03-18', 9300.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 249, NULL, 2);
INSERT INTO `operation` VALUES(152, 1, '2013-03-18', 9300.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 250, NULL, 2);
INSERT INTO `operation` VALUES(153, 1, '2013-03-18', 9400.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 251, NULL, 2);
INSERT INTO `operation` VALUES(154, 1, '2013-04-07', 1000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'validator', 0, 1, 257, NULL, 2);
INSERT INTO `operation` VALUES(155, 1, '2013-04-06', 8000.0000, 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Movto 1', 0, 1, 258, NULL, 2);
INSERT INTO `operation` VALUES(156, 1, '2013-04-05', 765.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Movto 2', 0, 1, 258, NULL, 2);
INSERT INTO `operation` VALUES(157, 1, '2013-04-05', 2000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'dia5', 0, 1, 259, NULL, 2);
INSERT INTO `operation` VALUES(158, 1, '2013-04-06', 1000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'dia6', 0, 1, 259, NULL, 2);
INSERT INTO `operation` VALUES(159, 1, '2013-04-03', 1000.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'dia 3 second', 0, 1, 260, 122, 2);
INSERT INTO `operation` VALUES(160, 1, '2013-04-02', 500.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'dia 2 second', 0, 1, 260, 123, 2);
INSERT INTO `operation` VALUES(161, 1, '2013-04-01', 9999.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'perfecto', 0, 1, 261, 124, 2);
INSERT INTO `operation` VALUES(162, 1, '2013-04-29', 100.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'ddd', 0, 1, 262, 125, 2);
INSERT INTO `operation` VALUES(163, 1, '2013-04-29', 100.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 264, 126, 2);
INSERT INTO `operation` VALUES(164, 1, '2013-04-29', 100.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 267, 127, 2);
INSERT INTO `operation` VALUES(165, 1, '2013-04-29', 200.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'lkjkj', 0, 1, 271, 128, 2);
INSERT INTO `operation` VALUES(166, 1, '2013-04-29', 200.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'lkjkj', 0, 1, 272, 129, 2);
INSERT INTO `operation` VALUES(167, 1, '2013-04-29', 300.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 273, 130, 2);
INSERT INTO `operation` VALUES(168, 1, '2013-04-29', 500.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 274, 131, 2);
INSERT INTO `operation` VALUES(169, 1, '2013-04-30', 160.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'hjjh', 0, 1, 279, 132, 2);
INSERT INTO `operation` VALUES(170, 1, '2013-04-30', 180.0000, 1, 'primera', 100.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'detalle 1', 0, 1, 287, 133, 2);
INSERT INTO `operation` VALUES(171, 1, '2013-04-30', 181.0000, 1, 'segunda', 200.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'detalle 2', 0, 1, 287, 134, 2);
INSERT INTO `operation` VALUES(172, 1, '2013-05-02', 200.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 288, 135, 2);
INSERT INTO `operation` VALUES(173, 1, '2013-05-02', 234.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 289, 136, 2);
INSERT INTO `operation` VALUES(174, 1, '2013-05-02', 134.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 290, 137, 2);
INSERT INTO `operation` VALUES(175, 1, '2013-05-05', 193.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 293, 138, 2);
INSERT INTO `operation` VALUES(176, 1, '2013-05-05', 195.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 294, 139, 2);
INSERT INTO `operation` VALUES(177, 1, '2013-04-25', 197.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 295, 140, 2);
INSERT INTO `operation` VALUES(178, 1, '2013-05-05', 200.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 296, 141, 2);
INSERT INTO `operation` VALUES(179, 1, '2013-05-05', 333.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 297, 142, 2);
INSERT INTO `operation` VALUES(180, 1, '2013-05-05', 3333.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 298, 143, 2);
INSERT INTO `operation` VALUES(181, 1, '2013-05-05', 323.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 299, 144, 2);
INSERT INTO `operation` VALUES(182, 1, '2013-05-05', 344.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 300, 145, 2);
INSERT INTO `operation` VALUES(183, 1, '2013-05-05', 3333.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 301, 146, 2);
INSERT INTO `operation` VALUES(184, 1, '2013-04-26', 99.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 308, 147, 2);
INSERT INTO `operation` VALUES(185, 1, '2013-04-29', 111.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 309, 148, 2);
INSERT INTO `operation` VALUES(186, 1, '2013-04-28', 89.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 309, 149, 2);
INSERT INTO `operation` VALUES(187, 1, '2013-04-25', 99.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 310, 150, 2);
INSERT INTO `operation` VALUES(188, 1, '2013-04-24', 101.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 310, 151, 2);
INSERT INTO `operation` VALUES(189, 1, '2013-05-08', 34.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 313, 152, 2);
INSERT INTO `operation` VALUES(190, 1, '2013-05-08', 99.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 314, 153, 2);
INSERT INTO `operation` VALUES(191, 1, '2013-05-08', 100.0000, 3, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Detalle del uno', 0, 1, 315, 154, 2);
INSERT INTO `operation` VALUES(192, 1, '2013-05-07', 200.0000, 3, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Detalle del dos', 0, 1, 315, 155, 2);
INSERT INTO `operation` VALUES(193, 1, '2013-05-06', 300.0000, 1, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Detalle del 3', 0, 1, 315, 156, 2);
INSERT INTO `operation` VALUES(194, 1, '2013-05-05', 400.0000, 3, 'Entidad detalle', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Detalle del 4', 0, 1, 315, 157, 2);
INSERT INTO `operation` VALUES(195, 1, '2013-05-04', 500.0000, 2, 'Entidad detalle dos', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Detalle del 5', 0, 1, 315, 158, 2);
INSERT INTO `operation` VALUES(196, 1, '2013-05-03', 600.0000, 3, 'Entidad detalle tres', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Detalle del 6', 0, 1, 315, 159, 2);
INSERT INTO `operation` VALUES(197, 1, '2013-05-07', 400.0000, NULL, 'Se refleja en detalles', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 316, 160, 2);
INSERT INTO `operation` VALUES(198, 1, '2013-05-03', 200.0000, 2, 'ddddd', NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 317, 161, 2);
INSERT INTO `operation` VALUES(199, 1, '2013-05-09', 290.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 318, 162, 2);
INSERT INTO `operation` VALUES(200, 1, '2013-05-01', 188.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 319, 163, 2);
INSERT INTO `operation` VALUES(201, 1, '2013-05-02', 192.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 320, 164, 2);
INSERT INTO `operation` VALUES(202, 1, '2013-05-13', 190.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Detalle uno real', 0, 1, 321, 165, 2);
INSERT INTO `operation` VALUES(203, 1, '2013-05-13', 10.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 321, 166, 2);
INSERT INTO `operation` VALUES(204, 1, '2013-05-12', 180.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'UNO UNO', 0, 1, 322, 167, 2);
INSERT INTO `operation` VALUES(205, 1, '2013-05-12', 20.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 322, 168, 2);
INSERT INTO `operation` VALUES(206, 1, '2013-05-11', 170.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 323, 169, 2);
INSERT INTO `operation` VALUES(207, 1, '2013-05-11', 30.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Detalle dos', 0, 1, 323, 170, 2);
INSERT INTO `operation` VALUES(208, 1, '2013-05-02', 223.0000, NULL, NULL, NULL, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 330, 171, 2);
INSERT INTO `operation` VALUES(209, 1, '2013-05-15', 19.0000, NULL, NULL, 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 331, 172, 2);
INSERT INTO `operation` VALUES(210, 1, '2013-05-09', 222.0000, NULL, NULL, 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 333, 173, 2);
INSERT INTO `operation` VALUES(211, 1, '2013-05-09', 1.0000, NULL, NULL, 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 333, 174, 2);
INSERT INTO `operation` VALUES(212, 1, '2013-05-14', 2431902.0000, 1, NULL, 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 0, 1, 334, 175, 2);
INSERT INTO `operation` VALUES(213, 6, '2013-05-15', 50890.0000, NULL, NULL, 50890.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', NULL, 1, 1, 335, 176, 2);
INSERT INTO `operation` VALUES(217, 1, '2013-05-21', 56789.0000, 2, 'Detalle uno', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Este es la parte del detalle uno de la linea uno de los documentos', 0, 1, 339, 180, 2);
INSERT INTO `operation` VALUES(218, 1, '2013-05-20', 76290.0000, 3, 'Detalle dos', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Este es la segunda parte del detalle uno de la linea uno de los documentos', 0, 1, 339, 181, 2);
INSERT INTO `operation` VALUES(219, 1, '2013-05-19', 672000.0000, 4, 'Detalle tres', 0.0000, 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 'Este es la tercer parte del detalle uno de la linea uno de los documentos', 0, 1, 339, 182, 2);

-- --------------------------------------------------------

--
-- Table structure for table `operation_entity`
--

CREATE TABLE `operation_entity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `operation_entity`
--

INSERT INTO `operation_entity` VALUES(1, 'Abrahan Abarca Fuentes', 'cliente0001', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `operation_entity` VALUES(2, 'Gabriel Alberto Mendez Granados', 'cliente0104', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `operation_entity` VALUES(3, 'Dionicio Cubero Ledezma', 'cliente0025', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `operation_entity` VALUES(4, 'Dionicio Cuber Ledezma', '', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `operation_entity` VALUES(7, 'Entidad uno de la empresa Arckanto', 'E101', 1, '2013-06-02 12:21:53', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE `tbl_migration` (
  `version` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` VALUES('m000000_000000_base', 1351552689);
INSERT INTO `tbl_migration` VALUES('m121029_223429_addTableOperationTransaction', 1351552713);
INSERT INTO `tbl_migration` VALUES('m121104_132741_addColumnDescriptionToOperationTable', 1352035828);
INSERT INTO `tbl_migration` VALUES('m121104_135111_dropColumnInputInOperationTable', 1354566980);
INSERT INTO `tbl_migration` VALUES('m121203_203303_addColumnCajaOBancosToOperationTable', 1354566980);
INSERT INTO `tbl_migration` VALUES('m121203_203804_renameColumnBancoToBankInTableOperation', 1354567193);
INSERT INTO `tbl_migration` VALUES('m121203_210007_addColumnInputInOperationTable', 1354568465);
INSERT INTO `tbl_migration` VALUES('m121215_214956_createTableGLJournalEntry', 1355609523);
INSERT INTO `tbl_migration` VALUES('m121215_215210_createTableAccountingRule', 1355609524);
INSERT INTO `tbl_migration` VALUES('m121215_221619_createTableMovementType', 1355610449);
INSERT INTO `tbl_migration` VALUES('m121215_221636_createTableMovementCategory', 1355610450);
INSERT INTO `tbl_migration` VALUES('m121215_221903_createTableOperationEntity', 1355610450);
INSERT INTO `tbl_migration` VALUES('m121218_153251_addColumnsToAccountingRuleTable', 1355845415);
INSERT INTO `tbl_migration` VALUES('m121218_154108_addColumnsBankToAccountingRuleTable', 1355845423);
INSERT INTO `tbl_migration` VALUES('m130203_211056_addDocumentModel', 1359926356);
INSERT INTO `tbl_migration` VALUES('m130203_211153_addDocumentTypeModel', 1359926357);
INSERT INTO `tbl_migration` VALUES('m130203_213120_addDocumentToOperation', 1359927181);
INSERT INTO `tbl_migration` VALUES('m130302_153149_addOperationToJournalEntry2', 1362238358);
INSERT INTO `tbl_migration` VALUES('m130407_180422_addJournalEntryIDToOperationTable', 1365358116);
INSERT INTO `tbl_migration` VALUES('m130407_180457_removeOperationIDInJournalEntryTable', 1365358116);
INSERT INTO `tbl_migration` VALUES('m130430_172656_addNextDocumentNumberToDocumentType', 1367343061);
INSERT INTO `tbl_migration` VALUES('m130514_205609_addWithPriceColumToMovementType', 1368565044);
INSERT INTO `tbl_migration` VALUES('m130527_211530_addUserTable', 1369690411);
INSERT INTO `tbl_migration` VALUES('m130527_212511_addCompanyTable', 1369690411);
INSERT INTO `tbl_migration` VALUES('m130527_213512_addCompanyToAllTables', 1369691374);
INSERT INTO `tbl_migration` VALUES('m130527_224033_changeColumnRolToPermissionsLevel', 1369694775);
INSERT INTO `tbl_migration` VALUES('m130530_135110_addIdentifierToCompany', 1369921947);
INSERT INTO `tbl_migration` VALUES('m130604_235135_changePermissionByRolInUserTable', 1370390020);
INSERT INTO `tbl_migration` VALUES('m130605_192121_dropColumnRolInUserTable', 1370460149);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `encrypted_password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES(1, 'leopoldo.rojas', 'faeHAgOnspVw.', 'leopoldo.rojas@arckanto.com', 'Leopoldo Rojas Moguel', 1, 1, '2013-06-02 13:05:07', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES(2, 'masteradmin', 'faeHAgOnspVw.', 'masteradmin@edesacr.com', 'Administrador Master', 2, 1, '2013-06-02 13:05:13', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES(3, 'admin', 'faeHAgOnspVw.', 'admin@edesacr.com', 'Administrador EDESA', 2, 1, '2013-06-02 13:05:19', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES(4, 'user', 'hocY7ygwhciT.', 'info@edesacr.com', 'Usuario EDESA', 2, 1, '2013-06-02 13:05:26', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES(5, 'arckanto', 'faeHAgOnspVw.', 'info@arckanto.com', 'Administrador Arckanto software', 1, 1, '2013-06-02 13:05:32', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;