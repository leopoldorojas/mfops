-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2013 at 10:06 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `mfops`
--

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

--
-- Dumping data for table `AuthAssignment`
--

INSERT INTO `AuthAssignment` VALUES('app-user', '4', NULL, 'N;');
INSERT INTO `AuthAssignment` VALUES('arckanto-admin', '5', NULL, 'N;');
INSERT INTO `AuthAssignment` VALUES('company-admin', '3', NULL, 'N;');
INSERT INTO `AuthAssignment` VALUES('master-admin', '2', NULL, 'N;');
INSERT INTO `AuthAssignment` VALUES('super-admin', '1', NULL, 'N;');

--
-- Dumping data for table `AuthItem`
--

INSERT INTO `AuthItem` VALUES('app-user', 2, 'Application user', NULL, 'N;');
INSERT INTO `AuthItem` VALUES('arckanto-admin', 2, 'Arckanto Admin user', NULL, 'N;');
INSERT INTO `AuthItem` VALUES('company-admin', 2, 'Company Admin user', NULL, 'N;');
INSERT INTO `AuthItem` VALUES('master-admin', 2, 'Master Admin user', NULL, 'N;');
INSERT INTO `AuthItem` VALUES('notDeleteOwnUser', 0, 'Not allow to delete own user', 'return Yii::app()->user->id != $params["user"]->id;', 'N;');
INSERT INTO `AuthItem` VALUES('super-admin', 2, 'Super Admin user', NULL, 'N;');

--
-- Dumping data for table `AuthItemChild`
--

INSERT INTO `AuthItemChild` VALUES('company-admin', 'app-user');
INSERT INTO `AuthItemChild` VALUES('super-admin', 'arckanto-admin');
INSERT INTO `AuthItemChild` VALUES('master-admin', 'company-admin');
INSERT INTO `AuthItemChild` VALUES('arckanto-admin', 'master-admin');

--
-- Dumping data for table `company`
--

INSERT INTO `company` VALUES(1, 'Arckanto software', '3-101-202234', 'De la entrada principal del Colegio Técnico de Calle Blancos', '50 Sur, 25 Oeste. Urbanización La Católica', 'San José', 'Costa Rica', '8399-1039', 'info@arckanto.com', 'http://www.arckanto.com', 'https://sacrinsa.sandbox.mambu.com', 'lucor123', 'lmcr1963', 1, '2013-05-27 00:00:00', '0000-00-00 00:00:00', 'arckanto');
INSERT INTO `company` VALUES(2, 'Empresa para el Desarrollo EDESA, S.A.', '3-101-123456', '200 metros norte y 25 metros este del parqueo del hotel San José Palacio', '', 'San José', 'Costa Rica', '2520 2076', 'info@edesacr.com', 'http://edesacr.com', 'https://sacrinsa.sandbox.mambu.com', 'lucor123', 'lmcr1963', 1, '2013-05-27 00:00:00', '0000-00-00 00:00:00', 'edesa');

--
-- Dumping data for table `document`
--


--
-- Dumping data for table `document_type`
--

INSERT INTO `document_type` VALUES(1, 'Factura', 0, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `document_type` VALUES(2, 'Recibo', 0, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 15, 2);

--
-- Dumping data for table `journal_entry`
--


--
-- Dumping data for table `movement_category`
--

INSERT INTO `movement_category` VALUES(1, 'Activo Fijo', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `movement_category` VALUES(2, 'Otros Activos', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `movement_category` VALUES(3, 'Venta de Acciones', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `movement_category` VALUES(4, 'Gasto Operativo', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `movement_category` VALUES(5, 'Movimiento de Pasivo', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `movement_category` VALUES(6, 'Movimiento interno Caja Bancos', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);

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

--
-- Dumping data for table `operation`
--


--
-- Dumping data for table `operation_entity`
--

INSERT INTO `operation_entity` VALUES(1, 'Abrahan Abarca Fuentes', 'cliente0001', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `operation_entity` VALUES(2, 'Gabriel Alberto Mendez Granados', 'cliente0104', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `operation_entity` VALUES(3, 'Dionicio Cubero Ledezma', 'cliente0025', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 2);
INSERT INTO `operation_entity` VALUES(7, 'Entidad uno de la empresa Arckanto', 'E101', 1, '2013-06-02 12:21:53', '0000-00-00 00:00:00', 1);

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

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES(1, 'leopoldo.rojas', 'faeHAgOnspVw.', 'leopoldo.rojas@arckanto.com', 'Leopoldo Rojas Moguel', 1, 1, '2013-06-02 13:05:07', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES(2, 'masteradmin', 'faeHAgOnspVw.', 'masteradmin@edesacr.com', 'Administrador Master', 2, 1, '2013-06-02 13:05:13', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES(3, 'admin', 'faeHAgOnspVw.', 'admin@edesacr.com', 'Administrador EDESA', 2, 1, '2013-06-02 13:05:19', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES(4, 'user', 'hocY7ygwhciT.', 'info@edesacr.com', 'Usuario EDESA', 2, 1, '2013-06-02 13:05:26', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES(5, 'arckanto', 'faeHAgOnspVw.', 'info@arckanto.com', 'Administrador Arckanto software', 1, 1, '2013-06-02 13:05:32', '0000-00-00 00:00:00');
