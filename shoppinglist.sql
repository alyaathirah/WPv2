-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2021 at 12:46 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppinglist`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_name` varchar(21) NOT NULL,
  `category_qty` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_name`, `category_qty`) VALUES
('Fruits and Vegetables', '16'),
('Instant Food', '16'),
('Snacks', '16');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(7) NOT NULL,
  `image` varchar(53) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `price` varchar(5) DEFAULT NULL,
  `weight` varchar(6) DEFAULT NULL,
  `expiry_date` varchar(11) DEFAULT NULL,
  `qty` varchar(3) DEFAULT NULL,
  `origin` varchar(6) DEFAULT NULL,
  `category_name(FK)` varchar(21) DEFAULT NULL,
  `description` varchar(350) DEFAULT NULL,
  `tags1` varchar(50) DEFAULT NULL,
  `tags2` varchar(50) DEFAULT NULL,
  `tags3` varchar(50) DEFAULT NULL,
  `tags4` varchar(50) DEFAULT NULL,
  `tags5` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `image`, `name`, `price`, `weight`, `expiry_date`, `qty`, `origin`, `category_name(FK)`, `description`, `tags1`, `tags2`, `tags3`, `tags4`, `tags5`) VALUES
(1, 'products/Vegetables and Fruits/apple.png', 'Apple 12pcs', '12.90', '0.5kg', '14/3/2021', '50', 'Import', 'Fruits and Vegetables', '12 pcs fresh and juicy apples imported from New Zealand', 'buah', 'apple', NULL, NULL, NULL),
(4, 'products/Vegetables and Fruits/cucumber.png', 'Cucumber 1kg', '10.90', '1kg', '17/3/2021', '80', 'Local', 'Fruits and Vegetables', 'Product of Malaysia. It is slender, thin-skinned, void of developed seeds, never bitter and entirely edible. It can be served as a snack, in sandwiches, as salad dressings or to accompany your dishes.', 'sayur', NULL, NULL, NULL, NULL),
(5, 'products/Vegetables and Fruits/cabbage.png', 'Cabbage 1kg', '10.90', '1kg', '18/3/2021', '50', 'Import', 'Fruits and Vegetables', 'Product of China. Chinese cabbage has pale, tightly wrapped, succulent leaves with crisp, broad, white ribs and a delicate, mild, sweet flavor. It can be served raw in salads, stews or soups and also can be steamed, stir-fried or cooked briefly as one of your dishes.', 'sayur', NULL, NULL, NULL, NULL),
(6, 'products/Vegetables and Fruits/cauliflower.png', 'Cauliflower 1kg', '10.90', '1kg', '19/3/2021', '60', 'Import', 'Fruits and Vegetables', 'Product of Australia. Cauliflower is like a mass of tiny, tightly packed flower heads and cupped by green leaves. It can be served raw in a salad, boiled, steamed or cooked with your own recipe.', 'sayur', NULL, NULL, NULL, NULL),
(8, 'products/Vegetables and Fruits/grapefruit.png', 'Grapefruit 1kg', '10.90', '1kg', '21/3/2021', '60', 'Import', 'Fruits and Vegetables', 'Product of Turkey. Grapefruit has a distinctive flesh colour, juicy, sweet and slightly sour flavor. It is an excellent source of vitamin C and a good source of dietary fibre. Available in M to L size.', 'buah', NULL, NULL, NULL, NULL),
(9, 'products/Vegetables and Fruits/kiwi.png', 'Kiwi ', '10.90', '0.6kg', '21/3/2021', '50', 'Local', 'Fruits and Vegetables', 'Product of Italy. ​With its sweet, tropical flavour and smooth, green flesh, Zespri Green Kiwi 4\'s (ITA) sets the benchmark for the global kiwifruit category', 'buah', NULL, NULL, NULL, NULL),
(10, 'products/Vegetables and Fruits/mango.png', 'Mango 1kg', '10.90', '1kg', '21/3/2021', '60', 'Import', 'Fruits and Vegetables', 'Product of Thailand. R2E2 Mango (THA) has a yellow firm flesh, with a sweet and mild flavour.', 'buah', NULL, NULL, NULL, NULL),
(11, 'products/Vegetables and Fruits/orange.png', 'Orange 1kg', '10.90', '1kg', '21/3/2021', '50', 'Import', 'Fruits and Vegetables', 'Product of Spain. Clementine Mandarin Orange (ESP) have a bright skin and juicy pulp which makes them very likeable among citrus enjoyers.', 'buah', NULL, NULL, NULL, NULL),
(12, 'products/Vegetables and Fruits/pepper.png', 'Pepper 1kg', '10.90', '1kg', '21/3/2021', '60', 'Local', 'Fruits and Vegetables', 'Product of Malaysia. It has a slightly bitter flavor and crunchy texture. It can brings color, a bit of bitterness and texture to our dishes - either raw or cooked', 'sayur', NULL, NULL, NULL, NULL),
(13, 'products/Vegetables and Fruits/spinach.png', 'Spinach 1kg', '10.90', '1kg', '21/3/2021', '50', 'Local', 'Fruits and Vegetables', 'Product of Malaysia. Known as Kangkung, it has tender shoots and leaves. One of the essential dishes, both in home-style cooking and at restaurants.', 'sayur', NULL, NULL, NULL, NULL),
(14, 'products/Vegetables and Fruits/strawberry.png', 'Strawberry 1kg', '10.90', '1kg', '21/3/2021', '60', 'Import', 'Fruits and Vegetables', 'Product of Korea. Sweet, succulent and plump, not only are strawberries delicious, they are also an excellent source of Vitamin C. Enjoy Strawberry (KOR) C8 raw, grilled or baked in cakes, dipped in chocolate or in a cocktail.', 'buah', NULL, NULL, NULL, NULL),
(15, 'products/Vegetables and Fruits/tomato.png', 'Tomato 1kg', '10.90', '1kg', '21/3/2021', '50', 'Local', 'Fruits and Vegetables', 'A versatile tomato variety that is left to ripen on the vine for a more robust and aromatic flavour. Genting Garden Tomato on Vine can be enjoyed in endless varieties of dishes.', 'sayur', 'buah', NULL, NULL, NULL),
(16, 'products/Vegetables and Fruits/watermelon.png', 'Watermelon 1kg', '10.90', '1kg', '21/3/2021', '60', 'Local', 'Fruits and Vegetables', 'Product of Malaysia. Sweet and juicy Red Seedless Watermelon (MYS) with a crisp flesh and watery texture. Sliced watermelon tastes great on its own, or you can toss watermelon cubes with some feta cheese and fresh mint for a salad.', 'buah', NULL, NULL, NULL, NULL),
(17, 'products/Instant Food/ayamasBall.png', 'Ayamas Ball', '10.90', '', '22/4/2023', '80', 'Local', 'Instant Food', 'Ayamas Premium Chicken Meatball with Mushroom are juicy, flavourful and everyone loves them! Serve them as an appetizer with your favourite dipping sauce or as a main course with a salad, over noodles or in a sandwich.', 'ayamas', 'chickenball', 'frozen food', NULL, NULL),
(18, 'products/Instant Food/ayamasDrumet.png', 'Ayamas Drumet', '12.90', '', '22/4/2023', '50', 'Local', 'Instant Food', 'Ayamas Hot & Spicy Breaded Chicken Drummets & Mid Wings are breaded with special herbs and spices that will flare up your taste buds in a good way. Contains no trans-fat, preservatives or MSG, they are perfect to be shared by the whole family.', 'ayamas', 'drumet', 'frozen food', NULL, NULL),
(19, 'products/Instant Food/ayamasNugget.png', 'Ayamas Nugget', '9.90', '', '22/4/2023', '60', 'Local', 'Instant Food', 'Ayamas Golden Chicken Nuggets have always been the crowd favourite. Coated with crunchy golden bread crumbs, this snack contains no trans-fat, preservatives or MSG and will always be the winning choice with everybody, anytime', 'ayamas', 'nuget', 'frozen food', NULL, NULL),
(20, 'products/Instant Food/ayamasSosej.png', 'Ayamas Sosej', '10.90', '', '22/4/2023', '50', 'Local', 'Instant Food', 'Ayamas brings you the Premium Chicken Frankfurter range, seasoned with black pepper. Tastes o good, even a small whiff of the delicious peppery chicken sausages will guarantee to whet your appetite.', 'ayamas', 'sosej', 'frozen food', NULL, NULL),
(21, 'products/Instant Food/campbellChickenBox.png', 'Campbell Chicken Box', '10.90', '', '22/4/2023', '60', 'Local', 'Instant Food', 'Campbell\'s Condensed Soup comes in a wide variety of flavours to suit every consumer\'s taste buds. For tomato lovers, you can now have a simple wholesome meal within minutes in the comfort of your home with Campbell’s Tomato Condensed Soup. It can turn your regular meal into an enjoyable occasion!', 'campbell', 'mushroom soup', 'instant soup', NULL, NULL),
(22, 'products/Instant Food/campbellChickenCan.png', 'Campbell Chicken Can', '5.90', '', '22/4/2023', '50', 'Local', 'Instant Food', 'Campbell\'s Condensed Soup comes in a wide variety of flavours to suit every consumer\'s taste buds. For mushroom and chicken lovers, you can now have a simple wholesome meal within minutes in the comfort of your home with Campbell’s Creamy Chicken Mushroom Condensed Soup. It can turn your regular meal into an enjoyable occasion!', 'campbell', 'mushroom soup', 'instant soup', 'canned food', NULL),
(23, 'products/Instant Food/campbellOriBox.png', 'Campbell Ori Box', '5.95', '', '22/4/2023', '50', 'Local', 'Instant Food', 'Campbell\'s Condensed Soup comes in a wide variety of flavours to suit every consumer\'s taste buds. For mushroom and chicken lovers, you can now have a simple wholesome meal within minutes in the comfort of your home with Campbell’s Creamy Chicken Mushroom Condensed Soup. It can turn your regular meal into an enjoyable occasion!', 'campbell', 'mushroom soup', 'instant soup', NULL, NULL),
(24, 'products/Instant Food/campbellOriCan.png', 'Campbell Ori Can', '9.90', '', '22/4/2023', '60', 'Local', 'Instant Food', 'Campbell\'s Condensed Soup comes in a wide variety of flavours to suit every consumer\'s taste buds. For mushroom and chicken lovers, you can now have a simple wholesome meal within minutes in the comfort of your home with Campbell’s Creamy Chicken Mushroom Condensed Soup. It can turn your regular meal into an enjoyable occasion!', 'campbell', 'mushroom soup', 'instant soup', 'canned food', NULL),
(25, 'products/Instant Food/maggiAyam.png', 'Maggi Ayam', '10.90', '', '22/4/2023', '50', 'Local', 'Instant Food', 'Maggi Chicken Instant Noodle is a Malaysian choice and all-time favourite! Packed with real chicken essence and a blend of aromatic herbs and spices to fascinate your taste buds. Made of thicker and springy noodles with protein from wheat to satisfy your hunger. In just 2-minutes, your Maggi Chicken is ready to treat you with its tasty flavour!', 'maggi', 'ayam', 'instant noodle', NULL, NULL),
(26, 'products/Instant Food/maggiCup.png', 'Maggi Cup', '10.90', '', '22/4/2023', '60', 'Local', 'Instant Food', 'Maggi Chicken Cup Instant Noodle is a Malaysian choice and all-time favourite! Packed with real chicken essence and a blend of aromatic herbs and spices to fascinate your taste buds. Made of thicker and springy noodles with protein from wheat to satisfy your hunger. In just 2-minutes, your Maggi Chicken is ready to treat you with its tasty flavour!', 'maggi', 'kari', 'instant noodle', NULL, NULL),
(27, 'products/Instant Food/maggiTomYam.png', 'Maggi TomYam', '12.90', '', '22/4/2023', '50', 'Local', 'Instant Food', 'Maggi TomYam Instant Noodle is a Malaysian choice and all-time favourite! Packed with real chicken essence and a blend of aromatic herbs and spices to fascinate your taste buds. Made of thicker and springy noodles with protein from wheat to satisfy your hunger. In just 2-minutes, your Maggi Chicken is ready to treat you with its tasty flavour!', 'maggi', 'tomyam', 'instant noodle', NULL, NULL),
(28, 'products/Instant Food/maggi.png', 'Maggi Kari', '5.95', '', '22/4/2023', '60', 'Local', 'Instant Food', 'Maggi Curry Instant Noodle is a Malaysian choice and all-time favourite! Packed with real chicken essence and a blend of aromatic herbs and spices to fascinate your taste buds. Made of thicker and springy noodles with protein from wheat to satisfy your hunger. In just 2-minutes, your Maggi Chicken is ready to treat you with its tasty flavour!', 'maggi', 'kari', 'instant noodle', NULL, NULL),
(29, 'products/Instant Food/ramenDouble.png', 'Ramen Double', '13.95', '', '22/4/2023', '80', 'Local', 'Instant Food', 'The unique taste of Samyang, which cannot be escaped once you eat. The harmony of distinctive dark flavour, hot and spicy taste of Samyang ramen, will definitey be loved by all spicy ramen lovers!', 'ramen', 'double spicy', 'instant noodle', NULL, NULL),
(30, 'products/Instant Food/samyangCarbo.png', 'Samyang Carbonara', '13.50', '', '22/4/2023', '50', 'Local', 'Instant Food', 'The unique taste of Samyang, which cannot be escaped once you eat. The harmony of distinctive dark flavour, hot and spicy taste of Samyang ramen, will definitey be loved by all spicy ramen lovers!', 'ramen', 'carbonara', 'instant noodle', NULL, NULL),
(31, 'products/Instant Food/samyangCheese.png', 'Samyang Cheese', '14.00', '', '22/4/2023', '60', 'Local', 'Instant Food', 'The unique taste of Samyang, which cannot be escaped once you eat. The harmony of distinctive dark flavour, hot and spicy taste of Samyang ramen, will definitey be loved by all spicy ramen lovers!', 'ramen', 'cheese', 'instant noodle', NULL, NULL),
(32, 'products/Instant Food/samyangOri.png', 'Samyang Original', '12.00', '', '22/4/2023', '50', 'Local', 'Instant Food', 'The unique taste of Samyang, which cannot be escaped once you eat. The harmony of distinctive dark flavour, hot and spicy taste of Samyang ramen, will definitey be loved by all spicy ramen lovers!', 'ramen', 'instant noodle', NULL, NULL, NULL),
(33, 'products/Snacks/apolloWaferCream.png', 'Wafer Gream', '5.90', '', '22/4/2023', '60', 'Local', 'Snacks', 'Julie’s Wafers Chocolate Hazelnut Wafer Cubes are a wonderful snack that is crispy and filled with chocolate cream and hazelnut. These bite sized wafer cookies can be enjoyed with everybody, anytime, anywhere.', 'apollo', 'wafer', 'cream', 'chocolate', NULL),
(37, 'products/Snacks/dahfaDriedFishFillet.png', 'Dried Fish Fillet', '7.90', '', '22/4/2023', '50', 'Local', 'Snacks', 'Have a fun snacking time with Dahfa Dried Fish Fillet! It is rich in protein and minerals especially carbohydrate and calcium. Tasty, nutritious, easily digestible and contains all the natural goodness for the whole family.', 'fish', NULL, NULL, NULL, NULL),
(38, 'products/Snacks/dingDang.png', 'Ding Dang', '2.00', '', '22/4/2023', '60', 'Local', 'Snacks', 'These boxes of wafer balls coated with chocolate were one of the most popular childhood snacks among Malaysians.', 'chocolate', 'toys', NULL, NULL, NULL),
(39, 'products/Snacks/hacks.png', 'HACKS Candy', '3.90', '', '22/4/2023', '50', 'Local', 'Snacks', 'Candy Drop is one of the oldest and most popular candies in Japan. It comes in several fruity tastes and packed in a small tin box for your convenience', 'mint', 'candy', NULL, NULL, NULL),
(40, 'products/Snacks/hawFlakes.png', 'Haw Flakes', '4.90', '', '22/4/2023', '60', 'Local', 'Snacks', 'Mornflake Crunchy Granola Hawaiian is ideal to those who’re living a healthy lifestyle. They offer you a mighty blend of flame raisins, banana, pineapple, papaya and coconut to start you day in the tastiest', 'sour', 'candy', NULL, NULL, NULL),
(41, 'products/Snacks/lemonTablet.png', 'Lemon Tablet', '6.90', '', '22/4/2023', '80', 'Local', 'Snacks', 'Product name:Lemon Tablet \nKandungan 1bag: 5pcsx20pkt=100pcs \nLemon flavoured with tablets ', 'sour', 'lemon', 'candy', NULL, NULL),
(42, 'products/Snacks/mameeMonsterSnekMi.png', 'Snek Mi', '4.95', '', '22/4/2023', '50', 'Local', 'Snacks', 'Allergen: Contains ingredient from Wheat, Soy, Fish, Crustaceans, Milk and Sulphites. Produced in a Facility That Uses Peanut, Egg, Tree Nut, Sesame and Bean.', 'mamee', 'bbq', NULL, NULL, NULL),
(44, 'products/Snacks/murukuIkan.png', 'Muruku Ikan', '8.95', '', '22/4/2023', '50', 'Local', 'Snacks', 'Popo Fish Muruku Snack is fun to eat no matter where and what you do. During watching television, after sports, picnic and other activities. Simply great in taste you’ll love it!', 'fish', 'muruku', NULL, NULL, NULL),
(45, 'products/Snacks/sugus.png', 'Sugus', '2.90', '', '22/4/2023', '60', 'Local', 'Snacks', 'Drive yourself into a wonderful fruity journey with Sugus Orange Flavour Chews. Loaded with juicy orange taste that is very refreshing!', 'sugus', 'candy', NULL, NULL, NULL),
(46, 'products/Snacks/superRing.png', 'Super Ring', '8.90', '', '22/4/2023', '50', 'Local', 'Snacks', 'Do you reminisce the super fun cheesy taste of Oriental Super Ring Cheese Flavoured Snacks? It’s been kids’ all-time favourite snack for years. Extra crispy corn rings loaded with rich and cheesy flavour, ideal for snacks on the go.', 'cheese', NULL, NULL, NULL, NULL),
(47, 'products/Snacks/wantWantRiceCake.jpg', 'Rice Cake', '9.90', '', '22/4/2023', '45', 'Local', 'Snacks', 'Want Want or more commonly known as Wang-Wang, are seasoned rice crackers that came with a loud snapping-sound whenever you munch on them. These golden, crunchy treats were a definite addiction because each packet got us asking for more.', 'rice', 'cake', NULL, NULL, NULL),
(48, 'products/Snacks/whiteRabbitCandy.png', 'White Rabbit Candy', '8.80', '', '22/4/2023', '80', 'Local', 'Snacks', 'White Rabbit candies are a milk-based white candy with a soft, chewy texture, sold as small, rectangular candies approximately 3 cm × 1 cm (1.18 in × 0.39 in), similar to contemporary western nougat or taffy.', 'candy', NULL, NULL, NULL, NULL),
(50, 'garlic.png', 'garlic', '123', '32g', '2021-07-01', '20', 'Local', 'Fruits and Vegetables', 'bawang. cyber trooper malaysia', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `itemlist`
--

CREATE TABLE `itemlist` (
  `itemlist_id` int(10) UNSIGNED NOT NULL,
  `itemlist_qty` int(11) DEFAULT NULL,
  `itemlist_status` varchar(30) DEFAULT NULL,
  `subprice` decimal(10,2) NOT NULL,
  `item_id` int(100) DEFAULT NULL,
  `sl_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `sl_id` int(11) NOT NULL,
  `sl_name` varchar(20) NOT NULL,
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Bio` varchar(300) NOT NULL,
  `PhoneNumber` varchar(11) DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `Address1` varchar(60) NOT NULL,
  `City` varchar(60) NOT NULL,
  `State1` varchar(60) NOT NULL,
  `Zip` varchar(5) NOT NULL,
  `Password1` varchar(60) NOT NULL,
  `images` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`id`, `FirstName`, `LastName`, `Username`, `Email`, `Bio`, `PhoneNumber`, `Birthday`, `Address1`, `City`, `State1`, `Zip`, `Password1`, `images`, `Gender`, `status`) VALUES
(1, 'Ong', 'Wei', 'ong', 'ong@gmail.com', ':D Be happy :D', '011-8871238', '1995-04-26', 'Mile 3 1/2 Penampang Road', 'Kota Kinabalu', 'Sabah', '68100', '827ccb0eea8a706c4c34a16891f84e7b', 'images/fam.jpg', 'Female', NULL),
(11, 'Ong', 'Wei', 'ong2', 'ongwei12345@gmail.com', ':D Be happy :D', '011-8871238', '0000-00-00', 'Mile 3 1/2 Penampang Road', 'Kota Kinabalu', 'Sabah', '68100', '827ccb0eea8a706c4c34a16891f84e7b', 'images/fam.jpg', 'Female', NULL),
(12, 'Ong', 'Wei', 'admin', 'admin@grosir.com', ':D Be happy :D', '011-8871238', NULL, 'Mile 3 1/2 Penampang Road', 'Kota Kinabalu', 'Sabah', '68100', '827ccb0eea8a706c4c34a16891f84e7b', 'images/fam.jpg', 'Female', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_name`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_name(FK)` (`category_name(FK)`);

--
-- Indexes for table `itemlist`
--
ALTER TABLE `itemlist`
  ADD PRIMARY KEY (`itemlist_id`),
  ADD KEY `fk_item_id` (`item_id`),
  ADD KEY `fk_sl_id` (`sl_id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`sl_id`),
  ADD KEY `fk_user_id` (`id`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `itemlist`
--
ALTER TABLE `itemlist`
  MODIFY `itemlist_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category_name(FK)`) REFERENCES `category` (`category_name`);

--
-- Constraints for table `itemlist`
--
ALTER TABLE `itemlist`
  ADD CONSTRAINT `fk_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `fk_sl_id` FOREIGN KEY (`sl_id`) REFERENCES `list` (`sl_id`);

--
-- Constraints for table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`id`) REFERENCES `users2` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
