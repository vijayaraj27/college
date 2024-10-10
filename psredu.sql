-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 04:27 AM
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
-- Database: `psredu`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `label` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `features` longtext DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `video_id` varchar(191) DEFAULT NULL,
  `button_text` varchar(191) DEFAULT NULL,
  `mission_title` varchar(191) DEFAULT NULL,
  `mission_desc` text DEFAULT NULL,
  `mission_icon` varchar(191) DEFAULT NULL,
  `mission_image` text DEFAULT NULL,
  `vision_title` varchar(191) DEFAULT NULL,
  `vision_desc` text DEFAULT NULL,
  `vision_icon` varchar(191) DEFAULT NULL,
  `vision_image` text DEFAULT NULL,
  `value_title` varchar(191) DEFAULT NULL,
  `value_desc` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `language_id`, `label`, `title`, `short_desc`, `description`, `features`, `attach`, `video_id`, `button_text`, `mission_title`, `mission_desc`, `mission_icon`, `mission_image`, `vision_title`, `vision_desc`, `vision_icon`, `vision_image`, `value_title`, `value_desc`, `status`, `created_at`, `updated_at`, `department_id`) VALUES
(1, 1, 'PSR Engineering College', 'About PSR', '<p>This is the short Description</p>', '<p>P.S.R. Engineering College, Sivakasi an Autonomous institution affiliated to Anna University is one among the best educational institutions in Tamilnadu and philanthropic institution founded by illustrious sons of P.S.Ramasamy Naidu. It was established in the year 1998 with the noble mission to promote engineering education in the backward area of Virudhunagar District. PSREC institution is committed to scripting a unique chapter of excellent education and research, in vital fields like Engineering, IT and Management.</p>\r\n<p><br /><strong>The college offers Engineering Education to men and women at UG and PG levels and brings out the total personality.</strong></p>', 'null', 'home_why_img_1705518108.jpg', NULL, NULL, 'Our Mission', '<ul class=\"weblist\">\r\n<li>To create an ambiance for quality learning experience by providing sustained care and facilities.</li>\r\n<li>To offer higher level training encompassing both theory and practices with human and social values.</li>\r\n<li>To provide knowledge based services and professional skills to adapt tomorrow&rsquo;s technology and embedded global changes.</li>\r\n</ul>', NULL, NULL, 'Our Vision', '<p>To contribute to society through excellence in technical education with societal values and thus a valuable resource for industry and the humanity.</p>', NULL, NULL, 'Our Values', '<ul class=\"weblist\">\r\n<li><a href=\"https://psr.edu.in/wp-content/uploads/2020/08/Quality.pdf\" target=\"_blank\" rel=\"noopener\">Quality</a></li>\r\n<li><a href=\"https://psr.edu.in/wp-content/uploads/2020/08/Teamwork.pdf\" target=\"_blank\" rel=\"noopener\">Teamwork</a></li>\r\n<li><a href=\"https://psr.edu.in/wp-content/uploads/2020/08/Transparency-Integrity.pdf\" target=\"_blank\" rel=\"noopener\">Transparency &amp; Integrity</a></li>\r\n<li><a href=\"https://psr.edu.in/wp-content/uploads/2020/08/Societal-Services.pdf\" target=\"_blank\" rel=\"noopener\">Societal Services</a></li>\r\n<li><a href=\"https://psr.edu.in/wp-content/uploads/2020/08/Woman-Empowerment.pdf\" target=\"_blank\" rel=\"noopener\">Woman Empowerment</a></li>\r\n</ul>', 1, '2023-08-24 16:17:46', '2024-02-29 02:37:05', 0),
(2, 1, 'PSR Engineering College', '', NULL, '                            <p>\r\n                                P.S.R. Engineering College, Sivakasi an Autonomous institution affiliated to Anna University is one among the best educational institutions in Tamilnadu and philanthropic institution founded by illustrious sons of P.S.Ramasamy Naidu. It was established in the year 1998 with the noble mission to promote engineering education in the backward area of Virudhunagar District. PSREC institution is committed to scripting a unique chapter of excellent education and research, in vital fields like Engineering, IT and Management.\r\n                                <br/>\r\n                                <b>The college offers Engineering Education to men and women at UG and PG levels and brings out the total personality.</b>\r\n                            </p> ', 'null', 'home_why_img_1705518108.jpg', NULL, NULL, 'Our Mission', '<ul class=\"weblist\">\r\n<li>To create an ambiance for quality learning experience by providing sustained care and facilities.</li>\r\n<li>To offer higher level training encompassing both theory and practices with human and social values.</li>\r\n<li>To provide knowledge based services and professional skills to adapt tomorrow&rsquo;s technology and embedded global changes.</li>\r\n</ul>', NULL, NULL, 'Our Vision', '<p>To contribute to society through excellence in technical education with societal values and thus a valuable resource for industry and the humanity.</p>', NULL, NULL, 'Our Values', '<ul class=\"weblist\">\r\n<li><a href=\"https://psr.edu.in/wp-content/uploads/2020/08/Quality.pdf\" target=\"_blank\" rel=\"noopener\">Quality</a></li>\r\n<li><a href=\"https://psr.edu.in/wp-content/uploads/2020/08/Teamwork.pdf\" target=\"_blank\" rel=\"noopener\">Teamwork</a></li>\r\n<li><a href=\"https://psr.edu.in/wp-content/uploads/2020/08/Transparency-Integrity.pdf\" target=\"_blank\" rel=\"noopener\">Transparency &amp; Integrity</a></li>\r\n<li><a href=\"https://psr.edu.in/wp-content/uploads/2020/08/Societal-Services.pdf\" target=\"_blank\" rel=\"noopener\">Societal Services</a></li>\r\n<li><a href=\"https://psr.edu.in/wp-content/uploads/2020/08/Woman-Empowerment.pdf\" target=\"_blank\" rel=\"noopener\">Woman Empowerment</a></li>\r\n</ul>', 1, '2023-08-24 16:17:46', '2024-01-17 20:59:59', 9),
(3, 1, 'sfsdfsdfsd', 'sdfdsfsd', '<p>dfdsfdssdfsdfsds</p>', '<p>dfsdsdsds</p>', 'null', NULL, NULL, NULL, 'dfsdsdsds', '<p>dfsdsdsds</p>', NULL, NULL, 'dfsdsdsds', '<p>dfsdsdsds</p>', NULL, NULL, NULL, NULL, 1, '2024-02-28 07:07:41', '2024-02-28 07:07:41', 3);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_no` varchar(191) DEFAULT NULL,
  `batch_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `apply_date` date DEFAULT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `mother_name` varchar(191) DEFAULT NULL,
  `father_occupation` varchar(191) DEFAULT NULL,
  `mother_occupation` varchar(191) DEFAULT NULL,
  `father_photo` text DEFAULT NULL,
  `mother_photo` text DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `present_province` int(10) UNSIGNED DEFAULT NULL,
  `present_district` int(10) UNSIGNED DEFAULT NULL,
  `present_village` text DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_province` int(10) UNSIGNED DEFAULT NULL,
  `permanent_district` int(10) UNSIGNED DEFAULT NULL,
  `permanent_village` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `gender` int(11) NOT NULL COMMENT '1 Male, 2 Female & 3 Other',
  `dob` date NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `emergency_phone` varchar(191) DEFAULT NULL,
  `religion` varchar(191) DEFAULT NULL,
  `caste` varchar(191) DEFAULT NULL,
  `mother_tongue` varchar(191) DEFAULT NULL,
  `marital_status` int(11) DEFAULT NULL,
  `blood_group` int(11) DEFAULT NULL,
  `nationality` varchar(191) DEFAULT NULL,
  `national_id` varchar(191) DEFAULT NULL,
  `passport_no` varchar(191) DEFAULT NULL,
  `school_name` text DEFAULT NULL,
  `school_exam_id` varchar(191) DEFAULT NULL,
  `school_graduation_field` varchar(191) DEFAULT NULL,
  `school_graduation_year` varchar(191) DEFAULT NULL,
  `school_graduation_point` varchar(191) DEFAULT NULL,
  `collage_name` text DEFAULT NULL,
  `collage_exam_id` varchar(191) DEFAULT NULL,
  `collage_graduation_field` varchar(191) DEFAULT NULL,
  `collage_graduation_year` varchar(191) DEFAULT NULL,
  `collage_graduation_point` varchar(191) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 Rejected, 1 Pending, 2 Approve',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `registration_no`, `batch_id`, `program_id`, `apply_date`, `first_name`, `last_name`, `father_name`, `mother_name`, `father_occupation`, `mother_occupation`, `father_photo`, `mother_photo`, `country`, `present_province`, `present_district`, `present_village`, `present_address`, `permanent_province`, `permanent_district`, `permanent_village`, `permanent_address`, `gender`, `dob`, `email`, `phone`, `emergency_phone`, `religion`, `caste`, `mother_tongue`, `marital_status`, `blood_group`, `nationality`, `national_id`, `passport_no`, `school_name`, `school_exam_id`, `school_graduation_field`, `school_graduation_year`, `school_graduation_point`, `collage_name`, `collage_exam_id`, `collage_graduation_field`, `collage_graduation_year`, `collage_graduation_point`, `photo`, `signature`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '10000001', NULL, 4, '2023-02-13', 'Judah', 'Bryant', 'Ira Preston', 'Reuben Cooper', 'Explicabo Reiciendi', 'Earum aliquid vel au', NULL, NULL, NULL, 2, 7, NULL, 'Hic rem consequat A', 4, 12, NULL, 'Corrupti sapiente l', 2, '1982-02-08', 'haca@mailinator.com', '+1 (366) 959-1883', NULL, NULL, NULL, NULL, 1, 5, NULL, '21879584857', '878454545454', 'Penelope Mack', '5487854', NULL, '2004', '99.3', 'Genevieve Hammond', '6787877', NULL, '2006', '78.8', 'staff1_1664732856_1676308260.jpg', 'book_covers.jpg_1664732856_1676308260.jpg', 1, 1, NULL, '2023-02-13 11:11:00', '2023-02-13 11:11:00'),
(2, '10000002', NULL, 2, '2023-02-13', 'Jerome', 'Sellers', 'Laurel Evans', 'Carlos Hess', 'Id explicabo Repel', 'Adipisicing reiciend', NULL, NULL, NULL, 3, 11, NULL, 'Eius duis debitis no', 2, 7, NULL, 'Quasi magna id dolo', 1, '1998-01-21', 'loxut@mailinator.com', '+1 (431) 155-5046', NULL, NULL, NULL, NULL, 2, 4, NULL, '878654548', '258897878', 'Dorian Cortez', '356897', NULL, '2009', '68.3', 'Tobias Love', '899564', NULL, '2010', '67.8', 'staff2_1664711842_1676308347.jpg', 'book_cover2.jpg_1664711842_1676308347.jpg', 0, 1, 1, '2023-02-13 11:12:27', '2023-02-13 11:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `application_settings`
--

CREATE TABLE `application_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `title` text DEFAULT NULL,
  `header_left` text DEFAULT NULL,
  `header_center` text DEFAULT NULL,
  `header_right` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `footer_left` text DEFAULT NULL,
  `footer_center` text DEFAULT NULL,
  `footer_right` text DEFAULT NULL,
  `logo_left` text DEFAULT NULL,
  `logo_right` text DEFAULT NULL,
  `background` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_settings`
--

INSERT INTO `application_settings` (`id`, `slug`, `title`, `header_left`, `header_center`, `header_right`, `body`, `footer_left`, `footer_center`, `footer_right`, `logo_left`, `logo_right`, `background`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admission', 'Apply to admission on our university', NULL, NULL, NULL, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\',</p>', NULL, NULL, NULL, 'logo_1664613886_1676307947.jpg', 'logo_1664613886_1676307947.jpg', NULL, 1, '2023-02-13 11:05:47', '2023-02-13 11:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `semester_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `total_marks` decimal(5,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `assign_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `faculty_id`, `program_id`, `session_id`, `semester_id`, `section_id`, `subject_id`, `title`, `description`, `total_marks`, `start_date`, `end_date`, `attach`, `status`, `assign_by`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 3, 1, 1, 6, 'Theory of relativity', '<p>The theory of relativity usually encompasses two interrelated theories by Albert Einstein: special relativity and general relativity, proposed and published in 1905 and 1915, respectively. Special relativity applies to all physical phenomena in the absence of gravity</p>', 10.00, '2022-10-03', '2022-10-03', 'book-cover2_1664817002.jpg', 1, 1, '2022-10-03 11:10:02', '2022-10-03 12:57:10'),
(2, 2, 2, 4, 1, 1, 5, 'Measurement and Height', '<p>To convert your height to its metric equivalent, start by calculating your height in inches only. A person who\'s 5 feet, 6 inches tall is 66 inches. One inch equals 2.54 centimeters (cm). So, to make the conversion, simply</p>', 10.00, '2022-10-03', '2022-10-21', 'book-covers_1664817184.jpg', 1, 1, '2022-10-03 11:13:04', '2022-10-03 12:56:58'),
(3, 2, 3, 4, 0, 0, 3, 'Rules of Article', '<p>Rule 1 &ndash; The very basic rule of the article says that the article \'the\' is used before a singular or plural noun, which is specific. It indicates a particular ...</p>', 10.00, '2022-10-04', '2022-10-08', NULL, 1, 1, '2022-10-04 06:53:42', '2022-10-04 06:55:45'),
(5, 2, 3, 4, 0, 0, 3, 'Rules of voice change', '<p>Active and Passive Voice Rules in English Grammar, Examples and Exercise, General Rules. ... The Rules to Change the Sentences from Active to Passive Form</p>', 10.00, '2022-10-04', '2022-10-13', NULL, 1, 1, '2022-10-04 07:05:34', '2022-10-04 07:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `call_to_actions`
--

CREATE TABLE `call_to_actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `bg_image` text DEFAULT NULL,
  `button_text` varchar(191) DEFAULT NULL,
  `button_link` varchar(191) DEFAULT NULL,
  `video_id` varchar(191) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `call_to_actions`
--

INSERT INTO `call_to_actions` (`id`, `language_id`, `title`, `sub_title`, `image`, `bg_image`, `button_text`, `button_link`, `video_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Scholarship Programs', 'At PSR Engineering College, we prepare you to launch your career by providing a supportive, creative, and professional environment from which to learn practical skills.', NULL, NULL, 'PSR Engineering College', 'http://localhost/college/department/', NULL, 1, '2023-08-24 16:01:48', '2024-01-17 20:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `faculty` varchar(191) DEFAULT NULL,
  `semesters` varchar(191) DEFAULT NULL,
  `credits` varchar(191) DEFAULT NULL,
  `courses` varchar(191) DEFAULT NULL,
  `duration` varchar(191) DEFAULT NULL,
  `fee` double(10,2) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `language_id`, `title`, `slug`, `faculty`, `semesters`, `credits`, `courses`, `duration`, `fee`, `description`, `attach`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Public Administration', 'public-administration', 'Political Science', '12', '134', '60', '4 Years', 1250.00, '<p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia quaed inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Aelltes port lacus quis enim var sed efficitur turpis gilla sed sit amet finibus eros. Lorem Ipsum is simply dummy text of the printing.</p>\r\n<p>The world of search engine optimization is complex and ever-changing, but you can easily understand the basics, and even a small amount of SEO knowledge can make a big difference. Free SEO education is also widely available on the web, including in guides like this! (Woohoo!) This guide is designed to describe all major aspects of SEO, from finding the terms and phrases (keywords) that can generate qualified traffic to your website, to making your site friendly to search engines, to building links and marketing the unique value of your site.Etiam pharetra erat sed fermentum feugiat velit mauris egestas quam ut erat justo.</p>\r\n<h4>What You Will Learn</h4>\r\n<p>Fusce eleifend donec sapien sed phase lusa pellentesque lacus.Vivamus lorem arcu semper duiac. Cras ornare arcu avamus nda leo Etiam ind arcu. Morbi justo mauris tempus pharetra interdum at congue semper purus. Lorem ipsum dolor sit.The world of search engine optimization is complex and ever-changing, but you can easily understand the basics.</p>\r\n<p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia quaed inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Aelltes port lacus quis enim var sed efficitur turpis gilla sed sit amet finibus eros. Lorem Ipsum is simply dummy text of the printing.</p>\r\n<p>&nbsp;</p>', 'couress_img_3_1692962811.jpg', 1, '2023-08-25 05:22:05', '2023-08-25 05:26:51'),
(2, 1, 'Computer Engineering', 'computer-engineering', 'Engineering', '12', '127', '66', '4 Years', 6520.00, '<p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia quaed inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Aelltes port lacus quis enim var sed efficitur turpis gilla sed sit amet finibus eros. Lorem Ipsum is simply dummy text of the printing.</p>\r\n<p>The world of search engine optimization is complex and ever-changing, but you can easily understand the basics, and even a small amount of SEO knowledge can make a big difference. Free SEO education is also widely available on the web, including in guides like this! (Woohoo!) This guide is designed to describe all major aspects of SEO, from finding the terms and phrases (keywords) that can generate qualified traffic to your website, to making your site friendly to search engines, to building links and marketing the unique value of your site.Etiam pharetra erat sed fermentum feugiat velit mauris egestas quam ut erat justo.</p>\r\n<h4>What You Will Learn</h4>\r\n<p>Fusce eleifend donec sapien sed phase lusa pellentesque lacus.Vivamus lorem arcu semper duiac. Cras ornare arcu avamus nda leo Etiam ind arcu. Morbi justo mauris tempus pharetra interdum at congue semper purus. Lorem ipsum dolor sit.The world of search engine optimization is complex and ever-changing, but you can easily understand the basics.</p>\r\n<p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia quaed inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Aelltes port lacus quis enim var sed efficitur turpis gilla sed sit amet finibus eros. Lorem Ipsum is simply dummy text of the printing.</p>\r\n<p>&nbsp;</p>', 'couress_img_2_1692962832.jpg', 1, '2023-08-25 05:24:10', '2023-08-25 05:27:12'),
(3, 1, 'Fine Arts and Design', 'fine-arts-and-design', 'Humanities', '8', '115', '55', '4 Years', 4210.00, '<p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia quaed inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Aelltes port lacus quis enim var sed efficitur turpis gilla sed sit amet finibus eros. Lorem Ipsum is simply dummy text of the printing.</p>\r\n<p>The world of search engine optimization is complex and ever-changing, but you can easily understand the basics, and even a small amount of SEO knowledge can make a big difference. Free SEO education is also widely available on the web, including in guides like this! (Woohoo!) This guide is designed to describe all major aspects of SEO, from finding the terms and phrases (keywords) that can generate qualified traffic to your website, to making your site friendly to search engines, to building links and marketing the unique value of your site.Etiam pharetra erat sed fermentum feugiat velit mauris egestas quam ut erat justo.</p>\r\n<h4>What You Will Learn</h4>\r\n<p>Fusce eleifend donec sapien sed phase lusa pellentesque lacus.Vivamus lorem arcu semper duiac. Cras ornare arcu avamus nda leo Etiam ind arcu. Morbi justo mauris tempus pharetra interdum at congue semper purus. Lorem ipsum dolor sit.The world of search engine optimization is complex and ever-changing, but you can easily understand the basics.</p>\r\n<p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia quaed inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Aelltes port lacus quis enim var sed efficitur turpis gilla sed sit amet finibus eros. Lorem Ipsum is simply dummy text of the printing.</p>\r\n<p>&nbsp;</p>', 'couress_img_4_1692962782.jpg', 1, '2023-08-25 05:26:23', '2023-08-25 05:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `shortcode` varchar(55) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`, `slug`, `description`, `shortcode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Artificial Intelligence & Data Science ', 'artificial-intelligence-data-science', NULL, 'AI & DS', 1, '2022-09-30 14:02:55', '2024-01-17 16:45:29'),
(2, 'Bio Medical', 'bio-medical', NULL, 'BM', 1, '2022-09-30 14:03:04', '2024-01-17 16:45:05'),
(3, 'Bio-Technology ', 'bio-technology', NULL, 'BT', 1, '2022-09-30 14:03:14', '2024-01-17 16:44:50'),
(4, 'Civil Engineering ', 'civil-engineering', NULL, 'CIVIL', 1, '2022-09-30 14:03:33', '2024-01-17 16:44:37'),
(5, 'Computer Science and Engineering ', 'computer-science-and-engineering', NULL, 'CSE', 1, '2022-09-30 14:03:44', '2024-01-17 16:44:20'),
(6, 'Electrical and Electronics Engineering ', 'electrical-and-electronics-engineering', NULL, 'EEE', 1, '2022-10-01 04:16:51', '2024-01-17 16:44:06'),
(9, 'Electronics & Communication Engineering ', 'electronics-communication-engineering', NULL, 'ECE', 1, '2024-01-17 16:42:26', '2024-01-17 16:42:26'),
(10, 'Information Technology ', 'information-technology', NULL, 'IT', 1, '2024-01-17 16:42:49', '2024-01-17 16:42:49'),
(11, 'Mechanical Engineering ', 'mechanical-engineering', NULL, 'MECH', 1, '2024-01-17 16:43:02', '2024-01-17 16:43:02'),
(12, 'Science and Humanities ', 'science-and-humanities', NULL, 'S&H', 1, '2024-01-17 16:43:18', '2024-01-17 16:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Admin Master', 'admin-master', NULL, 1, '2022-09-30 14:04:34', '2024-02-03 03:15:17'),
(4, 'Super Admin', 'super-admin', NULL, 1, '2022-09-30 14:05:06', '2024-02-03 03:14:56'),
(7, 'Department Web Editor', 'department-web-editor', NULL, 1, '2022-10-01 04:17:59', '2024-02-03 03:16:20'),
(9, 'Placement Officer', 'placement-officer', NULL, 1, '2022-10-01 04:19:03', '2024-02-03 03:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `email_notifies`
--

CREATE TABLE `email_notifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `semester_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `receive_count` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_notifies`
--

INSERT INTO `email_notifies` (`id`, `faculty_id`, `program_id`, `session_id`, `semester_id`, `section_id`, `subject`, `message`, `receive_count`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 4, 0, 0, 'Your Fees Due Date Is Very Close', 'This depends on when you enrol. Your fees are due 30 days from your starting date. For more information, please see Fees due dates.', 2, 1, 1, NULL, '2022-10-03 11:54:16', '2022-10-03 11:54:16'),
(2, 2, 3, 3, 1, 1, 'Ready for attend our special class on sunday!', 'Note: If any of these dates fall on a holiday or weekend, the due date for fee payment will be the first working day following the holiday/weekend.', 4, 1, 1, NULL, '2022-10-03 12:06:14', '2022-10-03 12:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_id` int(10) UNSIGNED DEFAULT NULL,
  `source_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date` date NOT NULL,
  `follow_up_date` date DEFAULT NULL,
  `assigned` varchar(191) DEFAULT NULL,
  `number_of_students` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `reference_id`, `source_id`, `program_id`, `name`, `father_name`, `phone`, `email`, `address`, `purpose`, `note`, `date`, `follow_up_date`, `assigned`, `number_of_students`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 3, 'Kim Sandoval', NULL, '+1 (939) 845-9236', 'voxagikib@mailinator.com', 'Aspernatur doloremqu', 'Odit et in qui et nu', 'Harum et deleniti ac', '2022-10-01', '2022-12-07', '3', 1, 3, 1, 1, '2022-10-01 12:24:34', '2023-08-25 07:28:58'),
(2, 3, 1, 1, 'Jesse Sandoval', NULL, '+1 (752) 181-9433', 'morexy@mailinator.com', 'Eum velit ratione qu', 'Pariatur Facilis in', 'Enim esse quidem min', '2019-04-02', NULL, 'Architecto', 1, 0, 1, 1, '2022-10-01 12:25:14', '2022-10-01 12:27:18'),
(3, 5, 1, 1, 'Malachi Buckner', NULL, '+1 (774) 745-9417', 'wicodikico@mailinator.com', 'Laboriosam laudanti', 'Adipisicing aspernat', 'Sint vel animi tem', '2021-09-25', '2022-12-29', 'Arman', 1, 1, 1, 1, '2022-10-01 12:25:59', '2022-10-01 12:26:58'),
(4, 2, 4, 1, 'Ann Castro', NULL, '+1 (225) 849-6955', 'lela@mailinator.com', 'Molestias elit aut', 'Qui laborum Dicta n', 'Eum soluta quia est', '2020-12-13', NULL, 'Aperiam', 1, 1, 1, NULL, '2022-10-01 12:26:30', '2022-10-01 12:26:30'),
(5, 1, NULL, 4, 'Georgia Shepard', NULL, '+1 (907) 196-5628', 'gapi@mailinator.com', 'Fugiat sequi aut qu', 'Aut anim ipsa eaque', 'Et ex doloremque min', '2021-04-05', '2022-10-13', 'Saif', 1, 1, 1, 1, '2022-10-01 12:27:53', '2022-10-01 12:28:07'),
(6, 1, 1, 5, 'Coby Kline', NULL, '+1 (582) 879-4372', 'hoge@mailinator.com', 'Consequat Consequat', 'Asperiores quod null', 'Quod quas amet quid', '2023-02-13', '2023-04-10', '4', 1, 2, 1, 1, '2023-02-13 12:25:51', '2023-08-25 07:28:53'),
(7, 3, 1, 1, 'Maggie Curry', NULL, '+1 (953) 288-2346', 'xaxe@mailinator.com', 'Est suscipit vel ul', 'Nam sit ut voluptate', 'Cum est est et aut', '2023-08-21', '2024-03-12', '5', 1, 1, 1, NULL, '2023-08-25 07:28:46', '2023-08-25 07:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `color` varchar(191) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Eid Holiday', '2023-10-03', '2023-10-17', '#70c24a', 1, '2022-10-03 11:38:23', '2023-08-25 06:38:31'),
(2, 'Marry Crismach', '2023-11-03', '2023-11-10', '#4a5cc2', 1, '2022-10-03 11:39:06', '2023-08-25 06:38:21'),
(3, 'Durga Puja', '2023-10-27', '2023-11-01', '#c24a4e', 1, '2022-10-03 11:39:24', '2023-08-25 06:38:11'),
(4, 'Final Exam', '2023-11-23', '2023-12-03', '#c2b44a', 1, '2022-10-03 11:39:54', '2023-08-25 06:38:02'),
(5, 'Summer Vacation', '2023-11-22', '2023-12-06', '#4aaec2', 1, '2022-10-03 11:41:19', '2023-08-25 06:37:52'),
(6, 'New Year Vacation', '2023-12-24', '2024-01-08', '#c24ac2', 1, '2022-10-03 11:41:57', '2023-08-25 06:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `shortcode` varchar(191) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `title`, `slug`, `shortcode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Faculty of Economics', 'faculty-of-economics', NULL, 0, '2022-09-30 12:22:42', '2022-10-02 12:49:43'),
(2, 'Faculty of Engineering', 'faculty-of-engineering', NULL, 1, '2022-09-30 12:22:48', '2022-09-30 12:22:48'),
(3, 'Faculty of Humanities', 'faculty-of-humanities', NULL, 1, '2022-09-30 12:23:07', '2022-09-30 12:23:07'),
(4, 'Faculty of Political Science', 'faculty-of-political-science', NULL, 1, '2022-09-30 12:23:38', '2022-09-30 12:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `language_id`, `title`, `description`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'What is the minimum qualification for admission?', 'Our community is being called to reimagine the future. As the only university where a renowned design school comes together with premier colleges, we are making learning more relevant and transformational. We are enriched by the wide range.', NULL, 1, '2023-08-24 15:56:49', '2023-08-24 15:56:49'),
(2, 1, 'What the required document for admission?', 'Our community is being called to reimagine the future. As the only university where a renowned design school comes together with premier colleges, we are making learning more relevant and transformational. We are enriched by the wide range.', NULL, 1, '2023-08-24 15:57:23', '2023-08-24 15:57:23'),
(3, 1, 'What is the admission process?', 'Our community is being called to reimagine the future. As the only university where a renowned design school comes together with premier colleges, we are making learning more relevant and transformational. We are enriched by the wide range.', NULL, 1, '2023-08-24 15:57:54', '2023-08-24 15:57:54'),
(4, 1, 'How to apply for under graduation?', 'Our community is being called to reimagine the future. As the only university where a renowned design school comes together with premier colleges, we are making learning more relevant and transformational. We are enriched by the wide range.', NULL, 1, '2023-08-24 15:58:32', '2023-08-24 15:58:32'),
(5, 1, 'How much is admission fees?', 'Our community is being called to reimagine the future. As the only university where a renowned design school comes together with premier colleges, we are making learning more relevant and transformational. We are enriched by the wide range.', NULL, 1, '2023-08-24 15:59:16', '2023-08-24 15:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `language_id`, `title`, `description`, `icon`, `attach`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Education Services', 'Seamlessly visualize quality ellectual capital without superior collaboration and idea sharing listically', NULL, NULL, 1, '2023-08-24 15:54:29', '2023-08-24 15:54:29'),
(2, 1, 'International Hubs', 'Seamlessly visualize quality ellectual capital without superior collaboration and idea sharing listically', NULL, NULL, 1, '2023-08-24 15:54:48', '2023-08-24 15:54:48'),
(3, 1, 'Bachelor’s and Master’s', 'Seamlessly visualize quality ellectual capital without superior collaboration and idea sharing listically', NULL, NULL, 1, '2023-08-24 15:55:08', '2023-08-24 15:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(71, 'user_father_name', 1, NULL, NULL),
(72, 'user_mother_name', 1, NULL, NULL),
(73, 'user_joining_date', 1, NULL, NULL),
(74, 'user_ending_date', 1, NULL, NULL),
(75, 'user_emergency_phone', 1, NULL, NULL),
(76, 'user_religion', 0, NULL, NULL),
(77, 'user_caste', 0, NULL, NULL),
(78, 'user_mother_tongue', 0, NULL, NULL),
(79, 'user_nationality', 0, NULL, NULL),
(80, 'user_marital_status', 1, NULL, NULL),
(81, 'user_blood_group', 1, NULL, NULL),
(82, 'user_national_id', 1, NULL, NULL),
(83, 'user_passport_no', 1, NULL, NULL),
(84, 'user_address', 1, NULL, NULL),
(85, 'user_education', 1, NULL, NULL),
(86, 'user_epf_no', 1, NULL, NULL),
(87, 'user_bank_account', 1, NULL, NULL),
(88, 'user_signature', 1, NULL, NULL),
(89, 'user_resume', 1, NULL, NULL),
(90, 'user_joining_letter', 1, NULL, NULL),
(91, 'user_documents', 1, NULL, NULL),
(92, 'student_father_name', 1, NULL, NULL),
(93, 'student_mother_name', 1, NULL, NULL),
(94, 'student_father_occupation', 1, NULL, NULL),
(95, 'student_mother_occupation', 1, NULL, NULL),
(96, 'student_emergency_phone', 1, NULL, NULL),
(97, 'student_religion', 1, NULL, NULL),
(98, 'student_caste', 0, NULL, NULL),
(99, 'student_mother_tongue', 0, NULL, NULL),
(100, 'student_nationality', 0, NULL, NULL),
(101, 'student_marital_status', 1, NULL, NULL),
(102, 'student_blood_group', 1, NULL, NULL),
(103, 'student_national_id', 1, NULL, NULL),
(104, 'student_passport_no', 1, NULL, NULL),
(105, 'student_address', 1, NULL, NULL),
(106, 'student_school_info', 1, NULL, NULL),
(107, 'student_collage_info', 1, NULL, NULL),
(108, 'student_relatives', 1, NULL, NULL),
(109, 'student_photo', 1, NULL, NULL),
(110, 'student_signature', 1, NULL, NULL),
(111, 'student_documents', 1, NULL, NULL),
(112, 'application_father_name', 1, NULL, NULL),
(113, 'application_mother_name', 1, NULL, NULL),
(114, 'application_father_occupation', 1, NULL, NULL),
(115, 'application_mother_occupation', 1, NULL, NULL),
(116, 'application_emergency_phone', 0, NULL, NULL),
(117, 'application_religion', 0, NULL, NULL),
(118, 'application_caste', 0, NULL, NULL),
(119, 'application_mother_tongue', 0, NULL, NULL),
(120, 'application_nationality', 0, NULL, NULL),
(121, 'application_marital_status', 1, NULL, NULL),
(122, 'application_blood_group', 1, NULL, NULL),
(123, 'application_national_id', 1, NULL, NULL),
(124, 'application_passport_no', 1, NULL, NULL),
(125, 'application_address', 1, NULL, NULL),
(126, 'application_school_info', 1, NULL, NULL),
(127, 'application_collage_info', 1, NULL, NULL),
(128, 'application_photo', 1, NULL, NULL),
(129, 'application_signature', 1, NULL, NULL),
(130, 'panel_class_routine', 0, NULL, '2024-01-09 20:20:24'),
(131, 'panel_exam_routine', 0, NULL, '2024-01-09 20:20:24'),
(132, 'panel_attendance', 0, NULL, '2024-01-09 20:20:24'),
(133, 'panel_leave', 0, NULL, '2024-01-09 20:20:24'),
(134, 'panel_fees_report', 0, NULL, '2024-01-09 20:20:24'),
(135, 'panel_library', 0, NULL, '2024-01-09 20:20:24'),
(136, 'panel_notice', 0, NULL, '2024-01-09 20:20:35'),
(137, 'panel_assignment', 0, NULL, '2024-01-09 20:20:24'),
(138, 'panel_download', 0, NULL, '2024-01-09 20:20:24'),
(139, 'panel_transcript', 0, NULL, '2024-01-09 20:20:24'),
(140, 'panel_profile', 0, NULL, '2024-01-09 20:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `language_id`, `title`, `description`, `attach`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '01', NULL, 'protfolio_img01_1692915624.jpg', 1, '2023-08-24 16:20:24', '2023-08-24 16:20:24'),
(2, 1, '02', NULL, 'protfolio_img02_1692915631.jpg', 1, '2023-08-24 16:20:31', '2023-08-24 16:20:31'),
(3, 1, '03', NULL, 'protfolio_img03_1692915639.jpg', 1, '2023-08-24 16:20:39', '2023-08-24 16:20:39'),
(4, 1, '04', NULL, 'protfolio_img04_1692915646.jpg', 1, '2023-08-24 16:20:47', '2023-08-24 16:20:47'),
(5, 1, '05', NULL, 'protfolio_img05_1692915654.jpg', 1, '2023-08-24 16:20:55', '2023-08-24 16:20:55'),
(6, 1, '06', NULL, 'protfolio_img06_1692915663.jpg', 1, '2023-08-24 16:21:03', '2023-08-24 16:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `direction` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 LTR, 1 RTL',
  `default` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 Not Default, 1 Default',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `description`, `direction`, `default`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', NULL, 0, 1, 1, '2022-09-30 12:00:47', '2022-09-30 12:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `mail_settings`
--

CREATE TABLE `mail_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver` text DEFAULT NULL,
  `host` text DEFAULT NULL,
  `port` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `encryption` text DEFAULT NULL,
  `sender_email` text DEFAULT NULL,
  `sender_name` text DEFAULT NULL,
  `reply_email` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_settings`
--

INSERT INTO `mail_settings` (`id`, `driver`, `host`, `port`, `username`, `password`, `encryption`, `sender_email`, `sender_name`, `reply_email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'smtp.mailtrap.io', '2525', '5b1c119ce5a400', 'e177cd2e8894b5', 'tls', 'info@mail.com', 'Info Company', 'info@mail.com', 1, '2022-09-30 12:00:47', '2022-09-30 12:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_parent_present` int(1) UNSIGNED ZEROFILL DEFAULT NULL,
  `status` int(1) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`, `parent_id`, `is_parent_present`, `status`) VALUES
(1, 'Home', 0, NULL, 0),
(2, 'Administration', 0, 1, 0),
(3, 'Trust', 2, NULL, 0),
(4, 'Correspondent', 2, NULL, 0),
(5, 'Principal', 2, NULL, 0),
(6, 'Governing Council', 2, 1, 0),
(7, 'Members', 6, NULL, 0),
(8, 'Meeting', 6, NULL, 0),
(9, 'Academic Council', 2, 1, 0),
(10, 'Members', 9, NULL, 0),
(11, 'Meetings', 9, NULL, 0),
(12, 'Finance Committee', 2, 1, 0),
(13, 'Members', 12, NULL, 0),
(14, 'Meetings', 12, NULL, 0),
(15, 'Audit Statement', 12, NULL, 0),
(16, 'Policies and Procedures', 2, NULL, 0),
(17, 'Milestones', 2, NULL, 0),
(18, 'Approval /Affiliations', 2, NULL, 0),
(19, 'Undertakings', 2, 1, 0),
(20, 'RTI Declaration', 19, NULL, 0),
(21, 'Autonomous Undertaking', 19, NULL, 0),
(22, 'Organizational Chart', 2, NULL, 0),
(23, 'Mandatory Disclosure', 2, NULL, 0),
(24, 'Academics', 0, 1, 0),
(25, 'Department', 24, 1, 0),
(26, 'UG Programs', 25, 1, 0),
(27, 'Artificial Intelligence & Data Science (AI & DS)', 26, NULL, 0),
(28, 'Bio Medical(BM)', 26, NULL, 0),
(29, 'Bio-Technology (BT)', 26, NULL, 0),
(30, 'Civil Engineering (CIVIL)', 26, NULL, 0),
(31, 'Computer Science and Engineering (CSE)', 26, NULL, 0),
(32, 'Electrical and Electronics Engineering (EEE)', 26, NULL, 0),
(33, 'Electronics & Communication Engineering (ECE)', 26, NULL, 0),
(34, 'Information Technology (IT)', 26, NULL, 0),
(35, 'Mechanical Engineering (MECH)', 26, NULL, 0),
(36, 'Science and Humanities (S&H)', 26, NULL, 0),
(37, 'PG Programs', 25, 1, 0),
(38, 'Applied Electronics (AE)', 37, NULL, 0),
(39, 'Computer Science and Engineering (CSE)', 37, NULL, 0),
(40, 'Engineering Design (ED)', 37, NULL, 0),
(41, 'Master of Business Administration (MBA)', 37, NULL, 0),
(42, 'Power Electronics and Drives (PED)', 37, NULL, 0),
(43, 'Structural Engineering (SE)', 37, NULL, 0),
(44, 'Regulations', 24, 1, 0),
(45, 'UG', 44, 1, 0),
(46, '2019 Amendments', 45, NULL, 0),
(47, '2019', 45, NULL, 0),
(48, '2016', 45, NULL, 0),
(49, '2012', 45, NULL, 0),
(50, 'PG', 44, 1, 0),
(51, '2019 Amendments', 50, NULL, 0),
(52, '2019', 50, NULL, 0),
(53, '2016', 50, NULL, 0),
(54, '2012', 50, NULL, 0),
(55, 'Syllabus', 24, NULL, 0),
(56, 'NPTEL', 24, NULL, 0),
(57, 'Academic Feedback', 24, NULL, 0),
(58, 'Calendar of Activities', 24, NULL, 0),
(59, 'LCS', 0, NULL, 1),
(60, 'Research', 0, NULL, 1),
(61, 'Accreditations', 0, 1, 0),
(62, 'NAAC', 61, NULL, 0),
(63, 'NBA', 61, NULL, 0),
(64, 'Examinations', 0, 1, 0),
(65, 'Controller of Exam', 64, NULL, 0),
(66, 'COE Announcements', 64, NULL, 0),
(67, 'Download Forms', 64, NULL, 0),
(68, 'Exam Results', 64, NULL, 0),
(69, 'Automation System', 64, NULL, 0),
(70, 'Library', 71, NULL, 0),
(71, 'Infrastructure', 0, 1, 0),
(72, 'Cafeteria', 71, NULL, 0),
(73, 'Transport', 71, NULL, 0),
(74, 'Bank', 71, NULL, 0),
(75, 'Health Club', 71, NULL, 0),
(76, 'Internet Centre', 71, NULL, 0),
(77, 'Store Facility', 71, NULL, 0),
(78, 'Wifi Connectivity', 71, NULL, 0),
(79, 'Indoor Stadium', 71, NULL, 0),
(80, 'Medical Centre', 71, NULL, 0),
(81, 'Hostel', 71, NULL, 0),
(82, 'IQAC', 105, NULL, 0),
(83, 'Admission', 0, NULL, 0),
(84, 'Placement', 0, NULL, 0),
(85, 'Extra curricular', 0, 1, 0),
(86, 'NSS', 85, NULL, 0),
(87, 'NCC', 85, NULL, 0),
(88, 'YRC', 85, NULL, 0),
(89, 'RRC', 85, NULL, 0),
(90, 'NISP', 105, NULL, 0),
(91, 'NIRF', 105, NULL, 0),
(92, 'AISHE', 105, NULL, 0),
(93, 'Cells / Committee', 85, 1, 0),
(94, 'Entrepreneurship Cell', 93, NULL, 0),
(95, 'Women Empowerment Cell', 93, NULL, 0),
(96, 'Grievance Redressal System', 93, NULL, 0),
(97, 'Internal Complaints Committee', 93, NULL, 0),
(98, 'Reservation(SC/ST/OBC) and Minority Cell', 93, NULL, 0),
(99, 'Anti Ragging', 93, NULL, 0),
(100, 'Anti-Drugs Club / Committee', 93, NULL, 0),
(101, 'Industry Institute Interaction Cell', 93, NULL, 0),
(102, 'Innovation and Incubation Center / Cell', 93, NULL, 0),
(103, 'Maintenance', 93, 1, 0),
(104, 'Civil Maintenance', 103, NULL, 0),
(105, 'Others', 0, 1, 0),
(106, 'Careers', 105, NULL, 0),
(107, 'Center of excellence', 105, NULL, 0),
(108, 'ICT Academy', 105, NULL, 0),
(109, 'Quick Links', 105, 1, 0),
(110, 'PSR in Media', 109, NULL, 0),
(111, 'Help Desk', 109, NULL, 0),
(112, 'Current Students', 109, 1, 0),
(113, 'E-Content', 112, NULL, 0),
(114, 'Parent Teacher Association(PTA)', 112, NULL, 0),
(115, 'Suggestion Box', 112, NULL, 0),
(116, 'Current Staff', 105, 1, 0),
(117, 'E-Content', 116, NULL, 0),
(118, 'Forms', 105, NULL, 0),
(119, 'Online Fees Payment', 105, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_06_04_092405_create_faculties_table', 1),
(5, '2021_06_04_102314_create_programs_table', 1),
(6, '2021_06_04_114619_create_batches_table', 1),
(7, '2021_06_04_120154_create_sessions_table', 1),
(8, '2021_06_04_131456_create_semesters_table', 1),
(9, '2021_06_04_132856_create_sections_table', 1),
(10, '2021_06_04_141432_create_class_rooms_table', 1),
(11, '2021_06_05_121933_create_income_categories_table', 1),
(12, '2021_06_05_125236_create_incomes_table', 1),
(13, '2021_06_05_144224_create_expense_categories_table', 1),
(14, '2021_06_05_150317_create_expenses_table', 1),
(15, '2021_06_07_152605_create_subjects_table', 1),
(16, '2021_06_07_155306_create_enroll_subjects_table', 1),
(17, '2021_06_07_160042_create_enroll_subject_subject_table', 1),
(18, '2021_06_08_102053_create_program_subject_table', 1),
(19, '2021_06_08_105550_create_batch_program_table', 1),
(20, '2021_06_08_125338_create_program_semester_table', 1),
(21, '2021_06_08_125531_create_program_class_room_table', 1),
(22, '2021_06_08_180439_create_program_session_table', 1),
(23, '2021_06_08_182844_create_program_semester_sections_table', 1),
(24, '2021_06_09_133442_create_class_routines_table', 1),
(25, '2021_06_12_153215_create_departments_table', 1),
(26, '2021_06_12_155411_create_designations_table', 1),
(27, '2021_06_13_075755_create_leave_types_table', 1),
(28, '2021_06_13_125451_create_leaves_table', 1),
(29, '2021_06_13_173512_create_work_shift_types_table', 1),
(30, '2021_06_13_175400_create_tax_settings_table', 1),
(31, '2021_06_13_193417_create_user_program_table', 1),
(32, '2021_06_15_184223_create_staff_attendances_table', 1),
(33, '2021_06_16_180912_create_staff_hourly_attendances_table', 1),
(34, '2021_06_17_083411_create_payrolls_table', 1),
(35, '2021_06_22_185503_create_jobs_table', 1),
(36, '2021_07_07_081616_create_students_table', 1),
(37, '2021_07_07_182329_create_student_relatives_table', 1),
(38, '2021_07_07_190034_create_documents_table', 1),
(39, '2021_07_07_192727_create_docables_table', 1),
(40, '2021_07_08_054948_create_student_enrolls_table', 1),
(41, '2021_07_08_172152_create_student_transfers_table', 1),
(42, '2021_07_08_195650_create_transfer_creadits_table', 1),
(43, '2021_07_09_061940_create_status_types_table', 1),
(44, '2021_07_09_092958_create_status_type_student_table', 1),
(45, '2021_07_09_163443_create_student_enroll_subject_table', 1),
(46, '2021_07_09_173413_create_student_leaves_table', 1),
(47, '2021_07_09_194126_create_student_attendances_table', 1),
(48, '2021_07_17_160726_create_events_table', 1),
(49, '2021_07_18_074323_create_notice_categories_table', 1),
(50, '2021_07_18_080209_create_notices_table', 1),
(51, '2021_07_18_105550_create_noticeables_table', 1),
(52, '2021_07_19_182908_create_email_notifies_table', 1),
(53, '2021_07_19_200327_create_s_m_s_notifies_table', 1),
(54, '2021_09_01_070002_create_exam_types_table', 1),
(55, '2021_09_01_071547_create_result_contributions_table', 1),
(56, '2021_09_01_084615_create_grades_table', 1),
(57, '2021_09_02_184433_create_exams_table', 1),
(58, '2021_09_04_101915_create_subject_markings_table', 1),
(59, '2021_09_27_183257_create_certificate_templates_table', 1),
(60, '2021_10_01_163600_create_certificates_table', 1),
(61, '2021_10_15_182241_create_marksheet_settings_table', 1),
(62, '2022_01_21_142336_create_print_settings_table', 1),
(63, '2022_01_21_170648_create_visit_purposes_table', 1),
(64, '2022_01_21_171901_create_visitors_table', 1),
(65, '2022_01_21_185105_create_postal_exchange_types_table', 1),
(66, '2022_01_21_185152_create_postal_exchanges_table', 1),
(67, '2022_01_21_185201_create_phone_logs_table', 1),
(68, '2022_01_22_103339_create_complain_types_table', 1),
(69, '2022_01_22_103551_create_complain_sources_table', 1),
(70, '2022_01_22_103657_create_complains_table', 1),
(71, '2022_01_23_103439_create_enquiry_sources_table', 1),
(72, '2022_01_23_110653_create_enquiry_references_table', 1),
(73, '2022_01_23_114509_create_enquiries_table', 1),
(74, '2022_01_24_174515_create_assignments_table', 1),
(75, '2022_01_24_179252_create_student_assignments_table', 1),
(76, '2022_01_24_181419_create_content_types_table', 1),
(77, '2022_01_25_165931_create_contents_table', 1),
(78, '2022_01_26_105511_create_contentables_table', 1),
(79, '2022_01_27_100200_create_notifications_table', 1),
(80, '2022_01_28_131433_create_book_categories_table', 1),
(81, '2022_01_28_173902_create_books_table', 1),
(82, '2022_01_29_045003_create_outside_users_table', 1),
(83, '2022_01_29_045120_create_library_members_table', 1),
(84, '2022_01_29_093915_create_issue_returns_table', 1),
(85, '2022_01_31_061950_create_notes_table', 1),
(86, '2022_02_15_173515_create_fees_categories_table', 1),
(87, '2022_02_15_182124_create_fees_masters_table', 1),
(88, '2022_02_16_100327_create_fees_master_student_enroll', 1),
(89, '2022_02_26_184930_create_fees_fines_table', 1),
(90, '2022_02_26_191642_create_fees_category_fees_fine_table', 1),
(91, '2022_03_04_172257_create_fees_discounts_table', 1),
(92, '2022_03_05_132058_create_fees_category_fees_discount_table', 1),
(93, '2022_03_05_132541_create_fees_discount_status_type_table', 1),
(94, '2022_03_05_195051_create_fees_table', 1),
(95, '2022_03_05_203440_create_transactions_table', 1),
(96, '2022_03_10_131324_create_exam_routines_table', 1),
(97, '2022_03_10_131936_create_exam_routine_user_table', 1),
(98, '2022_03_10_132124_create_exam_routine_room_table', 1),
(99, '2022_03_31_074913_create_id_card_settings_table', 1),
(100, '2022_04_01_125726_create_settings_table', 1),
(101, '2022_04_01_210417_create_languages_table', 1),
(102, '2022_04_02_144303_create_permission_tables', 1),
(103, '2022_04_03_103141_create_mail_settings_table', 1),
(104, '2022_04_03_173021_create_s_m_s_settings_table', 1),
(105, '2022_04_03_174009_create_schedule_settings_table', 1),
(106, '2022_04_04_123222_create_provinces_table', 1),
(107, '2022_04_04_173222_create_districts_table', 1),
(108, '2021_06_17_183706_create_payroll_details_table', 2),
(109, '2021_07_04_172713_create_application_settings_table', 2),
(110, '2021_07_06_121630_create_applications_table', 2),
(111, '2022_01_23_192650_create_meeting_types_table', 2),
(112, '2022_01_23_202252_create_meeting_schedules_table', 2),
(113, '2022_01_28_195224_create_book_requests_table', 2),
(114, '2022_11_20_171503_create_item_categories_table', 2),
(115, '2022_11_20_182303_create_item_stores_table', 2),
(116, '2022_11_20_185841_create_item_suppliers_table', 2),
(117, '2022_11_21_190954_create_items_table', 2),
(118, '2022_11_21_194218_create_item_stocks_table', 2),
(119, '2022_11_21_200834_create_item_issues_table', 2),
(120, '2022_12_08_140339_create_hostel_room_types_table', 2),
(121, '2022_12_08_193208_create_hostels_table', 2),
(122, '2022_12_10_203126_create_hostel_rooms_table', 2),
(123, '2022_12_14_181050_create_hostel_members_table', 2),
(124, '2022_12_22_112935_create_transport_routes_table', 2),
(125, '2022_12_23_110116_create_transport_vehicles_table', 2),
(126, '2022_12_23_112400_create_transport_route_transport_vehicle_table', 2),
(127, '2022_12_24_121402_create_transport_members_table', 2),
(128, '2022_12_29_173356_add_fields_to_tables', 2),
(129, '2023_08_12_153552_add_fields_v3_to_table', 3),
(130, '2023_08_12_174813_create_fields_table', 3),
(131, '2023_08_15_010030_create_topbar_settings_table', 3),
(132, '2023_08_15_010553_create_social_settings_table', 3),
(133, '2023_08_15_025440_create_sliders_table', 3),
(134, '2023_08_15_034340_create_features_table', 3),
(135, '2023_08_15_043734_create_about_us_table', 3),
(136, '2023_08_15_112651_create_faqs_table', 3),
(137, '2023_08_15_115731_create_testimonials_table', 3),
(138, '2023_08_15_121544_create_call_to_actions_table', 3),
(139, '2023_08_16_172019_create_galleries_table', 3),
(140, '2023_08_16_172620_create_courses_table', 3),
(141, '2023_08_16_173224_create_web_events_table', 3),
(142, '2023_08_16_173331_create_news_table', 3),
(143, '2023_08_23_142818_create_pages_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 9),
(4, 'App\\User', 2),
(4, 'App\\User', 10),
(6, 'App\\User', 3),
(6, 'App\\User', 4),
(6, 'App\\User', 5),
(6, 'App\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `date` date NOT NULL,
  `description` longtext NOT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `language_id`, `title`, `slug`, `date`, `description`, `meta_title`, `meta_description`, `attach`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'With our vastly improved notifications system, users have more control', 'with-our-vastly-improved-notifications-system-users-have-more-control', '2023-07-27', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo amet set for your cool happiness for lyour loyal city.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deser unt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusant ium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit asperna tur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisq.</p>\r\n<p>&nbsp;</p>', NULL, NULL, 'inner_b1_1692916385.jpg', 1, '2023-08-24 16:30:23', '2023-08-25 05:33:37'),
(2, 1, 'There are many variations passages of like consectetur lorem ipsum available.', 'there-are-many-variations-passages-of-like-consectetur-lorem-ipsum-available', '2023-08-01', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo amet set for your cool happiness for lyour loyal city.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deser unt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusant ium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit asperna tur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisq.</p>\r\n<p>&nbsp;</p>', NULL, NULL, 'inner_b2_1692916294.jpg', 1, '2023-08-24 16:31:34', '2023-08-25 05:33:19'),
(3, 1, 'I must explain to you how all this mistaken idea of denouncing pleasure.', 'i-must-explain-to-you-how-all-this-mistaken-idea-of-denouncing-pleasure', '2023-08-24', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo amet set for your cool happiness for lyour loyal city.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deser unt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusant ium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit asperna tur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisq.</p>\r\n<p>&nbsp;</p>', NULL, NULL, 'inner_b3_1692916324.jpg', 1, '2023-08-24 16:32:04', '2023-08-24 16:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noteable_type` varchar(191) NOT NULL,
  `noteable_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `noteable_type`, `noteable_id`, `title`, `description`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'App\\User', 7, 'Ex maxime do expedit', 'Eligendi placeat ea', NULL, 1, 1, NULL, '2022-10-02 11:56:15', '2022-10-02 11:56:15'),
(2, 'App\\User', 9, 'Nemo libero maiores', 'Est nemo irure qui e', 'book-covers_1664733426.jpg', 1, 1, 1, '2022-10-02 11:56:20', '2022-10-02 11:57:06'),
(3, 'App\\User', 8, 'Dolorum voluptatem e', 'Mollitia at odit num', NULL, 1, 1, NULL, '2022-10-02 11:56:55', '2022-10-02 11:56:55'),
(4, 'App\\Models\\Student', 3, 'Dolor aut excepturi', 'Culpa labore fugit', NULL, 1, 1, NULL, '2022-10-02 12:40:45', '2022-10-02 12:40:45'),
(5, 'App\\Models\\Student', 6, 'Magna culpa distinc', 'At ullam magni autem', 'book-covers_1664736057.jpg', 1, 1, NULL, '2022-10-02 12:40:57', '2022-10-02 12:40:57'),
(6, 'App\\Models\\Student', 4, 'Et nulla sint ut no', 'Rerum sit nostrud l', NULL, 1, 1, NULL, '2022-10-02 12:41:02', '2022-10-02 12:41:02'),
(7, 'App\\Models\\Student', 1, 'Est magnam exercita', 'Aliquid deserunt asp', 'book-cover2_1664736079.jpg', 1, 1, NULL, '2022-10-02 12:41:19', '2022-10-02 12:41:19'),
(8, 'App\\Models\\Student', 13, 'Assumenda ad corpori', 'Qui ea impedit a ex', 'background-border_1664885966.png', 1, 1, NULL, '2022-10-04 06:19:26', '2022-10-04 06:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `noticeables`
--

CREATE TABLE `noticeables` (
  `notice_id` bigint(20) NOT NULL,
  `noticeable_id` bigint(20) NOT NULL,
  `noticeable_type` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `noticeables`
--

INSERT INTO `noticeables` (`notice_id`, `noticeable_id`, `noticeable_type`) VALUES
(1, 4, 'App\\Models\\Student'),
(1, 3, 'App\\Models\\Student'),
(1, 2, 'App\\Models\\Student'),
(1, 1, 'App\\Models\\Student'),
(2, 14, 'App\\Models\\Student'),
(2, 12, 'App\\Models\\Student'),
(2, 11, 'App\\Models\\Student'),
(2, 10, 'App\\Models\\Student');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `semester_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `notice_no` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `faculty_id`, `program_id`, `session_id`, `semester_id`, `section_id`, `category_id`, `notice_no`, `title`, `description`, `date`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 0, 0, 0, 4, '1001', 'Android Development Hackathon 2022', '<p>Hackathon Android App Innovation Challenge in will happen on Feb 20th 2022. ... To develop an innovative applications which can be helpful for society.</p>\r\n<p>&nbsp;</p>', '2022-10-03', 'book-covers_1664819413.jpg', 1, 1, 1, '2022-10-03 11:50:13', '2022-10-03 14:55:38'),
(2, 2, 3, 4, 1, 0, 2, '1004', 'Winter Vacation Pick On From Sunday', '<p>Winter Vacations for Sun and Scene Seekers: The Caribbean​​ The Caribbean has long drawn couples, families and friends for easy warm-weather getaways, thanks to</p>', '2022-10-04', 'Provisional Certificate-100001_1664890296.pdf', 1, 1, NULL, '2022-10-04 07:31:36', '2022-10-04 07:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `notice_categories`
--

CREATE TABLE `notice_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_categories`
--

INSERT INTO `notice_categories` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Exam', 'exam', NULL, 1, '2022-09-30 14:11:08', '2022-09-30 14:11:54'),
(2, 'Vacation', 'vacation', NULL, 1, '2022-09-30 14:11:23', '2022-09-30 14:12:05'),
(3, 'Festival', 'festival', NULL, 1, '2022-09-30 14:11:41', '2022-09-30 14:12:00'),
(4, 'Competitive Event', 'competitive-event', NULL, 1, '2022-10-01 04:08:04', '2022-10-01 04:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('011f54a5-007b-47ec-8ca0-ef8d4d02377e', 'App\\Notifications\\ContentNotification', 'App\\Models\\Student', 12, '{\"id\":3,\"title\":\"2nd Class Of English\",\"type\":\"content\"}', NULL, '2022-10-04 07:22:41', '2022-10-04 07:22:41'),
('07aab651-5c90-4523-86b8-d27aae1056ec', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 1, '{\"id\":1,\"title\":\"Android Development Hackathon 2022\",\"type\":\"notice\"}', NULL, '2022-10-03 11:50:13', '2022-10-03 11:50:13'),
('11a62dee-3881-4ac4-8a3b-df96a73781de', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 10, '{\"id\":2,\"title\":\"Winter Vacation Pick On From Sunday\",\"type\":\"notice\"}', NULL, '2022-10-04 07:31:37', '2022-10-04 07:31:37'),
('141e4e0d-3663-43b1-a7be-dc7674e5928d', 'App\\Notifications\\ContentNotification', 'App\\Models\\Student', 11, '{\"id\":3,\"title\":\"2nd Class Of English\",\"type\":\"content\"}', NULL, '2022-10-04 07:22:41', '2022-10-04 07:22:41'),
('15b99a58-fcc8-4de2-a8dc-f47df77d7134', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 3, '{\"id\":1,\"title\":\"Theory of relativity\",\"type\":\"assignment\"}', NULL, '2022-10-03 11:10:03', '2022-10-03 11:10:03'),
('1664d794-1262-4ee9-aca5-c3ea560e4291', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 4, '{\"id\":1,\"title\":\"Android Development Hackathon 2022\",\"type\":\"notice\"}', NULL, '2022-10-03 11:50:13', '2022-10-03 11:50:13'),
('1e6faade-b601-4573-8611-252bd426a5e4', 'App\\Notifications\\ContentNotification', 'App\\Models\\Student', 14, '{\"id\":3,\"title\":\"2nd Class Of English\",\"type\":\"content\"}', '2022-10-04 07:32:42', '2022-10-04 07:22:41', '2022-10-04 07:32:42'),
('27700e79-b1ef-4aea-84a5-dca35601e2c7', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 14, '{\"id\":5,\"title\":\"Rules of voice change\",\"type\":\"assignment\"}', '2022-10-04 07:32:47', '2022-10-04 07:22:41', '2022-10-04 07:32:47'),
('31bf7290-9e38-4131-9f5c-7a972e49616a', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 14, '{\"id\":2,\"title\":\"Winter Vacation Pick On From Sunday\",\"type\":\"notice\"}', '2022-10-04 07:32:02', '2022-10-04 07:31:37', '2022-10-04 07:32:02'),
('5b2538da-38e9-4a7a-9d5e-12a5b71bdf90', 'App\\Notifications\\ContentNotification', 'App\\Models\\Student', 7, '{\"id\":1,\"title\":\"Optical Physics 1st Class\",\"type\":\"content\"}', NULL, '2022-10-03 07:12:59', '2022-10-03 07:12:59'),
('6ca44526-326d-40f7-80a2-cd99f3a77fcd', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 10, '{\"id\":3,\"title\":\"Rules of Article\",\"type\":\"assignment\"}', NULL, '2022-10-04 07:22:41', '2022-10-04 07:22:41'),
('70bf8a20-bd71-403e-bd84-006b6e524a66', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 1, '{\"id\":1,\"title\":\"Theory of relativity\",\"type\":\"assignment\"}', NULL, '2022-10-03 11:10:03', '2022-10-03 11:10:03'),
('785f549e-c101-40f4-b4f8-134c2cd2a0fe', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 11, '{\"id\":3,\"title\":\"Rules of Article\",\"type\":\"assignment\"}', NULL, '2022-10-04 07:22:41', '2022-10-04 07:22:41'),
('839d685b-468a-459c-b7e1-8d4b74e7d5df', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 8, '{\"id\":2,\"title\":\"Measurement and Height\",\"type\":\"assignment\"}', NULL, '2022-10-03 11:13:04', '2022-10-03 11:13:04'),
('93f6ddc6-d6a9-4e6d-b492-d417e1b9b2f7', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 4, '{\"id\":1,\"title\":\"Theory of relativity\",\"type\":\"assignment\"}', NULL, '2022-10-03 11:10:03', '2022-10-03 11:10:03'),
('9ba811dd-0e6a-4070-b216-069614bc2b9d', 'App\\Notifications\\ContentNotification', 'App\\Models\\Student', 10, '{\"id\":3,\"title\":\"2nd Class Of English\",\"type\":\"content\"}', NULL, '2022-10-04 07:22:41', '2022-10-04 07:22:41'),
('a3f21e8d-3610-40b8-a2e5-7b1a94bf90e6', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 10, '{\"id\":5,\"title\":\"Rules of voice change\",\"type\":\"assignment\"}', NULL, '2022-10-04 07:22:41', '2022-10-04 07:22:41'),
('a67fd579-3132-4fb3-9107-9108ecc310c8', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 12, '{\"id\":3,\"title\":\"Rules of Article\",\"type\":\"assignment\"}', '2022-10-04 07:23:16', '2022-10-04 07:22:41', '2022-10-04 07:23:16'),
('a9e0eaac-ddc8-44b7-9a05-c280aa5ce15e', 'App\\Notifications\\ContentNotification', 'App\\Models\\Student', 8, '{\"id\":1,\"title\":\"Optical Physics 1st Class\",\"type\":\"content\"}', NULL, '2022-10-03 07:12:59', '2022-10-03 07:12:59'),
('b131cbc5-8f6d-46af-85ba-99e114a468f7', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 3, '{\"id\":1,\"title\":\"Android Development Hackathon 2022\",\"type\":\"notice\"}', NULL, '2022-10-03 11:50:13', '2022-10-03 11:50:13'),
('c150c5b3-2d00-465e-bb7c-8fb0506f4cb7', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 12, '{\"id\":2,\"title\":\"Winter Vacation Pick On From Sunday\",\"type\":\"notice\"}', NULL, '2022-10-04 07:31:37', '2022-10-04 07:31:37'),
('c223bf63-bf78-4425-b70d-d7f0ed751ba9', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 12, '{\"id\":5,\"title\":\"Rules of voice change\",\"type\":\"assignment\"}', '2022-10-04 07:23:16', '2022-10-04 07:22:41', '2022-10-04 07:23:16'),
('cdd8fdc1-b992-4df9-a1d7-833bc22c1728', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 14, '{\"id\":3,\"title\":\"Rules of Article\",\"type\":\"assignment\"}', '2022-10-04 07:32:47', '2022-10-04 07:22:41', '2022-10-04 07:32:47'),
('d1693c75-da05-4cb0-a5fa-4e0e98eed4f4', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 2, '{\"id\":1,\"title\":\"Android Development Hackathon 2022\",\"type\":\"notice\"}', NULL, '2022-10-03 11:50:13', '2022-10-03 11:50:13'),
('d86483c2-2cac-4a32-a274-aa402c0c63d5', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 2, '{\"id\":1,\"title\":\"Theory of relativity\",\"type\":\"assignment\"}', NULL, '2022-10-03 11:10:03', '2022-10-03 11:10:03'),
('edf49484-fd6d-4d28-9024-dab31f141b7a', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 7, '{\"id\":2,\"title\":\"Measurement and Height\",\"type\":\"assignment\"}', NULL, '2022-10-03 11:13:04', '2022-10-03 11:13:04'),
('f3bcc8a3-b372-4657-9f29-ea4438f455bc', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 11, '{\"id\":5,\"title\":\"Rules of voice change\",\"type\":\"assignment\"}', NULL, '2022-10-04 07:22:41', '2022-10-04 07:22:41'),
('fa65ad88-4332-42ac-a773-796203413c68', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 11, '{\"id\":2,\"title\":\"Winter Vacation Pick On From Sunday\",\"type\":\"notice\"}', NULL, '2022-10-04 07:31:37', '2022-10-04 07:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `language_id`, `title`, `slug`, `description`, `meta_title`, `meta_description`, `attach`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Requirements', 'requirements', '<h4>What is Lorem Ipsum?</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h4>Why do we use it?</h4>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>\r\n<h4>Where does it come from?</h4>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', NULL, NULL, NULL, 1, '2023-08-24 16:05:03', '2023-08-25 05:35:21'),
(2, 1, 'Tuition Fees', 'tuition-fees', '<h4>Where does it come from?</h4>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n<h4>Where can I get some?</h4>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n<p>&nbsp;</p>', NULL, NULL, NULL, 1, '2023-08-24 16:06:39', '2023-08-25 05:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `group` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group`, `title`, `guard_name`, `created_at`, `updated_at`) VALUES
(1544, 'faculty-view', 'Faculty', 'View', 'web', NULL, NULL),
(1545, 'faculty-create', 'Faculty', 'Create', 'web', NULL, NULL),
(1546, 'faculty-edit', 'Faculty', 'Edit', 'web', NULL, NULL),
(1547, 'faculty-delete', 'Faculty', 'Delete', 'web', NULL, NULL),
(1548, 'program-view', 'Program', 'View', 'web', NULL, NULL),
(1549, 'program-create', 'Program', 'Create', 'web', NULL, NULL),
(1550, 'program-edit', 'Program', 'Edit', 'web', NULL, NULL),
(1551, 'program-delete', 'Program', 'Delete', 'web', NULL, NULL),
(1560, 'semester-view', 'Semester', 'View', 'web', NULL, NULL),
(1561, 'semester-create', 'Semester', 'Create', 'web', NULL, NULL),
(1562, 'semester-edit', 'Semester', 'Edit', 'web', NULL, NULL),
(1563, 'semester-delete', 'Semester', 'Delete', 'web', NULL, NULL),
(1572, 'subject-view', 'Course', 'View', 'web', NULL, NULL),
(1573, 'subject-create', 'Course', 'Create', 'web', NULL, NULL),
(1574, 'subject-edit', 'Course', 'Edit', 'web', NULL, NULL),
(1575, 'subject-delete', 'Course', 'Delete', 'web', NULL, NULL),
(1576, 'subject-import', 'Course', 'Import', 'web', NULL, NULL),
(1682, 'designation-view', 'Designation', 'View', 'web', NULL, NULL),
(1683, 'designation-create', 'Designation', 'Create', 'web', NULL, NULL),
(1684, 'designation-edit', 'Designation', 'Edit', 'web', NULL, NULL),
(1685, 'designation-delete', 'Designation', 'Delete', 'web', NULL, NULL),
(1686, 'department-view', 'Department', 'View', 'web', NULL, NULL),
(1687, 'department-create', 'Department', 'Create', 'web', NULL, NULL),
(1688, 'department-edit', 'Department', 'Edit', 'web', NULL, NULL),
(1689, 'department-delete', 'Department', 'Delete', 'web', NULL, NULL),
(1707, 'email-notify-view', 'Send Email', 'View', 'web', NULL, NULL),
(1708, 'email-notify-create', 'Send Email', 'Send', 'web', NULL, NULL),
(1709, 'email-notify-delete', 'Send Email', 'Delete', 'web', NULL, NULL),
(1710, 'sms-notify-view', 'Send SMS', 'View', 'web', NULL, NULL),
(1711, 'sms-notify-create', 'Send SMS', 'Send', 'web', NULL, NULL),
(1712, 'sms-notify-delete', 'Send SMS', 'Delete', 'web', NULL, NULL),
(1713, 'event-view', 'Event', 'View', 'web', NULL, NULL),
(1714, 'event-create', 'Event', 'Create', 'web', NULL, NULL),
(1715, 'event-edit', 'Event', 'Edit', 'web', NULL, NULL),
(1716, 'event-delete', 'Event', 'Delete', 'web', NULL, NULL),
(1718, 'notice-view', 'Notice', 'View', 'web', NULL, NULL),
(1719, 'notice-create', 'Notice', 'Create', 'web', NULL, NULL),
(1720, 'notice-edit', 'Notice', 'Edit', 'web', NULL, NULL),
(1721, 'notice-delete', 'Notice', 'Delete', 'web', NULL, NULL),
(1874, 'topbar-setting-view', 'Contact Setting', 'Manage', 'web', NULL, NULL),
(1875, 'social-setting-view', 'Social Setting', 'Manage', 'web', NULL, NULL),
(1876, 'slider-view', 'Slider', 'View', 'web', NULL, NULL),
(1877, 'slider-create', 'Slider', 'Create', 'web', NULL, NULL),
(1878, 'slider-edit', 'Slider', 'Edit', 'web', NULL, NULL),
(1879, 'slider-delete', 'Slider', 'Delete', 'web', NULL, NULL),
(1880, 'about-us-view', 'About Us', 'Manage', 'web', NULL, NULL),
(1881, 'feature-view', 'Feature', 'View', 'web', NULL, NULL),
(1882, 'feature-create', 'Feature', 'Create', 'web', NULL, NULL),
(1883, 'feature-edit', 'Feature', 'Edit', 'web', NULL, NULL),
(1884, 'feature-delete', 'Feature', 'Delete', 'web', NULL, NULL),
(1885, 'course-view', 'Course', 'View', 'web', NULL, NULL),
(1886, 'course-create', 'Course', 'Create', 'web', NULL, NULL),
(1887, 'course-edit', 'Course', 'Edit', 'web', NULL, NULL),
(1888, 'course-delete', 'Course', 'Delete', 'web', NULL, NULL),
(1889, 'web-event-view', 'Web Event', 'View', 'web', NULL, NULL),
(1890, 'web-event-create', 'Web Event', 'Create', 'web', NULL, NULL),
(1891, 'web-event-edit', 'Web Event', 'Edit', 'web', NULL, NULL),
(1892, 'web-event-delete', 'Web Event', 'Delete', 'web', NULL, NULL),
(1893, 'news-view', 'News', 'View', 'web', NULL, NULL),
(1894, 'news-create', 'News', 'Create', 'web', NULL, NULL),
(1895, 'news-edit', 'News', 'Edit', 'web', NULL, NULL),
(1896, 'news-delete', 'News', 'Delete', 'web', NULL, NULL),
(1897, 'gallery-view', 'Gallery', 'View', 'web', NULL, NULL),
(1898, 'gallery-create', 'Gallery', 'Create', 'web', NULL, NULL),
(1899, 'gallery-edit', 'Gallery', 'Edit', 'web', NULL, NULL),
(1900, 'gallery-delete', 'Gallery', 'Delete', 'web', NULL, NULL),
(1901, 'faq-view', 'Faq', 'View', 'web', NULL, NULL),
(1902, 'faq-create', 'Faq', 'Create', 'web', NULL, NULL),
(1903, 'faq-edit', 'Faq', 'Edit', 'web', NULL, NULL),
(1904, 'faq-delete', 'Faq', 'Delete', 'web', NULL, NULL),
(1905, 'testimonial-view', 'Testimonial', 'View', 'web', NULL, NULL),
(1906, 'testimonial-create', 'Testimonial', 'Create', 'web', NULL, NULL),
(1907, 'testimonial-edit', 'Testimonial', 'Edit', 'web', NULL, NULL),
(1908, 'testimonial-delete', 'Testimonial', 'Delete', 'web', NULL, NULL),
(1909, 'page-view', 'Footer Page', 'View', 'web', NULL, NULL),
(1910, 'page-create', 'Footer Page', 'Create', 'web', NULL, NULL),
(1911, 'page-edit', 'Footer Page', 'Edit', 'web', NULL, NULL),
(1912, 'page-delete', 'Footer Page', 'Delete', 'web', NULL, NULL),
(1913, 'call-to-action-view', 'Call To Action', 'Manage', 'web', NULL, NULL),
(1929, 'setting-view', 'General Setting', 'Manage', 'web', NULL, NULL),
(1930, 'mail-setting-view', 'Mail Setting', 'Manage', 'web', NULL, NULL),
(1931, 'sms-setting-view', 'SMS Setting', 'Manage', 'web', NULL, NULL),
(1932, 'application-setting-view', 'Application Setting', 'Manage', 'web', NULL, NULL),
(1933, 'role-view', 'Role and Permissions', 'View', 'web', NULL, NULL),
(1934, 'role-create', 'Role and Permissions', 'Create', 'web', NULL, NULL),
(1935, 'role-edit', 'Role and Permissions', 'Edit', 'web', NULL, NULL),
(1936, 'role-delete', 'Role and Permissions', 'Delete', 'web', NULL, NULL),
(1937, 'field-staff', 'Field Setting', 'Staff', 'web', NULL, NULL),
(1938, 'field-student', 'Field Setting', 'Student', 'web', NULL, NULL),
(1939, 'field-application', 'Field Setting', 'Application', 'web', NULL, NULL),
(1941, 'profile-view', 'My Profile', 'View', 'web', NULL, NULL),
(1942, 'profile-edit', 'My Profile', 'Edit', 'web', NULL, NULL),
(1943, 'profile-account', 'My Profile', 'Account', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phone_logs`
--

CREATE TABLE `phone_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) NOT NULL,
  `date` date NOT NULL,
  `follow_up_date` date DEFAULT NULL,
  `call_duration` varchar(191) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `call_type` int(11) NOT NULL COMMENT '1 Income & 2 Outgoing',
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_logs`
--

INSERT INTO `phone_logs` (`id`, `name`, `phone`, `date`, `follow_up_date`, `call_duration`, `start_time`, `end_time`, `purpose`, `note`, `call_type`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Quon Sellers', '+1 (948) 556-2442', '2022-10-01', '2022-11-25', '2 min', NULL, NULL, 'Ratione excepturi qu', 'Minus maxime Nam mag', 1, 1, 1, NULL, '2022-10-01 12:17:13', '2022-10-01 12:17:13'),
(2, 'Tanya Grimes', '+1 (988) 107-4828', '2022-10-01', '2022-11-13', '3:50', NULL, NULL, 'Tempore sint est ne', 'Lorem omnis nostrum', 1, 1, 1, NULL, '2022-10-01 12:18:04', '2022-10-01 12:18:04'),
(3, 'Karyn Castillo', '+1 (923) 454-6055', '2021-12-18', '2022-10-09', '5 min', NULL, NULL, 'Et eos corrupti qui', 'Est eius doloremque', 1, 1, 1, NULL, '2022-10-01 12:18:59', '2022-10-01 12:18:59'),
(4, 'Quentin Alford', '+1 (628) 618-3668', '2022-07-20', '2022-11-18', '8:50', NULL, NULL, 'Velit omnis quas dis', 'Laboriosam et quide', 2, 1, 1, NULL, '2022-10-01 12:19:34', '2022-10-01 12:19:34'),
(5, 'Sasha Harper', '+1 (612) 725-1207', '2021-03-12', '2022-10-05', '6 min', NULL, NULL, 'Sint quas ullamco v', 'Architecto numquam q', 2, 1, 1, NULL, '2022-10-01 12:20:45', '2022-10-01 12:20:45'),
(6, 'Cleo Simpson', '+1 (305) 133-4681', '2022-05-28', NULL, NULL, NULL, NULL, 'Quos non maiores eos', 'Et obcaecati aut aut', 1, 1, 1, NULL, '2022-10-01 12:23:14', '2022-10-01 12:23:14'),
(7, 'Meredith Baxter', '+1 (502) 865-8511', '2023-08-25', '2024-11-11', 'Exercitationem tenet', '13:27:00', NULL, 'Incididunt reiciendi', 'Ut inventore error m', 2, 1, 1, NULL, '2023-08-25 07:27:35', '2023-08-25 07:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `print_settings`
--

CREATE TABLE `print_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `title` text DEFAULT NULL,
  `header_left` text DEFAULT NULL,
  `header_center` text DEFAULT NULL,
  `header_right` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `footer_left` text DEFAULT NULL,
  `footer_center` text DEFAULT NULL,
  `footer_right` text DEFAULT NULL,
  `logo_left` text DEFAULT NULL,
  `logo_right` text DEFAULT NULL,
  `background` text DEFAULT NULL,
  `width` varchar(191) NOT NULL DEFAULT 'auto',
  `height` varchar(191) NOT NULL DEFAULT 'auto',
  `student_photo` tinyint(1) NOT NULL DEFAULT 0,
  `barcode` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `print_settings`
--

INSERT INTO `print_settings` (`id`, `slug`, `title`, `header_left`, `header_center`, `header_right`, `body`, `footer_left`, `footer_center`, `footer_right`, `logo_left`, `logo_right`, `background`, `width`, `height`, `student_photo`, `barcode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'class-routine', 'Our University Class Routine', NULL, NULL, NULL, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.</p>', NULL, NULL, NULL, 'logo_1664567071.jpg', 'logo_1664567071.jpg', NULL, '1000px', 'auto', 0, 0, 1, '2022-09-30 13:44:31', '2022-09-30 13:44:31'),
(2, 'exam-routine', 'Our University Exam Routine', NULL, NULL, NULL, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.</p>', NULL, NULL, NULL, 'logo_1664567122.jpg', 'logo_1664567122.jpg', NULL, '800px', 'auto', 0, 0, 1, '2022-09-30 13:45:22', '2022-09-30 13:45:22'),
(3, 'admit-card', 'Final Exam Admit Card', NULL, NULL, NULL, NULL, 'Exam Controller', NULL, 'Issued By', 'logo_1664567252.jpg', NULL, NULL, '600px', 'auto', 1, 0, 1, '2022-09-30 13:47:32', '2022-10-01 04:36:39'),
(4, 'fees-receipt', 'Our University Fees Receipt', NULL, NULL, NULL, NULL, 'Student Signature', NULL, 'Receiver Signature', 'logo_1664567807.jpg', 'logo_1664567807.jpg', NULL, '800px', 'auto', 0, 0, 1, '2022-09-30 13:56:47', '2022-10-01 04:26:02'),
(5, 'pay-slip', 'PSR ENGINEERING COLLEGE', NULL, NULL, NULL, NULL, 'Accountant', NULL, 'Receiver', NULL, 'psr_engg_college_1704851313.png', NULL, '800px', 'auto', 0, 0, 1, '2022-09-30 14:00:33', '2024-01-09 20:18:56'),
(6, 'visitor-token', 'Visitor Token', NULL, NULL, NULL, NULL, 'Authority', NULL, 'Issues By', NULL, 'logo_1664617034.jpg', NULL, '600px', 'auto', 0, 1, 1, '2022-10-01 03:37:14', '2022-10-01 12:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `shortcode` varchar(191) DEFAULT NULL,
  `registration` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `department_id`, `title`, `slug`, `shortcode`, `registration`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'UG', 'ug', 'ug', 0, 1, '2022-09-30 12:25:51', '2022-09-30 12:25:51'),
(2, 2, 'PG', 'pg', 'pg', 0, 1, '2022-09-30 12:27:43', '2022-09-30 12:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'super-admin', 'web', '2022-09-30 12:00:46', '2022-09-30 12:00:46'),
(2, 'Admin', 'admin', 'web', NULL, NULL),
(4, 'DepartmentWebEditor', 'department-web-editor', 'web', NULL, NULL),
(6, 'PlacementOfficer', 'placement-officer', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1544, 1),
(1544, 2),
(1545, 1),
(1545, 2),
(1546, 1),
(1546, 2),
(1547, 1),
(1547, 2),
(1548, 1),
(1548, 2),
(1549, 1),
(1549, 2),
(1550, 1),
(1550, 2),
(1551, 1),
(1551, 2),
(1560, 1),
(1560, 2),
(1561, 1),
(1561, 2),
(1562, 1),
(1562, 2),
(1563, 1),
(1563, 2),
(1572, 1),
(1572, 2),
(1573, 1),
(1573, 2),
(1574, 1),
(1574, 2),
(1575, 1),
(1575, 2),
(1576, 1),
(1576, 2),
(1682, 1),
(1682, 2),
(1683, 1),
(1683, 2),
(1684, 1),
(1684, 2),
(1685, 1),
(1685, 2),
(1686, 1),
(1686, 2),
(1687, 1),
(1687, 2),
(1688, 1),
(1688, 2),
(1689, 1),
(1689, 2),
(1707, 1),
(1707, 2),
(1708, 1),
(1708, 2),
(1709, 1),
(1709, 2),
(1710, 1),
(1710, 2),
(1711, 1),
(1711, 2),
(1712, 1),
(1712, 2),
(1713, 1),
(1713, 2),
(1713, 4),
(1714, 1),
(1714, 2),
(1714, 4),
(1715, 1),
(1715, 2),
(1715, 4),
(1716, 1),
(1716, 2),
(1716, 4),
(1718, 1),
(1718, 2),
(1718, 4),
(1719, 1),
(1719, 2),
(1719, 4),
(1720, 1),
(1720, 2),
(1720, 4),
(1721, 1),
(1721, 2),
(1721, 4),
(1874, 1),
(1874, 2),
(1875, 1),
(1875, 2),
(1876, 1),
(1876, 2),
(1876, 4),
(1877, 1),
(1877, 2),
(1877, 4),
(1878, 1),
(1878, 2),
(1878, 4),
(1879, 1),
(1879, 2),
(1879, 4),
(1880, 1),
(1880, 2),
(1880, 4),
(1881, 1),
(1881, 2),
(1882, 1),
(1882, 2),
(1883, 1),
(1883, 2),
(1884, 1),
(1884, 2),
(1885, 1),
(1885, 2),
(1886, 1),
(1886, 2),
(1887, 1),
(1887, 2),
(1888, 1),
(1888, 2),
(1889, 1),
(1889, 2),
(1889, 4),
(1890, 1),
(1890, 2),
(1890, 4),
(1891, 1),
(1891, 2),
(1891, 4),
(1892, 1),
(1892, 2),
(1892, 4),
(1893, 1),
(1893, 2),
(1893, 4),
(1894, 1),
(1894, 2),
(1894, 4),
(1895, 1),
(1895, 2),
(1895, 4),
(1896, 1),
(1896, 2),
(1896, 4),
(1897, 1),
(1897, 2),
(1898, 1),
(1898, 2),
(1899, 1),
(1899, 2),
(1900, 1),
(1900, 2),
(1901, 1),
(1901, 2),
(1901, 4),
(1902, 1),
(1902, 2),
(1902, 4),
(1903, 1),
(1903, 2),
(1903, 4),
(1904, 1),
(1904, 2),
(1904, 4),
(1905, 1),
(1905, 2),
(1905, 4),
(1906, 1),
(1906, 2),
(1906, 4),
(1907, 1),
(1907, 2),
(1907, 4),
(1908, 1),
(1908, 2),
(1908, 4),
(1909, 1),
(1909, 2),
(1910, 1),
(1910, 2),
(1911, 1),
(1911, 2),
(1912, 1),
(1912, 2),
(1913, 1),
(1913, 2),
(1929, 1),
(1929, 2),
(1930, 1),
(1930, 2),
(1931, 1),
(1931, 2),
(1932, 1),
(1932, 2),
(1933, 1),
(1933, 2),
(1934, 1),
(1934, 2),
(1935, 1),
(1935, 2),
(1936, 1),
(1936, 2),
(1937, 1),
(1937, 2),
(1938, 1),
(1938, 2),
(1939, 1),
(1939, 2),
(1941, 1),
(1941, 2),
(1941, 4),
(1941, 6),
(1942, 1),
(1942, 2),
(1942, 4),
(1942, 6),
(1943, 1),
(1943, 2);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_settings`
--

CREATE TABLE `schedule_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `day` int(11) NOT NULL,
  `time` time NOT NULL,
  `email` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 Inactive, 1 Active',
  `sms` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 Inactive, 1 Active',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `seat` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `seat`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Section A', NULL, 1, '2022-09-30 13:27:34', '2022-09-30 13:28:09'),
(2, 'Section B', NULL, 1, '2022-09-30 13:29:15', '2022-09-30 13:29:15'),
(3, 'Section C', NULL, 1, '2022-09-30 13:30:12', '2022-09-30 13:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `year` varchar(191) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `title`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, '1st Semester', '1', 1, '2022-09-30 13:22:04', '2022-09-30 13:22:04'),
(2, '2nd Semester', '1', 1, '2022-09-30 13:22:18', '2022-09-30 13:22:18'),
(3, '3rd Semester', '2', 1, '2022-09-30 13:22:32', '2022-09-30 13:22:32'),
(4, '4th Semester', '2', 1, '2022-09-30 13:22:48', '2022-09-30 13:22:48'),
(5, '5th Semester', '3', 1, '2022-09-30 13:23:03', '2022-09-30 13:23:03'),
(6, '6th Semester', '3', 1, '2022-09-30 13:23:13', '2022-09-30 13:23:13'),
(7, '7th Semester', '4', 1, '2022-09-30 13:23:24', '2022-09-30 13:23:24'),
(8, '8th Semester', '4', 1, '2022-09-30 13:23:32', '2022-09-30 13:23:32'),
(9, '9th Semester', '5', 1, '2022-09-30 13:24:02', '2022-09-30 13:24:02'),
(10, '10th Semester', '5', 1, '2022-09-30 13:24:55', '2022-09-30 13:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `current` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `title`, `start_date`, `end_date`, `current`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fall-2021', '2021-01-01', '2021-06-30', 0, 1, '2022-09-30 12:00:47', '2022-09-30 13:18:44'),
(2, 'Spring-2021', '2021-07-01', '2021-12-31', 0, 1, '2022-09-30 13:17:39', '2022-09-30 13:18:44'),
(3, 'Fall-2022', '2022-01-01', '2022-07-30', 0, 1, '2022-09-30 13:18:14', '2022-09-30 13:18:44'),
(4, 'Spring-2022', '2022-07-01', '2022-12-01', 1, 1, '2022-09-30 13:18:44', '2022-09-30 13:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `academy_code` varchar(191) DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `logo_path` text DEFAULT NULL,
  `favicon_path` text DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `fax` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `language` varchar(191) DEFAULT NULL,
  `date_format` varchar(191) DEFAULT NULL,
  `time_format` varchar(191) DEFAULT NULL,
  `week_start` varchar(191) DEFAULT NULL,
  `time_zone` varchar(191) DEFAULT NULL,
  `currency` varchar(191) DEFAULT NULL,
  `currency_symbol` varchar(191) DEFAULT NULL,
  `decimal_place` int(11) NOT NULL DEFAULT 2,
  `copyright_text` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `academy_code`, `meta_title`, `meta_description`, `meta_keywords`, `logo_path`, `favicon_path`, `phone`, `email`, `fax`, `address`, `language`, `date_format`, `time_format`, `week_start`, `time_zone`, `currency`, `currency_symbol`, `decimal_place`, `copyright_text`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PSR ENGINEERING COLLEGE', NULL, 'PSR | Engineering College | Sivkasi', 'PSR ENGINEERING COLLEGE, Sivakasi. One of the Best Engineering College in South India', 'PSR | Engineering College | Sivkasi', 'PSR_logo_text_1705513896.png', 'psr_engg_college_1705524762.png', NULL, NULL, NULL, NULL, NULL, 'd-m-Y', 'h:i A', NULL, 'Asia/Kolkata', 'INR', '₹', 2, '<p>2024&nbsp; - PSR Engineering College&nbsp; | Sivakasi</p>', 1, '2022-09-30 12:00:47', '2024-01-17 15:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `sub_title` text DEFAULT NULL,
  `button_text` varchar(191) DEFAULT NULL,
  `button_link` varchar(191) DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `language_id`, `department_id`, `title`, `sub_title`, `button_text`, `button_link`, `attach`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Education is the best key success in life', 'Donec vitae libero non enim placerat eleifend aliquam erat volutpat. Curabitur diam ex, dapibus purus sapien, cursus sed nisl tristique, commodo gravida lectus non.', 'Discover More', 'https://www.psr.edu.in', '1_1704853822.jpg', 1, '2023-08-24 16:10:47', '2024-01-09 21:00:23'),
(2, 1, 0, 'Welcome to the largest campus of education', 'Donec vitae libero non enim placerat eleifend aliquam erat volutpat. Curabitur diam ex, dapibus purus sapien, cursus sed nisl tristique, commodo gravida lectus non.', 'Discover More', 'https://www.psr.edu.in/', '2_1704853835.jpg', 1, '2023-08-24 16:11:53', '2024-01-09 21:00:35'),
(3, 1, 3, 'Welcome to the largest campus of education in ECE Department', '', 'Discover More', 'https://www.psr.edu.in/', '2_1704853835.jpg', 1, '2023-08-24 16:11:53', '2024-01-09 21:00:35'),
(4, 1, 3, 'Welcome Juniors', 'We are EEE', 'Read More', 'https://www.google.co.in', 'Avatar_Profile_Vector_PNG_Clipart_1709119024.png', 1, '2024-02-28 05:47:04', '2024-02-28 05:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `social_settings`
--

CREATE TABLE `social_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `twitter` varchar(191) DEFAULT NULL,
  `linkedin` varchar(191) DEFAULT NULL,
  `instagram` varchar(191) DEFAULT NULL,
  `pinterest` varchar(191) DEFAULT NULL,
  `youtube` varchar(191) DEFAULT NULL,
  `tiktok` varchar(191) DEFAULT NULL,
  `skype` varchar(191) DEFAULT NULL,
  `telegram` varchar(191) DEFAULT NULL,
  `whatsapp` varchar(191) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_settings`
--

INSERT INTO `social_settings` (`id`, `facebook`, `twitter`, `linkedin`, `instagram`, `pinterest`, `youtube`, `tiktok`, `skype`, `telegram`, `whatsapp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com', 'https://twitter.com', 'https://www.linkedin.com/company', NULL, 'https://www.pinterest.com', 'https://www.youtube.com', NULL, NULL, NULL, NULL, 1, '2023-08-24 15:50:31', '2024-01-17 17:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `tax_settings`
--

CREATE TABLE `tax_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `min_amount` decimal(10,2) NOT NULL,
  `max_amount` decimal(10,2) NOT NULL,
  `percentange` double(4,2) NOT NULL,
  `max_no_taxable_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_settings`
--

INSERT INTO `tax_settings` (`id`, `min_amount`, `max_amount`, `percentange`, `max_no_taxable_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 0.00, 5000.00, 0.00, 0.00, 1, NULL, NULL),
(2, 5001.00, 10000.00, 5.00, 5000.00, 1, NULL, NULL),
(3, 10001.00, 20000.00, 10.00, 5000.00, 1, NULL, '2022-10-01 05:22:30'),
(4, 20001.00, 50000.00, 15.00, 5000.00, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED DEFAULT 0,
  `name` varchar(191) NOT NULL,
  `designation` varchar(191) DEFAULT NULL,
  `description` text NOT NULL,
  `rating` double(2,2) NOT NULL DEFAULT 0.99,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `language_id`, `department_id`, `name`, `designation`, `description`, `rating`, `attach`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Navani priya', '', 'Curabitur ac tortor ante. Sed quis iaculis risus. Ut ultrices ligula aliquet odio tristique euismod. Donec efficitur dolor in turpis aliquet, at mollis.', 0.99, 'testi_avatar_1692915788.png', 1, '2023-08-24 16:23:08', '2023-08-24 16:23:08'),
(2, 1, 0, 'Jeevakarthik Kandhasamy', '', 'Curabitur ac tortor ante. Sed quis iaculis risus. Ut ultrices ligula aliquet odio tristique euismod. Donec efficitur dolor in turpis aliquet, at mollis.', 0.99, 'testi_avatar_02_1692915825.png', 1, '2023-08-24 16:23:45', '2023-08-24 16:23:45'),
(3, 1, 0, 'Rajesh Kanna', '', 'Curabitur ac tortor ante. Sed quis iaculis risus. Ut ultrices ligula aliquet odio tristique euismod. Donec efficitur dolor in turpis aliquet, at mollis.', 0.99, 'testi_avatar_03_1692915872.png', 1, '2023-08-24 16:24:32', '2023-08-24 16:24:32'),
(4, 1, 0, 'ShanmugaBabu Tamilarasu', '', 'Curabitur ac tortor ante. Sed quis iaculis risus. Ut ultrices ligula aliquet odio tristique euismod. Donec efficitur dolor in turpis aliquet, at mollis.', 0.99, 'testi_avatar_1692915924.png', 1, '2023-08-24 16:25:24', '2023-08-24 16:25:24'),
(5, 1, 0, 'Rajesh Kumar', '', 'Curabitur ac tortor ante. Sed quis iaculis risus. Ut ultrices ligula aliquet odio tristique euismod. Donec efficitur dolor in turpis aliquet, at mollis.', 0.99, 'testi_avatar_02_1692915972.png', 1, '2023-08-24 16:26:12', '2023-08-24 16:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `topbar_settings`
--

CREATE TABLE `topbar_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `address_title` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `working_hour` varchar(191) DEFAULT NULL,
  `about_title` varchar(191) DEFAULT NULL,
  `about_summery` text DEFAULT NULL,
  `social_title` varchar(191) DEFAULT NULL,
  `social_status` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topbar_settings`
--

INSERT INTO `topbar_settings` (`id`, `address_title`, `address`, `email`, `phone`, `working_hour`, `about_title`, `about_summery`, `social_title`, `social_status`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Sevalpatti, Sivakasi - 626140.  Virudhunagar (Dist), Tamil Nadu India', 'contact@psr.edu.in', '80125 30321/ 80125 30323', NULL, NULL, NULL, NULL, 1, 1, '2023-08-24 15:52:44', '2024-01-17 17:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` varchar(191) NOT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `designation_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `mother_name` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `password_text` longtext DEFAULT NULL,
  `gender` int(11) NOT NULL COMMENT '1 Male, 2 Female & 3 Other',
  `dob` date NOT NULL,
  `joining_date` date DEFAULT NULL,
  `ending_date` date DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `emergency_phone` varchar(191) DEFAULT NULL,
  `mother_tongue` varchar(191) DEFAULT NULL,
  `marital_status` int(11) DEFAULT NULL,
  `blood_group` int(11) DEFAULT NULL,
  `nationality` varchar(191) DEFAULT NULL,
  `national_id` varchar(191) DEFAULT NULL,
  `passport_no` varchar(191) DEFAULT NULL,
  `present_province` int(10) UNSIGNED DEFAULT NULL,
  `present_district` int(10) UNSIGNED DEFAULT NULL,
  `present_village` text DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_province` int(10) UNSIGNED DEFAULT NULL,
  `permanent_district` int(10) UNSIGNED DEFAULT NULL,
  `permanent_village` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `education_level` varchar(191) DEFAULT NULL,
  `graduation_academy` varchar(191) DEFAULT NULL,
  `year_of_graduation` varchar(191) DEFAULT NULL,
  `graduation_field` varchar(191) DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `basic_salary` double(10,2) DEFAULT 0.00,
  `contract_type` int(11) DEFAULT 1 COMMENT '1 Full Time & 2 Part Time',
  `work_shift` int(10) UNSIGNED DEFAULT NULL,
  `salary_type` int(11) DEFAULT 1 COMMENT '1 Fixed & 2 Hourly',
  `bank_account_name` varchar(191) DEFAULT NULL,
  `bank_account_no` varchar(191) DEFAULT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `ifsc_code` varchar(191) DEFAULT NULL,
  `bank_brach` varchar(191) DEFAULT NULL,
  `tin_no` varchar(191) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `joining_letter` text DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `login` tinyint(1) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 Inactive, 1 Active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `religion` varchar(191) DEFAULT NULL,
  `caste` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `epf_no` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `staff_id`, `department_id`, `designation_id`, `first_name`, `last_name`, `father_name`, `mother_name`, `email`, `email_verified_at`, `password`, `password_text`, `gender`, `dob`, `joining_date`, `ending_date`, `phone`, `emergency_phone`, `mother_tongue`, `marital_status`, `blood_group`, `nationality`, `national_id`, `passport_no`, `present_province`, `present_district`, `present_village`, `present_address`, `permanent_province`, `permanent_district`, `permanent_village`, `permanent_address`, `education_level`, `graduation_academy`, `year_of_graduation`, `graduation_field`, `experience`, `note`, `basic_salary`, `contract_type`, `work_shift`, `salary_type`, `bank_account_name`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_brach`, `tin_no`, `photo`, `signature`, `resume`, `joining_letter`, `is_admin`, `login`, `status`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`, `religion`, `caste`, `country`, `epf_no`) VALUES
(1, '1001', 0, 2, 'Super', 'Admin', 'ABC', 'XYZ', 'admin@mail.com', NULL, '$2y$10$RdSog4xnJYQlAL8CfEkScu5fq6lAK6PAHhRLiWRqqm.5Vbx3tgLTG', 'eyJpdiI6ImdEZVpac0I1amdTOVF0VXFobjZDOVE9PSIsInZhbHVlIjoiTmNUOHRNb0ZGTTVKN2JrNnNGdDJZdz09IiwibWFjIjoiODMyZDI4NDQzOWI2NjFmZTY2Y2QyZjRmZmExNjRiN2MyZTBlN2NmMDE5NDcyNGMwMGEwNjkwMjFiYmE1NWU0NiIsInRhZyI6IiJ9', 1, '2006-01-01', '2018-10-02', NULL, '0123456789', NULL, NULL, 2, 1, NULL, NULL, NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, 'Minima voluptatem f', 'Et sunt esse non pro', '2001', 'Eum sed do omnis mai', 'Quo sunt hic except', 'Distinctio Esse do', 50000.00, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 'FHlOJARFD2kCG4aDuL2UnerQ7PaGPIwhBSNkXcBqLt73qJ7Bfw8sL3U398Mr', NULL, 1, '2022-09-30 12:00:46', '2022-10-02 05:49:52', NULL, NULL, NULL, NULL),
(2, '1002', 3, 7, 'Incharge', 'Staff', NULL, NULL, 'test@psr.edu.in', NULL, '$2y$10$m/3Qi0Ps8Xc0MGqhL4b9zuUcSzn3mTg8xwTJ4NbalFQ9jkRJ0by02', 'eyJpdiI6IjNyTThjamlZZmo4NlJ4cHNLQjJwMHc9PSIsInZhbHVlIjoiU005MjEwWWRiZnM4NlcyQzZWWDEvZz09IiwibWFjIjoiMTU5OTdmOTk1ZWY5OGI4OWEyMDZhYWIyM2Y3MWM4MTAzNzVlMzBhNDU5OTA3YWVmNDNmNGI0MGQwOWQ0NDhmYyIsInRhZyI6IiJ9', 2, '1995-05-03', '2016-06-04', NULL, '+919876543210', '0919876543210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kamachiamman_1706955098.jpg', NULL, NULL, NULL, 0, 1, 1, '3518yhrl8xtCRckXJ4paSdPwGHPH9OnSEIw7UMM4ss5dG3twCaMqqg3MkZPw', 1, 1, '2022-10-02 05:52:52', '2024-02-20 11:20:34', NULL, NULL, NULL, NULL),
(10, '1003', 9, 7, 'Website Content', 'Editor', NULL, NULL, 'testuser@psr.edu.in', NULL, '$2y$10$hSK73.4WS6OQTbWYHRA3CuScjaAw67C.puwGzcIG./9VCOw6waQ5G', 'eyJpdiI6Iit4b1FqVE5uTUZOZ1A1dE9HeXB1OFE9PSIsInZhbHVlIjoieEFubzdkM25TTUpHeGYydUdUV3Rodz09IiwibWFjIjoiZmU2ZmFjN2NkNmY4OWNmNzllZjEwOTRmMzNlNGQ5ZDE3MGJkMWM2ZWIyZmJhNmMxZTVmNzgzMmViNmU3ODgwOSIsInRhZyI6IiJ9', 1, '1980-07-02', NULL, '2001-01-01', '09790338991', '09944038991', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Avatar_Profile_Vector_PNG_Clipart_1710493259.png', NULL, NULL, NULL, 0, 1, 1, 'L6PzZ0xxa1antUa7KzqmSA05v7TjBt705yT2B79tRKiX1Io29VmIKpuu6lmn', 1, 1, '2024-02-03 04:50:26', '2024-03-15 03:30:59', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_program`
--

CREATE TABLE `user_program` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purpose_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `visit_from` text DEFAULT NULL,
  `id_no` varchar(191) DEFAULT NULL,
  `token` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `persons` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `purpose_id`, `department_id`, `name`, `father_name`, `phone`, `email`, `address`, `visit_from`, `id_no`, `token`, `date`, `in_time`, `out_time`, `persons`, `note`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 'Yoko Payne', 'Griffith Shaw', '+1 (466) 696-7792', 'koty@mailinator.com', NULL, 'Qui quis perferendis', NULL, 'Pass-100001', '2021-02-16', '00:00:00', '11:34:00', '1', 'Rem eu numquam dolor', NULL, 1, 1, NULL, '2022-10-01 11:49:03', '2022-10-01 11:49:03'),
(2, 3, 4, 'Ria Hodges', 'Lester Weber', '+1 (864) 185-6339', 'vubypa@mailinator.com', NULL, 'Voluptas id voluptas', NULL, 'Pass-100002', '2020-12-01', '00:00:00', '23:23:00', '1', 'Consequatur repellen', NULL, 1, 1, 1, '2022-10-01 11:49:30', '2022-10-01 11:50:04'),
(3, 4, 4, 'Astra Good', 'Cora Garrison', '+1 (873) 471-3381', 'dovejyjo@mailinator.com', NULL, 'Reiciendis id dolore', NULL, 'Pass-100003', '2022-01-21', '00:00:00', '03:35:00', '1', 'Qui saepe fuga Faci', 'logo_1664646638.jpg', 1, 1, 1, '2022-10-01 11:50:38', '2022-10-01 11:51:10'),
(4, 3, 3, 'Maile Chavez', 'Macy Harper', '+1 (703) 918-4114', 'zyxisiw@mailinator.com', NULL, 'Reprehenderit odio q', NULL, 'Pass-100004', '2022-10-01', '17:51:00', '19:55:00', '4', 'Odio id corrupti h', NULL, 1, 1, NULL, '2022-10-01 11:51:56', '2022-10-01 11:51:56'),
(5, 2, 3, 'Winifred Poole', 'Linus Guzman', '+1 (477) 757-3411', 'fysel@mailinator.com', NULL, 'A facere aut consequ', NULL, 'Pass-100005', '2020-09-16', '00:00:00', '08:55:00', '2', 'Similique totam esse', NULL, 1, 1, 1, '2022-10-01 11:52:20', '2022-10-01 11:52:42'),
(6, 4, 5, 'Lacey Mitchell', 'Zane Jefferson', '+1 (936) 186-6298', 'nywac@mailinator.com', NULL, 'Quis aute culpa aut', NULL, 'Pass-100006', '2021-10-01', '17:53:00', '16:11:00', '2', 'Vitae minima maiores', NULL, 1, 1, NULL, '2022-10-01 11:53:27', '2022-10-01 11:53:27'),
(7, 4, 1, 'Kirk Kline', 'Coby Rivas', '+1 (423) 673-6386', 'tife@mailinator.com', NULL, 'Porro aliquam sunt e', NULL, 'Pass-100007', '2020-08-20', '17:53:00', '03:57:00', '1', 'Placeat eiusmod qui', NULL, 1, 1, NULL, '2022-10-01 11:54:12', '2022-10-01 11:54:12'),
(8, 3, 2, 'Stewart Padilla', 'Cairo Stanton', '+1 (691) 309-1928', 'bavoc@mailinator.com', NULL, 'Cupiditate dolor pro', NULL, 'Pass-100008', '2021-05-22', '00:00:00', '10:47:00', '1', 'Eu eos lorem ab eos', NULL, 1, 1, NULL, '2022-10-01 11:54:40', '2022-10-01 11:54:40'),
(9, 4, 6, 'Jayme Holder', 'Barrett Mckee', '+1 (393) 487-6252', 'hixuter@mailinator.com', NULL, 'Maxime anim qui iust', NULL, 'Pass-100009', '2021-09-05', '00:00:00', '10:26:00', '1', 'Ex deserunt ea tenet', NULL, 1, 1, NULL, '2022-10-01 11:55:21', '2022-10-01 11:55:21'),
(10, 1, 3, 'Alexander Santana', 'Todd Clayton', '+1 (876) 649-1515', 'lypuhava@mailinator.com', NULL, 'Ab Nam eaque distinc', NULL, 'Pass-100010', '2022-06-12', '00:00:00', NULL, '1', 'Culpa sequi ad in ar', 'background-border_1664646980.png', 1, 1, NULL, '2022-10-01 11:56:20', '2022-10-01 11:56:20'),
(11, 1, 2, 'Neville Golden', 'Dane Holloway', '+1 (131) 631-6741', 'rumahorus@mailinator.com', NULL, 'Recusandae Vero eiu', NULL, 'Pass-100011', '2022-06-13', '00:00:00', NULL, '2', 'Repudiandae eaque sa', 'background-border_1664647025.png', 1, 1, NULL, '2022-10-01 11:57:05', '2022-10-01 11:57:05'),
(12, 4, 6, 'Keegan Mosley', 'Hu Blanchard', '+1 (869) 255-5927', 'xuhylal@mailinator.com', NULL, 'Quia beatae quibusda', NULL, 'Pass-100012', '2022-08-01', '17:57:00', '18:15:28', '1', 'Placeat itaque volu', NULL, 1, 1, 1, '2022-10-01 11:58:15', '2022-10-01 12:15:28'),
(13, 4, 4, 'Donovan Greer', 'Uma Fitzgerald', '+1 (612) 392-8493', 'kaqi@mailinator.com', NULL, 'Veniam ex quidem vo', NULL, 'Pass-100013', '2023-08-25', '13:24:00', '14:36:00', '1', 'Quidem qui saepe qui', NULL, 1, 1, NULL, '2023-08-25 07:24:40', '2023-08-25 07:24:40'),
(14, 3, 1, 'Timon Ayers', 'Mechelle Stein', '+1 (757) 657-5032', 'kikalemufo@mailinator.com', NULL, 'Pariatur Quia modi', NULL, 'Pass-100014', '2023-06-03', '00:00:00', '01:56:00', '1', 'Facilis omnis aliqua', NULL, 1, 1, NULL, '2023-08-25 07:26:47', '2023-08-25 07:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `visit_purposes`
--

CREATE TABLE `visit_purposes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visit_purposes`
--

INSERT INTO `visit_purposes` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Invigilation', 'invigilation', NULL, 1, '2022-10-01 03:39:14', '2022-10-01 03:39:14'),
(2, 'Parent Meeting', 'parent-meeting', NULL, 1, '2022-10-01 03:39:30', '2022-10-01 03:39:30'),
(3, 'Enquiry', 'enquiry', NULL, 1, '2022-10-01 03:39:51', '2022-10-01 03:39:51'),
(4, 'Attend Event', 'attend-event', NULL, 1, '2022-10-01 04:05:36', '2022-10-01 04:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `web_events`
--

CREATE TABLE `web_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_events`
--

INSERT INTO `web_events` (`id`, `language_id`, `title`, `slug`, `date`, `time`, `address`, `description`, `attach`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Basic UI & UX Design for new development', 'basic-ui-ux-design-for-new-development', '2027-04-14', '04:36:00', 'Mirpur Dhaka', '<p>The world of search engine optimization is complex and ever-changing, but you can easily understand the basics, and even a small amount of SEO knowledge can make a big difference. Free SEO education is also widely available on the web, including in guides like this! (Woohoo!) This guide is designed to describe all major aspects of SEO, from finding the terms and phrases (keywords) that can generate qualified traffic to your website, to making your site friendly to search engines, to building links and marketing the unique value of your site.Etiam pharetra erat sed fermentum feugiat velit mauris egestas quam ut erat justo.</p>\r\n<p>Fusce eleifend donec sapien sed phase lusa pellentesque lacus.Vivamus lorem arcu semper duiac. Cras ornare arcu avamus nda leo Etiam ind arcu. Morbi justo mauris tempus pharetra interdum at congue semper purus. Lorem ipsum dolor sit.The world of search engine optimization is complex and ever-changing, but you can easily understand the basics.</p>\r\n<p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia quaed inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Aelltes port lacus quis enim var sed efficitur turpis gilla sed sit amet finibus eros. Lorem Ipsum is simply dummy text of the printing.</p>\r\n<p>&nbsp;</p>', 'Kamachi_1710493392.jpeg', 1, '2023-08-24 16:38:22', '2024-03-15 03:33:12'),
(2, 1, 'Learning Network Webinars for Music Teachers', 'learning-network-webinars-for-music-teachers', '2026-11-20', '00:39:00', 'Rangpur, Bangladesh', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'evn_img_2_1692916827.jpg', 1, '2023-08-24 16:40:12', '2023-08-24 16:40:27'),
(3, 1, 'Digital Art & 3D Model – a future for film company', 'digital-art-3d-model-a-future-for-film-company', '2025-09-24', '02:41:00', 'Mirpur Dhaka', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n<p>&nbsp;</p>', 'evn_img_5_1692916908.jpg', 1, '2023-08-24 16:41:48', '2023-08-24 16:43:36'),
(4, 1, 'Description', 'description', '2024-03-15', NULL, NULL, '<p>Description</p>', 'Kamachi_1710493482.jpeg', 1, '2024-03-15 03:34:42', '2024-03-15 03:34:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `applications_email_unique` (`email`);

--
-- Indexes for table `application_settings`
--
ALTER TABLE `application_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `application_settings_slug_unique` (`slug`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_subject_id_foreign` (`subject_id`),
  ADD KEY `assignments_assign_by_foreign` (`assign_by`);

--
-- Indexes for table `call_to_actions`
--
ALTER TABLE `call_to_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_title_unique` (`title`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_title_unique` (`title`),
  ADD UNIQUE KEY `departments_slug_unique` (`slug`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_title_unique` (`title`),
  ADD UNIQUE KEY `designations_slug_unique` (`slug`);

--
-- Indexes for table `email_notifies`
--
ALTER TABLE `email_notifies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiries_reference_id_foreign` (`reference_id`),
  ADD KEY `enquiries_source_id_foreign` (`source_id`),
  ADD KEY `enquiries_program_id_foreign` (`program_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculties_title_unique` (`title`),
  ADD UNIQUE KEY `faculties_slug_unique` (`slug`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faqs_title_unique` (`title`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `features_title_unique` (`title`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fields_slug_unique` (`slug`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_name_unique` (`name`),
  ADD UNIQUE KEY `languages_code_unique` (`code`);

--
-- Indexes for table `mail_settings`
--
ALTER TABLE `mail_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_noteable_type_noteable_id_index` (`noteable_type`,`noteable_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notices_notice_no_unique` (`notice_no`),
  ADD KEY `notices_category_id_foreign` (`category_id`);

--
-- Indexes for table `notice_categories`
--
ALTER TABLE `notice_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notice_categories_title_unique` (`title`),
  ADD UNIQUE KEY `notice_categories_slug_unique` (`slug`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_title_unique` (`title`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phone_logs`
--
ALTER TABLE `phone_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `print_settings`
--
ALTER TABLE `print_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `print_settings_slug_unique` (`slug`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programs_title_unique` (`title`),
  ADD UNIQUE KEY `programs_slug_unique` (`slug`),
  ADD KEY `programs_faculty_id_foreign` (`department_id`) USING BTREE;

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schedule_settings`
--
ALTER TABLE `schedule_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schedule_settings_slug_unique` (`slug`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sections_title_unique` (`title`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semesters_title_unique` (`title`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sessions_title_unique` (`title`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sliders_title_unique` (`title`);

--
-- Indexes for table `social_settings`
--
ALTER TABLE `social_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_settings`
--
ALTER TABLE `tax_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testimonials_name_unique` (`name`);

--
-- Indexes for table `topbar_settings`
--
ALTER TABLE `topbar_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_staff_id_unique` (`staff_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_program`
--
ALTER TABLE `user_program`
  ADD KEY `user_program_user_id_foreign` (`user_id`),
  ADD KEY `user_program_program_id_foreign` (`program_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitors_purpose_id_foreign` (`purpose_id`),
  ADD KEY `visitors_department_id_foreign` (`department_id`);

--
-- Indexes for table `visit_purposes`
--
ALTER TABLE `visit_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visit_purposes_title_unique` (`title`),
  ADD UNIQUE KEY `visit_purposes_slug_unique` (`slug`);

--
-- Indexes for table `web_events`
--
ALTER TABLE `web_events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application_settings`
--
ALTER TABLE `application_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `call_to_actions`
--
ALTER TABLE `call_to_actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `email_notifies`
--
ALTER TABLE `email_notifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mail_settings`
--
ALTER TABLE `mail_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice_categories`
--
ALTER TABLE `notice_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1944;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone_logs`
--
ALTER TABLE `phone_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `print_settings`
--
ALTER TABLE `print_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedule_settings`
--
ALTER TABLE `schedule_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_settings`
--
ALTER TABLE `social_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tax_settings`
--
ALTER TABLE `tax_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topbar_settings`
--
ALTER TABLE `topbar_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `visit_purposes`
--
ALTER TABLE `visit_purposes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `web_events`
--
ALTER TABLE `web_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_assign_by_foreign` FOREIGN KEY (`assign_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `notice_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `FK_programs_departments` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_program`
--
ALTER TABLE `user_program`
  ADD CONSTRAINT `user_program_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_program_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `visitors_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `visitors_purpose_id_foreign` FOREIGN KEY (`purpose_id`) REFERENCES `visit_purposes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
