-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2016 at 07:28 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asimstoys`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `featured_image` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_image_2` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail_2` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` text COLLATE utf8_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `slug`, `type`, `desc`, `featured_image`, `featured_image_2`, `thumbnail`, `thumbnail_2`, `meta_title`, `meta_keyword`, `meta_desc`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(14, 'About the asim''s Toy', 'about-the-asims-toy', NULL, '<p>\r\n					Asim''s Toys Pty Ltd is an importer and retailer of children ride on Toys\r\n						<strong>ABN: 30874827397</strong>\r\n				</p>\r\n				<p>\r\n				Asim''s Toys specialize in ride on Toys for children. We import our products to strict specifications, which our manufacturers produce for us with many improvements and upgrades than our competitors products have. our products comes with better quality batteries , Fuses ,Gear shifters ,CE Material  which means your ride on sold within the "European Conformity" (EEA) , CE Material   makes our  toys comply with the Toy Safety Directive and the cars  have more power, longer lasting drive time and battery life. Buy from Asim''s Toys and become one of our many satisfied customers, with help just a phone call away if you ever need it</p>', NULL, NULL, NULL, NULL, '', '', '', 'active', 0, 0, '2016-02-23 18:30:17', '2016-02-23 18:34:01'),
(15, 'special', 'special', NULL, 'No Offer date', NULL, NULL, NULL, NULL, '', '', '', 'active', 0, 0, '2016-02-23 19:20:26', '2016-02-23 19:20:26'),
(16, 'Terms & Condition', 'terms-condition', NULL, '<h3>Warranty</h3>\r\n<p>The warranty period is from date of delivery and for domestic use only.\r\nWe offer a parts replacement warranty as described below.\r\nWe offer a six months parts replacement warranty only. In the event of a particular part failing, Asim''s Toys  will supply the parts required free of charge. In the event of an item not working after replacement parts are installed, the purchasee is responsible for the cost of returning the item to us. Postage costs will not be refunded byAsim''s Toys . See below notes regarding Toys electrics. Batteries and battery chargers are not covered under the warranty and they must be handled and charged correctly.</p>\r\n<h3>RETURN CONDITIONS</h3>\r\n<ul>\r\n<li>No refunds offered if you have changed your mind about the goods after 7 days .</li>\r\n<li>Shipping costs are non-refundable.</li>\r\n<li>We only allow exchange within 7 days of items received except specified on the listing.</li>\r\n<li> Return postage fee will be at buyer’s expense. Please contact us before returning anything.</li>\r\n<li>Returned products must be properly packed and returned in their original packaging.</li>\r\n<li>If returned items are found to be not faulty a flat service fee of $20 applied.</li>\r\n<li>If we cannot repair the product, we will offer replacement or a similar one </li>\r\n<li>Returned items with signs of abuse or intentional damage will be refused and returned to sender at buyer''s cost.</li>\r\n<li>Negligence, misuse or minor scratch is not covered under this policy.\r\n</li>\r\n</ul>\r\n<p>Any refund or replacement request must be done so in writing within 7 days of receipt of your order with a valid reason before this request can be honoured. It is also your responsibility to confirm all parts / products are received in your order within 7 Days. Failure to do this may void any refund or replacement!</p>\r\n<p>Please supply the original order confirmation in any correspondence.\r\nAn investigation on our part will be conducted to confirm this request before refund or replacement is awarded.\r\nAny refunds will be deposited into the account nominated in the original order confirmation</p>\r\n<p>For products returned to Asim''s Toys  the Customer shall be responsible for all costs and expenses (including insurance) of having the item returned to us . If an order is cancelled after dispatch the Customer shall be responsible for all transport costs incurred by the Transport Company in dispatching the item and having it returned to the our warehouse. The Customer''s payment will be refunded within 30 days, subject only to deduction of any direct costs of transport and insurance incurred by the Transport Company in relation to the return of the goods, as well as transport and insurance costs incurred in the original delivery, upon receipt of the goods and inspection as to their suitability for re-sale</p>', NULL, NULL, NULL, NULL, '', '', '', 'active', 0, 0, '2016-02-23 19:33:56', '2016-02-23 19:45:18'),
(17, 'Warranty', 'warranty', NULL, 'The warranty period is from date of delivery and for domestic use only. We offer a parts replacement only warranty as described below. <br><br>\r\nIn the event of a particular part failing, Asim''s Toys will supply the parts required free of charge. In the event of an item not working after replacement parts are installed, the Buyer is responsible for the cost of returning the item to us. Postage costs will not be refunded by Asim''s Toys. See below notes regarding Toys electrics. <br><br>\r\nBatteries and battery chargers are not covered under the warranty and they must be handled and charged correctly.<br><br>\r\n\r\nIF the goods supplied to you are damaged Or faulty on delivery, you should notify us in writing via the enotes section of the website within 7 working days , return postage  fee will be at buyer’s expense , postage costs are non refundable for returned items so please ensure you are purchasing the correct vehicle before placing your order.<br><br>\r\n\r\nFor any item that is damaged that does not affect the safety of the product and the customer wants us to repair it, the customer will have to pay the postage costs back to Asim’s Toys . We do this to keep costs down and provide long term low prices.  <br><br>\r\n\r\n<b> What is not covered under warranty? </b><br><br>\r\n\r\n1. Batteries and battery chargers are not covered under the warranty and they must be handled and charged correctly.<br><br>\r\n\r\n2. This warranty does not apply to any defect in the goods arising from fair wear and tear, Any Body Damage, , lack of maintenance ,willful damage, natural disaster,  accident, negligence by you or any third party, failure to follow the Supplier´s instructions, or any alteration or repair carried out without the Supplier´s approval, The warranty is considered void if the item has been modified, altered or tampered with by a person (or persons) not authorised by Asim’s Toys  to provide service (not including standard periodic maintenance). <br><br>\r\n\r\n3.	Negligence, misuse or minor scratch is not covered under this policy:<br>\r\nPlease note that most of our ride-on products we sell are creating with a process used by the manufacturers that we sell, the process involves blowing sheets of plastic with hot air to make the moulds required for the production of the car. Sometimes the moulds can have minor scuffs, dents or very small scratches caused by material flowing in the air as the plastic is very hot this can mark the body of the car. This does NOT cause any materialistic flaws within the body and does not affect the strength or durability of the body. They are just minor cosmetic flaws, Asim’s Toys will not accept any returns back due to this and this no reason to claim the item as faulty. <br><br>\r\n\r\n4. Broken Gear Box– A number our cars have forward and reverse gears. Please instruct your child to stop the car prior to putting the car in reverse as with a normal car you will damage/break the gears if you change from forward to reverse without stopping the car. We will send out spares to solve this problem if it happens by mistake but will not replace the car if the problem not solve. The new gears need to be added into the motor and take about 5 minutes (5 screws to remove) to add.<br><br>\r\n\r\n5. Although we take all damages seriously we cannot replace every small non critical part. For any item that is damaged that does not affect the safety of the product and the customer wants us to repair it, the customer will have to pay the postage costs back to Asim’s Toys . We do this to keep costs down and provide long term low prices.    The vehicles can develop intermittent electrical issues on the add on features i.e radio / horn / music player which should be considered before choosing your model. These will not affect the driving of the vehicle and are not covered by warranty. <br><br>\r\n\r\n6. Parts purchases, consumable components, and accessories [such as chains, carry bags, batteries, Charger, steering wheel, hoses, grinding discs, mats, nets, belts, cables, wheels, blades, tubs, safety gear etc.] are not covered by our standard warranty once used. \r\n', NULL, NULL, NULL, NULL, '', '', '', 'active', 0, 0, '2016-02-23 19:45:55', '2016-05-13 05:42:14'),
(18, 'faq', 'faq', NULL, '<h3>Can I lay-by  </h3>\r\n<p>Contact us if you would like to set up a lay-by payment plan and provide your name, address, phone and email details. We are more than happy to accept part payments over a 8 Weeks period, To enter into the Lay by Agreement a non-refundable deposit of 10% of the total order is required at the beginning and once you pay  full amount on 8 weeks we ship your order otherwise if we not receive the full amount within 8 weeks we cancel your order .We will Endeavour to assist you in completing your Lay by such as payment reminders and extensions however we do reserve the right to cancel non-compliant orders. In this case any funds minus initial 10% deposit will be refunded to you.</p>\r\n<h3>Can I leave the battery on charge for all day? </h3>\r\n<p>No, Battery charge time must not exceed 12 hours for first use  or permanent damage to the cells will occur. The battery should also be charged every time when ever it need for not more than 6 hours  .</p>\r\n<h3>How fast will my ride on car go? </h3>\r\n<p>This will depend on the battery power. 6 Volt ride ons are more suited to the harder tarmac surfaces but will operate on grass at a slower pace.  A12 volt battery will operate the ride on at about 7 Km/h. A 24 volt will go about 9 Km/h .</p>\r\n<h3>Is there much assembly required? </h3>\r\n<p>All products require some assembly depending on the model. Assembly takes about 20 to 30 mins. These cars come with a manual so you’ll have them up and running in no time!</p>\r\n<p>Assembly time - Approximately 60 - 90 minutes</p>\r\n<p>These ride on cars require some components to be assembled. A relative degree of understanding instruction manuals and assembly techniques will be required to build this ride on car. We can put it together if you would like us to, assembly for this item is an additional $20. Please note, assembled items are available for pick up only from our warehouse.</p>\r\n<h3>What are the best surfaces for my ride on car to operate on? </h3>\r\n<p>12 Volt and 24 volt ride on will go on most surfaces (tarmac, grass, gravel etc) , 6 Volt ride on are more suited to the harder tarmac surfaces but will operate on grass at a slower pace.</p>\r\n<h3>What about your quality and warranty? </h3>\r\n<p>We have strict quality control system from material to finished products, before products being released from factory, our  Dept needs to do spot check strictly, and once products reaching your hands, please pay more attention on testing, you need to make sure all of them are all right in your hands. For defective or false products those are confirmed due to our own mistakes, we can replace and make up for your lost.\r\nAnd you know, toys do not like other electronic products, such as MP3, DVD ,  so we can not guarantee any years for these products, because they will be played by users, maybe they will be broken down after playing, but we can supply most of the spare parts for these broken models from your hands. Usually, they will be all right in correct operation.</p>\r\n<p>We offer a six months parts replacement warranty only. In the event of a particular part failing, Asim''s Toys  will supply the parts required free of charge. In the event of an item not working after replacement parts are installed, the purchasee is responsible for the cost of returning the item to us. Postage costs will not be refunded byAsim''s Toys . See below notes regarding Toys electrics. Batteries and battery chargers are not covered under the warranty and they must be handled and charged correctly.</p>', NULL, NULL, NULL, NULL, '', '', '', 'active', 0, 0, '2016-02-23 19:48:35', '2016-02-23 19:53:32'),
(19, 'contact', 'contact', NULL, '<p>If you have any enquiry about our products, please contact with us</p>', NULL, NULL, NULL, NULL, '', '', '', 'active', 0, 0, '2016-02-23 19:54:40', '2016-02-23 19:57:31'),
(20, 'Lay by', 'lay-by', NULL, '<h3>Policy:</h3>\r\n<p>At Aya''s Boutique we are happy to be able to provide Layby as an option to our customers! Our Layby service works in the following way:</p>\r\n<ul>\r\n<li>To enter into the Lay-by Agreement a non-refundable deposit of $50 of the total order is required and once paid you have up to 45 days to pay the Lay-by in full.</li>\r\n<li>We will endevour to assist you in completing your Layby such as payment reminders and extensions however we do reserve the right to cancel non-compliant orders. In this case any funds minus initial 20% deposit will be refunded to you.</li>\r\n</ul>\r\n<h3>Instructions:</h3>\r\n<ul>\r\n<li>Browse through our available models in our Lay-by collection.</li>\r\n<li>Upon receiving your order we will send you a confirmation email within 48 hours containing the an invoice with remaining amount, due date and payment instructions.</li>\r\n<li>The remaining balance(total balance minus $50 deposit) must be deposited manually to Ayaz Boutique''s account through bank transfers or paypal deposits.(details as below). Payments can be as little or as big as you wish as long as the total balance is cleared by the end of 6 weeks period.</li>\r\n<li>Upon final Lay-by payment, delivery of your purchase will be within 5 business days.</li>\r\n</ul>', NULL, NULL, NULL, NULL, '', '', '', 'active', 0, 0, '2016-03-06 19:08:42', '2016-03-06 19:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `blog_cat`
--

CREATE TABLE `blog_cat` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_item_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `status` enum('active','inactive','ban','review') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_item`
--

CREATE TABLE `blog_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `blog_cat_id` int(10) UNSIGNED DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `meta_title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` text COLLATE utf8_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cat_slider`
--

CREATE TABLE `cat_slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `url` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_slider`
--

INSERT INTO `cat_slider` (`id`, `title`, `slug`, `desc`, `url`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Home Slider', 'home-slider', '', '#', 'active', 0, 0, '2016-02-23 18:03:11', '2016-02-23 18:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `central_settings`
--

CREATE TABLE `central_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` enum('admin','user') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `central_settings`
--

INSERT INTO `central_settings` (`id`, `title`, `status`, `user_type`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'login-notification', 'no', 'admin', 0, 0, '2015-12-24 02:55:47', '2015-12-24 02:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `code`, `title`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan ', 1, 1, '2015-12-24 02:55:33', '2015-12-24 02:55:33'),
(2, 'AX', 'Åland Islands ', 1, 1, '2015-12-24 02:55:33', '2015-12-24 02:55:33'),
(3, 'AL', 'Albania ', 1, 1, '2015-12-24 02:55:33', '2015-12-24 02:55:33'),
(4, 'DZ', 'Algeria ', 1, 1, '2015-12-24 02:55:33', '2015-12-24 02:55:33'),
(5, 'AS', 'American Samoa ', 1, 1, '2015-12-24 02:55:33', '2015-12-24 02:55:33'),
(6, 'AD', 'Andorra ', 1, 1, '2015-12-24 02:55:33', '2015-12-24 02:55:33'),
(7, 'AO', 'Angola ', 1, 1, '2015-12-24 02:55:33', '2015-12-24 02:55:33'),
(8, 'AI', 'Anguilla ', 1, 1, '2015-12-24 02:55:33', '2015-12-24 02:55:33'),
(9, 'AQ', 'Antarctica ', 1, 1, '2015-12-24 02:55:33', '2015-12-24 02:55:33'),
(10, 'AG', 'Antigua and Barbuda ', 1, 1, '2015-12-24 02:55:33', '2015-12-24 02:55:33'),
(11, 'AR', 'Argentina ', 1, 1, '2015-12-24 02:55:33', '2015-12-24 02:55:33'),
(12, 'AM', 'Armenia ', 1, 1, '2015-12-24 02:55:33', '2015-12-24 02:55:33'),
(13, 'AW', 'Aruba ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(14, 'AU', 'Australia ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(15, 'AT', 'Austria ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(16, 'AZ', 'Azerbaijan ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(17, 'BS', 'Bahamas ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(18, 'BH', 'Bahrain ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(19, 'BD', 'Bangladesh ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(20, 'BB', 'Barbados ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(21, 'BY', 'Belarus ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(22, 'BE', 'Belgium ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(23, 'BZ', 'Belize ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(24, 'BJ', 'Benin ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(25, 'BM', 'Bermuda ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(26, 'BT', 'Bhutan ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(27, 'BO', 'Bolivia, Plurinational State of ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(29, 'BA', 'Bosnia and Herzegovina ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(30, 'BW', 'Botswana ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(31, 'BV', 'Bouvet Island ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(32, 'BR', 'Brazil ', 1, 1, '2015-12-24 02:55:34', '2015-12-24 02:55:34'),
(33, 'IO', 'British Indian Ocean Territory ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(34, 'BN', 'Brunei Darussalam ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(35, 'BG', 'Bulgaria ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(36, 'BF', 'Burkina Faso ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(37, 'BI', 'Burundi ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(38, 'KH', 'Cambodia ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(39, 'CM', 'Cameroon ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(40, 'CA', 'Canada ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(41, 'CV', 'Cape Verde ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(42, 'KY', 'Cayman Islands ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(43, 'CF', 'Central African Republic ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(44, 'TD', 'Chad ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(45, 'CL', 'Chile ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(46, 'CN', 'China ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(47, 'CX', 'Christmas Island ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(48, 'CC', 'Cocos (Keeling) Islands ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(49, 'CO', 'Colombia ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(50, 'KM', 'Comoros ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(51, 'CG', 'Congo ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(52, 'CD', 'Congo, the Democratic Republic of the ', 1, 1, '2015-12-24 02:55:35', '2015-12-24 02:55:35'),
(53, 'CK', 'Cook Islands ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(54, 'CR', 'Costa Rica ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(55, 'CI', 'Côte d''Ivoire ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(56, 'HR', 'Croatia ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(57, 'CU', 'Cuba ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(58, 'CW', 'Curaçao ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(59, 'CY', 'Cyprus ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(60, 'CZ', 'Czech Republic ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(61, 'DK', 'Denmark ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(62, 'DJ', 'Djibouti ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(63, 'DM', 'Dominica ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(64, 'DO', 'Dominican Republic ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(65, 'EC', 'Ecuador ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(66, 'EG', 'Egypt ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(67, 'SV', 'El Salvador ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(68, 'GQ', 'Equatorial Guinea ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(69, 'ER', 'Eritrea ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(70, 'EE', 'Estonia ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(71, 'ET', 'Ethiopia ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(72, 'FK', 'Falkland Islands (Malvinas) ', 1, 1, '2015-12-24 02:55:36', '2015-12-24 02:55:36'),
(73, 'FO', 'Faroe Islands ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(74, 'FJ', 'Fiji ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(75, 'FI', 'Finland ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(76, 'FR', 'France ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(77, 'GF', 'French Guiana ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(78, 'PF', 'French Polynesia ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(79, 'TF', 'French Southern Territories ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(80, 'GA', 'Gabon ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(81, 'GM', 'Gambia ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(82, 'GE', 'Georgia ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(83, 'DE', 'Germany ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(84, 'GH', 'Ghana ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(85, 'GI', 'Gibraltar ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(86, 'GR', 'Greece ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(87, 'GL', 'Greenland ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(88, 'GD', 'Grenada ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(89, 'GP', 'Guadeloupe ', 1, 1, '2015-12-24 02:55:37', '2015-12-24 02:55:37'),
(90, 'GU', 'Guam ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(91, 'GT', 'Guatemala ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(92, 'GG', 'Guernsey ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(93, 'GN', 'Guinea ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(94, 'GW', 'Guinea-Bissau ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(95, 'GY', 'Guyana ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(96, 'HT', 'Haiti ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(97, 'HM', 'Heard Island and McDonald Islands ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(98, 'VA', 'Holy See (Vatican City State) ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(99, 'HN', 'Honduras ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(100, 'HK', 'Hong Kong ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(101, 'HU', 'Hungary ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(102, 'IS', 'Iceland ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(103, 'IN', 'India ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(104, 'ID', 'Indonesia ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(105, 'IR', 'Iran, Islamic Republic of ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(106, 'IQ', 'Iraq ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(107, 'IE', 'Ireland ', 1, 1, '2015-12-24 02:55:38', '2015-12-24 02:55:38'),
(108, 'IM', 'Isle of Man ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(109, 'IL', 'Israel ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(110, 'IT', 'Italy ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(111, 'JM', 'Jamaica ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(112, 'JP', 'Japan ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(113, 'JE', 'Jersey ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(114, 'JO', 'Jordan ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(115, 'KZ', 'Kazakhstan ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(116, 'KE', 'Kenya ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(117, 'KI', 'Kiribati ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(118, 'KP', 'Korea, Democratic People''s Republic of ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(119, 'KR', 'Korea, Republic of ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(120, 'KW', 'Kuwait ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(121, 'KG', 'Kyrgyzstan ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(122, 'LA', 'Lao People''s Democratic Republic ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(123, 'LV', 'Latvia ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(124, 'LB', 'Lebanon ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(125, 'LS', 'Lesotho ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(126, 'LR', 'Liberia ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(127, 'LY', 'Libya ', 1, 1, '2015-12-24 02:55:39', '2015-12-24 02:55:39'),
(128, 'LI', 'Liechtenstein ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(129, 'LT', 'Lithuania ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(130, 'LU', 'Luxembourg ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(131, 'MO', 'Macao ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(132, 'MK', 'Macedonia, the former Yugoslav Republic of ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(133, 'MG', 'Madagascar ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(134, 'MW', 'Malawi ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(135, 'MY', 'Malaysia ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(136, 'MV', 'Maldives ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(137, 'ML', 'Mali ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(138, 'MT', 'Malta ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(139, 'MH', 'Marshall Islands ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(140, 'MQ', 'Martinique ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(141, 'MR', 'Mauritania ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(142, 'MU', 'Mauritius ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(143, 'YT', 'Mayotte ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(144, 'MX', 'Mexico ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(145, 'FM', 'Micronesia, Federated States of ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(146, 'MD', 'Moldova, Republic of ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(147, 'MC', 'Monaco ', 1, 1, '2015-12-24 02:55:40', '2015-12-24 02:55:40'),
(148, 'MN', 'Mongolia ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(149, 'ME', 'Montenegro ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(150, 'MS', 'Montserrat ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(151, 'MA', 'Morocco ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(152, 'MZ', 'Mozambique ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(153, 'MM', 'Myanmar ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(154, 'NA', 'Namibia ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(155, 'NR', 'Nauru ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(156, 'NP', 'Nepal ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(157, 'NL', 'Netherlands ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(158, 'NC', 'New Caledonia ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(159, 'NZ', 'New Zealand ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(160, 'NI', 'Nicaragua ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(161, 'NE', 'Niger ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(162, 'NG', 'Nigeria ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(163, 'NU', 'Niue ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(164, 'NF', 'Norfolk Island ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(165, 'MP', 'Northern Mariana Islands ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(166, 'NO', 'Norway ', 1, 1, '2015-12-24 02:55:41', '2015-12-24 02:55:41'),
(167, 'OM', 'Oman ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(168, 'PK', 'Pakistan ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(169, 'PW', 'Palau ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(170, 'PS', 'Palestinian Territory, Occupied ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(171, 'PA', 'Panama ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(172, 'PG', 'Papua New Guinea ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(173, 'PY', 'Paraguay ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(174, 'PE', 'Peru ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(175, 'PH', 'Philippines ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(176, 'PN', 'Pitcairn ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(177, 'PL', 'Poland ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(178, 'PT', 'Portugal ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(179, 'PR', 'Puerto Rico ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(180, 'QA', 'Qatar ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(181, 'RE', 'Réunion ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(182, 'RO', 'Romania ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(183, 'RU', 'Russian Federation ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(184, 'RW', 'Rwanda ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(185, 'BL', 'Saint Barthélemy ', 1, 1, '2015-12-24 02:55:42', '2015-12-24 02:55:42'),
(186, 'SH', 'Saint Helena, Ascension and Tristan da Cunha ', 1, 1, '2015-12-24 02:55:43', '2015-12-24 02:55:43'),
(187, 'KN', 'Saint Kitts and Nevis ', 1, 1, '2015-12-24 02:55:43', '2015-12-24 02:55:43'),
(188, 'LC', 'Saint Lucia ', 1, 1, '2015-12-24 02:55:43', '2015-12-24 02:55:43'),
(189, 'MF', 'Saint Martin (French part) ', 1, 1, '2015-12-24 02:55:43', '2015-12-24 02:55:43'),
(190, 'PM', 'Saint Pierre and Miquelon ', 1, 1, '2015-12-24 02:55:43', '2015-12-24 02:55:43'),
(191, 'VC', 'Saint Vincent and the Grenadines ', 1, 1, '2015-12-24 02:55:43', '2015-12-24 02:55:43'),
(192, 'WS', 'Samoa ', 1, 1, '2015-12-24 02:55:43', '2015-12-24 02:55:43'),
(193, 'SM', 'San Marino ', 1, 1, '2015-12-24 02:55:43', '2015-12-24 02:55:43'),
(194, 'ST', 'Sao Tome and Principe ', 1, 1, '2015-12-24 02:55:43', '2015-12-24 02:55:43'),
(195, 'SA', 'Saudi Arabia ', 1, 1, '2015-12-24 02:55:43', '2015-12-24 02:55:43'),
(196, 'SN', 'Senegal ', 1, 1, '2015-12-24 02:55:43', '2015-12-24 02:55:43'),
(197, 'RS', 'Serbia ', 1, 1, '2015-12-24 02:55:43', '2015-12-24 02:55:43'),
(198, 'SC', 'Seychelles ', 1, 1, '2015-12-24 02:55:43', '2015-12-24 02:55:43'),
(199, 'SL', 'Sierra Leone ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(200, 'SG', 'Singapore ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(201, 'SX', 'Sint Maarten (Dutch part) ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(202, 'SK', 'Slovakia ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(203, 'SI', 'Slovenia ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(204, 'SB', 'Solomon Islands ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(205, 'SO', 'Somalia ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(206, 'ZA', 'South Africa ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(207, 'GS', 'South Georgia and the South Sandwich Islands ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(208, 'SS', 'South Sudan ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(209, 'ES', 'Spain ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(210, 'LK', 'Sri Lanka ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(211, 'SD', 'Sudan ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(212, 'SR', 'Suriname ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(213, 'SJ', 'Svalbard and Jan Mayen ', 1, 1, '2015-12-24 02:55:44', '2015-12-24 02:55:44'),
(214, 'SZ', 'Swaziland ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(215, 'SE', 'Sweden ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(216, 'CH', 'Switzerland ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(217, 'SY', 'Syrian Arab Republic ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(218, 'TW', 'Taiwan, Province of China ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(219, 'TJ', 'Tajikistan ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(220, 'TZ', 'Tanzania, United Republic of ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(221, 'TH', 'Thailand ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(222, 'TL', 'Timor-Leste ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(223, 'TG', 'Togo ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(224, 'TK', 'Tokelau ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(225, 'TO', 'Tonga ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(226, 'TT', 'Trinidad and Tobago ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(227, 'TN', 'Tunisia ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(228, 'TR', 'Turkey ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(229, 'TM', 'Turkmenistan ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(230, 'TC', 'Turks and Caicos Islands ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(231, 'TV', 'Tuvalu ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(232, 'UG', 'Uganda ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(233, 'UA', 'Ukraine ', 1, 1, '2015-12-24 02:55:45', '2015-12-24 02:55:45'),
(234, 'AE', 'United Arab Emirates ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(235, 'GB', 'United Kingdom ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(236, 'US', 'United States ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(237, 'UM', 'United States Minor Outlying Islands ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(238, 'UY', 'Uruguay ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(239, 'UZ', 'Uzbekistan ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(240, 'VU', 'Vanuatu ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(241, 'VE', 'Venezuela, Bolivarian Republic of ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(242, 'VN', 'Viet Nam ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(243, 'VG', 'Virgin Islands, British ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(244, 'VI', 'Virgin Islands, U.S. ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(245, 'WF', 'Wallis and Futuna ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(246, 'EH', 'Western Sahara ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(247, 'YE', 'Yemen ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(248, 'ZM', 'Zambia ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46'),
(249, 'ZW', 'Zimbabwe ', 1, 1, '2015-12-24 02:55:46', '2015-12-24 02:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `suburb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `address` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `email`, `first_name`, `last_name`, `password`, `suburb`, `postcode`, `state`, `country`, `telephone`, `updated_at`, `created_at`, `address`) VALUES
(20, 'mithi', 'mithu', 'mi', 'i', 'w', 'w', 'w', 'w', 'w', '2016-03-28 00:35:28', '0000-00-00 00:00:00', ''),
(21, 'mithun.cse521@gmail.com', '323', '34', '36a3dfda6161ead53a41830162a07f51583f9e9b', 'we', '3000', 'Victoria', 'Australia', '0', '2016-06-13 18:26:15', '2016-03-05 13:40:33', 'we'),
(22, 'selimppc@gmail.com', 'Selim', 'Reza', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-22 03:45:58', '2016-04-22 03:45:50', 'Dhaka'),
(23, 'selimppc@yahoo.com', 'Selim', 'Reza', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', '1230', 'ACT', 'Australia', '123', '2016-04-29 11:30:22', '2016-04-29 11:30:16', 'Password: 123');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_details`
--

CREATE TABLE `delivery_details` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suburb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `delivery_details`
--

INSERT INTO `delivery_details` (`id`, `first_name`, `last_name`, `suburb`, `postcode`, `state`, `country`, `telephone`, `updated_at`, `created_at`, `address`, `user_id`, `email`) VALUES
(20, 'Mithun', 'Adhiakry', 'Mipur', '1213', 'NSW', 'Australia', '01732017886', '2016-03-01 19:32:57', '2016-03-01 19:32:57', 'Dhaka', 19, 'mithun.cse521@gmail.com'),
(21, 'Mithun', 'Adhiakry', 'Mipur', '1213', 'NSW', 'Australia', '01732017886', '2016-03-01 19:38:17', '2016-03-01 19:38:17', 'Dhaka', 19, 'mithun.cse521@gmail.com'),
(22, '323', '34', 'we', 'sdsds', 'ACT', 'Australia', '0', '2016-04-20 18:50:46', '2016-04-20 18:50:46', 'we', 21, 'mithun.cse521@gmail.com'),
(23, '323', '34', 'we', 'sdsds', 'ACT', 'Australia', '0', '2016-04-20 19:00:38', '2016-04-20 19:00:38', 'we', 21, 'mithun.cse521@gmail.com'),
(24, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-22 03:50:22', '2016-04-22 03:50:22', 'Dhaka', 22, 'selimppc@gmail.com'),
(25, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-22 05:30:06', '2016-04-22 05:30:06', 'Dhaka', 22, 'selimppc@gmail.com'),
(26, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-22 09:17:50', '2016-04-22 09:17:50', 'Dhaka', 22, 'selimppc@gmail.com'),
(27, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-22 09:19:08', '2016-04-22 09:19:08', 'Dhaka', 22, 'selimppc@gmail.com'),
(28, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-22 10:30:19', '2016-04-22 10:30:19', 'Dhaka', 22, 'selimppc@gmail.com'),
(29, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-22 10:59:56', '2016-04-22 10:59:56', 'Dhaka', 22, 'selimppc@gmail.com'),
(30, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-23 04:17:33', '2016-04-23 04:17:33', 'Dhaka', 22, 'selimppc@gmail.com'),
(31, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-23 04:18:09', '2016-04-23 04:18:09', 'Dhaka', 22, 'selimppc@gmail.com'),
(32, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-23 11:56:33', '2016-04-23 11:56:33', 'Dhaka', 22, 'selimppc@gmail.com'),
(33, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-23 11:59:59', '2016-04-23 11:59:59', 'Dhaka', 22, 'selimppc@gmail.com'),
(34, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-23 12:03:25', '2016-04-23 12:03:25', 'Dhaka', 22, 'selimppc@gmail.com'),
(35, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-23 12:05:00', '2016-04-23 12:05:00', 'Dhaka', 22, 'selimppc@gmail.com'),
(36, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-23 12:06:19', '2016-04-23 12:06:19', 'Dhaka', 22, 'selimppc@gmail.com'),
(37, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-23 14:16:53', '2016-04-23 14:16:53', 'Dhaka', 22, 'selimppc@gmail.com'),
(38, 'Selim', 'Reza', 'Dhaka', '1290', 'ACT', 'Australia', '1234567890', '2016-04-23 14:18:22', '2016-04-23 14:18:22', 'Dhaka', 22, 'selimppc@gmail.com'),
(39, '323', '34', 'we', 'sdsds', 'ACT', 'Australia', '0', '2016-04-25 19:45:24', '2016-04-25 19:45:24', 'we', 21, 'mithun.cse521@gmail.com'),
(40, '323', '34', 'we', 'sdsds', 'ACT', 'Australia', '0', '2016-04-27 18:27:53', '2016-04-27 18:27:53', 'we', 21, 'mithun.cse521@gmail.com'),
(41, '323', '34', 'we', 'sdsds', 'ACT', 'Australia', '0', '2016-04-28 02:39:44', '2016-04-28 02:39:44', 'we', 21, 'mithun.cse521@gmail.com'),
(42, 'Selim', 'Reza', '123', '1230', 'ACT', 'Australia', '123', '2016-04-29 11:30:25', '2016-04-29 11:30:25', 'Password: 123', 23, 'selimppc@yahoo.com'),
(43, 'Selim', 'Reza', '123', '1230', 'ACT', 'Australia', '123', '2016-05-06 12:03:59', '2016-05-06 12:03:59', 'Password: 123', 23, 'selimppc@yahoo.com'),
(44, 'Selim', 'Reza', '123', '1230', 'ACT', 'Australia', '123', '2016-05-07 16:20:10', '2016-05-07 16:20:10', 'Password: 123', 23, 'selimppc@yahoo.com'),
(45, 'Selim', 'Reza', '123', '1230', 'ACT', 'Australia', '123', '2016-06-10 22:48:06', '2016-06-10 22:48:06', 'Password: 123', 23, 'selimppc@yahoo.com'),
(46, '323', '34', 'we', '3000', 'Victoria', 'Australia', '0', '2016-06-13 18:27:10', '2016-06-13 18:27:10', 'we', 21, 'mithun.cse521@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `gal_image`
--

CREATE TABLE `gal_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gal_image`
--

INSERT INTO `gal_image` (`id`, `product_id`, `name`, `slug`, `image`, `thumbnail`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 3, 'one 1', 'one-1-1', 'uploads/gallery_image/956productgallery1.jpg', 'uploads/gallery_image/thumb_400x400_801_productgallery1.jpg', 0, 0, 0, '2016-02-24 18:22:44', '2016-02-24 18:22:44'),
(3, 3, 'two 2', 'two-2-2', 'uploads/gallery_image/760productgallery2.jpg', 'uploads/gallery_image/thumb_400x400_128_productgallery2.jpg', 0, 0, 0, '2016-02-24 18:23:06', '2016-02-24 18:23:06'),
(4, 3, 'three', 'three-3', 'uploads/gallery_image/663productgallery3.jpg', 'uploads/gallery_image/thumb_400x400_147_productgallery3.jpg', 0, 0, 0, '2016-02-24 18:23:34', '2016-02-24 18:23:34'),
(5, 4, 'one', 'one-1', 'uploads/gallery_image/662banner2.jpg', 'uploads/gallery_image/thumb_400x400_190_banner2.jpg', 0, 0, 0, '2016-02-24 18:24:26', '2016-02-24 18:24:26'),
(6, 10, 'pre -gallery', 'pre-gallery-1', 'uploads/gallery_image/272800.jpg', 'uploads/gallery_image/thumb_400x400_149_800.jpg', 0, 0, 0, '2016-05-13 05:48:19', '2016-05-13 05:48:19'),
(7, 10, '2nd image', '2nd-image-2', 'uploads/gallery_image/590DSC_5788_copy_small.jpg', 'uploads/gallery_image/thumb_400x400_300_DSC_5788_copy_small.jpg', 0, 0, 0, '2016-05-13 05:48:46', '2016-05-13 05:48:46'),
(8, 3, 'Product 1', 'product-1-4', 'uploads/gallery_image/922Classic-Kiss.jpg', 'uploads/gallery_image/thumb_400x400_164_Classic-Kiss.jpg', 0, 0, 0, '2016-05-31 18:19:27', '2016-05-31 18:19:27'),
(10, 12, 'The New Range Rover', 'the-new-range-rover-1', 'uploads/gallery_image/441special-2.png', 'uploads/gallery_image/thumb_400x400_241_special-2.png', 0, 0, 0, '2016-06-02 18:27:15', '2016-06-02 18:27:15'),
(11, 12, 'The New Range Rover', 'the-new-range-rover-2', 'uploads/gallery_image/121special-2.png', 'uploads/gallery_image/thumb_400x400_428_special-2.png', 0, 0, 0, '2016-06-02 18:27:15', '2016-06-02 18:27:15'),
(12, 13, 'The new range rover 2', 'the-new-range-rover-2-1', 'uploads/gallery_image/357special-3.png', 'uploads/gallery_image/thumb_400x400_584_special-3.png', 0, 0, 0, '2016-06-02 18:28:36', '2016-06-02 18:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sortorder` int(11) NOT NULL DEFAULT '999'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `slug`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `sortorder`) VALUES
(3, 'Ride on Toys', 'ride-on-toys', 'active', 0, 0, '2016-02-21 19:31:56', '2016-03-09 17:38:28', 1),
(4, 'Pre order', 'pre-order', 'active', 0, 0, '2016-02-21 19:32:09', '2016-03-09 17:42:05', 2),
(5, 'Lay by Instruction', 'lay-by-instruction', 'active', 0, 0, '2016-02-21 19:32:23', '2016-03-09 17:42:46', 4),
(6, 'Extra & accessories', 'extra-accessories', 'active', 0, 0, '2016-02-21 19:32:40', '2016-03-19 12:11:05', 5),
(7, 'Spare Parts', 'spare-parts', 'active', 0, 0, '2016-02-21 19:32:54', '2016-03-09 17:43:29', 6),
(8, 'Lay by', 'lay-by', 'inactive', 0, 0, '2016-03-09 17:26:52', '2016-05-01 03:47:00', 3),
(9, 'Special on Sale', 'special-on-sale', 'active', 0, 0, '2016-06-02 18:07:25', '2016-06-02 18:07:25', 3);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('image','pdf','doc') COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_text` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_type_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('url','ext') COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `ext_name` enum('skill','team','article','social_icon','blog','gallery','slider') COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(10) UNSIGNED DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('main','top','user','side','footer') COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_10_13_071204_create_country_table', 1),
('2015_10_13_085319_create_user_table', 1),
('2015_10_18_114322_create_user_reset_password_table', 1),
('2015_10_28_164029_create_central_settings_table', 1),
('2015_11_24_164202_create_crud_table', 1),
('2015_12_02_121303_create_testimonial_table', 1),
('2015_12_02_134415_create_cat_slider_table', 1),
('2015_12_02_140308_create_cat_gallery_table', 1),
('2015_12_02_144731_create_gal_image_table', 1),
('2015_12_02_145100_create_slider_image_table', 1),
('2015_12_02_165638_create_article_table', 1),
('2015_12_03_134653_create_menu_table', 1),
('2015_12_03_140939_create_menu_type_table', 1),
('2015_12_06_122601_create_media_table', 1),
('2015_12_07_093928_create_widget_table', 1),
('2015_12_08_103821_create_widget_menu_table', 1),
('2015_12_21_110402_create_team_table', 1),
('2015_12_21_142232_create_skills_table', 1),
('2015_12_21_154813_create_social_icon_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_10_13_071204_create_country_table', 1),
('2015_10_13_085319_create_user_table', 1),
('2015_10_18_114322_create_user_reset_password_table', 1),
('2015_10_28_164029_create_central_settings_table', 1),
('2015_11_24_164202_create_crud_table', 1),
('2015_12_02_121303_create_testimonial_table', 1),
('2015_12_02_134415_create_cat_slider_table', 1),
('2015_12_02_140308_create_cat_gallery_table', 1),
('2015_12_02_144731_create_gal_image_table', 1),
('2015_12_02_145100_create_slider_image_table', 1),
('2015_12_02_165638_create_article_table', 1),
('2015_12_03_134653_create_menu_table', 1),
('2015_12_03_140939_create_menu_type_table', 1),
('2015_12_06_122601_create_media_table', 1),
('2015_12_07_093928_create_widget_table', 1),
('2015_12_08_103821_create_widget_menu_table', 1),
('2015_12_21_110402_create_team_table', 1),
('2015_12_21_142232_create_skills_table', 1),
('2015_12_21_154813_create_social_icon_table', 1),
('2015_12_21_161752_create_blog_cat_table', 2),
('2015_12_21_165040_create_blog_item_table', 2),
('2015_12_21_171616_create_blog_comment_table', 2),
('2015_12_24_150619_create_dump_sql_table', 2),
('2016_01_04_095645_create_product_category', 2),
('2016_01_04_102630_create_product', 2),
('2016_01_04_104816_create_product_images', 2),
('2016_01_04_105438_create_product_variation', 3),
('2016_01_08_234435_drop_votes_product_category_table', 4),
('2016_01_11_104935_add_is_featured_to_product_category_table', 5),
('2016_01_19_102310_add_images_to_product_table', 6),
('2016_01_26_120055_create_groups_table', 7),
('2016_01_26_121915_create_groups_table', 8),
('2016_01_27_102655_create_product_subgroup_table', 9),
('2016_02_04_112756_add_subgroup_to_product_category_table', 10),
('2016_02_08_110726_add_groupid_subgroupid_to_product_table', 11),
('2016_02_21_094551_modify_productcategorys_table', 12),
('2016_02_21_095323_add_column_productcategorys_table', 12),
('2016_02_29_122141_create_customer_table', 13),
('2016_04_20_125918_create_orderoverhead_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_head_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_variation_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background_color` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plate_text` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `status` enum('0','1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_head_id`, `product_id`, `product_variation_id`, `qty`, `color`, `background_color`, `plate_text`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 5, '0', 1, '0', NULL, NULL, 150.00, '1', '2016-04-22 10:07:51', '2016-04-22 10:07:51'),
(2, 13, 5, '1', 1, '1', NULL, NULL, 150.00, '1', '2016-04-22 10:07:51', '2016-04-22 10:07:51'),
(3, 14, 5, '0', 1, '0', NULL, NULL, 150.00, '1', '2016-04-22 10:20:34', '2016-04-22 10:20:34'),
(4, 14, 5, '1', 1, '1', NULL, NULL, 150.00, '1', '2016-04-22 10:20:34', '2016-04-22 10:20:34'),
(5, 15, 3, '2', 1, '2', NULL, NULL, 130.00, '1', '2016-04-22 10:33:55', '2016-04-22 10:33:55'),
(6, 16, 3, '2', 1, '2', NULL, NULL, 130.00, '1', '2016-04-22 11:00:01', '2016-04-22 11:00:01'),
(7, 17, 5, '1', 1, '1', NULL, NULL, 150.00, '1', '2016-04-23 04:17:36', '2016-04-23 04:17:36'),
(8, 18, 4, '0', 1, '', NULL, NULL, 200.00, '1', '2016-04-23 04:18:11', '2016-04-23 04:18:11'),
(9, 19, 5, '1', 1, '1', NULL, NULL, 150.00, '1', '2016-04-23 11:56:48', '2016-04-23 11:56:48'),
(10, 20, 4, '0', 1, '', NULL, NULL, 200.00, '1', '2016-04-23 12:00:03', '2016-04-23 12:00:03'),
(11, 21, 4, '0', 1, '', NULL, NULL, 200.00, '1', '2016-04-23 12:03:27', '2016-04-23 12:03:27'),
(12, 22, 5, '1', 1, '1', NULL, NULL, 150.00, '1', '2016-04-23 12:05:04', '2016-04-23 12:05:04'),
(13, 23, 5, '1', 1, '1', NULL, NULL, 150.00, '1', '2016-04-23 12:06:22', '2016-04-23 12:06:22'),
(14, 24, 5, '1', 1, '1', NULL, NULL, 150.00, '1', '2016-04-23 14:16:56', '2016-04-23 14:16:56'),
(15, 25, 5, '1', 1, '1', NULL, NULL, 150.00, '1', '2016-04-23 14:18:24', '2016-04-23 14:18:24'),
(16, 26, 5, '1', 1, '1', NULL, NULL, 150.00, '1', '2016-04-25 19:51:05', '2016-04-25 19:51:05'),
(17, 27, 5, '1', 1, '1', NULL, NULL, 150.00, '1', '2016-04-27 18:27:56', '2016-04-27 18:27:56'),
(18, 28, 4, '0', 1, '', NULL, NULL, 200.00, '1', '2016-04-28 02:39:48', '2016-04-28 02:39:48'),
(19, 28, 6, '0', 1, '', NULL, NULL, 240.00, '1', '2016-04-28 02:39:48', '2016-04-28 02:39:48'),
(20, 28, 5, '3', 3, '3', NULL, NULL, 150.00, '1', '2016-04-28 02:39:48', '2016-04-28 02:39:48'),
(21, 29, 5, '1', 1, '1', NULL, NULL, 150.00, '1', '2016-04-29 11:30:29', '2016-04-29 11:30:29'),
(22, 30, 5, '1', 1, '1', NULL, NULL, 150.00, '1', '2016-04-29 11:56:19', '2016-04-29 11:56:19'),
(23, 31, 5, '1', 1, '1', NULL, NULL, 150.00, '1', '2016-05-06 12:04:15', '2016-05-06 12:04:15'),
(24, 32, 3, '2', 1, '2', '', NULL, 130.00, '1', '2016-05-07 16:25:49', '2016-05-07 16:25:49'),
(25, 32, 8, 'black', 1, 'black', 'Black', 'thank you', 25.00, '1', '2016-05-07 16:25:49', '2016-05-07 16:25:49'),
(26, 33, 5, 'Red', 1, 'Red', '', '', 150.00, '1', '2016-06-10 22:48:18', '2016-06-10 22:48:18'),
(27, 34, 6, '', 1, '', '', '', 240.00, '1', '2016-06-10 22:49:04', '2016-06-10 22:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_head_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_variation_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `status` enum('0','1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_head`
--

CREATE TABLE `order_head` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_no` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_type` enum('layby','eway') COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `total_discount_price` double(8,2) NOT NULL,
  `vat` float DEFAULT NULL,
  `freight_amount` float DEFAULT NULL,
  `sub_total` float DEFAULT NULL,
  `net_amount` float NOT NULL,
  `status` enum('open','partial-payment','done','delivered','approved','cancel') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_head`
--

INSERT INTO `order_head` (`id`, `invoice_no`, `invoice_type`, `user_id`, `total_discount_price`, `vat`, `freight_amount`, `sub_total`, `net_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '0', NULL, 22, 0.00, 0, NULL, NULL, 300, 'open', '2016-04-22 09:53:59', '2016-04-22 09:53:59'),
(2, '0', NULL, 22, 0.00, 0, NULL, NULL, 300, 'open', '2016-04-22 09:54:56', '2016-04-22 09:54:56'),
(3, 'INV-0000001', NULL, 22, 0.00, 0, NULL, NULL, 300, 'open', '2016-04-22 09:56:05', '2016-04-22 09:56:05'),
(4, 'INV-0000001', NULL, 22, 0.00, 0, NULL, NULL, 300, 'open', '2016-04-22 09:58:49', '2016-04-22 09:58:49'),
(5, 'INV-0000002', NULL, 22, 0.00, 0, NULL, NULL, 300, 'open', '2016-04-22 09:59:06', '2016-04-22 09:59:06'),
(6, 'INV-0000003', NULL, 22, 0.00, 0, NULL, NULL, 300, 'open', '2016-04-22 10:05:41', '2016-04-22 10:05:41'),
(7, 'INV-0000004', NULL, 22, 0.00, 0, NULL, NULL, 300, 'open', '2016-04-22 10:05:59', '2016-04-22 10:05:59'),
(8, 'INV-0000005', NULL, 22, 0.00, 0, NULL, NULL, 300, 'open', '2016-04-22 10:06:14', '2016-04-22 10:06:14'),
(9, 'INV-0000006', NULL, 22, 0.00, 0, NULL, NULL, 300, 'open', '2016-04-22 10:06:31', '2016-04-22 10:06:31'),
(10, 'INV-0000007', NULL, 22, 0.00, 0, NULL, NULL, 300, 'open', '2016-04-22 10:06:50', '2016-04-22 10:06:50'),
(11, 'INV-0000008', NULL, 22, 0.00, 0, NULL, NULL, 300, 'open', '2016-04-22 10:07:12', '2016-04-22 10:07:12'),
(12, 'INV-0000009', NULL, 22, 0.00, 0, NULL, NULL, 300, 'open', '2016-04-22 10:07:28', '2016-04-22 10:07:28'),
(13, 'INV-0000010', NULL, 22, 0.00, 0, NULL, NULL, 300, 'open', '2016-04-22 10:07:51', '2016-04-22 10:07:51'),
(14, 'INV-0000011', NULL, 22, 0.00, 0, NULL, NULL, 300, 'open', '2016-04-22 10:20:34', '2016-04-22 10:20:34'),
(15, 'INV-0000012', NULL, 22, 0.00, 0, NULL, NULL, 130, 'open', '2016-04-22 10:33:55', '2016-04-22 10:33:55'),
(16, 'INV-0000013', 'layby', 22, 0.00, 0, NULL, NULL, 130, 'approved', '2016-04-22 11:00:01', '2016-05-07 16:46:30'),
(17, 'INV-0000014', 'layby', 22, 0.00, 0, NULL, NULL, 150, 'approved', '2016-04-23 04:17:36', '2016-05-31 17:22:21'),
(18, 'INV-0000015', 'layby', 22, 0.00, 0, NULL, NULL, 200, 'open', '2016-04-23 04:18:11', '2016-04-23 04:18:11'),
(19, 'INV-0000016', 'eway', 22, 0.00, 0, NULL, NULL, 150, 'approved', '2016-04-23 11:56:48', '2016-04-28 02:23:10'),
(20, 'INV-0000017', 'layby', 22, 0.00, 0, NULL, NULL, 200, 'open', '2016-04-23 12:00:03', '2016-04-23 12:00:03'),
(21, 'INV-0000018', 'layby', 22, 0.00, 0, NULL, NULL, 200, 'open', '2016-04-23 12:03:27', '2016-04-23 12:03:27'),
(22, 'INV-0000019', NULL, 22, 0.00, 0, NULL, NULL, 150, 'open', '2016-04-23 12:05:04', '2016-04-23 12:05:04'),
(23, 'INV-0000020', 'eway', 22, 0.00, 0, NULL, NULL, 150, 'cancel', '2016-04-23 12:06:22', '2016-04-28 02:24:04'),
(24, 'INV-0000021', NULL, 22, 0.00, 0, NULL, NULL, 150, 'open', '2016-04-23 14:16:56', '2016-04-23 14:16:56'),
(25, 'INV-0000022', 'layby', 22, 0.00, 0, NULL, NULL, 150, 'open', '2016-04-23 14:18:24', '2016-04-23 14:18:24'),
(26, 'INV-0000023', 'layby', 21, 0.00, 0, NULL, NULL, 150, 'open', '2016-04-25 19:51:04', '2016-04-25 19:51:04'),
(27, 'INV-0000024', 'eway', 21, 0.00, 0, NULL, NULL, 150, 'approved', '2016-04-27 18:27:56', '2016-04-29 05:55:55'),
(28, 'INV-0000025', 'layby', 21, 0.00, 0, NULL, NULL, 590, 'approved', '2016-04-28 02:39:48', '2016-04-29 05:56:00'),
(29, 'INV-0000026', 'eway', 23, 0.00, 0, NULL, NULL, 150, 'open', '2016-04-29 11:30:29', '2016-04-29 11:30:29'),
(30, 'INV-0000027', 'layby', 23, 0.00, 0, NULL, NULL, 150, 'open', '2016-04-29 11:56:19', '2016-04-29 11:56:19'),
(31, 'INV-0000028', 'eway', 23, 0.00, 0, NULL, NULL, 150, 'open', '2016-05-06 12:04:15', '2016-05-06 12:04:15'),
(32, 'INV-0000029', NULL, 23, 0.00, 0, NULL, NULL, 155, 'open', '2016-05-07 16:25:49', '2016-05-07 16:25:49'),
(33, 'INV-0000030', 'eway', 23, 0.00, 0, 1146.06, 150, 1296.06, 'open', '2016-06-10 22:48:18', '2016-06-10 22:48:18'),
(34, 'INV-0000031', 'eway', 23, 0.00, 0, 1146.06, 240, 1386.06, 'open', '2016-06-10 22:49:04', '2016-06-10 22:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_invoice_setup`
--

CREATE TABLE `order_invoice_setup` (
  `id` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `title` varchar(64) DEFAULT NULL,
  `last_number` int(11) DEFAULT NULL,
  `increment` int(11) DEFAULT NULL,
  `status` enum('active') DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_invoice_setup`
--

INSERT INTO `order_invoice_setup` (`id`, `type`, `code`, `title`, `last_number`, `increment`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'invoice-no', 'INV-', 'Invoice no for order', 31, 1, 'active', 1, 1, NULL, '2016-06-10 22:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_payment_transaction`
--

CREATE TABLE `order_payment_transaction` (
  `id` int(11) NOT NULL,
  `order_head_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `payment_type` enum('paypal','eway','bank') DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `transaction_no` varchar(45) DEFAULT NULL,
  `gateway_name` varchar(64) DEFAULT NULL,
  `gateway_address` text,
  `status` enum('pending','approved','cancel') DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_payment_transaction`
--

INSERT INTO `order_payment_transaction` (`id`, `order_head_id`, `customer_id`, `payment_type`, `amount`, `date`, `transaction_no`, `gateway_name`, `gateway_address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 25, 22, 'bank', '50.00', '2016-04-23 21:49:22', 'NA-001', 'Dhaka Bank', 'Uttara', 'approved', NULL, NULL, '2016-04-23 15:49:22', '2016-04-29 11:13:59'),
(2, 25, 22, 'bank', '30.00', '2016-04-23 21:51:51', 'NA-001', 'Dhaka Bank', 'Uttara', 'approved', NULL, NULL, '2016-04-23 15:51:51', '2016-05-13 05:51:20'),
(3, 25, 22, 'bank', '50.00', '2016-04-23 23:10:40', 'BA-0101', 'Dhaka', 'Dhaka', 'approved', NULL, NULL, '2016-04-23 17:10:40', '2016-05-13 05:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(10) UNSIGNED DEFAULT NULL,
  `product_group_id` int(10) UNSIGNED DEFAULT NULL,
  `product_subgroup_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class` enum('Product','Serice','Soft copy') COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sell_rate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sell_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sell_unit_quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock_unit_quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_price_vary` enum('no','yes') COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_featured` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seats` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voltage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `features` text COLLATE utf8_unicode_ci NOT NULL,
  `videos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '999',
  `preorder` int(11) NOT NULL DEFAULT '0',
  `weight` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `volume` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_category_id`, `product_group_id`, `product_subgroup_id`, `title`, `slug`, `short_description`, `long_description`, `status`, `sku`, `class`, `group`, `sell_rate`, `cost_price`, `sell_unit`, `sell_unit_quantity`, `stock_unit`, `stock_unit_quantity`, `is_price_vary`, `created_by`, `updated_by`, `created_at`, `updated_at`, `is_featured`, `image`, `thumb`, `brand`, `seats`, `voltage`, `features`, `videos`, `sort_order`, `preorder`, `weight`, `volume`) VALUES
(3, NULL, 3, 6, 'Product 1', 'product-1', '<p>2015 Newest Cool Electric Ride On Motorcycle for Kids</p>\r\n									\r\n									<p>Different Cool Design on Two sides</p>\r\n									<p>Perfect back wheels spring suspension ,make the car move more steady, just like real cars\r\n									(first launched in market )</p>', '<table class="product_table">\r\n									<tr>\r\n										<td>Battery</td>\r\n										<td>6v</td>\r\n									</tr>\r\n									<tr>\r\n										<td>Motor</td>\r\n										<td>25 W</td>\r\n									</tr>\r\n									<tr>\r\n										<td>Suitable age</td>\r\n										<td>6v</td>\r\n									</tr>\r\n									<tr>\r\n										<td>Product size</td>\r\n										<td>103 *65*40cm</td>\r\n									</tr>\r\n									<tr>\r\n										<td>Carton size</td>\r\n										<td> 72*49*40cm</td>\r\n									</tr>\r\n									<tr>\r\n										<td>Speed</td>\r\n										<td>3km/hr</td>\r\n									</tr>\r\n									<tr>\r\n										<td>Maximum Capacity</td>\r\n										<td>30 Kg</td>\r\n									</tr>\r\n									<tr>\r\n										<td>G.W/N.W</td>\r\n										<td> 9/8kgs</td>\r\n									</tr>\r\n								</table>', 'active', '1', 'Product', NULL, '130', '', '1', '1', '1', '4', 'no', 0, 0, '2016-02-21 19:49:33', '2016-03-06 18:43:54', 'Yes', 'uploads/product_image/469product-1.jpg', 'uploads/product_image/thumb_432_product-1.jpg', 'Mercedes', '2-seater', '6V', '', 'https://www.youtube.com/watch?v=WaS2zOWQM00', 1, 1, '', ''),
(4, NULL, 3, 6, 'Product 2', 'product-2', '', '', 'active', '2', 'Product', NULL, '200', '230', '2', '2', '2', '2', 'no', 0, 0, '2016-02-21 19:50:08', '2016-02-24 17:24:55', 'Yes', 'uploads/product_image/610product-2.jpg', 'uploads/product_image/thumb_927_product-2.jpg', 'BMW', 'Single-seater', '12V', '', '', 0, 0, '', ''),
(5, NULL, 3, 7, 'Product 3', 'product-3', '', '', 'active', '3', 'Product', NULL, '150', '130', '3', '3', '3', '3', 'no', 0, 0, '2016-02-21 19:51:06', '2016-02-24 17:25:20', 'Yes', 'uploads/product_image/294product-3.jpg', 'uploads/product_image/thumb_667_product-3.jpg', 'BMW', 'Single-seater', '24V', '', '', 0, 0, '', ''),
(6, NULL, 3, 8, 'Product 4', 'product-4', '4', '', 'active', '4', 'Product', NULL, '240', '250', '4', '4', '4', '4', 'no', 0, 0, '2016-02-21 19:51:33', '2016-02-24 17:26:10', 'Yes', 'uploads/product_image/839product-4.jpg', 'uploads/product_image/thumb_780_product-4.jpg', 'Henes', '2-seater', '12V', '', '', 0, 0, '', ''),
(7, NULL, 3, 7, 'Product 5', 'product-5', '', '', 'active', NULL, 'Product', NULL, '233', '', NULL, NULL, NULL, '10', 'no', 0, 0, '2016-03-02 17:47:07', '2016-06-13 17:21:51', 'No', 'uploads/product_image/970961Range Rover Style 2.jpg', 'uploads/product_image/thumb_794_961Range Rover Style 2.jpg', 'Mercedes', 'Single-seater', '6V', '', '', 0, 0, '222', '222111'),
(8, NULL, 6, 10, 'Custom Mini Number Platesb', 'custom-mini-number-platesb', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '', 'active', NULL, 'Product', NULL, '25', '', NULL, NULL, NULL, '10', 'no', 0, 0, '2016-04-28 18:30:22', '2016-06-13 17:21:29', 'No', 'uploads/product_image/735platespic3.jpg', 'uploads/product_image/thumb_639_platespic3.jpg', 'Mercedes', '2-seater', '6V', '', '', 0, 0, 'asdasd', '22'),
(9, NULL, 6, 11, 'Gift Card', 'gift-card', '', '', 'active', NULL, 'Product', NULL, '50', '', NULL, NULL, NULL, '10', 'no', 0, 0, '2016-04-28 19:06:40', '2016-04-28 19:06:40', 'No', 'uploads/product_image/767Gift_Card.jpg', 'uploads/product_image/thumb_686_Gift_Card.jpg', 'Mercedes', '2-seater', '12V', '', '', 0, 0, '', ''),
(10, NULL, 4, 0, 'New Product for Pre Order', 'new-product-for-pre-order', 'Short Desc', 'Full Desc', 'active', NULL, 'Product', NULL, '1', '1', NULL, NULL, NULL, '1', 'no', 0, 0, '2016-05-13 05:46:45', '2016-05-13 05:46:45', 'Yes', 'uploads/product_image/225half-way.png', 'uploads/product_image/thumb_304_half-way.png', 'Mercedes', 'Single-seater', '6V', '* features ', '#', 1, 1, '', ''),
(11, NULL, 3, 7, 'MRC Toys', 'mrc-toys', '', '', 'active', NULL, 'Product', NULL, '300', '', NULL, NULL, NULL, '10', 'no', 0, 0, '2016-06-02 18:05:38', '2016-06-02 18:05:38', 'No', 'uploads/product_image/809253Official Mercedes SLR Mclaren.jpg', 'uploads/product_image/thumb_910_253Official Mercedes SLR Mclaren.jpg', 'Mercedes', '2-seater', '', '', '', 0, 0, '', ''),
(12, NULL, 9, 15, 'The New Range Rover -1', 'the-new-range-rover-1', '', 'The car comes with all contrasting with shape to give you the ultimate luxury look for this premium kids car. , multiple gearstick and an mp3 system that features both USB and micro SD compatibility.It is the most featured packed jeep we have ever come across. Full stop.', 'active', NULL, 'Product', NULL, '379', '', NULL, NULL, NULL, '10', 'no', 0, 0, '2016-06-02 18:24:05', '2016-06-02 18:31:39', 'No', 'uploads/product_image/731special-2.png', 'uploads/product_image/thumb_605_special-2.png', 'BMW', '2-seater', '12V', '<span>This is it folks....The One you have all been waiting for! Order the 12V Range Rover Style Special Equipment Big Range Rover Today before they SELL OUT again!<br><br></span>', '', 0, 0, '', ''),
(13, NULL, 9, 15, 'The New Range Rover2', 'the-new-range-rover2', '', 'This is it folks....The One you have all been waiting for! Order the 12V Range Rover Style Special Equipment Big Range Rover Today before they SELL OUT again!', 'active', NULL, 'Product', NULL, '379', '', NULL, NULL, NULL, '10', 'no', 0, 0, '2016-06-02 18:25:19', '2016-06-02 18:37:04', 'No', 'uploads/product_image/941special-3.png', 'uploads/product_image/thumb_361_special-3.png', 'BMW', '2-seater', '12V', 'The car comes with all contrasting with shape to give you the ultimate luxury look for this premium kids car. , multiple gearstick and an mp3 system that features both USB and micro SD compatibility.It is the most featured packed jeep we have ever come across. Full stop', '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_subgroup`
--

CREATE TABLE `product_subgroup` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_group_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sort_order` int(11) NOT NULL DEFAULT '999'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_subgroup`
--

INSERT INTO `product_subgroup` (`id`, `product_group_id`, `title`, `slug`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `sort_order`) VALUES
(6, 3, 'kid''s Electric Bikes', 'kids-electric-bikes', 'active', 0, 0, '2016-02-21 19:48:19', '2016-03-06 18:21:37', 2),
(7, 3, 'Kid''s Electric Car', 'kids-electric-car', 'active', 0, 0, '2016-02-21 19:48:41', '2016-03-06 18:21:29', 1),
(8, 3, 'Kid''s Electric go-carts', 'kids-electric-go-carts', 'active', 0, 0, '2016-02-21 19:49:06', '2016-03-06 18:21:44', 3),
(10, 6, 'Number plates', 'number-plates', 'active', 0, 0, '2016-04-28 18:27:52', '2016-04-28 18:27:52', 0),
(11, 6, 'Gift Card', 'gift-card', 'active', 0, 0, '2016-04-28 19:05:25', '2016-04-28 19:05:25', 0),
(12, 7, 'Kids Electric Bikes', 'kids-electric-bikes', 'active', 0, 0, '2016-05-13 11:51:12', '2016-05-13 11:51:12', 1),
(13, 7, 'Kids Electric Go-Carts', 'kids-electric-go-carts', 'active', 0, 0, '2016-05-13 11:51:33', '2016-05-13 11:51:33', 2),
(14, 7, 'Kids Electric Car', 'kids-electric-car', 'active', 0, 0, '2016-05-13 11:51:55', '2016-05-13 11:51:55', 3),
(15, 9, 'Kids electric car', 'kids-electric-car', 'active', 0, 0, '2016-06-02 18:13:09', '2016-06-02 18:13:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_variation`
--

CREATE TABLE `product_variation` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sell_quqntity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock_balance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sell_rate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost_proce` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_variation`
--

INSERT INTO `product_variation` (`id`, `product_id`, `title`, `slug`, `size`, `color`, `sell_quqntity`, `stock_balance`, `sell_rate`, `cost_proce`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 5, 'Red', 'red', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, 0, '2016-02-27 18:14:25', '2016-02-27 18:15:27'),
(2, 3, 'Red', 'red', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, 0, '2016-02-27 18:16:06', '2016-02-27 18:16:06'),
(3, 5, 'Blue', 'blue', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, 0, '2016-02-27 18:16:26', '2016-02-27 18:16:26'),
(4, 8, 'Black', 'black', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, 0, '2016-04-28 18:50:43', '2016-04-28 18:50:43'),
(5, 8, 'White', 'white', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, 0, '2016-04-28 18:52:18', '2016-04-28 18:52:18'),
(6, 8, 'Deep Pink', 'deep-pink', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, 0, '2016-04-28 18:52:34', '2016-04-28 18:52:34'),
(7, 8, 'Deep Blue', 'deep-blue', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, 0, '2016-04-28 18:52:47', '2016-04-28 18:52:47'),
(8, 8, 'Red', 'red', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, 0, '2016-04-28 18:52:57', '2016-04-28 18:52:57'),
(9, 8, 'Metallic Silver', 'metallic-silver', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, 0, '2016-04-28 18:53:07', '2016-04-28 18:53:07'),
(10, 9, '$50', '50', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, 0, '2016-04-28 19:13:38', '2016-04-28 19:13:38'),
(11, 9, '$50', '50', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, 0, '2016-04-28 19:14:22', '2016-04-28 19:14:22'),
(12, 9, '$100', '100', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, 0, '2016-04-28 19:14:29', '2016-04-28 19:14:29'),
(13, 9, '$150', '150', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, 0, '2016-04-28 19:14:36', '2016-04-28 19:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_color` varchar(255) NOT NULL,
  `last_url` varchar(255) NOT NULL,
  `last_activity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `rating` int(10) UNSIGNED NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider_image`
--

CREATE TABLE `slider_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_slider_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group` enum('','group_1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider_image`
--

INSERT INTO `slider_image` (`id`, `cat_slider_id`, `name`, `slug`, `image`, `thumbnail`, `url`, `group`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 1, 'Slider1', 'slider1', 'uploads/slider_image/56125banner1.jpg', 'uploads/slider_image/thumb_50x50_995_banner1.jpg', '', NULL, 'active', 0, 0, '2016-02-23 18:13:55', '2016-02-23 18:13:55'),
(6, 1, 'Slider2', 'slider2', 'uploads/slider_image/11545banner2.jpg', 'uploads/slider_image/thumb_50x50_594_banner2.jpg', '', NULL, 'active', 0, 0, '2016-02-23 18:14:12', '2016-02-23 18:14:12'),
(7, 1, 'Slider3', 'slider3', 'uploads/slider_image/30775banner3.jpg', 'uploads/slider_image/thumb_50x50_426_banner3.jpg', '', NULL, 'active', 0, 0, '2016-02-23 18:14:30', '2016-02-23 18:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `social_icon`
--

CREATE TABLE `social_icon` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_plus` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responsibility` text COLLATE utf8_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `first_name`, `last_name`, `twitter`, `facebook`, `google_plus`, `linkedin`, `image`, `slug`, `email`, `phone`, `designation`, `responsibility`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Aleesha ', 'Brown', '', '', '', '', 'uploads/team/images/32424alesha.jpg', 'aleesha-brown', 'admin@admin.com', '88', 'MARKETING', '', 'active', 0, 0, '2015-12-31 10:44:15', '2015-12-31 10:44:15'),
(2, 'Mike ', 'Harward', '', '', '', '', 'uploads/team/images/56643mike.jpg', 'mike-harward', 'admin@admin.com', '88', 'ADMINISTRATION', '', 'active', 0, 0, '2015-12-31 10:45:01', '2015-12-31 10:45:01'),
(3, 'Adelia ', 'Lorene', '', '', '', '', 'uploads/team/images/11845adelia.jpg', 'adelia-lorene', 'admin@admin.com', '88', 'DEVELOPMENT', '', 'active', 0, 0, '2015-12-31 10:45:45', '2015-12-31 10:45:45'),
(4, 'Chris ', 'Dand', '', '', '', '', 'uploads/team/images/17425chris.jpg', 'chris-dand', 'admin@admin.com', '88', 'DESIGN', '', 'active', 0, 0, '2015-12-31 10:46:41', '2015-12-31 10:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `project` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `phone_number` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('user','admin') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('','invited','active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `address`, `phone_number`, `state`, `country_id`, `image`, `type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com', '$2y$10$YqJPCkLk81tDaHCVo0lc6e5J9AnR.Xmzkdsdi4uvdZV1M.PTMgHlu', 'Dhaka', '01785987645', 'Dhaka', 19, 'uploads/user_image/41732DSC_5788_copy_small.jpg', 'admin', 'active', '1qXWAsVhufv1D2DWhFuN0YslhZN6FhP1R2eKRm18ErDL2xzo9Nue8HsVhYpa', '2015-12-24 02:55:47', '2016-05-13 05:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_reset_password`
--

CREATE TABLE `user_reset_password` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `reset_password_time` datetime NOT NULL,
  `reset_password_expire` datetime NOT NULL,
  `reset_password_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `widget`
--

CREATE TABLE `widget` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `order` int(10) UNSIGNED NOT NULL,
  `position` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `widget_name` enum('Skill','Team','Article','Social Icon','Blog','Gallery','Slider') COLLATE utf8_unicode_ci DEFAULT NULL,
  `showtitle` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `widget`
--

INSERT INTO `widget` (`id`, `title`, `slug`, `content`, `order`, `position`, `status`, `widget_name`, `showtitle`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Footer one', 'footer-one', '<div> <i class="icon-map-marker" style="font-size:25px; "></i>\r\n                    <h4 class="section-title box">  Location</h4>\r\n                </div>\r\n                <div>\r\n                    <img src="etsb/web_assets/slider_assets/img/location_footer.jpg" style="height: 220px; width: 400px;" alt="bzm graphics location map" title="bzm graphics location map">\r\n                </div>\r\n', 1, 'footer_one', 'active', 'Article', 'no', 0, 0, '2015-12-23 17:30:34', '2015-12-23 17:54:02'),
(2, 'Footer Two', 'footer-two', '<h5 class="section-title box"> Connect with  </h5>\r\n                <p>BZM Graphics </p>\r\n                <div class="social-icons">\r\n                    <a href="https://twitter.com/BZMGraphics" class="social-icon" target="_blank"><i class="fa fa-twitter has-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"></i></a>\r\n                    <a href="https://www.facebook.com/pages/bZm-Graphics/157687504299957" class="social-icon" target="_blank"><i class="fa fa-facebook has-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"></i></a>\r\n                    <a href="https://plus.google.com/u/0/b/102881161542509581883/+Bzmgraphics_bd/posts" class="social-icon" target="_blank"><i class="fa fa-google-plus has-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="GooglePlus"></i></a>\r\n<a href="https://www.linkedin.com/company/bzm-graphics?trk=company_logo" class="social-icon" target="_blank"><i class="fa fa-linkedin has-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="LinkedIn"></i></a>\r\n<a href="skype:bzmgraphics?call" class="social-icon" target="_blank"><i class="fa fa-skype has-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype"></i></a>\r\n<a href="https://www.pinterest.com/bzmgraphics/pins/" class="social-icon" target="_blank"><i class="fa fa-pinterest has-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="pinterest"></i></a>\r\n                </div>', 2, 'footer_two', 'active', 'Article', 'yes', 0, 0, '2015-12-23 17:50:56', '2015-12-23 18:10:44'),
(3, 'Footer Three', 'footer-three', '<h5 class="section-title box">Useful Links</h5>               \r\n<ul class="arrow useful-links">\r\n                    <li><a href="photoshop-clipping-path">Photoshop Clipping Path</a></li>\r\n                    <li><a href="image-masking">Image Masking</a></li>\r\n<li><a href="color-separation-correction">Color separation / Correction</a></li>\r\n <li><a href="photo-retouching">Photo Retouching</a></li>\r\n <li><a href="image-manipulation">Image Manipulation</a></li>\r\n<li><a href="shadow-and-reflection-creation">Shadow and Reflection Creation</a></li>\r\n<li><a href="e-commerce-image-optimization">E-commerce Image optimization</a></li>\r\n</ul>''', 3, 'footer_three', 'active', 'Article', 'yes', 0, 0, '2015-12-23 17:52:55', '2015-12-30 08:24:03'),
(4, 'Footer Four', 'footer-four', '<h4 class="section-title box">Write to us</h4><form role="form" action="ajax-send-message" method="post" class="form-wrapper" enctype="multipart/form-data" id="footer-write-to-us">\r\n<input class="form-control" type="text" required placeholder="your name (required)" name="footer-name" id="footer-id-name">  \r\n<input class="form-control" type="email" required placeholder="your email (required)" name="footer-email" id="footer-id-email">\r\n<input class="form-control" type="text" required placeholder="your phone (required)" name="footer-phone" id="footer-id-phone"> \r\n<textarea class="form-control" required placeholder="your message" name="footer-message" rows="2" id="footer-id-message" ></textarea>   \r\n<button type="submit" class="btn btn-md style1 contact-submit-button">Submit</button>\r\n<div style="display: none" id="footer-loader-gif">\r\n    <img src="etsb/img/loader/loading_spinner.gif" width="20px" /> sending ... </div>\r\n </form> \r\n<div style="display: none" id="footer-success-messagessss" >\r\n   <b style="color: darkgreen">Thanks for submitting your query. We will get back to you soon!</b>\r\n</div>', 4, 'footer_four', 'active', 'Article', 'yes', 0, 0, '2015-12-23 17:53:31', '2015-12-30 11:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `widget_menu`
--

CREATE TABLE `widget_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `widget_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `widget_menu`
--

INSERT INTO `widget_menu` (`id`, `widget_id`, `menu_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 0, 0, '2015-12-23 17:54:02', '2015-12-23 17:54:02'),
(4, 1, 2, 0, 0, '2015-12-23 17:54:02', '2015-12-23 17:54:02'),
(5, 3, 1, 0, 0, '2015-12-23 17:59:16', '2015-12-23 17:59:16'),
(6, 3, 2, 0, 0, '2015-12-23 17:59:16', '2015-12-23 17:59:16'),
(9, 2, 1, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(10, 2, 2, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(11, 2, 3, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(12, 2, 7, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(13, 2, 8, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(14, 2, 9, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(15, 2, 10, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(16, 2, 11, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(17, 2, 12, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(18, 2, 13, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(19, 2, 4, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(20, 2, 5, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(21, 2, 6, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(22, 2, 14, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(23, 2, 15, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(24, 2, 16, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(25, 2, 17, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(26, 2, 18, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(27, 2, 19, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(28, 2, 20, 0, 0, '2015-12-29 12:47:22', '2015-12-29 12:47:22'),
(135, 4, 1, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(136, 4, 2, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(137, 4, 3, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(138, 4, 7, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(139, 4, 8, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(140, 4, 9, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(141, 4, 10, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(142, 4, 11, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(143, 4, 12, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(144, 4, 13, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(145, 4, 4, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(146, 4, 5, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(147, 4, 6, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(148, 4, 14, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(149, 4, 15, 0, 0, '2015-12-30 12:00:39', '2015-12-30 12:00:39'),
(150, 4, 16, 0, 0, '2015-12-30 12:00:40', '2015-12-30 12:00:40'),
(151, 4, 17, 0, 0, '2015-12-30 12:00:40', '2015-12-30 12:00:40'),
(152, 4, 18, 0, 0, '2015-12-30 12:00:40', '2015-12-30 12:00:40'),
(153, 4, 19, 0, 0, '2015-12-30 12:00:40', '2015-12-30 12:00:40'),
(154, 4, 20, 0, 0, '2015-12-30 12:00:40', '2015-12-30 12:00:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `article_slug_unique` (`slug`);

--
-- Indexes for table `blog_cat`
--
ALTER TABLE `blog_cat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_cat_slug_unique` (`slug`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comment_blog_item_id_foreign` (`blog_item_id`);

--
-- Indexes for table `blog_item`
--
ALTER TABLE `blog_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_item_slug_unique` (`slug`),
  ADD KEY `blog_item_blog_cat_id_foreign` (`blog_cat_id`);

--
-- Indexes for table `cat_slider`
--
ALTER TABLE `cat_slider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_slider_slug_unique` (`slug`);

--
-- Indexes for table `central_settings`
--
ALTER TABLE `central_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_code_unique` (`code`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD UNIQUE KEY `customer_id_unique` (`id`),
  ADD UNIQUE KEY `customer_email_unique` (`email`);

--
-- Indexes for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD UNIQUE KEY `customer_id_unique` (`id`);

--
-- Indexes for table `gal_image`
--
ALTER TABLE `gal_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_title_unique` (`title`),
  ADD UNIQUE KEY `groups_slug_unique` (`slug`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_name_id_unique` (`name`,`id`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_type_slug_unique` (`slug`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_head`
--
ALTER TABLE `order_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_invoice_setup`
--
ALTER TABLE `order_invoice_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_payment_transaction`
--
ALTER TABLE `order_payment_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_hd_id_idx` (`order_head_id`),
  ADD KEY `customer_id_idx` (`customer_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_title_unique` (`title`),
  ADD UNIQUE KEY `product_slug_unique` (`slug`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_images_title_unique` (`title`),
  ADD UNIQUE KEY `product_images_slug_unique` (`slug`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_subgroup`
--
ALTER TABLE `product_subgroup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_subgroup_product_group_id_foreign` (`product_group_id`);

--
-- Indexes for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variation_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skills_slug_unique` (`slug`);

--
-- Indexes for table `slider_image`
--
ALTER TABLE `slider_image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slider_image_slug_unique` (`slug`),
  ADD KEY `slider_image_cat_slider_id_foreign` (`cat_slider_id`);

--
-- Indexes for table `social_icon`
--
ALTER TABLE `social_icon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_icon_slug_unique` (`slug`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_slug_unique` (`slug`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testimonial_slug_unique` (`slug`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_reset_password`
--
ALTER TABLE `user_reset_password`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_reset_password_user_id_foreign` (`user_id`);

--
-- Indexes for table `widget`
--
ALTER TABLE `widget`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `widget_slug_unique` (`slug`);

--
-- Indexes for table `widget_menu`
--
ALTER TABLE `widget_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `blog_cat`
--
ALTER TABLE `blog_cat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_item`
--
ALTER TABLE `blog_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cat_slider`
--
ALTER TABLE `cat_slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `central_settings`
--
ALTER TABLE `central_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `delivery_details`
--
ALTER TABLE `delivery_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `gal_image`
--
ALTER TABLE `gal_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_head`
--
ALTER TABLE `order_head`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `order_invoice_setup`
--
ALTER TABLE `order_invoice_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_payment_transaction`
--
ALTER TABLE `order_payment_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_subgroup`
--
ALTER TABLE `product_subgroup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product_variation`
--
ALTER TABLE `product_variation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slider_image`
--
ALTER TABLE `slider_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `social_icon`
--
ALTER TABLE `social_icon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_reset_password`
--
ALTER TABLE `user_reset_password`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `widget`
--
ALTER TABLE `widget`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `widget_menu`
--
ALTER TABLE `widget_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD CONSTRAINT `blog_comment_blog_item_id_foreign` FOREIGN KEY (`blog_item_id`) REFERENCES `blog_item` (`id`);

--
-- Constraints for table `blog_item`
--
ALTER TABLE `blog_item`
  ADD CONSTRAINT `blog_item_blog_cat_id_foreign` FOREIGN KEY (`blog_cat_id`) REFERENCES `blog_cat` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product_subgroup`
--
ALTER TABLE `product_subgroup`
  ADD CONSTRAINT `product_subgroup_product_group_id_foreign` FOREIGN KEY (`product_group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD CONSTRAINT `product_variation_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `slider_image`
--
ALTER TABLE `slider_image`
  ADD CONSTRAINT `slider_image_cat_slider_id_foreign` FOREIGN KEY (`cat_slider_id`) REFERENCES `cat_slider` (`id`);

--
-- Constraints for table `user_reset_password`
--
ALTER TABLE `user_reset_password`
  ADD CONSTRAINT `user_reset_password_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
