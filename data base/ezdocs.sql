-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 08:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezdocs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(50) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `adminpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `adminpassword`) VALUES
(1, 'admin1', 'pass1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_name`, `product_price`, `product_image`, `qty`, `total_price`, `product_code`, `username`) VALUES
(109, 'vision optimun', 200, '/ezdocs/upload/visionOptimum.jpg', 1, 200, 'p00011', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `itemlist`
--

CREATE TABLE `itemlist` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemlist`
--

INSERT INTO `itemlist` (`id`, `name`, `image`, `price`, `discount`, `category`) VALUES
(3, 'eye 3', 'cartimages/eye3.jpg', 600, 50, 'eye'),
(4, 'eye 4', 'cartimages/eye4.jpg', 400, 20, 'eye'),
(7, 'repeat1', 'cartimages/eye4.jpg', 7, 1, 'eye'),
(8, 'helo', 'cartimages/eye4.jpg', 30, 1, 'eye'),
(9, 'medicine', 'cartimages/eye3.jpg', 400, 20, 'eye'),
(10, 'cs', 'cartimages/eye4.jpg', 400, 453, 'eye'),
(11, 'hgfe', 'cartimages/eye3.jpg', 600, 12, ''),
(12, 'hgfds', 'cartimages/eye4.jpg', 400, 43, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(255) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`, `Date`, `status`, `username`) VALUES
(9, 'thejus', 'thejus@gmail.com', '987654321', 'bangalore', 'cod', 'True basis(2)', '400', '2021-08-06 10:08:47', 'Delivered', 'qwerty'),
(10, 'thejus', 'thejus@gmail.com', '987654321', 'bangalore', 'cod', 'TRex genics(2)', '200', '2021-08-06 10:21:17', 'Delivered', 'qwerty'),
(11, 'martin', 'martinlutherezdocs@gmail.com', '9876543210', 'india', 'cod', 'vision optimun(3), True basis(1), TRex genics(1)', '900', '2021-08-20 11:10:41', 'yet to be delevired', 'martin'),
(12, 'sdfghj', 'd@g.com', '3456789034', 'ertyui', 'netbanking', 'vision optimun(1)', '200', '2021-09-12 11:44:20', 'yet to be delevired', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_qty`, `product_image`, `product_code`, `category`) VALUES
(40, 'vision optimun', 200, 1, '/ezdocs/upload/visionOptimum.jpg', 'p00011', 'eye'),
(41, 'True basis', 200, 1, '/ezdocs/upload/TrueBasisEyeShild.jpg', 'p076', 'eye'),
(42, 'TRex genics', 100, 1, '/ezdocs/upload/Trexgenics.webp', 'p086', 'eye'),
(43, 'osmo DRops', 300, 1, '/ezdocs/upload/osmodrops Eye.webp', 'p0012sw', 'eye'),
(44, 'Moistane eye', 234, 1, '/ezdocs/upload/Moistane Eye.webp', 'p08w', 'eye'),
(45, 'Elaneekuzhamp', 500, 1, '/ezdocs/upload/Elaneerkuzhampu.webp', 'p0867', 'eye'),
(46, 'AL-Shams eye', 600, 1, '/ezdocs/upload/AL-Shams eye Drops.webp', 'pzxc345', 'eye'),
(51, 'cvb', 236, 1, '/ezdocs/upload/AllenA12.jpg', 'o145', 'hair'),
(52, 'Allen', 200, 1, '/ezdocs/upload/allen.webp', 'p08bhh', 'hair'),
(53, 'Auggmin', 120, 1, '/ezdocs/upload/auggmin.png', 'p09944', 'hair'),
(54, 'Vedix', 499, 1, '/ezdocs/upload/vedix.png', 'p044', 'hair'),
(55, 'Fallihair', 100, 1, '/ezdocs/upload/follihair.png', 'k,g0e3', 'hair'),
(56, 'Antoxipan', 120, 1, '/ezdocs/upload/Antoxipan.png', 'p096zx', 'lungs'),
(57, 'TrueBasics', 99, 1, '/ezdocs/upload/TrueBasics.png', 'p03484', 'lungs'),
(58, 'carestar capsule', 200, 1, '/ezdocs/upload/carestar capsule.png', 'p09as', 'lungs'),
(59, 'Detox', 300, 1, '/ezdocs/upload/Detox.png', 'p048sd', 'lungs'),
(60, 'Meadbery', 200, 1, '/ezdocs/upload/Meadbery.png', 'p0876', 'lungs'),
(61, 'Taredetox', 300, 1, '/ezdocs/upload/Tardetox.png', 'p0fhj', 'lungs'),
(62, 'Inlife', 69, 1, '/ezdocs/upload/Inlife.jpg', 'p5we2', 'neuro'),
(63, 'neuro plus', 500, 1, '/ezdocs/upload/neuro plus.jpg', 'p2134', 'neuro'),
(64, 'sertapex-25', 100, 1, '/ezdocs/upload/sertapex-25.jpg', 'p3ert', 'neuro'),
(65, 'Techlozep', 300, 1, '/ezdocs/upload/Techlozep.jpg', 'p655', 'neuro'),
(66, 'zainanzon', 259, 1, '/ezdocs/upload/Zainazon.jpg', 'p634', 'neuro'),
(67, 'Diabes', 99, 1, '/ezdocs/upload/Diabes.webp', 'p1dfg', 'diabets'),
(68, 'Nickon', 100, 1, '/ezdocs/upload/Nickon.webp', 'p9mnhj', 'diabets'),
(69, 'pro 360', 199, 1, '/ezdocs/upload/Pro 360.webp', 'p6cff', 'diabets'),
(70, 'sunova diabetic', 100, 1, '/ezdocs/upload/sunova diabetic.webp', 'p544', 'diabets'),
(73, 'medicine', 50, 1, '/ezdocs/upload/setueye.jpg', 'p1344', 'cardiac');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `slno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`slno`, `name`, `email`, `username`, `password`, `date`, `token`) VALUES
(36, 'Thejus gowda', 'thejusgowdapn22@gmail.com', 'Thejus', '123456', '2021-05-10 18:11:12', 'c07ea250ef2145326899c0550d55b6'),
(45, 'qwerty', 'dfghj@g.com', 'qwerty', '12345678', '2021-06-18 16:31:47', 'e5414ebc617bcd737dbe7b2316adcf'),
(46, 'name', 'name@gmail.com', 'name', '12345678', '2021-07-26 09:06:42', '9306f664b7a790d6b0e26f0741afac'),
(47, 'Martin Luther', 'martinlutherezdocs@gmail.com', 'martin', '12345678', '2021-08-20 11:04:17', '6c7f1529e005c528fb6f8dc60ff576');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `replay` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `username`, `subject`, `description`, `type`, `date`, `status`, `replay`) VALUES
(2, 'qwerty', 'order is not yet delivered', 'i not received my order', 'complaint', '2021-08-06 10:09:53', 'solved', 'you issue is sloved'),
(3, 'qwerty', 'payment', 'not received order', 'support', '2021-08-06 10:22:06', 'solved', 'your issue is solved'),
(4, 'martin', 'order is not yet delivered ', 'i ordered medicine at 10/4/2021. but still not yet received .', 'complaint', '2021-08-20 11:13:29', 'solved', 'your quuery is sloved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemlist`
--
ALTER TABLE `itemlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `itemlist`
--
ALTER TABLE `itemlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
