
CREATE DATABASE IF NOT EXISTS `dbburger` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbburger`;

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ci` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DELETE FROM `cliente`;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DELETE FROM `pedido`;
INSERT INTO `pedido` (`id`, `cliente_id`, `total`, `date`) VALUES
	(1, 2, 27.00, '2023-02-17 15:14:58'),
	(2, 2, 27.00, '2023-02-17 15:22:17'),
	(3, 2, 27.00, '2023-02-17 15:31:38'),
	(4, 2, 27.00, '2023-02-17 15:35:43'),
	(5, 2, 27.00, '2023-02-17 15:38:35'),
	(6, 2, 27.00, '2023-02-17 16:02:30');

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `category` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DELETE FROM `producto`;
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DELETE FROM `detalle_pedido`;
INSERT INTO `detalle_pedido` (`id`, `pedido_id`, `producto_id`, `quantity`, `subtotal`) VALUES
	(25, 1, 1, 1, 27.00),
	(26, 2, 1, 1, 27.00),
	(27, 3, 1, 1, 27.00),
	(28, 4, 1, 1, 27.00),
	(29, 5, 1, 1, 27.00),
	(30, 6, 1, 1, 27.00);