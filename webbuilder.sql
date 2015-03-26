/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : webbuilder

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2015-03-26 23:35:57
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `html`
-- ----------------------------
DROP TABLE IF EXISTS `html`;
CREATE TABLE `html` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `html` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of html
-- ----------------------------
INSERT INTO `html` VALUES ('15', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;header&gt;&lt;h1&gt;City Gallery&lt;/h1&gt;&lt;/header&gt;&lt;nav&gt;London&lt;br&gt; Paris&lt;br&gt; Tokyo&lt;br&gt;&lt;/nav&gt;&lt;section&gt;&lt;h1 class=&quot;text&quot; style=&quot;color: red;&quot; data-mce-style=&quot;color: red;&quot;&gt;London&lt;/h1&gt;&lt;p class=&quot;text&quot; style=&quot;color: red;&quot; data-mce-style=&quot;color: red;&quot;&gt;London is the capital city of England. It is the most populous city in the United Kingdom, with a metropolitan area of over 13 million inhabitants.&lt;/p&gt;&lt;p class=&quot;text&quot; style=&quot;color: red;&quot; data-mce-style=&quot;color: red;&quot;&gt;Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.&lt;/p&gt;&lt;/section&gt;&lt;footer class=&quot;text&quot; style=&quot;color: red;&quot; data-mce-style=&quot;color: red;&quot;&gt;Copyright Â© smgroup.com&lt;/footer&gt;');
INSERT INTO `html` VALUES ('16', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;header&gt;&lt;h1&gt;&lt;em&gt;Saif&amp;nbsp;&lt;/em&gt; &lt;a title=&quot;dfsa&quot; href=&quot;dsaf&quot; data-mce-href=&quot;dsaf&quot;&gt;dsafdsfa&lt;/a&gt;&lt;br&gt;&lt;/h1&gt;&lt;/header&gt;&lt;nav&gt;London&lt;br&gt; Paris&lt;br&gt; Tokyo&lt;br&gt;&lt;/nav&gt;&lt;section&gt;&lt;h1 class=&quot;text&quot; style=&quot;color: red;&quot; data-mce-style=&quot;color: red;&quot;&gt;London&lt;/h1&gt;&lt;p class=&quot;text&quot; style=&quot;color: red;&quot; data-mce-style=&quot;color: red;&quot;&gt;London is the capital city of England. It is the most populous city in the United Kingdom, with a metropolitan area of over 13 million inhabitants.&lt;/p&gt;&lt;p class=&quot;text&quot; style=&quot;color: red;&quot; data-mce-style=&quot;color: red;&quot;&gt;Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.&lt;/p&gt;&lt;/section&gt;&lt;footer class=&quot;text&quot; style=&quot;color: red;&quot; data-mce-style=&quot;color: red;&quot;&gt;Copyright Â© smgroup.com&lt;/footer&gt;');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'a', 'a', 'a');

-- ----------------------------
-- Table structure for `user_html`
-- ----------------------------
DROP TABLE IF EXISTS `user_html`;
CREATE TABLE `user_html` (
  `user_id` varchar(255) NOT NULL,
  `html_id` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`,`html_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_html
-- ----------------------------
INSERT INTO `user_html` VALUES ('1', '10');
INSERT INTO `user_html` VALUES ('1', '11');
INSERT INTO `user_html` VALUES ('1', '12');
INSERT INTO `user_html` VALUES ('1', '13');
INSERT INTO `user_html` VALUES ('1', '14');
INSERT INTO `user_html` VALUES ('1', '15');
INSERT INTO `user_html` VALUES ('1', '16');
INSERT INTO `user_html` VALUES ('1', '6');
INSERT INTO `user_html` VALUES ('1', '7');
INSERT INTO `user_html` VALUES ('1', '8');
INSERT INTO `user_html` VALUES ('1', '9');
INSERT INTO `user_html` VALUES ('3', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;header&gt;&lt;h1&gt;City Gallery&lt;/h1&gt;&lt;/header&gt;&lt;nav&gt;London&lt;br&gt; Paris&lt;br&gt; Tokyo&lt;br&gt;&lt;/nav&gt;&lt;section&gt;&lt;h1&gt;London&lt;/h1&gt;&lt;p class=&quot;text&quot; style=&quot;color: red');
INSERT INTO `user_html` VALUES ('4', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;header&gt;&lt;h1&gt;City Gallery&lt;/h1&gt;&lt;/header&gt;&lt;nav&gt;London&lt;br&gt; Paris&lt;br&gt; Tokyo&lt;br&gt;&lt;/nav&gt;&lt;section&gt;&lt;h1&gt;London&lt;/h1&gt;&lt;p class=&quot;text&quot; style=&quot;color: red');
INSERT INTO `user_html` VALUES ('5', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;header&gt;&lt;h1&gt;City Galleryor two millennia, its history going back to its founding by the Romans, who named it Londinium.&lt;/h1&gt;&lt;/header&gt;&lt;footer class=&quot;text&quot; style=&quot;color: red;&quot; data-');
