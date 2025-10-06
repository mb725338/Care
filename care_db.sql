-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2025 at 06:15 PM
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
-- Database: `care_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `status` enum('pending','completed','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `appointment_date`, `appointment_time`, `reason`, `status`, `created_at`) VALUES
(1, 2, 7, '2025-09-30', '13:00:00', 'regular checkup', 'pending', '2025-09-25 04:52:40'),
(2, 2, 6, '2025-10-22', '14:00:00', 'no specific reason', 'pending', '2025-09-25 05:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(9, 'Hyderabad'),
(3, 'Islamabad'),
(1, 'Karachi'),
(2, 'Lahore'),
(5, 'Multan'),
(6, 'Peshawar'),
(7, 'Quetta'),
(8, 'Sialkot');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `request_type` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('new','read') NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `request_type`, `message`, `created_at`, `status`) VALUES
(1, 'Neha Saleem', 'nehasaleem089@gmail.com', '+9231515678756', 'general', 'hey how to see your doctor', '2025-09-28 08:01:31', 'new'),
(5, 'Neha Saleem', 'nehasaleem089@gmail.com', '+9231515678756', 'general', 'blah blah', '2025-09-28 08:37:15', 'read'),
(6, '574574', 'sarimmughal.2007@gmail.com', 'gfh', 'donation', 'klk', '2025-09-29 10:32:39', 'new'),
(7, '574574', 'sarimmughal.2007@gmail.com', 'gfh', 'donation', 'klk', '2025-09-29 10:39:25', 'new'),
(8, '132', 'abc@gmail.com', 'nbfgh', 'support', 'ghg', '2025-09-29 10:40:37', 'new'),
(9, 'abc', 'abc@gmail.com', '122323', 'support', 'jykj', '2025-09-29 11:46:36', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `symptoms` text DEFAULT NULL,
  `prescription` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `description`, `symptoms`, `prescription`, `created_at`, `updated_at`) VALUES
(1, 'Diabetes', 'A chronic condition affecting blood sugar regulation.', 'Frequent urination, excessive thirst, fatigue', 'Insulin therapy, diet control, exercise', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(2, 'Hypertension', 'High blood pressure affecting arteries.', 'Headache, dizziness, nosebleeds', 'Lifestyle changes, medications', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(3, 'Asthma', 'Inflammation and narrowing of airways.', 'Shortness of breath, wheezing, coughing', 'Inhalers, avoiding triggers, medications', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(4, 'Coronary Artery Disease', 'Damage or disease in the heart’s arteries.', 'Chest pain, shortness of breath, fatigue', 'Medications, angioplasty, lifestyle changes', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(5, 'Stroke', 'Interruption of blood supply to the brain.', 'Sudden numbness, confusion, difficulty speaking', 'Emergency care, rehabilitation, medications', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(6, 'Chronic Kidney Disease', 'Gradual loss of kidney function.', 'Fatigue, swelling, nausea', 'Diet, medications, dialysis', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(7, 'Alzheimer\'s Disease', 'Progressive brain disorder affecting memory.', 'Memory loss, confusion, difficulty completing tasks', 'Medications, supportive care', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(8, 'Parkinson\'s Disease', 'Nervous system disorder affecting movement.', 'Tremors, stiffness, slow movement', 'Medications, physical therapy', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(9, 'Depression', 'Mood disorder causing persistent sadness.', 'Low mood, loss of interest, fatigue', 'Therapy, medications, lifestyle changes', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(10, 'Anxiety Disorder', 'Excessive worry affecting daily life.', 'Nervousness, restlessness, rapid heartbeat', 'Therapy, medications', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(11, 'Osteoarthritis', 'Joint inflammation due to cartilage breakdown.', 'Joint pain, stiffness, swelling', 'Pain relievers, physical therapy, joint injections', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(12, 'Rheumatoid Arthritis', 'Autoimmune disorder affecting joints.', 'Joint pain, swelling, stiffness', 'Medications, physical therapy, surgery', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(13, 'Tuberculosis', 'Infectious disease affecting lungs.', 'Cough, weight loss, fever', 'Antibiotics for several months', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(14, 'Pneumonia', 'Lung infection caused by bacteria or virus.', 'Cough, fever, difficulty breathing', 'Antibiotics, rest, fluids', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(15, 'Hepatitis B', 'Liver infection caused by hepatitis B virus.', 'Fatigue, jaundice, abdominal pain', 'Antiviral medications, vaccination', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(16, 'Hepatitis C', 'Liver infection caused by hepatitis C virus.', 'Fatigue, jaundice, nausea', 'Antiviral medications', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(17, 'Influenza', 'Viral infection affecting respiratory system.', 'Fever, cough, sore throat, body aches', 'Rest, fluids, antiviral drugs', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(18, 'Malaria', 'Parasitic infection transmitted by mosquitoes.', 'Fever, chills, sweating', 'Antimalarial medications', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(19, 'Dengue Fever', 'Viral infection transmitted by mosquitoes.', 'High fever, headache, muscle pain', 'Supportive care, hydration, pain relievers', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(20, 'COVID-19', 'Respiratory illness caused by SARS-CoV-2 virus.', 'Fever, cough, fatigue, loss of taste/smell', 'Supportive care, oxygen therapy, antiviral drugs', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(21, 'Migraine', 'Neurological condition causing severe headache.', 'Throbbing headache, nausea, sensitivity to light', 'Pain relievers, lifestyle changes, preventive medications', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(22, 'Epilepsy', 'Neurological disorder causing seizures.', 'Seizures, loss of consciousness, confusion', 'Anticonvulsant medications, lifestyle management', '2025-09-25 05:49:19', '2025-09-25 05:49:19'),
(23, 'Gastroenteritis', 'Inflammation of stomach and intestines.', 'Diarrhea, vomiting, abdominal pain', 'Hydration, rest, medications for symptoms', '2025-09-25 05:49:19', '2025-09-25 05:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `license_no` varchar(100) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `fees` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `specialization`, `license_no`, `phone`, `address`, `city_id`, `bio`, `image`, `fees`) VALUES
(5, 7, 'Cardiologist', 'LIC-12345', '0300-9876543', 'Karachi, Pakistan', 1, 'Experienced cardiologist', 'default.jpg', 0.00),
(6, 9, 'neurosurgeon', 'LIC-98765', '0312-4567890', 'Lahore, Pakistan', NULL, 'Experienced neurosurgeon', 'default.jpg', 3000.00),
(7, 10, 'general physician', NULL, '033188288917', 'nazimabad', NULL, NULL, 'default.jpg', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_availability`
--

CREATE TABLE `doctor_availability` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `day_of_week` tinyint(4) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_availability`
--

INSERT INTO `doctor_availability` (`id`, `doctor_id`, `day`, `day_of_week`, `start_time`, `end_time`, `date`) VALUES
(6, 6, 'Monday', NULL, '09:00:00', '15:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `journey`
--

CREATE TABLE `journey` (
  `id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journey`
--

INSERT INTO `journey` (`id`, `year`, `description`, `created_at`) VALUES
(1, '2010', 'CARE was founded with a single clinic focused on primary care services.', '2025-09-29 06:15:03'),
(2, '2014', 'Expanded to include specialist services and opened three new locations.', '2025-09-29 06:15:03'),
(3, '2018', 'Launched our digital platform, enabling online appointments and telemedicine services.', '2025-09-29 06:15:03'),
(4, '2022', 'Reached milestone of serving over 50,000 patients with a network of 1,000+ healthcare providers.', '2025-09-29 06:15:03'),
(5, '2023', 'Introduced AI-powered health recommendations and personalized care plans.', '2025-09-29 06:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `leadership`
--

CREATE TABLE `leadership` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leadership`
--

INSERT INTO `leadership` (`id`, `name`, `role`, `description`, `image`, `created_at`) VALUES
(2, 'Moin Khan', 'Chief Executive Officer', 'Technology entrepreneur with a passion for making healthcare more accessible through innovation.', 'https://placehold.co/120x120/0ea5e9/white?text=MK', '2025-09-29 06:15:03'),
(3, 'Ahmed ', 'Chief Operations Officer', 'Operations expert with a decade of experience in healthcare management and patient experience optimization.', 'https://placehold.co/120x120/8b5cf6/white?text=AP', '2025-09-29 06:15:03'),
(4, 'DR.Sarah ', 'Chief Medical Officer', 'Board certfied physician with over 15 years of experience in internal medicine and helth care administration', 'https://placehold.co/120x120/10b981/white?text=DR', '2025-09-29 06:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `diagnosis` text NOT NULL,
  `prescription` text NOT NULL,
  `visit_date` datetime DEFAULT current_timestamp(),
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_records`
--

INSERT INTO `medical_records` (`id`, `patient_id`, `doctor_id`, `diagnosis`, `prescription`, `visit_date`, `notes`) VALUES
(1, 8, 9, 'Fever & cough', 'Paracetamol (Acetaminophen)\r\nCough Syrup (Dextromethorphan + Guaifenesin)', '2025-09-22 23:24:35', 'Rest properly'),
(3, 2, 6, 'Fever & cough', 'Paracetamol (Acetaminophen) – 500 mg tablet\r\n\r\nTake 1 tablet every 6–8 hours if fever >100°F\r\n\r\n(Do not exceed 4g per day)\r\nough Syrup (Dextromethorphan + Guaifenesin)\r\n\r\n10 ml every 8 hours as needed\r\n\r\nIf cough is dry → use antitussive (e.g., Dextromethorphan).\r\n\r\nIf cough is with phlegm → use expectorant (e.g., Ambroxol / Guaifenesin).', '2025-09-22 23:40:37', 'Drink plenty of warm fluids\r\n\r\nRest properly\r\n\r\nSteam inhalation (for cough/congestion)');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `sender` enum('patient','doctor') NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `patient_id`, `doctor_id`, `sender`, `message`, `created_at`) VALUES
(1, 2, 7, 'patient', 'hey', '2025-09-25 20:36:09'),
(2, 2, 6, 'patient', 'hey', '2025-09-26 00:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `mission_vision`
--

CREATE TABLE `mission_vision` (
  `id` int(11) NOT NULL,
  `type` enum('mission','vision') NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mission_vision`
--

INSERT INTO `mission_vision` (`id`, `type`, `title`, `description`, `icon`, `created_at`) VALUES
(1, 'mission', 'Our Mission', 'To deliver world-class healthcare with empathy and efficiency, empowering individuals to live healthier lives.', 'bi-bullseye', '2025-09-29 06:15:02'),
(2, 'vision', 'Our Vision', 'To be the most trusted digital healthcare platform, improving lives through innovation and accessibility.', 'bi-eye', '2025-09-29 06:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `news_articles`
--

CREATE TABLE `news_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `full_content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_articles`
--

INSERT INTO `news_articles` (`id`, `title`, `short_desc`, `full_content`, `image`, `created_at`) VALUES
(1, 'CARE Launches New Telemedicine Service', 'Patients can now consult doctors online.', 'CARE is proud to announce the launch of its telemedicine platform, allowing patients to consult doctors remotely using video calls and online chat features. This service aims to provide convenience and faster medical advice.', 'news1.jpg', '2025-09-25 20:22:32'),
(2, 'Health Tips for Winter', 'Stay healthy during the cold season.', 'As winter approaches, it is important to take care of your health. Remember to keep warm, eat nutritious foods, and get regular exercise. CARE experts provide tips to strengthen your immunity and stay safe during the cold months.', 'news2.jpg', '2025-09-25 20:22:32'),
(3, 'Flu Vaccination Campaign 2025', 'Protect yourself against seasonal flu.', 'CARE has started its annual flu vaccination campaign. All patients are encouraged to get vaccinated to prevent flu infections. Vaccinations are available at all CARE clinics nationwide.', 'news3.jpg', '2025-09-25 20:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `age`, `dob`, `gender`, `phone`, `address`, `created_at`, `city_id`) VALUES
(1, 3, 31, '1995-07-15', 'male', '0321-1111111', 'North Nazimabad, Karachi', '2025-09-11 07:20:21', 1),
(2, 8, 19, NULL, 'female', '315', 'N_1039 sector 7d surjani town karachi\r\n', '2025-09-11 07:21:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `link` varchar(255) DEFAULT '#',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image_url`, `icon`, `link`, `created_at`) VALUES
(16, 'Anesthesia', 'Safe and effective anesthesia services for surgical and medical procedures.', 'https://medicarehospital.pk/wp-content/uploads/2022/10/09-1.png', 'bi bi-capsule-pill fs-5', 'https://medicarehospital.pk/medical-services/anesthesia/', '2025-09-27 10:12:11'),
(17, 'Cardiology', 'Comprehensive heart care with advanced diagnostic and treatment options.', 'https://medicarehospital.pk/wp-content/uploads/2022/10/CARDIOLOGY.jpg', 'bi bi-heart-pulse fs-5', 'https://medicarehospital.pk/medical-services/cardiology/', '2025-09-27 10:13:23'),
(18, 'Clinical Nutrition', 'Personalized diet plans and expert guidance for a healthier lifestyle.', 'https://medicarehospital.pk/wp-content/uploads/2022/10/Diet-2048x1536.jpg', 'bi bi-egg-fried fs-5', 'https://medicarehospital.pk/medical-services/clinical-nutrition-dietetics/', '2025-09-27 10:14:49'),
(19, 'Critical Care', '24/7 intensive care with advanced monitoring and life support facilities.', 'https://medicarehospital.pk/wp-content/uploads/2022/10/DayCare-1.png', 'bi bi-arrow-right', 'https://medicarehospital.pk/medical-services/critical-care/', '2025-09-27 10:16:19'),
(20, 'Day Care', 'Convenient day care procedures with quick admission and discharge.', 'https://medicarehospital.pk/wp-content/uploads/2022/10/DAY-CARE.jpg', 'bi bi-calendar-heart fs-5', 'https://medicarehospital.pk/medical-services/day-care/', '2025-09-27 10:17:09'),
(21, 'Dental Surgery', 'Specialized oral and maxillofacial procedures for dental health and aesthetics.', 'https://medicarehospital.pk/wp-content/uploads/2022/10/DLServicesImage.png', 'bi bi-tooth fs-5', 'https://medicarehospital.pk/medical-services/dental-surgery/', '2025-09-27 10:18:59'),
(22, 'Dermatology', 'Advanced skin care treatments for conditions and cosmetic enhancements', 'https://medicarehospital.pk/wp-content/uploads/2022/10/2101.i032.005_isometric_cosmetology_illustration-2048x1418.jpg', 'bi bi-droplet-half fs-5', 'https://medicarehospital.pk/medical-services/dermatology-cosmetology/', '2025-09-27 10:20:09'),
(23, 'E.N.T', 'Specialized care for ear, nose, and throat conditions and surgeries', 'https://medicarehospital.pk/wp-content/uploads/2022/10/ENTServicesImage.png', 'bi bi-ear fs-5', 'https://medicarehospital.pk/medical-services/e-n-t/', '2025-09-27 10:21:37'),
(24, 'Emergency Care', '24/7 emergency response with rapid treatment and trauma care facilities.', 'https://medicarehospital.pk/wp-content/uploads/2022/10/08.png', 'bi bi-ambulance fs-5', 'https://medicarehospital.pk/medical-services/emergency-care/', '2025-09-27 10:22:33'),
(25, 'Endocrinology', 'Comprehensive care for hormonal and metabolic disorders like diabetes.', 'https://medicarehospital.pk/wp-content/uploads/2022/10/endo-banner.jpg', 'bi bi-eyedropper fs-5', 'https://medicarehospital.pk/medical-services/endocrinology/', '2025-09-27 10:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(255) DEFAULT '',
  `site_description` text DEFAULT NULL,
  `clinic_name` varchar(255) DEFAULT '',
  `clinic_email` varchar(255) DEFAULT '',
  `clinic_phone` varchar(50) DEFAULT '',
  `clinic_address` varchar(255) DEFAULT '',
  `facebook` varchar(255) DEFAULT '',
  `twitter` varchar(255) DEFAULT '',
  `instagram` varchar(255) DEFAULT '',
  `linkedin` varchar(255) DEFAULT '',
  `whatsapp` varchar(50) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_description`, `clinic_name`, `clinic_email`, `clinic_phone`, `clinic_address`, `facebook`, `twitter`, `instagram`, `linkedin`, `whatsapp`) VALUES
(1, 'CARE - Your Health', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `value` int(11) NOT NULL,
  `extra_label` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`id`, `label`, `value`, `extra_label`, `created_at`) VALUES
(1, 'Patients Cared For', 5000, '+', '2025-09-29 08:57:24'),
(2, 'Doctors Onboard', 1000, NULL, '2025-09-29 08:57:24'),
(3, 'Cities Served', 100, NULL, '2025-09-29 08:57:24'),
(5, 'Hours Booking Appointment ', 24, NULL, '2025-09-29 09:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` enum('recovery','surgery','pediatrics','cardiology') NOT NULL,
  `excerpt` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `category`, `excerpt`, `content`, `image`, `created_at`) VALUES
(14, 'Beating the Odds', 'recovery', 'Battling a rare neurological disorder, John fought his way back to strength.', '', 'uploads/1759330522_image8.jpg', '2025-10-01 14:55:22'),
(15, 'Saving Athlete’s Career', 'surgery', 'At Care Hospital, expert surgeons and specialists restored an athlete’s peak performance.', '', 'uploads/1759332821_Image1.jpg', '2025-10-01 15:33:41'),
(16, 'Little Fighter', 'pediatrics', 'The Little Fighter’ Leo Martinez faced a crushing injury that tested his will to fight.', '', 'uploads/1759333351_image9.jpg', '2025-10-01 15:42:31'),
(17, 'Cardiac Miracle', 'cardiology', 'Robert survived a massive heart attack and reclaimed his life through expert cardiac care.', '', 'uploads/1759333562_Image4.jpg', '2025-10-01 15:46:02'),
(18, 'Rehabilitation Success', 'recovery', 'Sarah overcame a life-altering stroke and regained independence through dedicated rehabilitation support.', '', 'uploads/1759333720_image7.jpg', '2025-10-01 15:48:40'),
(19, 'Complex Spine Surgery', 'surgery', 'David found lasting relief from severe back pain through a successful complex spine surgery treatment.', '', 'uploads/1759333834_Image2.jpg', '2025-10-01 15:50:34'),
(20, 'Heart Transplant Journey', 'cardiology', 'Michael embraced a hopeful new beginning after receiving a successful heart transplant surgery.', '', 'uploads/1759333972_Image5.jpg', '2025-10-01 15:52:52'),
(21, 'Asthma Fighter', 'pediatrics', 'James battled asthma bravely, managing symptoms daily and living stronger through proper treatment and care.', '', 'uploads/1759334057_image10.jpg', '2025-10-01 15:54:17'),
(22, 'COVID Survivor', 'recovery', 'Mark fought long COVID complications bravely, slowly regaining strength and hope through constant determination.', '', 'uploads/1759334146_image11.jpg', '2025-10-01 15:55:46'),
(23, 'Kidney Transplant', 'surgery', 'Aiden received a life-changing kidney transplant, gaining renewed strength and a brighter future ahead.', '', 'uploads/1759334270_Image3.jpg', '2025-10-01 15:57:50'),
(24, 'Brighter Smiles', 'pediatrics', 'Emily underwent cleft lip surgery, gaining confidence and sharing brighter smiles with everyone around.', '', 'uploads/1759334376_image12.jpg', '2025-10-01 15:59:36'),
(25, 'Stronger Than Ever', 'cardiology', 'Daniel overcame heart blockage through successful angioplasty, returning stronger than ever with renewed energy.', '', 'uploads/1759334509_Image6.jpg', '2025-10-01 16:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','doctor','patient') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `profile_pic`) VALUES
(0, 'Sarim', 'sarimmughal.2007@gmail.com', '$2y$10$wc6dhWv5j5WJfo7XqcWq5OOtUa.IwTqe7P/gFBh6cl1.ZRyJXdAky', 'patient', '2025-09-29 10:05:11', NULL),
(3, 'Ali Raza', 'patient@care.com', '$2y$10$0tYw3uR6YceUC6Ff0KoiOeKkC6HpY4KfStmF4cx7L/9lWcgY7zX9W', 'patient', '2025-09-08 22:47:17', NULL),
(4, 'Care Admin', 'admin@care.com', '$2y$10$b2UudrzbIVgySmuV3vzRI.79t8E3c5V/zo2S9kmymNrNC5rIwGcNq', 'admin', '2025-09-08 23:13:44', '../assets/uploads/admin_4_b65a569ea5c69e9d.jpg'),
(7, 'Dr. Sarah Khan', 'doctor@care.com', '$2y$10$uFQ9b.X3Sx.Yk3wR/VzH2uC2p6hv3JQ4ZqJzvQHxE1Lx5LVZ8uO7K', 'doctor', '2025-09-08 23:42:20', NULL),
(8, 'Neha Saleem', 'nehasaleem089@gmail.com', '$2y$10$08LG1OS1fIHeKMjEYwRgEuR/tnftjOJ0WM7YKJLy7MEqVLbUb6U1O', 'patient', '2025-09-08 23:52:07', 'assets/uploads/user_8_1758791051.jpg'),
(9, 'Rabia Saleem', 'rabia17@care.com', '$2y$10$m8Zb/5dRULHsAwefhZIQ8udDa7c3yc/hZyVUc5HYlxBCXfTZwlO9m', 'doctor', '2025-09-09 01:59:45', '../assets/uploads/doctor_9_68d99b7834088.jpg'),
(10, 'urooba saleem', 'urooba08@care.com', '$2y$10$4Ee9kKpu1bqBD7uD7FaA0.wtaFcZFXKFHc4gC8ny0d87PMDxhOe6y', 'doctor', '2025-09-21 09:47:31', '../assets/uploads/doctor_10_68d999fce955c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `values_section`
--

CREATE TABLE `values_section` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `values_section`
--

INSERT INTO `values_section` (`id`, `title`, `description`, `icon`, `created_at`) VALUES
(1, 'Compassion', 'We treat every patient with empathy, kindness, and respect, understanding that healthcare is personal.', 'bi-heart-fill', '2025-09-29 06:15:02'),
(2, 'Excellence', 'We strive for the highest standards in everything we do, from patient care to technological innovation.', 'bi-shield-check', '2025-09-29 06:15:02'),
(3, 'Innovation', 'We continuously seek new ways to improve healthcare delivery and patient experiences.', 'bi-lightbulb', '2025-09-29 06:15:02'),
(4, 'Collaboration', 'We believe that the best outcomes come from working together with patients, families, and healthcare providers.', 'bi-people-fill', '2025-09-29 06:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `who_we_are`
--

CREATE TABLE `who_we_are` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `who_we_are`
--

INSERT INTO `who_we_are` (`id`, `title`, `description`, `icon`, `created_at`) VALUES
(1, 'Our Story', 'Founded in 2010, CARE began with a simple mission: to make quality healthcare accessible to everyone. What started as a single clinic has now grown into a comprehensive healthcare platform serving thousands of patients nationwide.', 'bi-heart-pulse', '2025-09-29 06:15:02'),
(4, 'Our Team ', 'Our team consists of dedicated healthcare professionals, technologists, and support staff who work together to deliver exceptional care and service to our patients and partner providers.', 'bi bi-people fs-4', '2025-09-29 06:48:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_ibfk_1` (`patient_id`),
  ADD KEY `appointments_ibfk_2` (`doctor_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `doctor_availability`
--
ALTER TABLE `doctor_availability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_doctor` (`doctor_id`);

--
-- Indexes for table `journey`
--
ALTER TABLE `journey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leadership`
--
ALTER TABLE `leadership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `mission_vision`
--
ALTER TABLE `mission_vision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_articles`
--
ALTER TABLE `news_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `values_section`
--
ALTER TABLE `values_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `who_we_are`
--
ALTER TABLE `who_we_are`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor_availability`
--
ALTER TABLE `doctor_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `journey`
--
ALTER TABLE `journey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leadership`
--
ALTER TABLE `leadership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mission_vision`
--
ALTER TABLE `mission_vision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `values_section`
--
ALTER TABLE `values_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `who_we_are`
--
ALTER TABLE `who_we_are`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
