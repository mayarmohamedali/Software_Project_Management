-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2024 at 08:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campuscravinghub`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `FoodName` varchar(255) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `RestaurantId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`FoodName`, `Price`, `RestaurantId`) VALUES
('batates', 45, 3),
('Brownies', 50, 0),
('Caramel Peacan Cinnabon', 120, 7),
('Cheese with tomato', 25, 2),
('Chocolate Cinnabon', 100, 7),
('Cinabon Bites', 85, 7),
('Coffee', 110, 6),
('Coffee', 100, 7),
('Coffee', 35, 8),
('Cookies', 35, 8),
('CornDog', 35, 3),
('crispy chicken Sandwich', 110, 1),
('Croissont', 70, 6),
('Croissont Turkey with Cheese', 55, 8),
('CupCake', 45, 8),
('Donut', 60, 6),
('Falafel Sandwich', 8, 2),
('Fool Sandwich', 8, 2),
('Fries', 55, 1),
('Fries Sandwich', 17, 2),
('Man2ocha Labna', 90, 4),
('Man2ocha Meat', 100, 4),
('Man2ocha Za3tar', 60, 4),
('Pizza', 60, 5),
('Salad', 90, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `DeliveryOption` varchar(50) NOT NULL,
  `PaymentOption` varchar(50) NOT NULL,
  `BuildingOption` varchar(50) DEFAULT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderId`, `UserId`, `DeliveryOption`, `PaymentOption`, `BuildingOption`, `TotalAmount`, `OrderDate`) VALUES
(1, 1, 'pickup', 'cash', 'N/A', 50.00, '2024-12-25 19:21:30'),
(2, 1, 'delivery', 'visa', 'R', 220.00, '2024-12-25 19:23:09'),
(3, 2, 'pickup', 'visa', 'N/A', 150.00, '2024-12-25 19:34:33'),
(4, 2, 'delivery', 'instapay', 'R', 80.00, '2024-12-25 19:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `ItemId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `ItemPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`ItemId`, `OrderId`, `ItemName`, `ItemPrice`) VALUES
(1, 1, 'Brownies', 50.00),
(2, 2, 'Coffee', 100.00),
(3, 2, 'Caramel peacan cinnabon', 120.00),
(4, 3, 'Man2ocha za3tar', 60.00),
(5, 3, 'Man2ocha labna', 90.00),
(6, 4, 'Cupcake', 45.00),
(7, 4, 'Coffee', 35.00);

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `PaymentMethodId` int(11) NOT NULL,
  `PaymentMethodName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`PaymentMethodId`, `PaymentMethodName`) VALUES
(0, 'cash'),
(1, 'Visa '),
(2, 'Telda '),
(3, 'Instapay ');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `RestaurantId` int(11) NOT NULL,
  `RestaurantName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`RestaurantId`, `RestaurantName`) VALUES
(0, 'R2GO'),
(1, 'Gyro'),
(2, 'Shabrawy'),
(3, 'Batates&Zalabya'),
(4, 'Man2ocha'),
(5, 'Sbaro'),
(6, 'TBS'),
(7, 'Cinnabon'),
(8, 'Fresko');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Email`, `Password`) VALUES
(1, 'mayar2205491@miuegypt.edu.eg', 0x24327924313024376a686d6c46644e586e547a4c71367743346472654f6e39337443696b613430656a33423479633244444b61655a6a522f776f3043),
(2, 'jana2206501@miuegypt.edu.eg', 0x243279243130245535594f694e544333663945514174552e553155456551744649496d6d4562673652712e43435948315438645549585a6447524736),
(3, 'Sama220658@miuegypt.edu.eg', 0x243279243130243257354c67353667636247524676524c7a645736532e656d6d344c45576f43533750435341674959506f766b7979796d6b39674c4f),
(4, 'Salma2200195@miuegypt.edu.eg', 0x24327924313024465636655a502e6858566642544e5a6f35753351742e4d6f6b663461384b646a4e437548576379774968646d7a7a764657706b7a57),
(5, 'Mariam2206096@miuegypt.edu.eg', 0x2432792431302444356d7a733668676b5552687379695a316942332e4f726338732e5a7876554c4832534759307739363573344161465178424a4f6d),
(6, 'Habiba2206403@miuegypt.edu.eg', 0x2432792431302433424a2e6b4432455052707a73316b427a4b766b752e376b7a2e5247556645684c74734d61724e34632f4576517470436f78714b4f),
(7, 'arwa2202941@miuegypt.edu.eg', 0x24327924313024633762536b79437977436c6d507141392f38746a4d2e6561755142554f4e5674577a6877494e3554727a65587747356c30764d7769);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`FoodName`,`RestaurantId`),
  ADD KEY `RestaurantId` (`RestaurantId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`ItemId`),
  ADD KEY `OrderId` (`OrderId`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`PaymentMethodId`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`RestaurantId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `ItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`RestaurantId`) REFERENCES `restaurants` (`RestaurantId`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`OrderId`) REFERENCES `orders` (`OrderId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
