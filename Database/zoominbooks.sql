-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 03 Ιουλ 2016 στις 09:22:43
-- Έκδοση διακομιστή: 10.1.13-MariaDB
-- Έκδοση PHP: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `zoominbooks`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL,
  `announcement_content` varchar(1000) COLLATE utf8_bin NOT NULL,
  `announcement_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `announcement_content`, `announcement_date`) VALUES
(1, 'cnjksdncks cnsdjcnks\r\ncdkscksmdc\r\nansckamnclka', '2016-06-29');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(100) COLLATE utf8_bin NOT NULL,
  `blog_content` varchar(1000) COLLATE utf8_bin NOT NULL,
  `blog_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_content`, `blog_date`) VALUES
(1, 'vfnjkdnjk', 'kncdlknsl dmksmklds', '2016-06-29 18:46:47');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `books`
--

CREATE TABLE `books` (
  `Book_id` int(11) NOT NULL,
  `ISBN` varchar(60) COLLATE utf8_bin NOT NULL,
  `Title` varchar(70) COLLATE utf8_bin NOT NULL,
  `Writer` varchar(50) COLLATE utf8_bin NOT NULL,
  `Illustrator` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Publisher` varchar(50) COLLATE utf8_bin NOT NULL,
  `Pages` int(4) NOT NULL,
  `Persentage_of_images` float NOT NULL,
  `Min_age_no_read` int(2) NOT NULL,
  `Min_age_read` int(2) NOT NULL,
  `For_parents` bit(1) NOT NULL,
  `Cover` varchar(100) COLLATE utf8_bin NOT NULL,
  `Back_cover` varchar(100) COLLATE utf8_bin NOT NULL,
  `Link` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `Price` float NOT NULL,
  `Hard_copy` bit(1) NOT NULL,
  `E_book` bit(1) NOT NULL,
  `Audio_book` bit(1) NOT NULL,
  `Curriculum` varchar(1000) COLLATE utf8_bin NOT NULL,
  `Show_to_user` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `books`
--

INSERT INTO `books` (`Book_id`, `ISBN`, `Title`, `Writer`, `Illustrator`, `Publisher`, `Pages`, `Persentage_of_images`, `Min_age_no_read`, `Min_age_read`, `For_parents`, `Cover`, `Back_cover`, `Link`, `Price`, `Hard_copy`, `E_book`, `Audio_book`, `Curriculum`, `Show_to_user`) VALUES
(1, 'bhj', 'cdhj', 'bhjb', 'hj', 'bhj', 45, 45, 45, 45, b'0', '131179.png', 'aa.png', '56', 45, b'0', b'0', b'0', '', b'0'),
(2, 'jkb', 'vnfjks', 'j', 'kn', 'jkb', 1, 1, 1, 1, b'0', '202824.png', 'aa.png', '1', 1, b'0', b'0', b'0', '', b'0'),
(3, 'vgvk', 'vgjkjbjk', 'ghjqcgkh', 'vhjk', 'vho', 155115, 965, 85, 164, b'0', '', 'aa.png', 'cgvjhkl', 965, b'0', b'0', b'0', '', b'0'),
(4, 'b', 'vnsdj', 'njk', 'bnjk', 'bjk', 96, 9, 6, 9, b'0', 'aa.png', 'aa.png', '996', 6, b'0', b'0', b'0', '', b'0'),
(5, 'jkb', 'fbhj', 'njkn', 'jkb', 'jb', 1212, 1212, 1212, 121212, b'0', 'aa.png', 'aa.png', 'g hjmk', 1212, b'0', b'0', b'0', '', b'0'),
(6, '451-592-222', 'Σοκ', 'Καπιοσς', 'Μαλλο', 'Κοκαοα', 65, 21, 4, 7, b'1', 'group.png', 'group2.png', 'ψδβηαψαηξ', 95, b'1', b'1', b'1', 'δνμκαοψφξδιω ωνξφδνωοδ\r\nφιθηωιοσω\r\nημιογξτιηοδποιηξροπτ', b'1'),
(7, '48496', 'ψδνξκσνψκα', 'μκομκοψ', 'ομκομ', 'μκομο', 66, 65, 5, 5, b'1', 'grad.png', 'pan.png', 'ψξιοδσξοψσ', 555, b'1', b'1', b'1', 'ψδσ', b'1'),
(8, '156', 'νωξκσδ', 'μκνκο', 'νξ', 'νξ', 156, 156, 156, 156, b'0', 'ire.png', 'and.png', 'ψδξκσνσ', 66, b'0', b'0', b'0', 'κμνκνκνκ\r\nμκμκλ', b'0'),
(9, 'mom', 'cmosdn', 'mopmopm', 'mkomok', 'mkomk', 54, 54, 54, 54, b'1', 'and.png', 'aa.png', 'cdsop', 54, b'0', b'1', b'1', 'cmdks\r\ncmksdomcos\r\ncomksdc', b'0');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `bookshops`
--

CREATE TABLE `bookshops` (
  `Bookshop_id` int(11) NOT NULL,
  `Bookshop_name` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `books_keywords`
--

CREATE TABLE `books_keywords` (
  `Book_id` int(11) NOT NULL,
  `Keyword_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `books_keywords`
--

INSERT INTO `books_keywords` (`Book_id`, `Keyword_id`) VALUES
(6, 7),
(6, 9),
(9, 1),
(9, 5);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `categories`
--

CREATE TABLE `categories` (
  `Category_id` int(11) NOT NULL,
  `Name_of_category` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `categories`
--

INSERT INTO `categories` (`Category_id`, `Name_of_category`) VALUES
(1, 'Ηθικά/ Πνευματικά μηνυματα'),
(2, 'Ανάλυση-κατανόηση και παραγωγή γραπτού λόγου / Σκέφτομαι και Γράφω '),
(3, 'Γραμματική – Σύνταξη – Λεξιλόγιο'),
(4, 'Σύνδεση με διάφορα άλλα θέματα'),
(5, 'Επιπλέον χαρακτηριστικά');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `keywords`
--

CREATE TABLE `keywords` (
  `Keyword_id` int(11) NOT NULL,
  `Name_of_keyword` varchar(150) COLLATE utf8_bin NOT NULL,
  `Subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `keywords`
--

INSERT INTO `keywords` (`Keyword_id`, `Name_of_keyword`, `Subcategory_id`) VALUES
(1, 'Ο επιμένων νικά', 1),
(2, 'Ο τολμών νικά', 1),
(3, 'Υπομονή – καρτερικότητα ως αρετές', 1),
(4, 'Αγάπη', 1),
(5, 'Συγνώμη - Συγχώρεση', 1),
(6, 'Εκτίμηση', 1),
(7, 'Στοχοπροσήλωση', 1),
(8, 'Αισιοδοξία', 1),
(9, 'Θεώρηση μειονεκτήματος ως πλεονέκτημα', 1),
(10, 'Σκληρή δουλειά Vs τεμπελιά', 1),
(11, 'Σημασία ασφάλειας – προετοιμασίας για παν ενδεχόμενο – καχυποψία -εμπιστοσύνη', 1),
(12, 'Όνειρα', 1),
(13, 'Λύση προβλήματος', 1),
(14, 'Συνέπειες των πράξεων μας', 1),
(15, 'Νίκη, ήττα. Δεν χρειάζεται να νικήσεις για να απολαύσεις το παιχνίδι', 1),
(16, 'Αποδοχή και ενδυνάμωση εαυτού- αυτοεικόνα, αυτοεκτίμηση, αυτοπεποίθηση', 1),
(17, 'Αντιμετώπιση φόβων', 1),
(18, 'Αγάπη στα Βιβλία, γνώση = δύναμη, αποτροπή χειραγώγησης από άλλους', 1),
(19, 'Η δύναμη του εξυπνότερου υπερτερεί της σωματικής δύναμης', 1),
(20, 'Βιαστικά συμπεράσματα μπορεί να οδηγήσουν σε προκαταλήψεις', 1),
(21, 'Ανατροπή στερεοτύπων - προκαταλήψεων', 1),
(22, 'ΑΜΕΑ – Άτομα με ειδικές ανάγκες – Ενιαία Εκπαίδευση', 2),
(23, 'Ιδιαίτερο χαρακτηριστικό – εξωτερική εμφάνιση', 2),
(24, 'Xώρα καταγωγής - ρατσισμό, Ξενοφοβία – ξενοφιλία', 2),
(25, 'Kοινωνική τάξη', 2),
(26, 'Δεξιότητες', 2),
(27, 'Πρώτη μέρα στο σχολείο', 3),
(28, 'Ψείρες – κόψιμο μαλλιών', 3),
(29, 'Σχολικός εκφοβισμός – Bullying, Θύμα, Θύτης ', 3),
(32, 'Αποφυγή καυγά', 3),
(33, 'Έννοια οικογένειας και διαφοροποίηση του θεσμού στη σημερινή εποχή', 6),
(34, 'Σχέση παιδιού με γονείς', 6),
(35, 'Νέο μωρό -Εγκυμοσύνη', 6),
(36, 'Αδερφική αγάπη -ζήλια', 6),
(37, 'Ορφάνια', 6),
(38, 'Παππούς-γιαγιά', 6),
(39, 'Ανεργία στην οικογένεια', 6),
(40, 'Έρωτας', 6),
(41, 'Ρωτούμε πάντα ποιος είναι στην πόρτα', 6),
(42, 'Φαγητό – Διατροφή- Παχυσαρκία', 6),
(43, 'Τηλεόραση', 6),
(44, 'Σχέση με τα ζώα', 6),
(45, 'Αποχωρισμός – θάνατος', 6),
(46, 'Αστυφιλία', 7),
(47, 'Φύση- δέντρα', 7),
(48, 'Περιβαλλοντική-οικολογική συνείδηση', 7),
(49, 'Ανακύκλωση', 7),
(50, 'Εναλλακτικές – ανανεώσιμες πηγές ενέργειας', 7),
(51, 'Η ειρήνη νικά τον πόλεμο – αντιπολεμικό', 7),
(52, 'Εξουσία', 7),
(53, 'Νόμοι', 7),
(54, 'Αντίδραση στην Καταπίεση - πώς λέμε όχι', 1),
(55, 'Προπαγάνδα ΜΜΕ', 7),
(56, 'Αφθονία –Καταναλωτισμός και αλλαγή συνηθειών', 7),
(57, 'Τεχνολογία', 7),
(58, 'Ημερολόγιο', 8),
(59, 'Ερωτηματολόγιο -κουίζ', 8),
(60, 'Ρίμες – ομοιοκαταληξία -ποίημα', 8),
(61, 'Επιστολή/γράμμα- επίσημη-ανεπίσημη', 8),
(62, 'Γλωσσοδέτες', 8),
(63, 'Γρίφοι – στοιχεία', 8),
(64, 'Πινακίδες', 8),
(65, 'Παροιμίες', 8),
(66, 'Αγγελίες', 8),
(67, 'Διαφημίσεις', 8),
(68, 'Βιογραφικό σημείωμα', 8),
(69, 'Άρθρο – εφημερίδα', 8),
(70, 'Συνταγή', 8),
(71, 'Θεατρικό έργο', 8),
(72, 'Επιχειρηματολογικό ', 8),
(73, 'Γραφική νουβέλα (graphic novel)', 8),
(74, 'Μελέτη περίπτωσης (Case study)', 8),
(75, 'Μεγάλα γράμματα', 10),
(76, 'Ανθρωπομορφισμός – ανθρωποποίηση - προσωποποίηση', 11),
(77, 'Χιούμορ', 11),
(78, 'Επίθετα', 11),
(79, 'Επιρρήματα', 11),
(80, 'Λογοτεχνικό ύφος', 11),
(81, 'Λεπτομερείς περιγραφές - Σχηματισμός νοερών εικόνων που καλύπτουν τις  αισθήσεις', 11),
(82, 'Σχηματισμός νοερών εικόνων που καλύπτουν τις αισθήσεις μέσα από τις περιγραφές', 11),
(83, 'Ειρωνεία', 11),
(84, 'Αναβολή', 11),
(85, 'Υπερβολή', 11),
(86, 'Υπερφυσικό στοιχείο', 11),
(87, 'Φαντασία', 11),
(88, 'Ρίμες- ομοιοκαταληξία ποίημα', 12),
(89, 'Βοηθητικό για διδασκαλία παραγράφου', 12),
(90, 'Δομικά στοιχεία ενός κειμένου (χώρος, χρόνος, πρόσωπα…)', 12),
(91, 'Μονόλογος', 12),
(92, 'Διάλογος', 12),
(93, 'Κυριολεξία – μεταφορά – κυριολεξοποίηση της μεταφοράς', 11),
(94, 'Επανάληψη', 12),
(95, 'Μοτίβο', 12),
(96, 'Ενεστώτας', 13),
(98, 'Παρατατικός', 13),
(99, 'Αόριστος', 13),
(100, 'Υπερσυντέλικος', 13),
(102, 'Στιγμιαίος/Συνοπτικός Μέλλοντας', 13),
(103, 'Εξακολουθητικός Μέλλοντας', 13),
(104, 'Συντελεσμένος Μέλλοντας', 13),
(105, 'ενικός-πληθυντικός', 14),
(106, 'ορθογραφία καταλήξεων', 15),
(107, 'Προστακτική', 18),
(108, 'Υποτακτική', 18),
(109, 'Ενεργητική – Παθητική φωνή', 18),
(110, 'Ρήματα σε: -ίζω ', 19),
(111, 'Προσωπικές αντωνυμίες', 19),
(112, 'Επίθετα – αριθμητικά', 19),
(113, 'Επιρρήματα', 19),
(114, 'Επαγγέλματα', 20),
(115, 'Οχήματα', 20),
(116, 'Χρόνος – εποχές- μήνες', 20),
(117, 'Μέρες εβδομάδας', 20),
(118, 'πολέμου', 20),
(119, 'Τσίρκο', 20),
(120, 'Πειρατές', 20),
(121, 'Εξωγήινοι', 20),
(122, 'Στρατός', 20),
(123, 'Αθλητισμός', 20),
(124, 'Ολυμπιακοί- Παραολυμπιακοί Αγώνες', 20),
(125, 'Παράγωγες λέξεις', 21),
(126, 'Σύνθετες λέξεις', 21),
(127, 'Ανάλυση λέξης', 21),
(128, 'Ηχητικές λέξεις – λέξεις που παραπέμπουν σε ήχους', 21),
(129, 'Υποκοριστικά', 21),
(130, 'Προθέματα', 21),
(131, 'Παραλλαγές λέξεων- αυτοσχέδιες λέξεις – επανανακάλυψη γλώσσας', 11),
(132, 'Ελλειπτικές προτάσεις', 22),
(133, 'Υποθετικές προτάσεις', 22),
(134, 'Ρητορικά ερωτήματα', 22),
(135, 'Ασύνδετο σχήμα', 22),
(136, 'Ευθύς – πλάγιος λόγος', 22),
(137, 'Αναλογίες', 23),
(138, 'Γεωμετρία', 23),
(139, 'Αριθμητική', 23),
(140, 'Χαρά -ευτυχία', 24),
(141, 'Λύπη', 24),
(142, 'Φόβο – τρόμο', 24),
(143, 'Μοναξιά', 24),
(144, 'Απογοήτευση', 24),
(145, 'Σκίτσο', 25),
(146, 'Συνδυασμός μέσων', 25),
(147, 'Ένταξη γραπτού κειμένου', 25),
(148, 'Γραμματοσειρά', 25),
(149, 'Χρήση μεταφοράς και στις εικόνες', 25),
(150, 'Χτίσιμο σπιτιών από διαφορετικά υλικά', 38),
(151, 'Πείραμα για ανανεώσιμες πηγές ενέργειας', 26),
(152, 'Επιστημονική μέθοδος για μελέτη ενός άγνωστου αντικειμένου', 26),
(153, 'Μετατροπή κάμπιας σε πεταλούδα', 26),
(154, 'Περιστροφή- περιφορά γης- εποχές-μέρα νύχτα', 26),
(155, 'Πλανήτες', 26),
(156, 'Σημεία του ορίζοντα', 27),
(157, 'Καιρικά φαινόμενα', 27),
(158, 'Χάρτης', 27),
(159, 'Περιοχές στην Ελλάδα', 27),
(160, 'Ευρωπαϊκές χώρες', 27),
(161, 'Ελληνικός πολιτισμός', 27),
(162, 'Βραζιλία', 27),
(163, 'Νιγηρία', 27),
(164, 'Αγγλία', 27),
(165, 'Ταζμανία', 27),
(166, 'φακίριδες', 27),
(167, 'Διάκριση αιτίας με αφορμή', 28),
(168, 'Αναφορά στον Μ. Αλέξανδρο', 28),
(169, 'Αναφορά στον Πήγασο', 29),
(171, 'Χριστούγεννα', 30),
(172, '28η Οκτωβρίου ', 30),
(173, 'Υγιεινή δοντιών', 31),
(174, 'Θρεπτικά συστατικά', 31),
(175, 'Εκλογές', 32),
(176, 'Να ρωτούμε πάντα και την άλλη πλευρά', 1),
(177, 'Εμπάθεια – ενσυναίσθηση', 1),
(178, 'Φιλανθρωπία', 1),
(179, 'Φιλία χωρίς εγωισμό', 3),
(180, 'Αντίδραση στην καταπίεση ', 7),
(181, 'Ανεργία', 7),
(182, 'Διασκευή – παραλλαγή διαφορετική εκδοχή παραμυθιού / ιστορίας', 9),
(183, 'Πολυτροπικότητα – για άτομα που μαθαίνουν ελληνικά, που ξεκινούν ή δυσκολεύονται στην ανάγνωση.', 10),
(184, 'Επιχειρηματολογία', 11),
(185, 'Παρακείμενος', 13),
(186, 'Περιβάλλον- Οικολογία', 20),
(187, 'Χρονικές προτάσεις', 22),
(188, 'Κύπρος', 27);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `not_found_keywords`
--

CREATE TABLE `not_found_keywords` (
  `Not_found_keyword_id` int(11) NOT NULL,
  `Not_found_keyword` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `stores`
--

CREATE TABLE `stores` (
  `Store_id` int(11) NOT NULL,
  `Bookshop_id` int(11) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `store_books`
--

CREATE TABLE `store_books` (
  `Store_id` int(11) NOT NULL,
  `Book_id` int(11) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `subcategories`
--

CREATE TABLE `subcategories` (
  `Subcategory_id` int(11) NOT NULL,
  `Name_of_subcategory` varchar(150) COLLATE utf8_bin NOT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `subcategories`
--

INSERT INTO `subcategories` (`Subcategory_id`, `Name_of_subcategory`, `Category_id`) VALUES
(1, 'Ευθύνη εαυτού', 1),
(2, 'Διαφορετικότητα όσον αφορά', 1),
(3, 'Σχολείο', 1),
(5, 'Φιλία', 1),
(6, 'Οικογένεια', 1),
(7, 'Κοινωνία περιβάλλον και σύγχρονα θέματα', 1),
(8, 'Κειμενικά είδη', 2),
(9, 'Παραλλαγή παραμυθιού ', 2),
(10, 'Πολυτροπικότητα ', 2),
(11, 'Λογοτεχνικά είδη και φαινόμενα', 2),
(12, 'Δομή Κειμένου', 2),
(13, 'Χρόνοι', 3),
(14, 'Αριθμός', 3),
(15, 'Πρόσωπα (εγώ, εσύ, αυτός, εμείς, εσείς, αυτοί)', 3),
(16, 'Σημεία στίξης', 3),
(17, 'Σημασία τονισμού', 3),
(18, 'Εγκλίσεις', 3),
(19, 'Μέρη του Λόγου', 3),
(20, 'Λεξιλόγιο – έννοιες', 3),
(21, 'Δομή Λέξης', 3),
(22, 'Δομή Πρότασης', 3),
(23, 'Μαθηματικά', 4),
(24, 'Συναισθηματική αγωγή', 4),
(25, 'Σχεδιασμός/ design – Τέχνη', 4),
(26, 'Επιστήμη/ φυσική', 4),
(27, 'Γεωγραφία – Κουλτούρα- Πολιτισμός', 4),
(28, 'Ιστορία', 4),
(29, 'Μυθολογία', 4),
(30, 'Εορταστικές περίοδοι – Θρησκευτικά/ πίστη', 4),
(31, 'Αγωγή Ζωής – Οικιακή Οικονομία', 4),
(32, 'Πολιτική αγωγή', 4),
(33, 'Μουσική', 4),
(37, 'Ενεργητική – Παθητική φωνή', 3),
(38, 'Δεξιότητες ζωής', 4),
(39, 'Αρχέτυπο – κανόνας των τριών', 4),
(40, 'Βραβεία - Έπαινοι', 5),
(41, 'Φιλανθρωπικό έργο', 5),
(42, 'Περιβαλλοντικό έργο', 5),
(43, '+ cd', 5),
(44, 'Εικόνες Pop-up', 5),
(45, 'Λειτουργία άγγιξε και νιώσε', 5),
(46, '+ ασκήσεις για τα παιδιά', 5),
(47, '+ δραστηριότητες για τα παιδιά', 5),
(48, '+ συμβουλές για τους γονείς', 5),
(49, '+ πηγές για επιπρόσθετες πληροφορίες', 5),
(50, 'Συμπλήρωση συνέχειας ιστορίας/ τέλους από το παιδί/ αναγνώστη', 5);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Ευρετήρια για πίνακα `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Ευρετήρια για πίνακα `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_id`);

--
-- Ευρετήρια για πίνακα `bookshops`
--
ALTER TABLE `bookshops`
  ADD PRIMARY KEY (`Bookshop_id`);

--
-- Ευρετήρια για πίνακα `books_keywords`
--
ALTER TABLE `books_keywords`
  ADD PRIMARY KEY (`Book_id`,`Keyword_id`),
  ADD KEY `Keyword_id` (`Keyword_id`);

--
-- Ευρετήρια για πίνακα `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_id`);

--
-- Ευρετήρια για πίνακα `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`Keyword_id`),
  ADD KEY `Subcategory_id` (`Subcategory_id`);

--
-- Ευρετήρια για πίνακα `not_found_keywords`
--
ALTER TABLE `not_found_keywords`
  ADD PRIMARY KEY (`Not_found_keyword_id`);

--
-- Ευρετήρια για πίνακα `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`Store_id`);

--
-- Ευρετήρια για πίνακα `store_books`
--
ALTER TABLE `store_books`
  ADD PRIMARY KEY (`Store_id`,`Book_id`),
  ADD KEY `Book_id` (`Book_id`);

--
-- Ευρετήρια για πίνακα `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`Subcategory_id`),
  ADD KEY `Category_id` (`Category_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT για πίνακα `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT για πίνακα `books`
--
ALTER TABLE `books`
  MODIFY `Book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT για πίνακα `bookshops`
--
ALTER TABLE `bookshops`
  MODIFY `Bookshop_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT για πίνακα `keywords`
--
ALTER TABLE `keywords`
  MODIFY `Keyword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
--
-- AUTO_INCREMENT για πίνακα `not_found_keywords`
--
ALTER TABLE `not_found_keywords`
  MODIFY `Not_found_keyword_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `stores`
--
ALTER TABLE `stores`
  MODIFY `Store_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `Subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `books_keywords`
--
ALTER TABLE `books_keywords`
  ADD CONSTRAINT `books_keywords_ibfk_1` FOREIGN KEY (`Book_id`) REFERENCES `books` (`Book_id`),
  ADD CONSTRAINT `books_keywords_ibfk_2` FOREIGN KEY (`Keyword_id`) REFERENCES `keywords` (`Keyword_id`);

--
-- Περιορισμοί για πίνακα `keywords`
--
ALTER TABLE `keywords`
  ADD CONSTRAINT `keywords_ibfk_1` FOREIGN KEY (`Subcategory_id`) REFERENCES `subcategories` (`Subcategory_id`);

--
-- Περιορισμοί για πίνακα `store_books`
--
ALTER TABLE `store_books`
  ADD CONSTRAINT `store_books_ibfk_1` FOREIGN KEY (`Book_id`) REFERENCES `books` (`Book_id`),
  ADD CONSTRAINT `store_books_ibfk_2` FOREIGN KEY (`Store_id`) REFERENCES `stores` (`Store_id`);

--
-- Περιορισμοί για πίνακα `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `categories` (`Category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
