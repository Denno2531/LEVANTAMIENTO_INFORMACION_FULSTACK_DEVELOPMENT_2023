-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.2.0 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para db_li
CREATE DATABASE IF NOT EXISTS `db_li` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_li`;

-- Volcando estructura para tabla db_li.administratives
CREATE TABLE IF NOT EXISTS `administratives` (
  `user` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `cedula` varchar(30) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `id` varchar(18) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `carrer` varchar(80) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `sede` varchar(15) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `celular` varchar(30) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.attendance
CREATE TABLE IF NOT EXISTS `attendance` (
  `id_attendance` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `id_group` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `school_period` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `semester` int NOT NULL,
  `subject` varchar(400) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `user_teacher` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `registered` date NOT NULL,
  `update_registered` int DEFAULT NULL,
  PRIMARY KEY (`id_attendance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.attendance_details
CREATE TABLE IF NOT EXISTS `attendance_details` (
  `id_attendance` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `id_group` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `school_period` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `semester` int NOT NULL,
  `subject` varchar(400) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `user_teacher` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `registered` date NOT NULL,
  `update_registered` date DEFAULT NULL,
  `user_student` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `attend` int NOT NULL DEFAULT '0',
  `tardiness` int NOT NULL DEFAULT '0',
  `absent` int NOT NULL DEFAULT '0',
  KEY `FK_attendance_details_attendance` (`id_attendance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.careers
CREATE TABLE IF NOT EXISTS `careers` (
  `career` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `description` text COLLATE utf8mb3_spanish2_ci,
  PRIMARY KEY (`career`),
  UNIQUE KEY `career` (`career`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.department
CREATE TABLE IF NOT EXISTS `department` (
  `id_department` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_department`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.emprendedor
CREATE TABLE IF NOT EXISTS `emprendedor` (
  `user` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `workinghours` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `education` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `socialnetworks` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `salesyear` float NOT NULL DEFAULT '0',
  `heritage` float NOT NULL DEFAULT '0',
  `gender` varchar(30) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `cedula` varchar(18) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `pass` varchar(15) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `organization` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `nameorganization` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `state` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `startdate` date DEFAULT NULL,
  `socialsales` varchar(50) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.infoq
CREATE TABLE IF NOT EXISTS `infoq` (
  `user` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `num` varchar(2000) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `archivopdf` blob NOT NULL,
  `descripcion` text COLLATE utf8mb3_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `message` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `evidencepdf` blob NOT NULL,
  `message_student` text COLLATE utf8mb3_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.justificaciones
CREATE TABLE IF NOT EXISTS `justificaciones` (
  `user` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `num` varchar(2000) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `archivopdf` blob NOT NULL,
  `descripcion` varchar(2000) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estado` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `evidencepdf` blob NOT NULL,
  `message_student` text COLLATE utf8mb3_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.notify
CREATE TABLE IF NOT EXISTS `notify` (
  `user` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `mensaje` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `nombrepdf` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `estado` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.school_periods
CREATE TABLE IF NOT EXISTS `school_periods` (
  `school_period` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `active` int NOT NULL,
  `current` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`school_period`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.send_one
CREATE TABLE IF NOT EXISTS `send_one` (
  `user` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `num` varchar(2000) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `archivopdf` blob NOT NULL,
  `descripcion` text COLLATE utf8mb3_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` text COLLATE utf8mb3_spanish2_ci NOT NULL,
  `message` text COLLATE utf8mb3_spanish2_ci NOT NULL,
  `evidencepdf` blob NOT NULL,
  `message_student` text COLLATE utf8mb3_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.send_two
CREATE TABLE IF NOT EXISTS `send_two` (
  `user` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `num` varchar(2000) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `archivopdf` longblob NOT NULL,
  `descripcion` text COLLATE utf8mb3_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` text COLLATE utf8mb3_spanish2_ci NOT NULL,
  `message` text COLLATE utf8mb3_spanish2_ci NOT NULL,
  `evidencepdf` longblob NOT NULL,
  `message_student` text COLLATE utf8mb3_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.students
CREATE TABLE IF NOT EXISTS `students` (
  `user` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sede` varchar(30) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `cedula` varchar(18) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `id` varchar(13) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `career` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `horas` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `asistencia` text COLLATE utf8mb3_spanish2_ci,
  `horario` text COLLATE utf8mb3_spanish2_ci,
  `documentation` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `jerarquia` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `jornada` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `admission_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `finish_date` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.subjects
CREATE TABLE IF NOT EXISTS `subjects` (
  `subject` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `career` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `semester` int NOT NULL,
  `description` text COLLATE utf8mb3_spanish2_ci,
  `user_teachers` text COLLATE utf8mb3_spanish2_ci NOT NULL,
  PRIMARY KEY (`subject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `user` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `cedula` varchar(18) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `id` varchar(13) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `level_studies` varchar(30) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `career` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_li.users
CREATE TABLE IF NOT EXISTS `users` (
  `user` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `pass` varchar(100) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `permissions` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `rol` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `image_updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para vista db_li.v_infoq_students_teacher
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `v_infoq_students_teacher` 
) ENGINE=MyISAM;

-- Volcando estructura para vista db_li.v_infoq_students_teacher
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `v_infoq_students_teacher`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_infoq_students_teacher` AS select `infoq`.`num` AS `num`,`infoq`.`archivopdf` AS `archivopdf`,`department`.`teacher` AS `teacher`,`students`.`name` AS `name`,`students`.`surnames` AS `surnames`,`students`.`user` AS `user` from ((`infoq` join `students` on((`infoq`.`user` = `students`.`user`))) join `department` on((`students`.`departamento` = `department`.`id_department`)));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
