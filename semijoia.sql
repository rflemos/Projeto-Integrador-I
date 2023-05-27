-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.20-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para semijoiaprod
CREATE DATABASE IF NOT EXISTS `semijoiaprod` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `semijoiaprod`;

-- Copiando estrutura para tabela semisemijoiaprodjoiaprod.account
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `privilege` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `account_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela semijoiaprod.account: ~3 rows (aproximadamente)
INSERT INTO `account` (`id`, `username`, `password`, `email`, `privilege`) VALUES
	(0, 'guest', 'guest', '', 1),
	(1, 'admin', 'admin', 'admin@gmail.com', 1),
	(2, 'rafael', '123456', 'rafael@gmail.com', 1),
	(3, 'guest1', 'guest1', '', 1);

-- Copiando estrutura para tabela semijoiaprod.bill
CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` int(10) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `shipper_id` int(11) unsigned NOT NULL,
  `total_sum` double(10,2) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `shipper_id` (`shipper_id`),
  KEY `bill_id` (`cart_id`),
  CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`shipper_id`) REFERENCES `shipper` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `bill_ibfk_3` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela semijoiaprod.bill: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela semijoiaprod.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `id` (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela semijoiaprod.cart: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela semijoiaprod.manufacturer
CREATE TABLE IF NOT EXISTS `manufacturer` (
  `id` int(10) unsigned NOT NULL,
  `brand` varchar(30) NOT NULL,
  `company` varchar(30) NOT NULL,
  `headquarter` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela semijoiaprod.manufacturer: ~2 rows (aproximadamente)
INSERT INTO `manufacturer` (`id`, `brand`, `company`, `headquarter`) VALUES
	(1, 'Tiffany-Replic', 'Ind. Brasileira de Semi-Joias', 'Brasil'),
	(2, 'Zara-Replic', 'Ind. Brasileira de Semi-Joias', 'Brasil');

-- Copiando estrutura para tabela semijoiaprod.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `brand` int(10) unsigned NOT NULL,
  `price` double(10,2) unsigned NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand` (`brand`),
  KEY `id` (`id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brand`) REFERENCES `manufacturer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela semijoiaprod.product: ~6 rows (aproximadamente)
INSERT INTO `product` (`id`, `name`, `brand`, `price`, `image`) VALUES
	(1, 'Anel Zirconio', 1, 100.00, './assets/products/Anel Zircônia Vermelha.png'),
	(2, 'Brinco Coração Folhas de Ouro', 2, 150.00, './assets/products/Brinco Coração Folhas de Ouro.png'),
	(3, 'Brinco de Perolas', 1, 100.00, './assets/products/Brinco Pérola Dupla.png'),
	(4, 'Colar Duplo', 2, 200.00, './assets/products/Colar Duplo Abacaxis.png'),
	(5, 'Pulseira Lagrima de Cristal', 1, 190.00, './assets/products/Pulseira Riviera Malévola.png'),
	(6, 'Gargantilha', 1, 250.00, './assets/products/Gargantilha Folhas de Ouro.png');

-- Copiando estrutura para tabela semijoiaprod.shipper
CREATE TABLE IF NOT EXISTS `shipper` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(10) unsigned DEFAULT NULL,
  `area` varchar(30) NOT NULL,
  `cost` double(10,2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela semijoiaprod.shipper: ~3 rows (aproximadamente)
INSERT INTO `shipper` (`id`, `name`, `age`, `area`, `cost`) VALUES
	(1, 'Guilherme Santo', 18, 'São Paulo', 1.00),
	(2, 'Rafael Lemos', 20, 'São Paulo', 2.00),
	(3, 'Raul Torres', 20, 'Belo Horizonte', 1.50);

-- Copiando estrutura para tabela semijoiaprod.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `gender` tinyint(3) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `money` double(10,2) unsigned NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela semijoiaprod.user: ~3 rows (aproximadamente)
INSERT INTO `user` (`id`, `fullname`, `phone`, `avatar`, `city`, `gender`, `address`, `money`) VALUES
   (0, 'GUEST', '0943284322', 'https://www.shareicon.net/data/128x128/2016/05/26/771187_man_512x512.png', 'BH', 0, NULL, 99999.99), 
	(1, 'Admin', '0943284322', 'https://www.shareicon.net/data/128x128/2016/05/26/771187_man_512x512.png', 'BH', 0, NULL, 99999.99),
	(2, 'Rafael', '0828382237', 'https://www.shareicon.net/data/128x128/2016/05/26/771188_man_512x512.png', 'SP', 0, NULL, 50.00),
	(3, 'Guest1', NULL, NULL, 'SP', 0, NULL, 0.00);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;