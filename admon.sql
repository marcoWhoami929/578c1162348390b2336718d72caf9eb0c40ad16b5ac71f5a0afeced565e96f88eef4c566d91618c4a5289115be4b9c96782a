-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2021 a las 00:58:53
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `grupo` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `email`, `foto`, `password`, `grupo`, `perfil`, `fecha`) VALUES
(1, 'Elsa Martinez', 'emartinez@sfd.com.mx', 'views/images/user3.png', '$2a$07$asxx54ahjppf45sd87a5auKDio1hHSj00ZPCP7SzPVvh4IM9anuUy', 'Administrador', 'Administrador General', '2021-05-05 17:28:32'),
(2, 'Marco Lopez', 'mlopez@sfd.com.mx', 'views/images/user2.png', '$2a$07$asxx54ahjppf45sd87a5aueDfkNTK7dgdxkWJ2K5auP79BYNE.00K', 'Administrador', 'Administrador General', '2021-05-05 17:28:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `accion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `usuario`, `perfil`, `accion`, `fecha`) VALUES
(1, 'Marco Lopez', 'Administrador General', 'Acceso al Sistema', '2021-05-05 16:48:00'),
(2, 'Marco Lopez', 'Administrador General', 'Acceso al Sistema', '2021-05-05 17:30:58'),
(3, 'Marco Lopez', 'Administrador General', 'Salió del Sistema', '2021-05-05 18:47:45'),
(4, 'Marco Lopez', 'Administrador General', 'Acceso al Sistema', '2021-05-05 18:48:13'),
(5, 'Marco Lopez', 'Administrador General', 'Acceso al Sistema', '2021-05-05 19:14:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canales`
--

CREATE TABLE `canales` (
  `id` int(11) NOT NULL,
  `agente` text COLLATE utf8_spanish_ci NOT NULL,
  `centro` text COLLATE utf8_spanish_ci NOT NULL,
  `canal` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `canales`
--

INSERT INTO `canales` (`id`, `agente`, `centro`, `canal`) VALUES
(1, 'ING. MIGUEL GUTIERREZ A.', 'CEDIS', 'MAYOREO'),
(2, 'ORLANDO BRIONES AGUIRRE', 'CUENTAS CORPORATIVAS', 'FLOTILLAS'),
(3, 'PV MAYORAZGO', '2 MAYORAZGO', 'TIENDAS'),
(4, 'PV REFORMA', '3 REFORMA', 'TIENDAS'),
(5, 'PV SAN MANUEL', '1 SAN MANUEL', 'TIENDAS'),
(6, 'PV SANTIAGO', '6 SANTIAGO', 'TIENDAS'),
(7, 'PV VERGEL', '5 VERGEL', 'TIENDAS'),
(8, 'PV XONACA', '4 XONACA', 'TIENDAS'),
(9, 'PV CAPU', '7 CAPU', 'TIENDAS'),
(10, 'JOSE LUIS TEXIS ROSAS', 'RUTA 3', 'RUTAS'),
(11, 'JONATHAN GONZALEZ SANCHEZ', 'CUENTAS CORPORATIVAS', 'FLOTILLAS'),
(12, 'ROCIO MARTINEZ MORALES', 'CEDIS', 'MAYOREO'),
(13, 'PV TORRES', '9 TORRES', 'TIENDAS'),
(14, 'GOMEZ RODRIGUEZ ERICK', 'RUTA 2', 'RUTAS'),
(15, 'RAFAEL MAURICIO GUTIERREZ CARPINTEYRO', 'RUTA 4', 'RUTAS'),
(16, 'HERLINDA LUCHA CUELLAR', 'CUENTAS CORPORATIVAS', 'FLOTILLAS'),
(17, 'MARIO HERNANDEZ RAMIREZ', 'RUTA 5', 'RUTAS'),
(18, 'OSCAR RAMOS LANDEROS', 'CUENTAS CORPORATIVAS', 'FLOTILLAS'),
(19, 'VICTOR MANUEL IZQUIERDO SANCHEZ', 'CUENTAS CORPORATIVAS', 'FLOTILLAS'),
(20, 'GERONIMO BAUTISTA ESCUDERO', 'CEDIS', 'MAYOREO'),
(21, 'JESUS GARCIA MANJARREZ', 'CUENTAS CORPORATIVAS', 'FLOTILLAS'),
(22, 'GABRIEL ANDRADE PASTRANA', 'CEDIS', 'MAYOREO'),
(23, 'ORLANDO BRIONES AGUIRRE', 'CEDIS', 'MAYOREO'),
(24, 'GERONIMO BAUTISTA ESCUDERO', 'CEDIS', 'MAYOREO'),
(25, 'JOSE LUIS TEXIS ROSAS', 'RUTA 3', 'RUTAS'),
(26, 'MARIO HERNANDEZ RAMIREZ', 'RUTA 5', 'RUTAS'),
(27, 'ING. MIGUEL GUTIERREZ A.', 'CEDIS ', 'MAYOREO'),
(28, 'ROCIO MARTINEZ MORALES', 'CEDIS', 'MAYOREO'),
(29, 'GOMEZ RODRIGUEZ ERICK', 'RUTA 2', 'RUTAS'),
(30, 'PV REFORMA', '3 REFORMA', 'TIENDAS'),
(31, 'GABRIEL ANDRADE PASTRANA', 'CEDIS', 'MAYOREO'),
(32, 'SIN ASIGNAR', 'CEDIS', 'MAYOREO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `id` int(11) NOT NULL,
  `numDia` int(11) NOT NULL,
  `dia` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`id`, `numDia`, `dia`) VALUES
(1, 1, 'Lunes'),
(2, 2, 'Martes'),
(3, 3, 'Miércoles'),
(4, 4, 'Jueves'),
(5, 5, 'Viernes'),
(6, 6, 'Sábado'),
(7, 7, 'Domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diascredito`
--

CREATE TABLE `diascredito` (
  `id` int(11) NOT NULL,
  `dias` int(11) NOT NULL,
  `condiciones` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `diascredito`
--

INSERT INTO `diascredito` (`id`, `dias`, `condiciones`) VALUES
(1, 0, 'CONTADO'),
(2, 1, 'CREDITO'),
(3, 2, 'CREDITO'),
(4, 3, 'CREDITO'),
(5, 4, 'CREDITO'),
(6, 5, 'CREDITO'),
(7, 6, 'CREDITO'),
(8, 7, 'CREDITO'),
(9, 8, 'CREDITO'),
(10, 9, 'CREDITO'),
(11, 10, 'CREDITO'),
(12, 11, 'CREDITO'),
(13, 12, 'CREDITO'),
(14, 13, 'CREDITO'),
(15, 14, 'CREDITO'),
(16, 15, 'CREDITO'),
(17, 16, 'CREDITO'),
(18, 17, 'CREDITO'),
(19, 18, 'CREDITO'),
(20, 19, 'CREDITO'),
(21, 20, 'CREDITO'),
(22, 21, 'CREDITO'),
(23, 22, 'CREDITO'),
(24, 23, 'CREDITO'),
(25, 24, 'CREDITO'),
(26, 25, 'CREDITO'),
(27, 26, 'CREDITO'),
(28, 27, 'CREDITO'),
(29, 28, 'CREDITO'),
(30, 29, 'CREDITO'),
(31, 30, 'CREDITO'),
(32, 45, 'CREDITO'),
(33, 60, 'CREDITO'),
(34, 90, 'CREDITO'),
(35, 100, 'CREDITO'),
(36, 120, 'CREDITO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diasmes`
--

CREATE TABLE `diasmes` (
  `id` int(11) NOT NULL,
  `fecha` text COLLATE utf8_spanish_ci NOT NULL,
  `mes` text COLLATE utf8_spanish_ci NOT NULL,
  `dia` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `semana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `diasmes`
--

INSERT INTO `diasmes` (`id`, `fecha`, `mes`, `dia`, `nombre`, `semana`) VALUES
(1, '01/01/2020', 'Enero', 1, 'Miercoles', 1),
(2, '02/01/2020', 'Enero', 2, 'Jueves', 1),
(3, '03/01/2020', 'Enero', 3, 'Viernes', 2),
(4, '04/01/2020', 'Enero', 4, 'S?bado', 2),
(5, '05/01/2020', 'Enero', 5, 'Domingo', 2),
(6, '06/01/2020', 'Enero', 6, 'Lunes', 2),
(7, '07/01/2020', 'Enero', 7, 'Martes', 2),
(8, '08/01/2020', 'Enero', 8, 'Mi?rcoles', 2),
(9, '09/01/2020', 'Enero', 9, 'Jueves', 2),
(10, '10/01/2020', 'Enero', 10, 'Viernes', 3),
(11, '11/01/2020', 'Enero', 11, 'S?bado', 3),
(12, '12/01/2020', 'Enero', 12, 'Domingo', 3),
(13, '13/01/2020', 'Enero', 13, 'Lunes', 3),
(14, '14/01/2020', 'Enero', 14, 'Martes', 3),
(15, '15/01/2020', 'Enero', 15, 'Mi?rcoles', 3),
(16, '16/01/2020', 'Enero', 16, 'Jueves', 3),
(17, '17/01/2020', 'Enero', 17, 'Viernes', 4),
(18, '18/01/2020', 'Enero', 18, 'S?bado', 4),
(19, '19/01/2020', 'Enero', 19, 'Domingo', 4),
(20, '20/01/2020', 'Enero', 20, 'Lunes', 4),
(21, '21/01/2020', 'Enero', 21, 'Martes', 4),
(22, '22/01/2020', 'Enero', 22, 'Mi?rcoles', 4),
(23, '23/01/2020', 'Enero', 23, 'Jueves', 4),
(24, '24/01/2020', 'Enero', 24, 'Viernes', 5),
(25, '25/01/2020', 'Enero', 25, 'S?bado', 5),
(26, '26/01/2020', 'Enero', 26, 'Domingo', 5),
(27, '27/01/2020', 'Enero', 27, 'Lunes', 5),
(28, '28/01/2020', 'Enero', 28, 'Martes', 5),
(29, '29/01/2020', 'Enero', 29, 'Mi?rcoles', 5),
(30, '30/01/2020', 'Enero', 30, 'Jueves', 5),
(31, '31/01/2020', 'Enero', 31, 'Viernes', 5),
(32, '01/02/2020', 'Febrero', 1, 'S?bado', 1),
(33, '02/02/2020', 'Febrero', 2, 'Domingo', 1),
(34, '03/02/2020', 'Febrero', 3, 'Lunes', 1),
(35, '04/02/2020', 'Febrero', 4, 'Martes', 1),
(36, '05/02/2020', 'Febrero', 5, 'Mi?rcoles', 1),
(37, '06/02/2020', 'Febrero', 6, 'Jueves', 1),
(38, '07/02/2020', 'Febrero', 7, 'Viernes', 2),
(39, '08/02/2020', 'Febrero', 8, 'S?bado', 2),
(40, '09/02/2020', 'Febrero', 9, 'Domingo', 2),
(41, '10/02/2020', 'Febrero', 10, 'Lunes', 2),
(42, '11/02/2020', 'Febrero', 11, 'Martes', 2),
(43, '12/02/2020', 'Febrero', 12, 'Mi?rcoles', 2),
(44, '13/02/2020', 'Febrero', 13, 'Jueves', 2),
(45, '14/02/2020', 'Febrero', 14, 'Viernes', 3),
(46, '15/02/2020', 'Febrero', 15, 'S?bado', 3),
(47, '16/02/2020', 'Febrero', 16, 'Domingo', 3),
(48, '17/02/2020', 'Febrero', 17, 'Lunes', 3),
(49, '18/02/2020', 'Febrero', 18, 'Martes', 3),
(50, '19/02/2020', 'Febrero', 19, 'Mi?rcoles', 3),
(51, '20/02/2020', 'Febrero', 20, 'Jueves', 3),
(52, '21/02/2020', 'Febrero', 21, 'Viernes', 4),
(53, '22/02/2020', 'Febrero', 22, 'S?bado', 4),
(54, '23/02/2020', 'Febrero', 23, 'Domingo', 4),
(55, '24/02/2020', 'Febrero', 24, 'Lunes', 4),
(56, '25/02/2020', 'Febrero', 25, 'Martes', 4),
(57, '26/02/2020', 'Febrero', 26, 'Mi?rcoles', 4),
(58, '27/02/2020', 'Febrero', 27, 'Jueves', 4),
(59, '28/02/2020', 'Febrero', 28, 'Viernes', 5),
(60, '29/02/2020', 'Febrero', 29, 'S?bado', 5),
(61, '01/03/2020', 'Marzo', 1, 'Domingo', 1),
(62, '02/03/2020', 'Marzo', 2, 'Lunes', 1),
(63, '03/03/2020', 'Marzo', 3, 'Martes', 1),
(64, '04/03/2020', 'Marzo', 4, 'Mi?rcoles', 1),
(65, '05/03/2020', 'Marzo', 5, 'Jueves', 1),
(66, '06/03/2020', 'Marzo', 6, 'Viernes', 2),
(67, '07/03/2020', 'Marzo', 7, 'S?bado', 2),
(68, '08/03/2020', 'Marzo', 8, 'Domingo', 2),
(69, '09/03/2020', 'Marzo', 9, 'Lunes', 2),
(70, '10/03/2020', 'Marzo', 10, 'Martes', 2),
(71, '11/03/2020', 'Marzo', 11, 'Mi?rcoles', 2),
(72, '12/03/2020', 'Marzo', 12, 'Jueves', 2),
(73, '13/03/2020', 'Marzo', 13, 'Viernes', 3),
(74, '14/03/2020', 'Marzo', 14, 'S?bado', 3),
(75, '15/03/2020', 'Marzo', 15, 'Domingo', 3),
(76, '16/03/2020', 'Marzo', 16, 'Lunes', 3),
(77, '17/03/2020', 'Marzo', 17, 'Martes', 3),
(78, '18/03/2020', 'Marzo', 18, 'Mi?rcoles', 3),
(79, '19/03/2020', 'Marzo', 19, 'Jueves', 3),
(80, '20/03/2020', 'Marzo', 20, 'Viernes', 4),
(81, '21/03/2020', 'Marzo', 21, 'S?bado', 4),
(82, '22/03/2020', 'Marzo', 22, 'Domingo', 4),
(83, '23/03/2020', 'Marzo', 23, 'Lunes', 4),
(84, '24/03/2020', 'Marzo', 24, 'Martes', 4),
(85, '25/03/2020', 'Marzo', 25, 'Mi?rcoles', 4),
(86, '26/03/2020', 'Marzo', 26, 'Jueves', 4),
(87, '27/03/2020', 'Marzo', 27, 'Viernes', 5),
(88, '28/03/2020', 'Marzo', 28, 'S?bado', 5),
(89, '29/03/2020', 'Marzo', 29, 'Domingo', 5),
(90, '30/03/2020', 'Marzo', 30, 'Lunes', 1),
(91, '31/03/2020', 'Marzo', 31, 'Martes', 1),
(92, '01/04/2020', 'Abril', 1, 'Mi?rcoles', 1),
(93, '02/04/2020', 'Abril', 2, 'Jueves', 1),
(94, '03/04/2020', 'Abril', 3, 'Viernes', 2),
(95, '04/04/2020', 'Abril', 4, 'S?bado', 2),
(96, '05/04/2020', 'Abril', 5, 'Domingo', 2),
(97, '06/04/2020', 'Abril', 6, 'Lunes', 2),
(98, '07/04/2020', 'Abril', 7, 'Martes', 2),
(99, '08/04/2020', 'Abril', 8, 'Mi?rcoles', 2),
(100, '09/04/2020', 'Abril', 9, 'Jueves', 2),
(101, '10/04/2020', 'Abril', 10, 'Viernes', 3),
(102, '11/04/2020', 'Abril', 11, 'S?bado', 3),
(103, '12/04/2020', 'Abril', 12, 'Domingo', 3),
(104, '13/04/2020', 'Abril', 13, 'Lunes', 3),
(105, '14/04/2020', 'Abril', 14, 'Martes', 3),
(106, '15/04/2020', 'Abril', 15, 'Mi?rcoles', 3),
(107, '16/04/2020', 'Abril', 16, 'Jueves', 3),
(108, '17/04/2020', 'Abril', 17, 'Viernes', 4),
(109, '18/04/2020', 'Abril', 18, 'S?bado', 4),
(110, '19/04/2020', 'Abril', 19, 'Domingo', 4),
(111, '20/04/2020', 'Abril', 20, 'Lunes', 4),
(112, '21/04/2020', 'Abril', 21, 'Martes', 4),
(113, '22/04/2020', 'Abril', 22, 'Mi?rcoles', 4),
(114, '23/04/2020', 'Abril', 23, 'Jueves', 4),
(115, '24/04/2020', 'Abril', 24, 'Viernes', 5),
(116, '25/04/2020', 'Abril', 25, 'S?bado', 5),
(117, '26/04/2020', 'Abril', 26, 'Domingo', 5),
(118, '27/04/2020', 'Abril', 27, 'Lunes', 5),
(119, '28/04/2020', 'Abril', 28, 'Martes', 5),
(120, '29/04/2020', 'Abril', 29, 'Mi?rcoles', 5),
(121, '30/04/2020', 'Abril', 30, 'Jueves', 5),
(122, '01/05/2020', 'Mayo', 1, 'Viernes', 1),
(123, '02/05/2020', 'Mayo', 2, 'S?bado', 1),
(124, '03/05/2020', 'Mayo', 3, 'Domingo', 1),
(125, '04/05/2020', 'Mayo', 4, 'Lunes', 1),
(126, '05/05/2020', 'Mayo', 5, 'Martes', 1),
(127, '06/05/2020', 'Mayo', 6, 'Mi?rcoles', 1),
(128, '07/05/2020', 'Mayo', 7, 'Jueves', 1),
(129, '08/05/2020', 'Mayo', 8, 'Viernes', 2),
(130, '09/05/2020', 'Mayo', 9, 'S?bado', 2),
(131, '10/05/2020', 'Mayo', 10, 'Domingo', 2),
(132, '11/05/2020', 'Mayo', 11, 'Lunes', 2),
(133, '12/05/2020', 'Mayo', 12, 'Martes', 2),
(134, '13/05/2020', 'Mayo', 13, 'Mi?rcoles', 2),
(135, '14/05/2020', 'Mayo', 14, 'Jueves', 2),
(136, '15/05/2020', 'Mayo', 15, 'Viernes', 3),
(137, '16/05/2020', 'Mayo', 16, 'S?bado', 3),
(138, '17/05/2020', 'Mayo', 17, 'Domingo', 3),
(139, '18/05/2020', 'Mayo', 18, 'Lunes', 3),
(140, '19/05/2020', 'Mayo', 19, 'Martes', 3),
(141, '20/05/2020', 'Mayo', 20, 'Mi?rcoles', 3),
(142, '21/05/2020', 'Mayo', 21, 'Jueves', 3),
(143, '22/05/2020', 'Mayo', 22, 'Viernes', 4),
(144, '23/05/2020', 'Mayo', 23, 'S?bado', 4),
(145, '24/05/2020', 'Mayo', 24, 'Domingo', 4),
(146, '25/05/2020', 'Mayo', 25, 'Lunes', 4),
(147, '26/05/2020', 'Mayo', 26, 'Martes', 4),
(148, '27/05/2020', 'Mayo', 27, 'Mi?rcoles', 4),
(149, '28/05/2020', 'Mayo', 28, 'Jueves', 4),
(150, '29/05/2020', 'Mayo', 29, 'Viernes', 5),
(151, '30/05/2020', 'Mayo', 30, 'S?bado', 5),
(152, '31/05/2020', 'Mayo', 31, 'Domingo', 5),
(153, '01/06/2020', 'Junio', 1, 'Lunes', 1),
(154, '02/06/2020', 'Junio', 2, 'Martes', 1),
(155, '03/06/2020', 'Junio', 3, 'Mi?rcoles', 1),
(156, '04/06/2020', 'Junio', 4, 'Jueves', 1),
(157, '05/06/2020', 'Junio', 5, 'Viernes', 2),
(158, '06/06/2020', 'Junio', 6, 'S?bado', 2),
(159, '07/06/2020', 'Junio', 7, 'Domingo', 2),
(160, '08/06/2020', 'Junio', 8, 'Lunes', 2),
(161, '09/06/2020', 'Junio', 9, 'Martes', 2),
(162, '10/06/2020', 'Junio', 10, 'Mi?rcoles', 2),
(163, '11/06/2020', 'Junio', 11, 'Jueves', 2),
(164, '12/06/2020', 'Junio', 12, 'Viernes', 3),
(165, '13/06/2020', 'Junio', 13, 'S?bado', 3),
(166, '14/06/2020', 'Junio', 14, 'Domingo', 3),
(167, '15/06/2020', 'Junio', 15, 'Lunes', 3),
(168, '16/06/2020', 'Junio', 16, 'Martes', 3),
(169, '17/06/2020', 'Junio', 17, 'Mi?rcoles', 3),
(170, '18/06/2020', 'Junio', 18, 'Jueves', 3),
(171, '19/06/2020', 'Junio', 19, 'Viernes', 4),
(172, '20/06/2020', 'Junio', 20, 'S?bado', 4),
(173, '21/06/2020', 'Junio', 21, 'Domingo', 4),
(174, '22/06/2020', 'Junio', 22, 'Lunes', 4),
(175, '23/06/2020', 'Junio', 23, 'Martes', 4),
(176, '24/06/2020', 'Junio', 24, 'Mi?rcoles', 4),
(177, '25/06/2020', 'Junio', 25, 'Jueves', 4),
(178, '26/06/2020', 'Junio', 26, 'Viernes', 5),
(179, '27/06/2020', 'Junio', 27, 'S?bado', 5),
(180, '28/06/2020', 'Junio', 28, 'Domingo', 5),
(181, '29/06/2020', 'Junio', 29, 'Lunes', 5),
(182, '30/06/2020', 'Junio', 30, 'Martes', 5),
(183, '01/07/2020', 'Julio', 1, 'Mi?rcoles', 1),
(184, '02/07/2020', 'Julio', 2, 'Jueves', 1),
(185, '03/07/2020', 'Julio', 3, 'Viernes', 2),
(186, '04/07/2020', 'Julio', 4, 'S?bado', 2),
(187, '05/07/2020', 'Julio', 5, 'Domingo', 2),
(188, '06/07/2020', 'Julio', 6, 'Lunes', 2),
(189, '07/07/2020', 'Julio', 7, 'Martes', 2),
(190, '08/07/2020', 'Julio', 8, 'Mi?rcoles', 2),
(191, '09/07/2020', 'Julio', 9, 'Jueves', 2),
(192, '10/07/2020', 'Julio', 10, 'Viernes', 3),
(193, '11/07/2020', 'Julio', 11, 'S?bado', 3),
(194, '12/07/2020', 'Julio', 12, 'Domingo', 3),
(195, '13/07/2020', 'Julio', 13, 'Lunes', 3),
(196, '14/07/2020', 'Julio', 14, 'Martes', 3),
(197, '15/07/2020', 'Julio', 15, 'Mi?rcoles', 3),
(198, '16/07/2020', 'Julio', 16, 'Jueves', 3),
(199, '17/07/2020', 'Julio', 17, 'Viernes', 4),
(200, '18/07/2020', 'Julio', 18, 'S?bado', 4),
(201, '19/07/2020', 'Julio', 19, 'Domingo', 4),
(202, '20/07/2020', 'Julio', 20, 'Lunes', 4),
(203, '21/07/2020', 'Julio', 21, 'Martes', 4),
(204, '22/07/2020', 'Julio', 22, 'Mi?rcoles', 4),
(205, '23/07/2020', 'Julio', 23, 'Jueves', 4),
(206, '24/07/2020', 'Julio', 24, 'Viernes', 5),
(207, '25/07/2020', 'Julio', 25, 'S?bado', 5),
(208, '26/07/2020', 'Julio', 26, 'Domingo', 5),
(209, '27/07/2020', 'Julio', 27, 'Lunes', 5),
(210, '28/07/2020', 'Julio', 28, 'Martes', 5),
(211, '29/07/2020', 'Julio', 29, 'Mi?rcoles', 5),
(212, '30/07/2020', 'Julio', 30, 'Jueves', 5),
(213, '31/07/2020', 'Julio', 31, 'Viernes', 5),
(214, '01/08/2020', 'Agosto', 1, 'S?bado', 1),
(215, '02/08/2020', 'Agosto', 2, 'Domingo', 1),
(216, '03/08/2020', 'Agosto', 3, 'Lunes', 1),
(217, '04/08/2020', 'Agosto', 4, 'Martes', 1),
(218, '05/08/2020', 'Agosto', 5, 'Mi?rcoles', 1),
(219, '06/08/2020', 'Agosto', 6, 'Jueves', 1),
(220, '07/08/2020', 'Agosto', 7, 'Viernes', 2),
(221, '08/08/2020', 'Agosto', 8, 'S?bado', 2),
(222, '09/08/2020', 'Agosto', 9, 'Domingo', 2),
(223, '10/08/2020', 'Agosto', 10, 'Lunes', 2),
(224, '11/08/2020', 'Agosto', 11, 'Martes', 2),
(225, '12/08/2020', 'Agosto', 12, 'Mi?rcoles', 2),
(226, '13/08/2020', 'Agosto', 13, 'Jueves', 2),
(227, '14/08/2020', 'Agosto', 14, 'Viernes', 3),
(228, '15/08/2020', 'Agosto', 15, 'S?bado', 3),
(229, '16/08/2020', 'Agosto', 16, 'Domingo', 3),
(230, '17/08/2020', 'Agosto', 17, 'Lunes', 3),
(231, '18/08/2020', 'Agosto', 18, 'Martes', 3),
(232, '19/08/2020', 'Agosto', 19, 'Mi?rcoles', 3),
(233, '20/08/2020', 'Agosto', 20, 'Jueves', 3),
(234, '21/08/2020', 'Agosto', 21, 'Viernes', 4),
(235, '22/08/2020', 'Agosto', 22, 'S?bado', 4),
(236, '23/08/2020', 'Agosto', 23, 'Domingo', 4),
(237, '24/08/2020', 'Agosto', 24, 'Lunes', 4),
(238, '25/08/2020', 'Agosto', 25, 'Martes', 4),
(239, '26/08/2020', 'Agosto', 26, 'Mi?rcoles', 4),
(240, '27/08/2020', 'Agosto', 27, 'Jueves', 4),
(241, '28/08/2020', 'Agosto', 28, 'Viernes', 5),
(242, '29/08/2020', 'Agosto', 29, 'S?bado', 5),
(243, '30/08/2020', 'Agosto', 30, 'Domingo', 5),
(244, '31/08/2020', 'Agosto', 31, 'Lunes', 5),
(245, '01/09/2020', 'Septiembre', 1, 'Martes', 1),
(246, '02/09/2020', 'Septiembre', 2, 'Mi?rcoles', 1),
(247, '03/09/2020', 'Septiembre', 3, 'Jueves', 1),
(248, '04/09/2020', 'Septiembre', 4, 'Viernes', 2),
(249, '05/09/2020', 'Septiembre', 5, 'S?bado', 2),
(250, '06/09/2020', 'Septiembre', 6, 'Domingo', 2),
(251, '07/09/2020', 'Septiembre', 7, 'Lunes', 2),
(252, '08/09/2020', 'Septiembre', 8, 'Martes', 2),
(253, '09/09/2020', 'Septiembre', 9, 'Mi?rcoles', 2),
(254, '10/09/2020', 'Septiembre', 10, 'Jueves', 2),
(255, '11/09/2020', 'Septiembre', 11, 'Viernes', 3),
(256, '12/09/2020', 'Septiembre', 12, 'S?bado', 3),
(257, '13/09/2020', 'Septiembre', 13, 'Domingo', 3),
(258, '14/09/2020', 'Septiembre', 14, 'Lunes', 3),
(259, '15/09/2020', 'Septiembre', 15, 'Martes', 3),
(260, '16/09/2020', 'Septiembre', 16, 'Mi?rcoles', 3),
(261, '17/09/2020', 'Septiembre', 17, 'Jueves', 3),
(262, '18/09/2020', 'Septiembre', 18, 'Viernes', 4),
(263, '19/09/2020', 'Septiembre', 19, 'S?bado', 4),
(264, '20/09/2020', 'Septiembre', 20, 'Domingo', 4),
(265, '21/09/2020', 'Septiembre', 21, 'Lunes', 4),
(266, '22/09/2020', 'Septiembre', 22, 'Martes', 4),
(267, '23/09/2020', 'Septiembre', 23, 'Mi?rcoles', 4),
(268, '24/09/2020', 'Septiembre', 24, 'Jueves', 4),
(269, '25/09/2020', 'Septiembre', 25, 'Viernes', 5),
(270, '26/09/2020', 'Septiembre', 26, 'S?bado', 5),
(271, '27/09/2020', 'Septiembre', 27, 'Domingo', 5),
(272, '28/09/2020', 'Septiembre', 28, 'Lunes', 5),
(273, '29/09/2020', 'Septiembre', 29, 'Martes', 5),
(274, '30/09/2020', 'Septiembre', 30, 'Mi?rcoles', 5),
(275, '01/10/2020', 'Octubre', 1, 'Jueves', 1),
(276, '02/10/2020', 'Octubre', 2, 'Viernes', 2),
(277, '03/10/2020', 'Octubre', 3, 'S?bado', 2),
(278, '04/10/2020', 'Octubre', 4, 'Domingo', 2),
(279, '05/10/2020', 'Octubre', 5, 'Lunes', 2),
(280, '06/10/2020', 'Octubre', 6, 'Martes', 2),
(281, '07/10/2020', 'Octubre', 7, 'Mi?rcoles', 2),
(282, '08/10/2020', 'Octubre', 8, 'Jueves', 2),
(283, '09/10/2020', 'Octubre', 9, 'Viernes', 3),
(284, '10/10/2020', 'Octubre', 10, 'S?bado', 3),
(285, '11/10/2020', 'Octubre', 11, 'Domingo', 3),
(286, '12/10/2020', 'Octubre', 12, 'Lunes', 3),
(287, '13/10/2020', 'Octubre', 13, 'Martes', 3),
(288, '14/10/2020', 'Octubre', 14, 'Mi?rcoles', 3),
(289, '15/10/2020', 'Octubre', 15, 'Jueves', 3),
(290, '16/10/2020', 'Octubre', 16, 'Viernes', 4),
(291, '17/10/2020', 'Octubre', 17, 'S?bado', 4),
(292, '18/10/2020', 'Octubre', 18, 'Domingo', 4),
(293, '19/10/2020', 'Octubre', 19, 'Lunes', 4),
(294, '20/10/2020', 'Octubre', 20, 'Martes', 4),
(295, '21/10/2020', 'Octubre', 21, 'Mi?rcoles', 4),
(296, '22/10/2020', 'Octubre', 22, 'Jueves', 4),
(297, '23/10/2020', 'Octubre', 23, 'Viernes', 5),
(298, '24/10/2020', 'Octubre', 24, 'S?bado', 5),
(299, '25/10/2020', 'Octubre', 25, 'Domingo', 5),
(300, '26/10/2020', 'Octubre', 26, 'Lunes', 5),
(301, '27/10/2020', 'Octubre', 27, 'Martes', 5),
(302, '28/10/2020', 'Octubre', 28, 'Mi?rcoles', 5),
(303, '29/10/2020', 'Octubre', 29, 'Jueves', 5),
(304, '30/10/2020', 'Octubre', 30, 'Viernes', 5),
(305, '31/10/2020', 'Octubre', 31, 'S?bado', 5),
(306, '01/11/2020', 'Noviembre', 1, 'Domingo', 1),
(307, '02/11/2020', 'Noviembre', 2, 'Lunes', 1),
(308, '03/11/2020', 'Noviembre', 3, 'Martes', 1),
(309, '04/11/2020', 'Noviembre', 4, 'Mi?rcoles', 1),
(310, '05/11/2020', 'Noviembre', 5, 'Jueves', 1),
(311, '06/11/2020', 'Noviembre', 6, 'Viernes', 2),
(312, '07/11/2020', 'Noviembre', 7, 'S?bado', 2),
(313, '08/11/2020', 'Noviembre', 8, 'Domingo', 2),
(314, '09/11/2020', 'Noviembre', 9, 'Lunes', 2),
(315, '10/11/2020', 'Noviembre', 10, 'Martes', 2),
(316, '11/11/2020', 'Noviembre', 11, 'Mi?rcoles', 2),
(317, '12/11/2020', 'Noviembre', 12, 'Jueves', 2),
(318, '13/11/2020', 'Noviembre', 13, 'Viernes', 3),
(319, '14/11/2020', 'Noviembre', 14, 'S?bado', 3),
(320, '15/11/2020', 'Noviembre', 15, 'Domingo', 3),
(321, '16/11/2020', 'Noviembre', 16, 'Lunes', 3),
(322, '17/11/2020', 'Noviembre', 17, 'Martes', 3),
(323, '18/11/2020', 'Noviembre', 18, 'Mi?rcoles', 3),
(324, '19/11/2020', 'Noviembre', 19, 'Jueves', 3),
(325, '20/11/2020', 'Noviembre', 20, 'Viernes', 4),
(326, '21/11/2020', 'Noviembre', 21, 'S?bado', 4),
(327, '22/11/2020', 'Noviembre', 22, 'Domingo', 4),
(328, '23/11/2020', 'Noviembre', 23, 'Lunes', 4),
(329, '24/11/2020', 'Noviembre', 24, 'Martes', 4),
(330, '25/11/2020', 'Noviembre', 25, 'Mi?rcoles', 4),
(331, '26/11/2020', 'Noviembre', 26, 'Jueves', 4),
(332, '27/11/2020', 'Noviembre', 27, 'Viernes', 5),
(333, '28/11/2020', 'Noviembre', 28, 'S?bado', 5),
(334, '29/11/2020', 'Noviembre', 29, 'Domingo', 5),
(335, '30/11/2020', 'Noviembre', 30, 'Lunes', 5),
(336, '01/12/2020', 'Diciembre', 1, 'Martes', 1),
(337, '02/12/2020', 'Diciembre', 2, 'Mi?rcoles', 1),
(338, '03/12/2020', 'Diciembre', 3, 'Jueves', 1),
(339, '04/12/2020', 'Diciembre', 4, 'Viernes', 2),
(340, '05/12/2020', 'Diciembre', 5, 'S?bado', 2),
(341, '06/12/2020', 'Diciembre', 6, 'Domingo', 2),
(342, '07/12/2020', 'Diciembre', 7, 'Lunes', 2),
(343, '08/12/2020', 'Diciembre', 8, 'Martes', 2),
(344, '09/12/2020', 'Diciembre', 9, 'Mi?rcoles', 2),
(345, '10/12/2020', 'Diciembre', 10, 'Jueves', 2),
(346, '11/12/2020', 'Diciembre', 11, 'Viernes', 3),
(347, '12/12/2020', 'Diciembre', 12, 'S?bado', 3),
(348, '13/12/2020', 'Diciembre', 13, 'Domingo', 3),
(349, '14/12/2020', 'Diciembre', 14, 'Lunes', 3),
(350, '15/12/2020', 'Diciembre', 15, 'Martes', 3),
(351, '16/12/2020', 'Diciembre', 16, 'Mi?rcoles', 3),
(352, '17/12/2020', 'Diciembre', 17, 'Jueves', 3),
(353, '18/12/2020', 'Diciembre', 18, 'Viernes', 4),
(354, '19/12/2020', 'Diciembre', 19, 'S?bado', 4),
(355, '20/12/2020', 'Diciembre', 20, 'Domingo', 4),
(356, '21/12/2020', 'Diciembre', 21, 'Lunes', 4),
(357, '22/12/2020', 'Diciembre', 22, 'Martes', 4),
(358, '23/12/2020', 'Diciembre', 23, 'Mi?rcoles', 4),
(359, '24/12/2020', 'Diciembre', 24, 'Jueves', 4),
(360, '25/12/2020', 'Diciembre', 25, 'Viernes', 5),
(361, '26/12/2020', 'Diciembre', 26, 'S?bado', 5),
(362, '27/12/2020', 'Diciembre', 27, 'Domingo', 5),
(363, '28/12/2020', 'Diciembre', 28, 'Lunes', 5),
(364, '29/12/2020', 'Diciembre', 29, 'Martes', 5),
(365, '30/12/2020', 'Diciembre', 30, 'Mi?rcoles', 5),
(366, '31/12/2020', 'Diciembre', 31, 'Jueves', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

CREATE TABLE `meses` (
  `id` int(11) NOT NULL,
  `numMes` int(11) NOT NULL,
  `mes` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id`, `numMes`, `mes`) VALUES
(1, 1, 'Enero'),
(2, 2, 'Febrero'),
(3, 3, 'Marzo'),
(4, 4, 'Abril'),
(5, 5, 'Mayo'),
(6, 6, 'Junio'),
(7, 7, 'Julio'),
(8, 8, 'Agosto'),
(9, 9, 'Septiembre'),
(10, 10, 'Octubre'),
(11, 11, 'Noviembre'),
(12, 12, 'Diciembre');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `canales`
--
ALTER TABLE `canales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `diascredito`
--
ALTER TABLE `diascredito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `diasmes`
--
ALTER TABLE `diasmes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `canales`
--
ALTER TABLE `canales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `diascredito`
--
ALTER TABLE `diascredito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `diasmes`
--
ALTER TABLE `diasmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
