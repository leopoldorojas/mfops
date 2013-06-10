-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2013 at 08:22 AM
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
INSERT INTO `accounting_rule` VALUES(16, 1, 24, '11000200101', '173120007', 2, '2013-06-09 22:40:01', '0000-00-00 00:00:00', 'Venta de edificios e instalaciones con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(11, 0, 1, '173120001', '11000200101', 2, '2013-06-09 22:27:51', '0000-00-00 00:00:00', 'Compra de Mobiliario con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(12, 1, 1, '11000200101', '173120001', 2, '2013-06-09 22:29:39', '0000-00-00 00:00:00', 'Venta de mobiliario con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(13, 1, 3, '11000100101', '173120005', 2, '2013-06-09 22:31:36', '0000-00-00 00:00:00', 'Venta de equipo de cómputo en efectivo', 0, 2);
INSERT INTO `accounting_rule` VALUES(14, 1, 3, '11000200101', '173120005', 2, '2013-06-09 22:32:46', '0000-00-00 00:00:00', 'Venta de equipo de cómputo con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(15, 0, 3, '173120005', '11000100101', 2, '2013-06-09 22:33:57', '0000-00-00 00:00:00', 'Compra de equipo de cómputo en efectivo', 0, 2);
INSERT INTO `accounting_rule` VALUES(17, 0, 24, '173120007', '11000200101', 2, '2013-06-09 22:40:45', '0000-00-00 00:00:00', 'Compra de Edificios e Instalaciones con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(18, 0, 3, '173120005', '11000200101', 2, '2013-06-09 23:01:42', '0000-00-00 00:00:00', 'Compra de equipo de cómputo con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(19, 1, 25, '11000200101', '173120095', 2, '2013-06-09 23:03:27', '0000-00-00 00:00:00', 'Venta de instalación en proceso con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(20, 0, 25, '173120095', '11000200101', 2, '2013-06-09 23:04:20', '0000-00-00 00:00:00', 'Compra de instalación en proceso con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(21, 1, 26, '11000200101', '173120100', 2, '2013-06-09 23:05:27', '0000-00-00 00:00:00', 'Venta de terrenos con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(22, 0, 26, '173120100', '11000200101', 2, '2013-06-09 23:10:16', '0000-00-00 00:00:00', 'Compra de Terrenos con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(23, 1, 4, '11000100101', '183001001', 2, '2013-06-09 23:15:12', '0000-00-00 00:00:00', 'Liquidación de Inversiones en EDESA en efectivo', 0, 2);
INSERT INTO `accounting_rule` VALUES(24, 1, 4, '11000200101', '183001001', 2, '2013-06-09 23:16:14', '0000-00-00 00:00:00', 'Liquidación de Inversiones en EDESA recibiendo cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(25, 0, 4, '183001001', '11000100101', 2, '2013-06-09 23:16:59', '0000-00-00 00:00:00', 'Inversión en EDESA en efectivo', 0, 2);
INSERT INTO `accounting_rule` VALUES(26, 0, 4, '183001001', '11000200101', 2, '2013-06-09 23:17:48', '0000-00-00 00:00:00', 'Inversión en EDESA con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(27, 1, 6, '11000100101', '31100100101', 2, '2013-06-09 23:29:41', '0000-00-00 00:00:00', 'Venta, en efectivo, de acciones a socio', 0, 2);
INSERT INTO `accounting_rule` VALUES(28, 1, 7, '11000100101', '31100100102', 2, '2013-06-09 23:30:50', '0000-00-00 00:00:00', 'Venta, en efectivo, de acciones capital adicional', 0, 2);
INSERT INTO `accounting_rule` VALUES(29, 1, 7, '11000200101', '31100100102', 2, '2013-06-09 23:35:15', '0000-00-00 00:00:00', 'Venta, con cheque, de acciones capital adicional', 1, 2);
INSERT INTO `accounting_rule` VALUES(30, 0, 8, '41100100106', '11000100101', 2, '2013-06-09 23:38:16', '0000-00-00 00:00:00', 'Pago de servicios profesionales en efectivo', 0, 2);
INSERT INTO `accounting_rule` VALUES(31, 0, 31, '41100100114', '11000100101', 2, '2013-06-09 23:39:16', '0000-00-00 00:00:00', 'Gastos administrativos en efectivo', 0, 2);
INSERT INTO `accounting_rule` VALUES(32, 0, 31, '41100100114', '11000200101', 2, '2013-06-09 23:39:34', '0000-00-00 00:00:00', 'Gastos administrativos con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(33, 0, 32, '41100100116', '11000200101', 2, '2013-06-09 23:40:02', '0000-00-00 00:00:00', 'Mensajería con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(34, 0, 32, '41100100116', '11000100101', 2, '2013-06-09 23:40:15', '0000-00-00 00:00:00', 'Mensajería en efectivo', 0, 2);
INSERT INTO `accounting_rule` VALUES(35, 0, 35, '41100100123', '11000100101', 2, '2013-06-09 23:40:40', '0000-00-00 00:00:00', 'Servicio eléctrico, pago en efectivo', 0, 2);
INSERT INTO `accounting_rule` VALUES(38, 0, 34, '41100100121', '11000200101', 2, '2013-06-09 23:50:39', '0000-00-00 00:00:00', 'Pago de agua con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(37, 0, 33, '41100100117', '11000200101', 2, '2013-06-09 23:49:43', '0000-00-00 00:00:00', 'Pago de Auditoría con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(39, 0, 34, '41100100121', '11000100101', 2, '2013-06-09 23:50:59', '0000-00-00 00:00:00', 'Pago de agua en efectivo', 0, 2);
INSERT INTO `accounting_rule` VALUES(40, 0, 35, '41100100123', '11000200101', 2, '2013-06-09 23:52:03', '0000-00-00 00:00:00', 'Pago de teléfono con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(41, 0, 36, '41100100122', '11000100101', 2, '2013-06-09 23:54:10', '0000-00-00 00:00:00', 'Pago de Luz en efectivo', 0, 2);
INSERT INTO `accounting_rule` VALUES(42, 0, 36, '41100100122', '11000200101', 2, '2013-06-09 23:54:25', '0000-00-00 00:00:00', 'Pago de Luz con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(43, 0, 37, '41100100136', '11000200101', 2, '2013-06-09 23:55:23', '0000-00-00 00:00:00', 'Papelería y útiles de oficina. Pago con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(44, 0, 37, '41100100136', '11000100101', 2, '2013-06-09 23:55:38', '0000-00-00 00:00:00', 'Papelería y útiles de oficina. Efectivo.', 0, 2);
INSERT INTO `accounting_rule` VALUES(45, 0, 41, '41100100144', '11000100101', 2, '2013-06-09 23:56:38', '0000-00-00 00:00:00', 'Viáticos, parqueos y peajes', 0, 2);
INSERT INTO `accounting_rule` VALUES(46, 0, 42, '41100100145', '11000200101', 2, '2013-06-09 23:57:23', '0000-00-00 00:00:00', 'Alquiler de oficina', 1, 2);
INSERT INTO `accounting_rule` VALUES(47, 0, 43, '41100100146', '11000200101', 2, '2013-06-09 23:57:41', '0000-00-00 00:00:00', 'Alquiler de sistema de crédito', 1, 2);
INSERT INTO `accounting_rule` VALUES(48, 0, 44, '41100100147', '11000100101', 2, '2013-06-09 23:58:35', '0000-00-00 00:00:00', 'Limpieza de oficina y materiales de aseo', 0, 2);
INSERT INTO `accounting_rule` VALUES(49, 0, 48, '41100100154', '11000100101', 2, '2013-06-09 23:59:07', '0000-00-00 00:00:00', 'Asamblea anual. Pagos efectivo.', 0, 2);
INSERT INTO `accounting_rule` VALUES(50, 0, 48, '41100100154', '11000200101', 2, '2013-06-09 23:59:22', '0000-00-00 00:00:00', 'Asamblea anual. Pagos con cheque.', 1, 2);
INSERT INTO `accounting_rule` VALUES(51, 0, 52, '41100100178', '11000200101', 2, '2013-06-10 00:00:37', '0000-00-00 00:00:00', 'Atención a socios y visitas. Pagos con cheque.', 1, 2);
INSERT INTO `accounting_rule` VALUES(52, 0, 52, '41100100178', '11000100101', 2, '2013-06-10 00:00:59', '0000-00-00 00:00:00', 'Atención a socios y visitas. En efectivo.', 0, 2);
INSERT INTO `accounting_rule` VALUES(53, 0, 53, '41100100179', '11000200101', 2, '2013-06-10 00:01:29', '0000-00-00 00:00:00', 'Promoción y publicidad. ', 1, 2);
INSERT INTO `accounting_rule` VALUES(54, 0, 56, '41100100998', '11000200101', 2, '2013-06-10 00:02:24', '0000-00-00 00:00:00', 'Gastos diversos con cheque', 1, 2);
INSERT INTO `accounting_rule` VALUES(55, 0, 56, '41100100998', '11000100101', 2, '2013-06-10 00:02:55', '0000-00-00 00:00:00', 'Gastos diversos en efectivo', 0, 2);
INSERT INTO `accounting_rule` VALUES(56, 1, 11, '11000200101', '22000100201', 2, '2013-06-10 08:10:28', '0000-00-00 00:00:00', 'Documentos por pagar a EDESA', 1, 2);
INSERT INTO `accounting_rule` VALUES(57, 0, 11, '22000100201', '11000200101', 2, '2013-06-10 08:11:25', '0000-00-00 00:00:00', 'Pago Documento por pagar EDESA', 1, 2);
INSERT INTO `accounting_rule` VALUES(58, 0, 62, '22000103001', '11000200101', 2, '2013-06-10 08:12:03', '0000-00-00 00:00:00', 'Pago Préstamos de Socios', 1, 2);
INSERT INTO `accounting_rule` VALUES(59, 1, 62, '11000200101', '22000103001', 2, '2013-06-10 08:12:22', '0000-00-00 00:00:00', 'Préstamos de Socios', 1, 2);
INSERT INTO `accounting_rule` VALUES(60, 0, 12, '41100200101', '11000200101', 2, '2013-06-10 08:18:32', '0000-00-00 00:00:00', 'Pago de Intereses EDESA', 1, 2);
INSERT INTO `accounting_rule` VALUES(61, 0, 66, '41100200102', '11000200101', 2, '2013-06-10 08:19:16', '0000-00-00 00:00:00', 'Pago de Intereses bancarios', 1, 2);
INSERT INTO `accounting_rule` VALUES(62, 0, 64, '41100200121', '11000200101', 2, '2013-06-10 08:19:58', '0000-00-00 00:00:00', 'Pago de comisiones corrientes', 1, 2);
INSERT INTO `accounting_rule` VALUES(63, 0, 58, '41100299999', '11000200101', 2, '2013-06-10 08:21:01', '0000-00-00 00:00:00', 'Otros gastos financieros', 1, 2);

--
-- Dumping data for table `AuthAssignment`
--

INSERT INTO `AuthAssignment` VALUES('app-user', '4', NULL, 'N;');
INSERT INTO `AuthAssignment` VALUES('arckanto-admin', '5', NULL, 'N;');
INSERT INTO `AuthAssignment` VALUES('company-admin', '22', NULL, 'N;');
INSERT INTO `AuthAssignment` VALUES('company-admin', '23', NULL, 'N;');
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
INSERT INTO `movement_type` VALUES(9, 4, 'Sueldos', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(11, 5, 'Documentos por pagar EDESA M.N.', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(12, 5, 'Intereses EDESA', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(13, 6, 'Pasar dinero de caja a bancos', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(14, 6, 'Pasar dinero de bancos a caja', 1, '2013-05-30 07:46:51', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(27, 4, 'Cargas sociales', 2, '2013-06-09 22:45:31', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(63, 5, 'Intereses otros', 2, '2013-06-10 08:15:16', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(24, 1, 'Edificios e Instalaciones', 2, '2013-06-09 22:37:27', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(25, 1, 'Instalaciones en proceso', 2, '2013-06-09 22:43:19', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(26, 1, 'Terrenos', 2, '2013-06-09 22:43:46', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(28, 4, 'Aguinaldos', 2, '2013-06-09 22:45:48', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(29, 4, 'Becas y Capacitación', 2, '2013-06-09 22:46:36', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(30, 4, 'Servicios contratados', 2, '2013-06-09 22:46:54', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(31, 4, 'Gastos administrativos', 2, '2013-06-09 22:47:12', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(32, 4, 'Mensajería', 2, '2013-06-09 22:47:20', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(33, 4, 'Auditoría', 2, '2013-06-09 22:47:29', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(34, 4, 'Servicio de agua', 2, '2013-06-09 22:47:44', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(35, 4, 'Servicio telefónico', 2, '2013-06-09 22:48:00', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(36, 4, 'Servicio eléctrico', 2, '2013-06-09 22:48:29', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(37, 4, 'Papelería y útiles de oficina', 2, '2013-06-09 22:49:05', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(38, 4, 'Mantenimiento y reparación de vehículos', 2, '2013-06-09 22:49:25', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(39, 4, 'Mantenimiento y reparación mobiliario y equipo', 2, '2013-06-09 22:50:01', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(40, 4, 'Combustibles y lubricantes', 2, '2013-06-09 22:50:17', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(41, 4, 'Viáticos, parqueos y peajes', 2, '2013-06-09 22:50:36', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(42, 4, 'Alquiler de oficina', 2, '2013-06-09 22:50:50', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(43, 4, 'Alquiler por sistema de crédito', 2, '2013-06-09 22:51:03', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(44, 4, 'Limpieza de oficina, materiales de aseo', 2, '2013-06-09 22:51:25', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(45, 4, 'Mantenimiento de instalaciones', 2, '2013-06-09 22:51:41', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(46, 4, 'Alimentación', 2, '2013-06-09 22:51:52', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(47, 4, 'Comunicaciones', 2, '2013-06-09 22:52:05', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(48, 4, 'Asamblea anual', 2, '2013-06-09 22:52:19', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(49, 4, 'Obsequios y regalías', 2, '2013-06-09 22:52:36', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(50, 4, 'Hospedaje', 2, '2013-06-09 22:52:45', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(51, 4, 'Impuestos y derechos', 2, '2013-06-09 22:53:04', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(52, 4, 'Atención a socios y visitas', 2, '2013-06-09 22:53:12', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(53, 4, 'Promoción y publicidad', 2, '2013-06-09 22:53:55', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(54, 4, 'Actividades sociales', 2, '2013-06-09 22:54:03', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(55, 4, 'Viáticos y traslados', 2, '2013-06-09 22:54:18', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(56, 4, 'Gastos diversos', 2, '2013-06-09 22:54:33', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(57, 4, 'Papelería  ', 2, '2013-06-09 22:55:57', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(58, 5, 'Otros gastos financieros', 2, '2013-06-09 22:56:43', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(60, 5, 'Documento por pagar. Banco Nacional. M.N.', 2, '2013-06-10 08:08:40', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(61, 5, 'Documento por pagar. Crédito Revolutivo.', 2, '2013-06-10 08:08:56', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(62, 5, 'Documento por pagar. Préstamos de socios.', 2, '2013-06-10 08:09:09', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(64, 5, 'Comisiones corrientes', 2, '2013-06-10 08:15:28', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(65, 5, 'Comisiones bancarias', 2, '2013-06-10 08:15:41', '0000-00-00 00:00:00', 0, 2);
INSERT INTO `movement_type` VALUES(66, 5, 'Intereses bancarios', 2, '2013-06-10 08:16:00', '0000-00-00 00:00:00', 0, 2);

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
INSERT INTO `user` VALUES(22, 'luis.jimenez', '12Bz/9hNlPLZk', '', 'Luis Jiménez', 2, 1, '2013-06-09 22:11:54', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES(23, 'luis.cordero', '12Bz/9hNlPLZk', '', 'Luis Cordero', 2, 1, '2013-06-09 22:12:39', '0000-00-00 00:00:00');
