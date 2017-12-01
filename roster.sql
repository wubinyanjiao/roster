-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2017 at 08:46 PM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bindassnix`
--

-- --------------------------------------------------------

--
-- Table structure for table `countdoctor`
--

CREATE TABLE IF NOT EXISTS `countdoctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sat` text NOT NULL,
  `sun` text NOT NULL,
  `month` text NOT NULL,
  `year` text NOT NULL,
  `holiday` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `countdoctor`
--

INSERT INTO `countdoctor` (`id`, `sat`, `sun`, `month`, `year`, `holiday`) VALUES
(1, '4', '4', '11', '2017', '0'),
(2, '5', '5', '12', '2017', '1'),
(3, '5', '5', '12', '2017', '1'),
(4, '5', '5', '12', '2017', '1');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `department` text NOT NULL,
  `mobile` text NOT NULL,
  `senior` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `designation`, `department`, `mobile`, `senior`) VALUES
(1, 'Dr. A.K Mehta', 'SAG, AMS,(HQ)', 'MD', '9718990182', 'Yes'),
(2, 'Dr. Abhay Ku. Jha ', 'SMO ', 'PAED', '9718990179', 'No'),
(3, 'Dr. Ajay Kr. ', 'Spl Grade III', 'ANES', '9990400972', 'No'),
(4, 'Dr. Ajay Sharma ', 'SMO ', 'FOR', '9718990242', ''),
(5, 'Dr. Amarjeet Singh', 'SAG', 'ANES', '9718990111', 'Yes'),
(6, 'Dr. Amit Mehtani ', 'SMO ', 'EYE', '9810774788', 'No'),
(7, 'Dr. Anil Gulati', 'SAG', 'PAED', '9718990172', 'Yes'),
(8, 'Dr. Anil Kr. Garg', 'SAG', 'MED', '9718990215', 'Yes'),
(9, 'Dr. Anita ', 'Spl Grade III', 'PAED', '9711012968', 'No'),
(10, 'Dr. Anuj Mittal', 'Spl Grade III', 'PSY', '9718990120', 'Yes'),
(11, 'Dr. Anupama Mittal ', 'Spl Grade III', 'PATHO', '9718990234', 'No'),
(12, 'Dr. Anurag Jain ', 'Spl Grade III', 'PLSUR', '9540056583', 'Yes'),
(13, 'Dr. Archana', 'SMO ', 'MED', '9718990236', 'No'),
(14, 'Dr. Arun Kumar ', 'CMO (NFSG)', 'PAED', '8744089997', 'No'),
(15, 'Dr. Aruna Singh Kusuwaha', 'SMO ', 'RADIO', '9718990204', 'No'),
(16, 'Dr. Arundhati Mukhopadhayay', 'CMO (NFSG)', 'GYNE', '9718932020', 'No'),
(17, 'Dr. Ashish Dhingra', 'Spl Grade III', 'PLSUR', '9718990164', 'No'),
(18, 'Dr. Ashish Kapoor ', 'Jr.Staff Surg (Den)', 'DENT', '9718990183', 'Yes'),
(19, 'Dr. Ashok Kumar', 'CMO (NFSG)', 'CHEST', '9650391003', 'No'),
(20, 'Dr. Babita Garbiyal ', 'SMO ', 'RADIO', '9718990235', 'No'),
(21, 'Dr. Bharti Singhal ', 'Spl Grade III', '', '', ''),
(22, 'Dr. Bhavesh Mishra ', 'Spl Grade III', 'BIOCHEM', '7290012513', 'No'),
(23, 'Dr. Bhavna Saxena', 'SMO ', 'ANES', '9718990124', 'No'),
(24, 'Dr. Bimal Ahluwalia ', 'Jr. Spl (Cont)', 'ANES', '9718990117', 'No'),
(25, 'Dr. Boopendra N.Mishra ', 'SMO ', 'FOR', '9718990128', ''),
(26, 'Dr. D.D.Golani', 'SAG', 'MED', '9718990214', 'Yes'),
(27, 'Dr. Deepa Kerketta', 'Spl Grade III', 'ANES', '9718905222', ''),
(28, 'Dr. Deepak Ku.Upadhyay', 'CMO (NFSG)', 'MED', '9718990217', 'No'),
(29, 'Dr. Deepak Verma ', 'CMO (NFSG)', 'ADMN', '9718990194', 'No'),
(30, 'Dr. Deepali Taneja ', 'Spl Grade III', 'ANES', '9718990125', 'No'),
(31, 'Dr. Deepshika ', 'SMO ', 'MED', '9540056581', 'No'),
(32, 'Dr. Dhananjay Ku.', 'SMO ', 'RADIO', '9718990205', 'No'),
(33, 'Dr. Dinesh Ku. Varshnev', 'MO (Cont)', 'ENT', '9718932010', 'No'),
(34, 'Dr. Ganesh Adhikari ', 'SMO ', 'EMR', '9718990135', 'No'),
(35, 'Dr. Garima Goyal ', 'Jr.Spl.(Cont.)', 'PATH', '9718990237', 'No'),
(36, 'Dr. Geetanjali Bugnait', 'Spl Grade III', 'ENT', '9818468488', 'No'),
(37, 'Dr. Gupteshwar Prasad', 'Spl Grade III', 'SURG', '9718934517', 'No'),
(38, 'Dr. H.C Ghandhi', 'SAG', 'EYE', '9718990192', 'Yes'),
(39, 'Dr. Harvinder Kaur ', 'Spl Grade III', 'GYN', '9718990170', 'No'),
(40, 'Dr. J.S Bhalla ', 'Consultant', 'EYE', '9718990191', 'Yes'),
(41, 'Dr. J.P. Singh ', 'CMO (NFSG)', 'PAED', '9718990178', 'No'),
(42, 'Dr. Jasmeet Kaur', 'CMO (NFSG)', 'ENT', '9718990184', 'Yes'),
(43, 'Dr. Jatin Bodwal ', 'Spl Grade III', 'FOR', '9718990147', 'No'),
(44, 'Dr. Jaya Malhotra ', 'Spl.Gr.III', 'PATH', '9718990232', 'No'),
(45, 'Dr. K.K Kumra', 'SAG', 'ORTHO', '9718990236', 'Yes'),
(46, 'Dr. Komal Singh', 'SAG, AMS,(A)', 'FOR', '9718990127', 'Yes'),
(47, 'Dr. Kumar Narendra Mohan', 'SMO ', 'MED', '9718990208', 'No'),
(48, 'Dr. L.R. Richhel', 'Consultant', 'RADIO', '7290012524', 'Yes'),
(49, 'Dr. M.C Agarwal', 'Consultant', 'EYE', '9718990190', 'Yes'),
(50, 'Dr. M.S Bisht', 'SAG', 'ENT', '9718990181', 'Yes'),
(51, 'Dr. Maheshwar Prasad Chaurasia', 'CMO (NFSG)', 'MED', '9718990223', 'No'),
(52, 'Dr. Maninder Kaur Chhabra', 'Spl Grade III', 'SUR', '9718990140', 'No'),
(53, 'Dr. Mausmi Swami ', 'CMO (NFSG)', 'BB', '9718990241', 'Yes'),
(54, 'Dr. Megha Batra ', 'MO ', 'GYNE', '9718990155', 'No'),
(55, 'Dr. Monika Suri Grover', 'CMO (NFSG)', 'GYNE', '9718990166', 'No'),
(56, 'Dr. Mukesh Bhatnagar', 'CMO (NFSG)', 'MED', '9718990225', 'No'),
(57, 'Dr. Mukesh Mittal', 'SMO ', 'MED', '9718990151', ''),
(58, 'Dr. N.Z Farooqui', 'SAG', 'EYE', '9718990193', 'Yes'),
(59, 'Dr. Narinder Kumar Solanki ', 'SMO ', 'MED', '9718990208', 'No'),
(60, 'Dr. Naveed Hanief Lone', 'MO ', 'EMR', '7838579132', 'No'),
(61, 'Dr. Naveen Kumar ', 'Spl Grade I', 'MED', '9718990211', 'Yes'),
(62, 'Dr. Neelam Singhal ', 'Jr. Spl (Cont.)', 'PATH', '9718990281', 'No'),
(63, 'Dr. Neelam Sood', 'Consultant ', 'PATH', '9718990230', 'Yes'),
(64, 'Dr. Neeraj kr. Garg', 'SMO ', 'MED', '8376934154', 'No'),
(65, 'Dr. Neeta Bindal ', 'SAG', 'GYNE', '9718990162', 'Yes'),
(66, 'Dr. N.Z Farooqui', 'SAG', 'EYE', '9718990193', 'Yes'),
(67, 'Dr. Nidhi Chauhan ', 'Spl Grade III', 'PATH', '8744061144', 'No'),
(68, 'Dr. Nishu Dhawan ', 'SMO ', 'BB', '9718990243', 'No'),
(69, 'Dr. Om Prakash ', 'Senior MO ', 'MED', '9718990132', 'No'),
(70, 'Dr. P.S Sarangi', 'Spl Grade III', 'SUR', '9718990144', 'Yes'),
(71, 'Dr. Pinkee Saxena', 'Spl Grade III', 'gyn', '9718990262', 'No'),
(72, 'Dr. Poonam Gupta ', 'Jr. Spl (Cont.)', 'MICRO', '9718990239', 'No'),
(73, 'Dr. Poonam Laul ', 'Spl Grade II', 'GYN', '9718990167', 'No'),
(74, 'Dr. Praveena Goel ', 'SAG,AMS(HOO)', 'ADMN', '9718990101', 'Yes'),
(75, 'Dr. Puja Mehta ', 'Jr. Spl (Cont.)', 'SKN', '9718990143', 'No'),
(76, 'Dr. Puneet Chhiber', 'Spl Grade III', 'SUR', '9718990145', 'Yes'),
(77, 'Dr. Puneet Dwivedi ', 'MO ', 'ANES', '9718932064', 'No'),
(78, 'Dr. Rajesh Hans', 'Spl Grade I ', 'EYE', '9718190111', 'No'),
(79, 'Dr. Rajesh Kohli ', 'SMO MS AE', 'CAS', '9718990202', 'Yes'),
(80, 'Dr. Rakesh Kumar ', 'SAG', 'RADIO', '9718990197', 'Yes'),
(81, 'Dr. Ram Chandra ', 'SMO ', 'PATH', '9718932004', 'No'),
(82, 'Dr. Rashmi Yadav ', 'Spl Grade III', 'PATH', '9718990231', 'No'),
(83, 'Dr. Rati Makkar', 'SAG', 'SKIN', '9718990150', 'Yes'),
(84, 'Dr. Ravi Pathak ', 'Spl Grade I ', 'MED', '9718990212', 'Yes'),
(85, 'Dr. Rekha ', 'Spl Grade III', 'PEADS', '9013078274', 'No'),
(86, 'Dr. Ripdaman Kaur', 'SAG', 'PEADS', '9718990174', 'Yes'),
(87, 'Dr. Rishi Kanava', 'SMO', 'BB', '9718990206', 'No'),
(88, 'Dr. Rita Moni C Barua ', 'SMO ', 'PEADS', '9718990187', ''),
(89, 'Dr. Rita Ranjan ', 'Consultant, MS', 'GYNE', '9718990161', 'Yes'),
(90, 'Dr. Ritu Agarwal ', 'MO ', 'ANES', '9718990123', 'No'),
(91, 'Dr. Ritu Chawla ', 'CMO (NFSG)', 'PEADS', '9718990173', 'Yes'),
(92, 'Dr. Ritu Mittal nee Goyal ', 'Spl Grade III', 'GYN', '9718990169', 'No'),
(93, 'Dr. S.K Sharma', 'SAG', 'ORTHO', '9718990133', 'Yes'),
(94, 'Dr. Samarjeet Grover ', 'SMO ', 'PEADS', '9718990186', 'No'),
(95, 'Dr. Sameer Kapoor ', 'Spl Grade III', 'MED', '9718990276', 'No'),
(96, 'Dr. Sandhya Agarwal ', 'Spl Grade III', 'ANES', '9718990116', 'No'),
(97, 'Dr. Sanjay Lal', 'MO ', 'EMR', '8744071637', ''),
(98, 'Dr. Sanjay Prakash', 'Spl Grade III', 'ENT', '8744069991', 'No'),
(99, 'Dr. Sanjay Rai ', 'SMO ', 'BB', '9718990270', 'No'),
(100, 'Dr. Sanjeev Gambhir', 'Spl Grade III', 'ORTHO', '7290012523', ''),
(101, 'Dr. Sanjeev Tuteja ', 'Jr. Spl (Cont)  ', 'ANES', '9718932082', 'No'),
(102, 'Dr. Santosh ', 'Spl Grade III', 'EYE', '9718990196', 'No'),
(103, 'Dr. Saurabh Jain ', 'MO ', 'ENT', '8744071188', 'No'),
(104, 'Dr. Savita Babbar', 'Consultant', 'ANES', '9718990110', 'Yes'),
(105, 'Dr. Shalini Kakar', 'Spl Grade III', 'RADIO', '9718990233', 'Yes'),
(106, 'Dr. Shashilata Maheshwari ', 'Spl Grade III', 'GYN', '9718990168', 'No'),
(107, 'Dr. Shefali Jain ', 'SMO ', 'RADIO', '9718990227', 'No'),
(108, 'Dr. Shiv Lata Gupta', 'CMO(NFSG)(Susp)', '', '', ''),
(109, 'Dr. Soma Mitra ', 'MO ', 'GYN', '9718932032', 'No'),
(110, 'Dr. Subodh Kumar Gupta ', 'Spl Grade III', 'NSUR', '9718932075', 'Yes'),
(111, 'Dr. Sumant Sinha ', 'SPL Grd 1', 'ORTHO', '9718990134', 'No'),
(112, 'Dr. Sunita Seth ', 'Spl Grade III', 'GYN', '9718990153', 'No'),
(113, 'Dr. Sushmita Sarangi ', 'Spl Grade III', 'ANES', '9718990113', 'No'),
(114, 'Dr. Sweta Sinha ', 'MO (Cont)', 'Med', '', ''),
(115, 'Dr. Trambak Ku. Jharia', 'Spl Grade III', 'ORTHO', '', ''),
(116, 'Dr. Uma K', 'Senior MO ', 'MED', '9718990224', 'No'),
(117, 'Dr. Umed Singh', 'CMO (SAG)', 'ORTHO', '8826998300', 'Yes'),
(118, 'Dr. Upasana Goswami ', 'Spl Grade III', 'ANES', '9718990118', 'No'),
(119, 'Dr. Urvarshi Meglani ', 'Spl Grade III', 'GYNE', '9718990171', 'No'),
(120, 'Dr. Usha Yadav ', 'Spl Grade III', 'GYNE', '9718990207', 'No'),
(121, 'Dr. V.K Kadam', 'Consultant ', 'GYNE', '9718990160', 'Yes'),
(122, 'Dr. V.K Ranga ', 'Spl Grade III (Diverted)', 'FOR', '971872112', 'No'),
(123, 'Dr. V.K Sharma', 'SAG', 'ADMN', '9718990175', 'Yes'),
(124, 'Dr. Vatsala Agarwal ', 'CMO (NFSG)', 'ANES', '9718990112', 'No'),
(125, 'Dr. Vibha Uppal ', 'Spl Grade III', 'PATH', '9718934513', ''),
(126, 'Dr. Vimal Kumar Nag ', 'MO ', 'PEADS', '8744041166', 'No'),
(127, 'Dr. Vinal Sharma ', 'SMO ', 'ORTHO', '9718932061', 'No'),
(128, 'Dr. Vineet Kr. Soni ', 'SMO ', 'RADIO', '9718990201', 'No'),
(129, 'Dr. Vineet kumar ', 'MO ', 'EMR', '8744041155', ''),
(130, 'Dr. Vineet Ku. Arora ', 'Spl Grade III', 'Ortho', '9718990137', 'No'),
(131, 'Dr. Y.N Maurya', 'Spl Grade III', 'PEADS', '9654771995', 'No'),
(132, 'Dr. Puja Grover', 'Medical Officer', 'Radiology', '9718990265', 'No'),
(133, 'Dr. Avnish Bhargava', 'SMO', 'MED', '9811549391', 'No'),
(134, 'Dr. Bhavesh Kumar', 'Specialist', 'Surgery', '7835064123', 'No'),
(135, 'Dr. Subhash Seth', 'OSD to MD', 'Admin', '9718932051', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `holiday` text NOT NULL,
  `date` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `holiday`, `date`, `month`, `year`) VALUES
(3, 'Christmas', 25, 12, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

CREATE TABLE IF NOT EXISTS `roster` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` text NOT NULL,
  `date` int(10) NOT NULL,
  `month` int(10) NOT NULL,
  `year` int(10) NOT NULL,
  `day` text NOT NULL,
  `eorn` text NOT NULL,
  `holiday` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `roster`
--

INSERT INTO `roster` (`id`, `userid`, `date`, `month`, `year`, `day`, `eorn`, `holiday`, `time`) VALUES
(64, '7', 2, 12, 2017, 'Sat', 'Evening', 'No', '2017-11-28 07:26:55'),
(65, '26', 3, 12, 2017, 'Sun', 'Evening', 'No', '2017-11-28 07:26:55'),
(66, '8', 9, 12, 2017, 'Sat', 'Evening', 'No', '2017-11-28 07:26:58'),
(67, '10', 10, 12, 2017, 'Sun', 'Evening', 'No', '2017-11-28 07:26:59'),
(68, '12', 16, 12, 2017, 'Sat', 'Evening', 'No', '2017-11-28 07:27:01'),
(69, '18', 17, 12, 2017, 'Sun', 'Evening', 'No', '2017-11-28 07:27:04'),
(70, '38', 23, 12, 2017, 'Sat', 'Evening', 'No', '2017-11-28 07:27:06'),
(71, '40', 24, 12, 2017, 'Sun', 'Evening', 'No', '2017-11-28 07:27:08'),
(75, '44', 1, 12, 2017, 'Fri', 'Night', 'No', '2017-11-28 08:20:11'),
(76, '47', 2, 12, 2017, 'Sat', 'Night', 'No', '2017-11-28 08:20:14'),
(77, '51', 3, 12, 2017, 'Sun', 'Night', 'No', '2017-11-28 08:21:08'),
(79, '52', 4, 12, 2017, 'Mon', 'Night', 'No', '2017-11-28 08:22:25'),
(80, '54', 5, 12, 2017, 'Tue', 'Night', 'No', '2017-11-28 08:22:27'),
(81, '55', 6, 12, 2017, 'Wed', 'Night', 'No', '2017-11-28 08:22:29'),
(82, '56', 7, 12, 2017, 'Thu', 'Night', 'No', '2017-11-28 08:23:10'),
(84, '59', 8, 12, 2017, 'Fri', 'Night', 'No', '2017-11-28 08:23:53'),
(85, '62', 9, 12, 2017, 'Sat', 'Night', 'No', '2017-11-28 08:23:56'),
(86, '64', 10, 12, 2017, 'Sun', 'Night', 'No', '2017-11-28 08:23:59'),
(87, '67', 11, 12, 2017, 'Mon', 'Night', 'No', '2017-11-28 08:24:01'),
(88, '68', 12, 12, 2017, 'Tue', 'Night', 'No', '2017-11-28 08:25:57'),
(89, '69', 13, 12, 2017, 'Wed', 'Night', 'No', '2017-11-28 08:25:59'),
(90, '71', 14, 12, 2017, 'Thu', 'Night', 'No', '2017-11-28 08:26:29'),
(91, '72', 15, 12, 2017, 'Fri', 'Night', 'No', '2017-11-28 08:26:29'),
(92, '73', 16, 12, 2017, 'Sat', 'Night', 'No', '2017-11-28 08:26:32'),
(93, '132', 17, 12, 2017, 'Sun', 'Night', 'No', '2017-11-28 08:30:44'),
(94, '75', 18, 12, 2017, 'Mon', 'Night', 'No', '2017-11-28 08:30:47'),
(96, '77', 19, 12, 2017, 'Tue', 'Night', 'No', '2017-11-28 08:33:22'),
(97, '81', 20, 12, 2017, 'Wed', 'Night', 'No', '2017-11-28 08:35:11'),
(98, '82', 21, 12, 2017, 'Thu', 'Night', 'No', '2017-11-28 08:35:36'),
(99, '85', 22, 12, 2017, 'Fri', 'Night', 'No', '2017-11-28 08:35:39'),
(100, '87', 23, 12, 2017, 'Sat', 'Night', 'No', '2017-11-28 08:38:17'),
(104, '90', 24, 12, 2017, 'Sun', 'Night', 'No', '2017-11-28 08:41:13'),
(105, '92', 25, 12, 2017, 'Mon', 'Night', 'No', '2017-11-28 08:41:14'),
(113, '45', 25, 12, 2017, 'Mon', 'Evening', 'Christmas', '2017-11-28 08:58:53'),
(114, '46', 30, 12, 2017, 'Sat', 'Evening', 'No', '2017-11-28 08:59:12'),
(115, '48', 31, 12, 2017, 'Sun', 'Evening', 'No', '2017-11-28 09:00:49'),
(117, '95', 26, 12, 2017, 'Tue', 'Night', 'No', '2017-11-28 09:47:20'),
(118, '98', 27, 12, 2017, 'Wed', 'Night', 'No', '2017-11-28 09:47:27'),
(123, '101', 28, 12, 2017, 'Thu', 'Night', 'No', '2017-11-28 09:48:48'),
(124, '102', 29, 12, 2017, 'Fri', 'Night', 'No', '2017-11-28 09:48:49'),
(127, '106', 30, 12, 2017, 'Sat', 'Night', 'No', '2017-11-28 09:48:59'),
(128, '107', 31, 12, 2017, 'Sun', 'Night', 'No', '2017-11-28 09:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_email` text NOT NULL,
  `user_pass` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_email`, `user_pass`, `time`) VALUES
(1, 'admin', 'admin', '2017-07-21 01:25:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
