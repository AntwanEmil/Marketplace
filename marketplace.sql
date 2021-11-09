-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 10:31 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `image`, `description`, `price`, `amount`, `owner_id`, `store_id`) VALUES
(2, 'jacket', 0x89504e470d0a1a0a0000000d49484452000000a8000000650806000000d93da8de000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000040149444154785eed9dcb76133110443df3ffbf45208105cf1de457423fd4b624c61c6761b916b77074555d66d7a7adb19dccf6e5d7ebdbe9b49d4e27038462dcdf9cb614a36ecb5c2f9293afccf7cd9bd5966234af2d73bd484ebe34fffcd35fe211d2d49e8d6a9d1acc06c6e3653c1314296b9aa046efdade93933f3267822265edbe78d71e32414e7eccc45d73262892569ba0d9b2970ec62703f8077a262892564c50845445832269d1a0485a7b1d40e3db23ce84f9dc91a7c81b13cb722e9290b4fe33411b13787c32b1ccc767f1aef37b50093c3e997898dffdb5de9bf590b621277f64ce1914492b7e2769ec5c3c5ec7334191b4b6971f7fac41fd441afd0aa114b7179ba0b73f1dc2b5648242693241a134a7095ac2e335fc1ec67dd03778bc8eb706b54e8d6685508fd30485508bdbb39d41dd7bd342a846bb487a7d3b574a78bc88dfe313cf7878c5577c3ef00a7e9ca0334be4e40fcae30c9a5b84f49413142151314191b4ae4e502ffa51e09ac8c957e4dbf3779ba0beab0a8442dcfdf3cef87bb6f1f0058fd7f1973368756e098f17f0f1597c766c231e2fe4c73368098f17f1760675d8e2b4aec5e395fc9e9d6acb11eb9794e77a917cf433c9473ff3867c9ca033e78e9e493efa99e4a39f7943be7db233a8efbd612154637b9be996a742b89e4c50284d262894664c50db2124a976b7e334755185c7cb78262852d6f97ef12ee7e8ed67f0e4e48b7326285256dc692efbb5636d9ac827920fba671e0d5a23f4cc69a6924f241f74cf3c2768ebd84b07772d6c226f4c902fcc7382b68ebd7470d7c226f2c604f9c23c1a142155d1a0485a34289256dc69ce55affbf8005ec4f3463d9256374121d4231314496bfbf8edb735a8bf31ea7d0aa116b78f3641fb72e9da7f2b9193afc8777fb17713b48d5f3df53e484edefcea9c093ab144ae91730685d2ccbf0feade8b4e3c5ec8e719d49bd53bd689c70bf9e10c5ac2e3557c3b83fe2b2ffa13af899c7c45be07e2457fa4ff3baa17c98feb45f2e37af1d6dc1ad47a351ec9d17ba1f7e4a3f742efc947ef85debf3f6f13d41fc9d17ba1f7e4a3f742efc947ef85debf3fdf9eec0cea756f5e08d56817497c9b09e92aef176f4afa8ac7ebf8e3095a33f69ac8c917e571068d9daf1e94f078011f57f17505158c159f0ffca3fd65822224a8cb04855090dbd3579ba0eeeb0c00a1100fef34171ddcf999e4a39f493efa99efc90fefd519ef41757e26f9e867928f7ee67b72bb48baf6499297a38daf889cfcfe799e41cff6223c5ec1e719d4bf35d288c72bf9e3096a1bffaaded99bc8c91f911f4f505b064f4edefb85f9f6c126a8efbd834b78bc8adfcf9d1ae83a373179f2d1938ffe0e391314afecdb9745aad4314ea90775f224f9923c26a8551092d4ee4b34f21113e4e4c74cdc313f9dfe02c93be840a0a9e0070000000049454e44ae426082, 'jacket for sale', 200, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purshased_items`
--

CREATE TABLE `purshased_items` (
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `owner_id`) VALUES
(1, 'ZARA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transferred_cash`
--

CREATE TABLE `transferred_cash` (
  `id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Salma', 'salmasherif294@gmail.com', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`owner_id`),
  ADD KEY `stores_items` (`store_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_transaction` (`transaction_id`),
  ADD KEY `user_report` (`user_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_Store` (`owner_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `stores_items` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `report_transaction` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_report` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `user_Store` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
