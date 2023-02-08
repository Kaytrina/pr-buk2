-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 08 2023 г., 19:42
-- Версия сервера: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004
-- Версия PHP: 8.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `1110-20_pr_buk2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_cat`, `name`) VALUES
(1, 'ЖКХ'),
(2, 'Дороги'),
(3, 'Уборка');

-- --------------------------------------------------------

--
-- Структура таблицы `claim`
--

CREATE TABLE `claim` (
  `id_claim` int(11) NOT NULL,
  `id_user` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `discr` varchar(100) DEFAULT NULL,
  `id_cat` int(100) NOT NULL,
  `photo_before` varchar(300) NOT NULL,
  `photo_after` varchar(300) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('новое','подтверждено','удалено') NOT NULL DEFAULT 'новое'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `claim`
--

INSERT INTO `claim` (`id_claim`, `id_user`, `name`, `discr`, `id_cat`, `photo_before`, `photo_after`, `time`, `status`) VALUES
(1, 2, 'Проблема', 'Тест', 1, '/claimPic/6BnT98oa-xwvW7IG6hbFs7db2ScKVBV-Q2tMVzM4DP2CksRquV.png', '/claimPic/NHTTy2g6QrkV-UHAq3YCPEMKl6evos1p24gWeNmOdy12kgx-9Q.png', '2023-02-06 10:42:06', 'удалено'),
(2, 9, 'Ремонт дорог', 'Ремонтирование дороги на улице Железняка', 2, '/claimPic/QZxaRIj8aUIfwfT74ZeHIhaLoM7stuaXJAoZf-MOw6tAou8VEY.jpg', '/claimPic/IHLq77az6rqbodUVHZorW7-dEUJ-wyfP3ECZf6TUPwTIzcqHQ7.jpg', '2023-02-06 10:50:21', 'подтверждено'),
(3, 9, 'Ремонт труб', 'Ремонтирование труб жилого дома', 1, '/claimPic/SPytpscEynKOv2mZAlfFno-iRuCkvy5gbXhsJWB3HXxoAYkMvm.jpg', '/claimPic/20IkCmZ4ntxWuFI2ImltXFHOf9VNrJAgRk3v65hOHW1L_f5hBk.jpg', '2023-02-06 10:49:58', 'подтверждено'),
(4, 9, 'Уборка снега', 'Расчистка дорог спальных районов', 3, '/claimPic/nCJ7C32IOaJjP24m1F-Hgc1ejrfGA-gTN4FS9rF-JL3b7Ezs59.jpg', '/claimPic/GUSsD_3OT98dmqrsctEtzLNOB_yy5OmXnayEmWuvVRySicJx8x.jpg', '2023-02-06 10:52:32', 'подтверждено'),
(5, 9, 'Уборка леса', 'Уборка мусора на природе', 3, '/claimPic/1DWEkgTZXvB7kBYQheVpQc8X4QT6vinLRNFlbXKK-BEPqf7Eqh.jpg', '/claimPic/sTSk9k_GjKRftnJ3fv6-FrNRrDiR2Ydo8IDBS_HsBd-rl-yzMC.jpg', '2023-02-06 10:53:33', 'подтверждено'),
(6, 1, 'Проблема', 'Тест', 2, '/claimPic/S67qCKEZrNWh19qw1f-iKKZkElNc_RFwnigFu8-Qwlr0Nv9xfq.jpg', NULL, '2023-02-06 11:54:46', 'новое');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `is_admin`) VALUES
(1, 'Иван', 'Демьян', 'Степанович', 'demuv', 'demuv@gmail.com', '12qwerty', 0),
(2, 'Миха', 'Админ', 'Саныч', 'userbob', 'userbob@gmail.com', '123321', 1),
(3, 'Анастасия', 'Репейникова', 'Александровна', 'anast', 'anast@gmail.com', 'anast', 0),
(4, 'Лариса', 'Рык', 'Антонова', 'lara', 'lara@gmail.com', '123456', 0),
(5, 'Дмитрий', 'Тифонский', 'Петрович', 'Watafak', '1@mail.ru', '12345', 0),
(6, 'Марина', 'Власова', 'Анатольевна', 'marina', 'mari@gmail.com', '123456', 0),
(7, 'Марина', 'Власова', 'Анатольевна', 'marina2', 'marina@gmail.com', '123456', 0),
(8, 'Ян', 'Ян', 'Ян', 'CmBSinka', '2@mail.ru', '12345', 0),
(9, 'Админ', 'Админ', 'Админ', 'admin', 'admin@gmail.com', 'adminWSR', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Индексы таблицы `claim`
--
ALTER TABLE `claim`
  ADD PRIMARY KEY (`id_claim`),
  ADD KEY `cat_ibfk_1` (`id_cat`),
  ADD KEY `user_ibfk_1` (`id_user`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `claim`
--
ALTER TABLE `claim`
  MODIFY `id_claim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `claim`
--
ALTER TABLE `claim`
  ADD CONSTRAINT `cat_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `category` (`id_cat`),
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
