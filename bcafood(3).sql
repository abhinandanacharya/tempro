-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2020 at 05:04 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcafood`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`id`, `name`) VALUES
(1, 'Red Chilli Powder'),
(4, 'Garam Masala'),
(5, 'oil'),
(6, 'jeera'),
(7, 'salt'),
(8, 'turmeric powder'),
(9, 'garlic'),
(10, 'water'),
(11, 'potato'),
(12, 'tomato'),
(15, 'pea'),
(16, 'capsicum'),
(17, 'cabbage'),
(18, 'chili'),
(19, 'carrot'),
(20, 'cauliflower'),
(21, 'onion'),
(22, 'cumin'),
(23, 'coriander'),
(24, 'amchur');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `measure`
--

CREATE TABLE `measure` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measure`
--

INSERT INTO `measure` (`id`, `name`) VALUES
(1, 'tea spoon'),
(2, 'table spoon'),
(3, 'kg'),
(4, 'gram'),
(5, 'bowl'),
(6, 'cup');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `rec_id` int(11) NOT NULL,
  `rec_name` varchar(255) NOT NULL,
  `rec_desc` text NOT NULL,
  `rec_inst` text NOT NULL,
  `rec_photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`rec_id`, `rec_name`, `rec_desc`, `rec_inst`, `rec_photo`) VALUES
(1, 'recipe name', 'description for recipe', 'instruction for recipe', NULL),
(2, 'second recipe name ', 'second recipe description', 'second recipe instruction ', NULL),
(3, 'tomato sabzi', 'tomato sabzi', 'tomato sabzi', NULL),
(4, 'pea', 'pea ', 'pea inst', NULL),
(5, 'capsicum', 'capsicum desc', 'capsicum inst', NULL),
(6, 'cabbage name', 'cabbage desc', 'cabbage inst', NULL),
(7, 'potato greens', 'potato greens in Indian style.\r\n(Allu Bhajee)', 'boil the potato till they are soft. peel the skin and cut into medium pieces. keep aside.\r\nfinely chop green chillies, ginger,thinly slice onion and keep ready.\r\nnow add thinly sliced onion and fry till then turn translucent.\r\nalso add chilli and ginger. fry till the raw smell of ginger goes away.\r\nnow add boiled and chopped potato and give a quick stir. also add turmeric powder, little water and salt to taste.\r\nmash the potatoes and cook for about 4 min.\r\n\r\nserve aloo bhaji hot with poori.', '1593147790_1st.jpg'),
(8, 'tomato greens', 'tomato greens in Indian style.\r\nspecie  and testy  ', 'chopped tomatoes.\r\nadd oil \r\nnow add garam masala, red chili powder , turmeric powder and salt and chili.\r\nnow mixed them and burn on a low flame.\r\n\r\nserve the recipe.\r\n ', NULL),
(9, 'potato and tomato mixed greens', 'recipe card for aloo tamatar ki sabji.', 'firstly, in a large kadai heat 2 tbsp oil.now add 1 onion and saute well. saute until onions turn golden brown.further add 1 tsp ginger and garlic paste and saute well.\r\nkeeping the flame on low add 1 tsp turmeric, 1 tsp chilli powder, , 1 tsp garam masala and 1 tsp salt.\r\nsaute on low flame until spices turn aromatic.\r\nadd 1 tomato and saute well until tomatoes turn soft and mushy.\r\nfurther mash 2 boiled potato slightly.\r\nmix well making sure all the spices are well combined.\r\nnow add 1-2 cup water and stir adjusting consistency as required.\r\ncover and simmer for 10 minutes making sure flavours are absorbed well.', NULL),
(10, 'dsda', 'sds', 'sds', '1593148037_1st.jpg'),
(11, 'aa', 'qq', 'ee', '1st.jpg'),
(12, 'Potato with Pea', 'Potato and pea curry\r\n\r\nAloo dum is a potato and pea curry which is possibly the most common vegetable curry in India.', '1.Boil the potatoes in a pan of salted water for eight minutes until just tender, then drain well. Heat the oil in a heavy-based saucepan or karahi over a medium-high heat, add the potatoes and fry over a high heat for 5 minutes, or until just starting to colour. Add the turmeric and fry for 30 seconds. Remove from the heat.\r\n2.Add the chilli powder, cumin, , amchur, turmeric and salt and fry for one minute,  green chillies ,water and stir together. Add the fried potatoes, reduce the heat to medium, cover the pan and cook for 10 minutes, adding a splash of water if anything catches on the bottom of the pan. \r\n3.Add the peas and garam masala and cook uncovered for 3-4 minutes, or until the peas are cooked.and serve.', '1593265917_3rd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recipeprocess`
--

CREATE TABLE `recipeprocess` (
  `id` int(5) NOT NULL,
  `ingredient_id` int(4) DEFAULT NULL,
  `measure_id` int(4) DEFAULT NULL,
  `amount` int(4) DEFAULT NULL,
  `recipe_id` int(4) DEFAULT NULL,
  `type` enum('ing','veg') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipeprocess`
--

INSERT INTO `recipeprocess` (`id`, `ingredient_id`, `measure_id`, `amount`, `recipe_id`, `type`) VALUES
(1, 1, 1, 5, 4, 'ing'),
(2, 4, 1, 4, 4, 'ing'),
(3, 1, 1, 1, 4, 'veg'),
(4, 1, 1, 5, 6, 'ing'),
(5, 4, 1, 4, 6, 'ing'),
(6, 1, 1, 2, 7, 'ing'),
(7, 4, 1, 1, 7, 'ing'),
(8, 5, 2, 1, 7, 'ing'),
(9, 6, 1, 1, 7, 'ing'),
(10, 7, 1, 1, 7, 'ing'),
(11, 8, 1, 1, 7, 'ing'),
(12, 11, 4, 500, 7, 'veg'),
(13, 1, 1, 1, 8, 'ing'),
(14, 4, 1, 1, 8, 'ing'),
(15, 5, 2, 1, 8, 'ing'),
(16, 6, 1, 1, 8, 'ing'),
(17, 7, 1, 1, 8, 'ing'),
(18, 10, 6, 1, 8, 'ing'),
(19, 24, 1, 1, 8, 'ing'),
(20, 8, 1, 1, 8, 'ing'),
(21, 23, 1, 1, 8, 'ing'),
(22, 1, 4, 500, 8, 'veg'),
(23, 3, 4, 100, 8, 'veg'),
(24, 6, 4, 100, 8, 'veg'),
(44, 1, 1, 1, 9, 'ing'),
(45, 4, 1, 1, 9, 'ing'),
(46, 5, 2, 1, 9, 'ing'),
(47, 10, 6, 1, 9, 'ing'),
(48, 9, 1, 1, 9, 'ing'),
(49, 8, 1, 1, 9, 'ing'),
(50, 7, 1, 1, 9, 'ing'),
(51, 24, 1, 1, 9, 'ing'),
(52, 11, 4, 500, 9, 'veg'),
(53, 12, 4, 250, 9, 'veg'),
(54, 18, 4, 50, 9, 'veg');

-- --------------------------------------------------------

--
-- Table structure for table `vegetable`
--

CREATE TABLE `vegetable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vegetable`
--

INSERT INTO `vegetable` (`id`, `name`) VALUES
(11, 'potato'),
(12, 'tomato'),
(15, 'pea'),
(16, 'capsicum'),
(17, 'cabbage'),
(18, 'chilli'),
(19, 'carrot'),
(20, 'cauliflower'),
(21, 'onion');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measure`
--
ALTER TABLE `measure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `recipeprocess`
--
ALTER TABLE `recipeprocess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vegetable`
--
ALTER TABLE `vegetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `measure`
--
ALTER TABLE `measure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `recipeprocess`
--
ALTER TABLE `recipeprocess`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `vegetable`
--
ALTER TABLE `vegetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
