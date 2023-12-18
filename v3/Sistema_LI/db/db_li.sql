-- phpMyAdmin SQL Dump
-- version 5.1.1db_li
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-04-2023 a las 23:09:30
-- Versión del servidor: 10.5.12-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u863666022_db_li`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administratives`
--

CREATE TABLE `administratives` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `cedula` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `carrer` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `sede` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `celular` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `administratives`
--

INSERT INTO `administratives` (`user`, `name`, `surnames`, `date_of_birth`, `cedula`, `id`, `carrer`, `sede`, `email`, `celular`, `pass`, `created_at`, `updated_at`) VALUES
('admin', 'Andres', 'Carrera', '2000-12-23', '1700000000', 'L00000000', 'ITIN-LINEA', 'matriz', 'maycol23@outlook.es', '0900000000', 'root2364', '2021-12-05 18:27:39', '2023-04-03 10:47:33'),
('admin-5324b', 'Melany Jailin', 'Falcon Fuentes', '2001-05-10', '1753846474', 'L00410735', 'CONADT', 'latacunga', 'jailin1606@gmail.com', '0987077331', 'Mfalcon3', '2023-04-03 10:46:55', NULL),
('admin-7cbda', 'Prueba', 'Test', '2023-04-01', '0000000000', 'L00000000', 'ITIN-LINEA', 'matriz', 'prueba@espe.edu.ec', '0900000000', 'prueba11', '2023-04-04 11:31:29', '2023-04-04 11:38:20'),
('admin-d7946', 'Angie Cristina', 'Moya Peñarrieta', '2002-10-01', '1727954594', 'L00411442', 'ADMDEMP', 'matriz', 'cristina-moya02@hotmail.com', '0983012687', 'Ashmoya1', '2023-04-03 10:44:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attendance`
--

CREATE TABLE `attendance` (
  `id_attendance` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_group` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `subject` varchar(400) COLLATE utf8_spanish2_ci NOT NULL,
  `user_teacher` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `registered` date NOT NULL,
  `update_registered` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `attendance`
--

INSERT INTO `attendance` (`id_attendance`, `id_group`, `school_period`, `semester`, `subject`, `user_teacher`, `registered`, `update_registered`) VALUES
('xfs980s', 'ADMIN_1205', '2021-1', 1, 'CAL_DIF_01', 'teacher', '2021-03-09', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attendance_details`
--

CREATE TABLE `attendance_details` (
  `id_attendance` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_group` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `subject` varchar(400) COLLATE utf8_spanish2_ci NOT NULL,
  `user_teacher` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `registered` date NOT NULL,
  `update_registered` date DEFAULT NULL,
  `user_student` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `attend` int(1) NOT NULL DEFAULT 0,
  `tardiness` int(1) NOT NULL DEFAULT 0,
  `absent` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `careers`
--

CREATE TABLE `careers` (
  `career` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `careers`
--

INSERT INTO `careers` (`career`, `name`, `description`) VALUES
('ADMDEMP', 'Administración de empresas', 'La carrera de Administración de Empresas estudia el proceso administrativo en todas sus fases, apoyado en la teoría administrativa que permite comprender el origen, funcionamiento, naturaleza y cambio de las organizaciones, tanto en su estructura humana, como en la gestión de los recursos financieros y materiales, bajo el cual operan las unidades productivas, los medios, canales y mecanismos a través de los cuales se distribuyen los productos o servicios, así como también la metodología que permite desarrollar a través de la investigación nuevas formas de mejorar la productividad.'),
('COMEX', 'Comercio exterior', 'La carrera está orientado a los procesos y estrategias para la internacionalización de productos, servicios y empresas, aplicando la normativa nacional y mundial a través de competencias de innovación y gestión empresarial, que faciliten el intercambio con otros países de manera eficiente, eficaz y efectiva de acuerdo a las tendencias y necesidades del mundo globalizado.'),
('CONADT', 'Contabilidad y auditoria ', 'En la carrera de Contabilidad y Auditoría está enfocada a la normativa y procedimientos para reconocer, medir y presentar las actividades económicas de las empresas y organizaciones y su validación, a través de procesos de auditoría a los estados financieros.\r\n\r\n'),
('ISOFT', 'Ingeniería de Software', 'Esta carrera estudia las fases del proceso de desarrollo de software, con un enfoque sistémico y cuantificable, que integre los componentes teóricos, metodológico y buenas prácticas del desarrollo software; mediante la aplicación de: lenguajes de programación, métodos, técnicas, herramientas, normas y estándares; con el propósito de construir software de calidad que proporcione soluciones a las necesidades de los contextos de los diferentes sectores socioeconómicos, productivos y tecnológicos.'),
('ITIN', 'Ingeniería en Tecnologías de la Información - Presencial', 'Esta carrera incluye en su formación académica, el desarrollo de: entornos web, aplicaciones móviles, sistemas inteligentes y software en general; así como también la gestión de: bases de datos, seguridades informáticas, infraestructuras de TI, redes de comunicaciones y servicios telemáticos.'),
('ITIN-LINEA', 'Ingeniería en Tecnologías de la Información - Línea', 'Esta carrera incluye en su formación académica, el desarrollo de: entornos web, aplicaciones móviles, sistemas inteligentes y software en general; así como también la gestión de: bases de datos, seguridades informáticas, infraestructuras de TI, redes de comunicaciones y servicios telemáticos.'),
('MCT', 'Mercadotecnia', 'Mercadotecnia imparte conocimientos sobre la Gestión Estratégica de las actividades de mercadotecnia de las empresas en relación al mercado con fundamento en principios éticos y en atención a las normas de calidad vigentes.'),
('TSMO', 'Turismo - En línea', 'Administra los recursos organizacionales de manera óptima con parámetros de calidad, en concordancia con la normativa jurídica nacional, favoreciendo procesos de desarrollo turístico y hotelero, gestiona sistemas de comercialización, comunicación y logística del portafolio de productos de las empresas turísticas y hoteleras.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emprendedor`
--

CREATE TABLE `emprendedor` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedula` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `emprendedor`
--

INSERT INTO `emprendedor` (`user`, `name`, `surnames`, `date_of_birth`, `gender`, `cedula`, `pass`, `phone`, `address`, `email`, `created_at`, `updated_at`) VALUES
('empre', 'Usuario', 'Emprendedor', '2000-03-17', 'hombre', '1711111111', 'empre123', '0988888888', 'Ecuatoriana', 'emprendedor@espe.edu.ec', '2021-05-01 00:00:00', '2023-03-31 11:06:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infoq`
--

CREATE TABLE `infoq` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `num` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `archivo` blob NOT NULL,
  `description` text COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `infoq`
--

INSERT INTO `infoq` (`user`, `num`, `archivo`, `description`, `created_at`, `updated_at`) VALUES
('stdt-dd28c', 'Q-e9658', 0x303120496e666f726d65205175696e63656e616c5f4a6172616d696c6c6f2053616c6761646f205269636172646f20416c656a616e64726f2e706466, 'levantamiento', '2023-03-30 23:13:29', '2023-03-30 23:13:29'),
('stdt-dd28c', 'Q-9fffe', 0x303320496e666f726d65205175696e63656e616c5f4a6172616d696c6c6f2053616c6761646f205269636172646f20416c656a616e64726f2e706466, 'test1', '2023-04-04 11:53:42', '2023-04-04 11:53:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `school_periods`
--

CREATE TABLE `school_periods` (
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `active` int(1) NOT NULL,
  `current` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `school_periods`
--

INSERT INTO `school_periods` (`school_period`, `name`, `start_date`, `end_date`, `active`, `current`, `created_at`, `updated_at`) VALUES
('2022-SI', 'Enero - Abril 2022', '2022-01-03', '2022-04-26', 1, 1, '2022-01-05 05:37:49', '2022-03-13 03:27:59'),
('2022-SII', 'Abril - Julio 2022', '2022-04-27', '2022-07-08', 1, 0, '2022-04-03 05:30:20', '2022-04-03 06:10:09'),
('2023-SI', 'Enero - Abril 2023', '2023-01-06', '2023-04-09', 1, 0, '2023-12-04 00:57:04', '2023-02-04 06:15:56'),
('2023-SII', 'Abril - Julio 2023', '2023-04-30', '2023-07-23', 1, 0, '2023-10-08 20:38:04', '2023-02-04 06:14:40'),
('2023-SIII', 'Septiembre - Diciembre 2023', '2023-08-30', '2023-12-14', 1, 0, '2023-12-04 00:59:21', '2023-03-13 04:02:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sede` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedula` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `id` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `career` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `horas` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `asistencia` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `horario` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `documentation` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `jerarquia` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `jornada` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `admission_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`user`, `name`, `surnames`, `email`, `date_of_birth`, `sede`, `cedula`, `pass`, `id`, `phone`, `address`, `career`, `horas`, `asistencia`, `horario`, `documentation`, `estado`, `departamento`, `jerarquia`, `jornada`, `admission_date`, `created_at`, `updated_at`) VALUES
('stdt-04b2c', 'Diego Sebastian', 'Chancusig Simbaña', 'dschancusig@espe.edu.ec', '2023-04-04', 'latacunga', '0550650188', 'Ds123456', 'L00410913', '0980000000', 'No especificado', 'ISOFT', '79', '2023-02-08 , 2023-02-09 , 2023-02-10 , 2023-02-13 , 2023-02-14 , 2023-02-15 , 2023-02-16 , 2023-02-17 , 2023-02-27 , 2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', 'SOFTWARE - DESARROLLO PÁGINA WEB PROWESS AGRÍCOLA', 'LIDER', 'Vespertino', '2023-02-08', '2023-04-04 09:59:28', '2023-04-05 09:53:22'),
('stdt-04dcf', 'Luis Miguel', 'Llumiquinga', 'lmllumiquinga3@espe.edu.ec', '1989-01-04', 'matriz', '1715893101', 'lm123456', 'L00403184', '0990000000', 'Barrio Fajardo Calle Quitus #262', 'ITIN', '60', '2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03 , 2023-04-04 , 2023-04-05', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'LEVANTAMIENTO DE INFORMACIÓN', 'APOYO1', 'Vespertino', '2023-03-08', '2023-04-03 14:17:01', '2023-04-05 10:31:51'),
('stdt-05bb9', 'Carelis Polet', 'Casa Torres', 'cpcasa1@espe.edu.ec', '2023-04-04', 'latacunga', '1726304668', 'Cp545310', 'L00399417', '0980000000', 'No especificado', 'CONADT', '67', '2023-02-24 , 2023-02-27 , 2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', 'CONTABILIDAD Y AUDITORIA MAÑANA', 'APOYO1', 'Vespertino', '2023-02-24', '2023-04-04 11:22:22', '2023-04-05 10:05:13'),
('stdt-08889', 'Maria Jose', 'Juiña Quingalombo', 'mjjuina@espe.edu.ec', '2040-01-01', 'matriz', '1753676459', 'MJ398719', 'L00074004', '0000000000', 'SN', 'MCT', '39', '2023-04-05', '09:00-12:00', 'REPROBADO', 'activo', 'CREACIÓN DE CONTENIDO', 'APOYO8', 'Matutino', '2023-03-16', '2023-04-05 11:07:55', NULL),
('stdt-139e7', 'Brandon Xavier', 'Saltos Cardenas', 'bxsaltos@espe.edu.ec', '0001-01-01', 'matriz', '1717773467', 'bx123456', 'L00391024', '0990000000', 'Av. La prueba', 'ITIN', '0', '2023-03-09', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'INVESTIGACIÓN', 'APOYO1', 'Vespertino', '2023-04-03', '2023-04-03 11:25:05', NULL),
('stdt-13e87', 'Anderson Jair', 'Chasiloa Ñacata', 'ajchasiloa@espe.edu.ec', '2023-04-05', 'latacunga', '1727869172', 'AJ561651', 'L00399447', '0900000000', 'S/N', 'ISOFT', '80', '26-01-2023', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS EC PÁGINA WEB VENTAS', 'APOYO1', 'Vespertino', '2023-01-26', '2023-04-05 09:23:14', NULL),
('stdt-14631', 'Karen Elizabeth', 'Guallichico Gualotuña', 'keguallichico@espe.edu.ec', '2002-11-20', 'matriz', '1727686931', 'ke686931', 'L00144137', '0980113202', 'Av. la prueba', 'ADMDEMP', '9', '2023-04-04 , 2023-04-05 , 2023-04-06', '', 'REPROBADO', 'activo', 'INVESTIGACIÓN', 'APOYO1', 'Matutino', '2023-04-04', '2023-04-06 11:22:11', NULL),
('stdt-1f204', 'Lenin Andres', 'Vilca Caiza', 'lavilca@espe.edu.ec', '2002-02-12', 'matriz', '1754276754', 'la276754', 'L00063833', '0980568083', 'Av. la prueba', 'CONADT', '12', '2023-03-31 , 2023-04-03 , 2023-03-29 , 2023-03-30', '', 'REPROBADO', 'activo', 'ADMINISTRACION I', 'APOYO1', 'Matutino', '2023-03-29', '2023-04-03 11:49:26', '2023-04-03 18:54:47'),
('stdt-22698', 'Kevin Xavier', 'Pila Padilla', 'kjpila@espe.edu.ec', '2023-01-03', 'matriz', '0504270968', 'KX893216', 'L00411289', '0900000000', 'Desconocido', 'COMEX', '3', '2023-03-10', '09:00-12:00', 'REPROBADO', 'activo', 'PROWESS VENTAS', 'APOYO1', 'Matutino', '2023-03-10', '2023-04-04 10:36:03', NULL),
('stdt-22ff2', 'Nathalia Lissette', 'Jimenez Villegas', 'nljimenez2@espe.edu.ec', '2000-07-10', 'matriz', '1727836239', 'nl836239', 'L00386885', '0981181826', 'Av. la prueba', 'MCT', '15', '2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '', 'REPROBADO', 'activo', '', 'APOYO1', 'Matutino', '2023-03-28', '2023-04-03 11:45:17', '2023-04-03 18:51:52'),
('stdt-2bf11', 'Andres Vinicio', 'Pallango Tapia', 'avpallango@espe.edu.ec', '0001-01-01', 'matriz', '0550401962', 'Av587845', 'L00387198', '0900000000', 'Av.La Prueba', 'ISOFT', '52', '09/03/2023	10/03/2023	13/03/2023	14/03/2023	15/03/2023	16/03/2023	17/03/2023	20/03/2023	21/03/2023	22/03/2023	23/03/2023	24/03/2023	27/03/2023	28/03/2023	29/03/2023	30/03/2023	31/03/2023	03/04/2023	04/04/2023	05/04/2023	06/04/2023', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS EC PÁGINA WEB VENTAS', 'APOYO1', 'Vespertino', '2023-03-09', '2023-04-03 11:25:03', '2023-04-06 10:47:04'),
('stdt-2c519', 'Melanny Alejandra', 'Rodriguez Villacres', 'marodriguez34@espe.edu.ec', '2001-09-14', 'matriz', '1751031343', 'MA111111', 'L00411480', '0900000000', 'S/N', 'MCT', '0', '2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-04-03 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-02-27 , 2023-03-24', '09:00-12:00', 'REPROBADO', 'activo', 'PROWESS VENTAS', 'APOYO1', 'Matutino', '2023-02-24', '2023-04-03 12:02:03', '2023-04-03 16:55:14'),
('stdt-33111', 'Jherico Aaron', 'Cardenas Yepez', 'jacardenas16@espe.edu.ec', '2001-10-14', 'matriz', '1726414889', 'aj414889', 'L00405084', '0962826786', 'Av. la prueba', 'COMEX', '9', '2023-04-04 , 2023-04-05 , 2023-04-06', '', 'REPROBADO', 'activo', 'INVESTIGACIÓN', 'APOYO1', 'Matutino', '2023-04-04', '2023-04-06 11:24:13', NULL),
('stdt-35655', 'Hernand David', 'Salazar Silva', 'hdsalazar2@espe.edu.ec', '2023-04-03', 'matriz', '1721753026', 'HD223467', 'L00411328', '0900000000', 'Desconocido', 'MCT', '33', '2023-03-03', '09:00-12:00', 'REPROBADO', 'activo', '', 'APOYO1', 'Matutino', '2023-03-03', '2023-04-03 11:26:36', '2023-04-04 11:01:25'),
('stdt-3919a', 'Samantha Nicole', 'Loachamin Toapanta', 'snloachamin@espe.edu.ec', '2023-04-05', 'matriz', '1723474308', 'SN567889', 'L00071150', '0900000000', 'Desconocido', 'MCT', '3', '', '', 'REPROBADO', 'activo', 'INVESTIGACIÓN', 'APOYO1', 'Matutino', '2023-03-08', '2023-04-04 10:01:24', NULL),
('stdt-39ddf', 'Francisco Javier', 'Gallegos Vilatuña', 'fjgallegos2@espe.edu.ec', '0001-01-01', 'matriz', '1725853533', 'FJ111111', 'L00375489', '0900000000', 'SN', 'COMEX', '0', '2023-02-13 , 2023-02-14 , 2023-02-15 , 2023-02-17 , 2023-02-23 , 2023-02-24 , 2023-02-27 , 2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', 'INVESTIGACIÓN', 'COLIDER', 'Matutino', '2023-02-13', '2023-04-03 11:47:01', '2023-04-04 10:45:18'),
('stdt-3b86c', 'Christopher Jossue', 'Rodriguez Ortiz', 'cjrodriguez5@espe.edu.ec', '2001-04-04', 'matriz', '1751510908', 'cj510908', 'L00405178', '0988461771', 'Av. la prueba', 'CONADT', '12', '2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '', 'REPROBADO', 'activo', 'ADMINISTRACION I', 'APOYO1', 'Matutino', '2023-03-29', '2023-04-03 18:59:35', NULL),
('stdt-3cd3c', 'Melanie Jajaira', 'Vega Mendieta', 'mjvega5@espe.edu.ec', '2002-04-25', 'matriz', '1725408262', 'MJ111111', 'L00411377', '0900000000', 'S/N', 'CONADT', '0', '2023-04-03 , 2023-03-31 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30', '09:00-12:00', 'REPROBADO', 'activo', 'ADMINISTRACION II', 'APOYO1', 'Matutino', '2023-03-02', '2023-04-03 15:33:01', '2023-04-03 17:01:36'),
('stdt-3e76a', 'Mateo Gabriel', 'Segovia Caceres', 'mgsegovia2@espe.edu.ec', '2023-01-25', 'matriz', '1755421565', 'MG638614', 'L00411615', '0900000000', 'Desconocido', 'MCT', '3', '2023-03-13', '09:00-12:00', 'REPROBADO', 'activo', 'MARKETING', 'APOYO1', 'Matutino', '2023-03-13', '2023-04-04 10:57:58', NULL),
('stdt-3eb51', 'Alison Paola', 'Moncayo Achilchisa', 'apmoncayo2@espe.edu.ec', '2023-04-04', 'latacunga', '1726429234', 'Ap201456', 'L00412085', '0980000000', 'No especificado', 'ITIN', '72', '2023-02-22 , 2023-02-23 , 2023-02-24 , 2023-02-27 , 2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS EC PÁGINA WEB VENTAS', 'LIDER', 'Vespertino', '2023-02-22', '2023-04-04 10:54:39', '2023-04-05 10:02:16'),
('stdt-3f4bd', 'Wilson Antonio', 'Orellana Montesdeoca', 'waorellana@espe.edu.ec', '0001-01-01', 'matriz', '0803832245', 'wa123456', 'L00390883', '0990000000', 'av prueba', 'ITIN-LINEA', '0', '', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'INVESTIGACIÓN', 'APOYO1', 'Vespertino', '2023-04-03', '2023-04-03 11:47:12', NULL),
('stdt-43506', 'Silvia Liliana', 'Yunga Quichimbo', 'slyunga@espe.edu.ec', '1995-10-13', 'matriz', '0104999016', 'YQ865535', 'L00392809', '0979086011', 'Cuenca', 'ITIN-LINEA', '48', '2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03 , 2023-04-04 , 2023-03-23 , 2023-04-05 , 2023-04-06 , 2023-04-10 , 2023-04-11 , 2023-04-12 , 2023-04-13 , 2023-04-14', '09:00-12:00', 'REPROBADO', 'activo', 'LEVANTAMIENTO DE INFORMACIÓN', 'APOYO1', 'Vespertino', '2023-03-24', '2023-03-30 12:04:59', '2023-04-14 10:58:24'),
('stdt-4442d', 'Franklin Joel', 'Sasig Abrajan', 'fjsasig@espe.edu.ec', '0001-01-01', 'latacunga', '0550512966', 'fjsasig5', 'L00410891', '0900000000', 'S-N', 'ISOFT', '30', '21-03-2023', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS EC PÁGINA WEB VENTAS', 'APOYO1', 'Matutino', '2023-03-21', '2023-04-04 09:49:10', NULL),
('stdt-44904', 'Katerin Tatiana', 'Heredia Tapia', 'ktheredia@espe.edu.ec', '2023-04-04', 'latacunga', '0550325419', 'KT056144', 'L00082046', '0900000000', 'S/n', 'CONADT', '89', '06-01-2023', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS EC PÁGINA WEB VENTAS', 'APOYO1', 'Vespertino', '2023-01-06', '2023-04-04 11:09:45', NULL),
('stdt-46f69', 'Jennifer Lizbeth', 'Deker Moran', 'jldeker@espe.edu.ec', '0001-01-01', 'latacunga', '5505098220', 'jl123456', 'L00410661', '0990000000', 'Av. prueba', 'CONADT', '0', '2023-04-03', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'INVESTIGACIÓN', 'APOYO1', 'Vespertino', '2023-04-03', '2023-04-03 11:32:29', NULL),
('stdt-494c5', 'Michael Andres', 'Espinosa Carrera', 'maespinosa10@espe.edu.ec', '2020-12-23', 'matriz', '1752694917', 'Ma201547', 'L00391400', '0983022010', 'Las Canteras SS', 'ITIN-LINEA', '90', '2023-02-07 , 2023-02-08 , 2023-02-09 , 2023-02-13 , 2023-02-14 , 2023-02-15 , 2023-02-16 , 2023-02-17 , 2023-02-22 , 2023-02-23 , 2023-02-24 , 2023-02-27 , 2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', 'LEVANTAMIENTO DE INFORMACIÓN', 'LIDER', 'Vespertino', '2023-02-07', '2023-04-04 10:43:27', '2023-04-12 11:17:00'),
('stdt-49518', 'Erick Gabriel', 'Maldonado Miranda', 'egmaldonado1@espe.edu.ec', '2023-04-04', 'matriz', '1722349014', 'Eg235468', 'L00391122', '0980000000', 'No registrado', 'ITIN-LINEA', '70', '2023-02-24 , 2023-02-27 , 2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', 'SOFTWARE - DESARROLLO PÁGINA WEB PROWESS AGRÍCOLA', 'APOYO1', 'Vespertino', '2023-02-24', '2023-04-04 11:06:29', '2023-04-05 10:03:46'),
('stdt-4a139', 'Ahsly Shiomara', 'Sevilla Zambrano', 'assevilla@espe.edu.ec', '0001-01-01', 'matriz', '1750458265', 'AS111111', 'L00079514', '0900000000', 'S/N', 'CONADT', '0', '2023-02-15 , 2023-02-16 , 2023-02-17 , 2023-02-22 , 2023-02-23 , 2023-02-24 , 2023-02-27 , 2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', 'CREACIÓN DE CONTENIDO', 'LIDER', 'Matutino', '2023-02-15', '2023-04-03 11:54:39', '2023-04-04 10:47:04'),
('stdt-4a206', 'Fernanda Anahi', 'Flores Calle', 'faflorez3@espe.edu.ec', '1998-11-07', 'matriz', '1727369629', 'fa369629', 'L00390529', '0964004782', 'Av. la prueba', 'ADMDEMP', '6', '2023-04-03 , 2023-04-04', '', 'REPROBADO', 'activo', '', 'APOYO1', 'Matutino', '2023-04-03', '2023-04-03 19:19:19', '2023-04-04 10:47:48'),
('stdt-4d25b', 'Lesly Katerine', 'Tituaña Muñoz', 'lktituana@espe.edu.ec', '2001-09-26', 'matriz', '1726649195', 'LK111111', 'L00405094', '0900000000', 'SN', 'COMEX', '0', '2022-08-26', '09:00-12:00', 'REPROBADO', 'activo', 'ADMINISTRACION II', 'LIDER', 'Matutino', '2023-02-07', '2023-04-03 11:31:35', '2023-04-04 10:42:33'),
('stdt-51c25', 'Angely Mishelth', 'Poma Vera', 'ampoma1@espe.edu.ec', '2003-03-06', 'matriz', '2100831565', 'AP091284', 'L00411649', '0000000000', 'SN', 'CONADT', '39', '2023-04-05', '09:00-12:00', 'REPROBADO', 'activo', 'ADMINISTRACION II', 'APOYO2', 'Matutino', '2023-03-16', '2023-04-05 11:25:45', NULL),
('stdt-531a8', 'Bryan Steven J', 'Cardenas Auquilla', 'bscardenas@espe.edu.ec', '2023-04-04', 'matriz', '1600894560', 'BS516561', 'L00390978', '0900000000', 'La merced Pastaza', 'ITIN-LINEA', '133', '2022-12-19 , 2023-04-12', '09:00-12:00 , 16:00-18:00', 'APROBADO', 'activo', 'LEVANTAMIENTO DE INFORMACIÓN', 'COLIDER', 'Vespertino', '2022-12-19', '2023-04-04 10:45:33', '2023-04-12 11:05:30'),
('stdt-53fa6', 'Jhon Stiven', 'Chasi Llamba', 'jschasi@espe.edu.ec', '2023-04-04', 'latacunga', '0550083893', 'JS652654', 'L00410856', '0900000000', 'S/N', 'MCT', '90', '26-01-2023', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS EC PÁGINA WEB VENTAS', 'APOYO1', 'Vespertino', '2023-01-26', '2023-04-04 11:38:22', NULL),
('stdt-54621', 'Armando Rafael', 'Fonseca Zurita', 'arfonseca1@espe.edu.ec', '0001-01-01', 'matriz', '1727683656', 'afr02542', 'L00080106', '0900000000', 'S-N', 'ITIN-LINEA', '15', '31-03-2023 , 2023-04-03 , 2023-04-04 , 2023-04-05 , 2023-04-06', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'MODULO CURSOS MOCC', 'APOYO1', 'Vespertino', '2023-03-31', '2023-04-06 10:41:15', NULL),
('stdt-55c24', 'Evelin Shecely', 'Santafe Condor', 'essantafe@espe.edu.ec', '0001-01-01', 'latacunga', '0503681207', 'essatfe1', 'L00376714', '0900000000', 'Av.La Prueba', 'CONADT', '48', '13-03-2023', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'CONTABILIDAD Y AUDITORIA MAÑANA', 'APOYO1', 'Matutino', '2023-03-13', '2023-04-03 11:54:10', NULL),
('stdt-5972f', 'Domenica Rafaela', 'Betancourt Gonzalez', 'drbetancourt@espe.edu.ec', '2000-05-31', 'matriz', '1724981301', 'dr981301', 'L00417666', '0962808749', 'Av. la prueba', 'COMEX', '3', '2023-04-03', '', 'REPROBADO', 'activo', 'CREACIÓN DE CONTENIDO', 'APOYO2', 'Matutino', '2023-04-03', '2023-04-03 19:16:23', NULL),
('stdt-59bd9', 'Kerly Yomira', 'Briones Ullon', 'kybriones@espe.edu.ec', '0001-01-01', 'matriz', '1207108430', 'ky123456', 'L00397871', '0990000000', 'av prueba', 'ITIN', '0', '2023-04-03', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'INVESTIGACIÓN', 'APOYO1', 'Vespertino', '2023-04-03', '2023-04-03 14:20:55', NULL),
('stdt-5ef66', 'Emilly Samantha', 'Chavez Vera', 'eschavez2@espe.edu.ec', '2002-10-21', 'matriz', '1754321261', 'EC801294', 'L00411566', '0000000000', 'SN', 'MCT', '39', '2023-04-05', '09:00-12:00', 'REPROBADO', 'activo', 'DOCUMENTACIÓN', 'APOYO2', 'Matutino', '2023-03-16', '2023-04-05 11:35:17', NULL),
('stdt-682a3', 'Anthony Bladimir', 'Sinchiguano Almache', 'absinchiguano@espe.edu.ec', '2023-04-05', 'latacunga', '0503125403', 'AB564165', 'L00411800', '0900000000', 'S/N', 'ISOFT', '90', '06-02-2023', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS EC PÁGINA WEB VENTAS', 'APOYO1', 'Vespertino', '2023-02-06', '2023-04-05 09:34:48', NULL),
('stdt-69401', 'Mateo Nicolas', 'Maldonado Armijos', 'mnmaldonado1@espe.edu.ec', '2002-12-20', 'matriz', '1728207711', 'MN456778', 'L00411450', '0900000000', 'Desconocido', 'MCT', '0', '', '', 'REPROBADO', 'activo', 'MARKETING', 'APOYO1', 'Matutino', '2023-03-06', '2023-04-03 11:46:16', NULL),
('stdt-6cd34', 'Geovany Nelson', 'Toaquiza Puco', 'gntoaquiza@espe.edu.ec', '0001-01-01', 'matriz', '5033302190', 'gn123456', 'L00390850', '0990000000', 'Av. La prueba', 'ITIN', '0', '', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'INVESTIGACIÓN', 'APOYO1', 'Vespertino', '2023-04-03', '2023-04-03 11:30:15', NULL),
('stdt-70475', 'Froylan Mateo', 'Medina Ramos', 'fmmedina3@espe.edu.ec', '2023-04-05', 'matriz', '0932644958', 'FM064984', 'L00410928', '0900000000', 'S/N', 'ITIN', '2', '03-04-2023', '09:00-12:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS EC PÁGINA WEB VENTAS', 'APOYO2', 'Vespertino', '2023-04-03', '2023-04-05 10:34:04', NULL),
('stdt-724e3', 'Damaris Alejandra', 'Ayala Chapaca', 'daayala11@espe.edu.ec', '2014-06-03', 'matriz', '1725564114', 'AC977740', 'L00411384', '0900000000', 'SN', 'CONADT', '12', '2023-03-30 , 2023-03-31 , 2023-04-03 , 2023-04-04', '', 'REPROBADO', 'activo', 'MARKETING', 'APOYO2', 'Matutino', '2023-03-30', '2023-04-04 11:09:25', NULL),
('stdt-73212', 'Jorge Fernando', 'Carrera Simbaña', 'jfcarrera3@espe.edu.ec', '0001-01-01', 'matriz', '1711990836', 'jf123456', 'L00390988', '0990000000', 'av prueba', 'ITIN', '0', '2023-04-03', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'MODULO CURSOS MOCC', 'APOYO1', 'Vespertino', '2023-04-03', '2023-04-03 11:51:27', '2023-04-04 12:10:01'),
('stdt-794ca', 'Paul Antornio', 'Sanchez Peñafiel', 'pasanchez13@espe.edu.ec', '2023-04-05', 'matriz', '1726786823', 'PA564644', 'L00387497', '0900000000', 'S/N', 'ISOFT', '90', '07-02-2023', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS EC PÁGINA WEB VENTAS', 'APOYO1', 'Vespertino', '2023-02-07', '2023-04-05 09:44:37', NULL),
('stdt-7a01c', 'Jorge Daniel', 'Lazo Acuña', 'jdlazo@espe.edu.ec', '2001-05-22', 'matriz', '1753941184', 'jd941184', 'L00417827', '0964203575', 'Av. la prueba', 'COMEX', '3', '2023-04-14', '', 'REPROBADO', 'activo', 'CREACIÓN DE CONTENIDO', 'APOYO1', 'Matutino', '2023-04-14', '2023-04-14 09:24:45', NULL),
('stdt-7b0cd', 'Esteban Eduardo', 'Chablay Choez', 'eechablay@espe.edu.ec', '0001-01-01', 'latacunga', '1724380199', 'eecha145', 'L00400333', '0900000000', 'Av.La Prueba', 'ITIN-LINEA', '45', '14-03-2023', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'PROWESS VENTAS', 'APOYO1', 'Matutino', '2023-03-14', '2023-04-03 11:43:16', NULL),
('stdt-7cc5e', 'Angie Cristina', 'Moya Peñarrieta', 'acmoya1@espe.edu.ec', '2002-10-01', 'matriz', '1727954594', 'MP624933', 'L00411442', '0983012687', 'S/N', 'ADMDEMP', '36', '2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-03-22 , 2023-03-21 , 2023-03-20', '', 'REPROBADO', 'activo', 'ADMINISTRACIÓN DE EMPRESAS - TALLER', 'APOYO1', 'Matutino', '2023-03-20', '2023-04-04 09:37:09', '2023-04-04 15:23:58'),
('stdt-7f120', 'Angie Stefania', 'Mejia Zapata', 'asmejia1@espe.edu.ec', '2040-01-01', 'matriz', '1726875386', 'AM465465', 'L00411409', '0000000000', 'SN', 'MCT', '48', '2023-04-04', '09:00-12:00', 'REPROBADO', 'activo', 'CREACIÓN DE CONTENIDO', 'APOYO6', 'Matutino', '2023-03-13', '2023-04-04 10:45:46', NULL),
('stdt-8c361', 'Luis Steven', 'Caiza Quinga', 'lscaiza@espe.edu.ec', '0200-08-06', 'matriz', '1727944934', 'LS345769', 'L00394289', '0900000000', 'Desconocido', 'MCT', '3', '', '', 'REPROBADO', 'activo', 'ADMINISTRACION I', 'APOYO1', 'Matutino', '2023-03-09', '2023-04-04 10:27:44', '2023-04-06 10:22:55'),
('stdt-8d316', 'Diara Estefania', 'Guevara Artega', 'deguevara2@espe.edu.ec', '0001-01-01', 'latacunga', '1729304616', 'de123456', 'L00399147', '0990000000', 'av prueba', 'CONADT', '0', '2023-04-03', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'INVESTIGACIÓN', 'APOYO1', 'Vespertino', '2023-04-03', '2023-04-03 14:19:17', NULL),
('stdt-8e27a', 'Jennyfer Sarai', 'Cabrera Encarnacion', 'jscabrera4@espe.edu.ec', '2002-11-28', 'matriz', '1754438917', 'js438917', 'L00411574', '0958792365', 'Av. la prueba', 'CONADT', '18', '2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '', 'REPROBADO', 'activo', '', 'APOYO1', 'Matutino', '2023-03-27', '2023-04-03 11:39:40', '2023-04-03 18:47:39'),
('stdt-92e79', 'Richard Alexis', 'Vivanco Chicaiza', 'ravivanco@espe.edu.ec', '2023-04-05', 'latacunga', '1750045377', 'RA156651', 'L00404844', '0900000000', 'S/N', 'ISOFT', '80', '26-01-2023', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS EC PÁGINA WEB VENTAS', 'APOYO1', 'Vespertino', '2023-01-26', '2023-04-05 09:29:12', NULL),
('stdt-98dd9', 'Stephanie Adriana', 'Chavez Jaram', 'sachavez5@espe.edu.ec', '2000-06-25', 'matriz', '1751051689', 'sa051689', 'L00390631', '0986604407', 'Av. la prueba', 'ADMDEMP', '21', '2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03 , 2023-04-04', '', 'REPROBADO', 'activo', '', 'APOYO1', 'Matutino', '2023-03-27', '2023-04-03 11:29:18', '2023-04-04 10:51:56'),
('stdt-99793', 'Jimenez Rodriguez', 'Nicole Estefania', 'nejimenez1@espe.edu.ec', '2001-05-08', 'matriz', '1753591344', 'jr433231', 'L00405230', '0900000000', 'Quito', 'COMEX', '24', '2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', '', 'APOYO2', 'Matutino', '2023-03-20', '2023-04-03 11:49:50', '2023-04-04 11:10:42'),
('stdt-a048e', 'Diana Antonella', 'Ureña Pinzon', 'daurena@espe.edu.ec', '0001-01-01', 'matriz', '1755689575', 'DAUP1111', 'L00411626', '0999999999', 'SN', 'MCT', '0', '2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-04-03 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-02-27', '09:00-12:00', 'REPROBADO', 'activo', 'CREACIÓN DE CONTENIDO', 'COLIDER', 'Matutino', '2023-02-27', '2023-04-03 15:24:31', '2023-04-04 10:48:29'),
('stdt-a141e', 'Danny Marcelo', 'Rodríguez Rodríguez', 'dmrodriguez9@espe.edu.ec', '1995-12-19', 'matriz', '1723983829', 'adminhds', 'L00387370', '0962783955', 'La Magdalena', 'ITIN', '15', '2023-03-30 , 2023-03-31 , 2023-04-03 , 2023-04-04 , 2023-04-05', '09:00-12:00', 'REPROBADO', 'activo', 'LEVANTAMIENTO DE INFORMACIÓN', 'APOYO2', 'Matutino', '2023-03-30', '2023-03-30 11:54:04', '2023-04-05 10:19:33'),
('stdt-a92b3', 'Juan Andrés', 'Ocaña Zambrano', 'jaocana1@espe.edu.ec', '2023-04-04', 'matriz', '1725863276', 'Ja023154', 'L00380019', '0980000000', 'No especificado', 'ITIN-LINEA', '70', '2023-02-24 , 2023-02-27 , 2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', 'MODULO CURSOS MOCC', 'APOYO1', 'Vespertino', '2023-02-24', '2023-04-04 11:31:04', '2023-04-05 10:06:15'),
('stdt-aa3e5', 'Andres', 'Cosios Pineda', 'aacosios@espe.edu.ec', '2023-04-04', 'matriz', '1718393364', 'Ac213204', 'L00391040', '0980000000', 'No especificado', 'ITIN-LINEA', '70', '2023-02-24 , 2023-02-27 , 2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', 'MODULO CURSOS MOCC', 'LIDER', 'Vespertino', '2023-02-24', '2023-04-04 11:47:21', NULL),
('stdt-ad37e', 'Valeria Anabel', 'Vásquez Larco', 'vavasquez3@espe.edu.ec', '1999-06-08', 'matriz', '1722418389', 'va418389', 'L00082683', '0962791273', 'Av. la prueba', 'COMEX', '3', '2023-04-12', '', 'REPROBADO', 'activo', 'DOCUMENTACIÓN', 'APOYO1', 'Matutino', '2023-04-12', '2023-04-12 20:33:39', NULL),
('stdt-af97c', 'Nicole Yahaira', 'Díaz Ordoñez', 'nydiaz@espe.edu.ec', '2023-04-05', 'matriz', '1718973389', 'Ny234001', 'L00048306', '0980000000', 'No especificado', 'ITIN-LINEA', '9', '2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS EC PÁGINA WEB VENTAS', 'APOYO1', 'Vespertino', '2023-03-30', '2023-04-05 10:37:02', NULL),
('stdt-b05e8', 'Israel Esteban', 'Huanataxi Duque', 'iehuanataxi@espe.edu.ec', '2023-03-08', 'matriz', '1753968161', 'IE234589', 'L00411559', '0900000000', 'Desconocido', 'CONADT', '3', '', '09:00-12:00', 'REPROBADO', 'activo', 'MENTORIAS MATUTINO', 'APOYO1', 'Matutino', '2023-03-09', '2023-04-04 10:16:51', NULL),
('stdt-b193b', 'Nahomi Samira', 'Sanchez Mera', 'nssanchez3@espe.edu.ec', '2003-03-04', 'matriz', '1600576993', 'ns576993', 'L00411307', '0983116928', 'Av. la prueba', 'COMEX', '3', '2023-04-12', '', 'REPROBADO', 'activo', 'PROWESS VENTAS', 'APOYO1', 'Matutino', '2023-04-12', '2023-04-12 20:46:29', NULL),
('stdt-baf55', 'Roiman Dario', 'Martinez Mera', 'rdmartinez3@espe.edu.ec', '2002-12-06', 'matriz', '1728635416', 'rd635416', 'L00411457', '0991411077', 'Av. la prueba', 'CONADT', '3', '2023-04-03', '', 'REPROBADO', 'activo', 'PROWESS VENTAS', 'APOYO1', 'Matutino', '2023-04-03', '2023-04-03 11:56:07', '2023-04-03 19:10:58'),
('stdt-bc660', 'Paola Abigail', 'Villamarin Sanchez', 'pavillamarin3@espe.edu.ec', '2040-01-01', 'matriz', '3050108004', 'PV182309', 'L00411651', '0000000000', 'SN', 'MCT', '45', '2023-04-05', '09:00-12:00', 'REPROBADO', 'activo', 'DOCUMENTACIÓN', 'APOYO7', 'Matutino', '2023-03-14', '2023-04-05 10:38:00', NULL),
('stdt-c0f76', 'Antonio Adolfo', 'Valeriano Pilay', 'aavaleriano@espe.edu.ec', '2023-03-15', 'matriz', '1727429175', 'AA323897', 'L00411422', '0900000000', 'Desconocido', 'MCT', '3', '2023-03-13', '09:00-12:00', 'REPROBADO', 'activo', 'PROWESS VENTAS', 'APOYO1', 'Matutino', '2023-03-13', '2023-04-04 10:45:43', NULL),
('stdt-c120f', 'Yuliana Lisbeth', 'Chanaluisa  Simbaña', 'ylchanaluisa@espe.edu.ec', '2023-04-05', 'latacunga', '1753050606', 'CS233456', 'L00404522', '0900000000', 'SN', 'CONADT', '9', '2023-04-03 , 2023-04-05 , 2023-04-04', '', 'REPROBADO', 'activo', 'CONTABILIDAD Y AUDITORIA MAÑANA', 'APOYO1', 'Vespertino', '2023-04-03', '2023-04-05 10:36:52', NULL),
('stdt-c2da5', 'Medardo Romel', 'Campues Alba', 'rmcampues@espe.edu.ec', '2023-01-01', 'latacunga', '1754607255', 'MR231654', 'L00386568', '0900000000', 'S/N', 'ISOFT', '80', '25-11-2022', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS EC PÁGINA WEB VENTAS', 'APOYO1', 'Vespertino', '2022-11-25', '2023-04-04 10:30:59', NULL),
('stdt-c2f67', 'Esteven Olmedo', 'Nacimba Loachamin', 'eonacimba@espe.edu.ec', '2023-02-14', 'matriz', '1727296137', 'EO961279', 'L00000000', '0900000000', 'Desconocido', 'ISOFT', '6', '2023-04-17', '09:00-12:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS APP AGRÍCOLA', 'APOYO1', 'Matutino', '2023-03-30', '2023-04-05 11:39:09', '2023-04-06 10:34:01'),
('stdt-c4228', 'Stephany Domenica', 'Medina Sandoval', 'sdmedina@espe.edu.ec', '0001-01-01', 'matriz', '1751670231', 'SD111111', 'L00391828', '0900000000', 'SN', 'TSMO', '0', '2023-02-07 , 2023-02-08 , 2023-02-09 , 2023-02-10 , 2023-02-13 , 2023-02-14 , 2023-02-15 , 2023-02-16 , 2023-02-17 , 2023-02-22 , 2023-02-23 , 2023-02-24 , 2023-02-27 , 2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', 'CREACIÓN DE CONTENIDO', 'APOYO1', 'Matutino', '2023-02-07', '2023-04-03 11:40:04', '2023-04-04 10:44:19'),
('stdt-c45dd', 'Dennis Arturo', 'Quishpi Guaman', 'daquishpi@espe.edu.ec', '1998-09-23', 'matriz', '1725677775', 'da677775', 'L00411388', '0998040267', 'Av. la prueba', 'MCT', '6', '2023-03-31 , 2023-04-03', '', 'REPROBADO', 'activo', 'ADMINISTRACION I', 'APOYO1', 'Matutino', '2023-03-31', '2023-04-03 19:07:09', NULL),
('stdt-c7497', 'Johanna Elizabeth', 'Sanaguano Torres', 'jesanaguano@espe.edu.ec', '2001-05-22', 'matriz', '0605156520', 'JE111111', 'L00079457', '0900000000', 'SN', 'COMEX', '0', '2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', 'default', 'APOYO1', 'Matutino', '2023-03-01', '2023-04-03 15:29:06', '2023-04-03 16:07:25'),
('stdt-cb4de', 'Romina Nycole', 'Ormaza Huertas', 'mormaza@espe.edu.ec', '2002-09-09', 'matriz', '0401967732', 'OH654332', 'L00411330', '0900000000', 'S/N', 'COMEX', '24', '2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', '', 'APOYO2', 'Matutino', '2023-03-23', '2023-04-03 12:03:16', '2023-04-04 11:14:21'),
('stdt-d2b25', 'Pamela Camila', 'Sani Ordoñez', 'pcsani@espe.edu.ec', '2002-08-05', 'matriz', '1727298505', 'pc298505', 'L00411418', '0979832741', 'Av. la prueba', 'COMEX', '3', '2023-04-10', '', 'REPROBADO', 'activo', 'CREACIÓN DE CONTENIDO', 'APOYO1', 'Matutino', '2023-04-10', '2023-04-10 09:43:38', NULL),
('stdt-d2c5d', 'Diego Andres', 'Mantilla Sarauz', 'damantilla5@espe.edu.ec', '2023-04-04', 'matriz', '1722637681', 'Da202314', 'L00397964', '0980000000', 'No especificada', 'ITIN-LINEA', '67', '2023-02-24 , 2023-02-27 , 2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '', 'REPROBADO', 'activo', 'SOFTWARE - DESARROLLO PÁGINA WEB PROWESS AGRÍCOLA', 'APOYO1', 'Vespertino', '2023-02-24', '2023-04-04 11:59:41', '2023-04-05 10:07:35'),
('stdt-d3f80', 'Melany Jailyn', 'Falcón Fuentes', 'mjfalcon3@espe.edu.ec', '2001-05-10', 'latacunga', '1753846474', 'Mfalcon8', 'L00410735', '0987077331', 'San Bartolo', 'CONADT', '53', '10-03-2023 , 13/03/2023	14/03/2023	15/03/2023	16/03/2023	17/03/2023	20/03/2023	21/03/2023	22/03/2023	23/03/2023	24/03/2023	27/03/2023	28/03/2023	29/03/2023	30/03/2023	31/03/2023	03/04/2023	04/04/2023	05/04/2023	06/04/2023', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'CONTABILIDAD Y AUDITORIA MAÑANA', 'COLIDER', 'Matutino', '2023-03-10', '2023-04-04 10:03:26', '2023-04-06 10:44:10'),
('stdt-d40d9', 'Maryorie Fernanda', 'Diaz Guairacaja', 'mfdiaz5@espe.edu.ec', '2002-05-22', 'matriz', '1729157881', 'MF111111', 'L00411463', '0900000000', 'SN', 'MCT', '0', '2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-04-03 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31', '09:00-12:00', 'REPROBADO', 'activo', 'DOCUMENTACIÓN', 'APOYO1', 'Matutino', '2023-02-28', '2023-04-03 15:46:50', '2023-04-03 16:45:35'),
('stdt-d488d', 'Diego Alejandro', 'Guzman Cajas', 'daguzman2@espe.edu.ec', '2023-04-05', 'matriz', '1714109699', 'DA534155', 'L00026041', '0900000000', 'S/N', 'ITIN-LINEA', '90', '06-02-2023', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS EC PÁGINA WEB VENTAS', 'APOYO1', 'Vespertino', '2023-02-06', '2023-04-05 09:39:23', NULL),
('stdt-d7fe1', 'Viviana Elizabeth', 'Zapata Pila', 'vezapata3@espe.edu.ec', '2000-08-05', 'matriz', '1726656653', 've656653', 'L00390494', '0983034609', 'Av. la prueba', 'ADMDEMP', '15', '2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03 , 2023-04-04', '', 'REPROBADO', 'activo', '', 'APOYO4', 'Matutino', '2023-03-29', '2023-04-03 19:04:22', '2023-04-04 10:54:50'),
('stdt-da0d5', 'Nicole Denisse', 'Nieto Delgado', 'ndnieto@espe.edu.ec', '2002-12-25', 'matriz', '1725787061', 'ND111111', 'L00411390', '0900000000', 'SN', 'CONADT', '0', '2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', 'ADMINISTRACION II', 'APOYO1', 'Matutino', '2023-03-03', '2023-04-03 15:36:53', '2023-04-03 15:56:27'),
('stdt-dd28c', 'Ricardo Alejandro', 'Jaramillo Salgado', 'nrjaramillo2@espe.edu.ec', '2000-03-23', 'matriz', '1750245779', 'student1', 'L00391336', '0983594593', 'La Kennedy N50-52', 'ITIN-LINEA', '96', '2023-02-24 , 2023-02-27 , 2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-03-14', '09:00-12:00', 'APROBADO', 'finalizado', 'LEVANTAMIENTO DE INFORMACIÓN', 'APOYO2', 'Vespertino', '2023-02-24', '2023-03-30 12:00:26', '2023-04-05 10:19:09'),
('stdt-dd301', 'Germán Andres', 'Neppas Jara', 'ganeppas@espe.edu.ec', '2002-06-22', 'matriz', '1754303582', 'GN401928', 'L00066016', '0000000000', 'SN', 'CONADT', '39', '2023-04-05', '09:00-12:00', 'REPROBADO', 'activo', 'MARKETING', 'APOYO6', 'Matutino', '2023-03-14', '2023-04-05 10:34:00', '2023-04-05 10:45:34'),
('stdt-dd37c', 'Jennyfer Pamel', 'Zurita Moposita', 'jpzurita4@espe.edu.ec', '2001-10-18', 'matriz', '1725050619', 'JP906352', 'L00405053', '0900000000', 'Desconocido', 'CONADT', '3', '2023-03-13 , 2023-03-14', '09:00-12:00', 'REPROBADO', 'activo', 'PROWESS VENTAS', 'APOYO1', 'Matutino', '2023-03-13', '2023-04-04 10:51:54', '2023-04-06 10:27:55'),
('stdt-de61b', 'Kenneth Sebastian', 'Acurio Velastegui', 'ksacurio@espe.edu.ec', '2023-04-04', 'latacunga', '1805352505', 'Ks210554', 'L00386603', '0980000000', 'No especificado', 'ISOFT', '80', '2023-02-07 , 2023-02-08 , 2023-02-09 , 2023-02-10 , 2023-02-13 , 2023-02-14 , 2023-02-15 , 2023-02-16 , 2023-02-17 , 2023-02-22 , 2023-02-23 , 2023-02-27 , 2023-02-28 , 2023-03-01 , 2023-03-02 , 2023-03-03 , 2023-03-06 , 2023-03-07 , 2023-03-08 , 2023-03-09 , 2023-03-10 , 2023-03-13 , 2023-03-14 , 2023-03-15 , 2023-03-16 , 2023-03-17 , 2023-03-20 , 2023-03-21 , 2023-03-22 , 2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '09:00-12:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS APP AGRÍCOLA', 'LIDER', 'Vespertino', '2023-02-07', '2023-04-04 10:27:51', '2023-04-05 09:59:03'),
('stdt-de94d', 'Lizbeth Mabel', 'López Tello', 'Lmlopez9@espe.edu.ec', '2001-01-12', 'matriz', '1722461447', 'ml461447', 'L00399654', '0983509805', 'Av. la prueba', 'CONADT', '3', '2023-04-14', '', 'REPROBADO', 'activo', 'CREACIÓN DE CONTENIDO', 'APOYO2', 'Matutino', '2023-04-14', '2023-04-14 09:34:33', NULL),
('stdt-e0c69', 'Jhon Jairo', 'Alvarado Montaguano', 'jjalvarado5@espe.edu.ec', '2023-04-05', 'matriz', '1754402798', 'JJ654654', 'L00386563', '0900000000', 'S/N', 'ISOFT', '3', '03-04-2023', '09:00-12:00', 'REPROBADO', 'activo', 'SOFTWARE - PROWESS EC PÁGINA WEB VENTAS', 'APOYO1', 'Vespertino', '2023-04-03', '2023-04-05 10:29:06', NULL),
('stdt-e47c1', 'Ariel Sebastian', 'Castro Rey', 'ascastro2@espe.edu.ec', '0001-01-01', 'latacunga', '1003867189', 'as123456', 'L00399330', '0990000000', 'AV. prueba', 'ISOFT', '0', '2023-04-03', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'INVESTIGACIÓN', 'APOYO1', 'Vespertino', '2023-04-03', '2023-04-03 11:39:46', NULL),
('stdt-e7a09', 'Liseth Hermelinda', 'Gahui Sayago', 'lhgahui@espe.edu.ec', '2023-01-01', 'latacunga', '0943062745', 'LH561465', 'L00386146', '0900000000', 'Guasmo sur', 'CONADT', '500', '2022-07-01', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'ADMINISTRACION I', 'LIDER', 'Vespertino', '2022-07-01', '2023-04-04 09:53:07', NULL),
('stdt-e7d62', 'Katherin Lizbeth', 'Chamorro Gomez', 'Chamklchamorro@espe.edu.ec', '2002-01-08', 'matriz', '0401967732', 'CG541134', 'L00082328', '0900000000', 's/n', 'MCT', '18', '2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-04-03 , 2023-04-04', '', 'REPROBADO', 'activo', '', 'APOYO1', 'Matutino', '2023-03-23', '2023-04-04 09:53:42', '2023-04-04 11:17:33'),
('stdt-eac16', 'Dayana Salome', 'Benitez Saavedra', 'dsbenitez2@espe.edu.ec', '1999-09-01', 'matriz', '1725773632', 'ds773632', 'L00390447', '0984410197', 'Av. la prueba', 'ADMDEMP', '21', '2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03 , 2023-04-04', '', 'REPROBADO', 'activo', '', 'APOYO2', 'Matutino', '2023-03-27', '2023-04-03 11:25:18', '2023-04-04 10:50:03'),
('stdt-ec4c3', 'Cristian Alejandro', 'Armas Lastra', 'caarmas4@espe.edu.ec', '1996-04-27', 'matriz', '1725246241', 'AL564337', 'L00393733', '0900000000', 'SN', 'ADMDEMP', '12', '2023-03-30 , 2023-03-31 , 2023-04-03 , 2023-04-04', '', 'REPROBADO', 'activo', 'PROWESS VENTAS', 'APOYO1', 'Matutino', '2023-04-04', '2023-04-04 10:43:12', NULL),
('stdt-ed27b', 'Mike Alexander', 'Salazar Castillo', 'masalazar33@espe.edu.ec', '2023-02-08', 'matriz', '1752258028', 'MA784532', 'L00399896', '0900000000', 'Desconocido', 'COMEX', '3', '2023-03-13', '09:00-12:00', 'REPROBADO', 'activo', 'ADMINISTRACION II', 'APOYO1', 'Matutino', '2023-03-13', '2023-04-04 10:41:29', NULL),
('stdt-ee204', 'Melany Valeria', 'Aceldo Chala', 'mvaceldo@espe.edu.ec', '2002-12-12', 'matriz', '1753076213', 'AC321335', 'L00411534', '0900000000', 'SN', 'MCT', '15', '2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03', '', 'REPROBADO', 'activo', 'PROWESS VENTAS', 'APOYO1', 'Matutino', '2023-03-28', '2023-04-04 10:27:44', NULL),
('stdt-eec19', 'Byron Martin', 'Guacho Ojeda', 'bmguacho@espe.edu.ec', '2023-04-12', 'matriz', '1750837781', 'GO976339', 'L00411477', '0900000000', 'SN', 'MCT', '15', '2023-03-30 , 2023-03-31 , 2023-04-03 , 2023-04-04', '', 'REPROBADO', 'activo', 'PROWESS VENTAS', 'APOYO2', 'Matutino', '2023-03-30', '2023-04-04 11:01:16', NULL),
('stdt-f512a', 'Stefany Alejandra', 'Velasco Quilumba', 'savelasco3@espe.edu.ec', '2001-10-03', 'matriz', '1753536539', 'VQ986536', 'L00405229', '0900000000', 'SN', 'COMEX', '12', '2023-03-30 , 2023-03-31 , 2023-04-03 , 2023-04-04', '', 'REPROBADO', 'activo', 'PROWESS VENTAS', 'APOYO1', 'Matutino', '2023-03-30', '2023-04-04 10:36:04', NULL),
('stdt-f6c53', 'Myckel Sebast', 'Chamorro Sanchez', 'mschamorro@espe.edu.ec', '0001-01-01', 'matriz', '1720227683', 'ms123456', 'L00394089', '0990000000', 'av. prueba', 'ISOFT', '0', '2023-04-03', '09:00-12:00 , 16:00-18:00', 'REPROBADO', 'activo', 'INVESTIGACIÓN', 'APOYO1', 'Vespertino', '2023-04-03', '2023-04-03 11:44:38', NULL),
('stdt-f6e13', 'Alisson Mishell', 'Rea Vasquez', 'amrea3@espe.edu.ec', '2002-04-13', 'matriz', '1719899385', 'RV453934', 'L00411313', '0900000000', 'SN', 'ADMDEMP', '24', '2023-03-23 , 2023-03-24 , 2023-03-27 , 2023-03-28 , 2023-03-29 , 2023-03-30 , 2023-03-31 , 2023-04-03 , 2023-04-04', '', 'REPROBADO', 'activo', 'ADMINISTRACION I', 'APOYO1', 'Matutino', '2023-04-04', '2023-04-04 10:13:28', NULL),
('stdt-fa3ec', 'Jadira Jackeline', 'Achote Chugcho', 'jjachote@espe.edu.ec', '0001-01-01', 'latacunga', '0550379408', 'jjach452', 'L00385085', '0900000000', 'S-N', 'ISOFT', '9', '2023-04-03 , 2023-04-04 , 2023-04-05', '09:00-12:00', 'REPROBADO', 'activo', 'MENTORIAS VESPERTINO', 'APOYO1', 'Vespertino', '2023-03-03', '2023-04-04 09:59:57', '2023-04-05 10:40:05'),
('stdt-fc76f', 'Roy Sebastián', 'Maiza López', 'rsmaiza@espe.edu.ec', '2002-12-04', 'matriz', '1722443650', 'rs443650', 'L00411334', '0998641131', 'Av. la prueba', 'COMEX', '3', '2023-04-12', '', 'REPROBADO', 'activo', 'DOCUMENTACIÓN', 'APOYO1', 'Matutino', '2023-04-12', '2023-04-12 09:26:03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE `subjects` (
  `subject` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `career` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `user_teachers` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`subject`, `career`, `name`, `semester`, `description`, `user_teachers`) VALUES
('CALDIF01', 'MATBASICAS', 'Calculo Diferencial', 9, 'Calculo', 'teacher'),
('CALINT', 'IDS', 'Calculo Integral', 1, 'Matematics', 'teacher'),
('DESARROLLO', 'MATBASICAS', 'Software', 3, 'Profesional', 'teacher'),
('EDU_FISC01QR', 'MATBASICAS', 'Educación física', 1, 'Fisico', 'teacher'),
('INGBAS01', 'IDS', 'Ingles Básico', 1, 'Estudio marco Europeo B2', 'teacher');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedula` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `id` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `level_studies` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `career` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `teachers`
--

INSERT INTO `teachers` (`user`, `name`, `surnames`, `date_of_birth`, `gender`, `cedula`, `pass`, `id`, `phone`, `address`, `level_studies`, `email`, `career`, `created_at`, `updated_at`) VALUES
('tchr-f2ccd', 'Galo Hernan', 'Garcia Tamayo', '1978-10-03', 'hombre', '1802858983', '18028589', 'LL0028500', '0986019450', 'Ambato', 'Maestria', 'ghgarcia1@espe.edu.ec', 'CONADT', '2023-04-12 11:12:25', NULL),
('teacher', 'Steven', 'Cardenas', '2001-04-20', 'hombre', '1750245009', 'teacher1', 'L00123456', '0983594591', 'Avenida Libertador Simon Bolivar', 'Ingenieria', 'teacher@gmail.com', 'ADMDEMP', '2021-05-01 00:00:00', '2023-04-03 10:41:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pass` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `permissions` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `rol` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `image_updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user`, `name`, `surnames`, `email`, `pass`, `permissions`, `rol`, `image`, `image_updated_at`, `created_at`, `updated_at`) VALUES
('admin', 'Andres', 'Carrera', 'maycol23@outlook.es', 'root2364', 'admin', 'admin', 'admin857.png', '2023-04-05 10:40:09', '2021-12-05 18:27:39', '2022-04-03 06:10:34'),
('admin-5324b', 'Melany Jailin', 'Falcon Fuentes', 'jailin1606@gmail.com', 'Mfalcon3', 'admin', 'admin', 'user.png', NULL, '2023-04-03 10:46:55', NULL),
('admin-7cbda', 'Prueba', 'Test', 'prueba@espe.edu.ec', 'prueba11', 'admin', 'admin', 'user.png', NULL, '2023-04-04 11:31:29', NULL),
('admin-d7946', 'Angie Cristina', 'Moya Peñarrieta', 'cristina-moya02@hotmail.com', 'Ashmoya1', 'admin', 'admin', 'user.png', NULL, '2023-04-03 10:44:58', NULL),
('editor', 'Angela', 'Champ', 'magomez@gmail.com', 'editor', 'editor', 'editor', 'user.png', '2022-02-22 15:18:10', '2021-12-04 02:13:36', '2022-03-13 02:59:59'),
('empre', 'Usuario', 'Emprendedor', 'emprendedor@espe.edu.ec', 'empre123', 'editor', 'empre', 'user.png', '2022-02-22 15:18:06', '2021-05-01 00:00:00', '2022-04-03 06:10:34'),
('stdt-04b2c', 'Diego Sebastian', 'Chancusig Simbaña', 'dschancusig@espe.edu.ec', 'Ds123456', 'editor', 'student', 'user.png', NULL, '2023-04-04 09:59:28', '2023-04-05 09:53:22'),
('stdt-04dcf', 'Luis Miguel', 'Llumiquinga', 'lmllumiquinga3@espe.edu.ec', 'lm123456', 'editor', 'student', 'user.png', NULL, '2023-04-03 14:17:01', '2023-04-05 10:31:51'),
('stdt-05bb9', 'Carelis Polet', 'Casa Torres', 'cpcasa1@espe.edu.ec', 'Cp545310', 'editor', 'student', 'user.png', NULL, '2023-04-04 11:22:22', '2023-04-05 10:05:13'),
('stdt-08889', 'Maria Jose', 'Juiña Quingalombo', 'mjjuina@espe.edu.ec', 'MJ398719', 'editor', 'student', 'user.png', NULL, '2023-04-05 11:07:55', NULL),
('stdt-139e7', 'Brandon Xavier', 'Saltos Cardenas', 'bxsaltos@espe.edu.ec', 'bx123456', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:25:05', NULL),
('stdt-13e87', 'Anderson Jair', 'Chasiloa Ñacata', 'ajchasiloa@espe.edu.ec', 'AJ561651', 'editor', 'student', 'user.png', NULL, '2023-04-05 09:23:14', NULL),
('stdt-14631', 'Karen Elizabeth', 'Guallichico Gualotuña', 'keguallichico@espe.edu.ec', 'ke686931', 'editor', 'student', 'user.png', NULL, '2023-04-06 11:22:11', NULL),
('stdt-1f204', 'Lenin Andres', 'Vilca Caiza', 'lavilca@espe.edu.ec', 'la276754', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:49:26', '2023-04-03 18:54:47'),
('stdt-22698', 'Kevin Xavier', 'Pila Padilla', 'kjpila@espe.edu.ec', 'KX893216', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:36:03', NULL),
('stdt-22ff2', 'Nathalia Lissette', 'Jimenez Villegas', 'nljimenez2@espe.edu.ec', 'nl836239', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:45:17', '2023-04-03 18:51:52'),
('stdt-2bf11', 'Andres Vinicio', 'Pallango Tapia', 'avpallango@espe.edu.ec', 'Av587845', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:25:03', '2023-04-06 10:47:04'),
('stdt-2c519', 'Melanny Alejandra', 'Rodriguez Villacres', 'marodriguez34@espe.edu.ec', 'MA111111', 'editor', 'student', 'user.png', NULL, '2023-04-03 12:02:03', '2023-04-03 16:55:14'),
('stdt-33111', 'Jherico Aaron', 'Cardenas Yepez', 'jacardenas16@espe.edu.ec', 'aj414889', 'editor', 'student', 'user.png', NULL, '2023-04-06 11:24:13', NULL),
('stdt-35655', 'Hernand David', 'Salazar Silva', 'hdsalazar2@espe.edu.ec', 'HD223467', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:26:36', '2023-04-04 11:01:25'),
('stdt-3919a', 'Samantha Nicole', 'Loachamin Toapanta', 'snloachamin@espe.edu.ec', 'SN567889', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:01:24', NULL),
('stdt-39ddf', 'Francisco Javier', 'Gallegos Vilatuña', 'fjgallegos2@espe.edu.ec', 'FJ111111', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:47:01', '2023-04-04 10:45:18'),
('stdt-3b86c', 'Christopher Jossue', 'Rodriguez Ortiz', 'cjrodriguez5@espe.edu.ec', 'cj510908', 'editor', 'student', 'user.png', NULL, '2023-04-03 18:59:35', NULL),
('stdt-3cd3c', 'Melanie Jajaira', 'Vega Mendieta', 'mjvega5@espe.edu.ec', 'MJ111111', 'editor', 'student', 'user.png', NULL, '2023-04-03 15:33:01', '2023-04-03 17:01:36'),
('stdt-3e76a', 'Mateo Gabriel', 'Segovia Caceres', 'mgsegovia2@espe.edu.ec', 'MG638614', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:57:58', NULL),
('stdt-3eb51', 'Alison Paola', 'Moncayo Achilchisa', 'apmoncayo2@espe.edu.ec', 'Ap201456', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:54:39', '2023-04-05 10:02:16'),
('stdt-3f4bd', 'Wilson Antonio', 'Orellana Montesdeoca', 'waorellana@espe.edu.ec', 'wa123456', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:47:12', NULL),
('stdt-43506', 'Silvia Liliana', 'Yunga Quichimbo', 'slyunga@espe.edu.ec', 'YQ865535', 'editor', 'student', 'user.png', NULL, '2023-03-30 12:04:59', '2023-04-14 10:58:24'),
('stdt-4442d', 'Franklin Joel', 'Sasig Abrajan', 'fjsasig@espe.edu.ec', 'fjsasig5', 'editor', 'student', 'user.png', NULL, '2023-04-04 09:49:10', NULL),
('stdt-44904', 'Katerin Tatiana', 'Heredia Tapia', 'ktheredia@espe.edu.ec', 'KT056144', 'editor', 'student', 'user.png', NULL, '2023-04-04 11:09:45', NULL),
('stdt-46f69', 'Jennifer Lizbeth', 'Deker Moran', 'jldeker@espe.edu.ec', 'jl123456', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:32:29', NULL),
('stdt-494c5', 'Michael Andres', 'Espinosa Carrera', 'maespinosa10@espe.edu.ec', 'Ma201547', 'editor', 'student', 'stdt-494c5840.png', '2023-04-12 11:16:45', '2023-04-04 10:43:27', '2023-04-12 11:17:00'),
('stdt-49518', 'Erick Gabriel', 'Maldonado Miranda', 'egmaldonado1@espe.edu.ec', 'Eg235468', 'editor', 'student', 'user.png', NULL, '2023-04-04 11:06:29', '2023-04-05 10:03:46'),
('stdt-4a139', 'Ahsly Shiomara', 'Sevilla Zambrano', 'assevilla@espe.edu.ec', 'AS111111', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:54:39', '2023-04-04 10:47:04'),
('stdt-4a206', 'Fernanda Anahi', 'Flores Calle', 'faflorez3@espe.edu.ec', 'fa369629', 'editor', 'student', 'user.png', NULL, '2023-04-03 19:19:19', '2023-04-04 10:47:48'),
('stdt-4d25b', 'Lesly Katerine', 'Tituaña Muñoz', 'lktituana@espe.edu.ec', 'LK111111', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:31:35', '2023-04-04 10:42:33'),
('stdt-51c25', 'Angely Mishelth', 'Poma Vera', 'ampoma1@espe.edu.ec', 'AP091284', 'editor', 'student', 'user.png', NULL, '2023-04-05 11:25:45', NULL),
('stdt-531a8', 'Bryan Steven J', 'Cardenas Auquilla', 'bscardenas@espe.edu.ec', 'BS516561', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:45:33', '2023-04-12 11:05:30'),
('stdt-53fa6', 'Jhon Stiven', 'Chasi Llamba', 'jschasi@espe.edu.ec', 'JS652654', 'editor', 'student', 'user.png', NULL, '2023-04-04 11:38:22', NULL),
('stdt-54621', 'Armando Rafael', 'Fonseca Zurita', 'arfonseca1@espe.edu.ec', 'afr02542', 'editor', 'student', 'user.png', NULL, '2023-04-06 10:41:15', NULL),
('stdt-55c24', 'Evelin Shecely', 'Santafe Condor', 'essantafe@espe.edu.ec', 'essatfe1', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:54:10', NULL),
('stdt-5972f', 'Domenica Rafaela', 'Betancourt Gonzalez', 'drbetancourt@espe.edu.ec', 'dr981301', 'editor', 'student', 'user.png', NULL, '2023-04-03 19:16:23', NULL),
('stdt-59bd9', 'Kerly Yomira', 'Briones Ullon', 'kybriones@espe.edu.ec', 'ky123456', 'editor', 'student', 'user.png', NULL, '2023-04-03 14:20:55', NULL),
('stdt-5ef66', 'Emilly Samantha', 'Chavez Vera', 'eschavez2@espe.edu.ec', 'EC801294', 'editor', 'student', 'user.png', NULL, '2023-04-05 11:35:17', NULL),
('stdt-682a3', 'Anthony Bladimir', 'Sinchiguano Almache', 'absinchiguano@espe.edu.ec', 'AB564165', 'editor', 'student', 'user.png', NULL, '2023-04-05 09:34:48', NULL),
('stdt-69401', 'Mateo Nicolas', 'Maldonado Armijos', 'mnmaldonado1@espe.edu.ec', 'MN456778', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:46:16', NULL),
('stdt-6cd34', 'Geovany Nelson', 'Toaquiza Puco', 'gntoaquiza@espe.edu.ec', 'gn123456', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:30:15', NULL),
('stdt-70475', 'Froylan Mateo', 'Medina Ramos', 'fmmedina3@espe.edu.ec', 'FM064984', 'editor', 'student', 'user.png', NULL, '2023-04-05 10:34:04', NULL),
('stdt-724e3', 'Damaris Alejandra', 'Ayala Chapaca', 'daayala11@espe.edu.ec', 'AC977740', 'editor', 'student', 'user.png', NULL, '2023-04-04 11:09:25', NULL),
('stdt-73212', 'Jorge Fernando', 'Carrera Simbaña', 'jfcarrera3@espe.edu.ec', 'jf123456', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:51:27', '2023-04-04 12:10:01'),
('stdt-794ca', 'Paul Antornio', 'Sanchez Peñafiel', 'pasanchez13@espe.edu.ec', 'PA564644', 'editor', 'student', 'user.png', NULL, '2023-04-05 09:44:37', NULL),
('stdt-7a01c', 'Jorge Daniel', 'Lazo Acuña', 'jdlazo@espe.edu.ec', 'jd941184', 'editor', 'student', 'user.png', NULL, '2023-04-14 09:24:45', NULL),
('stdt-7b0cd', 'Esteban Eduardo', 'Chablay Choez', 'eechablay@espe.edu.ec', 'eecha145', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:43:16', NULL),
('stdt-7cc5e', 'Angie Cristina', 'Moya Peñarrieta', 'acmoya1@espe.edu.ec', 'MP624933', 'editor', 'student', 'user.png', NULL, '2023-04-04 09:37:09', '2023-04-04 15:23:58'),
('stdt-7f120', 'Angie Stefania', 'Mejia Zapata', 'asmejia1@espe.edu.ec', 'AM465465', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:45:46', NULL),
('stdt-8c361', 'Luis Steven', 'Caiza Quinga', 'lscaiza@espe.edu.ec', 'LS345769', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:27:44', '2023-04-06 10:22:55'),
('stdt-8d316', 'Diara Estefania', 'Guevara Artega', 'deguevara2@espe.edu.ec', 'de123456', 'editor', 'student', 'user.png', NULL, '2023-04-03 14:19:17', NULL),
('stdt-8e27a', 'Jennyfer Sarai', 'Cabrera Encarnacion', 'jscabrera4@espe.edu.ec', 'js438917', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:39:40', '2023-04-03 18:47:39'),
('stdt-92e79', 'Richard Alexis', 'Vivanco Chicaiza', 'ravivanco@espe.edu.ec', 'RA156651', 'editor', 'student', 'user.png', NULL, '2023-04-05 09:29:12', NULL),
('stdt-98dd9', 'Stephanie Adriana', 'Chavez Jaram', 'sachavez5@espe.edu.ec', 'sa051689', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:29:18', '2023-04-04 10:51:56'),
('stdt-99793', 'Jimenez Rodriguez', 'Nicole Estefania', 'nejimenez1@espe.edu.ec', 'jr433231', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:49:50', '2023-04-04 11:10:42'),
('stdt-a048e', 'Diana Antonella', 'Ureña Pinzon', 'daurena@espe.edu.ec', 'DAUP1111', 'editor', 'student', 'user.png', NULL, '2023-04-03 15:24:31', '2023-04-04 10:48:29'),
('stdt-a141e', 'Danny Marcelo', 'Rodríguez Rodríguez', 'dmrodriguez9@espe.edu.ec', 'adminhds', 'editor', 'student', 'user.png', NULL, '2023-03-30 11:54:04', '2023-04-05 10:19:33'),
('stdt-a92b3', 'Juan Andrés', 'Ocaña Zambrano', 'jaocana1@espe.edu.ec', 'Ja023154', 'editor', 'student', 'user.png', NULL, '2023-04-04 11:31:04', '2023-04-05 10:06:15'),
('stdt-aa3e5', 'Andres', 'Cosios Pineda', 'aacosios@espe.edu.ec', 'Ac213204', 'editor', 'student', 'user.png', NULL, '2023-04-04 11:47:21', NULL),
('stdt-ad37e', 'Valeria Anabel', 'Vásquez Larco', 'vavasquez3@espe.edu.ec', 'va418389', 'editor', 'student', 'user.png', NULL, '2023-04-12 20:33:39', NULL),
('stdt-af97c', 'Nicole Yahaira', 'Díaz Ordoñez', 'nydiaz@espe.edu.ec', 'Ny234001', 'editor', 'student', 'user.png', NULL, '2023-04-05 10:37:02', NULL),
('stdt-b05e8', 'Israel Esteban', 'Huanataxi Duque', 'iehuanataxi@espe.edu.ec', 'IE234589', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:16:51', NULL),
('stdt-b193b', 'Nahomi Samira', 'Sanchez Mera', 'nssanchez3@espe.edu.ec', 'ns576993', 'editor', 'student', 'user.png', NULL, '2023-04-12 20:46:29', NULL),
('stdt-baf55', 'Roiman Dario', 'Martinez Mera', 'rdmartinez3@espe.edu.ec', 'rd635416', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:56:07', '2023-04-03 19:10:58'),
('stdt-bc660', 'Paola Abigail', 'Villamarin Sanchez', 'pavillamarin3@espe.edu.ec', 'PV182309', 'editor', 'student', 'user.png', NULL, '2023-04-05 10:38:00', NULL),
('stdt-c0f76', 'Antonio Adolfo', 'Valeriano Pilay', 'aavaleriano@espe.edu.ec', 'AA323897', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:45:43', NULL),
('stdt-c120f', 'Yuliana Lisbeth', 'Chanaluisa  Simbaña', 'ylchanaluisa@espe.edu.ec', 'CS233456', 'editor', 'student', 'user.png', NULL, '2023-04-05 10:36:52', NULL),
('stdt-c2da5', 'Medardo Romel', 'Campues Alba', 'rmcampues@espe.edu.ec', 'MR231654', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:30:59', NULL),
('stdt-c2f67', 'Esteven Olmedo', 'Nacimba Loachamin', 'eonacimba@espe.edu.ec', 'EO961279', 'editor', 'student', 'user.png', NULL, '2023-04-05 11:39:09', '2023-04-06 10:34:01'),
('stdt-c4228', 'Stephany Domenica', 'Medina Sandoval', 'sdmedina@espe.edu.ec', 'SD111111', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:40:04', '2023-04-04 10:44:19'),
('stdt-c45dd', 'Dennis Arturo', 'Quishpi Guaman', 'daquishpi@espe.edu.ec', 'da677775', 'editor', 'student', 'user.png', NULL, '2023-04-03 19:07:09', NULL),
('stdt-c7497', 'Johanna Elizabeth', 'Sanaguano Torres', 'jesanaguano@espe.edu.ec', 'JE111111', 'editor', 'student', 'user.png', NULL, '2023-04-03 15:29:06', '2023-04-03 16:07:25'),
('stdt-cb4de', 'Romina Nycole', 'Ormaza Huertas', 'mormaza@espe.edu.ec', 'OH654332', 'editor', 'student', 'user.png', NULL, '2023-04-03 12:03:16', '2023-04-04 11:14:21'),
('stdt-d2b25', 'Pamela Camila', 'Sani Ordoñez', 'pcsani@espe.edu.ec', 'pc298505', 'editor', 'student', 'user.png', NULL, '2023-04-10 09:43:38', NULL),
('stdt-d2c5d', 'Diego Andres', 'Mantilla Sarauz', 'damantilla5@espe.edu.ec', 'Da202314', 'editor', 'student', 'user.png', NULL, '2023-04-04 11:59:41', '2023-04-05 10:07:35'),
('stdt-d3f80', 'Melany Jailyn', 'Falcón Fuentes', 'mjfalcon3@espe.edu.ec', 'Mfalcon8', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:03:26', '2023-04-06 10:44:10'),
('stdt-d40d9', 'Maryorie Fernanda', 'Diaz Guairacaja', 'mfdiaz5@espe.edu.ec', 'MF111111', 'editor', 'student', 'user.png', NULL, '2023-04-03 15:46:50', '2023-04-03 16:45:35'),
('stdt-d488d', 'Diego Alejandro', 'Guzman Cajas', 'daguzman2@espe.edu.ec', 'DA534155', 'editor', 'student', 'user.png', NULL, '2023-04-05 09:39:23', NULL),
('stdt-d7fe1', 'Viviana Elizabeth', 'Zapata Pila', 'vezapata3@espe.edu.ec', 've656653', 'editor', 'student', 'user.png', NULL, '2023-04-03 19:04:22', '2023-04-04 10:54:50'),
('stdt-da0d5', 'Nicole Denisse', 'Nieto Delgado', 'ndnieto@espe.edu.ec', 'ND111111', 'editor', 'student', 'user.png', NULL, '2023-04-03 15:36:53', '2023-04-03 15:56:27'),
('stdt-dd28c', 'Ricardo Alejandro', 'Jaramillo Salgado', 'nrjaramillo2@espe.edu.ec', 'student1', 'editor', 'student', 'stdt-dd28c348.png', '2023-03-30 12:01:53', '2023-03-30 12:00:26', '2023-04-05 10:19:09'),
('stdt-dd301', 'Germán Andres', 'Neppas Jara', 'ganeppas@espe.edu.ec', 'GN401928', 'editor', 'student', 'user.png', NULL, '2023-04-05 10:34:00', '2023-04-05 10:45:34'),
('stdt-dd37c', 'Jennyfer Pamel', 'Zurita Moposita', 'jpzurita4@espe.edu.ec', 'JP906352', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:51:54', '2023-04-06 10:27:55'),
('stdt-de61b', 'Kenneth Sebastian', 'Acurio Velastegui', 'ksacurio@espe.edu.ec', 'Ks210554', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:27:51', '2023-04-05 09:59:03'),
('stdt-de94d', 'Lizbeth Mabel', 'López Tello', 'Lmlopez9@espe.edu.ec', 'ml461447', 'editor', 'student', 'user.png', NULL, '2023-04-14 09:34:33', NULL),
('stdt-e0c69', 'Jhon Jairo', 'Alvarado Montaguano', 'jjalvarado5@espe.edu.ec', 'JJ654654', 'editor', 'student', 'user.png', NULL, '2023-04-05 10:29:06', NULL),
('stdt-e47c1', 'Ariel Sebastian', 'Castro Rey', 'ascastro2@espe.edu.ec', 'as123456', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:39:46', NULL),
('stdt-e7a09', 'Liseth Hermelinda', 'Gahui Sayago', 'lhgahui@espe.edu.ec', 'LH561465', 'editor', 'student', 'user.png', NULL, '2023-04-04 09:53:07', NULL),
('stdt-e7d62', 'Katherin Lizbeth', 'Chamorro Gomez', 'Chamklchamorro@espe.edu.ec', 'CG541134', 'editor', 'student', 'user.png', NULL, '2023-04-04 09:53:42', '2023-04-04 11:17:33'),
('stdt-eac16', 'Dayana Salome', 'Benitez Saavedra', 'dsbenitez2@espe.edu.ec', 'ds773632', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:25:18', '2023-04-04 10:50:03'),
('stdt-ec4c3', 'Cristian Alejandro', 'Armas Lastra', 'caarmas4@espe.edu.ec', 'AL564337', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:43:12', NULL),
('stdt-ed27b', 'Mike Alexander', 'Salazar Castillo', 'masalazar33@espe.edu.ec', 'MA784532', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:41:29', NULL),
('stdt-ee204', 'Melany Valeria', 'Aceldo Chala', 'mvaceldo@espe.edu.ec', 'AC321335', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:27:44', NULL),
('stdt-eec19', 'Byron Martin', 'Guacho Ojeda', 'bmguacho@espe.edu.ec', 'GO976339', 'editor', 'student', 'user.png', NULL, '2023-04-04 11:01:16', NULL),
('stdt-f512a', 'Stefany Alejandra', 'Velasco Quilumba', 'savelasco3@espe.edu.ec', 'VQ986536', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:36:04', NULL),
('stdt-f6c53', 'Myckel Sebast', 'Chamorro Sanchez', 'mschamorro@espe.edu.ec', 'ms123456', 'editor', 'student', 'user.png', NULL, '2023-04-03 11:44:38', NULL),
('stdt-f6e13', 'Alisson Mishell', 'Rea Vasquez', 'amrea3@espe.edu.ec', 'RV453934', 'editor', 'student', 'user.png', NULL, '2023-04-04 10:13:28', NULL),
('stdt-fa3ec', 'Jadira Jackeline', 'Achote Chugcho', 'jjachote@espe.edu.ec', 'jjach452', 'editor', 'student', 'user.png', NULL, '2023-04-04 09:59:57', '2023-04-05 10:40:05'),
('stdt-fc76f', 'Roy Sebastián', 'Maiza López', 'rsmaiza@espe.edu.ec', 'rs443650', 'editor', 'student', 'user.png', NULL, '2023-04-12 09:26:03', NULL),
('student', 'Ricardo', 'Jaramillo', 'test@gmail.com', 'student1', 'editor', 'student', 'user.png', '2022-02-22 15:18:06', '2021-12-05 18:27:39', '2023-03-29 15:04:39'),
('tchr-f2ccd', 'Galo Hernan', 'Garcia Tamayo', 'ghgarcia1@espe.edu.ec', '18028589', 'editor', 'teacher', 'user.png', NULL, '2023-04-12 11:12:25', NULL),
('teacher', 'Steven', 'Cardenas', 'teacher@gmail.com', 'teacher1', 'editor', 'teacher', 'user.png', '2022-02-22 15:18:06', '2021-05-01 00:00:00', '2023-04-03 10:41:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administratives`
--
ALTER TABLE `administratives`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indices de la tabla `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id_attendance`);

--
-- Indices de la tabla `attendance_details`
--
ALTER TABLE `attendance_details`
  ADD KEY `FK_attendance_details_attendance` (`id_attendance`);

--
-- Indices de la tabla `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`career`),
  ADD UNIQUE KEY `career` (`career`);

--
-- Indices de la tabla `emprendedor`
--
ALTER TABLE `emprendedor`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indices de la tabla `school_periods`
--
ALTER TABLE `school_periods`
  ADD PRIMARY KEY (`school_period`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `user` (`user`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
db_limetastore