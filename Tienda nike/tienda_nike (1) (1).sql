-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2026 a las 21:50:53
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_nike`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `precio`) VALUES
(1, 'Nike Air Force 1', 'Calzado', '110.00'),
(2, 'Nike Air Max 270', 'Calzado', '150.00'),
(3, 'Nike Dunk Low', 'Calzado', '115.00'),
(4, 'Nike Pegasus 40', 'Calzado', '130.00'),
(5, 'Nike Revolution 6', 'Calzado', '70.00'),
(6, 'Nike Blazer Mid 77', 'Calzado', '105.00'),
(7, 'Nike ZoomX Vaporfly', 'Calzado', '250.00'),
(8, 'Nike Court Vision', 'Calzado', '80.00'),
(9, 'Nike Metcon 9', 'Calzado', '140.00'),
(10, 'Nike Air Max 90', 'Calzado', '130.00'),
(11, 'Sudadera Club Fleece', 'Ropa', '65.00'),
(12, 'Playera Dri-FIT Ready', 'Ropa', '35.00'),
(13, 'Pantalón Jogging Sportswear', 'Ropa', '75.00'),
(14, 'Chamarra Windrunner', 'Ropa', '110.00'),
(15, 'Shorts Nike Pro', 'Ropa', '30.00'),
(16, 'Playera Graphic Tee', 'Ropa', '28.00'),
(17, 'Sudadera con Gorro Therma', 'Ropa', '70.00'),
(18, 'Malla Dri-FIT Challenger', 'Ropa', '55.00'),
(19, 'Chamarra Puffer Essential', 'Ropa', '140.00'),
(20, 'Playera Tank Top Fitness', 'Ropa', '25.00'),
(21, 'Mochila Brasilia', 'Accesorios', '45.00'),
(22, 'Gorra Club Unstructured', 'Accesorios', '25.00'),
(23, 'Calcetines Everyday (3 Pares)', 'Accesorios', '18.00'),
(24, 'Cangurera Heritage', 'Accesorios', '30.00'),
(25, 'Botella de Agua HyperCharge', 'Accesorios', '20.00'),
(26, 'Guantes de Gimnasio Ultimate', 'Accesorios', '22.00'),
(27, 'Mochila de Cuerdas Hayward', 'Accesorios', '28.00'),
(28, 'Banda para Cabeza Swoosh', 'Accesorios', '12.00'),
(29, 'Cinta Deportiva Pro', 'Accesorios', '15.00'),
(30, 'Maletín de Gimnasio Utility', 'Accesorios', '60.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`) VALUES
(1, 'Oscar Perez ', 'Oscar.09@gmail.com', 'Pollobeliko09'),
(2, 'Genesis Lopez', 'nessi@gmail.com', 'nessi1306'),
(3, 'bonesfacio67 ', 'bones67@gmail.com', '12345'),
(4, 'Pollo', 'pollo@gmail.com', 'pollo@gmail.com'),
(5, 'zamudio', 'zamudio@gmail.com', 'zamudio67'),
(6, 'daniel vazquez', 'vazquez@gmail.com', 'daniel4321');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
