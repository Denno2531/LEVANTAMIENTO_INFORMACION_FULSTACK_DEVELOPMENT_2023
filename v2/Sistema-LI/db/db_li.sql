-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-04-2022 a las 17:54:14
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_li`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administratives`
--

CREATE TABLE `administratives` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL UNIQUE,
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
('admin', 'Andres', 'Carrera', '1997-04-05', '1600943241', 'L0012312', 'Tecnologias de la Informacion', 'matriz', 'nandy@gmail.com', '0983525002', 'root', '2021-12-05 18:27:39', '2022-04-03 06:10:34');
 
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
  `attend` int(1) NOT NULL DEFAULT '0',
  `tardiness` int(1) NOT NULL DEFAULT '0',
  `absent` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `careers`
--

CREATE TABLE `careers` (
  `career` varchar(20) COLLATE utf8_spanish2_ci NOT NULL UNIQUE,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `description` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `careers`
--

INSERT INTO `careers` (`career`, `name`, `description`) VALUES
('IDS', 'Ingeniería en Desarrollo de Software', 'Es la aplicación práctica del conocimiento científico y humanístico al diseño y construcción de programas de computadora, diseñando soluciones de software innovadoras y acordes con el entorno social y empresarial, mediante herramientas, técnicas, tecnologías de usabilidad, base de datos, redes, teleproceso y lenguajes de programación. En Politécnica de Chiapas formamos ingenieros profesionales especializados en el desarrollo de software; capaces de crear, innovar y aplicar la tecnología para ofrecer soluciones en las áreas de la comunicación digital, automatización, negocios, sistemas computacionales, educación, transportes, diversión y entretenimiento.'),
('IEM', 'Ingeniería Mecatrónica', 'En esta Ingeniería se combinan diversas disciplinas como la mecánica, electrónica, computación, y control. Las (os) ingenieros mecatrónicos diseñan, integran y desarrollan diversos productos, mecanismos, equipos, maquinaria y sistemas integrales de automatización, así como la elaboración de análisis y consultorías técnicas en procesos relacionados con las áreas de aplicación de la ingeniería mecatrónica, todo esto con la ayuda de herramientas de hardware y software de vanguardia. En la Politécnica de Chiapas contamos con una formación integral, humana, práctica, teórica, empresarial, que permite a nuestras (os) ingenieros desarrollar e implementar tecnología para ofrecer soluciones que contribuyan a mejorar la calidad de vida de las personas así como optimizar los recursos de las empresas. Para ello, contamos con laboratorios equipados, académicos reconocidos y un programa educativo reconocido por una institución de calidad, CACEI.'),
('INGBIO', 'Ingeniería Biomédica', 'En esta rama de la ingeniería se fusionan aspectos de electrónica, medicina, física, informática, química, biología y matemáticas. Las y los ingenieros biomédicos diseñan, crean, desarrollan, innovan e implementan equipos, dispositivos y sistemas médicos que ofrezcan soluciones tecnológicas y científicas en el área de la salud; así también manejan programas de mejoramiento, administración, operación y conservación de instalaciones y equipo hospitalario. En Politécnica de Chiapas formamos ingenieras (os) biomédicos profesionales y especializados, con valores, capaces de desarrollar, adoptar y aplicar la tecnología para ofrecer soluciones científicas y administrativas integrales en el campo de la salud en nuestro país.'),
('INGPLRA', 'Ingeniería Petrolera', 'El ingeniero petrolero se forma aprovechando de manera sustentable los recursos naturales, atendiendo la preservación del medio ambiente, aplicando para ello las nuevas tecnologías, con habilidades, actitudes, aptitudes analíticas y creativas, de liderazgo y calidad humana, con un espíritu de superación permanente para investigar, desarrollar y aplicar el conocimiento científico y tecnológico. Las y los ingenieros petroleros son profesionistas capaces de atender las necesidades emanadas de los procesos de explotación de hidrocarburos, de agua y de energía geotérmica, a fin de redituar beneficios económicos al país y prever los posibles daños ecológicos al medio ambiente. En la Politécnica de Chiapas formamos ingenieros(as) petroleros de manera profesional, técnica y humana, comprometidos con las necesidades sociales, ambientales y económicas.'),
('MATBASICAS', 'Tronco común', 'El Mejor lider del Mundo'),
('MTABIOTEC', 'Maestría en Biotecnología', 'Mediante la biotecnología, los científicos buscan formas de aprovechar la \"tecnología biológica\" de los seres vivos para generar alimentos más saludables, mejores medicamentos, materiales más resistentes o menos contaminantes, cultivos más productivos, fuentes de energía renovables e incluso sistemas para eliminar la contaminación.\r\n\r\nLas y los maestros en Biotecnología podrán coadyuvar en la incorporación de procesos y técnicas biotecnológicas para la producción y transformación en diferentes sectores socioeconómicos, así también podrán participar en ámbitos académicos, empresariales y de investigación.');

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
('2023-SI', 'Enero - Abril 2023', '2023-01-06', '2023-04-09', 1, 0, '2023-12-04 00:57:04', '2023-02-04 06:15:56'),
('2023-SII', 'Abril - Julio 2023', '2023-04-30', '2023-07-23', 1, 0, '2023-10-08 20:38:04', '2023-02-04 06:14:40'),
('2023-SIII', 'Septiembre - Diciembre 2023', '2023-08-30', '2023-12-14', 1, 0, '2023-12-04 00:59:21', '2023-03-13 04:02:16'),
('2022-SI', 'Enero - Abril 2022', '2022-01-03', '2022-04-26', 1, 1, '2022-01-05 05:37:49', '2022-03-13 03:27:59'),
('2022-SII', 'Abril - Julio 2022', '2022-04-27', '2022-07-08', 1, 0, '2022-04-03 05:30:20', '2022-04-03 06:10:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL UNIQUE,
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
  `career` VARCHAR(20) COLLATE utf8_spanish2_ci NOT NULL,
  `horas` VARCHAR(20) COLLATE utf8_spanish2_ci NOT NULL,
  `asistencia` TEXT COLLATE utf8_spanish2_ci,
  `horario` TEXT COLLATE utf8_spanish2_ci,
  `documentation` VARCHAR(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` VARCHAR(50) COLLATE utf8_spanish2_ci NOT NULL,
  `departamento` VARCHAR(50) COLLATE utf8_spanish2_ci NOT NULL,
  `jerarquia` VARCHAR(50) COLLATE utf8_spanish2_ci NOT NULL,
  `jornada` VARCHAR(50) COLLATE utf8_spanish2_ci NOT NULL,
  `admission_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` () VALUES
('stdt-c9c11','Ricardo Alejandro','Jaramillo Salgado','nrjaramillo2@espe.edu.ec',2000-03-23,'matriz','1750245779','student1','L00361339','0981122469','Las Naranjas y Av. Amazonas','IDS','96',' ','09:00-12:00','EN PROCESO','finalizado','LEVANTAMIENTO DE INFORMACIÓN','APOYO2','Vespertino','2023-02-24','2023-03-29 12:38:57','2023-03-29 17:11:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--
CREATE TABLE `subjects` (
 `subject` VARCHAR(20) COLLATE utf8_spanish2_ci NOT NULL,
 `career` VARCHAR(20) COLLATE utf8_spanish2_ci NOT NULL,
 `name` VARCHAR(100) COLLATE utf8_spanish2_ci NOT NULL,
 `semester` INT(2) NOT NULL,
 `description` TEXT COLLATE utf8_spanish2_ci,
 `user_teachers` TEXT COLLATE utf8_spanish2_ci NOT NULL
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
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL UNIQUE,
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

 INSERT INTO `teachers` (`user`, `name`, `surnames`, `date_of_birth`, `gender`, `cedula`, `id`,`pass`, `phone`, `address`, `level_studies`,`email`, `career`, `created_at`, `updated_at`) VALUES
 ('teacher', 'Steven', 'Cardenas', '2001-04-20', 'hombre', '1750245009', 'L00123456', 'teacher','0983594591','Avenida Libertador Simon Bolivar', 'Ingenieria', 'edit@gmail.com','IDS', '2021-05-01 00:00:00', '2022-04-03 06:10:34');
 


-- --------------------------------------------------------

--
-- Creacion de Tabla Emprendedores
--
CREATE TABLE `emprendedor` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL UNIQUE,
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


INSERT INTO `emprendedor` (`user`,`name`,`surnames`,`date_of_birth`,`gender`,`cedula`,`pass`,`phone`,`address`,`email`,`created_at`,`updated_at`) VALUES
('empre','Luis','LLumiq','2000-03-17','mujer','1713905213','empre','0987345672','Ecuatoriana','edor@gmail.com','2021-05-01 00:00:00', '2022-04-03 06:10:34');

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
  `image_updated_at` timestamp DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=UTF8_SPANISH2_CI;

--
-- Volcado de datos para la tabla `users`
--
-- Commit

INSERT INTO `users` (`user`, `name`,`surnames`,`email`, `pass`, `permissions`, `rol`, `image`, `image_updated_at`, `created_at`, `updated_at`) VALUES
('admin', 'Andres', 'Carrera', 'nandy@gmail.com', 'root', 'admin','admin', 'admin221.png', '2022-02-22 15:18:06', '2021-12-05 18:27:39', '2022-04-03 06:10:34'),
('editor',  'Angela', 'Champ','magomez@gmail.com', 'editor', 'editor','editor', 'user.png', '2022-02-22 15:18:10', '2021-12-04 02:13:36', '2022-03-13 02:59:59'),
('student', 'Ricardo', 'Jaramillo', 'test@gmail.com', 'student', 'editor','student', 'user.png', '2022-02-22 15:18:06', '2021-12-05 18:27:39', '2022-04-03 06:10:34'),
('teacher', 'Steven', '	Cardenas', 'edit@gmail.com', 'teacher', 'editor', 'teacher','user.png', '2022-02-22 15:18:06', '2021-05-01 00:00:00', '2022-04-03 06:10:34'),
('empre', 'Luis', 'LLumiq', 'edor@gmail.com', 'empre', 'editor','empre', 'user.png', '2022-02-22 15:18:06', '2021-05-01 00:00:00', '2022-04-03 06:10:34');


-- db_schoolusers


-- Índices para tablas volcadas
--
--
-- Indices de la tabla `administratives`
--
ALTER TABLE `administratives`
  ADD PRIMARY KEY (`user`);

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
  ADD PRIMARY KEY (`career`);

--
-- Indices de la tabla `school_periods`
--
ALTER TABLE `school_periods`
  ADD PRIMARY KEY (`school_period`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`user`);
--
-- Indices de la tabla `emprendedor`
--
  
ALTER TABLE `emprendedor`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;db_lidb_li