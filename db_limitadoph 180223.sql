-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2018 at 02:27 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_limitadoph`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_book`
--

CREATE TABLE `address_book` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` int(5) NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address_book`
--

INSERT INTO `address_book` (`address_id`, `customer_id`, `street`, `city`, `state`, `zip`, `country`) VALUES
(1, 1, 'Sample Street', 'Sample City', 'Sample State', 1900, 'Philippines'),
(2, 2, 'Sample', 'Sample', 'Metro Manila', 91506, 'Philippines'),
(3, 20, '357', 'Quezon City', 'Metro Manila', 1000, 'Philippines'),
(4, 21, 'de la Paz', 'Pasig City', 'NCR', 1800, 'Philippines'),
(5, 22, 'Amang Rodriguez', 'Pasig City', 'NCR', 1800, 'Philippines'),
(6, 23, 'Sample', 'Cainta', 'Rizal', 1900, 'Philippines'),
(7, 26, '77', 'Marikina City', 'Metro Manila', 1800, 'Philippines'),
(8, 27, '77', 'Marikina City', 'Metro Manila', 1800, 'Philippines'),
(9, 31, 'Paredes', 'Manila', 'Abra', 1400, 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `middle_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `username`, `password`, `first_name`, `middle_name`, `last_name`) VALUES
(1, 'admin', 'root', 'Jan Vincnet', 'Villanueva', 'Villanueva');

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `unique_page_visitors` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analytics`
--

INSERT INTO `analytics` (`unique_page_visitors`) VALUES
('121.54.29.68'),
('49.148.51.206'),
('103.196.137.152'),
('121.54.54.190'),
('112.205.138.44'),
('45.32.130.87'),
('125.212.122.2'),
('66.249.71.197'),
('66.249.71.185'),
('203.87.133.136'),
('179.199.150.95'),
('189.13.161.237'),
('52.71.155.178'),
('103.245.90.240'),
('66.249.79.128'),
('195.154.146.225'),
('66.249.79.132'),
('187.61.238.98'),
('201.80.226.123'),
('180.76.15.148'),
('112.211.101.113'),
('207.46.13.66'),
('191.36.191.72'),
('189.73.181.50'),
('201.141.143.185'),
('187.122.142.168'),
('203.87.133.192'),
('112.198.101.79'),
('202.92.130.6'),
('202.57.37.87'),
('41.96.30.179'),
('179.222.181.252'),
('186.250.253.23'),
('180.76.15.151'),
('89.154.197.63'),
('157.55.39.35'),
('66.249.71.191'),
('40.77.167.7'),
('188.143.232.14'),
('189.127.200.12'),
('66.249.84.192'),
('66.249.71.190'),
('66.249.71.178'),
('72.136.192.241'),
('157.55.39.193'),
('66.249.71.184'),
('49.148.30.94'),
('45.32.128.51'),
('45.32.129.200'),
('45.32.130.173'),
('180.76.15.20'),
('180.76.15.25'),
('197.148.55.73'),
('89.152.110.154'),
('40.77.167.87'),
('168.205.35.46'),
('180.76.15.30'),
('180.76.15.154'),
('49.150.130.126'),
('179.216.27.172'),
('111.235.90.200'),
('191.201.184.109'),
('192.95.50.77'),
('207.46.13.117'),
('86.62.117.180'),
('180.76.15.138'),
('103.14.62.241'),
('157.55.39.8'),
('186.203.248.60'),
('189.12.157.51'),
('180.76.15.15'),
('64.246.161.42'),
('193.248.153.69'),
('120.28.191.10'),
('120.28.191.5'),
('120.28.191.6'),
('120.28.191.13'),
('120.28.191.9'),
('120.28.191.14'),
('120.28.191.3'),
('66.249.84.200'),
('111.235.90.134'),
('111.235.90.134'),
('203.87.133.154'),
('2.237.246.103'),
('177.97.101.115'),
('177.86.48.30'),
('112.198.81.69'),
('180.76.15.150'),
('181.55.53.196'),
('92.97.5.95'),
('201.66.37.0'),
('180.76.15.157'),
('189.106.187.123'),
('112.198.102.77'),
('41.246.8.162'),
('112.198.82.68'),
('202.57.37.67'),
('111.235.90.152'),
('66.249.82.220'),
('72.76.221.220'),
('180.76.15.139'),
('103.246.38.196'),
('122.49.221.26'),
('112.198.68.246'),
('202.57.37.92'),
('112.198.83.158'),
('157.55.39.105'),
('103.14.62.155'),
('173.252.123.140'),
('173.252.88.88'),
('119.93.25.4'),
('176.123.2.42'),
('112.198.69.4'),
('66.220.146.29'),
('69.171.228.116'),
('69.171.228.121'),
('173.252.114.112'),
('173.252.102.113'),
('173.252.79.113'),
('66.220.145.243'),
('121.58.221.90'),
('180.76.15.8'),
('180.76.15.156'),
('180.76.15.11'),
('139.162.163.183'),
('66.249.79.100'),
('157.55.39.153'),
('94.23.168.141'),
('148.251.41.162'),
('112.204.193.188'),
('66.249.79.104'),
('104.154.106.30'),
('130.105.144.62'),
('180.76.15.144'),
('124.106.136.215'),
('110.55.4.148'),
('202.46.52.18'),
('52.23.178.247'),
('112.205.146.174'),
('66.102.7.169'),
('176.123.8.33'),
('198.101.238.203'),
('203.87.133.137'),
('114.198.132.18'),
('37.9.68.58'),
('110.55.1.18'),
('222.127.209.193'),
('112.198.118.147'),
('40.77.167.96'),
('157.55.39.127'),
('66.249.88.44'),
('66.249.80.80'),
('66.102.9.172'),
('112.198.77.196'),
('161.69.163.20'),
('122.177.195.178'),
('66.249.79.108'),
('91.210.145.218'),
('66.249.88.49'),
('182.69.227.28'),
('176.31.149.121'),
('112.198.102.9'),
('112.198.90.110'),
('202.57.39.86'),
('180.76.15.163'),
('66.249.80.72'),
('119.95.235.234'),
('163.172.29.9'),
('69.63.188.115'),
('76.164.224.66'),
('207.102.138.158'),
('209.190.113.85'),
('64.79.76.50'),
('66.249.79.59'),
('66.249.79.58'),
('112.198.68.91'),
('125.212.122.16'),
('31.132.183.106'),
('112.207.106.107'),
('112.198.102.174'),
('157.55.39.95'),
('66.249.84.40'),
('163.172.28.159'),
('167.114.89.195'),
('112.198.69.66'),
('49.151.165.31'),
('124.106.243.113'),
('69.171.230.110'),
('198.72.115.172'),
('208.91.115.10'),
('54.162.204.185'),
('49.50.67.240'),
('166.78.181.113'),
('180.76.15.12'),
('180.76.15.6'),
('180.76.15.24'),
('64.246.165.160'),
('157.55.39.207'),
('180.179.142.108'),
('185.129.62.63'),
('40.77.167.21'),
('157.55.39.136'),
('176.10.104.243'),
('192.227.204.38'),
('17.142.154.163'),
('199.59.148.210'),
('199.59.148.211'),
('144.76.23.228'),
('74.6.254.116'),
('180.76.15.137'),
('176.31.39.23'),
('158.69.228.25'),
('66.249.71.148'),
('66.249.71.146'),
('103.14.62.84'),
('40.77.167.17'),
('104.200.154.40'),
('180.76.15.155'),
('66.249.84.22'),
('111.125.87.155'),
('111.125.87.157'),
('111.125.87.149'),
('192.237.216.89'),
('111.125.87.153'),
('178.32.139.10'),
('69.58.178.58'),
('37.59.184.182'),
('198.199.83.185'),
('89.145.95.39'),
('66.249.84.20'),
('180.76.15.135'),
('202.0.103.80'),
('38.100.21.68'),
('125.212.122.23'),
('192.99.10.173'),
('112.198.72.200'),
('134.249.159.113'),
('122.3.55.112'),
('66.249.80.20'),
('52.91.144.123'),
('203.215.121.29'),
('180.76.15.23'),
('69.164.111.198'),
('173.252.88.89'),
('157.55.39.199'),
('52.42.199.226'),
('144.76.23.116'),
('66.249.84.18'),
('66.102.6.159'),
('49.148.223.63'),
('66.249.79.57'),
('49.149.147.46'),
('91.224.160.116'),
('157.55.39.233'),
('207.46.13.188'),
('66.249.71.144'),
('91.121.44.159'),
('203.87.156.106'),
('203.87.133.189'),
('203.87.133.207'),
('49.149.209.149'),
('49.149.12.26'),
('112.198.118.96'),
('124.107.181.134'),
('188.54.18.219'),
('162.213.1.246'),
('162.216.19.183'),
('180.76.15.10'),
('174.129.237.157'),
('159.203.90.94'),
('111.235.90.230'),
('49.149.220.176'),
('66.249.82.208'),
('66.249.82.210'),
('203.87.156.145'),
('157.55.39.86'),
('111.235.90.172'),
('144.76.14.42'),
('52.91.102.153'),
('54.196.16.3'),
('49.149.177.52'),
('213.223.171.232'),
('119.93.248.42'),
('207.46.13.28'),
('64.246.165.10'),
('173.252.88.87'),
('173.252.88.95'),
('180.76.15.158'),
('124.106.253.171'),
('95.65.30.156'),
('207.46.13.43'),
('112.207.20.36'),
('122.3.25.135'),
('5.39.219.98'),
('40.77.167.31'),
('157.55.39.141'),
('157.55.39.223'),
('66.220.156.105'),
('157.55.39.173'),
('157.55.39.173'),
('180.76.15.136'),
('66.249.77.8'),
('125.212.123.212'),
('40.77.167.63'),
('157.55.39.61'),
('180.76.15.31'),
('207.46.13.147'),
('167.114.233.118'),
('103.14.62.74'),
('207.46.13.131'),
('157.55.39.104'),
('40.77.167.58'),
('62.210.80.20'),
('178.238.225.65'),
('180.76.15.21'),
('45.32.129.1'),
('124.104.237.211'),
('122.53.242.226'),
('124.104.88.70'),
('203.87.133.159'),
('203.87.133.139'),
('203.87.133.147'),
('40.77.167.40'),
('40.77.167.14'),
('49.149.210.29'),
('203.87.133.145'),
('203.87.133.143'),
('39.118.187.65'),
('207.46.13.132'),
('110.85.114.40'),
('203.215.121.37'),
('180.76.15.28'),
('203.215.120.68'),
('93.91.80.6'),
('157.55.39.121'),
('130.105.224.50'),
('199.16.156.124'),
('144.76.23.36'),
('203.87.133.203'),
('121.54.54.56'),
('103.14.62.119'),
('110.89.60.106'),
('173.252.90.92'),
('121.97.142.141'),
('112.198.72.57'),
('178.32.202.41'),
('103.14.62.33'),
('157.55.39.227'),
('40.77.167.29'),
('180.76.15.32'),
('104.156.231.254'),
('192.241.181.250'),
('93.91.80.7'),
('190.147.83.183'),
('185.145.38.209'),
('157.55.39.181'),
('207.46.13.134'),
('74.82.4.80'),
('162.243.16.94'),
('103.3.63.94'),
('27.153.218.44'),
('124.106.142.86'),
('103.14.63.77'),
('203.87.133.156'),
('49.151.190.140'),
('49.144.133.14'),
('112.208.49.207'),
('203.87.133.204'),
('124.107.213.234'),
('112.198.82.179'),
('125.212.123.223'),
('111.235.90.239'),
('121.54.44.88'),
('54.88.48.158'),
('203.215.120.23'),
('52.11.240.199'),
('199.59.148.209'),
('52.24.13.47'),
('45.79.84.219'),
('167.114.17.147'),
('112.205.68.226'),
('222.127.94.5'),
('149.202.206.103'),
('54.69.32.159'),
('112.198.75.67'),
('180.76.15.146'),
('121.54.32.169'),
('66.249.77.6'),
('130.105.209.41'),
('207.46.13.186'),
('185.129.148.216'),
('144.76.22.75'),
('159.203.160.162'),
('103.14.62.191'),
('54.81.246.140'),
('157.55.39.232'),
('157.55.39.155'),
('121.97.218.134'),
('128.199.128.202'),
('64.74.215.46'),
('203.215.120.167'),
('54.227.122.114'),
('112.198.118.42'),
('45.35.63.194'),
('69.58.178.56'),
('83.223.165.180'),
('180.76.15.27'),
('103.14.62.135'),
('111.235.90.237'),
('64.74.215.59'),
('204.12.206.226'),
('89.145.95.42'),
('120.28.68.169'),
('103.14.62.214'),
('112.209.153.18'),
('40.85.141.251'),
('112.201.89.22'),
('203.87.133.141'),
('203.87.133.144'),
('203.87.133.157'),
('203.87.133.135'),
('203.87.133.151'),
('203.87.133.162'),
('180.76.15.145'),
('203.87.133.128'),
('203.87.133.158'),
('195.242.80.108'),
('104.197.122.61'),
('199.16.156.126'),
('124.107.206.26'),
('125.212.122.171'),
('180.76.15.161'),
('159.203.36.50'),
('38.100.21.62'),
('203.215.120.215'),
('104.156.230.231'),
('66.249.77.13'),
('180.76.15.16'),
('66.249.82.212'),
('111.235.90.214'),
('180.76.15.14'),
('54.183.153.209'),
('103.14.62.103'),
('121.54.32.171'),
('121.54.32.164'),
('207.46.13.178'),
('121.54.32.172'),
('66.249.77.11'),
('94.23.174.56'),
('49.149.136.75'),
('180.190.115.69'),
('180.76.15.29'),
('112.198.75.220'),
('64.233.173.138'),
('206.225.80.193'),
('66.249.71.139'),
('66.249.71.137'),
('66.249.79.87'),
('49.148.19.135'),
('104.238.180.234'),
('66.249.77.21'),
('66.249.77.22'),
('66.249.77.15'),
('124.107.214.102'),
('166.170.14.95'),
('108.211.120.114'),
('104.236.30.249'),
('188.128.123.6'),
('66.249.77.23'),
('66.249.77.19'),
('124.83.122.251'),
('66.102.6.128'),
('180.76.15.147'),
('66.249.79.175'),
('66.249.79.178'),
('45.32.217.244'),
('180.76.15.5'),
('112.198.118.254'),
('166.170.5.32'),
('91.215.152.21'),
('125.212.122.87'),
('112.198.98.140'),
('5.196.173.191'),
('66.102.6.81'),
('66.249.71.141'),
('207.46.13.211'),
('73.157.93.235'),
('112.205.129.172'),
('157.55.39.242'),
('157.55.39.30'),
('173.252.124.71'),
('173.252.124.81'),
('69.171.230.120'),
('207.46.13.224'),
('207.46.13.224'),
('207.46.13.224'),
('203.215.122.241'),
('54.87.204.226'),
('185.81.157.18'),
('173.252.88.86'),
('49.149.146.35'),
('94.23.169.94'),
('66.102.6.82'),
('207.46.13.204'),
('95.167.25.202'),
('86.106.45.131'),
('95.154.80.154'),
('212.20.33.46'),
('36.79.132.126'),
('78.36.92.176'),
('207.46.13.202'),
('207.46.13.57'),
('46.149.34.245'),
('66.102.6.80'),
('188.166.227.80'),
('207.46.13.194'),
('207.46.13.194'),
('157.55.39.216'),
('95.183.8.189'),
('112.198.69.2'),
('209.128.119.81'),
('112.198.78.75'),
('203.87.133.129'),
('112.209.159.197'),
('5.39.222.22'),
('203.215.121.123'),
('111.235.90.138'),
('111.235.90.138'),
('207.46.13.93'),
('95.213.184.35'),
('125.212.125.20'),
('180.190.91.235'),
('207.46.13.233'),
('203.215.121.171'),
('49.148.23.215'),
('124.106.134.138'),
('54.198.135.227'),
('50.31.252.38'),
('180.76.15.17'),
('180.76.15.153'),
('203.215.121.151'),
('128.199.132.65'),
('207.46.13.203'),
('207.46.13.87'),
('203.215.123.176'),
('64.246.161.30'),
('103.14.62.233'),
('180.76.15.143'),
('207.46.13.160'),
('180.76.15.141'),
('203.87.133.131'),
('203.87.133.133'),
('::1'),
('192.168.0.25'),
('192.168.0.32'),
('192.168.0.30');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `home_header_bg` text NOT NULL,
  `home_about_bg` text NOT NULL,
  `home_about_desc` text NOT NULL,
  `shop_banner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `home_header_bg`, `home_about_bg`, `home_about_desc`, `shop_banner`) VALUES
(1, 'homeheader.png', 'aboutus.jpg', 'CCS FAIR PROGRAM', '3.png');

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `contest_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `winner` varchar(40) NOT NULL,
  `winner_design_name` text NOT NULL,
  `winner_customer_id` int(11) NOT NULL,
  `winner_date_submitted` datetime NOT NULL,
  `winner_image` text NOT NULL,
  `winner_votes` int(11) NOT NULL,
  `z` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`contest_id`, `name`, `description`, `start_date`, `end_date`, `winner`, `winner_design_name`, `winner_customer_id`, `winner_date_submitted`, `winner_image`, `winner_votes`, `z`) VALUES
(1, 'Limitado Shirt Design Contest', 'Upload your shirt design or Customize your Shirt in our LIMITADO Shirt Customization to get a chance to have your design featured in our Online Shop. Join now!', '2016-08-18', '2016-09-22', '2', 'Limitado Shirt', 1, '2016-08-18 01:31:30', '5ZXQszPSwKvfO6jnLm8F.png', 0, 1),
(2, 'Limitado Tee Design Contest', 'asdasdasd', '2016-08-18', '2016-09-18', '', '', 0, '0000-00-00 00:00:00', '', 0, 0),
(3, 'Thesis ni Belo', '123\r\nlorem ipsum', '2016-08-18', '2016-08-04', '', '', 0, '0000-00-00 00:00:00', '', 0, 0),
(4, 'Thesis ni Belo 101', 'lorem ipsum', '2016-08-18', '2016-08-25', '', '', 0, '0000-00-00 00:00:00', '', 0, 0),
(5, 'Limitado Tee Design Contest', 'Get your Shirt design  a chance to be featured in our Limitado shop . Upload your design now or Use our Online Shirt Customization.  Try now!', '2016-08-27', '2016-09-27', '2', 'TADO SHIRT', 8, '2016-08-27 17:20:51', 'Sgp81rcAwGUbXC7d5aKq.png', 1, 1),
(6, 'Amplify Tee Design Contest', 'Get a chance to win the Amplify Tee Design Contest by uploading your own shirt design or by using our Limitado Shirt Customization web app. Try now!', '2016-08-27', '2016-09-27', '', '', 0, '0000-00-00 00:00:00', '', 0, 0),
(7, 'Tee Design Contest', 'This contest is a tribute for the concern citizens of the  Philippines', '2016-09-13', '2016-09-20', '2', 'saasdasa', 1, '2016-09-27 17:53:37', 'pGH8R1YQIOr9KkxMFEZn.png', 1, 1),
(8, 'Limitado Tee Design Contest', 'asdasdasdasdasdasdasdasdasd', '2016-09-28', '2016-10-28', '4', 'asdasdsada', 1, '2016-09-28 18:20:10', 'INT2ceE4RjMtxQgs7Foa.png', 1, 1),
(9, 'Sample Contest', 'This is a sample Contest', '2016-10-09', '2016-10-16', '', '', 0, '0000-00-00 00:00:00', '', 0, 0),
(10, 'CCS FAIR DESIGN CONTEST', 'This is a CCS Fair design contest 2016', '2016-10-09', '2016-10-14', '', '', 0, '0000-00-00 00:00:00', '', 0, 0),
(11, 'Staff Contest', 'STAFF DESIGN CONTEST', '2016-10-10', '2016-10-16', '', '', 0, '0000-00-00 00:00:00', '', 0, 0),
(12, 'CCS Fair Tee Design Contest', 'Upload or Customize your shirt design now and be the lucky winner to win the first ever CCS Fair Tee Design Contest. Its just easy you can upload your own design or you can use our Exclusive Interactive 2D Shirt Customizer. Join now !', '2016-10-14', '2016-10-21', '', '', 0, '0000-00-00 00:00:00', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contest_status`
--

CREATE TABLE `contest_status` (
  `contest_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest_status`
--

INSERT INTO `contest_status` (`contest_id`, `status`) VALUES
(12, 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `middle_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `status_key` varchar(40) NOT NULL,
  `vote_status` int(11) NOT NULL,
  `design_voted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `contact`, `gender`, `status`, `status_key`, `vote_status`, `design_voted`) VALUES
(1, 'imnii@outlook.com', '123456', 'Isabelo', 'Manuel', 'Nicolas', '09176926361', 'Male', 1, '3wqcenz48Dm07xIRPlFj', 1, 9),
(2, 'bascoangelo@gmail.com', '123456', 'Angelo', 'Cortez', 'Basco', '09275354581', 'Male', 1, '57a2701092f16', 0, 0),
(3, 'jimenezdiosakatrina@gmail.com', 'kagamine', 'Diosa', 'Segovia', 'Jimenez', '', '', 1, 'n28CEIGXmNsgHpOaPoRF', 0, 0),
(4, 'jimenezdisoakatrina@gmail.com', 'kagamine', 'Diosa', 'Segovia', 'Jimenez', '', '', 1, 'oGVjY2FaO3nBJqd8KTWI', 0, 0),
(5, 'daniella_sanchez29@icloud.com', 'asdasdasd', 'Daniella', 'Abalos', 'Sanchez', '', '', 1, 'czltNaS35mvCdIQjYfqW', 0, 0),
(6, 'daniella_sanchez29@yahoo.com', 'asdasd', 'Daniella', 'Abalos', 'Sanchez', '', '', 1, 'PpVx71tefLAJYOWQ0IqT', 0, 0),
(7, 'daniella_sanchez123@yahoo.com', 'asd', 'Daniella', 'Abalos', 'Sanchez', '', '', 1, 'TjIUBofsxaw9GphqENHC', 0, 0),
(8, 'geeann1227@gmail.com', '1012181227', 'Gee', 'M', 'Lopez', '', '', 1, 'KGiM0ubOFectXzj8vfsS', 0, 0),
(9, 'fritzmateo123@gmail.com', 'asdasd', 'Hehe', 'Hihi', 'Huhu', '', '', 1, 'gJ2UsIB4AP0x6mfbHurQ', 0, 0),
(10, 'brainequidasol@gmail.com', '123456', 'Pogi', 'Pogi', 'Pogi', '0999999999', 'Male', 1, 'Rgc0VmLqN3kOiUMEDdCT', 0, 0),
(11, 'ezekiel201997@gmail.com', '4542849', 'Eze Kiel', 'Polido', 'Rosales', '', '', 1, 'vtb73p0ndhgYcmx5s4Ry', 0, 0),
(12, 'marieldeuna07@gmail.com', '09464431595', 'Andrea Mariel', 'Escario', 'Deuna', '', '', 0, 'eKC1jsBNayfQPZYUknxJ', 0, 0),
(13, 'redred972@gmail.com', 'Lesliemae1', 'dodong', 'dodong', 'dodong', '', '', 0, 'bNSZFBAP1XhQ4MRxtEl7', 0, 0),
(14, 'nanaymo@gmail.com', 'SupotKaBelo', 'Nanay', 'mo', 'Supot', '', '', 0, 'wS45oClQMhKLGyDRZn39', 0, 0),
(15, 'hahahh@yahoo.com', 'password', 'oy paturo naman ako php', 'hahaha', 'hahaha', '', '', 1, 'hsduW6R35y4DEOCVfvkJ', 0, 0),
(16, 'Alger_sison@yahoo.com', '1234567', 'Dexter', 'Teopsss', 'Teope', '', '', 0, 'Etj2hmlrg4xN1ySPXM3v', 0, 0),
(17, 'medyobadboy94@gmail.com', 'qazwsxedc', 'POgi', 'Maganda', 'Popoy', '', '', 0, 'vJ1qUF3YxVty4EHZhQMS', 0, 0),
(18, 'asdasdasd@gmail.com', '123456', 'asdasdasd', 'asdasdasd', 'asdasdasd', '', '', 0, '256JAIgBZwEVsdiNQvY7', 0, 0),
(19, 'jashreeeeeeee@gmail.com', '123456', 'Jashree', 'Labial', 'Yu', '', '', 1, 'XptWgVJnHLe1yUxhmaqO', 0, 0),
(20, 'jcbidaure@gmail.com', '123456', 'Joshua', 'Eusebio', 'Bidaure', '09213948933', 'Male', 0, 'So2JqCz4RLEN1iI7aybe', 0, 0),
(21, 'radeguzmanii@feu-eac.edu.ph', '123456', 'Romeo', 'Artoo', 'Omen', '09063894536', 'Male', 0, '57fd0e7c6048b', 0, 0),
(22, 'sample@sample.com', '123456', 'Romeo', 'Arrzaola', 'de guzman', '09063894536', 'Male', 0, '57fd106c4781b', 0, 0),
(25, 'alasmedia4@gmail.com', '123456', 'Alina', 'Uy', 'Pineda', '', '', 1, 'o4SvN9FXfckLVjYMy3hH', 0, 0),
(26, 'gerald.terencio@gmail.com', 'abcdefg', 'Gerald', 'Tan', 'Terencio', '09321741719', 'Male', 0, '5801aa43824f7', 0, 0),
(27, 'joshuabidaure@yahoo.com', 'abcdefg', 'Gerald', 'Tan', 'Terencio', '09321741719', 'Male', 0, '5801aab4e2638', 0, 0),
(28, 'wdabtrain@gmail.com', 'password123', 'hello', 'world', 'nigga', '', '', 1, 'CN12bLO5dlxTz6hvWfqU', 0, 0),
(29, 'dejesuskaiser@gmail.com', 'password', 'practic', 'test', 'test', '', '', 1, 'xyoPa7KBv8gHYum1Ge2l', 0, 0),
(30, 'zoren024@gmail.com', 'azd24123', 'Adrian Zoren', 'Columna', 'Dumadapat', '', '', 1, 'whfETxRdFHuo06iXIeyP', 0, 0),
(31, 'test@email.com', 'test', 'Joana', 'kurimao', 'Paeste', '', '', 1, 'JKpq731otQuhjRsnbXrd', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customization_logos`
--

CREATE TABLE `customization_logos` (
  `logo_id` int(11) NOT NULL,
  `logo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customization_logos`
--

INSERT INTO `customization_logos` (`logo_id`, `logo`) VALUES
(2, '6dbUiJcthTzaRjPfgE8v.png'),
(22, 'X4rVTRivql62ZNpsuHSt.png'),
(21, 'hrve4dE8QUsc1GtuzwD3.png'),
(20, 'vaBhLIYUQkb96245qtAG.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `message` text NOT NULL,
  `date_submitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `name`, `email`, `phone`, `message`, `date_submitted`) VALUES
(1, 'Angelo Basco', 'bascoangelo@gmail.com', '09275354581', 'skskcnxkzk', '2016-08-11 12:08:01'),
(2, 'Tadong tado', 'geraldterencio@gmail.com', '1234689', 'Paki ayos naman sir, medyo mahina pa haha ewwewewewewewewewewewewewewewewew', '2016-08-25 16:29:13'),
(3, 'Isabelo Nicolas II', 'imnii@outlook.com', '09166381192', 'urstxgzg gxychgx', '2016-08-27 10:57:44'),
(4, 'asdsadsad', 'asdsadsad@yahoo.com', '09123213', 'asdsadsadsadad', '2016-08-28 16:23:58'),
(5, 'Joshua Carl Bidaure', 'jcbidaure@gmail.com', '09204674789', 'GOOD JOB LIMITADO!', '2016-09-06 15:40:25'),
(6, 'Josah Bidaure', 'jcbidaure@gmail.com', '09213948933', 'I LOVE THE SHIRT! THANKS!', '2016-10-09 15:37:25'),
(7, 'Isabelo Nicolas II', 'imnii@outlook.com', '09166381192', 'Good Job!', '2016-10-12 00:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `address_map_link` text NOT NULL,
  `days_open` text NOT NULL,
  `store_hours` text NOT NULL,
  `contact_number` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `instagram` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `address`, `address_map_link`, `days_open`, `store_hours`, `contact_number`, `facebook`, `twitter`, `instagram`) VALUES
(1, 'Fort, 11th Ave, Taguig, Metro Manila\r\nLocated in: Bonifacio High Street', 'https://www.google.com.ph/maps?safe=active&rlz=1C1CHBF_enPH781PH781&q=italianni%27s+bgc&um=1&ie=UTF-8&sa=X&ved=0ahUKEwiYyZHQlILZAhVEW5QKHfZRAWUQ_AUICigB', 'Friday-Monday', '010:00pm - 9:00pm', '0912345678', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_in_online`
--

CREATE TABLE `inventory_in_online` (
  `product_id` int(11) NOT NULL,
  `xs` int(11) NOT NULL,
  `sm` int(11) NOT NULL,
  `md` int(11) NOT NULL,
  `lg` int(11) NOT NULL,
  `xl` int(11) NOT NULL,
  `xxl` int(11) NOT NULL,
  `xxxl` int(11) NOT NULL,
  `one` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_in_online`
--

INSERT INTO `inventory_in_online` (`product_id`, `xs`, `sm`, `md`, `lg`, `xl`, `xxl`, `xxxl`, `one`) VALUES
(14, 0, 0, 0, 0, 0, 0, 0, 2000),
(15, 0, 0, 0, 0, 0, 0, 0, 1000),
(16, 0, 0, 0, 0, 0, 0, 0, 500),
(17, 0, 0, 0, 0, 0, 0, 0, 600),
(19, 0, 0, 0, 0, 0, 0, 0, 1000),
(20, 0, 0, 0, 0, 0, 0, 0, 600),
(21, 0, 0, 0, 0, 0, 0, 0, 200),
(22, 0, 0, 0, 0, 0, 0, 0, 300),
(23, 0, 0, 0, 0, 0, 0, 0, 300),
(24, 0, 0, 0, 0, 0, 0, 0, 4000),
(25, 0, 0, 0, 0, 0, 0, 0, 300),
(26, 0, 0, 0, 0, 0, 0, 0, 400),
(27, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 0, 0, 0, 0, 0, 0, 0, 4000),
(29, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 0, 0, 0, 0, 0, 0, 0, 0),
(52, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 0, 0, 0, 0, 0, 0, 0, 0),
(58, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 0, 0, 0, 0, 0, 0, 0, 0),
(61, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 0, 0, 0, 0, 0, 0, 0, 0),
(63, 0, 0, 0, 0, 0, 0, 0, 0),
(64, 0, 0, 0, 0, 0, 0, 0, 0),
(65, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 0, 0, 0, 0, 0, 0, 0, 0),
(71, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 0, 0, 0, 0, 0, 0, 0, 0),
(78, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 0, 0, 0, 0, 0, 0, 0, 0),
(85, 0, 0, 0, 0, 0, 0, 0, 0),
(86, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 0, 0, 0, 0, 0, 0, 0, 0),
(93, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 0, 0, 0, 0, 0, 0, 0, 0),
(95, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_in_walkin`
--

CREATE TABLE `inventory_in_walkin` (
  `product_id` int(11) NOT NULL,
  `xs` int(11) NOT NULL,
  `sm` int(11) NOT NULL,
  `md` int(11) NOT NULL,
  `lg` int(11) NOT NULL,
  `xl` int(11) NOT NULL,
  `xxl` int(11) NOT NULL,
  `xxxl` int(11) NOT NULL,
  `one` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_in_walkin`
--

INSERT INTO `inventory_in_walkin` (`product_id`, `xs`, `sm`, `md`, `lg`, `xl`, `xxl`, `xxxl`, `one`) VALUES
(14, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 0, 0, 0, 0, 0, 0, 0, 0),
(52, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 0, 0, 0, 0, 0, 0, 0, 0),
(58, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 0, 0, 0, 0, 0, 0, 0, 0),
(61, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 0, 0, 0, 0, 0, 0, 0, 0),
(63, 0, 0, 0, 0, 0, 0, 0, 0),
(64, 0, 0, 0, 0, 0, 0, 0, 0),
(65, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 0, 0, 0, 0, 0, 0, 0, 0),
(71, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 0, 0, 0, 0, 0, 0, 0, 0),
(78, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 0, 0, 0, 0, 0, 0, 0, 0),
(85, 0, 0, 0, 0, 0, 0, 0, 0),
(86, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 0, 0, 0, 0, 0, 0, 0, 0),
(93, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 0, 0, 0, 0, 0, 0, 0, 0),
(95, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_out_online`
--

CREATE TABLE `inventory_out_online` (
  `product_id` int(11) NOT NULL,
  `xs` int(11) NOT NULL,
  `sm` int(11) NOT NULL,
  `md` int(11) NOT NULL,
  `lg` int(11) NOT NULL,
  `xl` int(11) NOT NULL,
  `xxl` int(11) NOT NULL,
  `xxxl` int(11) NOT NULL,
  `one` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_out_online`
--

INSERT INTO `inventory_out_online` (`product_id`, `xs`, `sm`, `md`, `lg`, `xl`, `xxl`, `xxxl`, `one`) VALUES
(14, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0, 0, 1),
(17, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 0, 0, 0, 1),
(20, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 0, 0, 0, 0, 0, 0, 0, 0),
(52, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 0, 0, 0, 0, 0, 0, 0, 0),
(58, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 0, 0, 0, 0, 0, 0, 0, 0),
(61, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 0, 0, 0, 0, 0, 0, 0, 0),
(63, 0, 0, 0, 0, 0, 0, 0, 0),
(64, 0, 0, 0, 0, 0, 0, 0, 0),
(65, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 0, 0, 0, 0, 0, 0, 0, 0),
(71, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 0, 0, 0, 0, 0, 0, 0, 0),
(78, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 0, 0, 0, 0, 0, 0, 0, 0),
(85, 0, 0, 0, 0, 0, 0, 0, 0),
(86, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 0, 0, 0, 0, 0, 0, 0, 0),
(93, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 0, 0, 0, 0, 0, 0, 0, 0),
(95, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_out_walkin`
--

CREATE TABLE `inventory_out_walkin` (
  `product_id` int(11) NOT NULL,
  `xs` int(11) NOT NULL,
  `sm` int(11) NOT NULL,
  `md` int(11) NOT NULL,
  `lg` int(11) NOT NULL,
  `xl` int(11) NOT NULL,
  `xxl` int(11) NOT NULL,
  `xxxl` int(11) NOT NULL,
  `one` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_out_walkin`
--

INSERT INTO `inventory_out_walkin` (`product_id`, `xs`, `sm`, `md`, `lg`, `xl`, `xxl`, `xxxl`, `one`) VALUES
(14, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 0, 0, 0, 0, 0, 0, 0, 0),
(52, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 0, 0, 0, 0, 0, 0, 0, 0),
(58, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 0, 0, 0, 0, 0, 0, 0, 0),
(61, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 0, 0, 0, 0, 0, 0, 0, 0),
(63, 0, 0, 0, 0, 0, 0, 0, 0),
(64, 0, 0, 0, 0, 0, 0, 0, 0),
(65, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 0, 0, 0, 0, 0, 0, 0, 0),
(71, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 0, 0, 0, 0, 0, 0, 0, 0),
(78, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 0, 0, 0, 0, 0, 0, 0, 0),
(85, 0, 0, 0, 0, 0, 0, 0, 0),
(86, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 0, 0, 0, 0, 0, 0, 0, 0),
(93, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 0, 0, 0, 0, 0, 0, 0, 0),
(95, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `invoice_id` varchar(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_type` varchar(40) NOT NULL,
  `order_status` varchar(40) NOT NULL,
  `payment_status` varchar(40) NOT NULL,
  `shipping_address` text NOT NULL,
  `date_ordered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `transaction_id`, `invoice_id`, `customer_id`, `payment_type`, `order_status`, `payment_status`, `shipping_address`, `date_ordered`) VALUES
(1, '48128276UV2142004', '212833', 8, 'PayPal', 'Shipped', 'Completed', 'Sample, Sample, Metro Manila, 91506, Philippines', '2016-08-27 17:31:00'),
(2, '84P024191C6882641', '138070', 1, 'PayPal', 'Shipped', 'Completed', 'Sample Street, Sample City, Sample State, 1900, Philippines', '2016-09-06 17:40:29'),
(3, '04Y858311F669022C', '394829', 1, 'PayPal', 'Shipped', 'Completed', 'Sample Street, Sample City, Sample State, 1900, Philippines', '2016-09-28 16:22:10'),
(4, '0V996191UB928471R', '697022', 1, 'PayPal', 'Shipped', 'Completed', 'Sample Street, Sample City, Sample State, 1900, Philippines', '2016-09-28 18:23:45'),
(5, '1YE10085BT972635D', '873085', 1, 'PayPal', 'Shipped', 'Completed', 'Sample Street, Sample City, Sample State, 1900, Philippines', '2016-10-05 17:17:44'),
(6, '4MD494240C529630R', '322377', 20, 'PayPal', 'Shipped', 'Completed', '357, Quezon City, Metro Manila, 1000, Philippines', '2016-10-09 15:35:10'),
(7, 'PAY-42591985HL895043FK76QQ5A', '31827691', 1, 'PayPal', 'Shipped', 'Completed', 'Sample Street Sample City Sample State 1900 Philippines', '2016-10-11 23:42:58'),
(8, '', '31', 31, 'PayPal', 'Shipped', '', '', '2018-02-23 16:55:40'),
(9, '', '31', 31, 'PayPal', 'Pending', '', '', '2018-02-23 19:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(40) NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`invoice_id`, `product_id`, `name`, `price`, `quantity`, `size`, `subtotal`) VALUES
(212833, 2, 'Sample Item 2', 500, 10, 'one', 5000),
(138070, 2, 'Sample Item 2', 500, 1, 'one', 500),
(394829, 1, 'Sample Item 1', 150, 1, 'one', 150),
(697022, 1, 'Sample Item 1', 150, 8, 'one', 1200),
(873085, 5, 'Sample Item 5', 400, 15, 'xxxl', 6000),
(322377, 6, 'Sample Item 6', 400, 1, 'xl', 400),
(31827691, 5, 'Sample Item 5', 400, 1, 'xs', 400),
(31, 16, 'Fresh Fruit SHake', 145, 1, 'one', 145),
(31, 19, 'Bottled Water', 90, 1, 'one', 90);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `type` varchar(40) NOT NULL,
  `sizing` varchar(40) NOT NULL,
  `color` varchar(40) NOT NULL,
  `price` float(12,2) NOT NULL,
  `status` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `type`, `sizing`, `color`, `price`, `status`, `description`, `image_path`) VALUES
(14, 'asdjfsakljf', 'Antipasto', 'One', 'blue', 123123.00, 'Active', 'slkdfasldkjfasklj', 'asdjfsakljf.jpg'),
(15, 'Freshly Squeezed Lemonada', 'Beverages', 'One', 'green', 125.00, 'Active', 'asfafa', 'Freshly_Squeezed_Lemonada.jpg'),
(16, 'Fresh Fruit SHake', 'Beverages', 'One', 'red', 145.00, 'Active', 'Green Mango, Pineapple Ripe Mango, Watermelon', 'Fresh_Fruit_SHake.jpg'),
(17, 'Canned Soda', 'Beverages', 'One', 'blue', 95.00, 'Active', 'Coke, Coke Light, Coke Zero, Sprite, Royal', 'Canned_Soda.png'),
(19, 'Bottled Water', 'Beverages', 'One', 'white', 90.00, 'Active', 'Wilkins', 'Bottled_Water.jpg'),
(20, 'Bottomless Drink', 'Beverages', 'One', 'blue', 95.00, 'Active', 'Premium Iced Tea, Dalandan', 'Bottomless_Drink.png'),
(21, 'Coffee Americano', 'Beverages', 'One', 'black', 90.00, 'Active', 'Americano', 'Coffee_Americano.jpg'),
(22, 'Coffee Espresso', 'Beverages', 'One', 'mocha', 90.00, 'Active', 'Espresso', 'Coffee_Espresso.jpg'),
(23, 'Coffee Decaf', 'Beverages', 'One', 'black', 95.00, 'Active', 'Decaf', 'Coffee_Decaf.jpg'),
(24, 'Cappuccino', 'Beverages', 'One', 'black', 120.00, 'Active', 'Cappuccino', 'Cappuccino.jpg'),
(25, 'Cafe Latte', 'Beverages', 'One', 'black', 120.00, 'Active', 'Cafe Latte', 'Cafe_Latte.jpg'),
(26, 'Cafe Mocha', 'Beverages', 'One', 'black', 120.00, 'Active', 'Cafe Mocha', 'Cafe_Mocha.jpg'),
(27, 'Nespresso Premium Coffee', 'Beverages', 'One', 'black', 140.00, 'Active', 'Premium Coffee', 'Nespresso_Premium_Coffee.jpg'),
(28, 'Hot Choco', 'Beverages', 'One', 'red', 120.00, 'Active', 'Hot Chocolate', 'Hot_Choco.jpg'),
(29, 'Hot Tea Earl Grey', 'Beverages', 'One', 'green', 90.00, 'Active', 'Earl Grey', 'Hot_Tea_Earl_Grey.jpg'),
(30, 'Hot Tea English Breakfast', 'Beverages', 'One', 'green', 90.00, 'Active', 'English Breakfast', 'Hot_Tea_English_Breakfast.jpg'),
(31, 'Hot Tea Pure Camomile', 'Beverages', 'One', 'green', 90.00, 'Active', 'Pure Camomile', 'Hot_Tea_Pure_Camomile.jpg'),
(32, 'Hot Tea Green Tea', 'Beverages', 'One', 'green', 90.00, 'Active', 'Green Tea', 'Hot_Tea_Green_Tea.jpg'),
(33, 'Spinach and Artichoke Formaggio', 'Antipasto', 'One', 'white', 595.00, 'Active', 'Spinach, artichokes and mushroom in a creamy blend of cheeses. Served with toasted garlic bread', 'Spinach_and_Artichoke_Formaggio.jpg'),
(34, 'Shrimp Aglio', 'Antipasto', 'One', 'white', 545.00, 'Active', 'Sauteed shrimps in olive oil, garlic, black olives, and cherry tomatoes', 'Shrimp_Aglio.jpg'),
(35, 'Fried Calamari', 'Antipasto', 'One', 'white', 680.00, 'Active', 'Lightly coated with seasoned flour then fried. Served with homemade marinara sauce', 'Fried_Calamari.jpg'),
(36, 'Italiannis Fritti', 'Antipasto', 'One', 'white', 425.00, 'Active', 'Deep fried sticks of mozzarella, served with marinara dip', 'Italiannis_Fritti.jpg'),
(37, 'Toasted Ravioli', 'Antipasto', 'One', 'white', 595.00, 'Active', 'Cheese filled ravioli drizzled with marinara sauce and basil pesto', 'Toasted_Ravioli.jpg'),
(38, 'Italian Truffle Fries', 'Antipasto', 'One', 'white', 330.00, 'Active', 'Crispy potato chips drizzled with truffle cream dressing. Served with truffle mayo dip', 'Italian_Truffle_Fries.JPG'),
(39, 'Prosciutto e Formaggio', 'Antipasto', 'One', 'white', 695.00, 'Active', 'Four of the best that Italy has to offer in a plate', 'Prosciutto_e_Formaggio.jpg'),
(40, 'Stuffed Mushrooms', 'Antipasto', 'One', 'white', 575.00, 'Active', 'Oven roasted mushroom caps stuffed with Italian sausage', 'Stuffed_Mushrooms.jpg'),
(41, 'Clams De Manille', 'Antipasto', 'One', 'white', 515.00, 'Active', 'Fresh manila clams sauteed in white wine, olive oil and butter', 'Clams_De_Manille.jpg'),
(42, 'Caesar Salad', 'Insalate', 'One', 'green', 575.00, 'Active', 'Romaine lettuce tossed in house Caesar dressing and topped with focaccia croutons', 'Caesar_Salad.jpg'),
(43, 'Sicilian Salad', 'Insalate', 'One', 'white', 695.00, 'Active', 'Romaine, mangoes, red grapes and walnuts tossed in creamy anchovy dressings', 'Sicilian_Salad.JPG'),
(44, 'Insalata Rucola', 'Insalate', 'One', 'white', 650.00, 'Active', 'Romaine, Arugula, cherry tomatoes, walnuts, feta cheese and parmesan cheese tossed in balsamic vinaigrette dressing', 'Insalata_Rucola.jpg'),
(45, 'New York Cheesecake', 'Dolce', 'One', 'yellow', 425.00, 'Active', 'Classic New York Style cheesecake. Served on a bad of strawberry amaretto sauce', 'New_York_Cheesecake.JPG'),
(46, 'Tartufo', 'Dolce', 'One', 'white', 425.00, 'Active', 'Three layered chocolate cake with dark and white chocolate mousse covered with fudgy frosting', 'Tartufo.jpg'),
(47, 'Tiramisu', 'Dolce', 'One', 'white', 325.00, 'Active', 'An Italian classic. Made with mascarpone, lady finger espresso and topped with candied orange zest', 'Tiramisu.jpg'),
(48, 'Strawberry Cheesecake', 'Dolce', 'One', 'white', 375.00, 'Active', 'Cheesecake with strawberry swirl, amaretto cream sauce', 'Strawberry_Cheesecake.jpg'),
(49, 'Panna Cotta', 'Dolce', 'One', 'white', 295.00, 'Active', 'Freshly made Italian cooked cream served with sauce and topped with roasted walnuts', 'Panna_Cotta.jpg'),
(50, 'Creme Brulee', 'Dolce', 'One', 'white', 295.00, 'Active', 'Custard topped with burnt sugar, mango and cream', 'Creme_Brulee.jpg'),
(51, 'Chocolate Cheesecake', 'Dolce', 'One', 'white', 395.00, 'Active', 'Creamy chocolate cheesecake baked on Oreo crust', 'Chocolate_Cheesecake.jpg'),
(52, 'Herb Pork Chop With Garlic Rice', 'Lunch Deals', 'One', 'white', 375.00, 'Active', 'Herb Pork Chop', 'Herb_Pork_Chop_With_Garlic_Rice.jpg'),
(53, 'Beef Roast Melt with Garlic Rice', 'Lunch Deals', 'One', 'white', 425.00, 'Active', 'Beef Roast Melt', 'Beef_Roast_Melt_with_Garlic_Rice.jpg'),
(54, 'Ribs and Spaghetti Pomodoro', 'Lunch Deals', 'One', 'white', 425.00, 'Active', 'Ribs and Spaghetti', 'Ribs_and_Spaghetti_Pomodoro.jpg'),
(55, 'Prosciutto and Chicken', 'Light and Easy Sandwich', 'One', 'white', 375.00, 'Active', 'Prosciutto and chicken', 'Prosciutto_and_Chicken.jpg'),
(56, 'Salami and Olives', 'Light and Easy Sandwich', 'One', 'white', 375.00, 'Active', 'Salami and Olives', 'Salami_and_Olives.jpg'),
(57, 'Smoked Salmon', 'Light and Easy Sandwich', 'One', 'white', 375.00, 'Active', 'Smoked Salmon', 'Smoked_Salmon.jpg'),
(58, 'Create your own Pizza', 'Beverages', 'One', 'white', 225.00, 'Active', 'Create and Design your own pizza!', 'Create_your_own_Pizza.jpg'),
(59, 'Pasta and Chicken Fingers', 'Bambino', 'One', 'white', 350.00, 'Active', 'Pasta and chicken fingers', 'Pasta_and_Chicken_Fingers.jpg'),
(60, 'Mac And Cheese', 'Bambino', 'One', 'yellow', 250.00, 'Active', 'Mac and Cheese', 'Mac_And_Cheese.jpg'),
(61, 'Spaghetti', 'Bambino', 'One', 'red', 250.00, 'Active', 'Spaghetti', 'Spaghetti.jpeg'),
(62, 'Herb Roasted Chicken', 'DellaCucina', 'One', 'orange', 595.00, 'Active', 'Roasted half chicken with Italians herbs, chicken sauce and sauteed vegetables', 'Herb_Roasted_Chicken.jpg'),
(63, 'Crispy Pork Ribs', 'DellaCucina', 'One', 'yellow', 575.00, 'Active', 'Deep fried pork ribs marinated in Italian spices. Served with Italian fried rice', 'Crispy_Pork_Ribs.jpg'),
(64, 'Braised beef', 'DellaCucina', 'One', 'red', 695.00, 'Active', 'Slow roasted short plate served with creamy mushroom sauce, mashed potato and sauteed vegetables.', 'Braised_beef.JPG'),
(65, 'Chicken Italiannis', 'DellaCucina', 'One', 'red', 620.00, 'Active', 'Chicken sauteed in white wine, Italian sausage, white onion and red bell pepper', 'Chicken_Italiannis.jpg'),
(66, 'Tender Barbecue Rib Plate', 'DellaCucina', 'One', 'red', 545.00, 'Active', 'Served with Italian fried rice, Slow cooked oven baked back ribs flavored with house ribs sauce', 'Tender_Barbecue_Rib_Plate.jpg'),
(67, 'Chicken Parmigiana', 'DellaCucina', 'One', 'red', 675.00, 'Active', 'Parmesan crusted chicken topped with melted mozzarella. Served with spaghetti marinara', 'Chicken_Parmigiana.jpeg'),
(68, 'Grilled pork chop au poivre', 'DellaCucina', 'One', 'red', 725.00, 'Active', 'Grilled peppercrusted pork chops over a medley of rosemary potatoes, carrots and wild mushrooms', 'Grilled_pork_chop_au_poivre.jpg'),
(69, 'Chicken Milanese', 'DellaCucina', 'One', 'white', 525.00, 'Active', 'Grilled chicken breasts in spinach gorgonzola cream sauce. Topped with tomato balsamic relish', 'Chicken_Milanese.jpg'),
(70, 'RIBS RIBS RIBS', 'DellaCucina', 'One', 'RED', 695.00, 'Active', 'Up to 1,200kg baby back ribs. Slow cooked oven backed back ribs flavored with house ribs sauce', 'RIBS_RIBS_RIBS.jpg'),
(71, 'Pepperoni', 'Pizza', 'One', 'red', 545.00, 'Active', 'Imported pepperoni, white onion, mozzarella, and arugula', 'Pepperoni.jpg'),
(72, 'Pepperoni', 'Pizza', 'One', 'red', 545.00, 'Active', 'Imported pepperoni, white onion, mozzarella, and arugula', 'Pepperoni1.jpg'),
(73, 'Tropicale', 'Pizza', 'One', 'red', 575.00, 'Active', 'Bacon, pine ham, pineapple, and mozzarella cheese', 'Tropicale.jpg'),
(74, 'Margherita', 'Pizza', 'One', 'red', 545.00, 'Active', 'Tomato sauce, basil, mozzarella cheese, and taleggio', 'Margherita.jpg'),
(75, 'Quattro Formaggio', 'Pizza', 'One', 'red', 625.00, 'Active', 'Four Italian cheese, gorgonzola, parmesan cheese, mozzarella and taleggio', 'Quattro_Formaggio.jpg'),
(76, 'Quattro Carne', 'Pizza', 'One', 'red', 645.00, 'Active', 'All time favorite in one special four meat pizza', 'Quattro_Carne.jpg'),
(77, 'Quattro Staggioni', 'Pizza', 'One', 'red', 645.00, 'Active', 'Four Flavored pizza, pepperoni, mushroom and artichokes, shrimps and black olives and all cheese topped', 'Quattro_Staggioni.jpg'),
(78, 'Classico', 'Pizza', 'One', 'red', 545.00, 'Active', 'Italian sausage, mushroom, peppers, mozzarella and parmesan', 'Classico.jpg'),
(79, 'Smoke Salmon and Dill', 'Pizza', 'One', 'red', 650.00, 'Active', 'Smoked salmon, cream cheese, onions and gorgonzola dill sause', 'Smoke_Salmon_and_Dill.jpg'),
(80, 'Pizza Enorme', 'Pizza', 'One', 'red', 695.00, 'Active', 'Perfect for 4 to 6 persons. 16 inches family pizza with 4 quarters, Pepperoni, Ham and Pineapple, shrimps mushrooms, and Garlic and Cheese', 'Pizza_Enorme.jpg'),
(81, 'USDA New York Strip', 'Bistecca', 'One', 'red', 1250.00, 'Active', 'Grilled to your liking. Served with creamy mushrooms sauce', 'USDA_New_York_Strip.jpg'),
(82, 'USDA Ribeye', 'Bistecca', 'One', 'red', 1495.00, 'Active', 'Fine grained steak with generous marbling, One of the most tender beef cuts', 'USDA_Ribeye.jpg'),
(83, 'Angel Mediterraneo', 'Pasta', 'One', 'white', 450.00, 'Active', 'Its a classic Italian dish sauteed in olive oil garlic tomatoes, black olives and artichokes', 'Angel_Mediterraneo.jpg'),
(84, 'Truffle Chicken and Mushrooms', 'Pasta', 'One', 'red', 595.00, 'Active', 'Fettuccine pasta in creamy truffle sauce topped grilled chicken', 'Truffle_Chicken_and_Mushrooms.jpg'),
(85, 'Four Cheese Penne', 'Pasta', 'One', 'white', 595.00, 'Active', 'Baked penne with blue cheese, parmesan, mozzarella, taleggio cheese and pancetta', 'Four_Cheese_Penne.jpg'),
(86, 'Penne with Italian sausage', 'Pasta', 'One', 'white', 575.00, 'Active', 'Penne sauteed with crispy pancetta and caramelized onions in creamy pesto sauce', 'Penne_with_Italian_sausage.png'),
(87, 'Seafood and Vegetables', 'DellaCucina', 'One', 'white', 595.00, 'Active', 'Steamed mussels, clams, salmon, white fish and calamari with onion, asparagus and lemon', 'Seafood_and_Vegetables.jpg'),
(88, 'Grilled pepper fish fillet', 'DellaCucina', 'One', 'white', 695.00, 'Active', 'Grilled white fish fillet seasoned with freshly cracked black pepper in tomato cream sauce. Served with spaghetti or mashed potato', 'Grilled_pepper_fish_fillet.jpg'),
(89, 'Seafood Risotto', 'Beverages', 'One', 'white', 745.00, 'Active', 'Salmon, Shrimps, and calamari sauteed in white wine and simmered in seafood arborio rice', 'Seafood_Risotto.jpeg'),
(90, 'Parmesan Crusted fish fillet', 'DellaCucina', 'One', 'white', 695.00, 'Active', 'White fillet coated with parmesan cheese breading. Served with mashed potatoes, sauteed vegetables and caper cream sauce', 'Parmesan_Crusted_fish_fillet.png'),
(91, 'Grilled Salmon Oreganato', 'DellaCucina', 'One', 'white', 795.00, 'Active', 'Perfectly grilled salmon fillet served with rosemary potatoes and sauteed vegetables', 'Grilled_Salmon_Oreganato.jpg'),
(92, 'Seafood Rice', 'DellaCucina', 'One', 'white', 575.00, 'Active', 'Italian rice with shrimp, fish, clams, calamari and mussels sauteed with white wine, garlic, onions, and bell peppers', 'Seafood_Rice.jpeg'),
(93, 'Caprese', 'Flat Bread Specialty', 'One', 'brown', 475.00, 'Active', 'Tomatoes, fresh mozzarella, basil in alfredo sauce', 'Caprese.jpg'),
(94, 'Rustico', 'Flat Bread Specialty', 'One', 'brown', 450.00, 'Active', 'Pancetta, creamy pesto and mozzarella. Topped with arugula and alfalfa', 'Rustico.png'),
(95, 'Shrimp and Chive with Marirose dressing', 'Flat Bread Specialty', 'One', 'brown', 495.00, 'Active', 'Prawn, creamy pesto sauce, mozzarella, spring onion, fresh dill and lemon wedge. Topped with matirose dressing, green apple and alfalfa', 'Shrimp_and_Chive_with_Marirose_dressing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`type`) VALUES
('Beverages'),
('Antipasto'),
('Zuppe'),
('Insalate'),
('Dolce'),
('Lunch Deals'),
('Light and Easy Sandwich'),
('Bambino'),
('Bistecca'),
('Flat Bread Specialty'),
('Pizza'),
('DellaCucina'),
('Pasta');

-- --------------------------------------------------------

--
-- Table structure for table `push_notifications`
--

CREATE TABLE `push_notifications` (
  `push_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_submitted` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `push_notifications`
--

INSERT INTO `push_notifications` (`push_id`, `message`, `date_submitted`) VALUES
(1, 'This is a sample notification.', '2016-08-03 21:18:59'),
(2, 'Bidaure weak', '2016-08-05 15:18:49'),
(3, 'From August 5 - August 31, free items for all!', '2016-08-05 15:19:27'),
(4, 'yquw', '2016-08-10 01:04:55'),
(5, 'hehe', '2016-08-14 11:27:04'),
(6, 'asdasd', '2016-08-18 01:37:09'),
(7, 'tangin', '2016-08-28 18:48:34'),
(8, 'tangina', '2016-08-28 18:48:39'),
(9, 'zxczxc', '2016-08-28 18:49:06'),
(10, 'asdasdasd', '2016-08-28 18:49:37'),
(11, 'THERE IS AN UPCOMING PROMO FOR THE CCS FAIR', '2016-10-09 16:47:58'),
(12, 'Testing', '2016-10-14 02:34:06'),
(13, 'Basco di ako makalog in sa mobile', '2016-10-14 02:34:46'),
(14, 'nagiging dalawa yung notif haha', '2016-10-14 02:35:12'),
(15, 'GUYS HELP .. HAHA', '2016-11-04 09:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `shirt_design`
--

CREATE TABLE `shirt_design` (
  `design_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date_submitted` datetime NOT NULL,
  `image` text NOT NULL,
  `votes` int(11) NOT NULL,
  `design_status` varchar(40) NOT NULL,
  `result` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shirt_design`
--

INSERT INTO `shirt_design` (`design_id`, `name`, `customer_id`, `date_submitted`, `image`, `votes`, `design_status`, `result`) VALUES
(7, 'Russel', 1, '2016-10-14 09:47:42', 'I1EtJVk4DXLwBWmoZhGv.png', 0, 'Approved', ''),
(8, 'GAYSHIT', 1, '2016-10-14 09:49:47', 'YEmFl8pNWaveBDTXIbkP.png', 0, 'Approved', ''),
(9, 'hellohellohello', 1, '2016-10-14 10:06:10', 'xH2yXlJwsgtTf3NMj0bk.jpg', 1, 'Approved', ''),
(10, 'qwerty', 1, '2016-10-14 11:40:59', 'KVIjmDJEbutcBF5in0Yd.png', 0, 'Approved', ''),
(11, 'hghghgh', 1, '2016-10-14 12:23:19', 'hUfXsxnPrRbJqM94CFQN.png', 0, 'Approved', ''),
(12, 'gggggggg', 1, '2016-10-14 13:19:41', 'R6FLq0S9jbh1Z5f8cwxD.png', 0, 'Approved', ''),
(13, '696969', 1, '2016-10-14 14:04:23', '9FRGstbuJEUPLHmakhMg.png', 0, 'Pending', ''),
(14, 'wow factor', 29, '2016-10-25 18:13:46', '6ABv04PDtRZSMaWg9fdX.png', 0, 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `middle_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `status`) VALUES
(1, 'diosaa', 'stewardesses', 'Diosa', 'Segovia', 'Jimenez', 'Active'),
(2, 'user1234', '123456', 'Dhana', 'asdf', 'Mansul', 'Active'),
(3, 'jebidaure', '123456', 'joshua', 'carl', 'bidaure', 'Active'),
(4, 'jcbids', '123456', 'joshua', 'eusebio', 'bidaure', 'Active'),
(5, 'master', 'master', 'master', 'master', 'master', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `stocks_online`
--

CREATE TABLE `stocks_online` (
  `product_id` int(11) NOT NULL,
  `xs` int(11) NOT NULL,
  `sm` int(11) NOT NULL,
  `md` int(11) NOT NULL,
  `lg` int(11) NOT NULL,
  `xl` int(11) NOT NULL,
  `xxl` int(11) NOT NULL,
  `xxxl` int(11) NOT NULL,
  `one` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks_online`
--

INSERT INTO `stocks_online` (`product_id`, `xs`, `sm`, `md`, `lg`, `xl`, `xxl`, `xxxl`, `one`) VALUES
(14, 0, 0, 0, 0, 0, 0, 0, 2000),
(15, 0, 0, 0, 0, 0, 0, 0, 1000),
(16, 0, 0, 0, 0, 0, 0, 0, 499),
(17, 0, 0, 0, 0, 0, 0, 0, 600),
(19, 0, 0, 0, 0, 0, 0, 0, 999),
(20, 0, 0, 0, 0, 0, 0, 0, 600),
(21, 0, 0, 0, 0, 0, 0, 0, 200),
(22, 0, 0, 0, 0, 0, 0, 0, 300),
(23, 0, 0, 0, 0, 0, 0, 0, 300),
(24, 0, 0, 0, 0, 0, 0, 0, 4000),
(25, 0, 0, 0, 0, 0, 0, 0, 300),
(26, 0, 0, 0, 0, 0, 0, 0, 400),
(27, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 0, 0, 0, 0, 0, 0, 0, 4000),
(29, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 0, 0, 0, 0, 0, 0, 0, 0),
(52, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 0, 0, 0, 0, 0, 0, 0, 0),
(58, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 0, 0, 0, 0, 0, 0, 0, 0),
(61, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 0, 0, 0, 0, 0, 0, 0, 0),
(63, 0, 0, 0, 0, 0, 0, 0, 0),
(64, 0, 0, 0, 0, 0, 0, 0, 0),
(65, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 0, 0, 0, 0, 0, 0, 0, 0),
(71, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 0, 0, 0, 0, 0, 0, 0, 0),
(78, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 0, 0, 0, 0, 0, 0, 0, 0),
(85, 0, 0, 0, 0, 0, 0, 0, 0),
(86, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 0, 0, 0, 0, 0, 0, 0, 0),
(93, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 0, 0, 0, 0, 0, 0, 0, 0),
(95, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stocks_walkin`
--

CREATE TABLE `stocks_walkin` (
  `product_id` int(11) NOT NULL,
  `xs` int(11) NOT NULL,
  `sm` int(11) NOT NULL,
  `md` int(11) NOT NULL,
  `lg` int(11) NOT NULL,
  `xl` int(11) NOT NULL,
  `xxl` int(11) NOT NULL,
  `xxxl` int(11) NOT NULL,
  `one` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks_walkin`
--

INSERT INTO `stocks_walkin` (`product_id`, `xs`, `sm`, `md`, `lg`, `xl`, `xxl`, `xxxl`, `one`) VALUES
(14, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 0, 0, 0, 0, 0, 0, 0, 0),
(52, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 0, 0, 0, 0, 0, 0, 0, 0),
(58, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 0, 0, 0, 0, 0, 0, 0, 0),
(61, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 0, 0, 0, 0, 0, 0, 0, 0),
(63, 0, 0, 0, 0, 0, 0, 0, 0),
(64, 0, 0, 0, 0, 0, 0, 0, 0),
(65, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 0, 0, 0, 0, 0, 0, 0, 0),
(71, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 0, 0, 0, 0, 0, 0, 0, 0),
(78, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 0, 0, 0, 0, 0, 0, 0, 0),
(85, 0, 0, 0, 0, 0, 0, 0, 0),
(86, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 0, 0, 0, 0, 0, 0, 0, 0),
(93, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 0, 0, 0, 0, 0, 0, 0, 0),
(95, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_book`
--
ALTER TABLE `address_book`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`contest_id`);

--
-- Indexes for table `contest_status`
--
ALTER TABLE `contest_status`
  ADD PRIMARY KEY (`contest_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customization_logos`
--
ALTER TABLE `customization_logos`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `push_notifications`
--
ALTER TABLE `push_notifications`
  ADD PRIMARY KEY (`push_id`);

--
-- Indexes for table `shirt_design`
--
ALTER TABLE `shirt_design`
  ADD PRIMARY KEY (`design_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `stocks_online`
--
ALTER TABLE `stocks_online`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `stocks_walkin`
--
ALTER TABLE `stocks_walkin`
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_book`
--
ALTER TABLE `address_book`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `contest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `customization_logos`
--
ALTER TABLE `customization_logos`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `push_notifications`
--
ALTER TABLE `push_notifications`
  MODIFY `push_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shirt_design`
--
ALTER TABLE `shirt_design`
  MODIFY `design_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
