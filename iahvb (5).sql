-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2017 at 07:12 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iahvb`
--

-- --------------------------------------------------------

--
-- Table structure for table `disease_names`
--

CREATE TABLE `disease_names` (
  `id` int(20) NOT NULL,
  `disease_name` varchar(250) NOT NULL,
  `disease_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease_names`
--

INSERT INTO `disease_names` (`id`, `disease_name`, `disease_desc`) VALUES
(1, 'Maleria', 'Maleria'),
(2, 'Brucellosis', 'Brucellosis');

-- --------------------------------------------------------

--
-- Table structure for table `disease_suspected`
--

CREATE TABLE `disease_suspected` (
  `id` int(255) NOT NULL,
  `accession` varchar(100) NOT NULL,
  `sample_id` int(255) NOT NULL,
  `disease_suspected` varchar(255) NOT NULL,
  `lab_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease_suspected`
--

INSERT INTO `disease_suspected` (`id`, `accession`, `sample_id`, `disease_suspected`, `lab_id`) VALUES
(12, '1', 173, 'Maleria', ''),
(13, '1', 173, 'Brucellosis', '');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(255) NOT NULL,
  `message_from` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `message_to` varchar(50) NOT NULL,
  `message_subject` varchar(255) NOT NULL,
  `message_body` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `message_from`, `role`, `time`, `message_to`, `message_subject`, `message_body`, `status`) VALUES
(1, 'Shankar', 'DBM', '26-May-2017', 'Receptionist', 'Sample Sent to Lab', 'Sample Sent to lab to perform specified tests', 0);

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `lab_id` int(10) NOT NULL,
  `sample_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `lab` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `lab_result` longtext NOT NULL,
  `result_status` int(1) NOT NULL,
  `sample_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`lab_id`, `sample_id`, `order_id`, `lab`, `barcode`, `lab_result`, `result_status`, `sample_number`) VALUES
(208, 173, 206, 'DBM', '1', 'Result : Positive', 2, 0),
(209, 173, 206, 'DIO', '1', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lab_names`
--

CREATE TABLE `lab_names` (
  `id` int(20) NOT NULL,
  `lab_name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_names`
--

INSERT INTO `lab_names` (`id`, `lab_name`, `description`) VALUES
(1, 'DBM', 'Diagnostic Bacteriology And Mycology'),
(2, 'SE', 'Seroepidemiology');

-- --------------------------------------------------------

--
-- Table structure for table `order_entry`
--

CREATE TABLE `order_entry` (
  `order_id` int(10) NOT NULL,
  `application_date` varchar(20) NOT NULL,
  `cm_receipt_number` varchar(50) NOT NULL,
  `sample_received_date` varchar(20) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `owner_number` varchar(13) NOT NULL,
  `owner_email_id` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `owner_address` varchar(400) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `doctor_number` int(13) NOT NULL,
  `doctor_email_id` varchar(50) NOT NULL,
  `reference_number` varchar(50) NOT NULL,
  `order_state` int(1) NOT NULL,
  `state` varchar(100) NOT NULL,
  `doctor_address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_entry`
--

INSERT INTO `order_entry` (`order_id`, `application_date`, `cm_receipt_number`, `sample_received_date`, `owner_name`, `owner_number`, `owner_email_id`, `place`, `owner_address`, `doctor_name`, `doctor_number`, `doctor_email_id`, `reference_number`, `order_state`, `state`, `doctor_address`) VALUES
(206, '05/01/2017', '98765432', '05/02/2017', 'Owner name', '0987654321', 'owner@own.com', 'Chikkamagaluru', 'Owner''s Address Goes Here with State and \nPincode - 560068', 'Doctor Name', 1234567890, 'doc@doc.com', '123456', 0, 'Karnataka', 'Doctor''s Address Goes Here with State and \nPincode - 560068');

-- --------------------------------------------------------

--
-- Table structure for table `sample_entry`
--

CREATE TABLE `sample_entry` (
  `sample_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `species` varchar(50) NOT NULL,
  `sample_type` varchar(50) NOT NULL,
  `animal_age` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `animal_history` varchar(500) NOT NULL,
  `sample_state` int(1) NOT NULL,
  `sample_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample_entry`
--

INSERT INTO `sample_entry` (`sample_id`, `order_id`, `barcode`, `species`, `sample_type`, `animal_age`, `sex`, `animal_history`, `sample_state`, `sample_number`) VALUES
(173, 206, '1', 'Spine', 'Brain Sample', '1yr', 'Nil', 'Nill', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sample_print_header`
--

CREATE TABLE `sample_print_header` (
  `id` int(20) NOT NULL,
  `header_name` varchar(250) NOT NULL,
  `header_format` mediumtext NOT NULL,
  `lab` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sample_result_format`
--

CREATE TABLE `sample_result_format` (
  `id` int(10) NOT NULL,
  `result_format` longtext NOT NULL,
  `lab` varchar(20) NOT NULL,
  `format_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample_result_format`
--

INSERT INTO `sample_result_format` (`id`, `result_format`, `lab`, `format_name`) VALUES
(8, '<a name="start" style="color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium;"><p></p><table border="0" cellspacing="0" cellpadding="0" width="535"><tbody><tr><td width="535" valign="top"><dd><a name="appendix"><p></p><table border="" cellspacing="1" cellpadding="6" width="535"><tbody><tr><th align="left">Voltage<font size="1">pres</font>&nbsp;(V)</th><th align="left">Voltage<font size="1">temp</font>&nbsp;(V)</th><th align="left">Pressure<font size="1">meas</font>&nbsp;(kPa)</th><th align="left">Temperature<font size="1">meas</font>&nbsp;(K)</th><th align="left">Temperature<font size="1">ideal</font>&nbsp;(K)</th></tr><tr><th align="right">6.32</th><th align="right">0.0011</th><th align="right">99.90</th><th align="right">298.94</th><th align="right">312.17</th></tr><tr><th align="right">6.39</th><th align="right">0.0020</th><th align="right">102.81</th><th align="right">320.32</th><th align="right">321.28</th></tr><tr><th align="right">6.78</th><th align="right">0.0031</th><th align="right">119.82</th><th align="right">346.26</th><th align="right">374.44</th></tr><tr><th align="right">7.31</th><th align="right">0.0046</th><th align="right">145.04</th><th align="right">381.64</th><th align="right">453.24</th></tr><tr><th align="right">7.17</th><th align="right">0.0052</th><th align="right">138.14</th><th align="right">395.79</th><th align="right">431.69</th></tr><tr><th align="right">7.35</th><th align="right">0.0064</th><th align="right">147.04</th><th align="right">424.09</th><th align="right">459.50</th></tr><tr><th align="right">7.45</th><th align="right">0.0073</th><th align="right">152.11</th><th align="right">445.32</th><th align="right">475.32</th></tr><tr><th align="right">7.56</th><th align="right">0.0078</th><th align="right">157.78</th><th align="right">457.11</th><th align="right">493.04</th></tr><tr><th align="right">7.66</th><th align="right">0.0097</th><th align="right">163.02</th><th align="right">501.92</th><th align="right">509.43</th></tr><tr><th align="right">8.06</th><th align="right">0.0107</th><th align="right">184.86</th><th align="right">525.51</th><th align="right">577.69</th></tr><tr><th align="right">8.10</th><th align="right">0.0114</th><th align="right">187.12</th><th align="right">542.02</th><th align="right">584.75</th></tr><tr><th align="right">8.34</th><th align="right">0.0130</th><th align="right">200.97</th><th align="right">579.75</th><th align="right">628.03</th></tr></tbody></table><p></p><p><img src="http://writing.engr.psu.edu/pictures/lab2fig1.gif" width="535" height="305"></p><p><font size="2"></font></p><center><font size="2"><b>Figure A-1.</b>	Temperature versus pressure, as measured by the transducers.</font></center><p><br><img src="http://writing.engr.psu.edu/pictures/lab2fig2.gif" width="535" height="320"></p><p><font size="2"></font></p><center><font size="2"><b>Figure A-2.</b>	Temperature versus pressure, as calculated from the ideal gas equation.</font></center></a></dd></td></tr></tbody></table><br><p></p></a>', 'DBM', 'DBM - Format1');

-- --------------------------------------------------------

--
-- Table structure for table `sample_type`
--

CREATE TABLE `sample_type` (
  `id` int(20) NOT NULL,
  `sample_type` varchar(50) NOT NULL,
  `sample_desc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample_type`
--

INSERT INTO `sample_type` (`id`, `sample_type`, `sample_desc`) VALUES
(1, 'Blood', 'Animal Blood Sample'),
(2, 'Brain Sample', 'Animal Brain Sample'),
(3, 'cloacal swab', 'cloacal swab'),
(4, 'Ear Piece', 'Ear Piece Sample');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `id` int(4) NOT NULL,
  `species_name` varchar(50) NOT NULL,
  `species_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`id`, `species_name`, `species_desc`) VALUES
(1, 'Bovinae', 'The biological subfamily Bovinae includes a diverse group of 10 genera of medium to large-sized ungulates, including domestic cattle, bison, African buffalo, the water buffalo, the yak, and the four-horned and spiral-horned antelopes.'),
(3, 'Spine', 'Spine');

-- --------------------------------------------------------

--
-- Table structure for table `tests_performed`
--

CREATE TABLE `tests_performed` (
  `id` int(255) NOT NULL,
  `test_name` varchar(250) NOT NULL,
  `lab_id` varchar(250) NOT NULL,
  `accession` varchar(250) NOT NULL,
  `sample_id` varchar(250) NOT NULL,
  `tests_performed_date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests_performed`
--

INSERT INTO `tests_performed` (`id`, `test_name`, `lab_id`, `accession`, `sample_id`, `tests_performed_date`) VALUES
(14, 'Blood Test', 'DBM', '1', '173', '05/09/2017'),
(15, 'Urine Test', 'DBM', '1', '173', '05/09/2017');

-- --------------------------------------------------------

--
-- Table structure for table `test_names`
--

CREATE TABLE `test_names` (
  `id` int(20) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `test_desc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_names`
--

INSERT INTO `test_names` (`id`, `test_name`, `test_desc`) VALUES
(1, 'Blood Test', 'Blood Test'),
(2, 'Urine Test', 'Urine Tests');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `ph_no` int(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `designation`, `ph_no`, `address`, `name`, `email`) VALUES
(1, 'jdAsAdmin', 'admin', 'admin', 'JD', 1234567890, 'IAHVB Hebbala', 'JD', ''),
(2, 'receptionist', 'receptionist', 'ordercollection', 'receptionist', 129878787, 'address', 'Receptionist', ''),
(3, 'shankar', 'shankar', 'DBM', 'DBM lab incharge', 1234567890, 'abc', 'Shankar', ''),
(4, 'vijaykumar', 'vijay', 'SE', 'SE', 12456, 'hgfgfgf', 'Vijay', ''),
(5, 'admin', 'admin', 'JD', 'JD', 8266363, 'kguuyu', 'vijay', 'vijay@vijay.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disease_names`
--
ALTER TABLE `disease_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disease_suspected`
--
ALTER TABLE `disease_suspected`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `lab_names`
--
ALTER TABLE `lab_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_entry`
--
ALTER TABLE `order_entry`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `sample_entry`
--
ALTER TABLE `sample_entry`
  ADD PRIMARY KEY (`sample_id`);

--
-- Indexes for table `sample_print_header`
--
ALTER TABLE `sample_print_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_result_format`
--
ALTER TABLE `sample_result_format`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_type`
--
ALTER TABLE `sample_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests_performed`
--
ALTER TABLE `tests_performed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_names`
--
ALTER TABLE `test_names`
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
-- AUTO_INCREMENT for table `disease_names`
--
ALTER TABLE `disease_names`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `disease_suspected`
--
ALTER TABLE `disease_suspected`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `lab_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;
--
-- AUTO_INCREMENT for table `lab_names`
--
ALTER TABLE `lab_names`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_entry`
--
ALTER TABLE `order_entry`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT for table `sample_entry`
--
ALTER TABLE `sample_entry`
  MODIFY `sample_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `sample_print_header`
--
ALTER TABLE `sample_print_header`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sample_result_format`
--
ALTER TABLE `sample_result_format`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sample_type`
--
ALTER TABLE `sample_type`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tests_performed`
--
ALTER TABLE `tests_performed`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `test_names`
--
ALTER TABLE `test_names`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
