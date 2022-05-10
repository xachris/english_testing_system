-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 21, 2020 at 10:36 PM
-- Server version: 8.0.17
-- PHP Version: 7.4.0RC2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hetdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `answer_title` varchar(255) DEFAULT NULL,
  `is_correct` tinyint(4) DEFAULT NULL,
  `answer_code` enum('a','b','c','d') DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `answer_title`, `is_correct`, `answer_code`, `question_id`, `question_no`) VALUES
(1, 'Most city-states followed the model provided by Athens.', 0, 'a', 1, 1),
(2, 'Most city-states were based on aristocratic rule.', 0, 'b', 1, 1),
(3, 'Different types of government and organization were used by different city-states.', 1, 'c', 1, 1),
(4, 'By 500 B C. the city-states were no longer powerful.', 0, 'd', 1, 1),
(5, 'a council made up of aristocrats', 0, 'a', 2, 2),
(6, 'an assembly made up of men', 0, 'b', 2, 2),
(7, 'a constitution that was fully democratic', 1, 'c', 2, 2),
(8, 'officials who were elected yearly', 0, 'd', 2, 2),
(9, 'make fewer people qualified to be members of the assembly', 0, 'a', 3, 3),
(10, 'make it possible for non-aristocrats to hold office', 1, 'b', 3, 3),
(11, 'help the aristocrats maintain power', 0, 'c', 3, 3),
(12, 'Increase economic opportunities for all Athenian citizens', 0, 'd', 3, 3),
(13, 'limiting', 0, NULL, 9, 4),
(14, 'eliminating', 1, NULL, 9, 4),
(15, 'revising', 0, NULL, 9, 4),
(16, 'supervising', 0, NULL, 9, 4),
(17, 'most Athenians were opposed to rule by the Peisistratids', 0, NULL, 10, 5),
(18, 'the word had a somewhat different meaning for the Athenians than it does for people today', 1, NULL, 10, 5),
(19, 'the tyrants were supported by the aristocracy', 0, NULL, 10, 5),
(20, 'the word can be applied only to ruthless dictators', 0, NULL, 10, 5),
(25, 'A national system of coins was created.', 0, NULL, 11, 6),
(26, 'Judges were appointed across the region.', 0, NULL, 11, 6),
(27, 'New festivals were added.', 0, NULL, 11, 6),
(28, 'Increased attention was focused on local villages.', 1, NULL, 11, 6),
(29, 'making more attractive', 1, NULL, 12, 7),
(30, 'providing support for', 0, NULL, 12, 7),
(31, 'duplicating', 0, NULL, 12, 7),
(32, 'controlling', 0, NULL, 12, 7),
(33, 'Cleisthenes, a reformer who recognized that aristocratic control had been decreasing since the end of the previous century, finally drove the tyrants out of Athens in 508 B. C.', 0, NULL, 13, 8),
(34, 'The tyrants were driven out, and in 508 B.C. Cleisthenes put in place the structures that completed the weakening of the aristocracy.', 0, NULL, 13, 8),
(35, 'By driving out the tyrants, Cleisthenes enabled the reforms that had been under way since the end of the century to reach their final form in 508 B. C.', 0, NULL, 13, 8),
(36, 'Toward the end of the century, the tyrants were driven out, and in 508 B. C. Cleisthenes saw that it was time to change the structures that had reduced aristocratic control', 1, NULL, 13, 8),
(37, 'ensure that every region had the same number of commissioners', NULL, NULL, 14, 9),
(38, 'distribute the population more equally throughout the Athens region', 1, NULL, 14, 9),
(39, 'limit the number of aristocratic clans', 0, NULL, 14, 9),
(40, 'reduce the importance of family connections', 0, NULL, 14, 9),
(41, 'determine what issues came before the assembly', 1, NULL, 15, 10),
(42, 'prepare the agenda for the courts', 0, NULL, 15, 10),
(43, 'carry out the assembly’s policies', 0, NULL, 15, 10),
(44, 'oversee the distribution of food and water', 0, NULL, 15, 10);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `exam_code` varchar(150) DEFAULT NULL,
  `exam_datetime` datetime DEFAULT NULL,
  `exam_duration` varchar(45) DEFAULT NULL,
  `exam_direction` varchar(255) DEFAULT NULL,
  `exam_text_title` varchar(150) DEFAULT NULL,
  `exam_text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_code`, `exam_datetime`, `exam_duration`, `exam_direction`, `exam_text_title`, `exam_text`) VALUES
(1, 'tpo40', '2020-08-04 02:00:00', '30 minutes', 'Welcome to the test. You have 30 minutes to finish the test.', 'Ancient Athens', '<p>One of the most important changes in Greece during the period from 800 B.C. to 500 B.C. was the rise of the polis, or city-state, and each polis developed a system of government that was appropriate to its circumstances. The problems that were faced and solved in Athens were the sharing of political power between the established aristocracy and the emerging other classes, and the adjustment of aristocratic ways of life to the ways of life of the new polis. It was the harmonious blending of all of these elements that was to produce the classical culture of Athens.</p>\r\n\r\n<p>Entering the polis age, Athens had the traditional institutions of other Greek proto-democratic states: an assembly of adult males, an aristocratic council, and annually elected officials. Within this traditional framework the Athenians, between 600 B.C. and 450 B.C., evolved what Greeks regarded as a fully fledged democratic constitution, though the right to vote was given to fewer groups of people than is seen in modem times.</p>\r\n\r\n<p>The first steps toward change were taken by Solon in 594 B.C.，when he broke the aristocracy\'s stranglehold on elected offices by establishing wealth rather than birth as the basis of office holding, abolishing the economic obligations of ordinary Athenians to the aristocracy, and allowing the assembly (of which all citizens were equal members) to overrule the decisions of local courts in certain cases. The strength of the Athenian aristocracy was further weakened during the rest of the century by the rise of a type of government known as a tyranny, which is a form of interim rule by a popular strongman (not rule by a ruthless dictator as the modern use of the term suggests to us). The Peisistratids, as the succession of tyrants were called (after the founder of the dynasty. Peisistratos), strengthened Athenian central administration at the expense of the aristocracy by appointing judges throughout the region, producing Athens’ first national coinage, and adding and embellishing festivals that tended to focus attention on Athens rather than on local villages of the surrounding region. By the end of the century, the time was ripe for more change the tyrants were driven out, and in 508 BC a new reformer, Cleisthenes gave final form to the developments reducing aristocratic control already under way.</p>\r\n\r\n<p>Cleisthenes\' principal contribution to the creation of democracy at Athens was to complete the long process of weakening family and clan structures, especially among the aristocrats, and to set in their place locality-based corporations called demes which became the point of entry for all civic and most religious life in Athens. Out of the demes were created 10 artificial tribes of roughly equal population. From the demes, by either election or selection, came 500 members of a new council, 6,000 jurors for the courts, 10 generals, and hundreds of commissioners. The assembly was sovereign in all matters but in practice delegated its power to subordinate bodies such as the council, which prepared the agenda for the meetings of the assembly, and me courts, which took care of most judicial matters Various committees acted as an executive branch, implementing policies of the assembly and supervising, for instance, the food and water supplies and public buildings. This wide-scale participation by the citizenry in the government distinguished the democratic form of the Athenian polis from other, less liberal forms.</p>\r\n\r\n<p>The effect of Cleisthenes\' reforms was to establish the superiority of the Athenian community as a whole over local institutions without destroying them. National politics rather than local or deme politics became the focal point. At the same time, entry into national politics began at the deme level and gave local loyalty a new focus: Athens itself. Over the next two centuries the implications of Cleisthenes\' reforms were fully exploited.</p>\r\n\r\n<p>During the fifth century B. C. the council of 500 was extremely influential in shaping policy. In the next century, however, it was the mature assembly that took on decision-making responsibility. By any measure other than that of the aristocrats, who had been upstaged by the supposedly inferior \"people,\" the Athenian democracy was a stunning success. Never before, or since, have so many people been involved in the serious business of self-governance. It was precisely this opportunity to participate in public life that provided a stimulus for the brilliant unfolding of classical Greek culture.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question_no` int(11) DEFAULT NULL,
  `question_title` varchar(255) DEFAULT NULL,
  `question_text` varchar(255) DEFAULT NULL,
  `question_mark` int(11) DEFAULT NULL,
  `question_correct_answer` enum('a','b','c','d') DEFAULT NULL,
  `exam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_no`, `question_title`, `question_text`, `question_mark`, `question_correct_answer`, `exam_id`) VALUES
(1, 1, 'Paragraph 1 supports which of the following statements about the Greek city-states?', NULL, 0, 'c', 1),
(2, 2, 'According to paragraph 2, Athens had all of the following before becoming a city- state EXCEPT', NULL, 0, 'c', 1),
(3, 3, 'According to paragraph 3, an important effect of making wealth the basis of office holding was to', NULL, 2, 'b', 1),
(9, 4, 'The word “abolishing” in the passage is closest in meaning to', NULL, 2, NULL, 1),
(10, 5, 'In paragraph 3, the author\'s explanation of the word “tyranny” indicates that', NULL, 2, NULL, 1),
(11, 6, 'According to paragraph 3, all of the following were true of the Peisistratids\' rule EXCEPT:', NULL, 0, NULL, 1),
(12, 7, 'The word “embellishing” in the passage is closest in meaning to', NULL, 0, NULL, 1),
(13, 8, 'Which of the sentences below best expresses the essential information in the highlighted sentence in the passage? Incorrect choices change the meaning in important ways or leave out essential information.', NULL, 0, NULL, 1),
(14, 9, 'According to paragraph 4, one effect of making the demes the point of entry for civic life was to', NULL, 0, NULL, 1),
(15, 10, 'According to paragraph 4, one role of the new council was to', NULL, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(150) DEFAULT NULL,
  `user_first_name` varchar(150) DEFAULT NULL,
  `user_last_name` varchar(150) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `user_first_name`, `user_last_name`, `is_admin`, `is_active`) VALUES
(1, 'admin@admin.com', 'admin', NULL, NULL, 1, 1),

-- --------------------------------------------------------

--
-- Table structure for table `user_exam_question_answer`
--

CREATE TABLE `user_exam_question_answer` (
  `user_exam_question_answer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_mark` int(11) NOT NULL,
  `user_answer` enum('a','b','c','d') DEFAULT NULL,
  `user_answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_has_exam`
--

CREATE TABLE `user_has_exam` (
  `user_exam_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `is_taken` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD UNIQUE KEY `answer_id_UNIQUE` (`answer_id`),
  ADD KEY `fk_answer_question_idx` (`question_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`),
  ADD UNIQUE KEY `exam_id_UNIQUE` (`exam_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD UNIQUE KEY `question_id_UNIQUE` (`question_id`),
  ADD KEY `fk_question_exam1_idx` (`exam_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`);

--
-- Indexes for table `user_exam_question_answer`
--
ALTER TABLE `user_exam_question_answer`
  ADD PRIMARY KEY (`user_exam_question_answer_id`),
  ADD UNIQUE KEY `user_exam_question_answer_id` (`user_exam_question_answer_id`);

--
-- Indexes for table `user_has_exam`
--
ALTER TABLE `user_has_exam`
  ADD PRIMARY KEY (`user_exam_id`),
  ADD UNIQUE KEY `user_exam_id_UNIQUE` (`user_exam_id`),
  ADD KEY `fk_user_has_exam_exam1_idx` (`exam_id`),
  ADD KEY `fk_user_has_exam_user1_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_answer_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_exam1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`);

--
-- Constraints for table `user_has_exam`
--
ALTER TABLE `user_has_exam`
  ADD CONSTRAINT `fk_user_has_exam_exam1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`),
  ADD CONSTRAINT `fk_user_has_exam_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
