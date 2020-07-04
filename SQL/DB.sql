-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2020 at 03:14 PM
-- Server version: 5.7.30
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `aid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`aid`, `username`, `password`) VALUES
(215, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(10, 'Voorgerechten'),
(11, 'Hoofdgerechten'),
(15, 'Nagerechten'),
(16, 'Frisdranken'),
(17, 'Sterke drank'),
(18, 'Wijn'),
(19, 'Koffie - Thee'),
(20, 'Bier'),
(21, 'Smoothies'),
(22, 'Cocktails'),
(27, 'extras'),
(28, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `gid` int(11) NOT NULL,
  `guest_code` varchar(30) DEFAULT NULL,
  `reserve_for` int(11) DEFAULT NULL,
  `table_no` int(11) DEFAULT NULL,
  `cdate` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(1) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `description` longtext,
  `price` double NOT NULL,
  `old_price` double DEFAULT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `productname`, `description`, `price`, `old_price`, `photo`) VALUES
(26, 10, 'Birsen-linzensoep (vega)', 'Eritrese linzensoep met Berbere kruidenmix, licht pikant', 4.5, 0, 'linzen_soep__1_1590071381.jpg'),
(27, 10, 'Doeba-pompoen soep (vega)', 'Pompoen soep, licht pikant', 5.5, 0, 'pomoen_soep__2_1590071486.jpg'),
(29, 10, 'Salade West Afrika (vega)', 'Romeinse sla, geitenkaas, tomaat en komkommer gemarineerd in mosterdsaus', 6.7, 6.7, 'west_afrikaanse_sla__1590071681.jpg'),
(31, 10, 'Shiro voorgerecht', 'Een Noord Oost Afrikaanse licht pikante dipsaus van gemalen kikkererwten op Eritrese wijze gekruid en met ui, tomaat en zonnebloemolie. geserveerd met brood voor 2 personen', 10.5, 0, 'shiro_1590075292.jpg'),
(32, 10, 'Gambas voorgerecht', 'Gemarineerd in peper, citroen en knoflook, geserveerd met paprikasaus en een salade.', 12.7, 0, 'gambas_vooraf__1590075125.jpg'),
(33, 10, 'Bamba sate mild', 'Sate van krokodil in  tomaten/kerriesaus geserveerd met salade', 15, 0, 'bamba_sate_krokodil_0_1590074294.jpg'),
(34, 10, 'Bamba sate pikant', 'Sate van krokodil in  tomaten/kerriesaus geserveerd met salade', 15, 15, 'bamba_sate_krokodil_0_1590074328.jpg'),
(35, 11, 'Nay Tozm optie 1 (vega)', 'Vegetarische hoofdgerecht: Toemtoemo (linzen),  Alicha (groentenmix), Hamli (spinazie).', 11.5, 0, ''),
(37, 11, 'Nay Tozm optie 2 (vega)', ' Vegetarische hoofdgerecht: Doemba (pompoen), Bamya (okra, Alicha (diverse groenten)', 11.5, 0, 'nay_tozm_1590090386.jpg'),
(38, 11, 'Vegetarisch voor 2 personen', 'mix van al onze vegetarische lekkernijen.', 35, 0, 'vegetarisch_heweswas__1590090294.jpg'),
(40, 11, 'Shiro hoofdgerecht (vega)', 'Vegetarische hoofdgerecht: Licht pikante saus van gemalen kikkererwten op Eritrese wijze gekruid en bereid met ui, tomaat en zonnebloemolie. ', 13, 0, 'shiro_0_1590090223.jpg'),
(41, 11, 'Menchet Abesch', 'Oost Afrikaanse hoofdgerecht: Mager rundergehakt, gebakken met ui in kerriesaus, geserveerd met spinazie, linzen, fetakaas, diverse groeten en Enjera (pannenkoek-achtig brood).', 13.9, 0, 'menchetabesch__1590087031.jpg'),
(42, 11, 'Kelwa', 'Oost Afrikaanse hoofdgerecht: Stukjes lamsvlees, gebakken in geklaarde kruidenboter, geserveerd met spinazie, linzen en diverse groenten.', 13.9, 0, 'DSC06362.jpeg kelwa_1593093913.jpeg'),
(43, 11, 'Soqhar', 'Oost Afrikaanse hoofdgerecht: Stukjes lamsvlees, gebakken in geklaarde kruideboter, paprika en uien, geserveerd met spinazie, linzen en diverse groenten.', 13.9, 0, 'kelwa_lam_zonder_paprika_1590668725.png'),
(44, 11, 'Assa/Kelwa', 'Oost Afrikaanse hoofdgerecht: Graat vrije Panga (witvis), gebakken met ui, geserveerd met spinazie, linzen en diverse groenten.', 13.9, 0, 'assakelwa_0_1590087537.jpg'),
(45, 11, 'Alicha Dorho', 'Oost Afrikaanse hoofdgerecht: Kippendijen met mix van witte kool, peen, aardappel, sperziebonen, paprika en geserveerd  met Enjera (pannenkoek-achtig brood).', 13.9, 0, 'alicha_derho_met_rijst_0_1590087610.jpg'),
(46, 11, 'Tsebhi Dorho', 'Oost Afrikaanse hoofdgerecht: Kip drumsticks in een saus van tomaat en ui, geserveerd met spinazie, linzen, diverse groenten.', 13.9, 0, 'tsebhi_dorho_0_1590087707.jpg'),
(47, 11, 'Zegni', 'Oost Afrikaanse hoofdgerecht: Pikant Rundvleesgerecht in saus van tomaat en ui, geserveerd met spinazie, linzen, diverse groenten en Enjera (pannenkoek-achtig brood).', 13.9, 0, 'zegni_0_1590087771.jpg'),
(48, 11, 'Kitfo ', 'Oost Afrikaanse hoofdgerecht: Rundergehakt welke heel even gebakken is met geklaarde kruidenboter, geserveerd met spinazie, linzen, feta kaas, diverse groenten en Enjera (pannenkoek-achtig brood)', 14.5, 0, 'kitfo_01_0_1590075453.jpg'),
(49, 11, 'Gored Gored', 'Oost Afrikaanse hoofdgerecht: Blokjes mager rundvlees gebakken in geklaarde kruidenboter en geflambeerd met whiskey, geserveerd met spinazie, linzen en diverse groeten.', 15, 0, 'gord_gord_1590086972.jpg'),
(50, 11, 'Mafe', 'West Afrikaanse hoofdgerecht: Rundvleesgerecht met winterpeen, witte kool en cassave in pindasaus geserveerd met rijst.', 15.7, 0, 'mafe__1590088096.jpg'),
(51, 11, 'Struisvogel', 'West Afrikaanse hoofdgerecht: Malse struisvogel, gebakken in olie en geserveerd met kerriesaus, rijst en diverse groenten.', 19.5, 0, 'struisvogel_1_1590077456.jpg'),
(52, 11, 'Oost Afrika speciaal', 'Oost Afrikaanse hoofdgerecht: Oost Afrika Special - Uitgebreide schotel van diverse traditionele gerecht voor 1 persoon met Assa-Kelwa (vis), Kelwa (lam), Tsebhi Dorho (kip), Hamli (spinazie), Toemtoemo (linzen), Alicha (diverse groenten). Geserveerd met Enjera (pannenkoek-achtig brood). ', 20, 0, 'oost_afrika_speciaal__1590082183.jpg'),
(53, 11, 'Firir', 'West Afrikaanse hoofdgerecht: Dorade, geserveerd met paprikasaus en gebakken banaan, salade in mosterdsaus.', 20, 0, 'firir_1590088048.jpg'),
(54, 11, 'Gambas', 'West Afrikaanse hoofdgerecht: Gemarineerd in peper, citroen en knoflook, geserveerd met paprikasaus, salade en rijst.', 23, 0, 'gambas__1590087932.jpg'),
(55, 11, 'Bamba pikant', 'West Afrikaanse hoofdgerecht: Bamba - Krokodil. Pikant. Gekruid op Zuid-Afrikaanse wijze met kerrie/tomatensaus, geserveerd met rijst en diverse groenten.', 25, 0, 'bamba_krokodil_1590081693.jpg'),
(56, 11, 'Bamba mild', 'West Afrikaanse hoofdgerecht: Bamba - Krokodil. Mild. Gekruid op Zuid-Afrikaanse wijze met kerrie/tomatensaus, geserveerd met rijst en diverse groenten.', 25, 0, 'bamba_krokodil_1590087901.jpg'),
(57, 11, '3 gangen optie 1', '3 gangen menu Oost Afrika: Voorgerecht: Ful (romige dipsaus van gestampte kapucijners met blokjes tomaat, fetakaas en berbere (chili-poeder), geserveerd met brood of Senegalese salade (romeinse sla , tomaat, komkommer en ui in mosterdsaus).\r\nHoofdgerecht: Zigni (pikant rundvleesgerecht in een saus van tomaat en ui), Tsebhi Dorho (pikant kip drumsticks in een saus van tomaat en ui), Kelwa (mild gebakken stukjes lamsvlees in geklaarde kruidenboter en uien), Assa/Kelwa (mild gebakken stukjes wit Vis).\r\nNagerecht: Tjakrie (yoghurt, slagroom, Couscous en vers fruit gegarneerd met aardbeien) en Salade van diverse vers fruit.', 24, 0, ''),
(58, 11, '3 gangen optie 2', '3 gangen menu Oost Afrika: Voorgerecht: Ful (romige dipsaus van gestampte kapucijners met blokjes tomaat, fetakaas en berbere) geserveerd met brood, Senegalese salade (romeinse sla, tomaat, komkommer en ui in mosterdsaus), shiro (lichtpikante dipsaus van gemalen kikkererwten) geserveerd met brood.\r\nHoofdgerecht: Assa/Kelwa (mild gebakken graatvrije Panga witvis met ui), Tsebhi Dorho (pikant kip drumsticks in een saus van tomaat en ui), Kelwa (mild gebakken stukjes lamsvlees in geklaarde kruidenboter en uien), Hamli (spinazie) met Toemtoemo (linzen) en Alicha (groentenmix).\r\nNagerecht: Tjakrie (yoghurt, slagroom, Couscous en vers fruit gegarneerd met aardbeien) en Salade van diverse vers fruit.', 29, 0, ''),
(59, 11, '3 gangen optie 3', '3 gangen menu Oost Afrika: Voorgerecht: Ful (romige dipsaus van gestampte kapucijners met blokjes tomaat, fetakaas en berbere (chili-poeder), geserveerd met brood, Senegalese salade Hoofdgerecht: Zigni (pikant rundvleesgerecht in een saus van tomaat en ui), Tsebhi Dorho (pikant kip druksticks in een saus van tomaat en ui), Assa-Kelwa (mild gebakken graatvrije panga (witvis) met ui), Soqhar (mild gebakken lamsvlees ), Gored Gored (pikant rundvleesgerecht), Alicha (diverse groenten), Doeba (pompoen), Toemtoemo (linzen), Hamli (spinazie) en Salade.\r\nNagerecht: Tjakrie (yoghurt, slagroom, Couscous en vers fruit gegarneerd met aardbeien) en salade van diverse vers fruit.', 32, 0, ''),
(60, 11, 'Heweswas ', 'Oost Afrikaanse hoofdgerecht: De Smaak van Afrika Heweswas - Feestelijke maaltijd voor 2 personen. Uitgebreide schotel van diverse tradionele gerechten zoals:  Zigni (rund),  Tsebhi Dorho (kip),  Assa-Kelwa (vis), Soqhar (lam), Gored Gored (rund), Hamli (spinazie), Toentoemo (linzen), Doeba (pompoen), Alicha (diverse groenten) en salade. Geserveerd met Enjera (pannenkoek-achtig brood).', 45.5, 0, 'Heweswas Feestelijke maaltijd voor 2 personen_1590668939.jpg'),
(61, 19, 'Koffie', 'Koffie', 2.6, 2.6, ''),
(62, 19, 'Espresso', 'Espresso', 2.6, 2.6, ''),
(63, 19, 'Dubbele espresso', 'Dubbele espresso', 4.1, 4.1, ''),
(64, 19, 'Cappuccino', 'Cappuccino', 2.6, 2.6, ''),
(65, 19, 'Koffie verkeerd', 'Koffie verkeerd', 2.6, 2.6, ''),
(66, 19, 'Thee', 'Diverse smaken thee.', 2.1, 2.1, ''),
(67, 19, 'Zanzibar thee', 'Zanzibar thee', 2.6, 2.6, ''),
(68, 19, 'Zuid Afrikaanse rooibos thee', 'Zuid Afrikaanse rooibos thee', 2.5, 2.5, ''),
(69, 19, 'Noord Afrikaanse munt thee', 'Noord Afrikaanse munt thee', 2.5, 2.5, ''),
(70, 19, 'Oost Afrikaanse thee', 'Oost Afrikaanse thee. Kruidnagel en Kardemom.', 2.7, 2.7, ''),
(72, 16, 'Spa Rood', 'Spa rood', 1.8, 1.8, ''),
(73, 16, 'Tonic', 'Tonic', 2.2, 2.2, ''),
(74, 16, 'Spa blauw', 'Spa blauw', 1.8, 1.8, ''),
(75, 16, 'Cola', 'Cola', 2.2, 2.2, ''),
(76, 16, 'Cola Zero', 'Cola Zero', 2.2, 0, ''),
(77, 16, '7 Up', '7 Up', 2.2, 0, ''),
(78, 16, 'Jus', 'Jus', 2.2, 2.2, ''),
(79, 16, 'Bitter Lemon', 'Bitter Lemon', 2.2, 2.2, ''),
(80, 16, 'Cassis', 'Cassis', 2.2, 2.2, ''),
(81, 16, 'Ice Tea', 'Ice Tea', 2.3, 2.3, ''),
(82, 16, 'Appelsap', 'Appelsap', 2.3, 2.3, ''),
(84, 16, 'Mango sap', 'Mango sap', 2.6, 2.6, ''),
(85, 16, 'Guave sap', 'Guave sap', 2.6, 2.6, ''),
(86, 16, 'Tomaten sap', 'Tomaten sap', 2.6, 2.6, ''),
(87, 16, 'Gemberbier', 'Ambachtelijk bereid - pittige alcoholvrije drank van o.a. gember, suiker, piment, kruidnagel en citroenzuur.', 3.4, 3.4, ''),
(89, 20, 'Vaasje', 'tapbier', 2.8, 0, '550x733_1592584749.jpg'),
(90, 20, 'Palm', 'Palm speciaal', 3.5, 3.5, ''),
(91, 20, 'Afrikaans bier Mango', 'Afrikaans bier Mango', 4.5, 4.5, ''),
(92, 20, 'Afrikaans bier Banana', 'Afrikaans bier Banana', 4.5, 4.5, ''),
(93, 20, 'Afrikaans bier Coconut', 'Afrikaans bier Coconut', 4.5, 4.5, ''),
(94, 20, 'Afrikaans bier Buckwheat', 'Witbier', 4.5, 4.5, ''),
(95, 20, 'Bedele', 'Ethiopisch bier', 4, 4, ''),
(96, 20, 'Masuwa', 'Ambachtelijk bier uit Eritrea', 4, 4, ''),
(97, 18, 'Lindenhof wit fles', 'Droog, fris en fruitig', 16.9, 16.9, ''),
(98, 18, 'Lindenhof wit karaf', 'Droog, fris en fruitig', 11.5, 11.5, ''),
(99, 18, 'Lindenhof wit glas', 'Droog, fris en fruitig', 3.5, 3.5, ''),
(100, 18, 'Lindenhof rood fles', 'Zacht, rond, vol, fruitig', 17.9, 17.9, ''),
(101, 18, 'Lindenhof rood karaf', 'Zacht, rond, vol, fruitig', 12.5, 12.5, ''),
(102, 18, 'Lindenhof rood glas', 'Zacht, rond, vol, fruitig', 3.5, 3.5, ''),
(103, 18, 'Zoete witte wijn fles', 'Fruitig boeket van muskaat en honing', 17.9, 17.9, ''),
(104, 18, 'Zoete witte wijn karaf', 'Fruitig boeket van muskaat en honing', 12.8, 12.8, ''),
(105, 18, 'Zoete witte wijn glas', 'Fruitig boeket van muskaat en honing', 3.6, 3.6, ''),
(106, 18, 'Lindenhof rosÃ© fles', 'Lichte aroma van rood fruit, sappige en milde smaak.', 17.9, 17.9, ''),
(107, 18, 'Lindenhof rosÃ© karaf', 'Lichte aroma van rood fruit, sappige en milde smaak.', 12.8, 12.8, ''),
(108, 18, 'Lindenhof rosÃ© glas', 'Lichte aroma van rood fruit, sappige en milde smaak.', 3.6, 3.6, ''),
(109, 21, 'Organic Tropical', 'Strawberry Banana', 4.5, 0, 'IMG_1261_1592852532.jpg'),
(110, 21, 'Organic Sunshine', 'Pineapple Mango', 4.5, 4.5, ''),
(111, 21, 'Organic Fantasy', 'Raspberry Mango', 4.5, 4.5, ''),
(112, 21, 'Organic Palm beach', 'Mango Banana', 4.5, 4.5, ''),
(113, 22, 'Cocktail Kilimanjaro', 'Amarula, peppermint, liquer, ice cream', 8, 0, 'IMG_2005_1592852033.jpg'),
(114, 11, 'koffie', 'sdd', 0.5, 0, 'punch 21_06  (1)_1592763904.heic'),
(116, 22, 'Pinacolada', 'Pineapple +  coconut + Rum', 8, 0, 'IMG_1553_1592851446.jpg'),
(117, 22, 'Springbokkie shot', 'Amarula + peppermint', 4.5, 0, 'IMG_2824_1592854326.jpg'),
(118, 15, 'Tjakrie', 'Yoghurt, geklopte room, couscous en vers fruit gegarneerd met grenadine', 5.5, 5.5, ''),
(119, 15, 'IJS met opgeklopte room', '3 bollen ijs van diverse smaken', 6.5, 6.5, ''),
(120, 15, 'Yoghurt met vijgen', 'Yoghurt met vijgen', 6.7, 6.7, ''),
(121, 15, 'IJS met vijgen', 'IJS met vijgen', 6.7, 6.7, ''),
(122, 15, 'IJS met vers fruit', 'IJS met vers fruit en opgeklopte slagroom', 7.7, 7.7, ''),
(123, 15, 'Vers fruit salade', 'Vers fruit salade', 6.7, 6.7, ''),
(124, 15, 'Gebakken banaan', 'Gebakken banaan met opgeklopte slagroom', 6.7, 6.7, ''),
(125, 15, 'Gebakken banaan met IJS', 'Gebakken banaan met IJS en een beetje slagroom', 8.5, 8.5, ''),
(126, 19, 'Irish coffee', 'Irish coffee', 6, 6, ''),
(127, 19, 'Latte macchiato', 'Latte macchiato', 3.25, 3.25, ''),
(128, 19, 'Kahlua coffee', 'Kahlua coffee', 6, 6, ''),
(129, 19, 'Grand manier coffee', 'Grand manier coffee', 6, 6, ''),
(130, 19, 'Amarula coffee', 'Amarula coffee', 6, 6, ''),
(131, 19, 'Cointreau coffee', 'Cointreau coffee', 6, 6, ''),
(132, 19, 'Benedictine coffee', 'Benedictine coffee', 6, 6, ''),
(133, 19, 'Drambuie coffee', 'Drambuie coffee', 6, 6, ''),
(134, 21, 'Smoothie Africa', 'Verschillende soorten fruit', 5.5, 5.5, ''),
(136, 17, 'Johnny Walker Red', 'Johnny Walker Red', 4.5, 4.5, ''),
(137, 17, 'Famous Grouse', 'Famous Grouse', 4.5, 4.5, ''),
(138, 17, 'Johnny Walker Black', 'Johnny Walker Black', 5.5, 5.5, ''),
(139, 17, 'Chivas Regal', 'Chivas Regal', 5.5, 5.5, ''),
(140, 17, 'Dimple', 'Dimple', 5.5, 5.5, ''),
(141, 17, 'Jack Daniels', 'Jack Daniels', 5.5, 5.5, ''),
(142, 17, 'Calvados', 'Calvados', 5, 5, ''),
(143, 17, 'Hennessy', 'Hennessy', 5, 5, ''),
(144, 17, 'Courvoisier', 'Courvoisier', 5, 5, ''),
(145, 17, 'Martell', 'Martell', 5.5, 5.5, ''),
(146, 17, 'Remy Martin v.s.o.p.', 'Remy Martin v.s.o.p.', 6, 6, ''),
(154, 20, 'Walia', 'Pale Lager uit EthiopiÃ«', 4, 0, 'walia bier_1591784712.png'),
(155, 16, 'Spa Reine 75cl', '3/4 liter Spa mineraal water zonder bubbels', 4.5, 0, 'spa_1591785134.png'),
(156, 16, 'Spa Intense 75cl', '3/4 liter Spa mineraal water met bubbels', 4.5, 0, 'spa_1591785184.png'),
(159, 27, 'extra enajare', 'extra brood', 0.5, 0, ''),
(168, 22, 'Baileys cocktail', 'Baileys + divers fruit ', 8, 0, 'IMG_1333_1592853718.jpg'),
(173, 22, 'Kaap Verde punch', 'Grog + ', 5, 0, 'IMG_1539_1592850773.jpg'),
(174, 18, 'Honing wijn ', 'Honing wijn ', 4.5, 0, 'honing wijn_1593349296.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `guest_code` varchar(30) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `seen` int(11) DEFAULT '0' COMMENT '0:unseen,1:seen',
  `date_purchase` varchar(30) DEFAULT NULL,
  `time_purchase` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
