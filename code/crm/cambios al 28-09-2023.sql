-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 172.17.0.1
-- Tiempo de generación: 28-09-2023 a las 21:05:23
-- Versión del servidor: 8.1.0
-- Versión de PHP: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblactivity_log`
--

CREATE TABLE `tblactivity_log` (
  `id` int NOT NULL,
  `description` mediumtext NOT NULL,
  `date` datetime NOT NULL,
  `staffid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblactivity_log`
--

INSERT INTO `tblactivity_log` (`id`, `description`, `date`, `staffid`) VALUES
(1, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-05-22 09:10:06', 'Administrador Local'),
(2, 'New Customer Group Created [ID:1, Name:IT]', '2023-05-22 10:18:51', 'Administrador Local'),
(3, 'New Client Created [ID: 1, From Staff: 1]', '2023-05-22 10:19:41', 'Administrador Local'),
(4, 'Non Existing User Tried to Login [Email: admin@some-domain.net, Is Staff Member: No, IP: 127.0.0.1]', '2023-05-22 10:28:30', 'Administrador Local'),
(5, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-05-23 08:32:49', 'Administrador Local'),
(6, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-05-23 08:32:49', 'Administrador Local'),
(7, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-05-25 14:10:56', 'Administrador Local'),
(8, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-05-26 13:06:02', 'Administrador Local'),
(9, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-05-29 08:59:06', 'Administrador Local'),
(10, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-05-31 15:14:31', 'Administrador Local'),
(11, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-06-06 08:32:43', 'Administrador Local'),
(12, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-06-07 16:01:00', 'Administrador Local'),
(13, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-06-12 15:04:11', 'Administrador Local'),
(14, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-06-12 16:20:53', 'Administrador Local'),
(15, 'Non Existing User Tried to Login [Email: admin@some-domain.com, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-06-13 10:47:53', NULL),
(16, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-06-13 10:48:05', 'Administrador Local'),
(17, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-06-14 09:41:54', 'Administrador Local'),
(18, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-06-15 08:43:50', 'Administrador Local'),
(19, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-06-19 08:47:46', 'Administrador Local'),
(20, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-06-21 09:05:33', 'Administrador Local'),
(21, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-06-23 08:15:50', 'Administrador Local'),
(22, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-06-29 08:14:22', 'Administrador Local'),
(23, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-06-30 09:30:49', 'Administrador Local'),
(24, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-07-03 10:41:04', 'Administrador Local'),
(25, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-07-04 07:50:29', 'Administrador Local'),
(26, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-07-04 15:39:37', 'Administrador Local'),
(27, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-07-05 08:35:21', 'Administrador Local'),
(28, 'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>', '2023-07-05 08:36:26', 'Administrador Local'),
(29, 'Contact Created [ID: 1]', '2023-07-05 08:36:26', 'Administrador Local'),
(30, 'User Successfully Logged In [User Id: 1, Is Staff Member: No, IP: ::1]', '2023-07-05 08:36:58', 'Bryan Useche'),
(31, 'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>', '2023-07-05 08:37:45', 'Bryan Useche'),
(32, 'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>', '2023-07-05 08:37:45', 'Bryan Useche'),
(33, 'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>', '2023-07-05 08:37:45', 'Bryan Useche'),
(34, 'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>', '2023-07-05 08:37:45', 'Bryan Useche'),
(35, 'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>', '2023-07-05 08:37:45', 'Bryan Useche'),
(36, 'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>', '2023-07-05 08:37:45', 'Bryan Useche'),
(37, 'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>', '2023-07-05 08:37:45', 'Bryan Useche'),
(38, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-07-06 08:15:12', 'Administrador Local'),
(39, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-07-10 08:45:39', 'Administrador Local'),
(40, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-07-11 08:45:15', 'Administrador Local'),
(41, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-07-13 08:16:09', 'Administrador Local'),
(42, 'Failed Login Attempt [Email: bryan.useche.10@gmail.com, Is Staff Member: No, IP: 127.0.0.1]', '2023-07-13 16:10:12', 'Administrador Local'),
(43, 'Non Existing User Tried to Login [Email: admin@some-domain.net, Is Staff Member: No, IP: 127.0.0.1]', '2023-07-13 16:10:17', 'Administrador Local'),
(44, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-07-14 08:27:45', 'Administrador Local'),
(45, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-07-17 09:10:46', 'Administrador Local'),
(46, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-07-17 09:28:07', 'Administrador Local'),
(47, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-07-18 08:03:17', 'Administrador Local'),
(48, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-07-19 08:27:33', 'Administrador Local'),
(49, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-03 14:00:18', 'Administrador Local'),
(50, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-04 13:34:58', 'Administrador Local'),
(51, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-07 09:12:38', 'Administrador Local'),
(52, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-08 13:56:02', 'Administrador Local'),
(53, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-09 09:13:07', 'Administrador Local'),
(54, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-10 08:39:59', 'Administrador Local'),
(55, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-15 08:01:29', 'Administrador Local'),
(56, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-16 08:33:35', 'Administrador Local'),
(57, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-17 08:45:54', 'Administrador Local'),
(58, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-18 10:33:41', 'Administrador Local'),
(59, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-21 08:25:35', 'Administrador Local'),
(60, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-22 08:24:51', 'Administrador Local'),
(61, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-23 09:06:21', 'Administrador Local'),
(62, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-24 08:32:21', 'Administrador Local'),
(63, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-25 08:22:08', 'Administrador Local'),
(64, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-28 08:55:28', 'Administrador Local'),
(65, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-29 08:17:29', 'Administrador Local'),
(66, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]', '2023-08-29 11:35:07', 'Administrador Local'),
(67, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-08-30 11:00:18', 'Administrador Local'),
(68, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-09-05 11:47:08', 'Administrador Local'),
(69, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-09-18 10:54:38', 'Administrador Local'),
(70, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-09-27 16:11:21', 'Administrador Local'),
(71, 'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]', '2023-09-28 08:15:16', 'Administrador Local');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblallowance_type`
--

CREATE TABLE `tblallowance_type` (
  `type_id` int UNSIGNED NOT NULL,
  `type_name` varchar(200) NOT NULL,
  `allowance_val` decimal(15,2) NOT NULL,
  `taxable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblannouncements`
--

CREATE TABLE `tblannouncements` (
  `announcementid` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `message` text,
  `showtousers` int NOT NULL,
  `showtostaff` int NOT NULL,
  `showname` int NOT NULL,
  `dateadded` datetime NOT NULL,
  `userid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblclients`
--

CREATE TABLE `tblclients` (
  `userid` int NOT NULL,
  `company` varchar(191) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `phonenumber` varchar(30) DEFAULT NULL,
  `country` int NOT NULL DEFAULT '0',
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(15) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `leadid` int DEFAULT NULL,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int DEFAULT '0',
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int DEFAULT '0',
  `longitude` varchar(191) DEFAULT NULL,
  `latitude` varchar(191) DEFAULT NULL,
  `default_language` varchar(40) DEFAULT NULL,
  `default_currency` int NOT NULL DEFAULT '0',
  `show_primary_contact` int NOT NULL DEFAULT '0',
  `stripe_id` varchar(40) DEFAULT NULL,
  `registration_confirmed` int NOT NULL DEFAULT '1',
  `addedfrom` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblclients`
--

INSERT INTO `tblclients` (`userid`, `company`, `vat`, `phonenumber`, `country`, `city`, `zip`, `state`, `address`, `website`, `datecreated`, `active`, `leadid`, `billing_street`, `billing_city`, `billing_state`, `billing_zip`, `billing_country`, `shipping_street`, `shipping_city`, `shipping_state`, `shipping_zip`, `shipping_country`, `longitude`, `latitude`, `default_language`, `default_currency`, `show_primary_contact`, `stripe_id`, `registration_confirmed`, `addedfrom`) VALUES
(1, 'Bucketcode', '15467897', '04141256752', 242, 'caracas', '1010', 'capital district', 'somewhere place in the f***** world', 'bucketcode.com', '2023-05-22 10:19:41', 1, NULL, '', '', '', '', 0, '', '', '', '', 0, NULL, NULL, 'spanish', 1, 0, NULL, 1, 1),
(7, 'A02-Arcom Internacional', 'J-312880228', '(0245) 5717577/ 9655/ 6495', 242, 'Maracay', '', 'Aragua', 'Av. Constitución, Diagonal a Cocadas Aragua, Local 108- 23, sector La Barraca.', '', '2022-11-04 22:36:02', 1, NULL, 'Avenida Constitución, Diagonal a Cocadas Aragua, Local 108- 23, sector La Barraca.', 'Maracay', 'Aragua', '', 992, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(9, 'P01-Prokpil', 'NIT 9010355611', '+573147607912', 49, 'Candelaria', '', 'Valle del Cauca', 'Km 1,5 Vía Cavasa, Condominio Industrial La Nubia, Bodegas 1 y 2,', 'www.prokpil.com.co', '2022-11-04 22:55:56', 1, NULL, '', '', '', '', 0, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(10, 'O01-Operadora CICSA, S.A. de C.V.', '', '', 142, 'Ciudad de México', '11529', 'Distrito Federal', 'Calle Zurich 245 Edificio Frisco piso 2 Ampliación Granada', 'www.cicsa.com.mx', '2022-11-21 11:34:14', 1, 9, 'Calle Zurich 245 Edificio Frisco piso 2 Ampliación Granada', 'Ciudad de México', 'Distrito Federal', '11529', 142, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(11, 'B01-Bernal & Bernal', '', '+5072643863', 170, 'Ciudad de Panamá', '87-3930 Zona 7', '', 'Calle 50, Edificio 2000, piso 7.', '', '2022-11-21 11:55:39', 1, 10, 'Calle 50, Edificio 2000, piso 7.', 'Ciudad de Panamá', '', '87-3930 Zona 7', 170, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(12, 'C02-Consutel Telecommunications of America Corp, C.A.', '', '', 242, 'Caracas', '1060', 'Chacao', 'Avenida Ernesto Blohm, Edificio IBM, piso 6, Chuao. Municipio Chacao', '', '2022-11-21 12:11:20', 1, 11, 'Avenida Ernesto Blohm, Edificio IBM, piso 6, Chuao. Municipio Chacao', 'Caracas', 'Chacao', '1060', 242, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(13, 'E02-El Bombón Dorado, C.A.', '', '', 0, 'Caracas', '1050', 'Caracas', 'Caracas', '', '2022-11-21 12:20:42', 1, 12, 'Caracas', 'Caracas', 'Caracas', '1050', 0, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(14, 'D02-Distribuidora C.A.D.I, 18, C.A.', '', '', 242, 'Los Teques', '', 'Miranda', 'Los Teques', '', '2022-11-21 12:44:04', 1, 3, 'Los Teques', 'Los Teques', 'Miranda', '', 242, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(15, 'E01-ECV & Asociados Abogados, S.C.', '', '+582127623827', 242, 'Sabana Grande', '1050', 'Caracas', 'Calle La Iglesia, Edificio Centro Solano Plaza I, piso 4, Oficina 4-B', '', '2022-11-25 14:57:14', 1, NULL, '', '', '', '', 0, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(16, 'C01-Cavelier Abogados', '', '+576013473611', 49, 'Bogotá', '', 'Cundinamarca', 'Carrera 4, Número 72 A-35, Edificio Siski', 'www.cavelier.com', '2022-11-26 22:04:37', 1, 14, 'Carrera 4, Número 72 A-35, Edificio Siski', 'Bogotá', 'Cundinamarca', '', 49, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(17, 'I01-IOberti Legal', '', '+13057285255', 236, 'Miami', '33131', 'FL', '701 Brickell Avenue. Suite 1550', 'www.iobertilegal.com', '2022-12-12 09:47:03', 1, 17, '701 Brickell Avenue. Suite 1550', 'Miami', 'FL', '33131', 236, '701 Brickell Avenue. Suite 1550', 'Miami', 'FL', '33131', 236, NULL, NULL, '', 4, 0, NULL, 1, 2),
(18, 'Miami Fine Food, LLC', '', '', 236, 'Miami', '', 'FL', 'Attn: Avi Assor', '', '2022-12-28 21:49:13', 1, NULL, '', '', '', '', 0, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(19, 'A03-Agrocasa, C.A.', '', '+34648640852', 242, 'Valencia', '', 'Carabobo', 'Urbanización San José de Tarbes, Avenida 96-B, Centro Tarbes 138, piso 4, Oficina 4-2.', '', '2023-02-16 20:42:17', 1, 25, '', 'Maracay', 'Aragua', '', 242, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(24, 'Carlos Arturo Acevedo', 'CC. 14.885.167', '+573147607912', 49, 'Candelaria', '', 'Valle del Cauca', 'Km 1, 5 Vía Cavasa, Condominio Industrial La Nubia, bodegas 1 y 2', 'www.prokpil.com.co', '2023-02-19 00:31:06', 1, NULL, 'Km 1, 5 Vía Cavasa, Condominio Industrial La Nubia, bodegas 1 y 2', 'Candelaria', 'Valle del Cauca', '', 49, 'Km 1, 5 Vía Cavasa, Condominio Industrial La Nubia, bodegas 1 y 2', 'Candelaria', 'Valle del Cauca', '', 49, NULL, NULL, '', 4, 0, NULL, 1, 2),
(25, 'P01-Cosméticos Multilatina, S.A.', 'J-50338799-8', '+582127623827', 492, 'Caracas', '1050', 'Distrito Capital', 'Calle la Iglesia, Edificio Centro Solano Plaza I, Of. 4-B, Urbanización Sabana Grande. Municipio Libertador', 'www.prokpil.com', '2023-02-23 17:59:49', 1, NULL, 'Calle Los Laboratorios, Edificio Centro Industrial Intenso, PB, Local 1-A. Urbanización Los Ruices.', 'Caracas', 'Municipio Sucre', '1071', 492, 'Calle Los Laboratorios, Edificio Centro Industrial Intenso, PB, Local 1-A. Urbanización Los Ruices.', 'Caracas', 'Municipio Sucre', '1071', 492, NULL, NULL, '', 4, 0, NULL, 1, 2),
(26, 'P02-Pedro Aurelio Fernández Marotias', 'RIF: V-09966334-7', '+584241988526', 242, 'Caracas', '1050', 'DF', 'Avenida Los Samanes, Edificio Estancia Florida, La Florida.', '', '2023-02-27 17:42:05', 1, 23, 'Avenida Los Samanes, Edificio Estancia Florida, La Florida.', 'Caracas', 'DF', '1050', 242, 'Avenida Los Samanes, Edificio Estancia Florida, La Florida.', 'Caracas', 'DF', '1050', 242, NULL, NULL, '', 4, 1, NULL, 1, 2),
(27, 'R02-Raisbeck & Castro', '', '+575713849', 49, 'Bogotá', '110221', 'D.C.', 'Carrera 10 # 97A-13, Torr A, Oficina 507', '', '2023-03-08 11:13:35', 1, 31, 'Carrera 10 # 97A-13, Torr A, Oficina 507', 'Bogotá', 'D.C.', '110221', 49, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(28, 'S01-Ilich Santander', '', '+56984668821', 45, 'Santiago de Chile', '', '', 'Santiago de Chile', '', '2023-03-08 14:09:04', 1, 30, 'Santiago de Chile', 'Santiago de Chile', '', '', 45, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(29, 'K03-Kukenan Tobacco Trading, C.A.', '/RIF: J-50034694-8', '+584141346101', 992, 'Caracas', '1060', 'Miranda', 'Avenida Francisco de Miranda, Torre la Primera, piso 5, oficina 5D, El Rosal', 'www.kukenantobacco.com', '2023-03-09 10:07:37', 1, 21, 'Avenida Francisco de Miranda, Torre la Primera, piso 5, oficina 5D, El Rosal', 'Caracas', 'Miranda', '1060', 992, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(30, 'D03-Dolly Farma', 'J-29803429-7', '+582514421281 / +584145268083', 242, 'Barquisimeto', '3001', 'Lara', 'Avenida Rotaria, Esquina de la Carrera 12, Local  número 11-75, Sector Oeste', 'www.dollyfarma.com', '2023-03-09 19:37:24', 1, 24, 'Avenida Rotaria, Esquina de la Carrera 12, Local  número 11-75, Sector Oeste', 'Barquisimeto', 'Lara', '3001', 242, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(33, 'D04-DRLS Dental Artist', '', '+584121296963', 492, 'Caracas', '1050', 'DF', 'Avenida Panteón, Centro Clínico Profesional, consultorio 810. San Bernardino', '', '2023-04-13 12:27:47', 1, 37, 'Avenida Panteón, Centro Clínico Profesional, consultorio 810. San Bernardino', 'Caracas', 'DF', '1050', 492, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(67, 'L01-Loma Licenciamento de Marcas Limitada', '16.896.816/001-85', '', 32, 'Santana do Parnaiba', 'CEP: 06.541-050', 'Sao Paolo', 'Calçada Canopo, 19, sala 02, Alphaville', 'www.grupoboticario.com.br', '2023-05-22 13:33:55', 1, NULL, '', '', '', '', 0, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(70, 'ACC TIRES, C.A.', 'J314283715', '0424-155-75-73', 492, 'Caracas', '1050', 'Distrito Capital', 'Calle B C/Avenida Sanatorio Del Ávila, Cc. Conjunto Ciudad Center, Torre \"E\", Nivel 7, Of. 724-E, Urb Boleita Norte.', '', '2023-06-20 14:27:33', 1, NULL, '', '', '', '', 0, '', '', '', '', 0, NULL, NULL, 'spanish', 10, 0, NULL, 1, 28),
(71, 'A04-José Abbo Toledano', 'J-06555207-4', '+584143270347', 992, 'Caracas', '1050', 'Distrito Capital', 'Avenida Principal del Ávila, Residencias Doravila, Torre \"C\", PH. El Ávila. Parroquia el Recreo, Municipio Libertador.', '', '2023-06-26 12:33:36', 1, NULL, '', '', '', '', 0, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2),
(72, 'S02-Sergio Cabrera Abogados/Studio F', '', '(572) 667 6708/(572) 660 5914', 799, 'Cali', '', 'Departamento del Valle', 'Avenida 4 Norte, Nº 25, Nº 45, B/San Vicente', '', '2023-07-13 10:50:33', 1, NULL, '', '', '', '', 0, '', '', '', '', 0, NULL, NULL, '', 4, 0, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblconsents`
--

CREATE TABLE `tblconsents` (
  `id` int NOT NULL,
  `action` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(40) NOT NULL,
  `contact_id` int NOT NULL DEFAULT '0',
  `lead_id` int NOT NULL DEFAULT '0',
  `description` text,
  `opt_in_purpose_description` text,
  `purpose_id` int NOT NULL,
  `staff_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblconsent_purposes`
--

CREATE TABLE `tblconsent_purposes` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `date_created` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcontacts`
--

CREATE TABLE `tblcontacts` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `is_primary` int NOT NULL DEFAULT '1',
  `firstname` varchar(191) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `new_pass_key` varchar(32) DEFAULT NULL,
  `new_pass_key_requested` datetime DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `email_verification_key` varchar(32) DEFAULT NULL,
  `email_verification_sent_at` datetime DEFAULT NULL,
  `last_ip` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `profile_image` varchar(191) DEFAULT NULL,
  `direction` varchar(3) DEFAULT NULL,
  `invoice_emails` tinyint(1) NOT NULL DEFAULT '1',
  `estimate_emails` tinyint(1) NOT NULL DEFAULT '1',
  `credit_note_emails` tinyint(1) NOT NULL DEFAULT '1',
  `contract_emails` tinyint(1) NOT NULL DEFAULT '1',
  `task_emails` tinyint(1) NOT NULL DEFAULT '1',
  `project_emails` tinyint(1) NOT NULL DEFAULT '1',
  `ticket_emails` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblcontacts`
--

INSERT INTO `tblcontacts` (`id`, `userid`, `is_primary`, `firstname`, `lastname`, `email`, `phonenumber`, `title`, `datecreated`, `password`, `new_pass_key`, `new_pass_key_requested`, `email_verified_at`, `email_verification_key`, `email_verification_sent_at`, `last_ip`, `last_login`, `last_password_change`, `active`, `profile_image`, `direction`, `invoice_emails`, `estimate_emails`, `credit_note_emails`, `contract_emails`, `task_emails`, `project_emails`, `ticket_emails`) VALUES
(1, 1, 1, 'Bryan', 'Useche', 'bryan.useche.10@gmail.com', '+584141256752', 'CEO', '2023-07-05 08:36:25', '$2a$08$g5rBv.ze/1OXxTl8MTkDVujE/y844iiPj8mGO83fsVimaAF.70WPi', NULL, NULL, '2023-07-05 08:36:25', NULL, NULL, '::1', '2023-07-05 08:36:58', NULL, 1, NULL, '', 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcontact_permissions`
--

CREATE TABLE `tblcontact_permissions` (
  `id` int NOT NULL,
  `permission_id` int NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblcontact_permissions`
--

INSERT INTO `tblcontact_permissions` (`id`, `permission_id`, `userid`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcontracts`
--

CREATE TABLE `tblcontracts` (
  `id` int NOT NULL,
  `content` longtext,
  `description` text,
  `subject` varchar(191) DEFAULT NULL,
  `client` int NOT NULL,
  `datestart` date DEFAULT NULL,
  `dateend` date DEFAULT NULL,
  `contract_type` int DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `addedfrom` int NOT NULL,
  `dateadded` datetime NOT NULL,
  `isexpirynotified` int NOT NULL DEFAULT '0',
  `contract_value` decimal(15,2) DEFAULT NULL,
  `trash` tinyint(1) DEFAULT '0',
  `not_visible_to_client` tinyint(1) NOT NULL DEFAULT '0',
  `hash` varchar(32) DEFAULT NULL,
  `signed` tinyint(1) NOT NULL DEFAULT '0',
  `signature` varchar(40) DEFAULT NULL,
  `marked_as_signed` tinyint(1) NOT NULL DEFAULT '0',
  `acceptance_firstname` varchar(50) DEFAULT NULL,
  `acceptance_lastname` varchar(50) DEFAULT NULL,
  `acceptance_email` varchar(100) DEFAULT NULL,
  `acceptance_date` datetime DEFAULT NULL,
  `acceptance_ip` varchar(40) DEFAULT NULL,
  `short_link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcontracts_types`
--

CREATE TABLE `tblcontracts_types` (
  `id` int NOT NULL,
  `name` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcontract_comments`
--

CREATE TABLE `tblcontract_comments` (
  `id` int NOT NULL,
  `content` mediumtext,
  `contract_id` int NOT NULL,
  `staffid` int NOT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcontract_renewals`
--

CREATE TABLE `tblcontract_renewals` (
  `id` int NOT NULL,
  `contractid` int NOT NULL,
  `old_start_date` date NOT NULL,
  `new_start_date` date NOT NULL,
  `old_end_date` date DEFAULT NULL,
  `new_end_date` date DEFAULT NULL,
  `old_value` decimal(15,2) DEFAULT NULL,
  `new_value` decimal(15,2) DEFAULT NULL,
  `date_renewed` datetime NOT NULL,
  `renewed_by` varchar(100) NOT NULL,
  `renewed_by_staff_id` int NOT NULL DEFAULT '0',
  `is_on_old_expiry_notified` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcountries`
--

CREATE TABLE `tblcountries` (
  `country_id` int NOT NULL,
  `iso2` char(2) DEFAULT NULL,
  `short_name` varchar(80) NOT NULL DEFAULT '',
  `long_name` varchar(80) NOT NULL DEFAULT '',
  `iso3` char(3) DEFAULT NULL,
  `numcode` varchar(6) DEFAULT NULL,
  `un_member` varchar(12) DEFAULT NULL,
  `calling_code` varchar(8) DEFAULT NULL,
  `cctld` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblcountries`
--

INSERT INTO `tblcountries` (`country_id`, `iso2`, `short_name`, `long_name`, `iso3`, `numcode`, `un_member`, `calling_code`, `cctld`) VALUES
(1, 'AF', 'Afghanistan', 'Islamic Republic of Afghanistan', 'AFG', '004', 'yes', '93', '.af'),
(2, 'AX', 'Aland Islands', '&Aring;land Islands', 'ALA', '248', 'no', '358', '.ax'),
(3, 'AL', 'Albania', 'Republic of Albania', 'ALB', '008', 'yes', '355', '.al'),
(4, 'DZ', 'Algeria', 'People\'s Democratic Republic of Algeria', 'DZA', '012', 'yes', '213', '.dz'),
(5, 'AS', 'American Samoa', 'American Samoa', 'ASM', '016', 'no', '1+684', '.as'),
(6, 'AD', 'Andorra', 'Principality of Andorra', 'AND', '020', 'yes', '376', '.ad'),
(7, 'AO', 'Angola', 'Republic of Angola', 'AGO', '024', 'yes', '244', '.ao'),
(8, 'AI', 'Anguilla', 'Anguilla', 'AIA', '660', 'no', '1+264', '.ai'),
(9, 'AQ', 'Antarctica', 'Antarctica', 'ATA', '010', 'no', '672', '.aq'),
(10, 'AG', 'Antigua and Barbuda', 'Antigua and Barbuda', 'ATG', '028', 'yes', '1+268', '.ag'),
(11, 'AR', 'Argentina', 'Argentine Republic', 'ARG', '032', 'yes', '54', '.ar'),
(12, 'AM', 'Armenia', 'Republic of Armenia', 'ARM', '051', 'yes', '374', '.am'),
(13, 'AW', 'Aruba', 'Aruba', 'ABW', '533', 'no', '297', '.aw'),
(14, 'AU', 'Australia', 'Commonwealth of Australia', 'AUS', '036', 'yes', '61', '.au'),
(15, 'AT', 'Austria', 'Republic of Austria', 'AUT', '040', 'yes', '43', '.at'),
(16, 'AZ', 'Azerbaijan', 'Republic of Azerbaijan', 'AZE', '031', 'yes', '994', '.az'),
(17, 'BS', 'Bahamas', 'Commonwealth of The Bahamas', 'BHS', '044', 'yes', '1+242', '.bs'),
(18, 'BH', 'Bahrain', 'Kingdom of Bahrain', 'BHR', '048', 'yes', '973', '.bh'),
(19, 'BD', 'Bangladesh', 'People\'s Republic of Bangladesh', 'BGD', '050', 'yes', '880', '.bd'),
(20, 'BB', 'Barbados', 'Barbados', 'BRB', '052', 'yes', '1+246', '.bb'),
(21, 'BY', 'Belarus', 'Republic of Belarus', 'BLR', '112', 'yes', '375', '.by'),
(22, 'BE', 'Belgium', 'Kingdom of Belgium', 'BEL', '056', 'yes', '32', '.be'),
(23, 'BZ', 'Belize', 'Belize', 'BLZ', '084', 'yes', '501', '.bz'),
(24, 'BJ', 'Benin', 'Republic of Benin', 'BEN', '204', 'yes', '229', '.bj'),
(25, 'BM', 'Bermuda', 'Bermuda Islands', 'BMU', '060', 'no', '1+441', '.bm'),
(26, 'BT', 'Bhutan', 'Kingdom of Bhutan', 'BTN', '064', 'yes', '975', '.bt'),
(27, 'BO', 'Bolivia', 'Plurinational State of Bolivia', 'BOL', '068', 'yes', '591', '.bo'),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, Sint Eustatius and Saba', 'BES', '535', 'no', '599', '.bq'),
(29, 'BA', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'BIH', '070', 'yes', '387', '.ba'),
(30, 'BW', 'Botswana', 'Republic of Botswana', 'BWA', '072', 'yes', '267', '.bw'),
(31, 'BV', 'Bouvet Island', 'Bouvet Island', 'BVT', '074', 'no', 'NONE', '.bv'),
(32, 'BR', 'Brazil', 'Federative Republic of Brazil', 'BRA', '076', 'yes', '55', '.br'),
(33, 'IO', 'British Indian Ocean Territory', 'British Indian Ocean Territory', 'IOT', '086', 'no', '246', '.io'),
(34, 'BN', 'Brunei', 'Brunei Darussalam', 'BRN', '096', 'yes', '673', '.bn'),
(35, 'BG', 'Bulgaria', 'Republic of Bulgaria', 'BGR', '100', 'yes', '359', '.bg'),
(36, 'BF', 'Burkina Faso', 'Burkina Faso', 'BFA', '854', 'yes', '226', '.bf'),
(37, 'BI', 'Burundi', 'Republic of Burundi', 'BDI', '108', 'yes', '257', '.bi'),
(38, 'KH', 'Cambodia', 'Kingdom of Cambodia', 'KHM', '116', 'yes', '855', '.kh'),
(39, 'CM', 'Cameroon', 'Republic of Cameroon', 'CMR', '120', 'yes', '237', '.cm'),
(40, 'CA', 'Canada', 'Canada', 'CAN', '124', 'yes', '1', '.ca'),
(41, 'CV', 'Cape Verde', 'Republic of Cape Verde', 'CPV', '132', 'yes', '238', '.cv'),
(42, 'KY', 'Cayman Islands', 'The Cayman Islands', 'CYM', '136', 'no', '1+345', '.ky'),
(43, 'CF', 'Central African Republic', 'Central African Republic', 'CAF', '140', 'yes', '236', '.cf'),
(44, 'TD', 'Chad', 'Republic of Chad', 'TCD', '148', 'yes', '235', '.td'),
(45, 'CL', 'Chile', 'Republic of Chile', 'CHL', '152', 'yes', '56', '.cl'),
(46, 'CN', 'China', 'People\'s Republic of China', 'CHN', '156', 'yes', '86', '.cn'),
(47, 'CX', 'Christmas Island', 'Christmas Island', 'CXR', '162', 'no', '61', '.cx'),
(48, 'CC', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'CCK', '166', 'no', '61', '.cc'),
(49, 'CO', 'Colombia', 'Republic of Colombia', 'COL', '170', 'yes', '57', '.co'),
(50, 'KM', 'Comoros', 'Union of the Comoros', 'COM', '174', 'yes', '269', '.km'),
(51, 'CG', 'Congo', 'Republic of the Congo', 'COG', '178', 'yes', '242', '.cg'),
(52, 'CK', 'Cook Islands', 'Cook Islands', 'COK', '184', 'some', '682', '.ck'),
(53, 'CR', 'Costa Rica', 'Republic of Costa Rica', 'CRI', '188', 'yes', '506', '.cr'),
(54, 'CI', 'Cote d\'ivoire (Ivory Coast)', 'Republic of C&ocirc;te D\'Ivoire (Ivory Coast)', 'CIV', '384', 'yes', '225', '.ci'),
(55, 'HR', 'Croatia', 'Republic of Croatia', 'HRV', '191', 'yes', '385', '.hr'),
(56, 'CU', 'Cuba', 'Republic of Cuba', 'CUB', '192', 'yes', '53', '.cu'),
(57, 'CW', 'Curacao', 'Cura&ccedil;ao', 'CUW', '531', 'no', '599', '.cw'),
(58, 'CY', 'Cyprus', 'Republic of Cyprus', 'CYP', '196', 'yes', '357', '.cy'),
(59, 'CZ', 'Czech Republic', 'Czech Republic', 'CZE', '203', 'yes', '420', '.cz'),
(60, 'CD', 'Democratic Republic of the Congo', 'Democratic Republic of the Congo', 'COD', '180', 'yes', '243', '.cd'),
(61, 'DK', 'Denmark', 'Kingdom of Denmark', 'DNK', '208', 'yes', '45', '.dk'),
(62, 'DJ', 'Djibouti', 'Republic of Djibouti', 'DJI', '262', 'yes', '253', '.dj'),
(63, 'DM', 'Dominica', 'Commonwealth of Dominica', 'DMA', '212', 'yes', '1+767', '.dm'),
(64, 'DO', 'Dominican Republic', 'Dominican Republic', 'DOM', '214', 'yes', '1+809, 8', '.do'),
(65, 'EC', 'Ecuador', 'Republic of Ecuador', 'ECU', '218', 'yes', '593', '.ec'),
(66, 'EG', 'Egypt', 'Arab Republic of Egypt', 'EGY', '818', 'yes', '20', '.eg'),
(67, 'SV', 'El Salvador', 'Republic of El Salvador', 'SLV', '222', 'yes', '503', '.sv'),
(68, 'GQ', 'Equatorial Guinea', 'Republic of Equatorial Guinea', 'GNQ', '226', 'yes', '240', '.gq'),
(69, 'ER', 'Eritrea', 'State of Eritrea', 'ERI', '232', 'yes', '291', '.er'),
(70, 'EE', 'Estonia', 'Republic of Estonia', 'EST', '233', 'yes', '372', '.ee'),
(71, 'ET', 'Ethiopia', 'Federal Democratic Republic of Ethiopia', 'ETH', '231', 'yes', '251', '.et'),
(72, 'FK', 'Falkland Islands (Malvinas)', 'The Falkland Islands (Malvinas)', 'FLK', '238', 'no', '500', '.fk'),
(73, 'FO', 'Faroe Islands', 'The Faroe Islands', 'FRO', '234', 'no', '298', '.fo'),
(74, 'FJ', 'Fiji', 'Republic of Fiji', 'FJI', '242', 'yes', '679', '.fj'),
(75, 'FI', 'Finland', 'Republic of Finland', 'FIN', '246', 'yes', '358', '.fi'),
(76, 'FR', 'France', 'French Republic', 'FRA', '250', 'yes', '33', '.fr'),
(77, 'GF', 'French Guiana', 'French Guiana', 'GUF', '254', 'no', '594', '.gf'),
(78, 'PF', 'French Polynesia', 'French Polynesia', 'PYF', '258', 'no', '689', '.pf'),
(79, 'TF', 'French Southern Territories', 'French Southern Territories', 'ATF', '260', 'no', NULL, '.tf'),
(80, 'GA', 'Gabon', 'Gabonese Republic', 'GAB', '266', 'yes', '241', '.ga'),
(81, 'GM', 'Gambia', 'Republic of The Gambia', 'GMB', '270', 'yes', '220', '.gm'),
(82, 'GE', 'Georgia', 'Georgia', 'GEO', '268', 'yes', '995', '.ge'),
(83, 'DE', 'Germany', 'Federal Republic of Germany', 'DEU', '276', 'yes', '49', '.de'),
(84, 'GH', 'Ghana', 'Republic of Ghana', 'GHA', '288', 'yes', '233', '.gh'),
(85, 'GI', 'Gibraltar', 'Gibraltar', 'GIB', '292', 'no', '350', '.gi'),
(86, 'GR', 'Greece', 'Hellenic Republic', 'GRC', '300', 'yes', '30', '.gr'),
(87, 'GL', 'Greenland', 'Greenland', 'GRL', '304', 'no', '299', '.gl'),
(88, 'GD', 'Grenada', 'Grenada', 'GRD', '308', 'yes', '1+473', '.gd'),
(89, 'GP', 'Guadaloupe', 'Guadeloupe', 'GLP', '312', 'no', '590', '.gp'),
(90, 'GU', 'Guam', 'Guam', 'GUM', '316', 'no', '1+671', '.gu'),
(91, 'GT', 'Guatemala', 'Republic of Guatemala', 'GTM', '320', 'yes', '502', '.gt'),
(92, 'GG', 'Guernsey', 'Guernsey', 'GGY', '831', 'no', '44', '.gg'),
(93, 'GN', 'Guinea', 'Republic of Guinea', 'GIN', '324', 'yes', '224', '.gn'),
(94, 'GW', 'Guinea-Bissau', 'Republic of Guinea-Bissau', 'GNB', '624', 'yes', '245', '.gw'),
(95, 'GY', 'Guyana', 'Co-operative Republic of Guyana', 'GUY', '328', 'yes', '592', '.gy'),
(96, 'HT', 'Haiti', 'Republic of Haiti', 'HTI', '332', 'yes', '509', '.ht'),
(97, 'HM', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands', 'HMD', '334', 'no', 'NONE', '.hm'),
(98, 'HN', 'Honduras', 'Republic of Honduras', 'HND', '340', 'yes', '504', '.hn'),
(99, 'HK', 'Hong Kong', 'Hong Kong', 'HKG', '344', 'no', '852', '.hk'),
(100, 'HU', 'Hungary', 'Hungary', 'HUN', '348', 'yes', '36', '.hu'),
(101, 'IS', 'Iceland', 'Republic of Iceland', 'ISL', '352', 'yes', '354', '.is'),
(102, 'IN', 'India', 'Republic of India', 'IND', '356', 'yes', '91', '.in'),
(103, 'ID', 'Indonesia', 'Republic of Indonesia', 'IDN', '360', 'yes', '62', '.id'),
(104, 'IR', 'Iran', 'Islamic Republic of Iran', 'IRN', '364', 'yes', '98', '.ir'),
(105, 'IQ', 'Iraq', 'Republic of Iraq', 'IRQ', '368', 'yes', '964', '.iq'),
(106, 'IE', 'Ireland', 'Ireland', 'IRL', '372', 'yes', '353', '.ie'),
(107, 'IM', 'Isle of Man', 'Isle of Man', 'IMN', '833', 'no', '44', '.im'),
(108, 'IL', 'Israel', 'State of Israel', 'ISR', '376', 'yes', '972', '.il'),
(109, 'IT', 'Italy', 'Italian Republic', 'ITA', '380', 'yes', '39', '.jm'),
(110, 'JM', 'Jamaica', 'Jamaica', 'JAM', '388', 'yes', '1+876', '.jm'),
(111, 'JP', 'Japan', 'Japan', 'JPN', '392', 'yes', '81', '.jp'),
(112, 'JE', 'Jersey', 'The Bailiwick of Jersey', 'JEY', '832', 'no', '44', '.je'),
(113, 'JO', 'Jordan', 'Hashemite Kingdom of Jordan', 'JOR', '400', 'yes', '962', '.jo'),
(114, 'KZ', 'Kazakhstan', 'Republic of Kazakhstan', 'KAZ', '398', 'yes', '7', '.kz'),
(115, 'KE', 'Kenya', 'Republic of Kenya', 'KEN', '404', 'yes', '254', '.ke'),
(116, 'KI', 'Kiribati', 'Republic of Kiribati', 'KIR', '296', 'yes', '686', '.ki'),
(117, 'XK', 'Kosovo', 'Republic of Kosovo', '---', '---', 'some', '381', ''),
(118, 'KW', 'Kuwait', 'State of Kuwait', 'KWT', '414', 'yes', '965', '.kw'),
(119, 'KG', 'Kyrgyzstan', 'Kyrgyz Republic', 'KGZ', '417', 'yes', '996', '.kg'),
(120, 'LA', 'Laos', 'Lao People\'s Democratic Republic', 'LAO', '418', 'yes', '856', '.la'),
(121, 'LV', 'Latvia', 'Republic of Latvia', 'LVA', '428', 'yes', '371', '.lv'),
(122, 'LB', 'Lebanon', 'Republic of Lebanon', 'LBN', '422', 'yes', '961', '.lb'),
(123, 'LS', 'Lesotho', 'Kingdom of Lesotho', 'LSO', '426', 'yes', '266', '.ls'),
(124, 'LR', 'Liberia', 'Republic of Liberia', 'LBR', '430', 'yes', '231', '.lr'),
(125, 'LY', 'Libya', 'Libya', 'LBY', '434', 'yes', '218', '.ly'),
(126, 'LI', 'Liechtenstein', 'Principality of Liechtenstein', 'LIE', '438', 'yes', '423', '.li'),
(127, 'LT', 'Lithuania', 'Republic of Lithuania', 'LTU', '440', 'yes', '370', '.lt'),
(128, 'LU', 'Luxembourg', 'Grand Duchy of Luxembourg', 'LUX', '442', 'yes', '352', '.lu'),
(129, 'MO', 'Macao', 'The Macao Special Administrative Region', 'MAC', '446', 'no', '853', '.mo'),
(130, 'MK', 'North Macedonia', 'Republic of North Macedonia', 'MKD', '807', 'yes', '389', '.mk'),
(131, 'MG', 'Madagascar', 'Republic of Madagascar', 'MDG', '450', 'yes', '261', '.mg'),
(132, 'MW', 'Malawi', 'Republic of Malawi', 'MWI', '454', 'yes', '265', '.mw'),
(133, 'MY', 'Malaysia', 'Malaysia', 'MYS', '458', 'yes', '60', '.my'),
(134, 'MV', 'Maldives', 'Republic of Maldives', 'MDV', '462', 'yes', '960', '.mv'),
(135, 'ML', 'Mali', 'Republic of Mali', 'MLI', '466', 'yes', '223', '.ml'),
(136, 'MT', 'Malta', 'Republic of Malta', 'MLT', '470', 'yes', '356', '.mt'),
(137, 'MH', 'Marshall Islands', 'Republic of the Marshall Islands', 'MHL', '584', 'yes', '692', '.mh'),
(138, 'MQ', 'Martinique', 'Martinique', 'MTQ', '474', 'no', '596', '.mq'),
(139, 'MR', 'Mauritania', 'Islamic Republic of Mauritania', 'MRT', '478', 'yes', '222', '.mr'),
(140, 'MU', 'Mauritius', 'Republic of Mauritius', 'MUS', '480', 'yes', '230', '.mu'),
(141, 'YT', 'Mayotte', 'Mayotte', 'MYT', '175', 'no', '262', '.yt'),
(142, 'MX', 'Mexico', 'United Mexican States', 'MEX', '484', 'yes', '52', '.mx'),
(143, 'FM', 'Micronesia', 'Federated States of Micronesia', 'FSM', '583', 'yes', '691', '.fm'),
(144, 'MD', 'Moldava', 'Republic of Moldova', 'MDA', '498', 'yes', '373', '.md'),
(145, 'MC', 'Monaco', 'Principality of Monaco', 'MCO', '492', 'yes', '377', '.mc'),
(146, 'MN', 'Mongolia', 'Mongolia', 'MNG', '496', 'yes', '976', '.mn'),
(147, 'ME', 'Montenegro', 'Montenegro', 'MNE', '499', 'yes', '382', '.me'),
(148, 'MS', 'Montserrat', 'Montserrat', 'MSR', '500', 'no', '1+664', '.ms'),
(149, 'MA', 'Morocco', 'Kingdom of Morocco', 'MAR', '504', 'yes', '212', '.ma'),
(150, 'MZ', 'Mozambique', 'Republic of Mozambique', 'MOZ', '508', 'yes', '258', '.mz'),
(151, 'MM', 'Myanmar (Burma)', 'Republic of the Union of Myanmar', 'MMR', '104', 'yes', '95', '.mm'),
(152, 'NA', 'Namibia', 'Republic of Namibia', 'NAM', '516', 'yes', '264', '.na'),
(153, 'NR', 'Nauru', 'Republic of Nauru', 'NRU', '520', 'yes', '674', '.nr'),
(154, 'NP', 'Nepal', 'Federal Democratic Republic of Nepal', 'NPL', '524', 'yes', '977', '.np'),
(155, 'NL', 'Netherlands', 'Kingdom of the Netherlands', 'NLD', '528', 'yes', '31', '.nl'),
(156, 'NC', 'New Caledonia', 'New Caledonia', 'NCL', '540', 'no', '687', '.nc'),
(157, 'NZ', 'New Zealand', 'New Zealand', 'NZL', '554', 'yes', '64', '.nz'),
(158, 'NI', 'Nicaragua', 'Republic of Nicaragua', 'NIC', '558', 'yes', '505', '.ni'),
(159, 'NE', 'Niger', 'Republic of Niger', 'NER', '562', 'yes', '227', '.ne'),
(160, 'NG', 'Nigeria', 'Federal Republic of Nigeria', 'NGA', '566', 'yes', '234', '.ng'),
(161, 'NU', 'Niue', 'Niue', 'NIU', '570', 'some', '683', '.nu'),
(162, 'NF', 'Norfolk Island', 'Norfolk Island', 'NFK', '574', 'no', '672', '.nf'),
(163, 'KP', 'North Korea', 'Democratic People\'s Republic of Korea', 'PRK', '408', 'yes', '850', '.kp'),
(164, 'MP', 'Northern Mariana Islands', 'Northern Mariana Islands', 'MNP', '580', 'no', '1+670', '.mp'),
(165, 'NO', 'Norway', 'Kingdom of Norway', 'NOR', '578', 'yes', '47', '.no'),
(166, 'OM', 'Oman', 'Sultanate of Oman', 'OMN', '512', 'yes', '968', '.om'),
(167, 'PK', 'Pakistan', 'Islamic Republic of Pakistan', 'PAK', '586', 'yes', '92', '.pk'),
(168, 'PW', 'Palau', 'Republic of Palau', 'PLW', '585', 'yes', '680', '.pw'),
(169, 'PS', 'Palestine', 'State of Palestine (or Occupied Palestinian Territory)', 'PSE', '275', 'some', '970', '.ps'),
(170, 'PA', 'Panama', 'Republic of Panama', 'PAN', '591', 'yes', '507', '.pa'),
(171, 'PG', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'PNG', '598', 'yes', '675', '.pg'),
(172, 'PY', 'Paraguay', 'Republic of Paraguay', 'PRY', '600', 'yes', '595', '.py'),
(173, 'PE', 'Peru', 'Republic of Peru', 'PER', '604', 'yes', '51', '.pe'),
(174, 'PH', 'Philippines', 'Republic of the Philippines', 'PHL', '608', 'yes', '63', '.ph'),
(175, 'PN', 'Pitcairn', 'Pitcairn', 'PCN', '612', 'no', 'NONE', '.pn'),
(176, 'PL', 'Poland', 'Republic of Poland', 'POL', '616', 'yes', '48', '.pl'),
(177, 'PT', 'Portugal', 'Portuguese Republic', 'PRT', '620', 'yes', '351', '.pt'),
(178, 'PR', 'Puerto Rico', 'Commonwealth of Puerto Rico', 'PRI', '630', 'no', '1+939', '.pr'),
(179, 'QA', 'Qatar', 'State of Qatar', 'QAT', '634', 'yes', '974', '.qa'),
(180, 'RE', 'Reunion', 'R&eacute;union', 'REU', '638', 'no', '262', '.re'),
(181, 'RO', 'Romania', 'Romania', 'ROU', '642', 'yes', '40', '.ro'),
(182, 'RU', 'Russia', 'Russian Federation', 'RUS', '643', 'yes', '7', '.ru'),
(183, 'RW', 'Rwanda', 'Republic of Rwanda', 'RWA', '646', 'yes', '250', '.rw'),
(184, 'BL', 'Saint Barthelemy', 'Saint Barth&eacute;lemy', 'BLM', '652', 'no', '590', '.bl'),
(185, 'SH', 'Saint Helena', 'Saint Helena, Ascension and Tristan da Cunha', 'SHN', '654', 'no', '290', '.sh'),
(186, 'KN', 'Saint Kitts and Nevis', 'Federation of Saint Christopher and Nevis', 'KNA', '659', 'yes', '1+869', '.kn'),
(187, 'LC', 'Saint Lucia', 'Saint Lucia', 'LCA', '662', 'yes', '1+758', '.lc'),
(188, 'MF', 'Saint Martin', 'Saint Martin', 'MAF', '663', 'no', '590', '.mf'),
(189, 'PM', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'SPM', '666', 'no', '508', '.pm'),
(190, 'VC', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'VCT', '670', 'yes', '1+784', '.vc'),
(191, 'WS', 'Samoa', 'Independent State of Samoa', 'WSM', '882', 'yes', '685', '.ws'),
(192, 'SM', 'San Marino', 'Republic of San Marino', 'SMR', '674', 'yes', '378', '.sm'),
(193, 'ST', 'Sao Tome and Principe', 'Democratic Republic of S&atilde;o Tom&eacute; and Pr&iacute;ncipe', 'STP', '678', 'yes', '239', '.st'),
(194, 'SA', 'Saudi Arabia', 'Kingdom of Saudi Arabia', 'SAU', '682', 'yes', '966', '.sa'),
(195, 'SN', 'Senegal', 'Republic of Senegal', 'SEN', '686', 'yes', '221', '.sn'),
(196, 'RS', 'Serbia', 'Republic of Serbia', 'SRB', '688', 'yes', '381', '.rs'),
(197, 'SC', 'Seychelles', 'Republic of Seychelles', 'SYC', '690', 'yes', '248', '.sc'),
(198, 'SL', 'Sierra Leone', 'Republic of Sierra Leone', 'SLE', '694', 'yes', '232', '.sl'),
(199, 'SG', 'Singapore', 'Republic of Singapore', 'SGP', '702', 'yes', '65', '.sg'),
(200, 'SX', 'Sint Maarten', 'Sint Maarten', 'SXM', '534', 'no', '1+721', '.sx'),
(201, 'SK', 'Slovakia', 'Slovak Republic', 'SVK', '703', 'yes', '421', '.sk'),
(202, 'SI', 'Slovenia', 'Republic of Slovenia', 'SVN', '705', 'yes', '386', '.si'),
(203, 'SB', 'Solomon Islands', 'Solomon Islands', 'SLB', '090', 'yes', '677', '.sb'),
(204, 'SO', 'Somalia', 'Somali Republic', 'SOM', '706', 'yes', '252', '.so'),
(205, 'ZA', 'South Africa', 'Republic of South Africa', 'ZAF', '710', 'yes', '27', '.za'),
(206, 'GS', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'SGS', '239', 'no', '500', '.gs'),
(207, 'KR', 'South Korea', 'Republic of Korea', 'KOR', '410', 'yes', '82', '.kr'),
(208, 'SS', 'South Sudan', 'Republic of South Sudan', 'SSD', '728', 'yes', '211', '.ss'),
(209, 'ES', 'Spain', 'Kingdom of Spain', 'ESP', '724', 'yes', '34', '.es'),
(210, 'LK', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', 'LKA', '144', 'yes', '94', '.lk'),
(211, 'SD', 'Sudan', 'Republic of the Sudan', 'SDN', '729', 'yes', '249', '.sd'),
(212, 'SR', 'Suriname', 'Republic of Suriname', 'SUR', '740', 'yes', '597', '.sr'),
(213, 'SJ', 'Svalbard and Jan Mayen', 'Svalbard and Jan Mayen', 'SJM', '744', 'no', '47', '.sj'),
(214, 'SZ', 'Swaziland', 'Kingdom of Swaziland', 'SWZ', '748', 'yes', '268', '.sz'),
(215, 'SE', 'Sweden', 'Kingdom of Sweden', 'SWE', '752', 'yes', '46', '.se'),
(216, 'CH', 'Switzerland', 'Swiss Confederation', 'CHE', '756', 'yes', '41', '.ch'),
(217, 'SY', 'Syria', 'Syrian Arab Republic', 'SYR', '760', 'yes', '963', '.sy'),
(218, 'TW', 'Taiwan', 'Republic of China (Taiwan)', 'TWN', '158', 'former', '886', '.tw'),
(219, 'TJ', 'Tajikistan', 'Republic of Tajikistan', 'TJK', '762', 'yes', '992', '.tj'),
(220, 'TZ', 'Tanzania', 'United Republic of Tanzania', 'TZA', '834', 'yes', '255', '.tz'),
(221, 'TH', 'Thailand', 'Kingdom of Thailand', 'THA', '764', 'yes', '66', '.th'),
(222, 'TL', 'Timor-Leste (East Timor)', 'Democratic Republic of Timor-Leste', 'TLS', '626', 'yes', '670', '.tl'),
(223, 'TG', 'Togo', 'Togolese Republic', 'TGO', '768', 'yes', '228', '.tg'),
(224, 'TK', 'Tokelau', 'Tokelau', 'TKL', '772', 'no', '690', '.tk'),
(225, 'TO', 'Tonga', 'Kingdom of Tonga', 'TON', '776', 'yes', '676', '.to'),
(226, 'TT', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', 'TTO', '780', 'yes', '1+868', '.tt'),
(227, 'TN', 'Tunisia', 'Republic of Tunisia', 'TUN', '788', 'yes', '216', '.tn'),
(228, 'TR', 'Turkey', 'Republic of Turkey', 'TUR', '792', 'yes', '90', '.tr'),
(229, 'TM', 'Turkmenistan', 'Turkmenistan', 'TKM', '795', 'yes', '993', '.tm'),
(230, 'TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'TCA', '796', 'no', '1+649', '.tc'),
(231, 'TV', 'Tuvalu', 'Tuvalu', 'TUV', '798', 'yes', '688', '.tv'),
(232, 'UG', 'Uganda', 'Republic of Uganda', 'UGA', '800', 'yes', '256', '.ug'),
(233, 'UA', 'Ukraine', 'Ukraine', 'UKR', '804', 'yes', '380', '.ua'),
(234, 'AE', 'United Arab Emirates', 'United Arab Emirates', 'ARE', '784', 'yes', '971', '.ae'),
(235, 'GB', 'United Kingdom', 'United Kingdom of Great Britain and Nothern Ireland', 'GBR', '826', 'yes', '44', '.uk'),
(236, 'US', 'United States', 'United States of America', 'USA', '840', 'yes', '1', '.us'),
(237, 'UM', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'UMI', '581', 'no', 'NONE', 'NONE'),
(238, 'UY', 'Uruguay', 'Eastern Republic of Uruguay', 'URY', '858', 'yes', '598', '.uy'),
(239, 'UZ', 'Uzbekistan', 'Republic of Uzbekistan', 'UZB', '860', 'yes', '998', '.uz'),
(240, 'VU', 'Vanuatu', 'Republic of Vanuatu', 'VUT', '548', 'yes', '678', '.vu'),
(241, 'VA', 'Vatican City', 'State of the Vatican City', 'VAT', '336', 'no', '39', '.va'),
(242, 'VE', 'Venezuela', 'Bolivarian Republic of Venezuela', 'VEN', '862', 'yes', '58', '.ve'),
(243, 'VN', 'Vietnam', 'Socialist Republic of Vietnam', 'VNM', '704', 'yes', '84', '.vn'),
(244, 'VG', 'Virgin Islands, British', 'British Virgin Islands', 'VGB', '092', 'no', '1+284', '.vg'),
(245, 'VI', 'Virgin Islands, US', 'Virgin Islands of the United States', 'VIR', '850', 'no', '1+340', '.vi'),
(246, 'WF', 'Wallis and Futuna', 'Wallis and Futuna', 'WLF', '876', 'no', '681', '.wf'),
(247, 'EH', 'Western Sahara', 'Western Sahara', 'ESH', '732', 'no', '212', '.eh'),
(248, 'YE', 'Yemen', 'Republic of Yemen', 'YEM', '887', 'yes', '967', '.ye'),
(249, 'ZM', 'Zambia', 'Republic of Zambia', 'ZMB', '894', 'yes', '260', '.zm'),
(250, 'ZW', 'Zimbabwe', 'Republic of Zimbabwe', 'ZWE', '716', 'yes', '263', '.zw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcreditnotes`
--

CREATE TABLE `tblcreditnotes` (
  `id` int NOT NULL,
  `clientid` int NOT NULL,
  `deleted_customer_name` varchar(100) DEFAULT NULL,
  `number` int NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `number_format` int NOT NULL DEFAULT '1',
  `datecreated` datetime NOT NULL,
  `date` date NOT NULL,
  `adminnote` text,
  `terms` text,
  `clientnote` text,
  `currency` int NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total` decimal(15,2) NOT NULL,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `addedfrom` int DEFAULT NULL,
  `status` int DEFAULT '1',
  `project_id` int NOT NULL DEFAULT '0',
  `discount_percent` decimal(15,2) DEFAULT '0.00',
  `discount_total` decimal(15,2) DEFAULT '0.00',
  `discount_type` varchar(30) NOT NULL,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int DEFAULT NULL,
  `include_shipping` tinyint(1) NOT NULL,
  `show_shipping_on_credit_note` tinyint(1) NOT NULL DEFAULT '1',
  `show_quantity_as` int NOT NULL DEFAULT '1',
  `reference_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcreditnote_refunds`
--

CREATE TABLE `tblcreditnote_refunds` (
  `id` int NOT NULL,
  `credit_note_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `refunded_on` date NOT NULL,
  `payment_mode` varchar(40) NOT NULL,
  `note` text,
  `amount` decimal(15,2) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcredits`
--

CREATE TABLE `tblcredits` (
  `id` int NOT NULL,
  `invoice_id` int NOT NULL,
  `credit_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `date` date NOT NULL,
  `date_applied` datetime NOT NULL,
  `amount` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcurrencies`
--

CREATE TABLE `tblcurrencies` (
  `id` int NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `decimal_separator` varchar(5) DEFAULT NULL,
  `thousand_separator` varchar(5) DEFAULT NULL,
  `placement` varchar(10) DEFAULT NULL,
  `isdefault` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblcurrencies`
--

INSERT INTO `tblcurrencies` (`id`, `symbol`, `name`, `decimal_separator`, `thousand_separator`, `placement`, `isdefault`) VALUES
(1, '$', 'USD', '.', ',', 'before', 1),
(2, '€', 'EUR', ',', '.', 'before', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcustomers_groups`
--

CREATE TABLE `tblcustomers_groups` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblcustomers_groups`
--

INSERT INTO `tblcustomers_groups` (`id`, `name`) VALUES
(1, 'IT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcustomer_admins`
--

CREATE TABLE `tblcustomer_admins` (
  `staff_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `date_assigned` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblcustomer_admins`
--

INSERT INTO `tblcustomer_admins` (`staff_id`, `customer_id`, `date_assigned`) VALUES
(1, 1, '2023-05-22 10:20:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcustomer_groups`
--

CREATE TABLE `tblcustomer_groups` (
  `id` int NOT NULL,
  `groupid` int NOT NULL,
  `customer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblcustomer_groups`
--

INSERT INTO `tblcustomer_groups` (`id`, `groupid`, `customer_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcustomfields`
--

CREATE TABLE `tblcustomfields` (
  `id` int NOT NULL,
  `fieldto` varchar(30) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL,
  `options` mediumtext,
  `display_inline` tinyint(1) NOT NULL DEFAULT '0',
  `field_order` int DEFAULT '0',
  `active` int NOT NULL DEFAULT '1',
  `show_on_pdf` int NOT NULL DEFAULT '0',
  `show_on_ticket_form` tinyint(1) NOT NULL DEFAULT '0',
  `only_admin` tinyint(1) NOT NULL DEFAULT '0',
  `show_on_table` tinyint(1) NOT NULL DEFAULT '0',
  `show_on_client_portal` int NOT NULL DEFAULT '0',
  `disalow_client_to_edit` int NOT NULL DEFAULT '0',
  `bs_column` int NOT NULL DEFAULT '12',
  `default_value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcustomfieldsvalues`
--

CREATE TABLE `tblcustomfieldsvalues` (
  `id` int NOT NULL,
  `relid` int NOT NULL,
  `fieldid` int NOT NULL,
  `fieldto` varchar(15) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblday_off`
--

CREATE TABLE `tblday_off` (
  `id` int NOT NULL,
  `off_reason` varchar(255) NOT NULL,
  `off_type` varchar(100) NOT NULL,
  `break_date` date NOT NULL,
  `timekeeping` varchar(45) DEFAULT NULL,
  `department` int DEFAULT '0',
  `position` int DEFAULT '0',
  `add_from` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `departmentid` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `imap_username` varchar(191) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `email_from_header` tinyint(1) NOT NULL DEFAULT '0',
  `host` varchar(150) DEFAULT NULL,
  `password` mediumtext,
  `encryption` varchar(3) DEFAULT NULL,
  `folder` varchar(191) NOT NULL DEFAULT 'INBOX',
  `delete_after_import` int NOT NULL DEFAULT '0',
  `calendar_id` mediumtext,
  `hidefromclient` tinyint(1) NOT NULL DEFAULT '0',
  `manager_id` int DEFAULT '0',
  `parent_id` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldismissed_announcements`
--

CREATE TABLE `tbldismissed_announcements` (
  `dismissedannouncementid` int NOT NULL,
  `announcementid` int NOT NULL,
  `staff` int NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblemaillists`
--

CREATE TABLE `tblemaillists` (
  `listid` int NOT NULL,
  `name` mediumtext NOT NULL,
  `creator` varchar(100) NOT NULL,
  `datecreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblemailtemplates`
--

CREATE TABLE `tblemailtemplates` (
  `emailtemplateid` int NOT NULL,
  `type` mediumtext NOT NULL,
  `slug` varchar(100) NOT NULL,
  `language` varchar(40) DEFAULT NULL,
  `name` mediumtext NOT NULL,
  `subject` mediumtext NOT NULL,
  `message` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fromname` mediumtext NOT NULL,
  `fromemail` varchar(100) DEFAULT NULL,
  `plaintext` int NOT NULL DEFAULT '0',
  `active` tinyint NOT NULL DEFAULT '0',
  `order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblemailtemplates`
--

INSERT INTO `tblemailtemplates` (`emailtemplateid`, `type`, `slug`, `language`, `name`, `subject`, `message`, `fromname`, `fromemail`, `plaintext`, `active`, `order`) VALUES
(1, 'client', 'new-client-created', 'english', 'New Contact Added/Registered (Welcome Email)', 'Welcome aboard', 'Dear {contact_firstname} {contact_lastname}<br /><br />Thank you for registering on the <strong>{companyname}</strong> CRM System.<br /><br />We just wanted to say welcome.<br /><br />Please contact us if you need any help.<br /><br />Click here to view your profile: <a href=\"{crm_url}\">{crm_url}</a><br /><br />Kind Regards, <br />{email_signature}<br /><br />(This is an automated email, so please don\'t reply to this email address)', '{companyname} | CRM', '', 0, 1, 0),
(2, 'invoice', 'invoice-send-to-client', 'english', 'Send Invoice to Customer', 'Invoice with number {invoice_number} created', '<span style=\"font-size: 12pt;\">Dear {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">We have prepared the following invoice for you: <strong># {invoice_number}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Invoice status</strong>: {invoice_status}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(3, 'ticket', 'new-ticket-opened-admin', 'english', 'New Ticket Opened (Opened by Staff, Sent to Customer)', 'New Support Ticket Opened', '<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">New support ticket has been opened.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject:</strong> {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department:</strong> {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority:</strong> {ticket_priority}<br /></span><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_public_url}\">#{ticket_id}</a><br /><br />Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(4, 'ticket', 'ticket-reply', 'english', 'Ticket Reply (Sent to Customer)', 'New Ticket Reply', '<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">You have a new ticket reply to ticket <a href=\"{ticket_public_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket Subject:</strong> {ticket_subject}<br /></span><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_public_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(5, 'ticket', 'ticket-autoresponse', 'english', 'New Ticket Opened - Autoresponse', 'New Support Ticket Opened', '<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">Thank you for contacting our support team. A support ticket has now been opened for your request. You will be notified when a response is made by email.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject:</strong> {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority:</strong> {ticket_priority}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_public_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(6, 'invoice', 'invoice-payment-recorded', 'english', 'Invoice Payment Recorded (Sent to Customer)', 'Invoice Payment Recorded', '<span style=\"font-size: 12pt;\">Hello {contact_firstname}&nbsp;{contact_lastname}<br /><br /></span>Thank you for the payment. Find the payment details below:<br /><br />-------------------------------------------------<br /><br />Amount:&nbsp;<strong>{payment_total}<br /></strong>Date:&nbsp;<strong>{payment_date}</strong><br />Invoice number:&nbsp;<span style=\"font-size: 12pt;\"><strong># {invoice_number}<br /><br /></strong></span>-------------------------------------------------<br /><br />You can always view the invoice for this payment at the following link:&nbsp;<a href=\"{invoice_link}\"><span style=\"font-size: 12pt;\">{invoice_number}</span></a><br /><br />We are looking forward working with you.<br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(7, 'invoice', 'invoice-overdue-notice', 'english', 'Invoice Overdue Notice', 'Invoice Overdue Notice - {invoice_number}', '<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">This is an overdue notice for invoice <strong># {invoice_number}</strong></span><br /><br /><span style=\"font-size: 12pt;\">This invoice was due: {invoice_duedate}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(8, 'invoice', 'invoice-already-send', 'english', 'Invoice Already Sent to Customer', 'Invoice # {invoice_number} ', '<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">At your request, here is the invoice with number <strong># {invoice_number}</strong></span><br /><br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(9, 'ticket', 'new-ticket-created-staff', 'english', 'New Ticket Created (Opened by Customer, Sent to Staff Members)', 'New Ticket Created', '<p><span style=\"font-size: 12pt;\">A new support ticket has been opened.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject</strong>: {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority</strong>: {ticket_priority}<br /></span><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_url}\">#{ticket_id}</a></span><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>', '{companyname} | CRM', '', 0, 1, 0),
(10, 'estimate', 'estimate-send-to-client', 'english', 'Send Estimate to Customer', 'Estimate # {estimate_number} created', '<span style=\"font-size: 12pt;\">Dear {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">Please find the attached estimate <strong># {estimate_number}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Estimate status:</strong> {estimate_status}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">We look forward to your communication.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}<br /></span>', '{companyname} | CRM', '', 0, 1, 0),
(11, 'ticket', 'ticket-reply-to-admin', 'english', 'Ticket Reply (Sent to Staff)', 'New Support Ticket Reply', '<span style=\"font-size: 12pt;\">A new support ticket reply from {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject</strong>: {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority</strong>: {ticket_priority}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(12, 'estimate', 'estimate-already-send', 'english', 'Estimate Already Sent to Customer', 'Estimate # {estimate_number} ', '<span style=\"font-size: 12pt;\">Dear {contact_firstname} {contact_lastname}</span><br /> <br /><span style=\"font-size: 12pt;\">Thank you for your estimate request.</span><br /> <br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /> <br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /> <br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(13, 'contract', 'contract-expiration', 'english', 'Contract Expiration Reminder (Sent to Customer Contacts)', 'Contract Expiration Reminder', '<span style=\"font-size: 12pt;\">Dear {client_company}</span><br /><br /><span style=\"font-size: 12pt;\">This is a reminder that the following contract will expire soon:</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject:</strong> {contract_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Description:</strong> {contract_description}</span><br /><span style=\"font-size: 12pt;\"><strong>Date Start:</strong> {contract_datestart}</span><br /><span style=\"font-size: 12pt;\"><strong>Date End:</strong> {contract_dateend}</span><br /><br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(14, 'tasks', 'task-assigned', 'english', 'New Task Assigned (Sent to Staff)', 'New Task Assigned to You - {task_name}', '<span style=\"font-size: 12pt;\">Dear {staff_firstname}</span><br /><br /><span style=\"font-size: 12pt;\">You have been assigned to a new task:</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Name:</strong> {task_name}<br /></span><strong>Start Date:</strong> {task_startdate}<br /><span style=\"font-size: 12pt;\"><strong>Due date:</strong> {task_duedate}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority:</strong> {task_priority}<br /><br /></span><span style=\"font-size: 12pt;\"><span>You can view the task on the following link</span>: <a href=\"{task_link}\">{task_name}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(15, 'tasks', 'task-added-as-follower', 'english', 'Staff Member Added as Follower on Task (Sent to Staff)', 'You are added as follower on task - {task_name}', '<span style=\"font-size: 12pt;\">Hi {staff_firstname}<br /></span><br /><span style=\"font-size: 12pt;\">You have been added as follower on the following task:</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Name:</strong> {task_name}</span><br /><span style=\"font-size: 12pt;\"><strong>Start date:</strong> {task_startdate}</span><br /><br /><span>You can view the task on the following link</span><span>: </span><a href=\"{task_link}\">{task_name}</a><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(16, 'tasks', 'task-commented', 'english', 'New Comment on Task (Sent to Staff)', 'New Comment on Task - {task_name}', 'Dear {staff_firstname}<br /><br />A comment has been made on the following task:<br /><br /><strong>Name:</strong> {task_name}<br /><strong>Comment:</strong> {task_comment}<br /><br />You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a><br /><br />Kind Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(17, 'tasks', 'task-added-attachment', 'english', 'New Attachment(s) on Task (Sent to Staff)', 'New Attachment on Task - {task_name}', 'Hi {staff_firstname}<br /><br /><strong>{task_user_take_action}</strong> added an attachment on the following task:<br /><br /><strong>Name:</strong> {task_name}<br /><br />You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a><br /><br />Kind Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(18, 'estimate', 'estimate-declined-to-staff', 'english', 'Estimate Declined (Sent to Staff)', 'Customer Declined Estimate', '<span style=\"font-size: 12pt;\">Hi</span><br /> <br /><span style=\"font-size: 12pt;\">Customer ({client_company}) declined estimate with number <strong># {estimate_number}</strong></span><br /> <br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /> <br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(19, 'estimate', 'estimate-accepted-to-staff', 'english', 'Estimate Accepted (Sent to Staff)', 'Customer Accepted Estimate', '<span style=\"font-size: 12pt;\">Hi</span><br /> <br /><span style=\"font-size: 12pt;\">Customer ({client_company}) accepted estimate with number <strong># {estimate_number}</strong></span><br /> <br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /> <br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(20, 'proposals', 'proposal-client-accepted', 'english', 'Customer Action - Accepted (Sent to Staff)', 'Customer Accepted Proposal', '<div>Hi<br /> <br />Client <strong>{proposal_proposal_to}</strong> accepted the following proposal:<br /> <br /><strong>Number:</strong> {proposal_number}<br /><strong>Subject</strong>: {proposal_subject}<br /><strong>Total</strong>: {proposal_total}<br /> <br />View the proposal on the following link: <a href=\"{proposal_link}\">{proposal_number}</a><br /> <br />Kind Regards,<br />{email_signature}</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>', '{companyname} | CRM', '', 0, 1, 0),
(21, 'proposals', 'proposal-send-to-customer', 'english', 'Send Proposal to Customer', 'Proposal With Number {proposal_number} Created', 'Dear {proposal_proposal_to}<br /><br />Please find our attached proposal.<br /><br />This proposal is valid until: {proposal_open_till}<br />You can view the proposal on the following link: <a href=\"{proposal_link}\">{proposal_number}</a><br /><br />Please don\'t hesitate to comment online if you have any questions.<br /><br />We look forward to your communication.<br /><br />Kind Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(22, 'proposals', 'proposal-client-declined', 'english', 'Customer Action - Declined (Sent to Staff)', 'Client Declined Proposal', 'Hi<br /> <br />Customer <strong>{proposal_proposal_to}</strong> declined the proposal <strong>{proposal_subject}</strong><br /> <br />View the proposal on the following link <a href=\"{proposal_link}\">{proposal_number}</a>&nbsp;or from the admin area.<br /> <br />Kind Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(23, 'proposals', 'proposal-client-thank-you', 'english', 'Thank You Email (Sent to Customer After Accept)', 'Thank for you accepting proposal', 'Dear {proposal_proposal_to}<br /> <br />Thank for for accepting the proposal.<br /> <br />We look forward to doing business with you.<br /> <br />We will contact you as soon as possible<br /> <br />Kind Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(24, 'proposals', 'proposal-comment-to-client', 'english', 'New Comment  (Sent to Customer/Lead)', 'New Proposal Comment', 'Dear {proposal_proposal_to}<br /> <br />A new comment has been made on the following proposal: <strong>{proposal_number}</strong><br /> <br />You can view and reply to the comment on the following link: <a href=\"{proposal_link}\">{proposal_number}</a><br /> <br />Kind Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(25, 'proposals', 'proposal-comment-to-admin', 'english', 'New Comment (Sent to Staff) ', 'New Proposal Comment', 'Hi<br /> <br />A new comment has been made to the proposal <strong>{proposal_subject}</strong><br /> <br />You can view and reply to the comment on the following link: <a href=\"{proposal_link}\">{proposal_number}</a>&nbsp;or from the admin area.<br /> <br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(26, 'estimate', 'estimate-thank-you-to-customer', 'english', 'Thank You Email (Sent to Customer After Accept)', 'Thank for you accepting estimate', '<span style=\"font-size: 12pt;\">Dear {contact_firstname} {contact_lastname}</span><br /> <br /><span style=\"font-size: 12pt;\">Thank for for accepting the estimate.</span><br /> <br /><span style=\"font-size: 12pt;\">We look forward to doing business with you.</span><br /> <br /><span style=\"font-size: 12pt;\">We will contact you as soon as possible.</span><br /> <br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(27, 'tasks', 'task-deadline-notification', 'english', 'Task Deadline Reminder - Sent to Assigned Members', 'Task Deadline Reminder', 'Hi {staff_firstname}&nbsp;{staff_lastname}<br /><br />This is an automated email from {companyname}.<br /><br />The task <strong>{task_name}</strong> deadline is on <strong>{task_duedate}</strong>. <br />This task is still not finished.<br /><br />You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a><br /><br />Kind Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(28, 'contract', 'send-contract', 'english', 'Send Contract to Customer', 'Contract - {contract_subject}', '<p><span style=\"font-size: 12pt;\">Hi&nbsp;{contact_firstname}&nbsp;{contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">Please find the <a href=\"{contract_link}\">{contract_subject}</a> attached.<br /><br />Description: {contract_description}<br /><br /></span><span style=\"font-size: 12pt;\">Looking forward to hear from you.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>', '{companyname} | CRM', '', 0, 1, 0),
(29, 'invoice', 'invoice-payment-recorded-to-staff', 'english', 'Invoice Payment Recorded (Sent to Staff)', 'New Invoice Payment', '<span style=\"font-size: 12pt;\">Hi</span><br /><br /><span style=\"font-size: 12pt;\">Customer recorded payment for invoice <strong># {invoice_number}</strong></span><br /> <br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /> <br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(30, 'ticket', 'auto-close-ticket', 'english', 'Auto Close Ticket', 'Ticket Auto Closed', '<p><span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">Ticket {ticket_subject} has been auto close due to inactivity.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket #</strong>: <a href=\"{ticket_public_url}\">{ticket_id}</a></span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority:</strong> {ticket_priority}</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>', '{companyname} | CRM', '', 0, 1, 0),
(31, 'project', 'new-project-discussion-created-to-staff', 'english', 'New Project Discussion (Sent to Project Members)', 'New Project Discussion Created - {project_name}', '<p>Hi {staff_firstname}<br /><br />New project discussion created from <strong>{discussion_creator}</strong><br /><br /><strong>Subject:</strong> {discussion_subject}<br /><strong>Description:</strong> {discussion_description}<br /><br />You can view the discussion on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />Kind Regards,<br />{email_signature}</p>', '{companyname} | CRM', '', 0, 1, 0),
(32, 'project', 'new-project-discussion-created-to-customer', 'english', 'New Project Discussion (Sent to Customer Contacts)', 'New Project Discussion Created - {project_name}', '<p>Hello {contact_firstname} {contact_lastname}<br /><br />New project discussion created from <strong>{discussion_creator}</strong><br /><br /><strong>Subject:</strong> {discussion_subject}<br /><strong>Description:</strong> {discussion_description}<br /><br />You can view the discussion on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />Kind Regards,<br />{email_signature}</p>', '{companyname} | CRM', '', 0, 1, 0),
(33, 'project', 'new-project-file-uploaded-to-customer', 'english', 'New Project File(s) Uploaded (Sent to Customer Contacts)', 'New Project File(s) Uploaded - {project_name}', '<p>Hello {contact_firstname} {contact_lastname}<br /><br />New project file is uploaded on <strong>{project_name}</strong> from <strong>{file_creator}</strong><br /><br />You can view the project on the following link: <a href=\"{project_link}\">{project_name}</a><br /><br />To view the file in our CRM you can click on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />Kind Regards,<br />{email_signature}</p>', '{companyname} | CRM', '', 0, 1, 0),
(34, 'project', 'new-project-file-uploaded-to-staff', 'english', 'New Project File(s) Uploaded (Sent to Project Members)', 'New Project File(s) Uploaded - {project_name}', '<p>Hello&nbsp;{staff_firstname}</p>\r\n<p>New project&nbsp;file is uploaded on&nbsp;<strong>{project_name}</strong> from&nbsp;<strong>{file_creator}</strong></p>\r\n<p>You can view the project on the following link: <a href=\"{project_link}\">{project_name}<br /></a><br />To view&nbsp;the file you can click on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a></p>\r\n<p>Kind Regards,<br />{email_signature}</p>', '{companyname} | CRM', '', 0, 1, 0),
(35, 'project', 'new-project-discussion-comment-to-customer', 'english', 'New Discussion Comment  (Sent to Customer Contacts)', 'New Discussion Comment', '<p><span style=\"font-size: 12pt;\">Hello {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">New discussion comment has been made on <strong>{discussion_subject}</strong> from <strong>{comment_creator}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Discussion subject:</strong> {discussion_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Comment</strong>: {discussion_comment}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the discussion on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>', '{companyname} | CRM', '', 0, 1, 0),
(36, 'project', 'new-project-discussion-comment-to-staff', 'english', 'New Discussion Comment (Sent to Project Members)', 'New Discussion Comment', '<p>Hi {staff_firstname}<br /><br />New discussion comment has been made on <strong>{discussion_subject}</strong> from <strong>{comment_creator}</strong><br /><br /><strong>Discussion subject:</strong> {discussion_subject}<br /><strong>Comment:</strong> {discussion_comment}<br /><br />You can view the discussion on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />Kind Regards,<br />{email_signature}</p>', '{companyname} | CRM', '', 0, 1, 0),
(37, 'project', 'staff-added-as-project-member', 'english', 'Staff Added as Project Member', 'New project assigned to you', '<p>Hi {staff_firstname}<br /><br />New project has been assigned to you.<br /><br />You can view the project on the following link <a href=\"{project_link}\">{project_name}</a><br /><br />{email_signature}</p>', '{companyname} | CRM', '', 0, 1, 0),
(38, 'estimate', 'estimate-expiry-reminder', 'english', 'Estimate Expiration Reminder', 'Estimate Expiration Reminder', '<p><span style=\"font-size: 12pt;\">Hello {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">The estimate with <strong># {estimate_number}</strong> will expire on <strong>{estimate_expirydate}</strong></span><br /><br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>', '{companyname} | CRM', '', 0, 1, 0),
(39, 'proposals', 'proposal-expiry-reminder', 'english', 'Proposal Expiration Reminder', 'Proposal Expiration Reminder', '<p>Hello {proposal_proposal_to}<br /><br />The proposal {proposal_number}&nbsp;will expire on <strong>{proposal_open_till}</strong><br /><br />You can view the proposal on the following link: <a href=\"{proposal_link}\">{proposal_number}</a><br /><br />Kind Regards,<br />{email_signature}</p>', '{companyname} | CRM', '', 0, 1, 0),
(40, 'staff', 'new-staff-created', 'english', 'New Staff Created (Welcome Email)', 'You are added as staff member', 'Hi {staff_firstname}<br /><br />You are added as member on our CRM.<br /><br />Please use the following logic credentials:<br /><br /><strong>Email:</strong> {staff_email}<br /><strong>Password:</strong> {password}<br /><br />Click <a href=\"{admin_url}\">here </a>to login in the dashboard.<br /><br />Best Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(41, 'client', 'contact-forgot-password', 'english', 'Forgot Password', 'Create New Password', '<h2>Create a new password</h2>\r\nForgot your password?<br /> To create a new password, just follow this link:<br /> <br /><a href=\"{reset_password_url}\">Reset Password</a><br /> <br /> You received this email, because it was requested by a {companyname}&nbsp;user. This is part of the procedure to create a new password on the system. If you DID NOT request a new password then please ignore this email and your password will remain the same. <br /><br /> {email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(42, 'client', 'contact-password-reseted', 'english', 'Password Reset - Confirmation', 'Your password has been changed', '<strong><span style=\"font-size: 14pt;\">You have changed your password.</span><br /></strong><br /> Please, keep it in your records so you don\'t forget it.<br /> <br /> Your email address for login is: {contact_email}<br /><br />If this wasnt you, please contact us.<br /><br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(43, 'client', 'contact-set-password', 'english', 'Set New Password', 'Set new password on {companyname} ', '<h2><span style=\"font-size: 14pt;\">Setup your new password on {companyname}</span></h2>\r\nPlease use the following link to set up your new password:<br /><br /><a href=\"{set_password_url}\">Set new password</a><br /><br />Keep it in your records so you don\'t forget it.<br /><br />Please set your new password in <strong>48 hours</strong>. After that, you won\'t be able to set your password because this link will expire.<br /><br />You can login at: <a href=\"{crm_url}\">{crm_url}</a><br />Your email address for login: {contact_email}<br /><br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(44, 'staff', 'staff-forgot-password', 'english', 'Forgot Password', 'Create New Password', '<h2><span style=\"font-size: 14pt;\">Create a new password</span></h2>\r\nForgot your password?<br /> To create a new password, just follow this link:<br /> <br /><a href=\"{reset_password_url}\">Reset Password</a><br /> <br /> You received this email, because it was requested by a <strong>{companyname}</strong>&nbsp;user. This is part of the procedure to create a new password on the system. If you DID NOT request a new password then please ignore this email and your password will remain the same. <br /><br /> {email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(45, 'staff', 'staff-password-reseted', 'english', 'Password Reset - Confirmation', 'Your password has been changed', '<span style=\"font-size: 14pt;\"><strong>You have changed your password.<br /></strong></span><br /> Please, keep it in your records so you don\'t forget it.<br /> <br /> Your email address for login is: {staff_email}<br /><br /> If this wasnt you, please contact us.<br /><br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(46, 'project', 'assigned-to-project', 'english', 'New Project Created (Sent to Customer Contacts)', 'New Project Created', '<p>Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}</p>\r\n<p>New project is assigned to your company.<br /><br /><strong>Project Name:</strong>&nbsp;{project_name}<br /><strong>Project Start Date:</strong>&nbsp;{project_start_date}</p>\r\n<p>You can view the project on the following link:&nbsp;<a href=\"{project_link}\">{project_name}</a></p>\r\n<p>We are looking forward hearing from you.<br /><br />Kind Regards,<br />{email_signature}</p>', '{companyname} | CRM', '', 0, 1, 0),
(47, 'tasks', 'task-added-attachment-to-contacts', 'english', 'New Attachment(s) on Task (Sent to Customer Contacts)', 'New Attachment on Task - {task_name}', '<span>Hi {contact_firstname} {contact_lastname}</span><br /><br /><strong>{task_user_take_action}</strong><span> added an attachment on the following task:</span><br /><br /><strong>Name:</strong><span> {task_name}</span><br /><br /><span>You can view the task on the following link: </span><a href=\"{task_link}\">{task_name}</a><br /><br /><span>Kind Regards,</span><br /><span>{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(48, 'tasks', 'task-commented-to-contacts', 'english', 'New Comment on Task (Sent to Customer Contacts)', 'New Comment on Task - {task_name}', '<span>Dear {contact_firstname} {contact_lastname}</span><br /><br /><span>A comment has been made on the following task:</span><br /><br /><strong>Name:</strong><span> {task_name}</span><br /><strong>Comment:</strong><span> {task_comment}</span><br /><br /><span>You can view the task on the following link: </span><a href=\"{task_link}\">{task_name}</a><br /><br /><span>Kind Regards,</span><br /><span>{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(49, 'leads', 'new-lead-assigned', 'english', 'New Lead Assigned to Staff Member', 'New lead assigned to you', '<p>Hello {lead_assigned}<br /><br />New lead is assigned to you.<br /><br /><strong>Lead Name:</strong>&nbsp;{lead_name}<br /><strong>Lead Email:</strong>&nbsp;{lead_email}<br /><br />You can view the lead on the following link: <a href=\"{lead_link}\">{lead_name}</a><br /><br />Kind Regards,<br />{email_signature}</p>', '{companyname} | CRM', '', 0, 1, 0),
(50, 'client', 'client-statement', 'english', 'Statement - Account Summary', 'Account Statement from {statement_from} to {statement_to}', 'Dear {contact_firstname} {contact_lastname}, <br /><br />Its been a great experience working with you.<br /><br />Attached with this email is a list of all transactions for the period between {statement_from} to {statement_to}<br /><br />For your information your account balance due is total:&nbsp;{statement_balance_due}<br /><br />Please contact us if you need more information.<br /> <br />Kind Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(51, 'ticket', 'ticket-assigned-to-admin', 'english', 'New Ticket Assigned (Sent to Staff)', 'New support ticket has been assigned to you', '<p><span style=\"font-size: 12pt;\">Hi</span></p>\r\n<p><span style=\"font-size: 12pt;\">A new support ticket&nbsp;has been assigned to you.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject</strong>: {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority</strong>: {ticket_priority}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>', '{companyname} | CRM', '', 0, 1, 0),
(52, 'client', 'new-client-registered-to-admin', 'english', 'New Customer Registration (Sent to admins)', 'New Customer Registration', 'Hello.<br /><br />New customer registration on your customer portal:<br /><br /><strong>Firstname:</strong>&nbsp;{contact_firstname}<br /><strong>Lastname:</strong>&nbsp;{contact_lastname}<br /><strong>Company:</strong>&nbsp;{client_company}<br /><strong>Email:</strong>&nbsp;{contact_email}<br /><br />Best Regards', '{companyname} | CRM', '', 0, 1, 0),
(53, 'leads', 'new-web-to-lead-form-submitted', 'english', 'Web to lead form submitted - Sent to lead', '{lead_name} - We Received Your Request', 'Hello {lead_name}.<br /><br /><strong>Your request has been received.</strong><br /><br />This email is to let you know that we received your request and we will get back to you as soon as possible with more information.<br /><br />Best Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 0, 0),
(54, 'staff', 'two-factor-authentication', 'english', 'Two Factor Authentication', 'Confirm Your Login', '<p>Hi {staff_firstname}</p>\r\n<p style=\"text-align: left;\">You received this email because you have enabled two factor authentication in your account.<br />Use the following code to confirm your login:</p>\r\n<p style=\"text-align: left;\"><span style=\"font-size: 18pt;\"><strong>{two_factor_auth_code}<br /><br /></strong><span style=\"font-size: 12pt;\">{email_signature}</span><strong><br /><br /><br /><br /></strong></span></p>', '{companyname} | CRM', '', 0, 1, 0),
(55, 'project', 'project-finished-to-customer', 'english', 'Project Marked as Finished (Sent to Customer Contacts)', 'Project Marked as Finished', '<p>Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}</p>\r\n<p>You are receiving this email because project&nbsp;<strong>{project_name}</strong> has been marked as finished. This project is assigned under your company and we just wanted to keep you up to date.<br /><br />You can view the project on the following link:&nbsp;<a href=\"{project_link}\">{project_name}</a></p>\r\n<p>If you have any questions don\'t hesitate to contact us.<br /><br />Kind Regards,<br />{email_signature}</p>', '{companyname} | CRM', '', 0, 1, 0),
(56, 'credit_note', 'credit-note-send-to-client', 'english', 'Send Credit Note To Email', 'Credit Note With Number #{credit_note_number} Created', 'Dear&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br />We have attached the credit note with number <strong>#{credit_note_number} </strong>for your reference.<br /><br /><strong>Date:</strong>&nbsp;{credit_note_date}<br /><strong>Total Amount:</strong>&nbsp;{credit_note_total}<br /><br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /> <br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(57, 'tasks', 'task-status-change-to-staff', 'english', 'Task Status Changed (Sent to Staff)', 'Task Status Changed', '<span style=\"font-size: 12pt;\">Hi {staff_firstname}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>{task_user_take_action}</strong> marked task as <strong>{task_status}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Name:</strong> {task_name}</span><br /><span style=\"font-size: 12pt;\"><strong>Due date:</strong> {task_duedate}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(58, 'tasks', 'task-status-change-to-contacts', 'english', 'Task Status Changed (Sent to Customer Contacts)', 'Task Status Changed', '<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>{task_user_take_action}</strong> marked task as <strong>{task_status}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Name:</strong> {task_name}</span><br /><span style=\"font-size: 12pt;\"><strong>Due date:</strong> {task_duedate}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(59, 'staff', 'reminder-email-staff', 'english', 'Staff Reminder Email', 'You Have a New Reminder!', '<p>Hello&nbsp;{staff_firstname}<br /><br /><strong>You have a new reminder&nbsp;linked to&nbsp;{staff_reminder_relation_name}!<br /><br />Reminder description:</strong><br />{staff_reminder_description}<br /><br />Click <a href=\"{staff_reminder_relation_link}\">here</a> to view&nbsp;<a href=\"{staff_reminder_relation_link}\">{staff_reminder_relation_name}</a><br /><br />Best Regards<br /><br /></p>', '{companyname} | CRM', '', 0, 1, 0),
(60, 'contract', 'contract-comment-to-client', 'english', 'New Comment  (Sent to Customer Contacts)', 'New Contract Comment', 'Dear {contact_firstname} {contact_lastname}<br /> <br />A new comment has been made on the following contract: <strong>{contract_subject}</strong><br /> <br />You can view and reply to the comment on the following link: <a href=\"{contract_link}\">{contract_subject}</a><br /> <br />Kind Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(61, 'contract', 'contract-comment-to-admin', 'english', 'New Comment (Sent to Staff) ', 'New Contract Comment', 'Hi {staff_firstname}<br /><br />A new comment has been made to the contract&nbsp;<strong>{contract_subject}</strong><br /><br />You can view and reply to the comment on the following link: <a href=\"{contract_link}\">{contract_subject}</a>&nbsp;or from the admin area.<br /><br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(62, 'subscriptions', 'send-subscription', 'english', 'Send Subscription to Customer', 'Subscription Created', 'Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br />We have prepared the subscription&nbsp;<strong>{subscription_name}</strong> for your company.<br /><br />Click <a href=\"{subscription_link}\">here</a> to review the subscription and subscribe.<br /><br />Best Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(63, 'subscriptions', 'subscription-payment-failed', 'english', 'Subscription Payment Failed', 'Your most recent invoice payment failed', 'Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br br=\"\" />Unfortunately, your most recent invoice payment for&nbsp;<strong>{subscription_name}</strong> was declined.<br /><br />This could be due to a change in your card number, your card expiring,<br />cancellation of your credit card, or the card issuer not recognizing the<br />payment and therefore taking action to prevent it.<br /><br />Please update your payment information as soon as possible by logging in here:<br /><a href=\"{crm_url}/login\">{crm_url}/login</a><br /><br />Best Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(64, 'subscriptions', 'subscription-canceled', 'english', 'Subscription Canceled (Sent to customer primary contact)', 'Your subscription has been canceled', 'Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br />Your subscription&nbsp;<strong>{subscription_name} </strong>has been canceled, if you have any questions don\'t hesitate to contact us.<br /><br />It was a pleasure doing business with you.<br /><br />Best Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(65, 'subscriptions', 'subscription-payment-succeeded', 'english', 'Subscription Payment Succeeded (Sent to customer primary contact)', 'Subscription  Payment Receipt - {subscription_name}', 'Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br />This email is to let you know that we received your payment for subscription&nbsp;<strong>{subscription_name}&nbsp;</strong>of&nbsp;<strong><span>{payment_total}<br /><br /></span></strong>The invoice associated with it is now with status&nbsp;<strong>{invoice_status}<br /></strong><br />Thank you for your confidence.<br /><br />Best Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(66, 'contract', 'contract-expiration-to-staff', 'english', 'Contract Expiration Reminder (Sent to Staff)', 'Contract Expiration Reminder', 'Hi {staff_firstname}<br /><br /><span style=\"font-size: 12pt;\">This is a reminder that the following contract will expire soon:</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject:</strong> {contract_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Description:</strong> {contract_description}</span><br /><span style=\"font-size: 12pt;\"><strong>Date Start:</strong> {contract_datestart}</span><br /><span style=\"font-size: 12pt;\"><strong>Date End:</strong> {contract_dateend}</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(67, 'gdpr', 'gdpr-removal-request', 'english', 'Removal Request From Contact (Sent to administrators)', 'Data Removal Request Received', 'Hello&nbsp;{staff_firstname}&nbsp;{staff_lastname}<br /><br />Data removal has been requested by&nbsp;{contact_firstname} {contact_lastname}<br /><br />You can review this request and take proper actions directly from the admin area.', '{companyname} | CRM', '', 0, 1, 0),
(68, 'gdpr', 'gdpr-removal-request-lead', 'english', 'Removal Request From Lead (Sent to administrators)', 'Data Removal Request Received', 'Hello&nbsp;{staff_firstname}&nbsp;{staff_lastname}<br /><br />Data removal has been requested by {lead_name}<br /><br />You can review this request and take proper actions directly from the admin area.<br /><br />To view the lead inside the admin area click here:&nbsp;<a href=\"{lead_link}\">{lead_link}</a>', '{companyname} | CRM', '', 0, 1, 0),
(69, 'client', 'client-registration-confirmed', 'english', 'Customer Registration Confirmed', 'Your registration is confirmed', '<p>Dear {contact_firstname} {contact_lastname}<br /><br />We just wanted to let you know that your registration at&nbsp;{companyname} is successfully confirmed and your account is now active.<br /><br />You can login at&nbsp;<a href=\"{crm_url}\">{crm_url}</a> with the email and password you provided during registration.<br /><br />Please contact us if you need any help.<br /><br />Kind Regards, <br />{email_signature}</p>\r\n<p><br />(This is an automated email, so please don\'t reply to this email address)</p>', '{companyname} | CRM', '', 0, 1, 0),
(70, 'contract', 'contract-signed-to-staff', 'english', 'Contract Signed (Sent to Staff)', 'Customer Signed a Contract', 'Hi {staff_firstname}<br /><br />A contract with subject&nbsp;<strong>{contract_subject} </strong>has been successfully signed by the customer.<br /><br />You can view the contract at the following link: <a href=\"{contract_link}\">{contract_subject}</a>&nbsp;or from the admin area.<br /><br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(71, 'subscriptions', 'customer-subscribed-to-staff', 'english', 'Customer Subscribed to a Subscription (Sent to administrators and subscription creator)', 'Customer Subscribed to a Subscription', 'The customer <strong>{client_company}</strong> subscribed to a subscription with name&nbsp;<strong>{subscription_name}</strong><br /><br /><strong>ID</strong>:&nbsp;{subscription_id}<br /><strong>Subscription name</strong>:&nbsp;{subscription_name}<br /><strong>Subscription description</strong>:&nbsp;{subscription_description}<br /><br />You can view the subscription by clicking <a href=\"{subscription_link}\">here</a><br />\r\n<div style=\"text-align: center;\"><span style=\"font-size: 10pt;\">&nbsp;</span></div>\r\nBest Regards,<br />{email_signature}<br /><br /><span style=\"font-size: 10pt;\"><span style=\"color: #999999;\">You are receiving this email because you are either administrator or you are creator of the subscription.</span></span>', '{companyname} | CRM', '', 0, 1, 0),
(72, 'client', 'contact-verification-email', 'english', 'Email Verification (Sent to Contact After Registration)', 'Verify Email Address', '<p>Hello&nbsp;{contact_firstname}<br /><br />Please click the button below to verify your email address.<br /><br /><a href=\"{email_verification_url}\">Verify Email Address</a><br /><br />If you did not create an account, no further action is required</p>\r\n<p><br />{email_signature}</p>', '{companyname} | CRM', '', 0, 1, 0),
(73, 'client', 'new-customer-profile-file-uploaded-to-staff', 'english', 'New Customer Profile File(s) Uploaded (Sent to Staff)', 'Customer Uploaded New File(s) in Profile', 'Hi!<br /><br />New file(s) is uploaded into the customer ({client_company}) profile by&nbsp;{contact_firstname}<br /><br />You can check the uploaded files into the admin area by clicking <a href=\"{customer_profile_files_admin_link}\">here</a> or at the following link:&nbsp;{customer_profile_files_admin_link}<br /><br />{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(74, 'staff', 'event-notification-to-staff', 'english', 'Event Notification (Calendar)', 'Upcoming Event - {event_title}', 'Hi {staff_firstname}! <br /><br />This is a reminder for event <a href=\\\"{event_link}\\\">{event_title}</a> scheduled at {event_start_date}. <br /><br />Regards.', '', '', 0, 1, 0),
(75, 'subscriptions', 'subscription-payment-requires-action', 'english', 'Credit Card Authorization Required - SCA', 'Important: Confirm your subscription {subscription_name} payment', '<p>Hello {contact_firstname}</p>\r\n<p><strong>Your bank sometimes requires an additional step to make sure an online transaction was authorized.</strong><br /><br />Because of European regulation to protect consumers, many online payments now require two-factor authentication. Your bank ultimately decides when authentication is required to confirm a payment, but you may notice this step when you start paying for a service or when the cost changes.<br /><br />In order to pay the subscription <strong>{subscription_name}</strong>, you will need to&nbsp;confirm your payment by clicking on the follow link: <strong><a href=\"{subscription_authorize_payment_link}\">{subscription_authorize_payment_link}</a></strong><br /><br />To view the subscription, please click at the following link: <a href=\"{subscription_link}\"><span>{subscription_link}</span></a><br />or you can login in our dedicated area here: <a href=\"{crm_url}/login\">{crm_url}/login</a> in case you want to update your credit card or view the subscriptions you are subscribed.<br /><br />Best Regards,<br />{email_signature}</p>', '{companyname} | CRM', '', 0, 1, 0);
INSERT INTO `tblemailtemplates` (`emailtemplateid`, `type`, `slug`, `language`, `name`, `subject`, `message`, `fromname`, `fromemail`, `plaintext`, `active`, `order`) VALUES
(76, 'invoice', 'invoice-due-notice', 'english', 'Invoice Due Notice', 'Your {invoice_number} will be due soon', '<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}<br /><br /></span>You invoice <span style=\"font-size: 12pt;\"><strong># {invoice_number} </strong>will be due on <strong>{invoice_duedate}</strong></span><br /><br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(77, 'estimate_request', 'estimate-request-submitted-to-staff', 'english', 'Estimate Request Submitted (Sent to Staff)', 'New Estimate Request Submitted', '<span> Hello,&nbsp;</span><br /><br />{estimate_request_email} submitted an estimate request via the {estimate_request_form_name} form.<br /><br />You can view the request at the following link: <a href=\"{estimate_request_link}\">{estimate_request_link}</a><br /><br />==<br /><br />{estimate_request_submitted_data}<br /><br />Kind Regards,<br /><span>{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(78, 'estimate_request', 'estimate-request-assigned', 'english', 'Estimate Request Assigned (Sent to Staff)', 'New Estimate Request Assigned', '<span> Hello {estimate_request_assigned},&nbsp;</span><br /><br />Estimate request #{estimate_request_id} has been assigned to you.<br /><br />You can view the request at the following link: <a href=\"{estimate_request_link}\">{estimate_request_link}</a><br /><br />Kind Regards,<br /><span>{email_signature}</span>', '{companyname} | CRM', '', 0, 1, 0),
(79, 'estimate_request', 'estimate-request-received-to-user', 'english', 'Estimate Request Received (Sent to User)', 'Estimate Request Received', 'Hello,<br /><br /><strong>Your request has been received.</strong><br /><br />This email is to let you know that we received your request and we will get back to you as soon as possible with more information.<br /><br />Best Regards,<br />{email_signature}', '{companyname} | CRM', '', 0, 0, 0),
(80, 'notifications', 'non-billed-tasks-reminder', 'english', 'Non-billed tasks reminder (sent to selected staff members)', 'Action required: Completed tasks are not billed', 'Hello {staff_firstname}<br><br>The following tasks are marked as complete but not yet billed:<br><br>{unbilled_tasks_list}<br><br>Kind Regards,<br><br>{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(81, 'invoice', 'invoices-batch-payments', 'english', 'Invoices Payments Recorded in Batch (Sent to Customer)', 'We have received your payments', 'Hello {contact_firstname} {contact_lastname}<br><br>Thank you for the payments. Please find the payments details below:<br><br>{batch_payments_list}<br><br>We are looking forward working with you.<br><br>Kind Regards,<br><br>{email_signature}', '{companyname} | CRM', '', 0, 1, 0),
(82, 'file_sharing', 'fs-share-staff', 'english', 'Shared to staff', 'File Sharing', '<span></span><br /><br /><span>Have files that have just been shared with you: {share_link}.</span>', '{companyname} | CRM', NULL, 0, 1, 0),
(83, 'file_sharing', 'fs-share-client', 'english', 'Shared to client', 'File Sharing', '<span></span><br /><br /><span>Have files that have just been shared with you: {share_link}.</span>', '{companyname} | CRM', NULL, 0, 1, 0),
(84, 'file_sharing', 'fs-share-public', 'english', 'Shared to public', 'File Sharing', '<span></span><br /><br /><span>Have files that have just been shared with you: {share_link}.</span>', '{companyname} | CRM', NULL, 0, 1, 0),
(85, 'approve', 'send-request-approve', 'english', 'Send Approval Request', 'Require Approval', '<p>Hi {staff_firstname}<br /><br />You have received a request to approve the {object_type}.<br /><br />You can view the {object_type} on the following link <a href=\"{object_link}\">{object_name}</a><br /><br />{email_signature}</p>', '{companyname} | CRM', NULL, 0, 1, 0),
(86, 'approve', 'send-request-approve', 'vietnamese', 'Gửi yêu cầu phê duyệt', 'Yêu cầu phê duyệt', 'Xin ch&agrave;o {staff_firstname} {staff_lastname}<br /><br />Bạn đã nhận được yêu cầu phê duyệt {object_type} mới.<br /><br />Bạn c&oacute; thể xem hóa đơn tại đ&acirc;y&nbsp;<a href=\"{object_link}\">{object_name}</a><br /><br />{email_signature}', '{companyname} | CRM', NULL, 0, 1, 0),
(87, 'approve', 'send_rejected', 'english', 'Send Rejected', 'The {object_type} has been rejected', '<p>Hi {staff_firstname}<br /><br />Your {object_type} has been rejected.<br /><br />You can view the {object_type} on the following link <a href=\"{object_link}\">{object_name}</a><br /><br />{email_signature}</p>', '{companyname} | CRM', NULL, 0, 1, 0),
(88, 'approve', 'send_rejected', 'vietnamese', 'Gửi từ chối', '{object_type} đã bị từ chối', 'Xin ch&agrave;o {staff_firstname} {staff_lastname}<br /><br />{object_type} của bạn đã bị từ chối.<br /><br />Bạn c&oacute; thể xem {object_type} tại đ&acirc;y&nbsp;<a href=\"{object_link}\">{object_name}</a><br /><br />{email_signature}', '{companyname} | CRM', NULL, 0, 1, 0),
(89, 'approve', 'send_approve', 'english', 'Send Approve', 'The {object_type} has been approved', '<p>Hi {staff_firstname}<br /><br />Your {object_type} has been approved.<br /><br />You can view the {object_type} on the following link <a href=\"{object_link}\">{object_name}</a><br /><br />{email_signature}</p>', '{companyname} | CRM', NULL, 0, 1, 0),
(90, 'approve', 'send_approve', 'vietnamese', 'Gửi phê duyệt', '{object_type} đã được phê duyệt', 'Xin ch&agrave;o {staff_firstname} {staff_lastname}<br /><br />{object_type} của bạn đã được phê duyệt.<br /><br />Bạn c&oacute; thể xem {object_type} tại đ&acirc;y&nbsp;<a href=\"{object_link}\">{object_name}</a><br /><br />{email_signature}', '{companyname} | CRM', NULL, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblestimates`
--

CREATE TABLE `tblestimates` (
  `id` int NOT NULL,
  `sent` tinyint(1) NOT NULL DEFAULT '0',
  `datesend` datetime DEFAULT NULL,
  `clientid` int NOT NULL,
  `deleted_customer_name` varchar(100) DEFAULT NULL,
  `project_id` int NOT NULL DEFAULT '0',
  `number` int NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `number_format` int NOT NULL DEFAULT '0',
  `hash` varchar(32) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `date` date NOT NULL,
  `expirydate` date DEFAULT NULL,
  `currency` int NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total` decimal(15,2) NOT NULL,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `addedfrom` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `clientnote` text,
  `adminnote` text,
  `discount_percent` decimal(15,2) DEFAULT '0.00',
  `discount_total` decimal(15,2) DEFAULT '0.00',
  `discount_type` varchar(30) DEFAULT NULL,
  `invoiceid` int DEFAULT NULL,
  `invoiced_date` datetime DEFAULT NULL,
  `terms` text,
  `reference_no` varchar(100) DEFAULT NULL,
  `sale_agent` int NOT NULL DEFAULT '0',
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int DEFAULT NULL,
  `include_shipping` tinyint(1) NOT NULL,
  `show_shipping_on_estimate` tinyint(1) NOT NULL DEFAULT '1',
  `show_quantity_as` int NOT NULL DEFAULT '1',
  `pipeline_order` int DEFAULT '1',
  `is_expiry_notified` int NOT NULL DEFAULT '0',
  `acceptance_firstname` varchar(50) DEFAULT NULL,
  `acceptance_lastname` varchar(50) DEFAULT NULL,
  `acceptance_email` varchar(100) DEFAULT NULL,
  `acceptance_date` datetime DEFAULT NULL,
  `acceptance_ip` varchar(40) DEFAULT NULL,
  `signature` varchar(40) DEFAULT NULL,
  `short_link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblestimate_requests`
--

CREATE TABLE `tblestimate_requests` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `submission` longtext NOT NULL,
  `last_status_change` datetime DEFAULT NULL,
  `date_estimated` datetime DEFAULT NULL,
  `from_form_id` int DEFAULT NULL,
  `assigned` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `default_language` int NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblestimate_request_forms`
--

CREATE TABLE `tblestimate_request_forms` (
  `id` int UNSIGNED NOT NULL,
  `form_key` varchar(32) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(191) NOT NULL,
  `form_data` mediumtext,
  `recaptcha` int DEFAULT NULL,
  `status` int NOT NULL,
  `submit_btn_name` varchar(100) DEFAULT NULL,
  `submit_btn_bg_color` varchar(10) DEFAULT '#84c529',
  `submit_btn_text_color` varchar(10) DEFAULT '#ffffff',
  `success_submit_msg` text,
  `submit_action` int DEFAULT '0',
  `submit_redirect_url` mediumtext,
  `language` varchar(100) DEFAULT NULL,
  `dateadded` datetime DEFAULT NULL,
  `notify_type` varchar(100) DEFAULT NULL,
  `notify_ids` mediumtext,
  `responsible` int DEFAULT NULL,
  `notify_request_submitted` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblestimate_request_status`
--

CREATE TABLE `tblestimate_request_status` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `statusorder` int DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `flag` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblestimate_request_status`
--

INSERT INTO `tblestimate_request_status` (`id`, `name`, `statusorder`, `color`, `flag`) VALUES
(1, 'Cancelled', 1, '#808080', 'cancelled'),
(2, 'Processing', 2, '#007bff', 'processing'),
(3, 'Completed', 3, '#28a745', 'completed');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblevents`
--

CREATE TABLE `tblevents` (
  `eventid` int NOT NULL,
  `title` mediumtext NOT NULL,
  `description` text,
  `userid` int NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `public` int NOT NULL DEFAULT '0',
  `color` varchar(10) DEFAULT NULL,
  `isstartnotified` tinyint(1) NOT NULL DEFAULT '0',
  `reminder_before` int NOT NULL DEFAULT '0',
  `reminder_before_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblexpenses`
--

CREATE TABLE `tblexpenses` (
  `id` int NOT NULL,
  `category` int NOT NULL,
  `currency` int NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `tax` int DEFAULT NULL,
  `tax2` int NOT NULL DEFAULT '0',
  `reference_no` varchar(100) DEFAULT NULL,
  `note` text,
  `expense_name` varchar(191) DEFAULT NULL,
  `clientid` int NOT NULL,
  `project_id` int NOT NULL DEFAULT '0',
  `billable` int DEFAULT '0',
  `invoiceid` int DEFAULT NULL,
  `paymentmode` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `recurring_type` varchar(10) DEFAULT NULL,
  `repeat_every` int DEFAULT NULL,
  `recurring` int NOT NULL DEFAULT '0',
  `cycles` int NOT NULL DEFAULT '0',
  `total_cycles` int NOT NULL DEFAULT '0',
  `custom_recurring` int NOT NULL DEFAULT '0',
  `last_recurring_date` date DEFAULT NULL,
  `create_invoice_billable` tinyint(1) DEFAULT NULL,
  `send_invoice_to_customer` tinyint(1) NOT NULL,
  `recurring_from` int DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  `addedfrom` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblexpenses_categories`
--

CREATE TABLE `tblexpenses_categories` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfiles`
--

CREATE TABLE `tblfiles` (
  `id` int NOT NULL,
  `rel_id` int NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `file_name` varchar(191) NOT NULL,
  `filetype` varchar(40) DEFAULT NULL,
  `visible_to_customer` int NOT NULL DEFAULT '0',
  `attachment_key` varchar(32) DEFAULT NULL,
  `external` varchar(40) DEFAULT NULL,
  `external_link` text,
  `thumbnail_link` text COMMENT 'For external usage',
  `staffid` int NOT NULL,
  `contact_id` int DEFAULT '0',
  `task_comment_id` int NOT NULL DEFAULT '0',
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblfiles`
--

INSERT INTO `tblfiles` (`id`, `rel_id`, `rel_type`, `file_name`, `filetype`, `visible_to_customer`, `attachment_key`, `external`, `external_link`, `thumbnail_link`, `staffid`, `contact_id`, `task_comment_id`, `dateadded`) VALUES
(1, 1, 'customer', 'test.txt', 'text/plain', 1, '19909bb8593ba768a9fa9e878894c5fa', NULL, NULL, NULL, 0, 1, 0, '2023-07-05 08:37:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblform_questions`
--

CREATE TABLE `tblform_questions` (
  `questionid` int NOT NULL,
  `rel_id` int NOT NULL,
  `rel_type` varchar(20) DEFAULT NULL,
  `question` mediumtext NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `question_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblform_question_box`
--

CREATE TABLE `tblform_question_box` (
  `boxid` int NOT NULL,
  `boxtype` varchar(10) NOT NULL,
  `questionid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblform_question_box_description`
--

CREATE TABLE `tblform_question_box_description` (
  `questionboxdescriptionid` int NOT NULL,
  `description` mediumtext NOT NULL,
  `boxid` mediumtext NOT NULL,
  `questionid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblform_results`
--

CREATE TABLE `tblform_results` (
  `resultid` int NOT NULL,
  `boxid` int NOT NULL,
  `boxdescriptionid` int DEFAULT NULL,
  `rel_id` int NOT NULL,
  `rel_type` varchar(20) DEFAULT NULL,
  `questionid` int NOT NULL,
  `answer` text,
  `resultsetid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfs_downloads`
--

CREATE TABLE `tblfs_downloads` (
  `id` int NOT NULL,
  `hash_share` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `ip` varchar(255) NOT NULL,
  `browser_name` varchar(45) DEFAULT NULL,
  `http_user_agent` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfs_file_overview`
--

CREATE TABLE `tblfs_file_overview` (
  `id` int UNSIGNED NOT NULL,
  `fileid` varchar(255) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `path` text,
  `number` int NOT NULL DEFAULT '0',
  `created_at` varchar(11) DEFAULT NULL,
  `inserted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hash` varchar(250) NOT NULL DEFAULT '',
  `dir` int NOT NULL DEFAULT '0',
  `hash_share` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblfs_file_overview`
--

INSERT INTO `tblfs_file_overview` (`id`, `fileid`, `type`, `path`, `number`, `created_at`, `inserted_at`, `updated_at`, `hash`, `dir`, `hash_share`) VALUES
(1, '1686601270', 'directory', 'Main File Sharing/administrador-local', 0, '1', '2023-06-12 20:21:10', '2023-06-12 20:21:10', '', 1, 'Pui5IM'),
(2, '168660127094', 'directory', 'modules/file_sharing/uploads/Main File Sharing/administrador-local/Shared', 0, '1', '2023-06-12 20:21:10', '2023-06-12 20:21:10', '', 1, 'XTChXp'),
(3, '168660127078', 'directory', 'modules/file_sharing/uploads/Main File Sharing/.trash/administrador-local', 0, '1', '2023-06-12 20:21:10', '2023-06-12 20:21:10', '', 1, 'FrR4rM'),
(4, '1686601297', 'directory', 'C:\\wamp64\\www\\ecv_marcas\\code\\crm\\modules/file_sharing/uploads/Main File Sharing/administrador-local', 0, '1', '2023-06-12 20:21:37', '2023-06-12 20:21:37', '', 1, 'sTJW6D'),
(5, '168660129727', 'directory', 'modules/file_sharing/uploads/Main File Sharing/administrador-local/Shared', 0, '1', '2023-06-12 20:21:37', '2023-06-12 20:21:37', '', 1, '3ENVAg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfs_genenal_ip_share`
--

CREATE TABLE `tblfs_genenal_ip_share` (
  `id` int UNSIGNED NOT NULL,
  `parrent_id` varchar(11) NOT NULL,
  `ip_share` varchar(20) DEFAULT NULL,
  `inserted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfs_setting_configuration`
--

CREATE TABLE `tblfs_setting_configuration` (
  `id` int UNSIGNED NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `is_read` int NOT NULL DEFAULT '0',
  `is_upload` int NOT NULL DEFAULT '0',
  `is_download` int NOT NULL DEFAULT '0',
  `is_delete` int NOT NULL DEFAULT '0',
  `is_write` int NOT NULL DEFAULT '0',
  `password` varchar(255) DEFAULT NULL,
  `max_size` int NOT NULL DEFAULT '2',
  `min_size` int NOT NULL DEFAULT '1',
  `created_at` varchar(11) DEFAULT NULL,
  `inserted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_share` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfs_setting_configuration_relationship`
--

CREATE TABLE `tblfs_setting_configuration_relationship` (
  `id` int NOT NULL,
  `configuration_id` int NOT NULL,
  `rel_type` varchar(45) NOT NULL,
  `rel_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfs_sharings`
--

CREATE TABLE `tblfs_sharings` (
  `id` int NOT NULL,
  `is_read` int NOT NULL DEFAULT '0',
  `is_upload` int NOT NULL DEFAULT '0',
  `is_download` int NOT NULL DEFAULT '0',
  `is_delete` int NOT NULL DEFAULT '0',
  `is_write` int NOT NULL DEFAULT '0',
  `password` varchar(255) DEFAULT NULL,
  `expiration_date_apply` int DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `expiration_date_delete` int DEFAULT NULL,
  `download_limits_apply` int DEFAULT NULL,
  `download_limits` int DEFAULT NULL,
  `download_limits_delete` int DEFAULT NULL,
  `hash_share` varchar(255) DEFAULT NULL,
  `created_at` int NOT NULL,
  `type` varchar(45) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `isowner` tinyint DEFAULT NULL,
  `phash` text,
  `locked` tinyint DEFAULT NULL,
  `mime` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `read` tinyint DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `ts` varchar(255) DEFAULT NULL,
  `write` tinyint DEFAULT NULL,
  `hash` text,
  `url` text,
  `has_been_deleted` int NOT NULL DEFAULT '0',
  `downloads` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfs_sharing_relationship`
--

CREATE TABLE `tblfs_sharing_relationship` (
  `id` int NOT NULL,
  `share_id` int NOT NULL,
  `type` varchar(45) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblgdpr_requests`
--

CREATE TABLE `tblgdpr_requests` (
  `id` int NOT NULL,
  `clientid` int NOT NULL DEFAULT '0',
  `contact_id` int NOT NULL DEFAULT '0',
  `lead_id` int NOT NULL DEFAULT '0',
  `request_type` varchar(191) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `request_date` datetime NOT NULL,
  `request_from` varchar(150) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblgoals`
--

CREATE TABLE `tblgoals` (
  `id` int NOT NULL,
  `subject` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `goal_type` int NOT NULL,
  `contract_type` int NOT NULL DEFAULT '0',
  `achievement` int NOT NULL,
  `notify_when_fail` tinyint(1) NOT NULL DEFAULT '1',
  `notify_when_achieve` tinyint(1) NOT NULL DEFAULT '1',
  `notified` int NOT NULL DEFAULT '0',
  `staff_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblhrm_option`
--

CREATE TABLE `tblhrm_option` (
  `option_id` int UNSIGNED NOT NULL,
  `option_name` varchar(200) NOT NULL,
  `option_val` longtext,
  `auto` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblhrm_option`
--

INSERT INTO `tblhrm_option` (`option_id`, `option_name`, `option_val`, `auto`) VALUES
(1, 'hrm_contract_form', '[]', 1),
(2, 'hrm_leave_position', '[]', 1),
(3, 'hrm_leave_contract_type', '[]', 1),
(4, 'hrm_leave_start_date', NULL, 1),
(5, 'hrm_max_leave_in_year', NULL, 1),
(6, 'hrm_start_leave_from_month', NULL, 1),
(7, 'hrm_start_leave_to_month', NULL, 1),
(8, 'hrm_add_new_leave_month_from_date', NULL, 1),
(9, 'hrm_accumulated_leave_to_month', NULL, 1),
(10, 'hrm_leave_contract_sign_day', NULL, 1),
(11, 'hrm_start_date_seniority', NULL, 1),
(12, 'hrm_seniority_year', NULL, 1),
(13, 'hrm_seniority_year_leave', NULL, 1),
(14, 'hrm_next_year', NULL, 1),
(15, 'hrm_next_year_leave', NULL, 1),
(16, 'alow_borrow_leave', NULL, 1),
(17, 'contract_type_borrow', '[]', 1),
(18, 'max_leave_borrow', NULL, 1),
(19, 'day_increases_monthly', '15', 1),
(20, 'sign_a_labor_contract', '1', 1),
(21, 'maternity_leave_to_return_to_work', '1', 1),
(22, 'unpaid_leave_to_return_to_work', '1', 1),
(23, 'increase_the_premium', '1', 1),
(24, 'day_decreases_monthly', '5', 1),
(25, 'contract_paid_for_unemployment', '1', 1),
(26, 'maternity_leave_regime', '1', 1),
(27, 'unpaid_leave_of_more_than', '10', 1),
(28, 'reduced_premiums', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblhrm_timesheet`
--

CREATE TABLE `tblhrm_timesheet` (
  `id` int NOT NULL,
  `staff_id` int NOT NULL,
  `date_work` date NOT NULL,
  `value` text,
  `type` varchar(45) DEFAULT NULL,
  `add_from` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblinsurance_type`
--

CREATE TABLE `tblinsurance_type` (
  `id` int NOT NULL,
  `from_month` date NOT NULL,
  `social_company` varchar(15) DEFAULT NULL,
  `social_staff` varchar(15) DEFAULT NULL,
  `labor_accident_company` varchar(15) DEFAULT NULL,
  `labor_accident_staff` varchar(15) DEFAULT NULL,
  `health_company` varchar(15) DEFAULT NULL,
  `health_staff` varchar(15) DEFAULT NULL,
  `unemployment_company` varchar(15) DEFAULT NULL,
  `unemployment_staff` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblinvoicepaymentrecords`
--

CREATE TABLE `tblinvoicepaymentrecords` (
  `id` int NOT NULL,
  `invoiceid` int NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `paymentmode` varchar(40) DEFAULT NULL,
  `paymentmethod` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `daterecorded` datetime NOT NULL,
  `note` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `transactionid` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblinvoices`
--

CREATE TABLE `tblinvoices` (
  `id` int NOT NULL,
  `sent` tinyint(1) NOT NULL DEFAULT '0',
  `datesend` datetime DEFAULT NULL,
  `clientid` int NOT NULL,
  `deleted_customer_name` varchar(100) DEFAULT NULL,
  `number` int NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `number_format` int NOT NULL DEFAULT '0',
  `datecreated` datetime NOT NULL,
  `date` date NOT NULL,
  `duedate` date DEFAULT NULL,
  `currency` int NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total` decimal(15,2) NOT NULL,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `addedfrom` int DEFAULT NULL,
  `hash` varchar(32) NOT NULL,
  `status` int DEFAULT '1',
  `clientnote` text,
  `adminnote` text,
  `last_overdue_reminder` date DEFAULT NULL,
  `last_due_reminder` date DEFAULT NULL,
  `cancel_overdue_reminders` int NOT NULL DEFAULT '0',
  `allowed_payment_modes` mediumtext,
  `token` mediumtext,
  `discount_percent` decimal(15,2) DEFAULT '0.00',
  `discount_total` decimal(15,2) DEFAULT '0.00',
  `discount_type` varchar(30) NOT NULL,
  `recurring` int NOT NULL DEFAULT '0',
  `recurring_type` varchar(10) DEFAULT NULL,
  `custom_recurring` tinyint(1) NOT NULL DEFAULT '0',
  `cycles` int NOT NULL DEFAULT '0',
  `total_cycles` int NOT NULL DEFAULT '0',
  `is_recurring_from` int DEFAULT NULL,
  `last_recurring_date` date DEFAULT NULL,
  `terms` text,
  `sale_agent` int NOT NULL DEFAULT '0',
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int DEFAULT NULL,
  `include_shipping` tinyint(1) NOT NULL,
  `show_shipping_on_invoice` tinyint(1) NOT NULL DEFAULT '1',
  `show_quantity_as` int NOT NULL DEFAULT '1',
  `project_id` int DEFAULT '0',
  `subscription_id` int NOT NULL DEFAULT '0',
  `short_link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblitemable`
--

CREATE TABLE `tblitemable` (
  `id` int NOT NULL,
  `rel_id` int NOT NULL,
  `rel_type` varchar(15) NOT NULL,
  `description` mediumtext NOT NULL,
  `long_description` mediumtext,
  `qty` decimal(15,2) NOT NULL,
  `rate` decimal(15,2) NOT NULL,
  `unit` varchar(40) DEFAULT NULL,
  `item_order` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblitems`
--

CREATE TABLE `tblitems` (
  `id` int NOT NULL,
  `description` mediumtext NOT NULL,
  `long_description` text,
  `rate` decimal(15,2) NOT NULL,
  `tax` int DEFAULT NULL,
  `tax2` int DEFAULT NULL,
  `unit` varchar(40) DEFAULT NULL,
  `group_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblitems_groups`
--

CREATE TABLE `tblitems_groups` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblitem_tax`
--

CREATE TABLE `tblitem_tax` (
  `id` int NOT NULL,
  `itemid` int NOT NULL,
  `rel_id` int NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `taxrate` decimal(15,2) NOT NULL,
  `taxname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbljob_position`
--

CREATE TABLE `tbljob_position` (
  `position_id` int UNSIGNED NOT NULL,
  `position_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblknowedge_base_article_feedback`
--

CREATE TABLE `tblknowedge_base_article_feedback` (
  `articleanswerid` int NOT NULL,
  `articleid` int NOT NULL,
  `answer` int NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblknowledge_base`
--

CREATE TABLE `tblknowledge_base` (
  `articleid` int NOT NULL,
  `articlegroup` int NOT NULL,
  `subject` mediumtext NOT NULL,
  `description` text NOT NULL,
  `slug` mediumtext NOT NULL,
  `active` tinyint NOT NULL,
  `datecreated` datetime NOT NULL,
  `article_order` int NOT NULL DEFAULT '0',
  `staff_article` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblknowledge_base_groups`
--

CREATE TABLE `tblknowledge_base_groups` (
  `groupid` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `group_slug` text,
  `description` mediumtext,
  `active` tinyint NOT NULL,
  `color` varchar(10) DEFAULT '#28B8DA',
  `group_order` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblleads`
--

CREATE TABLE `tblleads` (
  `id` int NOT NULL,
  `hash` varchar(65) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `company` varchar(191) DEFAULT NULL,
  `description` text,
  `country` int NOT NULL DEFAULT '0',
  `zip` varchar(15) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `assigned` int NOT NULL DEFAULT '0',
  `dateadded` datetime NOT NULL,
  `from_form_id` int NOT NULL DEFAULT '0',
  `status` int NOT NULL,
  `source` int NOT NULL,
  `lastcontact` datetime DEFAULT NULL,
  `dateassigned` date DEFAULT NULL,
  `last_status_change` datetime DEFAULT NULL,
  `addedfrom` int NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `leadorder` int DEFAULT '1',
  `phonenumber` varchar(50) DEFAULT NULL,
  `date_converted` datetime DEFAULT NULL,
  `lost` tinyint(1) NOT NULL DEFAULT '0',
  `junk` int NOT NULL DEFAULT '0',
  `last_lead_status` int NOT NULL DEFAULT '0',
  `is_imported_from_email_integration` tinyint(1) NOT NULL DEFAULT '0',
  `email_integration_uid` varchar(30) DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `default_language` varchar(40) DEFAULT NULL,
  `client_id` int NOT NULL DEFAULT '0',
  `lead_value` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblleads_email_integration`
--

CREATE TABLE `tblleads_email_integration` (
  `id` int NOT NULL COMMENT 'the ID always must be 1',
  `active` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `imap_server` varchar(100) NOT NULL,
  `password` mediumtext NOT NULL,
  `check_every` int NOT NULL DEFAULT '5',
  `responsible` int NOT NULL,
  `lead_source` int NOT NULL,
  `lead_status` int NOT NULL,
  `encryption` varchar(3) DEFAULT NULL,
  `folder` varchar(100) NOT NULL,
  `last_run` varchar(50) DEFAULT NULL,
  `notify_lead_imported` tinyint(1) NOT NULL DEFAULT '1',
  `notify_lead_contact_more_times` tinyint(1) NOT NULL DEFAULT '1',
  `notify_type` varchar(20) DEFAULT NULL,
  `notify_ids` mediumtext,
  `mark_public` int NOT NULL DEFAULT '0',
  `only_loop_on_unseen_emails` tinyint(1) NOT NULL DEFAULT '1',
  `delete_after_import` int NOT NULL DEFAULT '0',
  `create_task_if_customer` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblleads_email_integration`
--

INSERT INTO `tblleads_email_integration` (`id`, `active`, `email`, `imap_server`, `password`, `check_every`, `responsible`, `lead_source`, `lead_status`, `encryption`, `folder`, `last_run`, `notify_lead_imported`, `notify_lead_contact_more_times`, `notify_type`, `notify_ids`, `mark_public`, `only_loop_on_unseen_emails`, `delete_after_import`, `create_task_if_customer`) VALUES
(1, 0, '', '', '', 10, 0, 0, 0, 'tls', 'INBOX', '', 1, 1, 'assigned', '', 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblleads_sources`
--

CREATE TABLE `tblleads_sources` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblleads_sources`
--

INSERT INTO `tblleads_sources` (`id`, `name`) VALUES
(2, 'Facebook'),
(1, 'Google');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblleads_status`
--

CREATE TABLE `tblleads_status` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `statusorder` int DEFAULT NULL,
  `color` varchar(10) DEFAULT '#28B8DA',
  `isdefault` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblleads_status`
--

INSERT INTO `tblleads_status` (`id`, `name`, `statusorder`, `color`, `isdefault`) VALUES
(1, 'Customer', 1000, '#7cb342', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbllead_activity_log`
--

CREATE TABLE `tbllead_activity_log` (
  `id` int NOT NULL,
  `leadid` int NOT NULL,
  `description` mediumtext NOT NULL,
  `additional_data` text,
  `date` datetime NOT NULL,
  `staffid` int NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `custom_activity` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbllead_integration_emails`
--

CREATE TABLE `tbllead_integration_emails` (
  `id` int NOT NULL,
  `subject` mediumtext,
  `body` mediumtext,
  `dateadded` datetime NOT NULL,
  `leadid` int NOT NULL,
  `emailid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbllistemails`
--

CREATE TABLE `tbllistemails` (
  `emailid` int NOT NULL,
  `listid` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmaillistscustomfields`
--

CREATE TABLE `tblmaillistscustomfields` (
  `customfieldid` int NOT NULL,
  `listid` int NOT NULL,
  `fieldname` varchar(150) NOT NULL,
  `fieldslug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmaillistscustomfieldvalues`
--

CREATE TABLE `tblmaillistscustomfieldvalues` (
  `customfieldvalueid` int NOT NULL,
  `listid` int NOT NULL,
  `customfieldid` int NOT NULL,
  `emailid` int NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmail_queue`
--

CREATE TABLE `tblmail_queue` (
  `id` int NOT NULL,
  `engine` varchar(40) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `cc` text,
  `bcc` text,
  `message` mediumtext NOT NULL,
  `alt_message` mediumtext,
  `status` enum('pending','sending','sent','failed') DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `headers` text,
  `attachments` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmanage_leave`
--

CREATE TABLE `tblmanage_leave` (
  `leave_id` int UNSIGNED NOT NULL,
  `id_staff` int NOT NULL,
  `leave_date` int DEFAULT NULL,
  `leave_year` int DEFAULT NULL,
  `accumulated_leave` int DEFAULT NULL,
  `seniority_leave` int DEFAULT NULL,
  `borrow_leave` int DEFAULT NULL,
  `actual_leave` int DEFAULT NULL,
  `expected_leave` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmigrations`
--

CREATE TABLE `tblmigrations` (
  `version` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblmigrations`
--

INSERT INTO `tblmigrations` (`version`) VALUES
(304);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmilestones`
--

CREATE TABLE `tblmilestones` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text,
  `description_visible_to_customer` tinyint(1) DEFAULT '0',
  `start_date` date DEFAULT NULL,
  `due_date` date NOT NULL,
  `project_id` int NOT NULL,
  `color` varchar(10) DEFAULT NULL,
  `milestone_order` int NOT NULL DEFAULT '0',
  `datecreated` date NOT NULL,
  `hide_from_customer` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmindmap`
--

CREATE TABLE `tblmindmap` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `staffid` int DEFAULT '0',
  `mindmap_group_id` int DEFAULT '0',
  `mindmap_content` text,
  `dateadded` datetime DEFAULT NULL,
  `dateaupdated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblmindmap`
--

INSERT INTO `tblmindmap` (`id`, `title`, `description`, `staffid`, `mindmap_group_id`, `mindmap_content`, `dateadded`, `dateaupdated`) VALUES
(1, 'Sales', 'Sales process', 0, 0, '{\"nodeData\":{\"id\":\"root\",\"topic\":\"Sales process\",\"root\":true,\"children\":[{\"topic\":\"1. Initital contact\",\"id\":\"360d8067c3cc3810\",\"direction\":0,\"style\":{\"fontSize\":\"15\"},\"expanded\":true,\"children\":[{\"topic\":\"Cold call\",\"id\":\"360ef1e3318798a3\"},{\"topic\":\"Log call\",\"id\":\"360ef3dc879d78fe\"}]},{\"topic\":\"5.Negotiation\",\"id\":\"360d80a4bcea0675\",\"direction\":1,\"style\":{\"background\":\"#27ae61\",\"color\":\"#ecf0f1\"},\"expanded\":true,\"children\":[{\"topic\":\"Agreement\",\"id\":\"360f24a7e876629b\"},{\"topic\":\"Price\",\"id\":\"360f259fa25b8317\"},{\"topic\":\"Conditions\",\"id\":\"360f2648418e21b7\"}]},{\"topic\":\"2. BANT\",\"id\":\"360d80b74c078666\",\"direction\":0,\"style\":{\"background\":\"#c0392c\",\"color\":\"#ecf0f1\",\"fontSize\":\"15\"},\"expanded\":true,\"children\":[{\"topic\":\"Budget\",\"id\":\"360f0024dd662756\"},{\"topic\":\"Authority\",\"id\":\"360f013f626125b1\"},{\"topic\":\"Need\",\"id\":\"360f01cdacc46787\"},{\"topic\":\"Timeframe\",\"id\":\"360f0268b333cddb\"}]},{\"topic\":\"6.Deal\",\"id\":\"360d80c99c9c8578\",\"direction\":1,\"style\":{\"background\":\"#3298db\",\"color\":\"#ecf0f1\"},\"expanded\":true,\"children\":[{\"topic\":\"Price\",\"id\":\"360f2f94b7617209\",\"expanded\":true,\"children\":[{\"topic\":\"Deal\",\"id\":\"360f32575ead64f0\"},{\"topic\":\"No deal\",\"id\":\"360f35924cb070ea\"}]}]},{\"topic\":\"3. Investigation\",\"id\":\"360d80dc3965b973\",\"direction\":0,\"style\":{\"color\":\"#ecf0f1\",\"background\":\"#34495e\",\"fontSize\":\"15\"},\"expanded\":true,\"children\":[{\"topic\":\"Need\",\"id\":\"360f0b5fa80de3af\"}]},{\"topic\":\"4. Proposal\",\"id\":\"360d8109885c4059\",\"direction\":0,\"style\":{\"background\":\"#f39c11\",\"color\":\"#ecf0f1\",\"fontSize\":\"15\",\"fontWeight\":\"bold\"},\"expanded\":true,\"children\":[{\"topic\":\"Offer\",\"id\":\"360f128176e23b5b\"},{\"topic\":\"Budget\",\"id\":\"360f12f6243ed6d5\"},{\"topic\":\"Timeframe\",\"id\":\"360f136731ae8f86\"}]}],\"expanded\":true},\"linkData\":{}}', '2023-05-31 17:13:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmindmap_groups`
--

CREATE TABLE `tblmindmap_groups` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmodules`
--

CREATE TABLE `tblmodules` (
  `id` int NOT NULL,
  `module_name` varchar(55) NOT NULL,
  `installed_version` varchar(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblmodules`
--

INSERT INTO `tblmodules` (`id`, `module_name`, `installed_version`, `active`) VALUES
(1, 'pi', '2.3.0', 1),
(2, 'menu_setup', '2.3.0', 1),
(3, 'goals', '2.3.0', 1),
(4, 'exports', '1.0.0', 1),
(5, 'backup', '2.3.0', 1),
(6, 'surveys', '2.3.0', 1),
(7, 'theme_style', '2.3.0', 1),
(8, 'mindmap', '1.0.3', 1),
(9, 'file_sharing', '1.0.6', 1),
(10, 'hrm', '2.3.0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblnewsfeed_comment_likes`
--

CREATE TABLE `tblnewsfeed_comment_likes` (
  `id` int NOT NULL,
  `postid` int NOT NULL,
  `commentid` int NOT NULL,
  `userid` int NOT NULL,
  `dateliked` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblnewsfeed_posts`
--

CREATE TABLE `tblnewsfeed_posts` (
  `postid` int NOT NULL,
  `creator` int NOT NULL,
  `datecreated` datetime NOT NULL,
  `visibility` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `pinned` int NOT NULL,
  `datepinned` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblnewsfeed_post_comments`
--

CREATE TABLE `tblnewsfeed_post_comments` (
  `id` int NOT NULL,
  `content` text,
  `userid` int NOT NULL,
  `postid` int NOT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblnewsfeed_post_likes`
--

CREATE TABLE `tblnewsfeed_post_likes` (
  `id` int NOT NULL,
  `postid` int NOT NULL,
  `userid` int NOT NULL,
  `dateliked` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblnotes`
--

CREATE TABLE `tblnotes` (
  `id` int NOT NULL,
  `rel_id` int NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `description` text,
  `date_contacted` datetime DEFAULT NULL,
  `addedfrom` int NOT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblnotifications`
--

CREATE TABLE `tblnotifications` (
  `id` int NOT NULL,
  `isread` int NOT NULL DEFAULT '0',
  `isread_inline` tinyint(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `fromuserid` int NOT NULL,
  `fromclientid` int NOT NULL DEFAULT '0',
  `from_fullname` varchar(100) NOT NULL,
  `touserid` int NOT NULL,
  `fromcompany` int DEFAULT NULL,
  `link` mediumtext,
  `additional_data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblnotifications`
--

INSERT INTO `tblnotifications` (`id`, `isread`, `isread_inline`, `date`, `description`, `fromuserid`, `fromclientid`, `from_fullname`, `touserid`, `fromcompany`, `link`, `additional_data`) VALUES
(1, 1, 1, '2023-07-05 08:37:45', 'not_customer_uploaded_file', 0, 1, 'Bryan Useche', 1, NULL, 'clients/client/1?group=attachments', NULL),
(2, 0, 0, '2023-07-05 08:37:45', 'not_customer_uploaded_file', 0, 1, 'Bryan Useche', 7, NULL, 'clients/client/1?group=attachments', NULL),
(3, 0, 0, '2023-07-05 08:37:45', 'not_customer_uploaded_file', 0, 1, 'Bryan Useche', 8, NULL, 'clients/client/1?group=attachments', NULL),
(4, 0, 0, '2023-07-05 08:37:45', 'not_customer_uploaded_file', 0, 1, 'Bryan Useche', 11, NULL, 'clients/client/1?group=attachments', NULL),
(5, 0, 0, '2023-07-05 08:37:45', 'not_customer_uploaded_file', 0, 1, 'Bryan Useche', 21, NULL, 'clients/client/1?group=attachments', NULL),
(6, 0, 0, '2023-07-05 08:37:45', 'not_customer_uploaded_file', 0, 1, 'Bryan Useche', 22, NULL, 'clients/client/1?group=attachments', NULL),
(7, 0, 0, '2023-07-05 08:37:45', 'not_customer_uploaded_file', 0, 1, 'Bryan Useche', 37, NULL, 'clients/client/1?group=attachments', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbloptions`
--

CREATE TABLE `tbloptions` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `value` longtext NOT NULL,
  `autoload` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tbloptions`
--

INSERT INTO `tbloptions` (`id`, `name`, `value`, `autoload`) VALUES
(1, 'dateformat', 'Y-m-d|%Y-%m-%d', 1),
(2, 'companyname', '', 1),
(3, 'services', '1', 1),
(4, 'maximum_allowed_ticket_attachments', '4', 1),
(5, 'ticket_attachments_file_extensions', '.jpg,.png,.pdf,.doc,.zip,.rar', 1),
(6, 'staff_access_only_assigned_departments', '1', 1),
(7, 'use_knowledge_base', '1', 1),
(8, 'smtp_email', '', 1),
(9, 'smtp_password', '', 1),
(10, 'company_info_format', '{company_name}<br />\r\n{address}<br />\r\n{city} {state}<br />\r\n{country_code} {zip_code}<br />\r\n{vat_number_with_label}', 0),
(11, 'smtp_port', '', 1),
(12, 'smtp_host', '', 1),
(13, 'smtp_email_charset', 'utf-8', 1),
(14, 'default_timezone', 'America/Caracas', 1),
(15, 'clients_default_theme', 'perfex', 1),
(16, 'company_logo', '', 1),
(17, 'tables_pagination_limit', '25', 1),
(18, 'main_domain', '', 1),
(19, 'allow_registration', '0', 1),
(20, 'knowledge_base_without_registration', '1', 1),
(21, 'email_signature', '', 1),
(22, 'default_staff_role', '1', 1),
(23, 'newsfeed_maximum_files_upload', '10', 1),
(24, 'contract_expiration_before', '4', 1),
(25, 'invoice_prefix', 'INV-', 1),
(26, 'decimal_separator', '.', 1),
(27, 'thousand_separator', ',', 1),
(28, 'invoice_company_name', '', 1),
(29, 'invoice_company_address', '', 1),
(30, 'invoice_company_city', '', 1),
(31, 'invoice_company_country_code', '', 1),
(32, 'invoice_company_postal_code', '', 1),
(33, 'invoice_company_phonenumber', '', 1),
(34, 'view_invoice_only_logged_in', '0', 1),
(35, 'invoice_number_format', '1', 1),
(36, 'next_invoice_number', '1', 0),
(37, 'active_language', 'spanish', 1),
(38, 'invoice_number_decrement_on_delete', '1', 1),
(39, 'automatically_send_invoice_overdue_reminder_after', '1', 1),
(40, 'automatically_resend_invoice_overdue_reminder_after', '3', 1),
(41, 'expenses_auto_operations_hour', '21', 1),
(42, 'delete_only_on_last_invoice', '1', 1),
(43, 'delete_only_on_last_estimate', '1', 1),
(44, 'create_invoice_from_recurring_only_on_paid_invoices', '0', 1),
(45, 'allow_payment_amount_to_be_modified', '1', 1),
(46, 'rtl_support_client', '0', 1),
(47, 'limit_top_search_bar_results_to', '10', 1),
(48, 'estimate_prefix', 'EST-', 1),
(49, 'next_estimate_number', '1', 0),
(50, 'estimate_number_decrement_on_delete', '1', 1),
(51, 'estimate_number_format', '1', 1),
(52, 'estimate_auto_convert_to_invoice_on_client_accept', '1', 1),
(53, 'exclude_estimate_from_client_area_with_draft_status', '1', 1),
(54, 'rtl_support_admin', '0', 1),
(55, 'last_cron_run', '', 1),
(56, 'show_sale_agent_on_estimates', '1', 1),
(57, 'show_sale_agent_on_invoices', '1', 1),
(58, 'predefined_terms_invoice', '', 1),
(59, 'predefined_terms_estimate', '', 1),
(60, 'default_task_priority', '2', 1),
(61, 'dropbox_app_key', '', 1),
(62, 'show_expense_reminders_on_calendar', '1', 1),
(63, 'only_show_contact_tickets', '1', 1),
(64, 'predefined_clientnote_invoice', '', 1),
(65, 'predefined_clientnote_estimate', '', 1),
(66, 'custom_pdf_logo_image_url', '', 1),
(67, 'favicon', '', 1),
(68, 'invoice_due_after', '30', 1),
(69, 'google_api_key', '', 1),
(70, 'google_calendar_main_calendar', '', 1),
(71, 'default_tax', 'a:0:{}', 1),
(72, 'show_invoices_on_calendar', '1', 1),
(73, 'show_estimates_on_calendar', '1', 1),
(74, 'show_contracts_on_calendar', '1', 1),
(75, 'show_tasks_on_calendar', '1', 1),
(76, 'show_customer_reminders_on_calendar', '1', 1),
(77, 'output_client_pdfs_from_admin_area_in_client_language', '0', 1),
(78, 'show_lead_reminders_on_calendar', '1', 1),
(79, 'send_estimate_expiry_reminder_before', '4', 1),
(80, 'leads_default_source', '', 1),
(81, 'leads_default_status', '', 1),
(82, 'proposal_expiry_reminder_enabled', '1', 1),
(83, 'send_proposal_expiry_reminder_before', '4', 1),
(84, 'default_contact_permissions', 'a:6:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";}', 1),
(85, 'pdf_logo_width', '150', 1),
(86, 'access_tickets_to_none_staff_members', '0', 1),
(87, 'customer_default_country', '', 1),
(88, 'view_estimate_only_logged_in', '0', 1),
(89, 'show_status_on_pdf_ei', '1', 1),
(90, 'email_piping_only_replies', '0', 1),
(91, 'email_piping_only_registered', '0', 1),
(92, 'default_view_calendar', 'dayGridMonth', 1),
(93, 'email_piping_default_priority', '2', 1),
(94, 'total_to_words_lowercase', '0', 1),
(95, 'show_tax_per_item', '1', 1),
(96, 'total_to_words_enabled', '0', 1),
(97, 'receive_notification_on_new_ticket', '1', 0),
(98, 'autoclose_tickets_after', '0', 1),
(99, 'media_max_file_size_upload', '10', 1),
(100, 'client_staff_add_edit_delete_task_comments_first_hour', '0', 1),
(101, 'show_projects_on_calendar', '1', 1),
(102, 'leads_kanban_limit', '50', 1),
(103, 'tasks_reminder_notification_before', '2', 1),
(104, 'pdf_font', 'freesans', 1),
(105, 'pdf_table_heading_color', '#323a45', 1),
(106, 'pdf_table_heading_text_color', '#ffffff', 1),
(107, 'pdf_font_size', '10', 1),
(108, 'default_leads_kanban_sort', 'leadorder', 1),
(109, 'default_leads_kanban_sort_type', 'asc', 1),
(110, 'allowed_files', '.png,.jpg,.pdf,.doc,.docx,.xls,.xlsx,.zip,.rar,.txt', 1),
(111, 'show_all_tasks_for_project_member', '1', 1),
(112, 'email_protocol', 'smtp', 1),
(113, 'calendar_first_day', '0', 1),
(114, 'recaptcha_secret_key', '', 1),
(115, 'show_help_on_setup_menu', '1', 1),
(116, 'show_proposals_on_calendar', '1', 1),
(117, 'smtp_encryption', '', 1),
(118, 'recaptcha_site_key', '', 1),
(119, 'smtp_username', '', 1),
(120, 'auto_stop_tasks_timers_on_new_timer', '1', 1),
(121, 'notification_when_customer_pay_invoice', '1', 1),
(122, 'calendar_invoice_color', '#FF6F00', 1),
(123, 'calendar_estimate_color', '#FF6F00', 1),
(124, 'calendar_proposal_color', '#84c529', 1),
(125, 'new_task_auto_assign_current_member', '1', 1),
(126, 'calendar_reminder_color', '#03A9F4', 1),
(127, 'calendar_contract_color', '#B72974', 1),
(128, 'calendar_project_color', '#B72974', 1),
(129, 'update_info_message', '', 1),
(130, 'show_estimate_reminders_on_calendar', '1', 1),
(131, 'show_invoice_reminders_on_calendar', '1', 1),
(132, 'show_proposal_reminders_on_calendar', '1', 1),
(133, 'proposal_due_after', '7', 1),
(134, 'allow_customer_to_change_ticket_status', '0', 1),
(135, 'lead_lock_after_convert_to_customer', '0', 1),
(136, 'default_proposals_pipeline_sort', 'pipeline_order', 1),
(137, 'default_proposals_pipeline_sort_type', 'asc', 1),
(138, 'default_estimates_pipeline_sort', 'pipeline_order', 1),
(139, 'default_estimates_pipeline_sort_type', 'asc', 1),
(140, 'use_recaptcha_customers_area', '0', 1),
(141, 'remove_decimals_on_zero', '0', 1),
(142, 'remove_tax_name_from_item_table', '0', 1),
(143, 'pdf_format_invoice', 'A4-PORTRAIT', 1),
(144, 'pdf_format_estimate', 'A4-PORTRAIT', 1),
(145, 'pdf_format_proposal', 'A4-PORTRAIT', 1),
(146, 'pdf_format_payment', 'A4-PORTRAIT', 1),
(147, 'pdf_format_contract', 'A4-PORTRAIT', 1),
(148, 'swap_pdf_info', '0', 1),
(149, 'exclude_invoice_from_client_area_with_draft_status', '1', 1),
(150, 'cron_has_run_from_cli', '0', 1),
(151, 'hide_cron_is_required_message', '0', 0),
(152, 'auto_assign_customer_admin_after_lead_convert', '1', 1),
(153, 'show_transactions_on_invoice_pdf', '1', 1),
(154, 'show_pay_link_to_invoice_pdf', '1', 1),
(155, 'tasks_kanban_limit', '50', 1),
(156, 'purchase_key', '', 1),
(157, 'estimates_pipeline_limit', '50', 1),
(158, 'proposals_pipeline_limit', '50', 1),
(159, 'proposal_number_prefix', 'PRO-', 1),
(160, 'number_padding_prefixes', '6', 1),
(161, 'show_page_number_on_pdf', '0', 1),
(162, 'calendar_events_limit', '4', 1),
(163, 'show_setup_menu_item_only_on_hover', '0', 1),
(164, 'company_requires_vat_number_field', '1', 1),
(165, 'company_is_required', '1', 1),
(166, 'allow_contact_to_delete_files', '0', 1),
(167, 'company_vat', '', 1),
(168, 'di', '1684760896', 1),
(169, 'invoice_auto_operations_hour', '21', 1),
(170, 'use_minified_files', '1', 1),
(171, 'only_own_files_contacts', '0', 1),
(172, 'allow_primary_contact_to_view_edit_billing_and_shipping', '0', 1),
(173, 'estimate_due_after', '7', 1),
(174, 'staff_members_open_tickets_to_all_contacts', '1', 1),
(175, 'time_format', '24', 1),
(176, 'delete_activity_log_older_then', '1', 1),
(177, 'disable_language', '0', 1),
(178, 'company_state', '', 1),
(179, 'email_header', '<!doctype html>\r\n                            <html>\r\n                            <head>\r\n                              <meta name=\"viewport\" content=\"width=device-width\" />\r\n                              <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\r\n                              <style>\r\n                                body {\r\n                                 background-color: #f6f6f6;\r\n                                 font-family: sans-serif;\r\n                                 -webkit-font-smoothing: antialiased;\r\n                                 font-size: 14px;\r\n                                 line-height: 1.4;\r\n                                 margin: 0;\r\n                                 padding: 0;\r\n                                 -ms-text-size-adjust: 100%;\r\n                                 -webkit-text-size-adjust: 100%;\r\n                               }\r\n                               table {\r\n                                 border-collapse: separate;\r\n                                 mso-table-lspace: 0pt;\r\n                                 mso-table-rspace: 0pt;\r\n                                 width: 100%;\r\n                               }\r\n                               table td {\r\n                                 font-family: sans-serif;\r\n                                 font-size: 14px;\r\n                                 vertical-align: top;\r\n                               }\r\n                                   /* -------------------------------------\r\n                                     BODY & CONTAINER\r\n                                     ------------------------------------- */\r\n                                     .body {\r\n                                       background-color: #f6f6f6;\r\n                                       width: 100%;\r\n                                     }\r\n                                     /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */\r\n\r\n                                     .container {\r\n                                       display: block;\r\n                                       margin: 0 auto !important;\r\n                                       /* makes it centered */\r\n                                       max-width: 680px;\r\n                                       padding: 10px;\r\n                                       width: 680px;\r\n                                     }\r\n                                     /* This should also be a block element, so that it will fill 100% of the .container */\r\n\r\n                                     .content {\r\n                                       box-sizing: border-box;\r\n                                       display: block;\r\n                                       margin: 0 auto;\r\n                                       max-width: 680px;\r\n                                       padding: 10px;\r\n                                     }\r\n                                   /* -------------------------------------\r\n                                     HEADER, FOOTER, MAIN\r\n                                     ------------------------------------- */\r\n\r\n                                     .main {\r\n                                       background: #fff;\r\n                                       border-radius: 3px;\r\n                                       width: 100%;\r\n                                     }\r\n                                     .wrapper {\r\n                                       box-sizing: border-box;\r\n                                       padding: 20px;\r\n                                     }\r\n                                     .footer {\r\n                                       clear: both;\r\n                                       padding-top: 10px;\r\n                                       text-align: center;\r\n                                       width: 100%;\r\n                                     }\r\n                                     .footer td,\r\n                                     .footer p,\r\n                                     .footer span,\r\n                                     .footer a {\r\n                                       color: #999999;\r\n                                       font-size: 12px;\r\n                                       text-align: center;\r\n                                     }\r\n                                     hr {\r\n                                       border: 0;\r\n                                       border-bottom: 1px solid #f6f6f6;\r\n                                       margin: 20px 0;\r\n                                     }\r\n                                   /* -------------------------------------\r\n                                     RESPONSIVE AND MOBILE FRIENDLY STYLES\r\n                                     ------------------------------------- */\r\n\r\n                                     @media only screen and (max-width: 620px) {\r\n                                       table[class=body] .content {\r\n                                         padding: 0 !important;\r\n                                       }\r\n                                       table[class=body] .container {\r\n                                         padding: 0 !important;\r\n                                         width: 100% !important;\r\n                                       }\r\n                                       table[class=body] .main {\r\n                                         border-left-width: 0 !important;\r\n                                         border-radius: 0 !important;\r\n                                         border-right-width: 0 !important;\r\n                                       }\r\n                                     }\r\n                                   </style>\r\n                                 </head>\r\n                                 <body class=\"\">\r\n                                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"body\">\r\n                                    <tr>\r\n                                     <td>&nbsp;</td>\r\n                                     <td class=\"container\">\r\n                                      <div class=\"content\">\r\n                                        <!-- START CENTERED WHITE CONTAINER -->\r\n                                        <table class=\"main\">\r\n                                          <!-- START MAIN CONTENT AREA -->\r\n                                          <tr>\r\n                                           <td class=\"wrapper\">\r\n                                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                              <tr>\r\n                                               <td>', 1),
(180, 'show_pdf_signature_invoice', '1', 0),
(181, 'show_pdf_signature_estimate', '1', 0),
(182, 'signature_image', '', 0),
(183, 'email_footer', '</td>\r\n                             </tr>\r\n                           </table>\r\n                         </td>\r\n                       </tr>\r\n                       <!-- END MAIN CONTENT AREA -->\r\n                     </table>\r\n                     <!-- START FOOTER -->\r\n                     <div class=\"footer\">\r\n                      <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                        <tr>\r\n                          <td class=\"content-block\">\r\n                            <span>{companyname}</span>\r\n                          </td>\r\n                        </tr>\r\n                      </table>\r\n                    </div>\r\n                    <!-- END FOOTER -->\r\n                    <!-- END CENTERED WHITE CONTAINER -->\r\n                  </div>\r\n                </td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            </body>\r\n            </html>', 1),
(184, 'exclude_proposal_from_client_area_with_draft_status', '1', 1),
(185, 'pusher_app_key', '', 1),
(186, 'pusher_app_secret', '', 1),
(187, 'pusher_app_id', '', 1),
(188, 'pusher_realtime_notifications', '0', 1),
(189, 'pdf_format_statement', 'A4-PORTRAIT', 1),
(190, 'pusher_cluster', '', 1),
(191, 'show_table_export_button', 'to_all', 1),
(192, 'allow_staff_view_proposals_assigned', '1', 1),
(193, 'show_cloudflare_notice', '1', 0),
(194, 'task_modal_class', 'modal-lg', 1),
(195, 'lead_modal_class', 'modal-lg', 1),
(196, 'show_timesheets_overview_all_members_notice_admins', '0', 1),
(197, 'desktop_notifications', '0', 1),
(198, 'hide_notified_reminders_from_calendar', '1', 0),
(199, 'customer_info_format', '{company_name}<br />\r\n{street}<br />\r\n{city} {state}<br />\r\n{country_code} {zip_code}<br />\r\n{vat_number_with_label}', 0),
(200, 'timer_started_change_status_in_progress', '1', 0),
(201, 'default_ticket_reply_status', '3', 1),
(202, 'default_task_status', 'auto', 1),
(203, 'email_queue_skip_with_attachments', '1', 1),
(204, 'email_queue_enabled', '0', 1),
(205, 'last_email_queue_retry', '', 1),
(206, 'auto_dismiss_desktop_notifications_after', '0', 1),
(207, 'proposal_info_format', '{proposal_to}<br />\r\n{address}<br />\r\n{city} {state}<br />\r\n{country_code} {zip_code}<br />\r\n{phone}<br />\r\n{email}', 0),
(208, 'ticket_replies_order', 'asc', 1),
(209, 'new_recurring_invoice_action', 'generate_and_send', 0),
(210, 'bcc_emails', '', 0),
(211, 'email_templates_language_checks', '', 0),
(212, 'proposal_accept_identity_confirmation', '1', 0),
(213, 'estimate_accept_identity_confirmation', '1', 0),
(214, 'new_task_auto_follower_current_member', '0', 1),
(215, 'task_biillable_checked_on_creation', '1', 1),
(216, 'predefined_clientnote_credit_note', '', 1),
(217, 'predefined_terms_credit_note', '', 1),
(218, 'next_credit_note_number', '1', 1),
(219, 'credit_note_prefix', 'CN-', 1),
(220, 'credit_note_number_decrement_on_delete', '1', 1),
(221, 'pdf_format_credit_note', 'A4-PORTRAIT', 1),
(222, 'show_pdf_signature_credit_note', '1', 0),
(223, 'show_credit_note_reminders_on_calendar', '1', 1),
(224, 'show_amount_due_on_invoice', '1', 1),
(225, 'show_total_paid_on_invoice', '1', 1),
(226, 'show_credits_applied_on_invoice', '1', 1),
(227, 'staff_members_create_inline_lead_status', '1', 1),
(228, 'staff_members_create_inline_customer_groups', '1', 1),
(229, 'staff_members_create_inline_ticket_services', '1', 1),
(230, 'staff_members_save_tickets_predefined_replies', '1', 1),
(231, 'staff_members_create_inline_contract_types', '1', 1),
(232, 'staff_members_create_inline_expense_categories', '1', 1),
(233, 'show_project_on_credit_note', '1', 1),
(234, 'proposals_auto_operations_hour', '21', 1),
(235, 'estimates_auto_operations_hour', '21', 1),
(236, 'contracts_auto_operations_hour', '21', 1),
(237, 'credit_note_number_format', '1', 1),
(238, 'allow_non_admin_members_to_import_leads', '0', 1),
(239, 'e_sign_legal_text', 'By clicking on \"Sign\", I consent to be legally bound by this electronic representation of my signature.', 1),
(240, 'show_pdf_signature_contract', '1', 1),
(241, 'view_contract_only_logged_in', '0', 1),
(242, 'show_subscriptions_in_customers_area', '1', 1),
(243, 'calendar_only_assigned_tasks', '0', 1),
(244, 'after_subscription_payment_captured', 'send_invoice_and_receipt', 1),
(245, 'mail_engine', 'phpmailer', 1),
(246, 'gdpr_enable_terms_and_conditions', '0', 1),
(247, 'privacy_policy', '', 1),
(248, 'terms_and_conditions', '', 1),
(249, 'gdpr_enable_terms_and_conditions_lead_form', '0', 1),
(250, 'gdpr_enable_terms_and_conditions_ticket_form', '0', 1),
(251, 'gdpr_contact_enable_right_to_be_forgotten', '0', 1),
(252, 'show_gdpr_in_customers_menu', '1', 1),
(253, 'show_gdpr_link_in_footer', '1', 1),
(254, 'enable_gdpr', '1', 1),
(255, 'gdpr_on_forgotten_remove_invoices_credit_notes', '0', 1),
(256, 'gdpr_on_forgotten_remove_estimates', '0', 1),
(257, 'gdpr_enable_consent_for_contacts', '0', 1),
(258, 'gdpr_consent_public_page_top_block', '', 1),
(259, 'gdpr_page_top_information_block', '', 1),
(260, 'gdpr_enable_lead_public_form', '0', 1),
(261, 'gdpr_show_lead_custom_fields_on_public_form', '0', 1),
(262, 'gdpr_lead_attachments_on_public_form', '0', 1),
(263, 'gdpr_enable_consent_for_leads', '0', 1),
(264, 'gdpr_lead_enable_right_to_be_forgotten', '0', 1),
(265, 'allow_staff_view_invoices_assigned', '1', 1),
(266, 'gdpr_data_portability_leads', '0', 1),
(267, 'gdpr_lead_data_portability_allowed', '', 1),
(268, 'gdpr_contact_data_portability_allowed', '', 1),
(269, 'gdpr_data_portability_contacts', '0', 1),
(270, 'allow_staff_view_estimates_assigned', '1', 1),
(271, 'gdpr_after_lead_converted_delete', '0', 1),
(272, 'gdpr_show_terms_and_conditions_in_footer', '0', 1),
(273, 'save_last_order_for_tables', '0', 1),
(274, 'company_logo_dark', '', 1),
(275, 'customers_register_require_confirmation', '0', 1),
(276, 'allow_non_admin_staff_to_delete_ticket_attachments', '0', 1),
(277, 'receive_notification_on_new_ticket_replies', '1', 0),
(278, 'google_client_id', '', 1),
(279, 'enable_google_picker', '1', 1),
(280, 'show_ticket_reminders_on_calendar', '1', 1),
(281, 'ticket_import_reply_only', '0', 1),
(282, 'visible_customer_profile_tabs', 'all', 0),
(283, 'show_project_on_invoice', '1', 1),
(284, 'show_project_on_estimate', '1', 1),
(285, 'staff_members_create_inline_lead_source', '1', 1),
(286, 'lead_unique_validation', '[\"email\"]', 1),
(287, 'last_upgrade_copy_data', '', 1),
(288, 'custom_js_admin_scripts', '', 1),
(289, 'custom_js_customer_scripts', '0', 1),
(290, 'stripe_webhook_id', '', 1),
(291, 'stripe_webhook_signing_secret', '', 1),
(292, 'stripe_ideal_webhook_id', '', 1),
(293, 'stripe_ideal_webhook_signing_secret', '', 1),
(294, 'show_php_version_notice', '1', 0),
(295, 'recaptcha_ignore_ips', '', 1),
(296, 'show_task_reminders_on_calendar', '1', 1),
(297, 'customer_settings', 'true', 1),
(298, 'tasks_reminder_notification_hour', '21', 1),
(299, 'allow_primary_contact_to_manage_other_contacts', '0', 1),
(300, 'items_table_amounts_exclude_currency_symbol', '1', 1),
(301, 'round_off_task_timer_option', '0', 1),
(302, 'round_off_task_timer_time', '5', 1),
(303, 'bitly_access_token', '', 1),
(304, 'enable_support_menu_badges', '0', 1),
(305, 'attach_invoice_to_payment_receipt_email', '0', 1),
(306, 'invoice_due_notice_before', '2', 1),
(307, 'invoice_due_notice_resend_after', '0', 1),
(308, '_leads_settings', 'true', 1),
(309, 'show_estimate_request_in_customers_area', '0', 1),
(310, 'gdpr_enable_terms_and_conditions_estimate_request_form', '0', 1),
(311, 'upgraded_from_version', '', 0),
(312, 'identification_key', '13481422651684761006646b69ae8f967', 1),
(313, 'automatically_stop_task_timer_after_hours', '8', 1),
(314, 'automatically_assign_ticket_to_first_staff_responding', '0', 1),
(315, 'reminder_for_completed_but_not_billed_tasks', '0', 1),
(316, 'staff_notify_completed_but_not_billed_tasks', '', 1),
(317, 'reminder_for_completed_but_not_billed_tasks_days', '', 1),
(318, 'tasks_reminder_notification_last_notified_day', '', 1),
(319, 'staff_related_ticket_notification_to_assignee_only', '0', 1),
(320, 'show_pdf_signature_proposal', '1', 1),
(321, 'enable_honeypot_spam_validation', '0', 1),
(322, 'sms_clickatell_api_key', '', 1),
(323, 'sms_clickatell_active', '0', 1),
(324, 'sms_clickatell_initialized', '1', 1),
(325, 'sms_msg91_sender_id', '', 1),
(326, 'sms_msg91_api_type', 'api', 1),
(327, 'sms_msg91_auth_key', '', 1),
(328, 'sms_msg91_active', '0', 1),
(329, 'sms_msg91_initialized', '1', 1),
(330, 'sms_twilio_account_sid', '', 1),
(331, 'sms_twilio_auth_token', '', 1),
(332, 'sms_twilio_phone_number', '', 1),
(333, 'sms_twilio_sender_id', '', 1),
(334, 'sms_twilio_active', '0', 1),
(335, 'sms_twilio_initialized', '1', 1),
(336, 'aside_menu_active', '{\"HRM\":{\"id\":\"HRM\",\"icon\":\"\",\"disabled\":\"true\",\"position\":\"5\",\"children\":{\"hrm_dashboard\":{\"disabled\":\"false\",\"id\":\"hrm_dashboard\",\"icon\":\"\",\"position\":\"5\"},\"hrm_staff\":{\"disabled\":\"false\",\"id\":\"hrm_staff\",\"icon\":\"\",\"position\":\"10\"},\"hrm_staff_contract\":{\"disabled\":\"false\",\"id\":\"hrm_staff_contract\",\"icon\":\"\",\"position\":\"15\"},\"hrm_insurrance\":{\"disabled\":\"false\",\"id\":\"hrm_insurrance\",\"icon\":\"\",\"position\":\"20\"},\"hrm_timekeeping\":{\"disabled\":\"false\",\"id\":\"hrm_timekeeping\",\"icon\":\"\",\"position\":\"25\"},\"hrm_payroll\":{\"disabled\":\"false\",\"id\":\"hrm_payroll\",\"icon\":\"\",\"position\":\"30\"},\"hrm_setting\":{\"disabled\":\"false\",\"id\":\"hrm_setting\",\"icon\":\"\",\"position\":\"35\"}}},\"dashboard\":{\"id\":\"dashboard\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"10\"},\"53\":{\"id\":\"53\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"15\",\"children\":{\"anexos-before\":{\"disabled\":\"false\",\"id\":\"anexos-before\",\"icon\":\"\",\"position\":\"5\"},\"anexos-after\":{\"disabled\":\"false\",\"id\":\"anexos-after\",\"icon\":\"\",\"position\":\"10\"},\"publicaciones-marcas\":{\"disabled\":\"false\",\"id\":\"publicaciones-marcas\",\"icon\":\"\",\"position\":\"15\"}}},\"54\":{\"id\":\"54\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"20\",\"children\":{\"patentes-prioridad\":{\"disabled\":\"false\",\"id\":\"patentes-prioridad\",\"icon\":\"\",\"position\":\"5\"}}},\"52\":{\"id\":\"52\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"25\",\"children\":{\"clases\":{\"disabled\":\"false\",\"id\":\"clases\",\"icon\":\"\",\"position\":\"5\"},\"tipos-eventos\":{\"disabled\":\"false\",\"id\":\"tipos-eventos\",\"icon\":\"\",\"position\":\"10\"},\"inventores\":{\"disabled\":\"false\",\"id\":\"inventores\",\"icon\":\"\",\"position\":\"15\"},\"patentes-prioridad\":{\"disabled\":\"false\",\"id\":\"patentes-prioridad\",\"icon\":\"\",\"position\":\"20\"},\"publicaciones\":{\"disabled\":\"false\",\"id\":\"publicaciones\",\"icon\":\"\",\"position\":\"25\"},\"solicitantes\":{\"disabled\":\"false\",\"id\":\"solicitantes\",\"icon\":\"\",\"position\":\"30\"},\"materias\":{\"disabled\":\"false\",\"id\":\"materias\",\"icon\":\"\",\"position\":\"35\"},\"estados\":{\"disabled\":\"false\",\"id\":\"estados\",\"icon\":\"\",\"position\":\"40\"},\"boletines\":{\"disabled\":\"false\",\"id\":\"boletines\",\"icon\":\"\",\"position\":\"45\"},\"tipos-patentes\":{\"disabled\":\"false\",\"id\":\"tipos-patentes\",\"icon\":\"\",\"position\":\"50\"},\"tipos-publicaciones\":{\"disabled\":\"false\",\"id\":\"tipos-publicaciones\",\"icon\":\"\",\"position\":\"55\"}}},\"customers\":{\"id\":\"customers\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"30\"},\"FILE_SHARING\":{\"id\":\"FILE_SHARING\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"35\",\"children\":{\"file_sharing_management\":{\"disabled\":\"false\",\"id\":\"file_sharing_management\",\"icon\":\"\",\"position\":\"5\"},\"file_sharing_sharings\":{\"disabled\":\"false\",\"id\":\"file_sharing_sharings\",\"icon\":\"\",\"position\":\"10\"},\"file_sharing_download_management\":{\"disabled\":\"false\",\"id\":\"file_sharing_download_management\",\"icon\":\"\",\"position\":\"15\"},\"file_sharing_report\":{\"disabled\":\"false\",\"id\":\"file_sharing_report\",\"icon\":\"\",\"position\":\"20\"},\"file_sharing_setting\":{\"disabled\":\"false\",\"id\":\"file_sharing_setting\",\"icon\":\"\",\"position\":\"25\"}}},\"sales\":{\"id\":\"sales\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"40\",\"children\":{\"proposals\":{\"disabled\":\"false\",\"id\":\"proposals\",\"icon\":\"\",\"position\":\"5\"},\"estimates\":{\"disabled\":\"false\",\"id\":\"estimates\",\"icon\":\"\",\"position\":\"10\"},\"invoices\":{\"disabled\":\"false\",\"id\":\"invoices\",\"icon\":\"\",\"position\":\"15\"},\"payments\":{\"disabled\":\"false\",\"id\":\"payments\",\"icon\":\"\",\"position\":\"20\"},\"credit_notes\":{\"disabled\":\"false\",\"id\":\"credit_notes\",\"icon\":\"\",\"position\":\"25\"},\"items\":{\"disabled\":\"false\",\"id\":\"items\",\"icon\":\"\",\"position\":\"30\"}}},\"mindmap_menu\":{\"id\":\"mindmap_menu\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"45\"},\"subscriptions\":{\"id\":\"subscriptions\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"50\"},\"expenses\":{\"id\":\"expenses\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"55\"},\"contracts\":{\"id\":\"contracts\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"60\"},\"projects\":{\"id\":\"projects\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"65\"},\"tasks\":{\"id\":\"tasks\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"70\"},\"support\":{\"id\":\"support\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"75\"},\"leads\":{\"id\":\"leads\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"80\"},\"estimate_request\":{\"id\":\"estimate_request\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"85\"},\"knowledge-base\":{\"id\":\"knowledge-base\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"90\"},\"utilities\":{\"id\":\"utilities\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"95\",\"children\":{\"media\":{\"disabled\":\"false\",\"id\":\"media\",\"icon\":\"\",\"position\":\"5\"},\"bulk-pdf-exporter\":{\"disabled\":\"false\",\"id\":\"bulk-pdf-exporter\",\"icon\":\"\",\"position\":\"10\"},\"csv-export\":{\"disabled\":\"false\",\"id\":\"csv-export\",\"icon\":\"\",\"position\":\"15\"},\"calendar\":{\"disabled\":\"false\",\"id\":\"calendar\",\"icon\":\"\",\"position\":\"20\"},\"announcements\":{\"disabled\":\"false\",\"id\":\"announcements\",\"icon\":\"\",\"position\":\"25\"},\"goals-tracking\":{\"disabled\":\"false\",\"id\":\"goals-tracking\",\"icon\":\"\",\"position\":\"30\"},\"activity-log\":{\"disabled\":\"false\",\"id\":\"activity-log\",\"icon\":\"\",\"position\":\"35\"},\"surveys\":{\"disabled\":\"false\",\"id\":\"surveys\",\"icon\":\"\",\"position\":\"40\"},\"utility_backup\":{\"disabled\":\"false\",\"id\":\"utility_backup\",\"icon\":\"\",\"position\":\"45\"},\"ticket-pipe-log\":{\"disabled\":\"false\",\"id\":\"ticket-pipe-log\",\"icon\":\"\",\"position\":\"50\"}}},\"reports\":{\"id\":\"reports\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"100\",\"children\":{\"sales-reports\":{\"disabled\":\"false\",\"id\":\"sales-reports\",\"icon\":\"\",\"position\":\"5\"},\"expenses-reports\":{\"disabled\":\"false\",\"id\":\"expenses-reports\",\"icon\":\"\",\"position\":\"10\"},\"expenses-vs-income-reports\":{\"disabled\":\"false\",\"id\":\"expenses-vs-income-reports\",\"icon\":\"\",\"position\":\"15\"},\"leads-reports\":{\"disabled\":\"false\",\"id\":\"leads-reports\",\"icon\":\"\",\"position\":\"20\"},\"timesheets-reports\":{\"disabled\":\"false\",\"id\":\"timesheets-reports\",\"icon\":\"\",\"position\":\"25\"},\"knowledge-base-reports\":{\"disabled\":\"false\",\"id\":\"knowledge-base-reports\",\"icon\":\"\",\"position\":\"30\"}}}}', 1),
(337, 'setup_menu_active', '[]', 1),
(338, 'auto_backup_enabled', '0', 1),
(339, 'auto_backup_every', '7', 1),
(340, 'last_auto_backup', '', 1),
(341, 'delete_backups_older_then', '0', 1),
(342, 'auto_backup_hour', '6', 1),
(343, 'survey_send_emails_per_cron_run', '100', 1),
(344, 'last_survey_send_cron', '', 1),
(345, 'theme_style', '[]', 1),
(346, 'theme_style_custom_admin_area', '', 1),
(347, 'theme_style_custom_clients_area', '', 1),
(348, 'theme_style_custom_clients_and_admin_area', '', 1),
(349, 'paymentmethod_authorize_acceptjs_active', '0', 1),
(350, 'paymentmethod_authorize_acceptjs_label', 'Authorize.net Accept.js', 1),
(351, 'paymentmethod_authorize_acceptjs_public_key', '', 0),
(352, 'paymentmethod_authorize_acceptjs_api_login_id', '', 0),
(353, 'paymentmethod_authorize_acceptjs_api_transaction_key', '', 0),
(354, 'paymentmethod_authorize_acceptjs_description_dashboard', 'Payment for Invoice {invoice_number}', 0),
(355, 'paymentmethod_authorize_acceptjs_currencies', 'USD', 0),
(356, 'paymentmethod_authorize_acceptjs_test_mode_enabled', '0', 0),
(357, 'paymentmethod_authorize_acceptjs_default_selected', '1', 1),
(358, 'paymentmethod_authorize_acceptjs_initialized', '1', 1),
(359, 'paymentmethod_instamojo_active', '0', 1),
(360, 'paymentmethod_instamojo_label', 'Instamojo', 1),
(361, 'paymentmethod_instamojo_api_key', '', 0),
(362, 'paymentmethod_instamojo_auth_token', '', 0),
(363, 'paymentmethod_instamojo_description_dashboard', 'Payment for Invoice {invoice_number}', 0),
(364, 'paymentmethod_instamojo_currencies', 'INR', 0),
(365, 'paymentmethod_instamojo_test_mode_enabled', '1', 0),
(366, 'paymentmethod_instamojo_default_selected', '1', 1),
(367, 'paymentmethod_instamojo_initialized', '1', 1),
(368, 'paymentmethod_mollie_active', '0', 1),
(369, 'paymentmethod_mollie_label', 'Mollie', 1),
(370, 'paymentmethod_mollie_api_key', '', 0),
(371, 'paymentmethod_mollie_description_dashboard', 'Payment for Invoice {invoice_number}', 0),
(372, 'paymentmethod_mollie_currencies', 'EUR', 0),
(373, 'paymentmethod_mollie_test_mode_enabled', '1', 0),
(374, 'paymentmethod_mollie_default_selected', '1', 1),
(375, 'paymentmethod_mollie_initialized', '1', 1),
(376, 'paymentmethod_paypal_braintree_active', '0', 1),
(377, 'paymentmethod_paypal_braintree_label', 'Braintree', 1),
(378, 'paymentmethod_paypal_braintree_merchant_id', '', 0),
(379, 'paymentmethod_paypal_braintree_api_public_key', '', 0),
(380, 'paymentmethod_paypal_braintree_api_private_key', '', 0),
(381, 'paymentmethod_paypal_braintree_currencies', 'USD', 0),
(382, 'paymentmethod_paypal_braintree_paypal_enabled', '1', 0),
(383, 'paymentmethod_paypal_braintree_test_mode_enabled', '1', 0),
(384, 'paymentmethod_paypal_braintree_default_selected', '1', 1),
(385, 'paymentmethod_paypal_braintree_initialized', '1', 1),
(386, 'paymentmethod_paypal_checkout_active', '0', 1),
(387, 'paymentmethod_paypal_checkout_label', 'Paypal Smart Checkout', 1),
(388, 'paymentmethod_paypal_checkout_client_id', '', 0),
(389, 'paymentmethod_paypal_checkout_secret', '', 0),
(390, 'paymentmethod_paypal_checkout_payment_description', 'Payment for Invoice {invoice_number}', 0),
(391, 'paymentmethod_paypal_checkout_currencies', 'USD,CAD,EUR', 0),
(392, 'paymentmethod_paypal_checkout_test_mode_enabled', '1', 0),
(393, 'paymentmethod_paypal_checkout_default_selected', '1', 1),
(394, 'paymentmethod_paypal_checkout_initialized', '1', 1),
(395, 'paymentmethod_paypal_active', '0', 1),
(396, 'paymentmethod_paypal_label', 'Paypal', 1),
(397, 'paymentmethod_paypal_username', '', 0),
(398, 'paymentmethod_paypal_password', '', 0),
(399, 'paymentmethod_paypal_signature', '', 0),
(400, 'paymentmethod_paypal_description_dashboard', 'Payment for Invoice {invoice_number}', 0),
(401, 'paymentmethod_paypal_currencies', 'EUR,USD', 0),
(402, 'paymentmethod_paypal_test_mode_enabled', '1', 0),
(403, 'paymentmethod_paypal_default_selected', '1', 1),
(404, 'paymentmethod_paypal_initialized', '1', 1),
(405, 'paymentmethod_payu_money_active', '0', 1),
(406, 'paymentmethod_payu_money_label', 'PayU Money', 1),
(407, 'paymentmethod_payu_money_key', '', 0),
(408, 'paymentmethod_payu_money_salt', '', 0),
(409, 'paymentmethod_payu_money_description_dashboard', 'Payment for Invoice {invoice_number}', 0),
(410, 'paymentmethod_payu_money_currencies', 'INR', 0),
(411, 'paymentmethod_payu_money_test_mode_enabled', '1', 0),
(412, 'paymentmethod_payu_money_default_selected', '1', 1),
(413, 'paymentmethod_payu_money_initialized', '1', 1),
(414, 'paymentmethod_stripe_active', '0', 1),
(415, 'paymentmethod_stripe_label', 'Stripe Checkout', 1),
(416, 'paymentmethod_stripe_api_publishable_key', '', 0),
(417, 'paymentmethod_stripe_api_secret_key', '', 0),
(418, 'paymentmethod_stripe_description_dashboard', 'Payment for Invoice {invoice_number}', 0),
(419, 'paymentmethod_stripe_currencies', 'USD,CAD', 0),
(420, 'paymentmethod_stripe_allow_primary_contact_to_update_credit_card', '1', 0),
(421, 'paymentmethod_stripe_default_selected', '1', 1),
(422, 'paymentmethod_stripe_initialized', '1', 1),
(423, 'paymentmethod_stripe_ideal_active', '0', 1),
(424, 'paymentmethod_stripe_ideal_label', 'Stripe iDEAL', 1),
(425, 'paymentmethod_stripe_ideal_api_secret_key', '', 0),
(426, 'paymentmethod_stripe_ideal_api_publishable_key', '', 0),
(427, 'paymentmethod_stripe_ideal_description_dashboard', 'Payment for Invoice {invoice_number}', 0),
(428, 'paymentmethod_stripe_ideal_statement_descriptor', 'Payment for Invoice {invoice_number}', 0),
(429, 'paymentmethod_stripe_ideal_currencies', 'EUR', 0),
(430, 'paymentmethod_stripe_ideal_default_selected', '1', 1),
(431, 'paymentmethod_stripe_ideal_initialized', '1', 1),
(432, 'paymentmethod_two_checkout_active', '0', 1),
(433, 'paymentmethod_two_checkout_label', '2Checkout', 1),
(434, 'paymentmethod_two_checkout_merchant_code', '', 0),
(435, 'paymentmethod_two_checkout_secret_key', '', 0),
(436, 'paymentmethod_two_checkout_description', 'Payment for Invoice {invoice_number}', 0),
(437, 'paymentmethod_two_checkout_currencies', 'USD, EUR, GBP', 0),
(438, 'paymentmethod_two_checkout_test_mode_enabled', '1', 0),
(439, 'paymentmethod_two_checkout_default_selected', '1', 1),
(440, 'paymentmethod_two_checkout_initialized', '1', 1),
(441, 'staff_members_create_inline_mindmap_group', '1', 1),
(442, 'fs_global_max_size', '2', 1),
(443, 'fs_global_extension', '.jpg,.png,.pdf,.doc,.zip,.rar', 1),
(444, 'fs_global_amount_expiration', '3', 1),
(445, 'fs_global_notification', '1', 1),
(446, 'fs_global_email', '0', 1),
(447, 'fs_client_visible', '0', 1),
(448, 'fs_permisstion_staff_view', '1', 1),
(449, 'fs_permisstion_staff_upload_and_override', '1', 1),
(450, 'fs_permisstion_staff_delete', '1', 1),
(451, 'fs_permisstion_staff_upload', '1', 1),
(452, 'fs_permisstion_staff_download', '1', 1),
(453, 'fs_permisstion_staff_share', '1', 1),
(454, 'fs_permisstion_client_view', '1', 1),
(455, 'fs_permisstion_client_upload_and_override', '1', 1),
(456, 'fs_permisstion_client_delete', '1', 1),
(457, 'fs_permisstion_client_upload', '1', 1),
(458, 'fs_permisstion_client_download', '1', 1),
(459, 'file_sharing_security', '?3HTtb?HgTA@%7zm', 1),
(460, 'fs_the_administrator_of_the_public_folder', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpayment_modes`
--

CREATE TABLE `tblpayment_modes` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `show_on_pdf` int NOT NULL DEFAULT '0',
  `invoices_only` int NOT NULL DEFAULT '0',
  `expenses_only` int NOT NULL DEFAULT '0',
  `selected_by_default` int NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblpayment_modes`
--

INSERT INTO `tblpayment_modes` (`id`, `name`, `description`, `show_on_pdf`, `invoices_only`, `expenses_only`, `selected_by_default`, `active`) VALUES
(1, 'Bank', NULL, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpayroll_table`
--

CREATE TABLE `tblpayroll_table` (
  `id` int UNSIGNED NOT NULL,
  `payroll_month` date NOT NULL,
  `payroll_type` int UNSIGNED DEFAULT NULL,
  `template_data` longtext,
  `status` int UNSIGNED DEFAULT '0' COMMENT '1:đã chốt 0:chưa chốt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpayroll_type`
--

CREATE TABLE `tblpayroll_type` (
  `id` int UNSIGNED NOT NULL,
  `payroll_type_name` varchar(100) NOT NULL,
  `department_id` longtext,
  `role_id` longtext,
  `position_id` longtext,
  `salary_form_id` int UNSIGNED DEFAULT NULL COMMENT '1:Chính 2:Phụ cấp',
  `manager_id` int UNSIGNED DEFAULT NULL,
  `follower_id` int UNSIGNED DEFAULT NULL,
  `template` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpinned_projects`
--

CREATE TABLE `tblpinned_projects` (
  `id` int NOT NULL,
  `project_id` int NOT NULL,
  `staff_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblprojectdiscussioncomments`
--

CREATE TABLE `tblprojectdiscussioncomments` (
  `id` int NOT NULL,
  `discussion_id` int NOT NULL,
  `discussion_type` varchar(10) NOT NULL,
  `parent` int DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `content` text NOT NULL,
  `staff_id` int NOT NULL,
  `contact_id` int DEFAULT '0',
  `fullname` varchar(191) DEFAULT NULL,
  `file_name` varchar(191) DEFAULT NULL,
  `file_mime_type` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblprojectdiscussions`
--

CREATE TABLE `tblprojectdiscussions` (
  `id` int NOT NULL,
  `project_id` int NOT NULL,
  `subject` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `show_to_customer` tinyint(1) NOT NULL DEFAULT '0',
  `datecreated` datetime NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  `staff_id` int NOT NULL DEFAULT '0',
  `contact_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblprojects`
--

CREATE TABLE `tblprojects` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text,
  `status` int NOT NULL DEFAULT '0',
  `clientid` int NOT NULL,
  `billing_type` int NOT NULL,
  `start_date` date NOT NULL,
  `deadline` date DEFAULT NULL,
  `project_created` date NOT NULL,
  `date_finished` datetime DEFAULT NULL,
  `progress` int DEFAULT '0',
  `progress_from_tasks` int NOT NULL DEFAULT '1',
  `project_cost` decimal(15,2) DEFAULT NULL,
  `project_rate_per_hour` decimal(15,2) DEFAULT NULL,
  `estimated_hours` decimal(15,2) DEFAULT NULL,
  `addedfrom` int NOT NULL,
  `contact_notification` int DEFAULT '1',
  `notify_contacts` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproject_activity`
--

CREATE TABLE `tblproject_activity` (
  `id` int NOT NULL,
  `project_id` int NOT NULL,
  `staff_id` int NOT NULL DEFAULT '0',
  `contact_id` int NOT NULL DEFAULT '0',
  `fullname` varchar(100) DEFAULT NULL,
  `visible_to_customer` int NOT NULL DEFAULT '0',
  `description_key` varchar(191) NOT NULL COMMENT 'Language file key',
  `additional_data` text,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproject_files`
--

CREATE TABLE `tblproject_files` (
  `id` int NOT NULL,
  `file_name` varchar(191) NOT NULL,
  `original_file_name` mediumtext,
  `subject` varchar(191) DEFAULT NULL,
  `description` text,
  `filetype` varchar(50) DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  `project_id` int NOT NULL,
  `visible_to_customer` tinyint(1) DEFAULT '0',
  `staffid` int NOT NULL,
  `contact_id` int NOT NULL DEFAULT '0',
  `external` varchar(40) DEFAULT NULL,
  `external_link` text,
  `thumbnail_link` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproject_members`
--

CREATE TABLE `tblproject_members` (
  `id` int NOT NULL,
  `project_id` int NOT NULL,
  `staff_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproject_notes`
--

CREATE TABLE `tblproject_notes` (
  `id` int NOT NULL,
  `project_id` int NOT NULL,
  `content` text NOT NULL,
  `staff_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproject_settings`
--

CREATE TABLE `tblproject_settings` (
  `id` int NOT NULL,
  `project_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproposals`
--

CREATE TABLE `tblproposals` (
  `id` int NOT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `content` longtext,
  `addedfrom` int NOT NULL,
  `datecreated` datetime NOT NULL,
  `total` decimal(15,2) DEFAULT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT '0.00',
  `adjustment` decimal(15,2) DEFAULT NULL,
  `discount_percent` decimal(15,2) NOT NULL,
  `discount_total` decimal(15,2) NOT NULL,
  `discount_type` varchar(30) DEFAULT NULL,
  `show_quantity_as` int NOT NULL DEFAULT '1',
  `currency` int NOT NULL,
  `open_till` date DEFAULT NULL,
  `date` date NOT NULL,
  `rel_id` int DEFAULT NULL,
  `rel_type` varchar(40) DEFAULT NULL,
  `assigned` int DEFAULT NULL,
  `hash` varchar(32) NOT NULL,
  `proposal_to` varchar(191) DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `country` int NOT NULL DEFAULT '0',
  `zip` varchar(50) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `status` int NOT NULL,
  `estimate_id` int DEFAULT NULL,
  `invoice_id` int DEFAULT NULL,
  `date_converted` datetime DEFAULT NULL,
  `pipeline_order` int DEFAULT '1',
  `is_expiry_notified` int NOT NULL DEFAULT '0',
  `acceptance_firstname` varchar(50) DEFAULT NULL,
  `acceptance_lastname` varchar(50) DEFAULT NULL,
  `acceptance_email` varchar(100) DEFAULT NULL,
  `acceptance_date` datetime DEFAULT NULL,
  `acceptance_ip` varchar(40) DEFAULT NULL,
  `signature` varchar(40) DEFAULT NULL,
  `short_link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproposal_comments`
--

CREATE TABLE `tblproposal_comments` (
  `id` int NOT NULL,
  `content` mediumtext,
  `proposalid` int NOT NULL,
  `staffid` int NOT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblprovince_city`
--

CREATE TABLE `tblprovince_city` (
  `id` int NOT NULL,
  `province_code` varchar(45) NOT NULL,
  `province_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrelated_items`
--

CREATE TABLE `tblrelated_items` (
  `id` int NOT NULL,
  `rel_id` int NOT NULL,
  `rel_type` varchar(30) NOT NULL,
  `item_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblreminders`
--

CREATE TABLE `tblreminders` (
  `id` int NOT NULL,
  `description` text,
  `date` datetime NOT NULL,
  `isnotified` int NOT NULL DEFAULT '0',
  `rel_id` int NOT NULL,
  `staff` int NOT NULL,
  `rel_type` varchar(40) NOT NULL,
  `notify_by_email` int NOT NULL DEFAULT '1',
  `creator` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrequest`
--

CREATE TABLE `tblrequest` (
  `id` int NOT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `request_type_id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `date_create` datetime NOT NULL,
  `approval_deadline` datetime DEFAULT NULL,
  `addedfrom` int DEFAULT NULL,
  `status` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT '',
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrequest_approval_details`
--

CREATE TABLE `tblrequest_approval_details` (
  `id` int NOT NULL,
  `request_id` int NOT NULL,
  `staffid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `approve` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `date` datetime DEFAULT NULL,
  `approve_action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `reject_action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `approve_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `reject_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `staff_approve` int DEFAULT '0',
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrequest_files`
--

CREATE TABLE `tblrequest_files` (
  `id` int NOT NULL,
  `request_id` int NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `filetype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrequest_follow`
--

CREATE TABLE `tblrequest_follow` (
  `id` int NOT NULL,
  `request_id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `staffid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrequest_form`
--

CREATE TABLE `tblrequest_form` (
  `id` int NOT NULL,
  `request_id` int NOT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `type` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `slug` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrequest_log`
--

CREATE TABLE `tblrequest_log` (
  `id` int NOT NULL,
  `request_id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `staffid` int NOT NULL,
  `date` datetime DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrequest_related`
--

CREATE TABLE `tblrequest_related` (
  `id` int NOT NULL,
  `request_id` int NOT NULL,
  `rel_type` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `rel_id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrequest_type`
--

CREATE TABLE `tblrequest_type` (
  `id` int NOT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `maximum_number_day` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `data_chart` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `active` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '1',
  `related_to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrequest_type_form`
--

CREATE TABLE `tblrequest_type_form` (
  `id` int NOT NULL,
  `request_type_id` int NOT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `type` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrequest_type_workflow`
--

CREATE TABLE `tblrequest_type_workflow` (
  `id` int NOT NULL,
  `request_type_id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `staffid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `approve_action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `reject_action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `approve_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `reject_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblroles`
--

CREATE TABLE `tblroles` (
  `roleid` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `permissions` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblroles`
--

INSERT INTO `tblroles` (`roleid`, `name`, `permissions`) VALUES
(1, 'Employee', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsalary_form`
--

CREATE TABLE `tblsalary_form` (
  `form_id` int UNSIGNED NOT NULL,
  `form_name` varchar(200) NOT NULL,
  `salary_val` decimal(15,2) NOT NULL,
  `tax` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsales_activity`
--

CREATE TABLE `tblsales_activity` (
  `id` int NOT NULL,
  `rel_type` varchar(20) DEFAULT NULL,
  `rel_id` int NOT NULL,
  `description` text NOT NULL,
  `additional_data` text,
  `staffid` varchar(11) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblscheduled_emails`
--

CREATE TABLE `tblscheduled_emails` (
  `id` int NOT NULL,
  `rel_id` int NOT NULL,
  `rel_type` varchar(15) NOT NULL,
  `scheduled_at` datetime NOT NULL,
  `contacts` varchar(197) NOT NULL,
  `cc` text,
  `attach_pdf` tinyint(1) NOT NULL DEFAULT '1',
  `template` varchar(197) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblservices`
--

CREATE TABLE `tblservices` (
  `serviceid` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsessions`
--

CREATE TABLE `tblsessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblsessions`
--

INSERT INTO `tblsessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('1n2fap277ojkc3r7uvljmqgc8jus3uu6', '127.0.0.1', 1695926478, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353932363437383b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('371daloe1faimufshhflukqqa8op273j', '127.0.0.1', 1695910594, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353931303539343b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('3vlkbv31urci81lgdd67pu7fpp7degpu', '127.0.0.1', 1695933932, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353933333933323b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('81mir8le6d04vnskfs1sq39acajc4eae', '127.0.0.1', 1695933568, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353933333536383b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('8p71kmldouoq0j4cippk02bmmuaisfap', '127.0.0.1', 1695913559, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353931333535393b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('8v0qgvnn5gjeajnhpruu1kg8b9dc7hta', '127.0.0.1', 1695909910, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353930393931303b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('aoitba9j6sradjbb4dt0uho59tbv5ck2', '127.0.0.1', 1695932787, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353933323738373b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('dtcnueu76jend1bh7i5h7k4ff2c68h90', '127.0.0.1', 1695934030, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353933333933323b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('fa926no6d17mnhnage3gqgn7018npoir', '127.0.0.1', 1695906931, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353930363933313b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('g1apf0m5qdm8ib2234fs9du6v9s3ppuq', '127.0.0.1', 1695928782, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353932383738323b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('hmmickabhj4hhbo0fpbbk3cl3h3lc4ek', '127.0.0.1', 1695906626, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353930363632363b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('ij7gc66krdvladt1phh2ue9t1cmdcve7', '127.0.0.1', 1695927442, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353932373434323b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('k0q2rudlh7buj02qmrufdst9b6tabbgr', '127.0.0.1', 1695925848, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353932353834383b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('k68m0ljuvad1iiidfnaoterr5on6vmjr', '127.0.0.1', 1695907460, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353930373436303b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('lha8oq1jgc7s1491db1rd2gi2pao9p2s', '127.0.0.1', 1695929738, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353932393733383b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('lvubdmb5jpg0slpbnmar5djnfoiuuj1k', '127.0.0.1', 1695923219, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353932333231393b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('m3ss2i47llhbisfppqq0rlfouetrkplf', '127.0.0.1', 1695929316, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353932393331363b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('n1cijhtett6u6v5d7nos00jhdr2lraal', '127.0.0.1', 1695928415, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353932383431353b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b),
('vo9gcr4uieh13sl3n1k0tm7ltthloksc', '127.0.0.1', 1695914714, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353931343731343b73746166665f757365725f69647c733a313a2231223b73746166665f6c6f676765645f696e7c623a313b73657475702d6d656e752d6f70656e7c733a303a22223b);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblshared_customer_files`
--

CREATE TABLE `tblshared_customer_files` (
  `file_id` int NOT NULL,
  `contact_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblshared_customer_files`
--

INSERT INTO `tblshared_customer_files` (`file_id`, `contact_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblspam_filters`
--

CREATE TABLE `tblspam_filters` (
  `id` int NOT NULL,
  `type` varchar(40) NOT NULL,
  `rel_type` varchar(10) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblstaff`
--

CREATE TABLE `tblstaff` (
  `staffid` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `facebook` mediumtext,
  `linkedin` mediumtext,
  `phonenumber` varchar(30) DEFAULT NULL,
  `skype` varchar(50) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `datecreated` datetime NOT NULL,
  `profile_image` varchar(191) DEFAULT NULL,
  `last_ip` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `new_pass_key` varchar(32) DEFAULT NULL,
  `new_pass_key_requested` datetime DEFAULT NULL,
  `admin` int NOT NULL DEFAULT '0',
  `role` int DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `default_language` varchar(40) DEFAULT NULL,
  `direction` varchar(3) DEFAULT NULL,
  `media_path_slug` varchar(191) DEFAULT NULL,
  `is_not_staff` int NOT NULL DEFAULT '0',
  `hourly_rate` decimal(15,2) NOT NULL DEFAULT '0.00',
  `two_factor_auth_enabled` tinyint(1) DEFAULT '0',
  `two_factor_auth_code` varchar(100) DEFAULT NULL,
  `two_factor_auth_code_requested` datetime DEFAULT NULL,
  `email_signature` text,
  `birthday` date DEFAULT NULL,
  `birthplace` varchar(200) DEFAULT NULL,
  `sex` varchar(15) DEFAULT NULL,
  `marital_status` varchar(25) DEFAULT NULL,
  `nation` varchar(25) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `identification` varchar(100) DEFAULT NULL,
  `days_for_identity` date DEFAULT NULL,
  `home_town` varchar(200) DEFAULT NULL,
  `resident` varchar(200) DEFAULT NULL,
  `current_address` varchar(200) DEFAULT NULL,
  `literacy` varchar(50) DEFAULT NULL,
  `orther_infor` text,
  `job_position` int DEFAULT NULL,
  `workplace` int DEFAULT NULL,
  `place_of_issue` varchar(50) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `name_account` varchar(50) DEFAULT NULL,
  `issue_bank` varchar(200) DEFAULT NULL,
  `records_received` longtext,
  `Personal_tax_code` varchar(50) DEFAULT NULL,
  `google_auth_secret` text,
  `team_manage` int DEFAULT '0',
  `staff_identifi` varchar(25) DEFAULT NULL,
  `status_work` varchar(100) DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  `saas_tenant_id` varchar(255) NOT NULL DEFAULT 'crm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblstaff`
--

INSERT INTO `tblstaff` (`staffid`, `email`, `firstname`, `lastname`, `facebook`, `linkedin`, `phonenumber`, `skype`, `password`, `datecreated`, `profile_image`, `last_ip`, `last_login`, `last_activity`, `last_password_change`, `new_pass_key`, `new_pass_key_requested`, `admin`, `role`, `active`, `default_language`, `direction`, `media_path_slug`, `is_not_staff`, `hourly_rate`, `two_factor_auth_enabled`, `two_factor_auth_code`, `two_factor_auth_code_requested`, `email_signature`, `birthday`, `birthplace`, `sex`, `marital_status`, `nation`, `religion`, `identification`, `days_for_identity`, `home_town`, `resident`, `current_address`, `literacy`, `orther_infor`, `job_position`, `workplace`, `place_of_issue`, `account_number`, `name_account`, `issue_bank`, `records_received`, `Personal_tax_code`, `google_auth_secret`, `team_manage`, `staff_identifi`, `status_work`, `date_update`, `saas_tenant_id`) VALUES
(1, 'admin@some-domain.net', 'Administrador', 'Local', NULL, NULL, NULL, NULL, '$2a$08$cmZkKiChN.z8bvERJr4BgOOBW3cdO0diYdwFwE8IbZzA/H/vuAsLK', '2023-05-22 13:08:16', NULL, '127.0.0.1', '2023-09-28 08:15:16', '2023-09-28 16:47:10', NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, 'administrador-local', 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'crm'),
(3, 'rvj.ecv@gmail.com', 'Robert Alberto ', 'Vanegas Jiménez', '', '', '+584127275027', '', '$2a$08$wBg07d5b43Jr02Q3hEhIJ..rueDwCfmqcsJAV5uOVX3VwpkyzKBqG', '2022-11-01 12:39:30', 'Robert Vanegas Jiménez.jpg', '190.97.225.122', '2023-07-04 11:25:37', '2023-07-04 11:25:47', '2023-03-17 11:22:45', NULL, NULL, 0, 0, 1, '', '', 'robert-alberto-vanegas-jimenez', 0, 125.00, 0, NULL, NULL, '', '1998-11-03', 'Carcas', 'male', 'single', 'venezolana', 'católica', 'V-29.621.228', '2022-09-19', '', '', '', '', '', 2, 1, 'Caracas', '', '', '', NULL, 'V-29621228-4', NULL, 0, 'ECV-CORP-002', 'working', '2023-03-17', 'corporativo'),
(5, 'iterra@ecv.com.ve', 'Irina ', 'Terra Porley', '', '', '+584122209015', '', '$2a$08$Wg1bbtloLpbIhmMpfW6mAeLrwuYgKWKUMvX5HzXvoOW5aHojyZwZi', '2022-11-01 13:22:48', 'Irina.png', '190.97.225.123', '2023-02-02 11:52:59', '2023-02-02 12:02:09', NULL, NULL, NULL, 0, 0, 1, '', '', 'irina-terra-porley', 0, 175.00, 0, NULL, NULL, '', NULL, 'Caracas', 'female', 'married', 'venezolana', 'católica', 'V-16.813.998', NULL, '', '', '', '', '', 3, 1, '', '', '', '', NULL, '', NULL, 0, 'ECV-CORP-004', 'working', '2022-11-29', 'corporativo'),
(6, 'cfd.ecv@gmail.com', 'Cristina Miranda ', 'Fernández De Sousa', '', '', '+584141988526', '', '$2a$08$X4wi15oYNJEbL/5trjuMW.bDeb1HNdrdqfG2xw4MZoq/5Te1XH5.6', '2022-11-01 13:40:06', 'Cristina Miranda Fernández De Sousa (2).jpg', '216.24.219.138', '2023-06-19 14:39:45', '2023-06-19 17:43:05', '2022-11-24 09:55:30', '27ea470f003be0170db6403d75f8a092', '2022-11-23 13:58:30', 0, 0, 0, '', '', 'cristina-miranda-fernandez-de-sousa', 0, 65.00, 0, NULL, NULL, '', '2000-05-08', 'Caracas', 'female', 'single', 'venezolana', 'católica', '', NULL, '', '', '', '', '', 6, 0, 'Caracas', '', '', '', NULL, '', NULL, 0, 'ECV-CORP-005', 'working', '2023-06-05', 'corporativo'),
(7, 'echeang@ecv.com.ve', 'Enrique José', 'Cheang Vera', '', '', '+584122388862', '', '$2a$08$9SfVJEJMS1g43ME6Zo2lnuvt4Ba1dKrcGSRVA.R2yRFc9vKqM4pj.', '2022-11-04 13:03:47', 'Enrique Cheang Vera (2).jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, '', '', 'enrique-cheang-vera', 0, 250.00, 0, NULL, NULL, '', NULL, '', '', '', '', '', '', NULL, '', '', '', '', '', 0, 0, '', '', '', '', NULL, '', NULL, 0, '', '', '2022-11-29', 'corporativo'),
(8, 'mmontilla@ecv.com.ve', 'Marianella', 'Montilla Ríos', '', '', '+584122388808', '', '$2a$08$ex3BC5tarZ0tGHlo7YqzM.ONp/3SvxP35FsgZUr2vpPC4g.wingLO', '2022-11-04 13:05:51', 'MMR.jpg', '190.97.225.122', '2023-06-20 11:27:39', '2023-06-20 12:56:06', '2023-06-20 11:26:43', NULL, NULL, 1, 0, 1, '', '', 'marianella-montilla-rios', 0, 250.00, 0, NULL, NULL, '', NULL, '', '', '', '', '', '', NULL, '', '', '', '', '', 0, 0, '', '', '', '', NULL, '', NULL, 0, '', '', '2023-06-20', 'corporativo'),
(10, 'corporativo@ecv.com.ve', 'Marisol Ornela', ' Rodríguez', '', '', '+584166121201', '', '$2a$08$MFTSLFZOcCV4N5WQy9XTYeC.9Ts9Tdv3m1.YZYVupjWQYDH5.qsdy', '2023-02-03 11:50:31', 'Marisol Ornella Rodríguez (2).jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, '', '', 'marisol-ornela-rodriguez', 0, 250.00, 0, NULL, NULL, 'Marisol Ornela Rodríguez<br />\r\nBanca y Finanzas', '1973-06-28', 'Caracas', 'female', 'married', 'venezolana', 'católica', '', NULL, '', '', '', '', '', 0, 0, '', '', '', '', NULL, '', NULL, 0, 'ECV-CORP-007', 'working', '2023-07-03', 'corporativo'),
(11, 'marcas@ecv.com.ve', 'ECV', '&', 'MECV', 'MECV', '234234234', 'MCV', '$2a$08$s/DlX6VD54uz3TKrznlsj.TaIhmKPkQYnmHPyGVjfg4VC.Q3ji3We', '2023-02-05 13:34:33', NULL, '190.97.225.122', '2023-06-05 13:24:34', '2023-06-05 13:44:11', '2023-02-17 11:18:12', 'f63baffeff99ea4facf9d876aa1abf68', '2023-02-17 08:52:52', 1, 0, 1, 'spanish', 'ltr', 'ecv', 0, 118.00, 0, NULL, NULL, 'ddawdadaw@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'marcas'),
(15, 'ecv.gaby@gmail.com', 'María Gabriela ', 'Origuen Pimentel', '', '', '+584249035468', '', '$2a$08$hV284bttlkn9vbjiA9xc2uc7VyG6L1ch1SVTOBahMidfaGxH5mHfe', '2023-02-22 16:45:29', '1-DSC_7097.jpg', '190.97.225.122', '2023-06-12 13:17:16', '2023-06-12 13:17:20', NULL, NULL, NULL, 0, 19, 1, '', '', 'maria-gabriela-origuen-pimentel', 0, 0.00, 0, NULL, NULL, 'María Gabriela Origuen Pimentel<br />\r\nParalegal<br />\r\nGerencia de Propiedad Intelectual', '1977-04-10', 'Caracas', 'female', 'married', 'venezolana', 'católica', 'V-12.686.306', NULL, 'Caracas', '', 'Blanquita de Pérez, Vereda 4, casa N° 52, Caraballeda la Guaira', '', '', 24, 2, 'Caracas', '0108-0023-48-0200268607', 'Corriente', 'BBVA Provincial', NULL, '', NULL, 0, 'ECV-PI-011', 'working', '2023-06-13', 'marcas'),
(16, 'patent@ecv.com.ve', 'Nathaly Estefani', 'Prasca', '', '', '+584242950071', '', '$2a$08$L0D0VR5Kt2NWCuXI97wJ7ePNvE30sHxXogFx68HMmc33efbNQLBIO', '2023-02-22 17:59:27', 'ECV_-14.jpg', '190.97.225.122', '2023-06-12 13:13:09', '2023-06-12 13:13:28', NULL, NULL, NULL, 0, 19, 1, '', '', 'nathaly-estefani-prasca', 0, 0.00, 0, NULL, NULL, 'Nathaly Prasca<br />\r\nParalegal<br />\r\nGerencia de Propiedad Intelectual', '1993-03-19', 'Caracas', 'female', 'single', 'venezolana', 'católica', 'V-20.304.805', NULL, 'Caracas', '', 'Palo Verde Guaicoco, Calle la Rubia, Qta San Judas Tadeo', '', '', 24, 2, 'Caracas', '0108-0011-53-60100202230', 'Corriente', 'BBVA Provincial', NULL, 'V-20304805-6', NULL, 0, 'ECV-PI-013', 'working', '2023-06-14', 'marcas'),
(17, 'ecv.osolar@gmail.com', 'Onasis Yaqueline', 'Solar Sánchez', '', '', '+584241224844', '', '$2a$08$wztqkaDdE75YyTPV3a1AJ.ZzKT/IuWNTvRb1oQdB43sBJmZ1SscoO', '2023-02-22 18:03:36', 'Onasis (2).jpg', '190.97.225.122', '2023-06-15 13:37:07', '2023-06-15 13:39:43', NULL, NULL, NULL, 0, 21, 1, '', '', 'onasis-yakeline-solar-sanchez', 0, 0.00, 0, NULL, NULL, 'Onasis Solar<br />\r\nAbogado<br />\r\nGerencia de Propiedad Intelectual', '1998-04-04', 'Caracas', 'female', 'single', 'venezolana', 'católica', 'V-26.022.400', NULL, 'Caracas', '', 'Calle Caracas  con Calle Argentina, Urb. El Calvario, Res. Pilín, Piso 1, Guarenas ', '', '', 17, 2, 'Caracas', '0191-0019-75-1019054359', 'Corriente', 'Banco Nacional de Crédito (BNC)', NULL, 'V-26022400-6', NULL, 0, 'ECV-PI-014', 'working', '2023-06-14', 'marcas'),
(18, 'ecv.barbarag@gmail.com', 'Bárbara Alejandra', 'González Cordero', '', '', '+584242563513', '', '$2a$08$kq1N3rHFY8ktwA6FeiAQ/.5GhLF/W5wgy.rbZ7V.bTYD/hkemYH4y', '2023-02-22 18:08:58', 'ECV_-11.jpg', '190.97.225.122', '2023-06-12 13:16:38', '2023-06-12 13:16:43', NULL, NULL, NULL, 0, 21, 1, '', '', 'barbara-alejandra-gonzalez-cordero', 0, 0.00, 0, NULL, NULL, 'Bárbara A. González Cordero<br />\r\nAbogado<br />\r\nGerencia de Propiedad Intelectual', '1993-10-29', 'Caracas', 'female', 'single', 'venezolana', 'católica', 'V-22.918.537', NULL, 'Caracas', '', 'Urb. La Quebradita I. Bloque 4, Piso 15, Apto 1504', '', '', 17, 2, 'Caracas', '0108-0002-16-0100418895', 'Corriente', 'BBVA Provincial', NULL, 'V-22918537-0', NULL, 0, 'ECV-PI-005', 'working', '2023-03-28', 'marcas'),
(19, 'trademark@ecv.com.ve', 'Amanda Isabel', 'Guerra León', '', '', '+584144740321', '', '$2a$08$9pIBLrvZpnA6.iS0BGMIgOkYOZDWTDjnf2Vl.4IOYPDzyLmqUQ1TG', '2023-02-22 18:15:06', 'ECV_-17.jpg', '190.97.225.122', '2023-06-13 15:40:46', '2023-06-13 15:49:07', '2023-03-28 17:40:11', NULL, NULL, 0, 22, 1, '', '', 'amanda-isabel-guerra-leon', 0, 0.00, 0, NULL, NULL, 'Amanda Guerra León<br />\r\nGerente de Propiedad Intelectual<br />\r\nGerencia de Propiedad Intelectual', '1998-04-23', 'Caracas', 'female', 'single', 'venezolana', 'católica', 'V-25.991.357', NULL, 'Caracas', '', 'Urb. Nueva Casarapa, Sector el Alambique Edif. 6D, Guarenas Edo. Miranda ', '', '', 10, 2, 'Caracas', '0108-0015-35-0100194025', 'Corriente', 'BBVA Provincial', NULL, 'V-25991357-4', NULL, 0, 'ECV-PI-006', 'working', '2023-03-28', 'marcas'),
(20, 'mvalentinaorozco@gmail.com', 'Valentina', 'Orozco Duarte', '', '', '+584242745402', '', '$2a$08$MQtGL63LG1ZIRyZSElIo/uWkOdbCBymCSnScPhxr3/FkCjr3hV2Ea', '2023-02-22 18:18:26', '5-DSC_7261.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0, 19, 1, '', '', 'maria-valentina-orozco-duarte', 0, 0.00, 0, NULL, NULL, 'Valentina Orozco Duarte<br />\r\nAsistente Legal<br />\r\nGerencia de Propiedad Intelectual', '2001-08-11', 'Caracas', 'female', 'single', 'venezolana', 'católica', 'V-27.671.488', NULL, 'Caracas', '', 'Calle 10 de lo Ruices ', '', '', 24, 2, 'Caracas', '001751028577', 'Corriente', 'Mercantil', NULL, '', NULL, 0, 'ECV-PI-012', 'working', '2023-03-28', 'marcas'),
(21, 'mmontilla@ecv.com.ve', 'Marianella ', 'Montilla Ríos', '', '', '+584122388808', '', '$2a$08$M6KXEt1K3nlhp3/APzCmf.boRKMms9CVLn17ZfTLFXFMgZvbDNoJO', '2023-02-22 18:21:04', '2-DSC_6966.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 25, 1, '', '', 'marianella-montilla-rios', 0, 0.00, 0, NULL, NULL, 'Marianella Montilla Ríos<br />\r\nSenior Operating Partner', '1974-01-05', 'Valera, Trujillo', 'female', 'single', 'venezolana', 'católica', 'V-11.307.067', NULL, 'Valera', '', 'CALLE EL ANGEL EDIF CARABALI, TORRE A PISO 01 APT 2 URB LAS ESMERALDAS CARACAS MIRANDA ZONA POSTAL 1080', '', '', 9, 2, 'Trujillo', '0108-0021-81-0100179282', 'Corriente', 'BBVA Provincial', NULL, 'V-11307067-2', NULL, 0, 'ECV-PI-008', 'working', '2023-03-28', 'marcas'),
(22, 'echeang@ecv.com.ve', 'Enrique José', 'Cheang Vera', '', '', '+584122388862', '', '$2a$08$r4wpGv1MWuKhZSDLwy9D6.ZLwDyDXvi0LWrkKmLQ/IIK/moUxVQb2', '2023-02-22 18:23:25', 'ECV_-02.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 24, 1, '', '', 'enrique-jose-cheang-vera', 0, 0.00, 0, NULL, NULL, 'Enrique Cheang Vera<br />\r\nSenior Managing Partner', '1966-02-03', 'Caracas', 'male', 'single', 'venezolana', 'católica', 'V-6.976.602', NULL, 'Caracas', '', 'CALLE 13 CASA QUINTA LENINA URB LA BOYERA CARACAS (EL HATILLO MIRANDA ZONA POSTAL 1083', '', '', 8, 2, 'Caracas', '0108-0021-86-0100150845', 'Corriente', 'BBVA Provincial', NULL, 'V-06976602-8', NULL, 0, 'ECV-PI-002', 'working', '2023-03-28', 'marcas'),
(23, 'ecv.yennytello@gmail.com', 'Yenny Carolina', 'Tello Gamarra', '', '', '+584242238766', '', '$2a$08$aI0RL32J.0mPPxvSjBURm.p85Q3kR9a3lEMQF1brA76tWGs7Rlfvi', '2023-02-24 15:58:11', 'ECV_-09.jpg', '190.97.225.122', '2023-06-13 10:10:57', '2023-06-13 10:17:31', '2023-03-28 18:03:31', NULL, NULL, 0, 29, 1, '', '', 'yeny-carolina-tello-gamarra', 0, 0.00, 0, NULL, NULL, 'Yenny Tello Gamarra<br />\r\nAsistente<br />\r\nGerencia de Administración y Finanzas', '1976-10-09', 'Caracas', 'female', 'single', 'venezolana', 'católica', 'V-13.564.973', NULL, 'Caracas', '', 'Parque Central', '', '', 16, 2, 'Caracas', '0108-0002-19-0100387329', 'Corriente', 'BBVA Provincial', NULL, 'V-13564973-9', NULL, 0, 'ECV-PI-015', 'working', '2023-03-28', 'marcas'),
(24, 'anarocioescalante@gmail.com', 'Ana Rocío', 'Escalante Márquez', '', '', '+584242982111', '', '$2a$08$xer.61S9A5BSD8D3pm8S1uCa0bLz0V8XPfMuu6zhPkcPu0D78uaY.', '2023-02-24 17:39:15', 'ECV_-07.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0, 30, 1, '', '', 'ana-rocio-escalante-marquez', 0, 0.00, 0, NULL, NULL, 'Rocío Escalante Márquez', '1983-10-15', '', 'female', 'single', 'venezolana', 'católica', 'V-15.695.055', NULL, '', '', 'Autopista Caracas la Guaira, Barrio Tcagua Vieja, Casa N° 4-01', '', '', 14, 2, '', '0108-0002-14-0100422043', 'Corriente', 'BBVA Provincial', NULL, 'V-15695055-2', NULL, 0, 'ECV-PI-004', 'working', '2023-03-28', 'marcas'),
(25, 'jvanmarauji7@gmail.com', 'Juan Miguel', 'Araujo Pabón', '', '', '+584241518946', '', '$2a$08$ZhHch2Ppz99YbKYLWs7hluOvcCBJCZezH0gGd3rW8kjLXg.NX3hHW', '2023-02-24 17:46:45', 'Juan.png', NULL, NULL, NULL, NULL, NULL, NULL, 0, 31, 1, '', '', 'juan-miguel-araujo-pabon', 0, 0.00, 0, NULL, NULL, 'Juan Araujo Pabón<br />\r\nMensajería<br />\r\nGerencia de Administración y Finanzas', '1999-07-18', 'Caracas', 'male', 'single', 'venezolana', 'católica', 'V-27.784.527', NULL, 'Caracas', '', 'Calle Negro Primero Casa N°5 Capilla el Carmen, los Rosales ', '', '', 23, 2, 'Caracas', '0108-0015-34-0100193983', 'Corriente', 'BBVA Provincial', NULL, '', NULL, 0, 'ECV-PI-001', 'working', '2023-03-28', 'marcas'),
(26, 'reinaldovl1@gmail.com', 'Reinaldo René', 'Veliz Luna', '', '', '+584242730249', '', '$2a$08$4/Bh2nSimkNtG85r7exWCObfPxTdrkcwfNWfqwHBzNfZZQ1qcBQx2', '2023-02-24 18:05:35', 'ECV_-12.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0, 26, 1, '', '', 'reinaldo-rene-veliz-luna', 0, 0.00, 0, NULL, NULL, 'Reinaldo Veliz Luna<br />\r\nSupervisor de Servicios Generales<br />\r\nGerencia de Administración', '1981-05-05', 'Caracas', 'male', 'single', 'venezolana', 'católica', 'V-15.201.139', NULL, 'Caracas', '', 'Edi. Yocoima, Piso 1 Apto 0104, Cochecito Caracas', '', '', 22, 2, 'Caracas', '0108-0002-19-0100294231', 'Corriente', 'BBVA Provincial', NULL, '', NULL, 0, 'ECV-PI-016', 'working', '2023-03-28', 'marcas'),
(27, 'ecv.rosam@gmail.com', 'Rosa Yamilet', 'Mora López', '', '', '+584242744457', '', '$2a$08$UUjrN0kEWaY1vIOmIG9JYOPycboqQZnrCs48S8yyWAWmzwqfyWSwO', '2023-02-24 18:13:49', 'ECV_-20.jpg', NULL, NULL, NULL, '2023-03-28 18:28:15', NULL, NULL, 0, 27, 1, '', '', 'rosa-yamilet-mora-lopez', 0, 0.00, 0, NULL, NULL, 'Rosa Mora López<br />\r\nAdministradora<br />\r\nGerencia de Administración y Finanzas', '1984-03-26', 'San Cristobal', 'female', 'single', 'venezolana ', 'católica', 'V-17.057.443', NULL, 'San Cristobal', '', '23 de Enero Callejón el Pino Casa N°16 ', '', '', 21, 2, 'San Cristóbal', '0108-0015-39-0100196869', 'Corriente', 'BBVA Provincial', NULL, 'V-17057443-1', NULL, 0, 'ECV-PI-009', 'working', '2023-03-28', 'marcas'),
(28, 'accounting@ecv.com.ve', 'Bárbara Juhany', 'Córdova Moreno', '', '', '+584242744457', '', '$2a$08$gLViELN8H3qej03hksAFFO1FA4dTTaxusKK7jtTFYyCv4chF0nHHm', '2023-02-24 18:26:44', 'ECV_-13.jpg', '190.97.225.122', '2023-06-21 09:18:21', '2023-06-21 09:47:39', '2023-03-28 18:34:55', NULL, NULL, 0, 27, 1, '', '', 'barbara-juhany-cordova-moreno', 0, 0.00, 0, NULL, NULL, 'Bárbara Córdova Moreno<br />\r\nAdministradora<br />\r\nGerencia de Administración y Finanzas', '1998-12-04', 'Caracas', 'female', 'single', 'venezolana', 'católica', 'V-27.235.387', NULL, 'Caracas', '', 'Guarenas, Sector Trapichito.', '', '', 21, 2, 'Caracas', '0108-0001-30-1500028809', 'Corriente', 'BBVA Provincial', NULL, 'V-27235387-1', NULL, 0, 'ECV-PI-003', 'working', '2023-03-28', 'marcas'),
(32, 'ecv.arp@gmail.com', 'Angelina Rodríguez Petrillo', '', '', '', '+584241884414', '', '$2a$08$A2PR1DMUU.OsqfDU1qtNhuTnBRXsMkeWiJkOQS9T3TJANERs8X6/.', '2023-03-14 10:48:52', NULL, '190.97.225.122', '2023-07-04 11:28:07', '2023-07-04 11:28:21', '2023-07-04 11:27:38', NULL, NULL, 0, 4, 1, '', '', 'angelina-rodriguez-petrillo', 0, 65.00, 0, NULL, NULL, 'Angelina Rodríguez Petrillo<br />\r\nAsistente Legal<br />\r\nDerecho Corporativo', '2003-10-15', 'Caracas', 'female', 'single', 'venezolana', 'católica', 'V-30.224.333', NULL, 'Caracas', '', 'Terrazas del Ávila', '', '', 6, 0, 'Caracas', '', '', '', NULL, '', NULL, 0, 'ECV-CORP-006', 'working', '2023-07-04', 'corporativo'),
(33, 'ecv.erikal@gmail.com', 'Erika Maria ', 'Liendo Ramirez ', '', '', '+584242460008', '', '$2a$08$spmEXvOcJpfYGA3j3ly.1um3PA/NyZoJHJdVlBxyaP7KLnxE.IZbW', '2023-03-28 18:43:46', 'ECV_-10.jpg', '190.97.225.122', '2023-06-12 13:16:03', '2023-06-12 13:16:08', NULL, NULL, NULL, 0, 20, 1, '', '', 'erika-maria-liendo-ramirez', 0, 0.00, 0, NULL, NULL, 'Erika Liendo<br />\r\nArchivo<br />\r\nGerencia de Propiedad Intelectual', '1992-09-15', 'Caracas', 'female', 'single', 'venezolana', 'católica', 'V-23.200.534', NULL, 'Caracas', '', 'Petare Calle las Damas Casa N° 40', '', '', 18, 2, 'Caracas', '0108-0002-10-0100418909', 'Corriente', 'BBVA Provincial', NULL, 'V-23200534-0', NULL, 0, 'ECV-PI-007', 'working', '2023-04-12', 'marcas'),
(34, 'ecv.cristobal@gmail.com', 'Cristóbal Alberto Aladejo González', '', '', '', '+58412 048 2685 / 58 414 585 2', '', '$2a$08$EXGfoIOGAJlS0Sqcw/pqV.YWGT6INSDd5LT8wLt5Gvm8PnKRu1Eka', '2023-03-29 12:24:18', 'Cristóbal Aladejo.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, '', '', 'cristobal-alberto-aladejo-gonzalez', 0, 0.00, 0, NULL, NULL, 'Cristóbal Aladejo González<br />\r\nGerente Sucursal Valencia', '1956-05-11', 'Valencia', 'male', 'single', 'venezolana', 'católica', 'V-4.678.204', NULL, 'Valencia', '', ' CALLE CANTAURA, SECTOR LA CANDELARIA, VALENCIA, EDO. CARABOBO', '', '', 13, 3, 'Valencia', '0105-0040-15-40574636', 'Corriente', 'Mercantil', NULL, ' V-04678204-2', NULL, 0, 'ECV-PI-VAL-001', 'working', '2023-04-12', 'marcas'),
(35, 'ecv.lenys@gmail.com', 'Lenys Yolanda ', 'Serrano Iztúriz', '', '', '+58 412 411 5680', '', '$2a$08$KAz3ZgV7HBCjJ/2L5NBvruH2ME0rgxIchmdfHdl60AQg1i.rB2COi', '2023-03-29 12:27:32', 'Lenys Serrano.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, '', '', 'lenys-yolanda-serrano-izturiz', 0, 0.00, 0, NULL, NULL, '', '1976-04-10', 'Valencia', 'female', 'single', 'veenzolana ', 'católica', 'V-12.304.738', NULL, 'Valencia', '', ' San Diego, Los Jarales, Valencia, Edo. Carabobo', '', '', 16, 3, 'Valencia', ' 0108-0015-35-0100193991', 'Corriente', 'BBVA Provincial', NULL, ' V-12304738-5', NULL, 0, 'ECV-PI-VAL-002', 'working', '2023-04-12', 'marcas'),
(36, 'administracion@ecv.com.ve', 'Yoelys Andreina ', 'Morey González', '', '', '+58 414 117 8917', '', '$2a$08$hIMrmnOEzYDkEBKKRW5R4ele5yKyZ8ffODAqHhYfn/vXZfkUPEW9.', '2023-04-12 13:03:25', 'ECV_-22.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0, 28, 1, '', '', 'yoelys-andreina-morey-gonzalez', 0, 0.00, 0, NULL, NULL, 'Andreina Morey<br />\r\nLic. en Administración<br />\r\nAdministración', '1986-09-19', 'Caracas', 'female', 'single', 'venezolana', 'católica', 'V-18.413.634', NULL, 'Caracas', '', 'Carretera Panamericana KM 7, Urbanización Felipe Acosta, Residencia D, piso 1, apto 7A', '', '', 25, 2, 'Caracas', '0108-0134-61-0200183664', 'Corriente', 'BBVA Provincial', NULL, '', NULL, 0, 'ECV-PI-017', 'maternity_leave', NULL, 'marcas'),
(37, 'empresas@ecv.com.ve', 'Miguel Ángel Domínguez Franchi', '', '', '', '+584126063863', '', '$2a$08$hZah7WP582i.Pup3Y3d36e35ampTugaq.sqx9THA8K66IszUUalb.', '2023-04-12 13:19:05', 'ECV_-03.jpg', '190.97.225.122', '2023-07-04 10:45:03', '2023-07-04 10:51:18', NULL, NULL, NULL, 1, 25, 1, '', '', 'miguel-angel-dominguez-franchi', 0, 250.00, 0, NULL, NULL, 'Miguel A. Domínguez Franchi.<br />\r\nDerecho Corporativo.', '1979-03-05', 'Caracas', 'male', 'single', 'venezolana', 'católica', 'V-13.339.139', NULL, 'Caracas', '', 'Avenida Principal del Ávila, Residencias Doravila, apto 42. El Ávila, Alta', '', '', 9, 2, 'Caracas', '0108-0015-33-0100199663', 'Corriente', 'BBVA Provincial', NULL, 'V-13339139-4', NULL, 0, 'ECV-CORP-001', 'working', '2023-04-12', 'marcas'),
(39, 'ecv.anavel@gmail.com', 'Anavel Haideé Suárez Rojas', '', '', '', '+584128228423', '', '$2a$08$Zb4m1I6sngcKUohgZP66QO8HpYLqh02GW.PJJnfL/1q0R5ra6/NJi', '2023-06-21 17:02:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 21, 1, '', '', 'aanavel-haidee-suarez-rojas', 0, 0.00, 0, NULL, NULL, 'Anavel Suárez Rojas<br />\r\nAbogado<br />\r\nGerencia de Propiedad Intelectual', '1981-08-14', 'Caracas', 'female', 'single', 'venezolana', 'católica', 'V-15.504.344', NULL, 'Caracas', '', '', '', '', 17, 2, 'Caracas', '0108-0003-0001-0030-2167', 'Corriente', 'BBV Provincial', NULL, 'V-15504344-6', NULL, 0, 'ECV-PI-0018', 'working', '2023-06-21', 'marcas'),
(40, 'ecv.csa@gmail.com', 'César Guillermo Sánchez Aure', '', '', '', '', '', '$2a$08$w9Hu0.cANJ3HGgDbEzSCEOcSEIfsPhCUd3Vr2Qh26q0IZnbgiXwzm', '2023-07-03 13:12:55', NULL, '190.97.225.122', '2023-07-04 13:27:03', '2023-07-04 13:30:39', '2023-07-04 11:28:39', NULL, NULL, 0, 0, 1, '', '', 'cesar-guillermo-sanchez-aure', 0, 0.00, 0, NULL, NULL, '', '2004-05-21', 'Caracas', 'male', 'single', 'venezolaan', 'Católico', 'V-30.496.708', NULL, 'venezolano', '', 'Avenida Principal Las Esmeraldas, Residencias Cima Esmerald, Municipio Baruta. Caracas', '', '', 6, 0, 'Caracas', '', '', '', NULL, '', NULL, 0, 'ECV-CORP-008', 'working', '2023-07-04', 'corporativo'),
(41, 'ilg.ecv@gmail.com', 'Isabel Cristina Locci Galarza', '', '', '', '', '', '$2a$08$.wm22I43HFGLkUkY.ESome4Sv584iNCPYudBjMB9iVZAg1LO7JL0i', '2023-07-03 13:16:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, '', '', 'isabel-cristina-locci-galarza', 0, 0.00, 0, NULL, NULL, 'Isabel Locci Galarza\r\nAsistente Legal\r\nDerecho Corporativo\r\nE.C.V. & Asociados Abogados\r\n\r\n\r\n', '2002-04-24', 'Caracas', 'female', 'single', 'venezolana', 'católica', 'V-28.327.822', NULL, 'venezolan', '', 'Colinas de Tamanaco', '', '', 6, 0, 'Caracas', '', '', '', NULL, '', NULL, 0, 'ECV-CORP-009', 'working', NULL, 'corporativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblstaff_contract`
--

CREATE TABLE `tblstaff_contract` (
  `id_contract` int UNSIGNED NOT NULL,
  `contract_code` varchar(15) NOT NULL,
  `name_contract` int NOT NULL,
  `staff` int NOT NULL,
  `contract_form` varchar(191) DEFAULT NULL,
  `start_valid` date DEFAULT NULL,
  `end_valid` date DEFAULT NULL,
  `contract_status` varchar(100) DEFAULT NULL,
  `salary_form` int DEFAULT NULL,
  `allowance_type` varchar(11) DEFAULT NULL,
  `sign_day` date DEFAULT NULL,
  `staff_delegate` int DEFAULT NULL,
  `staff_role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblstaff_contracttype`
--

CREATE TABLE `tblstaff_contracttype` (
  `id_contracttype` int UNSIGNED NOT NULL,
  `name_contracttype` varchar(200) NOT NULL,
  `contracttype` varchar(200) NOT NULL,
  `duration` int DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `insurance` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblstaff_contract_detail`
--

CREATE TABLE `tblstaff_contract_detail` (
  `contract_detail_id` int UNSIGNED NOT NULL,
  `staff_contract_id` int UNSIGNED NOT NULL,
  `since_date` date DEFAULT NULL,
  `contract_note` varchar(100) DEFAULT NULL,
  `contract_salary_expense` longtext,
  `contract_allowance_expense` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblstaff_departments`
--

CREATE TABLE `tblstaff_departments` (
  `staffdepartmentid` int NOT NULL,
  `staffid` int NOT NULL,
  `departmentid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblstaff_insurance`
--

CREATE TABLE `tblstaff_insurance` (
  `insurance_id` int UNSIGNED NOT NULL,
  `staff_id` int UNSIGNED NOT NULL,
  `insurance_book_num` varchar(100) DEFAULT NULL,
  `health_insurance_num` varchar(100) DEFAULT NULL,
  `city_code` varchar(100) DEFAULT NULL,
  `registration_medical` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblstaff_insurance_history`
--

CREATE TABLE `tblstaff_insurance_history` (
  `id` int UNSIGNED NOT NULL,
  `insurance_id` int UNSIGNED NOT NULL,
  `staff_id` int UNSIGNED DEFAULT NULL,
  `from_month` date DEFAULT NULL,
  `formality` varchar(50) DEFAULT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `premium_rates` varchar(100) DEFAULT NULL,
  `payment_company` varchar(100) DEFAULT NULL,
  `payment_worker` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblstaff_permissions`
--

CREATE TABLE `tblstaff_permissions` (
  `staff_id` int NOT NULL,
  `feature` varchar(40) NOT NULL,
  `capability` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsubscriptions`
--

CREATE TABLE `tblsubscriptions` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text,
  `description_in_item` tinyint(1) NOT NULL DEFAULT '0',
  `clientid` int NOT NULL,
  `date` date DEFAULT NULL,
  `terms` text,
  `currency` int NOT NULL,
  `tax_id` int NOT NULL DEFAULT '0',
  `stripe_tax_id` varchar(50) DEFAULT NULL,
  `tax_id_2` int NOT NULL DEFAULT '0',
  `stripe_tax_id_2` varchar(50) DEFAULT NULL,
  `stripe_plan_id` text,
  `stripe_subscription_id` text NOT NULL,
  `next_billing_cycle` bigint DEFAULT NULL,
  `ends_at` bigint DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `project_id` int NOT NULL DEFAULT '0',
  `hash` varchar(32) NOT NULL,
  `created` datetime NOT NULL,
  `created_from` int NOT NULL,
  `date_subscribed` datetime DEFAULT NULL,
  `in_test_environment` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsurveyresultsets`
--

CREATE TABLE `tblsurveyresultsets` (
  `resultsetid` int NOT NULL,
  `surveyid` int NOT NULL,
  `ip` varchar(40) NOT NULL,
  `useragent` varchar(150) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsurveys`
--

CREATE TABLE `tblsurveys` (
  `surveyid` int NOT NULL,
  `subject` mediumtext NOT NULL,
  `slug` mediumtext NOT NULL,
  `description` text NOT NULL,
  `viewdescription` text,
  `datecreated` datetime NOT NULL,
  `redirect_url` varchar(100) DEFAULT NULL,
  `send` tinyint(1) NOT NULL DEFAULT '0',
  `onlyforloggedin` int DEFAULT '0',
  `fromname` varchar(100) DEFAULT NULL,
  `iprestrict` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `hash` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsurveysemailsendcron`
--

CREATE TABLE `tblsurveysemailsendcron` (
  `id` int NOT NULL,
  `surveyid` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `emailid` int DEFAULT NULL,
  `listid` varchar(11) DEFAULT NULL,
  `log_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsurveysendlog`
--

CREATE TABLE `tblsurveysendlog` (
  `id` int NOT NULL,
  `surveyid` int NOT NULL,
  `total` int NOT NULL,
  `date` datetime NOT NULL,
  `iscronfinished` int NOT NULL DEFAULT '0',
  `send_to_mail_lists` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltaggables`
--

CREATE TABLE `tbltaggables` (
  `rel_id` int NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `tag_id` int NOT NULL,
  `tag_order` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltags`
--

CREATE TABLE `tbltags` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltasks`
--

CREATE TABLE `tbltasks` (
  `id` int NOT NULL,
  `name` mediumtext,
  `description` text,
  `priority` int DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  `startdate` date NOT NULL,
  `duedate` date DEFAULT NULL,
  `datefinished` datetime DEFAULT NULL,
  `addedfrom` int NOT NULL,
  `is_added_from_contact` tinyint(1) NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `recurring_type` varchar(10) DEFAULT NULL,
  `repeat_every` int DEFAULT NULL,
  `recurring` int NOT NULL DEFAULT '0',
  `is_recurring_from` int DEFAULT NULL,
  `cycles` int NOT NULL DEFAULT '0',
  `total_cycles` int NOT NULL DEFAULT '0',
  `custom_recurring` tinyint(1) NOT NULL DEFAULT '0',
  `last_recurring_date` date DEFAULT NULL,
  `rel_id` int DEFAULT NULL,
  `rel_type` varchar(30) DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `billable` tinyint(1) NOT NULL DEFAULT '0',
  `billed` tinyint(1) NOT NULL DEFAULT '0',
  `invoice_id` int NOT NULL DEFAULT '0',
  `hourly_rate` decimal(15,2) NOT NULL DEFAULT '0.00',
  `milestone` int DEFAULT '0',
  `kanban_order` int DEFAULT '1',
  `milestone_order` int NOT NULL DEFAULT '0',
  `visible_to_client` tinyint(1) NOT NULL DEFAULT '0',
  `deadline_notified` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltaskstimers`
--

CREATE TABLE `tbltaskstimers` (
  `id` int NOT NULL,
  `task_id` int NOT NULL,
  `start_time` varchar(64) NOT NULL,
  `end_time` varchar(64) DEFAULT NULL,
  `staff_id` int NOT NULL,
  `hourly_rate` decimal(15,2) NOT NULL DEFAULT '0.00',
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltasks_checklist_templates`
--

CREATE TABLE `tbltasks_checklist_templates` (
  `id` int NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltask_assigned`
--

CREATE TABLE `tbltask_assigned` (
  `id` int NOT NULL,
  `staffid` int NOT NULL,
  `taskid` int NOT NULL,
  `assigned_from` int NOT NULL DEFAULT '0',
  `is_assigned_from_contact` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltask_checklist_items`
--

CREATE TABLE `tbltask_checklist_items` (
  `id` int NOT NULL,
  `taskid` int NOT NULL,
  `description` text NOT NULL,
  `finished` int NOT NULL DEFAULT '0',
  `dateadded` datetime NOT NULL,
  `addedfrom` int NOT NULL,
  `finished_from` int DEFAULT '0',
  `list_order` int NOT NULL DEFAULT '0',
  `assigned` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltask_comments`
--

CREATE TABLE `tbltask_comments` (
  `id` int NOT NULL,
  `content` text NOT NULL,
  `taskid` int NOT NULL,
  `staffid` int NOT NULL,
  `contact_id` int NOT NULL DEFAULT '0',
  `file_id` int NOT NULL DEFAULT '0',
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltask_followers`
--

CREATE TABLE `tbltask_followers` (
  `id` int NOT NULL,
  `staffid` int NOT NULL,
  `taskid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltaxes`
--

CREATE TABLE `tbltaxes` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `taxrate` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltemplates`
--

CREATE TABLE `tbltemplates` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `addedfrom` int NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltickets`
--

CREATE TABLE `tbltickets` (
  `ticketid` int NOT NULL,
  `adminreplying` int NOT NULL DEFAULT '0',
  `userid` int NOT NULL,
  `contactid` int NOT NULL DEFAULT '0',
  `merged_ticket_id` int DEFAULT NULL,
  `email` text,
  `name` text,
  `department` int NOT NULL,
  `priority` int NOT NULL,
  `status` int NOT NULL,
  `service` int DEFAULT NULL,
  `ticketkey` varchar(32) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `message` text,
  `admin` int DEFAULT NULL,
  `date` datetime NOT NULL,
  `project_id` int NOT NULL DEFAULT '0',
  `lastreply` datetime DEFAULT NULL,
  `clientread` int NOT NULL DEFAULT '0',
  `adminread` int NOT NULL DEFAULT '0',
  `assigned` int NOT NULL DEFAULT '0',
  `staff_id_replying` int DEFAULT NULL,
  `cc` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltickets_pipe_log`
--

CREATE TABLE `tbltickets_pipe_log` (
  `id` int NOT NULL,
  `date` datetime NOT NULL,
  `email_to` varchar(100) NOT NULL,
  `name` varchar(191) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `message` mediumtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltickets_predefined_replies`
--

CREATE TABLE `tbltickets_predefined_replies` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltickets_priorities`
--

CREATE TABLE `tbltickets_priorities` (
  `priorityid` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tbltickets_priorities`
--

INSERT INTO `tbltickets_priorities` (`priorityid`, `name`) VALUES
(1, 'Low'),
(2, 'Medium'),
(3, 'High');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltickets_status`
--

CREATE TABLE `tbltickets_status` (
  `ticketstatusid` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `isdefault` int NOT NULL DEFAULT '0',
  `statuscolor` varchar(7) DEFAULT NULL,
  `statusorder` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tbltickets_status`
--

INSERT INTO `tbltickets_status` (`ticketstatusid`, `name`, `isdefault`, `statuscolor`, `statusorder`) VALUES
(1, 'Open', 1, '#ff2d42', 1),
(2, 'In progress', 1, '#22c55e', 2),
(3, 'Answered', 1, '#2563eb', 3),
(4, 'On Hold', 1, '#64748b', 4),
(5, 'Closed', 1, '#03a9f4', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblticket_attachments`
--

CREATE TABLE `tblticket_attachments` (
  `id` int NOT NULL,
  `ticketid` int NOT NULL,
  `replyid` int DEFAULT NULL,
  `file_name` varchar(191) NOT NULL,
  `filetype` varchar(50) DEFAULT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblticket_replies`
--

CREATE TABLE `tblticket_replies` (
  `id` int NOT NULL,
  `ticketid` int NOT NULL,
  `userid` int DEFAULT NULL,
  `contactid` int NOT NULL DEFAULT '0',
  `name` text,
  `email` text,
  `date` datetime NOT NULL,
  `message` text,
  `attachment` int DEFAULT NULL,
  `admin` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltodos`
--

CREATE TABLE `tbltodos` (
  `todoid` int NOT NULL,
  `description` text NOT NULL,
  `staffid` int NOT NULL,
  `dateadded` datetime NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `datefinished` datetime DEFAULT NULL,
  `item_order` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltracked_mails`
--

CREATE TABLE `tbltracked_mails` (
  `id` int NOT NULL,
  `uid` varchar(32) NOT NULL,
  `rel_id` int NOT NULL,
  `rel_type` varchar(40) NOT NULL,
  `date` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT '0',
  `date_opened` datetime DEFAULT NULL,
  `subject` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltwocheckout_log`
--

CREATE TABLE `tbltwocheckout_log` (
  `id` int UNSIGNED NOT NULL,
  `reference` varchar(64) NOT NULL,
  `invoice_id` int NOT NULL,
  `amount` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbluser_auto_login`
--

CREATE TABLE `tbluser_auto_login` (
  `key_id` char(32) NOT NULL,
  `user_id` int NOT NULL,
  `user_agent` varchar(150) NOT NULL,
  `last_ip` varchar(40) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `staff` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tbluser_auto_login`
--

INSERT INTO `tbluser_auto_login` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `staff`) VALUES
('01c4bf456b840319a314526968e0f812', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/113.0', '127.0.0.1', '2023-05-22 13:10:06', 1),
('67835383927b481adea77bbb441dbbb8', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '127.0.0.1', '2023-06-12 20:20:53', 1),
('97e73c9a2d3ff43f446b6ce10ab51d8c', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', '127.0.0.1', '2023-06-14 13:41:54', 1),
('f3809edf569cdb8960d4ba906a72f3e4', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.67', '::1', '2023-07-05 12:36:58', 0),
('2ffc0ead92f252f21c72d8810950fc20', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/116.0', '127.0.0.1', '2023-07-06 12:15:12', 1),
('d4eef9dc27bdcbc44df9ca7eacd76589', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', '127.0.0.1', '2023-07-17 13:10:46', 1),
('c9b954a4e0ee5ce70675a8bd3dfd635c', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', '127.0.0.1', '2023-08-17 12:45:54', 1),
('48458475af1b2b8ebe0bb17045988114', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', '127.0.0.1', '2023-08-21 12:25:35', 1),
('6555a775d8c2be74afa9c71f29187333', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 Edg/116.0.1938.62', '::1', '2023-08-29 15:35:07', 1),
('893b2fad93f0d9187191a3aa287945f3', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0', '127.0.0.1', '2023-09-18 14:54:38', 1),
('b5a8e05f56b3dce99d337a9373f09b7f', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', '127.0.0.1', '2023-09-27 20:11:21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbluser_meta`
--

CREATE TABLE `tbluser_meta` (
  `umeta_id` bigint UNSIGNED NOT NULL,
  `staff_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `client_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `contact_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(191) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tbluser_meta`
--

INSERT INTO `tbluser_meta` (`umeta_id`, `staff_id`, `client_id`, `contact_id`, `meta_key`, `meta_value`) VALUES
(1, 0, 0, 1, 'consent_key', '8b7fd75522a8c4007b6453e3af3866f6-98cde13bd9050208125c3882b7a0e3b9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblvault`
--

CREATE TABLE `tblvault` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `server_address` varchar(191) NOT NULL,
  `port` int DEFAULT NULL,
  `username` varchar(191) NOT NULL,
  `password` text NOT NULL,
  `description` text,
  `creator` int NOT NULL,
  `creator_name` varchar(100) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `share_in_projects` tinyint(1) NOT NULL DEFAULT '0',
  `last_updated` datetime DEFAULT NULL,
  `last_updated_from` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblviews_tracking`
--

CREATE TABLE `tblviews_tracking` (
  `id` int NOT NULL,
  `rel_id` int NOT NULL,
  `rel_type` varchar(40) NOT NULL,
  `date` datetime NOT NULL,
  `view_ip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblweb_to_lead`
--

CREATE TABLE `tblweb_to_lead` (
  `id` int NOT NULL,
  `form_key` varchar(32) NOT NULL,
  `lead_source` int NOT NULL,
  `lead_status` int NOT NULL,
  `notify_lead_imported` int NOT NULL DEFAULT '1',
  `notify_type` varchar(20) DEFAULT NULL,
  `notify_ids` mediumtext,
  `responsible` int NOT NULL DEFAULT '0',
  `name` varchar(191) NOT NULL,
  `form_data` mediumtext,
  `recaptcha` int NOT NULL DEFAULT '0',
  `submit_btn_name` varchar(40) DEFAULT NULL,
  `submit_btn_text_color` varchar(10) DEFAULT '#ffffff',
  `submit_btn_bg_color` varchar(10) DEFAULT '#84c529',
  `success_submit_msg` text,
  `submit_action` int DEFAULT '0',
  `lead_name_prefix` varchar(255) DEFAULT NULL,
  `submit_redirect_url` mediumtext,
  `language` varchar(40) DEFAULT NULL,
  `allow_duplicate` int NOT NULL DEFAULT '1',
  `mark_public` int NOT NULL DEFAULT '0',
  `track_duplicate_field` varchar(20) DEFAULT NULL,
  `track_duplicate_field_and` varchar(20) DEFAULT NULL,
  `create_task_on_duplicate` int NOT NULL DEFAULT '0',
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblworkplace`
--

CREATE TABLE `tblworkplace` (
  `workplace_id` int UNSIGNED NOT NULL,
  `workplace_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblwork_shift`
--

CREATE TABLE `tblwork_shift` (
  `id` int NOT NULL,
  `shift_code` varchar(45) NOT NULL,
  `shift_name` varchar(200) NOT NULL,
  `shift_type` varchar(200) NOT NULL,
  `department` int DEFAULT '0',
  `position` int DEFAULT '0',
  `add_from` int NOT NULL,
  `date_create` date DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `shifts_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_apoderados`
--

CREATE TABLE `tbl_apoderados` (
  `id` int NOT NULL,
  `poder_id` int NOT NULL,
  `staff_id` int DEFAULT NULL COMMENT 'FK con la tabla staff_id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de apoderados';

--
-- Volcado de datos para la tabla `tbl_apoderados`
--

INSERT INTO `tbl_apoderados` (`id`, `poder_id`, `staff_id`) VALUES
(5, 1, 3),
(6, 1, 6),
(7, 1, 3),
(8, 1, 6),
(9, 1, 3),
(10, 1, 6),
(11, 1, 10),
(12, 1, 11),
(13, 1, 8),
(14, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_boletines`
--

CREATE TABLE `tbl_boletines` (
  `id` int NOT NULL,
  `pais_id` int NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de boletines de PI';

--
-- Volcado de datos para la tabla `tbl_boletines`
--

INSERT INTO `tbl_boletines` (`id`, `pais_id`, `fecha_publicacion`, `descripcion`) VALUES
(630, 226, '2023-08-15', 'Boletin 630');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_correspondecia_usuario`
--

CREATE TABLE `tbl_correspondecia_usuario` (
  `id` int NOT NULL,
  `cliente` int NOT NULL,
  `expediente` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `staff_id` int NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `plantilla_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_correspondencia_plantilla`
--

CREATE TABLE `tbl_correspondencia_plantilla` (
  `id` int NOT NULL,
  `descripcion` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `staff_id` int NOT NULL,
  `content` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `materia_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_expediente`
--

CREATE TABLE `tbl_estado_expediente` (
  `id` int NOT NULL,
  `codigo` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla principal de los estados de expediente';

--
-- Volcado de datos para la tabla `tbl_estado_expediente`
--

INSERT INTO `tbl_estado_expediente` (`id`, `codigo`, `nombre`) VALUES
(1, '1', 'AMPLIACIÓN DE SOLICITUD DE CORRECCIÓN DE ERROR EN PUBLICACIÓN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_busquedas`
--

CREATE TABLE `tbl_marcas_busquedas` (
  `id` int NOT NULL,
  `comentarios` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `staff_id` int DEFAULT NULL COMMENT 'FK con la tabla staff',
  `marca` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `fecha_respuesta` date NOT NULL,
  `ref_cliente` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `busqueda_interna_id` int DEFAULT NULL,
  `busqueda_externa_id` int DEFAULT NULL,
  `clase_niza_id` int NOT NULL,
  `pais_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `client_id` int DEFAULT NULL COMMENT 'FK con la tabla clientes',
  `oficina_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de las busquedas';

--
-- Volcado de datos para la tabla `tbl_marcas_busquedas`
--

INSERT INTO `tbl_marcas_busquedas` (`id`, `comentarios`, `staff_id`, `marca`, `fecha_solicitud`, `fecha_respuesta`, `ref_cliente`, `busqueda_interna_id`, `busqueda_externa_id`, `clase_niza_id`, `pais_id`, `created_at`, `is_deleted`, `client_id`, `oficina_id`) VALUES
(1, 'asddasfdsgdfgdg', 8, 'Bucketdata', '2023-08-20', '2023-08-22', '2023-00230', 1, NULL, 1, 226, '2023-08-22 10:20:32', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_busquedas_documentos`
--

CREATE TABLE `tbl_marcas_busquedas_documentos` (
  `id` int NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `comentarios` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `busquedas_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de registro de documentos de busquedas de marca';

--
-- Volcado de datos para la tabla `tbl_marcas_busquedas_documentos`
--

INSERT INTO `tbl_marcas_busquedas_documentos` (`id`, `descripcion`, `comentarios`, `archivo`, `busquedas_id`) VALUES
(0, 'signo', 'asddasfdsgdfgdg', 'http://crm.localhost/uploads/busquedas/1-proyecto CRM PI.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_cambio_domicilio`
--

CREATE TABLE `tbl_marcas_cambio_domicilio` (
  `id` int NOT NULL,
  `marcas_id` int NOT NULL,
  `oficina_id` int NOT NULL,
  `staff_id` int DEFAULT NULL COMMENT 'FK con la tabla staff',
  `estado_id` int NOT NULL,
  `num_solicitud` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `num_resolucion` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_resolucion` date NOT NULL,
  `referencia_cliente` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `comentarios` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de cambio de domicilio de marcas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_cambio_nombre`
--

CREATE TABLE `tbl_marcas_cambio_nombre` (
  `id` int NOT NULL,
  `marcas_id` int NOT NULL,
  `oficina_id` int NOT NULL,
  `estado_id` int NOT NULL,
  `num_solicitud` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `num_resolucion` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_resolucion` date NOT NULL,
  `referencia_cliente` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `comentarios` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de cambio de nombre';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_cambio_nombre_participantes`
--

CREATE TABLE `tbl_marcas_cambio_nombre_participantes` (
  `id` int NOT NULL,
  `cambio_nombre_id` int NOT NULL,
  `tipo_nombre` int DEFAULT NULL COMMENT '1 = Nombre Anterior\r\n2 = Nombre Actual',
  `propietario_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de los participante de cambios de nombre';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_cedentes_cesionarios`
--

CREATE TABLE `tbl_marcas_cedentes_cesionarios` (
  `id` int NOT NULL,
  `cedente_id` int DEFAULT NULL COMMENT 'FK con la tabla propietarios',
  `cesion_id` int NOT NULL,
  `tipo_cedente` int DEFAULT NULL COMMENT '1 = cedente\r\n2 = cesionario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de recepcion de los cedentes y cesionarios';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_cesiones`
--

CREATE TABLE `tbl_marcas_cesiones` (
  `id` int NOT NULL,
  `client_id` int DEFAULT NULL COMMENT 'FK con la tabla clientes',
  `oficina_id` int NOT NULL,
  `marcas_id` int NOT NULL,
  `staff_id` int DEFAULT NULL COMMENT 'FK con la tabla staff',
  `estado_id` int NOT NULL,
  `solicitud_num` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `resolucion_num` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_resolucion` date NOT NULL,
  `referencia_cliente` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `comentarios` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de las cesiones de marcas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_clases`
--

CREATE TABLE `tbl_marcas_clases` (
  `id` int NOT NULL,
  `marcas_id` int NOT NULL,
  `clase_id` int NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de clases';

--
-- Volcado de datos para la tabla `tbl_marcas_clases`
--

INSERT INTO `tbl_marcas_clases` (`id`, `marcas_id`, `clase_id`, `descripcion`) VALUES
(31, 3, 1, ''),
(35, 5, 1, ''),
(57, 1, 1, ''),
(66, 2, 1, ''),
(80, 7, 2, 'Pinturas'),
(81, 7, 4, 'Aceites'),
(82, 8, 3, 'Productos cosméticos'),
(83, 8, 5, 'Productos farmacéuticos'),
(84, 9, 4, 'Aceites'),
(85, 10, 2, 'Pinturas'),
(86, 10, 4, 'Aceites'),
(87, 10, 2, 'Pinturas'),
(88, 11, 2, 'Pinturas'),
(89, 12, 3, 'Cosmeticos'),
(90, 13, 2, 'Pinturas'),
(91, 13, 1, 'lacas'),
(92, 13, 3, 'cosmeticos'),
(93, 14, 1, 'Fertilizantes'),
(94, 14, 2, 'Pinturas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_clase_niza`
--

CREATE TABLE `tbl_marcas_clase_niza` (
  `clase_niza_id` int NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla de clases de niza';

--
-- Volcado de datos para la tabla `tbl_marcas_clase_niza`
--

INSERT INTO `tbl_marcas_clase_niza` (`clase_niza_id`, `nombre`, `descripcion`) VALUES
(1, 'Clase 1', 'Productos químicos para la industria, la ciencia y la fotografía, así como para la agricultura, la horticultura y la silvicultura; resinas artificiales en bruto, materias plásticas en bruto; composicionescompuestos para la extinción de incendios y la prevención de incendios; preparaciones para templar y soldar metales; sustancias para curtir cueros y pieles de animales; adhesivos (pegamentos) para la industria; masillas y otras materias de relleno en pasta; compost, abonos, fertilizantes; preparaciones biológicas para la industria y la ciencia.'),
(2, 'CLASE 2', 'Pinturas, barnices, lacas; productos contra la herrumbre y el deterioro de la madera; colorantes, tintes; tintas de imprenta, tintas de marcado y tintas de grabado; resinas naturales en bruto; metales en hojas y en polvo para la pintura, la decoración, la imprenta y trabajos artísticos.'),
(3, 'CLASE 3', 'Productos cosméticos y preparaciones de tocador no medicinales; dentífricos no medicinales; productos de perfumería, aceites esenciales; preparaciones para blanquear y otras sustancias para lavar la ropa; preparaciones para limpiar, pulir, desengrasar y raspar.'),
(4, 'CLASE 4', 'Aceites y grasas para uso industrial, ceras; lubricantes; compuestos para absorber, rociar y asentar el polvo; combustibles y materiales de alumbrado; velas y mechas de iluminación.'),
(5, 'CLASE 5', 'Productos farmacéuticos, preparaciones para uso médico y veterinario; productos higiénicos y sanitarios para uso médico; alimentos y sustancias dietéticas para uso médico o veterinario, alimentos para bebés; suplementos alimenticios para personas o animales; emplastos, material para apósitos; material para empastes e impresiones dentales; desinfectantes; productos para eliminar animales dañinos; fungicidas, herbicidas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_domicilios`
--

CREATE TABLE `tbl_marcas_domicilios` (
  `domicilio_id` int NOT NULL,
  `cambio_domicilio_id` int NOT NULL,
  `tipo_domicilio` int DEFAULT NULL COMMENT '1 = Domicilio Anterior\r\n2 = Domicilio Actual',
  `propietario_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de cambio de domicilio';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_eventos`
--

CREATE TABLE `tbl_marcas_eventos` (
  `id` int NOT NULL,
  `tipo_evento_id` int NOT NULL,
  `marcas_id` int NOT NULL,
  `comentarios` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='tabla maestra de eventos de marcas';

--
-- Volcado de datos para la tabla `tbl_marcas_eventos`
--

INSERT INTO `tbl_marcas_eventos` (`id`, `tipo_evento_id`, `marcas_id`, `comentarios`, `fecha`) VALUES
(1, 1, 1, 'vgfghghnhgk', '2023-08-25'),
(2, 2, 1, 'saddsgdfhdg', '2023-08-28'),
(4, 1, 1, 'SFDGHNFGHNFGHFGJH', '2023-08-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_fusion`
--

CREATE TABLE `tbl_marcas_fusion` (
  `id` int NOT NULL,
  `marcas_id` int NOT NULL,
  `oficina_id` int NOT NULL,
  `num_solicitud` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `estado_id` int NOT NULL,
  `num_resolucion` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_resolucion` date NOT NULL,
  `referencia_cliente` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `comentarios` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de las fusiones de marcas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_fusion_participantes`
--

CREATE TABLE `tbl_marcas_fusion_participantes` (
  `id` int NOT NULL,
  `fusion_id` int NOT NULL,
  `tipo_participante` int DEFAULT NULL COMMENT '1 = Participante\r\n2 = Sobreviviente',
  `propietario_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de fusion de participantes y sobrevivientes';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_licencia`
--

CREATE TABLE `tbl_marcas_licencia` (
  `id` int NOT NULL,
  `marcas_id` int NOT NULL,
  `client_id` int DEFAULT NULL COMMENT 'FK con la tabla client',
  `oficina_id` int NOT NULL,
  `staff_id` int DEFAULT NULL COMMENT 'FK con la tabla staff',
  `estado_id` int NOT NULL,
  `num_solicitud` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `num_resolucion` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_resolucion` date NOT NULL,
  `referencia_cliente` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `comentarios` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de licencias de marcas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_licenciantes`
--

CREATE TABLE `tbl_marcas_licenciantes` (
  `id` int NOT NULL,
  `licencia_id` int NOT NULL,
  `tipo_licenciante` int DEFAULT NULL COMMENT '1 = Licenciante\r\n2 = Licenciatario',
  `propietario_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla de almacenamiento de los licenciantes';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_prioridades`
--

CREATE TABLE `tbl_marcas_prioridades` (
  `id` int NOT NULL,
  `marcas_id` int NOT NULL,
  `pais_id` int NOT NULL,
  `fecha_prioridad` date NOT NULL,
  `numero_prioridad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de prioridades de marcas';

--
-- Volcado de datos para la tabla `tbl_marcas_prioridades`
--

INSERT INTO `tbl_marcas_prioridades` (`id`, `marcas_id`, `pais_id`, `fecha_prioridad`, `numero_prioridad`) VALUES
(3, 1, 43, '2023-08-01', 3),
(5, 1, 2, '2023-08-06', 3),
(6, 1, 3, '2023-08-14', 15),
(7, 1, 3, '2023-08-14', 15),
(8, 1, 3, '2023-08-01', 3),
(9, 1, 3, '2023-08-01', 3),
(10, 1, 3, '2023-08-01', 6),
(11, 2, 38, '2023-08-29', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_publicaciones`
--

CREATE TABLE `tbl_marcas_publicaciones` (
  `id` int NOT NULL,
  `tipo_pub_id` int NOT NULL,
  `marcas_id` int NOT NULL,
  `boletin_id` int NOT NULL,
  `tomo` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `pagina` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de las marcas de publicaciones';

--
-- Volcado de datos para la tabla `tbl_marcas_publicaciones`
--

INSERT INTO `tbl_marcas_publicaciones` (`id`, `tipo_pub_id`, `marcas_id`, `boletin_id`, `tomo`, `pagina`, `fecha`) VALUES
(6, 1, 1, 630, '6', '34', '2023-08-28'),
(8, 1, 2, 630, '6', '3', '2023-08-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_solicitantes`
--

CREATE TABLE `tbl_marcas_solicitantes` (
  `mar_sol_id` int NOT NULL,
  `marcas_id` int NOT NULL,
  `propietario_id` int DEFAULT NULL COMMENT 'FK con la tabla propietarios'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de solicitantes de marcas';

--
-- Volcado de datos para la tabla `tbl_marcas_solicitantes`
--

INSERT INTO `tbl_marcas_solicitantes` (`mar_sol_id`, `marcas_id`, `propietario_id`) VALUES
(31, 3, 1),
(35, 5, 1),
(57, 1, 1),
(66, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_solicitudes`
--

CREATE TABLE `tbl_marcas_solicitudes` (
  `id` int NOT NULL,
  `tipo_registro_id` int NOT NULL,
  `client_id` int DEFAULT NULL COMMENT 'FK con la tabla tblclients',
  `oficina_id` int NOT NULL,
  `staff_id` int DEFAULT NULL COMMENT 'FK con la tabla staff',
  `signo_archivo` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `signonom` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `tipo_signo_id` int DEFAULT NULL,
  `tipo_solicitud_id` int DEFAULT NULL,
  `ref_interna` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `primer_uso` date DEFAULT NULL,
  `ref_cliente` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `prueba_uso` date DEFAULT NULL,
  `carpeta` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `libro` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `folio` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `tomo` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `comentarios` text COLLATE utf8mb4_spanish_ci,
  `estado_id` int DEFAULT NULL,
  `solicitud` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `registro` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `certificado` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_certificado` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra donde estan las solicitudes de marcas';

--
-- Volcado de datos para la tabla `tbl_marcas_solicitudes`
--

INSERT INTO `tbl_marcas_solicitudes` (`id`, `tipo_registro_id`, `client_id`, `oficina_id`, `staff_id`, `signo_archivo`, `signonom`, `tipo_signo_id`, `tipo_solicitud_id`, `ref_interna`, `primer_uso`, `ref_cliente`, `prueba_uso`, `carpeta`, `libro`, `folio`, `tomo`, `comentarios`, `estado_id`, `solicitud`, `fecha_solicitud`, `registro`, `fecha_registro`, `certificado`, `fecha_certificado`, `fecha_vencimiento`) VALUES
(1, 1, 7, 1, 7, 'http://crm.localhost/uploads/marcas/signos/1-VirtualBox_kali_16_06_2023_11_04_45.png', 'CP COWPLANDT', 1, 1, '', '2023-08-14', '', '2023-08-21', '', '1', '1', '1', '', 1, '2022-0603', '2023-08-21', '', '2023-08-21', '', NULL, '2024-01-28'),
(2, 1, 9, 1, 8, 'http://crm.localhost/uploads/marcas/signos/2-VirtualBox_kali_16_06_2023_11_04_45.png', 'CP COWPLANDT', 1, 1, '', '2023-08-22', '', NULL, '', '', '', '', '', 1, '2022-0603', '2023-08-01', '', NULL, '', NULL, NULL),
(3, 1, 9, 1, 7, 'http://crm.localhost/uploads/marcas/signos/3-VirtualBox_kali_16_06_2023_11_04_45.png', 'CP COWPLANDT', 2, 1, '', NULL, '', NULL, '', '', '', '', '', 1, '2023-00230', '2023-08-24', '', NULL, '', NULL, NULL),
(4, 1, 1, 1, 1, NULL, '', 1, 1, '', NULL, '', NULL, '', '', '', '', '', 1, '', NULL, '', NULL, '', NULL, NULL),
(5, 1, 1, 1, 1, 'http://crm.localhost/uploads/marcas/signos/5-VirtualBox_kali_16_06_2023_11_04_45.png', 'CP COWPLANDT', 1, 1, '', NULL, '', NULL, '', '', '', '', '', 1, '2022-0603', '2023-08-02', '', NULL, '', NULL, '2023-11-24'),
(6, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 1, 1, 1, NULL, '', 1, 1, '', NULL, '', NULL, '', '', '', '', '', 1, '', NULL, '', NULL, '', NULL, NULL),
(11, 1, 1, 1, 1, NULL, '', 1, 1, '', NULL, '', NULL, '', '', '', '', '', 1, '', NULL, '', NULL, '', NULL, NULL),
(12, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, 1, 1, 1, NULL, '', 1, 1, '', NULL, '', NULL, '', '', '', '', '', 1, '', NULL, '', NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_solicitudes_documentos`
--

CREATE TABLE `tbl_marcas_solicitudes_documentos` (
  `id` int NOT NULL,
  `marcas_id` int NOT NULL,
  `comentarios` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de documentos de marcas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_solicitudes_paises`
--

CREATE TABLE `tbl_marcas_solicitudes_paises` (
  `id` int NOT NULL,
  `pais_id` int NOT NULL,
  `marcas_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de solicitudes de paises de marcas';

--
-- Volcado de datos para la tabla `tbl_marcas_solicitudes_paises`
--

INSERT INTO `tbl_marcas_solicitudes_paises` (`id`, `pais_id`, `marcas_id`) VALUES
(56, 22, 3),
(57, 25, 3),
(58, 63, 3),
(68, 4, 5),
(69, 6, 5),
(70, 9, 5),
(113, 9, 1),
(114, 48, 1),
(123, 48, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_tareas`
--

CREATE TABLE `tbl_marcas_tareas` (
  `id` int NOT NULL,
  `tipo_tareas_id` int NOT NULL,
  `marcas_id` int NOT NULL,
  `fecha` int NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='tabla principal de tareas relacionadas con las solicitudes de marcas';

--
-- Volcado de datos para la tabla `tbl_marcas_tareas`
--

INSERT INTO `tbl_marcas_tareas` (`id`, `tipo_tareas_id`, `marcas_id`, `fecha`, `descripcion`) VALUES
(1, 2, 1, 2023, 'dsdfgdfhbdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_tipo_busqueda`
--

CREATE TABLE `tbl_marcas_tipo_busqueda` (
  `id` int NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla de tipos de busqueda de marcas';

--
-- Volcado de datos para la tabla `tbl_marcas_tipo_busqueda`
--

INSERT INTO `tbl_marcas_tipo_busqueda` (`id`, `nombre`) VALUES
(1, 'CON ANTECEDENTES'),
(2, 'SIN ANTECEDENTES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas_tipo_registro`
--

CREATE TABLE `tbl_marcas_tipo_registro` (
  `id` int NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla principal para el tipo de registro.';

--
-- Volcado de datos para la tabla `tbl_marcas_tipo_registro`
--

INSERT INTO `tbl_marcas_tipo_registro` (`id`, `nombre`) VALUES
(1, 'SISTEMA UNICLASE'),
(2, 'SISTEMA MULTICLASE'),
(3, 'PROTOCOLO MADRID');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_materias`
--

CREATE TABLE `tbl_materias` (
  `id` int NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_materias`
--

INSERT INTO `tbl_materias` (`id`, `nombre`) VALUES
(1, 'General'),
(2, 'Marcas'),
(3, 'Patentes'),
(4, 'Oposiciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_oficina`
--

CREATE TABLE `tbl_oficina` (
  `oficina_id` int NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla principal de oficinas';

--
-- Volcado de datos para la tabla `tbl_oficina`
--

INSERT INTO `tbl_oficina` (`oficina_id`, `nombre`, `direccion`) VALUES
(1, 'ECV & ASOCIADOS', 'Somwhere');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_paises`
--

CREATE TABLE `tbl_paises` (
  `id` int NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla principal de paises';

--
-- Volcado de datos para la tabla `tbl_paises`
--

INSERT INTO `tbl_paises` (`id`, `nombre`) VALUES
(1, 'Andorra '),
(2, 'Emiratos Árabes Unidos '),
(3, 'Afganistán '),
(4, 'Antigua y Barbuda '),
(5, 'Anguila '),
(6, 'Albania '),
(7, 'Armenia '),
(8, 'Antillas Holandesas '),
(9, 'Angola '),
(10, 'Antártida '),
(11, 'Argentina '),
(12, 'Samoa Americana '),
(13, 'Austria '),
(14, 'Australia '),
(15, 'Aruba '),
(16, 'Azerbaiyán '),
(17, 'Bosnia y Herzegovina '),
(18, 'Barbados '),
(19, 'Bangladesh '),
(20, 'Bélgica '),
(21, 'Burkina Faso '),
(22, 'Bahrein '),
(23, 'Burundi '),
(24, 'Benin '),
(25, 'Bermudas '),
(26, 'Bolivia '),
(27, 'Brasil '),
(28, 'Bahamas '),
(29, 'Bután '),
(30, 'Isla Bouvet '),
(31, 'Bulgaria '),
(32, 'Botswana '),
(33, 'Brunei Darussalam '),
(34, 'Bielorrusia '),
(35, 'Belice '),
(36, 'Canadá '),
(37, 'Cocos (Keeling) '),
(38, 'República Centroafricana '),
(39, 'Congo '),
(40, 'Suiza '),
(41, 'Cote D\'Ivoire (Costa de Marfil) '),
(42, 'Islas Cook '),
(43, 'Chile '),
(44, 'Camerún '),
(45, 'China '),
(46, 'Colombia '),
(47, 'Costa Rica '),
(48, 'Cuba '),
(49, 'Cabo Verde '),
(50, 'Isla de Navidad '),
(51, 'Chipre '),
(52, 'República Checa '),
(53, 'Alemania '),
(54, 'Djibouti '),
(55, 'Dinamarca '),
(56, 'Dominica '),
(57, 'República Dominicana '),
(58, 'Argelia '),
(59, 'Ecuador '),
(60, 'Estonia '),
(61, 'Egipto '),
(62, 'Sáhara Occidental '),
(63, 'Eritrea '),
(64, 'España '),
(65, 'Etiopía '),
(66, 'Finlandia '),
(67, 'Fiji '),
(68, 'Islas Malvinas (Falkland) '),
(69, 'Micronesia '),
(70, 'Islas Feroe '),
(71, 'Francia '),
(72, 'Gabón '),
(73, 'Gran Bretaña (Reino Unido) '),
(74, 'Granada '),
(75, 'Georgia '),
(76, 'Guayana Francesa'),
(77, 'Ghana '),
(78, 'Gibraltar '),
(79, 'Groenlandia '),
(80, 'Gambia '),
(81, 'Guinea '),
(82, 'Guadalupe '),
(83, 'Guinea Ecuatorial '),
(84, 'Grecia '),
(85, 'Georgia del Sur y Islas Sandwich del Sur '),
(86, 'Guatemala '),
(87, 'Guam '),
(88, 'Guinea-Bissau '),
(89, 'Guayana '),
(90, 'Hong Kong '),
(91, 'Islas Heard y McDonald '),
(92, 'Honduras '),
(93, 'Croacia'),
(94, 'Haití '),
(95, 'Hungría '),
(96, 'Indonesia '),
(97, 'Irlanda '),
(98, 'Israel '),
(99, 'India '),
(100, 'Territorio Británico del Océano Índico'),
(101, 'Irak '),
(102, 'Irán '),
(103, 'Islandia '),
(104, 'Italia '),
(105, 'Jamaica '),
(106, 'Jordania '),
(107, 'Japón '),
(108, 'Kenia '),
(109, 'Kirguistán '),
(110, 'Camboya '),
(111, 'Kiribati '),
(112, 'Comoras '),
(113, 'Saint Kitts y Nevis '),
(114, 'Corea del Norte '),
(115, 'Corea del Sur '),
(116, 'Kuwait '),
(117, 'Las Islas Caimán '),
(118, 'Kazajstán '),
(119, 'Laos '),
(120, 'Líbano '),
(121, 'Santa Lucía '),
(122, 'Liechtenstein '),
(123, 'Sri Lanka '),
(124, 'Liberia '),
(125, 'Lesoto '),
(126, 'Lituania '),
(127, 'Luxemburgo '),
(128, 'Letonia '),
(129, 'Libia '),
(130, 'Marruecos '),
(131, 'Mónaco '),
(132, 'Moldavia '),
(133, 'Madagascar '),
(134, 'Islas Marshall '),
(135, 'Macedonia '),
(136, 'Malí '),
(137, 'Myanmar '),
(138, 'Mongolia '),
(139, 'Macao '),
(140, 'Islas Marianas del Norte '),
(141, 'Martinica '),
(142, 'Mauritania '),
(143, 'Montserrat '),
(144, 'Malta '),
(145, 'Mauricio '),
(146, 'Maldivas '),
(147, 'Malawi '),
(148, 'México '),
(149, 'Malasia '),
(150, 'Mozambique '),
(151, 'Namibia '),
(152, 'Nueva Caledonia '),
(153, 'Níger '),
(154, 'Norfolk Island '),
(155, 'Nigeria '),
(156, 'Nicaragua '),
(157, 'Países Bajos '),
(158, 'Noruega '),
(159, 'Nepal '),
(160, 'Nauru '),
(161, 'Niue '),
(162, 'Nueva Zelanda '),
(163, 'Omán '),
(164, 'Panamá '),
(165, 'Perú '),
(166, 'Polinesia francés '),
(167, 'Papua Nueva Guinea '),
(168, 'Filipinas '),
(169, 'Pakistán '),
(170, 'Polonia '),
(171, 'San Pedro y Miquelón '),
(172, 'Pitcairn '),
(173, 'Puerto Rico '),
(174, 'Portugal '),
(175, 'Palau '),
(176, 'Paraguay '),
(177, 'Qatar '),
(178, 'Reunión '),
(179, 'Rumania '),
(180, 'La Federación de Rusia '),
(181, 'Ruanda '),
(182, 'Arabia Saudita '),
(183, 'Las Islas Salomón '),
(184, 'Seychelles '),
(185, 'Sudán '),
(186, 'Suecia '),
(187, 'Singapur '),
(188, 'Santa Elena '),
(189, 'Eslovenia '),
(190, 'Svalbard y Jan Mayen '),
(191, 'República Eslovaca '),
(192, 'Sierra Leona '),
(193, 'San Marino '),
(194, 'Senegal '),
(195, 'Somalia '),
(196, 'Suriname '),
(197, 'Santo Tomé y Príncipe '),
(198, 'El Salvador '),
(199, 'Siria '),
(200, 'Swazilandia '),
(201, 'Islas Turcas y Caicos '),
(202, 'Chad '),
(203, 'Territorios del sur francés '),
(204, 'Togo '),
(205, 'Tailandia '),
(206, 'Tayikistán '),
(207, 'Tokelau '),
(208, 'Turkmenistán '),
(209, 'Túnez '),
(210, 'Tonga '),
(211, 'Timor Oriental '),
(212, 'Turquía '),
(213, 'Trinidad y Tobago '),
(214, 'Tuvalu '),
(215, 'Taiwan '),
(216, 'Tanzania '),
(217, 'Ucrania '),
(218, 'Uganda '),
(219, 'Reino Unido '),
(220, 'Islas menores  de EE.UU.'),
(221, 'Estados Unidos de América (EE.UU.) '),
(222, 'Uruguay '),
(223, 'Uzbekistán '),
(224, 'Ciudad del Vaticano '),
(225, 'San Vicente y las Granadinas '),
(226, 'Venezuela '),
(227, 'Islas Vírgenes (Británicas) '),
(228, 'Vietnam '),
(229, 'Vanuatu '),
(230, 'Islas Wallis y Futuna '),
(231, 'Samoa '),
(232, 'Yemen '),
(233, 'Mayotte '),
(234, 'Yugoslavia '),
(235, 'Sudáfrica '),
(236, 'Zambia '),
(237, 'Zaire '),
(238, 'Zimbabue ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_poderes`
--

CREATE TABLE `tbl_poderes` (
  `id` int NOT NULL,
  `numero` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `origen` text COLLATE utf8mb4_spanish_ci,
  `propietario_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de poderes';

--
-- Volcado de datos para la tabla `tbl_poderes`
--

INSERT INTO `tbl_poderes` (`id`, `numero`, `fecha`, `origen`, `propietario_id`) VALUES
(1, '2023-1150', '2023-08-16', '', 1),
(2, '2023-1150', '2023-08-16', '', 1),
(3, '2023-1150', '2023-08-16', '', 1),
(4, '2023-1150', '2023-08-16', '', 1),
(5, '2023-1150', '2023-08-16', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_propietarios`
--

CREATE TABLE `tbl_propietarios` (
  `id` int NOT NULL,
  `pais_id` int NOT NULL,
  `codigo` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_propietario` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado_civil` int DEFAULT NULL COMMENT '1 = Soltero\r\n2 = Casado\r\n3 = Divorciado',
  `representante_legal` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_spanish_ci,
  `ciudad` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `codigo_postal` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `actividad_comercial` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `datos_registro` text COLLATE utf8mb4_spanish_ci,
  `notas` text COLLATE utf8mb4_spanish_ci,
  `created_at` date DEFAULT NULL,
  `created_by` int DEFAULT NULL COMMENT 'FK con la tabla client',
  `modified_by` int DEFAULT NULL COMMENT 'FK con la tabla staff',
  `modified_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla principal de propietarios';

--
-- Volcado de datos para la tabla `tbl_propietarios`
--

INSERT INTO `tbl_propietarios` (`id`, `pais_id`, `codigo`, `nombre_propietario`, `estado_civil`, `representante_legal`, `direccion`, `ciudad`, `estado`, `codigo_postal`, `actividad_comercial`, `datos_registro`, `notas`, `created_at`, `created_by`, `modified_by`, `modified_at`) VALUES
(1, 226, '0001-0', 'Propietario de Ejemp', 0, '', 'tortor amet fermentum lacinia fringilla. vestibulum mauris aliquet tristique. tellus dolor, consectetur vestibulum Maecenas vel In Nulla In nisi adipiscing ante et sit fringilla. ut nisi eu vel fringilla. dolor, risus massa In et tellus a sit ut amet, dolor, nisi tristique. eu laoreet consectetur ut suscipit tortor diam, lacinia. ', '', '', '', '', '', 'tortor amet fermentum lacinia fringilla. vestibulum mauris aliquet tristique. tellus dolor, consectetur vestibulum Maecenas vel In Nulla In nisi adipiscing ante et sit fringilla. ut nisi eu vel fringilla. dolor, risus massa In et tellus a sit ut amet, dolor, nisi tristique. eu laoreet consectetur ut suscipit tortor diam, lacinia. ', '2023-08-16', 1, 1, '2023-08-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_propietarios_documentos`
--

CREATE TABLE `tbl_propietarios_documentos` (
  `id` int NOT NULL,
  `propietario_id` int NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci,
  `archivo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla de documentos de propietarios';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_eventos`
--

CREATE TABLE `tbl_tipos_eventos` (
  `id` int NOT NULL,
  `materia_id` int NOT NULL,
  `descripcion` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla principal de tipos de eventos';

--
-- Volcado de datos para la tabla `tbl_tipos_eventos`
--

INSERT INTO `tbl_tipos_eventos` (`id`, `materia_id`, `descripcion`) VALUES
(1, 2, 'ACLARATORIA DE DESCRIPCION DEL DISEÑO '),
(2, 2, 'ALCANCE A LA CONTESTACIÓN DE LA CANCELACION'),
(3, 2, 'AMPLIACION DE RECURSO DE RECONSIDERACION DE CANCELACION POR FALTA DE USO'),
(4, 2, 'AMPLIACION Y CONSIGNACION DE PRUEBAS DE CANCELACION POR FALTA DE USO. '),
(5, 2, 'AMPLIACIÓN DE SOLICITUD DE CORRECCIÓN DE ERROR EN PUBLICACIÓN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_tareas`
--

CREATE TABLE `tbl_tipos_tareas` (
  `id` int NOT NULL,
  `nombre` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='tabla de tipos de tareas';

--
-- Volcado de datos para la tabla `tbl_tipos_tareas`
--

INSERT INTO `tbl_tipos_tareas` (`id`, `nombre`) VALUES
(1, 'EN ESPERA DE DOCUMENTOS FIRMADOS'),
(2, 'ESPERANDO INSTRUCCIONES PARA CONTESTAR CANCELACION'),
(3, 'ESPERANDO INSTRUCCIONES PARA CONTESTAR NULIDAD'),
(4, 'ESPERANDO INSTRUCCIONES PARA CONTESTAR OPOSICIÓN'),
(5, 'ESPERANDO ORDEN DE PAGO DE IMPUESTOS'),
(6, 'RENOVACION'),
(7, 'CONTESTACION DE OPOSICION (FALTAN RECAUDOS)'),
(8, 'CONTESTACIÓN DE OFICIO DE DEVOLUCIÓN'),
(9, 'ESPERANDO INSTRUCCIONES PARA RECURRIR'),
(10, 'PRESENTACION DE OPOSICION INCOMPLETA '),
(12, 'REQUERIMIENTO DE DOCUMENTOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_publicacion`
--

CREATE TABLE `tbl_tipo_publicacion` (
  `id` int NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla principal de tipos de publicaciones';

--
-- Volcado de datos para la tabla `tbl_tipo_publicacion`
--

INSERT INTO `tbl_tipo_publicacion` (`id`, `nombre`) VALUES
(1, 'Aviso de Nulidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_signo`
--

CREATE TABLE `tbl_tipo_signo` (
  `id` int NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla principal de tipos de signo';

--
-- Volcado de datos para la tabla `tbl_tipo_signo`
--

INSERT INTO `tbl_tipo_signo` (`id`, `nombre`) VALUES
(1, 'Nominativa'),
(2, 'Mixta'),
(3, 'Figurativa'),
(4, 'Tridimensional'),
(5, 'Sonora'),
(6, 'Olfativa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_solicitud`
--

CREATE TABLE `tbl_tipo_solicitud` (
  `id` int NOT NULL,
  `nombre` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla maestra de los tipos de signo';

--
-- Volcado de datos para la tabla `tbl_tipo_solicitud`
--

INSERT INTO `tbl_tipo_solicitud` (`id`, `nombre`) VALUES
(1, 'Marca Producto'),
(2, 'Marca de Servicio'),
(3, 'Lema Comercial'),
(4, 'Nombre Comercial'),
(5, 'Enseña Comercial'),
(6, 'Denominacion de Origen'),
(7, 'Nombre de Dominio');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblactivity_log`
--
ALTER TABLE `tblactivity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffid` (`staffid`);

--
-- Indices de la tabla `tblallowance_type`
--
ALTER TABLE `tblallowance_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indices de la tabla `tblannouncements`
--
ALTER TABLE `tblannouncements`
  ADD PRIMARY KEY (`announcementid`);

--
-- Indices de la tabla `tblclients`
--
ALTER TABLE `tblclients`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `country` (`country`),
  ADD KEY `leadid` (`leadid`),
  ADD KEY `company` (`company`),
  ADD KEY `active` (`active`);

--
-- Indices de la tabla `tblconsents`
--
ALTER TABLE `tblconsents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purpose_id` (`purpose_id`),
  ADD KEY `contact_id` (`contact_id`),
  ADD KEY `lead_id` (`lead_id`);

--
-- Indices de la tabla `tblconsent_purposes`
--
ALTER TABLE `tblconsent_purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblcontacts`
--
ALTER TABLE `tblcontacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `email` (`email`),
  ADD KEY `is_primary` (`is_primary`);

--
-- Indices de la tabla `tblcontact_permissions`
--
ALTER TABLE `tblcontact_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblcontracts`
--
ALTER TABLE `tblcontracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client` (`client`),
  ADD KEY `contract_type` (`contract_type`);

--
-- Indices de la tabla `tblcontracts_types`
--
ALTER TABLE `tblcontracts_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblcontract_comments`
--
ALTER TABLE `tblcontract_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblcontract_renewals`
--
ALTER TABLE `tblcontract_renewals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblcountries`
--
ALTER TABLE `tblcountries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indices de la tabla `tblcreditnotes`
--
ALTER TABLE `tblcreditnotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currency` (`currency`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `project_id` (`project_id`);

--
-- Indices de la tabla `tblcreditnote_refunds`
--
ALTER TABLE `tblcreditnote_refunds`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblcredits`
--
ALTER TABLE `tblcredits`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblcurrencies`
--
ALTER TABLE `tblcurrencies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblcustomers_groups`
--
ALTER TABLE `tblcustomers_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indices de la tabla `tblcustomer_admins`
--
ALTER TABLE `tblcustomer_admins`
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indices de la tabla `tblcustomer_groups`
--
ALTER TABLE `tblcustomer_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupid` (`groupid`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indices de la tabla `tblcustomfields`
--
ALTER TABLE `tblcustomfields`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblcustomfieldsvalues`
--
ALTER TABLE `tblcustomfieldsvalues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relid` (`relid`),
  ADD KEY `fieldto` (`fieldto`),
  ADD KEY `fieldid` (`fieldid`);

--
-- Indices de la tabla `tblday_off`
--
ALTER TABLE `tblday_off`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`departmentid`),
  ADD KEY `name` (`name`);

--
-- Indices de la tabla `tbldismissed_announcements`
--
ALTER TABLE `tbldismissed_announcements`
  ADD PRIMARY KEY (`dismissedannouncementid`),
  ADD KEY `announcementid` (`announcementid`),
  ADD KEY `staff` (`staff`),
  ADD KEY `userid` (`userid`);

--
-- Indices de la tabla `tblemaillists`
--
ALTER TABLE `tblemaillists`
  ADD PRIMARY KEY (`listid`);

--
-- Indices de la tabla `tblemailtemplates`
--
ALTER TABLE `tblemailtemplates`
  ADD PRIMARY KEY (`emailtemplateid`);

--
-- Indices de la tabla `tblestimates`
--
ALTER TABLE `tblestimates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `currency` (`currency`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `sale_agent` (`sale_agent`),
  ADD KEY `status` (`status`);

--
-- Indices de la tabla `tblestimate_requests`
--
ALTER TABLE `tblestimate_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblestimate_request_forms`
--
ALTER TABLE `tblestimate_request_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblestimate_request_status`
--
ALTER TABLE `tblestimate_request_status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblevents`
--
ALTER TABLE `tblevents`
  ADD PRIMARY KEY (`eventid`);

--
-- Indices de la tabla `tblexpenses`
--
ALTER TABLE `tblexpenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `category` (`category`),
  ADD KEY `currency` (`currency`);

--
-- Indices de la tabla `tblexpenses_categories`
--
ALTER TABLE `tblexpenses_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblfiles`
--
ALTER TABLE `tblfiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rel_id` (`rel_id`),
  ADD KEY `rel_type` (`rel_type`);

--
-- Indices de la tabla `tblform_questions`
--
ALTER TABLE `tblform_questions`
  ADD PRIMARY KEY (`questionid`);

--
-- Indices de la tabla `tblform_question_box`
--
ALTER TABLE `tblform_question_box`
  ADD PRIMARY KEY (`boxid`);

--
-- Indices de la tabla `tblform_question_box_description`
--
ALTER TABLE `tblform_question_box_description`
  ADD PRIMARY KEY (`questionboxdescriptionid`);

--
-- Indices de la tabla `tblform_results`
--
ALTER TABLE `tblform_results`
  ADD PRIMARY KEY (`resultid`);

--
-- Indices de la tabla `tblfs_downloads`
--
ALTER TABLE `tblfs_downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblfs_file_overview`
--
ALTER TABLE `tblfs_file_overview`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblfs_genenal_ip_share`
--
ALTER TABLE `tblfs_genenal_ip_share`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblfs_setting_configuration`
--
ALTER TABLE `tblfs_setting_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblfs_setting_configuration_relationship`
--
ALTER TABLE `tblfs_setting_configuration_relationship`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblfs_sharings`
--
ALTER TABLE `tblfs_sharings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblfs_sharing_relationship`
--
ALTER TABLE `tblfs_sharing_relationship`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblgdpr_requests`
--
ALTER TABLE `tblgdpr_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblgoals`
--
ALTER TABLE `tblgoals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indices de la tabla `tblhrm_option`
--
ALTER TABLE `tblhrm_option`
  ADD PRIMARY KEY (`option_id`);

--
-- Indices de la tabla `tblhrm_timesheet`
--
ALTER TABLE `tblhrm_timesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblinsurance_type`
--
ALTER TABLE `tblinsurance_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblinvoicepaymentrecords`
--
ALTER TABLE `tblinvoicepaymentrecords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoiceid` (`invoiceid`),
  ADD KEY `paymentmethod` (`paymentmethod`);

--
-- Indices de la tabla `tblinvoices`
--
ALTER TABLE `tblinvoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currency` (`currency`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `sale_agent` (`sale_agent`),
  ADD KEY `total` (`total`),
  ADD KEY `status` (`status`);

--
-- Indices de la tabla `tblitemable`
--
ALTER TABLE `tblitemable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rel_id` (`rel_id`),
  ADD KEY `rel_type` (`rel_type`),
  ADD KEY `qty` (`qty`),
  ADD KEY `rate` (`rate`);

--
-- Indices de la tabla `tblitems`
--
ALTER TABLE `tblitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tax` (`tax`),
  ADD KEY `tax2` (`tax2`),
  ADD KEY `group_id` (`group_id`);

--
-- Indices de la tabla `tblitems_groups`
--
ALTER TABLE `tblitems_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblitem_tax`
--
ALTER TABLE `tblitem_tax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemid` (`itemid`),
  ADD KEY `rel_id` (`rel_id`);

--
-- Indices de la tabla `tbljob_position`
--
ALTER TABLE `tbljob_position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indices de la tabla `tblknowedge_base_article_feedback`
--
ALTER TABLE `tblknowedge_base_article_feedback`
  ADD PRIMARY KEY (`articleanswerid`);

--
-- Indices de la tabla `tblknowledge_base`
--
ALTER TABLE `tblknowledge_base`
  ADD PRIMARY KEY (`articleid`);

--
-- Indices de la tabla `tblknowledge_base_groups`
--
ALTER TABLE `tblknowledge_base_groups`
  ADD PRIMARY KEY (`groupid`);

--
-- Indices de la tabla `tblleads`
--
ALTER TABLE `tblleads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `company` (`company`),
  ADD KEY `email` (`email`),
  ADD KEY `assigned` (`assigned`),
  ADD KEY `status` (`status`),
  ADD KEY `source` (`source`),
  ADD KEY `lastcontact` (`lastcontact`),
  ADD KEY `dateadded` (`dateadded`),
  ADD KEY `leadorder` (`leadorder`),
  ADD KEY `from_form_id` (`from_form_id`);

--
-- Indices de la tabla `tblleads_email_integration`
--
ALTER TABLE `tblleads_email_integration`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblleads_sources`
--
ALTER TABLE `tblleads_sources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indices de la tabla `tblleads_status`
--
ALTER TABLE `tblleads_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indices de la tabla `tbllead_activity_log`
--
ALTER TABLE `tbllead_activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbllead_integration_emails`
--
ALTER TABLE `tbllead_integration_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbllistemails`
--
ALTER TABLE `tbllistemails`
  ADD PRIMARY KEY (`emailid`);

--
-- Indices de la tabla `tblmaillistscustomfields`
--
ALTER TABLE `tblmaillistscustomfields`
  ADD PRIMARY KEY (`customfieldid`);

--
-- Indices de la tabla `tblmaillistscustomfieldvalues`
--
ALTER TABLE `tblmaillistscustomfieldvalues`
  ADD PRIMARY KEY (`customfieldvalueid`),
  ADD KEY `listid` (`listid`),
  ADD KEY `customfieldid` (`customfieldid`);

--
-- Indices de la tabla `tblmail_queue`
--
ALTER TABLE `tblmail_queue`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblmanage_leave`
--
ALTER TABLE `tblmanage_leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indices de la tabla `tblmilestones`
--
ALTER TABLE `tblmilestones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblmindmap`
--
ALTER TABLE `tblmindmap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffid` (`staffid`),
  ADD KEY `mindmap_group_id` (`mindmap_group_id`);

--
-- Indices de la tabla `tblmindmap_groups`
--
ALTER TABLE `tblmindmap_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblmodules`
--
ALTER TABLE `tblmodules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblnewsfeed_comment_likes`
--
ALTER TABLE `tblnewsfeed_comment_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblnewsfeed_posts`
--
ALTER TABLE `tblnewsfeed_posts`
  ADD PRIMARY KEY (`postid`);

--
-- Indices de la tabla `tblnewsfeed_post_comments`
--
ALTER TABLE `tblnewsfeed_post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblnewsfeed_post_likes`
--
ALTER TABLE `tblnewsfeed_post_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblnotes`
--
ALTER TABLE `tblnotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rel_id` (`rel_id`),
  ADD KEY `rel_type` (`rel_type`);

--
-- Indices de la tabla `tblnotifications`
--
ALTER TABLE `tblnotifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbloptions`
--
ALTER TABLE `tbloptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indices de la tabla `tblpayment_modes`
--
ALTER TABLE `tblpayment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblpayroll_table`
--
ALTER TABLE `tblpayroll_table`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblpayroll_type`
--
ALTER TABLE `tblpayroll_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblpinned_projects`
--
ALTER TABLE `tblpinned_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indices de la tabla `tblprojectdiscussioncomments`
--
ALTER TABLE `tblprojectdiscussioncomments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblprojectdiscussions`
--
ALTER TABLE `tblprojectdiscussions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblprojects`
--
ALTER TABLE `tblprojects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `name` (`name`);

--
-- Indices de la tabla `tblproject_activity`
--
ALTER TABLE `tblproject_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblproject_files`
--
ALTER TABLE `tblproject_files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblproject_members`
--
ALTER TABLE `tblproject_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indices de la tabla `tblproject_notes`
--
ALTER TABLE `tblproject_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblproject_settings`
--
ALTER TABLE `tblproject_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indices de la tabla `tblproposals`
--
ALTER TABLE `tblproposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indices de la tabla `tblproposal_comments`
--
ALTER TABLE `tblproposal_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblprovince_city`
--
ALTER TABLE `tblprovince_city`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblrelated_items`
--
ALTER TABLE `tblrelated_items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblreminders`
--
ALTER TABLE `tblreminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rel_id` (`rel_id`),
  ADD KEY `rel_type` (`rel_type`),
  ADD KEY `staff` (`staff`);

--
-- Indices de la tabla `tblrequest`
--
ALTER TABLE `tblrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblrequest_approval_details`
--
ALTER TABLE `tblrequest_approval_details`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblrequest_files`
--
ALTER TABLE `tblrequest_files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblrequest_follow`
--
ALTER TABLE `tblrequest_follow`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblrequest_form`
--
ALTER TABLE `tblrequest_form`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblrequest_log`
--
ALTER TABLE `tblrequest_log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblrequest_related`
--
ALTER TABLE `tblrequest_related`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblrequest_type`
--
ALTER TABLE `tblrequest_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblrequest_type_form`
--
ALTER TABLE `tblrequest_type_form`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblrequest_type_workflow`
--
ALTER TABLE `tblrequest_type_workflow`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblroles`
--
ALTER TABLE `tblroles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indices de la tabla `tblsalary_form`
--
ALTER TABLE `tblsalary_form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indices de la tabla `tblsales_activity`
--
ALTER TABLE `tblsales_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblscheduled_emails`
--
ALTER TABLE `tblscheduled_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indices de la tabla `tblsessions`
--
ALTER TABLE `tblsessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indices de la tabla `tblspam_filters`
--
ALTER TABLE `tblspam_filters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`staffid`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`);

--
-- Indices de la tabla `tblstaff_contract`
--
ALTER TABLE `tblstaff_contract`
  ADD PRIMARY KEY (`id_contract`);

--
-- Indices de la tabla `tblstaff_contracttype`
--
ALTER TABLE `tblstaff_contracttype`
  ADD PRIMARY KEY (`id_contracttype`);

--
-- Indices de la tabla `tblstaff_contract_detail`
--
ALTER TABLE `tblstaff_contract_detail`
  ADD PRIMARY KEY (`contract_detail_id`);

--
-- Indices de la tabla `tblstaff_departments`
--
ALTER TABLE `tblstaff_departments`
  ADD PRIMARY KEY (`staffdepartmentid`);

--
-- Indices de la tabla `tblstaff_insurance`
--
ALTER TABLE `tblstaff_insurance`
  ADD PRIMARY KEY (`insurance_id`);

--
-- Indices de la tabla `tblstaff_insurance_history`
--
ALTER TABLE `tblstaff_insurance_history`
  ADD PRIMARY KEY (`id`,`insurance_id`);

--
-- Indices de la tabla `tblsubscriptions`
--
ALTER TABLE `tblsubscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `currency` (`currency`),
  ADD KEY `tax_id` (`tax_id`);

--
-- Indices de la tabla `tblsurveyresultsets`
--
ALTER TABLE `tblsurveyresultsets`
  ADD PRIMARY KEY (`resultsetid`);

--
-- Indices de la tabla `tblsurveys`
--
ALTER TABLE `tblsurveys`
  ADD PRIMARY KEY (`surveyid`);

--
-- Indices de la tabla `tblsurveysemailsendcron`
--
ALTER TABLE `tblsurveysemailsendcron`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblsurveysendlog`
--
ALTER TABLE `tblsurveysendlog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbltaggables`
--
ALTER TABLE `tbltaggables`
  ADD KEY `rel_id` (`rel_id`),
  ADD KEY `rel_type` (`rel_type`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indices de la tabla `tbltags`
--
ALTER TABLE `tbltags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indices de la tabla `tbltasks`
--
ALTER TABLE `tbltasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rel_id` (`rel_id`),
  ADD KEY `rel_type` (`rel_type`),
  ADD KEY `milestone` (`milestone`),
  ADD KEY `kanban_order` (`kanban_order`),
  ADD KEY `status` (`status`);

--
-- Indices de la tabla `tbltaskstimers`
--
ALTER TABLE `tbltaskstimers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indices de la tabla `tbltasks_checklist_templates`
--
ALTER TABLE `tbltasks_checklist_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbltask_assigned`
--
ALTER TABLE `tbltask_assigned`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taskid` (`taskid`),
  ADD KEY `staffid` (`staffid`);

--
-- Indices de la tabla `tbltask_checklist_items`
--
ALTER TABLE `tbltask_checklist_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taskid` (`taskid`);

--
-- Indices de la tabla `tbltask_comments`
--
ALTER TABLE `tbltask_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `taskid` (`taskid`);

--
-- Indices de la tabla `tbltask_followers`
--
ALTER TABLE `tbltask_followers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbltaxes`
--
ALTER TABLE `tbltaxes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbltemplates`
--
ALTER TABLE `tbltemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbltickets`
--
ALTER TABLE `tbltickets`
  ADD PRIMARY KEY (`ticketid`),
  ADD KEY `service` (`service`),
  ADD KEY `department` (`department`),
  ADD KEY `status` (`status`),
  ADD KEY `userid` (`userid`),
  ADD KEY `priority` (`priority`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `contactid` (`contactid`);

--
-- Indices de la tabla `tbltickets_pipe_log`
--
ALTER TABLE `tbltickets_pipe_log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbltickets_predefined_replies`
--
ALTER TABLE `tbltickets_predefined_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbltickets_priorities`
--
ALTER TABLE `tbltickets_priorities`
  ADD PRIMARY KEY (`priorityid`);

--
-- Indices de la tabla `tbltickets_status`
--
ALTER TABLE `tbltickets_status`
  ADD PRIMARY KEY (`ticketstatusid`);

--
-- Indices de la tabla `tblticket_attachments`
--
ALTER TABLE `tblticket_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblticket_replies`
--
ALTER TABLE `tblticket_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbltodos`
--
ALTER TABLE `tbltodos`
  ADD PRIMARY KEY (`todoid`);

--
-- Indices de la tabla `tbltracked_mails`
--
ALTER TABLE `tbltracked_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbltwocheckout_log`
--
ALTER TABLE `tbltwocheckout_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indices de la tabla `tbluser_meta`
--
ALTER TABLE `tbluser_meta`
  ADD PRIMARY KEY (`umeta_id`);

--
-- Indices de la tabla `tblvault`
--
ALTER TABLE `tblvault`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblviews_tracking`
--
ALTER TABLE `tblviews_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblweb_to_lead`
--
ALTER TABLE `tblweb_to_lead`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblworkplace`
--
ALTER TABLE `tblworkplace`
  ADD PRIMARY KEY (`workplace_id`);

--
-- Indices de la tabla `tblwork_shift`
--
ALTER TABLE `tblwork_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_apoderados`
--
ALTER TABLE `tbl_apoderados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_poderes_tbl_apoderados_fk` (`poder_id`);

--
-- Indices de la tabla `tbl_boletines`
--
ALTER TABLE `tbl_boletines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_paises_tbl_boletines_fk` (`pais_id`);

--
-- Indices de la tabla `tbl_correspondecia_usuario`
--
ALTER TABLE `tbl_correspondecia_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_corr_plant_corr_usu_fk` (`plantilla_id`);

--
-- Indices de la tabla `tbl_correspondencia_plantilla`
--
ALTER TABLE `tbl_correspondencia_plantilla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_mat_corr_plan_fk` (`materia_id`);

--
-- Indices de la tabla `tbl_estado_expediente`
--
ALTER TABLE `tbl_estado_expediente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_marcas_busquedas`
--
ALTER TABLE `tbl_marcas_busquedas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_oficina_tbl_marcas_busquedas_fk` (`oficina_id`),
  ADD KEY `tbl_paises_tbl_marcas_busquedas_fk` (`pais_id`),
  ADD KEY `tbl_marcas_clase_niza_tbl_marcas_busq_fk` (`clase_niza_id`),
  ADD KEY `tbl_marcas_tipo_bus_tbl_marcas_bus_fk` (`busqueda_interna_id`),
  ADD KEY `tbl_marcas_tipo_bus_tbl_marcas_bus_fk1` (`busqueda_externa_id`);

--
-- Indices de la tabla `tbl_marcas_busquedas_documentos`
--
ALTER TABLE `tbl_marcas_busquedas_documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_marcas_bus_tbl_mar_bus_doc_fk` (`busquedas_id`);

--
-- Indices de la tabla `tbl_marcas_cambio_domicilio`
--
ALTER TABLE `tbl_marcas_cambio_domicilio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_est_exp_tbl_mar_cam_dom_fk` (`estado_id`),
  ADD KEY `tbl_of_mar_cam_dom_fk` (`oficina_id`),
  ADD KEY `tbl_marcas_sol_tbl_marcas_cambio_dom_fk` (`marcas_id`);

--
-- Indices de la tabla `tbl_marcas_cambio_nombre`
--
ALTER TABLE `tbl_marcas_cambio_nombre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_est_exp_tbl_mar_cam_nom_fk` (`estado_id`),
  ADD KEY `tbl_ofi_mar_cam_nom_fk` (`oficina_id`),
  ADD KEY `tbl_marcas_sol_tbl_marcas_cambio_nombre_fk` (`marcas_id`);

--
-- Indices de la tabla `tbl_marcas_cambio_nombre_participantes`
--
ALTER TABLE `tbl_marcas_cambio_nombre_participantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_marcas_cam_nom_tbl_marcas_cam_nom_part_fk` (`cambio_nombre_id`),
  ADD KEY `tbl_prop_tbl_mar_cam_nom_part_fk` (`propietario_id`);

--
-- Indices de la tabla `tbl_marcas_cedentes_cesionarios`
--
ALTER TABLE `tbl_marcas_cedentes_cesionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_marcas_ces_tbl_marcas_ced_ces_fk` (`cesion_id`);

--
-- Indices de la tabla `tbl_marcas_cesiones`
--
ALTER TABLE `tbl_marcas_cesiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_estado_expediente_tbl_marcas_cesiones_fk` (`estado_id`),
  ADD KEY `tbl_oficina_tbl_marcas_cesiones_fk` (`oficina_id`),
  ADD KEY `tbl_marcas_sol_tbl_marcas_cesiones_fk` (`marcas_id`);

--
-- Indices de la tabla `tbl_marcas_clases`
--
ALTER TABLE `tbl_marcas_clases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_marcas_sol_tbl_marcas_clases_fk` (`marcas_id`),
  ADD KEY `tbl_marcas_clase_niza_tbl_marcas_clases_fk` (`clase_id`);

--
-- Indices de la tabla `tbl_marcas_clase_niza`
--
ALTER TABLE `tbl_marcas_clase_niza`
  ADD PRIMARY KEY (`clase_niza_id`);

--
-- Indices de la tabla `tbl_marcas_domicilios`
--
ALTER TABLE `tbl_marcas_domicilios`
  ADD PRIMARY KEY (`domicilio_id`),
  ADD KEY `tbl_marcas_cambio_domicilio_tbl_marcas_domicilios_fk` (`cambio_domicilio_id`),
  ADD KEY `tbl_propietarios_tbl_marcas_domicilios_fk` (`propietario_id`);

--
-- Indices de la tabla `tbl_marcas_eventos`
--
ALTER TABLE `tbl_marcas_eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_tipos_eve_mar_even_fk` (`tipo_evento_id`),
  ADD KEY `tbl_marcas_sol_tbl_marcas_eventos_fk` (`marcas_id`);

--
-- Indices de la tabla `tbl_marcas_fusion`
--
ALTER TABLE `tbl_marcas_fusion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_estado_expediente_tbl_marcas_fusion_fk` (`estado_id`),
  ADD KEY `tbl_oficina_tbl_marcas_fusion_fk` (`oficina_id`),
  ADD KEY `tbl_marcas_sol_tbl_marcas_fusion_fk` (`marcas_id`);

--
-- Indices de la tabla `tbl_marcas_fusion_participantes`
--
ALTER TABLE `tbl_marcas_fusion_participantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_marcas_fusion_tbl_marcas_fusion_part_fk` (`fusion_id`),
  ADD KEY `tbl_propietarios_tbl_mar_fus_part_fk` (`propietario_id`);

--
-- Indices de la tabla `tbl_marcas_licencia`
--
ALTER TABLE `tbl_marcas_licencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_estado_expediente_tbl_marcas_licencia_fk` (`estado_id`),
  ADD KEY `tbl_oficina_tbl_marcas_licencia_fk` (`oficina_id`),
  ADD KEY `tbl_marcas_sol_tbl_marcas_licencia_fk` (`marcas_id`);

--
-- Indices de la tabla `tbl_marcas_licenciantes`
--
ALTER TABLE `tbl_marcas_licenciantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_marcas_licencia_tbl_marcas_lic_fk` (`licencia_id`),
  ADD KEY `tbl_propietarios_tbl_marcas_lic_fk` (`propietario_id`);

--
-- Indices de la tabla `tbl_marcas_prioridades`
--
ALTER TABLE `tbl_marcas_prioridades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_marcas_sol_tbl_marcas_prioridades_fk` (`marcas_id`),
  ADD KEY `tbl_paises_tbl_marcas_prioridades_fk` (`pais_id`);

--
-- Indices de la tabla `tbl_marcas_publicaciones`
--
ALTER TABLE `tbl_marcas_publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_tipo_pub_tbl_marcas_pub_fk` (`tipo_pub_id`),
  ADD KEY `tbl_marcas_solicitudes_tbl_marcas_publicaciones_fk` (`marcas_id`),
  ADD KEY `tbl_boletines_tbl_marcas_pub_fk` (`boletin_id`);

--
-- Indices de la tabla `tbl_marcas_solicitantes`
--
ALTER TABLE `tbl_marcas_solicitantes`
  ADD PRIMARY KEY (`mar_sol_id`),
  ADD KEY `tbl_marcas_sol_tbl_marcas_sol_fk` (`marcas_id`);

--
-- Indices de la tabla `tbl_marcas_solicitudes`
--
ALTER TABLE `tbl_marcas_solicitudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_estados_tbl_marcas_solicitudes_fk` (`estado_id`),
  ADD KEY `tbl_tipo_sol_mar_sol_fk` (`tipo_solicitud_id`),
  ADD KEY `tbl_tipo_signo_mar_sol_fk` (`tipo_signo_id`),
  ADD KEY `tbl_mar_tipo_reg_mar_sol_fk` (`tipo_registro_id`),
  ADD KEY `tbl_oficina_tbl_marcas_solicitudes_fk` (`oficina_id`);

--
-- Indices de la tabla `tbl_marcas_solicitudes_documentos`
--
ALTER TABLE `tbl_marcas_solicitudes_documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_marcas_sol_tbl_marcas_sol_doc_fk` (`marcas_id`);

--
-- Indices de la tabla `tbl_marcas_solicitudes_paises`
--
ALTER TABLE `tbl_marcas_solicitudes_paises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_marcas_sol_tbl_marcas_sol_paises_fk` (`marcas_id`),
  ADD KEY `tbl_paises_tbl_marcas_sol_pai_fk` (`pais_id`);

--
-- Indices de la tabla `tbl_marcas_tareas`
--
ALTER TABLE `tbl_marcas_tareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_tipos_tareas_tbl_marcas_tareas_fk` (`tipo_tareas_id`),
  ADD KEY `tbl_marcas_sol_tbl_marcas_tareas_fk` (`marcas_id`);

--
-- Indices de la tabla `tbl_marcas_tipo_busqueda`
--
ALTER TABLE `tbl_marcas_tipo_busqueda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_marcas_tipo_registro`
--
ALTER TABLE `tbl_marcas_tipo_registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_materias`
--
ALTER TABLE `tbl_materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_oficina`
--
ALTER TABLE `tbl_oficina`
  ADD PRIMARY KEY (`oficina_id`);

--
-- Indices de la tabla `tbl_paises`
--
ALTER TABLE `tbl_paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_poderes`
--
ALTER TABLE `tbl_poderes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_propietarios_tbl_poderes_fk` (`propietario_id`);

--
-- Indices de la tabla `tbl_propietarios`
--
ALTER TABLE `tbl_propietarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_paises_tbl_propietarios_fk` (`pais_id`);

--
-- Indices de la tabla `tbl_propietarios_documentos`
--
ALTER TABLE `tbl_propietarios_documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_propietarios_tbl_prop_doc_fk` (`propietario_id`);

--
-- Indices de la tabla `tbl_tipos_eventos`
--
ALTER TABLE `tbl_tipos_eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_materias_tbl_tipos_eventos_fk` (`materia_id`);

--
-- Indices de la tabla `tbl_tipos_tareas`
--
ALTER TABLE `tbl_tipos_tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_tipo_publicacion`
--
ALTER TABLE `tbl_tipo_publicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_tipo_signo`
--
ALTER TABLE `tbl_tipo_signo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_tipo_solicitud`
--
ALTER TABLE `tbl_tipo_solicitud`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblactivity_log`
--
ALTER TABLE `tblactivity_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `tblallowance_type`
--
ALTER TABLE `tblallowance_type`
  MODIFY `type_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblannouncements`
--
ALTER TABLE `tblannouncements`
  MODIFY `announcementid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblclients`
--
ALTER TABLE `tblclients`
  MODIFY `userid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `tblconsents`
--
ALTER TABLE `tblconsents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblconsent_purposes`
--
ALTER TABLE `tblconsent_purposes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblcontacts`
--
ALTER TABLE `tblcontacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblcontact_permissions`
--
ALTER TABLE `tblcontact_permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tblcontracts`
--
ALTER TABLE `tblcontracts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblcontracts_types`
--
ALTER TABLE `tblcontracts_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblcontract_comments`
--
ALTER TABLE `tblcontract_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblcontract_renewals`
--
ALTER TABLE `tblcontract_renewals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblcountries`
--
ALTER TABLE `tblcountries`
  MODIFY `country_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT de la tabla `tblcreditnotes`
--
ALTER TABLE `tblcreditnotes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblcreditnote_refunds`
--
ALTER TABLE `tblcreditnote_refunds`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblcredits`
--
ALTER TABLE `tblcredits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblcurrencies`
--
ALTER TABLE `tblcurrencies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblcustomers_groups`
--
ALTER TABLE `tblcustomers_groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblcustomer_groups`
--
ALTER TABLE `tblcustomer_groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblcustomfields`
--
ALTER TABLE `tblcustomfields`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblcustomfieldsvalues`
--
ALTER TABLE `tblcustomfieldsvalues`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblday_off`
--
ALTER TABLE `tblday_off`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `departmentid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbldismissed_announcements`
--
ALTER TABLE `tbldismissed_announcements`
  MODIFY `dismissedannouncementid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblemaillists`
--
ALTER TABLE `tblemaillists`
  MODIFY `listid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblemailtemplates`
--
ALTER TABLE `tblemailtemplates`
  MODIFY `emailtemplateid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `tblestimates`
--
ALTER TABLE `tblestimates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblestimate_requests`
--
ALTER TABLE `tblestimate_requests`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblestimate_request_forms`
--
ALTER TABLE `tblestimate_request_forms`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblestimate_request_status`
--
ALTER TABLE `tblestimate_request_status`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblevents`
--
ALTER TABLE `tblevents`
  MODIFY `eventid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblexpenses`
--
ALTER TABLE `tblexpenses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblexpenses_categories`
--
ALTER TABLE `tblexpenses_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblfiles`
--
ALTER TABLE `tblfiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblform_questions`
--
ALTER TABLE `tblform_questions`
  MODIFY `questionid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblform_question_box`
--
ALTER TABLE `tblform_question_box`
  MODIFY `boxid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblform_question_box_description`
--
ALTER TABLE `tblform_question_box_description`
  MODIFY `questionboxdescriptionid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblform_results`
--
ALTER TABLE `tblform_results`
  MODIFY `resultid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblfs_downloads`
--
ALTER TABLE `tblfs_downloads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblfs_file_overview`
--
ALTER TABLE `tblfs_file_overview`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblfs_genenal_ip_share`
--
ALTER TABLE `tblfs_genenal_ip_share`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblfs_setting_configuration`
--
ALTER TABLE `tblfs_setting_configuration`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblfs_setting_configuration_relationship`
--
ALTER TABLE `tblfs_setting_configuration_relationship`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblfs_sharings`
--
ALTER TABLE `tblfs_sharings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblfs_sharing_relationship`
--
ALTER TABLE `tblfs_sharing_relationship`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblgdpr_requests`
--
ALTER TABLE `tblgdpr_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblgoals`
--
ALTER TABLE `tblgoals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblhrm_option`
--
ALTER TABLE `tblhrm_option`
  MODIFY `option_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tblhrm_timesheet`
--
ALTER TABLE `tblhrm_timesheet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblinsurance_type`
--
ALTER TABLE `tblinsurance_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblinvoicepaymentrecords`
--
ALTER TABLE `tblinvoicepaymentrecords`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblinvoices`
--
ALTER TABLE `tblinvoices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblitemable`
--
ALTER TABLE `tblitemable`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblitems`
--
ALTER TABLE `tblitems`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblitems_groups`
--
ALTER TABLE `tblitems_groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblitem_tax`
--
ALTER TABLE `tblitem_tax`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbljob_position`
--
ALTER TABLE `tbljob_position`
  MODIFY `position_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblknowedge_base_article_feedback`
--
ALTER TABLE `tblknowedge_base_article_feedback`
  MODIFY `articleanswerid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblknowledge_base`
--
ALTER TABLE `tblknowledge_base`
  MODIFY `articleid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblknowledge_base_groups`
--
ALTER TABLE `tblknowledge_base_groups`
  MODIFY `groupid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblleads`
--
ALTER TABLE `tblleads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblleads_email_integration`
--
ALTER TABLE `tblleads_email_integration`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'the ID always must be 1', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblleads_sources`
--
ALTER TABLE `tblleads_sources`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblleads_status`
--
ALTER TABLE `tblleads_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbllead_activity_log`
--
ALTER TABLE `tbllead_activity_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbllead_integration_emails`
--
ALTER TABLE `tbllead_integration_emails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbllistemails`
--
ALTER TABLE `tbllistemails`
  MODIFY `emailid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblmaillistscustomfields`
--
ALTER TABLE `tblmaillistscustomfields`
  MODIFY `customfieldid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblmaillistscustomfieldvalues`
--
ALTER TABLE `tblmaillistscustomfieldvalues`
  MODIFY `customfieldvalueid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblmail_queue`
--
ALTER TABLE `tblmail_queue`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblmanage_leave`
--
ALTER TABLE `tblmanage_leave`
  MODIFY `leave_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblmilestones`
--
ALTER TABLE `tblmilestones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblmindmap`
--
ALTER TABLE `tblmindmap`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblmindmap_groups`
--
ALTER TABLE `tblmindmap_groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblmodules`
--
ALTER TABLE `tblmodules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tblnewsfeed_comment_likes`
--
ALTER TABLE `tblnewsfeed_comment_likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblnewsfeed_posts`
--
ALTER TABLE `tblnewsfeed_posts`
  MODIFY `postid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblnewsfeed_post_comments`
--
ALTER TABLE `tblnewsfeed_post_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblnewsfeed_post_likes`
--
ALTER TABLE `tblnewsfeed_post_likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblnotes`
--
ALTER TABLE `tblnotes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblnotifications`
--
ALTER TABLE `tblnotifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbloptions`
--
ALTER TABLE `tbloptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- AUTO_INCREMENT de la tabla `tblpayment_modes`
--
ALTER TABLE `tblpayment_modes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblpayroll_table`
--
ALTER TABLE `tblpayroll_table`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblpayroll_type`
--
ALTER TABLE `tblpayroll_type`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblpinned_projects`
--
ALTER TABLE `tblpinned_projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblprojectdiscussioncomments`
--
ALTER TABLE `tblprojectdiscussioncomments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblprojectdiscussions`
--
ALTER TABLE `tblprojectdiscussions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblprojects`
--
ALTER TABLE `tblprojects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblproject_activity`
--
ALTER TABLE `tblproject_activity`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblproject_files`
--
ALTER TABLE `tblproject_files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblproject_members`
--
ALTER TABLE `tblproject_members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblproject_notes`
--
ALTER TABLE `tblproject_notes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblproject_settings`
--
ALTER TABLE `tblproject_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblproposals`
--
ALTER TABLE `tblproposals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblproposal_comments`
--
ALTER TABLE `tblproposal_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblprovince_city`
--
ALTER TABLE `tblprovince_city`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblrelated_items`
--
ALTER TABLE `tblrelated_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblreminders`
--
ALTER TABLE `tblreminders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblrequest`
--
ALTER TABLE `tblrequest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblrequest_approval_details`
--
ALTER TABLE `tblrequest_approval_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblrequest_files`
--
ALTER TABLE `tblrequest_files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblrequest_follow`
--
ALTER TABLE `tblrequest_follow`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblrequest_form`
--
ALTER TABLE `tblrequest_form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblrequest_log`
--
ALTER TABLE `tblrequest_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblrequest_related`
--
ALTER TABLE `tblrequest_related`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblrequest_type`
--
ALTER TABLE `tblrequest_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblrequest_type_form`
--
ALTER TABLE `tblrequest_type_form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblrequest_type_workflow`
--
ALTER TABLE `tblrequest_type_workflow`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblroles`
--
ALTER TABLE `tblroles`
  MODIFY `roleid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblsalary_form`
--
ALTER TABLE `tblsalary_form`
  MODIFY `form_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblsales_activity`
--
ALTER TABLE `tblsales_activity`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblscheduled_emails`
--
ALTER TABLE `tblscheduled_emails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `serviceid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblspam_filters`
--
ALTER TABLE `tblspam_filters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `staffid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tblstaff_contract`
--
ALTER TABLE `tblstaff_contract`
  MODIFY `id_contract` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblstaff_contracttype`
--
ALTER TABLE `tblstaff_contracttype`
  MODIFY `id_contracttype` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblstaff_contract_detail`
--
ALTER TABLE `tblstaff_contract_detail`
  MODIFY `contract_detail_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblstaff_departments`
--
ALTER TABLE `tblstaff_departments`
  MODIFY `staffdepartmentid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblstaff_insurance`
--
ALTER TABLE `tblstaff_insurance`
  MODIFY `insurance_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblstaff_insurance_history`
--
ALTER TABLE `tblstaff_insurance_history`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblsubscriptions`
--
ALTER TABLE `tblsubscriptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblsurveyresultsets`
--
ALTER TABLE `tblsurveyresultsets`
  MODIFY `resultsetid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblsurveys`
--
ALTER TABLE `tblsurveys`
  MODIFY `surveyid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblsurveysemailsendcron`
--
ALTER TABLE `tblsurveysemailsendcron`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblsurveysendlog`
--
ALTER TABLE `tblsurveysendlog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltags`
--
ALTER TABLE `tbltags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltasks`
--
ALTER TABLE `tbltasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltaskstimers`
--
ALTER TABLE `tbltaskstimers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltasks_checklist_templates`
--
ALTER TABLE `tbltasks_checklist_templates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltask_assigned`
--
ALTER TABLE `tbltask_assigned`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltask_checklist_items`
--
ALTER TABLE `tbltask_checklist_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltask_comments`
--
ALTER TABLE `tbltask_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltask_followers`
--
ALTER TABLE `tbltask_followers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltaxes`
--
ALTER TABLE `tbltaxes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltemplates`
--
ALTER TABLE `tbltemplates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltickets`
--
ALTER TABLE `tbltickets`
  MODIFY `ticketid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltickets_pipe_log`
--
ALTER TABLE `tbltickets_pipe_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltickets_predefined_replies`
--
ALTER TABLE `tbltickets_predefined_replies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltickets_priorities`
--
ALTER TABLE `tbltickets_priorities`
  MODIFY `priorityid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbltickets_status`
--
ALTER TABLE `tbltickets_status`
  MODIFY `ticketstatusid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblticket_attachments`
--
ALTER TABLE `tblticket_attachments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblticket_replies`
--
ALTER TABLE `tblticket_replies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltodos`
--
ALTER TABLE `tbltodos`
  MODIFY `todoid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltracked_mails`
--
ALTER TABLE `tbltracked_mails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltwocheckout_log`
--
ALTER TABLE `tbltwocheckout_log`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbluser_meta`
--
ALTER TABLE `tbluser_meta`
  MODIFY `umeta_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblvault`
--
ALTER TABLE `tblvault`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblviews_tracking`
--
ALTER TABLE `tblviews_tracking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblweb_to_lead`
--
ALTER TABLE `tblweb_to_lead`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblworkplace`
--
ALTER TABLE `tblworkplace`
  MODIFY `workplace_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblwork_shift`
--
ALTER TABLE `tblwork_shift`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_apoderados`
--
ALTER TABLE `tbl_apoderados`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_boletines`
--
ALTER TABLE `tbl_boletines`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=631;

--
-- AUTO_INCREMENT de la tabla `tbl_correspondecia_usuario`
--
ALTER TABLE `tbl_correspondecia_usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_correspondencia_plantilla`
--
ALTER TABLE `tbl_correspondencia_plantilla`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_estado_expediente`
--
ALTER TABLE `tbl_estado_expediente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_busquedas`
--
ALTER TABLE `tbl_marcas_busquedas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_cambio_domicilio`
--
ALTER TABLE `tbl_marcas_cambio_domicilio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_cambio_nombre`
--
ALTER TABLE `tbl_marcas_cambio_nombre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_cambio_nombre_participantes`
--
ALTER TABLE `tbl_marcas_cambio_nombre_participantes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_cedentes_cesionarios`
--
ALTER TABLE `tbl_marcas_cedentes_cesionarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_cesiones`
--
ALTER TABLE `tbl_marcas_cesiones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_clases`
--
ALTER TABLE `tbl_marcas_clases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_clase_niza`
--
ALTER TABLE `tbl_marcas_clase_niza`
  MODIFY `clase_niza_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_domicilios`
--
ALTER TABLE `tbl_marcas_domicilios`
  MODIFY `domicilio_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_eventos`
--
ALTER TABLE `tbl_marcas_eventos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_fusion`
--
ALTER TABLE `tbl_marcas_fusion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_fusion_participantes`
--
ALTER TABLE `tbl_marcas_fusion_participantes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_licencia`
--
ALTER TABLE `tbl_marcas_licencia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_licenciantes`
--
ALTER TABLE `tbl_marcas_licenciantes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_prioridades`
--
ALTER TABLE `tbl_marcas_prioridades`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_publicaciones`
--
ALTER TABLE `tbl_marcas_publicaciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_solicitantes`
--
ALTER TABLE `tbl_marcas_solicitantes`
  MODIFY `mar_sol_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_solicitudes`
--
ALTER TABLE `tbl_marcas_solicitudes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_solicitudes_documentos`
--
ALTER TABLE `tbl_marcas_solicitudes_documentos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_solicitudes_paises`
--
ALTER TABLE `tbl_marcas_solicitudes_paises`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_tareas`
--
ALTER TABLE `tbl_marcas_tareas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_tipo_busqueda`
--
ALTER TABLE `tbl_marcas_tipo_busqueda`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas_tipo_registro`
--
ALTER TABLE `tbl_marcas_tipo_registro`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_materias`
--
ALTER TABLE `tbl_materias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_oficina`
--
ALTER TABLE `tbl_oficina`
  MODIFY `oficina_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_paises`
--
ALTER TABLE `tbl_paises`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT de la tabla `tbl_poderes`
--
ALTER TABLE `tbl_poderes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_propietarios`
--
ALTER TABLE `tbl_propietarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_propietarios_documentos`
--
ALTER TABLE `tbl_propietarios_documentos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_tipos_eventos`
--
ALTER TABLE `tbl_tipos_eventos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_tipos_tareas`
--
ALTER TABLE `tbl_tipos_tareas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_publicacion`
--
ALTER TABLE `tbl_tipo_publicacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_signo`
--
ALTER TABLE `tbl_tipo_signo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_solicitud`
--
ALTER TABLE `tbl_tipo_solicitud`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbltwocheckout_log`
--
ALTER TABLE `tbltwocheckout_log`
  ADD CONSTRAINT `tbltwocheckout_log_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `tblinvoices` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tbl_apoderados`
--
ALTER TABLE `tbl_apoderados`
  ADD CONSTRAINT `tbl_poderes_tbl_apoderados_fk` FOREIGN KEY (`poder_id`) REFERENCES `tbl_poderes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_boletines`
--
ALTER TABLE `tbl_boletines`
  ADD CONSTRAINT `tbl_paises_tbl_boletines_fk` FOREIGN KEY (`pais_id`) REFERENCES `tbl_paises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_correspondecia_usuario`
--
ALTER TABLE `tbl_correspondecia_usuario`
  ADD CONSTRAINT `tbl_corr_plant_corr_usu_fk` FOREIGN KEY (`plantilla_id`) REFERENCES `tbl_correspondencia_plantilla` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_correspondencia_plantilla`
--
ALTER TABLE `tbl_correspondencia_plantilla`
  ADD CONSTRAINT `tbl_mat_corr_plan_fk` FOREIGN KEY (`materia_id`) REFERENCES `tbl_materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_busquedas`
--
ALTER TABLE `tbl_marcas_busquedas`
  ADD CONSTRAINT `tbl_marcas_clase_niza_tbl_marcas_busq_fk` FOREIGN KEY (`clase_niza_id`) REFERENCES `tbl_marcas_clase_niza` (`clase_niza_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_marcas_tipo_bus_tbl_marcas_bus_fk` FOREIGN KEY (`busqueda_interna_id`) REFERENCES `tbl_marcas_tipo_busqueda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_marcas_tipo_bus_tbl_marcas_bus_fk1` FOREIGN KEY (`busqueda_externa_id`) REFERENCES `tbl_marcas_tipo_busqueda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_oficina_tbl_marcas_busquedas_fk` FOREIGN KEY (`oficina_id`) REFERENCES `tbl_oficina` (`oficina_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_paises_tbl_marcas_busquedas_fk` FOREIGN KEY (`pais_id`) REFERENCES `tbl_paises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_busquedas_documentos`
--
ALTER TABLE `tbl_marcas_busquedas_documentos`
  ADD CONSTRAINT `tbl_marcas_bus_tbl_mar_bus_doc_fk` FOREIGN KEY (`busquedas_id`) REFERENCES `tbl_marcas_busquedas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_cambio_domicilio`
--
ALTER TABLE `tbl_marcas_cambio_domicilio`
  ADD CONSTRAINT `tbl_est_exp_tbl_mar_cam_dom_fk` FOREIGN KEY (`estado_id`) REFERENCES `tbl_estado_expediente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_marcas_sol_tbl_marcas_cambio_dom_fk` FOREIGN KEY (`marcas_id`) REFERENCES `tbl_marcas_solicitudes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_of_mar_cam_dom_fk` FOREIGN KEY (`oficina_id`) REFERENCES `tbl_oficina` (`oficina_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_cambio_nombre`
--
ALTER TABLE `tbl_marcas_cambio_nombre`
  ADD CONSTRAINT `tbl_est_exp_tbl_mar_cam_nom_fk` FOREIGN KEY (`estado_id`) REFERENCES `tbl_estado_expediente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_marcas_sol_tbl_marcas_cambio_nombre_fk` FOREIGN KEY (`marcas_id`) REFERENCES `tbl_marcas_solicitudes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_ofi_mar_cam_nom_fk` FOREIGN KEY (`oficina_id`) REFERENCES `tbl_oficina` (`oficina_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_cambio_nombre_participantes`
--
ALTER TABLE `tbl_marcas_cambio_nombre_participantes`
  ADD CONSTRAINT `tbl_marcas_cam_nom_tbl_marcas_cam_nom_part_fk` FOREIGN KEY (`cambio_nombre_id`) REFERENCES `tbl_marcas_cambio_nombre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_prop_tbl_mar_cam_nom_part_fk` FOREIGN KEY (`propietario_id`) REFERENCES `tbl_propietarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_cedentes_cesionarios`
--
ALTER TABLE `tbl_marcas_cedentes_cesionarios`
  ADD CONSTRAINT `tbl_marcas_ces_tbl_marcas_ced_ces_fk` FOREIGN KEY (`cesion_id`) REFERENCES `tbl_marcas_cesiones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_cesiones`
--
ALTER TABLE `tbl_marcas_cesiones`
  ADD CONSTRAINT `tbl_estado_expediente_tbl_marcas_cesiones_fk` FOREIGN KEY (`estado_id`) REFERENCES `tbl_estado_expediente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_marcas_sol_tbl_marcas_cesiones_fk` FOREIGN KEY (`marcas_id`) REFERENCES `tbl_marcas_solicitudes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_oficina_tbl_marcas_cesiones_fk` FOREIGN KEY (`oficina_id`) REFERENCES `tbl_oficina` (`oficina_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_clases`
--
ALTER TABLE `tbl_marcas_clases`
  ADD CONSTRAINT `tbl_marcas_clase_niza_tbl_marcas_clases_fk` FOREIGN KEY (`clase_id`) REFERENCES `tbl_marcas_clase_niza` (`clase_niza_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_marcas_sol_tbl_marcas_clases_fk` FOREIGN KEY (`marcas_id`) REFERENCES `tbl_marcas_solicitudes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_domicilios`
--
ALTER TABLE `tbl_marcas_domicilios`
  ADD CONSTRAINT `tbl_marcas_cambio_domicilio_tbl_marcas_domicilios_fk` FOREIGN KEY (`cambio_domicilio_id`) REFERENCES `tbl_marcas_cambio_domicilio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_propietarios_tbl_marcas_domicilios_fk` FOREIGN KEY (`propietario_id`) REFERENCES `tbl_propietarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_eventos`
--
ALTER TABLE `tbl_marcas_eventos`
  ADD CONSTRAINT `tbl_marcas_sol_tbl_marcas_eventos_fk` FOREIGN KEY (`marcas_id`) REFERENCES `tbl_marcas_solicitudes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_tipos_eve_mar_even_fk` FOREIGN KEY (`tipo_evento_id`) REFERENCES `tbl_tipos_eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_fusion`
--
ALTER TABLE `tbl_marcas_fusion`
  ADD CONSTRAINT `tbl_estado_expediente_tbl_marcas_fusion_fk` FOREIGN KEY (`estado_id`) REFERENCES `tbl_estado_expediente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_marcas_sol_tbl_marcas_fusion_fk` FOREIGN KEY (`marcas_id`) REFERENCES `tbl_marcas_solicitudes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_oficina_tbl_marcas_fusion_fk` FOREIGN KEY (`oficina_id`) REFERENCES `tbl_oficina` (`oficina_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_fusion_participantes`
--
ALTER TABLE `tbl_marcas_fusion_participantes`
  ADD CONSTRAINT `tbl_marcas_fusion_tbl_marcas_fusion_part_fk` FOREIGN KEY (`fusion_id`) REFERENCES `tbl_marcas_fusion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_propietarios_tbl_mar_fus_part_fk` FOREIGN KEY (`propietario_id`) REFERENCES `tbl_propietarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_licencia`
--
ALTER TABLE `tbl_marcas_licencia`
  ADD CONSTRAINT `tbl_estado_expediente_tbl_marcas_licencia_fk` FOREIGN KEY (`estado_id`) REFERENCES `tbl_estado_expediente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_marcas_sol_tbl_marcas_licencia_fk` FOREIGN KEY (`marcas_id`) REFERENCES `tbl_marcas_solicitudes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_oficina_tbl_marcas_licencia_fk` FOREIGN KEY (`oficina_id`) REFERENCES `tbl_oficina` (`oficina_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_licenciantes`
--
ALTER TABLE `tbl_marcas_licenciantes`
  ADD CONSTRAINT `tbl_marcas_licencia_tbl_marcas_lic_fk` FOREIGN KEY (`licencia_id`) REFERENCES `tbl_marcas_licencia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_propietarios_tbl_marcas_lic_fk` FOREIGN KEY (`propietario_id`) REFERENCES `tbl_propietarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_prioridades`
--
ALTER TABLE `tbl_marcas_prioridades`
  ADD CONSTRAINT `tbl_marcas_sol_tbl_marcas_prioridades_fk` FOREIGN KEY (`marcas_id`) REFERENCES `tbl_marcas_solicitudes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_paises_tbl_marcas_prioridades_fk` FOREIGN KEY (`pais_id`) REFERENCES `tbl_paises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_publicaciones`
--
ALTER TABLE `tbl_marcas_publicaciones`
  ADD CONSTRAINT `tbl_boletines_tbl_marcas_pub_fk` FOREIGN KEY (`boletin_id`) REFERENCES `tbl_boletines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_marcas_solicitudes_tbl_marcas_publicaciones_fk` FOREIGN KEY (`marcas_id`) REFERENCES `tbl_marcas_solicitudes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_tipo_pub_tbl_marcas_pub_fk` FOREIGN KEY (`tipo_pub_id`) REFERENCES `tbl_tipo_publicacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_solicitantes`
--
ALTER TABLE `tbl_marcas_solicitantes`
  ADD CONSTRAINT `tbl_marcas_sol_tbl_marcas_sol_fk` FOREIGN KEY (`marcas_id`) REFERENCES `tbl_marcas_solicitudes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_solicitudes`
--
ALTER TABLE `tbl_marcas_solicitudes`
  ADD CONSTRAINT `tbl_estados_tbl_marcas_solicitudes_fk` FOREIGN KEY (`estado_id`) REFERENCES `tbl_estado_expediente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_mar_tipo_reg_mar_sol_fk` FOREIGN KEY (`tipo_registro_id`) REFERENCES `tbl_marcas_tipo_registro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_oficina_tbl_marcas_solicitudes_fk` FOREIGN KEY (`oficina_id`) REFERENCES `tbl_oficina` (`oficina_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_tipo_signo_mar_sol_fk` FOREIGN KEY (`tipo_signo_id`) REFERENCES `tbl_tipo_signo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_tipo_sol_mar_sol_fk` FOREIGN KEY (`tipo_solicitud_id`) REFERENCES `tbl_tipo_solicitud` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_solicitudes_documentos`
--
ALTER TABLE `tbl_marcas_solicitudes_documentos`
  ADD CONSTRAINT `tbl_marcas_sol_tbl_marcas_sol_doc_fk` FOREIGN KEY (`marcas_id`) REFERENCES `tbl_marcas_solicitudes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_solicitudes_paises`
--
ALTER TABLE `tbl_marcas_solicitudes_paises`
  ADD CONSTRAINT `tbl_marcas_sol_tbl_marcas_sol_paises_fk` FOREIGN KEY (`marcas_id`) REFERENCES `tbl_marcas_solicitudes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_paises_tbl_marcas_sol_pai_fk` FOREIGN KEY (`pais_id`) REFERENCES `tbl_paises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_marcas_tareas`
--
ALTER TABLE `tbl_marcas_tareas`
  ADD CONSTRAINT `tbl_marcas_sol_tbl_marcas_tareas_fk` FOREIGN KEY (`marcas_id`) REFERENCES `tbl_marcas_solicitudes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_tipos_tareas_tbl_marcas_tareas_fk` FOREIGN KEY (`tipo_tareas_id`) REFERENCES `tbl_tipos_tareas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_poderes`
--
ALTER TABLE `tbl_poderes`
  ADD CONSTRAINT `tbl_propietarios_tbl_poderes_fk` FOREIGN KEY (`propietario_id`) REFERENCES `tbl_propietarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_propietarios`
--
ALTER TABLE `tbl_propietarios`
  ADD CONSTRAINT `tbl_paises_tbl_propietarios_fk` FOREIGN KEY (`pais_id`) REFERENCES `tbl_paises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_propietarios_documentos`
--
ALTER TABLE `tbl_propietarios_documentos`
  ADD CONSTRAINT `tbl_propietarios_tbl_prop_doc_fk` FOREIGN KEY (`propietario_id`) REFERENCES `tbl_propietarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_tipos_eventos`
--
ALTER TABLE `tbl_tipos_eventos`
  ADD CONSTRAINT `tbl_materias_tbl_tipos_eventos_fk` FOREIGN KEY (`materia_id`) REFERENCES `tbl_materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
