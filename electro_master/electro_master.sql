-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 09:06 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electro_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `cat_id`, `name`, `created_at`) VALUES
(3, 2, 'Dell', '0000-00-00 00:00:00'),
(4, 2, 'Hp', '0000-00-00 00:00:00'),
(5, 2, 'Apple', '0000-00-00 00:00:00'),
(6, 2, 'Asus', '0000-00-00 00:00:00'),
(7, 2, 'Microsoft', '0000-00-00 00:00:00'),
(8, 2, 'Asus', '0000-00-00 00:00:00'),
(9, 2, 'Nokia', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(2, 'Electronics', 'All about electronics Products', '2023-02-21 06:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) NOT NULL,
  `division_id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd'),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd'),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd'),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', '22.65561018', '92.17541121', 'www.rangamati.gov.bd'),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd'),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd'),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd'),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd'),
(9, 1, 'Coxsbazar', 'কক্সবাজার', '21.44315751', '91.97381741', 'www.coxsbazar.gov.bd'),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd'),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd'),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd'),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd'),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd'),
(15, 2, 'Rajshahi', 'রাজশাহী', '24.37230298', '88.56307623', 'www.rajshahi.gov.bd'),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd'),
(17, 2, 'Joypurhat', 'জয়পুরহাট', '25.09636876', '89.04004280', 'www.joypurhat.gov.bd'),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd'),
(19, 2, 'Naogaon', 'নওগাঁ', '24.83256191', '88.92485205', 'www.naogaon.gov.bd'),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd'),
(21, 3, 'Satkhira', 'সাতক্ষীরা', NULL, NULL, 'www.satkhira.gov.bd'),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd'),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd'),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd'),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd'),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd'),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd'),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd'),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd'),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL, 'www.jhalakathi.gov.bd'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd'),
(32, 4, 'Pirojpur', 'পিরোজপুর', NULL, NULL, 'www.pirojpur.gov.bd'),
(33, 4, 'Barisal', 'বরিশাল', NULL, NULL, 'www.barisal.gov.bd'),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd'),
(35, 4, 'Barguna', 'বরগুনা', NULL, NULL, 'www.barguna.gov.bd'),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd'),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd'),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd'),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd'),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd'),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd'),
(42, 6, 'Shariatpur', 'শরীয়তপুর', NULL, NULL, 'www.shariatpur.gov.bd'),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd'),
(44, 6, 'Tangail', 'টাঙ্গাইল', '24.26361358', '89.91794786', 'www.tangail.gov.bd'),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd'),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL, 'www.manikganj.gov.bd'),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd'),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL, 'www.munshiganj.gov.bd'),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd'),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd'),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd'),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd'),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd'),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd'),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL, 'www.lalmonirhat.gov.bd'),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd'),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd'),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd'),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd'),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd'),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd'),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', '24.7465670', '90.4072093', 'www.mymensingh.gov.bd'),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd'),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd'),
(2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd'),
(3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd'),
(4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd'),
(5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd'),
(6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd'),
(7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd'),
(8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `title` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `p_id`, `name`, `title`, `created_at`) VALUES
(1, 0, '\r\n63aaaceac28f1.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(2, 0, '\r\n63ae7b4b4be6b.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(3, 0, '\r\n63aaa6e8a2ded.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(4, 0, '\r\n63aaabd1771e1.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(5, 0, '\r\n63aaac74aa3d2.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(6, 0, '\r\n63ae7a7a59f6a.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(7, 0, '\r\n63ae7b02da13d.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(8, 0, '\r\n63ae7bfeeb131.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(9, 0, '\r\n63ae7b859585d.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(10, 0, '\r\n63ae7cd9c37a1.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(11, 0, '\r\n63aaac289f7c5.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(12, 0, '\r\n63ae8b99e1e51.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(13, 0, '\r\nApple-iPhone-14-Pro-Max.jpg\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(14, 0, '\r\nApple-iPad-2022-Blue.jpg\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(15, 0, '\r\nApple-iPad-Pro-11-2022-Silver.jpg\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(16, 0, '\r\nApple-iPhone-14-Plus-Red.jpg\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(17, 0, '\r\nApple-iPhone-14-Pro-Max-Space-Black.jpg\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(18, 0, '\r\nmacbook-air-gold-500x500.jpg\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(19, 0, '\r\nmacbook-air-01-500x500.jpg\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(20, 0, '\r\nzenbook-14-0001-500x500.jpg\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(21, 0, '\r\n63ae7c773645e.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(22, 0, '\r\n63ae7b752cfa2.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(23, 0, '\r\n63aa98fc78b02.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(24, 0, '\r\n63aa9a4981922.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(25, 0, '\r\n63aa93acb6e49.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(26, 0, '\r\nApple-iPhone-14-Pro-Max.jpg\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(27, 0, '\r\n63ae7d28de59d.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(28, 0, '\r\n63aaad8294529.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(29, 0, '\r\n63aa928639de8.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(30, 0, '\r\n63aa947891098.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(31, 0, '\r\n63aa9b4f9ce44.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(32, 0, '\r\n63ae7d5292969.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(33, 0, '\r\n63aaab12cca8b.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(34, 0, '\r\nsurface-pro-8-01-500x500.jpg\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(35, 0, '\r\n63aa95efc4991.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(36, 0, '\r\n63aaac1d479e9.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(37, 0, '\r\n63aaac2026f62.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(38, 0, '\r\n63ae7ddca3444.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(39, 0, '\r\n63aa9366a58a2.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(40, 0, '\r\n63aa95c2689ac.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(41, 0, '\r\n63ae7d231d6af.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(42, 0, '\r\nArray\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(43, 0, '\r\n63ae7dada67be.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(44, 0, '\r\n63ae7f5c97821.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(45, 0, '\r\n63aa967962abe.png\r\n	\r\n\r\n\r\n', '', '2023-02-07 10:41:50'),
(46, 0, '\r\n63ae7c91a4c26.png', '', '2023-02-07 10:41:50'),
(53, 1, '12.png', '', '2023-02-25 10:44:01'),
(54, 1, '13.png', '', '2023-02-25 10:44:01'),
(55, 1, '10.png', '', '2023-02-25 11:05:06'),
(56, 0, '11.', '', '2023-02-25 11:05:06'),
(57, 1, '12.png', '', '2023-02-25 11:05:06'),
(58, 1, '13.png', '', '2023-02-25 11:05:06'),
(59, 1, '10.png', '', '2023-02-25 11:13:21'),
(60, 1, '11.png', '', '2023-02-25 11:13:21'),
(61, 1, '12.png', '', '2023-02-25 11:13:21'),
(62, 1, '13.png', '', '2023-02-25 11:13:21'),
(63, 1, '10.png', '', '2023-02-25 11:14:22'),
(64, 1, '11.png', '', '2023-02-25 11:14:22'),
(65, 1, '12.png', '', '2023-02-25 11:14:22'),
(66, 1, '13.png', '', '2023-02-25 11:14:22'),
(68, 0, '1.jpg', '', '2023-02-25 11:19:38'),
(69, 0, '2.jpg', '', '2023-02-25 11:19:38'),
(70, 0, '3.jpg', '', '2023-02-25 11:19:38'),
(71, 0, '0.jpg', '', '2023-02-25 11:21:05'),
(72, 0, '1.jpg', '', '2023-02-25 11:21:05'),
(73, 0, '2.jpg', '', '2023-02-25 11:21:05'),
(74, 0, '3.jpg', '', '2023-02-25 11:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `location` varchar(200) NOT NULL,
  `propiter` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `mobile`, `location`, `propiter`, `created_at`) VALUES
(1, 'Apple Impoter Bd', '01258558484', 'USA', 'Steave Jobs', '2023-03-06 10:09:55'),
(2, 'Dell Impoter BD', '01258558484', 'Computer Market Agargao Dhaka', 'Jhon Dell', '2023-03-06 10:36:26'),
(3, 'Nokia Impoter bd', '01258558484', 'Computer Market Agargao Dhaka', 'Jhon Nokia', '2023-03-07 11:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` float(10,2) NOT NULL,
  `discount` float(6,2) NOT NULL,
  `comment` varchar(512) NOT NULL,
  `payment` set('cash','bkash','nogod','cod') NOT NULL,
  `trxid` varchar(72) NOT NULL,
  `status` varchar(50) NOT NULL,
  `b_address` varchar(50) NOT NULL,
  `s_address` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `total`, `discount`, `comment`, `payment`, `trxid`, `status`, `b_address`, `s_address`, `created_at`) VALUES
(1, 5, 126000.00, 4.00, 'dh', 'nogod', '12345', 'Recived', '', '', '2023-03-05 16:46:20'),
(2, 5, 126000.00, 4.00, 'hi', 'cash', '12345', 'Recived', '', '', '2023-03-05 16:54:29'),
(3, 5, 63000.00, 4.00, 'fgdhf', 'bkash', '432', 'Recived', '', '', '2023-03-05 16:58:46'),
(4, 5, 4200.00, 4.00, 'ghrh', 'cash', '12345', 'Pending', '', '', '2023-03-05 17:08:57'),
(5, 5, 4200.00, 4.00, 'svadf', 'bkash', '12345', 'Recived', '', '', '2023-03-05 17:09:47'),
(6, 5, 4200.00, 4.00, 'grtd', 'nogod', '12345', 'Shipping', '', '', '2023-03-05 17:12:09'),
(7, 5, 4200.00, 4.00, 'tegetg', 'bkash', '12345', 'Pending', 'section -6', 'section 6', '2023-03-05 17:14:32'),
(8, 2, 283500.00, 4.00, '', 'bkash', '1241', 'Pending', '', '', '2023-03-06 17:26:46'),
(9, 7, 283500.00, 4.00, '', 'cash', '', 'Pending', 'Mirpur', 'Mirpur', '2023-03-06 17:44:01'),
(10, 7, 113400.00, 4.00, '', 'cash', '', 'Delivered', '', '', '2023-03-07 06:42:18'),
(11, 7, 283500.00, 4.00, '', 'cash', '', 'Delivered', 'Mirpur', 'Mirpur', '2023-03-07 08:12:26'),
(12, 7, 283500.00, 4.00, '', 'cash', '', 'Delivered', '', '', '2023-03-07 08:12:40'),
(13, 7, 283500.00, 4.00, '', 'cash', '', 'Recived', 'Mirpur', 'Mirpur', '2023-03-09 05:11:44'),
(14, 7, 283500.00, 4.00, '', 'cash', '', 'Delivered', 'Mirpur', 'Mirpur', '2023-03-09 05:12:03'),
(15, 7, 144900.00, 4.00, '', 'cash', '', 'Cancel', '', '', '2023-03-22 17:20:44'),
(16, 7, 63000.00, 4.00, '', 'cash', '', 'Recived', 'Mirpur', 'Shenparea Parbata', '2023-03-22 19:13:17'),
(17, 7, 130446.75, 4.00, '', 'cash', '', 'Pending', 'Mirpur', 'Shenparea Parbata', '2023-03-23 02:06:40'),
(18, 7, 12600.00, 4.00, '', 'cash', '', 'Pending', 'Mirpur', 'Shenparea Parbata', '2023-03-23 04:47:43'),
(19, 7, 1173900.00, 4.00, '', 'cash', '', 'Delivered', 'Mirpur', 'Shenparea Parbata', '2023-03-23 05:22:06'),
(20, 7, 361200.00, 4.00, '', 'cash', '', 'Pending', '', '', '2023-04-04 14:55:33'),
(21, 7, 247800.00, 4.00, '', 'cash', '', 'Recived', 'Mirpur', 'Shenparea Parbata', '2023-04-12 10:06:27'),
(22, 7, 144900.00, 4.00, 'hh', 'cash', '', 'Recived', 'Mirpur', 'Shenparea Parbata', '2023-04-12 10:21:55'),
(23, 7, 144900.00, 4.00, 'chttc', 'cash', '', 'Shipping', 'Mirpur', 'Shenparea Parbata', '2023-04-12 10:32:16'),
(24, 7, 630.00, 4.00, 'b', 'cash', '1241', 'Pending', 'Mirpur', 'Shenparea Parbata', '2023-05-30 02:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quan` int(11) NOT NULL,
  `op` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quan`, `op`, `created_at`) VALUES
(1, 2, 7, 60000.00, 2, 'op', '2023-03-05 16:54:29'),
(2, 3, 22, 0.00, 3, 'op', '2023-03-05 16:58:46'),
(3, 3, 23, 30000.00, 2, 'op', '2023-03-05 16:58:46'),
(4, 4, 22, 2000.00, 2, 'op', '2023-03-05 17:08:58'),
(5, 5, 22, 2000.00, 2, 'op', '2023-03-05 17:09:47'),
(6, 6, 22, 2000.00, 2, 'op', '2023-03-05 17:12:09'),
(7, 7, 22, 2000.00, 2, 'op', '2023-03-05 17:14:32'),
(8, 8, 1, 135000.00, 2, 'op', '2023-03-06 17:26:46'),
(9, 9, 1, 135000.00, 2, 'op', '2023-03-06 17:44:01'),
(10, 10, 24, 54000.00, 2, 'op', '2023-03-07 06:42:18'),
(11, 11, 1, 135000.00, 2, 'op', '2023-03-07 08:12:26'),
(12, 12, 1, 135000.00, 2, 'op', '2023-03-07 08:12:40'),
(13, 13, 1, 135000.00, 2, 'op', '2023-03-09 05:11:44'),
(14, 14, 1, 135000.00, 2, 'op', '2023-03-09 05:12:03'),
(15, 15, 2, 138000.00, 1, 'op', '2023-03-22 17:20:44'),
(16, 16, 22, 60000.00, 1, 'op', '2023-03-22 19:13:17'),
(17, 17, 45, 124235.00, 1, 'op', '2023-03-23 02:06:40'),
(18, 18, 28, 12000.00, 1, 'op', '2023-03-23 04:47:43'),
(19, 19, 31, 1000000.00, 1, 'op', '2023-03-23 05:22:06'),
(20, 19, 44, 118000.00, 1, 'op', '2023-03-23 05:22:06'),
(21, 20, 24, 54000.00, 2, 'op', '2023-04-04 14:55:33'),
(22, 20, 44, 118000.00, 2, 'op', '2023-04-04 14:55:33'),
(23, 21, 44, 118000.00, 2, 'op', '2023-04-12 10:06:27'),
(24, 22, 2, 138000.00, 1, 'op', '2023-04-12 10:21:55'),
(25, 23, 2, 138000.00, 1, 'op', '2023-04-12 10:32:16'),
(26, 24, 3, 600.00, 1, 'op', '2023-05-30 02:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `dimensions` varchar(100) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `pprice` float(10,2) NOT NULL,
  `sprice` float(10,2) NOT NULL,
  `discount` int(2) NOT NULL,
  `images` varchar(512) NOT NULL,
  `quantity` int(6) NOT NULL,
  `hot` int(11) NOT NULL,
  `options` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `brand_id`, `manufacturer_id`, `user_id`, `title`, `description`, `dimensions`, `weight`, `pprice`, `sprice`, `discount`, `images`, `quantity`, `hot`, `options`, `created_at`) VALUES
(1, 2, 5, 1, 0, 'Apple iPad Pro 11 (2022)', 'Apple iPad Pro 11 (2022) Full Specifications\r\nName	Apple iPad Pro 11 (2022)\r\nBrand	Apple\r\nModel	iPad Pro 11 (2022), iPad Pro (11-inch, 6th Generation)\r\nPrice	135,000.00 Taka (approx)\r\nCategory	Tablet\r\nShowroom	Click Here\r\nNetwork\r\nNetwork Type\r\nGSM / CDMA / HSPA / EVDO / LTE / 5G\r\nNetwork 2G\r\nGSM 850 / 900 / 1800 / 1900\r\nNetwork 3G\r\nHSDPA 850 / 900 / 1700(AWS) / 1900 / 2100\r\nNetwork 4G\r\nLTE\r\nNetwork 5G\r\nSA/NSA/Sub6/mmWave\r\nSpeed\r\nHSPA, LTE-A, 5G\r\nGPRS\r\nYes\r\nEDGE\r\nYes\r\nLaunch\r\nLaunch Announcement\r\n2022, October\r\nLaunch Date\r\nExp. Release 2022, October\r\nBody\r\nBody Dimensions\r\n247.6 x 178.5 x 5.9 mm (9.75 x 7.03 x 0.23 in)\r\nBody Weight\r\n470 g\r\nBuild\r\nGlass Front, Aluminum Back, Aluminum Frame\r\nNetwork Sim\r\nNano-SIM, eSIM\r\nDisplay\r\nDisplay Type\r\nLiquid Retina IPS LCD, 120Hz, HDR10, Dolby Vision, 600 nits (typ)\r\nDisplay Size\r\n11.0 inches, 366.5 cm2 (~82.9% screen-to-body ratio)\r\nDisplay Resolution\r\n1668 x 2388 pixels\r\nDisplay Multitouch\r\nYes\r\nDisplay Density\r\n265 ppi\r\nDisplay Screen Protection\r\nScratch-Resistant Glass, Oleophobic Coating\r\nPlatform\r\nOperating System\r\niPadOS\r\nOS Version\r\n16\r\nChipset\r\nApple M2\r\nCPU\r\nOcta-core\r\nGPU\r\nApple GPU (10-core graphics)\r\nMemory\r\nMemory Internal\r\n128 GB, 256 GB, 512 GB, 1 TB, 2 TB\r\nMemory External\r\nNo\r\nRam\r\n8 GB, 16 GB\r\nCamera\r\nPrimary Camera\r\nDual: 12 MP, (wide), Dual Pixel PDAF\r\n10 MP, (ultrawide)\r\nTOF 3D LiDAR Scanner (depth)\r\nSecondary Camera\r\n12 MP\r\nCamera Features\r\nQuad-LED Dual-tone Flash, HDR\r\nVideo\r\n4K@24/25/30/60fps, 1080p@25/30/60/120/240fps; gyro-EIS, ProRes, Cinematic mode (4K, 1080p)\r\nSound\r\nAudio\r\nYes\r\nLoudspeaker\r\nYes with Stereo Speakers\r\n3.5mm Jack\r\nNo\r\nConnectivity\r\nWiFi\r\nWi-Fi 802.11 a/b/g/n/ac/6e, dual-band, Hotspot\r\nBluetooth\r\n5.3, A2DP, LE, EDR\r\nUSB\r\nUSB Type-C 4 (Thunderbolt 4), DisplayPort, Magnetic Connector\r\nGPS\r\nYes with A-GPS\r\nFm Radio\r\nNo\r\nFeatures\r\nSensors\r\nFace ID, accelerometer, gyro, barometer\r\nMessaging\r\nYes\r\nBattery\r\nBattery Type\r\nNon-removable Li-Po Battery (28.65 Wh)\r\nBattery Capacity\r\n7538 mAh\r\nCharging\r\nFast Charging 18W\r\nMore\r\nBody Color\r\nSilver, Space Gray', 'Height: 0.71', '1.3', 130000.00, 135000.00, 10, 'Apple-iPad-Pro-11-2022-Silver.jpg', 6, 1, '', '2022-12-26 15:01:10'),
(2, 2, 5, 1, 0, 'Apple iPhone 14 Plus', 'Apple iPhone 14 Plus Full Specifications\r\nName	Apple iPhone 14 Plus\r\nBrand	Apple\r\nModel	iPhone 14 Plus, A2886, A2632, A2885, A2896, A2887, iphone14,8\r\nPrice	128,000.00 Taka (approx)\r\nCategory	Smartphone\r\nShowroom	Click Here\r\nNetwork\r\nNetwork Type\r\nGSM / CDMA / HSPA / EVDO / LTE / 5G\r\nNetwork 2G\r\nGSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2\r\nNetwork 3G\r\nHSDPA 850 / 900 / 1700(AWS) / 1900 / 2100\r\nNetwork 4G\r\nLTE\r\nNetwork 5G\r\nSA/NSA/Sub6\r\nSpeed\r\nHSPA, LTE-A, 5G\r\nGPRS\r\nYes\r\nEDGE\r\nYes\r\nLaunch\r\nLaunch Announcement\r\n2022, September\r\nLaunch Date\r\nAvailable. Released 2022, October\r\nBody\r\nBody Dimensions\r\n160.8 x 78.1 x 7.8 mm (6.33 x 3.07 x 0.31 in)\r\nBody Weight\r\n203 g\r\nBuild\r\nGlass Front (Gorilla Glass), Glass Back (Gorilla Glass), Aluminum Frame\r\nNetwork Sim\r\nNano-SIM and/or multiple eSIMs or Dual SIM (Nano-SIM, dual stand-by) | eSIM only for USA\r\nDisplay\r\nDisplay Type\r\nSuper Retina XDR OLED, HDR10, Dolby Vision, 800 nits (HBM), 1200 nits (peak)\r\nDisplay Size\r\n6.7 inches, 109.8 cm2 (~87.4% screen-to-body ratio)\r\nDisplay Resolution\r\n1284 x 2778 pixels, 19.5:9 ratio\r\nDisplay Multitouch\r\nYes\r\nDisplay Density\r\n458 ppi\r\nDisplay Screen Protection\r\nScratch-Resistant Ceramic Glass, Oleophobic Coating\r\nPlatform\r\nOperating System\r\niOS\r\nOS Version\r\n16\r\nChipset\r\nApple A15 Bionic (5 nm)\r\nCPU\r\nHexa-core (2x3.23 GHz Avalanche + 4x1.82 GHz Blizzard)\r\nGPU\r\nApple GPU (5-core graphics)\r\nMemory\r\nMemory Internal\r\n128 GB, 256 GB, 512 GB\r\nMemory External\r\nNo\r\nRam\r\n4 GB\r\nCamera\r\nPrimary Camera\r\nDual: 12 MP, (wide)\r\n12 MP, (ultrawide)\r\nSecondary Camera\r\nDual: 12 MP, (wide)\r\nSL 3D, (Depth/biometrics Sensor)\r\nCamera Features\r\nLED Flash, HDR (photo/panorama)\r\nVideo\r\n4K@24/25/30/60fps, 1080p@25/30/60/120/240fps\r\nSound\r\nAudio\r\nYes\r\nLoudspeaker\r\nYes with Stereo Speakers\r\n3.5mm Jack\r\nNo\r\nConnectivity\r\nWiFi\r\nWi-Fi 802.11 a/b/g/n/ac/6, dual-band, Hotspot\r\nBluetooth\r\n5.3, A2DP, LE\r\nNFC\r\nYes\r\nUSB\r\nLightning, USB 2.0\r\nGPS\r\nYes, with A-GPS\r\nFm Radio\r\nNo\r\nFeatures\r\nSensors\r\nFace ID, accelerometer, gyro, proximity, compass, barometer\r\nMessaging\r\nYes\r\nBattery\r\nBattery Type\r\nNon-removable Li-Ion Battery\r\nCharging\r\nFast Charging, 50% in 30 min (advertised)\r\nMore\r\nBody Color\r\nMidnight, Purple, Starlight, Blue, Red\r\nOther Features\r\nUltra Wideband (UWB) Support.\r\nEmergency SOS via Satellite (SMS sending/receiving).\r\nUSB Power Delivery 2.0.\r\nMagSafe Wireless Charging 15W.\r\nQi magnetic fast Wireless Charging 7.5W.', 'Height: 0.71\" – 0.78\" (18.1 mm – 19.0 mm) Width: 12.94\" (328.7 mm) Depth: 9.43\" (239.5 mm)', '1.59 kg (3.49 lb)', 0.00, 138000.00, 10, 'Apple-iPhone-14-Plus-Red.jpg', 37, 3, '', '2022-12-26 15:01:38'),
(3, 2, 5, 1, 2, 'clock 1', 'clock 1', '', '', 0.00, 600.00, 10, '63aa928639de8.png', 12, 0, '', '2022-12-27 12:36:54'),
(4, 2, 5, 1, 2, 'mobile', 'clock', '', '', 0.00, 40000.00, 10, '63aa9366a58a2.png', 50, 0, '', '2022-12-27 12:40:38'),
(5, 2, 5, 1, 0, 'Sony', 'Upcomming', 'Height: 0.71\" – 0.78\" (18.1 mm – 19.0 mm) Width: 12.94\" (328.7 mm) Depth: 9.43\" (239.5 mm)', '1.59 kg (3.49 lb)', 0.00, 40000.00, 10, '91ibfWTtMNL._AC_SL1500_.jpg', 5, 0, '2', '2022-12-27 12:41:48'),
(6, 2, 5, 1, 2, 'Infinity', '\r\nSmart Telivesion', '', '', 0.00, 50000.00, 10, '63aa947891098.png', 18, 0, '', '2022-12-27 12:45:12'),
(7, 2, 5, 1, 2, 'LLOYD', 'air condiction', '', '', 0.00, 50000.00, 10, '63aa95c2689ac.png', 1, 2, '', '2022-12-27 12:50:42'),
(8, 2, 5, 1, 2, 'Samsung y90', 'Smart', '', '', 0.00, 30000.00, 10, '63aa95efc4991.png', 100, 0, '', '2022-12-27 12:51:27'),
(9, 2, 5, 1, 2, 'WRIDE', 'LAPTOP', '', '', 0.00, 100000.00, 10, '63aa967962abe.png', 8, 0, '', '2022-12-27 12:53:45'),
(10, 2, 5, 1, 2, 'Canon', 'Canon Camera', '', '', 0.00, 45990.00, 10, '63aa98fc78b02.png', 12, 0, '', '2022-12-27 13:04:28'),
(11, 2, 5, 1, 1, 'phone', 'Vintage telecommunication technology and retro household items concept with a red push button telephone isolated on white background with a clipping path cut out', '', '', 0.00, 10500.00, 10, '63aa9a4981922.png', 22, 0, '', '2022-12-27 13:10:01'),
(12, 2, 9, 3, 0, 'Nokia Mobile', 'Nokia Button Mobile ', 'Height: 0.71\" – 0.78\" (18.1 mm – 19.0 mm) Width: 12.94\" (328.7 mm) Depth: 9.43\" (239.5 mm)', '1.59 kg (3.49 lb)', 7000.00, 7500.00, 10, '63aa9b4f9ce44.png', 20, 0, '', '2022-12-27 13:14:23'),
(13, 2, 5, 1, 1, 'Mobile', '1111', '', '', 0.00, 12000.00, 10, '63aaa6e8a2ded.png', 1, 0, '', '2022-12-27 14:03:52'),
(14, 2, 5, 1, 1, 'Mobile', 'kjjuhunjn5', '', '', 0.00, 500.00, 10, '63aaab12cca8b.png', 10, 0, '', '2022-12-27 14:21:38'),
(15, 2, 5, 1, 2, 'Singer plus', 'Singer\r\n', '', '', 0.00, 25000.00, 10, '63aaabd1771e1.png', 8, 0, '', '2022-12-27 14:24:49'),
(16, 2, 5, 1, 2, 'iron man suit', 'iron', '', '', 0.00, 1000000.00, 10, '63aaac1d479e9.png', 5, 0, '', '2022-12-27 14:26:05'),
(17, 2, 5, 1, 2, 'ghh', '1', '', '', 0.00, 500.00, 10, '63aaac2026f62.png', 111, 0, '', '2022-12-27 14:26:08'),
(18, 2, 5, 1, 2, 'poco m2 Pro Max', 'this is shahin user phone.', '', '', 0.00, 22999.00, 10, '63aaac289f7c5.png', 1, 0, '', '2022-12-27 14:26:16'),
(19, 2, 5, 1, 2, 'iphone 14 promax', 'iphone', '', '', 0.00, 150000.00, 10, '63aaac74aa3d2.png', 8, 0, '', '2022-12-27 14:27:32'),
(21, 2, 5, 1, 2, 'Samsung Galaxy A13', 'SAMSUNG GALAXY A13 - USER OPINIONS AND REVIEWS', '', '', 0.00, 23.00, 10, '63aaad8294529.png', 20, 0, '', '2022-12-27 14:32:02'),
(22, 2, 5, 1, 2, 'Walton', '1511', '', '', 0.00, 60000.00, 10, '63ae7a7a59f6a.png', 1, 2, '', '2022-12-30 11:43:22'),
(23, 2, 5, 1, 2, 'LG', '1215', '', '', 0.00, 50000.00, 10, '63ae7b02da13d.png', 12, 0, '', '2022-12-30 11:45:38'),
(24, 2, 5, 1, 2, 'acer ', 'Laptop', '', '', 0.00, 54000.00, 10, '63ae7b4b4be6b.png', 13, 0, '', '2022-12-30 11:46:51'),
(25, 2, 5, 1, 2, 'MackBook pro', 'jfkhgu', '', '', 0.00, 219990.00, 10, '63ae7b752cfa2.png', 2, 0, '', '2022-12-30 11:47:33'),
(26, 2, 5, 1, 2, 'Redmi Note8', 'Redmi', '', '', 0.00, 30000.00, 10, '63ae7b859585d.png', 5, 0, '', '2022-12-30 11:47:49'),
(27, 2, 5, 1, 2, 'Watch', 'clock', '', '', 0.00, 200.00, 10, '63ae7bfeeb131.png', 3, 0, '', '2022-12-30 11:49:50'),
(28, 2, 5, 1, 2, 'as', 'asf', '', '', 0.00, 12000.00, 10, '63ae7c773645e.png', 1, 0, '', '2022-12-30 11:51:51'),
(29, 2, 5, 1, 2, 'Samsung Galaxy Z Fold3 5G', 'htjkghjmg', '', '', 0.00, 195.00, 10, '63ae7c91a4c26.png', 21, 0, '', '2022-12-30 11:52:17'),
(30, 2, 5, 1, 2, 'laptop', 'agfd', '', '', 0.00, 50000.00, 10, '63ae7cd9c37a1.png', 1, 0, '', '2022-12-30 11:53:29'),
(31, 2, 5, 1, 2, 'apple', 'asg', '', '', 0.00, 1000000.00, 10, '63ae7d231d6af.png', 0, 1, '', '2022-12-30 11:54:43'),
(32, 2, 5, 1, 2, 'Smart SEL-32L22KS 32\" HD Basic LED Television', 'Resolution: HD (1360x768) Resolution\r\n2x HDMI, 1x USB, Audio Out\r\nMaterial: Plastic Fiber\r\nPicture Modes: Dynamic, Standard,Soft, User', '', '', 0.00, 14500.00, 10, '63ae7d28de59d.png', 14, 0, '', '2022-12-30 11:54:48'),
(33, 2, 5, 1, 2, 'laptop', 'jjyt', '', '', 0.00, 50000.00, 10, '63ae7d5292969.png', 2, 0, '', '2022-12-30 11:55:30'),
(34, 2, 5, 1, 2, 'man of steel', 'jiot', '', '', 0.00, 400000.00, 10, '63ae7dada67be.png', 1, 0, '', '2022-12-30 11:57:01'),
(35, 2, 5, 1, 1, 'Samsung', 'ewsfa', '', '', 0.00, 200000.00, 10, '63ae7ddca3444.png', 1, 0, '', '2022-12-30 11:57:48'),
(36, 2, 5, 1, 2, 'The world Best Player Jersey', 'The world Best Player Jersey.Messi.', '', '', 0.00, 1000.00, 10, '63ae7f5c97821.png', 1, 0, '', '2022-12-30 12:04:12'),
(37, 2, 5, 1, 2, 'Asus vivobook 15 ', 'Ryzen7. 5700u\r\nRam 8Gb,512 gb ssd', '', '', 0.00, 82500.00, 10, '63ae8b99e1e51.png', 1, 0, '', '2022-12-30 12:56:25'),
(39, 2, 5, 1, 0, 'iPhone 14 Pro Max', 'Apple iPhone 14 Pro Max comes with a 6.7 inches LTPO Super Retina XDR OLED 1290 x 2796 pixels screen. It has a double punch-hole design. The back camera is of quad 48+12+12 Megapixel + TOF 3D LiDAR scanner with powerful image processing capability and 4K video recording. The front one is of Dual 12 MP and SL 3D camera. Apple iPhone 14 Pro Max comes with – mAh battery with – fast charging solution. It has 6 GB RAM, up to 3.46 GHz Hexa-core CPU and Apple GPU. It is powered by a 4 nm Apple A16 Bionic chipset. The device comes with 128, 256, 512 GB or 1 TB internal storage.\r\n\r\nAmong other features, there is Face ID, Apple Pay, Siri, Qi Wireless Charging, Emergency SOS via satellite etc. There is no FM Radio, 3.5mm jack and MicroSD slot in this phone. The device is IP68 certified waterproof and 5G supported.', '', '', 0.00, 289999.00, 10, 'Apple-iPhone-14-Pro-Max.jpg', 4, 0, '', '0000-00-00 00:00:00'),
(40, 2, 5, 1, 0, 'Mostak', 'j,hgfbrfbrb', '', '', 0.00, 56444.00, 10, 'Apple-iPhone-14-Pro-Max.jpg', 4, 0, '', '2023-01-21 23:00:16'),
(41, 2, 5, 1, 0, 'Apple iPhone 14 Pro Max', 'Apple iPhone 14 Pro Max Full Specifications\r\nName	Apple iPhone 14 Pro Max\r\nBrand	Apple\r\nModel	iPhone 14 Pro Max, A2894, A2651, A2893, A2895, iphone15,3\r\nPrice	201,599.00 Taka (approx)\r\nCategory	Smartphone\r\nShowroom	Click Here\r\nNetwork\r\nNetwork Type\r\nGSM / CDMA / HSPA / EVDO / LTE / 5G\r\nNetwork 2G\r\nGSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2 (Dual-SIM)\r\nNetwork 3G\r\nHSDPA 850 / 900 / 1700(AWS) / 1900 / 2100\r\nNetwork 4G\r\nLTE\r\nNetwork 5G\r\nSA/NSA/Sub6\r\nSpeed\r\nHSPA, LTE-A, 5G\r\nGPRS\r\nYes\r\nEDGE\r\nYes\r\nLaunch\r\nLaunch Announcement\r\n2022, September\r\nLaunch Date\r\nAvailable. Released 2022, September\r\nBody\r\nBody Dimensions\r\n160.7 x 77.6 x 7.9 mm (6.33 x 3.06 x 0.31 in)\r\nBody Weight\r\n240 g\r\nBuild\r\nGlass Front (Gorilla Glass), Glass Back (Gorilla Glass), Stainless Steel Frame\r\nNetwork Sim\r\nNano-SIM and/or multiple eSIMs or Dual SIM (Nano-SIM, Dual stand-by) | eSIM only for USA\r\nDisplay\r\nDisplay Type\r\nLTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 2000 nits (HBM)\r\nDisplay Size\r\n6.7 inches, 110.2 cm2 (~88.3% screen-to-body ratio)\r\nDisplay Resolution\r\n1290 x 2796 pixels, 19.5:9 ratio\r\nDisplay Multitouch\r\nYes\r\nDisplay Density\r\n460 ppi\r\nDisplay Screen Protection\r\nScratch-Resistant Ceramic Glass, Oleophobic Coating\r\nPlatform\r\nOperating System\r\niOS\r\nOS Version\r\n16\r\nChipset\r\nApple A16 Bionic (4 nm)\r\nCPU\r\nHexa-core\r\nGPU\r\nApple GPU (5-core graphics)\r\nMemory\r\nMemory Internal\r\n128 GB, 256 GB, 512 GB, 1 TB\r\nMemory External\r\nNo\r\nRam\r\n6 GB\r\nCamera\r\nPrimary Camera\r\nQuad: 48 MP, (wide)\r\n12 MP, (telephoto), 3X Optical Zoom\r\n12 MP, (ultrawide)\r\nTOF 3D LiDAR Scanner (depth)\r\nSecondary Camera\r\nDual: 12 MP, (wide)\r\nSL 3D, (depth/biometrics sensor)\r\nCamera Features\r\nLED Flash (adaptive), HDR (photo/panorama)\r\nVideo\r\n4K@24/25/30/60fps, 1080p@25/30/60/120/240fps\r\nSound\r\nAudio\r\nYes\r\nLoudspeaker\r\nYes with Stereo Speakers\r\n3.5mm Jack\r\nNo\r\nConnectivity\r\nWiFi\r\nWi-Fi 802.11 a/b/g/n/ac/6, dual-band, Hotspot\r\nBluetooth\r\n5.3, A2DP, LE\r\nNFC\r\nYes\r\nUSB\r\nLightning, USB 2.0\r\nGPS\r\nYes, with Dual Band A-GPS\r\nFm Radio\r\nNo\r\nFeatures\r\nSensors\r\nFace ID, accelerometer, gyro, proximity, compass, barometer\r\nMessaging\r\nYes\r\nBattery\r\nBattery Type\r\nNon-removable Li-Ion Battery (16.68 Wh)\r\nBattery Capacity\r\n4323 mAh\r\nCharging\r\nFast Charging, 50% in 30 min (advertised)\r\nMore\r\nBody Color\r\nSpace Black, Silver, Gold, Deep Purple\r\nOther Features\r\nAlways-On Display.\r\nUltra Wideband (UWB) Support.\r\nEmergency SOS via Satellite (SMS sending/receiving).\r\nUSB Power Delivery 2.0.\r\nMagSafe wireless charging 15W.\r\nQi magnetic fast wireless Charging 7.5W.', '', '', 0.00, 89444.00, 10, 'download.jpeg', 4, 0, '', '2023-01-21 23:11:50'),
(42, 2, 5, 1, 0, 'Apple iPad (2022)', 'Apple iPad (2022) Full Specifications\r\nName	Apple iPad (2022)\r\nBrand	Apple\r\nModel	iPad (2022), iPad 10.9-inch (10th Generation)\r\nPrice	95,000.00 Taka (approx)\r\nCategory	Tablet\r\nShowroom	Click Here\r\nNetwork\r\nNetwork Type\r\nGSM / HSPA / LTE / 5G\r\nNetwork 2G\r\nGSM 850 / 900 / 1800 / 1900\r\nNetwork 3G\r\nHSDPA 850 / 900 / 1700(AWS) / 1900 / 2100\r\nNetwork 4G\r\nLTE\r\nNetwork 5G\r\nSA/NSA/Sub6\r\nSpeed\r\nHSPA, LTE-A, 5G\r\nGPRS\r\nYes\r\nEDGE\r\nYes\r\nLaunch\r\nLaunch Announcement\r\n2022, October\r\nLaunch Date\r\nExp. Release 2022, October\r\nBody\r\nBody Dimensions\r\n248.6 x 179.5 x 7 mm (9.79 x 7.07 x 0.28 in)\r\nBody Weight\r\n481 g\r\nBuild\r\nGlass Front, Aluminum Back, Aluminum Frame\r\nNetwork Sim\r\nNano-SIM, eSIM\r\nDisplay\r\nDisplay Type\r\nLiquid Retina IPS LCD, 500 nits (typ)\r\nDisplay Size\r\n10.9 inches, 359.2 cm2 (~80.5% screen-to-body ratio)\r\nDisplay Resolution\r\n1640 x 2360 pixels\r\nDisplay Multitouch\r\nYes\r\nDisplay Density\r\n264 ppi\r\nDisplay Screen Protection\r\nScratch-Resistant Glass, Oleophobic Coating\r\nPlatform\r\nOperating System\r\niPadOS\r\nOS Version\r\n16\r\nChipset\r\nApple A14 Bionic (5 nm)\r\nCPU\r\nHexa-core (2x3.0 GHz Firestorm + 4x1.8 GHz Icestorm)\r\nGPU\r\nApple GPU (4-core Graphics)\r\nMemory\r\nMemory Internal\r\n64 GB, 128 GB, 256 GB\r\nMemory External\r\nNo\r\nCamera\r\nPrimary Camera\r\n12 MP\r\nSecondary Camera\r\n12 MP\r\nCamera Features\r\nPanorama, HDR\r\nVideo\r\n4K@24/25/30/60fps, 1080p@25/30/60/120/240fps\r\nSound\r\nAudio\r\nYes\r\nLoudspeaker\r\nYes with Stereo Speakers\r\n3.5mm Jack\r\nNo\r\nConnectivity\r\nWiFi\r\nWi-Fi 802.11 a/b/g/n/ac/6, dual-band, Hotspot\r\nBluetooth\r\n5.2, A2DP, EDR, LE\r\nUSB\r\nUSB Type-C 2.0, DisplayPort Magnetic Connector\r\nGPS\r\nYes with A-GPS\r\nFm Radio\r\nNo\r\nFeatures\r\nSensors\r\nFingerprint (top-mounted), accelerometer, gyro, compass, barometer\r\nMessaging\r\nYes\r\nBattery\r\nBattery Type\r\nNon-removable Li-Ion Battery (28.6 Wh)\r\nMore\r\nBody Color\r\nSilver, Blue, Pink, Yellow', '', '', 0.00, 89020.00, 10, 'Apple-iPad-2022-Blue.jpg', 4, 0, '', '2023-01-22 01:07:10'),
(43, 2, 5, 1, 0, 'Microsoft Surface Pro 8', 'Microsoft Surface Pro 8 Core i5 11th Gen 8GB RAM 256GB SSD 13\" MultiTouch 2-in-1 Detachable Laptop (8PQ-00028)\r\nThe Microsoft Surface Pro 8 powered by Intel Core i5-1135G7 Processor (8M Cache,2.40 GHz up to 4.20 GHz) with Intel Iris Xe Graphics, Wi-Fi options with 8GB RAM and 256GB storage, and above built on the Intel Evo platform. This Surface Pro 8 comes with a high-resolution 13â€� PixelSense touch display with up to 120Hz refresh rate is our most advanced Pro display. Touch and pen are more responsive. You can Unlock more value with chip-to-cloud security and modern management. The Surface Pro 8 helps keep you secure from anywhere with an improved Windows Hello camera, removable hard drive, and optional LTE Advanced. This Surface Pro 8 features Accelerometer, Ambient Light Sensor, Gyroscope. It comes with a Camera System of Front 5 MP Sensor, Rear 10 MP Sensor. It supports Video Recording Front 1080p, Rear UHD 4K. This is the first Surface Pro built on the Intel Evo platform. Do it all with the Intel Evo platform that provides great performance, graphics, and battery life in a thin and light PC. The latest Microsoft Surface Pro 8 has a 1-year warranty.', '', '', 0.00, 135000.00, 10, 'download (1).jpeg', 7, 0, '', '2023-01-22 01:35:33'),
(44, 2, 5, 1, 0, 'Asus ZenBook 14 UX435EA Core i5 11th Gen 14\" FHD Laptop', 'Asus ZenBook 14 UX435EA Core i5 11th Gen 14\" FHD Laptop\r\nThe New ZenBook 14 UX435EA is powered by Intel Core i5-1135G7 Processor (8M Cache, 2.40 GHz up to 4.20 GHz) with Intel Iris Xe Graphics. The ZenBook 14 also featured with ultra-fast storage, with up to a 512GB M.2 NVMe PCIe 3.0 G3 SSD accelerated with 8GB LPDDR4X RAM. This Asus ZenBook 14 provides superb all-around performance that makes task easier. This ZenBook combines superb performance and effortless portability with timeless stylish looks. This bright and clear display has a wide, 100% sRGB color gamut to ensure vivid colors. The elegant and lightweight design makes it easy to work efficiently. The new ZenBook 14 UX435EA featured a frameless four-sided NanoEdge wide-view display, with slim bezels that create a 92% screen-to-body ratio for incredibly immersive viewing experiences. The ergonomic keyboard ensures precise feedback and comfortable typing experiences, and convenient function keys give you instant access to common tasks and features. Asus ZenBook 14 comes with a full complement of I/O ports, including full-size 1x HDMI 2.0b and 1x USB 3.2 Gen 1 Type-A. The power of Thunderbolt 4 (2x Thunderbolt 4 supports display/power delivery) is also at your disposal, with two USB-C ports. For easy data transfers from mobile devices, thereâ€™s also a MicroSD card reader.\r\n\r\nThis Asus Zenbook equipped with WiFi 6 (802.11ax) offers wireless connectivity with speeds that are up to 3x faster than WiFi 5. Here also Included ASUS WiFi Master technology, that helps to improves connectivity even further. This ZenBook UX435EA is protected by ASUS BacGuard, a new antibacterial treatment that helps to reduce the spread of harmful bacteria via contact. The new Asus ZenBook 14 UX435EA has 02 years International Limited Warranty (Terms & condition Apply As Per Asus).', '', '', 0.00, 118000.00, 10, 'download (2).jpeg', 6, 1, '', '2023-01-22 01:37:32'),
(45, 2, 5, 1, 0, 'Apple MacBook Air 13.3-Inch', 'Apple MacBook Air 13.3-Inch 10th Gen Core i5-1.1GHz, 8GB RAM, 512GB SSD (MVH22) Space Gray 2020\r\nThe extremely thin and light MacBook Air is now stronger and better than ever. It has an eye-catching Retina display, a new and elegant keyboard, Touch ID, a processor with up to double performance, faster image processing, and double storage capacity. The sleek design of the wedge-shaped side is made of 100% recycled aluminum metal, making it the most environmentally friendly Mac ever.The 2560 x 1600 resolution brings over 4 million pixels, and the results are naturally stunning. The original color technology can automatically adjust the white point of the display to match the color temperature of your environment, so that the web pages and emails you see are as natural as printed products. Thousands of colors are displayed to make everything you see rich and vivid. The display glass extends to the edge of the fuselage, allowing you to focus on the screen content and love what you see. The MacBook Air weighs as little as 1.29 kg, but the inner performance is sufficient to complete the heavy work. The currently available Intel Core i5 1.1GHz Quad-core, Turbo Boost up to 3.5GHz processing faster performance, giving you a powerful boost, whether browsing the web, playing games, or even editing videos, also easy to handle. And equipped with up to 8GB LPDDR4X high-performance memory, even if you run multiple apps at the same time, you can still work smoothly and freely. In addition, it is equipped with 512GB fast SSD storage as standard configuration, double the previous generation, providing a large amount of space to store all your movies, music, photos, files and games. MacBook Air is now equipped with a new and elaborate keyboard that debuted on the 16-inch MacBook Pro. It adopts the scissor structure of excellence, and the 1mm keystroke brings you a sensitive, comfortable and quiet typing experience. The arrow keys arranged in an inverted T shape help you easily control, coding line by line, one by one spreadsheet, and even come and go in various game environments. Coupled with a backlit key with ambient light sensor, you can also type easily in dim environments. No matter where you press the touchpad, it can be precisely controlled and the response is consistent; it also provides more space, using two-finger opening and closing to zoom in and out and other multi-touch gestures, more handy. The advanced security and convenience brought by Touch ID has been built into the MacBook Air. Just place your finger on the Touch ID sensor to unlock your Mac. It â€™s that simple. Using your fingerprint, you can unlock locked files, memos, and system settings without entering a password. Online shopping is also easier than ever. Select Apple Pay at checkout and pay with one touch. MacBook Air is equipped with the Apple T2 security chip, which is the second-generation special Mac chip designed by Apple, which further enhances the security of MacBook Air. Therefore, when you use Touch ID to unlock your Mac, authenticate documents, or pay at online merchants for shopping, your information will remain safe and private. With the real-time data encryption function, all data you store on the SSD will be fully encrypted automatically. In addition, the T2 security chip also brings a familiar sound to the MacBook Air. Just say \"Hello Siri\", Siri will be ready to open apps, find files, play music or answer your questions for you.MacBook Air uses the latest audio processing and tuning technology to present a more pleasant tone. Stereo speakers bring double bass and the volume is increased by as much as 25% 3. Wider stereo, so you can feel the shocking sound when listening to music or watching movies. The FaceTime lens allows one or more relatives and friends to meet you in high definition. Three microphones form an array, which can capture your voice more accurately when you are calling FaceTime, dictating or talking with Siri. Thunderbolt 3 combines ultra-high bandwidth and the extremely diverse USB-C industry standard to become an enhanced universal port. The MacBook Air has two Thunderbolt 3 ports. It integrates data transmission, charging and video output with a single interface, and the bandwidth is twice that of Thunderbolt 2, bringing data traffic as fast as 40Gb / s.\r\n\r\nThis exclusive Apple Macbook Air (MVH22) 2020 comes with no warranty', '', '', 0.00, 124235.00, 10, 'images.jpeg', 5, 0, '', '2023-01-22 01:40:56'),
(46, 2, 5, 1, 0, 'Apple MacBook Air', 'Apple MacBook Air 13.3-Inch 10th Gen Core i5-1.1GHz, 8GB RAM, 512GB SSD (MVH22) Space Gray 2020\r\nThe extremely thin and light MacBook Air is now stronger and better than ever. It has an eye-catching Retina display, a new and elegant keyboard, Touch ID, a processor with up to double performance, faster image processing, and double storage capacity. The sleek design of the wedge-shaped side is made of 100% recycled aluminum metal, making it the most environmentally friendly Mac ever.The 2560 x 1600 resolution brings over 4 million pixels, and the results are naturally stunning. The original color technology can automatically adjust the white point of the display to match the color temperature of your environment, so that the web pages and emails you see are as natural as printed products. Thousands of colors are displayed to make everything you see rich and vivid. The display glass extends to the edge of the fuselage, allowing you to focus on the screen content and love what you see. The MacBook Air weighs as little as 1.29 kg, but the inner performance is sufficient to complete the heavy work. The currently available Intel Core i5 1.1GHz Quad-core, Turbo Boost up to 3.5GHz processing faster performance, giving you a powerful boost, whether browsing the web, playing games, or even editing videos, also easy to handle. And equipped with up to 8GB LPDDR4X high-performance memory, even if you run multiple apps at the same time, you can still work smoothly and freely. In addition, it is equipped with 512GB fast SSD storage as standard configuration, double the previous generation, providing a large amount of space to store all your movies, music, photos, files and games. MacBook Air is now equipped with a new and elaborate keyboard that debuted on the 16-inch MacBook Pro. It adopts the scissor structure of excellence, and the 1mm keystroke brings you a sensitive, comfortable and quiet typing experience. The arrow keys arranged in an inverted T shape help you easily control, coding line by line, one by one spreadsheet, and even come and go in various game environments. Coupled with a backlit key with ambient light sensor, you can also type easily in dim environments. No matter where you press the touchpad, it can be precisely controlled and the response is consistent; it also provides more space, using two-finger opening and closing to zoom in and out and other multi-touch gestures, more handy. The advanced security and convenience brought by Touch ID has been built into the MacBook Air. Just place your finger on the Touch ID sensor to unlock your Mac. It â€™s that simple. Using your fingerprint, you can unlock locked files, memos, and system settings without entering a password. Online shopping is also easier than ever. Select Apple Pay at checkout and pay with one touch. MacBook Air is equipped with the Apple T2 security chip, which is the second-generation special Mac chip designed by Apple, which further enhances the security of MacBook Air. Therefore, when you use Touch ID to unlock your Mac, authenticate documents, or pay at online merchants for shopping, your information will remain safe and private. With the real-time data encryption function, all data you store on the SSD will be fully encrypted automatically. In addition, the T2 security chip also brings a familiar sound to the MacBook Air. Just say \"Hello Siri\", Siri will be ready to open apps, find files, play music or answer your questions for you.MacBook Air uses the latest audio processing and tuning technology to present a more pleasant tone. Stereo speakers bring double bass and the volume is increased by as much as 25% 3. Wider stereo, so you can feel the shocking sound when listening to music or watching movies. The FaceTime lens allows one or more relatives and friends to meet you in high definition. Three microphones form an array, which can capture your voice more accurately when you are calling FaceTime, dictating or talking with Siri. Thunderbolt 3 combines ultra-high bandwidth and the extremely diverse USB-C industry standard to become an enhanced universal port. The MacBook Air has two Thunderbolt 3 ports. It integrates data transmission, charging and video output with a single interface, and the bandwidth is twice that of Thunderbolt 2, bringing data traffic as fast as 40Gb / s.\r\n\r\nThis exclusive Apple Macbook Air (MVH22) 2020 comes with no warranty', '', '', 0.00, 116200.00, 10, 'vostro-14-3400-black-side-500x500.jpg', 12, 0, '', '2023-01-22 01:45:24'),
(48, 2, 5, 1, 0, 'Dell Vostro 14 3400 Core i3 11th Gen 14', 'Dell Vostro 14 3400 Core i3 11th Gen 14\" HD Laptop\r\nDell Vostro 14 3400 Laptop comes with the Intel Core i3-1115G4 Processor (6MB Cache, 3.0 GHz up to 4.10 GHz) and 4GB DDR4 2666MHz RAM. It has a 1TB 5400 rpm 2.5\" SATA Hard Drive. It is featured Intel UHD Graphics. It has a 14.0-inch HD (1366 x 768), 60 Hz, Anti-glare, NTSC 45%, 220 Nits, LED Backlight Non-touch Narrow Border Display. It features built-in 802.11ac 1x1 WiFi and Bluetooth. It comes with 1x USB 2.0, 1x HDMI 1.4, 1x Ethernet RJ-45, 2x USB 3.2 Gen 1 Type-A, 1x Headset Jack, 1x Power In ports, and 1x 3-in-1 SD Media Card Reader, 1x Wedge-Shaped Lock Slot. It is powered by 3-Cell, 42 WHr, Integrated battery. Dell Vostro 14 3400 Core i3 Laptop has 3 years warranty (battery adapter 1 year).', 'Height: 0.71\" – 0.78\" (18.1 mm – 19.0 mm) Width: 12.94\" (328.7 mm) Depth: 9.43\" (239.5 mm)', '1.59 kg (3.49 lb)', 48000.00, 51997.00, 10, 'dell-11.jpg', 2, 2, '2', '2023-03-06 10:59:28'),
(50, 0, 0, 0, 0, '', '', '', '', 0.00, 0.00, 0, '', 0, 0, '', '2023-04-09 02:36:35'),
(51, 0, 0, 0, 0, 'A', 'xx', '', '', 1225.00, 0.00, 0, '', 0, 0, '', '2023-04-18 00:40:28'),
(52, 0, 0, 0, 0, 'ammm', 'good p', '', '', 2000.00, 0.00, 0, '', 0, 0, '', '2023-04-18 01:08:37'),
(53, 0, 0, 0, 0, 'Mobile 01', 'Mobile', '', '', 22100.00, 0.00, 0, '', 0, 0, '', '2023-04-18 08:54:03'),
(54, 0, 0, 0, 0, 'Mobile2', 'Mobile', '', '', 21000.00, 0.00, 0, '', 0, 0, '', '2023-04-18 08:54:36'),
(55, 0, 0, 0, 0, 'mobile 3', 'description test', '', '', 21504.00, 0.00, 0, '', 0, 0, '', '2023-04-18 09:00:37'),
(56, 0, 0, 0, 0, 'mobile 45', 'mobile add details', '', '', 120000.00, 0.00, 0, '', 0, 0, '', '2023-04-18 10:17:29'),
(57, 0, 0, 0, 0, 'New 01', 'sbiush onsocn osdnsdi oinoa k v aeriuhg abfp9u auhbvh vno9h89  qa  aiuh a ana,h9h 9hnib as df j jhfds  ajhkjsahf is is bangladesh', '', '', 20154.00, 0.00, 0, '', 0, 0, '', '2023-05-14 12:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `star` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `comment`, `star`) VALUES
(22, 1, 21, '', 4),
(23, 10, 21, 'This is the first review', 5),
(24, 11, 21, 'This is the first review', 5),
(25, 10, 21, 'This is the first review', 5),
(26, 11, 21, 'This is the first review', 5),
(27, 10, 21, 'Samsung Galaxy A13 Good for use', 5),
(28, 11, 21, 'Samsung Galaxy A13 Good for use', 5),
(29, 7, 21, 'Samsung Galaxy A13 Good for use', 5),
(30, 1, 21, 'This phone is horrible, 32bit sluggish even just navigating home screen is laggy. s10e has much better soc, hence faster compared to those two but quite old now. Midrange samsungs are terrible, i might suggest redmi series, specially note 10 pro glob..', 4),
(31, 5, 26, 'Good Phone For regular uses', 4),
(32, 7, 1, 'Good product', 4),
(33, 7, 2, 'The product is good', 5),
(34, 7, 2, 'Good Product', 5),
(35, 7, 2, 'good', 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rank`) VALUES
(1, 'User/Customer'),
(2, 'Super Admin'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `home` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` set('1','2','3','4') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `city`, `state`, `postal_code`, `home`, `phone`, `email`, `password`, `role`, `created_at`) VALUES
(7, 'user1', 'user1', 'Dhaka', 'Dhaka', '1216', 'Shenara,314/7', '01835648526', 'user1@gmail.com', '$2y$10$fDWN4tUrLjq08AxevR6xieVgKdacHW3ZcyPJZ7Y0nIAA23XMZQyBy', '2', '2023-03-06 23:41:37'),
(10, 'Mostak', '', '', '', '', 'Mirpur', '01254553155', 'test1@gmail.com', '123456', '', '2023-05-22 00:25:37'),
(11, 'Mostak', '', '', '', '', 'Mirpur', '01254553155', 'test1@gmail.com', '$2y$10$AnWBHbGm0VrrpLBdTZf8PuUayWbFdpOqMGdjiC0eFlZKYBOmYr7kC', '', '2023-05-22 00:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `created_at`) VALUES
(1, 5, 0, '2023-03-20 05:08:12'),
(2, 3, 2, '2023-03-20 05:11:05'),
(3, 5, 0, '2023-03-20 05:13:42'),
(4, 5, 0, '2023-03-20 05:15:15'),
(5, 5, 3, '2023-03-20 05:18:55'),
(6, 5, 4, '2023-03-20 05:19:16'),
(7, 5, 0, '2023-03-20 05:19:48'),
(8, 5, 1, '2023-03-20 05:24:48'),
(9, 5, 1, '2023-03-20 05:37:00'),
(10, 5, 1, '2023-03-20 05:37:42'),
(11, 5, 1, '2023-03-20 05:37:52'),
(12, 5, 1, '2023-03-20 05:47:08'),
(13, 5, 1, '2023-03-20 05:48:59'),
(14, 5, 1, '2023-03-20 05:49:34'),
(15, 5, 1, '2023-03-20 05:52:05'),
(16, 5, 1, '2023-03-20 05:54:16'),
(17, 5, 1, '2023-03-20 05:56:14'),
(18, 5, 0, '2023-03-20 05:57:33'),
(19, 5, 1, '2023-03-20 06:03:13'),
(20, 5, 1, '2023-03-20 06:04:00'),
(21, 5, 1, '2023-03-20 06:05:29'),
(22, 5, 1, '2023-03-20 06:06:16'),
(23, 5, 1, '2023-03-20 06:06:58'),
(24, 5, 1, '2023-03-20 06:09:26'),
(26, 5, 0, '2023-03-20 06:31:43'),
(27, 5, 0, '2023-03-20 06:35:14'),
(28, 5, 0, '2023-03-22 05:51:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_2` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
