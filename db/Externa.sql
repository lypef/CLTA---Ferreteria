-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2018 a las 06:28:03
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `distri44_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(254) NOT NULL,
  `ubicacion` varchar(254) NOT NULL,
  `telefono` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `nombre`, `ubicacion`, `telefono`) VALUES
(1, 'CHILPANCINGO', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nombre` varchar(254) NOT NULL,
  `direccion` varchar(254) NOT NULL,
  `telefono` varchar(254) NOT NULL,
  `descuento` int(11) NOT NULL,
  `rfc` varchar(254) NOT NULL,
  `razon_social` varchar(254) NOT NULL,
  `correo` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `nombre`, `direccion`, `telefono`, `descuento`, `rfc`, `razon_social`, `correo`) VALUES
(1, 'PUBLICO EN GENERAL', 'Av. Solidaridad las Torres, Col. Santa Ana Tlaplaltitlan, Toluca, Estado de México, Cp. 52400', '9231299595', 0, 'AEDF920124554445G3', 'ASOCIADOS SA DE CV', 'AAA@A.COM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(254) NOT NULL,
  `descripcion` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`, `descripcion`) VALUES
(3, 'PARTES ELECTRICAS', 'marchas, alternadores, faros, cuartos, palancas, etc.\r\n'),
(4, 'MAQUINARIA', 'MAQUINARIA '),
(25, 'LLANTAS Y CAMARAS', 'llantas, cámaras, corbatas, válvulas, rines, etc.'),
(26, 'ACEITES GRASAS Y LUBRICANTES', 'aceites, grasas, filtros, anticongelantes y lubricantes en gral.'),
(27, 'MOTOR', 'pistones, camisas,anillos, cigueñales, metales, cabezas, árbol de levas, válvulas, Jgos de juntas, bombas de aceite, empaques, etc.'),
(28, 'TREN DE RODAJE', 'cadenas, zapatas, chumaceras, caimanes, roles, ruedas guías, guardas, segmentos, aros dentados, resortes, sellos, pistones, cañones, etc.'),
(29, 'HERRAMIENTA DE CORTE', 'puntas, dientes, cuchillas, gavilanes,seguros, pernos, botes, etc.'),
(30, 'EJE TRASERO Y DELANTERO', 'flechas, engranes, mazas, mangos, pernos de mangos ,baleros, Jgos. de corona y piñón, etc.'),
(31, 'TRASMISIÓN Y CONVERTIDOR', 'sellos, discos, engranes, bombas, pistones, anillos sellos, turbinas, empaques etc.'),
(32, 'TORNILLERIA', 'tuercas, tornillos Y birlos\r\n'),
(33, 'VARIOS', 'ARTICULOS QUE NO ENTRAN EN LOS DEMAS DEPARTAMENTOS'),
(34, 'FRENOS', 'balatas, sellos, cilindros, bombas, discos, tambores. etc.'),
(35, 'SISTEMA HIDRAULICO', 'bombas. sellos, cilindros, valvulas, cilindros, etc.'),
(36, 'FILTROS', 'FILTROS, COLECTORES, TRAMPAS DE AGUA ETC.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(254) NOT NULL,
  `nombre_corto` varchar(254) NOT NULL,
  `direccion` varchar(254) NOT NULL,
  `correo` varchar(254) NOT NULL,
  `telefono` varchar(254) NOT NULL,
  `mision` longtext NOT NULL,
  `vision` longtext NOT NULL,
  `contacto` longtext NOT NULL,
  `facebook` varchar(254) NOT NULL,
  `twitter` varchar(254) NOT NULL,
  `youtube` varchar(254) NOT NULL,
  `iva` int(11) NOT NULL,
  `footer` longtext NOT NULL,
  `cfdi_lugare_expedicion` varchar(254) NOT NULL,
  `cfdi_rfc` varchar(254) NOT NULL,
  `cfdi_regimen` varchar(254) NOT NULL,
  `cfdi_cer` varchar(254) NOT NULL,
  `cfdi_key` varchar(254) NOT NULL,
  `cfdi_pass` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `nombre_corto`, `direccion`, `correo`, `telefono`, `mision`, `vision`, `contacto`, `facebook`, `twitter`, `youtube`, `iva`, `footer`, `cfdi_lugare_expedicion`, `cfdi_rfc`, `cfdi_regimen`, `cfdi_cer`, `cfdi_key`, `cfdi_pass`) VALUES
(1, 'Distribuidora de Tracto Partes Loaiza', 'DTP-L', 'LATERAL DE INSURGENTES 13 FRACC. LAS MARGARITAS CHILPANCINGO  GRO        ', 'contacto@distribuidoradetractopartesloaiza,com', ' 7474914526  cel. 7471619824', 'SERVIMOS A EL SECTOR DE LA MAQUINARIA , LA MINERÍA Y LA CONSTRUCCIÓN CON PRODUCTOS DE INMEJORABLE CALIDAD, LA MEJOR LOGÍSTICA, UN GRAN SURTIDO DE PARTES Y EL MEJOR SERVICIO.', 'TENEMOS LA VISIÓN DE UN MEJOR PAÍS APORTANDO NUESTRO GRANO DE ARENA PARA CONSTRUIR INFRAESTRUCTURA Y APOYANDO AL PROGRESO CON NUESTROS SERVICIOS', 'contacto@distribuidoradetractopartesloaiza.com', 'https://www.facebook.com/DTPL-Chilpancingo', '', '', 16, '*** LOS ARTICULOS MARCADOS CON 3 ASTERISCOS TIENEN UN PLAZO DE ENTREGA DE 3 DIAS HABILES.\r\n** PRECIOS Y EXISTENCIAS SUJETAS A CAMBIO SIN PREVIO AVISO\r\n * NO SE ACEPTAN DEVOLUCIONES\r\nDEPOSITOS O TRANSFERENCIAS:\r\n BANCOMER: CUENTA NO: 0466716814, CLABE: 012420004667168140\r\n', '96980', 'LOLA560503FU9', '621', 'SDK2/certificados/CSD_alfonso_loaiza_loaeza_LOLA560503FU9_20180604_133248s.cer', 'SDK2/certificados/CSD_alfonso_loaiza_loaeza_LOLA560503FU9_20180604_133248.key', 'alfo5653');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `serie` varchar(254) NOT NULL,
  `folio` varchar(254) NOT NULL,
  `estatus` varchar(254) NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folio_venta`
--

CREATE TABLE `folio_venta` (
  `folio` varchar(254) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `open` tinyint(1) NOT NULL,
  `cobrado` float DEFAULT NULL,
  `fecha_venta` datetime DEFAULT NULL,
  `cut` tinyint(1) DEFAULT '0',
  `sucursal` int(11) NOT NULL,
  `cut_global` int(11) NOT NULL DEFAULT '0',
  `iva` int(11) NOT NULL DEFAULT '0',
  `t_pago` varchar(254) NOT NULL DEFAULT 'Ninguno',
  `pedido` tinyint(1) NOT NULL DEFAULT '0',
  `folio_venta_ini` varchar(254) DEFAULT NULL,
  `cotizacion` tinyint(1) NOT NULL DEFAULT '0',
  `concepto` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `no. De parte` varchar(254) NOT NULL,
  `nombre` varchar(254) NOT NULL,
  `descripcion` longtext NOT NULL,
  `almacen` int(11) NOT NULL,
  `departamento` int(11) NOT NULL,
  `loc_almacen` varchar(254) NOT NULL,
  `marca` varchar(254) NOT NULL,
  `proveedor` varchar(254) NOT NULL,
  `foto0` varchar(254) NOT NULL,
  `foto1` varchar(254) NOT NULL,
  `foto2` varchar(254) NOT NULL,
  `foto3` varchar(254) NOT NULL,
  `oferta` tinyint(1) NOT NULL DEFAULT '0',
  `precio_normal` float NOT NULL DEFAULT '0',
  `precio_oferta` float NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL,
  `tiempo de entrega` varchar(254) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `stock_max` int(11) NOT NULL,
  `precio_costo` float NOT NULL DEFAULT '0',
  `cv` varchar(254) NOT NULL DEFAULT '01010101',
  `um` varchar(254) NOT NULL DEFAULT 'H87',
  `um_des` varchar(254) NOT NULL DEFAULT 'NA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_sub`
--

CREATE TABLE `productos_sub` (
  `id` int(11) NOT NULL,
  `padre` int(11) NOT NULL,
  `almacen` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `ubicacion` varchar(254) NOT NULL,
  `max` int(11) NOT NULL DEFAULT '0',
  `min` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_pedido`
--

CREATE TABLE `product_pedido` (
  `id` int(11) NOT NULL,
  `folio_venta` varchar(254) NOT NULL,
  `product` int(11) DEFAULT NULL,
  `unidades` int(11) NOT NULL,
  `precio` float NOT NULL,
  `p_generico` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_venta`
--

CREATE TABLE `product_venta` (
  `id` int(11) NOT NULL,
  `folio_venta` varchar(254) NOT NULL,
  `product` int(11) DEFAULT NULL,
  `unidades` int(11) NOT NULL,
  `precio` float NOT NULL,
  `product_sub` int(11) DEFAULT NULL,
  `p_generico` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(254) NOT NULL,
  `direccion` varchar(254) NOT NULL,
  `telefono` varchar(254) NOT NULL,
  `cfdi_serie` varchar(254) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre`, `direccion`, `telefono`, `cfdi_serie`) VALUES
(7, 'Chilpancigo', 'dir', '000', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `nombre` varchar(254) NOT NULL,
  `imagen` varchar(254) NOT NULL,
  `product_add` tinyint(1) NOT NULL DEFAULT '0',
  `product_gest` tinyint(1) NOT NULL DEFAULT '0',
  `gen_orden_compra` tinyint(1) NOT NULL DEFAULT '0',
  `client_add` tinyint(1) NOT NULL DEFAULT '0',
  `client_guest` tinyint(1) NOT NULL DEFAULT '0',
  `almacen_add` tinyint(1) NOT NULL DEFAULT '0',
  `almacen_guest` tinyint(1) NOT NULL DEFAULT '0',
  `depa_add` tinyint(1) NOT NULL DEFAULT '0',
  `depa_guest` tinyint(1) NOT NULL DEFAULT '0',
  `propiedades` tinyint(1) NOT NULL DEFAULT '0',
  `usuarios` tinyint(1) NOT NULL DEFAULT '0',
  `finanzas` tinyint(1) NOT NULL DEFAULT '0',
  `descripcion` longtext NOT NULL,
  `sucursal` int(11) NOT NULL,
  `change_suc` tinyint(1) NOT NULL,
  `sucursal_gest` tinyint(1) NOT NULL DEFAULT '0',
  `caja` tinyint(1) NOT NULL DEFAULT '0',
  `super_pedidos` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nombre`, `imagen`, `product_add`, `product_gest`, `gen_orden_compra`, `client_add`, `client_guest`, `almacen_add`, `almacen_guest`, `depa_add`, `depa_guest`, `propiedades`, `usuarios`, `finanzas`, `descripcion`, `sucursal`, `change_suc`, `sucursal_gest`, `caja`, `super_pedidos`) VALUES
(1, 'root', '63a9f0ea7bb98050796b649e85481845', 'Leonardo', 'users/usuario20180928201617.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'aaaa', 2, 1, 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `cliente_cliente` (`cliente`);

--
-- Indices de la tabla `folio_venta`
--
ALTER TABLE `folio_venta`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `client_folio` (`client`),
  ADD KEY `vendedor_folio` (`vendedor`),
  ADD KEY `sale_sucursal` (`sucursal`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_almacen` (`almacen`),
  ADD KEY `producto_departamento` (`departamento`);

--
-- Indices de la tabla `productos_sub`
--
ALTER TABLE `productos_sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `padre_hijo` (`padre`),
  ADD KEY `hijo_almacen` (`almacen`);

--
-- Indices de la tabla `product_pedido`
--
ALTER TABLE `product_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto` (`product`),
  ADD KEY `folio` (`folio_venta`);

--
-- Indices de la tabla `product_venta`
--
ALTER TABLE `product_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folio_venta` (`folio_venta`),
  ADD KEY `sale_product` (`product`),
  ADD KEY `hijo` (`product_sub`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendedor_sucursal` (`sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos_sub`
--
ALTER TABLE `productos_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product_pedido`
--
ALTER TABLE `product_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product_venta`
--
ALTER TABLE `product_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `cliente_cliente` FOREIGN KEY (`cliente`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `folio_venta`
--
ALTER TABLE `folio_venta`
  ADD CONSTRAINT `client_folio` FOREIGN KEY (`client`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_sucursal` FOREIGN KEY (`sucursal`) REFERENCES `sucursales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vendedor_folio` FOREIGN KEY (`vendedor`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `producto_almacen` FOREIGN KEY (`almacen`) REFERENCES `almacen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_departamento` FOREIGN KEY (`departamento`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_sub`
--
ALTER TABLE `productos_sub`
  ADD CONSTRAINT `hijo_almacen` FOREIGN KEY (`almacen`) REFERENCES `almacen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `padre_hijo` FOREIGN KEY (`padre`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `product_pedido`
--
ALTER TABLE `product_pedido`
  ADD CONSTRAINT `folio` FOREIGN KEY (`folio_venta`) REFERENCES `folio_venta` (`folio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto` FOREIGN KEY (`product`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `product_venta`
--
ALTER TABLE `product_venta`
  ADD CONSTRAINT `folio_venta` FOREIGN KEY (`folio_venta`) REFERENCES `folio_venta` (`folio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hijo` FOREIGN KEY (`product_sub`) REFERENCES `productos_sub` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_product` FOREIGN KEY (`product`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `vendedor_sucursal` FOREIGN KEY (`sucursal`) REFERENCES `sucursales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
