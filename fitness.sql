-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 04:17 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `ActivityId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Duration` int(11) NOT NULL,
  `BurnedCalories` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`ActivityId`, `Name`, `Description`, `Duration`, `BurnedCalories`, `Image`, `CreatedDate`) VALUES
(1, 'Bike Riding', 'Riding Bicycle', 10, 100, 'bicycle.png', '2021-07-07 18:10:41'),
(2, 'Dancing', 'Dancing to workout Music', 10, 100, 'dance.png', '2021-07-07 18:11:48'),
(3, 'Swimming', 'Swimming Sessions.', 10, 100, 'swimming.png', '2021-07-07 18:11:48'),
(4, 'Treadmill', 'Working the Treadmill', 10, 100, 'treadmill.png', '2021-07-07 18:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `diets`
--

CREATE TABLE `diets` (
  `DietId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Calories` int(11) NOT NULL,
  `Day` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diets`
--

INSERT INTO `diets` (`DietId`, `Name`, `Type`, `Description`, `Image`, `Calories`, `Day`) VALUES
(1, 'Protein Shake', 'Breakfast(7.00 Am)', 'Healthy Protein Shake: nuts, milk, kales, butter, water and avocado.', 'protein-shake.png', 100, '1'),
(2, 'Pancakes and tea/Coffee', 'Breakfast(7.00 Am)', 'Healthy Pancake: Milk, whaet flor, coffee, tea but NO SUGAR.', 'pancake.png', 250, '2'),
(3, 'Eggs and Sweet Potatoes', 'Brekfast(7.00AM)', 'Healthy Eggs and sweetpotaoes: Eggs(boiled), and sweetpotaotes(no sugar).', 'egg.png', 170, '3'),
(4, 'Legumes and vegetablese', 'Lunch(1.00PM)', 'Healthy legumes(beans, peas)with a cassava supplement and greens', 'vegetable.png', 300, '4'),
(5, 'White meat', 'Lunch(1.00PM)', 'Healthy white meat: Fish or chicken. AVOID DEEP FRYING', 'fish.png', 250, '5'),
(6, 'Fruits', 'ALL  MEAL(Before/after a meal)', 'Healthy fruits: Mangoes, avocado, water melon, apples, bananas, oranges, tomotoes', 'fruits.png', 500, '6'),
(7, 'Rice and greens/Legumes', 'Supper(6.00pm)', 'Healthy supper: Avoid eating too much during supper', 'rice-bowl.png', 167, '7');

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `ExerciseId` int(11) NOT NULL,
  `ExerciseName` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Image` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`ExerciseId`, `ExerciseName`, `Description`, `Image`, `CreatedDate`) VALUES
(1, 'Lifting Weight ', '\"DAILY ROUTINE: Exercise on a treadmill for 30 minutes. Involves using dumbells or weights to lift. CATEGORY: Body building exercise Benefits:  Improve upper body strength and assist in losing exess fat.\"', 'weights.png\r\n', '2021-07-07 18:10:41'),
(2, 'Yoga', '\"DAILY ROUTINE: 15 minute work out. Involve stretches that will help build the physical form. CATEGORY: Cardio exercise BENEFITS:  strengthen muscles decrease fatigue\"\r\n', 'yoga.png\r\n', '2021-07-07 18:10:41'),
(3, 'Treadmill', 'DAILY ROUTINE: 10 minute work out. Involve using treadmill equipment. CATEGORY: Body Building exercise BENEFITS:  strengthen muscles, decrease body fat.', 'treadmill.png\r\n', '2021-07-07 18:11:48'),
(4, 'Lunges', 'DAILY ROUTINE: 10 minute work out. 10 lunges a day.  CATEGORY: Cardio exercise BENEFITS:  strengthen muscles, decrease body fat, assist in controlling blood sugar.', 'lunges.png', '2021-07-07 18:11:48'),
(5, 'Pushups', 'DAILY ROUTINE: 15 minute work out. Involve stretches that will help build the physical form. CATEGORY: Body Building exercise BENEFITS:  strengthen muscles and improve upper body strength, helps build arm muscles.', 'push-ups.png', '2021-07-07 18:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `IngredientId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Calories` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`IngredientId`, `Name`, `Calories`) VALUES
(1, 'Fish', '100'),
(2, 'Eggs', '250');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `MealId` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Calories` varchar(50) NOT NULL,
  `Day` varchar(50) NOT NULL,
  `IngredientId` int(11) DEFAULT NULL,
  `IngredientName` varchar(255) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `UserId` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`MealId`, `Type`, `Calories`, `Day`, `IngredientId`, `IngredientName`, `Quantity`, `UserId`, `UserEmail`) VALUES
(1, 'Lunch', '250', '2021-07-20', 2, 'Eggs', 200, 1, 'kev@yahoo.com'),
(2, 'Breakfast', '250', '2021-07-20', 2, 'Eggs', 200, 1, 'kev@yahoo.com'),
(12, 'Dinner', '100', '2021-07-21', 1, 'Fish', 50, 1, 'kev@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `Id` int(11) NOT NULL,
  `MembershipId` varchar(50) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `Payment` double(10,2) NOT NULL,
  `PaymentDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentId` int(11) NOT NULL,
  `MembershipId` int(11) NOT NULL,
  `PaymentAmount` double(10,2) NOT NULL,
  `PaymentDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personalactivities`
--

CREATE TABLE `personalactivities` (
  `PersonalActivityId` int(11) NOT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Met` int(11) DEFAULT NULL,
  `Weight` int(11) DEFAULT NULL,
  `Duration` int(11) NOT NULL,
  `BurnedCalories` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personalactivities`
--

INSERT INTO `personalactivities` (`PersonalActivityId`, `UserEmail`, `Name`, `Description`, `Met`, `Weight`, `Duration`, `BurnedCalories`, `Image`, `CreatedDate`) VALUES
(1, 'kev@yahoo.com', 'Treadmill', '', 1, 80, 20, 100, 'treadmill.png', '2021-07-22 00:00:00'),
(2, 'test@yahoo.com', 'Dancing', 'Dancing to workout Music', 4, 70, 30, 0, 'jumping.png', '2021-07-22 00:00:00'),
(3, 'kev@yahoo.com', 'Dancing', 'Dancing to workout Music', 1, 80, 40, 100, 'dance.png', '2021-07-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `MembershipId` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `UserType` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `MobileNo` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Weight` double(5,2) NOT NULL,
  `Height` double(5,2) NOT NULL,
  `BMI` double(5,2) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `MembershipId`, `Name`, `UserType`, `Email`, `Password`, `MobileNo`, `Age`, `Weight`, `Height`, `BMI`, `CreatedDate`) VALUES
(1, '', 'Kev', 'USER', 'kev@yahoo.com', '1d0258c2440a8d19e716292b231e3190', '0711551145', 37, 80.00, 180.00, 24.69, '2021-07-14 15:08:09'),
(2, '', 'Anne Aol', 'USER', 'anne@yahoo.com', '1d0258c2440a8d19e716292b231e3190', '0725114412', 28, 71.00, 174.00, 23.45, '2021-07-15 04:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `xmeals`
--

CREATE TABLE `xmeals` (
  `MealId` int(11) NOT NULL,
  `MealName` varchar(50) NOT NULL,
  `MealType` varchar(50) NOT NULL,
  `Ingredients` text NOT NULL,
  `Image` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xmeals`
--

INSERT INTO `xmeals` (`MealId`, `MealName`, `MealType`, `Ingredients`, `Image`, `CreatedDate`) VALUES
(1, 'Protein Shake', 'Breakfast(7.00 Am)', 'Healthy Protein Shake: nuts, milk, kales, butter, water and avocado.', 'protein-shake.png', '2021-07-08 23:52:38'),
(2, 'Pancakes and tea/Coffee', 'Breakfast(7.00 Am)', 'Healthy Pancake: Milk, whaet flor, coffee, tea but NO SUGAR.', 'pancake.png', '2021-07-08 23:52:38'),
(3, 'Eggs and Sweet Potatoes', 'Brekfast(7.00AM)', 'Healthy Eggs and sweetpotaoes: Eggs(boiled), and sweetpotaotes(no sugar).', 'egg.png', '2021-07-08 23:52:38'),
(4, 'Legumes and vegetablese', 'Lunch(1.00PM)', 'Healthy legumes(beans, peas)with a cassava supplement and greens', 'vegetable.png', '2021-07-08 23:52:38'),
(5, 'White meat', 'Lunch(1.00PM)', 'Healthy white meat: Fish or chicken. AVOID DEEP FRYING', 'fish.png', '2021-07-08 23:52:38'),
(6, 'Fruits', 'ALL  MEAL(Before/after a meal)', 'Healthy fruits: Mangoes, avocado, water melon, apples, bananas, oranges, tomotoes', 'fruits.png', '2021-07-08 23:52:38'),
(7, 'Rice and greens/Legumes', 'Supper(6.00pm)', 'Healthy supper: Avoid eating too much during supper', 'rice-bowl.png', '2021-07-08 23:52:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`ActivityId`);

--
-- Indexes for table `diets`
--
ALTER TABLE `diets`
  ADD PRIMARY KEY (`DietId`);

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`ExerciseId`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`IngredientId`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`MealId`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentId`);

--
-- Indexes for table `personalactivities`
--
ALTER TABLE `personalactivities`
  ADD PRIMARY KEY (`PersonalActivityId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `xmeals`
--
ALTER TABLE `xmeals`
  ADD PRIMARY KEY (`MealId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `ActivityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diets`
--
ALTER TABLE `diets`
  MODIFY `DietId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `IngredientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `MealId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personalactivities`
--
ALTER TABLE `personalactivities`
  MODIFY `PersonalActivityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `xmeals`
--
ALTER TABLE `xmeals`
  MODIFY `MealId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
