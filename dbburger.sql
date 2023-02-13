-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla dbburger.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `ci` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla dbburger.cliente: ~2 rows (aproximadamente)
INSERT INTO `cliente` (`id`, `name`, `ci`) VALUES
	(1, 'Nelson Ribera Sanchez', 13429820),
	(2, 'Jurgen Nogales Melgar', 9584500);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla dbburger.detalle_pedido: ~5 rows (aproximadamente)
INSERT INTO `detalle_pedido` (`id`, `pedido_id`, `producto_id`, `quantity`, `subtotal`) VALUES
	(1, 1, 1, 3, 0.00),
	(2, 1, 2, 4, 0.00),
	(3, 2, 3, 5, 0.00),
	(4, 2, 2, 6, 0.00),
	(5, 2, 3, 7, 0.00);

-- Volcando estructura para tabla dbburger.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla dbburger.pedido: ~3 rows (aproximadamente)
INSERT INTO `pedido` (`id`, `cliente_id`, `total`, `date`) VALUES
	(1, 1, 0.00, '2023-01-07 23:59:03'),
	(2, 2, 0.00, '2023-01-07 23:59:03'),
	(3, 2, 0.00, '2023-01-07 23:59:03');

-- Volcando estructura para tabla dbburger.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla dbburger.producto: ~3 rows (aproximadamente)
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

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
