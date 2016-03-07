-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-03-05 09:04:32
-- 服务器版本： 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xxfeng`
--

-- --------------------------------------------------------

--
-- 表的结构 `xxf_article`
--

CREATE TABLE IF NOT EXISTS `xxf_article` (
  `id` mediumint(8) unsigned NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '管理员id',
  `title` varchar(90) NOT NULL DEFAULT '' COMMENT '标题',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '所属分类 article_category主键',
  `author` varchar(20) NOT NULL,
  `content` text NOT NULL COMMENT '内容',
  `brief` text NOT NULL,
  `tags` text NOT NULL,
  `link` varchar(225) NOT NULL DEFAULT '' COMMENT '外链',
  `sort` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `cover` varchar(100) NOT NULL DEFAULT '0' COMMENT '封面',
  `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `is_top` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '数据状态'
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='文章咨询表  别名art';

--
-- 转存表中的数据 `xxf_article`
--

INSERT INTO `xxf_article` (`id`, `uid`, `title`, `cate_id`, `author`, `content`, `brief`, `tags`, `link`, `sort`, `cover`, `view`, `is_top`, `create_time`, `update_time`, `status`) VALUES
(47, 0, 'JavaScript 事件——“事件类型', 49, '薛晓峰', '<span style="color:#777777;font-family:''Open Sans'', ''Helvetica Neue'', Helvetica, Arial, STHeiti, ''Microsoft Yahei'', SimSun, sans-serif;font-size:13px;line-height:20.8px;background-color:#FFFFFF;">备事件 orientationchange事件 该事件的window.orientation属性中包含3个值：0表示肖像模式、90表示左旋转的横向模式、-90表示右旋转的横向模式。event对象不包含任何信息： {代码...} deviceorientationevent...</span>', '备事件 orientationchange事件 该事件的window.orientation属性中包含3个值：0表示肖像模式、90表示左旋转的横向模式、-90表示右旋转的横向模式。event对象不包含任何信息： {代码...} deviceorientationevent...', 'js', '', 0, '/article/20160120/thumb_igQ1z5JUVmc3SgIFb7oD.jpg', 0, 0, 1453253448, 1453363218, 1),
(46, 0, 'JavaScript 事件——“内存和性能”的注意要点', 49, '薛晓峰', '<span style="color:#777777;font-family:''Open Sans'', ''Helvetica Neue'', Helvetica, Arial, STHeiti, ''Microsoft Yahei'', SimSun, sans-serif;font-size:13px;line-height:20.8px;background-color:#FFFFFF;">事件委托 对“事件处理程序过多”的问题的解决方案就是事件委托。例如，click事件会一直冒泡到document层次。也就是说，我们可以为整个页面指定一个onclick事件处理程序，而不必给每个可单击的元素分别添加事件处理...</span>', '事件委托 对“事件处理程序过多”的问题的解决方案就是事件委托。例如，click事件会一直冒泡到document层次。也就是说，我们可以为整个页面指定一个onclick事件处理程序，而不必给每个可单击的元素分别添加事件处理...', 'js,php', '', 0, '/article/20160120/thumb_0E6r47zPaaxYT3SNwHSV.jpg', 0, 1, 1453253420, 1453448102, 1),
(45, 0, 'Yeoman-- 一个强大的前端构建工具', 49, '薛晓峰', '<span style="color:#777777;font-family:''Open Sans'', ''Helvetica Neue'', Helvetica, Arial, STHeiti, ''Microsoft Yahei'', SimSun, sans-serif;font-size:13px;line-height:20.8px;background-color:#FFFFFF;">原文还是在简书上： Yeoman-- 一个强大的前端构建工具,我只是自己的搬运工！！ 上期跟大家试了试Vue-cli这个构建工具，这个让我想起了很多其他的前端工具，其中一个就是Yeoman（上次就剧透了的）,所以这期跟大家...</span>', '原文还是在简书上： Yeoman-- 一个强大的前端构建工具,我只是自己的搬运工！！ 上期跟大家试了试Vue-cli这个构建工具，这个让我想起了很多其他的前端工具，其中一个就是Yeoman（上次就剧透了的）,所以这期跟大家...', 'php', '', 0, '/article/20160120/thumb_shJkwDjgJRaGb7DutNRd.jpg', 0, 1, 1453253367, 1453253384, 1);

-- --------------------------------------------------------

--
-- 表的结构 `xxf_article_category`
--

CREATE TABLE IF NOT EXISTS `xxf_article_category` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '分类ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '分类名称',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `link` varchar(225) NOT NULL DEFAULT '' COMMENT '外链',
  `sort` int(10) unsigned NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '数据状态'
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COMMENT='分类表 别名art_cate';

--
-- 转存表中的数据 `xxf_article_category`
--

INSERT INTO `xxf_article_category` (`id`, `name`, `parent_id`, `link`, `sort`, `create_time`, `update_time`, `status`) VALUES
(51, 'nginx', 0, '', 77, 1446886453, 1447233087, 1),
(49, 'php', 0, '', 99, 1446606266, 1447387322, 1),
(52, 'mysql', 0, '', 88, 1446886472, 0, 1),
(56, '22', 49, '', 0, 1456544508, 0, 1);

--
-- 触发器 `xxf_article_category`
--
DELIMITER $$
CREATE TRIGGER `_after_delete_article_category_` AFTER DELETE ON `xxf_article_category`
 FOR EACH ROW delete from xxf_article where cate_id = old.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `xxf_background`
--

CREATE TABLE IF NOT EXISTS `xxf_background` (
  `id` int(10) unsigned NOT NULL,
  `img` varchar(100) NOT NULL,
  `update_time` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='背景图片';

--
-- 转存表中的数据 `xxf_background`
--

INSERT INTO `xxf_background` (`id`, `img`, `update_time`, `status`) VALUES
(29, '/background/20160220/zrJjQg2JprEt03gntGas.jpg', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `xxf_config`
--

CREATE TABLE IF NOT EXISTS `xxf_config` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `about` text NOT NULL,
  `icp` varchar(60) NOT NULL,
  `index_page` int(2) unsigned NOT NULL,
  `admin_page` int(2) unsigned NOT NULL,
  `logo` varchar(100) NOT NULL,
  `tj` text NOT NULL,
  `update_time` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `xxf_config`
--

INSERT INTO `xxf_config` (`id`, `title`, `description`, `keywords`, `about`, `icp`, `index_page`, `admin_page`, `logo`, `tj`, `update_time`, `status`) VALUES
(1, 'xuexiaofeng.com', '专注于PHP与HTML5开发。', 'HTML5,PHP', '你是谁了', '1', 15, 15, '/config/20160130/ZxY6KgtdBPro6kCxWl7t.jpg', '1', 1457147225, 1);

-- --------------------------------------------------------

--
-- 表的结构 `xxf_friendly_link`
--

CREATE TABLE IF NOT EXISTS `xxf_friendly_link` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `logo` varchar(60) NOT NULL DEFAULT '',
  `update_time` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xxf_friendly_link`
--

INSERT INTO `xxf_friendly_link` (`id`, `title`, `link`, `logo`, `update_time`, `status`) VALUES
(5, '百度', 'https://www.baidu.com/', '/link/20151216/Prpg3QSDf4FYUd0JETeZ.png', 0, 1),
(6, '百度', 'https://www.baidu.com/', '', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `xxf_message`
--

CREATE TABLE IF NOT EXISTS `xxf_message` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `head` varchar(255) NOT NULL DEFAULT '',
  `nickname` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `web_url` varchar(100) NOT NULL,
  `province` varchar(20) NOT NULL DEFAULT '',
  `city` varchar(20) NOT NULL DEFAULT '',
  `ip` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `create_time` int(10) unsigned NOT NULL,
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='留言';

--
-- 转存表中的数据 `xxf_message`
--

INSERT INTO `xxf_message` (`id`, `parent_id`, `uid`, `head`, `nickname`, `email`, `web_url`, `province`, `city`, `ip`, `content`, `create_time`, `is_show`, `status`) VALUES
(5, 0, 0, 'http://www.gravatar.com/avatar/d40fe5343bcafa0e7ca9799f2e40eff6?s=40&d=mm&r=g', '大大', '111@163.com', '', '天津', '天津', '', '你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了你是谁了', 1457077743, 0, 1),
(7, 0, 0, 'http://www.gravatar.com/avatar/0df01ae7dd51cec48fed56952f40842b?s=40&d=mm&r=g', 'asdas', 'dasdasd', '', '天津', '天津', '', 'asdasd', 1457080938, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `xxf_nav`
--

CREATE TABLE IF NOT EXISTS `xxf_nav` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `url` varchar(100) NOT NULL DEFAULT '',
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  `target` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `active` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xxf_nav`
--

INSERT INTO `xxf_nav` (`id`, `name`, `url`, `sort`, `target`, `status`, `active`) VALUES
(1, '首页', '/myblog', 99, 0, 1, 'Index'),
(2, '微语', '/myblog/Twitter', 99, 0, 1, 'Twitter'),
(3, '一些音乐', '/myblog/Music', 0, 1, 0, 'Music'),
(6, '留言', '/myblog/Message', 0, 0, 1, 'Message');

-- --------------------------------------------------------

--
-- 表的结构 `xxf_tag`
--

CREATE TABLE IF NOT EXISTS `xxf_tag` (
  `id` int(10) unsigned NOT NULL,
  `tag_name` varchar(60) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xxf_tag`
--

INSERT INTO `xxf_tag` (`id`, `tag_name`) VALUES
(5, 'nginx'),
(6, 'php'),
(7, 'mysql'),
(14, 'js'),
(15, 'ppp'),
(16, '');

-- --------------------------------------------------------

--
-- 表的结构 `xxf_twitter`
--

CREATE TABLE IF NOT EXISTS `xxf_twitter` (
  `id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `create_time` int(10) unsigned NOT NULL,
  `update_time` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xxf_twitter`
--

INSERT INTO `xxf_twitter` (`id`, `content`, `create_time`, `update_time`, `status`) VALUES
(2, '111', 1457166477, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `xxf_user`
--

CREATE TABLE IF NOT EXISTS `xxf_user` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `nickname` varchar(60) NOT NULL DEFAULT '',
  `head` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `role` varchar(60) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `xxf_user`
--

INSERT INTO `xxf_user` (`id`, `username`, `password`, `nickname`, `head`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '薛晓峰', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `xxf_article`
--
ALTER TABLE `xxf_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_category_status` (`cate_id`,`status`),
  ADD KEY `idx_status_type_pid` (`status`,`uid`);

--
-- Indexes for table `xxf_article_category`
--
ALTER TABLE `xxf_article_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_name` (`name`),
  ADD KEY `pid` (`parent_id`);

--
-- Indexes for table `xxf_background`
--
ALTER TABLE `xxf_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xxf_config`
--
ALTER TABLE `xxf_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xxf_friendly_link`
--
ALTER TABLE `xxf_friendly_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xxf_message`
--
ALTER TABLE `xxf_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xxf_nav`
--
ALTER TABLE `xxf_nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xxf_tag`
--
ALTER TABLE `xxf_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xxf_twitter`
--
ALTER TABLE `xxf_twitter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xxf_user`
--
ALTER TABLE `xxf_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xxf_article`
--
ALTER TABLE `xxf_article`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `xxf_article_category`
--
ALTER TABLE `xxf_article_category`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `xxf_background`
--
ALTER TABLE `xxf_background`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `xxf_config`
--
ALTER TABLE `xxf_config`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `xxf_friendly_link`
--
ALTER TABLE `xxf_friendly_link`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `xxf_message`
--
ALTER TABLE `xxf_message`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `xxf_nav`
--
ALTER TABLE `xxf_nav`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `xxf_tag`
--
ALTER TABLE `xxf_tag`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `xxf_twitter`
--
ALTER TABLE `xxf_twitter`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `xxf_user`
--
ALTER TABLE `xxf_user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
