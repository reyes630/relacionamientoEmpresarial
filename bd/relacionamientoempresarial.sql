-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2025 a las 04:12:00
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
(21, '1058138879', 'Esteban Reyes A', 'reyesagudeloesteban9@gmail.com', '3127591649'),
(22, '10687243', 'Maye Agudelo', 'maye@gmail.com', '209034904'),
(23, '383758374', 'Sebastian', 'sebas@gmail.com', '2326264'),
(24, '1023456789', 'Laura Sánchez', 'laura.sanchez@testmail.com', '3001234567'),
(25, '1012345678', 'Andrés Martínez', 'andres.martinez@testmail.com', '3112345678'),
(26, '1032548796', 'Laura Gómez Restrepo', 'laura.gomez@example.com', '3124567890'),
(27, '1023987451', 'Andrés Felipe Torres', 'andrestorres93@example.com', '3109876543'),
(28, '1001346789', 'Mariana Sánchez Pineda', 'mariana.sp@example.com', '3112345678'),
(29, '18592022', 'Rafael Antonio Agudelo', 'Rafa@example.com', '3127658365'),
(30, '1234567890', 'Ingeniero del Sabor', 'inmge@example.com', '31254765'),
(31, '1054134786', 'Maryelly Agudelo Lopez', 'maye@example.com', '3116006357');

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
(5, 'Tecnico', '#fff700'),
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
  `Observaciones` text DEFAULT NULL,
  `Comentarios` text DEFAULT NULL,
  `MedioSolicitud` varchar(50) DEFAULT NULL,
  `DescripcionNecesidad` varchar(100) DEFAULT NULL,
  `FKusuario` int(11) NOT NULL,
  `FKtipoEvento` int(11) NOT NULL,
  `FKestado` int(11) NOT NULL,
  `FKcliente` int(11) NOT NULL,
  `FKtipoServicio` int(11) NOT NULL,
  `Asignacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idSolicitud`, `FechaEvento`, `FechaCreacion`, `Lugar`, `Municipio`, `Observaciones`, `Comentarios`, `MedioSolicitud`, `DescripcionNecesidad`, `FKusuario`, `FKtipoEvento`, `FKestado`, `FKcliente`, `FKtipoServicio`, `Asignacion`) VALUES
(52, '2025-06-11', '2025-06-19', 'Centro cultural', 'Manizales', '', '', 'Web', 'Tgo para 30 personas ', 9, 1, 5, 26, 31, 8),
(53, '2025-06-19', '2025-06-19', 'Hotel san Francisco', 'Villamaria', '', '', 'Web', '20 personas de la empresa', 9, 1, 2, 27, 46, 8),
(54, '2025-06-09', '2025-06-19', 'Centro cultural', 'Villamaria', '25-06-25, Se comunico con Mariana sanches y se porgramo reunión para el dia 01-07-2025 a la 1:00pm ', '', 'Web', 'Emprendedores del campo', 9, 1, 2, 28, 35, 9),
(55, '2025-06-19', '2025-06-19', 'Centro cultural', 'Villamaria', '', '', 'Web', 'sin descripción', 7, 1, 2, 29, 42, 9),
(57, '2025-06-28', '2025-06-28', '', 'Villamaria', '03-7-2025 En la reunción se dice que la microempresa de dieños de zapatos para bata, requiere un cur', '29-06-2025 Se realizo llamada y no hubo respuetsa, se envio correo donde se informa sobre el inicio.', 'Web', 'Curso para microempresa de ingles comunicativo', 7, 1, 8, 31, 57, 9);

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
(8, 'Control de Calidad en Confección Industrial', 5),
(13, 'Programación de Aplicaciones y Servicios para', 5),
(14, 'Proyectos Agropecuarios', 5),
(15, 'Servicios y Operaciones Microfinancieras', 5),
(18, 'Reparación de Motores', 5),
(19, 'Técnico en Calzado', 5),
(20, 'Reparación de Máquinas de Confección', 5),
(21, 'Manejo Básico de Computadores', 5),
(22, 'Servicio al Cliente', 5),
(23, 'Mesa y Bar', 5),
(24, 'Análisis y Desarrollo de Software', 4),
(25, 'Animación 3D', 4),
(26, 'Animación Digital', 4),
(27, 'Coordinación de Procesos Logísticos', 4),
(28, 'Desarrollo de Colecciones para la Industria d', 4),
(29, 'Desarrollo de Productos Electrónicos', 4),
(30, 'Desarrollo de Videojuegos y Entornos Interact', 4),
(31, 'Desarrollo Multimedia y Web', 4),
(32, 'Asesoría para la creación de empresas', 8),
(33, 'Fondo Emprender (capital semilla)', 8),
(34, 'Fortalecimiento para PyMEs', 8),
(35, 'Formación a la medida para empresas', 8),
(36, 'Formación continua especializada para empresa', 8),
(37, 'Intermediación y orientación de emprendimient', 8),
(38, 'Acompañamiento en modelos de negocio', 8),
(39, 'Red de Investigación, Desarrollo e Innovación', 7),
(40, 'Centros de Desarrollo Tecnológico (CDT)', 7),
(41, ' Observatorio de Ciencia, Tecnología e Innova', 7),
(42, 'Investigación aplicada en formación profesion', 7),
(43, 'Proyectos de extensión tecnológica', 7),
(44, 'Tecnoparques (aceleración prototipos)', 7),
(45, 'Desarrollo de aplicaciones móviles', 6),
(46, 'Autocad 2D y 3D', 6),
(47, 'Adobe Illustrator y Photoshop', 6),
(48, 'Adobe Illustrator y Photoshop', 6),
(50, 'Corel Draw', 6),
(56, 'Fotografía', 6),
(57, 'Inglés (niveles 1 a 13)', 6),
(58, 'Electrónica y sensores industriales', 6);

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
(8, '10575486', 'Sebitas Ocampo', 'sebitas@instructor.com', '3127591647', '$2y$10$Rp1ilnzpn79WQlGH5bFpCO3OQouDAp/DzkDJXz5svb.1nCYLpkdJ2', 4),
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
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  MODIFY `idTipoEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tiposervicio`
--
ALTER TABLE `tiposervicio`
  MODIFY `idTipoServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
