-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-05-2023 a las 05:37:15
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sitio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `usuario`, `contraseña`) VALUES
(1, 'Paco', 'KratosCool');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `informacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagen` varchar(1064) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `informacion`, `imagen`) VALUES
(42, 'Sable de luz ', 'Sable de Luz, RGB LED de color Rojo, La Lucea Puede Parpadear, con Sonido y Mango Metalico', '1683050987_S2.jpg'),
(43, 'Sable de luz ', 'Sable de Luz, RGB LED de color Azul, La Lucea Puede Parpadear, con Sonido y Mango Metalico', '1683051031_S3.jpg'),
(41, 'Sable de luz ', 'Sable de Luz, RGB LED de color verde, La Lucea Puede Parpadear, con Sonido y Mango Metalico', '1683050548_S1.jpg'),
(44, 'Comic', 'Star Wars by Jason Aaron Omnibus [New Printing]', '1683051126_C1.jpg'),
(45, 'Comic', 'Star Wars: La Guerra De Los Bounty Hunters: 1 ', '1683051156_C2.jpg'),
(46, 'Comic', 'Darth Vader N.2 - Star Wars Omnibus HC - Editorial Panini', '1683051177_C3.jpg'),
(47, 'Cosplay', 'Disfraces de moda de los hombres Star Wars Jedi Robe Costume – Brown Talla M', '1683051354_D1.jpg'),
(48, 'Cosplay', 'Star Wars: The Force Awakens Deluxe Adult Kylo Ren', '1683051378_D2.jpg'),
(49, 'Cosplay', 'Partymall Conjunto completo de bata con capucha para hombre', '1683051478_D3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `pass`) VALUES
(4, '', '', ''),
(3, 'Luis', 'miguel@jh.mc', 'Sisas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
