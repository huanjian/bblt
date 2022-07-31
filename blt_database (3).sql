-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2022 at 02:39 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blt_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `lokasi_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `nama`, `alamat`, `telepon`, `email`, `kode`, `lokasi_id`) VALUES
(1, 'LOMBOK', 'JALAN CAKRA 1', '111111111', 'CAKRA@APP.COM', '01', 1),
(2, 'SURABAYA WASPADA', 'JALAN WASPADA SURABAYA', '222222222', 'WASPADA@APP.COM', '02', 3),
(3, 'SURABAYA GEMBONG', 'JALAN GEMBONG SURABAYA', '333333333', 'GEMBONG@APP.COM', '03', 3),
(4, 'SURABAYA MAGUMULYO', 'JALAN MAGUMULYO SURABAYA', '77777', 'magu@app.com', '04', 3),
(5, 'BALI', 'jalan bali', '88888', 'bli@app.com', '05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cms_apicustom`
--

CREATE TABLE `cms_apicustom` (
  `id` int UNSIGNED NOT NULL,
  `permalink` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `tabel` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `aksi` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `kolom` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `orderby` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `sub_query_1` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `sql_where` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `parameter` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method_type` varchar(25) CHARACTER SET utf8mb4  DEFAULT NULL,
  `parameters` longtext CHARACTER SET utf8mb4 ,
  `responses` longtext CHARACTER SET utf8mb4 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_apicustom`
--

INSERT INTO `cms_apicustom` (`id`, `permalink`, `tabel`, `aksi`, `kolom`, `orderby`, `sub_query_1`, `sql_where`, `nama`, `keterangan`, `parameter`, `created_at`, `updated_at`, `method_type`, `parameters`, `responses`) VALUES
(1, 'admin_pelanggan_info', 'pelanggan', 'detail', NULL, NULL, NULL, NULL, 'info', '<p>untuk mencari pelanggan berdasarkan id</p>', NULL, NULL, NULL, 'get', 'a:1:{i:0;a:5:{s:4:\"name\";s:2:\"id\";s:4:\"type\";s:6:\"string\";s:6:\"config\";N;s:8:\"required\";s:1:\"1\";s:4:\"used\";s:1:\"1\";}}', 'a:9:{i:0;a:4:{s:4:\"name\";s:6:\"alamat\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:1;a:4:{s:4:\"name\";s:7:\"catatan\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:2;a:4:{s:4:\"name\";s:2:\"id\";s:4:\"type\";s:3:\"int\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:3;a:4:{s:4:\"name\";s:12:\"kd_pelanggan\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:4;a:4:{s:4:\"name\";s:9:\"lokasi_id\";s:4:\"type\";s:7:\"integer\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:5;a:4:{s:4:\"name\";s:12:\"maks_piutang\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:6;a:4:{s:4:\"name\";s:4:\"nama\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:7;a:4:{s:4:\"name\";s:7:\"penanda\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:8;a:4:{s:4:\"name\";s:7:\"telepon\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}}'),
(2, 'admin_satuan_detail', 'satuan', 'detail', NULL, NULL, NULL, NULL, 'admin satuan detail', '<p>mengetahui satuan detail</p>', NULL, NULL, NULL, 'get', 'a:1:{i:0;a:5:{s:4:\"name\";s:2:\"id\";s:4:\"type\";s:6:\"string\";s:6:\"config\";N;s:8:\"required\";s:1:\"1\";s:4:\"used\";s:1:\"1\";}}', 'a:7:{i:0;a:4:{s:4:\"name\";s:5:\"harga\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:1;a:4:{s:4:\"name\";s:2:\"id\";s:4:\"type\";s:3:\"int\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:2;a:4:{s:4:\"name\";s:11:\"label_harga\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:3;a:4:{s:4:\"name\";s:12:\"label_produk\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:4;a:4:{s:4:\"name\";s:12:\"pelanggan_id\";s:4:\"type\";s:7:\"integer\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:5;a:4:{s:4:\"name\";s:6:\"produk\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:6;a:4:{s:4:\"name\";s:4:\"tipe\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}}'),
(3, 'kendaraan', 'kendaraan', 'detail', NULL, NULL, NULL, NULL, 'kendaraan', NULL, NULL, NULL, NULL, 'get', 'a:1:{i:0;a:5:{s:4:\"name\";s:2:\"id\";s:4:\"type\";s:6:\"string\";s:6:\"config\";N;s:8:\"required\";s:1:\"1\";s:4:\"used\";s:1:\"1\";}}', 'a:4:{i:0;a:4:{s:4:\"name\";s:2:\"id\";s:4:\"type\";s:3:\"int\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:1;a:4:{s:4:\"name\";s:10:\"keterangan\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:2;a:4:{s:4:\"name\";s:5:\"nomor\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:3;a:4:{s:4:\"name\";s:12:\"pengemudi_id\";s:4:\"type\";s:7:\"integer\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}}'),
(4, 'register_by_lokasi', 'register', 'list', NULL, NULL, NULL, NULL, 'register_by_lokasi', NULL, NULL, NULL, NULL, 'get', 'a:2:{i:0;a:5:{s:4:\"name\";s:4:\"resi\";s:4:\"type\";s:6:\"string\";s:6:\"config\";N;s:8:\"required\";s:1:\"0\";s:4:\"used\";s:1:\"0\";}i:1;a:5:{s:4:\"name\";s:15:\"lokasi_penerima\";s:4:\"type\";s:6:\"string\";s:6:\"config\";N;s:8:\"required\";s:1:\"0\";s:4:\"used\";s:1:\"0\";}}', 'a:8:{i:0;a:4:{s:4:\"name\";s:15:\"alamat_pengirim\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:1;a:4:{s:4:\"name\";s:13:\"alamat_tujuan\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:2;a:4:{s:4:\"name\";s:2:\"id\";s:4:\"type\";s:3:\"int\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:3;a:4:{s:4:\"name\";s:10:\"keterangan\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:4;a:4:{s:4:\"name\";s:12:\"pelanggan_id\";s:4:\"type\";s:7:\"integer\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:5;a:4:{s:4:\"name\";s:11:\"penerima_id\";s:4:\"type\";s:7:\"integer\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:6;a:4:{s:4:\"name\";s:4:\"resi\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:7;a:4:{s:4:\"name\";s:7:\"tanggal\";s:4:\"type\";s:4:\"date\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}}'),
(5, 'resi', 'register', 'detail', NULL, NULL, NULL, NULL, 'resi', NULL, NULL, NULL, NULL, 'get', 'a:1:{i:0;a:5:{s:4:\"name\";s:4:\"resi\";s:4:\"type\";s:6:\"string\";s:6:\"config\";N;s:8:\"required\";s:1:\"0\";s:4:\"used\";s:1:\"0\";}}', 'a:9:{i:0;a:4:{s:4:\"name\";s:2:\"id\";s:4:\"type\";s:3:\"int\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:1;a:4:{s:4:\"name\";s:4:\"resi\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:2;a:4:{s:4:\"name\";s:7:\"tanggal\";s:4:\"type\";s:4:\"date\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:3;a:4:{s:4:\"name\";s:12:\"pelanggan_id\";s:4:\"type\";s:7:\"integer\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:4;a:4:{s:4:\"name\";s:19:\"pelanggan_lokasi_id\";s:4:\"type\";s:7:\"integer\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:5;a:4:{s:4:\"name\";s:15:\"alamat_pengirim\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:6;a:4:{s:4:\"name\";s:10:\"keterangan\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:7;a:4:{s:4:\"name\";s:11:\"penerima_id\";s:4:\"type\";s:7:\"integer\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:8;a:4:{s:4:\"name\";s:13:\"alamat_tujuan\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}}'),
(6, 'manifest', 'register_detail', 'list', NULL, NULL, NULL, NULL, 'manifest', NULL, NULL, NULL, NULL, 'post', 'a:1:{i:0;a:5:{s:4:\"name\";s:4:\"json\";s:4:\"type\";s:6:\"string\";s:6:\"config\";N;s:8:\"required\";s:1:\"0\";s:4:\"used\";s:1:\"0\";}}', 'a:12:{i:0;a:4:{s:4:\"name\";s:2:\"id\";s:4:\"type\";s:3:\"int\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:1;a:4:{s:4:\"name\";s:6:\"produk\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:2;a:4:{s:4:\"name\";s:10:\"keterangan\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:3;a:4:{s:4:\"name\";s:9:\"satuan_id\";s:4:\"type\";s:7:\"integer\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:4;a:4:{s:4:\"name\";s:6:\"banyak\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:5;a:4:{s:4:\"name\";s:5:\"berat\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:6;a:4:{s:4:\"name\";s:5:\"kubik\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:7;a:4:{s:4:\"name\";s:5:\"harga\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:8;a:4:{s:4:\"name\";s:5:\"total\";s:4:\"type\";s:6:\"string\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:9;a:4:{s:4:\"name\";s:11:\"register_id\";s:4:\"type\";s:7:\"integer\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:10;a:4:{s:4:\"name\";s:12:\"qty_manifest\";s:4:\"type\";s:3:\"int\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}i:11;a:4:{s:4:\"name\";s:13:\"sisa_manifest\";s:4:\"type\";s:3:\"int\";s:8:\"subquery\";N;s:4:\"used\";s:1:\"1\";}}');

-- --------------------------------------------------------

--
-- Table structure for table `cms_apikey`
--

CREATE TABLE `cms_apikey` (
  `id` int UNSIGNED NOT NULL,
  `screetkey` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `hit` int DEFAULT NULL,
  `status` varchar(25) CHARACTER SET utf8mb4  NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_apikey`
--

INSERT INTO `cms_apikey` (`id`, `screetkey`, `hit`, `status`, `created_at`, `updated_at`) VALUES
(1, 'acf67be3ffbe3bf2ea0855243705da6d', 0, 'active', '2022-04-11 18:51:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_dashboard`
--

CREATE TABLE `cms_dashboard` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `id_cms_privileges` int DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 ,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_queues`
--

CREATE TABLE `cms_email_queues` (
  `id` int UNSIGNED NOT NULL,
  `send_at` datetime DEFAULT NULL,
  `email_recipient` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `email_from_email` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `email_from_name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `email_cc_email` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `email_subject` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `email_content` text CHARACTER SET utf8mb4 ,
  `email_attachments` text CHARACTER SET utf8mb4 ,
  `is_sent` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_templates`
--

CREATE TABLE `cms_email_templates` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 ,
  `description` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `from_name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `from_email` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `cc_email` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_email_templates`
--

INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
(1, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2021-11-09 00:52:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_logs`
--

CREATE TABLE `cms_logs` (
  `id` int UNSIGNED NOT NULL,
  `ipaddress` varchar(50) CHARACTER SET utf8mb4  DEFAULT NULL,
  `useragent` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `details` text CHARACTER SET utf8mb4 ,
  `id_cms_users` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_logs`
--

INSERT INTO `cms_logs` (`id`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@crudbooster.com login dengan IP Address 127.0.0.1', '', 1, '2022-05-22 22:59:26', NULL),
(2, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@crudbooster.com login dengan IP Address 127.0.0.1', '', 1, '2022-05-23 02:27:09', NULL),
(3, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@crudbooster.com login dengan IP Address 127.0.0.1', '', 1, '2022-05-23 14:20:51', NULL),
(4, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/logout', 'admin@crudbooster.com keluar', '', 1, '2022-05-23 15:31:24', NULL),
(5, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@crudbooster.com login dengan IP Address 127.0.0.1', '', 1, '2022-05-23 15:31:32', NULL),
(6, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/register/add-save', 'Tambah data baru RS01-2205000003 pada Register', '', 1, '2022-05-23 15:40:39', NULL),
(7, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/register/add-save', 'Tambah data baru RS01-2205000005 pada Register', '', 1, '2022-05-23 17:50:24', NULL),
(8, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/manifest/add-save', 'Tambah data baru MN01-2205000001 pada Manifest', '', 1, '2022-05-24 07:34:37', NULL),
(9, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/manifest/add-save', 'Tambah data baru MN01-2205000001 pada Manifest', '', 1, '2022-05-24 07:50:02', NULL),
(10, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/manifest/add-save', 'Tambah data baru MN01-2205000001 pada Manifest', '', 1, '2022-05-24 07:51:23', NULL),
(11, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/manifest/add-save', 'Tambah data baru MN01-2205000001 pada Manifest', '', 1, '2022-05-24 07:57:29', NULL),
(12, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/manifest/add-save', 'Tambah data baru MN01-2205000001 pada Manifest', '', 1, '2022-05-24 07:59:23', NULL),
(13, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/manifest/add-save', 'Tambah data baru MN01-2205000001 pada Manifest', '', 1, '2022-05-24 09:29:18', NULL),
(14, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/manifest/add-save', 'Tambah data baru MN01-2205000008 pada Manifest', '', 1, '2022-05-24 10:06:43', NULL),
(15, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/manifest/add-save', 'Tambah data baru MN01-2205000009 pada Manifest', '', 1, '2022-05-24 12:21:05', NULL),
(16, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/manifest/add-save', 'Tambah data baru MN01-2205000010 pada Manifest', '', 1, '2022-05-24 12:25:13', NULL),
(17, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/manifest/add-save', 'Tambah data baru MN01-2205000011 pada Manifest', '', 1, '2022-05-24 12:26:12', NULL),
(18, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@crudbooster.com login dengan IP Address 127.0.0.1', '', 1, '2022-05-25 03:35:48', NULL),
(19, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/manifest/add-save', 'Tambah data baru MN01-2205000015 pada Manifest', '', 1, '2022-05-25 03:54:47', NULL),
(20, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/satuan/add-save', 'Tambah data baru ALEX PIRING pada Tabel Harga', '', 1, '2022-05-25 05:30:53', NULL),
(21, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/satuan/add-save', 'Tambah data baru ALEX TAS pada Tabel Harga', '', 1, '2022-05-25 05:33:55', NULL),
(22, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/register/add-save', 'Tambah data baru RS01-2205000006 pada Register', '', 1, '2022-05-25 06:13:39', NULL),
(23, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/register/add-save', 'Tambah data baru RS01-2205000007 pada Register', '', 1, '2022-05-25 06:16:45', NULL),
(24, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/register/add-save', 'Tambah data baru RS01-2205000008 pada Register', '', 1, '2022-05-25 06:29:19', NULL),
(25, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/register/add-save', 'Tambah data baru RS01-2205000009 pada Register', '', 1, '2022-05-25 06:31:01', NULL),
(26, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/register/add-save', 'Tambah data baru RS01-2205000010 pada Register', '', 1, '2022-05-25 06:32:35', NULL),
(27, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/register/add-save', 'Tambah data baru RS01-2205000011 pada Register', '', 1, '2022-05-25 06:34:06', NULL),
(28, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/register/add-save', 'Tambah data baru RS01-2205000001 pada Register', '', 1, '2022-05-25 06:36:17', NULL),
(29, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/register/add-save', 'Tambah data baru RS01-2205000002 pada Register', '', 1, '2022-05-25 06:37:31', NULL),
(30, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'http://localhost:8000/admin/manifest/add-save', 'Tambah data baru MN01-2205000001 pada Manifest', '', 1, '2022-05-25 06:38:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus`
--

CREATE TABLE `cms_menus` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4  NOT NULL DEFAULT 'url',
  `path` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_dashboard` tinyint(1) NOT NULL DEFAULT '0',
  `id_cms_privileges` int DEFAULT NULL,
  `sorting` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
(1, 'Unit Lokasi', 'Route', 'AdminCabangControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 1, '2022-03-25 06:22:06', NULL),
(2, 'Pelanggan', 'Route', 'AdminPelangganControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 2, '2022-03-25 06:50:27', NULL),
(3, 'Kendaraan', 'Route', 'AdminKendaraanControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 3, '2022-03-25 06:58:21', NULL),
(4, 'Pengemudi', 'Route', 'AdminPengemudiControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 4, '2022-03-25 07:13:24', NULL),
(5, 'Satuan', 'Route', 'AdminSatuanControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 5, '2022-03-25 08:13:05', NULL),
(7, 'Register', 'Route', 'AdminRegisterControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 6, '2022-03-25 17:19:21', NULL),
(8, 'Manifest', 'Route', 'AdminManifestControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 7, '2022-03-25 18:21:11', NULL),
(9, 'Lokasi', 'Route', 'AdminLokasiControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 8, '2022-04-09 21:53:19', NULL),
(10, 'Standar Pengemudi', 'Route', 'AdminDefaultPengemudiControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 9, '2022-04-10 04:49:59', NULL),
(11, 'User Management', 'Module', 'users', 'normal', 'fa fa-glass', 0, 1, 0, 1, NULL, '2022-04-10 20:30:25', NULL),
(12, 'Rute', 'Route', 'AdminRuteControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 10, '2022-05-22 07:48:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus_privileges`
--

CREATE TABLE `cms_menus_privileges` (
  `id` int UNSIGNED NOT NULL,
  `id_cms_menus` int DEFAULT NULL,
  `id_cms_privileges` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_menus_privileges`
--

INSERT INTO `cms_menus_privileges` (`id`, `id_cms_menus`, `id_cms_privileges`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 2),
(12, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_moduls`
--

CREATE TABLE `cms_moduls` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `controller` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_moduls`
--

INSERT INTO `cms_moduls` (`id`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Notifications', 'fa fa-cog', 'notifications', 'cms_notifications', 'NotificationsController', 1, 1, '2021-11-09 00:52:08', NULL, NULL),
(2, 'Privileges', 'fa fa-cog', 'privileges', 'cms_privileges', 'PrivilegesController', 1, 1, '2021-11-09 00:52:08', NULL, NULL),
(3, 'Privileges Roles', 'fa fa-cog', 'privileges_roles', 'cms_privileges_roles', 'PrivilegesRolesController', 1, 1, '2021-11-09 00:52:08', NULL, NULL),
(4, 'Users Management', 'fa fa-users', 'users', 'cms_users', 'AdminCmsUsersController', 0, 1, '2021-11-09 00:52:08', NULL, NULL),
(5, 'Settings', 'fa fa-cog', 'settings', 'cms_settings', 'SettingsController', 1, 1, '2021-11-09 00:52:08', NULL, NULL),
(6, 'Module Generator', 'fa fa-database', 'module_generator', 'cms_moduls', 'ModulsController', 1, 1, '2021-11-09 00:52:08', NULL, NULL),
(7, 'Menu Management', 'fa fa-bars', 'menu_management', 'cms_menus', 'MenusController', 1, 1, '2021-11-09 00:52:08', NULL, NULL),
(8, 'Email Templates', 'fa fa-envelope-o', 'email_templates', 'cms_email_templates', 'EmailTemplatesController', 1, 1, '2021-11-09 00:52:08', NULL, NULL),
(9, 'Statistic Builder', 'fa fa-dashboard', 'statistic_builder', 'cms_statistics', 'StatisticBuilderController', 1, 1, '2021-11-09 00:52:08', NULL, NULL),
(10, 'API Generator', 'fa fa-cloud-download', 'api_generator', '', 'ApiCustomController', 1, 1, '2021-11-09 00:52:08', NULL, NULL),
(11, 'Log User Access', 'fa fa-flag-o', 'logs', 'cms_logs', 'LogsController', 1, 1, '2021-11-09 00:52:08', NULL, NULL),
(12, 'Cabang', 'fa fa-glass', 'cabang', 'cabang', 'AdminCabangController', 0, 0, '2022-03-25 06:22:06', NULL, NULL),
(13, 'Pelanggan', 'fa fa-glass', 'pelanggan', 'pelanggan', 'AdminPelangganController', 0, 0, '2022-03-25 06:50:27', NULL, NULL),
(14, 'Kendaraan', 'fa fa-glass', 'kendaraan', 'kendaraan', 'AdminKendaraanController', 0, 0, '2022-03-25 06:58:21', NULL, NULL),
(15, 'Kendaraan', 'fa fa-glass', 'pengemudi', 'pengemudi', 'AdminPengemudiController', 0, 0, '2022-03-25 07:13:24', NULL, NULL),
(16, 'Tabel Harga', 'fa fa-glass', 'satuan', 'satuan', 'AdminSatuanController', 0, 0, '2022-03-25 08:13:05', NULL, NULL),
(17, 'Register', 'fa fa-glass', 'register', 'register', 'AdminRegisterController', 0, 0, '2022-03-25 16:57:02', NULL, '2022-03-25 17:19:05'),
(18, 'Register', 'fa fa-glass', 'register', 'register', 'AdminRegisterController', 0, 0, '2022-03-25 17:19:21', NULL, NULL),
(19, 'Manifest', 'fa fa-glass', 'manifest', 'manifest', 'AdminManifestController', 0, 0, '2022-03-25 18:21:11', NULL, NULL),
(20, 'Lokasi', 'fa fa-glass', 'lokasi', 'lokasi', 'AdminLokasiController', 0, 0, '2022-04-09 21:53:19', NULL, NULL),
(21, 'Standar Pengemudi', 'fa fa-glass', 'default_pengemudi', 'pengemudi', 'AdminDefaultPengemudiController', 0, 0, '2022-04-10 04:49:59', NULL, NULL),
(22, 'Rute', 'fa fa-glass', 'rute', 'rute', 'AdminRuteController', 0, 0, '2022-05-22 07:48:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_notifications`
--

CREATE TABLE `cms_notifications` (
  `id` int UNSIGNED NOT NULL,
  `id_cms_users` int DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges`
--

CREATE TABLE `cms_privileges` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `name`, `is_superadmin`, `theme_color`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 1, 'skin-red', '2021-11-09 00:52:09', NULL),
(2, 'admin', 0, 'skin-blue', NULL, NULL),
(3, '01', 0, 'skin-blue', NULL, NULL),
(4, '02', 0, 'skin-blue', NULL, NULL),
(5, '03', 0, 'skin-blue', NULL, NULL),
(6, '04', 0, 'skin-blue', NULL, NULL),
(7, '05', 0, 'skin-blue', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges_roles`
--

CREATE TABLE `cms_privileges_roles` (
  `id` int UNSIGNED NOT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int DEFAULT NULL,
  `id_cms_moduls` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_privileges_roles`
--

INSERT INTO `cms_privileges_roles` (`id`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 1, 1, '2021-11-09 00:52:09', NULL),
(2, 1, 1, 1, 1, 1, 1, 2, '2021-11-09 00:52:09', NULL),
(3, 0, 1, 1, 1, 1, 1, 3, '2021-11-09 00:52:09', NULL),
(4, 1, 1, 1, 1, 1, 1, 4, '2021-11-09 00:52:09', NULL),
(5, 1, 1, 1, 1, 1, 1, 5, '2021-11-09 00:52:09', NULL),
(6, 1, 1, 1, 1, 1, 1, 6, '2021-11-09 00:52:09', NULL),
(7, 1, 1, 1, 1, 1, 1, 7, '2021-11-09 00:52:09', NULL),
(8, 1, 1, 1, 1, 1, 1, 8, '2021-11-09 00:52:09', NULL),
(9, 1, 1, 1, 1, 1, 1, 9, '2021-11-09 00:52:09', NULL),
(10, 1, 1, 1, 1, 1, 1, 10, '2021-11-09 00:52:09', NULL),
(11, 1, 0, 1, 0, 1, 1, 11, '2021-11-09 00:52:09', NULL),
(12, 1, 1, 1, 1, 1, 1, 12, NULL, NULL),
(13, 1, 1, 1, 1, 1, 1, 13, NULL, NULL),
(14, 1, 1, 1, 1, 1, 1, 14, NULL, NULL),
(15, 1, 1, 1, 1, 1, 1, 15, NULL, NULL),
(16, 1, 1, 1, 1, 1, 1, 16, NULL, NULL),
(17, 1, 1, 1, 1, 1, 1, 17, NULL, NULL),
(18, 1, 1, 1, 1, 1, 1, 18, NULL, NULL),
(26, 1, 1, 1, 1, 1, 1, 19, NULL, NULL),
(27, 1, 1, 1, 1, 1, 1, 20, NULL, NULL),
(46, 1, 1, 1, 1, 1, 1, 21, NULL, NULL),
(56, 1, 1, 1, 1, 0, 3, 12, NULL, NULL),
(57, 1, 1, 1, 1, 0, 3, 14, NULL, NULL),
(58, 1, 1, 1, 1, 0, 3, 20, NULL, NULL),
(59, 1, 1, 1, 1, 0, 3, 19, NULL, NULL),
(60, 1, 1, 1, 1, 0, 3, 13, NULL, NULL),
(61, 1, 1, 1, 1, 0, 3, 15, NULL, NULL),
(62, 1, 1, 1, 1, 0, 3, 18, NULL, NULL),
(63, 1, 1, 1, 1, 0, 3, 21, NULL, NULL),
(64, 1, 1, 1, 1, 0, 3, 16, NULL, NULL),
(65, 1, 1, 1, 1, 0, 4, 12, NULL, NULL),
(66, 1, 1, 1, 1, 0, 4, 14, NULL, NULL),
(67, 1, 1, 1, 1, 0, 4, 20, NULL, NULL),
(68, 1, 1, 1, 1, 0, 4, 19, NULL, NULL),
(69, 1, 1, 1, 1, 0, 4, 13, NULL, NULL),
(70, 1, 1, 1, 1, 0, 4, 15, NULL, NULL),
(71, 1, 1, 1, 1, 0, 4, 18, NULL, NULL),
(72, 1, 1, 1, 1, 0, 4, 21, NULL, NULL),
(73, 1, 1, 1, 1, 0, 4, 16, NULL, NULL),
(74, 1, 1, 1, 1, 0, 5, 12, NULL, NULL),
(75, 1, 1, 1, 1, 0, 5, 14, NULL, NULL),
(76, 1, 1, 1, 1, 0, 5, 20, NULL, NULL),
(77, 1, 1, 1, 1, 0, 5, 19, NULL, NULL),
(78, 1, 1, 1, 1, 0, 5, 13, NULL, NULL),
(79, 1, 1, 1, 1, 0, 5, 15, NULL, NULL),
(80, 1, 1, 1, 1, 0, 5, 18, NULL, NULL),
(81, 1, 1, 1, 1, 0, 5, 21, NULL, NULL),
(82, 1, 1, 1, 1, 0, 5, 16, NULL, NULL),
(83, 1, 1, 1, 1, 0, 6, 12, NULL, NULL),
(84, 1, 1, 1, 1, 0, 6, 14, NULL, NULL),
(85, 1, 1, 1, 1, 0, 6, 20, NULL, NULL),
(86, 1, 1, 1, 1, 0, 6, 19, NULL, NULL),
(87, 1, 1, 1, 1, 0, 6, 13, NULL, NULL),
(88, 1, 1, 1, 1, 0, 6, 15, NULL, NULL),
(89, 1, 1, 1, 1, 0, 6, 18, NULL, NULL),
(90, 1, 1, 1, 1, 0, 6, 21, NULL, NULL),
(91, 1, 1, 1, 1, 0, 6, 16, NULL, NULL),
(92, 1, 1, 1, 1, 0, 7, 12, NULL, NULL),
(93, 1, 1, 1, 1, 0, 7, 14, NULL, NULL),
(94, 1, 1, 1, 1, 0, 7, 20, NULL, NULL),
(95, 1, 1, 1, 1, 0, 7, 19, NULL, NULL),
(96, 1, 1, 1, 1, 0, 7, 13, NULL, NULL),
(97, 1, 1, 1, 1, 0, 7, 15, NULL, NULL),
(98, 1, 1, 1, 1, 0, 7, 18, NULL, NULL),
(99, 1, 1, 1, 1, 0, 7, 21, NULL, NULL),
(100, 1, 1, 1, 1, 0, 7, 16, NULL, NULL),
(101, 1, 1, 1, 1, 0, 2, 12, NULL, NULL),
(102, 1, 1, 1, 1, 0, 2, 14, NULL, NULL),
(103, 1, 1, 1, 1, 0, 2, 20, NULL, NULL),
(104, 1, 1, 1, 1, 0, 2, 19, NULL, NULL),
(105, 1, 1, 1, 1, 0, 2, 13, NULL, NULL),
(106, 1, 1, 1, 1, 0, 2, 15, NULL, NULL),
(107, 1, 1, 1, 1, 0, 2, 18, NULL, NULL),
(108, 1, 1, 1, 1, 0, 2, 21, NULL, NULL),
(109, 1, 1, 1, 1, 0, 2, 16, NULL, NULL),
(110, 1, 1, 1, 1, 0, 2, 4, NULL, NULL),
(111, 1, 1, 1, 1, 1, 1, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_settings`
--

CREATE TABLE `cms_settings` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 ,
  `content_input_type` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `dataenum` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `helper` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_setting` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `created_at`, `updated_at`, `group_setting`, `label`) VALUES
(1, 'login_background_color', NULL, 'text', NULL, 'Input hexacode', '2021-11-09 00:52:08', NULL, 'Login Register Style', 'Login Background Color'),
(2, 'login_font_color', NULL, 'text', NULL, 'Input hexacode', '2021-11-09 00:52:08', NULL, 'Login Register Style', 'Login Font Color'),
(3, 'login_background_image', NULL, 'upload_image', NULL, NULL, '2021-11-09 00:52:08', NULL, 'Login Register Style', 'Login Background Image'),
(4, 'email_sender', 'support@crudbooster.com', 'text', NULL, NULL, '2021-11-09 00:52:08', NULL, 'Email Setting', 'Email Sender'),
(5, 'smtp_driver', 'mail', 'select', 'smtp,mail,sendmail', NULL, '2021-11-09 00:52:08', NULL, 'Email Setting', 'Mail Driver'),
(6, 'smtp_host', '', 'text', NULL, NULL, '2021-11-09 00:52:08', NULL, 'Email Setting', 'SMTP Host'),
(7, 'smtp_port', '25', 'text', NULL, 'default 25', '2021-11-09 00:52:08', NULL, 'Email Setting', 'SMTP Port'),
(8, 'smtp_username', '', 'text', NULL, NULL, '2021-11-09 00:52:08', NULL, 'Email Setting', 'SMTP Username'),
(9, 'smtp_password', '', 'text', NULL, NULL, '2021-11-09 00:52:08', NULL, 'Email Setting', 'SMTP Password'),
(10, 'appname', 'Sistem Informasi - BLT', 'text', NULL, NULL, '2021-11-09 00:52:08', NULL, 'Application Setting', 'Application Name'),
(11, 'default_paper_size', 'Legal', 'text', NULL, 'Paper size, ex : A4, Legal, etc', '2021-11-09 00:52:08', NULL, 'Application Setting', 'Default Paper Print Size'),
(12, 'logo', 'uploads/2021-11/296553f71fd509009f8102020476cc36.png', 'upload_image', NULL, NULL, '2021-11-09 00:52:08', NULL, 'Application Setting', 'Logo'),
(13, 'favicon', 'uploads/2021-11/ed64764dbc1442afdf6ba727a91e0d64.png', 'upload_image', NULL, NULL, '2021-11-09 00:52:08', NULL, 'Application Setting', 'Favicon'),
(14, 'api_debug_mode', 'true', 'select', 'true,false', NULL, '2021-11-09 00:52:08', NULL, 'Application Setting', 'API Debug Mode'),
(15, 'google_api_key', NULL, 'text', NULL, NULL, '2021-11-09 00:52:08', NULL, 'Application Setting', 'Google API Key'),
(16, 'google_fcm_key', NULL, 'text', NULL, NULL, '2021-11-09 00:52:08', NULL, 'Application Setting', 'Google FCM Key');

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistics`
--

CREATE TABLE `cms_statistics` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistic_components`
--

CREATE TABLE `cms_statistic_components` (
  `id` int UNSIGNED NOT NULL,
  `id_cms_statistics` int DEFAULT NULL,
  `componentID` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `component_name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `area_name` varchar(55) CHARACTER SET utf8mb4  DEFAULT NULL,
  `sorting` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `config` longtext CHARACTER SET utf8mb4 ,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `id_cms_privileges` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`id`, `name`, `photo`, `email`, `password`, `id_cms_privileges`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Super Admin', 'uploads/1/2021-11/user.png', 'admin@crudbooster.com', '$2y$10$J5oQ4QzCOpAARMnj45aGLe8ZnTu9MRl4eXzWvnlnzNc3Az0BQlZJW', 1, '2021-11-09 00:52:08', '2021-11-09 02:16:39', 'Active'),
(2, 'samuel', 'uploads/1/2022-03/default.png', 'samuel@app.com', '$2y$10$VDgQa0ibaPM6.6mXC7gShO2RYSvlzsfn29c0vUE4fDJJp13z41.o6', 2, '2022-03-25 18:18:06', '2022-04-10 20:28:23', NULL),
(3, 'staff', 'uploads/1/2022-04/default.png', 'staff01@app.com', '$2y$10$7yOYEpbLSSbALloLPujaKewEGYCUBCAQQwYgtzmVkKTFaQxtIFH8W', 3, '2022-04-11 16:29:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `connection` text CHARACTER SET utf8mb4  NOT NULL,
  `queue` text CHARACTER SET utf8mb4  NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4  NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4  NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `pengemudi_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nomor`, `keterangan`, `pengemudi_id`) VALUES
(1, 'DR 123456 KYS', 'aktif', 1),
(2, 'WY 312155 XW', 'aktif', 2),
(3, 'QT 2652 CVX', 'aktif', 4),
(4, 'QT 83619 CV', 'aktif', 3),
(5, 'SD 212321 AS', 'aktif', 5),
(6, 'CB 5678 ER', 'aktif', 6);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `deskripsi`, `nama_lokasi`) VALUES
(1, 'active', 'Mataram'),
(2, 'active', 'Denpasar'),
(3, 'active', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `manifest`
--

CREATE TABLE `manifest` (
  `id` int NOT NULL,
  `nomor_manifest` varchar(255) NOT NULL,
  `kendaraan_id` int NOT NULL,
  `pengemudi_id` int NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `lokasi_id` int NOT NULL,
  `alamat_tujuan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `manifest`
--

INSERT INTO `manifest` (`id`, `nomor_manifest`, `kendaraan_id`, `pengemudi_id`, `tanggal_berangkat`, `lokasi_id`, `alamat_tujuan`, `keterangan`) VALUES
(1, 'MN01-2205000001', 6, 6, '2022-05-25', 3, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `manifest_chart`
--

CREATE TABLE `manifest_chart` (
  `id` int NOT NULL,
  `session` varchar(255) NOT NULL,
  `register_detail_id` int NOT NULL,
  `temporary` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manifest_detail`
--

CREATE TABLE `manifest_detail` (
  `id` int NOT NULL,
  `manifest_id` int NOT NULL,
  `register_detail_id` int NOT NULL,
  `qty` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `manifest_detail`
--

INSERT INTO `manifest_detail` (`id`, `manifest_id`, `register_detail_id`, `qty`, `created`) VALUES
(1, 1, 3, 1, '2022-05-25 14:37:52'),
(2, 1, 4, 1, '2022-05-25 14:37:52'),
(3, 1, 1, 2, '2022-05-25 14:38:15'),
(4, 1, 2, 2, '2022-05-25 14:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_08_07_145904_add_table_cms_apicustom', 1),
(4, '2016_08_07_150834_add_table_cms_dashboard', 1),
(5, '2016_08_07_151210_add_table_cms_logs', 1),
(6, '2016_08_07_151211_add_details_cms_logs', 1),
(7, '2016_08_07_152014_add_table_cms_privileges', 1),
(8, '2016_08_07_152214_add_table_cms_privileges_roles', 1),
(9, '2016_08_07_152320_add_table_cms_settings', 1),
(10, '2016_08_07_152421_add_table_cms_users', 1),
(11, '2016_08_07_154624_add_table_cms_menus_privileges', 1),
(12, '2016_08_07_154624_add_table_cms_moduls', 1),
(13, '2016_08_17_225409_add_status_cms_users', 1),
(14, '2016_08_20_125418_add_table_cms_notifications', 1),
(15, '2016_09_04_033706_add_table_cms_email_queues', 1),
(16, '2016_09_16_035347_add_group_setting', 1),
(17, '2016_09_16_045425_add_label_setting', 1),
(18, '2016_09_17_104728_create_nullable_cms_apicustom', 1),
(19, '2016_10_01_141740_add_method_type_apicustom', 1),
(20, '2016_10_01_141846_add_parameters_apicustom', 1),
(21, '2016_10_01_141934_add_responses_apicustom', 1),
(22, '2016_10_01_144826_add_table_apikey', 1),
(23, '2016_11_14_141657_create_cms_menus', 1),
(24, '2016_11_15_132350_create_cms_email_templates', 1),
(25, '2016_11_15_190410_create_cms_statistics', 1),
(26, '2016_11_17_102740_create_cms_statistic_components', 1),
(27, '2017_06_06_164501_add_deleted_at_cms_moduls', 1),
(28, '2019_08_19_000000_create_failed_jobs_table', 1),
(29, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int NOT NULL,
  `kd_pelanggan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `lokasi_id` int NOT NULL,
  `maks_piutang` varchar(255) NOT NULL,
  `penanda` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kd_pelanggan`, `nama`, `alamat`, `telepon`, `lokasi_id`, `maks_piutang`, `penanda`, `catatan`) VALUES
(3, 'P00001', 'ALEX', 'jl. Imam Bonjol No.26. Kel. Alai Gelombang, Kec. Pariaman Tengah. Kota Pariaman - Sumatera Barat. KODE POS : 25519', '444444', 3, '50000000', '', ''),
(4, 'P00002', 'MAYTA', 'Jl. Krembangan Barat No.57, Krembangan Sel., Kec. Krembangan, Kota SBY, Jawa Timur 60175', '098908', 1, '50000000', '', ''),
(5, 'P00003', 'RONI', 'JALAN WASPADA SURABAYA', '222222', 1, '50000000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengemudi`
--

CREATE TABLE `pengemudi` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `penanda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `sim` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pengemudi`
--

INSERT INTO `pengemudi` (`id`, `nama`, `alamat`, `kota`, `telepon`, `penanda`, `catatan`, `ktp`, `sim`, `foto`) VALUES
(1, 'YANTO', 'JALAN SRIWIJAYAs', 'MATARAM', '0813565365', '', '', 'uploads/1/2022-04/ktp.jpg', 'uploads/1/2022-04/sim.jpg', ''),
(2, 'SUDIR', 'JALAN SRIWIJAYA', 'MATARAM', '0813565365', '', '', 'uploads/1/2022-04/ktp.jpg', 'uploads/1/2022-04/sim.jpg', ''),
(3, 'DONI', 'JALAN SRIWIJAYA', 'MATARAM', '0813565365', '', '', 'uploads/1/2022-04/ktp.jpg', 'uploads/1/2022-04/sim.jpg', ''),
(4, 'SANTO', 'JALAN SRIWIJAYA', 'MATARAM', '0813565365', '', '', 'uploads/1/2022-04/ktp.jpg', 'uploads/1/2022-04/sim.jpg', ''),
(5, 'BUDI', 'JALAN SRIWIJAYA', 'MATARAM', '0813565365', '', '', 'uploads/1/2022-04/ktp.jpg', 'uploads/1/2022-04/sim.jpg', ''),
(6, 'JONI', 'JALAN SRIWIJAYA', 'MATARAM', '0813565365', '', '', 'uploads/1/2022-04/ktp.jpg', 'uploads/1/2022-04/ktp.jpg', 'uploads/1/2022-04/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4  NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 ,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int NOT NULL,
  `resi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `pelanggan_id` int NOT NULL,
  `pelanggan_lokasi_id` int NOT NULL,
  `alamat_pengirim` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `penerima_id` int NOT NULL,
  `alamat_tujuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `resi`, `tanggal`, `pelanggan_id`, `pelanggan_lokasi_id`, `alamat_pengirim`, `keterangan`, `penerima_id`, `alamat_tujuan`) VALUES
(1, 'RS01-2205000001', '2022-05-25', 4, 3, 'Jl. Krembangan Barat No.57, Krembangan Sel., Kec. Krembangan, Kota SBY, Jawa Timur 60175', '', 3, 'jl. Imam Bonjol No.26. Kel. Alai Gelombang, Kec. Pariaman Tengah. Kota Pariaman - Sumatera Barat. KODE POS : 25519'),
(2, 'RS01-2205000002', '2022-05-25', 5, 3, 'JALAN WASPADA SURABAYA', '', 3, 'jl. Imam Bonjol No.26. Kel. Alai Gelombang, Kec. Pariaman Tengah. Kota Pariaman - Sumatera Barat. KODE POS : 25519');

-- --------------------------------------------------------

--
-- Table structure for table `register_detail`
--

CREATE TABLE `register_detail` (
  `id` int NOT NULL,
  `produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `satuan_id` int NOT NULL,
  `banyak` varchar(255) NOT NULL,
  `berat` varchar(255) NOT NULL,
  `kubik` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `total` varchar(2555) NOT NULL,
  `register_id` int NOT NULL,
  `qty_manifest` int NOT NULL DEFAULT '0',
  `sisa_manifest` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `register_detail`
--

INSERT INTO `register_detail` (`id`, `produk`, `keterangan`, `satuan_id`, `banyak`, `berat`, `kubik`, `harga`, `total`, `register_id`, `qty_manifest`, `sisa_manifest`) VALUES
(1, 'TAS', 'tas ibu', 4, '20', '30', '10', '2000', '40000', 1, 2, 18),
(2, 'SEPATU', 'sepatu anak', 2, '20', '10', '30', '5000', '150000', 1, 2, 18),
(3, 'TAS', 'TAS MERAH', 4, '20', '10', '30', '2000', '40000', 2, 1, 19),
(4, 'PIRING', 'PIRING KACA', 3, '30', '20', '10', '5000', '150000', 2, 1, 29);

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id` int NOT NULL,
  `asal_id` int NOT NULL,
  `tujuan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id`, `asal_id`, `tujuan_id`) VALUES
(1, 1, 3),
(2, 1, 2),
(3, 2, 3),
(4, 3, 1),
(5, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int NOT NULL,
  `kd_harga` varchar(255) NOT NULL,
  `pelanggan_id` int NOT NULL,
  `produk` varchar(255) NOT NULL,
  `tipe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `label_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `label_harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `kd_harga`, `pelanggan_id`, `produk`, `tipe`, `harga`, `label_produk`, `label_harga`) VALUES
(1, 'K01-000001', 3, 'TRIPLEK', 'kg', '3000', 'ALEX TRIPLEK', '3000 / kg'),
(2, 'K02-000002', 4, 'SEPATU', 'kubik', '5000', 'MAYTA SEPATU', '5000 / kubik'),
(3, 'K01-000002', 3, 'PIRING', 'koli', '5000', 'ALEX PIRING', '5000 / koli'),
(4, 'K01-000003', 3, 'TAS', 'koli', '2000', 'ALEX TAS', '2000 / koli');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_logs`
--
ALTER TABLE `cms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menus`
--
ALTER TABLE `cms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manifest`
--
ALTER TABLE `manifest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manifest_chart`
--
ALTER TABLE `manifest_chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manifest_detail`
--
ALTER TABLE `manifest_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_pelanggan` (`kd_pelanggan`);

--
-- Indexes for table `pengemudi`
--
ALTER TABLE `pengemudi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_detail`
--
ALTER TABLE `register_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_logs`
--
ALTER TABLE `cms_logs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cms_menus`
--
ALTER TABLE `cms_menus`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manifest`
--
ALTER TABLE `manifest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manifest_chart`
--
ALTER TABLE `manifest_chart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manifest_detail`
--
ALTER TABLE `manifest_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengemudi`
--
ALTER TABLE `pengemudi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register_detail`
--
ALTER TABLE `register_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
