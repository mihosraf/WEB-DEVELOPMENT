-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2019 at 07:10 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni`
--

-- --------------------------------------------------------

--
-- Table structure for table `dhlwsh`
--

CREATE TABLE `dhlwsh` (
  `studentid` int(10) NOT NULL,
  `isdn` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhlwsh`
--

INSERT INTO `dhlwsh` (`studentid`, `isdn`) VALUES
(1, 225),
(1, 45390),
(2, 225),
(8, 986),
(8, 782862);

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `school` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `semester` int(2) NOT NULL,
  `course` varchar(100) NOT NULL,
  `course_id` int(100) NOT NULL,
  `book` varchar(100) NOT NULL,
  `isdn` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`school`, `department`, `semester`, `course`, `course_id`, `book`, `isdn`) VALUES
('ΕΘΝΙΚΟ ΚΑΙ ΚΑΠΟΔΙΣΤΡΙΑΚΟ ΠΑΝΕΠΙΣΤΗΜΙΟ ΑΘΗΝΩΝ', 'ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ', 1, 'ΔΙΑΚΡΙΤΑ ΜΑΘΗΜΑΤΙΚΑ', 15100010, 'ΣΤΟΙΧΕΙΑ ΔΙΑΚΡΙΤΩΝ ΜΑΘΗΜΑΤΙΚΩΝ, LIU C.L.', 225),
('ΑΣΣΟΕ', 'ΚΟΙΝΩΝΙΟΛΟΓΙΑ', 3, 'ΕΠΙΣΤΗΜΕΣ', 33333, 'ΘΕΜΑΤΑ', 875),
('ΕΜΠ', 'ΗΛΕΚΤΡΟΛΟΓΩΝ ΜΗΧΑΝΙΚΩΝ', 7, 'ΑΛΛΑΓΜΑ ΛΑΜΠΑΣ', 837652, 'ΣΧΕΔΙΑΣΜΟΣ ΓΙΑ ΛΑΜΠΙΟΝΙΑ', 986),
('ΕΘΝΙΚΟ ΚΑΙ ΚΑΠΟΔΙΣΤΡΙΑΚΟ ΠΑΝΕΠΙΣΤΗΜΙΟ ΑΘΗΝΩΝ', 'ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ', 2, 'ΔΟΜΕΣ ΔΕΔΟΜΕΝΩΝ ΚΑΙ ΤΕΧΝΙΚΕΣ ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΥ', 15100088, 'ΑΛΓΟΡΙΘΜΟΙ ΣΕ C, ΜΕΡΗ 1-4: ΘΕΜΕΛΙΩΔΕΙΣ ΕΝΝΟΙΕΣ, ΔΟΜΕΣ ΔΕΔΟΜΕΝΩΝ, ΤΑΞΙΝΟΜΗΣΗ, ΑΝΑΖΗΤΗΣΗ, ROBERT SEDGE', 13584),
('ΕΚΠΑ', 'ΙΑΤΡΙΚΗ', 5, 'ΒΙΟΛΟΓΙΑ 3', 262626, 'ΒΙΟΛΟΓΙΚΕΣ ΕΞΕΛΙΞΕΙΣ', 22211),
('ΕΘΝΙΚΟ ΚΑΙ ΚΑΠΟΔΙΣΤΡΙΑΚΟ ΠΑΝΕΠΙΣΤΗΜΙΟ ΑΘΗΝΩΝ', 'ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ', 3, 'ΠΙΘΑΝΟΤΗΤΕΣ ΚΑΙ ΣΤΟΙΧΕΙΑ ΣΤΑΤΙΣΤΙΚΗΣ', 15100431, 'Εισαγωγή στις Πιθανότητες και τη Στατιστική, Δαμιανού Χ., Χαραλαμπίδης Χ., Παπαδάτος Ν.', 35478),
('ΕΘΝΙΚΟ ΚΑΙ ΚΑΠΟΔΙΣΤΡΙΑΚΟ ΠΑΝΕΠΙΣΤΗΜΙΟ ΑΘΗΝΩΝ', 'ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ', 2, 'ΑΝΑΛΥΣΗ 1', 15100001, 'Εφαρμοσμένος Απειροστικός Λογισμός, Τσίτσας Λ.', 45390),
('ΑΣΣΟΕ', 'ΚΟΙΝΩΝΙΟΛΟΓΙΑ', 3, 'ΚΟΙΝΟΝΙΚΕΣ ΕΠΙΣΤΗΜΕΣ', 484858585, 'ΚΟΙΝΟΝΙΚΑ ΘΕΜΑΤΑ', 70875),
('ΕΜΠ', 'ΠΟΛΙΤΙΚΩΝ ΜΗΧΑΝΙΚΩΝ', 4, 'ΑΝΤΟΧΗ ΥΛΙΚΩΝ 1', 56969, 'ΥΛΙΚΑ ΟΙΚΟΔΟΜΗΣ', 75757),
('ΕΚΠΑ', 'ΠΑΙΔΑΓΩΓΙΚΟ', 6, 'ΕΚΠΑΙΔΕΥΣΗ ΑΤΙΘΑΣΩΝ ΝΕΩΝ', 8982, 'ΕΝΑΣ ΧΡΟΝΟΣ ΣΤΗ ΦΥΛΑΚΗ ΑΝΗΛΙΚΩΝ', 782862),
('ΕΚΠΑ', 'ΟΙΚΟΝΟΜΙΚΟ', 2, 'ΟΙΚΟΝΟΜΙΑ', 12345, 'ΘΕΩΡΙΑ ΟΙΚΟΝΟΜΙΑΣ', 2222222),
('ΕΘΝΙΚΟ ΚΑΙ ΚΑΠΟΔΙΣΤΡΙΑΚΟ ΠΑΝΕΠΙΣΤΗΜΙΟ ΑΘΗΝΩΝ', 'ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ', 5, 'ΤΕΧΝΗΤΗ ΝΟΗΜΟΣΥΝΗ', 15100065, 'ΤΕΧΝΗΤΗ ΝΟΗΜΟΣΥΝΗ, ΒΛΑΧΑΒΑΣ Ι.,ΚΕΦΑΛΑΣ Π.,ΒΑΣΙΛΕΙΑΔΗΣ Ν.,ΚΟΚΚΟΡΑΣ Φ.,ΣΑΚΕΛΛΑΡΙΟΥ Η.', 12867416),
('ΕΘΝΙΚΟ ΚΑΙ ΚΑΠΟΔΙΣΤΡΙΑΚΟ ΠΑΝΕΠΙΣΤΗΜΙΟ ΑΘΗΝΩΝ', 'ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ', 1, 'ΔΙΑΚΡΙΤΑ ΜΑΘΗΜΑΤΙΚΑ', 15100010, 'Διακριτά μαθηματικά και εφαρμογές τους, 8η Έκδοση, Rosen Kenneth H., Παναγιώτης Μποζάνης', 77106820),
('ΕΘΝΙΚΟ ΚΑΙ ΚΑΠΟΔΙΣΤΡΙΑΚΟ ΠΑΝΕΠΙΣΤΗΜΙΟ ΑΘΗΝΩΝ', 'ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ', 4, 'ΔΙΚΤΥΑ ΕΠΙΚΟΙΝΩΝΙΩΝ Ι', 15100405, 'Δικτύωση Υπολογιστών, 7η Έκδοση, James F. Kurose, Keith W. Ross', 77106973);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) NOT NULL,
  `university` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` varchar(2) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `university`, `status`) VALUES
(1, 'kotsa', '123', '', '', '', 'Φ'),
(2, 'myst', '456', '', '', '', ''),
(5, 'markos', '123', '', '', '', ''),
(6, 'sakis', '123', 'Σακης', 'sakis@yahoo.gr', 'Πειραια', 'Φ'),
(7, 'sofia', '123', 'Σοφια', 'sofia@gmail.com', 'ΤΕΙ Πειραια', 'Φ'),
(8, 'tanasis', '123', 'Θανασης', 'thanos@gmail.com', 'Οικονομικο', 'Ε');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dhlwsh`
--
ALTER TABLE `dhlwsh`
  ADD PRIMARY KEY (`studentid`,`isdn`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`isdn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
