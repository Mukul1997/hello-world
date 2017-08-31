-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`name`, `pass`) VALUES
('admin',	'81dc9bdb52d04dc20036dbd8313ed055');

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
  CONSTRAINT `assign_subject_ibfk_1` FOREIGN KEY (`course_c_id`) REFERENCES `course` (`c_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `assign_subject_ibfk_3` FOREIGN KEY (`section_sec_id`, `section_semester_sem_id`) REFERENCES `section` (`sec_id`, `semester_sem_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_assign_subject_staff1` FOREIGN KEY (`staff_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `assign_subject` (`sub_id`, `staff_staff_id`, `section_sec_id`, `section_semester_sem_id`, `course_c_id`) VALUES
('bscenl100',	'st001',	'1',	'1_1',	'c_1'),
('bcomenl101',	'st001',	'1',	'2_1',	'c_2'),
('bbmenl102',	'st001',	'1',	'3_1',	'c_3'),
('bcomenl101',	'st001',	'2',	'2_1',	'c_2'),
('bbmenl102',	'st001',	'2',	'3_1',	'c_3'),
('bscenl100',	'st002',	'1',	'1_1',	'c_1');

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
  KEY `index` (`Student_usn`,`staff_staff_id`,`section_sec_id`,`section_semester_sem_id`,`subject_list_sub_id`),
  CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`Student_usn`) REFERENCES `student` (`usn`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`section_sec_id`, `section_semester_sem_id`) REFERENCES `section` (`sec_id`, `semester_sem_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_attendance_staff1` FOREIGN KEY (`staff_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_attendance_subject_list1` FOREIGN KEY (`subject_list_sub_id`) REFERENCES `subject_list` (`sub_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `attendance` (`date_attend`, `period`, `status`, `Student_usn`, `staff_staff_id`, `section_sec_id`, `section_semester_sem_id`, `subject_list_sub_id`) VALUES
('2017-08-21',	1,	1,	'4nm15cs100',	'st001',	'1',	'1_1',	'bscenl100'),
('2017-08-21',	1,	1,	'4nm15cs104',	'st001',	'1',	'1_1',	'bscenl100'),
('2017-08-21',	10,	0,	'4nm15cs100',	'st001',	'1',	'1_1',	'bscenl100'),
('2017-08-21',	10,	0,	'4nm15cs104',	'st001',	'1',	'1_1',	'bscenl100'),
('2017-08-22',	1,	0,	'4nm15cs104',	'st001',	'1',	'1_1',	'bscenl100'),
('2017-08-22',	1,	1,	'4nm15cs100',	'st001',	'1',	'1_1',	'bscenl100'),
('2017-08-24',	8,	0,	'4nm15cs100',	'st001',	'1',	'1_1',	'bscenl100'),
('2017-08-24',	8,	0,	'4nm15cs104',	'st001',	'1',	'1_1',	'bscenl100'),
('2017-08-28',	1,	0,	'4nm15cs100',	'st001',	'1',	'1_1',	'bscenl100'),
('2017-08-28',	1,	0,	'4nm15cs104',	'st001',	'1',	'1_1',	'bscenl100'),
('2017-08-28',	1,	1,	'4nm15cs100',	'st001',	'1',	'1_1',	'bscenl100'),
('2017-08-28',	1,	1,	'4nm15cs104',	'st001',	'1',	'1_1',	'bscenl100'),
('2017-08-28',	2,	0,	'4nm15cs104',	'st001',	'1',	'1_1',	'bscenl100'),
('2017-08-28',	2,	1,	'4nm15cs100',	'st001',	'1',	'1_1',	'bscenl100');

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `c_id` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `id_c_name` (`id`,`c_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `course` (`id`, `c_id`, `c_name`) VALUES
(1,	'c_1',	'bsc'),
(2,	'c_2',	'bcom'),
(3,	'c_3',	'bbm');

DROP TABLE IF EXISTS `elective`;
CREATE TABLE `elective` (
  `sub_id` varchar(255) NOT NULL,
  `student_usn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `sec_id` varchar(255) NOT NULL,
  `sec_name` varchar(255) DEFAULT NULL,
  `semester_sem_id` varchar(255) NOT NULL,
  PRIMARY KEY (`sec_id`,`semester_sem_id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_section_semester1_idx` (`semester_sem_id`),
  CONSTRAINT `section_ibfk_1` FOREIGN KEY (`semester_sem_id`) REFERENCES `semester` (`sem_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `section` (`id`, `sec_id`, `sec_name`, `semester_sem_id`) VALUES
(1,	'1',	'a',	'1_1'),
(2,	'1',	'a',	'2_1'),
(3,	'1',	'a',	'3_1'),
(4,	'2',	'b',	'1_1'),
(5,	'2',	'b',	'2_1'),
(6,	'2',	'b',	'3_1');

DROP TABLE IF EXISTS `semester`;
CREATE TABLE `semester` (
  `sem_id` varchar(255) NOT NULL,
  `course_c_id` varchar(255) NOT NULL,
  PRIMARY KEY (`sem_id`,`course_c_id`),
  KEY `fk_semester_course1_idx` (`course_c_id`),
  CONSTRAINT `semester_ibfk_2` FOREIGN KEY (`course_c_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `semester` (`sem_id`, `course_c_id`) VALUES
('1_1',	'c_1'),
('1_2',	'c_1'),
('2_1',	'c_2'),
('2_2',	'c_2'),
('3_1',	'c_3'),
('3_2',	'c_3');

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
(2,	'st002',	'st002',	'Teacher 2',	200200200,	'teacher2@mail.com',	NULL),
(4,	'st003',	'st003',	'Teacher 3',	30003000,	'coverMe@mail.com',	NULL),
(3,	'st004',	'st009',	'Teacher 4',	2147483647,	'w@gmail.com',	'2017-07-25'),
(8,	'st069',	'st069',	'Teacher 69',	2147483647,	'techer69@gmail.com',	'2017-10-25');

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
  CONSTRAINT `student_ibfk_2` FOREIGN KEY (`section_sec_id`, `section_semester_sem_id`) REFERENCES `section` (`sec_id`, `semester_sem_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student` (`id`, `usn`, `dob`, `name`, `mob`, `address`, `email`, `section_sec_id`, `section_semester_sem_id`) VALUES
(1,	'4nm15cs100',	'1997-03-04',	'student 1',	10001000,	'abcdefgh stud1',	'abc@mail.com',	'1',	'1_1'),
(2,	'4nm15cs101',	'1996-09-07',	'student 2',	20002000,	'hghgedhuyhgd',	'abcdef@mail.com',	'2',	'1_1'),
(3,	'4nm15cs102',	'1996-07-12',	'student 3',	30003000,	'wertyjhbvc',	'email@op.com',	'1',	'2_1'),
(4,	'4nm15cs103',	'2005-10-20',	'student 4',	40004000,	'mlknjhb',	'poppl@mail.com',	'2',	'2_1'),
(5,	'4nm15cs104',	'1994-03-04',	'student 5',	50005000,	'find me here',	'maui@ko.com',	'1',	'1_1'),
(6,	'4nm15cs105',	'1995-09-07',	'student 6',	60006000,	'i am lost',	'nointernet.com',	'2',	'2_1'),
(7,	'4nm15cs106',	'1500-06-20',	'student 7',	2147483647,	'hghsghg',	'abcd@.com',	'1',	'3_1'),
(8,	'4nm15cs107',	'1995-12-30',	'student 8',	2147483647,	'mangalore',	's8@g.com',	'2',	'3_1'),
(9,	'4nm15cs1200',	'1996-09-07',	'Vader',	2147483647,	'bahbhdgshbdhg',	'abc@gmail.com',	'1',	'1_1');

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
  KEY `student_usn` (`student_usn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student_details` (`student_usn`, `father_name`, `mother_name`, `blood_group`, `sex`, `parent_mob`, `religion`, `nationality`, `permanent_address`, `comm_address`) VALUES
('4nm15cs100',	'Father 1',	'Mother 1',	'A+',	'male',	10000000,	'-',	'-',	'here',	'here'),
('4nm15cs1200',	'abnbnbf',	'defghghs',	'o+',	'female',	2147483647,	'hindu',	'india',	'hgjhsjdhsfj',	'kjkjkujjkjkjjd'),
('usn',	'father',	'mother',	'blood',	'sex',	0,	'religion',	'nation',	'p_add',	'comm_add'),
('4nm15cs1200',	'abnbnbf',	'defghghs',	'o+',	'female',	2147483647,	'hindu',	'india',	'hgjhsjdhsfj',	'kjkjkujjkjkjjd'),
('usn',	'father',	'mother',	'blood',	'sex',	0,	'religion',	'nation',	'p_add',	'comm_add'),
('4nm15cs1200',	'abnbnbf',	'defghghs',	'o+',	'female',	2147483647,	'hindu',	'india',	'hgjhsjdhsfj',	'kjkjkujjkjkjjd'),
('usn',	'father',	'mother',	'blood',	'sex',	0,	'religion',	'nation',	'p_add',	'comm_add'),
('4nm15cs1200',	'abnbnbf',	'defghghs',	'o+',	'female',	2147483647,	'hindu',	'india',	'hgjhsjdhsfj',	'kjkjkujjkjkjjd'),
('usn',	'father',	'mother',	'blood',	'sex',	0,	'religion',	'nation',	'p_add',	'comm_add'),
('4nm15cs1200',	'abnbnbf',	'defghghs',	'o+',	'female',	2147483647,	'hindu',	'india',	'hgjhsjdhsfj',	'kjkjkujjkjkjjd'),
('usn',	'father',	'mother',	'blood',	'sex',	0,	'religion',	'nation',	'p_add',	'comm_add'),
('4nm15cs1200',	'pops',	'moms',	'o+',	'male',	2147483647,	'hindu',	'india',	'here',	'there');

DROP TABLE IF EXISTS `subject_list`;
CREATE TABLE `subject_list` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `sub_id` varchar(255) NOT NULL,
  `sub_name` varchar(255) DEFAULT NULL,
  `sub_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sub_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `subject_list` (`id`, `sub_id`, `sub_name`, `sub_type`) VALUES
(1,	'bbmenl102',	'kannada',	'0'),
(2,	'bcomenl101',	'english',	'0'),
(3,	'bscenl100',	'hindi',	'1');

DROP TABLE IF EXISTS `subject_sem`;
CREATE TABLE `subject_sem` (
  `subject_list_sub_id` varchar(255) NOT NULL,
  `semester_sem_id` varchar(255) NOT NULL,
  `semester_course_c_id` varchar(255) NOT NULL,
  PRIMARY KEY (`subject_list_sub_id`,`semester_sem_id`,`semester_course_c_id`),
  KEY `fk_subject_sem_subject_list1_idx` (`subject_list_sub_id`),
  KEY `fk_subject_sem_semester1_idx` (`semester_sem_id`,`semester_course_c_id`),
  CONSTRAINT `subject_sem_ibfk_2` FOREIGN KEY (`semester_sem_id`, `semester_course_c_id`) REFERENCES `semester` (`sem_id`, `course_c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subject_sem_ibfk_3` FOREIGN KEY (`subject_list_sub_id`) REFERENCES `subject_list` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `subject_sem` (`subject_list_sub_id`, `semester_sem_id`, `semester_course_c_id`) VALUES
('bbmenl102',	'3_1',	'c_3'),
('bcomenl101',	'2_1',	'c_2'),
('bscenl100',	'1_1',	'c_1');

-- 2017-08-31 08:36:00
