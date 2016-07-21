/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50091
Source Host           : localhost:3306
Source Database       : shopping

Target Server Type    : MYSQL
Target Server Version : 50091
File Encoding         : 65001

Date: 2013-10-27 21:46:20
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL default '0',
  `username` varchar(11) default NULL,
  `password` varchar(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO admin VALUES ('1', 'admin', 'admin');

-- ----------------------------
-- Table structure for `orderdetail`
-- ----------------------------
DROP TABLE IF EXISTS `orderdetail`;
CREATE TABLE `orderdetail` (
  `orderdetailid` int(10) NOT NULL auto_increment,
  `orderid` int(10) default NULL,
  `goodsid` int(10) default NULL,
  `amount` int(10) default NULL,
  PRIMARY KEY  (`orderdetailid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of orderdetail
-- ----------------------------
INSERT INTO orderdetail VALUES ('1', '1', '25', '2');
INSERT INTO orderdetail VALUES ('2', '2', '25', '2');
INSERT INTO orderdetail VALUES ('3', '2', '22', '1');
INSERT INTO orderdetail VALUES ('4', '3', '25', '2');
INSERT INTO orderdetail VALUES ('5', '3', '22', '2');
INSERT INTO orderdetail VALUES ('6', '4', '22', '1');
INSERT INTO orderdetail VALUES ('7', '5', '22', '1');
INSERT INTO orderdetail VALUES ('8', '6', '22', '2');
INSERT INTO orderdetail VALUES ('9', '7', '22', '2');
INSERT INTO orderdetail VALUES ('10', '7', '23', '1');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `orderid` int(10) NOT NULL auto_increment,
  `username` varchar(50) default NULL,
  `flag` tinyint(1) NOT NULL default '0',
  `time` datetime default NULL,
  PRIMARY KEY  (`orderid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO orders VALUES ('1', 'admin', '0', '2013-10-20 21:42:18');
INSERT INTO orders VALUES ('2', 'admin', '1', '2013-10-20 22:06:05');
INSERT INTO orders VALUES ('3', 'aa', '1', '2013-10-20 22:06:51');
INSERT INTO orders VALUES ('4', 'aa', '0', '2013-10-20 23:50:14');
INSERT INTO orders VALUES ('5', 'aa', '0', '2013-10-20 23:51:06');
INSERT INTO orders VALUES ('6', 'aa', '1', '2013-10-20 23:52:42');
INSERT INTO orders VALUES ('7', 'aa', '0', '2013-10-20 23:53:02');

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `pid` int(10) NOT NULL auto_increment,
  `proname` varchar(50) default NULL,
  `price` float(24,0) default NULL,
  `proid` int(10) default NULL,
  `tu` varchar(50) default NULL,
  `product_contents` text,
  PRIMARY KEY  (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO product VALUES ('22', '毛巾', '15', '2', '/imagepass/images/1234267985770.gif', '<p>ddd</p>');
INSERT INTO product VALUES ('23', '哑铃', '500', '1', '/imagepass/images/1234268015387.gif', '挺好的');
INSERT INTO product VALUES ('24', '显示器', '9500', '4', '/imagepass/images/1234268044393.gif', '促销中。。。。。');
INSERT INTO product VALUES ('25', '打印机', '1000', '3', '/imagepass/images/1234269716987.gif', '<p>这个打印机真好。。。</p>');

-- ----------------------------
-- Table structure for `producttype`
-- ----------------------------
DROP TABLE IF EXISTS `producttype`;
CREATE TABLE `producttype` (
  `id` int(10) NOT NULL auto_increment,
  `protype` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of producttype
-- ----------------------------
INSERT INTO producttype VALUES ('1', '办公用品');
INSERT INTO producttype VALUES ('2', '生活用品');
INSERT INTO producttype VALUES ('3', '体育用品');
INSERT INTO producttype VALUES ('4', '电脑用品');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(50) NOT NULL default '',
  `password` varchar(50) default NULL,
  `sex` varchar(50) default NULL,
  `birth` date NOT NULL default '0000-00-00',
  `phone` varchar(50) default NULL,
  `address` varchar(50) default NULL,
  PRIMARY KEY  (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO user VALUES ('aa', 'aa', '男', '1998-01-25', '010-88888888', '北京是东城区');
INSERT INTO user VALUES ('bb', 'bb', '男', '1988-01-01', '010-55555555', '天津市塘沽区');
INSERT INTO user VALUES ('cc', 'cc', '男', '1988-01-01', '11111111', '上海');
INSERT INTO user VALUES ('dd', 'dd', '男', '1988-01-01', '1213454678', '美国旧金山');
INSERT INTO user VALUES ('争青小子', 'aa', '男', '1989-01-01', '1213454678', '北京');
