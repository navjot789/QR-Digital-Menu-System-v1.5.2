
-- Table structure for table `admin_login`
DROP TABLE IF EXISTS `<DB_PREFIX>admin_login`;
CREATE TABLE IF NOT EXISTS `<DB_PREFIX>admin_login` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `account_type` varchar(30) NOT NULL, 
  `encrypt_type` varchar(5) NOT NULL, 
  `mins` int(5) NOT NULL DEFAULT '0',
  `secs` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=216 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--
INSERT INTO `<DB_PREFIX>admin_login` (`aid`, `username`, `password`,`account_type`,`encrypt_type`) VALUES
(215, '<USER_NAME>',<PASSWORD>, 'admin','<ENCRYPTION_TYPE>');



-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `<DB_PREFIX>category`;
CREATE TABLE IF NOT EXISTS `<DB_PREFIX>category` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(30) NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `<DB_PREFIX>category` (`categoryid`, `catname`) VALUES
(28,'Starter');


-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

DROP TABLE IF EXISTS `<DB_PREFIX>guest`;
CREATE TABLE IF NOT EXISTS `<DB_PREFIX>guest` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `guest_code` varchar(30) DEFAULT NULL,
  `reserve_for` int(11) DEFAULT NULL,
  `table_no` int(11) DEFAULT NULL,
  `cdate` varchar(30) DEFAULT NULL,
  `ctime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `<DB_PREFIX>product`;
CREATE TABLE IF NOT EXISTS `<DB_PREFIX>product` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(1) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `description` longtext,
  `price` double NOT NULL,
  `old_price` double DEFAULT NULL,
  `photo` varchar(150) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=latin1;


--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `productname`, `description`, `price`, `old_price`, `photo`) VALUES
(175, 28, 'Classic mojito', 'This is an authentic recipe for mojito. I sized the recipe for one serving, but you can adjust it accordingly and make a pitcher full. It\'s a very refreshing drink for hot summer days. Be careful when drinking it, however. If you make a pitcher you might be tempted to drink the whole thing yourself, and you just might find yourself talking Spanish in no time! Tonic water can be substituted instead of the soda water but the taste is different and somewhat bitter.', 4, NULL, 'mojito-recipe-1-1_1596633089_1597569798.jpg');
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `<DB_PREFIX>purchase`;
CREATE TABLE IF NOT EXISTS `<DB_PREFIX>purchase` (
  `purchaseid` int(11) NOT NULL AUTO_INCREMENT,
  `guest_code` varchar(30) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `seen` int(11) DEFAULT '0' COMMENT '0:unseen,1:seen',
  `date_purchase` varchar(30) DEFAULT NULL,
  `time_purchase` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`purchaseid`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
COMMIT;


-- --------------------------------------------------------

--
-- Table structure for table `reset_counter`
--

DROP TABLE IF EXISTS `reset_counter`;
CREATE TABLE IF NOT EXISTS `reset_counter` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '0',
  `ctime` varchar(30) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reset_counter`
--

INSERT INTO `reset_counter` (`rid`, `status`, `ctime`) VALUES
(5, 1, '15-08-2020 17:05:27');
COMMIT;
