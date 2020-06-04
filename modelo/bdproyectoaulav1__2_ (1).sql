-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2020 a las 02:47:41
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdproyectoaulav1 (2)`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cedula` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nombre_tmp` varchar(50) NOT NULL,
  `tipoCliente` varchar(50) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `fechaInactivo` date NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `imagen_tmp` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email_tmp` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `telefono_tmp` varchar(50) NOT NULL,
  `cupoCredito` double NOT NULL,
  `estado` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cedula`, `nombre`, `nombre_tmp`, `tipoCliente`, `fechaRegistro`, `fechaInactivo`, `imagen`, `imagen_tmp`, `email`, `email_tmp`, `telefono`, `telefono_tmp`, `cupoCredito`, `estado`, `usuario`, `contrasena`) VALUES
('12121212', 'mateo L', '', 'persona', '2020-05-06', '0000-00-00', '../archivos/cliente2.png', '', 'mateo@cliente.com', '', '12121212', '', 1000000, 1, 'mateo', 'mateo'),
('123', 'ccc', 'ffffff', 'persona', '2020-05-01', '0000-00-00', '../archivos/Lapiz_labial.jpg', '../archivos/Lapiz_labial.jpg', '', '', 'liliana v', 'liliana v', 200000000, 1, 'lili', 'lili'),
('12345', 'karen', '', 'persona', '2020-05-04', '0000-00-00', '../archivos/cable.jfif', '', 'karen@cliente.com', '', '213324324', '', 500000, 1, 'karen', 'karen'),
('123456', 'carla', '', 'persona', '2020-05-04', '0000-00-00', '../archivos/nina.jfif', '', 'carla@cliente.com', '', '3332222', '', 500000, 1, 'carla', 'carla'),
('124', 'KT', '', 'NATURAL', '2020-05-28', '0000-00-00', '../archivos/empleado.jfif', '', 'juan@cliente.com', '', '333', '', 500000, 1, 'KT', '123'),
('125', 'eDWARD', 'eDWARD', 'persona', '2001-05-21', '0000-00-00', '../archivos/Lapiz_labial.jpg', '../archivos/Lapiz_labial.jpg', 'juan@cliente.com', 'juan@cliente.com', '3332222', '3332222', 500000, 1, 'EDW', '123'),
('222232344', 'maria andrea L', '', 'persona', '2020-04-02', '0000-00-00', '../archivos/abeja.png', '', 'mariaAndrea@cliente.com', '', '9876734', '', 500000, 0, 'andrea', 'andrea'),
('2222345456', 'maria elena ramirez L', '', 'persona', '2020-04-02', '0000-00-00', '../archivos/cable.jfif', '', 'maria@cliente.com', '', '9876766', '', 500000, 1, 'maria', 'maria'),
('23342334', 'Valentina', '', 'natural', '2020-05-23', '0000-00-00', '../archivos/nina.jfif', '', 'vale@cliente.com', '', '5667544', '', 700000, 1, 'vale', 'vale');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `cedula` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaRetiro` date NOT NULL,
  `salarioBasico` varchar(50) NOT NULL,
  `deducciones` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `hojaVida` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `nombre_tmp` varchar(50) NOT NULL,
  `foto_tmp` varchar(100) NOT NULL,
  `hojaVida_tmp` varchar(100) NOT NULL,
  `email_tmp` varchar(50) NOT NULL,
  `telefono_tmp` varchar(50) NOT NULL,
  `celular_tmp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`cedula`, `nombre`, `fechaIngreso`, `fechaRetiro`, `salarioBasico`, `deducciones`, `foto`, `hojaVida`, `email`, `telefono`, `celular`, `estado`, `usuario`, `contrasena`, `nombre_tmp`, `foto_tmp`, `hojaVida_tmp`, `email_tmp`, `telefono_tmp`, `celular_tmp`) VALUES
('102938', 'victor', '2020-05-23', '0000-00-00', '1800000', '200000', '../archivos/computer-icons-vendor-delivery.jpg', '../archivos/pdf de ejemplo2 - copia.pdf', 'victor@empleado.com', '789874', '3004578392', 0, 'victor', 'victor', '', '', '', '', '', ''),
('1313131313', 'Gregorio M.', '2020-05-06', '0000-00-00', '1800000', '200000', '../archivos/empleado.jfif', '../archivos/pdf de ejemplo2 - copia.pdf', 'gregorio@empleado.com', '13131313', '4341412413', 1, 'grego', 'grego', 'Gregorio M.', '../archivos/empleado.jfif', '../archivos/pdf de ejemplo2 - copia.pdf', 'gregorioL@empleado.com', '13132424', '4341414040'),
('4444444', 'lucas T', '2020-05-02', '0000-00-00', '1800000', '200000', '../archivos/nina.jfif', '../archivos/pdf de ejemplo.pdf', 'lucas@empleado.com', '345345345', '34534366', 1, 'lucas', 'lucas', '', '', '', '', '', ''),
('66666666', 'pedro t', '2020-05-01', '0000-00-00', '1800000', '200000', '../archivos/descarga.jpg', '../archivos/pdf de ejemplo.pdf', 'pedro@cliente.com', '23423432', '234234234', 1, 'pedro', 'pedro', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `id` int(11) NOT NULL,
  `rol` varchar(30) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `campoEditado` varchar(50) NOT NULL,
  `valorAnterior` varchar(50) NOT NULL,
  `valorNuevo` varchar(50) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`id`, `rol`, `cedula`, `campoEditado`, `valorAnterior`, `valorNuevo`, `estado`) VALUES
(1, 'Cliente', '123', 'Teléfono', '', 'wwww', 'APROBADO'),
(2, 'Cliente', '123', 'Teléfono', '3332223', 'wwww', 'APROBADO'),
(3, 'Cliente', '123', 'Teléfono', '3332223', 'wwww', 'APROBADO'),
(4, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/cliente2.png', 'APROBADO'),
(5, 'Cliente', '123', 'Teléfono', '3332223', '', 'APROBADO'),
(6, 'Cliente', '123', 'Nombre', 'liliana v', '', 'APROBADO'),
(7, 'Cliente', '123', 'Email', 'lili@cliente.com', '', 'APROBADO'),
(8, 'Cliente', '123', 'Teléfono', '3332223', '1111111', 'APROBADO'),
(9, 'Cliente', '123', 'Nombre', 'liliana v', 'ANA2', 'APROBADO'),
(10, 'Cliente', '123', 'Email', 'lili@cliente.com', 'lili2@cliente.com', 'APROBADO'),
(11, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/empleado.jfif', 'APROBADO'),
(12, 'Cliente', '123', 'Teléfono', '3332223', 'liliana v', 'APROBADO'),
(13, 'Cliente', '123', 'Nombre', 'liliana v', 'liliana 2', 'APROBADO'),
(14, 'Cliente', '123', 'Email', 'lili@cliente.com', 'liliana@gmail.com', 'APROBADO'),
(15, 'Cliente', '123', 'Teléfono', '3332223', 'liliana v', 'APROBADO'),
(16, 'Cliente', '123', 'Nombre', 'liliana v', 'liliana 2', 'APROBADO'),
(17, 'Cliente', '123', 'Email', 'lili@cliente.com', 'liliana@gmail.com', 'APROBADO'),
(18, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/helado.jfif', 'APROBADO'),
(19, 'Cliente', '123', 'Nombre', 'liliana v', 'liliana2', 'APROBADO'),
(20, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/Lapiz_labial.jpg', 'APROBADO'),
(21, 'Cliente', '123', 'Nombre', 'liliana v', 'analiara', 'APROBADO'),
(22, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/nino.png', 'APROBADO'),
(23, 'Cliente', '123', 'Nombre', 'liliana v', 'jjj', 'APROBADO'),
(24, 'Cliente', '123', 'Nombre', 'liliana v', 'jauna', 'APROBADO'),
(25, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', 'D:xampp	mpphpB257.tmp', 'APROBADO'),
(26, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'APROBADO'),
(27, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', 'D:xampp	mpphp9631.tmp', 'APROBADO'),
(28, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'APROBADO'),
(29, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', 'D:xampp	mpphp29D2.tmp', 'APROBADO'),
(30, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'APROBADO'),
(31, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', 'D:xampp	mpphpEAE1.tmp', 'APROBADO'),
(32, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'APROBADO'),
(33, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', 'D:xampp	mpphp92AB.tmp', 'APROBADO'),
(34, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'APROBADO'),
(35, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', 'D:xampp	mpphpC9C5.tmp', 'APROBADO'),
(36, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'PENDIENTE'),
(37, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', 'D:xampp	mpphp50CE.tmp', 'PENDIENTE'),
(38, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'PENDIENTE'),
(39, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', 'D:xampp	mpphpDCE3.tmp', 'PENDIENTE'),
(40, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'PENDIENTE'),
(41, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/nina.jfif', 'PENDIENTE'),
(42, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'PENDIENTE'),
(43, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/nabril-3830-5492311-1-product.jpg', 'PENDIENTE'),
(44, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'PENDIENTE'),
(45, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/nabril-3830-5492311-1-product.jpg', 'PENDIENTE'),
(46, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'PENDIENTE'),
(47, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/nina.jfif', 'PENDIENTE'),
(48, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'PENDIENTE'),
(49, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/', 'PENDIENTE'),
(50, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'PENDIENTE'),
(51, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/', 'PENDIENTE'),
(52, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'PENDIENTE'),
(53, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/', 'PENDIENTE'),
(54, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'PENDIENTE'),
(55, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/descarga.jpg', 'PENDIENTE'),
(56, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'PENDIENTE'),
(57, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/rubor-arequipe-1.jpg', 'PENDIENTE'),
(58, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'PENDIENTE'),
(59, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/', 'PENDIENTE'),
(60, 'Cliente', '123', 'Nombre', 'liliana v', 'jaunad', 'PENDIENTE'),
(61, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/Lapiz_labial.jpg', 'PENDIENTE'),
(62, 'Cliente', '123', 'Nombre', 'liliana v', 'V', 'PENDIENTE'),
(63, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/helado.jfif', 'PENDIENTE'),
(64, 'Cliente', '123', 'Nombre', 'liliana v', 'Ve', 'PENDIENTE'),
(65, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/', 'PENDIENTE'),
(66, 'Cliente', '123', 'Nombre', 'liliana v', 'Ve', 'PENDIENTE'),
(67, 'Cliente', '123', 'Imagen', '../archivos/clienta.png', '../archivos/', 'PENDIENTE'),
(68, 'Cliente', '123', 'Nombre', 'liliana v', 'Ve', 'PENDIENTE'),
(69, 'Cliente', '123', 'Imagen', '', '../archivos/nabril-3830-5492311-1-product.jpg', 'PENDIENTE'),
(70, 'Cliente', '123', 'Nombre', 'liliana v', 'Ve', 'PENDIENTE'),
(71, 'Cliente', '123', 'Imagen', '', 'D:xampp	mpphp3C33.tmp', 'PENDIENTE'),
(72, 'Cliente', '123', 'Nombre', 'liliana v', 'Ve', 'PENDIENTE'),
(73, 'Cliente', '123', 'Imagen', '', '../archivos/helado.jfif', 'PENDIENTE'),
(74, 'Cliente', '123', 'Nombre', 'liliana v', 'Ve', 'PENDIENTE'),
(75, 'Cliente', '123', 'Imagen', '', '../archivos/Lapiz_labial.jpg', 'PENDIENTE'),
(76, 'Cliente', '123', 'Nombre', 'liliana v', 'Ve', 'PENDIENTE'),
(77, 'Cliente', '123', 'Imagen', '', '../archivos/nabril-3830-5492311-1-product.jpg', 'PENDIENTE'),
(78, 'Cliente', '123', 'Nombre', 'liliana v', 'Ve', 'PENDIENTE'),
(79, 'Cliente', '123', 'Imagen', '', '../archivos/nabril-3830-5492311-1-product.jpg', 'PENDIENTE'),
(80, 'Cliente', '123', 'Nombre', 'liliana v', 'Ve', 'PENDIENTE'),
(81, 'Cliente', '123', 'Imagen', '', '../archivos/Lapiz_labial.jpg', 'PENDIENTE'),
(82, 'Cliente', '123', 'Nombre', 'liliana v', 'Ve', 'PENDIENTE'),
(83, 'Cliente', '123', 'Imagen', '', '../archivos/nina.jfif', 'PENDIENTE'),
(84, 'Cliente', '123', 'Nombre', 'liliana v', 'ffffff', 'PENDIENTE'),
(85, 'Cliente', '123', 'Imagen', '', '../archivos/Lapiz_labial.jpg', 'PENDIENTE'),
(86, 'Empleado', '1313131313', 'Foto', '', '../archivos/', 'PENDIENTE'),
(87, 'Empleado', '1313131313', 'HojaVida', '', '../archivos/', 'PENDIENTE'),
(88, 'Empleado', '1313131313', 'Teléfono', '', '131324333', 'PENDIENTE'),
(89, 'Empleado', '1313131313', 'Foto', '', '../archivos/', 'PENDIENTE'),
(90, 'Empleado', '1313131313', 'HojaVida', '', '../archivos/', 'PENDIENTE'),
(91, 'Empleado', '1313131313', 'Teléfono', '', '13132424', 'PENDIENTE'),
(92, 'Empleado', '1313131313', 'Foto', '', '../archivos/cable.jfif', 'PENDIENTE'),
(93, 'Empleado', '1313131313', 'HojaVida', '', '../archivos/', 'PENDIENTE'),
(94, 'Empleado', '1313131313', 'Teléfono', '', '13132424', 'PENDIENTE'),
(95, 'Empleado', '1313131313', 'Foto', '', '../archivos/', 'PENDIENTE'),
(96, 'Empleado', '1313131313', 'HojaVida', '', '../archivos/', 'PENDIENTE'),
(97, 'Empleado', '1313131313', 'Teléfono', '', '13132424', 'PENDIENTE'),
(98, 'Empleado', '1313131313', 'Celular', '4341412413', '4341414040', 'PENDIENTE'),
(99, 'Proveedor', '11111', 'Imagen', '', '../archivos/', 'PENDIENTE'),
(100, 'Proveedor', '11111', 'Teléfono', '123213', '1232134045', 'PENDIENTE'),
(101, 'Proveedor', '11111', 'Imagen', '', '../archivos/', 'PENDIENTE'),
(102, 'Proveedor', '11111', 'Teléfono', '123213', '1232134045', 'PENDIENTE'),
(103, 'Proveedor', '11111', 'Imagen', '', '../archivos/', 'PENDIENTE'),
(104, 'Proveedor', '11111', 'Teléfono', '123213', '1232134500', 'PENDIENTE'),
(105, 'Proveedor', '11111', 'Nombre', 'juan', 'juan Carlos', 'PENDIENTE'),
(106, 'Proveedor', '11111', 'Imagen', '', '../archivos/', 'PENDIENTE'),
(107, 'Proveedor', '11111', 'Teléfono', '123213', '1232134500', 'PENDIENTE'),
(108, 'Proveedor', '11111', 'Imagen', '', '../archivos/', 'PENDIENTE'),
(109, 'Proveedor', '11111', 'Teléfono', '123213', '1232135444', 'PENDIENTE'),
(110, 'Proveedor', '11111', 'Imagen', '', '../archivos/computer-icons-vendor-delivery.jpg', 'PENDIENTE'),
(111, 'Proveedor', '11111', 'Teléfono', '123213', '1232135444', 'PENDIENTE'),
(112, 'Proveedor', '11111', 'Imagen', '', '../archivos/computer-icons-vendor-delivery.jpg', 'PENDIENTE'),
(113, 'Proveedor', '11111', 'Teléfono', '123213', '1232135444', 'PENDIENTE'),
(114, 'Proveedor', '11111', 'Imagen', '', '../archivos/computer-icons-vendor-delivery.jpg', 'PENDIENTE'),
(115, 'Proveedor', '11111', 'Teléfono', '123213', '1232135444', 'PENDIENTE'),
(116, 'Proveedor', '11111', 'Imagen', '', '../archivos/computer-icons-vendor-delivery.jpg', 'PENDIENTE'),
(117, 'Proveedor', '11111', 'Teléfono', '123213', '1232135444', 'PENDIENTE'),
(118, 'Proveedor', '11111', 'Imagen', '', '../archivos/computer-icons-vendor-delivery.jpg', 'PENDIENTE'),
(119, 'Proveedor', '11111', 'Teléfono', '123213', '1232135444', 'PENDIENTE'),
(120, 'Proveedor', '11111', 'Imagen', '', '../archivos/computer-icons-vendor-delivery.jpg', 'PENDIENTE'),
(121, 'Proveedor', '11111', 'Teléfono', '123213', '1232135444', 'PENDIENTE'),
(122, 'Proveedor', '11111', 'Imagen', '', '../archivos/computer-icons-vendor-delivery.jpg', 'PENDIENTE'),
(123, 'Proveedor', '11111', 'Teléfono', '123213', '1232135444', 'PENDIENTE'),
(124, 'Proveedor', '11111', 'Imagen', '', '../archivos/', 'PENDIENTE'),
(125, 'Proveedor', '11111', 'Teléfono', '123213', '1232134049', 'PENDIENTE'),
(126, 'Proveedor', '11111', 'Nombre', 'juan', 'juan p', 'PENDIENTE'),
(127, 'Proveedor', '11111', 'Imagen', '', '../archivos/computer-icons-vendor-delivery.jpg', 'PENDIENTE'),
(128, 'Proveedor', '11111', 'Email', 'juan@proveedor.com', 'juanp@proveedor.com', 'PENDIENTE'),
(129, 'Proveedor', '11111', 'Teléfono', '123213', '1232134049', 'PENDIENTE'),
(130, 'Proveedor', '11111', 'Nombre', 'juan', 'juan p', 'PENDIENTE'),
(131, 'Proveedor', '11111', 'Imagen', '', '../archivos/computer-icons-vendor-delivery.jpg', 'PENDIENTE'),
(132, 'Proveedor', '11111', 'Email', 'juan@proveedor.com', 'juanp@proveedor.com', 'PENDIENTE'),
(133, 'Proveedor', '11111', 'Teléfono', '123213', '1232134049', 'PENDIENTE'),
(134, 'Proveedor', '11111', 'Nombre', 'juan', 'juan p', 'PENDIENTE'),
(135, 'Proveedor', '11111', 'Imagen', '', '../archivos/descarga.jpg', 'PENDIENTE'),
(136, 'Proveedor', '11111', 'Email', 'juan@proveedor.com', 'juanp@proveedor.com', 'PENDIENTE'),
(137, 'Proveedor', '11111', 'Teléfono', '123213', '1232134049', 'PENDIENTE'),
(138, 'Proveedor', '11111', 'Nombre', 'juan', 'juan p', 'PENDIENTE'),
(139, 'Proveedor', '11111', 'Imagen', '../archivos/nino.png', '../archivos/abeja.png', 'PENDIENTE'),
(140, 'Proveedor', '11111', 'Email', 'juan@proveedor.com', 'juanp@proveedor.com', 'PENDIENTE'),
(141, 'Proveedor', '11111', 'Teléfono', '123213', '1232134049', 'PENDIENTE'),
(142, 'Proveedor', '11111', 'Nombre', 'juan', 'juan p', 'PENDIENTE'),
(143, 'Proveedor', '11111', 'Imagen', '../archivos/nino.png', '../archivos/computer-icons-vendor-delivery.jpg', 'PENDIENTE'),
(144, 'Proveedor', '11111', 'Email', 'juan@proveedor.com', '', 'PENDIENTE'),
(145, 'Proveedor', '11111', 'Teléfono', '123213', '1232134049', 'PENDIENTE'),
(146, 'Proveedor', '11111', 'Nombre', 'juan', 'juan p', 'PENDIENTE'),
(147, 'Proveedor', '11111', 'Imagen', '../archivos/nino.png', '../archivos/', 'PENDIENTE'),
(148, 'Proveedor', '11111', 'Email', 'juan@proveedor.com', 'juan@cliente.com', 'PENDIENTE'),
(149, 'Proveedor', '11111', 'Teléfono', '123213', '1232134049', 'PENDIENTE'),
(150, 'Proveedor', '11111', 'Nombre', 'juan', 'juan p', 'PENDIENTE'),
(151, 'Proveedor', '11111', 'Imagen', '', '../archivos/computer-icons-vendor-delivery.jpg', 'PENDIENTE'),
(152, 'Proveedor', '11111', 'Email', 'juan@proveedor.com', 'juan@cliente.com', 'PENDIENTE'),
(153, 'Proveedor', '11111', 'Teléfono', '123213', '1232134049', 'PENDIENTE'),
(154, 'Proveedor', '11111', 'Nombre', 'juan', 'juan p', 'PENDIENTE'),
(155, 'Proveedor', '11111', 'Imagen', '', '../archivos/', 'PENDIENTE'),
(156, 'Proveedor', '11111', 'Email', 'juan@proveedor.com', 'juanp@proveedor.com', 'PENDIENTE'),
(157, 'Proveedor', '11111', 'Teléfono', '123213', '1232134049', 'PENDIENTE'),
(158, 'Proveedor', '11111', 'Nombre', 'juan', 'juan p', 'PENDIENTE'),
(159, 'Proveedor', '11111', 'Imagen', '../archivos/nino.png', '../archivos/cliente2.png', 'PENDIENTE'),
(160, 'Proveedor', '11111', 'Email', 'juan@proveedor.com', 'juanpablo@proveedor.com', 'PENDIENTE'),
(161, 'Proveedor', '11111', 'Teléfono', '123213', '1232134049', 'PENDIENTE'),
(162, 'Proveedor', '11111', 'Nombre', 'juan', 'juan p', 'PENDIENTE'),
(163, 'Proveedor', '11111', 'Imagen', '../archivos/nino.png', '../archivos/pestañina.jpg', 'PENDIENTE'),
(164, 'Proveedor', '11111', 'Email', 'juan@proveedor.com', 'juanpablo@proveedor.com', 'PENDIENTE'),
(165, 'Proveedor', '11111', 'Teléfono', '123213', '1232134049', 'PENDIENTE'),
(166, 'Proveedor', '11111', 'Nombre', 'juan', 'juan p', 'PENDIENTE'),
(167, 'Proveedor', '11111', 'Imagen', '../archivos/nino.png', '../archivos/computer-icons-vendor-delivery.jpg', 'PENDIENTE'),
(168, 'Proveedor', '11111', 'Email', 'juan@proveedor.com', 'juanpablo@proveedor.com', 'PENDIENTE'),
(169, 'Proveedor', '11111', 'Teléfono', '123213', '1232134049', 'PENDIENTE'),
(170, 'Empleado', '1313131313', 'Teléfono', '', '13132424', 'PENDIENTE'),
(171, 'Empleado', '1313131313', 'Celular', '4341412413', '4341414040', 'PENDIENTE'),
(172, 'Empleado', '1313131313', 'Foto', '../archivos/empleado.jfif', '../archivos/', 'PENDIENTE'),
(173, 'Empleado', '1313131313', 'HojaVida', '../archivos/pdf de ejemplo2 - copia.pdf', '../archivos/', 'PENDIENTE'),
(174, 'Empleado', '1313131313', 'Email', 'gregorio@empleado.com', 'gregorioL@empleado.com', 'PENDIENTE'),
(175, 'Empleado', '1313131313', 'Teléfono', '13131313', '13132424', 'PENDIENTE'),
(176, 'Empleado', '1313131313', 'Celular', '4341412413', '4341414040', 'PENDIENTE'),
(177, 'Empleado', '1313131313', 'Email', 'gregorio@empleado.com', 'gregorioL@empleado.com', 'PENDIENTE'),
(178, 'Empleado', '1313131313', 'Teléfono', '13131313', '13132424', 'PENDIENTE'),
(179, 'Empleado', '1313131313', 'Celular', '4341412413', '4341414040', 'PENDIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` int(11) NOT NULL,
  `idProv` varchar(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `idProv`, `nombre`, `imagen`, `estado`) VALUES
(1, '12120131321', 'Labial palo de rosa', '../archivos/Lapiz_labial.jpg', 1),
(2, '1012121', 'Tacones', '../archivos/51CJ2gxRSvL._AC_SY395_.jpg', 1),
(3, '1012121', 'Bolso Rosa', '../archivos/210091517_productPicture_prodGallery_product.jfif', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `cedula` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipoProveedor` varchar(50) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `fechaInactivo` date NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `nombre_tmp` varchar(50) NOT NULL,
  `imagen_tmp` varchar(100) NOT NULL,
  `email_tmp` varchar(50) NOT NULL,
  `telefono_tmp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`cedula`, `nombre`, `tipoProveedor`, `fechaRegistro`, `fechaInactivo`, `imagen`, `email`, `telefono`, `estado`, `usuario`, `contrasena`, `nombre_tmp`, `imagen_tmp`, `email_tmp`, `telefono_tmp`) VALUES
('1012121', 'velez', 'jurídico', '2020-05-01', '0000-00-00', '../archivos/helado.jfif', 'velez@proveedor.com', '132224', 1, 'velez', 'velez', '', '', '', ''),
('11111', 'juan', 'persona', '0000-00-00', '0000-00-00', '../archivos/nino.png', 'juan@proveedor.com', '123213', 1, 'juan', 'juan', 'juan p', '../archivos/computer-icons-vendor-delivery.jpg', 'juanpablo@proveedor.com', '1232134049'),
('111111221', 'marcos S', 'persona', '2020-05-01', '0000-00-00', '../archivos/computer-icons-vendor-delivery.jpg', 'marcos@proveedor.com', '3535', 0, 'marcos', 'marcos', '', '', '', ''),
('12120131321', 'vogue', 'jurídico', '2020-05-01', '0000-00-00', '../archivos/helado.jfif', 'vogue@proveedor.com', '34234234', 1, 'vogue', 'vogue', '', '', '', ''),
('123455', 'leo', 'persona', '2020-05-02', '0000-00-00', '../archivos/descarga.jpg', 'leo@proveedor.com', '342334', 1, 'leo', 'leo', '', '', '', ''),
('1414141414', 'Maritza P.', 'persona', '2020-05-06', '0000-00-00', '../archivos/nina.jfif', 'mary@proveedor.com', '23424242', 1, 'mary', 'mary', '', '', '', ''),
('800134421', 'avon', 'jurídico', '2020-05-23', '0000-00-00', '../archivos/cliente2.png', 'avon@proveedor.com', '789877', 1, 'avon', 'avon', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nomUsuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `nivelAcceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nomUsuario`, `contrasena`, `nivelAcceso`) VALUES
('', '', 2),
('admin', 'admin', 1),
('andrea', 'andrea', 2),
('avon', 'avon', 4),
('carla', 'carla', 2),
('EDW', '123', 2),
('grego', 'grego', 3),
('juan', 'juan', 4),
('karen', 'karen', 2),
('KT', '123', 2),
('leo', 'leo', 4),
('lili', 'lili', 2),
('lucas', 'lucas', 3),
('marcos', 'marcos', 4),
('maria', 'maria', 2),
('mary', 'mary', 4),
('mateo', 'mateo', 2),
('pedro', 'pedro', 3),
('vale', 'vale', 2),
('velez', 'velez', 4),
('victor', 'victor', 3),
('vogue', 'vogue', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `idProv` (`idProv`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nomUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`nomUsuario`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`nomUsuario`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idProv`) REFERENCES `proveedor` (`cedula`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`nomUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
