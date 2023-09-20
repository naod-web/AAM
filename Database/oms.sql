-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 08:44 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `phone`, `email`, `password`, `status`) VALUES
(1, 'Gemechu Gadisa', 'Gemechu', '+251933851065', 'gemechugadisa819@gmail.com', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `annual_plan`
--

CREATE TABLE `annual_plan` (
  `id` int(15) NOT NULL,
  `audit_activities` varchar(255) NOT NULL,
  `Team` varchar(255) NOT NULL,
  `Year` year(4) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annual_plan`
--

INSERT INTO `annual_plan` (`id`, `audit_activities`, `Team`, `Year`, `Quantity`) VALUES
(2, 'Conduct Branch Audit', 'Branch Audit', 2022, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auditee`
--

CREATE TABLE `auditee` (
  `id` int(11) NOT NULL,
  `auditee` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditee`
--

INSERT INTO `auditee` (`id`, `auditee`) VALUES
(8, 'Finfine Branch'),
(9, 'HO '),
(10, 'Adama Branch');

-- --------------------------------------------------------

--
-- Table structure for table `auditee_response`
--

CREATE TABLE `auditee_response` (
  `id` int(99) NOT NULL,
  `auditee` varchar(255) NOT NULL,
  `Acceptance_Status` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `Resp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditee_response`
--

INSERT INTO `auditee_response` (`id`, `auditee`, `Acceptance_Status`, `action`, `Resp`) VALUES
(6, 'HO ', '', '', '<p>sdfghjkl</p>'),
(7, 'Tolina', 'Fully Rectified', '<p>sdfvbnm</p>', '<p>cvbnm,.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `auditor_justification`
--

CREATE TABLE `auditor_justification` (
  `id` int(99) NOT NULL,
  `auditor_justification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auditor_name`
--

CREATE TABLE `auditor_name` (
  `id` int(15) NOT NULL,
  `auditor_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditor_name`
--

INSERT INTO `auditor_name` (`id`, `auditor_name`) VALUES
(4, 'Mr. Addisu'),
(5, 'Geme');

-- --------------------------------------------------------

--
-- Table structure for table `audit_activities`
--

CREATE TABLE `audit_activities` (
  `id` int(11) NOT NULL,
  `audit_activities` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_activities`
--

INSERT INTO `audit_activities` (`id`, `audit_activities`) VALUES
(2, 'Conduct Branch Audit'),
(3, 'Special Investigation'),
(4, 'Conduct HO audit objects'),
(5, 'IT and System audit');

-- --------------------------------------------------------

--
-- Table structure for table `audit_program`
--

CREATE TABLE `audit_program` (
  `id` int(10) NOT NULL,
  `E_id` int(11) NOT NULL,
  `Objectives` varchar(200) NOT NULL,
  `Scope` varchar(200) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `total` int(255) NOT NULL,
  `Approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `audit_program_engagement`
--

CREATE TABLE `audit_program_engagement` (
  `id` int(99) NOT NULL,
  `m_id` int(99) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Assignment_date` date DEFAULT current_timestamp(),
  `S_date` date NOT NULL,
  `E_date` date NOT NULL,
  `checklist_number` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_program_engagement`
--

INSERT INTO `audit_program_engagement` (`id`, `m_id`, `Description`, `Assignment_date`, `S_date`, `E_date`, `checklist_number`) VALUES
(4, 24, '<p>sdfgvh</p>', NULL, '2022-04-06', '2022-04-07', 21);

-- --------------------------------------------------------

--
-- Table structure for table `audit_type`
--

CREATE TABLE `audit_type` (
  `id` int(11) NOT NULL,
  `audit_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_type`
--

INSERT INTO `audit_type` (`id`, `audit_type`) VALUES
(1, 'Branch Audit'),
(2, 'Corporate Audit'),
(3, 'HO Audit'),
(4, 'IT and System Audit'),
(5, 'Risk and Compliance'),
(6, 'card Banking Team');

-- --------------------------------------------------------

--
-- Table structure for table `cause`
--

CREATE TABLE `cause` (
  `id` int(99) NOT NULL,
  `cause` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cause`
--

INSERT INTO `cause` (`id`, `cause`) VALUES
(4, '<p>Add some causes</p>');

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `id` int(11) NOT NULL,
  `checklist_number` int(11) NOT NULL,
  `Operational_area` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `objective` varchar(100) NOT NULL,
  `risk` varchar(100) NOT NULL,
  `risk_level` varchar(200) NOT NULL,
  `expected_control` varchar(200) NOT NULL,
  `audit_approach` varchar(200) NOT NULL,
  `detail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`id`, `checklist_number`, `Operational_area`, `description`, `objective`, `risk`, `risk_level`, `expected_control`, `audit_approach`, `detail`) VALUES
(21, 1, 'Cash', 'branch auditing checklist', '1. assessing and evaluating IS 2. branch checklist', 'medium', 'Medium', 'fhjsklalllsk', 'ncmjjdka', 'jjkf');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` int(99) NOT NULL,
  `criteria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `criteria`) VALUES
(4, '<p>Add some criterias</p><p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `effect`
--

CREATE TABLE `effect` (
  `id` int(99) NOT NULL,
  `effect` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `effect`
--

INSERT INTO `effect` (`id`, `effect`) VALUES
(4, '<p>add some effect</p>');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `joining_date` date DEFAULT current_timestamp(),
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Active, 0 = Inactive',
  `user_role` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = USER, 1 = ADMIN, 2 = AUDITOR, 3 =TEAM LEADER, 4 = TEAM MANAGER '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='phone';

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `designation`, `phone`, `joining_date`, `email`, `username`, `password`, `status`, `user_role`) VALUES
(26, 'tola', 'USER', '0933851065', '0000-00-00', 'tt@cbo.com', 'tt', '1234', 0, 0),
(28, 'ads', 'TEAM LEADER', '09111111111', '2021-10-08', 'ads@gmail.com', 'ads', '12345', 0, 2),
(29, 'Abdi', 'TEAM LEADER', '3211111', '0000-00-00', 'abdi@gmail.com', 'gemeg', '123456', 0, 4),
(30, 'wh', 'AUDITOR', '0933851111', '0000-00-00', 'tt@cbo.com', 'ww', '12345', 0, 2),
(31, 'John', 'TEAM MANAGER', '1236987', '2021-08-11', 'jhn@gmail.com', 'jhn', '123456', 0, 3),
(34, 'Fayisa', 'TEAM LEADER', '963852741', '0000-00-00', 'adf@gmail.com', 'Fayisa', '123456', 0, 3),
(35, 'kk', 'USER', '12345678890', '0000-00-00', 'dsdsf@gmail.com', 'asfgfg', '12345', 0, 0),
(37, 'tigist', 'AUDITOR', '963', '0000-00-00', 'tigist@gmail.com', 'fghj', '123456', 0, 2),
(39, 'tola', 'USER', '+2519369987741', '0000-00-00', 'jtola@gmail.com', 'tole', '123456', 0, 0),
(40, 'Moti', 'AUDITOR', '+2519111111111', '0000-00-00', 'moti@gmail.com', 'motisha', '123456', 0, 2),
(50, 'Sena', 'USER', '+2519111111111', '0000-00-00', 'sena@gmail.com', 'sena@gmail.com', '123456', 1, 0),
(51, 'Zelalem', 'AUDITOR', '+25191122222', '0000-00-00', 'zelalem@gmail.com', 'zelalem@gmail.com', '123456', 1, 2),
(52, 'Tolina', 'USER', '+2519111111111', '0000-00-00', 'toli@gmail.com', 'toli@gmail.com', '123456', 1, 0),
(53, 'Chala', 'TEAM MANAGER', '+25193333333', '0000-00-00', 'chchala@gmail.com', 'chchala@gmail.com', '123456', 1, 3),
(54, 'Adisu  Kamsur', 'AUDITOR', '09333333', '0000-00-00', 'adika@gmail.com', 'Adisu', '123456', 1, 2),
(55, 'Bekele Tilahun', 'TEAM LEADER', '0923232313', '0000-00-00', 'bekelet@gmail.com', 'bektila', '123456', 1, 4),
(57, 'Tigist Obsa', 'ADMIN', '+25193333333', '0000-00-00', 'tigist@gmail.com', 'tigist', '123456', 1, 1),
(58, 'Gemechu Gadisa', 'ADMIN', '0933851065', '0000-00-00', 'gemechugadisa819@gmail.com', 'gemgadb', '123456', 1, 1),
(59, 'etana', 'USER', '+251911100908', '2021-10-13', 'etana@gmail.com', 'etaal', '123456', 1, 0),
(60, 'Adama', 'USER', '+25112221111', '2022-04-01', 'adama@gmail.com', 'adama', 'e10adc3949ba59abbe56e057f20f883e', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `finding_detail`
--

CREATE TABLE `finding_detail` (
  `id` int(11) NOT NULL,
  `E_id` int(11) NOT NULL,
  `Finding_number` int(11) NOT NULL,
  `Irregularity_description` varchar(100) NOT NULL,
  `Loss_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `finding_registration`
--

CREATE TABLE `finding_registration` (
  `id` int(11) NOT NULL,
  `E_id` int(11) NOT NULL,
  `auditee` varchar(100) NOT NULL,
  `Operational_area` varchar(100) NOT NULL,
  `Finding_number` int(11) NOT NULL,
  `Facts` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `criteria` varchar(5000) NOT NULL,
  `cause` varchar(5000) NOT NULL,
  `effect` varchar(3000) NOT NULL,
  `Internal_control` varchar(100) NOT NULL,
  `recommendation` varchar(255) NOT NULL,
  `Resp` varchar(200) NOT NULL,
  `auditor_justification` varchar(255) NOT NULL,
  `Acceptance_Status` varchar(100) NOT NULL,
  `auditor_name` int(100) NOT NULL,
  `Date` date DEFAULT current_timestamp(),
  `Action` varchar(100) NOT NULL,
  `Location` varchar(99) NOT NULL,
  `Approval` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forget_password`
--

CREATE TABLE `forget_password` (
  `id` int(11) NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `temp_key` varchar(200) CHARACTER SET latin1 NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forget_password`
--

INSERT INTO `forget_password` (`id`, `email`, `temp_key`, `created`) VALUES
(1, 'gemechugadisa819@gmail.com', '0928568fdae15703525b570050d06abd', '2021-10-11 03:19:03'),
(4, 'gemechugadisa819@gmail.com', 'a5c5d18d11ecb527f0144802b4881c77', '2021-10-11 05:05:16'),
(7, 'gemechugadisa819@gmail.com', 'fcd856e998c9eac97581811fc0e8907e', '2021-12-31 14:14:16'),
(13, 'gemechugadisa819@gmail.com', 'ed26e3cc5c01b2e4efb8954bca3af223', '2022-02-12 00:09:11'),
(14, 'gemechugadisa819@gmail.com', '9440882b0ac09a3a5a841c960a5eb167', '2022-02-12 05:20:17'),
(15, 'gemechugadisa819@gmail.com', '393e65571f4f38c1031d08ff007d7785', '2022-02-25 07:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `intro_letter`
--

CREATE TABLE `intro_letter` (
  `id` int(99) NOT NULL,
  `E_id` int(99) NOT NULL,
  `date` date NOT NULL,
  `reference` varchar(150) NOT NULL,
  `gene_by_tl` int(11) NOT NULL,
  `ch_tl` int(11) NOT NULL,
  `audit_type` varchar(150) NOT NULL,
  `auditee` int(11) NOT NULL,
  `auditor_name` int(99) NOT NULL,
  `detail` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intro_letter`
--

INSERT INTO `intro_letter` (`id`, `E_id`, `date`, `reference`, `gene_by_tl`, `ch_tl`, `audit_type`, `auditee`, `auditor_name`, `detail`) VALUES
(1, 2, '2022-01-21', 'AD11', 0, 0, '2', 8, 0, '<p>sdfghjkl</p>');

-- --------------------------------------------------------

--
-- Table structure for table `irregularity_type`
--

CREATE TABLE `irregularity_type` (
  `id` int(11) NOT NULL,
  `Irregularity_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `irregularity_type`
--

INSERT INTO `irregularity_type` (`id`, `Irregularity_type`) VALUES
(1, 'Cash shortage'),
(2, 'Insurance Expired'),
(3, 'No contract'),
(4, 'marriage certificate'),
(5, 'tax clearance');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(255) NOT NULL,
  `hostname` varchar(255) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `referer` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `datetime`, `ip`, `hostname`, `uri`, `agent`, `referer`, `domain`, `filename`, `method`, `data`) VALUES
(1, '2021-10-11 07:18:57', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(46, '2021-10-22 07:49:02', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(47, '2021-10-22 08:49:47', '::1', 'Gemechu', '/AMS/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(48, '2021-10-22 09:54:45', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=1234&login=Login'),
(49, '2021-10-22 10:57:07', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(50, '2021-10-22 12:32:51', '::1', 'Gemechu', '/AMS/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(51, '2021-10-22 12:35:23', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(52, '2021-10-22 12:35:51', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=1234&login=Login'),
(53, '2021-10-22 12:36:24', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=1234&login=Login'),
(54, '2021-10-22 12:43:25', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(55, '2021-10-22 12:44:17', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(56, '2021-10-22 12:45:38', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(57, '2021-10-22 12:48:12', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(58, '2021-10-22 13:06:40', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=1234&login=Login'),
(59, '2021-10-22 13:29:44', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=1234&login=Login'),
(60, '2021-10-22 13:34:55', '::1', 'Gemechu', '/AMS/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=1234&login=Login'),
(61, '2021-10-22 13:39:37', '::1', 'Gemechu', '/AMS/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=1234&login=Login'),
(62, '2021-10-22 13:45:52', '::1', 'Gemechu', '/AMS/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(63, '2021-10-22 14:00:46', '::1', 'Gemechu', '/AMS/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=1234&login=Login'),
(64, '2021-10-22 14:07:27', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=1234&login=Login'),
(65, '2021-10-22 14:07:58', '::1', 'Gemechu', '/AMS/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=1234&login=Login'),
(66, '2021-10-22 14:22:37', '::1', 'Gemechu', '/AMS/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=1234&login=Login'),
(67, '2021-10-22 15:30:16', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=1234&login=Login'),
(68, '2021-10-22 15:51:44', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(69, '2021-10-23 14:02:45', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=1234&login=Login'),
(70, '2021-10-23 14:07:41', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=1234&login=Login'),
(71, '2021-10-24 07:49:09', '::1', 'Gemechu', '/AMS/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=1234&login=Login'),
(72, '2021-10-24 07:52:03', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=1234&login=Login'),
(73, '2021-10-24 07:56:32', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(74, '2021-10-24 08:22:15', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(75, '2021-10-24 08:30:54', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=1234&login=Login'),
(76, '2021-10-24 08:38:01', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(77, '2021-10-24 12:22:26', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=1234&login=Login'),
(78, '2021-10-24 13:21:59', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=1234&login=Login'),
(79, '2021-10-24 13:39:41', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=1234&login=Login'),
(80, '2021-10-24 13:40:10', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=1234&login=Login'),
(81, '2021-10-25 03:29:46', '::1', 'Gemechu', '/AMS/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(82, '2021-10-25 08:21:07', '::1', 'Gemechu', '/AMS/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(83, '2021-10-25 08:30:22', '::1', 'Gemechu', '/AMS/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://localhost/AMS/index.php', 'localhost', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(84, '2021-10-25 09:05:58', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=1234&login=Login'),
(85, '2021-10-25 09:21:01', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=1234&login=Login'),
(86, '2021-10-25 09:23:38', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=1234&login=Login'),
(87, '2021-10-25 09:24:07', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(88, '2021-10-25 09:33:48', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(89, '2021-10-25 09:48:12', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(90, '2021-10-25 10:22:12', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(91, '2021-10-25 10:44:26', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(92, '2021-10-25 10:45:09', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(93, '2021-10-25 10:46:53', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(94, '2021-10-25 10:57:19', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(95, '2021-10-25 13:16:43', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(96, '2021-10-25 13:17:47', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(97, '2021-10-25 13:18:19', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(98, '2021-10-25 13:19:16', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(99, '2021-10-25 13:20:45', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(100, '2021-10-26 09:36:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(101, '2021-10-26 10:18:33', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(102, '2021-10-27 10:01:02', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(103, '2021-10-27 11:27:30', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(104, '2021-10-27 14:53:31', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(105, '2021-10-27 14:55:24', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(106, '2021-10-28 07:50:39', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(107, '2021-10-28 07:51:40', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(108, '2021-10-28 08:44:03', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(109, '2021-10-28 09:01:31', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=sena%40gmail.com&password=123456&login=Login'),
(110, '2021-10-28 09:02:32', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(111, '2021-10-28 14:36:03', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(112, '2021-10-28 15:00:17', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(113, '2021-10-29 11:12:56', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(114, '2021-10-29 12:23:09', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(115, '2021-10-29 13:16:11', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(116, '2021-10-29 13:25:24', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(117, '2021-10-29 13:25:57', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(118, '2021-10-29 13:26:32', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(119, '2021-10-29 13:27:27', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(120, '2021-10-29 14:22:54', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(121, '2021-10-29 14:30:24', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(122, '2021-10-29 14:43:04', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(123, '2021-10-29 15:01:37', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(124, '2021-10-29 15:39:10', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(125, '2021-10-29 15:39:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(126, '2021-10-29 15:49:26', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(127, '2021-10-30 07:52:35', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(128, '2021-10-30 09:19:02', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(129, '2021-10-30 09:27:08', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(130, '2021-10-30 09:45:57', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(131, '2021-11-01 09:19:33', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(132, '2021-11-01 11:11:00', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(133, '2021-11-02 09:03:31', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(134, '2021-11-02 09:28:16', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(135, '2021-11-02 09:43:30', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(136, '2021-11-02 12:03:04', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(137, '2021-11-02 12:03:27', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(138, '2021-11-02 12:19:21', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(139, '2021-11-02 12:21:47', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(140, '2021-11-02 13:07:18', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(141, '2021-11-02 13:45:34', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(142, '2021-11-02 13:48:02', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(143, '2021-11-02 13:48:55', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(144, '2021-11-03 05:21:47', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(145, '2021-11-03 05:32:55', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(146, '2021-11-03 05:44:07', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(147, '2021-11-03 11:06:51', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(148, '2021-11-03 11:10:52', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(149, '2021-11-03 11:14:15', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(150, '2021-11-03 12:40:04', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(151, '2021-11-03 12:46:09', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(152, '2021-11-03 12:58:04', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(153, '2021-11-03 13:05:29', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(154, '2021-11-03 13:11:56', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(155, '2021-11-03 13:37:48', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(156, '2021-11-03 13:38:15', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(157, '2021-11-04 03:41:16', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(158, '2021-11-04 03:42:26', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(159, '2021-11-04 03:44:49', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(160, '2021-11-04 03:48:37', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(161, '2021-11-04 03:56:08', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(162, '2021-11-04 03:56:42', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(163, '2021-11-04 04:02:56', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(164, '2021-11-04 04:03:27', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(165, '2021-11-04 04:25:41', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(166, '2021-11-04 04:29:58', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(167, '2021-11-04 06:44:49', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(168, '2021-11-04 07:09:17', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(169, '2021-11-04 07:23:39', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(170, '2021-11-04 07:36:08', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(171, '2021-11-04 07:37:20', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(172, '2021-11-04 07:42:00', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(173, '2021-11-04 07:43:15', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(174, '2021-11-04 07:48:35', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(175, '2021-11-04 07:49:43', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(176, '2021-11-04 08:11:07', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(177, '2021-11-04 08:11:26', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(178, '2021-11-04 08:11:56', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(179, '2021-11-04 11:32:14', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(180, '2021-11-04 11:33:12', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(181, '2021-11-04 19:12:39', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(182, '2021-11-04 19:32:26', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(183, '2021-11-04 19:43:27', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(184, '2021-11-04 20:06:47', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(185, '2021-11-04 20:10:13', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(186, '2021-11-05 07:06:21', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(187, '2021-11-05 11:42:01', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(188, '2021-11-05 12:19:08', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(189, '2021-11-05 12:34:50', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(190, '2021-11-05 13:14:58', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(191, '2021-11-06 08:13:20', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(192, '2021-11-06 08:13:49', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(193, '2021-11-06 08:23:15', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(194, '2021-11-06 09:47:11', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(195, '2021-11-09 08:01:37', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login');
INSERT INTO `log` (`id`, `datetime`, `ip`, `hostname`, `uri`, `agent`, `referer`, `domain`, `filename`, `method`, `data`) VALUES
(196, '2021-11-09 08:48:19', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(197, '2021-11-10 07:01:34', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(198, '2021-11-10 07:03:53', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(199, '2021-11-11 02:18:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(200, '2021-11-11 02:39:31', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(201, '2021-11-11 02:49:34', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(202, '2021-11-11 02:54:33', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(203, '2021-11-11 03:07:11', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(204, '2021-11-11 03:07:36', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(205, '2021-11-11 03:08:51', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(206, '2021-11-11 03:10:17', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(207, '2021-11-11 07:17:05', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(208, '2021-11-11 07:17:27', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(209, '2021-11-11 07:22:35', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(210, '2021-11-11 08:23:40', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(211, '2021-11-11 09:17:00', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(212, '2021-11-11 09:27:17', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(213, '2021-11-11 09:28:22', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(214, '2021-11-11 09:29:38', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(215, '2021-11-11 11:51:03', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(216, '2021-11-13 11:48:51', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(217, '2021-11-13 14:02:06', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(218, '2021-11-13 14:27:27', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(219, '2021-11-15 10:03:06', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(220, '2021-11-16 08:52:38', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(221, '2021-11-20 08:09:42', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(222, '2021-11-20 08:14:03', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(223, '2021-11-20 08:16:57', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(224, '2021-11-23 08:32:36', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(225, '2021-11-23 09:00:08', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(226, '2021-11-23 09:38:33', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(227, '2021-11-24 07:53:00', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(228, '2021-11-24 08:12:14', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(229, '2021-11-24 08:32:09', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(230, '2021-11-24 08:35:59', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(231, '2021-11-24 08:38:18', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(232, '2021-11-24 08:38:37', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(233, '2021-11-24 12:20:06', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(234, '2021-11-24 12:35:52', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(235, '2021-11-24 12:56:15', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(236, '2021-11-24 12:57:17', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(237, '2021-11-24 12:58:58', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(238, '2021-11-24 13:04:27', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(239, '2021-11-24 13:04:58', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(240, '2021-11-24 13:21:55', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(241, '2021-11-24 13:24:10', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(242, '2021-12-03 07:26:52', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(243, '2021-12-03 07:28:04', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(244, '2021-12-03 07:37:54', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(245, '2021-12-03 07:52:32', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(246, '2021-12-10 07:04:47', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(247, '2021-12-10 07:05:39', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(248, '2021-12-10 07:06:06', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(249, '2021-12-10 07:06:49', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(250, '2021-12-10 07:07:45', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(251, '2021-12-10 07:13:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(252, '2021-12-10 07:17:35', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(253, '2021-12-10 07:19:52', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(254, '2021-12-10 11:58:10', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(255, '2021-12-10 11:59:15', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(256, '2021-12-10 12:15:31', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(257, '2021-12-10 12:39:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(258, '2021-12-10 13:07:24', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(259, '2021-12-10 13:13:26', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(260, '2021-12-11 06:33:56', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(261, '2021-12-11 07:38:25', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(262, '2021-12-11 07:38:57', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(263, '2021-12-11 07:41:43', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(264, '2021-12-11 08:00:52', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(265, '2021-12-11 08:02:56', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(266, '2021-12-11 15:39:47', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(267, '2021-12-11 17:30:47', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(268, '2021-12-12 07:04:35', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(269, '2021-12-13 02:35:55', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(270, '2021-12-13 02:55:08', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(271, '2021-12-13 02:55:40', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(272, '2021-12-13 03:07:39', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(273, '2021-12-13 03:21:01', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(274, '2021-12-13 03:29:18', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(275, '2021-12-13 03:45:25', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(276, '2021-12-13 03:47:22', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(277, '2021-12-13 04:06:27', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(278, '2021-12-13 06:32:35', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(279, '2021-12-13 06:37:18', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(280, '2021-12-13 06:38:39', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(281, '2021-12-13 06:39:12', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(282, '2021-12-13 06:40:02', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(283, '2021-12-13 06:40:36', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(284, '2021-12-13 06:41:21', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(285, '2021-12-13 06:50:14', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(286, '2021-12-13 07:00:02', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(287, '2021-12-13 08:14:35', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(288, '2021-12-13 08:17:03', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(289, '2021-12-13 08:26:57', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(290, '2021-12-13 08:57:30', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(291, '2021-12-13 09:05:26', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(292, '2021-12-13 09:16:49', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(293, '2021-12-13 09:18:55', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(294, '2021-12-13 09:20:21', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(295, '2021-12-13 09:21:22', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(296, '2021-12-13 11:46:15', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(297, '2021-12-13 20:42:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(298, '2021-12-13 20:54:55', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(299, '2021-12-13 20:56:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(300, '2021-12-13 21:00:20', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(301, '2021-12-13 21:01:13', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(302, '2021-12-13 21:02:22', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(303, '2021-12-14 07:13:11', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(304, '2021-12-14 08:20:08', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(305, '2021-12-14 08:27:52', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(306, '2021-12-14 08:29:16', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(307, '2021-12-14 08:45:58', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(308, '2021-12-14 08:55:19', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(309, '2021-12-14 08:55:58', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(310, '2021-12-14 09:03:23', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(311, '2021-12-15 07:51:17', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(312, '2021-12-15 13:36:20', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(313, '2021-12-16 07:35:20', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(314, '2021-12-16 08:19:14', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(315, '2021-12-16 08:19:48', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(316, '2021-12-16 09:52:59', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(317, '2021-12-17 11:43:30', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(318, '2021-12-17 12:10:16', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(319, '2021-12-17 12:20:03', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(320, '2021-12-17 12:44:26', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(321, '2021-12-17 12:53:56', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(322, '2021-12-17 12:55:55', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(323, '2021-12-17 14:10:34', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(324, '2021-12-17 14:37:58', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(325, '2021-12-17 14:38:13', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(326, '2021-12-17 14:38:22', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(327, '2021-12-17 16:05:12', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(328, '2021-12-17 19:55:50', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(329, '2021-12-17 19:57:48', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(330, '2021-12-17 20:02:01', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(331, '2021-12-17 20:14:14', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(332, '2021-12-18 07:09:23', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(333, '2021-12-18 07:10:45', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(334, '2021-12-18 07:12:17', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(335, '2021-12-18 14:04:02', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(336, '2021-12-18 14:04:22', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(337, '2021-12-18 14:25:39', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(338, '2021-12-19 05:50:04', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(339, '2021-12-20 06:21:17', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(340, '2021-12-20 08:01:20', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(341, '2021-12-20 08:03:49', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(342, '2021-12-20 08:04:08', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(343, '2021-12-20 08:10:43', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(344, '2021-12-20 10:24:35', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(345, '2021-12-20 10:35:04', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login');
INSERT INTO `log` (`id`, `datetime`, `ip`, `hostname`, `uri`, `agent`, `referer`, `domain`, `filename`, `method`, `data`) VALUES
(346, '2021-12-20 10:36:19', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(347, '2021-12-20 10:37:01', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(348, '2021-12-20 10:38:06', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(349, '2021-12-20 10:38:18', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(350, '2021-12-20 10:41:54', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(351, '2021-12-20 10:46:40', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(352, '2021-12-20 10:49:41', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(353, '2021-12-20 11:06:10', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(354, '2021-12-20 11:08:27', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(355, '2021-12-20 20:13:19', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(356, '2021-12-20 20:17:15', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(357, '2021-12-20 20:18:28', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(358, '2021-12-20 21:04:24', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(359, '2021-12-20 21:45:15', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(360, '2021-12-20 21:54:51', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(361, '2021-12-20 22:46:26', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(362, '2021-12-21 06:08:57', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(363, '2021-12-21 08:04:43', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(364, '2021-12-21 08:05:25', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(365, '2021-12-21 08:33:50', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(366, '2021-12-21 09:09:02', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(367, '2021-12-21 09:11:13', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(368, '2021-12-21 09:19:11', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(369, '2021-12-21 11:33:20', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(370, '2021-12-21 11:42:56', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(371, '2021-12-21 12:12:37', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(372, '2021-12-21 12:17:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(373, '2021-12-21 12:58:13', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(374, '2021-12-21 19:40:06', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(375, '2021-12-21 19:44:10', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(376, '2021-12-21 20:25:48', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(377, '2021-12-21 20:26:39', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(378, '2021-12-21 20:34:31', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(379, '2021-12-22 07:36:41', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(380, '2021-12-22 12:14:48', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(381, '2021-12-22 12:23:09', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(382, '2021-12-22 12:40:01', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(383, '2021-12-22 12:49:47', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(384, '2021-12-22 12:52:58', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(385, '2021-12-22 12:55:35', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(386, '2021-12-22 12:58:37', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(387, '2021-12-22 13:03:13', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(388, '2021-12-22 13:19:28', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(389, '2021-12-23 05:30:45', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(390, '2021-12-23 05:52:28', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(391, '2021-12-23 06:51:18', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(392, '2021-12-23 06:58:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(393, '2021-12-23 06:59:53', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(394, '2021-12-23 07:06:06', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(395, '2021-12-23 07:08:15', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(396, '2021-12-23 07:12:09', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(397, '2021-12-23 07:19:43', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(398, '2021-12-23 07:45:57', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(399, '2021-12-23 08:49:19', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(400, '2021-12-23 08:52:29', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(401, '2021-12-23 08:53:17', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(402, '2021-12-23 08:56:12', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(403, '2021-12-23 09:34:25', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(404, '2021-12-23 12:16:33', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(405, '2021-12-23 12:51:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(406, '2021-12-23 12:52:35', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(407, '2021-12-23 13:57:38', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(408, '2021-12-23 14:13:25', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(409, '2021-12-23 14:16:22', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(410, '2021-12-23 14:17:02', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(411, '2021-12-23 14:17:20', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(412, '2021-12-23 14:21:36', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(413, '2021-12-23 14:22:14', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(414, '2021-12-23 14:23:27', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(415, '2021-12-23 14:45:30', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(416, '2021-12-23 14:51:03', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(417, '2021-12-23 14:53:23', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(418, '2021-12-23 21:02:41', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(419, '2021-12-24 06:08:28', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(420, '2021-12-24 06:12:34', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(421, '2021-12-24 06:13:11', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(422, '2021-12-24 06:17:32', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(423, '2021-12-24 08:44:09', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(424, '2021-12-24 08:53:09', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(425, '2021-12-24 09:03:15', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(426, '2021-12-26 06:10:39', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(427, '2021-12-27 06:25:27', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(428, '2021-12-27 06:31:04', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(429, '2021-12-27 06:37:29', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(430, '2021-12-27 08:29:27', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(431, '2021-12-27 08:55:36', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(432, '2021-12-27 09:38:40', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(433, '2021-12-27 12:03:36', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(434, '2021-12-27 13:16:00', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(435, '2021-12-28 07:24:43', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(436, '2021-12-28 07:28:02', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(437, '2022-01-03 07:23:04', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(438, '2022-01-04 07:53:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(439, '2022-01-04 08:16:40', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(440, '2022-01-04 08:18:29', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(441, '2022-01-04 08:21:16', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(442, '2022-01-04 11:27:52', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(443, '2022-01-10 06:08:58', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(444, '2022-01-10 06:09:31', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(445, '2022-01-10 06:22:47', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(446, '2022-01-11 16:17:15', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(447, '2022-01-11 16:20:29', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(448, '2022-01-12 09:11:17', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(449, '2022-01-13 07:14:57', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(450, '2022-01-13 09:50:19', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(451, '2022-01-13 13:43:51', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(452, '2022-01-13 13:46:48', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(453, '2022-01-13 14:29:00', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(454, '2022-01-13 14:35:16', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(455, '2022-01-14 07:54:16', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(456, '2022-01-14 08:31:15', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(457, '2022-01-14 08:39:44', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(458, '2022-01-14 08:50:28', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(459, '2022-01-14 08:52:14', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(460, '2022-01-14 09:10:31', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(461, '2022-01-14 12:19:42', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(462, '2022-01-14 14:32:01', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(463, '2022-01-15 04:32:20', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(464, '2022-01-15 06:52:00', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(465, '2022-01-15 07:06:25', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(466, '2022-01-15 07:07:15', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(467, '2022-01-15 08:26:01', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(468, '2022-01-17 06:24:58', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(469, '2022-01-17 07:54:08', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(470, '2022-01-18 08:22:37', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(471, '2022-01-20 14:34:29', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(472, '2022-01-21 05:52:49', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(473, '2022-01-21 05:54:30', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(474, '2022-01-22 06:20:36', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(475, '2022-01-24 07:42:01', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'http://ams.cbo.com/', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(476, '2022-01-24 07:59:56', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'http://ams.cbo.com/index.php', 'ams.cbo.com', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(477, '2022-01-27 09:07:58', '::1', 'Gemechu', '/AMS/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'http://localhost:8686/AMS/', 'localhost:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(478, '2022-01-28 12:14:44', '::1', 'Gemechu', '/ams/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'http://localhost:8080/ams/', 'localhost:8080', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(479, '2022-02-01 14:30:18', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(480, '2022-02-01 14:44:13', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36 Edg/97.0.1072.76', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(481, '2022-02-01 14:47:53', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(482, '2022-02-01 15:28:30', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(483, '2022-02-02 08:18:39', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'http://ams.cbo.com:8680/', 'ams.cbo.com:8680', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(484, '2022-02-02 09:28:02', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'http://ams.cbo.com:8680/', 'ams.cbo.com:8680', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(485, '2022-02-02 09:37:34', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'http://ams.cbo.com:8680/index.php', 'ams.cbo.com:8680', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(486, '2022-02-02 12:39:14', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'http://ams.cbo.com:8680/index.php', 'ams.cbo.com:8680', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(487, '2022-02-03 06:44:08', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.81 Safari/537.36', 'http://ams.cbo.com:8680/', 'ams.cbo.com:8680', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(488, '2022-02-05 07:16:54', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.81 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(489, '2022-02-07 09:03:36', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.81 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(490, '2022-02-07 09:52:06', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.81 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(491, '2022-02-08 09:55:16', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.81 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(492, '2022-02-09 13:47:10', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.81 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(493, '2022-02-10 08:57:24', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(494, '2022-02-10 09:01:00', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(495, '2022-02-10 09:25:09', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(496, '2022-02-11 08:28:27', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login');
INSERT INTO `log` (`id`, `datetime`, `ip`, `hostname`, `uri`, `agent`, `referer`, `domain`, `filename`, `method`, `data`) VALUES
(497, '2022-02-11 08:29:23', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(498, '2022-02-11 08:53:09', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(499, '2022-02-11 08:53:38', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(500, '2022-02-11 11:59:51', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(501, '2022-02-11 12:00:23', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(502, '2022-02-11 12:33:00', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(503, '2022-02-12 01:05:05', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(504, '2022-02-12 01:11:29', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(505, '2022-02-14 06:52:04', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(506, '2022-02-14 09:01:44', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(507, '2022-02-14 09:02:39', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(508, '2022-02-14 09:04:02', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(509, '2022-02-14 09:04:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(510, '2022-02-14 09:07:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(511, '2022-02-14 09:11:37', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(512, '2022-02-14 09:22:03', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(513, '2022-02-14 09:22:21', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(514, '2022-02-14 09:44:24', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(515, '2022-02-14 09:49:39', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(516, '2022-02-14 09:53:09', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(517, '2022-02-14 09:59:15', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(518, '2022-02-14 10:05:24', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(519, '2022-02-14 11:09:05', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(520, '2022-02-14 11:10:11', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(521, '2022-02-14 11:10:30', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(522, '2022-02-14 11:10:45', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(523, '2022-02-14 11:12:37', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(524, '2022-02-14 11:41:22', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(525, '2022-02-14 11:53:34', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(526, '2022-02-14 11:57:24', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(527, '2022-02-14 12:23:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(528, '2022-02-14 12:53:22', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(529, '2022-02-14 13:14:51', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(530, '2022-02-15 06:41:20', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(531, '2022-02-15 07:14:36', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(532, '2022-02-15 14:23:42', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(533, '2022-02-16 07:38:14', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(534, '2022-02-17 09:04:22', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(535, '2022-02-19 07:22:37', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(536, '2022-02-21 07:20:09', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(537, '2022-02-22 07:26:31', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(538, '2022-02-23 07:48:46', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(539, '2022-02-23 07:49:50', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(540, '2022-02-23 17:53:17', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(541, '2022-02-23 18:19:36', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(542, '2022-02-23 19:34:00', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(543, '2022-02-24 07:20:21', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(544, '2022-02-24 09:56:06', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(545, '2022-02-24 09:58:43', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=toli%40gmail.com&password=123456&login=Login'),
(546, '2022-02-24 11:56:46', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(547, '2022-02-24 16:59:29', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(548, '2022-02-25 08:22:56', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(549, '2022-02-25 08:30:28', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(550, '2022-02-25 09:05:19', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(551, '2022-03-02 12:06:09', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(552, '2022-03-02 12:06:55', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(553, '2022-03-15 19:22:56', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(554, '2022-03-20 12:39:17', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(555, '2022-03-20 15:28:27', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(556, '2022-03-20 15:33:11', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(557, '2022-03-20 15:34:35', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(558, '2022-03-20 15:35:02', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(559, '2022-03-20 15:35:31', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(560, '2022-03-20 15:35:56', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(561, '2022-03-20 15:38:50', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(562, '2022-03-24 06:00:33', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(563, '2022-03-25 06:26:52', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(564, '2022-04-01 07:54:24', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(565, '2022-04-01 08:15:12', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=gemechugadisa819%40gmail.com&password=123456&login=Login'),
(566, '2022-04-01 09:49:32', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login'),
(567, '2022-04-04 15:48:03', '127.0.0.1', 'ams.cbo.com', '/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', 'http://ams.cbo.com:8686/', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(568, '2022-04-04 15:56:29', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(569, '2022-04-04 16:06:34', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(570, '2022-04-06 13:32:59', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=jhn%40gmail.com&password=123456&login=Login'),
(571, '2022-04-06 13:43:30', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=adika%40gmail.com&password=123456&login=Login'),
(572, '2022-04-06 14:19:30', '127.0.0.1', 'ams.cbo.com', '/index.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', 'http://ams.cbo.com:8686/index.php', 'ams.cbo.com:8686', 'C:/xamppss/htdocs/AMS/index.php', 'POST', 'email=bekelet%40gmail.com&password=123456&login=Login');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_plan`
--

CREATE TABLE `monthly_plan` (
  `id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Approval` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monthly_plan`
--

INSERT INTO `monthly_plan` (`id`, `q_id`, `Start_date`, `End_date`, `Approval`) VALUES
(24, 51, '2022-02-22', '2022-02-23', '');

-- --------------------------------------------------------

--
-- Table structure for table `operational`
--

CREATE TABLE `operational` (
  `id` int(11) NOT NULL,
  `Operational_area` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operational`
--

INSERT INTO `operational` (`id`, `Operational_area`) VALUES
(1, 'Cash'),
(2, 'Management'),
(3, 'Loan'),
(4, 'Clerical');

-- --------------------------------------------------------

--
-- Table structure for table `policyregistration`
--

CREATE TABLE `policyregistration` (
  `id` int(11) NOT NULL,
  `FileName` varchar(30) NOT NULL,
  `department` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Location` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policyregistration`
--

INSERT INTO `policyregistration` (`id`, `FileName`, `department`, `description`, `Location`) VALUES
(20, 'NBE 2', 'Risk Compliance', 'crvtybunml', 'uplds/16122021010630kites.jpg'),
(22, 'NBE 11', 'Risk Compliance', 'sdf', 'uplds/17122021123235FL.docx'),
(25, 'NBE 2', 'IT', 'IS security guideline', 'uplds/1812202107113920211103123922_RTGS User Request Form.pdf'),
(26, 'NBE 1', 'Risk Compliance', 'cvfghj', 'uplds/23122021021350cisco.txt'),
(27, 'NBE 111', 'Risk Compliance', 'ghjk', 'uplds/14012022085114AWSA.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `policy_procedure`
--

CREATE TABLE `policy_procedure` (
  `id` int(11) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `application_area` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policy_procedure`
--

INSERT INTO `policy_procedure` (`id`, `document_name`, `application_area`, `description`) VALUES
(1, 'NBE ', 'IT and System - IS security', 'About IS security');

-- --------------------------------------------------------

--
-- Table structure for table `quarter_number`
--

CREATE TABLE `quarter_number` (
  `id` int(11) NOT NULL,
  `Quarter_number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quarter_number`
--

INSERT INTO `quarter_number` (`id`, `Quarter_number`) VALUES
(1, '1st quarter'),
(2, '2nd quarter'),
(3, '3rd quarter'),
(4, '4th quarter');

-- --------------------------------------------------------

--
-- Table structure for table `quarter_plan`
--

CREATE TABLE `quarter_plan` (
  `id` int(11) NOT NULL,
  `a_id` int(15) NOT NULL,
  `audit_type` varchar(255) NOT NULL,
  `auditee` varchar(255) NOT NULL,
  `Quarter_number` varchar(15) NOT NULL,
  `Approval` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quarter_plan`
--

INSERT INTO `quarter_plan` (`id`, `a_id`, `audit_type`, `auditee`, `Quarter_number`, `Approval`) VALUES
(51, 2, 'Branch Audit', 'Finfine Branch', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `quarter_summary`
--

CREATE TABLE `quarter_summary` (
  `id` int(99) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `serial` varchar(255) NOT NULL,
  `auditee` varchar(255) NOT NULL,
  `Irregularity_type` varchar(255) NOT NULL,
  `amt` int(99) NOT NULL,
  `total` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quarter_summary`
--

INSERT INTO `quarter_summary` (`id`, `date`, `serial`, `auditee`, `Irregularity_type`, `amt`, `total`) VALUES
(6, '2022-02-07', '1bylif', 'Finfine Branch', 'Cash shortage', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE `recommendation` (
  `id` int(99) NOT NULL,
  `recommendation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rectification`
--

CREATE TABLE `rectification` (
  `id` int(11) NOT NULL,
  `Rectification` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rectification`
--

INSERT INTO `rectification` (`id`, `Rectification`) VALUES
(1, 'Fully Rectified'),
(2, 'Partially Rectified'),
(3, 'Not Rectified');

-- --------------------------------------------------------

--
-- Table structure for table `report_summary`
--

CREATE TABLE `report_summary` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `intro` varchar(4500) NOT NULL,
  `objective` varchar(4500) NOT NULL,
  `methodology` varchar(4500) NOT NULL,
  `scope` varchar(255) NOT NULL,
  `technique` varchar(500) NOT NULL,
  `rating` int(11) NOT NULL,
  `summary` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_summary`
--

INSERT INTO `report_summary` (`id`, `date`, `intro`, `objective`, `methodology`, `scope`, `technique`, `rating`, `summary`) VALUES
(4, '2022-01-24', '<p>IT supports the financial and human capital governance of an organization more importantly it plays a significant role with respect to managing the organization Information Systems as the Information and Technological components of an organization are among the most important assets of the organization. A lack of appropriate governance over information stored, processed, or produced by IT systems can have a significant negative impact on the reputation of the organization.</p><p>In many organizations, there is a disconnect between Executive Management and IT due to the view that IT exists solely to deliver day-to-day IT services while overlooking the fact that alignment of organizational objectives and IT is more about governance and less about technology. Governance ensures alternatives are evaluated, execution is appropriately directed, and performance is monitored, and these same concepts apply to IT governance.</p><p>While effort is generally focused on the delivery of governance services, the IT component, in many cases, continues to be overlooked; however, with the continued increase in the speed of technological advancement, IT proliferation, and organizational dependence on IT, it is clear that why the IT audit activity should address this inherently high-risk area.</p><p>The IT audit activity is uniquely positioned and staffed within an organization to make significant contributions toward achievement of these objectives by providing assurance and consulting services related to organizational governance.</p><p>To this end, the IT audit team of Internal Audit Process of the Bank conducts this audit, IT GOVERENCE AND MANAGEMENT AUDIT, to assess whether the Information Technology governance of the bank supports the bank&rsquo;s strategies and objectives.</p><p>Therefore, this audit tries to investigate the level of alignment between IT and the bank&rsquo;s objective, how effective is the IT function to map its service towards the realization of the bank&rsquo;s objectives and correspondingly try to assess the means employed by the Bank&rsquo;s Executive Management to uncover the potential and limitations of IT. Thereby pass recommendation on the need for setting up appropriate &nbsp;&nbsp;&nbsp; IT Governance structure to inform, direct, manage, monitor and evaluate the activities of IT towards the achievement of the bank&rsquo;s objectives.&nbsp;</p>', '<p>The goal of IT AUDIT is to strength Internal Controls and helps the bank develop cost-effective solutions for addressing issues related to any threat that could compromise the Internal Controls and hence provide IT System assurance for Board of Management and Executive Management.</p><p>The&nbsp;objectives&nbsp;of IT Governance and Management Audit are to:&nbsp;</p><ul><li>to examine the existence of IT Governance structure,</li><li>to assess the adequacy of the bank&rsquo;s IT Governance structure and the degree of alignment and integration between bank&rsquo;s IT strategy and its business strategy,</li><li>to review the existence of monitoring and evaluation mechanism to evaluate IT &nbsp; strategy against corporate strategy,</li><li>to evaluate effectiveness of IT Governance structure on over sighting IT Management,</li><li>review&nbsp;the&nbsp;current&nbsp;level of&nbsp;IT services effectiveness,&nbsp;</li><li>to review the roles and responsibilities assigned to each team and also the horizontal interaction of the various team under IT,</li><li>suggest&nbsp;improvements, and lay down standards for&nbsp;future performance.</li></ul>', '<p>The approach for the execution of this audit consists of interviews with key employees, review of documents, inspections, examining and observing the application of controls proper implementation.</p>', 'As specified in the draft IT Audit and Assurance Guideline of the bank Auditing bank’s IT Governance and IT Management is one of the major roles and responsibilities of the team to examine the level of alignment and integration of the IT strategy with the', 'Due to the criticality information’s technology system and its components no samples are taken instead the all the of the operational systems and its components are covered in their audit activity', 2, '<p>IT Security Audit is evaluation of the effectiveness and efficiency of security controls implemented around the bank&rsquo;s Information System against the Security Policy and Procedures that are thought of designed to be in compliance to internal or regulatory requirements. And it is one of the duties and responsibilities of the IT Audit team to assess how strong the physical and logical access controls that are meant to save guard the bank&rsquo;s IT System.</p><p>This Information Technolog');

-- --------------------------------------------------------

--
-- Table structure for table `risk_control`
--

CREATE TABLE `risk_control` (
  `id` int(10) NOT NULL,
  `Risk_code` varchar(100) NOT NULL,
  `Control_name` varchar(150) NOT NULL,
  `Control_description` varchar(150) NOT NULL,
  `Control_objectives` varchar(255) NOT NULL,
  `Imp_criteria` varchar(150) NOT NULL,
  `Imp_area` varchar(150) NOT NULL,
  `Document` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `risk_level`
--

CREATE TABLE `risk_level` (
  `id` int(11) NOT NULL,
  `risk_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `risk_level`
--

INSERT INTO `risk_level` (`id`, `risk_level`) VALUES
(1, 'High/ Risky'),
(2, 'Medium'),
(3, 'low risk');

-- --------------------------------------------------------

--
-- Table structure for table `risk_list`
--

CREATE TABLE `risk_list` (
  `id` int(11) NOT NULL,
  `Risk_list` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `risk_list`
--

INSERT INTO `risk_list` (`id`, `Risk_list`) VALUES
(1, 'power fail');

-- --------------------------------------------------------

--
-- Table structure for table `risk_registration`
--

CREATE TABLE `risk_registration` (
  `id` int(11) NOT NULL,
  `Business_objective` varchar(100) NOT NULL,
  `Business_owner` varchar(150) NOT NULL,
  `Risk_list` varchar(150) NOT NULL,
  `Likely_hood` varchar(150) NOT NULL,
  `Risk_level` int(99) NOT NULL,
  `Impact_description` varchar(150) NOT NULL,
  `Control_list` varchar(150) NOT NULL,
  `Rect` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supporting_doc`
--

CREATE TABLE `supporting_doc` (
  `id` int(11) NOT NULL,
  `f_id` int(99) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `auditor_name` int(99) NOT NULL,
  `upload_time` time DEFAULT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`id`, `designation`) VALUES
(0, 'USER'),
(1, 'ADMIN/CHIEF AUDITOR'),
(2, 'AUDITOR'),
(3, 'TEAM MANAGER'),
(4, 'TEAM LEADER');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `Team` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `Team`) VALUES
(1, 'Branch Audit'),
(2, 'Corporate Audit'),
(3, 'HO Department Audit');

-- --------------------------------------------------------

--
-- Table structure for table `temp_team`
--

CREATE TABLE `temp_team` (
  `id` int(10) NOT NULL,
  `E_id` int(15) NOT NULL,
  `team_foun_date` date DEFAULT current_timestamp(),
  `Team_member` varchar(200) NOT NULL,
  `Auditor_in_charge` varchar(200) NOT NULL,
  `audit_type` varchar(255) NOT NULL,
  `auditee` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL COMMENT '1=Active, 0=Inactive',
  `Approval` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_team`
--

INSERT INTO `temp_team` (`id`, `E_id`, `team_foun_date`, `Team_member`, `Auditor_in_charge`, `audit_type`, `auditee`, `Description`, `status`, `Approval`) VALUES
(90, 4, '2022-04-06', 'Mr. Addisu', 'Mr. Addisu', 'Branch Audit', 'Finfine Branch', 'sdfg', NULL, ''),
(91, 4, '2022-04-06', 'Geme', 'Mr. Addisu', 'Branch Audit', 'Finfine Branch', 'sdfg', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `upld`
--

CREATE TABLE `upld` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `fname` text CHARACTER SET latin1 NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `fname`, `name`) VALUES
(2, '20211103123922_RTGS User Request Form.pdf', 'RTGS User Request Form.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `wbs`
--

CREATE TABLE `wbs` (
  `E_id` int(11) NOT NULL,
  `id` int(15) NOT NULL,
  `Task_name` varchar(200) NOT NULL,
  `S_date` date DEFAULT NULL,
  `E_date` date DEFAULT NULL,
  `Duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `annual_plan`
--
ALTER TABLE `annual_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditee`
--
ALTER TABLE `auditee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditee_response`
--
ALTER TABLE `auditee_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditor_justification`
--
ALTER TABLE `auditor_justification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditor_name`
--
ALTER TABLE `auditor_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_activities`
--
ALTER TABLE `audit_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_program`
--
ALTER TABLE `audit_program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `E_id` (`E_id`),
  ADD KEY `E_id_2` (`E_id`);

--
-- Indexes for table `audit_program_engagement`
--
ALTER TABLE `audit_program_engagement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `audit_type`
--
ALTER TABLE `audit_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cause`
--
ALTER TABLE `cause`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `effect`
--
ALTER TABLE `effect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finding_detail`
--
ALTER TABLE `finding_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `E_id` (`E_id`),
  ADD KEY `E_id_2` (`E_id`);

--
-- Indexes for table `finding_registration`
--
ALTER TABLE `finding_registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `E_id` (`E_id`),
  ADD KEY `auditor_name` (`auditor_name`),
  ADD KEY `Auditor_conclusion` (`auditor_justification`),
  ADD KEY `E_id_2` (`E_id`);

--
-- Indexes for table `forget_password`
--
ALTER TABLE `forget_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intro_letter`
--
ALTER TABLE `intro_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `irregularity_type`
--
ALTER TABLE `irregularity_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_plan`
--
ALTER TABLE `monthly_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `operational`
--
ALTER TABLE `operational`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policyregistration`
--
ALTER TABLE `policyregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy_procedure`
--
ALTER TABLE `policy_procedure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quarter_number`
--
ALTER TABLE `quarter_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quarter_plan`
--
ALTER TABLE `quarter_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `a_id` (`a_id`),
  ADD KEY `a_id_2` (`a_id`),
  ADD KEY `a_id_3` (`a_id`);

--
-- Indexes for table `quarter_summary`
--
ALTER TABLE `quarter_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rectification`
--
ALTER TABLE `rectification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_summary`
--
ALTER TABLE `report_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risk_control`
--
ALTER TABLE `risk_control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risk_level`
--
ALTER TABLE `risk_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risk_list`
--
ALTER TABLE `risk_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risk_registration`
--
ALTER TABLE `risk_registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Risk_level` (`Risk_level`),
  ADD KEY `Risk_level_2` (`Risk_level`);

--
-- Indexes for table `supporting_doc`
--
ALTER TABLE `supporting_doc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auditor_name` (`auditor_name`),
  ADD KEY `auditor_name_2` (`auditor_name`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_team`
--
ALTER TABLE `temp_team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `E_id` (`E_id`);

--
-- Indexes for table `upld`
--
ALTER TABLE `upld`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wbs`
--
ALTER TABLE `wbs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `E_id` (`E_id`),
  ADD KEY `E_id_2` (`E_id`),
  ADD KEY `E_id_3` (`E_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `annual_plan`
--
ALTER TABLE `annual_plan`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auditee`
--
ALTER TABLE `auditee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `auditee_response`
--
ALTER TABLE `auditee_response`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `auditor_justification`
--
ALTER TABLE `auditor_justification`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auditor_name`
--
ALTER TABLE `auditor_name`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `audit_activities`
--
ALTER TABLE `audit_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `audit_program`
--
ALTER TABLE `audit_program`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `audit_program_engagement`
--
ALTER TABLE `audit_program_engagement`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `audit_type`
--
ALTER TABLE `audit_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cause`
--
ALTER TABLE `cause`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `effect`
--
ALTER TABLE `effect`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `finding_detail`
--
ALTER TABLE `finding_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `finding_registration`
--
ALTER TABLE `finding_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `forget_password`
--
ALTER TABLE `forget_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `intro_letter`
--
ALTER TABLE `intro_letter`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `irregularity_type`
--
ALTER TABLE `irregularity_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=573;

--
-- AUTO_INCREMENT for table `monthly_plan`
--
ALTER TABLE `monthly_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `operational`
--
ALTER TABLE `operational`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `policyregistration`
--
ALTER TABLE `policyregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `policy_procedure`
--
ALTER TABLE `policy_procedure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quarter_number`
--
ALTER TABLE `quarter_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quarter_plan`
--
ALTER TABLE `quarter_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `quarter_summary`
--
ALTER TABLE `quarter_summary`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rectification`
--
ALTER TABLE `rectification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report_summary`
--
ALTER TABLE `report_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `risk_control`
--
ALTER TABLE `risk_control`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `risk_level`
--
ALTER TABLE `risk_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `risk_list`
--
ALTER TABLE `risk_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `risk_registration`
--
ALTER TABLE `risk_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supporting_doc`
--
ALTER TABLE `supporting_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temp_team`
--
ALTER TABLE `temp_team`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `upld`
--
ALTER TABLE `upld`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wbs`
--
ALTER TABLE `wbs`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_program`
--
ALTER TABLE `audit_program`
  ADD CONSTRAINT `audit_program_ibfk_1` FOREIGN KEY (`E_id`) REFERENCES `audit_program_engagement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `audit_program_engagement`
--
ALTER TABLE `audit_program_engagement`
  ADD CONSTRAINT `audit_program_engagement_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `monthly_plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `finding_detail`
--
ALTER TABLE `finding_detail`
  ADD CONSTRAINT `finding_detail_ibfk_1` FOREIGN KEY (`E_id`) REFERENCES `audit_program_engagement` (`id`);

--
-- Constraints for table `finding_registration`
--
ALTER TABLE `finding_registration`
  ADD CONSTRAINT `finding_registration_ibfk_1` FOREIGN KEY (`E_id`) REFERENCES `audit_program_engagement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `monthly_plan`
--
ALTER TABLE `monthly_plan`
  ADD CONSTRAINT `monthly_plan_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `quarter_plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quarter_plan`
--
ALTER TABLE `quarter_plan`
  ADD CONSTRAINT `quarter_plan_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `annual_plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `risk_registration`
--
ALTER TABLE `risk_registration`
  ADD CONSTRAINT `risk_registration_ibfk_1` FOREIGN KEY (`Risk_level`) REFERENCES `risk_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supporting_doc`
--
ALTER TABLE `supporting_doc`
  ADD CONSTRAINT `supporting_doc_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `finding_registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supporting_doc_ibfk_2` FOREIGN KEY (`auditor_name`) REFERENCES `auditor_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `temp_team`
--
ALTER TABLE `temp_team`
  ADD CONSTRAINT `temp_team_ibfk_1` FOREIGN KEY (`E_id`) REFERENCES `audit_program_engagement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wbs`
--
ALTER TABLE `wbs`
  ADD CONSTRAINT `wbs_ibfk_1` FOREIGN KEY (`E_id`) REFERENCES `audit_program_engagement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
