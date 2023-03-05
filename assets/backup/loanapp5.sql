#
# TABLE STRUCTURE FOR: borrowers
#

DROP TABLE IF EXISTS `borrowers`;

CREATE TABLE `borrowers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `employer_address` text,
  `spouse_name` varchar(100) DEFAULT NULL,
  `spouse_occupation` varchar(50) DEFAULT NULL,
  `spouse_em_address` text,
  `address` text,
  `avatar` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO `borrowers` (`id`, `name`, `gender`, `birthdate`, `number`, `occupation`, `employer_address`, `spouse_name`, `spouse_occupation`, `spouse_em_address`, `address`, `avatar`) VALUES (4, 'Vince Cab I', 'Male', '1985-10-31', '09094116721', 'Teacher', 'San Jose Antique', 'Wenlove', 'None', 'N/a', 'San Jose Antique', NULL);
INSERT INTO `borrowers` (`id`, `name`, `gender`, `birthdate`, `number`, `occupation`, `employer_address`, `spouse_name`, `spouse_occupation`, `spouse_em_address`, `address`, `avatar`) VALUES (5, 'Vinz Cab 1', 'Male', '1988-03-01', '09186705612', 'Teacher', 'San Jose Antique', 'Wenlove', 'None', 'NA', 'San Jose Antique', NULL);
INSERT INTO `borrowers` (`id`, `name`, `gender`, `birthdate`, `number`, `occupation`, `employer_address`, `spouse_name`, `spouse_occupation`, `spouse_em_address`, `address`, `avatar`) VALUES (6, 'Mary Erin Aquino', 'Femail', '1986-12-02', '09178909777', 'Bank Employee', 'San Jose Antique', 'none', 'none', 'n/a', 'n/a', NULL);
INSERT INTO `borrowers` (`id`, `name`, `gender`, `birthdate`, `number`, `occupation`, `employer_address`, `spouse_name`, `spouse_occupation`, `spouse_em_address`, `address`, `avatar`) VALUES (7, 'John Doe', 'Male', '1984-03-10', '09098552134', 'Farmer', 'Hamtic Antique', 'Maria Doe', 'Helper', 'Hamtic Antique', 'Hamtic Antique', NULL);
INSERT INTO `borrowers` (`id`, `name`, `gender`, `birthdate`, `number`, `occupation`, `employer_address`, `spouse_name`, `spouse_occupation`, `spouse_em_address`, `address`, `avatar`) VALUES (8, 'Angela Bargola', 'Femail', '1974-09-30', '09098713423', 'Admin Aide', 'Hamtic Antique', 'Supronio Bargola', 'None', 'None', 'Tagaytay, Anini y, Antique', NULL);
INSERT INTO `borrowers` (`id`, `name`, `gender`, `birthdate`, `number`, `occupation`, `employer_address`, `spouse_name`, `spouse_occupation`, `spouse_em_address`, `address`, `avatar`) VALUES (9, 'Michael Bargola', 'Male', '1990-09-02', '09091230909', 'Delivery', 'San Jose Antique', 'None', 'None', '', 'San Jose Antique', NULL);
INSERT INTO `borrowers` (`id`, `name`, `gender`, `birthdate`, `number`, `occupation`, `employer_address`, `spouse_name`, `spouse_occupation`, `spouse_em_address`, `address`, `avatar`) VALUES (10, 'John Smith', 'Male', '2021-11-12', '079510504445', 'Developer', 'any comany', 'Spouse name', '', '', 'sdssd', NULL);
INSERT INTO `borrowers` (`id`, `name`, `gender`, `birthdate`, `number`, `occupation`, `employer_address`, `spouse_name`, `spouse_occupation`, `spouse_em_address`, `address`, `avatar`) VALUES (11, 'AAA', 'Male', '2021-12-09', '22222222221', 'ST', 'WW', '', '', '', 'AAA', NULL);


#
# TABLE STRUCTURE FOR: loan
#

DROP TABLE IF EXISTS `loan`;

CREATE TABLE `loan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `borrower_id` int(11) DEFAULT NULL,
  `loan_type` varchar(20) DEFAULT NULL,
  `principal` decimal(10,2) DEFAULT NULL,
  `terms` int(11) DEFAULT NULL,
  `interest` int(11) DEFAULT NULL,
  `penalty` int(11) DEFAULT NULL,
  `date_started` date DEFAULT NULL,
  `maturity_date` date DEFAULT NULL,
  `monthly` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `notes` text,
  `co_maker` text,
  `co_maker2` text,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`),
  KEY `borrower_id` (`borrower_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

INSERT INTO `loan` (`id`, `borrower_id`, `loan_type`, `principal`, `terms`, `interest`, `penalty`, `date_started`, `maturity_date`, `monthly`, `total_amount`, `notes`, `co_maker`, `co_maker2`, `status`) VALUES (28, 4, 'Custom', '100000.00', 6, 30, 1, '2021-08-21', '2022-02-21', '46666.67', '280000.00', '', 'Juan Dela', '', 'Active');
INSERT INTO `loan` (`id`, `borrower_id`, `loan_type`, `principal`, `terms`, `interest`, `penalty`, `date_started`, `maturity_date`, `monthly`, `total_amount`, `notes`, `co_maker`, `co_maker2`, `status`) VALUES (29, 4, 'Custom', '1000.00', 6, 5, 1, '2021-08-21', '2022-02-21', '216.67', '1300.00', '', 'Sponge Bob', '', 'Active');
INSERT INTO `loan` (`id`, `borrower_id`, `loan_type`, `principal`, `terms`, `interest`, `penalty`, `date_started`, `maturity_date`, `monthly`, `total_amount`, `notes`, `co_maker`, `co_maker2`, `status`) VALUES (30, 4, 'Custom', '200000.00', 12, 5, 1, '2021-08-21', '2022-08-21', '26666.67', '320000.00', '', 'Juan Dela', '', 'Active');
INSERT INTO `loan` (`id`, `borrower_id`, `loan_type`, `principal`, `terms`, `interest`, `penalty`, `date_started`, `maturity_date`, `monthly`, `total_amount`, `notes`, `co_maker`, `co_maker2`, `status`) VALUES (31, 3, 'Custom', '10000.00', 10, 5, 1, '2021-08-24', '2022-06-24', '1500.00', '15000.00', '', 'Ron', '', 'Active');
INSERT INTO `loan` (`id`, `borrower_id`, `loan_type`, `principal`, `terms`, `interest`, `penalty`, `date_started`, `maturity_date`, `monthly`, `total_amount`, `notes`, `co_maker`, `co_maker2`, `status`) VALUES (32, 5, 'Custom', '100000.00', 10, 5, 1, '2021-08-25', '2022-06-25', '15000.00', '150000.00', '', 'Juan Dela', '', 'Active');
INSERT INTO `loan` (`id`, `borrower_id`, `loan_type`, `principal`, `terms`, `interest`, `penalty`, `date_started`, `maturity_date`, `monthly`, `total_amount`, `notes`, `co_maker`, `co_maker2`, `status`) VALUES (33, 3, 'Custom', '100000.00', 10, 5, 1, '2021-08-25', '2022-06-25', '15000.00', '150000.00', '', 'Ron', '', 'Active');
INSERT INTO `loan` (`id`, `borrower_id`, `loan_type`, `principal`, `terms`, `interest`, `penalty`, `date_started`, `maturity_date`, `monthly`, `total_amount`, `notes`, `co_maker`, `co_maker2`, `status`) VALUES (34, 5, 'Custom', '20000.00', 10, 5, 1, '2021-08-26', '2022-06-26', '3000.00', '30000.00', '', 'Juan Dela', '', 'Active');
INSERT INTO `loan` (`id`, `borrower_id`, `loan_type`, `principal`, `terms`, `interest`, `penalty`, `date_started`, `maturity_date`, `monthly`, `total_amount`, `notes`, `co_maker`, `co_maker2`, `status`) VALUES (36, 7, 'Custom', '100000.00', 10, 5, 1, '2021-09-08', '2022-07-08', '15000.00', '150000.00', '', 'None', 'None', 'Active');
INSERT INTO `loan` (`id`, `borrower_id`, `loan_type`, `principal`, `terms`, `interest`, `penalty`, `date_started`, `maturity_date`, `monthly`, `total_amount`, `notes`, `co_maker`, `co_maker2`, `status`) VALUES (37, 8, 'Custom', '100000.00', 10, 5, 1, '2021-09-19', '2022-07-19', '15000.00', '150000.00', '', 'Aika Bargola', '', 'Active');
INSERT INTO `loan` (`id`, `borrower_id`, `loan_type`, `principal`, `terms`, `interest`, `penalty`, `date_started`, `maturity_date`, `monthly`, `total_amount`, `notes`, `co_maker`, `co_maker2`, `status`) VALUES (38, 9, 'Custom', '100000.00', 10, 5, 1, '2021-09-22', '2022-07-22', '15000.00', '150000.00', '', 'Juan', 'Maria', 'Active');
INSERT INTO `loan` (`id`, `borrower_id`, `loan_type`, `principal`, `terms`, `interest`, `penalty`, `date_started`, `maturity_date`, `monthly`, `total_amount`, `notes`, `co_maker`, `co_maker2`, `status`) VALUES (39, 4, 'Custom', '200.00', 1, 2, 2, '2021-12-30', '2021-12-30', '204.00', '204.00', '', 'admin', 'admin', 'Active');


#
# TABLE STRUCTURE FOR: loan_type
#

DROP TABLE IF EXISTS `loan_type`;

CREATE TABLE `loan_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `interest` int(11) DEFAULT NULL,
  `terms` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO `loan_type` (`id`, `name`, `interest`, `terms`) VALUES (1, 'Custom', NULL, NULL);
INSERT INTO `loan_type` (`id`, `name`, `interest`, `terms`) VALUES (2, 'Friendly', 2, 2);
INSERT INTO `loan_type` (`id`, `name`, `interest`, `terms`) VALUES (3, 'Short Term', 3, 3);
INSERT INTO `loan_type` (`id`, `name`, `interest`, `terms`) VALUES (4, 'Medium Term', 5, 5);
INSERT INTO `loan_type` (`id`, `name`, `interest`, `terms`) VALUES (5, 'Half Year', 8, 6);
INSERT INTO `loan_type` (`id`, `name`, `interest`, `terms`) VALUES (6, 'Annual', 10, 12);
INSERT INTO `loan_type` (`id`, `name`, `interest`, `terms`) VALUES (7, 'Arawan', 10, 2);
INSERT INTO `loan_type` (`id`, `name`, `interest`, `terms`) VALUES (8, 'Fix and Flip', 7, 12);
INSERT INTO `loan_type` (`id`, `name`, `interest`, `terms`) VALUES (9, 'Qq', 5, 5);
INSERT INTO `loan_type` (`id`, `name`, `interest`, `terms`) VALUES (10, 'All', 5, 36);
INSERT INTO `loan_type` (`id`, `name`, `interest`, `terms`) VALUES (11, 'aaaa', 0, 36);
INSERT INTO `loan_type` (`id`, `name`, `interest`, `terms`) VALUES (12, 'qq', 0, 1);


#
# TABLE STRUCTURE FOR: payment
#

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `due` decimal(10,2) DEFAULT NULL,
  `p_interest` decimal(10,2) DEFAULT NULL,
  `p_penalty` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `loan_id` (`loan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=311 DEFAULT CHARSET=utf8mb4;

INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (57, 26, '2021-09-20', '500.00', '75.00', NULL, '575.00', 'Monthly Payment', 'Paid', '2021-08-20');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (58, 26, '2021-10-20', '500.00', '75.00', NULL, '575.00', 'Monthly Payment', 'Paid', '2021-08-20');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (59, 26, '2021-11-20', '500.00', '75.00', NULL, '575.00', 'Monthly Payment', 'Paid', '2021-08-20');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (60, 27, '2021-09-19', '250.00', '100.00', NULL, '350.00', 'Monthly Payment', 'Paid', '2021-08-19');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (61, 27, '2021-10-19', '250.00', '100.00', NULL, '350.00', 'Monthly Payment', 'Paid', '2021-08-19');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (62, 27, '2021-11-19', '250.00', '100.00', NULL, '350.00', 'Monthly Payment', 'Paid', '2021-08-19');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (63, 27, '2021-12-19', '250.00', '100.00', NULL, '100.00', 'Monthly Payment', 'Partial', '2021-08-19');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (64, 27, '2022-01-19', '500.00', '100.00', '6.00', '706.00', 'Monthly Payment', 'Paid', '2021-08-19');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (65, 27, '2022-02-19', '150.00', '100.00', NULL, NULL, 'Skip Payment', 'Unpaid', '2021-08-19');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (66, 27, '2022-03-19', '400.00', '200.00', '6.00', '606.00', 'Monthly Payment', 'Paid', '2021-08-19');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (67, 27, '2022-04-19', '250.00', '100.00', NULL, '350.00', 'Monthly Payment', 'Paid', '2021-08-19');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (164, 30, '2021-09-21', '16666.67', '10000.00', NULL, NULL, NULL, 'Processing', NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (165, 30, '2021-10-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (166, 30, '2021-11-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (167, 30, '2021-12-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (168, 30, '2022-01-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (169, 30, '2022-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (170, 30, '2022-03-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (171, 30, '2022-04-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (172, 30, '2022-05-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (173, 30, '2022-06-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (174, 30, '2022-07-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (175, 30, '2022-08-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (182, 29, '2021-09-21', '166.67', '50.00', NULL, NULL, NULL, 'Processing', NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (183, 29, '2021-10-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (184, 29, '2021-11-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (185, 29, '2021-12-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (186, 29, '2022-01-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (187, 29, '2022-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (194, 28, '2021-09-21', '16666.67', '30000.00', NULL, '46666.67', 'Monthly Payment', 'Paid', '2021-09-18');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (195, 28, '2021-10-21', '16666.67', '30000.00', NULL, '46666.67', 'Monthly Payment', 'Paid', '2021-12-27');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (196, 28, '2021-11-21', '16666.67', '30000.00', NULL, '46666.67', 'Monthly Payment', 'Paid', '2021-12-30');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (197, 28, '2021-12-21', '16666.67', '30000.00', NULL, NULL, NULL, 'Processing', NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (198, 28, '2022-01-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (199, 28, '2022-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (200, 31, '2021-09-24', '1000.00', '500.00', NULL, NULL, NULL, 'Processing', NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (201, 31, '2021-10-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (202, 31, '2021-11-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (203, 31, '2021-12-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (204, 31, '2022-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (205, 31, '2022-02-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (206, 31, '2022-03-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (207, 31, '2022-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (208, 31, '2022-05-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (209, 31, '2022-06-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (230, 33, '2021-09-25', '10000.00', '5000.00', NULL, '15000.00', 'Monthly Payment', 'Paid', '2021-08-25');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (231, 33, '2021-10-25', '10000.00', '5000.00', NULL, '15000.00', 'Monthly Payment', 'Paid', '2021-08-25');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (232, 33, '2021-11-25', '10000.00', '5000.00', NULL, NULL, 'Skip Payment', 'Unpaid', '2021-08-25');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (233, 33, '2021-12-25', '20000.00', '10000.00', '300.00', '30300.00', 'Monthly Payment', 'Paid', '2021-08-25');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (234, 33, '2022-01-25', '10000.00', '5000.00', NULL, NULL, 'Skip Payment', 'Unpaid', '2021-08-25');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (235, 33, '2022-02-25', '20000.00', '10000.00', '300.00', '20000.00', 'Monthly Payment', 'Partial', '2021-08-25');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (236, 33, '2022-03-25', '20300.00', '5000.00', '253.00', NULL, NULL, 'Processing', NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (237, 33, '2022-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (238, 33, '2022-05-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (239, 33, '2022-06-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (240, 32, '2021-09-25', '10000.00', '5000.00', NULL, NULL, NULL, 'Processing', NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (241, 32, '2021-10-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (242, 32, '2021-11-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (243, 32, '2021-12-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (244, 32, '2022-01-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (245, 32, '2022-02-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (246, 32, '2022-03-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (247, 32, '2022-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (248, 32, '2022-05-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (249, 32, '2022-06-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (260, 34, '2021-09-26', '2000.00', '1000.00', NULL, NULL, NULL, 'Processing', NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (261, 34, '2021-10-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (262, 34, '2021-11-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (263, 34, '2021-12-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (264, 34, '2022-01-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (265, 34, '2022-02-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (266, 34, '2022-03-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (267, 34, '2022-04-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (268, 34, '2022-05-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (269, 34, '2022-06-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (270, 35, '2021-10-01', '10000.00', '5000.00', NULL, '15000.00', 'Monthly Payment', 'Paid', '2021-09-01');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (271, 35, '2021-11-01', '10000.00', '5000.00', NULL, '5000.00', 'Monthly Payment', 'Partial', '2021-09-01');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (272, 35, '2021-12-01', '20000.00', '5000.00', '250.00', '15000.00', 'Monthly Payment', 'Partial', '2021-09-01');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (273, 35, '2022-01-01', '20250.00', '5000.00', '252.50', NULL, NULL, 'Processing', NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (274, 35, '2022-02-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (275, 35, '2022-03-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (276, 35, '2022-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (277, 35, '2022-05-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (278, 35, '2022-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (279, 35, '2022-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (280, 36, '2021-10-08', '10000.00', '5000.00', NULL, '15000.00', 'Monthly Payment', 'Paid', '2021-09-08');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (281, 36, '2021-11-08', '10000.00', '5000.00', NULL, '10000.00', 'Monthly Payment', 'Partial', '2021-09-08');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (282, 36, '2021-12-08', '15000.00', '5000.00', '200.00', '20200.00', 'Monthly Payment', 'Paid', '2021-09-08');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (283, 36, '2022-01-08', '10000.00', '5000.00', NULL, NULL, NULL, 'Processing', NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (284, 36, '2022-02-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (285, 36, '2022-03-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (286, 36, '2022-04-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (287, 36, '2022-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (288, 36, '2022-06-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (289, 36, '2022-07-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (290, 37, '2021-10-19', '10000.00', '5000.00', NULL, '15000.00', 'Monthly Payment', 'Paid', '2021-09-19');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (291, 37, '2021-11-19', '10000.00', '5000.00', NULL, '10000.00', 'Monthly Payment', 'Partial', '2021-09-19');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (292, 37, '2021-12-19', '15000.00', '5000.00', '200.00', '20200.00', 'Monthly Payment', 'Paid', '2021-09-19');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (293, 37, '2022-01-19', '10000.00', '5000.00', NULL, NULL, NULL, 'Processing', NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (294, 37, '2022-02-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (295, 37, '2022-03-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (296, 37, '2022-04-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (297, 37, '2022-05-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (298, 37, '2022-06-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (299, 37, '2022-07-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (300, 38, '2021-10-22', '10000.00', '5000.00', NULL, '15000.00', 'Monthly Payment', 'Paid', '2021-09-22');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (301, 38, '2021-11-22', '10000.00', '5000.00', NULL, '10000.00', 'Monthly Payment', 'Partial', '2021-09-22');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (302, 38, '2021-12-22', '15000.00', '5000.00', '200.00', '20200.00', 'Monthly Payment', 'Paid', '2021-09-22');
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (303, 38, '2022-01-22', '10000.00', '5000.00', NULL, NULL, NULL, 'Processing', NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (304, 38, '2022-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (305, 38, '2022-03-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (306, 38, '2022-04-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (307, 38, '2022-05-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (308, 38, '2022-06-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (309, 38, '2022-07-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `payment` (`id`, `loan_id`, `due_date`, `due`, `p_interest`, `p_penalty`, `amount`, `remarks`, `status`, `date`) VALUES (310, 39, '2022-01-30', '200.00', '4.00', NULL, NULL, NULL, 'Processing', NULL);


#
# TABLE STRUCTURE FOR: transaction
#

DROP TABLE IF EXISTS `transaction`;

CREATE TABLE `transaction` (
  `loan_id` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `trans_date` date DEFAULT NULL,
  `total_amount` decimal(12,2) DEFAULT NULL,
  KEY `loan_id` (`loan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (26, 'admin', '2021-08-20', '575.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (26, 'admin', '2021-08-20', '575.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (26, 'admin', '2021-08-20', '575.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (27, 'admin', '2021-08-19', '350.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (27, 'admin', '2021-08-19', '350.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (27, 'admin', '2021-08-19', '100.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (27, 'admin', '2021-08-19', '706.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (27, 'admin', '2021-08-19', '606.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (27, 'admin', '2021-08-19', '350.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (28, 'admin', '2021-08-21', '15000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (32, 'admin', '2021-08-25', '15000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (32, 'admin', '2021-08-25', '10000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (32, 'admin', '2021-10-25', '10000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (33, 'admin', '2021-08-25', '15000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (33, 'admin', '2021-08-25', '15000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (33, 'admin', '2021-08-25', '30300.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (33, 'admin', '2021-08-25', '20000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (35, 'admin', '2021-09-01', '15000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (35, 'admin', '2021-09-01', '5000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (35, 'admin', '2021-09-01', '5000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (35, 'admin', '2021-09-01', '15000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (36, 'admin', '2021-09-08', '15000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (36, 'admin', '2021-09-08', '10000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (36, 'admin', '2021-09-08', '20200.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (28, 'admin', '2021-09-18', '46666.67');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (37, 'admin', '2021-09-19', '15000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (37, 'admin', '2021-09-19', '10000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (37, 'admin', '2021-09-19', '20200.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (38, 'admin', '2021-09-22', '15000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (38, 'admin', '2021-09-22', '10000.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (38, 'admin', '2021-09-22', '20200.00');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (28, 'admin', '2021-12-27', '46666.67');
INSERT INTO `transaction` (`loan_id`, `username`, `trans_date`, `total_amount`) VALUES (28, 'admin', '2021-12-30', '46666.67');


