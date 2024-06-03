-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 29 2024 г., 11:05
-- Версия сервера: 5.7.20-0ubuntu0.16.04.1
-- Версия PHP: 5.6.40-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `elib`
--

-- --------------------------------------------------------

--
-- Структура таблицы `lib_jdownloads_cats`
--

CREATE TABLE `lib_jdownloads_cats` (
  `cat_id` int(11) NOT NULL,
  `cat_dir` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_alias` varchar(255) NOT NULL,
  `cat_description` text NOT NULL,
  `cat_pic` varchar(255) NOT NULL,
  `cat_access` varchar(3) NOT NULL DEFAULT '00',
  `cat_group_access` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `jaccess` tinyint(3) NOT NULL DEFAULT '0',
  `jlanguage` varchar(7) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lib_jdownloads_cats`
--

INSERT INTO `lib_jdownloads_cats` (`cat_id`, `cat_dir`, `parent_id`, `cat_title`, `cat_alias`, `cat_description`, `cat_pic`, `cat_access`, `cat_group_access`, `metakey`, `metadesc`, `jaccess`, `jlanguage`, `ordering`, `published`, `checked_out`, `checked_out_time`) VALUES
(431, 'Books/Trudi_prepodovatelei/', 431, '', '2021-11-03-09-24-16', '', '', '00', 0, '', '', 0, '', 56, 0, 0, '0000-00-00 00:00:00'),
(458, 'Books/Trudi_prepodovatelei', 426, 'Trudi_prepodovatelei', 'trudi-prepodovatelei', '', '', '00', 0, '', '', 0, '', 57, 0, 0, '2021-11-03 09:41:05'),
(428, 'Books/english/knigi dlia mladshego shkolnika', 427, 'Книги для младшего школьника', 'knigi-dlya-mladshkgo-shkolnika', '', '', '00', 0, '', '', 0, '', 26, 1, 0, '0000-00-00 00:00:00'),
(424, 'Stati/Tematicheskie stati', 416, 'Тематические статьи', 'tematicheskie-stati', '', '', '00', 0, '', '', 0, '', 22, 1, 0, '0000-00-00 00:00:00'),
(423, 'Zakonodatelstvo/Zakony RK', 420, 'Законы РК', 'zakony-rk', '', '', '00', 0, '', '', 0, '', 21, 1, 0, '0000-00-00 00:00:00'),
(422, 'Zakonodatelstvo/Obrazovanija v RK', 420, 'Образование в РК', 'obrazovanija-v-rk', '', '', '00', 0, '', '', 0, '', 20, 1, 0, '0000-00-00 00:00:00'),
(421, 'Zakonodatelstvo/Nauka v RK', 420, 'Наука в РК', 'nauka-v-rk', '', '', '00', 0, '', '', 0, '', 19, 1, 0, '0000-00-00 00:00:00'),
(420, 'Zakonodatelstvo', 0, 'Законодательство', 'zakonodatelstvo', '', '', '00', 0, '', '', 0, '', 18, 1, 0, '0000-00-00 00:00:00'),
(419, 'Virtual_vistavka', 0, 'Виртуальная выставка', 'virtual-vistavka', '', '', '00', 0, '', '', 0, '', 17, 0, 0, '0000-00-00 00:00:00'),
(418, 'Stati/Nauchnye stati SGPI', 416, 'Научные статьи СГПИ', 'nauchnye-stati-sgpi', '', '', '00', 0, '', '', 0, '', 16, 1, 0, '0000-00-00 00:00:00'),
(426, 'Books', 0, 'Книги', 'knigi', '', '', '00', 0, '', '', 0, '', 24, 1, 0, '0000-00-00 00:00:00'),
(416, 'Stati', 0, 'Статьи', 'stati', '', '', '00', 0, '', '', 0, '', 14, 1, 0, '0000-00-00 00:00:00'),
(429, 'Books/Geography', 426, 'География', 'geography', '', '', '00', 0, '', '', 0, '', 27, 1, 0, '0000-00-00 00:00:00'),
(430, 'Books/Zolotoi fond', 426, 'Фонд редких изданий', 'zolotoi-fond', '', '', '00', 0, '', '', 0, '', 28, 1, 0, '0000-00-00 00:00:00'),
(435, 'portfolioo/portfoliokuratora', 434, 'Портфолио куратора', 'portfoliokuratora', '', '', '00', 0, '', '', 0, '', 33, 1, 0, '0000-00-00 00:00:00'),
(436, 'portfolioo/portfoliopedpraktiki', 434, 'Портфолио педагогической практики', 'portfoliopedpraktiki', '', '', '00', 0, '', '', 0, '', 34, 1, 0, '0000-00-00 00:00:00'),
(434, 'portfolioo', 0, 'Портфолио', 'portfolioo', '', '', '00', 0, '', '', 0, '', 32, 1, 0, '0000-00-00 00:00:00'),
(411, 'Jurnali/Zhurnal PBGH/2012', 408, '2012', '2012', '', '', '00', 0, '', '', 0, '', 9, 1, 0, '0000-00-00 00:00:00'),
(410, 'Jurnali/Zhurnal PBGH/2011', 408, '2011', '2011', '', '', '00', 0, '', '', 0, '', 8, 1, 0, '0000-00-00 00:00:00'),
(409, 'Jurnali/Zhurnal PBGH/2010', 408, '2010', '2010', '', '', '00', 0, '', '', 0, '', 7, 1, 0, '0000-00-00 00:00:00'),
(408, 'Jurnali/Zhurnal PBGH', 403, 'Журнал ПБГХ', 'zhurnal-pbgh', '', '', '00', 0, '', '', 0, '', 6, 1, 0, '0000-00-00 00:00:00'),
(407, 'Jurnali/Vestnik SGPI/2012', 404, '2012', '2012', '', '', '00', 0, '', '', 0, '', 5, 1, 0, '0000-00-00 00:00:00'),
(406, 'Jurnali/Vestnik SGPI/2011', 404, '2011', '2011', '', '', '00', 0, '', '', 0, '', 4, 1, 0, '0000-00-00 00:00:00'),
(425, 'Stati/Istoricheskie li4nosti', 416, 'Исторические личности', 'istoricheskie-li4nosti', '', '', '00', 0, '', '', 0, '', 23, 1, 0, '0000-00-00 00:00:00'),
(405, 'Jurnali/Vestnik SGPI/2010', 404, '2010', '2010', '', '', '00', 0, '', '', 0, '', 3, 1, 0, '0000-00-00 00:00:00'),
(427, 'Books/english', 426, 'Английский', 'anglijskij', '', '', '00', 0, '', '', 0, '', 25, 1, 0, '0000-00-00 00:00:00'),
(404, 'Jurnali/Vestnik SGPI', 403, 'Вестник СГПИ', 'vestnik-sgpi', '', '', '00', 0, '', '', 0, '', 2, 1, 0, '0000-00-00 00:00:00'),
(403, 'Jurnali', 0, 'Журналы', 'jurnali', '', '', '00', 0, '', '', 0, '', 1, 1, 0, '0000-00-00 00:00:00'),
(432, 'Books/biology', 426, 'Биология', 'biology', '', '', '00', 0, '', '', 0, '', 30, 1, 0, '0000-00-00 00:00:00'),
(433, 'Books/Kazakadebieti', 426, 'Қазақ тілі және қазақ әдебиеті', 'kazakadebieti', '', '', '00', 0, '', '', 0, '', 31, 1, 0, '0000-00-00 00:00:00'),
(437, 'Books/chimya', 426, 'Химия', 'chimya', '', '', '00', 0, '', '', 0, '', 35, 0, 0, '0000-00-00 00:00:00'),
(438, 'Books/Informatika', 426, 'Информатика', 'informatika', '', '', '00', 0, '', '', 0, '', 36, 0, 0, '0000-00-00 00:00:00'),
(440, 'thomsonReuters', 0, 'thomsonReuters', 'thomsonreuters', '', '', '00', 0, '', '', 0, '', 38, 0, 0, '0000-00-00 00:00:00'),
(439, 'Stati/Nauchnye stati SGPI/Bektemisov', 418, 'Бектемесов М. А.', 'bektemisov', '', 'folder_doc.png', '00', 0, '', '', 0, '', 37, 1, 0, '0000-00-00 00:00:00'),
(441, 'Stati/Tematicheskie stati/Polijazychie', 424, 'Полиязычие', 'polijazychie', '', 'folder_doc.png', '00', 0, '', '', 0, '', 39, 1, 0, '0000-00-00 00:00:00'),
(442, 'Stati/Nauchnye stati SGPI/Geografiya ecologiya', 418, 'География и экология', 'geografiya-ecologiya', '', 'folder_doc.png', '00', 0, '', '', 0, '', 40, 1, 0, '0000-00-00 00:00:00'),
(443, 'Stati/Nauchnye stati SGPI/psihologiya i pedagogika', 418, 'Психология и педагогика', 'psihologiya-i-pedagogika', '', 'folder_doc.png', '00', 0, '', '', 0, '', 41, 1, 0, '0000-00-00 00:00:00'),
(444, 'Stati/Nauchnye stati SGPI/iskakova', 418, 'Искакова Г. К.', 'iskakova', '', 'folder_doc.png', '00', 0, '', '', 0, '', 42, 1, 0, '0000-00-00 00:00:00'),
(445, 'Stati/Nauchnye stati SGPI/istoriya', 418, 'История', 'istoriya', '', 'folder_doc.png', '00', 0, '', '', 0, '', 43, 1, 0, '0000-00-00 00:00:00'),
(446, 'Stati/Nauchnye stati SGPI/fizkultura i sport', 418, 'Физкультура и спорт', 'fizkultura-i-sport', '', 'folder_doc.png', '00', 0, '', '', 0, '', 44, 1, 0, '0000-00-00 00:00:00'),
(447, 'Stati/Nauchnye stati SGPI/fizika matematika', 418, 'Физика и математика', 'fizika-matematika', '', 'folder_doc.png', '00', 0, '', '', 0, '', 45, 1, 0, '0000-00-00 00:00:00'),
(448, 'Stati/Nauchnye stati SGPI/panin', 418, 'Панин М. С.', 'panin', '', 'folder_doc.png', '00', 0, '', '', 0, '', 46, 1, 0, '0000-00-00 00:00:00'),
(449, 'komplektovanie', 0, 'komplektovanie', 'komplektovanie', '', '', '00', 0, '', '', 0, '', 47, 0, 0, '0000-00-00 00:00:00'),
(450, 'komplektovanie/Podpiska', 449, 'Podpiska', 'podpiska', '', '', '00', 0, '', '', 0, '', 48, 0, 0, '0000-00-00 00:00:00'),
(451, 'komplektovanie/Pricelist', 449, 'Pricelist', 'pricelist', '', '', '00', 0, '', '', 0, '', 49, 0, 0, '0000-00-00 00:00:00'),
(452, 'b_ukazateli', 0, 'b_ukazateli', 'b-ukazateli', '', '', '00', 0, '', '', 0, '', 50, 0, 0, '0000-00-00 00:00:00'),
(453, 'sspi80', 0, 'sspi80', 'sspi80', '', '', '00', 0, '', '', 0, '', 51, 0, 0, '0000-00-00 00:00:00'),
(454, 'bulliten_knig', 0, 'bulliten_knig', 'bulliten-knig', '', '', '00', 0, '', '', 0, '', 52, 0, 0, '0000-00-00 00:00:00'),
(455, 'Новые книги', 0, 'Новые книги', 'novye-knigi', '', '', '00', 0, '', '', 0, '', 53, 0, 0, '0000-00-00 00:00:00'),
(456, 'Books/Trudi_prepodovatelei/2021', 431, '2021', '2021', '', '', '00', 0, '', '', 0, '', 54, 1, 0, '0000-00-00 00:00:00'),
(457, 'Books/Trudi_prepodovatelei/', 431, '', '2021-11-03-09-23-56', '', '', '00', 0, '', '', 0, '', 55, 0, 0, '0000-00-00 00:00:00'),
(466, 'Books/Trudi_prepodovatelei/kudirinova2', 458, 'Кудринова-2', 'Кудринова-2', '', '', '00', 0, '', '', 0, '', 65, 1, 0, '0000-00-00 00:00:00'),
(459, 'Books/Trudi_prepodovatelei/book', 458, 'book', 'book', '', '', '00', 0, '', '', 0, '', 58, 0, 0, '0000-00-00 00:00:00'),
(460, 'Books/Trudi_prepodovatelei/', 458, '', '1', '', '', '00', 0, '', '', 0, '', 59, 0, 0, '0000-00-00 00:00:00'),
(461, 'Books/Trudi_prepodovatelei/', 458, '', '1', '', '', '00', 0, '', '', 0, '', 60, 0, 0, '0000-00-00 00:00:00'),
(462, 'Books/Trudi_prepodovatelei/', 458, '', '1', '', '', '00', 0, '', '', 0, '', 61, 0, 0, '0000-00-00 00:00:00'),
(463, 'Books/Trudi_prepodovatelei/', 458, '', '1', '', '', '00', 0, '', '', 0, '', 62, 0, 0, '0000-00-00 00:00:00'),
(464, 'Books/Trudi_prepodovatelei/', 458, '', '1', '', '', '00', 0, '', '', 0, '', 63, 0, 0, '0000-00-00 00:00:00'),
(465, 'Books/Trudi_prepodovatelei/kudirinova1', 458, 'Кудринова-1', 'Кудринова-1', '', '', '00', 0, '', '', 0, '', 64, 1, 0, '0000-00-00 00:00:00'),
(467, 'Books/Trudi_prepodovatelei/kudirinova3', 458, 'Кудринова-3', 'Кудринова-3', '', '', '00', 0, '', '', 0, '', 66, 1, 0, '0000-00-00 00:00:00'),
(468, 'Books/Trudi_prepodovatelei/kudirinova4', 458, 'Кудринова-4', 'Кудринова-4', '', '', '00', 0, '', '', 0, '', 67, 1, 0, '0000-00-00 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `lib_jdownloads_cats`
--
ALTER TABLE `lib_jdownloads_cats`
  ADD PRIMARY KEY (`cat_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `lib_jdownloads_cats`
--
ALTER TABLE `lib_jdownloads_cats`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=469;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
