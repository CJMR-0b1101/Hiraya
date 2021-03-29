-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 08:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiraya_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `blog_title` varchar(300) NOT NULL,
  `blog_description` varchar(400) NOT NULL,
  `blog_content` varchar(1000) NOT NULL,
  `blog_header` varchar(300) NOT NULL,
  `about_me` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `user_id`, `blog_title`, `blog_description`, `blog_content`, `blog_header`, `about_me`) VALUES
(1, 1, 'Island and Heaven', 'Short blog for my appreciation of the island', 'Crystal clear blue and green water, talcum powder white sand. Nature gave this beach everything and it is super clean since the closure. There isn\'t a lot of shade now so mornings and sunset are best. I was there during a very quiet time, which was heaven. It can be easy to find a peaceful spot during peak times.', 'Mufasa123-blog-1-619400886.jpg', 'I am a travel-enthusiast from Harvard University. Traveling is the best thing to experience in life.'),
(2, 1, 'Siargao: Accomodation', 'This blog explains the remarkable accommodation in Siargao', 'The location was great! In staying elsewhere in Siargao, closer to General Luna, this place was very peaceful in comparison, especially in the evenings. The staff were very accommodating and friendly. Chris and Dong were especially great! The beachfront was also a huge plus, and i am sure once the pool is finished, along with the construction of new villas, it will be fantastic! Warung was great for food and coffee in the morning. It is nice that you are about equal distance from both Cloud 9 and General Luna, making it easy to go out for activities during the day or night. Also, the WiFi here was the best i had out of all my stays at other places. Good overall low-key vibe, with offering the excellence of a high-end establishment!', 'Mufasa123-blog-2-1494116157.jpg', 'The name\'s Mufasa, I am a travel-enthusiast from Harvard University. Traveling is the best thing to experience in life.'),
(3, 1, 'Highlight of the Trip', 'The blog summarizes the highlight of my trip', 'Communication prior to the trip was a little sporadic, but honestly, the \"Ultimate Adventure\" was the highlight of our trip to the Philippines. We had an amazing time. The crew was awesome and genuine, the food was beyond amazing (and there was tons of it), and everywhere you looked was literally a postcard! Furthermore, the other people on our boat (17 total, including us two) were fun, interesting, and thoughtful which really enhanced the overall experience. I would highly recommend the Ultimate Tour over any of the day tours in Coron or El Nido!', 'Mufasa123-blog-3-901915255.jpg', 'The name\'s Mufasa, I am a travel-enthusiast from Harvard University. Traveling is the best thing to experience in life'),
(4, 1, 'Best Islands in Southeast Asia', 'Short blog for my appreciation of one of the best islands in Southeast Asia', 'Amazing islands, amazing food and amazing people. Well worth the money :) I did this trip with my boyfriend as we are travelling south east Asia. This has been our fav activity so far! The crew are lovely and so is the ship dog', 'Mufasa123-blog-4-1615924715.jpg', 'I am a travel-enthusiast from Harvard University. Traveling is the best thing to experience in life.'),
(5, 2, 'Such a pretty place', 'This blog describes my experience in Coron', 'There are companies in Coron who will take you for a day of sightseeing to many lakes and lagoons. If you have a free day don\'t miss this. You don\'t need to actually snorkel, swimming in the crystal clear water is just as good. They will tell you a floating device is a must but that\'s to protect anyone who can\'t swim or snorkel well, but they won\'t take chances. It\'s the law. I loved our day, it was magic.', 'BlackWidow-blog-5-662560531.jpg', 'Scarlett Johansson is my name. I love gymnastics as much as I love to travel. Learning other cultures and seeing wonders relieves me from stress.'),
(6, 2, 'Must do tour', 'In this blog, I summarize my vacation', 'We were on the 3d2n trip from EL Nido to Coron and it was simply amazing! We were not really sure about the trip in the beginning...so many factors, the other people that will be there, the food, the fact that you sleep for 2 nights who knows where. Many questions.. But in the end we decided to just try it as it sounded like a great experience, the only way to see certain islands that aren\'t touched by tourists otherwise. And i have to say it was the best decision ever! We met the nicest people, we ate the best food in the Philippines! The islands that we slept on for those 2 nights were really pretty, most amazing sunsets! They had prepared there some really cute huts, 2 people for one hut. They had mattresses and pillows and blankets and mosquito nets. Our team leader was Vanessa and she was super nice, really helpful. The rest of the crew was also really nice and they all took care that we had a lovely time. The trip itself was amazing. We stopped in really nice places to snorkel, s', 'BlackWidow-blog-6-23623447.jpg', 'Scarlett Johansson is my name. I love gymnastics as much as I love to travel. Learning other cultures and seeing wonders relieves me from stress.'),
(7, 2, 'Sensible Perspective of Philippine Culture', 'It summarizes my experience in learning the culture of the Philippines', 'This is the second time I\'ve participated in the guided tour. Philippine history and culture is the intersection of many cultures through the centuries, it\'s amazing that there were still things to discover, and to be said about the islands. Our tour guide did very well, he puts a lot of passion and research into his craft. I will not be surprised to learn something else if I were to participate a 3rd or a 4th time. Thanks again.', 'BlackWidow-blog-7-2020050187.jpg', 'Scarlett Johansson is my name. I love gymnastics as much as I love to travel. Learning other cultures and seeing wonders relieves me from stress.'),
(8, 3, 'In-depth introduction to the complex history of the Philippines', 'This blog shows how much I learned about the Philippines', 'The tour went deep into the complicated history of the Philippines, focusing primarily on the history and effects of Spanish colonization, but also touching on distinct Filipino values, all of it including the good, the bad, and the ugly. I can\'t think of a better way to start a holiday in the Philippines than immersing yourself in the historical context that provides a backdrop for why the Philippines is the way it is today. Take this tour!', 'doglover-blog-8-690590516.jpg', 'I always bring my pet to the tours I went into. He never got lost because we are both fond of traveling and having wonderful escapades in many different places. Btw, I\'m Keanu.'),
(9, 3, 'Our Honeymoon in the Philippines', 'I wrote a simple summary of our Honeymoon in Coron', 'My husband and I decided to travel the Philippines for our honeymoon in November. It was a fantastic experience and my favourite destination was definitely Coron, we liked it so much that we extended our stay by 2 extra days here. The town felt incredibly safe and calm, no one hassled us like they did in Boracay. There were always things to do and see near the island as well, and we were busy every day in Coron. I can\'t decide what my favourite part was but seeing the Twin lagoon, Kayangan Lake, and all of the shipwrecks that were covered in coral were incredible. I highly recommend this destination if planning a trip to Palawan.', 'doglover-blog-9-530242189.jpg', 'I always bring my pet to the tours I went into. He never got lost because we are both fond of traveling and having wonderful escapades in many different places. Btw, I\'m Keanu.'),
(10, 4, 'A clean white beach', 'This explains the cleanliness of Boracay', 'Pristine white sand beach, few people, very clean. This is a very good time to go to Boracay, less foot traffic. Very few open establishments but still have good choices for when you want to eat and unwind.\r\n', 'GodOfThunder-blog-10-1800952271.jpg', 'My name\'s Chris. I am a professional body-builder and I love to go to beautiful islands to relax and meet new people. I love showing off my body under the sun.'),
(11, 4, 'Best place to unwind', 'It describes Boracay like a paradise\r\n', 'The beach was clean and was devoid of any waste paper or trash. A charming view of the sunrise and sunset. Lots of water sports available. It\'s just a paradise. A combination of beautiful green water and white sand is a treat to the eyes.', 'GodOfThunder-blog-11-422887915.jpg', 'My name\'s Chris. I am a professional body-builder and I love to go to beautiful islands to relax and meet new people. I love showing off my body under the sun.'),
(12, 4, 'Best Island Hopping Tour', 'This blog defines my vacation via Island Hopping', 'We had an amazing time on tour which took us to three separate islands. There was plenty of time off the boat to explore the islands and take a dip. Lunch and drinks were included in the tour which included a large selection of dishes which we had on the beach. It was such a perfect time to relax and hang out with the tour guides who provided us with lots of local knowledge and candid tips and perspectives on island life. Aui was our guide, I highly recommend her if you get a chance to take this tour, she was so super chilled and easy to talk to, thanks for the awesome time!', 'GodOfThunder-blog-12-43064765.jpg', 'I am Thor, I am a professional body-builder and I love to go to beautiful islands to relax and meet new people. I love showing off my body under the sun.'),
(13, 5, 'Magical experience in an island', 'This blog shows how magically amazed I am on the trip', 'Coron Bay is where all the magic happens. This breathtaking maze of deep blue water winds around tall limestone cliffs that remind you of the movie ‘Avatar’- it almost doesn’t seem real. There are multiple shipwrecks in the bay that have encouraged the growth of natural reefs. These reefs and the wrecked ships make ideal dive and snorkel spots. You can sign up for Island Tours that take you through Coron Bay while stopping at secret inlets, guiding you to the best swim spots, and visiting viewpoints that give you full perspective of the bay.', 'WonderWoman84-blog-13-2003389632.jpg', 'I am Gal. I always look into the fine cuisines and experience other cultures when I travel. I believe that every person from different places has a good heart.'),
(14, 5, 'Interesting and Fun in Manila', 'In this blog, I wrote my wonderful experience in Manila', 'Being a local, I had my doubts on visiting Intramuros for a guided tour. Growing up it was always a part of field trips and even seeing the church for weddings. More a trip through history than a sightseeing tour, each stop was filled with thought provoking details of Philippine history and how it has formed the Philippine culture. I cannot imagine appreciating each detail of the places we went without the thorough backstory and cultural relevance pointed during our tour.', 'WonderWoman84-blog-14-1876584512.jpg', 'I am Gal Gadot. I always look into the fine cuisines and experience other cultures when I travel. I believe that every person from different places has a good heart.'),
(15, 5, 'The Lagoon is just too good', 'It shows my appreciation for the Lagoon in Siargao', 'We did the Sugba Lagoon and Kwahagan island tour with Roy as our Guide. It was such a great day and Roy has a great ability bringing people of all nationalities together. The Lagoon was really beautiful and we had such a great time jumping off the board, Standup paddle boarding (SUP) and snorkeling. Lunch was amazing, the tuna was delicious. He is a very funny man and had us all laughing. I had a great day.', 'WonderWoman84-blog-15-888060683.jpg', 'I am Wonder Woman, aka. Gal Gadot.I always look into the fine cuisines and experience other cultures when I travel. I believe that every person from different places has a good heart.'),
(16, 5, 'Boracay: Stress-free carefree', 'Appreciation blog for the times I have been to Boracay', 'The paradise is pretty close to this place. I have been many many times and I never get sick of it, stress just melts away here as the sedate pace of island life takes hold.\r\n', 'WonderWoman84-blog-16-1087154905.jpg', 'I am Wonder Woman, aka. Gal Gadot.I always look into the fine cuisines and experience other cultures when I travel. I believe that every person from different places has a good heart.'),
(17, 3, 'Three Island Tour', 'Short blog appreciation for the three island in Siargao', 'Can’t go wrong with My Siargao Guide! My cousins and I didn’t have a set plan on guided tours. We just happened to come across My Siargao Guide via Bravo Hotel/Resort. It was a breeze to sign up. Just inquire with the front desk and they’ll fill you in on the details. No need to be hotel guests to join the tour. We chose the 3 Island Tour which was absolutely beautiful. For the price you definitely get your money’s worth. It includes a shuttle to and from the boat docks, an amazing guide(s) (shout out to Eva and Mary!) as well as snacks, drinks (soda, beer & Filipino Rum) AND lunch! Btw we had the most delicious grilled Mahi-Mahi served for our beach side lunch spread freshly caught that day! You won’t be disappointed! Happy Adventures! Cheers!', 'doglover-blog-17-1159704211.jpg', 'I am Keanu. I always bring my pet to the tours I went into. He never got lost because we are both fond of travelling and having wonderful escapades in many different places.\r\n'),
(18, 3, 'Engaging and thought-provoking', ' I wrote this blog to show how much engaged I am in the Philippine History', 'I grew up in Metro Manila and have visited the historic Intramuros many times. I didn\'t think I would learn anything new this time around but, as you can see in my rating, I was wrong. Our tour guide was friendly and took us through centuries of Philippine history without ever being boring. He encouraged our group of 7 to go beyond historic events and analyze what they meant for Filipinos back then, and what they mean for us now. It helped me see Manila in a totally different light. I don\'t think I would have appreciated the sites we visited if he didn\'t provide context, which makes the tour totally worth it.', 'doglover-blog-18-240980204.jpg', 'I am Keanu. I always bring my pet to the tours I went into. He never got lost because we are both fond of travelling and having wonderful escapades in many different places.'),
(19, 6, 'El Nido: Worth every penny', 'This blog recommends the whole trip because it is worth it', 'I recently went on this trip with a friend after being recommended by someone else who had been travelling in the Philippines. 100% worth the money! Lots of amazing stops that you wouldn’t get to see otherwise. All of the crew were absolutely amazing - really attentive and they help you out with anything you need (including free diving to get dropped belongings!). We saw some incredible places, and the food was phenomenal. Possibly the best meals we’ve had since being in the Philippines. So glad we went on this trip, a really good way to see so many secret spots around Palawan. The only thing to be aware of is there is a lot of snorkelling. Not a bad thing at all, but it would be nice to stop on a beach for a chill for a bit longer to relax. There’s always the option of the kayaks taking you out rather than swimming though! Good for all ages.\r\n', 'RyouHikaru-blog-19-2008214579.jpg', 'I am the Traveler from Teyvat. My name\'s Ryou. To everyone reading this, nice.'),
(20, 6, 'Magical experience in an island', 'This blog shows how magically amazed I am on the trip in Coron', 'Coron Bay is where all the magic happens. This breathtaking maze of deep blue water winds around tall limestone cliffs that remind you of the movie ‘Avatar’- it almost doesn’t seem real. There are multiple shipwrecks in the bay that have encouraged the growth of natural reefs. These reefs and the wrecked ships make ideal dive and snorkel spots. You can sign up for Island Tours that take you through Coron Bay while stopping at secret inlets, guiding you to the best swim spots, and visiting viewpoints that give you full perspective of the bay.', 'RyouHikaru-blog-20-2101541789.jpg', 'I am Ryou, the Traveler. I like books and stuff. But most of all, I am INEVITABLE.'),
(21, 6, 'What a Natural Beauty: Coron', 'This show the wonders of nature in Coron', 'A stunning place to visit with beautiful blue water, white sand and islands in the water that make for a wonderful excursion. Coron Town itself is a bit chaotic so watch-out for the traffic going through its narrow streets and roads.', 'RyouHikaru-blog-21-1526205438.jpg', 'I am Ryou. If you don\'t know me yet, follow me on Twitter, @ryouhikaru.\r\nThanks folks!');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `picture_id` int(10) NOT NULL,
  `blog_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `picture_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`picture_id`, `blog_id`, `user_id`, `picture_name`) VALUES
(1, 1, 1, 'Mufasa123404348351.jpg'),
(2, 1, 1, ''),
(3, 1, 1, ''),
(4, 1, 1, ''),
(5, 2, 1, 'Mufasa123774320865.jpg'),
(6, 2, 1, 'Mufasa123250013453.jpg'),
(7, 2, 1, ''),
(8, 2, 1, ''),
(9, 3, 1, 'Mufasa1231086080724.jpg'),
(10, 3, 1, ''),
(11, 3, 1, ''),
(12, 3, 1, ''),
(13, 4, 1, ''),
(14, 4, 1, ''),
(15, 4, 1, ''),
(16, 4, 1, ''),
(17, 5, 2, 'BlackWidow188514074.jpg'),
(18, 5, 2, ''),
(19, 5, 2, ''),
(20, 5, 2, ''),
(21, 6, 2, 'BlackWidow975148804.jpg'),
(22, 6, 2, ''),
(23, 6, 2, ''),
(24, 6, 2, ''),
(25, 7, 2, 'BlackWidow483227063.jpg'),
(26, 7, 2, ''),
(27, 7, 2, ''),
(28, 7, 2, ''),
(29, 8, 3, 'doglover186149117.jpg'),
(30, 8, 3, 'doglover550834972.jpg'),
(31, 8, 3, 'doglover805870841.jpg'),
(32, 8, 3, ''),
(33, 9, 3, 'doglover350227159.jpg'),
(34, 9, 3, 'doglover216273640.jpg'),
(35, 9, 3, ''),
(36, 9, 3, ''),
(37, 10, 4, 'GodOfThunder253380234.jpg'),
(38, 10, 4, 'GodOfThunder904364813.jpg'),
(39, 10, 4, ''),
(40, 10, 4, ''),
(41, 11, 4, 'GodOfThunder2117269867.jpg'),
(42, 11, 4, ''),
(43, 11, 4, ''),
(44, 11, 4, ''),
(45, 12, 4, 'GodOfThunder1470527102.jpg'),
(46, 12, 4, ''),
(47, 12, 4, ''),
(48, 12, 4, ''),
(49, 13, 5, 'WonderWoman84225568158.jpg'),
(50, 13, 5, 'WonderWoman841144748437.jpg'),
(51, 13, 5, ''),
(52, 13, 5, ''),
(53, 14, 5, ''),
(54, 14, 5, ''),
(55, 14, 5, ''),
(56, 14, 5, ''),
(57, 15, 5, 'WonderWoman841252670230.jpg'),
(58, 15, 5, ''),
(59, 15, 5, ''),
(60, 15, 5, ''),
(61, 16, 5, 'WonderWoman841402091782.jpg'),
(62, 16, 5, 'WonderWoman84932330191.jpg'),
(63, 16, 5, ''),
(64, 16, 5, ''),
(65, 17, 3, 'doglover116885663.jpg'),
(66, 17, 3, ''),
(67, 17, 3, ''),
(68, 17, 3, ''),
(69, 18, 3, ''),
(70, 18, 3, ''),
(71, 18, 3, ''),
(72, 18, 3, ''),
(73, 19, 6, 'RyouHikaru967346689.jpg'),
(74, 19, 6, ''),
(75, 19, 6, ''),
(76, 19, 6, ''),
(77, 20, 6, 'RyouHikaru907998991.jpg'),
(78, 20, 6, 'RyouHikaru924810851.jpg'),
(79, 20, 6, ''),
(80, 20, 6, ''),
(81, 21, 6, 'RyouHikaru852188277.jpg'),
(82, 21, 6, ''),
(83, 21, 6, ''),
(84, 21, 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary`
--

CREATE TABLE `itinerary` (
  `itinerary_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(100) NOT NULL,
  `day_1` varchar(100) DEFAULT NULL,
  `day_2` varchar(100) DEFAULT NULL,
  `day_3` varchar(100) DEFAULT NULL,
  `image_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`, `day_1`, `day_2`, `day_3`, `image_file`) VALUES
(1, 'Boracay', 'https://i.imgur.com/iPF3pTD.png', 'https://i.imgur.com/SVLfbYY.png', 'https://i.imgur.com/09IakRQ.png', 'https://i.imgur.com/rto7v35.png'),
(2, 'Bohol', 'https://i.imgur.com/wYb9qjG.png', 'https://i.imgur.com/FYyD4Z0.png', 'https://i.imgur.com/o0fgGKN.png', 'https://i.imgur.com/BTaCY7S.png'),
(3, 'El Nido', 'https://i.imgur.com/EJNeRkT.png', 'https://i.imgur.com/xu2rswN.png', 'https://i.imgur.com/DiIkV0p.png', 'https://i.imgur.com/SinGOTQ.png'),
(4, 'Coron', 'https://i.imgur.com/HjD1kRk.png', 'https://i.imgur.com/SeeMtIx.png', 'https://i.imgur.com/09IakRQ.png', 'https://i.imgur.com/vWnRG6s.png'),
(5, 'Baguio', NULL, NULL, NULL, 'https://i.imgur.com/ddfyDyA.png'),
(6, 'Siargao', 'https://i.imgur.com/xoZsG4s.png', 'https://i.imgur.com/eIbfMSa.png', 'https://i.imgur.com/22Z2rRv.png', 'https://i.imgur.com/ea5g1Xh.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `age` int(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `location` varchar(300) DEFAULT NULL,
  `profile_picture` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `age`, `email`, `location`, `profile_picture`) VALUES
(1, 'Mufasa123', '1f3c53ae14626035383b39c207564d32d083e8fd', 'James Earl', 'Jones', 32, 'mufasa@gmail.com', 'Mt. Apo', 'Mufasa1231483079615.jpg'),
(2, 'BlackWidow', '1f3c53ae14626035383b39c207564d32d083e8fd', 'Scarlett', 'Johansson', 31, 'blackwidow@gmail.com', 'San Mateo, Rizal', 'BlackWidow984562612.jpg'),
(3, 'doglover', '1f3c53ae14626035383b39c207564d32d083e8fd', 'Keanu', 'Reeves', 40, 'doglover@yahoo.com', 'Sta. Mesa, Manila', 'doglover1492561787.jpg'),
(4, 'GodOfThunder', '1f3c53ae14626035383b39c207564d32d083e8fd', 'Chris', 'Hemsworth', 45, 'thornmail@rocketmail.com', 'Mexico, Pampanga', 'GodOfThunder504465386.jpg'),
(5, 'WonderWoman84', '1f3c53ae14626035383b39c207564d32d083e8fd', 'Gal', 'Gadot', 34, 'wonderwoman64@ymail.com', 'Sampaloc, Manila', 'WonderWoman841808377307.jpg'),
(6, 'RyouHikaru', '1f3c53ae14626035383b39c207564d32d083e8fd', 'Ryou', 'Hikaru', 0, 'ryouhikaru13@gmail.com', 'San Juan, Metro Manila', 'RyouHikaru390138205.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD PRIMARY KEY (`itinerary_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `picture_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `itinerary`
--
ALTER TABLE `itinerary`
  MODIFY `itinerary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
