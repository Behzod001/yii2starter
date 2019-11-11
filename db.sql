-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 10 2019 г., 07:36
-- Версия сервера: 5.6.37
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Структура таблицы `lang`
--

CREATE TABLE `lang` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `defaultl` int(11) NOT NULL,
  `date_update` int(11) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lang`
--

INSERT INTO `lang` (`id`, `url`, `local`, `name`, `defaultl`, `date_update`, `date_create`) VALUES
(1, 'uz', 'uz_UZ', 'Узбек', 1, 1498637731, 0),
(2, 'ru', 'ru_RU', 'Русский', 0, 1, 1),
(3, 'en', 'en_US', 'English', 0, 8, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(16) NOT NULL DEFAULT '',
  `translation` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `language`, `translation`) VALUES
(1, 'ru', 'sgrops'),
(1, 'uz', 'Guruhlar'),
(2, 'ru', 'Subjs'),
(2, 'uz', 'Fanlar'),
(4, 'ru', 's'),
(4, 'uz', 'Bosh sahifa'),
(5, 'uz', 'Tinglovchilar'),
(6, 'uz', 'O\'qituvchilar'),
(7, 'uz', 'Sozlamalar'),
(8, 'uz', 'Xush kelibsiz'),
(9, 'uz', 'Tinglovchilar'),
(10, 'uz', 'Nomi'),
(11, 'uz', 'Barcha tinglovchilar'),
(12, 'uz', 'Boshlanish vaqti'),
(13, 'uz', 'Tugash vaqti'),
(14, 'uz', 'Xarakatlar'),
(15, 'uz', 'Tinglovchi ma\'lumotlari'),
(16, 'uz', 'Guruh'),
(17, 'uz', 'Fan'),
(18, 'uz', 'Barcha tinglovchilar'),
(19, 'uz', 'O\'zgartirish'),
(20, 'uz', 'O\'chirish'),
(21, 'uz', 'Yaratish'),
(22, 'uz', 'Qo\'shish'),
(23, 'uz', 'O\'quv markazi'),
(24, 'uz', 'Guruh yaratish'),
(25, 'uz', 'Orqaga qaytish'),
(26, 'uz', 'Guruhga tinglovchi qo\'shish'),
(27, 'uz', 'Sana'),
(29, 'uz', 'Umumiy muddat'),
(30, 'uz', 'oy'),
(31, 'uz', 'Barcha guruhlar'),
(32, 'uz', 'Guruhni o\'zgartirish'),
(33, 'uz', 'Boshlanish sanasi'),
(34, 'uz', 'Tugash sanasi'),
(35, 'uz', 'Saqlash'),
(36, 'uz', 'O\'qituvchi');

-- --------------------------------------------------------

--
-- Структура таблицы `source_message`
--

CREATE TABLE `source_message` (
  `id` int(11) NOT NULL,
  `category` varchar(32) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `source_message`
--

INSERT INTO `source_message` (`id`, `category`, `message`) VALUES
(1, 'app', 'Groups'),
(2, 'app', 'Subjects'),
(4, 'app', 'Dashboard'),
(5, 'app', 'Listeners'),
(6, 'app', 'Teachers'),
(7, 'app', 'Settings'),
(8, 'app', 'Welcome'),
(9, 'app', 'Listeners'),
(10, 'app', 'Name'),
(11, 'app', 'All listeners'),
(12, 'app', 'Start day'),
(13, 'app', 'End day'),
(14, 'app', 'Actions'),
(15, 'app', 'Listeners data'),
(16, 'app', 'Group'),
(17, 'app', 'Subject'),
(18, 'app', 'All items'),
(19, 'app', 'Update'),
(20, 'app', 'Delete'),
(21, 'app', 'Create'),
(22, 'app', 'Add'),
(23, 'app', 'Teach center'),
(24, 'app', 'Create group'),
(25, 'app', 'Go back'),
(26, 'app', 'Add listener to group'),
(27, 'app', 'Date'),
(29, 'app', 'All time'),
(30, 'app', 'month'),
(31, 'app', 'All groups'),
(32, 'app', 'Update groups'),
(33, 'app', 'Enter start date ...'),
(34, 'app', 'Enter  end date ...'),
(35, 'app', 'Save'),
(36, 'app', 'Teacher');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `lastname` varchar(25) DEFAULT NULL,
  `email` varchar(512) DEFAULT NULL,
  `password` varchar(1024) DEFAULT NULL,
  `avatar` varchar(128) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `authKey` varchar(512) NOT NULL,
  `accessToken` varchar(512) NOT NULL,
  `role` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `avatar`, `created`, `status`, `authKey`, `accessToken`, `role`, `company_id`) VALUES
(1, 'Nodir', 'Nozimov', 'admin@gmail.com', '$2y$13$ZixpW0MvDf2EbVaU3xPsR.5/H7P/2uofG5mJmcXEXaUX.OWUvWjuO', NULL, 1552818037, 1, 'jvmyOxzRTESd6vLboDzz4bQGNrjt4uZ1', 'DA7PNPvtj49pdxVC59wpjsu1chj0DU7N', 1, 1),
(2, 'Nizom', 'Ikromov ', 'admin2@gmail.com', '$2y$13$ZixpW0MvDf2EbVaU3xPsR.5/H7P/2uofG5mJmcXEXaUX.OWUvWjuO', NULL, 1552818037, 1, 'jvmyOxzRTESd6vLboDzz4bQGNrjt4uZ1', 'DA7PNPvtj49pdxVC59wpjsu1chj0DU7N', 3, 1),
(3, 'Axmadaliyev Abdulla', NULL, 'admin3@gmail.com', '$2y$13$ZixpW0MvDf2EbVaU3xPsR.5/H7P/2uofG5mJmcXEXaUX.OWUvWjuO', NULL, 1552818037, 1, 'jvmyOxzRTESd6vLboDzz4bQGNrjt4uZ1', 'DA7PNPvtj49pdxVC59wpjsu1chj0DU7N', 3, 1),
(4, 'Bektemirova Madina', NULL, 'admin4@gmail.com', '$2y$13$zjvOOt9GEhsbaBAWwRv7iOA1XZ20mrUStrVKHviGosxEmmKs7lUrO', NULL, 1554441363, 1, '9KSok3MYe3u2qHR4uzge5pCCn62z9ijT', '6AYnstvzJCeDtJX9Pczj3fyiXoTk3TNc', 0, 1);

-- --------------------------------------------------------


--
-- Индексы таблицы `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`,`language`);

--
-- Индексы таблицы `source_message`
--
ALTER TABLE `source_message`
  ADD PRIMARY KEY (`id`);


--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

-- AUTO_INCREMENT для таблицы `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `source_message`
--
ALTER TABLE `source_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `user_groups`
--
-- Ограничения внешнего ключа сохраненных таблиц
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
