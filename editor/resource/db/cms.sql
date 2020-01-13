-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2020 at 07:10 AM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `adre_id` int(11) NOT NULL,
  `zip_cod` varchar(35) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `continent` varchar(255) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`adre_id`, `zip_cod`, `street`, `city`, `state`, `country`, `continent`, `datecreated`, `systdate`) VALUES
(66, '360003', 'Marwadi University Hostel A 3rd Floor Room 922, Marwadi University  Hostel C', 'Rajkot', 'Gujarat', 'India', NULL, '2018-10-18 05:47:39', '2018-10-18 09:33:35'),
(78, '233', 'Shell Service Station Opposite Sunyani Jubilee Park', 'Sunyani', 'Brong Ahafo - Sunyani', 'Ghana', NULL, '2018-10-18 17:04:56', '0000-00-00 00:00:00'),
(79, '23', 'high s', 'Mim', 'BA', 'Ghana', NULL, '2018-11-07 09:43:22', '0000-00-00 00:00:00'),
(80, '23', 'high s', 'Mim', 'BA', 'Ghana', NULL, '2018-11-07 09:46:49', '0000-00-00 00:00:00'),
(81, '23', 'high s', 'Mim', 'BA', 'Ghana', NULL, '2018-11-07 09:48:28', '0000-00-00 00:00:00'),
(82, '23', 'high s', 'Mim', 'BA', 'Ghana', NULL, '2018-11-07 09:50:48', '0000-00-00 00:00:00'),
(83, '23', 'high s', 'Mim', 'BA', 'Ghana', NULL, '2018-11-07 09:54:33', '0000-00-00 00:00:00'),
(84, '23', 'high s', 'Mim', 'BA', 'Ghana', NULL, '2018-11-07 09:54:38', '0000-00-00 00:00:00'),
(85, '23', 'high s', 'Mim', 'BA', 'Ghana', NULL, '2018-11-07 09:56:01', '0000-00-00 00:00:00'),
(86, '23', 'high s', 'Mim', 'BA', 'Ghana', NULL, '2018-11-07 10:08:12', '0000-00-00 00:00:00'),
(87, 'w234', 'Chork Madapour', 'Rajkot', 'Gujarat', 'Indian', NULL, '2018-12-07 07:21:53', '0000-00-00 00:00:00'),
(88, '233', 'High street', 'Rajkot', 'Gujarat', 'India', NULL, '2019-01-30 12:57:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addresscust`
--

CREATE TABLE `tbl_addresscust` (
  `adre_id` int(11) NOT NULL,
  `buswebsite` varchar(50) NOT NULL,
  `busemail` varchar(50) NOT NULL,
  `busphone` varchar(10) NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcodecust` varchar(30) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `continent` varchar(255) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_addresscust`
--

INSERT INTO `tbl_addresscust` (`adre_id`, `buswebsite`, `busemail`, `busphone`, `street`, `city`, `state`, `zipcodecust`, `country`, `continent`, `datecreated`, `systdate`) VALUES
(1, 'newsagency.com', '', '', NULL, NULL, NULL, '', NULL, NULL, '2018-12-07 04:51:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adverts`
--

CREATE TABLE `tbl_adverts` (
  `advert_id` int(11) NOT NULL,
  `clientID` int(11) DEFAULT NULL,
  `advertname` varchar(50) DEFAULT NULL,
  `tittle` varchar(100) DEFAULT NULL,
  `advertpackageID` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `duedate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adverts`
--

INSERT INTO `tbl_adverts` (`advert_id`, `clientID`, `advertname`, `tittle`, `advertpackageID`, `categoryID`, `description`, `duedate`, `datecreated`, `systdate`) VALUES
(12, 5, 'bike.jpg', NULL, 1, NULL, ' 123', '2019-03-05 18:30:00', '2018-12-06 17:50:12', '0000-00-00 00:00:00'),
(13, 6, 'audi.jpg', NULL, 1, NULL, ' xcv', '2019-03-05 18:30:00', '2018-12-06 17:50:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advert_category`
--

CREATE TABLE `tbl_advert_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advert_packages`
--

CREATE TABLE `tbl_advert_packages` (
  `pack_id` int(11) NOT NULL,
  `pack_name` varchar(100) DEFAULT NULL,
  `pack_amount` float NOT NULL,
  `pack_detail` varchar(255) DEFAULT NULL,
  `pack_benefits` varchar(2000) NOT NULL,
  `pack_datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `pack_systdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_advert_packages`
--

INSERT INTO `tbl_advert_packages` (`pack_id`, `pack_name`, `pack_amount`, `pack_detail`, `pack_benefits`, `pack_datecreated`, `pack_systdate`) VALUES
(0, '2 Years Package', 4500, 'For just 2 years', 'Random advert banner display on both National News Agency and news contents on all our news categories for 1 year period', '2018-12-07 06:23:31', '0000-00-00 00:00:00'),
(1, '90 Days Packages', 1000, 'For just 90 days', 'Random advert banner display on both National News Agency and news contents relating to your business for 90 days period', '2018-12-04 01:23:16', '0000-00-00 00:00:00'),
(2, '6 Months Package', 1950, 'For just 6 months', 'Random advert banner display on both National News Agency and news contents relating to your business with three more news categories out of your business for 6 months period', '2018-12-04 01:23:16', '0000-00-00 00:00:00'),
(5, '1 Year Package', 3500, 'For just one year', 'Random advert banner display on both National News Agency and news contents on all our news categories for 1 year period', '2018-12-04 01:27:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `clients_id` int(11) NOT NULL,
  `usrid` int(11) NOT NULL,
  `busregname` varchar(100) NOT NULL,
  `busregnumber` varchar(50) NOT NULL,
  `natofbus` varchar(50) NOT NULL,
  `bustartdate` date NOT NULL,
  `bustype` varchar(50) NOT NULL,
  `headoffice` varchar(50) NOT NULL,
  `busactivity` varchar(100) NOT NULL,
  `nofbranch` int(11) NOT NULL,
  `logopath` varchar(30) NOT NULL,
  `datejoin` datetime DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`clients_id`, `usrid`, `busregname`, `busregnumber`, `natofbus`, `bustartdate`, `bustype`, `headoffice`, `busactivity`, `nofbranch`, `logopath`, `datejoin`, `systdate`, `address_id`) VALUES
(1, 3, 'National News Agency', '', '', '0000-00-00', '', '', '', 0, 'WhatsApp Image 2018-10-15 at 7', '2018-12-06 00:14:02', '2018-12-05 18:44:02', 1),
(2, 3, 'National News Agency', '', '', '0000-00-00', '', '', '', 0, 'WhatsApp Image 2018-10-15 at 7', '2018-12-06 00:16:00', '2018-12-05 18:46:00', 1),
(3, 3, 'National News Agency', '', '', '0000-00-00', '', '', '', 0, 'WhatsApp Image 2018-10-15 at 7', '2018-12-06 00:21:59', '2018-12-05 18:51:59', 1),
(4, 3, 'National News Agency', '', '', '0000-00-00', '', '', '', 0, 'WhatsApp Image 2018-10-15 at 7', '2018-12-06 00:22:05', '2018-12-05 18:52:05', 1),
(5, 3, 'XYZ', '', '', '0000-00-00', '', '', '', 0, 'bike.jpg', '2018-12-06 23:20:12', '2018-12-06 17:50:12', 1),
(6, 3, 'yxz', '', '', '0000-00-00', '', '', '', 0, 'audi.jpg', '2018-12-06 23:20:41', '2018-12-06 17:50:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `comment_id` int(3) NOT NULL,
  `comment_news_id` int(3) DEFAULT NULL,
  `comment_author` int(11) DEFAULT NULL,
  `comment_email` varchar(255) DEFAULT NULL,
  `comment_content` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `comment_status` varchar(255) DEFAULT NULL,
  `comment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments_h`
--

CREATE TABLE `tbl_comments_h` (
  `comment_id` int(3) NOT NULL,
  `comment_news_id` int(3) DEFAULT NULL,
  `comment_author` varchar(255) DEFAULT NULL,
  `comment_email` varchar(255) DEFAULT NULL,
  `comment_content` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `comment_status` varchar(255) DEFAULT NULL,
  `comment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comments_h`
--

INSERT INTO `tbl_comments_h` (`comment_id`, `comment_news_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(0, 1002, '9', NULL, 'चकदे इन्डीया', NULL, '2018-12-06'),
(0, 1002, '3', NULL, 'भारत का नाम रोशन करो यारो ।', NULL, '2018-12-06'),
(0, 1001, '3', NULL, 'कपील आ गया फिरसे लोगोको हसाने', NULL, '2018-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `dep_id` int(11) NOT NULL,
  `deptname` varchar(50) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `noofemp` int(3) NOT NULL,
  `dept_head` varchar(255) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`dep_id`, `deptname`, `location`, `noofemp`, `dept_head`, `detail`, `datecreated`, `systdate`) VALUES
(3, 'I.T', '10th  Floor', 1, 'Paresh Shama', 'For all IT', '2018-10-16 21:05:21', '2018-10-16 21:05:21'),
(5, 'Accounting', '2nd Floor', 0, 'Mohammed Adamu', 'Accounting related', '2018-10-18 05:23:09', '2018-10-18 05:23:09'),
(6, 'Marketing', '2nd Floor', 0, 'Mohammed Adamu', 'Marketing related', '2018-10-18 05:24:50', '2018-10-18 05:24:50'),
(7, 'Editorials', '3rd Floor', 0, 'Mohammed Adamu', 'Editorial working', '2018-10-18 05:29:25', '2018-10-18 05:29:25'),
(8, 'Writers and Reporter', '3rd Floor', 0, 'Mohammed Adamu', 'Writers and Reporting related', '2018-10-18 05:31:42', '2018-10-18 05:31:42'),
(9, 'Advertisement', '2nd Floor', 0, 'Paresh Shama', 'Advertisement related', '2018-10-18 05:33:24', '2018-10-18 05:33:24'),
(10, 'Engineers', '1st Floor', 0, 'Mohammed Adamu', 'Relating to sound, video, lightening, camera etc', '2018-10-18 05:37:17', '2018-10-18 05:37:17'),
(11, 'Transport', '1nd Floor', 0, 'Paresh Shama', 'All forms transport', '2018-10-21 05:06:17', '2018-10-21 05:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_draft_news`
--

CREATE TABLE `tbl_draft_news` (
  `draft_id` int(11) NOT NULL,
  `tittle` varchar(155) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `details` varchar(20000) DEFAULT NULL,
  `authorid` int(11) DEFAULT NULL,
  `editorid` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `language` varchar(35) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `draft_status` varchar(20) NOT NULL,
  `draft_user` varchar(20) NOT NULL,
  `imge_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_draft_news`
--

INSERT INTO `tbl_draft_news` (`draft_id`, `tittle`, `description`, `details`, `authorid`, `editorid`, `categoryID`, `language`, `datecreated`, `systdate`, `draft_status`, `draft_user`, `imge_id`) VALUES
(56, '1D1F: President commissions largest diaper making factory in Sub-Saharan Africa', '1D1F: President commissions largest diaper making factory in Sub-Saharan Africa', '<p>President Nana Addo Dankwa Akufo-Addo has commissioned the Sunda Ghana Diaper Ltd, the largest diaper making factory in sub-saharan Africa.<br><br>President Akufo-Addo undertook the commissioning of the factory, which is operating under Government’s 1-District-1-Factory initiative, on Wednesday, 6 December, 2018, the final day of his tour of the Greater Accra Region, at the Bortianor, in the Ngleshie Amanfro constituency.<br><br>With an investment of some $84 million, the Sunda Ghana Diaper Ltd will be one of the largest projects operating under the One District One Factory (1D1F) initiative, and will be exporting its products to markets in sub-Saharan Africa.<br><br>The company, as part of operating under the 1D1F initiative, is currently receiving incentives such as tax holidays, import duty waivers and interest rate subsidy to help build its capacity and competitiveness, and, thereby, position it greater productivity and efficiency.<br>&nbsp;</p><p>With an investment of some $84 million, the Sunda Ghana Diaper Ltd will be one of the largest projects operating under the One District One Factory (1D1F) initiative, and will be exporting its products to markets in sub-Saharan Africa.<br><br>The company, as part of operating under the 1D1F initiative, is currently receiving incentives such as tax holidays, import duty waivers and interest rate subsidy to help build its capacity and competitiveness, and, thereby, position it greater productivity and efficiency.<br><br>Addressing the gathering, President Akufo-Addo indicated that “we have to attract investment into Ghana like Mr. Y.C. Chang, people who believe that the investment climate of our country is good, the governance of our country is good, and the opportunities for investment in our country are good.”<br><br>With Sunda Ghana Limited set to establish two more factories under the 1-District-1-Factory initiative, i.e. Homepro Ghana Limited with an additional investment of USD$26 million and Sunda Hardware Limited with an additional investment of USD$18 million, the President stressed that “what it means is that the work we are doing to strengthen the macroeconomy in our country is not some paper work, it is not talk, talk work.”<br><br>He continued, “It has to do with creating the conditions for investment in our country, and that is why it is extremely important for government to commit itself to the discipline that would enable it have a strong macroeconomy.”<br><br>President Akufo-Addo assured that “so long as I am your President that discipline is going to be there in the management of the economy. We are not going to preside over widening deficits, high debts, high rates of interest, unstable currency, erratic power supply. That is not the path of the Akufo-Addo government for Ghana.”<br><br>Apart from establishing a strong macro economy, providing good governance, he noted that the other important contribution of government to the economic development of our country is to make sure that Ghanaian industries, and industries established in Ghana, do not meet unfair competition from others.</p><p>“So that is another responsibility of government, to create a level playing field for Ghanaian industries. It is establishing industries here in Ghana that we can get work for our young people. When we continue to depend on imports, we are creating jobs for other people overseas. Let us work hard to create jobs here for our people in Ghana, by encouraging investments like what we are seeing today,” he added.<br><br>To the Chiefs and people of Bortianor/Ngleshie Amanfro, President Akufo-Addo urged them to “collaborate with our Chinese friends who have shown confidence in our country, and let them see that Ghanaian people know how to conduct ourselves properly, and we know how to conduct ourselves properly.”</p>', 2, 2, 11, 'English', '2018-12-08 05:17:35', '2018-12-08 05:25:20', 'Published', 'paresh9000@gmail.com', 30),
(57, 'WV Raman: India women\'s coach role for former Test batsman', 'Former India batsman WV Raman has been appointed as the new coach of the India women\'s team, who lost in the semi-finals of the recent World Twenty20.', '<p>The 53-year-old, who played 11 Tests and 27 one-day internationals from 1988-97, replaces Ramesh Powar.</p><p>Raman has coached India U19, Bengal and Tamil Nadu in the Ranji Trophy and becomes the fourth coach of the women\'s team within the last 20 months.</p><p>Gary Kirsten was the preferred choice but was not able to accept the post.</p><p>A committee comprising former India internationals Anshuman Gaekwad, Kapil Dev and Shantha Rangswamy recommended ex-South Africa batsman Kirsten to the Board of Control for Cricket in India (BCCI).</p><p>But Kirsten - who coached the India men\'s team to success at the 2011 World Cup, before a two-year spell in charge of his native South Africa, was not prepared to leave his post as head coach of Indian Premier League side Royal Challengers Bangalore (RCB).</p><p>Raman was the second choice, with former India fast bowler Venkatesh Prasad, who has worked as India\'s men\'s bowling coach and has also coached with Kings XI Punjab and RCB, the third recommended candidate.</p><p>&nbsp;</p><p>India are currently third in the women\'s world ODI rankings and fifth in the T20 category.</p><p>They <a href=\"https://www.bbc.co.uk/sport/cricket/46312712\"><strong>lost to England by eight wickets</strong></a> in their World T20 semi-final in Antigua last month.</p><p>Ex-India off-spinner Powar - who was recently involved in a public row with veteran star batter Mithali Raj over her exclusion from the team for that semi-final, after a series of emails were leaked to the media - reapplied for the coach\'s role, but was not in the top three preferred candidates.</p><ul><li><a href=\"https://www.bbc.co.uk/sport/cricket/46402647\"><strong>Mithali Raj v Ramesh Powar: Anatomy of a cricket row</strong></a></li><li><a href=\"https://www.bbc.co.uk/sport/cricket/46383385\"><strong>Raj \'deeply saddened\' by \'all the mud-slinging\'</strong></a></li></ul>', 2, 2, 4, 'English', '2018-12-21 05:59:37', '2018-12-21 06:10:10', 'Published', 'paresh9000@gmail.com', 31),
(58, 'Climate change: The massive CO2 emitter you may not know about', 'Concrete is the most widely used man-made material in existence. It is second only to water as the most-consumed resource on the planet.', '<p><strong>Concrete is the most widely used man-made material in existence. It is second only to water as the most-consumed resource on the planet.</strong></p><p>But, while cement - the key ingredient in concrete - has shaped much of our built environment, it also has a massive carbon footprint.</p><p>Cement is the source of <a href=\"https://reader.chathamhouse.org/making-concrete-change-innovation-low-carbon-cement-and-concrete\"><strong>about 8% of the world\'s carbon dioxide (CO2) emissions,</strong></a>according to think tank Chatham House.</p><p>If the cement industry were a country, it would be the third largest emitter in the world - behind China and the US. It contributes more CO2 than aviation fuel (2.5%) and is not far behind the global agriculture business (12%).</p><p>&nbsp;</p><p>Cement industry leaders were <a href=\"https://gccassociation.org/press-release/gcca-heads-world-climate-change-conference-cop24\"><strong>in Poland for the UN\'s climate change conference</strong></a> - COP24 - to discuss ways of meeting the requirements of the Paris Agreement on climate change. To do this, annual emissions from cement will need to fall by at least 16% by 2030.</p><p>So, how did our love of concrete end up endangering the planet? And what can we do about it?</p><h2>In praise of concrete</h2><p>As the key building material of most tower blocks, car parks, bridges and dams, concrete has, for the haters, enabled the construction of some of the world\'s worst architectural eyesores.</p><p>&nbsp;</p>', 2, 2, 8, 'English', '2018-12-21 06:06:51', '2018-12-21 06:09:35', 'Published', 'paresh9000@gmail.com', 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `maried_status` varchar(20) NOT NULL,
  `firstname` varchar(35) DEFAULT NULL,
  `midlename` varchar(35) DEFAULT NULL,
  `lastname` varchar(35) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `dept` int(11) DEFAULT NULL,
  `address` int(11) DEFAULT NULL,
  `empttype` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `datejoin` date DEFAULT NULL,
  `image` text NOT NULL,
  `otherdetails` varchar(255) DEFAULT NULL,
  `systdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `title`, `maried_status`, `firstname`, `midlename`, `lastname`, `gender`, `phone`, `email`, `birthdate`, `dept`, `address`, `empttype`, `salary`, `datejoin`, `image`, `otherdetails`, `systdate`) VALUES
(2, 'Dr.', 'Single', 'Paresh', '', 'Shama', 'Female', '8160217255', 'paresh9000@gmail.com', '1995-10-03', 5, 66, 3, 4000000, '2011-08-06', 'Paresh.jpg', NULL, '2018-10-18 05:47:39'),
(64, 'Dr.', 'Married', 'Mohammed', 'Kwaku', 'Adamu', 'Female', '0541708169', 'adamumh@gmail.com', '2018-10-31', 3, 78, 3, 4567, '2018-10-14', 'Adamu.JPG', NULL, '2018-10-18 17:04:56'),
(69, 'Mr.', 'Married', 'Perry', 'Tei', 'Fleming', 'Male', '3027262525', 'perry@gmail.com', '2018-11-10', 7, 83, 6, 2896666, '2018-11-07', 'DSC_0685.jpg', NULL, '2018-11-07 09:54:33'),
(70, 'Miss.', 'Single', 'Batul', '', 'T', 'Female', '95386356353', 'batul@gmail.com', '1998-01-11', 6, 87, 3, 114588, '2018-12-07', 'Batul.jfif', NULL, '2018-12-07 07:21:53'),
(71, 'Mr.', 'Married', 'Charlse', '', 'Spurgen', 'Male', '4567890', 'spur@gmail.com', '2019-01-30', 3, 88, 3, 2147483647, '2019-01-30', 'Screen Shot 2019-01-10 at 23.59.50.png', NULL, '2019-01-30 12:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_login`
--

CREATE TABLE `tbl_employee_login` (
  `log_id` int(11) NOT NULL,
  `empID` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `passcode` varchar(255) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `lastlogin` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastlogout` timestamp NOT NULL DEFAULT current_timestamp(),
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee_login`
--

INSERT INTO `tbl_employee_login` (`log_id`, `empID`, `username`, `passcode`, `role`, `status`, `lastlogin`, `lastlogout`, `datecreated`, `systdate`, `reset`) VALUES
(8, 2, 'paresh9000@gmail.com', '$2y$10$iloveyouGodcositisyouu1eO201oU2P3j8UOBq8NZOnFRVZIQt0y', 'Editorials', 'Unblocked', '2018-10-21 20:09:25', '2018-10-21 20:09:25', '2018-10-21 20:09:25', '2018-10-21 20:09:25', 1),
(9, 64, 'adamumh@gmail.com', '$2y$10$iloveyouGodcositisyouu1eO201oU2P3j8UOBq8NZOnFRVZIQt0y', 'Admin', 'Unblocked', '2018-11-05 18:20:28', '2018-11-05 18:20:28', '2018-11-05 18:20:28', '2018-11-05 18:20:28', 1),
(10, 69, 'perry@gmail.com', '$2y$10$iloveyouGodcositisyouu1eO201oU2P3j8UOBq8NZOnFRVZIQt0y', 'WriterReporter', 'Unblocked', '2018-11-11 18:51:28', '2018-11-11 18:51:28', '2018-11-11 18:51:28', '2018-11-11 18:51:28', 1),
(11, 70, 'batul@gmail.com', '$2y$10$iloveyouGodcositisyouu1eO201oU2P3j8UOBq8NZOnFRVZIQt0y', 'Marketing & Advertis', 'Unblocked', '2018-12-07 07:24:49', '2018-12-07 07:24:49', '2018-12-07 07:24:49', '2018-12-07 07:24:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employment_type`
--

CREATE TABLE `tbl_employment_type` (
  `id_type` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `noofemp` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employment_type`
--

INSERT INTO `tbl_employment_type` (`id_type`, `name`, `detail`, `datecreated`, `systdate`, `noofemp`) VALUES
(3, 'Permanent Staff', 'Full time employees', '2018-10-16 18:48:26', '2018-10-16 18:48:26', 1),
(5, 'Contract Staff', 'Part time workers on contract basics.', '2018-10-18 01:55:46', '2018-10-18 01:55:46', 0),
(6, 'External Contracts', 'Outside this country', '2018-10-21 05:07:08', '2018-10-21 05:07:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `image_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `image_position` varchar(30) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`image_id`, `emp_id`, `name`, `path`, `detail`, `image_position`, `datecreated`, `systdate`) VALUES
(30, 2, '1DF.jpg', '1DF.jpg', '1D1F: President commissions largest diaper making factory in Sub-Saharan Africa', 'Headline', '2018-12-08 05:17:35', '2020-01-07 05:43:23'),
(31, 2, 'wom.jpg', 'wom.jpg', 'WV Raman: India women\'s coach role for former Test batsman', 'Headline', '2018-12-21 05:59:37', '2020-01-07 05:38:34'),
(32, 2, 'climate.jpeg', 'climate.jpeg', 'Climate change: The massive CO2 emitter you may not know about', 'Headline', '2018-12-21 06:06:51', '2020-01-07 05:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_liked_news`
--

CREATE TABLE `tbl_liked_news` (
  `id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `newID` int(11) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `newss_id` int(11) NOT NULL,
  `draft_ids` int(11) NOT NULL,
  `tittle` varchar(155) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `details` varchar(20000) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `authorid` int(11) DEFAULT NULL,
  `editorid` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `read_count` int(11) NOT NULL,
  `shared_count` int(11) NOT NULL,
  `comment_count` int(11) NOT NULL,
  `language` varchar(35) DEFAULT NULL,
  `news_status` varchar(20) NOT NULL,
  `date_published` date NOT NULL,
  `end_date` date NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`newss_id`, `draft_ids`, `tittle`, `description`, `details`, `authorid`, `editorid`, `categoryID`, `read_count`, `shared_count`, `comment_count`, `language`, `news_status`, `date_published`, `end_date`, `datecreated`, `systdate`, `img_id`) VALUES
(41, 56, '1D1F: President commissions largest diaper making factory in Sub-Saharan Africa', '1D1F: President commissions largest diaper making factory in Sub-Saharan Africa', '<p>President Nana Addo Dankwa Akufo-Addo has commissioned the Sunda Ghana Diaper Ltd, the largest diaper making factory in sub-saharan Africa.<br><br>President Akufo-Addo undertook the commissioning of the factory, which is operating under Government’s 1-District-1-Factory initiative, on Wednesday, 6 December, 2018, the final day of his tour of the Greater Accra Region, at the Bortianor, in the Ngleshie Amanfro constituency.<br><br>With an investment of some $84 million, the Sunda Ghana Diaper Ltd will be one of the largest projects operating under the One District One Factory (1D1F) initiative, and will be exporting its products to markets in sub-Saharan Africa.<br><br>The company, as part of operating under the 1D1F initiative, is currently receiving incentives such as tax holidays, import duty waivers and interest rate subsidy to help build its capacity and competitiveness, and, thereby, position it greater productivity and efficiency.<br>&nbsp;</p><p>With an investment of some $84 million, the Sunda Ghana Diaper Ltd will be one of the largest projects operating under the One District One Factory (1D1F) initiative, and will be exporting its products to markets in sub-Saharan Africa.<br><br>The company, as part of operating under the 1D1F initiative, is currently receiving incentives such as tax holidays, import duty waivers and interest rate subsidy to help build its capacity and competitiveness, and, thereby, position it greater productivity and efficiency.<br><br>Addressing the gathering, President Akufo-Addo indicated that “we have to attract investment into Ghana like Mr. Y.C. Chang, people who believe that the investment climate of our country is good, the governance of our country is good, and the opportunities for investment in our country are good.”<br><br>With Sunda Ghana Limited set to establish two more factories under the 1-District-1-Factory initiative, i.e. Homepro Ghana Limited with an additional investment of USD$26 million and Sunda Hardware Limited with an additional investment of USD$18 million, the President stressed that “what it means is that the work we are doing to strengthen the macroeconomy in our country is not some paper work, it is not talk, talk work.”<br><br>He continued, “It has to do with creating the conditions for investment in our country, and that is why it is extremely important for government to commit itself to the discipline that would enable it have a strong macroeconomy.”<br><br>President Akufo-Addo assured that “so long as I am your President that discipline is going to be there in the management of the economy. We are not going to preside over widening deficits, high debts, high rates of interest, unstable currency, erratic power supply. That is not the path of the Akufo-Addo government for Ghana.”<br><br>Apart from establishing a strong macro economy, providing good governance, he noted that the other important contribution of government to the economic development of our country is to make sure that Ghanaian industries, and industries established in Ghana, do not meet unfair competition from others.</p><p>“So that is another responsibility of government, to create a level playing field for Ghanaian industries. It is establishing industries here in Ghana that we can get work for our young people. When we continue to depend on imports, we are creating jobs for other people overseas. Let us work hard to create jobs here for our people in Ghana, by encouraging investments like what we are seeing today,” he added.<br><br>To the Chiefs and people of Bortianor/Ngleshie Amanfro, President Akufo-Addo urged them to “collaborate with our Chinese friends who have shown confidence in our country, and let them see that Ghanaian people know how to conduct ourselves properly, and we know how to conduct ourselves properly.”</p>', 2, 2, 11, 0, 0, 0, 'English', '', '2018-12-10', '2020-12-31', '2018-12-08 05:25:20', '2020-01-07 05:53:03', 30),
(42, 58, 'Climate change: The massive CO2 emitter you may not know about', 'Concrete is the most widely used man-made material in existence. It is second only to water as the most-consumed resource on the planet.', '<p><strong>Concrete is the most widely used man-made material in existence. It is second only to water as the most-consumed resource on the planet.</strong></p><p>But, while cement - the key ingredient in concrete - has shaped much of our built environment, it also has a massive carbon footprint.</p><p>Cement is the source of <a href=\"https://reader.chathamhouse.org/making-concrete-change-innovation-low-carbon-cement-and-concrete\"><strong>about 8% of the world\'s carbon dioxide (CO2) emissions,</strong></a>according to think tank Chatham House.</p><p>If the cement industry were a country, it would be the third largest emitter in the world - behind China and the US. It contributes more CO2 than aviation fuel (2.5%) and is not far behind the global agriculture business (12%).</p><p>&nbsp;</p><p>Cement industry leaders were <a href=\"https://gccassociation.org/press-release/gcca-heads-world-climate-change-conference-cop24\"><strong>in Poland for the UN\'s climate change conference</strong></a> - COP24 - to discuss ways of meeting the requirements of the Paris Agreement on climate change. To do this, annual emissions from cement will need to fall by at least 16% by 2030.</p><p>So, how did our love of concrete end up endangering the planet? And what can we do about it?</p><h2>In praise of concrete</h2><p>As the key building material of most tower blocks, car parks, bridges and dams, concrete has, for the haters, enabled the construction of some of the world\'s worst architectural eyesores.</p><p>&nbsp;</p>', 2, 2, 8, 0, 0, 0, 'English', '', '2018-12-21', '2020-02-28', '2018-12-21 06:09:35', '2020-01-07 05:53:20', 32),
(43, 57, 'WV Raman: India women\'s coach role for former Test batsman', 'Former India batsman WV Raman has been appointed as the new coach of the India women\'s team, who lost in the semi-finals of the recent World Twenty20.', '<p>The 53-year-old, who played 11 Tests and 27 one-day internationals from 1988-97, replaces Ramesh Powar.</p><p>Raman has coached India U19, Bengal and Tamil Nadu in the Ranji Trophy and becomes the fourth coach of the women\'s team within the last 20 months.</p><p>Gary Kirsten was the preferred choice but was not able to accept the post.</p><p>A committee comprising former India internationals Anshuman Gaekwad, Kapil Dev and Shantha Rangswamy recommended ex-South Africa batsman Kirsten to the Board of Control for Cricket in India (BCCI).</p><p>But Kirsten - who coached the India men\'s team to success at the 2011 World Cup, before a two-year spell in charge of his native South Africa, was not prepared to leave his post as head coach of Indian Premier League side Royal Challengers Bangalore (RCB).</p><p>Raman was the second choice, with former India fast bowler Venkatesh Prasad, who has worked as India\'s men\'s bowling coach and has also coached with Kings XI Punjab and RCB, the third recommended candidate.</p><p>&nbsp;</p><p>India are currently third in the women\'s world ODI rankings and fifth in the T20 category.</p><p>They <a href=\"https://www.bbc.co.uk/sport/cricket/46312712\"><strong>lost to England by eight wickets</strong></a> in their World T20 semi-final in Antigua last month.</p><p>Ex-India off-spinner Powar - who was recently involved in a public row with veteran star batter Mithali Raj over her exclusion from the team for that semi-final, after a series of emails were leaked to the media - reapplied for the coach\'s role, but was not in the top three preferred candidates.</p><ul><li><a href=\"https://www.bbc.co.uk/sport/cricket/46402647\"><strong>Mithali Raj v Ramesh Powar: Anatomy of a cricket row</strong></a></li><li><a href=\"https://www.bbc.co.uk/sport/cricket/46383385\"><strong>Raj \'deeply saddened\' by \'all the mud-slinging\'</strong></a></li></ul>', 2, 2, 4, 0, 0, 0, 'English', '', '2018-12-21', '2020-02-28', '2018-12-21 06:10:10', '2020-01-07 05:53:26', 31);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_category`
--

CREATE TABLE `tbl_news_category` (
  `newscat_id` int(11) NOT NULL,
  `newscat_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `newscat_detail` varchar(255) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news_category`
--

INSERT INTO `tbl_news_category` (`newscat_id`, `newscat_name`, `newscat_detail`, `datecreated`, `systdate`) VALUES
(2, 'Politics', 'Political', '2018-11-07 14:14:05', '2018-11-07 14:14:05'),
(3, 'Entertainment', 'Entertainment', '2018-11-11 09:04:24', '2018-11-11 09:04:24'),
(4, 'Sport News', 'Sport', '2018-11-11 09:04:49', '2018-11-11 09:04:49'),
(5, 'Technology News', 'Technology', '2018-11-11 09:05:30', '2018-11-11 09:05:30'),
(6, 'Business News', 'Business', '2018-11-11 09:06:15', '2018-11-11 09:06:15'),
(7, 'Culture and Tourism News', 'Religious', '2018-11-11 09:07:58', '2018-11-11 09:07:58'),
(8, 'Science News', 'Science', '2018-11-11 09:14:45', '2018-11-11 09:14:45'),
(9, 'मनोरंजन', NULL, '2018-12-06 14:56:14', '2018-12-06 14:56:14'),
(11, 'World News', 'All around the world', '2018-12-07 19:49:56', '2018-12-07 19:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_h`
--

CREATE TABLE `tbl_news_h` (
  `newss_id` int(11) NOT NULL,
  `draft_ids` int(11) NOT NULL,
  `tittle` varchar(155) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `details` varchar(20000) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `authorid` int(11) DEFAULT NULL,
  `editorid` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `read_count` int(11) NOT NULL,
  `shared_count` int(11) NOT NULL,
  `comment_count` int(11) NOT NULL,
  `language` varchar(35) DEFAULT NULL,
  `news_status` varchar(20) NOT NULL,
  `date_published` date NOT NULL,
  `end_date` date NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news_h`
--

INSERT INTO `tbl_news_h` (`newss_id`, `draft_ids`, `tittle`, `description`, `details`, `authorid`, `editorid`, `categoryID`, `read_count`, `shared_count`, `comment_count`, `language`, `news_status`, `date_published`, `end_date`, `datecreated`, `systdate`, `img_id`) VALUES
(1001, 41, 'कपिल शर्मा शो\' के पहले गेस्ट बनेंगे दबंग खान', 'सलमान की प्रोडक्शन कंपनी है शो की प्रोड्यूसर ', '<p>कपिल शर्मा लंबे अरसे बाद टीवी की दुनिया में कमबैक करने जा रहे हैं। एक मुश्किल दौर से गुज़रने के बाद कपिल अब अपनी नई प्रोफेशनल पारी खेलने जा रहे हैं। वो शो ‘द कपिल शर्मा शो’ से टीवी पर वापसी कर रहे हैं। कपिल ने शो की शूटिंग शुरू कर दी है। कपिल के शो के दूसरे सीजन का टीजर जारी हो गया है, इसमें शो के जल्द रिलीज होने की भी जानकारी दी गई है। रिपोर्ट के अनुसार, इस शो के पहले मेहमान के तौर पर सलमान खान अपने पिता सलीम खान और भाई के साथ पहुंचेंगे। कपिल के इस शो के सीज़न वन की अपार सफलता को देखते हुए सलमान खान की प्रोडक्शन कंपनी ही इस शो को प्रोड्यूस कर रही है।</p>', 64, 64, 9, 0, 0, 0, 'English', 'Archived', '2018-11-11', '2018-12-09', '2018-11-11 11:42:55', '2018-12-06 16:46:39', 19),
(1002, 0, 'AUS vs IND, पहला टेस्ट: चेतेश्वर पुजारा का बेहतरीन शतक', 'पहले दिन के बाद भारत का स्कोर - 250/9 ', 'एडिलेड में शुरू हुए चार टेस्ट मैचों की सीरीज के पहले टेस्ट के पहले दिन भारत ने स्टंप तक का 250/9 स्कोर बना लिया है। पहले बल्लेबाजी करते हुए भारत की शुरुआत बेहद खराब रही, लेकिन चेतेश्वर पुजारा ने बेहतरीन शतक लगाते हुए टीम को सम्मानजनक स्कोर तक पहुंचा दिया। पुजारा ने 123 रनों की पारी खेली और 88वें ओवर में उनके रन आउट होते ही स्टंप्स हो गया। \r\nपहला सत्र:\r\n\r\nभारत ने एडिलेड में टॉस जीतकर पहले बल्लेबाजी का फैसला लिया, लेकिन खराब शुरुआत ने इस निर्णय को गलत साबित कर दिया। भारतीय टीम ने अंतिम एकादश में रोहित शर्मा को हनुमा विहारी के ऊपर तरजीह दी।\r\nभारत के लिए केएल राहुल और मुरली विजय ओपनिंग के लिए आये, लेकिन दूसरे ही ओवर में जोश हेज़लवुड ने राहुल (2) को 3 के स्कोर पर चलता किया। इसके बाद सातवें ओवर में 15 के स्कोर पर मुरली विजय भी सिर्फ 11 रन बनाकर मिचेल स्टार्क की गेंद पर आउट हो गए।\r\nभारत को सबसे बड़ा झटका 11वें ओवर में लगा, जब कप्तान विराट कोहली सिर्फ 3 रन बनाकर आउट हो गए और भारत का स्कोर 19/3 हो गया। इसके बाद चेतेश्वर पुजारा और अजिंक्य रहाणे ने कुछ देर विकेट के गिरने का सिलसिला रोका, लेकिन 21वें ओवर में रहाणे आख़िरकार चकमा खा गए और 41 के स्कोर पर हेज़लवुड ने उन्हें 13 के निजी स्कोर पर चलता किया।\r\nरहाणे ने पुजारा के साथ चौथे विकेट के लिए 22 रन जोड़े। इसके बाद लंच तक पुजारा और रोहित शर्मा ने टीम को और कोई झटका नहीं लगे दिया। पहले सत्र के बाद भारत का स्कोर 27 ओवर में चार विकेट के नुकसान पर 56 था और चेतेश्वर पुजारा 11 एवं रोहित शर्मा 15 रन बनाकर नाबाद थे।\r\nदूसरा सत्र:\r\n\r\nलंच के बाद भारतीय टीम ने कुछ हद तक वापसी की और दूसरे सत्र में 29 ओवर में दो विकेट के नुकसान पर 87 रन बने। चाय के समय भारत का स्कोर 56 ओवर में 143/6 था और चेतेश्वर पुजारा 46 एवं रविचंद्रन अश्विन 5 रन बनाकर नाबाद थे। लंच से चाय के बीच में भारत ने रोहित शर्मा (37) और ऋषभ पंत (25) का विकेट गंवाया। \r\nचेतेश्वर पुजारा ने रोहित के साथ पांचवें विकेट के लिए 45 रन जोड़े, लेकिन 38वें ओवर में 86 के स्कोर पर नाथन लायन की गेंद पर एक बहुत खराब शॉट खेलकर रोहित आउट हुए। इसके बाद ऋषभ पंत ने पुजारा के साथ 41 रन जोड़े, लेकिन एक तेज़ पारी खेलने के बाद वह भी नाथन लायन की गेंद पर आउट हो गए। इस समय भारत का स्कोर 49.1 ओवर में 127/6 था। इसके बाद पुजारा और अश्विन ने चाय तक भारत को और की झटका नहीं लगने दिया।\r\nतीसरा सत्र:\r\n\r\nचाय के तुरंत बाद चेतेश्वर पुजारा ने अपना अर्धशतक पूरा किया और अश्विन के साथ सातवें विकेट के लिए उन्होंने 62 रनों की बेहद अहम साझेदारी निभाई। हालाँकि 74वें ओवर में 189 के स्कोर पर पैट कमिंस ने अश्विन को 21 के निजी स्कोर पर आउट कर दिया। इशांत शर्मा (4) के साथ मिलकर पुजारा ने टीम को 200 के पार पहुंचाया, लेकिन 83वें ओवर में स्टार्क ने नई गेंद से इशांत को 210 के स्कोर पर आउट करके भारत को आठवां झटका दिया। \r\nहालाँकि पूजारा ने एक छोर संभाले रखा और न सिर्फ अपना 16वां शतक पूरा किया, बल्कि टेस्ट क्रिकेट में 5000 रन भी पूरे किये। उन्होंने मोहम्मद शमी के साथ 40 रनों की तेज़ साझेदारी निभाई और टीम को 250 के स्कोर तक पहुंचाया, लेकिन आखिरी ओवर में वह 123 रन बनाकर रन आउट हुए और 87.5 ओवर में 250/9 के स्कोर पर पहले दिन का खेल समाप्त हुआ। स्टंप्स के समय मोहम्मद शमी 6 और जसप्रीत बुमराह खाता खोले बिना नाबाद थे।\r\nतीसरे सत्र में भारत ने 31.5 ओवर में तीन विकेट के नुकसान पर 107 रन बनाये। ऑस्ट्रेलिया की तरफ से अभी तक मिचेल स्टार्क, जोश हेज़लवुड, नाथन लायन और पैट कमिंस ने एक-एक विकेट लिया है।\r\nसंक्षिप्त स्कोरकार्ड:\r\nभारत: 250/9 (चेतेश्वर पुजारा 123, पैट कमिंस 2/49)', 1, 2, 9, 0, 0, 0, NULL, 'Archive', '2018-12-06', '2018-12-14', '2018-12-06 15:11:26', '2018-12-06 16:46:55', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_tag`
--

CREATE TABLE `tbl_news_tag` (
  `id` int(11) NOT NULL,
  `newsID` int(11) DEFAULT NULL,
  `tagID` int(11) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news_tag`
--

INSERT INTO `tbl_news_tag` (`id`, `newsID`, `tagID`, `datecreated`) VALUES
(9, 30, 14, '2018-12-01 21:48:53'),
(10, 29, 22, '2018-12-01 21:48:53'),
(11, 31, 5, '2018-12-01 21:48:53'),
(12, 30, 14, '2018-12-01 21:48:58'),
(13, 29, 22, '2018-12-01 21:48:58'),
(14, 31, 5, '2018-12-01 21:48:58'),
(15, 32, 24, '2018-12-01 21:50:52'),
(16, 32, 24, '2018-12-01 21:51:14'),
(17, 1001, 25, '2018-12-06 14:19:21'),
(18, 1001, 26, '2018-12-06 14:19:21'),
(19, 1001, 25, '2018-12-06 14:19:26'),
(20, 1001, 26, '2018-12-06 14:19:26'),
(21, 1001, 29, '2018-12-06 14:19:39'),
(22, 1002, 36, '2018-12-06 16:52:00'),
(23, 1002, 37, '2018-12-06 16:52:00'),
(24, 1002, 36, '2018-12-06 16:52:03'),
(25, 1002, 37, '2018-12-06 16:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `usrid` int(11) NOT NULL,
  `addid` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reader`
--

CREATE TABLE `tbl_reader` (
  `id` int(11) NOT NULL,
  `language` varchar(35) DEFAULT NULL,
  `device` varchar(35) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reader_tag`
--

CREATE TABLE `tbl_reader_tag` (
  `id` int(11) NOT NULL,
  `readerID` int(11) DEFAULT NULL,
  `tagID` int(11) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary`
--

CREATE TABLE `tbl_salary` (
  `id` int(11) NOT NULL,
  `empID` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `statu` varchar(20) DEFAULT NULL,
  `description` varchar(35) DEFAULT NULL,
  `systdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tag`
--

CREATE TABLE `tbl_tag` (
  `id` int(11) NOT NULL,
  `name` varchar(35) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tag`
--

INSERT INTO `tbl_tag` (`id`, `name`, `datecreated`) VALUES
(1, 'Ronaldo', '2018-12-01 21:43:21'),
(2, 'Business', '2018-12-01 21:43:21'),
(3, 'Company', '2018-12-01 21:43:21'),
(4, 'Study', '2018-12-01 21:43:21'),
(5, 'Sports', '2018-12-01 21:43:21'),
(6, 'Radha Krishna', '2018-12-01 21:43:21'),
(7, 'Religious', '2018-12-01 21:43:21'),
(8, 'Local', '2018-12-01 21:43:21'),
(9, 'Rajkot', '2018-12-01 21:43:21'),
(10, 'World', '2018-12-01 21:43:21'),
(11, 'India', '2018-12-01 21:43:21'),
(12, 'Ronaldo', '2018-12-01 21:45:57'),
(13, 'Business', '2018-12-01 21:45:57'),
(14, 'Company', '2018-12-01 21:45:57'),
(15, 'Study', '2018-12-01 21:45:57'),
(16, 'Sports', '2018-12-01 21:45:57'),
(17, 'Radha Krishna', '2018-12-01 21:45:57'),
(18, 'Religious', '2018-12-01 21:45:57'),
(19, 'Local', '2018-12-01 21:45:57'),
(20, 'Rajkot', '2018-12-01 21:45:57'),
(21, 'World', '2018-12-01 21:45:57'),
(22, 'India', '2018-12-01 21:45:57'),
(23, 'Technology', '2018-12-01 21:49:47'),
(24, 'Technology', '2018-12-01 21:49:51'),
(25, 'कपील शर्मो', '2018-12-06 14:08:17'),
(26, 'सलमान खान', '2018-12-06 14:08:17'),
(27, 'Kapil Sharma', '2018-12-06 14:08:22'),
(28, 'Salman Khan', '2018-12-06 14:08:22'),
(29, 'हास्य', '2018-12-06 14:08:48'),
(30, 'Hindi', '2018-12-06 14:08:48'),
(31, 'Salman Khan', '2018-12-06 14:13:07'),
(32, 'Salman Khan', '2018-12-06 14:13:10'),
(33, 'Comedy', '2018-12-06 14:13:23'),
(34, 'खेल', '2018-12-06 16:51:22'),
(35, 'क्रिकेट', '2018-12-06 16:51:22'),
(36, 'खेल', '2018-12-06 16:51:27'),
(37, 'क्रिकेट', '2018-12-06 16:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unliked_news`
--

CREATE TABLE `tbl_unliked_news` (
  `id` int(11) NOT NULL,
  `readerID` int(11) DEFAULT NULL,
  `newsID` int(11) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `contact` varchar(10) NOT NULL,
  `possitionheld` varchar(30) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `addressID` int(11) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `Usr_Name` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `email`, `gender`, `contact`, `possitionheld`, `birthdate`, `addressID`, `datecreated`, `systdate`, `Usr_Name`, `password`) VALUES
(3, 'Paresh', 'paresh98000@hotmail.com', 'Male', '4565', NULL, '1997-09-05', NULL, '2018-12-02 13:14:04', '2018-12-06 17:50:41', 'PSLD', '202cb962ac59075b964b07152d234b70'),
(7, 'Adamu Mohmad', 'mamu@gmail.com', 'Male', '', NULL, '1988-10-15', NULL, '2018-12-02 13:23:12', '0000-00-00 00:00:00', 'Mamu', '202cb962ac59075b964b07152d234b70'),
(8, 'Mahavir', 'mark@gmail.com', 'Male', '', NULL, '1997-11-23', NULL, '2018-12-05 06:33:27', '0000-00-00 00:00:00', 'mark', '202cb962ac59075b964b07152d234b70'),
(9, 'Sharma', '123', 'Male', '123456789', NULL, '2018-12-05', NULL, '2018-12-05 14:43:04', '2018-12-05 18:37:29', 'Shrma', '202cb962ac59075b964b07152d234b70'),
(10, 'Mavis Annor', 'mavis@gmail.com', 'Female', '', NULL, '1996-12-07', NULL, '2018-12-20 06:09:45', '0000-00-00 00:00:00', 'Mavis', '$2y$10$iloveyouGodcositisyouu1eO201oU2P3j8UOBq8NZOnFRVZIQt0y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_login`
--

CREATE TABLE `tbl_user_login` (
  `id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `passcode` varchar(255) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `newsid` int(11) NOT NULL,
  `employID` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `video_position` varchar(30) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `systdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `value` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`value`) VALUES
('Hellow how are you');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`adre_id`);

--
-- Indexes for table `tbl_addresscust`
--
ALTER TABLE `tbl_addresscust`
  ADD PRIMARY KEY (`adre_id`);

--
-- Indexes for table `tbl_adverts`
--
ALTER TABLE `tbl_adverts`
  ADD PRIMARY KEY (`advert_id`),
  ADD KEY `advertpackageID` (`advertpackageID`),
  ADD KEY `clientID` (`clientID`);

--
-- Indexes for table `tbl_advert_packages`
--
ALTER TABLE `tbl_advert_packages`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indexes for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD PRIMARY KEY (`clients_id`),
  ADD KEY `usrid` (`usrid`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_news_id` (`comment_news_id`),
  ADD KEY `comment_author` (`comment_author`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`dep_id`),
  ADD UNIQUE KEY `name` (`deptname`);

--
-- Indexes for table `tbl_draft_news`
--
ALTER TABLE `tbl_draft_news`
  ADD PRIMARY KEY (`draft_id`),
  ADD UNIQUE KEY `imge_id` (`imge_id`),
  ADD UNIQUE KEY `tittle` (`tittle`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `empID` (`editorid`),
  ADD KEY `imageID` (`authorid`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `address` (`address`),
  ADD KEY `empttype` (`empttype`),
  ADD KEY `dept` (`dept`);

--
-- Indexes for table `tbl_employee_login`
--
ALTER TABLE `tbl_employee_login`
  ADD PRIMARY KEY (`log_id`),
  ADD UNIQUE KEY `email` (`username`),
  ADD KEY `empID` (`empID`);

--
-- Indexes for table `tbl_employment_type`
--
ALTER TABLE `tbl_employment_type`
  ADD PRIMARY KEY (`id_type`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`image_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `path` (`path`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `tbl_liked_news`
--
ALTER TABLE `tbl_liked_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newID` (`newID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`newss_id`),
  ADD UNIQUE KEY `draft_ids` (`draft_ids`) USING BTREE,
  ADD UNIQUE KEY `img_id` (`img_id`),
  ADD UNIQUE KEY `tittle` (`tittle`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `empID` (`editorid`),
  ADD KEY `tbl_news_ibfk_3` (`authorid`),
  ADD KEY `idu` (`draft_ids`);

--
-- Indexes for table `tbl_news_category`
--
ALTER TABLE `tbl_news_category`
  ADD PRIMARY KEY (`newscat_id`),
  ADD UNIQUE KEY `name` (`newscat_name`);

--
-- Indexes for table `tbl_news_tag`
--
ALTER TABLE `tbl_news_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newsID` (`newsID`),
  ADD KEY `tagID` (`tagID`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reader`
--
ALTER TABLE `tbl_reader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reader_tag`
--
ALTER TABLE `tbl_reader_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `readerID` (`readerID`),
  ADD KEY `tagID` (`tagID`);

--
-- Indexes for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empID` (`empID`);

--
-- Indexes for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_unliked_news`
--
ALTER TABLE `tbl_unliked_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newsID` (`newsID`),
  ADD KEY `readerID` (`readerID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `addressID` (`addressID`);

--
-- Indexes for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `employID` (`employID`),
  ADD KEY `newsid` (`newsid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `adre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_addresscust`
--
ALTER TABLE `tbl_addresscust`
  MODIFY `adre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_adverts`
--
ALTER TABLE `tbl_adverts`
  MODIFY `advert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  MODIFY `clients_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_draft_news`
--
ALTER TABLE `tbl_draft_news`
  MODIFY `draft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_employee_login`
--
ALTER TABLE `tbl_employee_login`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_employment_type`
--
ALTER TABLE `tbl_employment_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_liked_news`
--
ALTER TABLE `tbl_liked_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `newss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_news_category`
--
ALTER TABLE `tbl_news_category`
  MODIFY `newscat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_news_tag`
--
ALTER TABLE `tbl_news_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reader`
--
ALTER TABLE `tbl_reader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reader_tag`
--
ALTER TABLE `tbl_reader_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_unliked_news`
--
ALTER TABLE `tbl_unliked_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_adverts`
--
ALTER TABLE `tbl_adverts`
  ADD CONSTRAINT `tbl_adverts_ibfk_1` FOREIGN KEY (`advertpackageID`) REFERENCES `tbl_advert_packages` (`pack_id`),
  ADD CONSTRAINT `tbl_adverts_ibfk_2` FOREIGN KEY (`clientID`) REFERENCES `tbl_clients` (`clients_id`);

--
-- Constraints for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD CONSTRAINT `tbl_clients_ibfk_1` FOREIGN KEY (`usrid`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_clients_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `tbl_addresscust` (`adre_id`);

--
-- Constraints for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD CONSTRAINT `tbl_comments_ibfk_1` FOREIGN KEY (`comment_news_id`) REFERENCES `tbl_news` (`newss_id`),
  ADD CONSTRAINT `tbl_comments_ibfk_2` FOREIGN KEY (`comment_author`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_draft_news`
--
ALTER TABLE `tbl_draft_news`
  ADD CONSTRAINT `tbl_draft_news_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `tbl_news_category` (`newscat_id`),
  ADD CONSTRAINT `tbl_draft_news_ibfk_2` FOREIGN KEY (`editorid`) REFERENCES `tbl_employee` (`id`),
  ADD CONSTRAINT `tbl_draft_news_ibfk_3` FOREIGN KEY (`authorid`) REFERENCES `tbl_employee` (`id`),
  ADD CONSTRAINT `tbl_draft_news_ibfk_4` FOREIGN KEY (`imge_id`) REFERENCES `tbl_image` (`image_id`);

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `tbl_employee_ibfk_2` FOREIGN KEY (`address`) REFERENCES `tbl_address` (`adre_id`),
  ADD CONSTRAINT `tbl_employee_ibfk_5` FOREIGN KEY (`empttype`) REFERENCES `tbl_employment_type` (`id_type`),
  ADD CONSTRAINT `tbl_employee_ibfk_6` FOREIGN KEY (`dept`) REFERENCES `tbl_department` (`dep_id`);

--
-- Constraints for table `tbl_employee_login`
--
ALTER TABLE `tbl_employee_login`
  ADD CONSTRAINT `tbl_employee_login_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `tbl_employee` (`id`);

--
-- Constraints for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD CONSTRAINT `tbl_image_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `tbl_employee` (`id`);

--
-- Constraints for table `tbl_liked_news`
--
ALTER TABLE `tbl_liked_news`
  ADD CONSTRAINT `tbl_liked_news_ibfk_1` FOREIGN KEY (`newID`) REFERENCES `tbl_news` (`newss_id`),
  ADD CONSTRAINT `tbl_liked_news_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD CONSTRAINT `tbl_news_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `tbl_news_category` (`newscat_id`),
  ADD CONSTRAINT `tbl_news_ibfk_2` FOREIGN KEY (`editorid`) REFERENCES `tbl_employee` (`id`),
  ADD CONSTRAINT `tbl_news_ibfk_3` FOREIGN KEY (`authorid`) REFERENCES `tbl_employee` (`id`),
  ADD CONSTRAINT `tbl_news_ibfk_4` FOREIGN KEY (`draft_ids`) REFERENCES `tbl_draft_news` (`draft_id`),
  ADD CONSTRAINT `tbl_news_ibfk_5` FOREIGN KEY (`img_id`) REFERENCES `tbl_image` (`image_id`);

--
-- Constraints for table `tbl_news_tag`
--
ALTER TABLE `tbl_news_tag`
  ADD CONSTRAINT `tbl_news_tag_ibfk_2` FOREIGN KEY (`tagID`) REFERENCES `tbl_tag` (`id`);

--
-- Constraints for table `tbl_reader_tag`
--
ALTER TABLE `tbl_reader_tag`
  ADD CONSTRAINT `tbl_reader_tag_ibfk_1` FOREIGN KEY (`readerID`) REFERENCES `tbl_reader` (`id`),
  ADD CONSTRAINT `tbl_reader_tag_ibfk_2` FOREIGN KEY (`tagID`) REFERENCES `tbl_tag` (`id`);

--
-- Constraints for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  ADD CONSTRAINT `tbl_salary_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `tbl_employee` (`id`);

--
-- Constraints for table `tbl_unliked_news`
--
ALTER TABLE `tbl_unliked_news`
  ADD CONSTRAINT `tbl_unliked_news_ibfk_1` FOREIGN KEY (`newsID`) REFERENCES `tbl_news` (`newss_id`),
  ADD CONSTRAINT `tbl_unliked_news_ibfk_2` FOREIGN KEY (`readerID`) REFERENCES `tbl_reader` (`id`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`addressID`) REFERENCES `tbl_address` (`adre_id`);

--
-- Constraints for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  ADD CONSTRAINT `tbl_user_login_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD CONSTRAINT `tbl_video_ibfk_1` FOREIGN KEY (`employID`) REFERENCES `tbl_employee` (`id`),
  ADD CONSTRAINT `tbl_video_ibfk_2` FOREIGN KEY (`newsid`) REFERENCES `tbl_news` (`newss_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
