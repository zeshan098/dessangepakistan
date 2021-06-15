-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 03:11 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dessange1`
--

-- --------------------------------------------------------

--
-- Table structure for table `services_service`
--

CREATE TABLE `services_service` (
  `id` bigint(6) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `cost` varchar(20) DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `major_type_id` varchar(10) DEFAULT NULL,
  `sub_type_id` varchar(10) DEFAULT NULL,
  `branch_id` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `picture` varchar(20) DEFAULT NULL,
  `service_category` varchar(50) DEFAULT NULL,
  `service_duration` varchar(10) DEFAULT NULL,
  `service_time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_service`
--

INSERT INTO `services_service` (`id`, `name`, `description`, `start_date`, `end_date`, `cost`, `duration`, `status`, `major_type_id`, `sub_type_id`, `branch_id`, `category`, `picture`, `service_category`, `service_duration`, `service_time`) VALUES
(638, 'Hand Feet Nail Colour', 'Hand Feet Nail Colour', '2020-07-16', '2030-07-16', '0', '20', 'open', '28', '116', '1', 'female', '1.jpg', 'service', '0', 'no'),
(797, 'KERATIN NECKLINE 15000', 'KERATIN', '2020-10-20', '2030-10-20', '0', '120', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(798, 'KERATIN SHOULDER 18000', 'KERATIN', '2020-10-20', '2030-10-20', '0', '120', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(799, 'KERATIN MID-WAIST 25000', 'KERATIN', '2020-10-20', '2030-10-20', '0', '120', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(800, 'KERATIN WAIST 30000', 'KERATIN', '2020-10-20', '2030-10-20', '0', '120', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(801, 'KERATIN HIPLINE 40000', 'KERATIN', '2020-10-20', '2030-10-20', '0', '120', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(802, 'KERATIN TAIL BONE 50000', 'KERATIN', '2020-10-20', '2030-10-20', '0', '120', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(803, 'HIGHLIGHTS HIPLINE 50000', 'HIGHLIGHTS', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(804, 'HIGHLIGHTS MID-WAIST 35000', 'HIGHLIGHTS', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(805, 'HIGHLIGHTS NECKLINE 15000', 'HIGHLIGHTS', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(806, 'HIGHLIGHTS SHOULDER 25000', 'HIGHLIGHTS', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(807, 'HIGHLIGHTS TAIL BONE 50000', 'HIGHLIGHTS', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(808, 'HIGHLIGHTS WAIST40000', 'HIGHLIGHTS', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(809, 'LOWLIGHTS NECKLINE 15000', 'LOWLIGHTS', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(810, 'LOWLIGHTS SHOULDER 25000', 'LOWLIGHTS', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(811, 'LOWLIGHTS MID-WAIST 35000', 'LOWLIGHTS', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(812, 'LOWLIGHTS WAIST 40000', 'LOWLIGHTS', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(813, 'LOWLIGHTS HIPLINE 50000', 'LOWLIGHTS', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(814, 'LOWLIGHTS TAIL BONE 60000', 'LOWLIGHTS', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(815, 'BALAYAGE NECKLINE 15000', 'BALAYAGE', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(816, 'BALAYAGE SHOULDER 20000', 'BALAYAGE', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(817, 'BALAYAGE MID-WAIST 25000', 'BALAYAGE', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(818, 'BALAYAGE WAIST 30000', 'BALAYAGE', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(819, 'BALAYAGE HIPLINE 45000', 'BALAYAGE', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(820, 'BALAYAGE TAIL BONE 55000', 'BALAYAGE', '2020-10-20', '2030-10-20', '0', '60', 'open', '30', '121', '1', 'female', '1.jpg', 'service', '0', 'no'),
(825, 'Shampoo Protocol', 'Shampoo Protocol description', '2021-01-01', '2021-01-30', '6500', '95', 'open', '47', '180', '1', 'male', '1.jpg', 'service', '20', 'yes'),
(826, 'Head oil', 'Head Oil Description', '2021-01-01', '2021-01-30', '3700', '45', 'open', '46', '175', '1', 'male', '1.jpg', 'service', '10', 'yes'),
(827, 'Foot Massage (20 min)', 'Foot Massage (20 min) description', '2021-01-01', '2021-01-30', '4000', '70', 'open', '46', '175', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(828, 'Sweet & Salty body scrub - 1 hr', 'Sweet & Salty body scrub - 1 hr description', '2021-01-01', '2021-01-30', '4444', '70', 'open', '46', '176', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(829, 'Sweet & Salty body scrub - 1 hr', 'Sweet & Salty body scrub - 1 hr description', '2021-01-01', '2021-01-30', '8888', '55', 'open', '46', '176', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(830, 'Harmonizing treatment with Gold “Terre Précieuse” - 1hr 30 mins', 'Harmonizing treatment with Gold “Terre Précieuse” - 1hr 30 mins description', '2021-01-01', '2021-01-30', '9999', '23', 'open', '46', '176', '1', 'male', '1.jpg', 'service', '11', 'yes'),
(831, 'Shoulder massage', 'Shoulder massage description', '2021-01-01', '2021-01-30', '9000', '100', 'open', '46', '175', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(832, 'Hand Polisher', 'Hand Polisher description', '2021-01-01', '2021-01-30', '8000', '40', 'open', '46', '177', '1', 'male', '1.jpg', 'service', '11', 'yes'),
(833, 'Full Body Polisher', 'Full Body Polisher description', '2021-01-01', '2021-01-30', '3000', '30', 'open', '46', '177', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(834, 'Half Body Polisher', 'Half Body Polisher description', '2021-01-01', '2021-01-30', '4000', '23', 'open', '46', '177', '1', 'male', '1.jpg', 'service', '11', 'yes'),
(835, 'Haircut', 'Haircut description', '2021-01-01', '2021-01-30', '2000', '90', 'open', '47', '180', '1', 'male', '1.jpg', 'service', '10', 'yes'),
(836, 'Hair Nourishing ProtienTreatment - 30mins', 'Hair Nourishing ProtienTreatment - 30mins description', '2021-01-01', '2021-01-30', '2000', '20', 'open', '47', '182', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(837, 'Precious Care Phytodess - crème precieuse - 1hr', 'Precious Care Phytodess - crème precieuse - 1hr descr', '2021-01-01', '2021-01-30', '6000', '55', 'open', '47', '182', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(838, 'Relaxing three-continent massage - 1hr', 'Relaxing three-continent massage - 1hr   Description', '2021-01-01', '2021-01-31', '4000', '12', 'open', '46', '175', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(839, 'Cocooning massage with warm candle - 1hr 30mins', 'Cocooning massage with warm candle - 1hr 30mins   description', '2021-01-01', '2021-01-31', '5000', '12', 'open', '46', '175', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(840, 'Massage with delicious balm - 1hr', 'Massage with delicious balm - 1hr   Description', '2021-01-01', '2021-01-31', '77777', '12', 'open', '46', '175', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(841, 'Feet Polisher', 'Feet Polisher Decription', '2021-01-01', '2021-01-31', '8888', '122', 'open', '46', '177', '1', 'male', '1.jpg', 'service', '122', 'yes'),
(842, 'Hand & Feet Polisher', 'Hand & Feet Polisher Description', '2021-01-01', '2021-01-31', '77777', '70', 'open', '46', '177', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(843, 'Eye Brow Tinting/Bleaching', 'Eye Brow Tinting/Bleaching Description', '2021-01-01', '2021-01-31', '9999', '12', 'open', '46', '178', '1', 'male', '1.jpg', 'service', '111', 'yes'),
(844, 'Upper lip Bleach', 'Upper lip Bleach Description', '2021-01-01', '2021-01-31', '8888', '95', 'open', '46', '178', '1', 'male', '1.jpg', 'service', '111', 'yes'),
(845, 'Arm or Thigh Bleach', 'Arm or Thigh Bleach Descriptiom', '2021-01-01', '2021-01-31', '9999', '60', 'open', '46', '178', '1', 'male', '1.jpg', 'service', '122', 'yes'),
(846, 'Eyebrows', 'Eyebrows Description', '2021-01-01', '2021-01-31', '4000', '12', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '20', 'yes'),
(847, 'Upper Lips', 'Upper Lips Description', '2021-01-01', '2021-01-31', '4000', '23', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '111', 'yes'),
(848, 'Lower Lips', 'Lower Lips Description', '2021-01-01', '2021-01-31', '4000', '55', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(849, 'Upper & Lower Lips Waxing (Both)', 'Upper & Lower Lips Waxing (Both) Description', '2021-01-01', '2021-01-31', '4000', '95', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '122', 'yes'),
(850, 'Forehead', 'Forehead Description', '2021-01-01', '2021-01-31', '4000', '12', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '10', 'yes'),
(851, 'Face - Half', 'Face - Half Description', '2021-01-01', '2021-01-31', '8888', '95', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '20', 'yes'),
(852, 'Face - Full', 'Face - Full description', '2021-01-01', '2021-01-31', '4000', '12', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '111', 'yes'),
(853, 'Ears or nostrils', 'Ears or nostrils Description', '2021-01-01', '2021-01-31', '4000', '60', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '122', 'yes'),
(854, 'Half legs', 'Half legs Description', '2021-01-01', '2021-01-31', '4000', '23', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '11', 'yes'),
(855, 'Full legs', 'Full legs Description', '2021-01-01', '2021-01-31', '4000', '12', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(856, 'Back OR Front', 'Back OR Front description', '2021-01-01', '2021-01-31', '4000', '70', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '10', 'yes'),
(857, 'Back AND Front Both', 'Back AND Front Both description', '2021-01-01', '2021-01-31', '4000', '55', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '20', 'yes'),
(858, 'Underarms', 'Underarms Description', '2021-01-01', '2021-01-31', '4000', '60', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(859, 'Half Arms', 'Half Arms description', '2021-01-01', '2021-01-31', '4000', '12', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '111', 'yes'),
(860, 'Full Arms', 'Full Arms Description', '2021-01-01', '2021-01-31', '8888', '23', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '122', 'yes'),
(861, 'Full Body', 'Full Body description', '2021-01-01', '2021-01-31', '4000', '55', 'open', '46', '179', '1', 'male', '1.jpg', 'service', '12', 'yes'),
(862, 'ENGAGEMENT', 'ENGAGEMENT Description', '2021-01-01', '2021-01-31', '4000', '70', 'open', '49', '186', '1', 'male', '1.jpg', 'service', '11', 'yes'),
(863, 'MEHNDI', 'MEHNDI Description', '2021-01-01', '2021-01-31', '8888', '95', 'open', '49', '187', '1', 'male', '1.jpg', 'service', '10', 'yes'),
(864, 'BARAAT/WALIMA', 'BARAAT/WALIMA Description', '2021-01-01', '2021-01-31', '9999', '12', 'open', '49', '188', '1', 'male', '1.jpg', 'service', '20', 'yes'),
(865, 'Hand Beauty (Shape & Buffer)', 'Hand Beauty (Shape & Buffer) Description', '2021-01-01', '2021-01-31', '77777', '60', 'open', '50', '190', '1', 'male', '1.jpg', 'service', '111', 'yes'),
(866, 'Express Manicure - 30mins', 'Express Manicure - 30mins Description', '2021-01-01', '2021-01-31', '77777', '55', 'open', '50', '190', '1', 'male', '1.jpg', 'service', '122', 'yes'),
(867, 'Express Pedicure - 30mins', 'Express Pedicure - 30mins Description', '2021-01-01', '2021-01-31', '8888', '23', 'open', '50', '190', '1', 'male', '1.jpg', 'service', '122', 'yes'),
(868, 'Corrective Manicure - 45 mins', 'Corrective Manicure - 45 mins (with surgical blade, corns, watt, nail ingrowing, fungus treatment)', '2021-01-01', '2021-01-31', '9999', '12', 'open', '50', '190', '1', 'male', '1.jpg', 'service', '11', 'yes'),
(869, 'Corrective Pedicure - 45 mins', 'Corrective Pedicure - 45 mins (with surgical blade, corns, watt, nail ingrowing, fungus treatment)', '2021-01-01', '2021-01-31', '8888', '55', 'open', '50', '190', '1', 'male', '1.jpg', 'service', '10', 'yes'),
(870, 'Mani & Pedi with paraffin wax', 'Mani & Pedi with paraffin wax', '0000-00-00', '0000-00-00', '1000', '70', 'open', '50', '190', '1', 'male', '1.jpg', 'service', '10', 'yes'),
(871, 'Manicure with paraffin wax', 'Manicure with paraffin wax', '0000-00-00', '0000-00-00', '1000', '70', 'open', '50', '190', '1', 'male', '1.jpg', 'service', '10', 'yes'),
(872, 'Pedicure with paraffin Wax', 'Pedicure with paraffin Wax', '0000-00-00', '0000-00-00', '1000', '70', 'open', '50', '190', '1', 'male', '1.jpg', 'service', '10', 'yes'),
(873, 'Basic Facial', 'Basic Facial', '0000-00-00', '0000-00-00', '1000', '70', 'open', '48', '184', '1', 'male', '1.jpg', 'service', '10', 'yes'),
(874, 'Basic Facial with polisher', 'Basic Facial with polisher', '0000-00-00', '0000-00-00', '1000', '70', 'open', '48', '184', '1', 'male', '1.jpg', 'service', '10', 'yes'),
(875, 'Face Polisher', 'Face Polisher', '0000-00-00', '0000-00-00', '1000', '70', 'open', '48', '184', '1', 'male', '1.jpg', 'service', '10', 'yes'),
(876, 'Head oil', 'Head oil', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '154', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(877, 'Foot Massage (20 min)', 'Foot Massage (20 min)', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '154', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(878, 'Shoulder massage', 'Shoulder massage', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '154', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(879, 'Relaxing three-continent massage - 1hr', 'Relaxing three-continent massage - 1hr', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '154', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(880, 'Cocooning massage with warm candle - 1hr 30mins', 'Cocooning massage with warm candle - 1hr 30mins', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '154', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(881, 'Massage with delicious balm - 1hr', 'Massage with delicious balm - 1hr', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '154', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(882, 'Sweet & Salty body scrub - 1 hr', 'Sweet & Salty body scrub - 1 hr', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '155', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(883, 'Harmonizing treatment with Gold “Terre Précieuse” - 1hr 30 mins', 'Harmonizing treatment with Gold “Terre Précieuse” - 1hr 30 mins', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '155', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(884, 'Full Body Polisher', 'Full Body Polisher', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '156', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(885, 'Half Body Polisher', 'Half Body Polisher', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '156', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(886, 'Hand Polisher', 'Hand Polisher', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '174', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(887, 'Feet Polisher', 'Feet Polisher', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '174', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(888, 'Hand & Feet Polisher', 'Hand & Feet Polisher', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '174', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(889, 'Eye Brow Tinting/Bleaching', 'Eye Brow Tinting/Bleaching', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '157', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(890, 'Upper lip Bleach', 'Upper lip Bleach', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '157', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(891, 'Arm or Thigh Bleach', 'Arm or Thigh Bleach', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '157', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(892, 'Eyebrows', 'Eyebrows', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(893, 'Upper Lips', 'Upper Lips', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(894, 'Lower Lips', 'Lower Lips', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(895, 'Upper & Lower Lips Waxing (Both)', 'Upper & Lower Lips Waxing (Both)', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(896, 'Forehead', 'Forehead', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(897, 'Face - Half', 'Face - Half', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(898, 'Face - Full', 'Face - Full', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(899, 'Ears or nostrils', 'Ears or nostrils', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(900, 'Half legs', 'Half legs', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(901, 'Full legs', 'Full legs', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(902, 'Back OR Front', 'Back OR Front', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(903, 'Back AND Front Both', 'Back AND Front Both', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(904, 'Underarms', 'Underarms', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(905, 'Full Bikini', 'Full Bikini', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(906, 'Half Arms', 'Half Arms', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(907, 'Full Arms', 'Full Arms', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(908, 'Full Body', 'Full Body', '0000-00-00', '0000-00-00', '1000', '70', 'open', '40', '158', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(909, 'Sauna 20 min', 'Sauna 20 min', '0000-00-00', '0000-00-00', '1000', '70', 'open', '42', '163', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(910, 'Basic Facial', 'Basic Facial', '0000-00-00', '0000-00-00', '1000', '70', 'open', '43', '164', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(911, 'Basic Facial with polisher', 'Basic Facial with polisher', '0000-00-00', '0000-00-00', '1000', '70', 'open', '43', '164', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(912, 'Face Polisher', 'Face Polisher', '0000-00-00', '0000-00-00', '1000', '70', 'open', '43', '164', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(913, 'The express eye radiance patch application (Eye Treatment)', 'The express eye radiance patch application (Eye Treatment)', '0000-00-00', '0000-00-00', '1000', '70', 'open', '43', '164', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(914, 'Deep Cleansing', 'Deep Cleansing', '0000-00-00', '0000-00-00', '1000', '70', 'open', '43', '164', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(915, 'Traditional Skin Cleaning with ozone - 45 min', 'Traditional Skin Cleaning with ozone - 45 min', '0000-00-00', '0000-00-00', '1000', '70', 'open', '43', '164', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(916, 'Invigorating and moisturizing treatment - 1h', 'Invigorating and moisturizing treatment - 1h', '0000-00-00', '0000-00-00', '1000', '70', 'open', '43', '164', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(917, 'Firminy and nourishing treatment with Tahiti black pearls', 'Firminy and nourishing treatment with Tahiti black pearls', '0000-00-00', '0000-00-00', '1000', '70', 'open', '43', '164', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(918, 'Radiance-perfecting treatment with Brazilian acerola - 1h', 'Radiance-perfecting treatment with Brazilian acerola - 1h', '0000-00-00', '0000-00-00', '1000', '70', 'open', '43', '164', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(919, 'Eyebrows', 'Eyebrows', '0000-00-00', '0000-00-00', '1000', '70', 'open', '43', '165', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(920, 'Eyebrows  upper lips', 'Eyebrows  upper lips', '0000-00-00', '0000-00-00', '1000', '70', 'open', '43', '165', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(921, 'Upper & Lower Lips Threading', 'Upper & Lower Lips Threading', '0000-00-00', '0000-00-00', '1000', '70', 'open', '43', '165', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(922, 'Chin', 'Chin', '0000-00-00', '0000-00-00', '1000', '70', 'open', '43', '165', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(923, 'Cheeks Threading', 'Cheeks Threading', '0000-00-00', '0000-00-00', '1000', '70', 'open', '43', '165', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(924, 'Eye Make up', 'Eye Make up', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '166', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(925, 'Eye Make up with Hairdo', 'Eye Make up with Hairdo', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '166', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(926, 'Party Make up', 'Party Make up', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '166', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(927, 'Party Make up with Hairdo', 'Party Make up with Hairdo', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '166', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(928, 'Signature Engagement Makeup', 'Signature Engagement Makeup', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '167', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(929, 'Senior Engagement Makeup', 'Senior Engagement Makeup', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '167', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(930, 'Signature Nikah Makeup', 'Signature Nikah Makeup', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '168', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(931, 'Senior Nikah Makeup', 'Senior Nikah Makeup', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '168', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(932, 'Signature Mehndi Makeup', 'Signature Mehndi Makeup', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '169', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(933, 'Senior Mehndi Makeup', 'Senior Mehndi Makeup', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '169', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(934, 'Signature BARAAT Makeup', 'Signature BARAAT Makeup', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '170', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(935, 'Senior BARAAT Makeup', 'Senior BARAAT Makeup', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '170', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(936, 'Signature Walima Makeup', 'Signature Walima Makeup', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '171', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(937, 'Senior Walima Makeup', 'Senior Walima Makeup', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '171', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(938, 'EYE LASH EXTENSION', 'EYE LASH EXTENSION', '0000-00-00', '0000-00-00', '1000', '70', 'open', '44', '192', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(939, 'Hand Beauty (Shape & Buffer)', 'Hand Beauty (Shape & Buffer)', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '172', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(940, 'Express Manicure - 30mins', 'Express Manicure - 30mins', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '172', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(941, 'Express Pedicure - 30mins', 'Express Pedicure - 30mins', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '172', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(942, 'Corrective Manicure - 45 mins', 'Corrective Manicure - 45 mins', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '172', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(943, 'Corrective Pedicure - 45 mins', 'Corrective Pedicure - 45 mins', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '172', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(944, 'Mani & Pedi with paraffin wax', 'Mani & Pedi with paraffin wax', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '172', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(945, 'Manicure with paraffin wax', 'Manicure with paraffin wax', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '172', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(946, 'Pedicure with paraffin Wax', 'Pedicure with paraffin Wax', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '172', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(947, 'Arcylics - Hands', 'Arcylics - Hands', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(948, 'Arcylics - Feet', 'Arcylics - Feet', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(949, 'Arcylics - Refill', 'Arcylics - Refill', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(950, 'Acrylic Nail Removal Hands', 'Acrylic Nail Removal Hands', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(951, 'Acrylic Nail Removal Feet', 'Acrylic Nail Removal Feet', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(952, 'Hand Nail Colour', 'Hand Nail Colour', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(953, 'Feet Nail Colour', 'Feet Nail Colour', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(954, 'Gelish Hands', 'Gelish Hands', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(955, 'Gelish Fee', 'Gelish Fee', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(956, 'Gelish Remove', 'Gelish Remove', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(957, 'Acrylic Coating', 'Acrylic Coating', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(958, 'Nail Art', 'Nail Art', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(959, 'Crome Nail with Gelish', 'Crome Nail with Gelish', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(960, 'Hand massage 20 min', 'Hand massage 20 min', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(961, 'Feet massage 20 min', 'Feet massage 20 min', '0000-00-00', '0000-00-00', '1000', '70', 'open', '45', '173', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(962, 'Shampoo Protocol', 'Shampoo Protocol', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '159', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(963, 'Haircut', 'Haircut', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '159', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(964, 'Hair Trimming', 'Hair Trimming', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '159', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(965, 'Styling / Updo', 'Styling / Updo', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '159', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(966, 'Blowdry', 'Blowdry', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '159', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(967, 'Haircut under 12\'s', 'Haircut under 12\'s', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '159', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(968, 'Styling / Updo under 12\'s', 'Styling / Updo under 12\'s', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '159', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(969, 'Keratin/Brazilian Blow dry', 'Keratin/Brazilian Blow dry', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '160', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(970, 'Extenso', 'Extenso', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '162', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(971, 'Hair Nourishing ProtienTreatment - 30mins', 'Hair Nourishing ProtienTreatment - 30mins', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '161', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(972, 'Precious Care Phytodess - crème precieuse - 1hr', 'Precious Care Phytodess - crème precieuse - 1hr', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '161', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(973, 'Essential care with 10 mineralsm-1hr', 'Essential care with 10 mineralsm-1hr', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '161', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(974, 'Original care with honey and everlasting flower cream - 1.5hr', 'Original care with honey and everlasting flower cream - 1.5hr', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '161', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(975, 'Essential care with 10 Minerals with Precious Oils - 1.5hr', 'Essential care with 10 Minerals with Precious Oils - 1.5hr', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '161', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(976, 'Human Hair extensions', 'Human Hair extensions', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '162', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(977, 'Roots', 'Roots', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '193', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(978, 'One Colour Hair Dye', 'One Colour Hair Dye', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '193', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(979, 'BabyLights', 'BabyLights', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '193', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(980, 'Highlights', 'Highlights', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '193', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(981, 'Lowlights', 'Lowlights', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '193', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(982, 'Balayage', 'Balayage', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '193', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(983, 'Ombre', 'Ombre', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '193', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(984, 'Per Foil Colour Application', 'Per Foil Colour Application', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '193', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(985, 'Funky Colours - Per Foil Application', 'Funky Colours - Per Foil Application', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '193', '1', 'female', '1.jpg', 'service', '10', 'yes'),
(986, 'Colour Correction', 'Colour Correction', '0000-00-00', '0000-00-00', '1000', '70', 'open', '41', '193', '1', 'female', '1.jpg', 'service', '10', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services_service`
--
ALTER TABLE `services_service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services_service`
--
ALTER TABLE `services_service`
  MODIFY `id` bigint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
