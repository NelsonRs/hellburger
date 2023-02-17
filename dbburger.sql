
-- Volcando estructura para tabla dbburger.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `ci` int DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- Volcando datos para la tabla dbburger.cliente: ~2 rows (aproximadamente)
INSERT INTO `cliente` (`id`, `name`, `ci`) VALUES
	(1, 'Nelson Ribera', 13429820),
	(2, 'Jurgen Nogales', 8188326);

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`)
);



-- Volcando estructura para tabla dbburger.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- Volcando datos para la tabla dbburger.producto: ~11 rows (aproximadamente)
INSERT INTO `producto` (`id`, `name`, `price`, `stock`, `category`) VALUES
	(1, 'Burger Simple', 27.00, 35, 'Food'),
	(2, 'Burger Doble', 35.00, 40, 'Food'),
	(3, 'Burger Triple', 50.00, 25, 'Food'),
	(4, 'Burger Especial', 40.00, 20, 'Food'),
	(5, 'Papas', 5.00, 20, 'Food'),
	(6, 'Coca-Cola 2L', 12.00, 50, 'Drink'),
	(7, 'Fanta 2L', 12.00, 50, 'Drink'),
	(8, 'Sprite 2L', 12.00, 50, 'Drink'),
	(9, 'Coca-Cola 500ml', 8.00, 50, 'Drink'),
	(10, 'Fanta 500ml', 8.00, 50, 'Drink'),
	(11, 'Sprite 500ml', 8.00, 50, 'Drink');


-- Volcando estructura para tabla dbburger.detalle_pedido
CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pedido_id` int DEFAULT NULL,
  `producto_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `subtotal` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedido_id` (`pedido_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`)
);
