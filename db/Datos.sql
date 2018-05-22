-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2018 a las 05:36:48
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sracg`
--

--
-- Volcado de datos para la tabla `parque`
--

INSERT INTO `parque` (`numParque`, `nomParque`) VALUES
(1, 'Parque Nacional Santa Rosa'),
(2, 'Parque Nacional Guanacaste');

--
-- Volcado de datos para la tabla `patrocinador`
--

INSERT INTO `patrocinador` (`idPatrocinador`, `nombre`, `correo`, `clave`, `tipo`, `telefono`) VALUES
(1, 'admin', 'admin@email.com', 'admin1', 'Administrador', 0),
(116020408, 'Marco Garita', 'marcogaray15@hotmail.com', 'marcotally', 'Administrador', 86424010),
(504100307, 'Kimberly', 'yesse@email.com', 'kim', 'Suplente', 84997712);

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idPersona`, `tipo`, `precio`, `cantidad`, `total`, `numReservacion`, `tipoMoneda`) VALUES
(443, 'Hombre Nacional', 1000, 1, 1000, 52, 'C'),
(444, 'Mujer Extranjera', 20, 1, 20, 52, 'D');

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`numReservacion`, `parqueNacional`, `sector`, `ingresoPor`, `fEntrada`, `fSalida`, `diaE`, `mesE`, `annoE`, `dias`, `tipoVisita`, `nombreUsuario`, `emailUsuario`, `totalColones`, `totalDolares`, `estado`, `alimentacion`, `laboratorio`, `lavanderia`, `senderos`, `charla`, `aulaConferencia`) VALUES
(52, '1', '1', 'Hospedaje', '2018-05-30', '2018-06-10', 30, 5, 18, '12', 'Turismo', 'Marco Garita Marcenaro', 'marcogaray15@hotmail.com', 12000, 240, 'Completa', 'SI', 'NO', 'NO', 'NO', 'NO', 'NO');

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id`, `nombre`, `capacidad_diaria`, `capacidad_acampar`, `asp`, `parque`) VALUES
(1, 'Sector Murcíelago', NULL, NULL, NULL, 1),
(2, 'Sector Naranjo', NULL, NULL, NULL, 1),
(3, 'Estación Biologica Nancite', NULL, NULL, NULL, 1),
(4, 'Estación Biologica Maritza', NULL, NULL, NULL, 2),
(5, 'Estación Biologica Cacao', NULL, NULL, NULL, 2),
(6, 'Estación Biologica Pitalla', NULL, NULL, NULL, 2);

--
-- Volcado de datos para la tabla `tipovisita`
--

INSERT INTO `tipovisita` (`numTipoVisita`, `nomTipoVisita`) VALUES
(1, 'Turismo'),
(2, 'Investigacion'),
(3, 'Gira');

--
-- Volcado de datos para la tabla `tipovisitante`
--

INSERT INTO `tipovisitante` (`numTipo`, `tipo`, `precio`, `tipoMoneda`) VALUES
(1, 'Mujer Nacional', 1000, 'C'),
(2, 'Hombre Nacional', 1000, 'C'),
(3, 'Niña Nacional', 500, 'C'),
(4, 'Niño Nacional', 500, 'C'),
(5, 'Mujer Extranjera', 20, 'D'),
(6, 'Hombre Extranjero', 20, 'D'),
(7, 'Niña Extranjera', 10, 'D'),
(8, 'Niño Extranjero', 10, 'D');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
