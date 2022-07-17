-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 01:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_turok`
--

-- --------------------------------------------------------

--
-- Table structure for table `adult_immunization`
--

CREATE TABLE `adult_immunization` (
  `adult_immunization_id` int(11) NOT NULL,
  `patient_full_name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `patient_occupation` varchar(50) DEFAULT NULL,
  `doma` date DEFAULT NULL,
  `patient_weight` varchar(15) NOT NULL,
  `patient_temperature` varchar(30) NOT NULL,
  `patient_bp` varchar(15) NOT NULL,
  `patient_pr` varchar(15) NOT NULL,
  `patient_rr` varchar(15) NOT NULL,
  `chief_complain` varchar(255) DEFAULT NULL,
  `signs_and_symptoms` varchar(255) DEFAULT NULL,
  `signs_and_symptoms_duration` varchar(255) DEFAULT NULL,
  `probable_diagnosis` varchar(255) DEFAULT NULL,
  `vaccine` varchar(100) NOT NULL,
  `vaccine_dose` varchar(15) NOT NULL,
  `prescription` varchar(255) DEFAULT NULL,
  `prescription_dose` varchar(15) DEFAULT NULL,
  `prescription_duration` varchar(100) DEFAULT NULL,
  `advised` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adult_immunization`
--

INSERT INTO `adult_immunization` (`adult_immunization_id`, `patient_full_name`, `address`, `age`, `sex`, `patient_occupation`, `doma`, `patient_weight`, `patient_temperature`, `patient_bp`, `patient_pr`, `patient_rr`, `chief_complain`, `signs_and_symptoms`, `signs_and_symptoms_duration`, `probable_diagnosis`, `vaccine`, `vaccine_dose`, `prescription`, `prescription_dose`, `prescription_duration`, `advised`) VALUES
(1, 'Sample Patient Name', 'Sample Patient Address', 20, 'Male', 'Sample Patient Occupation', '2022-07-04', '60 kg', '36.1 Celcius', '1 MMHG', '1 BPM', ' CPM', 'Sample Chief Complain', 'Sample Sign and Symptoms', '2022-07-04 to 2022-07-05', 'Sample Probable Diagnosis', 'Sample Vaccine 1', '99 mL', 'Sample Prescription', '99 mg', '2022-07-04 to 2022-07-05', 'Sample Advised'),
(2, 'Sample Patient Name 2', 'Sample Patient Address 2', 20, 'Female', 'Sample Patient Occupation 2', '2022-07-04', '1 kg', '1 Celcius', '1 MMHG', '1 BPM', '1 CPM', 'wew', 'wew', '2022-07-04 to 2022-07-04', 'Sample Probable Diagnosis 2', 'Sample Vaccine 2', '99 mg', 'Sample Prescription 2', '99 mL', '2022-07-04 to 2022-07-04', 'wew'),
(3, 'Sample Patient Name 3', 'Sample Patient Address', 20, 'Male', 'Sample Patient Occupation', '2022-07-04', '1 kg', '1 Celcius', '1 MMHG', '1 BPM', '1 CPM', 'wew', 'wew', '2022-07-04 to 2022-07-04', 'Sample Probable Diagnosis', 'Sample Vaccine 1', '1 mL', 'Sample Prescription', '1 mg', '2022-07-04 to 2022-07-04', 'wew'),
(4, 'Sample Patient Name 4', 'Sample Patient Address 4', 20, 'Male', 'Sample Patient Occupation', '2022-07-04', '60.1 kg', '1.1 Celcius', '1.1 MMHG', '1.1 BPM', '1.1 CPM', 'wew', 'wew', '2022-07-04 to 2022-07-04', 'Sample Probable Diagnosis', 'Sample Vaccine 1', '1 mL', 'Sample Prescription', '1 mg', '2022-07-04 to 2022-07-04', 'wew'),
(5, 'Sample Patient Name 5', 'Sample Patient Address', 1, 'Male', 'Sample Patient Occupation', '2022-07-04', '1.1 kg', '1.1 Celcius', '1.1 MMHG', '1.1 BPM', '1.1 CPM', 'wew', 'wew', '2022-07-04 to 2022-07-04', 'Sample Probable Diagnosis', 'Sample Vaccine 1', '12 mL', 'wew', '1 mg', '2022-07-04 to 2022-07-04', 'wew'),
(6, 'Sample Patient Name 6', 'Sample Patient Address', 1, 'Male', 'Sample Patient Occupation', '2022-07-04', '1.1 kg', '1.1 Celcius', '1.1 MMHG', '1.1 BPM', '1.1 CPM', 'wew', 'wew', '2022-07-04 to 2022-07-04', 'Sample Probable Diagnosis', 'Sample Vaccine 1', '1.1 mL', 'wew', '1.1 mg', '2022-07-04 to 2022-07-04', 'wew'),
(7, 'Sample Patient 7', 'Aplaya Pila Laguna', 22, 'Male', 'Student', '2022-07-04', '60 kg', '36.1 Celcius', '1 MMHG', '1 BPM', '1 CPM', 'sample complain', 'sample symptoms', '2022-07-04 to 2022-07-20', 'Sample Probable Diagnosis', 'Sample Vaccine 2', '2.1 mL', 'Sample Prescription', '1.1 mg', '2022-07-04 to 2022-07-19', 'Sample advised'),
(8, 'wew', 'wew', 1, 'Male', 'wew', '2022-07-04', '1 kg', '2 Celcius', '3 MMHG', '4 BPM', '5 CPM', '123', '', ' to ', '', 'Sample Vaccine 1', '12 mL', 'Sample Prescription 2', ' mg', '2022-07-04 to 2022-07-04', 'wew'),
(9, 'wew', 'wew', 1, 'Male', 'wew', '2022-07-04', '1 kg', '2 Celcius', '3 MMHG', '4 BPM', '5 CPM', 'awew', 'aweaw', '2022-07-04 to 2022-07-04', 'asdas', 'Sample Vaccine 1', '2 mL', 'asdas', '2 mg', '2022-07-04 to 2022-07-04', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `archive_id` int(11) NOT NULL,
  `immunization_category_id` int(11) NOT NULL,
  `immunization_id` int(11) NOT NULL,
  `vaccine_category_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `age` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `m_full_name` varchar(50) NOT NULL,
  `f_full_name` varchar(50) NOT NULL,
  `weight` varchar(15) NOT NULL,
  `height` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `vaccine` varchar(100) NOT NULL,
  `doses` int(11) NOT NULL,
  `doses_received` int(11) NOT NULL,
  `first_dose_schedule` varchar(50) NOT NULL,
  `second_dose_schedule` varchar(50) NOT NULL,
  `third_dose_schedule` varchar(50) NOT NULL,
  `remarks` varchar(30) NOT NULL,
  `date_recorded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`archive_id`, `immunization_category_id`, `immunization_id`, `vaccine_category_id`, `vaccine_id`, `first_name`, `middle_name`, `last_name`, `age`, `dob`, `pob`, `address`, `contact_no`, `m_full_name`, `f_full_name`, `weight`, `height`, `sex`, `vaccine`, `doses`, `doses_received`, `first_dose_schedule`, `second_dose_schedule`, `third_dose_schedule`, `remarks`, `date_recorded`) VALUES
(7, 1, 6, 1, 9, 'Sample', 'Infant', '15', '5 months old', '2022-07-14', 'Aplaya Pila Laguna', 'Sample Patient Address', '09657029069', 'Sample Name', 'Sample Name', '20 kg', '50 cm', 'Male', 'Polio Vaccine', 3, 1, '2022-07-14', '2022-07-15', '2022-07-30', 'Remarks', '2022-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `immunization`
--

CREATE TABLE `immunization` (
  `immunization_id` int(11) NOT NULL,
  `immunization_category_id` int(11) NOT NULL,
  `vaccine_category_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `age` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `m_full_name` varchar(50) NOT NULL,
  `f_full_name` varchar(50) NOT NULL,
  `weight` varchar(15) NOT NULL,
  `height` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `vaccine` varchar(80) NOT NULL,
  `doses` int(11) NOT NULL,
  `doses_received` int(11) NOT NULL,
  `first_dose_schedule` varchar(50) NOT NULL,
  `second_dose_schedule` varchar(50) NOT NULL,
  `third_dose_schedule` varchar(50) NOT NULL,
  `remarks` varchar(30) NOT NULL,
  `date_recorded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `immunization`
--

INSERT INTO `immunization` (`immunization_id`, `immunization_category_id`, `vaccine_category_id`, `vaccine_id`, `first_name`, `middle_name`, `last_name`, `age`, `dob`, `pob`, `address`, `contact_no`, `m_full_name`, `f_full_name`, `weight`, `height`, `sex`, `vaccine`, `doses`, `doses_received`, `first_dose_schedule`, `second_dose_schedule`, `third_dose_schedule`, `remarks`, `date_recorded`) VALUES
(2, 2, 2, 6, 'Sample', 'School Age', 'Chilren1', '8 years old', '2022-07-10', 'Aplaya Pila Laguna', 'Sample Patient Address', '09077609476', 'Sample Name', 'Sample Name', '40 kg', '123 cm', 'Male', 'Tetanus Diphtheria(TD)', 2, 2, '2022-07-10', '2022-07-31', 'Not Applicable', 'Sample Remarks', '2022-07-10'),
(3, 2, 2, 6, 'Sample', 'School Age', 'Chilren2', '11 years old', '2022-07-10', 'Aplaya Pila Laguna', 'Sample Patient Address', '2147483647', 'Sample Name', 'Sample Name', '40 kg', '145 cm', 'Female', 'Tetanus Diphtheria(TD)', 2, 2, '2022-07-10', '2022-07-15', 'Not Applicable', 'Sample Remarks', '2022-07-10'),
(4, 1, 1, 7, 'Sample', 'Infant', '2', '5 months old', '2022-07-10', 'Aplaya Pila Laguna', 'Sample Patient Address', '09077609476', 'Sample Name', 'Sample Name', '15 kg', '125 cm', 'Male', 'Oral Polio Vaccine (OPV)', 3, 2, '2022-07-10', '2022-07-31', '2022-07-31', 'Sample Remarks', '2022-07-10'),
(7, 1, 1, 9, 'Sample', 'Infant', '30', '5 months old', '2022-07-16', 'Aplaya Pila Laguna', 'Sample Patient Address', '09657029069', 'Sample Name', 'Sample Name', '15 kg', '60 cm', 'Male', 'Polio Vaccine', 3, 1, '2022-07-16', '2022-07-17', '', 'Done', '2022-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `immunization_category`
--

CREATE TABLE `immunization_category` (
  `immunization_category_id` int(11) NOT NULL,
  `immunization_category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `immunization_category`
--

INSERT INTO `immunization_category` (`immunization_category_id`, `immunization_category_name`) VALUES
(1, 'Infant'),
(2, 'School Aged Children'),
(3, 'Pregnant'),
(4, 'Adult'),
(5, 'Senior Citizen');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `dob` datetime DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(15) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `middle_name`, `last_name`, `dob`, `age`, `gender`, `user_name`, `password`, `profile_img`) VALUES
(1, 'Samples', 'Admin ', '1 ', '2022-07-02 11:34:00', 20, 'Male', 'admin1', '$2y$10$.QcA8syjUhdcolhttSgk.OZYMEQjn4sIUkSMr8g6Gxp6ro1Uo6GUe', '62c3cef7c8cc72.24222160.jpg'),
(2, 'Sample ', 'Nurse ', '1', '2022-07-30 11:34:00', 42, 'Female', 'nurse123', '$2y$10$T.i8U450/VvmdIv/LcN3EO79tXDg9Cu8vx28MFZTgSnWu6/BXt2Za', '62c169d9a9eec6.61706696.png'),
(11, 'sample', 'nurse', '10', '2022-07-05 15:15:00', 30, 'Female', 'nurse2', '$2y$10$8Vf/46ImqU96lUe627Ef3uF6U1p1CAhKFLgqfKp2aTiu.JkJCuRPi', '62c3e50e17d1f7.93744788.jpg'),
(12, 'Sample', 'Health Worker', '2', '2022-07-05 15:21:00', 3, 'Male', 'bhw2', '$2y$10$IdiBcfEMdGkanvy8oLgVyu7hUApffJcP6A5.D0zZFo1FKxM0h2yoG', '62c3e69774dc39.01042347.jpg'),
(14, 'Sample', 'Health Worker', '3', '2022-07-14 12:44:00', 20, 'Female', 'bhw3', '$2y$10$nCQugntTAFEmuMKnSJIh8OO9/pjEv3KwDDYWH/BWlY.wqxtPMAx2S', '62cf9f331dd644.49284248.jpg'),
(15, 'Sample', 'Nurse ', '1 ', '2022-07-16 19:32:00', 24, 'Female', 'nurse1', '$2y$10$4/woiYskIXRAdI4O6ETljOO55MxcAwZnw6WLXmpSMfFFgR7VbLMKm', '62d2a1fa07b4a0.96738321.jpg'),
(16, 'Sample', 'Health Worker', '1 ', '2022-07-16 19:36:00', 31, 'Female', 'bhw1', '$2y$10$gxkVPP3OB.TtgH6sRXYZd.KyvjTaeL9mFQFdQCFDakWX0ed3xQN5m', '62d2a2d2129bd8.69244185.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `user_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`user_category_id`, `user_id`, `user_type`) VALUES
(1, 1, 'Admin'),
(2, 2, 'Nurse/Midwife'),
(11, 11, 'Nurse/Midwife'),
(12, 12, 'Barangay Health Worker'),
(14, 14, 'Barangay Health Worker'),
(15, 15, 'Nurse/Midwife'),
(16, 16, 'Barangay Health Worker');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `vaccine_id` int(11) NOT NULL,
  `vaccine_category_id` int(11) NOT NULL,
  `vaccine_name` varchar(80) NOT NULL,
  `doses` int(11) NOT NULL,
  `manufactured_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`vaccine_id`, `vaccine_category_id`, `vaccine_name`, `doses`, `manufactured_date`, `expiration_date`, `description`) VALUES
(1, 1, 'BCG Vaccine', 1, '2022-07-05', '2022-07-07', 'Sample Description'),
(2, 5, 'Influenza Vaccine', 1, '2022-07-05', '2022-07-06', 'Sample Description'),
(3, 1, 'Hepatitis B Vaccine', 1, '2022-07-09', '2022-07-09', 'Sample Remarks'),
(5, 4, 'Sample Vaccine for Adult', 1, '2022-07-09', '2022-07-10', 'Sample Description'),
(6, 2, 'Tetanus Diphtheria(TD)', 2, '2022-07-09', '2022-07-09', 'Sample Description'),
(8, 1, 'Pentavalent Vaccine (DPT-Hep B-HIDB)', 3, '2022-07-12', '2022-07-27', 'Vaccine for infant'),
(9, 1, 'Polio Vaccine', 3, '2022-07-14', '2022-07-31', 'Sample Descriptions');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_category`
--

CREATE TABLE `vaccine_category` (
  `vaccine_category_id` int(11) NOT NULL,
  `vaccine_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_category`
--

INSERT INTO `vaccine_category` (`vaccine_category_id`, `vaccine_category_name`) VALUES
(1, 'Infant'),
(2, 'School Aged Children'),
(3, 'Pregnant'),
(4, 'Adult'),
(5, 'Senior Citizen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adult_immunization`
--
ALTER TABLE `adult_immunization`
  ADD PRIMARY KEY (`adult_immunization_id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`archive_id`);

--
-- Indexes for table `immunization`
--
ALTER TABLE `immunization`
  ADD PRIMARY KEY (`immunization_id`);

--
-- Indexes for table `immunization_category`
--
ALTER TABLE `immunization_category`
  ADD PRIMARY KEY (`immunization_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_category`
--
ALTER TABLE `user_category`
  ADD PRIMARY KEY (`user_category_id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`vaccine_id`);

--
-- Indexes for table `vaccine_category`
--
ALTER TABLE `vaccine_category`
  ADD PRIMARY KEY (`vaccine_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adult_immunization`
--
ALTER TABLE `adult_immunization`
  MODIFY `adult_immunization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `archive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `immunization`
--
ALTER TABLE `immunization`
  MODIFY `immunization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `immunization_category`
--
ALTER TABLE `immunization_category`
  MODIFY `immunization_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_category`
--
ALTER TABLE `user_category`
  MODIFY `user_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vaccine_category`
--
ALTER TABLE `vaccine_category`
  MODIFY `vaccine_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
