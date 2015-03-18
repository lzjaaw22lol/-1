-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 03 月 18 日 13:42
-- 服务器版本: 5.5.29
-- PHP 版本: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `myproject`
--

-- --------------------------------------------------------

--
-- 表的结构 `entrust`
--

CREATE TABLE `entrust` (
  `enid` int(11) NOT NULL AUTO_INCREMENT,
  `pulishid` int(11) NOT NULL,
  `acceptid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  PRIMARY KEY (`enid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `entrust`
--

INSERT INTO `entrust` (`enid`, `pulishid`, `acceptid`, `taskid`) VALUES
(4, 1, 0, 4),
(5, 26, 1, 28),
(6, 1, 26, 2),
(7, 1, 0, 1),
(8, 2, 0, 5),
(9, 2, 0, 6),
(10, 2, 0, 7);

-- --------------------------------------------------------

--
-- 表的结构 `option`
--

CREATE TABLE `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `schedule`
--

CREATE TABLE `schedule` (
  `scid` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `s_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `schedule`
--

INSERT INTO `schedule` (`scid`, `state`, `s_date`) VALUES
(4, 0, '2015-03-01 20:27:56'),
(5, 0, '2015-03-04 17:49:00'),
(5, 1, '2015-03-04 18:07:18'),
(6, 1, '2015-03-06 10:09:05'),
(6, 0, '2015-03-06 10:10:53'),
(6, 2, '2015-03-06 10:11:59'),
(6, 3, '2015-03-06 10:14:42'),
(6, 4, '2015-03-06 10:14:49'),
(6, 5, '2015-03-06 10:15:14');

-- --------------------------------------------------------

--
-- 表的结构 `tasks`
--

CREATE TABLE `tasks` (
  `taskid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `money` int(10) NOT NULL,
  `t_phone` varchar(15) NOT NULL,
  `detail` text NOT NULL,
  `voiceaddr` varchar(50) NOT NULL,
  `picaddr` varchar(50) NOT NULL,
  `t_date` datetime NOT NULL,
  `tendercount` int(10) NOT NULL,
  PRIMARY KEY (`taskid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `tasks`
--

INSERT INTO `tasks` (`taskid`, `userid`, `type`, `money`, `t_phone`, `detail`, `voiceaddr`, `picaddr`, `t_date`, `tendercount`) VALUES
(1, 1, '定制头像', 100, '19191929292', '打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打发士大夫士大夫似的', 'slslslslslslslslsl', 'owowowowowowowowowow', '2015-02-16 02:32:23', 2),
(2, 1, '定制头像', 100, '19191929292', '打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡水电费水电费水电费', 'slslslslslslslslsl', 'owowowowowowowowowow', '2015-02-16 02:33:36', 2),
(4, 1, '网站建设', 100, '19191929292', '打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡请问请问请问认为二位', 'slslslslslslslslsl', 'owowowowowowowowowow', '2015-02-16 02:37:05', 0),
(5, 2, '定制头像', 100, '1928347563', '打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡', 'slslslslslslslslsl', 'owowowowowowowowowow', '2015-02-16 02:37:46', 2),
(6, 2, '定制头像', 100, '19283746573', '打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡打卡二锅头回复该部分的用户退货', 'slslslslslslslslsl', 'owowowowowowowowowow', '2015-02-16 02:38:14', 0),
(7, 2, '定制头像', 123, '123123', '1上电脑上看到付款的口袋里放干净多了罚款', '2', '2', '2015-02-17 13:27:59', 0),
(28, 26, '定制头像', 44, '12356478542', 'H', '0', '0', '2015-02-28 14:46:10', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tender`
--

CREATE TABLE `tender` (
  `ten_userid` int(11) NOT NULL,
  `ten_taskid` int(11) NOT NULL,
  `ten_date` datetime NOT NULL,
  `say` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `tender`
--

INSERT INTO `tender` (`ten_userid`, `ten_taskid`, `ten_date`, `say`) VALUES
(1, 5, '2015-02-18 08:49:21', '投标'),
(4, 5, '2015-02-18 08:49:21', '投标111'),
(4, 1, '2015-02-18 08:49:43', ''),
(4, 2, '2015-02-18 08:49:43', ''),
(26, 1, '2015-03-04 14:43:23', '他天天天天天天天天天天天天'),
(26, 2, '2015-03-04 14:43:23', '呀呀呀呀呀呀呀呀呀呀呀呀呀呀呀呀'),
(1, 28, '2015-03-04 14:51:41', '发反反复复反反复复反反复复'),
(2, 28, '2015-03-04 14:51:41', '的顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶'),
(1, 6, '2015-03-07 18:05:06', 'e'),
(1, 5, '2015-03-08 20:21:03', '我要投5');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userinfo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userwhich` int(3) NOT NULL,
  `u_phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `headpic` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_date` datetime NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userid`, `username`, `pwd`, `userinfo`, `userwhich`, `u_phone`, `headpic`, `u_date`) VALUES
(1, 'qq1', '1', '搜快点开始受到城市看得出vskdvmslkdvmlksmlkejkmsdvmslkdvnkrvskkb', 0, '17263748211', 'http://localhost:8888/project/upload/2015-03-18-11-09-13_qq1.png', '2015-02-16 02:23:22'),
(2, 'ww1', '1', '积分卡片饿哦付款方式vklakpowqirkmkvvsop', 0, '13516538584', 'http://localhost:8888/project/headimgs/username1_20141213.png', '2015-02-16 02:23:22'),
(4, 'ee1', '1', '的老婆饿哦体育和你爸妈吃毛线，真的离开vmlvjwqkowkfovv', 1, '171717171717', 'http://localhost:8888/project/headimgs/username2_20141213.png', '2015-02-16 02:29:24'),
(5, 'tt', 't1', 'tttttttttttttttt', 1, '12345', '23452', '2015-02-22 17:22:43'),
(18, 'uuu', 'u1', '庄老师打了快结束了开发建设的考虑放假了深刻放假了', 0, '13516382837', 'tttt', '2015-02-23 17:42:08'),
(19, 'G', 'g', 'Yyyyyyyyyyyyyy', 0, '12365478987', '图片.png', '2015-02-25 16:53:04'),
(20, 'T', 't', 'Rrrrr', 0, '12345678987', '图片.png', '2015-02-25 17:03:17'),
(21, 'R', 'r', 'Ty', 0, '12355469870', '图片.png', '2015-02-25 17:10:33'),
(22, 'Y', 'y', 'Ttttttt', 0, '36987452147', '图片.png', '2015-02-25 17:18:46'),
(23, 'Ever', 'e', 'Yyyyyy', 0, '12345678980', '图片.png', '2015-02-25 17:28:25'),
(24, 'tt', '1', '1', 1, '1', '1', '2015-02-25 17:41:14'),
(25, 'tt', '1', '1', 1, '1', '1', '2015-02-25 17:41:38'),
(26, 'C', 'c', 'Uh', 0, '12356478542', 'http://localhost:8888/project/headimgs/username2_20141213.png', '2015-02-28 10:05:17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
