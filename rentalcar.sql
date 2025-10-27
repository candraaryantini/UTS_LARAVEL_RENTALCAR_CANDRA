-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2025 at 03:44 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_day` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `year`, `color`, `license_plate`, `price_per_day`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', 'Avanza', 2024, 'Silver', 'B 6571 PXQ', '258432.00', 'maintenance', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(2, 'Daihatsu', 'Rocky', 2024, 'Biru', 'B 7923 HCN', '400526.00', 'available', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(3, 'Honda', 'Civic', 2021, 'Biru', 'B 1516 BAU', '283873.00', 'available', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(4, 'Toyota', 'Yaris', 2023, 'Putih', 'B 9703 VNT', '524887.00', 'available', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(5, 'Honda', 'Jazz', 2021, 'Putih', 'B 7040 IPD', '715680.00', 'available', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(6, 'Daihatsu', 'Terios', 2024, 'Putih', 'B 1711 RHY', '705052.00', 'maintenance', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(7, 'Daihatsu', 'Terios', 2021, 'Abu-abu', 'B 4906 AAX', '399619.00', 'maintenance', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(8, 'Suzuki', 'Ignis', 2024, 'Hitam', 'B 6380 JNP', '589161.00', 'available', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(9, 'Hyundai', 'Stargazer', 2018, 'Merah', 'B 6572 JEP', '374808.00', 'available', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(10, 'Nissan', 'Livina', 2023, 'Silver', 'B 2451 FAW', '355518.00', 'rented', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(11, 'Honda', 'Jazz', 2024, 'Abu-abu', 'B 4880 FWM', '416141.00', 'available', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(12, 'Kia', 'Sonet', 2024, 'Putih', 'B 2840 IIE', '361843.00', 'rented', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(13, 'Hyundai', 'Creta', 2022, 'Kuning', 'B 3842 DSE', '370434.00', 'available', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(14, 'Daihatsu', 'Sigra', 2022, 'Abu-abu', 'B 5510 VKA', '544973.00', 'available', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(15, 'Mitsubishi', 'Outlander', 2020, 'Kuning', 'B 4657 RWO', '630346.00', 'available', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(16, 'Toyota', 'Yaris', 2020, 'Merah', 'B 2700 DEA', '722703.00', 'rented', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(17, 'Nissan', 'Livina', 2022, 'Putih', 'B 7980 PFO', '429380.00', 'available', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(18, 'Honda', 'Jazz', 2024, 'Silver', 'B 8978 NWI', '440532.00', 'available', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(19, 'Nissan', 'March', 2019, 'Kuning', 'B 4741 VIU', '587239.00', 'maintenance', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(20, 'Hyundai', 'Stargazer', 2022, 'Biru', 'B 7735 YVU', '346162.00', 'available', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(21, 'Kia', 'Sonet', 2018, 'Abu-abu', 'B 3570 DQY', '602668.00', 'available', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(22, 'Honda', 'Brio', 2019, 'Merah', 'B 8269 FYY', '595063.00', 'maintenance', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(23, 'Nissan', 'Livina', 2018, 'Putih', 'B 8041 IMK', '453598.00', 'maintenance', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(24, 'Nissan', 'Serena', 2021, 'Hitam', 'B 4372 QFK', '586211.00', 'maintenance', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(25, 'Daihatsu', 'Terios', 2023, 'Merah', 'B 4845 HZB', '664583.00', 'maintenance', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(26, 'Toyota', 'Avanza', 2018, 'Kuning', 'B 8682 CRX', '654240.00', 'rented', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(27, 'Suzuki', 'Ignis', 2022, 'Putih', 'B 3075 QTE', '296134.00', 'maintenance', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(28, 'Honda', 'Brio', 2019, 'Abu-abu', 'B 4237 QTW', '698499.00', 'rented', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(29, 'Kia', 'Rio', 2024, 'Biru', 'B 6343 UOA', '708466.00', 'rented', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(30, 'Toyota', 'Innova', 2021, 'Merah', 'B 3943 NUY', '371514.00', 'rented', '2025-10-27 06:57:01', '2025-10-27 06:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Budi Santoso', 'budi@example.com', '081234567890', 'Jakarta', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(2, 'Siti Aminah', 'siti@example.com', '081234567891', 'Depok', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(3, 'Andi Saputra', 'andi@example.com', '081234567892', 'Bogor', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(4, 'Dewi Lestari', 'dewi@example.com', '081234567893', 'Bekasi', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(5, 'Rudi Hartono', 'rudi@example.com', '081234567894', 'Tangerang', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(6, 'Yulia Kartika', 'yulia@example.com', '081234567895', 'Bandung', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(7, 'Agus Pratama', 'agus@example.com', '081234567896', 'Cirebon', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(8, 'Lina Marlina', 'lina@example.com', '081234567897', 'Cianjur', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(9, 'Doni Firmansyah', 'doni@example.com', '081234567898', 'Sukabumi', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(10, 'Fajar Hidayat', 'fajar@example.com', '081234567899', 'Karawang', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(11, 'Tini Rahayu', 'tini@example.com', '081234567900', 'Purwakarta', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(12, 'Rina Agustina', 'rina@example.com', '081234567901', 'Bandung', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(13, 'Joko Susilo', 'joko@example.com', '081234567902', 'Bekasi', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(14, 'Fitri Handayani', 'fitri@example.com', '081234567903', 'Jakarta', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(15, 'Ahmad Fauzi', 'ahmad@example.com', '081234567904', 'Depok', '2025-10-27 06:57:01', '2025-10-27 06:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_10_26_083129_create_cars_table', 1),
(6, '2025_10_26_090224_create_customers_table', 1),
(7, '2025_10_26_091000_create_rentals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint UNSIGNED NOT NULL,
  `car_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ongoing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `car_id`, `customer_id`, `start_date`, `end_date`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 17, 14, '2025-10-26', '2025-10-31', '985817.00', 'completed', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(2, 13, 3, '2025-09-29', '2025-10-02', '1956961.00', 'completed', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(3, 25, 5, '2025-10-12', '2025-10-17', '1198505.00', 'cancelled', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(4, 14, 2, '2025-10-13', '2025-10-15', '804733.00', 'ongoing', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(5, 13, 6, '2025-10-15', '2025-10-19', '945480.00', 'completed', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(6, 12, 4, '2025-10-23', '2025-10-25', '1672790.00', 'completed', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(7, 28, 13, '2025-10-05', '2025-10-10', '2101014.00', 'ongoing', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(8, 11, 8, '2025-10-25', '2025-10-28', '1534041.00', 'ongoing', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(9, 24, 4, '2025-10-13', '2025-10-18', '1637662.00', 'ongoing', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(10, 5, 7, '2025-10-13', '2025-10-19', '777265.00', 'ongoing', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(11, 24, 9, '2025-10-01', '2025-10-08', '2162330.00', 'completed', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(12, 13, 14, '2025-10-12', '2025-10-17', '2040850.00', 'ongoing', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(13, 3, 1, '2025-10-07', '2025-10-14', '959271.00', 'completed', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(14, 21, 10, '2025-10-22', '2025-10-29', '2033002.00', 'ongoing', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(15, 18, 10, '2025-10-02', '2025-10-07', '1645192.00', 'ongoing', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(16, 20, 7, '2025-10-18', '2025-10-21', '2260308.00', 'ongoing', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(17, 26, 13, '2025-10-26', '2025-11-02', '2385254.00', 'completed', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(18, 27, 15, '2025-10-14', '2025-10-19', '1898645.00', 'ongoing', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(19, 6, 2, '2025-10-23', '2025-10-30', '1373287.00', 'cancelled', '2025-10-27 06:57:01', '2025-10-27 06:57:01'),
(20, 25, 6, '2025-10-03', '2025-10-06', '1823487.00', 'cancelled', '2025-10-27 06:57:01', '2025-10-27 06:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cars_license_plate_unique` (`license_plate`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`),
  ADD KEY `rentals_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
