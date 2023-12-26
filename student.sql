-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2023 at 10:58 AM
-- Server version: 8.0.35-0ubuntu0.20.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `mid` int NOT NULL,
  `mname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `memail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `password` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`mid`, `mname`, `memail`, `password`) VALUES
(1, 'raman', 'raman@gmail.com', 'raman'),
(2, 'raj', 'raj@chd.com', 'rj'),
(3, '32', '3@2', '32'),
(15, 'sdg', 'adsf@dxv.ghf', 'ff');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `phone` text,
  `qualification` varchar(20) NOT NULL,
  `city` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `m_id` int DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profilepic` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `name`, `email`, `phone`, `qualification`, `city`, `m_id`, `profilepic`) VALUES
(274, 'kumar gaurav', 'abcaa@gmail.com', 'NULL', 'MBA', '', 1, 'd41d8cd98f00b204e9800998ecf8427e.jpeg'),
(276, 'kumar gaurav', 'abc@gmail.com', 'NULL', 'MCA', 'sgdfb', 1, 'd41d8cd98f00b204e9800998ecf8427e.jpeg'),
(278, 'kumar gaurav', 'abhjfc@gmail.com', 'NULL', 'BTECH', '', 1, 'd41d8cd98f00b204e9800998ecf8427e.png'),
(282, 'ghdh yjtyj', 'efg@gmail.com', 'NULL', 'MBA', '', 1, ''),
(284, 'dhtr gaurav', 'abc@gmail.com', 'NULL', 'BBA', '879', 1, 'd41d8cd98f00b204e9800998ecf8427e.png'),
(292, 'kumar gaurav', 'admin@gmail.com', '231564', 'MCA', '', 3, ''),
(331, 'kumar gaurav', 'abc@gmail.com', 'NULL', 'BBA', 'wsd', 1, 'd41d8cd98f00b204e9800998ecf8427e.jpeg'),
(333, 'kumar yjtyj', 'abc@gmail.com', 'NULL', 'MCA', '', 1, ''),
(335, 'roshan raj', 'a@b.cc', 'NULL', 'BCA', 'def', 1, ''),
(338, 'kumar gaurav', 'abc@gmail.com', 'NULL', 'BBA', '', 1, ''),
(339, 'kumar gaurav', 'abc@gmail.com', '6564564211', 'MBA', '', 1, ''),
(340, 'kumar gaurav', 'abc@gmail.com', 'NULL', 'MCA', '', 1, ''),
(357, 'kumar gaurav', '23abc@gmail.com', 'NULL', 'MBA', '', 2, 'd41d8cd98f00b204e9800998ecf8427e.png'),
(359, ' gaurav', 'ablic@gmail.com', 'NULL', 'MBA', '', 2, ''),
(361, ' ', '1fgvabc@gmail.com', 'NULL', 'BTECH', '', 2, ''),
(362, 'kumar gaurav', 'cbaabc@gmail.com', 'NULL', 'BTECH', '', 2, 'd41d8cd98f00b204e9800998ecf8427e.jpeg'),
(363, 'kumar gaurav', 'abc@gmail.com', 'NULL', 'MCA', '', 2, ''),
(365, 'kumar yjtyj', 'sabc@gmail.com', 'NULL', 'MCA', '', 2, ''),
(366, 'kumar gaurav', 'def@gmail.com', 'NULL', 'MBA', '', 2, ''),
(369, 'kumar gaurav', 'xyz@gmail.com', 'NULL', 'BBA', '', 2, ''),
(373, 'kumar gaurav', 'abc@gmail.com', 'NULL', 'MBA', '', 2, ''),
(376, 'kumar gaurav', 'def@gmail.com', 'NULL', 'MBA', '', 2, ''),
(377, 'kumar gaurav', 'adc@gmail.com', 'NULL', 'BTECH', '', 2, ''),
(379, 'kumar gaurav', 'mno@gmail.co', 'NULL', 'MBA', '', 2, ''),
(380, 'kumar gaurav', 'admin@gmail.com', 'NULL', 'MCA', '', 2, ''),
(382, 'kumar gaurav', 'asd@chd.co', 'NULL', 'MCA', '', 2, ''),
(383, 'kumar gaurav', 'abwdc@gmail.com', 'NULL', 'MCA', '', 2, ''),
(385, 'gfb rgbtrnb', 'efgh@gmail.com', 'NULL', 'BBA', '', 1, ''),
(386, 'gfb rgbtrnb', 'efgh@gmail.com', 'NULL', 'BBA', '', 1, ''),
(387, 'kumar rthtrh', 'admiadsn@gmail.com', 'NULL', 'BBA', '', 1, ''),
(388, 'kumar rthtrh', 'admiadsn@gmail.com', 'NULL', 'BBA', '', 1, ''),
(391, 'gfb yjtyj', 'ruytru4ru@gmail.com', 'NULL', 'MBA', '', 1, ''),
(395, 'kumar gaurav', 'abewfc@gmail.com', 'NULL', 'BTECH', '', 2, ''),
(397, 'kumar gaurav', 'absdc@gmail.com', '3254534536', 'MBA', '', 2, ''),
(398, 'kumar gaurav', 'abfc@gmail.com', '6564564211', 'MCA', 'trhtr', 2, ''),
(399, 'rgerg ergerd', 'abergc@gmail.com', '2343653463', 'MBA', 'ranchi', 2, ''),
(400, 'kumar regher', 'ruy@gmail.com', '6564564211', 'MBA', '', 2, ''),
(403, 'kumar gaurav', 'a34bc@gmail.com', 'NULL', 'MCA', '', 2, ''),
(405, 'kumar gaurav', 'efg1@gmail.com', 'NULL', 'MCA', '', 2, ''),
(406, 'kumar gaurav', 'efg1@gmail.com', 'NULL', 'MCA', '', 2, ''),
(407, 'kumar gaurav', 'efg1@gmail.com', 'NULL', 'MCA', '', 2, ''),
(408, 'kumar rgbtrnb', 'denf@gmail.com', 'NULL', 'BTECH', '', 2, ''),
(409, 'kumar rgbtrnb', 'denf@gmail.com', 'NULL', 'BTECH', '', 2, ''),
(410, 'hj h', 'atrbc@gmail.com', 'NULL', 'MCA', '', 2, ''),
(411, 'hj tyu', 'atrbjjc@gmail.com', 'NULL', 'MCA', '', 2, ''),
(412, 'kumar gaurav', 'derghf@gmail.com', 'NULL', 'BBA', '', 2, ''),
(413, 'kumar gaurav', 'abcert@gmail.com', 'NULL', 'MCA', '', 2, ''),
(414, 'kumar gaurav', 'abcert@gmail.com', 'NULL', 'MCA', '', 2, ''),
(415, 'kumar gaurav', 'admtyuin@gmail.com', 'NULL', 'BCA', '', 2, ''),
(416, 'kumar gaurav', 'admtyuin@gmail.com', 'NULL', 'BCA', '', 2, ''),
(417, 'kumar gaurav', 'admtyuin@gmail.com', 'NULL', 'BCA', '', 2, ''),
(418, 'kumar gaurav', 'admgfin@gmail.com', 'NULL', 'BTECH', '', 2, ''),
(419, 'kumar gaurav', 'dghef@gmail.com', 'NULL', 'BBA', '', 2, ''),
(420, 'gr gr', 'admrgin@gmail.com', 'NULL', 'BTECH', '', 2, ''),
(421, 'dfgb fdb', 'adminbfdf@gmail.com', 'NULL', 'BTECH', '', 2, ''),
(422, 'dfgb fdb', 'adminbfdf@gmail.com', 'NULL', 'BTECH', '', 2, ''),
(423, 'dfgb fdb', 'adminbfdf@gmail.com', 'NULL', 'BTECH', '', 2, ''),
(424, 'dfgb fdb', 'adminbfdf@gmail.com', 'NULL', 'BTECH', '', 2, ''),
(425, 'kumar saurav', 'de31f@gmail.com', 'NULL', 'BCA', '', 2, ''),
(426, 'kumar saurav', 'de31f@gmail.com', 'NULL', 'BCA', '', 2, ''),
(427, 'gfb yjtyj', 'ab6c@gmail.com', 'NULL', 'BCA', '', 2, ''),
(428, 'gfb yjtyj', 'ab6c@gmail.com', 'NULL', 'BCA', '', 2, ''),
(429, 'kumar gaurav', 'de2f@gmail.com', 'NULL', 'MBA', '', 2, ''),
(430, 'kumar gaurav', 'de2f@gmail.com', 'NULL', 'MBA', '', 2, ''),
(431, 'kumar gaurav', 'abfhc@gmail.com', 'NULL', 'MBA', '', 2, ''),
(432, 'kumar gaurav', 'abfhc@gmail.com', 'NULL', 'MBA', '', 2, ''),
(433, 'ghdh rthtrh', 'efgdsf@gmail.com', 'NULL', 'MCA', '', 2, ''),
(434, 'ghdh rthtrh', 'efgdsf@gmail.com', 'NULL', 'MCA', '', 2, ''),
(437, 'kumar saurav', 'admidfbvn@gmail.com', 'NULL', 'MBA', '', 2, ''),
(439, 'kumar gaurav', 'abc1@gmail.com', 'NULL', 'MBA', '', 2, ''),
(441, 'kumar gaurav', 'abyc@gmail.com', 'NULL', 'BBA', '', 2, NULL),
(442, 'kumar rthtrh', 'admin12@gmail.com', 'NULL', 'MBA', '', 2, NULL),
(446, 'kumar gaurav', 'ruytruyuru@gmail.com', 'NULL', 'MCA', '', 2, ''),
(450, 'sger ergerg', 'abgfc@gmfail.com', 'NULL', 'MBA', '', 2, ''),
(451, 'sger ergerg', 'abc@gmfail.com', 'NULL', 'MBA', '', 2, ''),
(452, 'kumar gaurav', 'dsgf@dfv.gh', 'NULL', 'MCA', '', 2, ''),
(469, ' ', '', 'NULL', '', '', 1, ''),
(470, ' ', '', 'NULL', '', '', 1, ''),
(471, ' ', '', 'NULL', '', '', 1, ''),
(472, ' ', '', 'NULL', '', '', 1, ''),
(473, ' ', '', 'NULL', '', 'dfbdfh', 1, ''),
(474, 'fdhgdfh hgfgfh', 'fbh@fgb.tg', '3463463454', '', 'ghh', 1, ''),
(475, 'hth etrht', 'trhrth', 'NULL', 'MCA', '', 1, ''),
(476, ' ', 'wefwef', 'NULL', 'MBA', '', 1, ''),
(477, ' ', 'y544y', 'NULL', '', '', 1, ''),
(478, ' ', 'hrertyher', 'NULL', '', '', 1, ''),
(479, ' ', 'ghntyj', 'NULL', '', '', 1, ''),
(480, ' ', 'thtyhjj', 'NULL', '', '', 1, ''),
(481, ' ', '', 'NULL', '', '', 2, ''),
(483, ' ', '', 'NULL', '', '', 2, ''),
(484, 'kumar gaurav', 'abc@gmail.com', 'NULL', 'MBA', '', 2, ''),
(485, 'kumar rgbtrnb', 'abc@gmail.com', 'NULL', 'MCA', '', 2, ''),
(488, ' ', '', 'NULL', '', '', 2, ''),
(489, ' ', '', 'NULL', '', '', 2, ''),
(490, ' ', '', 'NULL', '', '', 2, ''),
(491, ' ', '', 'NULL', '', '', 2, ''),
(492, 'kumar yjtyj', 'abc@gmail.com', 'NULL', 'BTECH', '', 2, 'd41d8cd98f00b204e9800998ecf8427e.jpeg'),
(493, 'eferbrb rthtrh', 'abc@gmail.com', 'NULL', 'BBA', '', 2, ''),
(494, 'eferbrb rthtrh', 'abc@gmail.com', 'NULL', 'BBA', '', 2, ''),
(495, 'kumar gaurav', 'abc@gmail.com', 'NULL', 'BTECH', '', 2, ''),
(496, 'kumar gaurav', 'abc@gmail.com', 'NULL', 'BTECH', '', 2, ''),
(497, 'kumar gaurav', 'abc@gmail.com', 'NULL', 'MBA', '', 2, 'd41d8cd98f00b204e9800998ecf8427e.png'),
(498, 'dfgtrh gaurav', 'abc@gmail.com', 'NULL', 'MBA', '', 2, ''),
(499, 'dfgtrh gaurav', 'abc@gmail.com', 'NULL', 'MBA', '', 2, ''),
(500, 'kumar rthtrh', 'abc@gmail.com', 'NULL', 'MBA', '', 2, ''),
(501, ' ', '', 'NULL', '', '', 2, ''),
(502, 'kumar gaurav', 'abc@gmail.com', 'NULL', 'BBA', '', 2, ''),
(503, 'kumar gaurav', 'abc@gmail.com', 'NULL', 'MBA', '', 2, ''),
(504, 'kumar gaurav', 'abc@gmail.com', 'NULL', 'MBA', '', 2, ''),
(505, 'kumar regher', 'abc@gmail.com', 'NULL', 'MBA', '', 2, NULL),
(506, 'kumar gaurav', 'gf23abc@gmail.com', 'NULL', 'MCA', '', 1, 'd41d8cd98f00b204e9800998ecf8427e.png'),
(507, 'eferbrb rgbtrnb', 'abc@gmail.co', '6564564211', 'MCA', '', 1, 'd41d8cd98f00b204e9800998ecf8427e.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_id` (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `mid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `mentors` (`mid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
