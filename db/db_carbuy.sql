-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2024 a las 20:45:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_carbuy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `id_auto` int(11) NOT NULL,
  `nombre_auto` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `id_marca_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id_auto`, `nombre_auto`, `descripcion`, `precio`, `id_marca_fk`) VALUES
(1, 'Corolla', 'Toyota Corolla 1.8 Xei Mt Pack 140cv\r\n2016 | 86.000KM', '$18.500.000', 1),
(6, 'Hilux', 'Toyota Hilux 3.0 Cd Srv 171cv 4x4 - A3\r\n2015 | 218.000KM', '$29.000.000', 1),
(7, 'Etios', 'Toyota Etios 1.5 Xls\r\n2014 | 78.000 KM', '$16.500.000', 1),
(8, 'Frontier', 'Nissan Frontier Xgear 4x4 aut my25\r\n2024 | 0KM', '$46.600.000', 5),
(9, 'Sentra', 'Nissan Sentra 2.0 Advance Cvt\r\n2022 | 25.000KM', '$38.500.800', 5),
(10, 'Celica', 'Toyota Celica 1.6 | 1984 | 286.000KM', '$9.000.500', 1),
(16, 'F40', 'FERRARI F40 2.0 Advance Cvt\r\n2022 | 25.000KM', '$380.500.800', 11),
(17, 'AE86', 'Toyota AE86 1.6 | 1984 | 286.000KM', '$9.000.500', 1),
(18, 'Clio Mio', 'Renault Clio Mio 1.6 | 2004 | 286.000KM', '$6.000.500', 7),
(22, 'Twingo', 'Twingo 1.6 | 2004 | 286.000KM', '$9.000.500', 7),
(25, 'Focus', 'Focus 1.6 | 2004 | 286.000KM', '$9.000.500', 6),
(26, '206', '206 1.8 | 2004 | 286.000KM', '$9.000.500', 8),
(27, 'Cruze', 'Cruze 1.8 | 2014 | 86.000KM', '$9.000.500', 9),
(28, 'Palio', 'Palio 1.4 | 208 | 186.000KM', '$9.000.500', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(50) NOT NULL,
  `img_marca` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`, `img_marca`) VALUES
(1, 'Toyota', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Toyota_logo_%28Red%29.svg/1200px-Toyota_logo_%28Red%29.svg.png'),
(4, 'Mazda', 'https://upload.wikimedia.org/wikipedia/nah/b/b1/Mazda_logo.png?20080728005359'),
(5, 'Nissan', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Nissan_2020_logo.svg/1074px-Nissan_2020_logo.svg.png'),
(6, 'Ford', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Ford_Motor_Company_Logo.svg/768px-Ford_Motor_Company_Logo.svg.png'),
(7, 'Renault', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Renault_2009_logo.svg/425px-Renault_2009_logo.svg.png'),
(8, 'Peugeot', 'https://upload.wikimedia.org/wikipedia/commons/archive/f/f7/20240529142319%21Peugeot_Logo.svg'),
(9, 'Chevrolet', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Chevrolet-logo.png/2560px-Chevrolet-logo.png'),
(11, 'Ferrari', 'https://upload.wikimedia.org/wikipedia/sco/thumb/d/d1/Ferrari-Logo.svg/516px-Ferrari-Logo.svg.png?20150601144908'),
(12, 'Bentley', 'https://upload.wikimedia.org/wikipedia/de/thumb/6/6c/Bentley_logo.svg/1200px-Bentley_logo.svg.png'),
(13, 'Fiat', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/FIAT_logo_%282020%29.svg/280px-FIAT_logo_%282020%29.svg.png'),
(14, 'Volkswagen', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Volkswagen_logo_2019.svg/900px-Volkswagen_logo_2019.svg.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `nombre_usuario`, `email_usuario`, `contraseña`) VALUES
(1, 'webadmin', 'webadmin', 'admin@admin.com', '$2y$10$cBkiHQiPPdSSQMUGLXME.OepkSREB9Uutvo7HyXR2fYm/8RiNFbtS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id_auto`),
  ADD KEY `id_marca_fk` (`id_marca_fk`) USING BTREE;

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_ibfk_1` FOREIGN KEY (`id_marca_fk`) REFERENCES `marcas` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
