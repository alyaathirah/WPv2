-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1: 3325
-- Generation Time: Jun 10, 2021 at 05:25 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

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
  `item_id` varchar(7) NOT NULL,
  `image` varchar(53) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `price` varchar(5) DEFAULT NULL,
  `weight` varchar(6) DEFAULT NULL,
  `expiry_date` varchar(11) DEFAULT NULL,
  `qty` varchar(3) DEFAULT NULL,
  `origin` varchar(6) DEFAULT NULL,
  `category_name(FK)` varchar(21) DEFAULT NULL,
  `description` varchar(350) DEFAULT NULL,
  `tags` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `image`, `name`, `price`, `weight`, `expiry_date`, `qty`, `origin`, `category_name(FK)`, `description`, `tags`) VALUES
('1', 'images/products/Vegetables and Fruits/apple.png', 'Apple 12pcs', '12.90', '0.5kg', '14/3/2021', '50', 'Import', 'Fruits and Vegetables', '12 pcs fresh and juicy apples imported from New Zealand', ''),
('10', 'images/products/Vegetables and Fruits/mango.png', 'Mango 1kg', '10.90', '1kg', '21/3/2021', '60', 'Import', 'Fruits and Vegetables', 'Product of Thailand. R2E2 Mango (THA) has a yellow firm flesh, with a sweet and mild flavour.', ''),
('11', 'images/products/Vegetables and Fruits/orange.png', 'Orange 1kg', '10.90', '1kg', '21/3/2021', '50', 'Import', 'Fruits and Vegetables', 'Product of Spain. Clementine Mandarin Orange (ESP) have a bright skin and juicy pulp which makes them very likeable among citrus enjoyers.', ''),
('12', 'images/products/Vegetables and Fruits/pepper.png', 'Pepper 1kg', '10.90', '1kg', '21/3/2021', '60', 'Local', 'Fruits and Vegetables', 'Product of Malaysia. It has a slightly bitter flavor and crunchy texture. It can brings color, a bit of bitterness and texture to our dishes - either raw or cooked', ''),
('13', 'images/products/Vegetables and Fruits/spinach.png', 'Spinach 1kg', '10.90', '1kg', '21/3/2021', '50', 'Local', 'Fruits and Vegetables', 'Product of Malaysia. Known as Kangkung, it has tender shoots and leaves. One of the essential dishes, both in home-style cooking and at restaurants.', ''),
('14', 'images/products/Vegetables and Fruits/strawberry.png', 'Strawberry 1kg', '10.90', '1kg', '21/3/2021', '60', 'Import', 'Fruits and Vegetables', 'Product of Korea. Sweet, succulent and plump, not only are strawberries delicious, they are also an excellent source of Vitamin C. Enjoy Strawberry (KOR) C8 raw, grilled or baked in cakes, dipped in chocolate or in a cocktail.', ''),
('15', 'images/products/Vegetables and Fruits/tomato.png', 'Tomato 1kg', '10.90', '1kg', '21/3/2021', '50', 'Local', 'Fruits and Vegetables', 'A versatile tomato variety that is left to ripen on the vine for a more robust and aromatic flavour. Genting Garden Tomato on Vine can be enjoyed in endless varieties of dishes.', ''),
('16', 'images/products/Vegetables and Fruits/watermelon.png', 'Watermelon 1kg', '10.90', '1kg', '21/3/2021', '60', 'Local', 'Fruits and Vegetables', 'Product of Malaysia. Sweet and juicy Red Seedless Watermelon (MYS) with a crisp flesh and watery texture. Sliced watermelon tastes great on its own, or you can toss watermelon cubes with some feta cheese and fresh mint for a salad.', ''),
('17', 'images/products/Instant Food/ayamasBall.png', 'Ayamas Ball', '10.90', '', '22/4/2023', '80', 'Local', 'Instant Food', 'Ayamas Premium Chicken Meatball with Mushroom are juicy, flavourful and everyone loves them! Serve them as an appetizer with your favourite dipping sauce or as a main course with a salad, over noodles or in a sandwich.', ''),
('18', 'images/products/Instant Food/ayamasDrumet.png', 'Ayamas Drumet', '12.90', '', '22/4/2023', '50', 'Local', 'Instant Food', 'Ayamas Hot & Spicy Breaded Chicken Drummets & Mid Wings are breaded with special herbs and spices that will flare up your taste buds in a good way. Contains no trans-fat, preservatives or MSG, they are perfect to be shared by the whole family.', ''),
('19', 'images/products/Instant Food/ayamasNugget.png', 'Ayamas Nugget', '9.90', '', '22/4/2023', '60', 'Local', 'Instant Food', 'Ayamas Golden Chicken Nuggets have always been the crowd favourite. Coated with crunchy golden bread crumbs, this snack contains no trans-fat, preservatives or MSG and will always be the winning choice with everybody, anytime', ''),
('2', 'images/products/Vegetables and Fruits/apricot.png', 'Apricot 5pcs', '10.90', '0.5kg', '15/3/2021', '60', 'Import', 'Fruits and Vegetables', '5pcs fresh and juicy apples imported from New Zealand', ''),
('20', 'images/products/Instant Food/ayamasSosej.png', 'Ayamas Sosej', '10.90', '', '22/4/2023', '50', 'Local', 'Instant Food', 'Ayamas brings you the Premium Chicken Frankfurter range, seasoned with black pepper. Tastes o good, even a small whiff of the delicious peppery chicken sausages will guarantee to whet your appetite.', ''),
('21', 'images/products/Instant Food/campbellChickenBox.png', 'Campbell Chicken Box', '10.90', '', '22/4/2023', '60', 'Local', 'Instant Food', 'Campbell\'s Condensed Soup comes in a wide variety of flavours to suit every consumer\'s taste buds. For tomato lovers, you can now have a simple wholesome meal within minutes in the comfort of your home with Campbell’s Tomato Condensed Soup. It can turn your regular meal into an enjoyable occasion!', ''),
('22', 'images/products/Instant Food/campbellChickenCan.png', 'Campbell Chicken Can', '5.90', '', '22/4/2023', '50', 'Local', 'Instant Food', 'Campbell\'s Condensed Soup comes in a wide variety of flavours to suit every consumer\'s taste buds. For mushroom and chicken lovers, you can now have a simple wholesome meal within minutes in the comfort of your home with Campbell’s Creamy Chicken Mushroom Condensed Soup. It can turn your regular meal into an enjoyable occasion!', ''),
('23', 'images/products/Instant Food/campbellOriBox.png', 'Campbell Ori Box', '5.95', '', '22/4/2023', '50', 'Local', 'Instant Food', 'Campbell\'s Condensed Soup comes in a wide variety of flavours to suit every consumer\'s taste buds. For mushroom and chicken lovers, you can now have a simple wholesome meal within minutes in the comfort of your home with Campbell’s Creamy Chicken Mushroom Condensed Soup. It can turn your regular meal into an enjoyable occasion!', ''),
('24', 'images/products/Instant Food/campbellOriCan.png', 'Campbell Ori Can', '9.90', '', '22/4/2023', '60', 'Local', 'Instant Food', 'Campbell\'s Condensed Soup comes in a wide variety of flavours to suit every consumer\'s taste buds. For mushroom and chicken lovers, you can now have a simple wholesome meal within minutes in the comfort of your home with Campbell’s Creamy Chicken Mushroom Condensed Soup. It can turn your regular meal into an enjoyable occasion!', ''),
('25', 'images/products/Instant Food/maggiAyam.png', 'Maggi Ayam', '10.90', '', '22/4/2023', '50', 'Local', 'Instant Food', 'Maggi Chicken Instant Noodle is a Malaysian choice and all-time favourite! Packed with real chicken essence and a blend of aromatic herbs and spices to fascinate your taste buds. Made of thicker and springy noodles with protein from wheat to satisfy your hunger. In just 2-minutes, your Maggi Chicken is ready to treat you with its tasty flavour!', ''),
('26', 'images/products/Instant Food/maggiCup.png', 'Maggi Cup', '10.90', '', '22/4/2023', '60', 'Local', 'Instant Food', 'Maggi Chicken Cup Instant Noodle is a Malaysian choice and all-time favourite! Packed with real chicken essence and a blend of aromatic herbs and spices to fascinate your taste buds. Made of thicker and springy noodles with protein from wheat to satisfy your hunger. In just 2-minutes, your Maggi Chicken is ready to treat you with its tasty flavour!', ''),
('27', 'images/products/Instant Food/maggiTomYam.png', 'Maggi TomYam', '12.90', '', '22/4/2023', '50', 'Local', 'Instant Food', 'Maggi TomYam Instant Noodle is a Malaysian choice and all-time favourite! Packed with real chicken essence and a blend of aromatic herbs and spices to fascinate your taste buds. Made of thicker and springy noodles with protein from wheat to satisfy your hunger. In just 2-minutes, your Maggi Chicken is ready to treat you with its tasty flavour!', ''),
('28', 'images/products/Instant Food/maggi.png', 'Maggi Kari', '5.95', '', '22/4/2023', '60', 'Local', 'Instant Food', 'Maggi Curry Instant Noodle is a Malaysian choice and all-time favourite! Packed with real chicken essence and a blend of aromatic herbs and spices to fascinate your taste buds. Made of thicker and springy noodles with protein from wheat to satisfy your hunger. In just 2-minutes, your Maggi Chicken is ready to treat you with its tasty flavour!', ''),
('29', 'images/products/Instant Food/ramenDouble.png', 'Ramen Double', '13.95', '', '22/4/2023', '80', 'Local', 'Instant Food', 'The unique taste of Samyang, which cannot be escaped once you eat. The harmony of distinctive dark flavour, hot and spicy taste of Samyang ramen, will definitey be loved by all spicy ramen lovers!', ''),
('3', 'images/products/Vegetables and Fruits/broccoli.png', 'Broccoli 1kg', '10.90', '1kg', '16/3/2021', '70', 'Import', 'Fruits and Vegetables', 'Product of Australia. Broccoli (AUS) K8 is a good choice for those who wants to reduce the risk of lifestyle-related health conditions. It can be served in so many ways such as stir-fry, sautee, grill, steam and so on.', ''),
('30', 'images/products/Instant Food/samyangCarbo.png', 'Samyang Carbonara', '13.50', '', '22/4/2023', '50', 'Local', 'Instant Food', 'The unique taste of Samyang, which cannot be escaped once you eat. The harmony of distinctive dark flavour, hot and spicy taste of Samyang ramen, will definitey be loved by all spicy ramen lovers!', ''),
('31', 'images/products/Instant Food/samyangCheese.png', 'Samyang Cheese', '14.00', '', '22/4/2023', '60', 'Local', 'Instant Food', 'The unique taste of Samyang, which cannot be escaped once you eat. The harmony of distinctive dark flavour, hot and spicy taste of Samyang ramen, will definitey be loved by all spicy ramen lovers!', ''),
('32', 'images/products/Instant Food/samyangOri.png', 'Samyang Original', '12.00', '', '22/4/2023', '50', 'Local', 'Instant Food', 'The unique taste of Samyang, which cannot be escaped once you eat. The harmony of distinctive dark flavour, hot and spicy taste of Samyang ramen, will definitey be loved by all spicy ramen lovers!', ''),
('33', 'images/products/Snacks/apolloWaferCream.png', 'Wafer Gream', '5.90', '', '22/4/2023', '60', 'Local', 'Snacks', 'Julie’s Wafers Chocolate Hazelnut Wafer Cubes are a wonderful snack that is crispy and filled with chocolate cream and hazelnut. These bite sized wafer cookies can be enjoyed with everybody, anytime, anywhere.', ''),
('34', 'images/products/Snacks/bigBangGrilledSeaweed.png', 'Grilled Seaweed', '10.90', '', '22/4/2023', '50', 'Local', 'Snacks', 'Shinjin Crushed Seasoned Laver is a versatile snack. It is great to season your cooking and also tastes good on its own! Product of Korea.', ''),
('35', 'images/products/Snacks/cheetosFlamingHot.png', 'Cheetos', '12.90', '', '22/4/2023', '50', 'Local', 'Snacks', 'Cheetos Crunchy Cheese Snack is the much-loved cheesy treat that is fun for everyone! You just can’t eat Cheetos Crunchy Cheese Snack without licking the signature “cheetle” off your fingertips. Made with real cheese, cheesy smiles are sure to follow!', ''),
('36', 'images/products/Snacks/chokiChoki.png', 'Choki Choki', '9.90', '', '22/4/2023', '60', 'Local', 'Snacks', 'Choki Choki Chococashew Paste can be spread on bread or just eat the yummy paste on its own!', ''),
('37', 'images/products/Snacks/dahfaDriedFishFillet.png', 'Dried Fish Fillet', '7.90', '', '22/4/2023', '50', 'Local', 'Snacks', 'Have a fun snacking time with Dahfa Dried Fish Fillet! It is rich in protein and minerals especially carbohydrate and calcium. Tasty, nutritious, easily digestible and contains all the natural goodness for the whole family.', ''),
('38', 'images/products/Snacks/dingDang.png', 'Ding Dang', '2.00', '', '22/4/2023', '60', 'Local', 'Snacks', 'These boxes of wafer balls coated with chocolate were one of the most popular childhood snacks among Malaysians.', ''),
('39', 'images/products/Snacks/hacks.png', 'HACKS Candy', '3.90', '', '22/4/2023', '50', 'Local', 'Snacks', 'Candy Drop is one of the oldest and most popular candies in Japan. It comes in several fruity tastes and packed in a small tin box for your convenience', ''),
('4', 'images/products/Vegetables and Fruits/cucumber.png', 'Cucumber 1kg', '10.90', '1kg', '17/3/2021', '80', 'Local', 'Fruits and Vegetables', 'Product of Malaysia. It is slender, thin-skinned, void of developed seeds, never bitter and entirely edible. It can be served as a snack, in sandwiches, as salad dressings or to accompany your dishes.', ''),
('40', 'images/products/Snacks/hawFlakes.png', 'Haw Flakes', '4.90', '', '22/4/2023', '60', 'Local', 'Snacks', 'Mornflake Crunchy Granola Hawaiian is ideal to those who’re living a healthy lifestyle. They offer you a mighty blend of flame raisins, banana, pineapple, papaya and coconut to start you day in the tastiest', ''),
('41', 'images/products/Snacks/lemonTablet.png', 'Lemon Tablet', '6.90', '', '22/4/2023', '80', 'Local', 'Snacks', 'Product name:Lemon Tablet \nKandungan 1bag: 5pcsx20pkt=100pcs \nLemon flavoured with tablets ', ''),
('42', 'images/products/Snacks/mameeMonsterSnekMi.png', 'Snek Mi', '4.95', '', '22/4/2023', '50', 'Local', 'Snacks', 'Allergen: Contains ingredient from Wheat, Soy, Fish, Crustaceans, Milk and Sulphites. Produced in a Facility That Uses Peanut, Egg, Tree Nut, Sesame and Bean.', ''),
('43', 'images/products/Snacks/murukawaBubblegum.png', 'Bubble Gum', '6.95', '', '22/4/2023', '60', 'Local', 'Snacks', 'Bubble Yum was first introduced back in 1975 in the USA where it gained many fans because of its unique softness', ''),
('44', 'images/products/Snacks/murukuIkan.png', 'Muruku Ikan', '8.95', '', '22/4/2023', '50', 'Local', 'Snacks', 'Popo Fish Muruku Snack is fun to eat no matter where and what you do. During watching television, after sports, picnic and other activities. Simply great in taste you’ll love it!', ''),
('45', 'images/products/Snacks/sugus.png', 'Sugus', '2.90', '', '22/4/2023', '60', 'Local', 'Snacks', 'Drive yourself into a wonderful fruity journey with Sugus Orange Flavour Chews. Loaded with juicy orange taste that is very refreshing!', ''),
('46', 'images/products/Snacks/superRing.png', 'Super Ring', '8.90', '', '22/4/2023', '50', 'Local', 'Snacks', 'Do you reminisce the super fun cheesy taste of Oriental Super Ring Cheese Flavoured Snacks? It’s been kids’ all-time favourite snack for years. Extra crispy corn rings loaded with rich and cheesy flavour, ideal for snacks on the go.', ''),
('47', 'images/products/Snacks/wantWantRiceCake.jpg', 'Rice Cake', '9.90', '', '22/4/2023', '45', 'Local', 'Snacks', 'Want Want or more commonly known as Wang-Wang, are seasoned rice crackers that came with a loud snapping-sound whenever you munch on them. These golden, crunchy treats were a definite addiction because each packet got us asking for more.', ''),
('48', 'images/products/Snacks/whiteRabbitCandy.png', 'White Rabbit Candy', '8.80', '', '22/4/2023', '80', 'Local', 'Snacks', 'White Rabbit candies are a milk-based white candy with a soft, chewy texture, sold as small, rectangular candies approximately 3 cm × 1 cm (1.18 in × 0.39 in), similar to contemporary western nougat or taffy.', ''),
('5', 'images/products/Vegetables and Fruits/cabbage.png', 'Cabbage 1kg', '10.90', '1kg', '18/3/2021', '50', 'Import', 'Fruits and Vegetables', 'Product of China. Chinese cabbage has pale, tightly wrapped, succulent leaves with crisp, broad, white ribs and a delicate, mild, sweet flavor. It can be served raw in salads, stews or soups and also can be steamed, stir-fried or cooked briefly as one of your dishes.', ''),
('6', 'images/products/Vegetables and Fruits/cauliflower.png', 'Cauliflower 1kg', '10.90', '1kg', '19/3/2021', '60', 'Import', 'Fruits and Vegetables', 'Product of Australia. Cauliflower is like a mass of tiny, tightly packed flower heads and cupped by green leaves. It can be served raw in a salad, boiled, steamed or cooked with your own recipe.', ''),
('7', 'images/products/Vegetables and Fruits/garlic.png', 'Garlic 1kg', '10.90', '1kg', '20/3/2021', '50', 'Local', 'Fruits and Vegetables', 'Garlic (BDL) has a pungent, spicy flavour that mellows and sweetens considerably with cooking.', ''),
('8', 'images/products/Vegetables and Fruits/grapefruit.png', 'Grapefruit 1kg', '10.90', '1kg', '21/3/2021', '60', 'Import', 'Fruits and Vegetables', 'Product of Turkey. Grapefruit has a distinctive flesh colour, juicy, sweet and slightly sour flavor. It is an excellent source of vitamin C and a good source of dietary fibre. Available in M to L size.', ''),
('9', 'images/products/Vegetables and Fruits/kiwi.png', 'Kiwi ', '10.90', '0.6kg', '21/3/2021', '50', 'Local', 'Fruits and Vegetables', 'Product of Italy. ​With its sweet, tropical flavour and smooth, green flesh, Zespri Green Kiwi 4\'s (ITA) sets the benchmark for the global kiwifruit category', '');

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
  `Birthday` date NOT NULL,
  `Address1` varchar(60) NOT NULL,
  `City` varchar(60) NOT NULL,
  `State1` varchar(60) NOT NULL,
  `Zip` varchar(5) NOT NULL,
  `Password1` varchar(60) NOT NULL,
  `images` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`id`, `FirstName`, `LastName`, `Username`, `Email`, `Bio`, `PhoneNumber`, `Birthday`, `Address1`, `City`, `State1`, `Zip`, `Password1`, `images`, `Gender`) VALUES
(1, 'Ong', 'Wei', 'ong', 'ongwei12345@gmail.com', ':D Be happy :D', '011-8871238', '1995-04-26', 'Mile 3 1/2 Penampang Road', 'Kota Kinabalu', 'Sabah', '68100', '12345', 'images/fam.jpg', 'Female'),
(3, 'Hafiz', 'Salem', 'salem', 'hafizsale56m@gmail.com', 'Be yourself:)', '019-8765432', '1992-08-07', '2239  Hart Country Lane', 'Columbus', 'Georgia', '31907', '12345', 'images/nanas.jpg', 'Male'),
(5, 'Mika', 'Kayla', 'kyle', 'messybun@gmail.com', 'Shopping is an ART.', '012-3486957', '1994-09-04', 'Jalan Cenderasari', 'Kuala Lumpur', 'Wilayah Persekutuan', '50646', '12345', 'images/fd2c5ed381d58299866d95d64913aa40daisy.jpg', 'Female'),
(6, 'Mila', 'Natasha', 'mila', 'milanatasha_99@yahoo.com', 'I love shopping :]', '012-2717783', '1999-02-05', 'No 4 Jalan Raja Laut,', 'Kuala Lumpur', 'Wilayah Persekutuan', '50350', 'stywm99', 'images/pink clloud.jpg', 'Other');

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
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category_name(FK)`) REFERENCES `category` (`category_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
