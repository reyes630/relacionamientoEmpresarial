
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
-- Base de datos: `relacionamientoempresarial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `DocumentoCliente` varchar(20) NOT NULL,
  `NombreCliente` varchar(100) NOT NULL,
  `CorreoCliente` varchar(100) NOT NULL,
  `TelefonoCliente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `DocumentoCliente`, `NombreCliente`, `CorreoCliente`, `TelefonoCliente`) VALUES
(21, '1058138879', 'Esteban Reyes A', 'reyesagudeloesteban9@gmail.com', '3127591649');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `Estado`, `Descripcion`) VALUES
(2, 'Archivado', 'La solicitud recibio una solución y ya no es necesaria a la vista'),
(3, 'Pendiente', 'La solicitud ha llegado al sistema y aun no ha iniciado un proceso'),
(4, 'Resuelto', 'La solicitud recibio una respuesta y solución'),
(5, 'En proceso', 'La solicitud se encuentra en medio del proceso de desarollo'),
(6, 'Ejecutado', 'La solicitud paso el proceso y se espera una respuesta'),
(7, 'Asignado', 'La solicitud ya fue asiganda a una persona para llevar el proceso'),
(8, 'Cerrado', 'La solicitud no tuvo una solución esperada, puede encontarse en este estado con o sin una respuesta ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `Rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `Rol`) VALUES
(1, 'Administrador'),
(2, 'Administrativo'),
(3, 'Funcionario'),
(4, 'Instructor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idServicio` int(11) NOT NULL,
  `Servicio` varchar(100) NOT NULL,
  `Color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idServicio`, `Servicio`, `Color`) VALUES
(4, 'Tecnologo', '#ff0800'),
(5, 'Tecnico', '#000000'),
(6, 'Cursos Cortos', '#379de1'),
(7, 'Sennova', '#392de1'),
(8, 'Emprendimiento', '#24e544');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idSolicitud` int(11) NOT NULL,
  `FechaEvento` date DEFAULT NULL,
  `FechaCreacion` date NOT NULL,
  `Lugar` varchar(80) DEFAULT NULL,
  `Municipio` varchar(50) NOT NULL,
  `Observaciones` varchar(100) DEFAULT NULL,
  `Comentarios` varchar(100) DEFAULT NULL,
  `MedioSolicitud` varchar(50) DEFAULT NULL,
  `DescripcionNecesidad` varchar(100) DEFAULT NULL,
  `FKusuario` int(11) NOT NULL,
  `FKtipoEvento` int(11) NOT NULL,
  `FKestado` int(11) NOT NULL,
  `FKcliente` int(11) NOT NULL,
  `FKtipoServicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idSolicitud`, `FechaEvento`, `FechaCreacion`, `Lugar`, `Municipio`, `Observaciones`, `Comentarios`, `MedioSolicitud`, `DescripcionNecesidad`, `FKusuario`, `FKtipoEvento`, `FKestado`, `FKcliente`, `FKtipoServicio`) VALUES
(46, '2025-06-05', '2025-06-05', 'SENA ', 'Manizales', NULL, NULL, 'Web', 'Tecnologo para 30 personas en manizales', 7, 1, 3, 21, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoevento`
--

CREATE TABLE `tipoevento` (
  `idTipoEvento` int(11) NOT NULL,
  `TipoEvento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoevento`
--

INSERT INTO `tipoevento` (`idTipoEvento`, `TipoEvento`) VALUES
(1, 'Reunión'),
(2, 'Feria Comercial'),
(3, 'Congreso'),
(4, 'Conferencia'),
(5, 'Lanzamiento de Producto'),
(6, 'Fiesta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposervicio`
--

CREATE TABLE `tiposervicio` (
  `idTipoServicio` int(11) NOT NULL,
  `TipoServicio` varchar(100) NOT NULL,
  `FKidServicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiposervicio`
--

INSERT INTO `tiposervicio` (`idTipoServicio`, `TipoServicio`, `FKidServicio`) VALUES
(8, 'Ventas', 8),
(10, 'Proyecto', 7),
(11, 'Monitorias', 7),
(13, 'ADSO', 4),
(14, 'Mecanica', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `DocumentoUsuario` varchar(20) NOT NULL,
  `NombreUsuario` varchar(100) NOT NULL,
  `CorreoUsuario` varchar(100) NOT NULL,
  `TelefonoUsuario` varchar(10) NOT NULL,
  `ContraseñaUsuario` varchar(255) NOT NULL,
  `FKidRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `DocumentoUsuario`, `NombreUsuario`, `CorreoUsuario`, `TelefonoUsuario`, `ContraseñaUsuario`, `FKidRol`) VALUES
(7, '1058138879', 'jd', 'jd@gmail.com', '3127591649', '$2y$10$LKv.w4CHFyUTSiDfTt/71.fB2qLKoreykPmufqBPKCgC/ZFc4ivZq', 1),
(8, '10575486', 'Sebitas Ocampo', 'sebitas@gmail.com', '3127591647', '$2y$10$Rp1ilnzpn79WQlGH5bFpCO3OQouDAp/DzkDJXz5svb.1nCYLpkdJ2', 4),
(9, '1058138879', 'Esteban Reyes', 'reyes@gmail.com', '35487962', '$2y$10$MC1gQYgme3tkXRRnmsItFOtrXwsd3foswKSWy3qFXyA/MjrzST7fS', 3),
(10, '147852369', 'Yerson Herrera', 'yerson@gmail.com', '35487962', '$2y$10$i8a7bw0lLIQEkHzuUVsb0e2qRYL3nSYPZT0XzM5RwwGyrZW9Y0JGO', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idServicio`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idSolicitud`),
  ADD KEY `fk_solicitud_usuario` (`FKusuario`),
  ADD KEY `fk_solicitud_tipoevento` (`FKtipoEvento`),
  ADD KEY `fk_solicitud_estado` (`FKestado`),
  ADD KEY `fk_solicitud_cliente` (`FKcliente`),
  ADD KEY `fk_solicitud_tiposervicio` (`FKtipoServicio`);

--
-- Indices de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  ADD PRIMARY KEY (`idTipoEvento`);

--
-- Indices de la tabla `tiposervicio`
--
ALTER TABLE `tiposervicio`
  ADD PRIMARY KEY (`idTipoServicio`),
  ADD KEY `FKidServicio` (`FKidServicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_usuario_rol` (`FKidRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  MODIFY `idTipoEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tiposervicio`
--
ALTER TABLE `tiposervicio`
  MODIFY `idTipoServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_solicitud_cliente` FOREIGN KEY (`FKcliente`) REFERENCES `cliente` (`idCliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_solicitud_estado` FOREIGN KEY (`FKestado`) REFERENCES `estado` (`idEstado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_solicitud_tipoevento` FOREIGN KEY (`FKtipoEvento`) REFERENCES `tipoevento` (`idTipoEvento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_solicitud_tiposervicio` FOREIGN KEY (`FKtipoServicio`) REFERENCES `tiposervicio` (`idTipoServicio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_solicitud_usuario` FOREIGN KEY (`FKusuario`) REFERENCES `usuario` (`idUsuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tiposervicio`
--
ALTER TABLE `tiposervicio`
  ADD CONSTRAINT `tiposervicio_ibfk_1` FOREIGN KEY (`FKidServicio`) REFERENCES `servicio` (`idServicio`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`FKidRol`) REFERENCES `rol` (`idRol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
