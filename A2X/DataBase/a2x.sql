-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2022 at 04:13 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a2x`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `About_ID` int(225) NOT NULL,
  `About1` text NOT NULL,
  `AboutImg1` text NOT NULL,
  `About2` text NOT NULL,
  `AboutImg2` text NOT NULL,
  `WK1` text NOT NULL,
  `WKImg1` text NOT NULL,
  `WK2` text NOT NULL,
  `WKImg2` text NOT NULL,
  `WK3` text NOT NULL,
  `WKImg3` text NOT NULL,
  `WK4` text NOT NULL,
  `WKImg4` text NOT NULL,
  `WK5` text NOT NULL,
  `WKImg5` text NOT NULL,
  `WK6` text NOT NULL,
  `WKImg6` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`About_ID`, `About1`, `AboutImg1`, `About2`, `AboutImg2`, `WK1`, `WKImg1`, `WK2`, `WKImg2`, `WK3`, `WKImg3`, `WK4`, `WKImg4`, `WK5`, `WKImg5`, `WK6`, `WKImg6`) VALUES
(1, ' In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful ', '55932482_2022-06-09_GettyImages_1238367235.0.jpg', ' Lorem', '1446097564_2022-06-09_137769042-software-development-seamless-pattern-with-flat-line-icons-programming-language-background-applicati.png', 'Elone Musk', '935772983_2022-06-09_Story Thumbnail (1).png', 'Naman Roy', '1171300355_2022-06-09_137769042-software-development-seamless-pattern-with-flat-line-icons-programming-language-background-applicati.png', 'Muskan Sharma', 'Team3.png', 'Sonam Roy', 'Team1.png', 'Cristyano Ronaldo', '1734750960_2022-06-09_ycfo1ij59n5ex470xjlk.jpg', 'Mohit Varma', '820098372_2022-06-09_Vs Code.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(225) NOT NULL,
  `Category_Name` varchar(225) NOT NULL,
  `Posts` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`, `Posts`) VALUES
(17, 'Data Cable', 3),
(18, 'Charger', 1),
(19, 'EarPhone', 2),
(20, 'Speaker', 1),
(21, 'AUX', 1),
(22, 'Dhananjay', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactinfo`
--

CREATE TABLE `contactinfo` (
  `Cont_ID` int(11) NOT NULL,
  `Face` text NOT NULL,
  `Insta` text NOT NULL,
  `Linke` text NOT NULL,
  `Twitter` text NOT NULL,
  `Whats` text NOT NULL,
  `Phone` text NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Number1` text NOT NULL,
  `Number2` text NOT NULL,
  `WorkingTime` text NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactinfo`
--

INSERT INTO `contactinfo` (`Cont_ID`, `Face`, `Insta`, `Linke`, `Twitter`, `Whats`, `Phone`, `Email`, `Number1`, `Number2`, `WorkingTime`, `Address`) VALUES
(1, 'http://localhost/phpmyadmin', 'http://localhost/phpmyadmin', 'http://localhost/phpmyadmin', 'http://localhost/phpmyadmin', '9971455192', '2222222222', 'CodingDhananjay@gmail.com', '2222222222', '8368692759', 'Working 9:Am to 9:Pm So you can Go it', 'Baljeet nagar, New Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `homeabout`
--

CREATE TABLE `homeabout` (
  `HA_ID` int(11) NOT NULL,
  `About1` text NOT NULL,
  `AboutImg1` text NOT NULL,
  `About2` text NOT NULL,
  `AboutImg2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homeabout`
--

INSERT INTO `homeabout` (`HA_ID`, `About1`, `AboutImg1`, `About2`, `AboutImg2`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type spsdfsdastandard as opposed to using \'Content here, content here\', making it look like readable English. Many sadstribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many sadfas opposed to using \'Content here, content here\', making it look like readable English. Many sadstribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many sadf', '1424656031_2022-06-03_850e5a2b2d88d418c7c143b7a34e7602.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many sadstribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many sadfas opposed to using \'Content here, content here\', making it look like readable English. Many sadstribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many sadf', '182495707_2022-06-03_funkylife-hindi-motivational-quote-38.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Pro_ID` int(225) NOT NULL,
  `Pro_Title` varchar(225) NOT NULL,
  `Pro_Price` int(225) NOT NULL,
  `Pro_Category` int(225) NOT NULL,
  `Pro_Desc` text NOT NULL,
  `Pro_Img` text NOT NULL,
  `Pro_TTitle` text NOT NULL,
  `Pro_TDesc` text NOT NULL,
  `Pro_Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Pro_ID`, `Pro_Title`, `Pro_Price`, `Pro_Category`, `Pro_Desc`, `Pro_Img`, `Pro_TTitle`, `Pro_TDesc`, `Pro_Date`) VALUES
(36, 'Best Speader with best sound quality | speaker build quality so good and best', 329, 20, 'This is the best speaker for travling and house party with loaud sound with best quality sound and this speader brand name is a2x', 'Pro_1831412264_2022-05-14_speaker4.jpg,Pro_232355700_2022-05-14_speaker3.jpg,Pro_563053357_2022-05-14_speaker2.jpg,Pro_1488733419_2022-05-14_speaker.jpg,', 'Color,Sound,Mic,Battery Backup,Conectivity,Waight,Length,Total Speaker,Power,Warrinty', 'Black,Best Sound,Free,8 hours,Bloothoth,6KG,3 Miter,5 Speakers,80Valt,1year', '2022-05-15 00:56:12'),
(37, 'Lenovo Micro USB Data Cable Tangle-free  Aramid fiber braided 1m cable with 4A charging & 480 MBPS data transmission', 25, 17, 'This is the best data cable in india and this data cable comfortable with all phones and with is charge very fast and very durable', 'Pro_233275418_2022-05-14_Data cable 1.jpg,Pro_1809588983_2022-05-14_Data cable 3.jpg,Pro_217130023_2022-05-14_Data cable 2.jpg,', 'Color,Brand,Length,Metrial,Quality,Thicknas,Power,Charging Tile,Cable Type', 'Red,A2X,1 Miter,PVC,Best Quality,3.5mm,2.5AM,3 hours,Type A', '2022-05-15 01:40:39'),
(39, 'Apple 20W USB-C Power Adapter (for iPhone, iPad & AirPods) Apple 20W USB-C Power Adapter', 89, 18, 'Pro 10.5-inch, iPad Air (4th generation), iPad Air (3rd generation), iPad (8th generation), iPad (7th generation), iPad mini (5th generation) AirPods Compatability: AirPods Max, AirPods Pro, AirPods With Wireless Charging', 'Pro_39336781_2022-05-14_charger-4.jpg,Pro_243692379_2022-05-14_charger-3.jpg,Pro_99157490_2022-05-14_charger-2.jpg,Pro_1619989642_2022-05-14_Charger-1.jpg,', 'Color,Brand,Length,Power,Suport,Chrager Type,Total Gack,Quality,Charging Time,Metrial,Cable Type', 'White,A2X,2Miter,2.4 MPA,All Phones,USB,1,Best Quality,2 hours,Plastic,Type C', '2022-05-15 02:00:08'),
(40, 'Bluetooth 4.1 Headphones Wireless Magnetic Sports Earphones Earbuds Gym Headset for iPhone XS XR X 8 7 6 Plus Samsung S10/S10E/S9/S9 Plus/Note9/8/5', 149, 19, 'Within 10 meters working distance gives you strong signal\r\nCool magnetic attraction, creating a fashionable sport lifestyle\r\nBuilt-in microphone, noise isolation, enjoy digital-quality music and convert between music and calling mode freely', 'Pro_765082528_2022-05-14_ear.jpg,Pro_1987005729_2022-05-14_ear3.jpg,Pro_115772388_2022-05-14_earr.jpeg,Pro_1622782762_2022-05-14_eard.jpg,', 'Bluetooth version,Colro,Brand,Version,Charging Time,Play Time,Quality,Metrial,Power,length,Waigth', 'Bluetooth 4.1,Red,A2X,3.2 ASO,1.5 hours,3 hours,Best Qaulity,PVC,2.3 Am,0.5Miter,100GM', '2022-05-15 02:07:18'),
(54, 'Havit SK208 RGB Stereo Speaker | USB PoweredHavit SK208 RGB Stereo Speaker | USB Powered', 1599, 17, 'Output power 5w (* 2). Dimensions: 78x180x90 mm.\r\nStereo speakers with led lighting.\r\n3.5mm connection\r\nUSB powered\r\nWith volume controller', 'Pro_1802750196_2022-05-15_s1.jpg,Pro_1229356333_2022-05-15_s4.jpg,Pro_856584847_2022-05-15_s2.jpeg,', 'Color,Waight,Sound,Mic,Battery Backup,Conectivity,Brand,Power,Matrial,Battery Backup,Length,Total Speaker,Warrinty', 'Red,3KG,Best Sound,Free,8 hours,	Bloothoth,A2X,100WALT,Palstic,8 Hours,3 Miter,5 Speakers,2 Years', '2022-05-15 16:46:41'),
(55, 'Baseus AUX Cable Jack 3.5mm Audio Cable 3.5 mm Jack Audio Cable Adapter for Car Headphone Speaker Computer Laptop Wire Aux Cord', 499, 21, 'holder for the duration of delivery on all orders - 2-3 times longer than others. If he sends a faulty item, he does not respond to messages in chat. Only after opening a dispute begins to answer, but offers first to close the dispute, and then in 3(!) days he will send a replacement. Do not agree in any case. Dis', 'Pro_1882106147_2022-05-15_A1.jpg,Pro_2095222481_2022-05-15_a3.jpg,Pro_762912776_2022-05-15_a2.jpg,Pro_1177669320_2022-05-15_61KISavIovL._AC_SY450_.jpg,', 'Color,Pin Color,Brand,Length,Battery Backup,Mic,Power,Matrial,Comfortable,Warrinty', 'Black,Gold,A2X,2 Miter,20 Hourse,Enable,3 WALT,Plastic,All Divices,1 Year', '2022-05-15 16:55:46'),
(56, '10FT Long Android Charger Cable Fast Charge,USB to Micro USB Cable White,Micro USB 2.0 Cable USB Micro Cable for Samsung Charger Cord', 48, 17, 'High Quality Charge and Sync Cable USB Android Cable Micro USB cords : Heavy Duty micro usb cable with thicker gauge wire resists corrosion for signal purity and ensures maximum charging speed for charge devices via any USB port. Great performance of the fast charge cord ensures your devices syncs and charge simultaneously.', 'Pro_2042934110_2022-05-15_download.jpg,Pro_1658298685_2022-05-15_images (3).jpg,Pro_1894032651_2022-05-15_images (2).jpg,Pro_1562349421_2022-05-15_images (1).jpg,Pro_1484799028_2022-05-15_download (1).jpg,', 'Color,length,Brand,Power,Thicknas,Cable Type,Charging Time,Confortable,Cable Type,Matrial', 'Black,1 Miter,A2X,2.4 AMP,3.5mm,Type A,3 Hour,All Mobile,Type C,PVC', '2022-05-15 17:03:35'),
(57, ' AIRPODS I11 – TWS REPLICA Cable Fast Charge,USB to Micro USB Cable White,Micro USB 2.0 Cable USB Micro Cable for Samsung Charger Cord', 1299, 19, 'The 11-TWS Sensor Wireless Headphones are compact, portable headphones that give you the freedom to operate. Wireless headphones are a revolutionary invention that not only saves your wires that are always confused and power everything around you.', 'Pro_1142717333_2022-05-15_sd.jpg,Pro_2037752920_2022-05-15_g.jpg,Pro_1156455698_2022-05-15_e.jpg,Pro_1007446144_2022-05-15_d.jpg,', 'Color,Waight,Brand,Battery Backup,Charging Time,Mic,Comfortable,Charging Prot,Warrany,Condition', 'White,200GM,A2X,8 Hours,3 Hours,Yes,All Phones,Type C,1 Year,Brand New', '2022-05-15 17:10:33'),
(58, 'This is the best product for ever', 399, 22, ' publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availab', 'Pro_760344696_2022-06-23_bus.png,Pro_1689302347_2022-06-23_airplane.png,Pro_1765162739_2022-06-23_train.png,', 'Brand,Color,height,asifh', 'Xtar Dhananjay, Red,20px,ishdfo', '2022-06-23 12:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(225) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Username` varchar(225) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `Role` varchar(225) NOT NULL,
  `Img` varchar(225) NOT NULL,
  `Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Username`, `Password`, `Role`, `Img`, `Time`) VALUES
(17, 'Dhananjay', 'Dhananjay23', '202cb962ac59075b964b07152d234b70', 'Admin', '2047750774_2022-05-12_Untitled-12.png', '2022-05-12 00:00:00'),
(18, 'Ajay Gupta', 'Ajay07', 'c20ad4d76fe97759aa27a0c99bff6710', 'Normal User', '1962021381_2022-05-12_man.png', '2022-05-12 00:00:00'),
(19, 'Sharuk Khan', 'Sharuk', '202cb962ac59075b964b07152d234b70', 'Normal User', '168115429_2022-06-02_850e5a2b2d88d418c7c143b7a34e7602.jpg', '2022-06-02 08:51:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`About_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `contactinfo`
--
ALTER TABLE `contactinfo`
  ADD PRIMARY KEY (`Cont_ID`);

--
-- Indexes for table `homeabout`
--
ALTER TABLE `homeabout`
  ADD PRIMARY KEY (`HA_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Pro_ID`),
  ADD UNIQUE KEY `Pro_ID_2` (`Pro_ID`),
  ADD KEY `Pro_ID` (`Pro_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `About_ID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contactinfo`
--
ALTER TABLE `contactinfo`
  MODIFY `Cont_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homeabout`
--
ALTER TABLE `homeabout`
  MODIFY `HA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Pro_ID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
