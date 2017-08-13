-- Adminer 4.3.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `assign_subject`;
CREATE TABLE `assign_subject` (
  `sub_id` varchar(255) NOT NULL,
  `staff_staff_id` varchar(255) NOT NULL,
  `section_sec_id` varchar(255) NOT NULL,
  `section_semester_sem_id` varchar(255) NOT NULL,
  `course_c_id` varchar(255) NOT NULL,
  PRIMARY KEY (`staff_staff_id`,`section_sec_id`,`section_semester_sem_id`,`course_c_id`),
  KEY `fk_assign_subject_section1_idx` (`section_sec_id`,`section_semester_sem_id`),
  KEY `fk_assign_subject_course1_idx` (`course_c_id`),
  CONSTRAINT `fk_assign_subject_course1` FOREIGN KEY (`course_c_id`) REFERENCES `course` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_assign_subject_section1` FOREIGN KEY (`section_sec_id`, `section_semester_sem_id`) REFERENCES `section` (`sec_id`, `semester_sem_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_assign_subject_staff1` FOREIGN KEY (`staff_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `assign_subject` (`sub_id`, `staff_staff_id`, `section_sec_id`, `section_semester_sem_id`, `course_c_id`) VALUES
('bscenl100',	'st001',	'1',	'11',	'c1'),
('bcomenl101',	'st001',	'1',	'21',	'c2'),
('bcomenl101',	'st001',	'2',	'21',	'c2'),
('bbmenl102',	'st001',	'2',	'31',	'c3');

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `date_attend` date DEFAULT NULL,
  `period` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `Student_usn` varchar(255) NOT NULL,
  `staff_staff_id` varchar(255) NOT NULL,
  `section_sec_id` varchar(255) NOT NULL,
  `section_semester_sem_id` varchar(255) NOT NULL,
  `subject_list_sub_id` varchar(255) NOT NULL,
  UNIQUE KEY `uniqueAttendance` (`date_attend`,`period`,`status`,`Student_usn`,`staff_staff_id`,`section_sec_id`,`section_semester_sem_id`,`subject_list_sub_id`),
  KEY `fk_attendance_staff1_idx` (`staff_staff_id`),
  KEY `fk_attendance_section1_idx` (`section_sec_id`,`section_semester_sem_id`),
  KEY `fk_attendance_subject_list1_idx` (`subject_list_sub_id`),
  KEY `index` (`Student_usn`,`staff_staff_id`,`section_sec_id`,`section_semester_sem_id`,`subject_list_sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `attendance` (`date_attend`, `period`, `status`, `Student_usn`, `staff_staff_id`, `section_sec_id`, `section_semester_sem_id`, `subject_list_sub_id`) VALUES
('2017-08-01',	3,	0,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-01',	3,	0,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-01',	3,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-01',	3,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-02',	3,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-02',	3,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-02',	3,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-02',	3,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-03',	3,	0,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-03',	3,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-03',	3,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-03',	3,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-04',	3,	0,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-04',	3,	0,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-04',	3,	0,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-04',	3,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-05',	3,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-05',	3,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-05',	3,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-05',	3,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-06',	3,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-06',	3,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-06',	3,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-06',	3,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-07',	3,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-07',	3,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-07',	3,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-07',	3,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-08',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-08',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-08',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-08',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-09',	2,	0,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-09',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-09',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-09',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-10',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-10',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-10',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-10',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-11',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-11',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-11',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-11',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-12',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-12',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-12',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-12',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-13',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-13',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-13',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-13',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-14',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-14',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-14',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-14',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-15',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-15',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-15',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-15',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-16',	2,	0,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-16',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-16',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-16',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-17',	2,	0,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-17',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-17',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-17',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-18',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-18',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-18',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-18',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-19',	2,	0,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-19',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-19',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-19',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-20',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-20',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-20',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-20',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-21',	2,	0,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-21',	2,	0,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-21',	2,	0,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-21',	2,	0,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-22',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-22',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-22',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-22',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-23',	2,	0,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-23',	2,	0,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-23',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-23',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-24',	2,	0,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-24',	2,	0,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-24',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-24',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-25',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-25',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-25',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-25',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-26',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-26',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-26',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-26',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-27',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-27',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-27',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-27',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-28',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-28',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-28',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-28',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-29',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-29',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-29',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-29',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-30',	2,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-30',	2,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-30',	2,	1,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-30',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-31',	2,	0,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-31',	2,	0,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-31',	2,	0,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-08-31',	2,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100'),
('2017-09-01',	1,	0,	'4nm15cs109',	'st002',	'1',	'21',	'bscenl100'),
('2017-09-01',	1,	1,	'4nm15cs102',	'st002',	'1',	'21',	'bscenl100'),
('2017-09-01',	1,	1,	'4nm15cs108',	'st002',	'1',	'21',	'bscenl100'),
('2017-09-01',	1,	1,	'4nm15cs110',	'st002',	'1',	'21',	'bscenl100');

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `c_id` varchar(255) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `course` (`id`, `c_id`, `c_name`) VALUES
(1,	'c1',	'bsc'),
(2,	'c2',	'bcom'),
(3,	'c3',	'bbm');

DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `sec_id` varchar(255) NOT NULL,
  `sec_name` varchar(255) DEFAULT NULL,
  `semester_sem_id` varchar(255) NOT NULL,
  PRIMARY KEY (`sec_id`,`semester_sem_id`),
  KEY `fk_section_semester1_idx` (`semester_sem_id`),
  CONSTRAINT `fk_section_semester1` FOREIGN KEY (`semester_sem_id`) REFERENCES `semester` (`sem_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `section` (`sec_id`, `sec_name`, `semester_sem_id`) VALUES
('1',	'a',	'11'),
('1',	'a',	'21'),
('1',	'a',	'31'),
('2',	'b',	'11'),
('2',	'b',	'21'),
('2',	'b',	'31');

DROP TABLE IF EXISTS `semester`;
CREATE TABLE `semester` (
  `sem_id` varchar(255) NOT NULL,
  `course_c_id` varchar(255) NOT NULL,
  PRIMARY KEY (`sem_id`,`course_c_id`),
  KEY `fk_semester_course1_idx` (`course_c_id`),
  CONSTRAINT `fk_semester_course1` FOREIGN KEY (`course_c_id`) REFERENCES `course` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `semester` (`sem_id`, `course_c_id`) VALUES
('11',	'c1'),
('12',	'c1'),
('21',	'c2'),
('22',	'c2'),
('31',	'c3'),
('32',	'c3');

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `staff_id` varchar(255) NOT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `st_name` varchar(255) DEFAULT NULL,
  `st_mob` int(11) DEFAULT NULL,
  `st_email` varchar(255) DEFAULT NULL,
  `st_join_date` date DEFAULT NULL,
  PRIMARY KEY (`staff_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `staff` (`id`, `staff_id`, `pwd`, `st_name`, `st_mob`, `st_email`, `st_join_date`) VALUES
(1,	'st001',	'st001',	'Teacher 1',	100100100,	'teacher1@mail.com',	NULL),
(2,	'st002',	'st002',	'Teacher 2',	200200200,	'teacher2@mail.com',	NULL);

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `usn` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mob` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `section_sec_id` varchar(255) NOT NULL,
  `section_semester_sem_id` varchar(255) NOT NULL,
  PRIMARY KEY (`usn`,`section_sec_id`,`section_semester_sem_id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_Student_section1_idx` (`section_sec_id`,`section_semester_sem_id`),
  CONSTRAINT `fk_Student_section1` FOREIGN KEY (`section_sec_id`, `section_semester_sem_id`) REFERENCES `section` (`sec_id`, `semester_sem_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student` (`id`, `usn`, `dob`, `name`, `mob`, `address`, `email`, `section_sec_id`, `section_semester_sem_id`) VALUES
(1,	'4nm15cs100',	'1997-03-04',	'student 1',	10001000,	'abcdefgh stud1',	'abc@mail.com',	'1',	'11'),
(2,	'4nm15cs101',	'1996-09-07',	'student 2',	20002000,	'hghgedhuyhgd',	'abcdef@mail.com',	'2',	'11'),
(3,	'4nm15cs102',	'1996-07-12',	'student 3',	30003000,	'wertyjhbvc',	'email@op.com',	'1',	'21'),
(4,	'4nm15cs103',	'2005-10-20',	'student 4',	40004000,	'mlknjhb',	'poppl@mail.com',	'2',	'21'),
(5,	'4nm15cs104',	'1994-03-04',	'student 5',	50005000,	'find me here',	'maui@ko.com',	'1',	'11'),
(6,	'4nm15cs105',	'1995-09-07',	'student 6',	60006000,	'i am lost',	'nointernet.com',	'2',	'21'),
(7,	'4nm15cs106',	'1500-06-20',	'student 7',	2147483647,	'hghsghg',	'abcd@.com',	'1',	'31'),
(8,	'4nm15cs107',	'1995-12-30',	'student 8',	2147483647,	'mangalore',	's8@g.com',	'2',	'31');

DROP TABLE IF EXISTS `student_details`;
CREATE TABLE `student_details` (
  `student_usn` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `parent_mob` int(100) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `comm_address` varchar(255) NOT NULL,
  KEY `student_usn` (`student_usn`),
  CONSTRAINT `student_details_ibfk_2` FOREIGN KEY (`student_usn`) REFERENCES `student` (`usn`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student_details` (`student_usn`, `father_name`, `mother_name`, `blood_group`, `sex`, `parent_mob`, `religion`, `nationality`, `permanent_address`, `comm_address`) VALUES
('4nm15cs100',	'Father 1',	'Mother 1',	'A+',	'male',	10000000,	'-',	'-',	'here',	'here');

DROP TABLE IF EXISTS `subject_list`;
CREATE TABLE `subject_list` (
  `sub_id` varchar(255) NOT NULL,
  `sub_name` varchar(255) DEFAULT NULL,
  `sub_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `subject_list` (`sub_id`, `sub_name`, `sub_type`) VALUES
('bbmenl102',	'kannada',	'0'),
('bcomenl101',	'english',	'0'),
('bscenl100',	'hindi',	'0');

DROP TABLE IF EXISTS `subject_sem`;
CREATE TABLE `subject_sem` (
  `subject_list_sub_id` varchar(255) NOT NULL,
  `semester_sem_id` varchar(255) NOT NULL,
  `semester_course_c_id` varchar(255) NOT NULL,
  PRIMARY KEY (`subject_list_sub_id`,`semester_sem_id`,`semester_course_c_id`),
  KEY `fk_subject_sem_subject_list1_idx` (`subject_list_sub_id`),
  KEY `fk_subject_sem_semester1_idx` (`semester_sem_id`,`semester_course_c_id`),
  CONSTRAINT `fk_subject_sem_semester1` FOREIGN KEY (`semester_sem_id`, `semester_course_c_id`) REFERENCES `semester` (`sem_id`, `course_c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_sem_subject_list1` FOREIGN KEY (`subject_list_sub_id`) REFERENCES `subject_list` (`sub_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `subject_sem` (`subject_list_sub_id`, `semester_sem_id`, `semester_course_c_id`) VALUES
('bbmenl102',	'31',	'c3'),
('bcomenl101',	'21',	'c2'),
('bscenl100',	'11',	'c1');

-- 2017-08-09 15:04:23
