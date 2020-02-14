-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 02:58 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acme`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Category classifications of inventory items';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Cannon'),
(2, 'Explosive'),
(3, 'Misc'),
(4, 'Rocket'),
(5, 'Trap');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comments`) VALUES
(94, 'Alexander', 'Calva', 'u.alexandercalva@gmail.com', '$2y$10$NkBTv7b5pHa8NU5lPzwlReWdifH6Xh5rl7x3ArRGj1xoPeW1BgoRG', '3', 'Admin'),
(98, 'Asael', 'Calva', 'asael@gmail.com', '$2y$10$iYtZKxpKVCc6mHAe.y4fTu2ytLsJp8d3tzGJUQWU55dgbXfWMyHlS', '1', 'Asa'),
(99, 'Ulvio', 'Calva', 'ulvio@gmail.com', '$2y$10$6.8Oi7OzkuIor9ZOHjtAqu0y8kwGIvfpzUaefSumd9sAWFfzzOC8e', '1', 'n'),
(101, 'Karol', 'Paredes', 'kscalvap@gmail.com', '$2y$10$6TdDw9JdJzliiII6tJaCg.FJVpeYoGmwdofkc5BFP3.k1U1fbx2Ya', '1', 'Karol');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(10) UNSIGNED NOT NULL,
  `invId` int(10) UNSIGNED NOT NULL,
  `imgName` varchar(100) NOT NULL,
  `imgPath` varchar(150) NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`) VALUES
(3, 11, 'tnt.png', '/uploads/images/tnt.png', '2019-11-26 01:44:00'),
(4, 11, 'tnt-tn.png', '/uploads/images/tnt-tn.png', '2019-11-26 01:44:00'),
(5, 8, 'anvil.png', '/uploads/images/anvil.png', '2019-11-26 02:16:10'),
(6, 8, 'anvil-tn.png', '/uploads/images/anvil-tn.png', '2019-11-26 02:16:10'),
(7, 3, 'catapult.png', '/uploads/images/catapult.png', '2019-11-26 02:16:49'),
(8, 3, 'catapult-tn.png', '/uploads/images/catapult-tn.png', '2019-11-26 02:16:49'),
(9, 14, 'helmet.png', '/uploads/images/helmet.png', '2019-11-26 02:17:15'),
(10, 14, 'helmet-tn.png', '/uploads/images/helmet-tn.png', '2019-11-26 02:17:15'),
(11, 4, 'roadrunner.jpg', '/uploads/images/roadrunner.jpg', '2019-11-26 02:18:03'),
(12, 4, 'roadrunner-tn.jpg', '/uploads/images/roadrunner-tn.jpg', '2019-11-26 02:18:03'),
(13, 5, 'trap.jpg', '/uploads/images/trap.jpg', '2019-11-26 02:19:21'),
(14, 5, 'trap-tn.jpg', '/uploads/images/trap-tn.jpg', '2019-11-26 02:19:21'),
(15, 13, 'piano.jpg', '/uploads/images/piano.jpg', '2019-11-26 02:19:41'),
(16, 13, 'piano-tn.jpg', '/uploads/images/piano-tn.jpg', '2019-11-26 02:19:41'),
(17, 6, 'hole.png', '/uploads/images/hole.png', '2019-11-26 02:20:12'),
(18, 6, 'hole-tn.png', '/uploads/images/hole-tn.png', '2019-11-26 02:20:12'),
(19, 7, 'no-image.png', '/uploads/images/no-image.png', '2019-11-26 02:20:31'),
(20, 7, 'no-image-tn.png', '/uploads/images/no-image-tn.png', '2019-11-26 02:20:31'),
(21, 10, 'mallet.png', '/uploads/images/mallet.png', '2019-11-26 02:20:46'),
(22, 10, 'mallet-tn.png', '/uploads/images/mallet-tn.png', '2019-11-26 02:20:46'),
(23, 9, 'rubberband.jpg', '/uploads/images/rubberband.jpg', '2019-11-26 02:21:16'),
(24, 9, 'rubberband-tn.jpg', '/uploads/images/rubberband-tn.jpg', '2019-11-26 02:21:16'),
(25, 18, 'mortar.jpg', '/uploads/images/mortar.jpg', '2019-11-26 02:21:46'),
(26, 18, 'mortar-tn.jpg', '/uploads/images/mortar-tn.jpg', '2019-11-26 02:21:46'),
(27, 15, 'rope.jpg', '/uploads/images/rope.jpg', '2019-11-26 02:23:44'),
(28, 15, 'rope-tn.jpg', '/uploads/images/rope-tn.jpg', '2019-11-26 02:23:44'),
(29, 12, 'seed.jpg', '/uploads/images/seed.jpg', '2019-11-26 02:24:04'),
(30, 12, 'seed-tn.jpg', '/uploads/images/seed-tn.jpg', '2019-11-26 02:24:04'),
(31, 1, 'rocket.png', '/uploads/images/rocket.png', '2019-11-26 02:24:18'),
(32, 1, 'rocket-tn.png', '/uploads/images/rocket-tn.png', '2019-11-26 02:24:18'),
(33, 17, 'bomb.png', '/uploads/images/bomb.png', '2019-11-26 02:24:55'),
(34, 17, 'bomb-tn.png', '/uploads/images/bomb-tn.png', '2019-11-26 02:24:55'),
(35, 16, 'fence.png', '/uploads/images/fence.png', '2019-11-26 02:25:06'),
(36, 16, 'fence-tn.png', '/uploads/images/fence-tn.png', '2019-11-26 02:25:06'),
(37, 18, 'phpMyadmin.jpg', '/uploads/images/phpMyadmin.jpg', '2019-11-27 14:27:16'),
(38, 18, 'phpMyadmin-tn.jpg', '/uploads/images/phpMyadmin-tn.jpg', '2019-11-27 14:27:16'),
(41, 10, 'hashedpassword.jpg', '/uploads/images/hashedpassword.jpg', '2019-11-29 14:30:11'),
(42, 10, 'hashedpassword-tn.jpg', '/uploads/images/hashedpassword-tn.jpg', '2019-11-29 14:30:11'),
(47, 18, 'Coyote.jpg', '/uploads/images/Coyote.jpg', '2019-11-29 23:10:42'),
(48, 18, 'Coyote-tn.jpg', '/uploads/images/Coyote-tn.jpg', '2019-11-29 23:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(10) UNSIGNED NOT NULL,
  `invName` varchar(50) NOT NULL DEFAULT '',
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL DEFAULT '',
  `invThumbnail` varchar(50) NOT NULL DEFAULT '',
  `invPrice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `invStock` smallint(6) NOT NULL DEFAULT 0,
  `invSize` smallint(6) NOT NULL DEFAULT 0,
  `invWeight` smallint(6) NOT NULL DEFAULT 0,
  `invLocation` varchar(35) NOT NULL DEFAULT '',
  `categoryId` int(10) UNSIGNED NOT NULL,
  `invVendor` varchar(20) NOT NULL DEFAULT '',
  `invStyle` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Acme Inc. Inventory Table';

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invName`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invSize`, `invWeight`, `invLocation`, `categoryId`, `invVendor`, `invStyle`) VALUES
(1, 'Rocket', 'Rocket for multiple purposes. This can be launched independently to deliver a payload or strapped on to help get you to where you want to be FAST!!! Really Fast!', '/uploads/images/rocket.png', '/uploads/images/rocket-tn.png', '1320.00', 5, 60, 90, 'California', 4, 'Goddard', 'metal'),
(3, 'Catapult', 'Our best wooden catapult. Ideal for hurling objects for up to 1000 yards. Payloads of up to 300 lbs.', '/uploads/images/catapult.png', '/uploads/images/catapult-tn.png', '2500.00', 4, 1569, 400, 'Cedar Point, IO', 1, 'Wooden Creations', 'Wood'),
(4, 'Female RoadRunner Cutout', 'This carbon fiber backed cutout of a female roadrunner is sure to catch the eye of any male roadrunner.', '/uploads/images/roadrunner.jpg', '/uploads/images/roadrunner-tn.jpg', '20.00', 500, 27, 2, 'San Jose', 5, 'Picture Perfect', 'Carbon Fiber'),
(5, 'Giant Mouse Trap', 'Our big mouse trap. This trap is multifunctional. It can be used to catch dogs, mountain lions, road runners or even muskrats. Must be staked for larger varmints [stakes not included] and baited with approptiate bait [sold seperately].\r\n', '/uploads/images/trap.jpg', '/uploads/images/trap-tn.jpg', '20.00', 34, 470, 28, 'Cedar Point, IO', 5, 'Rodent Control', 'Wood'),
(6, 'Instant Hole', 'Instant hole - Wonderful for creating the appearance of openings.', '/uploads/images/hole.png', '/uploads/images/hole-tn.png', '25.00', 269, 24, 2, 'San Jose', 3, 'Hidden Valley', 'Ether'),
(7, 'Koenigsegg CCX', 'This high performance car is sure to get you where you are going fast. It holds the production car land speed record at an amazing 250mph.', '/uploads/images/no-image.png', '/uploads/images/no-image.png', '500000.00', 1, 25000, 3000, 'San Jose', 3, 'Koenigsegg', 'Metal'),
(8, 'Anvil', '50 lb. Anvil - perfect for any task requireing lots of weight. Made of solid, tempered steel.', '/uploads/images/anvil.png', '/uploads/images/anvil-tn.gif', '150.00', 15, 80, 50, 'San Jose', 5, 'Steel Made', 'Metal'),
(9, 'Monster Rubber Band', 'These are not tiny rubber bands. These are MONSTERS! These bands can stop a train locamotive or be used as a slingshot for cows. Only the best materials are used!', '/uploads/images/rubberband.jpg', '/uploads/images/rubberband-tn.jpg', '4.00', 4589, 75, 1, 'Cedar Point, IO', 3, 'Rubbermaid', 'Rubber'),
(10, 'Mallet', 'Ten pound mallet for bonking roadrunners on the head. Can also be used for bunny rabbits.', '/uploads/images/mallet.png', '/uploads/images/mallet-tn.png', '25.00', 100, 36, 10, 'Cedar Point, IA', 3, 'Wooden Creations', 'Wood'),
(11, 'TNT', 'The biggest bang for your buck with our nitro-based TNT. Price is per stick.', '/uploads/images/tnt.png', '/uploads/images/tnt-tn.png', '10.00', 1000, 25, 2, 'San Jose', 2, 'Nobel Enterprises', 'Plastic'),
(12, 'Roadrunner Custom Bird Seed Mix', 'Our best varmint seed mix - varmints on two or four legs can\'t resist this mix. Contains meat, nuts, cereals and our own special ingredient. Guaranteed to bring them in. Can be used with our monster trap.', '/uploads/images/seed.jpg', '/uploads/images/seed-tn.jpg', '8.00', 150, 24, 3, 'San Jose', 5, 'Acme', 'Plastic'),
(13, 'Grand Piano', 'This grand piano is guaranteed to play well and smash anything beneath it if dropped from a height.', '/uploads/images/piano.jpg', '/uploads/images/piano-tn.jpg', '3500.00', 36, 500, 1200, 'Cedar Point, IA', 3, 'Wulitzer', 'Wood'),
(14, 'Crash Helmet', 'This carbon fiber and plastic helmet is the ultimate in protection for your head. comes in assorted colors.', '/uploads/images/helmet.png', '/uploads/images/helmet-tn.png', '100.00', 25, 48, 9, 'San Jose', 3, 'Suzuki', 'Carbon Fiber'),
(15, 'Nylon Rope', 'This nylon rope is ideal for all uses. Each rope is the highest quality nylon and comes in 100 foot lengths.', '/uploads/images/rope.jpg', '/uploads/images/rope-tn.jpg', '15.00', 200, 200, 6, 'San Jose', 3, 'Marina Sales', 'Nylon'),
(16, 'Sticky Fence', 'This fence is covered with Gorilla Glue and is guaranteed to stick to anything that touches it and is sure to hold it tight.', '/uploads/images/fence.png', '/uploads/images/fence-tn.png', '75.00', 15, 48, 2, 'San Jose', 3, 'Acme', 'Nylon'),
(17, 'Small Bomb', 'Bomb with a fuse - A little old fashioned, but highly effective. This bomb has the ability to devistate anything within 30 feet.', '/uploads/images/bomb.png', '/uploads/images/bomb-tn.png', '275.00', 58, 30, 12, 'San Jose', 2, 'Nobel Enterprises', 'Metal'),
(18, 'Mortar', 'Our Mortar is very powerful. This cannon can launch a projectile or bomb 3 miles. Made of solid steel and mounted on cement or metal stands [not included]...', '/uploads/images/mortar.jpg', '/uploads/images/mortar-tn.jpg', '1550.00', 26, 750, 250, 'San Jose', 1, 'Smith & Wesson', 'Metal');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(10) UNSIGNED NOT NULL,
  `reviewText` text NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `invId` int(10) UNSIGNED NOT NULL,
  `clientId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(197, 'Excelente producto, yo lo recomiendo.', '2019-12-11 04:14:07', 18, 98),
(200, 'Great!!!!', '2019-12-11 04:15:59', 18, 101),
(203, 'Coyote!!!', '2019-12-11 04:27:50', 1, 101),
(205, 'Excelente producto, perfecto para esta pÃ¡gina. Asi no ', '2019-12-11 04:30:02', 1, 94),
(206, 'Cuando llega al pais?', '2019-12-11 04:34:50', 18, 98),
(212, 'Muy bien!!!!', '2019-12-11 04:55:49', 1, 99),
(232, 'perfecto', '2019-12-11 16:23:01', 11, 99),
(246, 'Que chevere producto. ', '2019-12-12 17:26:30', 18, 94),
(247, 'Muy buen martillo.', '2019-12-13 02:45:12', 10, 98),
(248, 'Muy bien!!!!', '2019-12-14 15:27:20', 17, 94),
(249, 'Buen producto', '2019-12-14 15:29:46', 11, 94),
(251, 'Buen instrumento', '2019-12-14 16:49:44', 10, 94),
(252, 'Excelente!!', '2019-12-16 17:20:54', 11, 94),
(253, 'Perfecto', '2019-12-16 19:11:19', 6, 94),
(254, 'Listossssss', '2019-12-16 19:12:25', 18, 94),
(257, 'Muy bueno', '2019-12-16 19:14:08', 18, 94),
(258, 'Ya', '2019-12-16 19:14:15', 18, 94),
(259, 'Increible', '2019-12-16 22:30:06', 4, 94),
(260, 'Buenisimo!', '2019-12-17 03:14:19', 1, 94);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `FK_inv_image` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `FK_reviews_clients` (`clientId`),
  ADD KEY `FK_reviews_inventory` (`invId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_image` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reviews_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
