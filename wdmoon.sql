-- MySQL dump 10.13  Distrib 5.5.36, for Linux (x86_64)
--
-- Host: localhost    Database: pro_wandermoon
-- ------------------------------------------------------
-- Server version	5.5.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ad`
--

DROP TABLE IF EXISTS `ad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `position_id` int(10) unsigned NOT NULL COMMENT '广告位ID',
  `title` varchar(50) NOT NULL COMMENT '广告名称',
  `title_alias` char(40) NOT NULL DEFAULT '' COMMENT '标识',
  `link_url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `image_url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片地址',
  `width` varchar(10) NOT NULL DEFAULT '' COMMENT '图片宽',
  `height` varchar(10) NOT NULL DEFAULT '' COMMENT '图片高',
  `introduce` text COMMENT '广告描述',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `attach_file` varchar(100) NOT NULL DEFAULT '' COMMENT '附件',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '显示状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='广告';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad`
--

LOCK TABLES `ad` WRITE;
/*!40000 ALTER TABLE `ad` DISABLE KEYS */;
/*!40000 ALTER TABLE `ad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ad_position`
--

DROP TABLE IF EXISTS `ad_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ad_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(100) NOT NULL DEFAULT '' COMMENT '广告位名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='广告位管理表 ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad_position`
--

LOCK TABLES `ad_position` WRITE;
/*!40000 ALTER TABLE `ad_position` DISABLE KEYS */;
INSERT INTO `ad_position` VALUES (6,'1');
/*!40000 ALTER TABLE `ad_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attention`
--

DROP TABLE IF EXISTS `attention`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attention` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned DEFAULT '0' COMMENT '收藏id',
  `user_id` int(10) unsigned DEFAULT '0' COMMENT '用户id',
  `title` varchar(100) DEFAULT '' COMMENT '收藏名称',
  `url` varchar(200) DEFAULT '' COMMENT '收藏地址',
  `type` tinyint(2) unsigned DEFAULT '1' COMMENT '收藏内容类型(文章/图片/商品/视频)',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='关注表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attention`
--

LOCK TABLES `attention` WRITE;
/*!40000 ALTER TABLE `attention` DISABLE KEYS */;
/*!40000 ALTER TABLE `attention` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalog`
--

DROP TABLE IF EXISTS `catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '栏目类型',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类',
  `catalog_name` varchar(100) NOT NULL COMMENT '名称',
  `content` text COMMENT '详细介绍',
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo关键字',
  `seo_description` text COMMENT 'seo描述',
  `attach_file` varchar(100) DEFAULT '' COMMENT '附件',
  `attach_thumb` varchar(100) DEFAULT '' COMMENT '缩略图',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `data_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数据量',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `redirect_url` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转地址',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='全局分类';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog`
--

LOCK TABLES `catalog` WRITE;
/*!40000 ALTER TABLE `catalog` DISABLE KEYS */;
INSERT INTO `catalog` VALUES (4,5,0,'活动精选','产品栏目介绍','','','','','',0,0,'Y','',1379545330,1428313362),(22,1,0,'专题活动','','','','','','',0,0,'Y','',1429682032,1429682032);
/*!40000 ALTER TABLE `catalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collect`
--

DROP TABLE IF EXISTS `collect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned DEFAULT '0' COMMENT '收藏id',
  `user_id` int(10) unsigned DEFAULT '0' COMMENT '用户id',
  `title` varchar(100) DEFAULT '' COMMENT '收藏名称',
  `url` varchar(200) DEFAULT '' COMMENT '收藏地址',
  `type` tinyint(2) unsigned DEFAULT '1' COMMENT '收藏内容类型(文章/图片/商品/视频)',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='收藏表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collect`
--

LOCK TABLES `collect` WRITE;
/*!40000 ALTER TABLE `collect` DISABLE KEYS */;
/*!40000 ALTER TABLE `collect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `topic_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `content` text NOT NULL COMMENT '评论内容',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '评论类型',
  `client_ip` varchar(15) NOT NULL DEFAULT '127' COMMENT '评论ip',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COMMENT='评论表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friend`
--

DROP TABLE IF EXISTS `friend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid1` int(10) unsigned DEFAULT '0' COMMENT '其中一个用户id',
  `uid2` int(10) unsigned DEFAULT '0' COMMENT '好友uid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friend`
--

LOCK TABLES `friend` WRITE;
/*!40000 ALTER TABLE `friend` DISABLE KEYS */;
/*!40000 ALTER TABLE `friend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(100) DEFAULT NULL COMMENT '商品名称',
  `goods_name_second` varchar(100) DEFAULT NULL COMMENT '商品副标题',
  `catalog_id` int(10) unsigned DEFAULT NULL COMMENT '栏目id',
  `price` int(10) unsigned DEFAULT '0',
  `default_image` varchar(200) DEFAULT NULL COMMENT '商品图片',
  `default_thumb` varchar(200) DEFAULT NULL COMMENT '商品缩略图',
  `image_list` varchar(255) DEFAULT NULL COMMENT '商品组图',
  `introduce` varchar(1000) DEFAULT NULL COMMENT '商品介绍',
  `content` text COMMENT '商品内容',
  `views` int(10) unsigned DEFAULT '0' COMMENT '浏览次数',
  `sales` int(10) unsigned DEFAULT '0' COMMENT '销售次数',
  `sales_endtime` date DEFAULT '0000-00-00' COMMENT '结束时间',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '添加时间',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '更新时间',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '显示状态',
  `recom_id` int(10) DEFAULT '0' COMMENT '推荐位id',
  `sort_order` mediumint(10) unsigned DEFAULT '0' COMMENT '排序',
  `ext_1` varchar(255) DEFAULT NULL,
  `ext_2` varchar(255) DEFAULT NULL,
  `ext_3` varchar(255) DEFAULT NULL,
  `ext_4` varchar(255) DEFAULT NULL,
  `ext_5` varchar(255) DEFAULT NULL,
  `ext_zhu` varchar(255) DEFAULT NULL,
  `ext_han` varchar(255) DEFAULT NULL,
  `ext_zeng` varchar(255) DEFAULT NULL,
  `help_1` varchar(255) DEFAULT NULL,
  `help_2` varchar(255) DEFAULT NULL,
  `help_3` varchar(255) DEFAULT NULL,
  `ext_xing` varchar(255) DEFAULT NULL,
  `ext_shi` varchar(255) DEFAULT NULL,
  `ext_xiang` varchar(255) DEFAULT NULL,
  `ext_mian` varchar(255) DEFAULT NULL,
  `ext_wan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='商品表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (3,'[出游最佳时节]阳春四月百元遨游','维多利亚的秘密',4,1200,'uploads/images/201504/36fb441f64b.jpg','uploads/thumbs/201504/small_36fb441f64b.jpg','','进入令人沉醉向往的4月，装上相机，带上亲朋，面对已经春光满园的大地，让我们一起用镜头把美景采摘回去吧！','<p>\r\n	进入令人沉醉向往的4月，装上相机，带上亲朋，面对已经春光满园的大地，让我们一起用镜头把美景采摘回去吧！<br />\r\nHI，大家好依旧是我猫火火，对我又出门了【这次是端午节小长假啦】这次的出行计划跟以往有小小的不同，因为这次主要目的并不是游玩是为了看我从小到大一直喜欢的偶像【孙燕姿】的演唱会！激动的根本停不下来！！有木有！提前好几个月就买好了内场的门票！天津内场票价很便宜是800/张。【如果也有喜欢燕姿的恰巧也热爱旅游的亲们可以互相交流哦，火火很乐意与你们一同分享】我是在内场A2区25排45号！<br />\r\n喜欢燕姿，大家要追溯到小学6年级的，那时候电台的电话点播歌曲很流行，每天看电话都能听见一短发女生的歌。时间一长真觉得她好有才啊~第一首歌【超快感】喜欢最后的口哨~渐渐的她越来越红，还是依旧的短发，随性，直来直往，做自己喜欢的事，并不为迎合谁儿活着，和我一样，这大概也是我一直喜欢她的原因。<br />\r\n好吧，其它游记链接就不发啦~如果大家喜欢手绘旅行的，可以看看火火的其它作品o~希望能帮到大家呢！<br />\r\n如果想找到我…可以给我微博私信哦~<br />\r\n<img src=\"/uploads/attached/image/201504/16a65af046c.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	进入令人沉醉向往的4月，装上相机，带上亲朋，面对已经春光满园的大地，让我们一起用镜头把美景采摘回去吧！<img src=\"/uploads/attached/image/201504/6efa4f01394.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	进入令人沉醉向往的4月，装上相机，带上亲朋，面对已经春光满园的大地，让我们一起用镜头把美景采摘回去吧！<img src=\"/uploads/attached/image/201504/97f3bd3a00b.jpg\" alt=\"\" /> \r\n</p>',32,0,'2015-04-13',1428314020,1429088645,'Y',0,0,'3晚/4晚豪华房(免费升级游泳池客房)','清凉一夏，沙滩冲浪带给你豪华体验','免费包机票,豪华大餐免费吃','','','3晚/4晚豪华房(免费升级游泳池客房)','含所有机票、晚餐和出行费用','赠999元豪华大礼包，含IPhone','请在购买前仔细阅读本内容，否则后果自己承担！请在购买前仔细阅读本内容，否则后果自己承担！','预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！','退改请联系客服！退改请联系客服！退改请联系客服！退改请联系客服！',NULL,NULL,NULL,NULL,NULL),(4,'不规划行程的台湾环岛自由行','我是魏小圈，我在台湾',4,4500,'uploads/images/201504/aeee907acbc.jpg','uploads/thumbs/201504/small_aeee907acbc.jpg','','哈哈，楼主从出生起就一直呆在上海，这座海派的融合大成的城市，已经养育了我二十多年，我眼中的上海，是一座充满了新鲜感，永远走在时尚尖端.','HI，大家好依旧是我猫火火，对我又出门了【这次是端午节小长假啦】这次的出行计划跟以往有小小的不同，因为这次主要目的并不是游玩是为了看我从小到大一直喜欢的偶像【孙燕姿】的演唱会！激动的根本停不下来！！有木有！提前好几个月就买好了内场的门票！天津内场票价很便宜是800/张。【如果也有喜欢燕姿的恰巧也热爱旅游的亲们可以互相交流哦，火火很乐意与你们一同分享】我是在内场A2区25排45号！<br />\r\n喜欢燕姿，大家要追溯到小学6年级的，那时候电台的电话点播歌曲很流行，每天看电话都能听见一短发女生的歌。时间一长真觉得她好有才啊~第一首歌【超快感】喜欢最后的口哨~渐渐的她越来越红，还是依旧的短发，随性，直来直往，做自己喜欢的事，并不为迎合谁儿活着，和我一样，这大概也是我一直喜欢她的原因。<br />\r\n好吧，其它游记链接就不发啦~如果大家喜欢手绘旅行的，可以看看火火的其它作品o~希望能帮到大家呢！<br />\r\n<br />\r\n<p>\r\n	<img src=\"/uploads/attached/image/201504/16a65af046c.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	进入令人沉醉向往的4月，装上相机，带上亲朋，面对已经春光满园的大地，让我们一起用镜头把美景采摘回去吧！<img src=\"/uploads/attached/image/201504/6efa4f01394.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	进入令人沉醉向往的4月，装上相机，带上亲朋，面对已经春光满园的大地，让我们一起用镜头把美景采摘回去吧！<img src=\"/uploads/attached/image/201504/97f3bd3a00b.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>',25,0,'2015-05-27',1428315784,1429088590,'Y',0,0,'3晚/4晚豪华房(免费升级游泳池客房)','清凉一夏，沙滩冲浪带给你豪华体验','免费包机票,豪华大餐免费吃','','','3晚/4晚豪华房(免费升级游泳池客房)','含所有机票、晚餐和出行费用','赠999元豪华大礼包，含IPhone','请在购买前仔细阅读本内容，否则后果自己承担！请在购买前仔细阅读本内容，否则后果自己承担！','预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！','退改请联系客服！退改请联系客服！退改请联系客服！退改请联系客服！',NULL,NULL,NULL,NULL,NULL),(5,'游走天津卫·只为近近看着你','静静听你唱',4,5600,'uploads/images/201504/625ebf0b8c3.jpg','uploads/thumbs/201504/small_625ebf0b8c3.jpg','','时间一长真觉得她好有才啊~第一首歌【超快感】喜欢最后的口哨~渐渐的她越来越红，还是依旧的短发，随性，直来直往，做自己喜欢的事，并不为迎合谁儿活着，和我一样，这大概也是我一直喜欢她的原因。','HI，大家好依旧是我猫火火，对我又出门了【这次是端午节小长假啦】这次的出行计划跟以往有小小的不同，因为这次主要目的并不是游玩是为了看我从小到大一直喜欢的偶像【孙燕姿】的演唱会！激动的根本停不下来！！有木有！提前好几个月就买好了内场的门票！天津内场票价很便宜是800/张。【如果也有喜欢燕姿的恰巧也热爱旅游的亲们可以互相交流哦，火火很乐意与你们一同分享】我是在内场A2区25排45号！<br />\r\n喜欢燕姿，大家要追溯到小学6年级的，那时候电台的电话点播歌曲很流行，每天看电话都能听见一短发女生的歌。时间一长真觉得她好有才啊~第一首歌【超快感】喜欢最后的口哨~渐渐的她越来越红，还是依旧的短发，随性，直来直往，做自己喜欢的事，并不为迎合谁儿活着，和我一样，这大概也是我一直喜欢她的原因。<br />\r\n好吧，其它游记链接就不发啦~如果大家喜欢手绘旅行的，可以看看火火的其它作品o~希望能帮到大家呢！<br />\r\n<p>\r\n	如果想找到我…可以给我微博私信哦~\r\n</p>\r\n<p>\r\n	<img src=\"/uploads/attached/image/201504/ca876e005f6.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	进入令人沉醉向往的4月，装上相机，带上亲朋，面对已经春光满园的大地，让我们一起用镜头把美景采摘回去吧！<img src=\"/uploads/attached/image/201504/9168cc8be28.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	进入令人沉醉向往的4月，装上相机，带上亲朋，面对已经春光满园的大地，让我们一起用镜头把美景采摘回去吧！<img src=\"/uploads/attached/image/201504/057aee24a97.jpg\" alt=\"\" /> \r\n</p>',176,0,'2016-02-04',1428315944,1428322964,'Y',0,0,'3晚/4晚豪华房(免费升级游泳池客房)','清凉一夏，沙滩冲浪带给你豪华体验','免费包机票,豪华大餐免费吃','3晚/4晚豪华房(免费升级游泳池客房)','','3晚/4晚豪华房(免费升级游泳池客房)','含所有机票、晚餐和出行费用','赠999元豪华大礼包，含IPhone','请在购买前仔细阅读本内容，否则后果自己承担！请在购买前仔细阅读本内容，否则后果自己承担！','预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！预定时请确定您已经满足18周岁！','退改请联系客服！退改请联系客服！退改请联系客服！退改请联系客服！',NULL,NULL,NULL,NULL,NULL),(7,'上海直飞大阪5日往返机票','赠1晚酒店住宿',4,0,'uploads/images/201504/f3b6fd9f334.jpg','uploads/thumbs/201504/small_f3b6fd9f334.jpg','','关西の大阪，日本民俗、美食必体验','<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;color:#FFFFFF;font-size:18px;background:#00B0F0;\">关西の大阪，日本民俗、美食必体验</span> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:14px;\"><span style=\"font-family:微软雅黑, sans-serif;\">大阪的道顿崛美食街的大螃蟹、章鱼烧、大阪烧、河豚火锅、乌龙面都是不可错过的风味美食；心斋桥和梅田是大阪最著名商区；大阪城公园、天守阁是昔日辉煌与荣耀的象征；日本环球影城也位于大阪，是世界</span>3<span style=\"font-family:微软雅黑, sans-serif;\">大环球影城主题公园之一。</span></span> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<img src=\"http://mmbiz.qpic.cn/mmbiz/6SicLHTHRzfBt8ibXBHwVomqS2o0ZytGp9Rs3TGO9jRvZK4libascdk7fjl47Lh6nY5KeOyHZuibPUqcviaKqWZ7Dhg/640?wxfmt=jpeg&amp;tp=webp&amp;wxfrom=5\" style=\"height:auto !important;width:auto !important;\" /> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<img src=\"http://mmbiz.qpic.cn/mmbiz/6SicLHTHRzfBt8ibXBHwVomqS2o0ZytGp9M8AfGgSic8dwmkMib9HTH5iaVgLB95W6eJy48fPX9Ezw9L8A3KwqRqHrQ/640?wxfmt=jpeg&amp;tp=webp&amp;wxfrom=5\" style=\"height:auto !important;width:auto !important;\" /> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;font-size:14px;\">大阪还是进出日本关西的玄关，这里有许多直达关西城市的列车，交通非常方便。去一趟大阪可以将京都、奈良、神户一起游遍，日本民俗风情、特色美食、现代玩乐项目基本可以全部体验到。</span> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<img src=\"http://mmbiz.qpic.cn/mmbiz/6SicLHTHRzfBt8ibXBHwVomqS2o0ZytGp9liaACnNk9yssbMyhibY7EatMscZQksmmOEwJGdcGNyYg2WeepGjjpofQ/640?wxfmt=jpeg&amp;tp=webp&amp;wxfrom=5\" style=\"height:auto !important;width:auto !important;\" /> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<br />\r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<span style=\"color:#FFFFFF;font-size:18px;font-family:微软雅黑, sans-serif;background-color:#00B0F0;\">新大阪华盛顿酒店，距新干线仅5分钟</span> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background:white;\">\r\n	<span style=\"font-size:14px;\"><span style=\"font-family:微软雅黑, sans-serif;\">新大阪华盛顿酒店前台全天</span>24<span style=\"font-family:微软雅黑, sans-serif;\">小时开放，并提供行李寄存服务</span>, <span style=\"font-family:微软雅黑, sans-serif;\">空调客房都配有可点播视频节目的液晶电视、小冰箱和电热水壶，整体浴室提供吹风机及免费洗浴用品。</span></span> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<img src=\"http://mmbiz.qpic.cn/mmbiz/6SicLHTHRzfBt8ibXBHwVomqS2o0ZytGp9aHwZmibhRTRbzwh1dNk0Lq8usbicO0s44TW5oj8DibZ52ljJ2IjjGueCA/640?wxfmt=jpeg&amp;tp=webp&amp;wxfrom=5\" style=\"height:auto !important;width:auto !important;\" /> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<img src=\"http://mmbiz.qpic.cn/mmbiz/6SicLHTHRzfBt8ibXBHwVomqS2o0ZytGp9ibXeXDW3XHl8YXYMHGBsib5FrpA1rNlzZontsfJ0t5iacWYWRLarSnlEQ/640?wxfmt=jpeg&amp;tp=webp&amp;wxfrom=5\" style=\"height:auto !important;width:auto !important;\" /> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<br />\r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background:white;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;color:#FFFFFF;font-size:18px;background-color:#00B0F0;\">酒店地理位置参考</span> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<img src=\"http://mmbiz.qpic.cn/mmbiz/6SicLHTHRzfBt8ibXBHwVomqS2o0ZytGp94hqibCJ9ibLk2Ch22lqRiar6wEG13WNovN1AkY5z57b8QNDGG2Eu8GqLQ/640?wxfmt=jpeg&amp;tp=webp&amp;wxfrom=5\" style=\"height:auto !important;width:auto !important;\" /> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background:white;\">\r\n	<span style=\"font-size:14px;\"><span style=\"font-family:微软雅黑, sans-serif;\">小贴士：大阪国际机场可乘坐利幕津巴士约</span>25<span style=\"font-family:微软雅黑, sans-serif;\">分钟，从酒店乘地铁大大阪梅田约</span>10<span style=\"font-family:微软雅黑, sans-serif;\">分钟。</span></span> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<br />\r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;color:#FFFFFF;font-size:18px;background:#00B0F0;\">航班信息参考</span> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background:white;\">\r\n	<span style=\"font-size:14px;\"><span style=\"font-family:微软雅黑, sans-serif;\">中国国际航空上海直飞</span>5<span style=\"font-family:微软雅黑, sans-serif;\">日往返，早上出发，晚上返程，最大化合理安排行程。（国际航班起降时间均为当地时间）</span></span> \r\n</p>\r\n<p style=\"color:#3E3E3E;font-family:\'Helvetica Neue\', Helvetica, \'Hiragino Sans GB\', \'Microsoft YaHei\', Î¢ÈíÑÅºÚ, Arial, sans-serif;font-size:16px;background-color:#FFFFFF;\">\r\n	<img src=\"http://mmbiz.qpic.cn/mmbiz/6SicLHTHRzfBt8ibXBHwVomqS2o0ZytGp9OibE0yeHicicvkKzlKmg3E8C27iajCfKEvdK6jCXkuGlGiaT0Pp5y4Eqq1A/640?wxfmt=png&amp;tp=webp&amp;wxfrom=5\" style=\"height:auto !important;width:auto !important;\" /> \r\n</p>\r\n<div>\r\n	<br />\r\n</div>',27,0,'2015-05-24',1429604592,1430101460,'Y',0,0,'【优质航空直飞往返】中国国际航空上海直飞大阪5日含税费，早去晚回','【赠1晚大阪住宿】入住新大阪新干线车站旁华盛顿酒店，便利交通游关西','【关西门户必玩】可选2015年5月18日或5月24日出发，品味关西风情','','','新大阪华盛顿酒店小间大床房1晚','中国国航上海直飞大阪5日往返团队经济舱机票含税费','','1.此产品赠送酒店房间需2人同时入住，1人入住需补单房差400元。','1、付款成功请提前7个工作日联系我们预约，一经预约不退不改；','付款成功并一经预约不退不改','','','','','');
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods_plan`
--

DROP TABLE IF EXISTS `goods_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `plan_name` varchar(255) DEFAULT NULL,
  `plan_price` decimal(10,2) DEFAULT NULL,
  `plan_desc` varchar(1000) DEFAULT NULL,
  `create_time` int(10) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods_plan`
--

LOCK TABLES `goods_plan` WRITE;
/*!40000 ALTER TABLE `goods_plan` DISABLE KEYS */;
INSERT INTO `goods_plan` VALUES (1,5,'标准套餐',0.01,'标准套餐标准套餐标准套餐',1428844771,0),(2,5,'豪华套餐',3000.00,'豪华套餐豪华套餐豪华套餐豪华套餐',1428844790,0),(3,5,'尊贵VIP套餐',5600.00,'尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐',1428844811,0),(4,4,'标准套餐',0.01,'标准套餐标准套餐标准套餐标准套餐标准套餐标准套餐标准套餐标准套餐标准套餐',1429088714,0),(5,4,'尊贵VIP套餐',9000.00,'尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐',1429088786,0),(6,4,'尊贵VIP套',3000.00,'尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐尊贵VIP套餐',1429088793,0),(7,3,'标准套餐',0.10,'标准套餐标准套餐标准套餐标准套餐标准套餐',1429088825,0),(8,7,'5.18或5.24出发',2199.00,'无',1429604964,0),(9,7,'单人房差',400.00,'此产品赠送酒店房间需2人同时入住，1人入住需补单房差400元。',1429604998,0);
/*!40000 ALTER TABLE `goods_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '用户',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `title_second` varchar(255) NOT NULL DEFAULT '' COMMENT '副标题',
  `title_style` varchar(255) NOT NULL DEFAULT '' COMMENT '标题样式',
  `html_path` varchar(100) NOT NULL DEFAULT '' COMMENT 'html路径',
  `html_file` varchar(100) NOT NULL DEFAULT '' COMMENT 'html文件名',
  `catalog_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类',
  `special_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '专题编号',
  `introduce` text COMMENT '摘要',
  `image_list` text COMMENT '组图',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` text COMMENT 'SEO描述',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  `content` mediumtext NOT NULL COMMENT '内容',
  `copy_from` varchar(100) NOT NULL DEFAULT '' COMMENT '来源',
  `copy_url` varchar(255) NOT NULL DEFAULT '' COMMENT '来源url',
  `redirect_url` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转URL',
  `tags` varchar(255) NOT NULL DEFAULT '' COMMENT 'tags',
  `view_count` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '查看次数',
  `commend` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '推荐',
  `attach_status` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '是否上传附件',
  `attach_file` varchar(255) NOT NULL DEFAULT '' COMMENT '附件名称',
  `attach_thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '附件缩略图',
  `favorite_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数量',
  `top_line` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '头条',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  `reply_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复次数',
  `reply_allow` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '允许评论',
  `sort_desc` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='内容管理';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link`
--

DROP TABLE IF EXISTS `link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL COMMENT '名称',
  `link` varchar(100) DEFAULT NULL COMMENT '链接',
  `logo` varchar(255) DEFAULT '' COMMENT 'LOGO图标',
  `sortorder` smallint(10) DEFAULT '255' COMMENT '排序',
  `status_is` enum('Y','N') DEFAULT 'Y' COMMENT '状态Y-显示N-隐藏',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='链接表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link`
--

LOCK TABLES `link` WRITE;
/*!40000 ALTER TABLE `link` DISABLE KEYS */;
/*!40000 ALTER TABLE `link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_log`
--

DROP TABLE IF EXISTS `mail_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accept` varchar(50) DEFAULT NULL COMMENT '收件人邮箱',
  `subject` varchar(100) DEFAULT NULL COMMENT '邮件标题',
  `message` text COMMENT '邮件内容',
  `sendtime` int(10) unsigned DEFAULT NULL COMMENT '发送时间',
  `status` enum('waiting','success','failed') DEFAULT 'waiting' COMMENT '当前邮件状态(待发送、发送成功、发送失败)',
  `level` enum('1','2','3') DEFAULT '3' COMMENT '邮件优先级(越小越优先)',
  `times` tinyint(2) unsigned DEFAULT '0' COMMENT '发送次数',
  `error` varchar(100) DEFAULT NULL COMMENT '错误信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COMMENT='发送邮件日志';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_log`
--

LOCK TABLES `mail_log` WRITE;
/*!40000 ALTER TABLE `mail_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) DEFAULT NULL COMMENT '导航菜单',
  `menu_link` varchar(50) DEFAULT NULL COMMENT '导航链接',
  `unique` varchar(20) DEFAULT NULL COMMENT '唯一标示',
  `status_is` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  `parent_id` int(10) unsigned DEFAULT '0' COMMENT '上级菜单',
  `sort_order` int(10) unsigned DEFAULT '0' COMMENT '排序',
  `target` enum('Y','N') DEFAULT 'N' COMMENT '新窗口打开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='导航菜单表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_type`
--

DROP TABLE IF EXISTS `model_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_type` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '模型id',
  `type_key` varchar(20) NOT NULL COMMENT '类型标示(英文字母)',
  `type_name` varchar(50) NOT NULL COMMENT '模型名称',
  `model` varchar(50) NOT NULL DEFAULT '' COMMENT '内容模型',
  `status` enum('Y','N') DEFAULT 'Y',
  `seo_title` varchar(100) DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(200) DEFAULT '' COMMENT 'seo关键字',
  `seo_description` varchar(255) DEFAULT '' COMMENT 'seo描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='内容模型表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_type`
--

LOCK TABLES `model_type` WRITE;
/*!40000 ALTER TABLE `model_type` DISABLE KEYS */;
INSERT INTO `model_type` VALUES (1,'post','文章','Post','Y','最新最优秀的IT文章IT资讯','IT，程序员，工程师，文章，博文，资讯，最新，优秀，php，mysql，html，yii，framework，js，jquery，web，mvc，开发','聚合了优质的IT文章，无论你是前端工程师，还是后端程序员，都可以找到你想了解的知识和资讯，更多内容尽在yiifcms。'),(2,'image','图集','Image','Y','最新最全的热门图集、精品爆图、美图','图片，图集，最新，热门，精品，最全，美女，爆料，搞笑','展示了用户最喜爱的美女图片、爆料图片、搞笑图片，惊爆眼球，更多内容尽在yiifcms。'),(3,'soft','软件','Soft','Y','最新发布的yiifcms、热门手册、精品下载、建站工具','yii，cms，版本，下载，最新，热门，最全，精品，建站，工具，安全，稳定','提供了web开发人员的建站工具和yiifcms发布版本，供感兴趣的用户下载和使用，详情了解尽在yiifcms。'),(4,'video','视频','Video','Y','最新上映的电影、热门视频、热播电视剧、下载视频','视频，电影，微电影，电视剧，MV，MTV，最新，热门，热播，高清，下载','聚合了用户最喜爱的视频，尽在yiifcms。'),(5,'goods','商品','Goods','Y','ds','dd','d'),(6,'event','活动','Event','Y','','','');
/*!40000 ALTER TABLE `model_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth`
--

DROP TABLE IF EXISTS `oauth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth` (
  `id` varchar(30) NOT NULL DEFAULT '',
  `apiname` varchar(50) DEFAULT NULL COMMENT 'api名称',
  `apiconfig` text COMMENT '接口配置',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='第三方登录授权表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth`
--

LOCK TABLES `oauth` WRITE;
/*!40000 ALTER TABLE `oauth` DISABLE KEYS */;
INSERT INTO `oauth` VALUES ('qq','QQ','{\"appid\":\"\",\"appkey\":\"\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/qq_callback\",\"scope\":\"get_user_info,add_t,del_t,get_info\",\"errorReport\":true,\"storageType\":\"file\"}','Y'),('sinawb','新浪微博','{\"wb_akey\":\"\",\"wb_skey\":\"\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/sinawb_callback\"}','Y'),('weixin','微信','2821796254','N'),('renren','人人网','{\"app_key\":\"\",\"app_secret\":\"\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/renren_callback\"}','Y');
/*!40000 ALTER TABLE `oauth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_qq`
--

DROP TABLE IF EXISTS `oauth_qq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_qq` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT 'qq令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='qq绑定表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_qq`
--

LOCK TABLES `oauth_qq` WRITE;
/*!40000 ALTER TABLE `oauth_qq` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_qq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_renren`
--

DROP TABLE IF EXISTS `oauth_renren`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_renren` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT '令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='人人网绑定表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_renren`
--

LOCK TABLES `oauth_renren` WRITE;
/*!40000 ALTER TABLE `oauth_renren` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_renren` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_sinawb`
--

DROP TABLE IF EXISTS `oauth_sinawb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_sinawb` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT '令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='新浪微博绑定表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_sinawb`
--

LOCK TABLES `oauth_sinawb` WRITE;
/*!40000 ALTER TABLE `oauth_sinawb` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_sinawb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_weixin`
--

DROP TABLE IF EXISTS `oauth_weixin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_weixin` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT '令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='微信绑定表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_weixin`
--

LOCK TABLES `oauth_weixin` WRITE;
/*!40000 ALTER TABLE `oauth_weixin` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_weixin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `order_code` bigint(18) NOT NULL COMMENT '订单号',
  `username` varchar(30) NOT NULL COMMENT '账号',
  `goods_id` int(10) NOT NULL COMMENT '商品号',
  `plan_id` int(10) NOT NULL COMMENT '套餐号',
  `order_num` smallint(4) NOT NULL DEFAULT '1' COMMENT '订购数量',
  `plan_price` decimal(10,2) NOT NULL COMMENT '产品套餐单价',
  `total_price` decimal(10,2) NOT NULL COMMENT '总价',
  `payment` varchar(30) NOT NULL DEFAULT '' COMMENT '支付方式',
  `realname` varchar(50) NOT NULL COMMENT '订购人真实姓名',
  `mobile` varchar(30) CHARACTER SET latin1 NOT NULL COMMENT '手机号码',
  `goods_name` varchar(50) DEFAULT NULL COMMENT '商品名称',
  `plan_name` varchar(100) DEFAULT NULL COMMENT '套餐名称',
  `default_thumb` varchar(255) DEFAULT NULL COMMENT '商品缩略图',
  `sales_endtime` date DEFAULT '0000-00-00' COMMENT '活动结束时间',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '订单状态:1-已下单未支付 2-已下单已支付 3-订单取消 4-支付失败',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '订单创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '订单更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (14,14,201504157768,'15216607660',5,1,1,0.01,0.01,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 04:37:03',NULL),(15,14,201504152398,'15216607660',5,1,1,0.01,0.01,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 04:37:07',NULL),(16,14,201504158074,'15216607660',5,1,1,0.01,0.01,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',2,'2015-04-15 07:51:07',NULL),(17,14,201504159932,'15216607660',5,1,2,0.01,0.02,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',2,'2015-04-15 08:12:01',NULL),(18,14,201504157816,'15216607660',5,1,3,0.01,0.03,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 08:16:34',NULL),(19,14,201504154529,'15216607660',5,1,2,0.01,0.02,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',2,'2015-04-15 08:21:25',NULL),(20,14,201504153586,'15216607660',5,1,2,0.01,0.02,'','茹憶','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 08:27:06',NULL),(21,14,201504150571,'15216607660',5,1,1,0.01,0.01,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 08:29:56',NULL),(22,14,201504153705,'15216607660',5,1,1,0.01,0.01,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 08:35:25',NULL),(23,14,201504156767,'15216607660',5,1,1,0.01,0.01,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 08:37:40',NULL),(24,14,201504152901,'15216607660',5,1,1,0.01,0.01,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 08:51:56',NULL),(25,14,201504157518,'15216607660',5,1,1,0.01,0.01,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 08:52:24',NULL),(26,14,201504157937,'15216607660',5,1,1,0.01,0.01,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 08:53:55',NULL),(27,14,201504157190,'15216607660',5,1,1,0.01,0.01,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 08:53:58',NULL),(28,14,201504150503,'15216607660',5,1,1,0.01,0.01,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 08:54:02',NULL),(29,14,201504159920,'15216607660',5,1,1,0.01,0.01,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 08:54:04',NULL),(30,14,201504159579,'15216607660',5,1,1,0.01,0.01,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 08:54:39',NULL),(31,14,201504154953,'15216607660',4,4,1,0.01,0.01,'','茹作军','15216607660','不规划行程的台湾环岛自由行','标准套餐','uploads/thumbs/201504/small_aeee907acbc.jpg','2015-05-27',1,'2015-04-15 09:07:35',NULL),(32,15,201504155333,'15216607660',5,1,3,0.01,0.03,'','ruzuojun','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',2,'2015-04-15 14:37:13',NULL),(33,17,201504154718,'15800931596',5,1,2,0.01,0.02,'','茹作军','15800931596','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',2,'2015-04-15 14:51:02',NULL),(34,17,201504166476,'15800931596',5,1,2,0.01,0.02,'','Andrew','15800931596','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-15 21:30:15',NULL),(35,15,201504169055,'15216607660',5,1,3,0.01,0.03,'','周杰伦','13845678900','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',2,'2015-04-16 00:53:45',NULL),(36,15,201504169579,'15216607660',5,1,2,0.01,0.02,'','ruzuojun','15689652369','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',2,'2015-04-16 09:59:39',NULL),(37,18,201504177090,'18817280611',5,1,1,0.01,0.01,'','徐洁','18817280611','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-17 06:04:46',NULL),(38,18,201504176671,'18817280611',4,4,1,0.01,0.01,'','小小','18817280611','不规划行程的台湾环岛自由行','标准套餐','uploads/thumbs/201504/small_aeee907acbc.jpg','2015-05-27',1,'2015-04-17 06:24:22',NULL),(39,20,201504173143,'13701912912',5,1,1,0.01,0.01,'','缪伟','13701912912','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-17 06:33:06',NULL),(40,15,201504170830,'15216607660',5,1,1,0.01,0.01,'','ruzuojun','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-17 06:41:10',NULL),(41,18,201504214013,'18817280611',7,8,1,2199.00,2199.00,'','悠悠洁','18817280611','上海直飞大阪5日往返，送1晚酒店','5.18或5.24出发','uploads/thumbs/201504/small_f3b6fd9f334.jpg','2015-05-24',3,'2015-04-21 08:48:41','2015-04-21 17:00:41'),(42,15,201504294787,'15216607660',7,8,3,2199.00,6597.00,'','ruzuojun','15216607660','上海直飞大阪5日往返机票','5.18或5.24出发','uploads/thumbs/201504/small_f3b6fd9f334.jpg','2015-05-24',1,'2015-04-29 08:42:36',NULL),(43,15,201504290299,'15216607660',5,1,1,0.01,0.01,'','ruzuojun','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-29 08:46:37',NULL),(44,15,201504294704,'15216607660',5,1,2,0.01,0.02,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',2,'2015-04-29 08:50:57',NULL),(45,15,201504297719,'15216607660',4,4,2,0.01,0.02,'','ruzuojun','15216607660','不规划行程的台湾环岛自由行','标准套餐','uploads/thumbs/201504/small_aeee907acbc.jpg','2015-05-27',2,'2015-04-29 09:17:39',NULL),(46,22,201504302883,'13916642439',5,1,1,0.01,0.01,'','q q q','13916642439','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-30 07:11:04',NULL),(47,22,201504303776,'13916642439',5,1,1,0.01,0.01,'','q q q','13916642439','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-30 07:11:32',NULL),(48,22,201504300412,'13916642439',5,1,1,0.01,0.01,'','缪伟','13916642439','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-30 07:14:30',NULL),(49,22,201504300090,'13916642439',5,1,1,0.01,0.01,'','缪伟','13916642439','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-30 07:14:30',NULL),(50,22,201504301470,'13916642439',5,1,1,0.01,0.01,'','缪伟','13916642439','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-30 07:15:35',NULL),(51,15,201504306969,'15216607660',5,1,2,0.01,0.02,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',2,'2015-04-30 07:35:09',NULL),(52,22,201504306959,'13916642439',5,1,1,0.01,0.01,'','缪伟','13916642439','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-30 07:53:09',NULL),(53,22,201504307445,'13916642439',5,1,1,0.01,0.01,'','缪伟','13916642439','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-04-30 07:53:16',NULL),(54,15,201505016645,'15216607660',7,9,1,400.00,400.00,'','茹作军','15216607660','上海直飞大阪5日往返机票','单人房差','uploads/thumbs/201504/small_f3b6fd9f334.jpg','2015-05-24',1,'2015-05-01 02:16:02',NULL),(55,15,201505019571,'15216607660',5,1,2,0.01,0.02,'','茹作军','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-05-01 02:26:57',NULL),(56,15,201505019947,'15216607660',7,9,1,400.00,400.00,'','茹作军','15216607660','上海直飞大阪5日往返机票','单人房差','uploads/thumbs/201504/small_f3b6fd9f334.jpg','2015-05-24',1,'2015-05-01 02:27:24',NULL),(57,23,201505046441,'18189503205',5,1,1,0.01,0.01,'','张三','18189503205','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-05-04 03:44:40',NULL),(58,23,201505048942,'18189503205',5,1,1,0.01,0.01,'','李四','18189503205','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-05-04 03:47:05',NULL),(59,23,201505043941,'18189503205',5,1,1,0.01,0.01,'','张三','18189503205','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-05-04 03:48:55',NULL),(60,15,201505040385,'15216607660',5,1,1,0.01,0.01,'','dfg','15216607660','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',2,'2015-05-04 03:50:46',NULL),(61,23,201505047798,'18189503205',5,1,1,0.01,0.01,'','啊','18189503205','游走天津卫·只为近近看着你','标准套餐','uploads/thumbs/201504/small_625ebf0b8c3.jpg','2016-02-04',1,'2015-05-04 03:52:05',NULL),(62,18,201505057221,'18817280611',7,9,1,400.00,400.00,'','幽幽洁','18817280611','上海直飞大阪5日往返机票','单人房差','uploads/thumbs/201504/small_f3b6fd9f334.jpg','2015-05-24',1,'2015-05-05 01:38:15',NULL),(63,18,201505055284,'18817280611',7,9,1,400.00,400.00,'','幽幽洁','18817280611','上海直飞大阪5日往返机票','单人房差','uploads/thumbs/201504/small_f3b6fd9f334.jpg','2015-05-24',1,'2015-05-05 01:39:18',NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL COMMENT '标题',
  `introduce` text COMMENT '简单描述',
  `content` mediumtext NOT NULL COMMENT '内容',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO KEYWORDS',
  `seo_description` text COMMENT 'SEO DESCRIPTION',
  `template` varchar(30) NOT NULL DEFAULT '' COMMENT '模板',
  `link` varchar(100) DEFAULT NULL COMMENT '外部链接',
  `attach_file` varchar(60) NOT NULL DEFAULT '' COMMENT '附件',
  `attach_thumb` varchar(60) NOT NULL DEFAULT '' COMMENT '附件小图',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '查看次数',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='单页';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES ('contact','咨询客服','','<div style=\"margin:0px 0px 15px;padding:0px;color:#666666;font-family:\'Microsoft Yahei\', Verdana, Lucida, Helvetica, Arial, sans-serif;font-size:13px;background-color:#FFFFFF;\">\r\n	您可以在微信公众号对话框中输入您所想咨询的问题。<img src=\"/wdm/public/emoticons/images/0.gif\" border=\"0\" alt=\"\" />\r\n</div>\r\n<span style=\"color:#666666;font-family:\'Microsoft Yahei\', Verdana, Lucida, Helvetica, Arial, sans-serif;font-size:13px;line-height:25px;background-color:#FFFFFF;\">咨询电话：400-920-8581</span><br />\r\n<span style=\"color:#666666;font-family:\'Microsoft Yahei\', Verdana, Lucida, Helvetica, Arial, sans-serif;font-size:13px;line-height:25px;background-color:#FFFFFF;\">咨询QQ群：313721242</span><br />\r\n<p>\r\n	<span style=\"color:#666666;font-family:\'Microsoft Yahei\', Verdana, Lucida, Helvetica, Arial, sans-serif;font-size:13px;line-height:25px;background-color:#FFFFFF;\">微信号：Wander-Moon</span>\r\n</p>\r\n<p>\r\n	<span><span style=\"font-size:13px;line-height:25px;background-color:#FFFFFF;\">请在后台单页管理里面修改本内容。</span></span>\r\n</p>','','','','','','','',0,0,'Y',1428323840,NULL);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '用户',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `title_second` varchar(255) NOT NULL DEFAULT '' COMMENT '副标题',
  `title_style` varchar(255) NOT NULL DEFAULT '' COMMENT '标题样式',
  `html_path` varchar(100) NOT NULL DEFAULT '' COMMENT 'html路径',
  `html_file` varchar(100) NOT NULL DEFAULT '' COMMENT 'html文件名',
  `catalog_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类',
  `special_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '专题编号',
  `introduce` text COMMENT '摘要',
  `image_list` text COMMENT '组图',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` text COMMENT 'SEO描述',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  `content` mediumtext NOT NULL COMMENT '内容',
  `copy_from` varchar(100) NOT NULL DEFAULT '' COMMENT '来源',
  `copy_url` varchar(255) NOT NULL DEFAULT '' COMMENT '来源url',
  `redirect_url` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转URL',
  `tags` varchar(255) NOT NULL DEFAULT '' COMMENT 'tags',
  `view_count` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '查看次数',
  `commend` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '推荐',
  `attach_status` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '是否上传附件',
  `attach_file` varchar(255) NOT NULL DEFAULT '' COMMENT '附件名称',
  `attach_thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '附件缩略图',
  `favorite_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数量',
  `attention_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关注次数',
  `top_line` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '置顶',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  `reply_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复次数',
  `reply_allow` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '允许评论',
  `sort_desc` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `tags_index` (`tags`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COMMENT='内容管理';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (49,1,'游走天津卫·只为近近看着你','sdsds','','','',22,0,'HI，大家好依旧是我猫火火，对我又出门了【这次是端午节小长假啦】这次的出行计划跟以往有小小的不同，因为这次主要目的并不是游玩是为了看我从小到大一直喜欢的偶像【孙燕姿】的演唱会！','','',NULL,'','<span style=\"color:#666666;font-family:\'Microsoft Yahei\';font-size:13px;line-height:24px;background-color:#FFFFFF;\">时间一长真觉得她好有才啊~第一首歌【超快感】喜欢最后的口哨~渐渐的她越来越红，还是依旧的短发，随性，直来直往，做自己喜欢的事，并不为迎合谁儿活着，和我一样，这大概也是我一直喜欢她的原因。</span><br />\r\n<span style=\"color:#666666;font-family:\'Microsoft Yahei\';font-size:13px;line-height:24px;background-color:#FFFFFF;\">好吧，其它游记链接就不发啦~如果大家喜欢手绘旅行的，可以看看火火的其它作品o~希望能帮到大家呢！</span><br />\r\n<p style=\"color:#666666;font-family:\'Microsoft Yahei\';font-size:13px;background-color:#FFFFFF;\">\r\n	如果想找到我…可以给我微博私信哦~\r\n</p>\r\n<p style=\"color:#666666;font-family:\'Microsoft Yahei\';font-size:13px;background-color:#FFFFFF;\">\r\n	<img src=\"http://localhost/wdm/uploads/attached/image/201504/ca876e005f6.jpg\" alt=\"\" style=\"width:624px;\" /> \r\n</p>\r\n<p style=\"color:#666666;font-family:\'Microsoft Yahei\';font-size:13px;background-color:#FFFFFF;\">\r\n	进入令人沉醉向往的4月，装上相机，带上亲朋，面对已经春光满园的大地，让我们一起用镜头把美景采摘回去吧！<img src=\"http://localhost/wdm/uploads/attached/image/201504/9168cc8be28.jpg\" alt=\"\" style=\"width:624px;\" /> \r\n</p>\r\n<p style=\"color:#666666;font-family:\'Microsoft Yahei\';font-size:13px;background-color:#FFFFFF;\">\r\n	进入令人沉醉向往的4月，装上相机，带上亲朋，面对已经春光满园的大地，让我们一起用镜头把美景采摘回去吧！<img src=\"http://localhost/wdm/uploads/attached/image/201504/057aee24a97.jpg\" alt=\"\" style=\"width:624px;\" /> \r\n</p>','','','','',28,'N','N','uploads/images/201504/febef9bfa22.jpg','uploads/thumbs/201504/small_febef9bfa22.jpg',0,0,'N',1429868368,0,'Y',0,'Y',1429694296);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户',
  `realname` varchar(50) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `email` varchar(60) NOT NULL DEFAULT '' COMMENT '邮箱',
  `telephone` varchar(20) NOT NULL DEFAULT '' COMMENT '电话',
  `qq` varchar(12) DEFAULT NULL COMMENT 'qq',
  `question` text NOT NULL COMMENT '内容',
  `client_ip` varchar(15) DEFAULT NULL COMMENT 'ip',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发送时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='留言反馈表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recommend`
--

DROP TABLE IF EXISTS `recommend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recommend` (
  `id` int(10) unsigned NOT NULL COMMENT '推荐位id',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐内容id',
  `sort_order` int(10) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`,`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐内容表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recommend`
--

LOCK TABLES `recommend` WRITE;
/*!40000 ALTER TABLE `recommend` DISABLE KEYS */;
/*!40000 ALTER TABLE `recommend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recommend_position`
--

DROP TABLE IF EXISTS `recommend_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recommend_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '推荐位id',
  `recommend_name` varchar(100) DEFAULT NULL COMMENT '推荐位名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '栏目类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='推荐位表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recommend_position`
--

LOCK TABLES `recommend_position` WRITE;
/*!40000 ALTER TABLE `recommend_position` DISABLE KEYS */;
/*!40000 ALTER TABLE `recommend_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '回复id',
  `user_id` int(10) unsigned DEFAULT NULL COMMENT '用户id',
  `cid` int(10) unsigned DEFAULT NULL COMMENT '评论id',
  `reply_id` int(10) unsigned DEFAULT NULL COMMENT '上级回复的id',
  `content` text COMMENT '回复内容',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '显示状态',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='评论回复表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reply`
--

LOCK TABLES `reply` WRITE;
/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` VALUES ('4rj64eo4r97s8v3dnfgq0dt243',1430801972,''),('e4jm404m940rrve4rqge79sen4',1430801926,''),('fp6ijrds46ggb38ujct3mgigc1',1430801969,''),('ph3n4i6g2cu6akmijs119pgba3',1430801969,'');
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `scope` varchar(30) NOT NULL DEFAULT '' COMMENT '范围',
  `variable` varchar(50) NOT NULL COMMENT '变量',
  `value` text COMMENT '值',
  PRIMARY KEY (`variable`,`scope`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统配置';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES ('base','admin_email','admin@126.com'),('base','admin_logger','open'),('base','admin_telephone','180000000'),('email','email_fromname',''),('email','email_host',''),('email','email_password',''),('email','email_port','25'),('email','email_timeout','2'),('email','email_totest',''),('email','email_username',''),('base','safe_str','!(*&%'),('seo','seo_description','我的鹿'),('seo','seo_keywords','我的鹿'),('seo','seo_title','我的鹿'),('base','site_closed_summary','系统维护中，请稍候......'),('base','site_copyright','Copyright @ 2014-2015'),('base','site_domain','/'),('base','site_icp','京ICP备XXXXXX号-1'),('base','site_name','我的鹿'),('base','site_stats',''),('cache','cache_status','open'),('cache','cache_type','filecache'),('cache','setting_filecache','a:2:{s:5:\"class\";s:10:\"CFileCache\";s:14:\"directoryLevel\";s:1:\"2\";}'),('cache','setting_memcache','a:3:{s:5:\"class\";s:9:\"CMemCache\";s:4:\"host\";s:9:\"localhost\";s:4:\"port\";s:5:\"11211\";}'),('cache','setting_rediscache','a:4:{s:5:\"class\";s:21:\"ext.redis.CRedisCache\";s:4:\"host\";s:9:\"localhost\";s:4:\"port\";s:4:\"6379\";s:8:\"database\";i:0;}'),('base','site_status','open'),('base','site_status_intro','网站目前正在维护，请稍后访问，谢谢....'),('template','template','default'),('template','theme','default'),('upload','upload_allow_ext','jpg,gif,bmp,jpeg,png,doc,zip,rar,7z,txt,sql,pdf,chm,avi,mp4,flv,swf'),('upload','upload_max_size','20480'),('upload','upload_water_alpha','50'),('upload','upload_water_pic','public/watermark.png'),('upload','upload_water_scope','100x100'),('upload','upload_water_size','100x100'),('upload','upload_water_status','open'),('base','user_mail_verify','open'),('base','user_status','open'),('custom','_address','北京市朝阳区'),('custom','_fax','传真:XXXXXX'),('custom','_mobile','180000000'),('custom','_telephone','XXXXXXXXXXX'),('access','',''),('email','email_active','close'),('access','deny_register_ip',''),('base','encrypt','md5'),('access','deny_access_ip','192.168.1.1');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soft`
--

DROP TABLE IF EXISTS `soft`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soft` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT '' COMMENT '软件标题',
  `catalog_id` smallint(5) unsigned DEFAULT '0' COMMENT '分类id ',
  `soft_icon` varchar(100) DEFAULT NULL COMMENT '软件图标',
  `cover_image` varchar(100) DEFAULT '' COMMENT '封面图片',
  `fileid` varchar(255) DEFAULT NULL COMMENT '文件id',
  `filetype` varchar(10) NOT NULL DEFAULT '' COMMENT '文件类型',
  `language` varchar(10) NOT NULL DEFAULT '' COMMENT '软件语言',
  `softtype` varchar(10) NOT NULL DEFAULT '' COMMENT '软件类型',
  `os` varchar(100) NOT NULL DEFAULT '' COMMENT '操作系统',
  `softrank` enum('5','4','3','2','1') NOT NULL DEFAULT '5' COMMENT '软件等级',
  `softsize` varchar(10) NOT NULL DEFAULT '' COMMENT '软件大小',
  `softlink` varchar(100) DEFAULT '' COMMENT '软件外部下载链接',
  `introduce` text COMMENT '软件简介',
  `pay` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '支付费用',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '最近更新时间',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `view_count` int(10) unsigned DEFAULT '0' COMMENT '浏览次数',
  `down_count` smallint(8) unsigned DEFAULT '0' COMMENT '下载次数',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` text COMMENT 'SEO描述',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='软件管理表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soft`
--

LOCK TABLES `soft` WRITE;
/*!40000 ALTER TABLE `soft` DISABLE KEYS */;
/*!40000 ALTER TABLE `soft` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `special`
--

DROP TABLE IF EXISTS `special`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `title_alias` varchar(255) NOT NULL DEFAULT '' COMMENT '标题别名',
  `intro` text COMMENT '描述',
  `content` text COMMENT '详细介绍',
  `attach_thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '附件缩略图',
  `attach_file` varchar(255) NOT NULL DEFAULT '' COMMENT '附件名称',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo关键字',
  `seo_description` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo描述',
  `template` varchar(50) NOT NULL DEFAULT '' COMMENT '模板',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '入库时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='专题';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `special`
--

LOCK TABLES `special` WRITE;
/*!40000 ALTER TABLE `special` DISABLE KEYS */;
/*!40000 ALTER TABLE `special` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(100) NOT NULL COMMENT 'tag名称',
  `data_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数据总数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COMMENT='新闻标签';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag_data`
--

DROP TABLE IF EXISTS `tag_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag_data` (
  `tag_id` int(10) unsigned NOT NULL DEFAULT '0',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned DEFAULT '1' COMMENT '栏目类型',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  PRIMARY KEY (`tag_id`,`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='内容标签关联表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag_data`
--

LOCK TABLES `tag_data` WRITE;
/*!40000 ALTER TABLE `tag_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload`
--

DROP TABLE IF EXISTS `upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户名',
  `real_name` varchar(255) NOT NULL DEFAULT '' COMMENT '原始文件名称',
  `file_name` varchar(100) NOT NULL DEFAULT '' COMMENT '带路径文件名',
  `thumb_name` varbinary(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `file_ext` varchar(5) NOT NULL DEFAULT 'jpg' COMMENT '扩展名称',
  `file_mime` varchar(50) NOT NULL DEFAULT '' COMMENT '文件头信息',
  `file_size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `down_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8 COMMENT='附件';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload`
--

LOCK TABLES `upload` WRITE;
/*!40000 ALTER TABLE `upload` DISABLE KEYS */;
INSERT INTO `upload` VALUES (113,1,'1.jpg','uploads/attached/image/201504/16a65af046c.jpg','uploads/thumbs/201504/small_16a65af046c.jpg','jpg','application/octet-stream',146499,0,1428320985),(114,1,'2.jpg','uploads/attached/image/201504/6efa4f01394.jpg','uploads/thumbs/201504/small_6efa4f01394.jpg','jpg','application/octet-stream',127363,0,1428320986),(115,1,'3.jpg','uploads/attached/image/201504/97f3bd3a00b.jpg','uploads/thumbs/201504/small_97f3bd3a00b.jpg','jpg','application/octet-stream',448553,0,1428320986),(116,1,'1.jpg','uploads/attached/image/201504/ca876e005f6.jpg','uploads/thumbs/201504/small_ca876e005f6.jpg','jpg','application/octet-stream',146499,0,1428321426),(117,1,'2.jpg','uploads/attached/image/201504/9168cc8be28.jpg','uploads/thumbs/201504/small_9168cc8be28.jpg','jpg','application/octet-stream',127363,0,1428321426),(118,1,'3.jpg','uploads/attached/image/201504/057aee24a97.jpg','uploads/thumbs/201504/small_057aee24a97.jpg','jpg','application/octet-stream',448553,0,1428321427),(119,1,'3.jpg','uploads/attached/image/201504/622e038a8a2.jpg','uploads/thumbs/201504/small_622e038a8a2.jpg','jpg','application/octet-stream',448553,0,1428323301),(120,1,'1.jpg','uploads/attached/image/201504/54f2a44c0f7.jpg','uploads/thumbs/201504/small_54f2a44c0f7.jpg','jpg','application/octet-stream',146499,0,1428323301),(121,1,'2.jpg','uploads/attached/image/201504/29e80823448.jpg','uploads/thumbs/201504/small_29e80823448.jpg','jpg','application/octet-stream',127363,0,1428323302);
/*!40000 ALTER TABLE `upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `groupid` int(10) unsigned DEFAULT '1' COMMENT '用户组id',
  `status` tinyint(2) DEFAULT '1' COMMENT '-1待审核 0 -禁用  1-通过',
  `addtime` int(10) DEFAULT NULL COMMENT '注册时间',
  `avatar` varchar(100) DEFAULT NULL COMMENT '头像',
  `nickname` varchar(50) DEFAULT NULL COMMENT '昵称',
  `sign` varchar(100) DEFAULT NULL COMMENT '个性签名',
  `web` varchar(100) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL COMMENT '手机号码',
  `qq` varchar(11) DEFAULT NULL COMMENT 'qq号码',
  `register_ip` varchar(15) DEFAULT '0.0.0.0' COMMENT '注册ip',
  `last_login_ip` varchar(15) DEFAULT '0.0.0.0' COMMENT '上次登录ip',
  `logins` int(10) unsigned DEFAULT '0' COMMENT '登录次数',
  `username_editable` enum('Y','N') DEFAULT 'N' COMMENT '用户名是否可编辑',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 DELAY_KEY_WRITE=1 COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','7fef6171469e80d32c0559f88b377245','admin@admin.com',10,1,1427882323,NULL,NULL,NULL,NULL,'','','127.0.0.1','0.0.0.0',0,'N'),(14,'15216607661','25d55ad283aa400af464c76d713c07ad','',1,1,1428558114,NULL,'wandermoon用户',NULL,NULL,'15216607660',NULL,'127.0.0.1','0.0.0.0',0,'N'),(15,'15216607660','25d55ad283aa400af464c76d713c07ad','',1,1,1429105797,NULL,'wandermoon用户',NULL,NULL,'15216607660',NULL,'211.161.249.87','0.0.0.0',0,'N'),(16,'15216607760','25d55ad283aa400af464c76d713c07ad','',1,1,1429109322,NULL,'wandermoon用户',NULL,NULL,'15216607760',NULL,'211.161.249.87','0.0.0.0',0,'N'),(17,'15800931596','e10adc3949ba59abbe56e057f20f883e','',1,1,1429109398,NULL,'wandermoon用户',NULL,NULL,'15800931596',NULL,'211.161.249.87','0.0.0.0',0,'N'),(18,'18817280611','3f39b7d4b7750b7d2379f7f6af7a509c','',1,1,1429250479,NULL,'wandermoon用户',NULL,NULL,'18817280611',NULL,'122.225.33.100','0.0.0.0',0,'N'),(19,'15921802894','3999dd49b5ff64bbae714b1067b056a9','',1,1,1429251917,NULL,'wandermoon用户',NULL,NULL,'15921802894',NULL,'222.44.97.47','0.0.0.0',0,'N'),(20,'13701912912','e10adc3949ba59abbe56e057f20f883e','',1,1,1429252346,NULL,'wandermoon用户',NULL,NULL,'13701912912',NULL,'223.104.5.232','0.0.0.0',0,'N'),(21,'客服','0444e11e0501438bda1af664f36974de','',10,1,1429606989,NULL,NULL,NULL,NULL,'','','0.0.0.0','0.0.0.0',0,'N'),(22,'13916642439','e10adc3949ba59abbe56e057f20f883e','',1,1,1430377824,NULL,'wandermoon用户',NULL,NULL,'13916642439',NULL,'180.175.176.122','0.0.0.0',0,'N'),(23,'18189503205','e10adc3949ba59abbe56e057f20f883e','',1,1,1430710908,NULL,'wandermoon用户',NULL,NULL,'18189503205',NULL,'61.178.84.37','0.0.0.0',0,'N');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(30) DEFAULT '' COMMENT '用户组名称',
  `acl` text COMMENT '权限控制',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='用户组';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` VALUES (1,'普通用户',''),(10,'系统管理员','Administrator');
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT '' COMMENT '视频名称',
  `catalog_id` smallint(5) unsigned DEFAULT '0' COMMENT '分类id ',
  `cover_image` varchar(100) DEFAULT '' COMMENT '封面图片',
  `fileid` varchar(255) DEFAULT NULL COMMENT '文件id',
  `language` varchar(10) NOT NULL DEFAULT '' COMMENT '视频语言',
  `video_type` varchar(10) NOT NULL DEFAULT '' COMMENT '视频类型',
  `video_score` decimal(3,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '视频评分',
  `video_size` varchar(10) NOT NULL DEFAULT '' COMMENT '视频大小',
  `download` varchar(100) DEFAULT '' COMMENT '下载链接',
  `introduce` text COMMENT '软件简介',
  `pay` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '支付费用',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '最近更新时间',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `view_count` smallint(8) unsigned DEFAULT NULL COMMENT '观看次数',
  `down_count` smallint(8) unsigned DEFAULT '0' COMMENT '下载次数',
  `voted` varchar(100) DEFAULT NULL COMMENT '投票结果',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` text COMMENT 'SEO描述',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='视频管理表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-05 15:34:21
