-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2025 at 07:13 PM
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
-- Database: `webapp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `member_only` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `author`, `description`, `price`, `image_path`, `member_only`, `created_at`) VALUES
(1, 'Dubliners', 'James Joyce', 'A collection of short stories depicting the everyday life of Dublin\'s residents, capturing moments of epiphany and personal reflection.', 12.99, '/Views/Images/shop/dubliners.jpg', 0, '2025-03-18 15:23:36'),
(2, 'Four Tragedies', 'William Shakespeare', 'A compilation of Shakespeare\'s tragic plays, exploring themes of ambition, jealousy, madness, and betrayal.', 12.99, '/Views/Images/shop/fours_tragedies.jpg', 0, '2025-03-18 15:23:36'),
(3, 'The Phantom of the Opera', 'Gaston Leroux', 'A mysterious figure haunts the Paris Opera House, obsessing over a young soprano and leading to dramatic consequences.', 14.25, '/Views/Images/shop/the_phantom_of_the_opera.jpg', 0, '2025-03-18 15:23:36'),
(4, 'My Brilliant Career', 'Miles Franklin', 'A headstrong young woman in rural Australia strives for independence and literary success, challenging societal expectations.', 12.99, '/Views/Images/shop/my_brilliant_career.jpg', 0, '2025-03-18 15:23:36'),
(5, 'The Haunting of Hill House', 'Shirley Jackson', 'A group investigates a notoriously haunted mansion, confronting both supernatural and psychological terrors.', 15.00, '/Views/Images/shop/Haunting_of_hill_house.jpg', 0, '2025-03-18 15:23:36'),
(6, 'Jane Eyre', 'Charlotte Bronte', 'An orphaned governess falls in love with her enigmatic employer, uncovering dark secrets in his mansion.', 12.99, '/Views/Images/shop/jane_eyre.jpg', 0, '2025-03-18 15:23:36'),
(7, 'Pride and Prejudice', 'Jane Austin', 'Elizabeth Bennet navigates love, family, and societal expectations in 19th-century England.', 15.50, '/Views/Images/shop/Pride_prejudice.jpg', 0, '2025-03-18 15:23:36'),
(8, 'Moby-Dick', 'Herman Melville', 'Captain Ahab obsessively hunts the elusive white whale, leading his crew on a perilous journey.', 18.99, '/Views/Images/shop/moby_dick.jpg', 0, '2025-03-18 15:23:36'),
(9, 'Great Expectations', 'Charles Dickens', 'An orphan named Pip rises through society, grappling with love, wealth, and personal growth.', 20.99, '/Views/Images/shop/great_expectations.jpg', 0, '2025-03-18 15:23:36'),
(10, 'Wuthering Heights', 'Emily Bronte', 'A tale of intense and destructive love set on the Yorkshire moors.', 13.75, '/Views/Images/shop/wuthering_heights.jpg', 1, '2025-03-18 15:23:36'),
(11, 'Frankenstein', 'Mary Shelly', 'A scientist creates life, leading to tragic consequences as his creature seeks acceptance.', 12.99, '/Views/Images/shop/frank.jpg', 1, '2025-03-18 15:23:36'),
(12, 'Crime and Punishment', 'Fyodor Dostoevsky', 'A destitute student commits murder, exploring themes of guilt and redemption.', 17.15, '/Views/Images/shop/crime_punishment.jpg', 1, '2025-03-18 15:23:36'),
(13, 'The Picture of Dorian Gray', 'Oscar Wilde', 'A young man\'s portrait ages while he remains youthful, reflecting his moral decay.', 12.99, '/Views/Images/shop/dorian_gray.jpg', 1, '2025-03-18 15:23:36'),
(14, 'Anna Karenina', 'Leo Tolstoy', 'A married woman embarks on a doomed affair, examining the complexities of Russian society.', 16.99, '/Views/Images/shop/anna_karenina.jpg', 1, '2025-03-18 15:23:36'),
(15, 'The Odyssey', 'Homer', 'The epic journey of Odysseus as he returns home from the Trojan War, facing numerous trials.', 13.75, '/Views/Images/shop/odyssey.jpg', 1, '2025-03-18 15:23:36'),
(16, 'The War of the Worlds', 'H.G. Wells', 'Earth faces an invasion by ruthless Martians, showcasing humanity\'s struggle for survival.', 18.99, '/Views/Images/shop/war_of_the_worlds.jpg', 1, '2025-03-18 15:23:36'),
(17, 'Madame Bovary', 'Gustave Flaubert', 'A doctor\'s wife seeks escape from provincial life through romantic escapades, leading to her downfall.', 14.00, '/Views/Images/shop/Madame_bovary.jpg', 1, '2025-03-18 15:23:36'),
(18, 'The Canterbury Tales', 'Geoffrey Chaucer', 'A collection of stories told by pilgrims journeying to Canterbury, offering a vivid portrait of medieval society.', 15.50, '/Views/Images/shop/canterbury_tales.jpg', 1, '2025-03-18 15:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
