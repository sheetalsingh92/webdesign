-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 16, 2017 at 09:19 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `las`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `course_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) DEFAULT '1',
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(100) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'Web Development'),
(2, 'Music'),
(3, 'Art'),
(4, 'Business'),
(5, 'Management'),
(6, 'Coffee'),
(7, 'Software Dev'),
(8, 'Cooking');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(100) NOT NULL,
  `course_cat` int(100) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_desc` varchar(500) NOT NULL,
  `course_price` int(100) NOT NULL,
  `course_image` text NOT NULL,
  `course_keywords` text NOT NULL,
  `course_video` varchar(100) NOT NULL,
  `course_rate` int(10) NOT NULL,
  `instructor` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_cat`, `course_title`, `course_desc`, `course_price`, `course_image`, `course_keywords`, `course_video`, `course_rate`, `instructor`) VALUES
(3, 1, 'The Web Developer Bootcamp\r\n', 'The only course you need to learn web development - HTML, CSS, JS, Node, and More!', 200, 'webCourse.jpg', 'Web', '', 5, 'Brad Schiff'),
(4, 2, 'Game Music Composition: Make Music For Games From Scratch', 'Learn to compose music for any and every type of video game, from complete beginner to competent game music composer', 200, 'musicCourse.jpg', 'music', '', 5, 'Karleen Heong'),
(5, 3, 'Character Design For Animation in Illustrator', 'Design Memorable Character With a Strong Personality and Learn How to Prepare them for Animation', 20, 'designCourse.jpg', 'design', '', 4, '2D Animation 101 Courses'),
(6, 5, 'Management Skills: Essentials for The New Manager', 'Management Skills Certification in Leading People, Teams & Process Improvement', 100, 'managementCourse.jpg', 'management', '', 3, 'Brad Schiff'),
(7, 6, 'Become a Coffee Expert: How to Make the Perfect Cup', 'Learn from coffee expert Richard Hardwick about the history of coffee, grinding and how to brew the perfect cup', 20, 'coffeeCourse.jpg', 'coffee', '', 5, 'Expert Academy'),
(8, 4, 'The Ultimate Business Communication Course', 'Everything You Need to Master Business Communication in One Course!\r\n', 100, 'businessCourse.jpg', 'business', '', 5, 'Paulo Braga'),
(9, 3, 'Learn to Draw Pretty Faces for Comic Books', 'Go from drawing good faces to draw drop dead gorgeous faces for comics\r\n', 40, 'artCourse.jpg', 'art', '', 4, 'Neil Fontaine'),
(10, 7, 'The Best Software Testing Training You Will Ever Get!', 'QA Software Testing Training Course for ALL + Live Project + JIRA + Bugzilla + qTest + Resume and Interview Guidance', 100, 'softwareCourse.jpg', 'software', '', 4, 'Vijay Shinde'),
(11, 1, 'Web Design for Beginners: Real World Coding in HTML & CSS', 'Launch a career as a web designer by learning HTML5, CSS3, responsive design, Sass, cross device compatibility and more!', 100, 'course1.jpg', 'web', '', 3, 'Brad Schiff'),
(12, 1, 'C# Basics for Beginners: Learn C# Fundamentals by Coding', 'Learn C# and programming mindset using high-quality, bite-sized videos with real-world examples and lots of exercises.', 100, 'course5.jpg', 'web', 'http://127.0.0.1/LMS/admin/course_videos/$course_video', 4, 'Brad Schiff'),
(13, 1, 'The Complete ASP.NET MVC 5 Course', 'Learn to build and deploy fast and secure web applications with ASP.NET MVC 5', 100, 'course3.jpg', 'web', 'http://127.0.0.1/LMS/admin/course_videos/$course_video', 5, 'Mosh Hamedani');

-- --------------------------------------------------------

--
-- Table structure for table `course_customer`
--

CREATE TABLE `course_customer` (
  `review_id` int(100) DEFAULT NULL,
  `course_id` int(100) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_customer`
--

INSERT INTO `course_customer` (`review_id`, `course_id`, `customer_id`) VALUES
(NULL, 3, 11),
(NULL, 3, 25),
(NULL, 4, 11),
(NULL, 5, 11),
(NULL, 7, 11),
(NULL, 8, 11),
(NULL, 8, 25),
(NULL, 11, 37),
(1, 3, 1),
(2, 4, 2),
(3, 5, 3),
(4, 6, 4),
(5, 7, 1),
(6, 13, 2),
(7, 12, 3),
(8, 11, 4),
(9, 10, 1),
(11, 8, 3),
(12, 3, 2),
(13, 12, 2),
(14, 10, 2),
(15, 9, 2),
(18, 8, 37);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_username` text NOT NULL,
  `customer_image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_ip`, `customer_name`, `customer_password`, `customer_email`, `customer_username`, `customer_image`) VALUES
(1, '::1', 'ds', '1234', 'a@gmail.com', 'csd', 'customer2.jpg'),
(2, '::1', 'Zhan Zhang', '1234', 'zhangzhan0926@gmail.com', 'zhangzhan', 'customer3.jpg'),
(3, '::1', 'test', '1234', 'test@gmail.com', 'test', 'customer1.jpg'),
(4, '::1', 'abc', '1234', 'abc@gmail.com', 'abc', 'customer4.jpg'),
(6, '::1', 'sheetal', 'Shitu522@', 'sghhff@gmail.com', 'sheetal', 'customer2.jpg'),
(13, '::1', '123', '123', '123@12z', '123', 'customer4.jpg'),
(17, '::1', 'asdf', '1234', 'asdf@gmail.com', 'asdf', 'customer3.jpg'),
(37, '::1', 'we', '1234', 'we@gmail.com', 'we', 'image3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(100) NOT NULL,
  `rating` int(10) NOT NULL,
  `reviews` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `rating`, `reviews`) VALUES
(1, 5, 'Excellent course the Instructor was clear concise and above all, used modern real world examples, since finishing the course my knowledge on CSS has increased exponentially.'),
(2, 5, 'This course will definitely help you create the website you want to create. I learned everything i was expecting to learn from this course. The instructor is thorough and explains things clearly. '),
(3, 4, 'I started the course with Zero knowledge in Html & CSS, at the end of course i am pretty confident how to create a page and effects to it.Overall the course was awesome. '),
(4, 5, 'The teacher was easy to listen to. He explained everything clearly. It was very easy to stay focused and learn.'),
(5, 3, 'I love this guys teaching style and how he makes everything clear.'),
(6, 4, 'THE COURSE IS EXCELLENT. THE INTRUCTIONS ARE CLEAR. THE PRESENTER IS A TERRIFIC TEACHER.'),
(7, 4, 'the amazing part is at the end part of the course because the instructor tells you some amazing tips and tricks you can use to make your work easier and faster'),
(8, 5, 'Best teacher out there.\r\nHe is obviously very smart yet humble.\r\nVery clear voice and concise.'),
(9, 3, 'I can only speak to the video as I have not tried the exercises directly or accessed resources associated with the course.'),
(10, 4, 'The tutorial was very helpful to know more about CSS concepts. It provides an in depth knowledge and very useful. Can add assignments/exercises for practice.'),
(11, 5, 'I thought I was purchasing a true beginner\'s course but I was beyond amazed with what I learned.'),
(12, 4, 'Very well-explained, builds confidence of the learner. Keep up the good work. Thanks a lot.'),
(13, 4, 'A great course for HTML and CSS with a little perspective in design. If I were to suggest something that would improve the course it would be the adding of slides/notes for important tips during each lesson.'),
(14, 5, 'This course is good.'),
(18, 3, 'not so bad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_customer`
--
ALTER TABLE `course_customer`
  ADD PRIMARY KEY (`course_id`,`customer_id`),
  ADD KEY `review_foreign` (`review_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
