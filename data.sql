-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 06 2018 г., 02:03
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cu02670_nolix`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db_back`
--

CREATE TABLE IF NOT EXISTS `db_back` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `sum` double NOT NULL DEFAULT '0',
  `bank` double NOT NULL DEFAULT '5900',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_back_temp`
--

CREATE TABLE IF NOT EXISTS `db_back_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `sum` double NOT NULL DEFAULT '0',
  `bank` double NOT NULL DEFAULT '5900',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_bonus_list`
--

CREATE TABLE IF NOT EXISTS `db_bonus_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purse` varchar(20) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `sum` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67272 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_competition`
--

CREATE TABLE IF NOT EXISTS `db_competition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `1m` double NOT NULL DEFAULT '0',
  `2m` double NOT NULL DEFAULT '0',
  `3m` double NOT NULL DEFAULT '0',
  `4m` double NOT NULL DEFAULT '0',
  `5m` double NOT NULL DEFAULT '0',
  `user_1` varchar(10) NOT NULL,
  `user_2` varchar(10) NOT NULL,
  `user_3` varchar(10) NOT NULL,
  `user_4` varchar(10) NOT NULL,
  `user_5` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_end` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_competition_users`
--

CREATE TABLE IF NOT EXISTS `db_competition_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_conabrul`
--

CREATE TABLE IF NOT EXISTS `db_conabrul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rules` text NOT NULL,
  `about` text NOT NULL,
  `contacts` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_config`
--

CREATE TABLE IF NOT EXISTS `db_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `min_pay` double NOT NULL DEFAULT '15',
  `ser_per_wmr` int(11) NOT NULL DEFAULT '1000',
  `ser_per_wmz` int(11) NOT NULL DEFAULT '3300',
  `ser_per_wme` int(11) NOT NULL DEFAULT '4200',
  `items_per_coin` int(11) NOT NULL DEFAULT '7',
  `percent_back` int(2) NOT NULL DEFAULT '10',
  `speed` double NOT NULL DEFAULT '0.0005787',
  `premium_speed` double NOT NULL DEFAULT '0.0005787',
  `super_speed` double NOT NULL DEFAULT '0.0005787',
  `price_speed` int(11) NOT NULL DEFAULT '0',
  `price_premium_speed` int(11) NOT NULL DEFAULT '0',
  `price_super_speed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `db_config`
--

INSERT INTO `db_config` (`id`, `admin`, `pass`, `min_pay`, `ser_per_wmr`, `ser_per_wmz`, `ser_per_wme`, `items_per_coin`, `percent_back`, `speed`, `premium_speed`, `super_speed`, `price_speed`, `price_premium_speed`, `price_super_speed`) VALUES
(1, '123456', '123456', 20, 1, 65, 68, 50, 2, 0.000000261, 0.000000338, 0.00000045, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `db_im`
--

CREATE TABLE IF NOT EXISTS `db_im` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pm` int(11) NOT NULL,
  `user_id_in` int(11) NOT NULL,
  `login_in` varchar(55) NOT NULL,
  `user_id_out` int(11) NOT NULL,
  `login_out` varchar(55) NOT NULL,
  `theme` varchar(150) NOT NULL,
  `text` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `inbox` int(11) NOT NULL,
  `outbox` int(11) NOT NULL,
  `ava` varchar(30) CHARACTER SET cp1251 NOT NULL DEFAULT '/noavatar.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_insert_money`
--

CREATE TABLE IF NOT EXISTS `db_insert_money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purse` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `money` double NOT NULL DEFAULT '0',
  `serebro` int(11) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6717 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_invcompetition`
--

CREATE TABLE IF NOT EXISTS `db_invcompetition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `1m` double NOT NULL DEFAULT '0',
  `2m` double NOT NULL DEFAULT '0',
  `3m` double NOT NULL DEFAULT '0',
  `4m` double NOT NULL DEFAULT '0',
  `5m` double NOT NULL DEFAULT '0',
  `user_1` varchar(10) NOT NULL,
  `user_2` varchar(10) NOT NULL,
  `user_3` varchar(10) NOT NULL,
  `user_4` varchar(10) NOT NULL,
  `user_5` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_end` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_invcompetition_users`
--

CREATE TABLE IF NOT EXISTS `db_invcompetition_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1233 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_kfstat`
--

CREATE TABLE IF NOT EXISTS `db_kfstat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kf` int(11) NOT NULL,
  `date_add` int(11) NOT NULL,
  `date_del` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5093 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_logs`
--

CREATE TABLE IF NOT EXISTS `db_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `theme` varchar(500) CHARACTER SET cp1251 NOT NULL,
  `text` varchar(500) CHARACTER SET cp1251 NOT NULL,
  `bg` varchar(100) CHARACTER SET cp1251 NOT NULL,
  `icon` varchar(100) CHARACTER SET cp1251 NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48955 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_lottery`
--

CREATE TABLE IF NOT EXISTS `db_lottery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `sum` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28006 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_news`
--

CREATE TABLE IF NOT EXISTS `db_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `news` text NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_payeer_insert`
--

CREATE TABLE IF NOT EXISTS `db_payeer_insert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `purse` varchar(20) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2881 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_payment`
--

CREATE TABLE IF NOT EXISTS `db_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `purse` varchar(20) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `comission` double NOT NULL DEFAULT '0',
  `valuta` varchar(3) NOT NULL DEFAULT 'RUB',
  `status` int(11) NOT NULL DEFAULT '0',
  `pay_sys` varchar(100) NOT NULL DEFAULT '0',
  `pay_sys_id` int(11) NOT NULL DEFAULT '0',
  `response` int(1) NOT NULL DEFAULT '0',
  `payment_id` int(11) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79124 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_paypass`
--

CREATE TABLE IF NOT EXISTS `db_paypass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) CHARACTER SET cp1251 NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=503 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_pay_systems`
--

CREATE TABLE IF NOT EXISTS `db_pay_systems` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `first_char` varchar(3) NOT NULL,
  `comment` text NOT NULL,
  `min_pay` double NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_product_time`
--

CREATE TABLE IF NOT EXISTS `db_product_time` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `date_add` int(10) UNSIGNED NOT NULL,
  `date_del` int(10) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2544 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_promocod`
--

CREATE TABLE IF NOT EXISTS `db_promocod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `code` varchar(50) NOT NULL DEFAULT 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX',
  `element` varchar(55) NOT NULL,
  `summa` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_recovery`
--

CREATE TABLE IF NOT EXISTS `db_recovery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `ip` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_regkey`
--

CREATE TABLE IF NOT EXISTS `db_regkey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `referer_id` int(11) NOT NULL DEFAULT '0',
  `referer_name` varchar(10) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_resp`
--

CREATE TABLE IF NOT EXISTS `db_resp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_sell_items`
--

CREATE TABLE IF NOT EXISTS `db_sell_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `a_s` int(11) NOT NULL DEFAULT '0',
  `b_s` int(11) NOT NULL DEFAULT '0',
  `c_s` int(11) NOT NULL DEFAULT '0',
  `d_s` int(11) NOT NULL DEFAULT '0',
  `e_s` int(11) NOT NULL DEFAULT '0',
  `f_s` int(11) NOT NULL DEFAULT '0',
  `amount` double NOT NULL DEFAULT '0',
  `all_sell` int(11) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=127974 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_sender`
--

CREATE TABLE IF NOT EXISTS `db_sender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mess` text NOT NULL,
  `page` int(5) NOT NULL DEFAULT '0',
  `sended` int(7) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_serfing`
--

CREATE TABLE IF NOT EXISTS `db_serfing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purse` varchar(30) NOT NULL,
  `time_add` int(11) NOT NULL DEFAULT '0',
  `title` varchar(55) NOT NULL,
  `desc` varchar(55) NOT NULL,
  `url` varchar(255) NOT NULL,
  `timer` enum('20','30','40','50','60') NOT NULL DEFAULT '20',
  `move` enum('0','1','','') NOT NULL DEFAULT '0',
  `high` enum('0','1','','') NOT NULL DEFAULT '0',
  `speed` enum('1','2','3','4','5','6','7') NOT NULL DEFAULT '1',
  `baner` enum('0','1','','') NOT NULL,
  `baner_url` varchar(250) NOT NULL,
  `crev` enum('0','1','','') NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `money` double(10,2) NOT NULL DEFAULT '0.00',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=506 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_serfing_view`
--

CREATE TABLE IF NOT EXISTS `db_serfing_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` int(11) NOT NULL DEFAULT '0',
  `time_add` datetime NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30971 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_shop_us`
--

CREATE TABLE IF NOT EXISTS `db_shop_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `sum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_statday`
--

CREATE TABLE IF NOT EXISTS `db_statday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `name` varchar(25) NOT NULL,
  `time` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2309273 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats`
--

CREATE TABLE IF NOT EXISTS `db_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `all_users` int(11) NOT NULL DEFAULT '0',
  `all_payments` double NOT NULL DEFAULT '0',
  `all_insert` double NOT NULL DEFAULT '0',
  `donations` int(11) NOT NULL DEFAULT '0',
  `k1` int(11) NOT NULL DEFAULT '0',
  `k2` int(11) NOT NULL DEFAULT '0',
  `k3` int(11) NOT NULL DEFAULT '0',
  `k4` int(11) NOT NULL DEFAULT '0',
  `k5` int(11) NOT NULL DEFAULT '0',
  `k6` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats_btree`
--

CREATE TABLE IF NOT EXISTS `db_stats_btree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(10) NOT NULL,
  `tree_name` varchar(10) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5987 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_store`
--

CREATE TABLE IF NOT EXISTS `db_store` (
  `user_id` int(11) NOT NULL,
  `honey` int(9) NOT NULL,
  `honey_lvl` tinyint(1) NOT NULL,
  `waip` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_swap_ser`
--

CREATE TABLE IF NOT EXISTS `db_swap_ser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `amount_b` double NOT NULL DEFAULT '0',
  `amount_p` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=663 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_users_a`
--

CREATE TABLE IF NOT EXISTS `db_users_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purse` varchar(20) NOT NULL,
  `passcode` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `refsite` varchar(50) NOT NULL,
  `avaro` varchar(100) NOT NULL DEFAULT 'noavatar.png',
  `admin` int(2) NOT NULL,
  `referer` varchar(10) NOT NULL,
  `referer_id` int(11) NOT NULL DEFAULT '0',
  `referals` int(11) NOT NULL DEFAULT '0',
  `date_reg` int(11) NOT NULL DEFAULT '0',
  `date_login` int(11) NOT NULL DEFAULT '0',
  `ip` int(11) UNSIGNED DEFAULT '0',
  `banned` int(1) NOT NULL DEFAULT '0',
  `banndecs` varchar(1000) NOT NULL DEFAULT 'Причина не указана',
  `referer_id2` int(11) NOT NULL DEFAULT '0',
  `referer_id3` int(11) NOT NULL DEFAULT '0',
  `doxod2` int(11) NOT NULL DEFAULT '0',
  `doxod3` int(11) NOT NULL DEFAULT '0',
  `money_off` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_users_b`
--

CREATE TABLE IF NOT EXISTS `db_users_b` (
  `id` int(11) NOT NULL,
  `purse` varchar(20) NOT NULL,
  `from_referals` double NOT NULL DEFAULT '0',
  `to_referer` double NOT NULL DEFAULT '0',
  `money` double NOT NULL DEFAULT '0',
  `money_rek` double NOT NULL,
  `insert_sum` double NOT NULL DEFAULT '0',
  `payment_sum` double NOT NULL DEFAULT '0',
  `speed` int(11) NOT NULL DEFAULT '0',
  `premium_speed` int(11) NOT NULL DEFAULT '0',
  `super_speed` int(11) NOT NULL DEFAULT '0',
  `last_sbor` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `wmrush_pm`
--

CREATE TABLE IF NOT EXISTS `wmrush_pm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_in` int(11) NOT NULL,
  `login_in` varchar(55) NOT NULL,
  `user_id_out` int(11) NOT NULL,
  `login_out` varchar(55) NOT NULL,
  `theme` varchar(150) NOT NULL,
  `text` text CHARACTER SET cp1251 NOT NULL,
  `status` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `inbox` int(11) NOT NULL,
  `outbox` int(11) NOT NULL,
  `icon` varchar(99) NOT NULL DEFAULT 'fa fa-envelope noti-warning',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28278 DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
