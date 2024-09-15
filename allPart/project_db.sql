-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 21, 2023 at 04:01 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `profile_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `released_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `content`, `profile_id`, `category_id`, `released_date`) VALUES
(11, 'วิธีทำ “ลาบหมู” เมนูอาหารอีสานแซ่บนัวครบรส เด็ดจนข้างบ้านมาขอสูตร! อ่านต่อได้ที่ https://www.wongnai.com/recipes/spicy-minced-pork?ref=ct', 'วัตถุดิบลาบหมู<br />\r\nหมูสับ 300 กรัม<br />\r\nน้ำเปล่า ½ ถ้วย<br />\r\nต้นหอมซอย 2 ต้น<br />\r\nใบสะระแหน่ 2 ต้น<br />\r\nผักชีฝรั่งซอย 2 ต้น<br />\r\nหอมแดงซอย 3 กลีบ<br />\r\nพริกป่น 2 ช้อนโต๊ะ<br />\r\nน้ำปลา 2 ช้อนโต๊ะ<br />\r\nน้ำมะนาว 2 ช้อนโต๊ะ<br />\r\nข้าวคั่ว 2 ช้อนโต๊ะ<br />\r\nน้ำตาล ½ ช้อนชา<br />\r\nพริกแห้งทอดสำหรับตกแต่ง<br />\r\nวิธีทําลาบหมู<br />\r\nSTEP 1 : รวนหมูสับ<br />\r\nใส่น้ำเปล่าลงในหม้อ แล้วใส่หมูสับลงไปรวนให้สุก<br />\r\nTIP : การเติมน้ำลงในเนื้อหมูจะช่วยให้เนื้อหมูฉ่ำไม่แข็งกระด้าง และควรใช้ทัพพีขยี้หมูให้แตกออกจากกัน<br />\r\n<br />\r\nSTEP 2 : ปรุงรสลาบหมู<br />\r\nตักหมูที่รวนแล้วใส่ในชามผสม<br />\r\nใส่เครื่องปรุง พริกป่น น้ำปลา ข้าวคั่ว และน้ำตาล คลุกเค้าให้เข้ากัน<br />\r\nจากนั้นเติมมะนาว ผักชีฝรั่ง หอมแดงซอย ต้มหอม ผักชีฝรั่ง และใบสะระแหน่ จากนั้นคลุกเคล้าให้เข้ากัน<br />\r\nSTEP 3 : จัดเสิร์ฟ<br />\r\nตัก “ลาบหมู” ลงใส่จานที่ต้องการจัดเสิร์ฟ ตกแต่งด้วยพริกแห้งทอด และใบสะระแหน่ กินคู่กับผักเคียง แค่นี้ก็เสร็จแล้ว!<br />\r\nง่ายสุด ๆ กับเมนู “ลาบหมู” เพียงแค่ไม่กี่ขั้นตอน ของก็เตรียมไม่เยอะ แค่นี้เราก็ได้ฟินเหมือนได้ไปกินที่ร้านส้มตำเลยล่ะค่ะ ใครจะแอบเอาสูตรลาบหมูสูตรนี้ไปทำขายเราก็ไม่หวงนะจ้ะ แต่ถ้าเบื่อลาบหมูแบบเดิม ๆ แล้วเราขอแนะนำเป็น “เปาะเปี๊ยะลาบหมู” ก็เด็ดไม่แพ้กัน แถมยังช่วยเพิ่มมูลค่าให้กับเมนูลาบหมูได้ด้วยน้า อ่านต่อได้ที่ https://www.wongnai.com/recipes/spicy-minced-pork?ref=ct', 16, 1, '2023-11-20 12:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'อาหาร'),
(2, 'ความสวยงาม'),
(3, 'เรื่องเล่า'),
(5, 'ขำขัน');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment_describe` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `register_date` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `register_date`, `name`, `email`, `dob`, `status`) VALUES
(13, 11, '2023-11-19 21:43:25', 'test2', '642278w2837@g.siit.tu.ac.th', '2023-11-18', 0),
(14, 12, '2023-11-19 21:53:32', 'Admin_Nat', 'test@gmail.com', '2023-11-03', 1),
(16, 14, '2023-11-20 12:51:04', 'abc', '64227sd82837@g.siit.tu.ac.th', '2023-10-31', 0),
(17, 80848989, '2023-11-20 21:23:32', 'test1234', '64227828ddddsa37@g.siit.tu.ac.th', '2023-11-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `username`, `password`) VALUES
(11, 'test2', 0xa8ef01dda2babcfbe04cb596474915b5),
(12, 'Admin_Nat', 0x1268e73878feab001ff4cc7c1385f4e5),
(14, 'abc', 0xa8ef01dda2babcfbe04cb596474915b5),
(80848989, 'test1234', 0xa8ef01dda2babcfbe04cb596474915b5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `profile_id` (`profile_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `blog_id` (`blog_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80848990;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
