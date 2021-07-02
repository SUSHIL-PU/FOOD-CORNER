
-- Database: food-corner

-- --------------------------------------------------------------------------

-- Structure of `category` table


CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
);


-- Initial data for table `category`

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Pizza', 'pizza.jfif', 'Yes', 'Yes'),
(2, 'Burger', 'burger.jfif', 'Yes', 'Yes'),
(3, 'Thali', 'thali.jfif', 'Yes', 'Yes');



-- --------------------------------------------------------------------------

-- Structure of `food` table

CREATE TABLE IF NOT EXISTS `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
);


-- Initial data for table `food`

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'California Pizza', 'A pizza with mustard, ricotta, pate, and red pepper', '500', 'california.jpg', 1, 'Yes', 'Yes'),
(2, 'Best cheesy Burger', 'delicious pie dates, Pineapple and lots of Cheese.', '400', 'cheesy.jpg', 2, 'Yes', 'Yes'),
(3, 'Tamilnadu Sappadu Thali', 'curries, mixed vegetables, curd rice and sticky rice puddings.', '800', 'tamilnadu.jpg', 3, 'Yes', 'Yes'),
(4, 'Nepolitan Pizza', 'delicious pie dates with Features tomatoes, sliced mozzarella, basil, and extra virgin olive oil.', '600', 'neapolitan.jpg', 1, 'No', 'Yes'),
(5, 'Chicken Burger', 'Best chicken burger', '600', 'chicken_burger.jpg', 5, 'Yes', 'Yes'),
(6, 'Mixed Pizza', 'Pizza with chicken, Mushroom and Vegetables', '800', 'pizza1.jfif', 2, 'Yes', 'Yes'),
(7, 'Kerala Sadhya Thali', 'hot and spicy, use of coconut oil, mustard seeds, curry leaves and coconut milk', '900', 'Kerala_thali.jpg', 3, 'Yes', 'Yes'),
(8, 'St. Louis Pizza', 'cheese and a sweeter tomato sauce with a hefty dosage of oregano', '700', 'st_louis_pizza.jpg', 1, 'Yes', 'Yes'),
(9, 'Peanut Burger', 'The best peanut', '250', 'peanut_burger.jpg', 2, 'Yes', 'Yes'),
(10, 'Veg Burger', 'Veg burger', '200', 'veggie_burger.jpg', 2, 'Yes', 'Yes'),
(11, 'Maharashtra Thali', 'extremely spicy and unique masalas, little amount of rice with daal, chappati, variety of bhajis, sabudaana vada, pav bhaji', '1000', 'maharashtra.jpg', 3, 'Yes', 'Yes');





-- ---------------------------------------------------------------------

-- Structure of `order` table

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
);

--
-- Initial data for table `order`
--

INSERT INTO `order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Mixed Pizza', '800', 1, '800', '2021-06-18 08:28:53', 'Delivered', 'Sushil', '1235432112', 'sushil@gmail.com', 'home');



-- -------------------------------------------------------------------------

-- Making `id` as primary key of all the table


ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--

ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--

ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);



-- ---------------------------------------------------------------------------

-- Changing `id` as AUTO_INCREMENT

ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--

ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--

ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;
