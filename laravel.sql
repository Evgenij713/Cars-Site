-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 11 2025 г., 22:24
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `created_at`, `updated_at`, `title`, `country_id`) VALUES
(1, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Lada (ВАЗ)', 1),
(2, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'УАЗ', 1),
(3, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'ГАЗ', 1),
(4, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Aurus', 1),
(5, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Moskvich', 1),
(6, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Mercedes-Benz', 2),
(7, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'BMW', 2),
(8, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Audi', 2),
(9, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Volkswagen', 2),
(10, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Porsche', 2),
(11, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Toyota', 3),
(12, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Honda', 3),
(13, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Nissan', 3),
(14, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Mazda', 3),
(15, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Subaru', 3),
(16, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Ford', 4),
(17, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Chevrolet', 4),
(18, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Tesla', 4),
(19, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Dodge', 4),
(20, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Jeep', 4),
(21, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Ferrari', 5),
(22, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Lamborghini', 5),
(23, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Maserati', 5),
(24, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Alfa Romeo', 5),
(25, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Fiat', 5),
(26, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Hyundai', 6),
(27, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'KIA', 6),
(28, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Genesis', 6),
(29, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'SsangYong', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `brand_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `model` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `transmission` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `vin` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `created_at`, `updated_at`, `user_id`, `deleted_at`, `status`, `brand_id`, `model`, `price`, `transmission`, `vin`) VALUES
(1, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 5, NULL, 5, 1, 'Granta', 650000, 1, 'XTA21099012345678'),
(2, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 7, NULL, 10, 1, 'Vesta', 1250000, 2, 'XTA21099123456789'),
(3, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 9, NULL, 0, 2, 'Patriot', 1850000, 2, 'XTT22333444556677'),
(4, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 10, NULL, 15, 2, 'Hunter', 1650000, 1, 'XTT22333445566778'),
(5, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 4, NULL, 5, 3, 'Волга', 2500000, 2, 'XTH33445566778899'),
(6, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 9, NULL, 5, 4, 'Senat', 18000000, 2, 'XTA99887766554433'),
(7, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 2, NULL, 5, 5, '3', 2200000, 2, 'XTA11223344556677'),
(8, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 10, NULL, 5, 6, 'E-Class', 6500000, 2, 'WDB12345678901234'),
(9, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 10, NULL, 5, 7, 'X5', 7500000, 2, 'WBA56789012345678'),
(10, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 6, NULL, 5, 8, 'A6', 5800000, 2, 'WAU78901234567890'),
(11, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 1, NULL, 5, 9, 'Tiguan', 3200000, 2, 'WVG12345678901234'),
(12, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 2, NULL, 5, 10, 'Cayenne', 9500000, 2, 'WP1ZZZ9YZKD123456'),
(13, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 5, NULL, 5, 11, 'Camry', 3500000, 2, 'JT2BF123456789012'),
(14, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 4, NULL, 5, 12, 'CR-V', 3800000, 2, '2HKRW123456789012'),
(15, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 3, NULL, 0, 13, 'Qashqai', 2800000, 2, 'SJNFAAJ11U1234567'),
(16, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 5, NULL, 0, 14, 'CX-5', 3200000, 2, 'JM3KE4DY0M0123456'),
(17, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 8, NULL, 0, 15, 'Forester', 3400000, 2, 'JF2SJAEC0CH123456'),
(18, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 5, NULL, 0, 16, 'Focus', 1800000, 1, '1FADP3F21EL123456'),
(19, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 7, NULL, 5, 17, 'Tahoe', 6500000, 2, '1GNSKJKJ5MR123456'),
(20, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 7, NULL, 5, 18, 'Model 3', 4500000, 4, '5YJ3E1EA0MF123456'),
(21, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 3, NULL, 5, 19, 'Charger', 5500000, 2, '2C3CDXBG5KH123456'),
(22, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 8, NULL, 5, 20, 'Grand Cherokee', 5800000, 2, '1C4RJFBG5MC123456'),
(23, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 7, NULL, 5, 21, '488 GTB', 25000000, 3, 'ZFF76ALA0H0123456'),
(24, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 4, NULL, 0, 22, 'Huracan', 28000000, 3, 'ZHWBU1ZF0HLA12345'),
(25, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 10, NULL, 0, 23, 'Ghibli', 8500000, 2, 'ZAM57RSA0G0123456'),
(26, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 10, NULL, 5, 24, 'Giulia', 4800000, 2, 'ZARFAEBN0M7123456'),
(27, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 3, NULL, 5, 25, '500', 2200000, 1, 'ZFA31200001234567'),
(28, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 6, NULL, 5, 6, 'S-Class', 12000000, 2, 'WDD22222222222222'),
(29, '2025-08-09 07:34:52', '2025-08-10 18:32:52', 10, NULL, 5, 7, '3 Series', 4500000, 2, 'WBA33333333333333'),
(30, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 1, NULL, 0, 11, 'RAV4', 3200000, 2, 'JTMFB3FV0MD123456'),
(31, '2025-08-10 15:51:48', '2025-08-10 19:42:24', 3, '2025-08-10 19:42:38', 15, 8, '333333', 33300000, 2, '2DD1F8AB5ER123456');

-- --------------------------------------------------------

--
-- Структура таблицы `car_tag`
--

CREATE TABLE `car_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `car_tag`
--

INSERT INTO `car_tag` (`id`, `created_at`, `updated_at`, `car_id`, `tag_id`) VALUES
(1, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 1, 2),
(2, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 2, 3),
(3, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 3, 3),
(4, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 3, 4),
(5, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 3, 6),
(6, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 4, 5),
(7, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 5, 4),
(8, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 5, 5),
(9, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 5, 7),
(10, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 6, 6),
(11, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 6, 7),
(12, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 7, 4),
(13, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 7, 5),
(14, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 7, 6),
(15, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 8, 3),
(16, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 9, 4),
(17, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 9, 5),
(18, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 9, 6),
(19, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 10, 1),
(20, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 11, 3),
(21, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 11, 6),
(22, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 12, 1),
(23, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 12, 5),
(24, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 13, 3),
(25, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 14, 2),
(26, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 14, 4),
(27, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 14, 5),
(28, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 15, 7),
(29, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 16, 5),
(30, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 17, 1),
(31, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 17, 4),
(32, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 18, 3),
(33, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 19, 2),
(34, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 20, 1),
(35, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 21, 2),
(36, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 21, 3),
(37, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 21, 5),
(38, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 22, 1),
(39, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 22, 6),
(40, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 23, 5),
(41, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 23, 7),
(42, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 24, 1),
(43, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 24, 6),
(44, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 25, 5),
(45, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 25, 6),
(46, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 26, 2),
(47, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 26, 3),
(48, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 26, 5),
(49, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 27, 1),
(50, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 27, 5),
(51, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 27, 7),
(52, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 28, 3),
(53, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 28, 4),
(54, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 29, 1),
(55, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 29, 3),
(56, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 30, 4),
(57, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 30, 6),
(58, '2025-08-10 15:51:48', '2025-08-10 15:51:48', 31, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `commentable_type` varchar(255) NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `created_at`, `updated_at`, `user_id`, `body`, `commentable_type`, `commentable_id`) VALUES
(1, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 8, 'Супер!', 'cars', 29),
(2, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 1, 'Отличный выбор.', 'cars', 29),
(3, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 9, 'Хочу тест-драйв', 'cars', 29),
(4, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 10, 'Дорогая машина', 'cars', 24),
(5, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 1, 'Большой выбор', 'brands', 24),
(6, '2025-08-09 07:34:53', '2025-08-09 07:34:53', 10, 'Красота', 'brands', 4),
(7, '2025-08-10 15:22:58', '2025-08-10 15:22:58', 1, 'Качество на высоком уровне!', 'cars', 29),
(8, '2025-08-10 19:59:31', '2025-08-10 19:59:31', 10, 'Да', 'cars', 29),
(9, '2025-08-10 20:00:05', '2025-08-10 20:00:05', 4, '+1', 'cars', 29),
(10, '2025-08-10 20:00:38', '2025-08-10 20:00:38', 2, '++', 'cars', 29),
(11, '2025-08-11 10:11:25', '2025-08-11 10:11:25', 1, 'Супер!', 'brands', 24),
(12, '2025-08-11 12:06:35', '2025-08-11 12:06:35', 4, '+1', 'brands', 24),
(13, '2025-08-11 12:07:31', '2025-08-11 12:07:31', 10, '++', 'brands', 24);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `created_at`, `updated_at`, `title`) VALUES
(1, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Россия'),
(2, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Германия'),
(3, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Япония'),
(4, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'США'),
(5, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Италия'),
(6, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Южная Корея');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_27_072452_create_cars_table', 2),
(5, '2025_07_08_125216_add_transmission_type_to_cars_table', 3),
(6, '2025_07_08_125845_add_transmission_type_to_cars_table', 4),
(15, '2025_07_13_135735_add_deleted_at_to_cars_table', 5),
(16, '2025_07_16_051348_add_vin_to_cars_table', 5),
(17, '2025_07_17_091945_create_tags_table', 6),
(20, '2025_07_20_173630_create_brands_table', 7),
(23, '2025_07_22_121839_update_cars_table_change_make_to_brand_id', 8),
(24, '2025_07_23_055418_create_countries_table', 9),
(26, '2025_07_23_095709_update_brands_table_add_country_id', 10),
(29, '2025_07_23_124700_create_car_tag_table', 11),
(30, '2025_07_26_144648_update_append_status_to_cars_table', 12),
(35, '2025_07_27_082201_create_comments_table', 13),
(36, '2025_08_09_001024_create_roles_table', 13),
(37, '2025_08_09_002421_create_role_user_table', 14),
(40, '2025_08_09_113751_update_cars_table_append_user_id', 15),
(43, '2025_08_09_114943_update_comments_table_append_user_id', 16);

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Покупатель'),
(2, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Менеджер'),
(3, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'Модератор');

-- --------------------------------------------------------

--
-- Структура таблицы `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role_user`
--

INSERT INTO `role_user` (`id`, `created_at`, `updated_at`, `role_id`, `user_id`) VALUES
(1, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 3, 1),
(2, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 3, 2),
(3, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 2, 3),
(4, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 2, 4),
(5, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 2, 5),
(6, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 1, 6),
(7, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 1, 7),
(8, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 1, 8),
(9, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 1, 9),
(10, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('m1A0zeMhiJalHKAM8RqanwpVj1p8frDpSaHtCzh2', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQXFsT3F0elpzblVpWWpkVzZOR1pTYWl1MVRDMXpmYTRxRmhQUnltRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1754943833);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `created_at`, `updated_at`, `title`) VALUES
(1, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'АвтоЛенак'),
(2, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'АвтоЛюбитель'),
(3, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'ТачкаМечты'),
(4, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'АвтоПутешествия'),
(5, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'ТюнингАвто'),
(6, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'АвтоСовет'),
(7, '2025-08-09 07:34:52', '2025-08-09 07:34:52', 'ДрайвИэмоции');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Einar Wintheiser', 'kay.shields@example.org', '2025-08-09 07:34:52', '$2y$12$xlOZVYPF8QfTj5U6Ia99Lut0CpJYE1kAVVmPT7Gm.Dwfm4WvWwp9S', 'bvhfuSnDzjONmrUhzd8Sy0u0JhnxwuCcXFtKAauh9u82HWL6r8Lx2gJOBroG', '2025-08-09 07:34:52', '2025-08-09 07:34:52'),
(2, 'Torrance Brekke', 'laisha.paucek@example.org', '2025-08-09 07:34:52', '$2y$12$xlOZVYPF8QfTj5U6Ia99Lut0CpJYE1kAVVmPT7Gm.Dwfm4WvWwp9S', 'pEw1H9AqihVFluCnkgPl5hMFQDAeocAphB8IQH9k7TRbvRA6VTheZtjOLEsZ', '2025-08-09 07:34:52', '2025-08-09 07:34:52'),
(3, 'Estell Smitham Sr.', 'ywillms@example.com', '2025-08-09 07:34:52', '$2y$12$xlOZVYPF8QfTj5U6Ia99Lut0CpJYE1kAVVmPT7Gm.Dwfm4WvWwp9S', 'vCwlUqapDlbsU2A7w0brXoinR96umc8Ccm4Z7gQwgBCA1zVHe3JskwuWFhzf', '2025-08-09 07:34:52', '2025-08-09 07:34:52'),
(4, 'Mr. Ignatius Fadel DVM', 'wilkinson.delphia@example.org', '2025-08-09 07:34:52', '$2y$12$xlOZVYPF8QfTj5U6Ia99Lut0CpJYE1kAVVmPT7Gm.Dwfm4WvWwp9S', 'YqNp4hf4i0X5N1MlBbppdaMJSo96ONNOt7XDm5swtRuHa6InRTmocKifXYgq', '2025-08-09 07:34:52', '2025-08-09 07:34:52'),
(5, 'Miss Rhoda Reilly I', 'verner61@example.com', '2025-08-09 07:34:52', '$2y$12$xlOZVYPF8QfTj5U6Ia99Lut0CpJYE1kAVVmPT7Gm.Dwfm4WvWwp9S', '5ipkiXYGLgWsw4G3GVd0eMgENjgz36cz83mEavjpVyYZux52LTugX2NCe605', '2025-08-09 07:34:52', '2025-08-09 07:34:52'),
(6, 'Dr. Edwardo Tremblay I', 'ureinger@example.com', '2025-08-09 07:34:52', '$2y$12$xlOZVYPF8QfTj5U6Ia99Lut0CpJYE1kAVVmPT7Gm.Dwfm4WvWwp9S', 'EZSmJGhYoQClQnMOwLVHUwJSoeaeOtx9WIhf90er5yE3YcnyTHaCKnm8WzIA', '2025-08-09 07:34:52', '2025-08-09 07:34:52'),
(7, 'Cloyd Dietrich', 'frami.delia@example.org', '2025-08-09 07:34:52', '$2y$12$xlOZVYPF8QfTj5U6Ia99Lut0CpJYE1kAVVmPT7Gm.Dwfm4WvWwp9S', 'Pe7VQ5vc3AXa05heCr0EAUGwcJNFN8dCiVAeRz96KBYOE450WubFv6BKz6ni', '2025-08-09 07:34:52', '2025-08-09 07:34:52'),
(8, 'Xavier Marvin', 'beahan.evans@example.net', '2025-08-09 07:34:52', '$2y$12$xlOZVYPF8QfTj5U6Ia99Lut0CpJYE1kAVVmPT7Gm.Dwfm4WvWwp9S', 'D4GN3IWFHhg0r7imsl52ofsCgiuuJ47sXRN7vl6EkTDQrTrTSHWxQYCiwe8b', '2025-08-09 07:34:52', '2025-08-09 07:34:52'),
(9, 'Theresa Tremblay', 'swift.avis@example.org', '2025-08-09 07:34:52', '$2y$12$xlOZVYPF8QfTj5U6Ia99Lut0CpJYE1kAVVmPT7Gm.Dwfm4WvWwp9S', 'SkZG9jVvPMI7RuuCbl6Rr4dNlizAagUzcKlPw1P647ZCxJ8w9us7gKbVMHVc', '2025-08-09 07:34:52', '2025-08-09 07:34:52'),
(10, 'Ms. Luisa Torp Sr.', 'owisozk@example.org', '2025-08-09 07:34:52', '$2y$12$xlOZVYPF8QfTj5U6Ia99Lut0CpJYE1kAVVmPT7Gm.Dwfm4WvWwp9S', 'prABJXZNOV4ftfQpgAmqApyCuIQdpUUYAcfBCNQW18XwEgQTe3oLWVgHvA8M', '2025-08-09 07:34:52', '2025-08-09 07:34:52');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_country_id_foreign` (`country_id`);

--
-- Индексы таблицы `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_brand_id_foreign` (`brand_id`),
  ADD KEY `cars_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `car_tag`
--
ALTER TABLE `car_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_tag_car_id_foreign` (`car_id`),
  ADD KEY `car_tag_tag_id_foreign` (`tag_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Индексы таблицы `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `car_tag`
--
ALTER TABLE `car_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Ограничения внешнего ключа таблицы `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `cars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `car_tag`
--
ALTER TABLE `car_tag`
  ADD CONSTRAINT `car_tag_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `car_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
