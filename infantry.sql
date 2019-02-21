-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2019 at 07:01 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infantry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `fullName` varchar(40) NOT NULL,
  `emailAddress` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `imageName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullName`, `emailAddress`, `password`, `imageName`) VALUES
(1, 'azeez afeez', 'azeezco1996@yahoo.com', 'a3e6a3a5ad091efe2e787e7f7c7e8a3562e02ce9', 'deepika.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `date` text NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `patient_name`, `doctor_id`, `status`) VALUES
(3, 'February 21,2019 13:00 PM', 'akshar kumar', 9, 0),
(5, 'February 27,2019 15:00 PM', 'olaniyi rafiu', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `patient_name` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `body`, `patient_name`, `date`) VALUES
(4, 5, 'This is actually an awesome code', 'Dr.doctor', 'February 20,2019'),
(5, 2, 'well the post is nice as yuou said', 'Dr.doctor', 'February 20,2019'),
(6, 8, 'nice post', 'Dr.doctor', 'February 20,2019'),
(8, 3, 'nice', 'Dr.doctor', 'February 21,2019'),
(9, 3, 'nice', 'Dr.doctor', 'February 21,2019');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(15) NOT NULL,
  `fullName` varchar(40) NOT NULL,
  `emailAddress` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `specialization` text NOT NULL,
  `imageName` varchar(100) NOT NULL,
  `user_type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `fullName`, `emailAddress`, `password`, `status`, `specialization`, `imageName`, `user_type`) VALUES
(9, 'doctor', 'doctor@yahoo.com', '1f0160076c9f42a157f0a8f0dcc68e02ff69045b', 1, 'dentistry', 'pat.png', 1),
(19, 'chilling Res`', 'chilling@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'dentistry', 'image220.png', 1),
(20, 'chilling Res`', 'dloctor@yahoo.com', '7b52009b64fd0a2a49e6d8a939753077792b0554', 1, 'dentistry', 'image220.png', 1),
(22, 'afeez', 'aazeez748@stu.ui.edu.ng', '7b52009b64fd0a2a49e6d8a939753077792b0554', 1, 'dentistry', 'image220.png', 1),
(23, 'chiling man', 'manolas@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'optics', 'image220.png', 1),
(24, 'doctor phrabz', 'phrabz@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'surgeon', '', 1),
(25, 'Azeez Afeez Olaniyi', 'dnt@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'surgeon', '', 1),
(26, 'doctor phrabz', 'ddd@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'surgeon', '1', 0),
(27, 'last test', 'test@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'surgeon', '1', 0),
(28, 'arizona', 'urzula@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'surgeon', 'imgww001.jpg', 1),
(29, 'qssqsq', 'sqq@d.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'qsqs', 'Array', 1),
(30, 'chilling Res`', 'sqsss@bjasbj.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'dp,dpw', 'coomitError.PNG', 1),
(31, '2wewdw', 'wdwdw@ede.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'optics', 'node upload.jpg', 1),
(32, 'qsqspmqoms', 'sqnskqnk@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'ceeldemcl', 'doc.PNG', 1),
(33, 'wddmlwmdlw', 'wmdwmdmw@emeom.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'eml3melm3e', 'adm.PNG', 1),
(34, 'mohu', 'mou@d.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'optics', 'node upload.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `matchings`
--

CREATE TABLE `matchings` (
  `id` int(11) NOT NULL,
  `start_date` text NOT NULL,
  `end_date` text NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `complaint` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matchings`
--

INSERT INTO `matchings` (`id`, `start_date`, `end_date`, `doctor_id`, `patient_id`, `complaint`, `status`) VALUES
(1, '03-09-2019 ', '05-09-2019', 9, 15, 'bone pain', 0),
(2, '04-09-2019', '08-09-2019', 9, 19, 'bone pain', 0),
(3, '08-09-2019', '10-09-2019', 9, 16, 'joint pain', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sender_type` tinyint(4) NOT NULL,
  `receiver_type` tinyint(4) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `emailAddress` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `imageName` varchar(100) NOT NULL,
  `user_type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `fullName`, `emailAddress`, `password`, `imageName`, `user_type`) VALUES
(14, 'first patient', 'patient@yahoo.com', '7b52009b64fd0a2a49e6d8a939753077792b0554', 'image220.png', 0),
(15, 'Azeez Afeez Olaniyi', 'loccini@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'image220.png', 0),
(16, 'pat', 'pat@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 0),
(17, 'sqsq', 'qsqs@g.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 0),
(18, '2ep,ew,', 'saasaka@de.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 0),
(19, 'mohicans', 'mohi@gamil.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date_created` text NOT NULL,
  `imageName` varchar(100) NOT NULL,
  `slug` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `doctor_id`, `date_created`, `imageName`, `slug`) VALUES
(3, 'cancer resurgence', 'cancer resurgence campaign updated Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 9, 'February 20,2019', 'Chrysanthemum.jpg', 'cancerresurgence'),
(5, 'cardiace tumor', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 9, 'February 20,2019', 'Penguins.jpg', 'dedbkdbkw');

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `sample_problems` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `sample_problems`) VALUES
(1, 'optics', 'eye pain, swollen eye, conjuctivity, long sightedness and short sightedness'),
(2, 'physiotherapy', 'bone pain, general body pain, pain at different joint of the body'),
(3, 'postural defect', 'knocknee,scholiosis, kyphosis and other postural defects'),
(7, 'physiotherapy', '\r\n                                            bone paint, movable joint pain, fractured bone and other joint pains inthe body');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `matchings`
--
ALTER TABLE `matchings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `matchings`
--
ALTER TABLE `matchings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
