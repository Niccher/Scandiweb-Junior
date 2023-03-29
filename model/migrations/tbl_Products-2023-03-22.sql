-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2023 at 06:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scandiweb_junior`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_Products`
--

CREATE TABLE `tbl_Products` (
                                `prod_count` int(11) NOT NULL,
                                `prod_sku` varchar(64) NOT NULL,
                                `prod_name` varchar(64) NOT NULL,
                                `prod_price` varchar(5) NOT NULL,
                                `prod_category` varchar(16) NOT NULL,
                                `product_attrib` varchar(64) NOT NULL,
                                `product_created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_Products`
--

--
-- Indexes for table `tbl_Products`
--
ALTER TABLE `tbl_Products`
    ADD PRIMARY KEY (`prod_sku`),
  ADD UNIQUE KEY `prod_count` (`prod_count`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_Products`
--
ALTER TABLE `tbl_Products`
    MODIFY `prod_count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;