-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2021 at 12:23 PM
-- Server version: 10.3.31-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scottjpq_harold`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_reviews`
--

CREATE TABLE `audit_reviews` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `performed_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_reviews`
--

INSERT INTO `audit_reviews` (`id`, `title`, `body`, `performed_by`, `created_date`) VALUES
(1, 'Spiela', 'This is it', 'Admin', '2021-09-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_events`
--

CREATE TABLE `calendar_events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `note` longtext NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `event_time` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_events`
--

INSERT INTO `calendar_events` (`id`, `title`, `body`, `note`, `category`, `status`, `event_time`, `created_date`) VALUES
(1, 'Testing initiative', 'Lorem ipsum color dolor radit Lorem ipsum color dolor radit\r\n', 'This is an additional event or note that is added into the calendar events.', 'Appointments', 'Upcoming', '10am', '2021-09-18 00:00:00'),
(2, 'Looking at an initiative', 'Lorem ipsum dolor doeum pseudo Lorem ipsum dolor doeum pseudo Lorem ipsum dolor doeum pseudo.', '', 'To-do List', 'Upcoming', '1pm', '2021-09-11 00:00:00'),
(3, 'Another Initiative', 'Lorem ipsum color doem Lorem ipsum color doem Lorem ipsum color doem', '', 'Meetings', 'Upcoming', '11am', '2021-09-06 00:00:00'),
(6, 'Finding a new calendar', 'This is all about finding a new calendar adding a new event.', 'This is an additional note that has been added into the events', 'Appointments', 'Upcoming', '9am', '2021-09-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(5) NOT NULL,
  `dob` timestamp NOT NULL DEFAULT current_timestamp(),
  `gender` varchar(10) NOT NULL,
  `ethnic` varchar(100) NOT NULL,
  `address` longtext NOT NULL,
  `telephone` varchar(22) NOT NULL,
  `child_status` varchar(50) NOT NULL,
  `support_hours` varchar(50) NOT NULL,
  `move_in_out` timestamp NOT NULL DEFAULT current_timestamp(),
  `induction` longtext NOT NULL,
  `complaint` longtext NOT NULL,
  `guardian` varchar(20) NOT NULL,
  `house_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `guardian_fullname` varchar(100) NOT NULL,
  `guardian_email` varchar(100) NOT NULL,
  `guardian_address` longtext NOT NULL,
  `guardian_telephone` varchar(22) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `code`, `fullname`, `email`, `age`, `dob`, `gender`, `ethnic`, `address`, `telephone`, `child_status`, `support_hours`, `move_in_out`, `induction`, `complaint`, `guardian`, `house_name`, `image`, `guardian_fullname`, `guardian_email`, `guardian_address`, `guardian_telephone`, `created_date`) VALUES
(1, 'ABXSO123', 'Tommy Oxbridge', 'mikaela@email.com', 6, '2015-04-06 17:51:37', 'Male', 'Black', 'Test house, Coventry Road', '07445847194', 'Semi-Independent', '9am-5pm', '2021-09-23 15:19:12', '', '', 'Mother', 'House A', 'pexels-food-diets.jpg', 'Mikaela Oxbridge', 'mikaela@email.com', 'Test house, Coventry Avenue', '07445847194', '2021-09-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_abilities_evaluation`
--

CREATE TABLE `children_abilities_evaluation` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_abilities_evaluation`
--

INSERT INTO `children_abilities_evaluation` (`id`, `code`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Ability 1', 'This is a test to show the ability of the child.', '2021-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_absences`
--

CREATE TABLE `children_absences` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_absences`
--

INSERT INTO `children_absences` (`id`, `code`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Turn 1', 'The child was absent in the class and school.', '2021-09-18 00:00:00'),
(2, 'ABXSO123', 'Turn 2', 'The child was absent in the class and school.', '2021-09-20 00:00:00'),
(3, 'ABXSO123', 'Turn 3', 'The child was absent in the class and school.', '2021-09-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_activity`
--

CREATE TABLE `children_activity` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `body` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `hour_time` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_activity`
--

INSERT INTO `children_activity` (`id`, `firstname`, `lastname`, `body`, `status`, `hour_time`, `created_date`) VALUES
(1, 'Dele', 'Tolly', 'The child was taken to various locations.', 'Ingoing', '11:30am', '2021-09-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_case_recording`
--

CREATE TABLE `children_case_recording` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_case_recording`
--

INSERT INTO `children_case_recording` (`id`, `code`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Case recording', 'This is the case recording that would be decided for the users.', '2021-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_disciplinaries`
--

CREATE TABLE `children_disciplinaries` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_disciplinaries`
--

INSERT INTO `children_disciplinaries` (`id`, `code`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Discipline 1', 'The child was not working with the care taker.', '2021-09-18 00:00:00'),
(2, 'ABXSO123', 'Discipline 2', 'The child was not working with the care taker.', '2021-09-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_finance_information`
--

CREATE TABLE `children_finance_information` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_finance_information`
--

INSERT INTO `children_finance_information` (`id`, `code`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Detailed Finance', 'I\'m speaking with myself, number one, because I have a very good brain and I\'ve said a lot of things. I write the best placeholder text, and I\'m the biggest developer on the web card she has is the Lorem card.', '2021-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_foster_care`
--

CREATE TABLE `children_foster_care` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(70) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_foster_care`
--

INSERT INTO `children_foster_care` (`id`, `code`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Unit 02', 'I\'m speaking with myself, number one, because I have a very good brain and I\'ve said a lot of things. I write the best placeholder text, and I\'m the biggest developer on the web card she has is the Lorem card.', '2021-09-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_health_information`
--

CREATE TABLE `children_health_information` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_health_information`
--

INSERT INTO `children_health_information` (`id`, `code`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Health Info', 'This is a good test for the health information about the user.', '2021-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_incidents`
--

CREATE TABLE `children_incidents` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_incidents`
--

INSERT INTO `children_incidents` (`id`, `code`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Incident 1', 'There was an issue that needed addressing in regards to their walking.', '2021-09-18 00:00:00'),
(2, 'ABXSO123', 'Incident 2', 'There was an issue that needed addressing in regards to their walking.', '2021-09-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_keywork_session`
--

CREATE TABLE `children_keywork_session` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_keywork_session`
--

INSERT INTO `children_keywork_session` (`id`, `code`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Keywork 1', 'This is a test for the Keywork session for this user.', '2021-09-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_medical_history`
--

CREATE TABLE `children_medical_history` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_medical_history`
--

INSERT INTO `children_medical_history` (`id`, `code`, `child_name`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Tommy Oxbridge', 'Full Medical History', 'I\'m speaking with myself, number one, because I have a very good brain and I\'ve said a lot of things. I write the best placeholder text, and I\'m the biggest developer on the web card she has is the Lorem card.', '2021-09-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_personal_education`
--

CREATE TABLE `children_personal_education` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_personal_education`
--

INSERT INTO `children_personal_education` (`id`, `code`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Complete Education plan', 'I\'m speaking with myself, number one, because I have a very good brain and I\'ve said a lot of things. I write the best placeholder text, and I\'m the biggest developer on the web card she has is the Lorem card.', '2021-09-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_sanction_rewards`
--

CREATE TABLE `children_sanction_rewards` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_sanction_rewards`
--

INSERT INTO `children_sanction_rewards` (`id`, `code`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Sanction Test 1', 'This is a new test for the sanction section.', '2021-09-18 00:00:00'),
(2, 'ABXSO123', 'Sanction Test 2', 'This is a new test for the sanction section.', '2021-09-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_supervision_action`
--

CREATE TABLE `children_supervision_action` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_supervision_action`
--

INSERT INTO `children_supervision_action` (`id`, `code`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Supervise 1', 'This is a test to know if you can be supervised.', '2021-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_visitor_logs`
--

CREATE TABLE `children_visitor_logs` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_visitor_logs`
--

INSERT INTO `children_visitor_logs` (`id`, `code`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Visitor 1', 'This is a visitor log for various children that come to the care taker.', '2021-09-20 00:00:00'),
(2, 'ABXSO123', 'Visitor 2', 'This is a visitor log for various children that come to the care taker.', '2021-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `document_storage`
--

CREATE TABLE `document_storage` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `category` varchar(50) NOT NULL,
  `doc` varchar(100) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `health_checks`
--

CREATE TABLE `health_checks` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `completed_by` varchar(100) NOT NULL,
  `medical_outcome` longtext NOT NULL,
  `child_feedback` longtext NOT NULL,
  `status` varchar(70) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_checks`
--

INSERT INTO `health_checks` (`id`, `title`, `body`, `completed_by`, `medical_outcome`, `child_feedback`, `status`, `created_time`, `created_date`) VALUES
(1, 'Spiela', 'This is a new check', 'Staff A', 'The Medical appointment was carried out and there was a final health check on the patient. We can do something better.', 'The child would be given special feedback and needed help.', 'Pending', '10am', '2021-09-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `house_repairs`
--

CREATE TABLE `house_repairs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `repair_fullname` varchar(100) NOT NULL,
  `repair_email` varchar(100) NOT NULL,
  `repair_mobile` varchar(22) NOT NULL,
  `repair_address` longtext NOT NULL,
  `created_time` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house_repairs`
--

INSERT INTO `house_repairs` (`id`, `title`, `body`, `category`, `status`, `repair_fullname`, `repair_email`, `repair_mobile`, `repair_address`, `created_time`, `created_date`) VALUES
(2, 'Plumbing works', 'This is a new house repair. I have tried completing it.', 'House A', 'Damaged', 'RpBy', 'rp@email.com', '020345934243', '92 Test Avenue, Collins gate.', '9am', '2021-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `incident_report`
--

CREATE TABLE `incident_report` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `management_children_incidents`
--

CREATE TABLE `management_children_incidents` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `incident` longtext NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `child_house` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `management_reports`
--

CREATE TABLE `management_reports` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `availabilty` varchar(50) NOT NULL,
  `staff_shift` datetime NOT NULL,
  `repair_performed_by` varchar(100) NOT NULL,
  `repair_date` datetime NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `management_reports`
--

INSERT INTO `management_reports` (`id`, `title`, `body`, `availabilty`, `staff_shift`, `repair_performed_by`, `repair_date`, `created_date`) VALUES
(3, 'Spiela', 'This is your test', 'Free', '2021-09-18 00:00:00', 'Repairman', '2021-09-25 00:00:00', '2021-09-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `management_staff`
--

CREATE TABLE `management_staff` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `shift_start_time` varchar(30) NOT NULL,
  `shift_end_time` varchar(10) NOT NULL,
  `shift_date` datetime NOT NULL,
  `availability` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `procedure_pol`
--

CREATE TABLE `procedure_pol` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `doc` varchar(100) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedure_pol`
--

INSERT INTO `procedure_pol` (`id`, `title`, `body`, `doc`, `created_time`, `created_date`) VALUES
(5, 'Spiela', 'This is a description', 'Scott_Nnaghor_CV.pdf', 1631265766, '2021-09-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `housename` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `category` varchar(50) NOT NULL,
  `telephone` varchar(22) NOT NULL,
  `mobile` varchar(22) NOT NULL,
  `address` longtext NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `housename`, `body`, `category`, `telephone`, `mobile`, `address`, `postcode`, `city`, `state`, `created_date`) VALUES
(2, 'Collin A', 'This is a new house that needs to be done in regards to the properties that was created.', 'House A', '02023429481', '073423428247', '33 Test Road, Collins Avenue.', 'IG1 9EE', 'Ilford', 'London', '2021-09-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `reminder_time` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `title`, `body`, `status`, `reminder_time`, `created_date`) VALUES
(2, 'Spiela', 'This is a reminder', 'Upcoming', '11am', '2021-09-09 00:00:00'),
(5, 'This is a testing Reminder', 'This is a new tested Reminder that would have been completed.', 'Upcoming', '11am', '2021-09-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `risk_assessment`
--

CREATE TABLE `risk_assessment` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_time` int(100) NOT NULL,
  `last_assessed` datetime NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risk_assessment`
--

INSERT INTO `risk_assessment` (`id`, `title`, `body`, `created_time`, `last_assessed`, `created_date`) VALUES
(2, 'Spiela', 'This is a new risk that shows assessment.', 1632337376, '2021-09-20 00:00:00', '2021-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sanction_report`
--

CREATE TABLE `sanction_report` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `house_name` varchar(100) NOT NULL,
  `disciplinary_date` datetime NOT NULL,
  `action_taken` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social_worker`
--

CREATE TABLE `social_worker` (
  `id` int(11) NOT NULL,
  `children_code` varchar(10) NOT NULL,
  `child_fullname` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(22) NOT NULL,
  `address` longtext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_worker`
--

INSERT INTO `social_worker` (`id`, `children_code`, `child_fullname`, `fullname`, `email`, `mobile`, `address`, `created_date`) VALUES
(1, 'ABXSO123', 'Tommy Oxbridge\r\n', 'Steven Smith', '', '', '', '2021-09-23 15:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `support_plan`
--

CREATE TABLE `support_plan` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `support_work`
--

CREATE TABLE `support_work` (
  `id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `body` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `children` varchar(100) NOT NULL,
  `covered_by` longtext NOT NULL,
  `understanding_service_user` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support_work`
--

INSERT INTO `support_work` (`id`, `title`, `body`, `status`, `children`, `covered_by`, `understanding_service_user`, `created_date`) VALUES
(4, 'An additional work', 'This is a new test.', 'Open', 'Tommy Oxbridge', 'This is one was covered by the person.', 'Connecting the service user and how it works.', '2021-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(70) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `telephone` varchar(22) NOT NULL,
  `address1` longtext NOT NULL,
  `address2` longtext NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `logged_in_time` int(100) NOT NULL,
  `logged_in_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `telephone`, `address1`, `address2`, `postcode`, `city`, `state`, `logged_in_time`, `logged_in_date`, `created_time`, `created_date`) VALUES
(1, 'Scott', 'Nnaghor', 'scottphenix24@gmail.com', '$2a$08$hOKXiDR3/phlWyFNo2ioY.bmXiMZfVW.QtQ8JaZIRcWOkGPeDJob.', 'Admin', '07368660611', '93 Wilmington Gardens', 'none', 'IG11 9TR', 'Barking', 'London', 1631737972, '2021-09-15 20:32:52', 1630515388, '2021-09-01 16:56:28'),
(2, 'Tom', 'Hardaway', 'admin@gmail.com', '$2a$08$iZAJQvoNIybuduho7AEEGetKm2XB92vZO85elWFeAMjapxodEKzRy', 'Staff', '', '', '', '', '', '', 1631271466, '2021-09-10 10:57:46', 1631271212, '2021-09-10 10:53:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_reviews`
--
ALTER TABLE `audit_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_events`
--
ALTER TABLE `calendar_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_abilities_evaluation`
--
ALTER TABLE `children_abilities_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_absences`
--
ALTER TABLE `children_absences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_activity`
--
ALTER TABLE `children_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_case_recording`
--
ALTER TABLE `children_case_recording`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_disciplinaries`
--
ALTER TABLE `children_disciplinaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_finance_information`
--
ALTER TABLE `children_finance_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_foster_care`
--
ALTER TABLE `children_foster_care`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_health_information`
--
ALTER TABLE `children_health_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_incidents`
--
ALTER TABLE `children_incidents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_keywork_session`
--
ALTER TABLE `children_keywork_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_medical_history`
--
ALTER TABLE `children_medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_personal_education`
--
ALTER TABLE `children_personal_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_sanction_rewards`
--
ALTER TABLE `children_sanction_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_supervision_action`
--
ALTER TABLE `children_supervision_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_visitor_logs`
--
ALTER TABLE `children_visitor_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_storage`
--
ALTER TABLE `document_storage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_checks`
--
ALTER TABLE `health_checks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house_repairs`
--
ALTER TABLE `house_repairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident_report`
--
ALTER TABLE `incident_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management_children_incidents`
--
ALTER TABLE `management_children_incidents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management_reports`
--
ALTER TABLE `management_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management_staff`
--
ALTER TABLE `management_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procedure_pol`
--
ALTER TABLE `procedure_pol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risk_assessment`
--
ALTER TABLE `risk_assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanction_report`
--
ALTER TABLE `sanction_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_worker`
--
ALTER TABLE `social_worker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_plan`
--
ALTER TABLE `support_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_work`
--
ALTER TABLE `support_work`
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
-- AUTO_INCREMENT for table `audit_reviews`
--
ALTER TABLE `audit_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calendar_events`
--
ALTER TABLE `calendar_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `children_abilities_evaluation`
--
ALTER TABLE `children_abilities_evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `children_absences`
--
ALTER TABLE `children_absences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `children_activity`
--
ALTER TABLE `children_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `children_case_recording`
--
ALTER TABLE `children_case_recording`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `children_disciplinaries`
--
ALTER TABLE `children_disciplinaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `children_finance_information`
--
ALTER TABLE `children_finance_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `children_foster_care`
--
ALTER TABLE `children_foster_care`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `children_health_information`
--
ALTER TABLE `children_health_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `children_incidents`
--
ALTER TABLE `children_incidents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `children_keywork_session`
--
ALTER TABLE `children_keywork_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `children_medical_history`
--
ALTER TABLE `children_medical_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `children_personal_education`
--
ALTER TABLE `children_personal_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `children_sanction_rewards`
--
ALTER TABLE `children_sanction_rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `children_supervision_action`
--
ALTER TABLE `children_supervision_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `children_visitor_logs`
--
ALTER TABLE `children_visitor_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `document_storage`
--
ALTER TABLE `document_storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `health_checks`
--
ALTER TABLE `health_checks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `house_repairs`
--
ALTER TABLE `house_repairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `incident_report`
--
ALTER TABLE `incident_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `management_children_incidents`
--
ALTER TABLE `management_children_incidents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `management_reports`
--
ALTER TABLE `management_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `management_staff`
--
ALTER TABLE `management_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `procedure_pol`
--
ALTER TABLE `procedure_pol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `risk_assessment`
--
ALTER TABLE `risk_assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanction_report`
--
ALTER TABLE `sanction_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_worker`
--
ALTER TABLE `social_worker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `support_plan`
--
ALTER TABLE `support_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `support_work`
--
ALTER TABLE `support_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
