-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2023 at 11:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trinitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appoinment_record`
--

CREATE TABLE `appoinment_record` (
  `appoint_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `street_add` varchar(255) NOT NULL,
  `city_municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postal_code` int(4) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `appoint_sched` datetime NOT NULL,
  `appoint_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appoinment_report`
--

CREATE TABLE `appoinment_report` (
  `appoint_report_id` int(11) NOT NULL,
  `appoint_id` int(11) NOT NULL,
  `appointt_report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cancellation_report`
--

CREATE TABLE `cancellation_report` (
  `cancellation_id` int(11) NOT NULL,
  `retreat_id` int(11) NOT NULL,
  `recollection_id` int(11) NOT NULL,
  `reception_id` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `seminar_id` int(11) NOT NULL,
  `appoint_id` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `chat_guest` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `chat_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` float NOT NULL,
  `prod_img` varchar(255) NOT NULL,
  `prod_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reception_reservation_record`
--

CREATE TABLE `reception_reservation_record` (
  `reception_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `street_add` varchar(255) NOT NULL,
  `city_municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postal_code` int(4) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `catering` enum('Yes','No') NOT NULL,
  `price` float NOT NULL,
  `payment_method` enum('Pay-on-Site','GCash') NOT NULL,
  `payment_option` enum('Pay Full','Pay Half') DEFAULT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recollection_reservation_record`
--

CREATE TABLE `recollection_reservation_record` (
  `recollection_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `street_add` varchar(255) NOT NULL,
  `city_municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postal_code` int(4) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `guest_count` int(255) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `guest_no` int(11) NOT NULL,
  `catering` enum('Yes','No') NOT NULL,
  `price` float NOT NULL,
  `payment_method` enum('Pay-on-Site','GCash') NOT NULL,
  `payment_option` enum('Pay Full','Pay Half') DEFAULT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_report`
--

CREATE TABLE `reservation_report` (
  `report_id` int(11) NOT NULL,
  `retreat_id` int(11) NOT NULL,
  `recollection_id` int(11) NOT NULL,
  `reception_id` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `seminar_id` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retreat_reservation_record`
--

CREATE TABLE `retreat_reservation_record` (
  `retreat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `street_add` varchar(255) NOT NULL,
  `city_municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postal_code` int(4) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `guest_count` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `room_type` enum('Casa Maria','Lunduyan','Attic') NOT NULL,
  `catering` enum('Yes','No') NOT NULL,
  `price` float NOT NULL,
  `payment_method` enum('Pay-on-Site','GCash') NOT NULL,
  `payment_option` enum('pay_full','pay_half') DEFAULT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_report`
--

CREATE TABLE `sales_report` (
  `sales_report_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `total_sales` float NOT NULL,
  `sales_report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seminar_reservation_record`
--

CREATE TABLE `seminar_reservation_record` (
  `seminar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `street_add` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city_municipality` varchar(255) NOT NULL,
  `postal_code` int(4) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `guest_count` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `catering` enum('Yes','No') NOT NULL,
  `price` float NOT NULL,
  `payment_method` enum('Pay-on_Site','GCash') NOT NULL,
  `payment_option` enum('Pay Full','Pay half') DEFAULT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_reservation_record`
--

CREATE TABLE `training_reservation_record` (
  `training_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `street_add` varchar(255) NOT NULL,
  `city_municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postal_code` int(4) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `catering` enum('Yes','No') NOT NULL,
  `price` float NOT NULL,
  `payment_method` enum('Pay-on-Site','GCash') NOT NULL,
  `payment_option` enum('Pay Full','Pay Half') DEFAULT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL,
  `reportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'Nina', 'nina@gmail.com', '$2y$10$isvW88WdtwQxjQ7pL8GpKuZ5r1eX/SFL8Ilfeu//msZyhLDcUdLOG'),
(2, 'Admin', 'admin@domain.com', '$2y$10$NNawSBA1ry5mchEwMXdGYuMljKo9.2JAsZKrwKNUdGep63pvLr3Py'),
(3, 'Nina', 'admin@mail.com', '$2y$10$iGdMq9ury6LakoviWIKY0.JXqRmLDh5Q5D.7S751nVprDtJEBrN46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appoinment_record`
--
ALTER TABLE `appoinment_record`
  ADD PRIMARY KEY (`appoint_id`),
  ADD KEY `appoinment_record_ibfk_1` (`user_id`);

--
-- Indexes for table `appoinment_report`
--
ALTER TABLE `appoinment_report`
  ADD PRIMARY KEY (`appoint_report_id`),
  ADD KEY `appoint_id` (`appoint_id`);

--
-- Indexes for table `cancellation_report`
--
ALTER TABLE `cancellation_report`
  ADD PRIMARY KEY (`cancellation_id`),
  ADD KEY `appoint_id` (`appoint_id`),
  ADD KEY `reservation_id` (`retreat_id`),
  ADD KEY `recollection_id2` (`recollection_id`),
  ADD KEY `reception_id2` (`reception_id`),
  ADD KEY `seminar_id2` (`seminar_id`),
  ADD KEY `training_id2` (`training_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `reception_reservation_record`
--
ALTER TABLE `reception_reservation_record`
  ADD PRIMARY KEY (`reception_id`),
  ADD KEY `user_id4` (`user_id`);

--
-- Indexes for table `recollection_reservation_record`
--
ALTER TABLE `recollection_reservation_record`
  ADD PRIMARY KEY (`recollection_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reservation_report`
--
ALTER TABLE `reservation_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `retreat_id` (`retreat_id`),
  ADD KEY `recollection_id` (`recollection_id`),
  ADD KEY `seminar_id` (`seminar_id`),
  ADD KEY `training_id` (`training_id`),
  ADD KEY `reception_id` (`reception_id`);

--
-- Indexes for table `retreat_reservation_record`
--
ALTER TABLE `retreat_reservation_record`
  ADD PRIMARY KEY (`retreat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sales_report`
--
ALTER TABLE `sales_report`
  ADD PRIMARY KEY (`sales_report_id`),
  ADD KEY `reserve_id` (`report_id`);

--
-- Indexes for table `seminar_reservation_record`
--
ALTER TABLE `seminar_reservation_record`
  ADD PRIMARY KEY (`seminar_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `training_reservation_record`
--
ALTER TABLE `training_reservation_record`
  ADD PRIMARY KEY (`training_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reportId` (`reportId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appoinment_record`
--
ALTER TABLE `appoinment_record`
  MODIFY `appoint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appoinment_report`
--
ALTER TABLE `appoinment_report`
  MODIFY `appoint_report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cancellation_report`
--
ALTER TABLE `cancellation_report`
  MODIFY `cancellation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reception_reservation_record`
--
ALTER TABLE `reception_reservation_record`
  MODIFY `reception_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recollection_reservation_record`
--
ALTER TABLE `recollection_reservation_record`
  MODIFY `recollection_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation_report`
--
ALTER TABLE `reservation_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retreat_reservation_record`
--
ALTER TABLE `retreat_reservation_record`
  MODIFY `retreat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_report`
--
ALTER TABLE `sales_report`
  MODIFY `sales_report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seminar_reservation_record`
--
ALTER TABLE `seminar_reservation_record`
  MODIFY `seminar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_reservation_record`
--
ALTER TABLE `training_reservation_record`
  MODIFY `training_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appoinment_record`
--
ALTER TABLE `appoinment_record`
  ADD CONSTRAINT `user_id5` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `appoinment_report`
--
ALTER TABLE `appoinment_report`
  ADD CONSTRAINT `appoint_id2` FOREIGN KEY (`appoint_id`) REFERENCES `appoinment_record` (`appoint_id`) ON UPDATE CASCADE;

--
-- Constraints for table `cancellation_report`
--
ALTER TABLE `cancellation_report`
  ADD CONSTRAINT `appoint_id` FOREIGN KEY (`appoint_id`) REFERENCES `appoinment_record` (`appoint_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reception_id2` FOREIGN KEY (`reception_id`) REFERENCES `reception_reservation_record` (`reception_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `recollection_id2` FOREIGN KEY (`recollection_id`) REFERENCES `recollection_reservation_record` (`recollection_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `retreat_id2` FOREIGN KEY (`retreat_id`) REFERENCES `retreat_reservation_record` (`retreat_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seminar_id2` FOREIGN KEY (`seminar_id`) REFERENCES `seminar_reservation_record` (`seminar_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `training_id2` FOREIGN KEY (`training_id`) REFERENCES `training_reservation_record` (`training_id`) ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `user_id7` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id6` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `reception_reservation_record`
--
ALTER TABLE `reception_reservation_record`
  ADD CONSTRAINT `user_id4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `recollection_reservation_record`
--
ALTER TABLE `recollection_reservation_record`
  ADD CONSTRAINT `user_id3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `reservation_report`
--
ALTER TABLE `reservation_report`
  ADD CONSTRAINT `reception_id` FOREIGN KEY (`reception_id`) REFERENCES `reception_reservation_record` (`reception_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `recollection_id` FOREIGN KEY (`recollection_id`) REFERENCES `recollection_reservation_record` (`recollection_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `retreat_id` FOREIGN KEY (`retreat_id`) REFERENCES `retreat_reservation_record` (`retreat_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seminar_id` FOREIGN KEY (`seminar_id`) REFERENCES `seminar_reservation_record` (`seminar_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `training_id` FOREIGN KEY (`training_id`) REFERENCES `training_reservation_record` (`training_id`) ON UPDATE CASCADE;

--
-- Constraints for table `retreat_reservation_record`
--
ALTER TABLE `retreat_reservation_record`
  ADD CONSTRAINT `user_id2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sales_report`
--
ALTER TABLE `sales_report`
  ADD CONSTRAINT `report_id` FOREIGN KEY (`report_id`) REFERENCES `reservation_report` (`report_id`) ON UPDATE CASCADE;

--
-- Constraints for table `seminar_reservation_record`
--
ALTER TABLE `seminar_reservation_record`
  ADD CONSTRAINT `user_id1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `training_reservation_record`
--
ALTER TABLE `training_reservation_record`
  ADD CONSTRAINT `reportId` FOREIGN KEY (`reportId`) REFERENCES `cancellation` (`reportId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
