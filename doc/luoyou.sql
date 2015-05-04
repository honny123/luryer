/*
Navicat MySQL Data Transfer

Source Server         : honny
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : luoyou

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2015-05-04 23:05:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_admin`
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_admin
-- ----------------------------
INSERT INTO `t_admin` VALUES ('1', 'admin', 'ly_admin');

-- ----------------------------
-- Table structure for `t_advice`
-- ----------------------------
DROP TABLE IF EXISTS `t_advice`;
CREATE TABLE `t_advice` (
  `advice_id` int(11) NOT NULL AUTO_INCREMENT,
  `advicer` int(11) DEFAULT NULL,
  `advice_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `advice_content` text,
  `advice_email` varchar(255) DEFAULT NULL,
  `advice_phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`advice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_advice
-- ----------------------------
INSERT INTO `t_advice` VALUES ('1', '43', '2015-04-25 16:17:49', 'wq是解放了卡撒旦接哦我失联客机法兰克撒进去我ijsakljdla', '231241@qq.com', '18788888888');
INSERT INTO `t_advice` VALUES ('2', '43', '2015-04-25 16:20:26', 'safalk方式分类考试开始发了口味你发了考试都能十多年拉卡诺斯开发', '231321@qq.com', '18699999999');

-- ----------------------------
-- Table structure for `t_article`
-- ----------------------------
DROP TABLE IF EXISTS `t_article`;
CREATE TABLE `t_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` varchar(255) DEFAULT NULL,
  `article_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `category_id` int(11) DEFAULT NULL,
  `article_title` text,
  `article_content` longtext,
  `article_label` varchar(255) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `is_top` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT '0',
  `replys` int(11) DEFAULT '0',
  `cover` varchar(255) DEFAULT NULL,
  `likes` int(11) DEFAULT '0',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_article
-- ----------------------------
INSERT INTO `t_article` VALUES ('1', '43', '2015-05-02 01:14:18', '3', '睡觉奥克里斯甲方苦涩司法接口圣诞节卡拉三等奖萨连科四大安居客撒旦阿森纳', '\r\n4.3 心太累的机场一日游\r\n想看樱花很久了，所以也暗暗觉得，要去实现这么大一个小心愿，总需要经历点波折。果然，4.3的机场之行可谓一波三折。中午下班，我和豆就拉起行李打的去机场，谁知收到推送，飞机晚点一小时。再这之后就是不断后延，最后晚点了四小时到达大阪。幸好同事有提到过入关排队人很多，我们一下飞机就赶紧往前走，总算是一个半小时完成入关、拿行李。并赶在最后一刻搭上了发往大阪市区的末班火车。\r\n这次下来主要有几点经验：\r\n1、三次飞大阪都晚点了，也不知是不是我天生带雨的关系，所以飞大阪当天还是尽量不要安排太多行程，即使是起大早赶早班机，遇到晚点的话到市区也要下午四五点了。\r\n2、红叶季和樱花季国外游客众多，要准备一个小时以上的入关时间，听说有人排了三个小时的，我倒还好，两次都是一个多小时。\r\n3、如果是像我这样前一天晚上到大阪住下，第二天去京都的，建议难波是最佳选择，因为最方便，而且万一遇到晚点耽误，最晚的那班火车也会到难波，那时候已经没有地铁了（最晚11：40发车，到难波是12：40）。如果订不到了，可以选择其他地方，比如新大阪站楼上就有酒店，与JR站相连，去京都很方便；又比如京阪电车经过的站点，大阪和京都间的城际电车非常方便，40分钟可以从大阪市中心的各站到达京都市中心的三条、四条等，也省去了再去京都站导地铁或者巴士的麻烦，如果正好京都是住在三条四条附近的话，是很不错的选择。\r\n4.3 心太累的机场一日游\r\n想看樱花很久了，所以也暗暗觉得，要去实现这么大一个小心愿，总需要经历点波折。果然，4.3的机场之行可谓一波三折。中午下班，我和豆就拉起行李打的去机场，谁知收到推送，飞机晚点一小时。再这之后就是不断后延，最后晚点了四小时到达大阪。幸好同事有提到过入关排队人很多，我们一下飞机就赶紧往前走，总算是一个半小时完成入关、拿行李。并赶在最后一刻搭上了发往大阪市区的末班火车。\r\n这次下来主要有几点经验：\r\n1、三次飞大阪都晚点了，也不知是不是我天生带雨的关系，所以飞大阪当天还是尽量不要安排太多行程，即使是起大早赶早班机，遇到晚点的话到市区也要下午四五点了。\r\n2、红叶季和樱花季国外游客众多，要准备一个小时以上的入关时间，听说有人排了三个小时的，我倒还好，两次都是一个多小时。\r\n3、如果是像我这样前一天晚上到大阪住下，第二天去京都的，建议难波是最佳选择，因为最方便，而且万一遇到晚点耽误，最晚的那班火车也会到难波，那时候已经没有地铁了（最晚11：40发车，到难波是12：40）。如果订不到了，可以选择其他地方，比如新大阪站楼上就有酒店，与JR站相连，去京都很方便；又比如京阪电车经过的站点，大阪和京都间的城际电车非常方便，40分钟可以从大阪市中心的各站到达京都市中心的三条、四条等，也省去了再去京都站导地铁或者巴士的麻烦，如果正好京都是住在三条四条附近的话，是很不错的选择。', null, '1', '0', '195', '5', null, '1');
INSERT INTO `t_article` VALUES ('4', '43', '2015-05-02 01:14:22', '3', '家里讲道理啥阿萨德加拉克', null, null, '1', '0', '0', '0', null, '0');
INSERT INTO `t_article` VALUES ('5', '43', '2015-05-03 23:25:40', '3', '多舒服舒服点', '<p>dfs放到底是发生</p>', null, '0', '0', '1', '0', '20150503172528_20708.jpg', '0');
INSERT INTO `t_article` VALUES ('6', '43', '2015-05-03 23:37:15', '4', '师傅师傅说爱的', '<p>阿斯达舒服啥地方数千万胜多负少这是撒大声</p>', null, '0', '0', '1', '0', '20150503173301_96042.jpg', '0');
INSERT INTO `t_article` VALUES ('7', '43', '2015-05-03 23:37:52', '3', '额问题问问水电费师傅的服务', '<p>各个耳光让她打三国杀方法盛大富翁都是</p>', null, '0', '0', '1', '0', '20150503173742_71114.jpg', '0');
INSERT INTO `t_article` VALUES ('8', '43', '2015-05-03 23:41:17', '3', '返回科技规划将开工BB机', '<p>不开机保护局可居家好看不开机吧</p>', null, '0', '0', '1', '0', '20150503174107_14487.jpg', '0');

-- ----------------------------
-- Table structure for `t_category`
-- ----------------------------
DROP TABLE IF EXISTS `t_category`;
CREATE TABLE `t_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(255) DEFAULT NULL,
  `relate_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_category
-- ----------------------------
INSERT INTO `t_category` VALUES ('1', '裸游论坛', '0');
INSERT INTO `t_category` VALUES ('2', '裸游锦囊', '0');
INSERT INTO `t_category` VALUES ('3', 'AA结伴', '1');
INSERT INTO `t_category` VALUES ('4', '裸游分享', '1');

-- ----------------------------
-- Table structure for `t_like`
-- ----------------------------
DROP TABLE IF EXISTS `t_like`;
CREATE TABLE `t_like` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `like_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `article_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_like
-- ----------------------------
INSERT INTO `t_like` VALUES ('1', '43', '2015-04-28 17:28:44', '1');

-- ----------------------------
-- Table structure for `t_member`
-- ----------------------------
DROP TABLE IF EXISTS `t_member`;
CREATE TABLE `t_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `signature` text,
  `gender` char(4) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `activeCode` varchar(255) DEFAULT NULL,
  `thumb_photo` varchar(255) DEFAULT NULL,
  `nowHome` varchar(255) DEFAULT NULL,
  `everHome` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `preference` varchar(255) DEFAULT NULL,
  `homeText` varchar(255) DEFAULT NULL,
  `birth` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_member
-- ----------------------------
INSERT INTO `t_member` VALUES ('43', '低头浅笑521', '425071817@qq.com', '20150427041621_53200.jpg', null, '为自由而战！', '2', 'cd096b85a88b13a28bf7e42317410091', '1', '16383056', '20150427041621_53200_thumb_thumb.jpg', '108--', null, '', '花最少的钱游遍世界……', '河北省  -  石家庄市  -  长安区', '2015-04-01');

-- ----------------------------
-- Table structure for `t_message`
-- ----------------------------
DROP TABLE IF EXISTS `t_message`;
CREATE TABLE `t_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `sender` int(11) DEFAULT NULL,
  `receiver` int(11) DEFAULT NULL,
  `message_content` text,
  `is_delete` int(11) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_message
-- ----------------------------

-- ----------------------------
-- Table structure for `t_reply`
-- ----------------------------
DROP TABLE IF EXISTS `t_reply`;
CREATE TABLE `t_reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `reply_content` text,
  `member_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `relate_id` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_reply
-- ----------------------------
INSERT INTO `t_reply` VALUES ('1', '2015-04-28 22:59:47', '啥的科技爱好啥都看见啊对我好啊打开', '43', '1', '0', '1');
INSERT INTO `t_reply` VALUES ('2', '2015-04-28 22:59:48', '上飞机开始卡萨丁就萨克哈哈得看SD卡基本不啥都看见啊', '43', '1', '0', '2');
INSERT INTO `t_reply` VALUES ('3', '2015-04-28 22:59:51', '肤色较黑收到货就爱看把的萨克SD卡基本从自行车就看吧', '43', '1', '1', '3');
INSERT INTO `t_reply` VALUES ('4', '2015-04-29 00:20:28', '二级测试测试', '43', '1', '1', '4');
INSERT INTO `t_reply` VALUES ('5', '2015-04-29 00:21:06', '一级测试测试', '43', '1', '0', '5');
