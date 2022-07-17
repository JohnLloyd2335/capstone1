

CREATE TABLE `adult_immunization` (
  `adult_immunization_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `advised` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`adult_immunization_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;


INSERT INTO adult_immunization VALUES
("1","Sample Patient Name","Sample Patient Address","20","Male","Sample Patient Occupation","2022-07-04","60 kg","36.1 Celcius","1 MMHG","1 BPM"," CPM","Sample Chief Complain","Sample Sign and Symptoms","2022-07-04 to 2022-07-05","Sample Probable Diagnosis","Sample Vaccine 1","99 mL","Sample Prescription","99 mg","2022-07-04 to 2022-07-05","Sample Advised"),
("2","Sample Patient Name 2","Sample Patient Address 2","20","Female","Sample Patient Occupation 2","2022-07-04","1 kg","1 Celcius","1 MMHG","1 BPM","1 CPM","wew","wew","2022-07-04 to 2022-07-04","Sample Probable Diagnosis 2","Sample Vaccine 2","99 mg","Sample Prescription 2","99 mL","2022-07-04 to 2022-07-04","wew"),
("3","Sample Patient Name 3","Sample Patient Address","20","Male","Sample Patient Occupation","2022-07-04","1 kg","1 Celcius","1 MMHG","1 BPM","1 CPM","wew","wew","2022-07-04 to 2022-07-04","Sample Probable Diagnosis","Sample Vaccine 1","1 mL","Sample Prescription","1 mg","2022-07-04 to 2022-07-04","wew"),
("4","Sample Patient Name 4","Sample Patient Address 4","20","Male","Sample Patient Occupation","2022-07-04","60.1 kg","1.1 Celcius","1.1 MMHG","1.1 BPM","1.1 CPM","wew","wew","2022-07-04 to 2022-07-04","Sample Probable Diagnosis","Sample Vaccine 1","1 mL","Sample Prescription","1 mg","2022-07-04 to 2022-07-04","wew"),
("5","Sample Patient Name 5","Sample Patient Address","1","Male","Sample Patient Occupation","2022-07-04","1.1 kg","1.1 Celcius","1.1 MMHG","1.1 BPM","1.1 CPM","wew","wew","2022-07-04 to 2022-07-04","Sample Probable Diagnosis","Sample Vaccine 1","12 mL","wew","1 mg","2022-07-04 to 2022-07-04","wew"),
("6","Sample Patient Name 6","Sample Patient Address","1","Male","Sample Patient Occupation","2022-07-04","1.1 kg","1.1 Celcius","1.1 MMHG","1.1 BPM","1.1 CPM","wew","wew","2022-07-04 to 2022-07-04","Sample Probable Diagnosis","Sample Vaccine 1","1.1 mL","wew","1.1 mg","2022-07-04 to 2022-07-04","wew"),
("7","Sample Patient 7","Aplaya Pila Laguna","22","Male","Student","2022-07-04","60 kg","36.1 Celcius","1 MMHG","1 BPM","1 CPM","sample complain","sample symptoms","2022-07-04 to 2022-07-20","Sample Probable Diagnosis","Sample Vaccine 2","2.1 mL","Sample Prescription","1.1 mg","2022-07-04 to 2022-07-19","Sample advised"),
("8","wew","wew","1","Male","wew","2022-07-04","1 kg","2 Celcius","3 MMHG","4 BPM","5 CPM","123",""," to ","","Sample Vaccine 1","12 mL","Sample Prescription 2"," mg","2022-07-04 to 2022-07-04","wew"),
("9","wew","wew","1","Male","wew","2022-07-04","1 kg","2 Celcius","3 MMHG","4 BPM","5 CPM","awew","aweaw","2022-07-04 to 2022-07-04","asdas","Sample Vaccine 1","2 mL","asdas","2 mg","2022-07-04 to 2022-07-04","asdas");




CREATE TABLE `archive` (
  `archive_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `contact_no` int(11) NOT NULL,
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
  `date_recorded` date NOT NULL,
  PRIMARY KEY (`archive_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;






CREATE TABLE `immunization` (
  `immunization_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `contact_no` int(11) NOT NULL,
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
  `date_recorded` date NOT NULL,
  PRIMARY KEY (`immunization_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;


INSERT INTO immunization VALUES
("2","2","2","6","Sample","School Age","Chilren1","10 years old","2022-07-10","Aplaya Pila Laguna","Sample Patient Address","123456789","Sample Name","Sample Name","40 kg","123 cm","Male","Tetanus Diphtheria(TD)","2","1","2022-07-10","2022-07-31","Not Applicable","Sample Remarks","2022-07-10"),
("3","2","2","6","Sample","School Age","Chilren2","11 years old","2022-07-10","Aplaya Pila Laguna","Sample Patient Address","2147483647","Sample Name","Sample Name","40 kg","145 cm","Female","Tetanus Diphtheria(TD)","2","2","2022-07-10","2022-07-15","Not Applicable","Sample Remarks","2022-07-10"),
("4","1","1","7","Sample","Infant","2","5 months old","2022-07-10","Aplaya Pila Laguna","Sample Patient Address","2147483647","Sample Name","Sample Name","15 kg","125 cm","Male","Oral Polio Vaccine (OPV)","3","2","2022-07-10","2022-07-31","2022-08-01","Sample Remarks","2022-07-10");




CREATE TABLE `immunization_category` (
  `immunization_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `immunization_category_name` varchar(30) NOT NULL,
  PRIMARY KEY (`immunization_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;


INSERT INTO immunization_category VALUES
("1","Infant"),
("2","School Aged Children"),
("3","Pregnant"),
("4","Adult"),
("5","Senior Citizen");




CREATE TABLE `user_category` (
  `user_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  PRIMARY KEY (`user_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;


INSERT INTO user_category VALUES
("1","1","Admin"),
("2","2","Nurse/Midwife"),
("11","11","Nurse/Midwife"),
("12","12","Barangay Health Worker");




CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `dob` datetime DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(15) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;


INSERT INTO users VALUES
("1","Sample","Admin ","1 ","2022-07-02 11:34:00","20","Male","admin1","$2y$10$EpxcgF43yfwtCMcoHPr73.yadaUrG.krCt.gEU5B1wdNBXRREu94C","62c3cef7c8cc72.24222160.jpg"),
("2","Sample ","Nurse ","1","2022-07-30 11:34:00","42","Female","nurse1","$2y$10$r.nz5ck117Rad6Uhe3ImIO1p3oMgldtq8ZfsGVt7BAfgZ3w0wFv62","62c169d9a9eec6.61706696.png"),
("11","sample ","nurse","10","2022-07-05 15:15:00","30","Female","nurse2","$2y$10$zwov0oPwMsA3NiR0MJqWYed8SV8lLP4v68/ErnEkDSc66rVuhp2ZG","62c3e50e17d1f7.93744788.jpg"),
("12","Sample","Health Worker","2","2022-07-05 15:21:00","3","Male","bhw2","$2y$10$IuvYCtgK4DhHPD88x..MRur9vuvY8r1B4eLue1d2fABAw/xf33vye","62c3e69774dc39.01042347.jpg");




CREATE TABLE `vaccine` (
  `vaccine_id` int(11) NOT NULL AUTO_INCREMENT,
  `vaccine_category_id` int(11) NOT NULL,
  `vaccine_name` varchar(80) NOT NULL,
  `doses` int(11) NOT NULL,
  `manufactured_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`vaccine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


INSERT INTO vaccine VALUES
("1","1","BCG Vaccine","1","2022-07-05","2022-07-07","Sample Description"),
("2","5","Influenza Vaccine","1","2022-07-05","2022-07-06","Sample Description"),
("3","1","Hepatitis B Vaccine","1","2022-07-09","2022-07-09","Sample Remarks"),
("4","3","Sample Vaccine for Pregnant","1","2022-07-09","2022-07-09","Sample Description"),
("5","4","Sample Vaccine for Adult","1","2022-07-09","2022-07-10","Sample Description"),
("6","2","Tetanus Diphtheria(TD)","2","2022-07-09","2022-07-09","Sample Description"),
("7","1","Oral Polio Vaccine (OPV)","3","2022-07-10","2022-07-10","Sample Description"),
("8","1","Pentavalent Vaccine (DPT-Hep B-HIDB)","3","2022-07-12","2022-07-27","Vaccine for infant");




CREATE TABLE `vaccine_category` (
  `vaccine_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `vaccine_category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`vaccine_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;


INSERT INTO vaccine_category VALUES
("1","Infant"),
("2","School Aged Children"),
("3","Pregnant"),
("4","Adult"),
("5","Senior Citizen");


