/*Table structure for table `lessons` */

DROP TABLE IF EXISTS `lessons`;

CREATE TABLE `lessons` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `lesson_code` varchar(11) COLLATE utf8mb4_persian_ci NOT NULL,
  `lesson_name` varchar(200) COLLATE utf8mb4_persian_ci NOT NULL,
  `teacher_code` varchar(11) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;


/*Table structure for table `teachers` */

DROP TABLE IF EXISTS `teachers`;

CREATE TABLE `teachers` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `teacher_code` varchar(11) COLLATE utf8mb4_persian_ci NOT NULL,
  `fname` varchar(200) COLLATE utf8mb4_persian_ci NOT NULL,
  `lname` varchar(200) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;
