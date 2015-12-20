-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2015 at 01:18 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `13027272d`
--
CREATE DATABASE IF NOT EXISTS `13027272d` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `13027272d`;

-- --------------------------------------------------------

--
-- Table structure for table `Activity`
--

CREATE TABLE `Activity` (
  `id` int(11) NOT NULL,
  `Activity_name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `documentLink` varchar(45) NOT NULL,
  `personInCharge` int(11) NOT NULL,
  `lastModifyTime` datetime NOT NULL,
  `startDatetime` datetime NOT NULL,
  `endDatetime` datetime NOT NULL,
  `Venue_id` int(11) NOT NULL,
  `Topic_id` int(11) NOT NULL,
  `ActivityType_id` int(11) NOT NULL,
  `Administrator_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Activity`
--

INSERT INTO `Activity` (`id`, `Activity_name`, `description`, `documentLink`, `personInCharge`, `lastModifyTime`, `startDatetime`, `endDatetime`, `Venue_id`, `Topic_id`, `ActivityType_id`, `Administrator_id`) VALUES
(1, 'Electrical Engineering Conference 2016', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', 'link', 4, '2015-12-19 21:49:52', '2015-12-21 12:00:00', '2015-12-21 14:00:00', 1, 1, 1, 2),
(2, 'Rehabilitation Technology Conference 2016', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', 'link', 6, '2015-12-19 21:50:01', '2015-12-21 13:00:00', '2015-12-21 15:00:00', 1, 8, 1, 2),
(3, 'Smart Living for Elderly and Children Care Conference 2016', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', 'link', 21, '2015-12-19 21:50:14', '2015-12-21 16:00:00', '2015-12-21 18:00:00', 1, 11, 1, 2),
(4, 'Long-Term Positive Emotion Detection Conference 2016', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', 'link', 20, '2015-12-19 21:50:26', '2015-12-20 09:00:00', '2015-12-20 11:00:00', 2, 14, 1, 2),
(5, 'Information Technology in Health and Mental Conference 2016', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', 'link', 4, '2015-12-19 21:50:35', '2015-12-20 13:00:00', '2015-12-20 15:00:00', 2, 21, 1, 2),
(6, 'Electrical Engineering Booth', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', 'link', 21, '2015-12-19 20:58:25', '2015-12-20 09:00:00', '2015-12-20 18:30:00', 3, 1, 2, 2),
(7, 'Rehabilitation Technology Booth', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', 'link', 6, '2015-12-19 20:58:22', '2015-12-21 09:00:00', '2015-12-21 18:30:00', 3, 8, 2, 2),
(8, 'Happiness Technology Conference 2016', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', 'link', 6, '2015-12-19 21:50:54', '2015-12-22 09:00:00', '2015-12-22 11:00:00', 1, 18, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ActivityType`
--

CREATE TABLE `ActivityType` (
  `id` int(11) NOT NULL,
  `ActivityType_name` varchar(45) NOT NULL,
  `description` varchar(256) NOT NULL,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ActivityType`
--

INSERT INTO `ActivityType` (`id`, `ActivityType_name`, `description`, `color`) VALUES
(1, 'Conference', 'conference', '#297770'),
(2, 'Exhibition', 'exhibition', '#BB5327'),
(3, 'Other', 'other', '#DDDDDD');

-- --------------------------------------------------------

--
-- Table structure for table `activity_old`
--

CREATE TABLE `activity_old` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `documentLink` varchar(45) DEFAULT NULL,
  `personInCharge` int(11) NOT NULL,
  `lastModifyTime` datetime NOT NULL,
  `startDatetime` datetime NOT NULL,
  `endDatetime` datetime NOT NULL,
  `Venue_id` int(11) NOT NULL,
  `Topic_id` int(11) NOT NULL,
  `ActivityType_id` int(11) NOT NULL,
  `Administrator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_old`
--

INSERT INTO `activity_old` (`id`, `name`, `description`, `documentLink`, `personInCharge`, `lastModifyTime`, `startDatetime`, `endDatetime`, `Venue_id`, `Topic_id`, `ActivityType_id`, `Administrator_id`) VALUES
(1, 'Electrical Engineering Conference 2015', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', NULL, 4, '2015-12-01 11:57:57', '2015-12-01 11:57:57', '0000-00-00 00:00:00', 1, 1, 1, 2),
(2, 'Rehabilitation Technology Conference 2015', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', NULL, 6, '2015-12-01 11:57:22', '2015-12-01 11:57:22', '0000-00-00 00:00:00', 1, 8, 1, 2),
(3, 'Smart Living for Elderly and Children Care Conference 2014', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', NULL, 4, '2015-12-01 11:58:00', '2014-12-03 10:00:00', '2014-12-03 13:00:00', 1, 11, 1, 2),
(4, 'Long-Term Positive Emotion Detection Conference 2015', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', NULL, 5, '2015-12-01 11:58:03', '2015-12-01 11:58:03', '0000-00-00 00:00:00', 2, 14, 1, 2),
(5, 'Information Technology in Health and Mental Conference 2015', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', NULL, 5, '2015-12-01 11:58:08', '2015-12-01 11:58:08', '0000-00-00 00:00:00', 2, 21, 1, 2),
(6, 'Electrical Engineering Booth', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', NULL, 4, '2015-12-01 11:58:05', '2015-12-01 11:58:05', '0000-00-00 00:00:00', 3, 1, 2, 2),
(7, 'Rehabilitation Technology Booth', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', NULL, 5, '2015-12-01 11:58:32', '2015-12-01 11:58:32', '0000-00-00 00:00:00', 3, 8, 2, 2),
(8, 'test', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ', NULL, 6, '2015-12-01 05:57:01', '2015-12-01 05:57:01', '0000-00-00 00:00:00', 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Administrator`
--

CREATE TABLE `Administrator` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Administrator`
--

INSERT INTO `Administrator` (`id`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `Announcement`
--

CREATE TABLE `Announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(400) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `datetime` datetime NOT NULL,
  `Administrator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Announcement`
--

INSERT INTO `Announcement` (`id`, `title`, `content`, `datetime`, `Administrator_id`) VALUES
(1, 'Conference2015 call for paper now. Welcome to submit your paper.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar', '2015-12-12 18:18:11', 2),
(2, 'Welcome Prof. David Tomson, York University to deliver a speech at the conference.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar', '2015-12-12 18:18:11', 2),
(3, 'The conference venue is avaliable now.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar', '2015-12-12 18:18:11', 2),
(4, 'The last round submission deadline extends to September 10, 2015.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar', '2015-12-12 18:18:11', 2),
(5, 'Abstracts have been uploaded, please have a look.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar', '2015-12-12 18:18:11', 2),
(6, 'The arrival and registration time on December 22, 2015 is changed.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar', '2015-12-12 18:18:11', 2),
(7, 'Test Announcement on 15/12/2015', 'content...', '2015-12-15 21:15:48', 2),
(8, 'Testing on Announcement System', 'Miami photographer Brian Smith is the luckiest guy on the planet. He won a Pulitzer Prize at 25, told Bill Gates what to do for an entire hour, exhibited at the Library of Congress, dined with the President, appeared on The X Factor, shared cupcakes with Anne Hathaway and got drunk with George Clooney. Isn’t it time he shares that luck with you? He’s ready to tackle your next shoot no matter where it is. Hire a Miami photographer with a global reach!', '2015-12-16 15:30:27', 2),
(9, 'Announcement on venue change on', 'venue change...', '2015-12-19 21:42:38', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Announcement_has_Participant`
--

CREATE TABLE `Announcement_has_Participant` (
  `Accouncement_id` int(11) NOT NULL,
  `Participant_id` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Announcement_has_Participant`
--

INSERT INTO `Announcement_has_Participant` (`Accouncement_id`, `Participant_id`, `is_read`) VALUES
(7, 1, 1),
(7, 2, 0),
(7, 3, 0),
(7, 4, 0),
(7, 5, 0),
(7, 6, 0),
(7, 7, 0),
(7, 8, 0),
(7, 9, 0),
(7, 10, 1),
(7, 16, 0),
(7, 17, 0),
(7, 18, 1),
(7, 19, 0),
(7, 20, 0),
(7, 21, 0),
(8, 1, 1),
(8, 2, 0),
(8, 3, 0),
(8, 4, 0),
(8, 5, 0),
(8, 6, 0),
(8, 7, 0),
(8, 8, 0),
(8, 9, 0),
(8, 10, 1),
(8, 16, 0),
(8, 17, 0),
(8, 18, 1),
(8, 19, 0),
(8, 20, 0),
(8, 21, 0),
(9, 1, 0),
(9, 2, 0),
(9, 3, 0),
(9, 4, 0),
(9, 5, 0),
(9, 6, 0),
(9, 7, 0),
(9, 8, 0),
(9, 9, 0),
(9, 10, 0),
(9, 16, 0),
(9, 17, 0),
(9, 18, 1),
(9, 19, 0),
(9, 20, 0),
(9, 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '2', 1450524002),
('Regular', '1', 1450613432),
('Regular', '16', 1450523683),
('Regular', '7', 1450524186),
('Speaker', '10', 1450523665),
('Speaker', '17', 1450613447),
('Speaker', '18', 1450523805),
('Speaker', '21', 1450523895),
('Speaker', '3', 1450523910),
('Speaker', '4', 1450523937),
('Speaker', '9', 1450524174),
('Sponsor', '8', 1450524181),
('Student', '19', 1450613472),
('Student', '5', 1450523965),
('VIP', '20', 1450523853),
('VIP', '6', 1450523981);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('activityCreate', 2, 'Create a new activity', NULL, NULL, 1448939755, 1448939755),
('activityDelete', 2, 'Delete a activity', NULL, NULL, 1448941054, 1448941054),
('activityEdit', 2, 'Do create, update and delete activities', NULL, NULL, 1448941054, 1448941054),
('activityRecord', 2, 'Show the record of the activity attendance', NULL, NULL, 1450502173, 1450502173),
('activityUpdate', 2, 'Update a activity', NULL, NULL, 1448941054, 1448941054),
('Admin', 1, NULL, NULL, NULL, 1448736339, 1448736339),
('announcementCreate', 2, 'Create an Announcement', NULL, NULL, 1450180373, 1450180373),
('announcementDelete', 2, 'Remove an Announcement', NULL, NULL, 1450180373, 1450180373),
('announcementEdit', 2, 'Update and Delete an Announcement', NULL, NULL, 1450180373, 1450180373),
('announcementIndex', 2, 'Index of the Announcement', NULL, NULL, 1450180373, 1450180373),
('announcementUpdate', 2, 'Update an Announcement', NULL, NULL, 1450180373, 1450180373),
('announcementView', 2, 'View an Announcement', NULL, NULL, 1450181012, 1450181012),
('categoryCreate', 2, 'Create a Category', NULL, NULL, 1450504038, 1450504038),
('categoryDelete', 2, 'Remove a Category', NULL, NULL, 1450504038, 1450504038),
('categoryEdit', 2, 'Update and Delete a Category', NULL, NULL, 1450504038, 1450504038),
('categoryIndex', 2, 'Index of the Category', NULL, NULL, 1450504038, 1450504038),
('categoryUpdate', 2, 'Update a Category', NULL, NULL, 1450504038, 1450504038),
('categoryView', 2, 'View a Category', NULL, NULL, 1450504038, 1450504038),
('couponCreate', 2, 'Create a coupon', NULL, NULL, 1450553091, 1450553091),
('couponDelete', 2, 'Remove a coupon', NULL, NULL, 1450553091, 1450553091),
('couponEdit', 2, 'Update and Delete a coupon', NULL, NULL, 1450553091, 1450553091),
('couponGet', 2, 'Get a coupon', NULL, NULL, 1450553091, 1450553091),
('couponIndex', 2, 'Index of the coupon', NULL, NULL, 1450553091, 1450553091),
('couponUpdate', 2, 'Update a coupon', NULL, NULL, 1450553091, 1450553091),
('couponView', 2, 'View a coupon', NULL, NULL, 1450553091, 1450553091),
('outsideAttractionCreate', 2, 'Create an Outside Attraction', NULL, NULL, 1449510943, 1449510943),
('outsideAttractionDelete', 2, 'Remove an Outside Attraction', NULL, NULL, 1449510943, 1449510943),
('outsideAttractionEdit', 2, 'Update and Delete an Outside Attraction', NULL, NULL, 1449510943, 1449510943),
('outsideAttractionIndex', 2, 'Index of the Outside Attraction', NULL, NULL, 1449510943, 1449510943),
('outsideAttractionUpdate', 2, 'Update an Outside Attraction', NULL, NULL, 1449510943, 1449510943),
('Participant', 1, 'Role which all non admin roles belong to', NULL, NULL, 1448744651, 1448744651),
('participantHasActivity', 2, 'Mark Attend of Activity', NULL, NULL, 1450532316, 1450532316),
('participantHasActivityCreate', 2, 'User Join an Activity', NULL, NULL, 1449041227, 1449041227),
('participantHasActivityDelete', 2, 'User Quit an Activity', NULL, NULL, 1449041227, 1449041227),
('participantHasActivityEdit', 2, 'Do join and quit activities', NULL, NULL, 1449041227, 1449041227),
('postCreate', 2, 'Create a Post', NULL, NULL, 1450198592, 1450198592),
('postDelete', 2, 'Remove a Post', NULL, NULL, 1450198592, 1450198592),
('postEdit', 2, 'Update and Delete a Post', NULL, NULL, 1450198592, 1450198592),
('postIndex', 2, 'Index of the Forum', NULL, NULL, 1450198592, 1450198592),
('postUpdate', 2, 'Update a Post', NULL, NULL, 1450198592, 1450198592),
('postView', 2, 'View a Post', NULL, NULL, 1450198592, 1450198592),
('qrCodeGenerate', 2, 'Generate the QR Code on Nav Menu', NULL, NULL, 1450508736, 1450508736),
('Regular', 1, NULL, NULL, NULL, 1448744469, 1448744469),
('siteContact', 2, 'Make contact', NULL, NULL, 1448736339, 1448736339),
('Speaker', 1, NULL, NULL, NULL, 1448744469, 1448744469),
('Sponsor', 1, NULL, NULL, NULL, 1448744469, 1448744469),
('Student', 1, NULL, NULL, NULL, 1448744469, 1448744469),
('surveyCreate', 2, 'Create a Survey', NULL, NULL, 1450025050, 1450025050),
('surveyDelete', 2, 'Remove a Survey', NULL, NULL, 1450025050, 1450025050),
('surveyDo', 2, 'Do the Survey', NULL, NULL, 1450122817, 1450122817),
('surveyEdit', 2, 'Update and Delete a Survey', NULL, NULL, 1450025050, 1450025050),
('surveyIndex', 2, 'Index of the Survey', NULL, NULL, 1450025050, 1450025050),
('surveyResult', 2, 'Show the result of the survey', NULL, NULL, 1450425711, 1450425711),
('surveyUpdate', 2, 'Update a Survey', NULL, NULL, 1450025050, 1450025050),
('topicCreate', 2, 'Create a Topic', NULL, NULL, 1450503579, 1450503579),
('topicDelete', 2, 'Remove a Topic', NULL, NULL, 1450503579, 1450503579),
('topicEdit', 2, 'Update and Delete a Topic', NULL, NULL, 1450503579, 1450503579),
('topicIndex', 2, 'Index of the Topic', NULL, NULL, 1450503579, 1450503579),
('topicUpdate', 2, 'Update a Topic', NULL, NULL, 1450503579, 1450503579),
('topicView', 2, 'View a Topic', NULL, NULL, 1450503579, 1450503579),
('userBibiCreate', 2, 'Create a User Bibi', NULL, NULL, 1450530390, 1450530390),
('userBibiDelete', 2, 'Remove a User Bibi', NULL, NULL, 1450530390, 1450530390),
('userBibiEdit', 2, 'Update and Delete a User Bibi', NULL, NULL, 1450530390, 1450530390),
('userBibiIndex', 2, 'Index of the User Bibi', NULL, NULL, 1450523863, 1450523863),
('userBibiUpdate', 2, 'Update a User Bibi', NULL, NULL, 1450530390, 1450530390),
('userCreate', 2, 'Create a new User', NULL, NULL, 1448744469, 1448744469),
('userDelete', 2, 'Remove a User', NULL, NULL, 1448744469, 1448744469),
('userIndex', 2, 'Index of the User Controller', NULL, NULL, 1448744469, 1448744469),
('userUpdate', 2, 'Update a User', NULL, NULL, 1448744469, 1448744469),
('userView', 2, 'View the detail of a User', NULL, NULL, 1448744469, 1448744469),
('venueCreate', 2, 'Create a Venue', NULL, NULL, 1450502486, 1450502486),
('venueDelete', 2, 'Remove a Venue', NULL, NULL, 1450502486, 1450502486),
('venueEdit', 2, 'Update and Delete a Venue', NULL, NULL, 1450502486, 1450502486),
('venueIndex', 2, 'Index of the Venue', NULL, NULL, 1450502486, 1450502486),
('venueTypeCreate', 2, 'Create a Venue Type', NULL, NULL, 1450502754, 1450502754),
('venueTypeDelete', 2, 'Remove a Venue Type', NULL, NULL, 1450502754, 1450502754),
('venueTypeEdit', 2, 'Update and Delete a Venue Type', NULL, NULL, 1450502754, 1450502754),
('venueTypeIndex', 2, 'Index of the Venue Type', NULL, NULL, 1450502754, 1450502754),
('venueTypeUpdate', 2, 'Update a Venue Type', NULL, NULL, 1450502754, 1450502754),
('venueTypeView', 2, 'View a Venue Type', NULL, NULL, 1450502754, 1450502754),
('venueUpdate', 2, 'Update a Venue', NULL, NULL, 1450502486, 1450502486),
('venueView', 2, 'View a Venue', NULL, NULL, 1450502486, 1450502486),
('VIP', 1, NULL, NULL, NULL, 1448744469, 1448744469);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('activityEdit', 'activityCreate'),
('activityEdit', 'activityDelete'),
('activityEdit', 'activityUpdate'),
('Admin', 'activityEdit'),
('Admin', 'activityRecord'),
('Admin', 'announcementEdit'),
('Admin', 'announcementIndex'),
('Admin', 'announcementView'),
('Admin', 'categoryCreate'),
('Admin', 'categoryEdit'),
('Admin', 'categoryIndex'),
('Admin', 'categoryView'),
('Admin', 'couponCreate'),
('Admin', 'couponEdit'),
('Admin', 'couponGet'),
('Admin', 'couponIndex'),
('Admin', 'couponView'),
('Admin', 'outsideAttractionEdit'),
('Admin', 'participantHasActivity'),
('Admin', 'participantHasActivityCreate'),
('Admin', 'participantHasActivityDelete'),
('Admin', 'postCreate'),
('Admin', 'postEdit'),
('Admin', 'postIndex'),
('Admin', 'postView'),
('Admin', 'qrCodeGenerate'),
('Admin', 'siteContact'),
('Admin', 'surveyDo'),
('Admin', 'surveyEdit'),
('Admin', 'surveyResult'),
('Admin', 'topicCreate'),
('Admin', 'topicEdit'),
('Admin', 'topicIndex'),
('Admin', 'topicView'),
('Admin', 'userBibiCreate'),
('Admin', 'userBibiEdit'),
('Admin', 'userBibiIndex'),
('Admin', 'userCreate'),
('Admin', 'userDelete'),
('Admin', 'userIndex'),
('Admin', 'userUpdate'),
('Admin', 'userView'),
('Admin', 'venueCreate'),
('Admin', 'venueEdit'),
('Admin', 'venueIndex'),
('Admin', 'venueTypeCreate'),
('Admin', 'venueTypeEdit'),
('Admin', 'venueTypeIndex'),
('Admin', 'venueTypeView'),
('Admin', 'venueView'),
('announcementEdit', 'announcementCreate'),
('announcementEdit', 'announcementDelete'),
('announcementEdit', 'announcementUpdate'),
('categoryEdit', 'categoryDelete'),
('categoryEdit', 'categoryUpdate'),
('couponEdit', 'couponDelete'),
('couponEdit', 'couponUpdate'),
('outsideAttractionEdit', 'outsideAttractionCreate'),
('outsideAttractionEdit', 'outsideAttractionDelete'),
('outsideAttractionEdit', 'outsideAttractionUpdate'),
('Participant', 'announcementIndex'),
('Participant', 'announcementView'),
('Participant', 'couponGet'),
('Participant', 'couponIndex'),
('Participant', 'couponView'),
('Participant', 'participantHasActivityEdit'),
('Participant', 'postCreate'),
('Participant', 'postEdit'),
('Participant', 'postIndex'),
('Participant', 'postView'),
('Participant', 'qrCodeGenerate'),
('Participant', 'surveyDo'),
('Participant', 'surveyIndex'),
('Participant', 'userView'),
('participantHasActivityEdit', 'participantHasActivityCreate'),
('participantHasActivityEdit', 'participantHasActivityDelete'),
('postEdit', 'postDelete'),
('postEdit', 'postUpdate'),
('Regular', 'Participant'),
('Speaker', 'Participant'),
('Sponsor', 'Participant'),
('Student', 'Participant'),
('surveyEdit', 'surveyCreate'),
('surveyEdit', 'surveyDelete'),
('surveyEdit', 'surveyUpdate'),
('topicEdit', 'topicDelete'),
('topicEdit', 'topicUpdate'),
('userBibiEdit', 'userBibiDelete'),
('userBibiEdit', 'userBibiUpdate'),
('venueEdit', 'venueDelete'),
('venueEdit', 'venueUpdate'),
('venueTypeEdit', 'venueTypeDelete'),
('venueTypeEdit', 'venueTypeUpdate'),
('VIP', 'Participant');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`id`, `name`, `description`) VALUES
(1, 'Social Science', 'Social science is a major category of academic disciplines, concerned with society and the relationships among individuals within a society. It in turn has many branches, each of which is considered a "social science". The main social sciences include econ'),
(2, 'Health Technology', 'Health technology is application of organized knowledge and skills in the form of devices, medicines, vaccines, procedures and systems developed to solve a health problem and improve quality of lives. This includes the pharmaceuticals, devices, procedures '),
(3, 'Happiness Technology and Index', 'The philosophy of happiness is the philosophical concern with the existence, nature, and attainment of happiness. Generally, philosophers explicate about happiness either as a state of mind, or a life that goes well for the person leading it.'),
(4, 'Warming Care Technology', 'The scientific opinion on climate change is the overall judgment among scientists regarding whether global warming is occurring, and (if so) its causes and probable consequences. This scientific opinion is expressed in synthesis reports, by scientific bodi'),
(5, 'Computer Science', 'Computer science is the scientific and practical approach to computation and its applications. It is the systematic study of the feasibility, structure, expression, and mechanization of the methodical procedures (or algorithms) that underlie the acquisitio'),
(6, 'Science', 'Science is a systematic enterprise that builds and organizes knowledge in the form of testable explanations and predictions about the Universe. In an older and closely related meaning, "science" also refers to this body of knowledge itself, of the type tha'),
(7, 'Engineering', 'Engineering is the application of mathematics, empirical evidence and scientific, economic, social, and practical knowledge in order to invent, design, build, maintain, research, and improve structures, machines, tools, systems, components, materials, and '),
(8, 'Business', 'Businesses are prevalent in capitalist economies, where most of them are privately owned and provide goods and services to customers in exchange for other goods, services, or money. Businesses may also be social not-for-profit enterprises or state-owned pu');

-- --------------------------------------------------------

--
-- Table structure for table `CheckButton`
--

CREATE TABLE `CheckButton` (
  `id` int(11) NOT NULL,
  `content` varchar(256) NOT NULL,
  `count` int(11) NOT NULL,
  `Question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CheckButton`
--

INSERT INTO `CheckButton` (`id`, `content`, `count`, `Question_id`) VALUES
(1, 'Ad in [PRINT MATERIAL]', 2, 1),
(2, 'Sales Call', 3, 1),
(3, 'Conference Web Site', 5, 1),
(4, 'Referral', 7, 1),
(5, 'Fax', 6, 1),
(6, 'E-mail / Newsletter', 0, 1),
(7, 'Other', 0, 1),
(8, 'bb', 1, 32),
(9, 'bb', 0, 36),
(10, 'bbb', 0, 36),
(11, 'bbbb', 0, 36),
(12, 'bc', 0, 32),
(13, 'Exciting', 3, 40),
(14, 'Boring', 3, 40),
(15, 'Interesting', 5, 40),
(16, 'Confuse', 0, 40),
(17, 'Content', 3, 55),
(18, 'Networking', 3, 55),
(19, 'Speakers', 6, 55),
(20, 'Venue', 7, 55),
(21, 'Other', 0, 55),
(22, 'Ad in [PRINT MATERIAL]', 0, 59),
(23, 'Conference Web Site', 2, 59),
(24, 'Referral', 2, 59),
(25, 'Fax', 0, 59),
(26, 'E-mail / Newsletter', 1, 59),
(27, 'Other', 0, 59),
(28, 'Ad Effectiveness', 0, 61),
(29, 'Sponsorship & Event Marketing', 1, 61),
(30, 'Retail Marketing', 2, 61),
(31, 'Sports Marketing', 1, 61),
(32, 'Marketing to 50+', 1, 61),
(33, 'Financial Marketing', 1, 61),
(34, 'Marketing to Teens & Young Adults', 0, 61),
(35, 'Executing Effective Promotions', 1, 61),
(36, 'Maximizing Media', 1, 61),
(37, 'Marketing to the Gay & Lesbian Community', 2, 61);

-- --------------------------------------------------------

--
-- Table structure for table `Country`
--

CREATE TABLE `Country` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Country`
--

INSERT INTO `Country` (`id`, `name`) VALUES
(1, 'China'),
(2, 'USA'),
(3, 'Denmark'),
(4, 'England'),
(5, 'Ireland'),
(6, 'Czech Republic'),
(7, 'Austra'),
(8, 'Australia'),
(9, 'Iraq'),
(10, 'Turkey'),
(11, 'Russia'),
(12, 'South Korea'),
(13, 'North Korea'),
(14, 'Japan'),
(15, 'France');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `Coupon_name` varchar(100) NOT NULL,
  `Coupon_description` varchar(1000) NOT NULL,
  `expireDatetime` datetime NOT NULL,
  `lastModifyDatetime` datetime NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `requireScore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `Coupon_name`, `Coupon_description`, `expireDatetime`, `lastModifyDatetime`, `image`, `requireScore`) VALUES
(1, 'Tea Time Coupon', 'This coupon allows you to have free tea', '2015-12-20 05:25:00', '2015-12-20 01:49:47', 'http://www2.comp.polyu.edu.hk/~13068458d/poj/', 10),
(2, 'Dinner Coupon', 'Enjoy a free dinner with others for free at SkyBridge', '2015-12-22 23:55:00', '2015-12-20 01:50:54', '', 20),
(3, '10% off Lunch Coupon', 'Enjoy a 10% off discount at any restaurant in PolyU main campus', '2016-01-01 09:50:00', '2015-12-20 01:51:55', '', 5),
(4, 'Free Gift', 'Get a free gift from PolyU', '2015-12-23 23:55:00', '2015-12-20 01:53:06', '', 15),
(5, 'Free Hong Kong Tour', 'Earn a chance for having a free tour in Hong Kong for a day', '2015-12-31 23:55:00', '2015-12-20 01:54:45', '', 40),
(6, 'Mark Six Coupon', 'Try the mark six in Hong Kong and you may have a chance of winning $100,000,000!', '2015-12-21 22:55:00', '2015-12-20 01:55:56', '', 30);

-- --------------------------------------------------------

--
-- Table structure for table `Guestspeaker`
--

CREATE TABLE `Guestspeaker` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Guestspeaker`
--

INSERT INTO `Guestspeaker` (`id`) VALUES
(4),
(5);

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE `Message` (
  `id` int(11) NOT NULL,
  `receiverId` varchar(45) NOT NULL,
  `content` varchar(45) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Message`
--

INSERT INTO `Message` (`id`, `receiverId`, `content`, `User_id`) VALUES
(1, '4', 'Dr Vincent, I would like to know more about y', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Normalpeople`
--

CREATE TABLE `Normalpeople` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Normalpeople`
--

INSERT INTO `Normalpeople` (`id`) VALUES
(4),
(7),
(8),
(9),
(16);

-- --------------------------------------------------------

--
-- Table structure for table `Outside_Attraction`
--

CREATE TABLE `Outside_Attraction` (
  `id` int(11) NOT NULL,
  `Outside_Attraction_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `Outside_Attraction_description` varchar(1000) COLLATE utf8_bin NOT NULL,
  `Outside_Attraction_let` varchar(45) COLLATE utf8_bin NOT NULL,
  `Outside_Attraction_lng` varchar(45) COLLATE utf8_bin NOT NULL,
  `Outside_Attraction_image_file` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Outside_Attraction`
--

INSERT INTO `Outside_Attraction` (`id`, `Outside_Attraction_name`, `Outside_Attraction_description`, `Outside_Attraction_let`, `Outside_Attraction_lng`, `Outside_Attraction_image_file`) VALUES
(1, 'The Hong Kong Polytechnic University', 'PolyU''s main campus has over 20 buildings, many of which are inter-connected. Apart from those named after donors, the buildings are identified in English letters (from block A to Z, without blocks K, O and I). In addition to classrooms, laboratories and other academic facilities, the university provides student hostels, a multi-purpose auditorium, sports, recreational and catering facilities, as well as a bookstore and banks.', '22.304500', '114.179711', 'PolyU1.jpg'),
(2, 'Hong Kong Science Museum', 'The science-themed museum hand-on, with over 500 interactive exhibits ranging over a variety of topics such as robotics and virtual reality. Through presenting quality exhibitions and fun science programmes in an enjoyable environment, the Museum serves to popularize science to the public and support science education in schools.', '22.300993', '114.177571', 'HKScienceMuseumview.jpg'),
(3, 'Hong Kong Space Museum', 'It is a museum of astronomy and space science in Tsim Sha Tsui. The museum has two wings: east wing and west wing. The former consists of the nucleus of the museum''s planetarium, which has an egg-shaped dome structure. Beneath it are the Stanley Ho Space Theatre, the Hall of Space Science, workshops and offices. The west wing houses the Hall of Astronomy, the Lecture Hall, a gift shop and offices.', '22.301032', '114.177553', 'HKSpaceMuseumview.jpg'),
(4, 'Avenue of Stars', 'Entering from Salisbury Garden, a 4.5-metre-tall replica of the statuette given to winners at the Hong Kong Film Awards greets visitors. Along the 440-metre promenade, the story of Hong Kong''s one hundred years of cinematic history is told through inscriptions printed on nine red pillars. Set into the promenade are plaques honouring the celebrities.', '22.293274', '114.172812', 'AvenueOfStars.jpg'),
(5, 'iSQUARE', 'iSQUARE is the first one-stop shopping and entertainment complex linked to Tsim Sha Tsui MTR station. There are Watches & Jewelry, Fashion & Accessories, Beauty & Health, Lifestyle & Entertainment, and Supermarket & Department Store located at the shopping podium. Besides, there is the cinema box — a highlight not to be missed, which houses a total of 5 grand cineplexes, including IMAX Digital Theatre. What’s more, iSQUARE also features multi-national fine-dining restaurants at its iconic tower, bringing customers not only an unparalleled dining experience, but also a mesmerizing view of the Victoria Harbour!', '22.296874', '114.171975', 'iSquare.jpg'),
(6, 'Harbour City', 'Harbour City is a one-stop shopping paradise with over 450 shops, 50 food & beverage outlets, two cinemas, three hotels, 10 office buildings, two serviced apartments and a luxurious private club all under one roof. With the “Star” Ferry pier, its home to cruise liner berths, maritime history and fabulous harbour view – all at its doorstep. It is easy to see where the mall drew the inspiration for its name.', '22.297810', '114.168231', 'HarbourCity.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Paper`
--

CREATE TABLE `Paper` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `abstract` varchar(45) DEFAULT NULL,
  `Topic_id` int(11) NOT NULL,
  `NormalPeople_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Paper`
--

INSERT INTO `Paper` (`id`, `title`, `abstract`, `Topic_id`, `NormalPeople_id`) VALUES
(1, 'Discovering associations between news and con', 'http://www2.comp.polyu.edu.hk/~13068458d/poj/', 24, 4),
(2, 'A Study on Instrumentation engineering', 'http://www2.comp.polyu.edu.hk/~13068458d/poj/', 1, 7),
(3, 'A Study on Interpersonal Communication betwee', 'http://www2.comp.polyu.edu.hk/~13068458d/poj/', 23, 9),
(4, 'A Study on Tissue engineering', 'http://www2.comp.polyu.edu.hk/~13068458d/poj/', 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `Participant`
--

CREATE TABLE `Participant` (
  `id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `fax_number` int(11) DEFAULT NULL,
  `rewardPoint` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `remark` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Participant`
--

INSERT INTO `Participant` (`id`, `title`, `address`, `city`, `country`, `department`, `organization`, `mobile_number`, `fax_number`, `rewardPoint`, `payment_status`, `remark`) VALUES
(4, 'Mr', 'PQ819, HK POLYU', 'Hong Kong', 'China', 'Computing', 'The Hong Kong Polytechnic University', 2147483647, 2147483647, 0, 1, NULL),
(5, 'Ms', 'Unit 231, 8 Tower Road', 'Hong Kong', 'China', 'Computing', 'The Hong Kong Polytechnic University', 2147483647, 2147483647, 0, 2, NULL),
(6, 'Dr', 'Room 11, IT Building', 'Hong Kong', 'China', 'Infrastructure Development', 'IBM Research Lab', 2147483647, 2147483647, 0, 4, 'Only for day 1'),
(7, 'Prof', 'Room 12, IT Building', 'New York', 'USA', 'Electronic Engineering', 'York University', 2147483647, 2147483647, 0, 3, NULL),
(8, 'Mr', 'Floor 3, 5 Nathan Road', 'Hong Kong', 'China', 'Marketing', 'Jewel Company Ltd', 2147483647, 2147483647, 0, 5, NULL),
(9, 'Ms', '77 Gyungan-ro, Gwangju-si', 'Gyunggi-do', 'South Korea', 'Social Science', 'Seoul  University', 2147483647, 2147483647, 0, 2, NULL),
(16, 'Ms', 'Room 611, Block A, HKCU', 'Hong Kong', 'China', 'Biomedical Engineering', 'The Hong Kong Chinese University', 2147483647, 2147483647, 0, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Participant_has_Activity`
--

CREATE TABLE `Participant_has_Activity` (
  `Participant_id` int(11) NOT NULL,
  `Activity_id` int(11) NOT NULL,
  `attendance` tinyint(1) DEFAULT NULL,
  `register_datetime` datetime DEFAULT NULL,
  `attend_datetime` datetime DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Participant_has_Activity`
--

INSERT INTO `Participant_has_Activity` (`Participant_id`, `Activity_id`, `attendance`, `register_datetime`, `attend_datetime`, `is_read`) VALUES
(1, 1, 1, '2015-12-15 23:33:32', NULL, 1),
(1, 2, NULL, '2015-12-20 20:12:01', NULL, 0),
(1, 3, NULL, '2015-12-15 04:38:53', NULL, 0),
(1, 4, NULL, NULL, NULL, 0),
(1, 5, 1, NULL, NULL, 0),
(1, 6, 1, NULL, '2015-12-20 01:04:02', 0),
(1, 7, 0, NULL, NULL, 0),
(1, 8, NULL, NULL, NULL, 0),
(3, 1, NULL, '2015-12-19 23:43:56', NULL, 0),
(3, 2, NULL, '2015-12-19 23:43:38', NULL, 0),
(3, 3, NULL, '2015-12-19 23:43:49', NULL, 0),
(3, 4, NULL, '2015-12-19 23:43:19', NULL, 0),
(3, 5, 0, '2015-12-19 23:43:28', '2015-12-20 09:55:06', 0),
(3, 6, NULL, '2015-12-19 23:43:23', NULL, 0),
(3, 7, NULL, '2015-12-19 23:43:33', NULL, 0),
(3, 8, NULL, '2015-12-19 23:43:42', NULL, 0),
(10, 1, 1, NULL, '2015-12-19 21:51:38', 1),
(10, 7, 0, NULL, '2015-12-20 09:39:40', 0),
(10, 8, NULL, NULL, NULL, 0),
(17, 1, NULL, '2015-12-19 23:08:45', NULL, 0),
(17, 2, NULL, '2015-12-19 23:08:50', NULL, 0),
(17, 4, NULL, '2015-12-19 23:08:23', NULL, 0),
(17, 5, NULL, '2015-12-19 23:08:33', NULL, 0),
(17, 8, NULL, '2015-12-19 23:08:57', NULL, 0),
(18, 1, NULL, '2015-12-19 23:38:08', NULL, 0),
(18, 2, NULL, '2015-12-19 23:38:21', NULL, 0),
(18, 3, NULL, '2015-12-19 23:38:34', NULL, 0),
(18, 4, NULL, '2015-12-19 23:37:44', NULL, 0),
(18, 5, NULL, '2015-12-19 23:38:13', NULL, 0),
(18, 6, NULL, '2015-12-19 23:37:56', NULL, 0),
(18, 8, NULL, '2015-12-19 23:38:28', NULL, 0),
(19, 1, NULL, '2015-12-19 23:05:50', NULL, 0),
(19, 2, NULL, '2015-12-19 23:06:04', NULL, 0),
(19, 3, NULL, '2015-12-19 23:06:12', NULL, 0),
(19, 4, NULL, '2015-12-19 23:05:21', NULL, 0),
(19, 5, 0, '2015-12-19 21:57:39', '2015-12-20 09:57:57', 0),
(19, 6, NULL, '2015-12-19 23:05:29', NULL, 0),
(19, 7, NULL, '2015-12-19 23:05:42', NULL, 0),
(19, 8, NULL, '2015-12-19 23:06:20', NULL, 0),
(20, 4, NULL, '2015-12-19 23:15:46', NULL, 0),
(20, 7, NULL, '2015-12-19 23:15:53', NULL, 0),
(21, 1, NULL, '2015-12-19 23:07:17', NULL, 0),
(21, 2, NULL, '2015-12-19 23:07:24', NULL, 0),
(21, 3, NULL, '2015-12-19 23:07:30', NULL, 0),
(21, 4, NULL, '2015-12-19 23:06:51', NULL, 0),
(21, 5, NULL, '2015-12-19 23:07:06', NULL, 0),
(21, 6, NULL, '2015-12-19 23:06:59', NULL, 0),
(21, 7, NULL, '2015-12-19 23:07:12', NULL, 0),
(21, 8, NULL, '2015-12-19 23:07:59', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Participant_has_coupon`
--

CREATE TABLE `Participant_has_coupon` (
  `Participant_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `is_used` tinyint(1) NOT NULL,
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Participant_has_coupon`
--

INSERT INTO `Participant_has_coupon` (`Participant_id`, `coupon_id`, `is_used`, `is_read`) VALUES
(1, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Post`
--

CREATE TABLE `Post` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `datetime` datetime NOT NULL,
  `Participant_id` int(11) NOT NULL,
  `Topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Post`
--

INSERT INTO `Post` (`id`, `title`, `content`, `datetime`, `Participant_id`, `Topic_id`) VALUES
(10, 'How to calibrate differential pressure switch?', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Do you have any idea?', '2015-12-19 20:00:20', 19, 2),
(11, 'What are NIH-funded researchers developing in the areas of tissue engineering and regenerative medicine?', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', '2015-12-19 20:01:05', 19, 17),
(12, 'How do tissue engineering and regenerative medicine fit in with current medical practices?', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.', '2015-12-19 20:02:05', 21, 15),
(13, 'What happen if we install my pressure transmitter below the elevation of pipe in natural gas service? ', 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex!', '2015-12-19 20:26:25', 18, 14),
(14, 'Why the degree of valve plugs and valve seat is slightly different I control valve trim design?', 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '2015-12-19 23:38:21', 18, 11);

-- --------------------------------------------------------

--
-- Table structure for table `Post_Replay`
--

CREATE TABLE `Post_Replay` (
  `id` int(11) NOT NULL,
  `Post_id` int(11) NOT NULL,
  `Participant_id` int(11) NOT NULL,
  `content` varchar(2000) COLLATE utf8_bin NOT NULL,
  `datetime` datetime NOT NULL,
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Post_Replay`
--

INSERT INTO `Post_Replay` (`id`, `Post_id`, `Participant_id`, `content`, `datetime`, `is_read`) VALUES
(1, 3, 1, 'hi', '2015-12-12 07:42:08', 0),
(2, 3, 1, 'test', '2015-12-12 17:56:27', 0),
(3, 5, 2, 'reply', '2015-12-12 17:58:40', 1),
(4, 6, 2, 'reply', '2015-12-12 18:18:11', 1),
(5, 1, 2, 'hi', '2015-12-12 18:21:31', 1),
(6, 3, 1, 'reply', '2015-12-12 21:13:23', 0),
(7, 6, 1, '1711', '2015-12-15 17:12:06', 0),
(8, 3, 2, '1712', '2015-12-15 17:12:26', 1),
(9, 3, 2, 'hi', '2015-12-15 18:13:58', 1),
(10, 2, 2, 'hi', '2015-12-15 18:14:21', 1),
(11, 2, 2, 'hihi', '2015-12-15 18:15:00', 1),
(12, 4, 10, 'hi new reply', '2015-12-16 01:21:36', 1),
(13, 4, 10, 'another reply', '2015-12-16 01:27:39', 1),
(14, 4, 10, 'hi new reply', '2015-12-16 01:28:20', 1),
(15, 10, 21, 'Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. ', '2015-12-19 20:02:29', 0),
(16, 11, 21, 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '2015-12-19 20:02:57', 0),
(17, 10, 20, ' Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. ', '2015-12-19 20:22:16', 0),
(18, 11, 20, 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '2015-12-19 20:22:39', 0),
(19, 12, 20, 'At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues.', '2015-12-19 20:23:03', 0),
(20, 10, 18, 'Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc.', '2015-12-19 20:23:50', 0),
(21, 11, 18, 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2015-12-19 20:24:10', 0),
(22, 12, 18, 'At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues.', '2015-12-19 20:24:27', 0),
(23, 10, 19, 'Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. ', '2015-12-19 20:28:30', 0),
(24, 11, 19, 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere.', '2015-12-19 20:29:01', 0),
(25, 12, 19, 'Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es.', '2015-12-19 20:29:27', 0),
(26, 13, 19, 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2015-12-19 20:30:05', 1),
(27, 12, 20, ' Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.', '2015-12-19 20:31:31', 0),
(28, 13, 20, 'Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! "Now fax quiz Jack! " my brave ghost pled.', '2015-12-19 20:31:51', 1),
(29, 13, 4, 'Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box.', '2015-12-19 20:38:18', 1),
(30, 13, 21, 'Quick brown dogs jump over the lazy fox. The jay, pig, fox, zebra, and my wolves quack! Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch "Jeopardy! ", Alex Trebek''s fun TV quiz game. Woven silk pyjamas exchanged for blue quartz.', '2015-12-19 20:43:35', 1),
(31, 14, 21, 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2015-12-19 23:42:16', 0),
(32, 14, 19, 'I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.', '2015-12-19 23:43:06', 0),
(33, 14, 17, 'Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.', '2015-12-19 23:43:41', 0),
(34, 14, 20, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-12-19 23:44:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE `Question` (
  `id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `Survey_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `required` tinyint(1) NOT NULL,
  `temp_input` varchar(1000) DEFAULT NULL,
  `temp_input_required` varchar(1000) NOT NULL,
  `temp_type` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Question`
--

INSERT INTO `Question` (`id`, `content`, `Survey_id`, `order`, `required`, `temp_input`, `temp_input_required`, `temp_type`) VALUES
(1, 'How did you hear or learn about this conferen', 0, 0, 0, NULL, '', NULL),
(2, 'Please specify the main reason for attending ', 0, 0, 0, NULL, '', NULL),
(3, 'Which speaker(s) were you mostly interested i', 0, 0, 0, NULL, '', NULL),
(4, 'Did the conference fulfill your reason for at', 0, 0, 0, NULL, '', NULL),
(5, 'What was the most beneficial aspect of the co', 0, 0, 0, NULL, '', NULL),
(6, 'Would you recommend this conference to others', 0, 0, 0, NULL, '', NULL),
(7, 'Please indicate your overall satisfaction wit', 0, 0, 0, NULL, '', NULL),
(8, 'Please indicate your overall satisfaction wit', 0, 0, 0, NULL, '', NULL),
(31, 'a', 1, 1, 0, NULL, '', NULL),
(32, 'b', 1, 2, 0, NULL, '', NULL),
(33, 'c', 1, 3, 0, NULL, '', NULL),
(34, 'c', 2, 1, 0, NULL, '', NULL),
(35, 'a', 2, 2, 0, NULL, '', NULL),
(36, 'b', 2, 3, 0, NULL, '', NULL),
(37, 'a', 3, 1, 0, NULL, '', NULL),
(38, 'What is your Name?', 4, 1, 0, NULL, '', NULL),
(39, 'What is your gender?', 4, 2, 0, NULL, '', NULL),
(40, 'What is your feeling about the Conference?', 4, 3, 0, NULL, '', NULL),
(41, 'Anything we can do better?', 4, 4, 0, NULL, '', NULL),
(42, 'From 1-5, what is your energy level now?', 4, 5, 0, NULL, '', NULL),
(43, 'Require', 5, 1, 1, NULL, '', NULL),
(44, 'Not Require', 5, 2, 0, NULL, '', NULL),
(45, 'Conference Content', 6, 1, 0, NULL, 'temp', NULL),
(46, 'Speaker', 6, 2, 0, NULL, 'temp', NULL),
(47, 'Registration Process', 6, 3, 0, NULL, 'temp', NULL),
(48, 'Venue', 6, 4, 0, NULL, 'temp', NULL),
(49, 'Food & Beverage', 6, 5, 0, NULL, 'temp', NULL),
(50, 'Please indicate your overall satisfaction with this conference:', 7, 1, 0, NULL, 'temp', NULL),
(51, 'What was MOST VALUABLE about the conference?', 7, 2, 0, NULL, 'temp', NULL),
(52, 'What was LEAST VALUABLE about the conference?', 7, 3, 0, NULL, 'temp', NULL),
(53, 'What topic(s) or theme(s) you would like to be addressed at next VM Smart Conference?', 7, 4, 1, NULL, 'temp', NULL),
(54, 'Is there anything else you would like to share with us?', 7, 5, 0, NULL, 'temp', NULL),
(55, 'Please specify the main reasons for attending this conference:', 8, 1, 0, NULL, 'temp', NULL),
(56, ' Did the conference fulfill your reason for attending?', 8, 2, 0, NULL, 'temp', NULL),
(57, 'What was the most beneficial aspect of the conference?', 8, 3, 0, NULL, 'temp', NULL),
(58, 'Would you recommend this conference to others? ', 8, 4, 0, NULL, 'temp', NULL),
(59, 'How did you hear or learn about this conference?', 9, 1, 0, NULL, 'temp', NULL),
(60, 'How many external conferences/seminars do you attend, on average, in a year?', 9, 2, 0, NULL, 'temp', NULL),
(61, 'Which of the following topics would you be interested in attending a conference on?', 9, 3, 0, NULL, 'temp', NULL),
(62, 'What other topics or themes are of interest to you for a conference?', 9, 4, 0, NULL, 'temp', NULL),
(63, 'Relevance of conference contents', 10, 1, 0, NULL, 'temp', NULL),
(64, 'Providing a forum for exchange of information with other participants', 10, 2, 0, NULL, 'temp', NULL),
(65, 'Quality of presentations', 10, 3, 0, NULL, 'temp', NULL),
(66, 'Registration process', 10, 4, 1, NULL, 'temp', NULL),
(67, 'Information available online', 10, 5, 0, NULL, 'temp', NULL),
(68, 'Quality of material circulated by the organizers', 10, 6, 0, NULL, 'temp', NULL),
(69, 'Conference venue/facilities', 10, 7, 0, NULL, 'temp', NULL),
(70, 'Organizational arrangements for and during the event', 10, 8, 0, NULL, 'temp', NULL),
(71, 'Dates of the conference', 10, 9, 1, NULL, 'temp', NULL),
(72, 'Quality of the booth', 10, 10, 0, NULL, 'temp', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `radiobutton`
--

CREATE TABLE `radiobutton` (
  `id` int(11) NOT NULL,
  `content` varchar(256) NOT NULL,
  `count` int(11) NOT NULL,
  `Question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radiobutton`
--

INSERT INTO `radiobutton` (`id`, `content`, `count`, `Question_id`) VALUES
(5, 'Content', 4, 2),
(6, 'Speakers', 3, 2),
(7, 'Personal growth & development', 6, 2),
(8, 'Other', 0, 2),
(9, 'Dorothy LAU', 6, 3),
(10, 'Thomas LONDON', 7, 3),
(11, 'Eric LAM', 3, 3),
(12, 'Ivy CHAU', 2, 3),
(13, 'Yes -- Absolutely', 1, 4),
(14, 'Yes -- But not to my full extent', 2, 4),
(15, 'No', 3, 4),
(16, 'Yes', 1, 6),
(17, 'May be', 8, 6),
(18, 'No', 5, 6),
(19, 'Very Satisfied', 0, 7),
(20, 'Somewhat Satisfied', 4, 7),
(21, 'Neutral', 3, 7),
(22, 'Somewhat Dissatisfied', 0, 7),
(23, 'Very Dissatisfied', 0, 7),
(24, 'Very Satisfied', 3, 8),
(25, 'Somewhat Satisfied', 1, 8),
(26, 'Neutral', 2, 8),
(27, 'Somewhat Dissatisfied', 2, 8),
(28, 'Very Dissatisfied', 8, 8),
(29, 'cc', 0, 33),
(30, 'cc', 0, 34),
(31, 'ccc', 0, 34),
(32, 'a', 0, 37),
(33, 'Male', 5, 39),
(34, 'Female', 3, 39),
(35, 'Others', 1, 39),
(36, '1', 5, 42),
(37, '2', 6, 42),
(38, '3', 0, 42),
(39, '4', 6, 42),
(40, '5', 4, 42),
(41, 'Very Satisfied', 0, 45),
(42, 'Somewhat Satisfied', 0, 45),
(43, 'Neutral', 2, 45),
(44, 'Somewhat Dissatisfied', 0, 45),
(45, 'Very Dissatisfied', 1, 45),
(46, 'Very Satisfied', 0, 46),
(47, 'Somewhat Satisfied', 0, 46),
(48, 'Neutral', 3, 46),
(49, 'Somewhat Dissatisfied', 0, 46),
(50, 'Very Dissatisfied', 0, 46),
(51, 'Very Satisfied', 0, 47),
(52, 'Somewhat Satisfied', 0, 47),
(53, 'Neutral', 1, 47),
(54, 'Somewhat Dissatisfied', 1, 47),
(55, 'Very Dissatisfied', 1, 47),
(56, 'Very Satisfied', 1, 48),
(57, 'Somewhat Satisfied', 0, 48),
(58, 'Neutral', 1, 48),
(59, 'Somewhat Dissatisfied', 0, 48),
(60, 'Very Dissatisfied', 1, 48),
(61, 'Very Satisfied', 1, 49),
(62, 'Somewhat Satisfied', 1, 49),
(63, 'Neutral', 1, 49),
(64, 'Somewhat Dissatisfied', 0, 49),
(65, 'Very Dissatisfied', 0, 49),
(66, 'Very Satisfied', 0, 50),
(67, 'Somewhat Satisfied', 3, 50),
(68, 'Neither satisfied nor dissatisfied', 0, 50),
(69, 'Somewhat Dissatisfied', 0, 50),
(70, ' Very Dissatisfied', 0, 50),
(71, 'Yes -- Absolutely', 2, 56),
(72, 'Yes -- But not to my full extent', 4, 56),
(73, 'No', 5, 56),
(74, 'Yes', 4, 58),
(75, 'Maybe', 2, 58),
(76, 'No', 5, 58),
(77, '1-2', 0, 60),
(78, '3-5', 2, 60),
(79, '6 or more', 1, 60),
(80, 'Excellent', 0, 63),
(81, 'Very good', 1, 63),
(82, 'Good', 0, 63),
(83, 'Fair', 1, 63),
(84, 'Poor', 1, 63),
(85, 'N/A', 0, 63),
(86, 'Excellent', 0, 64),
(87, 'Very good', 2, 64),
(88, 'Good', 0, 64),
(89, 'Fair', 0, 64),
(90, 'Poor', 1, 64),
(91, 'N/A', 0, 64),
(92, 'Excellent', 2, 65),
(93, 'Very good', 0, 65),
(94, 'Good', 0, 65),
(95, 'Fair', 0, 65),
(96, 'Poor', 1, 65),
(97, 'N/A', 0, 65),
(98, 'Excellent', 0, 66),
(99, 'Very good', 1, 66),
(100, 'Good', 0, 66),
(101, 'Fair', 1, 66),
(102, 'Poor', 1, 66),
(103, 'N/A', 0, 66),
(104, 'Excellent', 1, 67),
(105, 'Very good', 0, 67),
(106, 'Good', 0, 67),
(107, 'Fair', 1, 67),
(108, 'Poor', 1, 67),
(109, 'N/A', 0, 67),
(110, 'Excellent', 1, 68),
(111, 'Very good', 0, 68),
(112, 'Good', 0, 68),
(113, 'Fair', 0, 68),
(114, 'Poor', 1, 68),
(115, 'N/A', 0, 68),
(116, 'Excellent', 0, 69),
(117, 'Very good', 0, 69),
(118, 'Good', 2, 69),
(119, 'Fair', 0, 69),
(120, 'Poor', 1, 69),
(121, 'N/A', 0, 69),
(122, 'Excellent', 1, 70),
(123, 'Very good', 0, 70),
(124, 'Good', 0, 70),
(125, 'Fair', 1, 70),
(126, 'Poor', 1, 70),
(127, 'N/A', 0, 70),
(128, 'Excellent', 0, 71),
(129, 'Very good', 1, 71),
(130, 'Good', 0, 71),
(131, 'Fair', 0, 71),
(132, 'Poor', 2, 71),
(133, 'N/A', 0, 71),
(134, 'Excellent', 0, 72),
(135, 'Very good', 1, 72),
(136, 'Good', 0, 72),
(137, 'Fair', 0, 72),
(138, 'Poor', 1, 72),
(139, 'N/A', 1, 72);

-- --------------------------------------------------------

--
-- Table structure for table `Sectionchair`
--

CREATE TABLE `Sectionchair` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sectionchair`
--

INSERT INTO `Sectionchair` (`id`) VALUES
(6),
(7);

-- --------------------------------------------------------

--
-- Table structure for table `Survey`
--

CREATE TABLE `Survey` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `Administrator_id` int(11) NOT NULL,
  `is_enable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Survey`
--

INSERT INTO `Survey` (`id`, `title`, `Administrator_id`, `is_enable`) VALUES
(1, 'test2', 2, 0),
(2, 'test3', 2, 0),
(3, 'test empty', 2, 0),
(4, 'Test Survey', 2, 0),
(5, 'Test Require', 2, 0),
(6, 'Survey about the overall satisfaction', 2, 1),
(7, 'Overall opinion about the conference', 2, 1),
(8, 'Survey about the overall comment', 2, 1),
(9, 'Survey of Conference related to marketing', 2, 1),
(10, 'Ratings of the arrangement of the conference:', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Survey_has_Participant`
--

CREATE TABLE `Survey_has_Participant` (
  `Survey_id` int(11) NOT NULL,
  `Participant_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Survey_has_Participant`
--

INSERT INTO `Survey_has_Participant` (`Survey_id`, `Participant_id`, `datetime`) VALUES
(4, 1, '2015-12-19 03:52:00'),
(6, 7, '2015-12-20 01:36:19'),
(6, 18, '2015-12-20 01:04:07'),
(6, 21, '2015-12-20 00:53:23'),
(7, 7, '2015-12-20 01:37:12'),
(7, 18, '2015-12-20 01:03:50'),
(7, 21, '2015-12-20 00:58:15'),
(8, 1, '2015-12-20 01:31:26'),
(8, 3, '2015-12-20 01:30:41'),
(8, 4, '2015-12-20 01:33:07'),
(8, 5, '2015-12-20 01:33:52'),
(8, 7, '2015-12-20 01:36:04'),
(8, 10, '2015-12-20 01:32:24'),
(8, 17, '2015-12-20 00:50:13'),
(8, 18, '2015-12-20 01:00:34'),
(8, 19, '2015-12-20 01:04:47'),
(8, 20, '2015-12-20 00:52:13'),
(8, 21, '2015-12-20 00:53:01'),
(9, 7, '2015-12-20 01:37:32'),
(9, 18, '2015-12-20 01:01:41'),
(9, 21, '2015-12-20 00:58:51'),
(10, 7, '2015-12-20 01:37:59'),
(10, 18, '2015-12-20 01:01:02'),
(10, 21, '2015-12-20 00:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `TextBox`
--

CREATE TABLE `TextBox` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TextBox`
--

INSERT INTO `TextBox` (`id`) VALUES
(31),
(35),
(38),
(41),
(43),
(44),
(51),
(52),
(53),
(54),
(57),
(62);

-- --------------------------------------------------------

--
-- Table structure for table `TextResponse`
--

CREATE TABLE `TextResponse` (
  `id` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `TextBox_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TextResponse`
--

INSERT INTO `TextResponse` (`id`, `content`, `TextBox_id`) VALUES
(10, 'Anson', 38),
(11, 'Christine', 38),
(12, 'Memory', 38),
(13, 'Vincent', 38),
(14, 'Tommy', 38),
(15, 'Anything', 41),
(16, 'Mandy', 38),
(17, 'Anything', 41),
(18, 'Carmen', 38),
(19, 'Anything', 41),
(20, 'TagGor', 38),
(21, 'Anything', 41),
(22, 'Kenny', 38),
(23, 'Anything', 41),
(26, 'required', 43),
(28, 'required', 43),
(30, 'required', 43),
(31, 'Test User', 38),
(32, 'Provide more information', 41),
(33, 'Know more about the current trend', 57),
(34, 'Good sharing', 57),
(35, 'no', 57),
(36, 'Speaker sharing', 51),
(37, 'Future trend for engineering', 53),
(38, 'Management', 62),
(39, 'Materials', 57),
(40, 'Event management', 62),
(41, 'Proceedings', 51),
(42, 'Medical Engineering', 53),
(43, 'no', 54),
(44, 'no', 57),
(45, 'no', 57),
(46, 'Industrial engineering', 57),
(47, 'Proceedings', 57),
(48, 'speaker''s presentation', 57),
(49, 'Future development', 57),
(50, 'demo', 57),
(51, 'Speaker''s sharing', 51),
(52, 'leaflet', 52),
(53, 'management engineering', 53),
(54, 'Media', 62);

-- --------------------------------------------------------

--
-- Table structure for table `Title`
--

CREATE TABLE `Title` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Title`
--

INSERT INTO `Title` (`id`, `name`) VALUES
(1, 'Mr'),
(2, 'Mrs'),
(3, 'Ms'),
(4, 'Dr'),
(5, 'Prof.'),
(6, 'Miss');

-- --------------------------------------------------------

--
-- Table structure for table `Topic`
--

CREATE TABLE `Topic` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `decription` varchar(256) NOT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Topic`
--

INSERT INTO `Topic` (`id`, `name`, `decription`, `Category_id`) VALUES
(1, 'Electronic Engineering and Applications', 'Electronic Engineering and Applications', 7),
(2, 'Information Technology in Biomedicine', '', 2),
(3, 'Medical Imaging Processing', '', 2),
(4, 'MRI-Based Neuro-Computing', '', 2),
(5, 'Biomedical Sensors, Transducers, and BioMEMS', '', 2),
(6, 'Biomedical Circuits and Systems', '', 2),
(7, 'Intelligent Health Instrumentation', '', 2),
(8, 'Rehabilitation Technology', '', 2),
(9, 'Telehealth and Telecare', '', 2),
(10, 'Assistive Technology and Senior Companion Robot', '', 2),
(11, 'Smart Living for Elderly and Children Care', '', 2),
(12, 'Body-Mind Fitness Care', '', 2),
(13, 'Affective Computing for Happiness Detection', '', 3),
(14, 'Long-Term Positive Emotion Detection', '', 3),
(15, 'Smiling Faces and Laughter Detection', '', 3),
(16, 'Happiness Detection from Psychological/Physiological Bio-Signals', '', 3),
(17, 'System Design for Happiness Promotion', '', 3),
(18, 'Theory and Measurement of Gross National Happiness (GNH) Index', '', 3),
(19, 'Cultural Difference and Cross National Comparison in GNH', '', 3),
(20, 'National Policy Making and Strategies for Enhancing GNH', '', 3),
(21, 'Information Technology in Health and Mental Care', '', 4),
(22, 'Friendly and Affordable Human-Machine Interface for Senior and Children Care', '', 4),
(23, 'Interpersonal Communication', '', 1),
(24, 'D-miner service', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `title` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `organization` varchar(200) NOT NULL,
  `mobile_number` int(12) NOT NULL,
  `fax_number` int(12) DEFAULT NULL,
  `rewardPoint` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `authKey` varchar(45) DEFAULT NULL,
  `accessToken` varchar(45) DEFAULT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `username`, `password`, `title`, `first_name`, `last_name`, `email`, `address`, `city`, `country`, `department`, `organization`, `mobile_number`, `fax_number`, `rewardPoint`, `payment_status`, `remark`, `authKey`, `accessToken`, `score`) VALUES
(1, 'test', '$2y$10$GrRNH1QCbdNMyUrEUKcEteDXMsxGFLMCaiAxLMEXB92XFGuFxl/Uy', 1, 'Test', 'User', 'test@test.com', 'Lib G/F, HK POLYU', 'Hong Kong', '1', 'Computing', 'The Hong Kong Polytechnic University', 0, NULL, 0, 0, '', 'test', 'test', 5),
(2, 'admin', '$2y$10$fM2fPHwGRZDv6q2Wok/PcOva/OYwGVwWYGFHubnLLQCqBWo6pWqH2', 1, 'admin', 'admin', 'admin@admin.com', 'Lib G/F, HK POLYU', 'Hong Kong', '1', 'Computing', 'The Hong Kong Polytechnic University', 0, NULL, 0, 0, '', 'admin', 'admin', 0),
(3, 'eric@test.com', '$2y$10$q43zlmNk9XkeN3O0aOazqOc4ddW8HzFIekcMEkiG9mGULvuJw2Zlq', 1, 'Eric', 'KO', 'eric@test.com', 'PQ820, HK POLYU', 'Hong Kong', '1', 'Computing', 'The Hong Kong Polytechnic University', 0, NULL, 0, 0, '', '', '', 10),
(4, 'victor', '$2y$10$KD5x5Hrz9Pm7IamzAaOfwu49P2IvkcUtgABvaos9VjISDESg3XvOi', 4, 'Victor', 'NG', 'aaa@bbb.com', 'PQ819, HK POLYU', 'Hong Kong', '1', 'Computing', 'The Hong Kong Polytechnic University', 0, NULL, 0, 1, '', '', '', 0),
(5, 'ccc.@comp.polyu.edu.hk', '$2y$10$HCiGrbqKek.sD.J3gcAy.ORt.rqZtUg6/QSYxOeb2NElmuYZW.BGu', 2, 'Mary', 'LO', 'ccc@comp.polyu.edu.hk', 'Unit 231, 8 Tower Road', 'Hong Kong', '1', 'Computing', 'The Hong Kong Polytechnic University', 0, NULL, 0, 2, '', '', '', 0),
(6, 'xxx@ibm.hk', '$2y$10$B5RiTDfKkmC9OBZGSRKwPeG2ywFmUQepWe0jA6LIsbzi3dbtHs4nK', 1, 'Peter', 'CHAN', 'xxx@ibm.hk', 'Room 11, IT Building', 'Hong Kong', '1', 'Infrastructure Development', 'IBM Research Lab', 0, NULL, 0, 4, 'Only for day 1', '', '', 0),
(7, 'yyy@york.edu', '$2y$10$eLh6dB1iZuitxwMfvIsZiul.waU9OygWIJfgsvMQjeNDVt8FSWEb6', 1, 'David', 'TOMSON', 'yyy@york.edu', 'Room 12, IT Building', 'New York', '2', 'Electronic Engineering', 'York University', 0, NULL, 0, 3, '', '', '', 0),
(8, 'zzz@jewel.com', '$2y$10$W4hT6xER/dbcz/Gbr040t.IbwyQwlCvQhnMsPzBxuMLbMDU1FAsxW', 4, 'Tommy', 'YI', 'zzz@jewel.com', 'Floor 3, 5 Nathan Road', 'Hong Kong', '1', 'Marketing', 'Jewel Company Ltd', 0, NULL, 0, 5, '', '', '', 0),
(9, 'jiang@uu.ac.kr', '$2y$10$NIBBaOeUSilDgjvSfU6xOOjbLwB/YXjOwtc0NK1Ze1bc879FoGC..', 5, 'Jiang', 'Chang', 'jiang@uu.ac.kr', '77 Gyungan-ro, Gwangju-si', 'Gyunggi-do', '12', 'Social Science', 'Seoul  University', 0, NULL, 0, 2, '', '', '', 0),
(10, 'anson', '$2y$10$syqBZ9XzIGh0OijjCERQw.5FW2/3BJtiErP2nuFZVWI2L7bSo079m', 1, 'Anson', 'KWAN', 'anson@anson.com', 'Lib G/F, HK POLYU', 'Hong Kong', '2', 'Computing', 'The Hong Kong Polytechnic University', 0, NULL, 0, 0, '', '', '320722549d1751cf3f247855f937b982', 10),
(16, 'coco@ivc.com', '$2y$10$83T9AM8wNWPrMRhscg94jO2b1CZ1a/q0LKpoGmN/S8ucs5T8T84L.', 3, 'Coco', 'Cream', 'coco@ivc.com', 'Room 611, Block A, HKCU', 'Hong Kong', '1', 'Biomedical Engineering', 'The Hong Kong Chinese University', 0, NULL, 0, 2, '', NULL, '18d8042386b79e2c279fd162df0205c8', 0),
(17, 'fiona@girl.com', '$2y$10$.4zPM8CVG9n7OvVNtW5CAes4sLTB3DkEzzcpszt0En3u/HVe897ny', 6, 'Fiona', 'CHENG', 'fiona@girl.com', 'Disney Resort, Hong Kong Island', 'Hong Kong', '1', 'Computing', 'The Hong Kong Polytechnic University', 0, NULL, 0, 0, '', NULL, NULL, 0),
(18, 'pat@girl.com', '$2y$10$addaKBVYfC/fbb921XWgw.5ZGX7uCNcYl35mc5ivxm/nrULX2ACey', 6, 'Pat', 'LU', 'pat@girl.com', 'Room 808, Ocean Hotel', 'Hong Kong', '1', 'Computing', 'The Hong Kong Polytechnic University', 0, NULL, 0, 0, '', NULL, NULL, 0),
(19, 'cre@girl.com', '$2y$10$TFnSrMIIGYc9oVIoVbtaFuRK5cFMxcV4AzJ75j9rT4ka360tJjgg.', 6, 'Cre', 'KONG', 'cre@girl.com', 'Disney Resort, Hong Kong Island', 'Hong Kong', '1', 'Computing', 'The Hong Kong Polytechnic University', 0, NULL, 0, 0, '', NULL, NULL, 10),
(20, 'eunice@girl.com', '$2y$10$/3mMBzeEnxHWCW4HGQ7d3epkwcdngHUV2uCNGGKvqMhPO/8KQ/hHS', 6, 'Eunice', 'YIP', 'eunice@girl.com', 'Disney Resort, Hong Kong Island', 'Hong Kong', '1', 'Computing', 'The Hong Kong Polytechnic University', 0, NULL, 0, 0, '', NULL, NULL, 0),
(21, 'din@girl.com', '$2y$10$xW60JHBrpY/7VINFq5UQHeDi70wp19yyJZ7yG8lugxCJ/Tw432msS', 5, 'Din', 'CHEUNG', 'din@girl.com', 'Room A, Cyber Court', 'Hong Kong', '1', 'Computing', 'The Hong Kong Polytechnic University', 0, NULL, 0, 0, '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `User_Bibi`
--

CREATE TABLE `User_Bibi` (
  `id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `paper` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User_Bibi`
--

INSERT INTO `User_Bibi` (`id`, `User_id`, `description`, `paper`) VALUES
(1, 21, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. ', 'Social Behaviors in Nuclear and Extended families Children Age 6 to 11'),
(2, 20, 'Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 'The Mediating Role of Work-related Musculoskeletal'),
(3, 6, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos ', 'Teen Athletes: Facebook, Self Esteem and Self Perception'),
(4, 4, 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere', 'Design Trends of Thai Halal Products Packaging for Muslim Country');

-- --------------------------------------------------------

--
-- Table structure for table `Venue`
--

CREATE TABLE `Venue` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `map` varchar(45) NOT NULL,
  `floorPlan` varchar(45) DEFAULT NULL,
  `VenueType_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Venue`
--

INSERT INTO `Venue` (`id`, `name`, `location`, `map`, `floorPlan`, `VenueType_id`) VALUES
(1, 'Silver Box 1', 'Location A', 'Map A', 'Plan A', 1),
(2, 'Silver Box 2', 'Location 2', 'Map 2', 'Plan 2', 2),
(3, 'Silver Box 3', 'Location 3', 'Map 3', 'Plan 3', 3),
(4, 'Venue b', 'Location B', 'Map B', 'Plan B', 1),
(5, 'Silver Box 1', '1/F, Hotel ICON', 'Hotel ICON', 'Hotel ICON', 1),
(6, 'Silver Box 2', '1/F, Hotel ICON', 'Hotel ICON', 'Hotel ICON', 1),
(7, 'Sky Bridge', '1/F, Hotel ICON', 'Hotel ICON', 'Hotel ICON', 4);

-- --------------------------------------------------------

--
-- Table structure for table `VenueType`
--

CREATE TABLE `VenueType` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `VenueType`
--

INSERT INTO `VenueType` (`id`, `name`, `description`) VALUES
(1, 'Hall', 'hall'),
(2, 'Lecture Room', 'lecture room'),
(3, 'Classroom', 'classroom'),
(4, 'Common Area', 'common area'),
(5, 'Dining Room', 'For eating');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Activity`
--
ALTER TABLE `Activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ActivityType`
--
ALTER TABLE `ActivityType`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_old`
--
ALTER TABLE `activity_old`
  ADD PRIMARY KEY (`id`,`Venue_id`,`Topic_id`,`ActivityType_id`,`Administrator_id`);

--
-- Indexes for table `Administrator`
--
ALTER TABLE `Administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Announcement`
--
ALTER TABLE `Announcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Announcement_Administrator1_idx` (`Administrator_id`);

--
-- Indexes for table `Announcement_has_Participant`
--
ALTER TABLE `Announcement_has_Participant`
  ADD PRIMARY KEY (`Accouncement_id`,`Participant_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CheckButton`
--
ALTER TABLE `CheckButton`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Country`
--
ALTER TABLE `Country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Guestspeaker`
--
ALTER TABLE `Guestspeaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`id`,`User_id`),
  ADD KEY `fk_Message_User1_idx` (`User_id`);

--
-- Indexes for table `Normalpeople`
--
ALTER TABLE `Normalpeople`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Outside_Attraction`
--
ALTER TABLE `Outside_Attraction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Paper`
--
ALTER TABLE `Paper`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Paper_Topic1_idx` (`Topic_id`),
  ADD KEY `fk_Paper_Normal_idx` (`NormalPeople_id`);

--
-- Indexes for table `Participant`
--
ALTER TABLE `Participant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Participant_has_Activity`
--
ALTER TABLE `Participant_has_Activity`
  ADD PRIMARY KEY (`Participant_id`,`Activity_id`),
  ADD KEY `fk_Participant_has_Activity_Participant1_idx` (`Participant_id`),
  ADD KEY `fk_Participant_has_Activity_Activity1_idx` (`Activity_id`);

--
-- Indexes for table `Participant_has_coupon`
--
ALTER TABLE `Participant_has_coupon`
  ADD PRIMARY KEY (`Participant_id`,`coupon_id`),
  ADD KEY `fk_Participant_has_coupon_Participant1_idx` (`Participant_id`);

--
-- Indexes for table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Post_Replay`
--
ALTER TABLE `Post_Replay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radiobutton`
--
ALTER TABLE `radiobutton`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Sectionchair`
--
ALTER TABLE `Sectionchair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Survey`
--
ALTER TABLE `Survey`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Survey_Administrator_idx` (`Administrator_id`);

--
-- Indexes for table `Survey_has_Participant`
--
ALTER TABLE `Survey_has_Participant`
  ADD PRIMARY KEY (`Survey_id`,`Participant_id`);

--
-- Indexes for table `TextBox`
--
ALTER TABLE `TextBox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TextResponse`
--
ALTER TABLE `TextResponse`
  ADD PRIMARY KEY (`id`,`TextBox_id`),
  ADD KEY `fk_TextResponse_TextBox1_idx` (`TextBox_id`);

--
-- Indexes for table `Title`
--
ALTER TABLE `Title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Topic`
--
ALTER TABLE `Topic`
  ADD PRIMARY KEY (`id`,`Category_id`),
  ADD KEY `fk_Topic_Category1_idx` (`Category_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `User_Bibi`
--
ALTER TABLE `User_Bibi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Venue`
--
ALTER TABLE `Venue`
  ADD PRIMARY KEY (`id`,`VenueType_id`),
  ADD KEY `fk_Venue_VenueType1_idx` (`VenueType_id`);

--
-- Indexes for table `VenueType`
--
ALTER TABLE `VenueType`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Activity`
--
ALTER TABLE `Activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ActivityType`
--
ALTER TABLE `ActivityType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `activity_old`
--
ALTER TABLE `activity_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Announcement`
--
ALTER TABLE `Announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `CheckButton`
--
ALTER TABLE `CheckButton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Message`
--
ALTER TABLE `Message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Outside_Attraction`
--
ALTER TABLE `Outside_Attraction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Paper`
--
ALTER TABLE `Paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Post`
--
ALTER TABLE `Post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `Post_Replay`
--
ALTER TABLE `Post_Replay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `Question`
--
ALTER TABLE `Question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `radiobutton`
--
ALTER TABLE `radiobutton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `TextResponse`
--
ALTER TABLE `TextResponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `Topic`
--
ALTER TABLE `Topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `User_Bibi`
--
ALTER TABLE `User_Bibi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Venue`
--
ALTER TABLE `Venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `VenueType`
--
ALTER TABLE `VenueType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Administrator`
--
ALTER TABLE `Administrator`
  ADD CONSTRAINT `fk_Administrator_User1` FOREIGN KEY (`id`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Announcement`
--
ALTER TABLE `Announcement`
  ADD CONSTRAINT `fk_Announcement_Administrator1` FOREIGN KEY (`Administrator_id`) REFERENCES `Administrator` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Guestspeaker`
--
ALTER TABLE `Guestspeaker`
  ADD CONSTRAINT `fk_GuestSpeaker_Participant1` FOREIGN KEY (`id`) REFERENCES `Participant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `fk_Message_User1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Normalpeople`
--
ALTER TABLE `Normalpeople`
  ADD CONSTRAINT `fk_NormalPeople_Participant1` FOREIGN KEY (`id`) REFERENCES `Participant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Paper`
--
ALTER TABLE `Paper`
  ADD CONSTRAINT `fk_Paper_Normal` FOREIGN KEY (`NormalPeople_id`) REFERENCES `Normalpeople` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Paper_Topic` FOREIGN KEY (`Topic_id`) REFERENCES `Topic` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Participant`
--
ALTER TABLE `Participant`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`id`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Sectionchair`
--
ALTER TABLE `Sectionchair`
  ADD CONSTRAINT `fk_SectionChair_Participant1` FOREIGN KEY (`id`) REFERENCES `Participant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Survey`
--
ALTER TABLE `Survey`
  ADD CONSTRAINT `fk_Survey_Administrator` FOREIGN KEY (`Administrator_id`) REFERENCES `Administrator` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `TextResponse`
--
ALTER TABLE `TextResponse`
  ADD CONSTRAINT `fk_TextResponse_TextBox1` FOREIGN KEY (`TextBox_id`) REFERENCES `TextBox` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Topic`
--
ALTER TABLE `Topic`
  ADD CONSTRAINT `fk_Topic_Category1` FOREIGN KEY (`Category_id`) REFERENCES `Category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Venue`
--
ALTER TABLE `Venue`
  ADD CONSTRAINT `fk_Venue_VenueType1` FOREIGN KEY (`VenueType_id`) REFERENCES `VenueType` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
