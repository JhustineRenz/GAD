-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 03:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gad_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`admin_id`, `admin_name`, `username`, `password`) VALUES
(1, 'Riazel Lipata', 'Yazirayz', '$2y$10$qDTNkCzcLpL8D6WwUD.lD.71LlCeIuBmDYJZvYp7RyvdlTVPmvJ1i');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_img` text NOT NULL,
  `course_desc` varchar(255) NOT NULL,
  `course_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `program_id`, `course_name`, `course_img`, `course_desc`, `course_date`) VALUES
(1, 1, 'Course 1', 'WIN_20210302_19_18_16_Pro.jpg', 'jashshwhshigwiuedgweihxbwihxiwbeux', '2024-11-03'),
(2, 1, 'Test Course', 'WIN_20210403_19_35_43_Pro.jpg', 'auhsduhwdjkjsdqwuidqwdjqbwdjqhidu', '2024-11-03'),
(3, 2, 'Test Course', 'WIN_20210218_15_31_55_Pro.jpg', 'hdwdkbsxnkjdbiwquedijqwbdkjwdiuwbdie', '2024-11-03'),
(4, 3, 'added course', 'WIN_20210403_19_35_43_Pro.jpg', 'testing couwudhqwdqjwdbwqjdhuqwhdbqjwduiq', '2024-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `course_sections`
--

CREATE TABLE `course_sections` (
  `section_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_sections`
--

INSERT INTO `course_sections` (`section_id`, `course_id`, `section_name`, `section_content`) VALUES
(1, 1, 'Introduction', 'SHUWHSXHSDIUWEIWBHSXIWGEWHBXHWGXIY HEHEHEHEHEHEHEHEHEHEHE 2222');

-- --------------------------------------------------------

--
-- Table structure for table `course_videos`
--

CREATE TABLE `course_videos` (
  `course_videos_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learners`
--

CREATE TABLE `learners` (
  `learner_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learners`
--

INSERT INTO `learners` (`learner_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Jhustine Renz', 'Magsombol', 'jfirstmarasigan@gmail.com', '$2y$10$dv6ptRwbBoe.CBwnOvQHlOFi.Sp6QjfC6.z.CZ34aOayVwXFWOJT2');

-- --------------------------------------------------------

--
-- Table structure for table `learning_materials`
--

CREATE TABLE `learning_materials` (
  `LM_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learning_materials`
--

INSERT INTO `learning_materials` (`LM_id`, `course_id`, `file_title`, `file_path`) VALUES
(1, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(2, 1, '', '../staff/upload/add_learning_materials/cert of enrolment.pdf'),
(3, 1, '', '../staff/upload/add_learning_materials/form 138, grade 10.pdf'),
(4, 1, '', '../staff/upload/add_learning_materials/form 138, grade 8.pdf'),
(5, 1, '', '../staff/upload/add_learning_materials/form 138, grade 9.pdf'),
(6, 1, '', '../staff/upload/add_learning_materials/cert of indigency.pdf'),
(7, 1, '', '../staff/upload/add_learning_materials/cert of indigency.pdf'),
(8, 1, '', '../staff/upload/add_learning_materials/cert of indigency.pdf'),
(9, 1, '', '../staff/upload/add_learning_materials/cert of indigency.pdf'),
(10, 1, '', '../staff/upload/add_learning_materials/cert of indigency.pdf'),
(11, 1, '', '../staff/upload/add_learning_materials/cert of enrolment.pdf'),
(12, 1, '', '../staff/upload/add_learning_materials/cert of enrolment.pdf'),
(13, 1, '', '../staff/upload/add_learning_materials/cert of enrolment.pdf'),
(14, 1, '', '../staff/upload/add_learning_materials/cert of enrolment.pdf'),
(15, 1, '', '../staff/upload/add_learning_materials/cert of enrolment.pdf'),
(26, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(27, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(28, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(29, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(30, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(31, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(32, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(33, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(34, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(35, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(36, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(37, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(38, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(39, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(40, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(41, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(42, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(43, 1, '', '../staff/upload/add_learning_materials/form 137, g11.pdf'),
(44, 1, '', '../staff/upload/add_learning_materials/cert of enrolment.pdf'),
(45, 1, '', '../staff/upload/add_learning_materials/cert of enrolment.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `post_test_questions`
--

CREATE TABLE `post_test_questions` (
  `post_test_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `correct_option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_test_questions`
--

INSERT INTO `post_test_questions` (`post_test_id`, `course_id`, `question_text`, `option_a`, `option_b`, `option_c`, `correct_option`) VALUES
(1, 1, 'what are?', 'haha', 'rerferfef', 'svfdvevevev', 'b'),
(2, 1, 'question 4', 'efwefwcwec', 'ewfwecwdc', 'svfdvevevev', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `pre_test_questions`
--

CREATE TABLE `pre_test_questions` (
  `pre_test_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `correct_option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pre_test_questions`
--

INSERT INTO `pre_test_questions` (`pre_test_id`, `course_id`, `question_text`, `option_a`, `option_b`, `option_c`, `correct_option`) VALUES
(1, 1, 'what is?', 'haha', 'hahaha', 'hahahaha', 'a'),
(2, 1, 'what are?', 'hehe', 'hehehe', 'hehehehe', 'b'),
(3, 1, 'what are?', 'hehe', 'hehehe', 'hehehehe', 'b'),
(4, 1, 'question 4', 'ffdgd', 'rerferfef', 'rferferferf', 'c'),
(5, 1, 'q 5', 'efwed', 'ewfwecwdc', 'gntgn', 'b'),
(6, 1, 'q6', 'dfvfvef', 'sdvevsvsv', 'svfdvevevev', 'd'),
(7, 1, 'q7', 'efwefwcwec', 'efewcwec', 'myumy', 'a'),
(8, 1, 'q8', 'hhgnghn', 'mgmghng', 'ghnghnghn', 'c'),
(9, 1, 'q9', 'sascascasc', 'ascsdfffefe', 'gnnhttnt', 'c'),
(10, 1, 'q10', 'nbnbnbnb', 'hfhfhfhf', 'qqqqq', 'c'),
(11, 1, 'q11', 'wqdqwdq', 'sdvvdfvdv', 'efwefwefw', 'c'),
(12, 1, 'q12', 'wgshwgshsghq', 'whqwhdqwdqjhk', 'wdqwhdqhdkqjd', 'a'),
(14, 1, 'q12', 'wgshwgshsghq', 'whqwhdqwdqjhk', 'wdqwhdqhdkqjd', 'a'),
(15, 2, 'What is...?', 'jj', 'bb', 'kk', 'c'),
(16, 2, 'What is...?', 'jj', 'bb', 'kk', 'c'),
(17, 2, 'what are?', 'efwed', 'sdvevsvsv', 'gntgn', 'b'),
(18, 2, 'what are?', 'efwed', 'sdvevsvsv', 'gntgn', 'b'),
(19, 2, 'question 4', 'dfvfvef', 'hehehe', 'hahahaha', 'a'),
(20, 2, 'question 4', 'dfvfvef', 'hehehe', 'hahahaha', 'a'),
(21, 2, 'what are?', 'hehe', 'hahaha', 'gntgn', 'c'),
(22, 2, 'what are?', 'hehe', 'hahaha', 'gntgn', 'c'),
(23, 2, 'what are?', 'hehe', 'hahaha', 'gntgn', 'c'),
(24, 1, 'q7', 'efwefwcwec', 'efewcwec', 'myumy', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `program_img` text NOT NULL,
  `program_desc` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`, `program_img`, `program_desc`, `created_at`) VALUES
(1, 'Sample Program', 'WIN_20210302_19_18_16_Pro.jpg', 'Sample program description', '0000-00-00 00:00:00'),
(2, 'Sample Program 2', 'WIN_20210218_15_31_55_Pro.jpg', 'uqwuqduhqwjdjqwbdigduqduqjb', '0000-00-00 00:00:00'),
(3, 'Program 3', 'FB_IMG_1570183460728.jpg', 'kwkwkwkwkwkw', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seminars`
--

CREATE TABLE `seminars` (
  `seminar_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `seminar_title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `venue` varchar(255) NOT NULL,
  `poster_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seminars`
--

INSERT INTO `seminars` (`seminar_id`, `course_id`, `seminar_title`, `description`, `date`, `time`, `venue`, `poster_path`) VALUES
(1, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(2, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(3, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(4, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(5, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(6, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(7, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(8, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(9, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(10, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(11, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(12, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(13, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(14, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(15, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(16, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(17, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(18, 1, 'Try langs', 'jahsiawhdui uagdiuqwbxjbaskcnbasihcasbckasbcis sahcajsbckasbcjciasucbkjasbckjascuashckjasbcjashcjasbkcjas', '2024-11-04', '19:49:00', 'bsusdhasuidh ihduihduSUHSHDSHDOSHDOISHDSNXJASIXHASJX', '../staff/upload/seminars/WIN_20210218_15_31_55_Pro.jpg'),
(19, 1, 'TESTING ULITS', 'WWFDEWFEFAEFEFWEFEWFWEF', '2024-11-04', '10:00:00', 'SA BAHAY LANG ', '../staff/upload/seminars/WIN_20210403_19_35_43_Pro.jpg'),
(20, 1, 'TESTING ULITS', 'WWFDEWFEFAEFEFWEFEWFWEF', '2024-11-04', '10:00:00', 'SA BAHAY LANG ', '../staff/upload/seminars/WIN_20210403_19_35_43_Pro.jpg'),
(21, 1, 'TESTING ULITS', 'WWFDEWFEFAEFEFWEFEWFWEF', '2024-11-04', '10:00:00', 'SA BAHAY LANG ', '../staff/upload/seminars/WIN_20210403_19_35_43_Pro.jpg'),
(22, 1, 'TESTING ULITS', 'WWFDEWFEFAEFEFWEFEWFWEF', '2024-11-04', '10:00:00', 'SA BAHAY LANG ', '../staff/upload/seminars/WIN_20210403_19_35_43_Pro.jpg'),
(23, 1, 'TESTING ULITS', 'WWFDEWFEFAEFEFWEFEWFWEF', '2024-11-04', '10:00:00', 'SA BAHAY LANG ', '../staff/upload/seminars/WIN_20210403_19_35_43_Pro.jpg'),
(24, 1, 'TESTING ULITS', 'WWFDEWFEFAEFEFWEFEWFWEF', '2024-11-04', '10:00:00', 'SA BAHAY LANG ', '../staff/upload/seminars/WIN_20210403_19_35_43_Pro.jpg'),
(25, 1, 'TESTING ULITS', 'WWFDEWFEFAEFEFWEFEWFWEF', '2024-11-04', '10:00:00', 'SA BAHAY LANG ', '../staff/upload/seminars/WIN_20210403_19_35_43_Pro.jpg'),
(26, 1, 'TESTING ULITS', 'WWFDEWFEFAEFEFWEFEWFWEF', '2024-11-04', '10:00:00', 'SA BAHAY LANG ', '../staff/upload/seminars/WIN_20210403_19_35_43_Pro.jpg'),
(27, 1, 'TESTING ULITS', 'WWFDEWFEFAEFEFWEFEWFWEF', '2024-11-04', '10:00:00', 'SA BAHAY LANG ', '../staff/upload/seminars/WIN_20210403_19_35_43_Pro.jpg'),
(28, 1, 'TESTING ULITS', 'WWFDEWFEFAEFEFWEFEWFWEF', '2024-11-04', '10:00:00', 'SA BAHAY LANG ', '../staff/upload/seminars/WIN_20210403_19_35_43_Pro.jpg'),
(29, 1, 'TESTING ULITS', 'WWFDEWFEFAEFEFWEFEWFWEF', '2024-11-04', '10:00:00', 'SA BAHAY LANG ', '../staff/upload/seminars/WIN_20210403_19_35_43_Pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff_accounts`
--

CREATE TABLE `staff_accounts` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_accounts`
--

INSERT INTO `staff_accounts` (`staff_id`, `staff_name`, `username`, `password`) VALUES
(1, 'Jhustine R', 'jhustine', '$2y$10$0ALHB6m.U2H7M0R63WMBpuyBBDhapFoO22vn27s9dQ.RSbdEhD28q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_sections`
--
ALTER TABLE `course_sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `course_videos`
--
ALTER TABLE `course_videos`
  ADD PRIMARY KEY (`course_videos_id`);

--
-- Indexes for table `learners`
--
ALTER TABLE `learners`
  ADD PRIMARY KEY (`learner_id`);

--
-- Indexes for table `learning_materials`
--
ALTER TABLE `learning_materials`
  ADD PRIMARY KEY (`LM_id`);

--
-- Indexes for table `post_test_questions`
--
ALTER TABLE `post_test_questions`
  ADD PRIMARY KEY (`post_test_id`);

--
-- Indexes for table `pre_test_questions`
--
ALTER TABLE `pre_test_questions`
  ADD PRIMARY KEY (`pre_test_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `seminars`
--
ALTER TABLE `seminars`
  ADD PRIMARY KEY (`seminar_id`);

--
-- Indexes for table `staff_accounts`
--
ALTER TABLE `staff_accounts`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_sections`
--
ALTER TABLE `course_sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_videos`
--
ALTER TABLE `course_videos`
  MODIFY `course_videos_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learners`
--
ALTER TABLE `learners`
  MODIFY `learner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learning_materials`
--
ALTER TABLE `learning_materials`
  MODIFY `LM_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `post_test_questions`
--
ALTER TABLE `post_test_questions`
  MODIFY `post_test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pre_test_questions`
--
ALTER TABLE `pre_test_questions`
  MODIFY `pre_test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seminars`
--
ALTER TABLE `seminars`
  MODIFY `seminar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `staff_accounts`
--
ALTER TABLE `staff_accounts`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
