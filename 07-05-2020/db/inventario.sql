-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2020 a las 10:28:56
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(4, 'Guitarra'),
(5, 'Bajo'),
(6, 'Teclado'),
(7, 'Interfaz de audio'),
(8, 'Batería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_fabricantes`
--

CREATE TABLE `categorias_fabricantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias_fabricantes`
--

INSERT INTO `categorias_fabricantes` (`id`, `nombre`) VALUES
(4, 'Guitarras'),
(5, 'Bajos'),
(6, 'Baterías'),
(7, 'Teclados'),
(14, 'Interfaces de Audio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricantes`
--

CREATE TABLE `fabricantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `categorias_fabricantes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fabricantes`
--

INSERT INTO `fabricantes` (`id`, `nombre`, `direccion`, `correo`, `telefono`, `categorias_fabricantes_id`) VALUES
(3, 'Fender', 'Calle Montes Urales 445, Lomas - Virreyes, Lomas de Chapultepec, Miguel Hidalgo, 11000 Ciudad de México, CDMX', 'admin@fender.com', '0180012345', 4),
(4, 'Fernandes Bass', '5646 E. Speedway Blvd. Tucson', 'help@fernandesbass.com', '0180032165', 5),
(5, 'Tama', ' 1726 Winchester Rd, Bensalem, Pa. 19020', ' tama@hoshinousa.com', '2156388670', 6),
(6, 'Moog Music', '18 República de Guatemala Ciudad de México, 06000', 'synths@moog.com', '0180065712', 7),
(8, 'Focusrite', 'Cressex Business Park, High Wycombe, Bucks, HP12 3FX.', ' sales@focusrite.com', '0180065712', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio_venta` float NOT NULL,
  `precio_compra` float NOT NULL,
  `productos_fabricantes_id` int(11) NOT NULL,
  `productos_categorias_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio_venta`, `precio_compra`, `productos_fabricantes_id`, `productos_categorias_id`) VALUES
(5, 'Fender Jaguar', ' Para los músicos que desean el estilo y el sonido de los años clásicos de Fender, creamos la Vintera 60 Jaguar.', 30000, 42400, 3, 4),
(7, 'Fernandes Precision', ' This Fernandes Bass was made in Japan and features a basswood body, maple neck and rosewood fingerboard. It is completely stock, with the exception of the current pickguard', 7000, 5000, 4, 5),
(8, 'STAR Bubinga Drum Kits', ' STAR is the new flagship line for TAMA drums. It takes the knowledge and research we cultivated for the Starclassic series to the next level, by reexamining every detail to enhance shell resonance.', 50000, 40000, 5, 8),
(9, 'Moog Subsequent 37 Sintetizador Analogico Paraphonic', ' The Moog Subsequent 37 Paraphonic Analog Synthesizer builds upon the success of the original Sub 37 Tribute Edition synthesizer with several enhancements and is well suited for synthesizer enthusiasts, professional musicians, and sound designers. ', 95700, 70000, 6, 6),
(11, 'Interfase Scarlett MOSC0024', ' Suficientemente intuitiva para principiantes a la vez que suficientemente avanzada para inspirar creatividad real con efectos de gran sonido. Interfaz de audio USB, 1 entrada Mic/Line: XLR. 1 entrada de línea / instrumento: Jack de 6.3 mm. 2 salidas', 2800, 2000, 8, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_fabricantes`
--
ALTER TABLE `categorias_fabricantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fabricantes_categorias_fabricantes` (`categorias_fabricantes_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_productos_categorias` (`productos_categorias_id`),
  ADD KEY `fk_productos_fabricantes` (`productos_fabricantes_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `categorias_fabricantes`
--
ALTER TABLE `categorias_fabricantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `fabricantes`
--
ALTER TABLE `fabricantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD CONSTRAINT `fk_fabricantes_categorias_fabricantes` FOREIGN KEY (`categorias_fabricantes_id`) REFERENCES `categorias_fabricantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias` FOREIGN KEY (`productos_categorias_id`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_fabricantes` FOREIGN KEY (`productos_fabricantes_id`) REFERENCES `fabricantes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
