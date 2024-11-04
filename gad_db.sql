-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 04:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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



--
-- Dumping data for table `admin_accounts`
--


-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_img` varchar(255) DEFAULT NULL,
  `course_desc` text DEFAULT NULL,
  `course_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `program_id`, `course_name`, `course_img`, `course_desc`, `course_date`) VALUES
(1, 1, 'Course 1', 'SS 4.png', 'freuifbehbeuhdvbedvgvefgdyt', '2024-10-30'),
(2, 1, 'Course 2', 'images.jfif', 'gfhrthrghrbfehgfuewbfhejvchdsvcdscd', '2024-10-31'),
(3, 1, 'Course3', 'Advocacy Campaign (1).png', 'vfdkugyrufgbewjfhevfhgdsfvhsdff', '2024-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `course_sections`
--

CREATE TABLE `course_sections` (
  `section_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_sections`
--

INSERT INTO `course_sections` (`section_id`, `course_id`, `section_name`, `section_content`) VALUES
(1, 1, 'Introduction', 'dtfyugiugiukjbkjguydtydtdtydytdtyd');

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
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learners`
--

INSERT INTO `learners` (`learner_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Harry', 'Potter', 'snsdtifanny28@gmail.com', '$2y$10$Iy6u/KGZgzayjCr3K/aZWe.4Z5G8kauOtH3DyS3kGRXWkIvga9ZUC');

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

-- --------------------------------------------------------

--
-- Table structure for table `post_test_questions`
--

CREATE TABLE `post_test_questions` (
  `post_test_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `correct_option` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_test_questions`
--

CREATE TABLE `pre_test_questions` (
  `pre_test_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `correct_option` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `program_img` varchar(255) DEFAULT NULL,
  `program_desc` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`, `program_img`, `program_desc`, `created_at`) VALUES
(1, 'Program1', 'SS 4.png', 'fregfbuybuybcruyv', '2024-10-21 13:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `seminars`
--

CREATE TABLE `seminars` (
  `seminar_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `seminar_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `venue` varchar(255) NOT NULL,
  `poster_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_accounts`
--

CREATE TABLE `staff_accounts` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'staff',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_accounts`
--

INSERT INTO `staff_accounts` (`staff_id`, `staff_name`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Jhustine Renz', 'Renz', '$2y$10$mrfFKPHJbs.GBcnnXUL8r.Q9j2Cf6vvEbeLV1qy/h24U3AS1NH022', 'staff', '2024-10-21 13:52:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `course_sections`
--
ALTER TABLE `course_sections`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course_videos`
--
ALTER TABLE `course_videos`
  ADD PRIMARY KEY (`course_videos_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `learners`
--
ALTER TABLE `learners`
  ADD PRIMARY KEY (`learner_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `learning_materials`
--
ALTER TABLE `learning_materials`
  ADD PRIMARY KEY (`LM_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `post_test_questions`
--
ALTER TABLE `post_test_questions`
  ADD PRIMARY KEY (`post_test_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `pre_test_questions`
--
ALTER TABLE `pre_test_questions`
  ADD PRIMARY KEY (`pre_test_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `seminars`
--
ALTER TABLE `seminars`
  ADD PRIMARY KEY (`seminar_id`),
  ADD KEY `course_id` (`course_id`);

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
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `LM_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_test_questions`
--
ALTER TABLE `post_test_questions`
  MODIFY `post_test_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_test_questions`
--
ALTER TABLE `pre_test_questions`
  MODIFY `pre_test_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seminars`
--
ALTER TABLE `seminars`
  MODIFY `seminar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_accounts`
--
ALTER TABLE `staff_accounts`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`);

--
-- Constraints for table `course_sections`
--
ALTER TABLE `course_sections`
  ADD CONSTRAINT `course_sections_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `course_videos`
--
ALTER TABLE `course_videos`
  ADD CONSTRAINT `course_videos_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `learning_materials`
--
ALTER TABLE `learning_materials`
  ADD CONSTRAINT `learning_materials_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `post_test_questions`
--
ALTER TABLE `post_test_questions`
  ADD CONSTRAINT `post_test_questions_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `pre_test_questions`
--
ALTER TABLE `pre_test_questions`
  ADD CONSTRAINT `pre_test_questions_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `seminars`
--
ALTER TABLE `seminars`
  ADD CONSTRAINT `seminars_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
