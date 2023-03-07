-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-03-2023 a las 18:57:32
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gremlinsdb`
--
CREATE DATABASE IF NOT EXISTS `gremlinsdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `gremlinsdb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gr_menu`
--

DROP TABLE IF EXISTS `gr_menu`;
CREATE TABLE `gr_menu` (
  `gr_menu_ID` int(10) NOT NULL,
  `ACTIVO` char(1) NOT NULL DEFAULT 'S',
  `ACTUALIZADO_POR` int(10) NOT NULL,
  `ULTIMA_ACTUALIZACION` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `MENU` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `gr_menu`
--

INSERT INTO `gr_menu` (`gr_menu_ID`, `ACTIVO`, `ACTUALIZADO_POR`, `ULTIMA_ACTUALIZACION`, `MENU`) VALUES
(25, 'S', 2, '2023-03-05 21:14:41', 'Administración'),
(26, 'S', 2, '2023-03-05 21:14:41', 'Ventanas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gr_role`
--

DROP TABLE IF EXISTS `gr_role`;
CREATE TABLE `gr_role` (
  `GR_ROLE_ID` int(10) NOT NULL,
  `ACTIVO` char(1) NOT NULL DEFAULT 'S',
  `ACTUALIZADO_POR` int(10) NOT NULL,
  `ULTIMA_ACTUALIZACION` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ROL` text NOT NULL,
  `DESCRIPCION` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `gr_role`
--

INSERT INTO `gr_role` (`GR_ROLE_ID`, `ACTIVO`, `ACTUALIZADO_POR`, `ULTIMA_ACTUALIZACION`, `ROL`, `DESCRIPCION`) VALUES
(1, 'S', 2, '0000-00-00 00:00:00', 'Administrador Sistema', 'Role Administrador del Sistema'),
(2, 'S', 2, '2023-03-07 17:52:36', 'Gerente P', 'Rol asignado a los perfiles de Gerentes de la Empresa Gremlins'),
(3, 'S', 2, '0000-00-00 00:00:00', 'Administrador Comercial', 'Rol asignado a los perfiles de Administradores Comerciales de la Empresa Gremlins'),
(4, 'S', 2, '0000-00-00 00:00:00', 'Empacador', 'Rol asignado a los perfiles de Empacadores de la Empresa Gremlins'),
(5, 'S', 2, '0000-00-00 00:00:00', 'Transportador', 'Rol asignado a los perfiles de Transportadores de la Empresa Gremlins'),
(6, 'S', 2, '2023-02-21 14:48:24', 'Recepcion', 'Rol asignado a los perfiles de Recepcionista de la Empresa Gremlins');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gr_session`
--

DROP TABLE IF EXISTS `gr_session`;
CREATE TABLE `gr_session` (
  `gr_session_ID` int(10) NOT NULL,
  `gr_user_ID` int(10) NOT NULL,
  `fechaIngreso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fechaEgreso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gr_sub_menu`
--

DROP TABLE IF EXISTS `gr_sub_menu`;
CREATE TABLE `gr_sub_menu` (
  `gr_sub_menu_ID` int(10) NOT NULL,
  `ACTIVO` char(1) NOT NULL DEFAULT 'S',
  `ACTUALIZADO_POR` int(10) NOT NULL,
  `ULTIMA_ACTUALIZACION` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gr_menu_ID` int(10) NOT NULL,
  `SUBMENU` varchar(45) NOT NULL,
  `ICONO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `gr_sub_menu`
--

INSERT INTO `gr_sub_menu` (`gr_sub_menu_ID`, `ACTIVO`, `ACTUALIZADO_POR`, `ULTIMA_ACTUALIZACION`, `gr_menu_ID`, `SUBMENU`, `ICONO`) VALUES
(28, 'S', 2, '2023-03-05 21:21:32', 25, 'Configuración', 'fa-solid fa-gear'),
(29, 'S', 2, '2023-03-05 21:21:32', 26, 'Datos Maestros', 'fa-solid fa-gear'),
(30, 'S', 2, '2023-03-05 21:21:32', 26, 'Ventas', 'fa-solid fa-money-check-dollar'),
(31, 'S', 2, '2023-03-05 21:21:32', 26, 'Compras', 'fa-sharp fa-solid fa-cart-shopping');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gr_user`
--

DROP TABLE IF EXISTS `gr_user`;
CREATE TABLE `gr_user` (
  `GR_USER_ID` int(10) NOT NULL,
  `ACTIVO` char(1) NOT NULL DEFAULT 'S',
  `ACTUALIZADO_POR` int(10) NOT NULL,
  `ULTIMA_ACTUALIZACION` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USUARIO` text NOT NULL,
  `DESCRIPCION` text DEFAULT NULL,
  `GR_ROLE_ID` int(10) NOT NULL,
  `USER` text NOT NULL,
  `PASSWORD` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `gr_user`
--

INSERT INTO `gr_user` (`GR_USER_ID`, `ACTIVO`, `ACTUALIZADO_POR`, `ULTIMA_ACTUALIZACION`, `USUARIO`, `DESCRIPCION`, `GR_ROLE_ID`, `USER`, `PASSWORD`) VALUES
(2, 'S', 2, '0000-00-00 00:00:00', 'Administrador', 'Administrador del Sistema', 1, 'ADMIN', '$2y$10$DUeMnPn3lgUepyDcoNM6.eyjAjmdOaKW2HzNysYjtRMh5HlGjZ1U6'),
(6, 'S', 2, '0000-00-00 00:00:00', 'Maria Parra', '', 3, 'MParra', '$2y$10$tlaxbiNwR46cPWXjG3SLweFOQuwomAHQ2Op9sL3yg98gnpYAFjvyS'),
(8, 'S', 2, '0000-00-00 00:00:00', 'Luis Rodriguez', '', 2, 'LRodriguez', '$2y$10$jYM.v1hJaS8BQTUmhekb0O/CvJ8RjvFGAf3Sv2O4f9mQKdfqEgBoa'),
(9, 'S', 2, '0000-00-00 00:00:00', 'Ernesto Velez', '', 4, 'EVelez', '$2y$10$oYjgdXFQrIablaW5rG20U.jO0meyJuSnA0yTwKx6rxGO66rzDDQDW'),
(10, 'S', 2, '0000-00-00 00:00:00', 'Luisa Vasquez', '', 5, 'LVasquez', '$2y$10$PWzsGZI7zuasAHMHImVUYe4LZXXFkd8bXRtDjuZGULKUxQRLOqI7W'),
(15, 'S', 2, '0000-00-00 00:00:00', 'Carlos Contreras', '', 6, 'CContreras', '$2y$10$lknm4Vq8UZL7KGKl5dGbR.rpGX68jwuWaSFtVFcscSO9cn5/8awGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gr_view`
--

DROP TABLE IF EXISTS `gr_view`;
CREATE TABLE `gr_view` (
  `GR_VIEW_ID` int(10) NOT NULL,
  `ACTIVO` char(1) NOT NULL DEFAULT 'S',
  `ACTUALIZADO_POR` int(10) NOT NULL,
  `ULTIMA_ACTUALIZACION` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `VISTA` text NOT NULL,
  `DESCRIPCION` text DEFAULT NULL,
  `GR_SUB_MENU_ID` int(10) NOT NULL,
  `VENTANA` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `gr_view`
--

INSERT INTO `gr_view` (`GR_VIEW_ID`, `ACTIVO`, `ACTUALIZADO_POR`, `ULTIMA_ACTUALIZACION`, `VISTA`, `DESCRIPCION`, `GR_SUB_MENU_ID`, `VENTANA`) VALUES
(1, 'S', 2, '2023-02-21 19:53:20', 'Permisos', 'Vista Permisos', 28, 'vista'),
(2, 'S', 2, '2023-03-05 21:17:43', 'Roles', 'Vista Roles', 28, 'rol'),
(3, 'S', 2, '2023-03-05 21:17:43', 'Usuarios', 'Vista Usuarios', 28, 'usuario'),
(4, 'S', 2, '0000-00-00 00:00:00', 'Distribuidores', 'Vista Distribuidores', 29, 'distribuidor'),
(5, 'S', 2, '2023-02-21 19:52:15', 'Clientes', 'Vista Clientes', 29, 'cliente'),
(17, 'S', 2, '0000-00-00 00:00:00', 'Productos', 'Vista Productos', 29, 'producto'),
(18, 'S', 2, '0000-00-00 00:00:00', 'Pedidos de Venta', 'Vista Pedidos de Venta', 30, 'pedidoventa'),
(19, 'S', 2, '0000-00-00 00:00:00', 'Envios', 'Vista Envios', 30, 'envio'),
(20, 'S', 2, '0000-00-00 00:00:00', 'Pedidos de Compra', 'Vista Pedidos de Compras', 31, 'pedidocompra'),
(21, 'S', 2, '0000-00-00 00:00:00', 'Entrada de Inventario', 'Vista Entrada de Inventario', 31, 'entrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gr_view_line`
--

DROP TABLE IF EXISTS `gr_view_line`;
CREATE TABLE `gr_view_line` (
  `gr_view_line_ID` int(10) NOT NULL,
  `ACTIVO` char(1) NOT NULL DEFAULT 'S',
  `ACTUALIZADO_POR` int(10) NOT NULL,
  `ULTIMA_ACTUALIZACION` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gr_role_ID` int(10) NOT NULL,
  `gr_view_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `gr_view_line`
--

INSERT INTO `gr_view_line` (`gr_view_line_ID`, `ACTIVO`, `ACTUALIZADO_POR`, `ULTIMA_ACTUALIZACION`, `gr_role_ID`, `gr_view_ID`) VALUES
(31, 'S', 2, '0000-00-00 00:00:00', 1, 4),
(32, 'S', 2, '0000-00-00 00:00:00', 1, 5),
(42, 'S', 2, '0000-00-00 00:00:00', 1, 17),
(43, 'S', 2, '0000-00-00 00:00:00', 1, 1),
(44, 'S', 2, '0000-00-00 00:00:00', 1, 18),
(45, 'S', 2, '0000-00-00 00:00:00', 1, 19),
(46, 'S', 2, '0000-00-00 00:00:00', 1, 20),
(47, 'S', 2, '0000-00-00 00:00:00', 1, 21),
(48, 'S', 2, '0000-00-00 00:00:00', 1, 2),
(49, 'S', 2, '0000-00-00 00:00:00', 1, 3),
(51, 'S', 2, '0000-00-00 00:00:00', 2, 4),
(52, 'S', 2, '0000-00-00 00:00:00', 2, 5),
(53, 'S', 2, '0000-00-00 00:00:00', 2, 17),
(54, 'S', 2, '0000-00-00 00:00:00', 2, 18),
(55, 'S', 2, '0000-00-00 00:00:00', 2, 19),
(56, 'S', 2, '0000-00-00 00:00:00', 2, 20),
(57, 'S', 2, '0000-00-00 00:00:00', 2, 21),
(58, 'S', 2, '0000-00-00 00:00:00', 3, 4),
(59, 'S', 2, '0000-00-00 00:00:00', 6, 4),
(60, 'S', 2, '0000-00-00 00:00:00', 3, 5),
(61, 'S', 2, '0000-00-00 00:00:00', 6, 5),
(62, 'S', 2, '0000-00-00 00:00:00', 4, 5),
(63, 'S', 2, '0000-00-00 00:00:00', 5, 5),
(64, 'S', 2, '0000-00-00 00:00:00', 3, 19),
(65, 'S', 2, '0000-00-00 00:00:00', 4, 19),
(66, 'S', 2, '0000-00-00 00:00:00', 5, 19),
(67, 'S', 2, '0000-00-00 00:00:00', 3, 17),
(68, 'S', 2, '0000-00-00 00:00:00', 4, 17),
(69, 'S', 2, '0000-00-00 00:00:00', 3, 18),
(70, 'S', 2, '0000-00-00 00:00:00', 6, 18),
(71, 'S', 2, '0000-00-00 00:00:00', 3, 20);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `permisosmenus`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `permisosmenus`;
CREATE TABLE `permisosmenus` (
`gr_menu_id` int(10)
,`menu` varchar(45)
,`gr_sub_menu_id` int(10)
,`submenu` varchar(45)
,`icono` varchar(100)
,`gr_view_id` int(10)
,`vista` text
,`activo` varchar(8)
,`ACTUALIZADO_POR` int(10)
,`ULTIMA_ACTUALIZACION` timestamp
,`DESCRIPCION` text
,`VENTANA` varchar(45)
,`gr_user_id` int(10)
,`usuario` text
);

-- --------------------------------------------------------

--
-- Estructura para la vista `permisosmenus`
--
DROP TABLE IF EXISTS `permisosmenus`;

DROP VIEW IF EXISTS `permisosmenus`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `permisosmenus`  AS SELECT `e`.`gr_menu_ID` AS `gr_menu_id`, `e`.`MENU` AS `menu`, `d`.`gr_sub_menu_ID` AS `gr_sub_menu_id`, `d`.`SUBMENU` AS `submenu`, `d`.`ICONO` AS `icono`, `c`.`GR_VIEW_ID` AS `gr_view_id`, `c`.`VISTA` AS `vista`, CASE WHEN `c`.`ACTIVO` = 'S' THEN 'Activo' ELSE 'Inactivo' END AS `activo`, `c`.`ACTUALIZADO_POR` AS `ACTUALIZADO_POR`, `c`.`ULTIMA_ACTUALIZACION` AS `ULTIMA_ACTUALIZACION`, `c`.`DESCRIPCION` AS `DESCRIPCION`, `c`.`VENTANA` AS `VENTANA`, `b`.`GR_USER_ID` AS `gr_user_id`, `b`.`USUARIO` AS `usuario` FROM ((((`gr_view_line` `a` join `gr_user` `b`) join `gr_view` `c`) join `gr_sub_menu` `d`) join `gr_menu` `e`) WHERE `a`.`gr_role_ID` = `b`.`GR_ROLE_ID` AND `a`.`gr_view_ID` = `c`.`GR_VIEW_ID` AND `c`.`GR_SUB_MENU_ID` = `d`.`gr_sub_menu_ID` AND `d`.`gr_menu_ID` = `e`.`gr_menu_ID` ORDER BY `e`.`gr_menu_ID` ASC, `d`.`gr_sub_menu_ID` ASC, `c`.`GR_VIEW_ID` ASC, `b`.`GR_USER_ID` ASC  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gr_menu`
--
ALTER TABLE `gr_menu`
  ADD PRIMARY KEY (`gr_menu_ID`);

--
-- Indices de la tabla `gr_role`
--
ALTER TABLE `gr_role`
  ADD PRIMARY KEY (`GR_ROLE_ID`),
  ADD KEY `ACTUALIZADOXROLE` (`ACTUALIZADO_POR`);

--
-- Indices de la tabla `gr_session`
--
ALTER TABLE `gr_session`
  ADD PRIMARY KEY (`gr_session_ID`),
  ADD KEY `SESSION_USER` (`gr_user_ID`);

--
-- Indices de la tabla `gr_sub_menu`
--
ALTER TABLE `gr_sub_menu`
  ADD PRIMARY KEY (`gr_sub_menu_ID`),
  ADD KEY `SUBMENU_MENU` (`gr_menu_ID`);

--
-- Indices de la tabla `gr_user`
--
ALTER TABLE `gr_user`
  ADD PRIMARY KEY (`GR_USER_ID`),
  ADD KEY `ACTUALIZADOXUSER` (`ACTUALIZADO_POR`),
  ADD KEY `USER_ROLE` (`GR_ROLE_ID`);

--
-- Indices de la tabla `gr_view`
--
ALTER TABLE `gr_view`
  ADD PRIMARY KEY (`GR_VIEW_ID`),
  ADD KEY `ACTUALIZADOXVISTA` (`ACTUALIZADO_POR`),
  ADD KEY `VISTA_SUBMENU` (`GR_SUB_MENU_ID`);

--
-- Indices de la tabla `gr_view_line`
--
ALTER TABLE `gr_view_line`
  ADD PRIMARY KEY (`gr_view_line_ID`),
  ADD KEY `VIEWLINE_ROLE` (`gr_role_ID`),
  ADD KEY `VIEWLINE_VIEW` (`gr_view_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gr_menu`
--
ALTER TABLE `gr_menu`
  MODIFY `gr_menu_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `gr_role`
--
ALTER TABLE `gr_role`
  MODIFY `GR_ROLE_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `gr_session`
--
ALTER TABLE `gr_session`
  MODIFY `gr_session_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `gr_sub_menu`
--
ALTER TABLE `gr_sub_menu`
  MODIFY `gr_sub_menu_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `gr_user`
--
ALTER TABLE `gr_user`
  MODIFY `GR_USER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `gr_view_line`
--
ALTER TABLE `gr_view_line`
  MODIFY `gr_view_line_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gr_role`
--
ALTER TABLE `gr_role`
  ADD CONSTRAINT `ROLE_USER` FOREIGN KEY (`ACTUALIZADO_POR`) REFERENCES `gr_user` (`GR_USER_ID`);

--
-- Filtros para la tabla `gr_session`
--
ALTER TABLE `gr_session`
  ADD CONSTRAINT `SESSION_USER` FOREIGN KEY (`gr_user_ID`) REFERENCES `gr_user` (`GR_USER_ID`);

--
-- Filtros para la tabla `gr_sub_menu`
--
ALTER TABLE `gr_sub_menu`
  ADD CONSTRAINT `SUBMENU_MENU` FOREIGN KEY (`gr_menu_ID`) REFERENCES `gr_menu` (`gr_menu_ID`);

--
-- Filtros para la tabla `gr_user`
--
ALTER TABLE `gr_user`
  ADD CONSTRAINT `USER_ROLE` FOREIGN KEY (`GR_ROLE_ID`) REFERENCES `gr_role` (`GR_ROLE_ID`);

--
-- Filtros para la tabla `gr_view`
--
ALTER TABLE `gr_view`
  ADD CONSTRAINT `VISTA_SUBMENU` FOREIGN KEY (`GR_SUB_MENU_ID`) REFERENCES `gr_sub_menu` (`gr_sub_menu_ID`),
  ADD CONSTRAINT `VISTA_USER` FOREIGN KEY (`ACTUALIZADO_POR`) REFERENCES `gr_user` (`GR_USER_ID`);

--
-- Filtros para la tabla `gr_view_line`
--
ALTER TABLE `gr_view_line`
  ADD CONSTRAINT `VIEWLINE_ROLE` FOREIGN KEY (`gr_role_ID`) REFERENCES `gr_role` (`GR_ROLE_ID`),
  ADD CONSTRAINT `VIEWLINE_VIEW` FOREIGN KEY (`gr_view_ID`) REFERENCES `gr_view` (`GR_VIEW_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


GRANT USAGE ON *.* TO `gremlinsUserDB`@`localhost` IDENTIFIED BY PASSWORD '*7D597E99129D278E8D839207AC0D6DA73E18DC82';

GRANT SELECT, INSERT, UPDATE, DELETE ON `gremlinsdb`.* TO `gremlinsUserDB`@`localhost`;