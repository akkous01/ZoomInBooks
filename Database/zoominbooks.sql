-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 15 Ιουν 2016 στις 14:10:19
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
  `Min_age` int(11) NOT NULL,
  `Max_age` int(11) NOT NULL,
  `Cover` blob NOT NULL,
  `Back_cover` blob NOT NULL,
  `Link` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `categories`
--

CREATE TABLE `categories` (
  `Category_id` int(11) NOT NULL,
  `Name_of_category` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `keywords`
--

CREATE TABLE `keywords` (
  `Keyword_id` int(11) NOT NULL,
  `Name_of_keyword` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `keywords_subcategories`
--

CREATE TABLE `keywords_subcategories` (
  `Keyword_id` int(11) NOT NULL,
  `Subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `Name_of_subcategory` varchar(50) COLLATE utf8_bin NOT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Ευρετήρια για άχρηστους πίνακες
--

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
  ADD PRIMARY KEY (`Keyword_id`);

--
-- Ευρετήρια για πίνακα `keywords_subcategories`
--
ALTER TABLE `keywords_subcategories`
  ADD PRIMARY KEY (`Keyword_id`,`Subcategory_id`),
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
  ADD PRIMARY KEY (`Subcategory_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `books`
--
ALTER TABLE `books`
  MODIFY `Book_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `bookshops`
--
ALTER TABLE `bookshops`
  MODIFY `Bookshop_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `keywords`
--
ALTER TABLE `keywords`
  MODIFY `Keyword_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `Subcategory_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- Περιορισμοί για πίνακα `keywords_subcategories`
--
ALTER TABLE `keywords_subcategories`
  ADD CONSTRAINT `keywords_subcategories_ibfk_1` FOREIGN KEY (`Keyword_id`) REFERENCES `keywords` (`Keyword_id`),
  ADD CONSTRAINT `keywords_subcategories_ibfk_2` FOREIGN KEY (`Subcategory_id`) REFERENCES `subcategories` (`Subcategory_id`);

--
-- Περιορισμοί για πίνακα `store_books`
--
ALTER TABLE `store_books`
  ADD CONSTRAINT `store_books_ibfk_1` FOREIGN KEY (`Book_id`) REFERENCES `books` (`Book_id`),
  ADD CONSTRAINT `store_books_ibfk_2` FOREIGN KEY (`Store_id`) REFERENCES `stores` (`Store_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
