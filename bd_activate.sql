-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.26 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para db_activate
CREATE DATABASE IF NOT EXISTS `db_activate` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_bin */;
USE `db_activate`;

-- Volcando estructura para tabla db_activate.configuraciones
CREATE TABLE IF NOT EXISTS `configuraciones` (
  `idConfiguracion` int(11) NOT NULL AUTO_INCREMENT,
  `metrosPaso` float DEFAULT NULL,
  PRIMARY KEY (`idConfiguracion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla db_activate.configuraciones: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `configuraciones` DISABLE KEYS */;
INSERT INTO `configuraciones` (`idConfiguracion`, `metrosPaso`) VALUES
	(1, 79);
/*!40000 ALTER TABLE `configuraciones` ENABLE KEYS */;

-- Volcando estructura para tabla db_activate.detalle_usuario
CREATE TABLE IF NOT EXISTS `detalle_usuario` (
  `idDetalleUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `nombreUsuario` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `apellidosUsuario` varchar(100) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`idDetalleUsuario`),
  KEY `idUsuario1` (`idUsuario`),
  CONSTRAINT `idUsuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla db_activate.detalle_usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_usuario` DISABLE KEYS */;
INSERT INTO `detalle_usuario` (`idDetalleUsuario`, `idUsuario`, `nombreUsuario`, `apellidosUsuario`) VALUES
	(1, 1, 'Hipolito', 'Castillo'),
	(2, 2, 'Luz ', 'Lopez'),
	(3, 4, 'Roberto', 'Trejo'),
	(4, 3, 'Tere', 'Muro');
/*!40000 ALTER TABLE `detalle_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla db_activate.recorridos
CREATE TABLE IF NOT EXISTS `recorridos` (
  `idRecorrido` int(11) NOT NULL AUTO_INCREMENT,
  `fechaRecorrido` datetime DEFAULT NULL,
  `pasosRecorridos` float DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRecorrido`),
  KEY `idUsuario2` (`idUsuario`),
  CONSTRAINT `idUsuario2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla db_activate.recorridos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `recorridos` DISABLE KEYS */;
INSERT INTO `recorridos` (`idRecorrido`, `fechaRecorrido`, `pasosRecorridos`, `idUsuario`) VALUES
	(1, '2016-11-27 14:28:41', 25, 1),
	(2, '2016-11-27 16:14:47', 20, 2),
	(3, '2016-11-27 16:18:53', 50, 1),
	(4, '2016-11-27 16:19:02', 100, 3),
	(5, '2016-11-27 16:31:52', 50, 1),
	(6, '2016-11-27 16:32:19', 50, 2),
	(7, '2016-11-27 16:32:31', 505, 4),
	(8, '2016-11-27 19:05:02', 550, 2);
/*!40000 ALTER TABLE `recorridos` ENABLE KEYS */;

-- Volcando estructura para tabla db_activate.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `password` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `statusUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla db_activate.usuarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idUsuario`, `usuario`, `password`, `statusUsuario`) VALUES
	(1, 'hpolo', '1234', 1),
	(2, 'llopez', '1234', 1),
	(3, 'tmunoz', '1234', 1),
	(4, 'rtrejo', '1234', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
