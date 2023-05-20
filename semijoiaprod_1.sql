/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `semijoiaprod` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `semijoiaprod`;

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `privilege` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  CONSTRAINT `account_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`id`, `username`, `password`, `email`, `privilege`) VALUES
	(1, 'admin', 'admin', 'admin@gmail.com', 1),
	(2, 'rafael', '123456', 'rafael@gmail.com', 1),
	(3, 'guest', 'guest', 'guest@gmail.com', 0);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

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

/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
INSERT INTO `bill` (`id`, `cart_id`, `user_id`, `shipper_id`, `total_sum`) VALUES
	(1, 0, 1, 1, 152.00),
	(2, 0, 1, 2, 304.00);
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `id` (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`id`, `item_id`, `user_id`, `quantity`) VALUES
	(1, 5, 1, 1),
	(3, 12, 1, 1),
	(25, 1, 0, 1),
	(26, 8, 0, 1),
	(27, 13, 0, 1);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `id` int(10) unsigned NOT NULL,
  `brand` varchar(30) NOT NULL,
  `company` varchar(30) NOT NULL,
  `headquarter` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `manufacturer` DISABLE KEYS */;
INSERT INTO `manufacturer` (`id`, `brand`, `company`, `headquarter`) VALUES
	(1, 'Tiffany-Replic', 'Ind. Brasileira de Semi-Joias', 'Brasil'),
	(2, 'Zara-Replic', 'Ind. Brasileira de Semi-Joias', 'Brasil');
/*!40000 ALTER TABLE `manufacturer` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `brand`, `price`, `image`) VALUES
	(1, 'Anel', 1, 100.00, './assets/products/1.png'),
	(2, 'Anel', 2, 100.00, './assets/products/1.png'),
	(3, 'Anel', 1, 100.00, './assets/products/1.png'),
	(4, 'Anel', 2, 100.00, './assets/products/1.png'),
	(5, 'Anel', 1, 100.00, './assets/products/1.png');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `shipper` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(10) unsigned DEFAULT NULL,
  `area` varchar(30) NOT NULL,
  `cost` double(10,2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `shipper` DISABLE KEYS */;
INSERT INTO `shipper` (`id`, `name`, `age`, `area`, `cost`) VALUES
	(1, 'Guilherme Santo', 18, 'S├úo Paulo', 1.00),
	(2, 'Rafael Lemos', 20, 'S├úo Paulo', 2.00),
	(3, 'Raul Torres', 20, 'Belo Horizonte', 1.50);
/*!40000 ALTER TABLE `shipper` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `gender` tinyint(3) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `money` double(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `fullname`, `phone`, `avatar`, `city`, `gender`, `address`, `money`) VALUES
	(1, 'Admin', '0943284322', 'https://www.shareicon.net/data/128x128/2016/05/26/771187_man_512x512.png', 'BH', 0, NULL, 99999.99),
	(2, 'Rafael', '0828382237', 'https://www.shareicon.net/data/128x128/2016/05/26/771188_man_512x512.png', 'SP', 0, NULL, 50.00),
	(3, 'Guest', NULL, NULL, 'SP', 0, NULL, 0.00);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
