-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 09:39 AM
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
-- Database: `ojt-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `folder_path` varchar(200) NOT NULL,
  `folder_size` varchar(200) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `user_id`, `name`, `folder_path`, `folder_size`, `updated_at`) VALUES
(1, 22, 'folder', '../uploads/folder', '333333', '2023-04-10 12:15:10'),
(2, 22, 'folder', '../uploads/folder', '333333', '2023-04-10 12:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `folder_files`
--

CREATE TABLE `folder_files` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `file_size` int(250) NOT NULL,
  `file_path` varchar(200) NOT NULL,
  `folder_name` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `title` varchar(355) NOT NULL,
  `author` varchar(255) NOT NULL,
  `uploadedby` varchar(100) NOT NULL,
  `uploader_id` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `course` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_size` double NOT NULL,
  `file_path` varchar(200) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `title`, `author`, `uploadedby`, `uploader_id`, `year`, `course`, `description`, `status`, `file_name`, `file_size`, `file_path`, `uploaded_at`) VALUES
(45, 'ALRADJIE ENTERPRISE SALES AND RESERVATION SYSTEM', 'MARY JANE C. DE JESUS', 'Godfrey Gacer', 0, '2019', 'bsit', 'Alradjie Enterprise Sales and Reservation System is an e-commerce website designed to sell products through online by the exclusive enterprise named &quot;Alradjic Enterprise&quot;.  The main objective of this project was to design and develop a web-based system that would help people to shop just by staying at their house to lessen their effort visiting the Enterprise. The users are free to browse their desired items/product and once they decided to make reservations, they need to register in the system first. The process of payment is just easy, namely, Reservation where the enterprise gives the user a 3 days reservation of the product, Pay through Palawan Express and after paying the order would be delivered according to the buyers information, COD or cash on delivery where the item would be paid during the delivery, and lastly is the Pick-Up transaction where the buyer would set a date when the buyer would pick-up the product at the exact location of the enterprise and pay during the transaction. The Alradjie Enterprise Sales and Reservation System has four (4) main module namely; User Management, Managing hems, Managing Order and Purchased liems module. The proponents identified and considered the system requirements to ensure that the system would run properly. The system requirements include software (Windows 7, HTML5, CSS3, JavaScript, jQuery, Bootstrap, PHP, MySQL, Adobe Photoshop CS6, Brackets, Apache and Google Chrome) and hardware (CPU, Memory, Hard Disk Drive, Mouse and Keyboard). The proponents used Spiral model as the System Development Life Cycle and it was composed of four different phases such as Planning, Risk Analysis, Development and Testing and System Planning.', 1, 'ALRADJIE ENTERPRISE SALES AND RESERVATION SYSTEM.pdf', 46885, '../uploads/62746.pdf', '2023-04-19 21:39:07'),
(46, 'ANDROID BASED E-LEARNING APPLICATION FOR CRIMINOLOGY STUDENTS (INSTRUCTIONAL MATERIALS)', 'AYALYN S. CONCEPCION', 'Godfrey Gacer', 0, '2019', 'bscs', 'Nowadays, the movement of change is getting very fast as well as the  modernization which affects the life of individuals. On the whole, android  devices are the wonderful gadgets that we have changed the lives of human  beings. This paper proposes a system that could help a specific  establishment which is Android-Based E-Learning Application for Criminology  Students that make the board exam easier and more convenient. An Android-Based E-Learning Application for Criminology Student is an  Android based reporting that serve as the update version of the existing  system. This kind of system is a specialized system that could help  Criminology students for their board exam. Utilizing the system could help  and enjoy them while reviewing. This is suitable for accessing of data easily.', 1, 'ANDROID BASED E-LEARNING APPLICATION FOR CRIMINOLOGY STUDENTS (INSTRUCTIONAL MATERIALS).pdf', 44068, '../uploads/726417.pdf', '2023-04-19 21:42:55'),
(59, 'fdgfdfg', 'pads', 'Gerald Paler', 28, '2022', 'bsit', 'this is description', 1, '2D ANDROID-BASED CAR MODIFICATION INTERACTIVE GAME FOR KIDS.pdf', 48610, '../uploads/302179.pdf', '2023-04-26 04:08:23'),
(60, 'test', 'text', 'Gerald Paler', 28, '2022', 'bsit', 'this is description', 1, '2D ANDROID-BASED CAR MODIFICATION INTERACTIVE GAME FOR KIDS.pdf', 48610, '../uploads/702685.pdf', '2023-04-26 04:52:32'),
(61, 'rhrhrhrhrhrhrhr', 'bedhheeh', 'Godfrey Gacer', 0, '2022', 'bsit', 'sdasdasdasd', 1, 'Module 5 - Managing Software (1).pdf', 231790, '../uploads/449317.pdf', '2023-04-26 04:59:57'),
(62, 'title', 'user', 'Juan Carlos Jeff', 0, '2022', 'bsit', 'Technology nowadays plays a big part in everything that people do.  Children are exposed to different electronic gadgets at an early age. People  live in a world where media is the main source of communication and  interaction. They are growing up with loads of gadgets that are becoming  the instrument of the culture at home, at school, and even in the  community, at a fast pace (Kerawalla &amp; Crook 2002, Calvert et al. 2005).  These days, the question is not about a child being able to deal with  technology but how soon will he be exposed and will be able to adapt with  the gadgets. According to Suarez-Orozco (2004), technology can serve as a  distraction to kids. But looking at the brighter side, it can also be an  educational boost for children with games that teach the fundamentals  needed and serves as the basis for their mental and physical development', 1, 'Module 5 - Managing Software (1).pdf', 231790, '../uploads/877310.pdf', '2023-04-26 06:32:50'),
(63, 'test', 'admin', 'Gerald Paler', 28, '2022', 'bsit', 'description', 1, '2D ANDROID-BASED CAR MODIFICATION INTERACTIVE GAME FOR KIDS.pdf', 48610, '../uploads/528018.pdf', '2023-04-26 07:05:42'),
(64, 'test', 'user', 'Godfrey Gacer', 0, '2022', 'bsit', 'Technology nowadays plays a big part in everything that people do.  Children are exposed to different electronic gadgets at an early age. People  live in a world where media is the main source of communication and  interaction. They are growing up with loads of gadgets that are becoming  the instrument of the culture at home, at school, and even in the  community, at a fast pace (Kerawalla &amp; Crook 2002, Calvert et al. 2005).  These days, the question is not about a child being able to deal with  technology but how soon will he be exposed and will be able to adapt with  the gadgets. According to Suarez-Orozco (2004), technology can serve as a  distraction to kids. But looking at the brighter side, it can also be an  educational boost for children with games that teach the fundamentals  needed and serves as the basis for their mental and physical development', 0, '2D ANDROID-BASED CAR MODIFICATION INTERACTIVE GAME FOR KIDS.pdf', 48610, '../uploads/791669.pdf', '2023-05-03 06:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `usertype`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(22, 'user', 'Godfrey Gacer', 'frey@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$Yms1L1lNaXcvUVdyRmF2Qg$+Yf5pfGzaPTLsyTuQP7HL2A6W/Czj95s2UcEYPDA1bo', '2023-04-08 04:04:17', '2023-04-08 04:04:17'),
(27, 'user', 'Juan Dela Cruz', 'juan@email.com', '$argon2id$v=19$m=65536,t=4,p=1$WnlRMFNEWENlOXRFZ0Vrcw$RlWY67ciyeFLKlDQ201LlbfLSb2sYdPnhm876LBcDNY', '2023-04-09 12:39:23', '2023-04-09 12:39:23'),
(28, 'admin', 'Gerald Paler', 'g@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$Z2pTODN1ZXNkYnhZeFFoQg$M80jI7DDBqlPLV0qvRRmfr01yr8OQcODEEl4opCySTA', '2023-04-09 15:09:29', '2023-04-09 15:09:29'),
(39, 'admin', 'Gerald Paler', 'juan@email.com', '$argon2id$v=19$m=65536,t=4,p=1$MGFZYUtmVXdSdUM4Rlc0Lg$cvI56lCyJ4wvlscw/YjL26eh1dCyGWwBDZdp2Wac0Mg', '2023-04-15 13:37:35', '2023-04-15 13:37:35'),
(42, 'user', 'Nico Competente', 'nuc@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$bU9aVy83UkliVmtNbXlDeQ$atRdEnKqCkWMINVP0S4nw5SEIbekPFmIVdba/io2X3k', '2023-04-25 14:11:57', '2023-04-25 14:11:57'),
(43, 'user', 'Juan Carlos Jeff', 'admin1@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$NHNUd2pVRnROWklIeGdFbA$fBpw5o8lvfIowPzCoYFOqNI4I74ZJVMlIqE6Pobinpo', '2023-04-26 14:30:34', '2023-04-26 14:30:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `folder_files`
--
ALTER TABLE `folder_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folder_id` (`folder_name`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `folder_files`
--
ALTER TABLE `folder_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `folders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `folder_files`
--
ALTER TABLE `folder_files`
  ADD CONSTRAINT `folder_files_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
