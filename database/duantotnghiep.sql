-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2021 at 02:11 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duantotnghiep`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Màu sắc', 'mau-sac', '2021-10-05 20:45:17', '2021-10-05 20:45:17'),
(2, 'Size', 'size', '2021-10-05 20:45:21', '2021-10-05 20:45:21'),
(4, 'CPU', 'cpu', '2021-10-25 00:37:46', '2021-10-25 00:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_category`
--

CREATE TABLE `attribute_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id_cate` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_category`
--

INSERT INTO `attribute_category` (`id`, `category_id_cate`, `attribute_id`, `created_at`, `updated_at`) VALUES
(10, 34, 1, NULL, NULL),
(13, 34, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_image`, `meta_keywords`, `meta_title`, `meta_desc`, `created_at`, `updated_at`) VALUES
(7, 'Samsung', 'samsung', 'samsung31.png', 'samsung', 'Xuất sứ từ Nhật Bản.', 'Tập đoàn điện tử hàng đầu thế giới, đảm bảo về mặt chất lượng.', NULL, NULL),
(8, 'LG', 'lg', 'LG26.png', 'lg,LG', 'Tập đoàn điện tử hàng đầu Hàn Quốc.', 'Thương hiệu điện tử hàng đầu thế giới về chất lượng với đa dạng sản phẩm.', NULL, NULL),
(9, 'Asus', 'asus', 'asus47.png', 'asus', 'Thương hiệu điện tử hàng đầu Đài Loan.', 'Tập đoàn điện tử lớn nhất Đài Loan, đảm bảo về mặt chất lượng hàng đầu cho khách hàng.', NULL, NULL),
(10, 'Dell', 'dell', 'Dell58.png', 'DELL,dell', 'Thương hiệu điện tử hàng đầu USA.', 'Tập đoàn điện tử lớn nhất Hòa Kỳ , với đa dạng sản phẩm chất lượng cao.', NULL, NULL),
(11, 'Apple', 'apple', 'apple52.png', 'apple,iphone,ipad,apple watch', 'Tập đoàn điện tử hàng đầu thế giới.', 'Công ty công nghê đang đứng hàng đầu thế giới về các sản phẩm công nghệ.', NULL, NULL),
(12, 'MSI', 'msi', 'MSI33.png', 'msi,gaming', 'Thương hiệu laptop gaming hàng đầu.', 'Laptop cấu hình cao, mạnh mẽ, sắc nét,... đặc biệt dành cho các gamer.', NULL, NULL),
(13, 'Toshiba', 'toshiba', 'toshiba7.png', 'toshiba', 'Tập đoàn điện tử - điện lạnh hàng đầu Nhật Bản.', 'Thương hiệu hàng đầu cho các mặc hàng đồ điện tử - điện lạnh cho gia đình bạn.', NULL, NULL),
(14, 'Conmet', 'conmet', 'comet79.png', 'conmet', 'Thương hiệu đồ gia dụng hàng đầu.', 'Lựa chọn hàng đầu mang lại hạnh phúc cho gia đình của bạn.', NULL, NULL),
(15, 'Acecook', 'acecook', 'acecook75.png', 'acecook', 'Thương hiệu thực phẩm hàng đầu Việt Nam.', 'Sự lựa chọn hoàn hảo cho bữa ăn ngon cho gia đình của bạn.', NULL, NULL),
(16, 'TH True Milk', 'th-true-milk', 'th true milk31.png', 'th true milk,milk', 'Thương hiệu sữa đạt chuẩn Hoa Kỳ.', 'Đảm bảo về mặt chất lượng và an toàn cho sức khỏe gia đình của bạn.', NULL, NULL),
(17, 'Yamaha', 'yamaha', 'yamaha99.png', 'yamaha,xe máy,xe đạp', 'Thương hiệu xe gắn máy số 1 Việt Nam.', 'Mang đến sự an toàn và chất lượng đảm bảo trên từng cung đường cho mọi người.', NULL, NULL),
(18, 'Honda', 'honda', 'Honda60.png', 'honda,xe máy,xe đạp', 'Thương hiệu xe máy hàng đầu Nhật Bản.', 'Mang đến sự an toàn cho mọi người trên mọi nẻo đường Việt Nam.', NULL, NULL),
(19, 'Nivia', 'nivia', 'nivea74.png', 'nivia,mỹ phẩm', 'Thương hiệu mỹ phẩm hàng đầu cho phái đẹp.', 'Chất lượng hàng đầu, có chứng nhận an toàn cho sức khỏe của bạn.', NULL, NULL),
(20, 'Vichy', 'vichy', 'Vichy10.png', 'vichy,mỹ phẩm', 'Thương hiệu thời trang & mỹ phẩm chất lượng cao.', 'Mang đến cho bạn sắc đẹp trường tồn mãi mãi theo thời gian.', NULL, NULL),
(21, 'Nike', 'nike', 'nike84.png', 'nike,giày,áo,quần', 'Thương hiệu thời trang số một thế giới.', 'Thương hiệu thời trang trẻ trung, năng động cho bạn sự thoải mái, nhẹ nhàng.', NULL, NULL),
(22, 'Yonex', 'yonex', 'yonex89.png', 'yonex', 'Thương hiệu thời trang hot nhất hiện nay.', 'Mang đến sự đẳng cấp, sang trọng cho cuộc sống của bạn hơn nữa.', NULL, NULL),
(23, 'Friso', 'friso', 'friso54.png', 'friso,sữa', 'Thương hiệu sữa hàng đầu thế giới.', 'Chất lượng sản phẩm luôn được đặt lên hàng đầu  cho suwrc khỏe của bạn.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_cate` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` text COLLATE utf8mb4_unicode_ci,
  `category_parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cate`, `category_name`, `category_slug`, `category_parent_id`, `meta_keywords`, `meta_title`, `meta_desc`, `created_at`, `updated_at`) VALUES
(23, 'Điện thoại - Máy tính bảng', 'dien-thoai-may-tinh-bang', NULL, 'dienthoai,maytinhbang,phone,ipad', 'Điện thoại & Máy tính bảng 2021', '<p>Điện thoại , máy tính bảng chất lượng hàng đầu Việt Nam.</p>', '2021-09-11 13:28:42', '2021-09-11 13:28:42'),
(24, 'Điện tử - Điện lạnh', 'dien-tu-dien-lanh', NULL, 'tulanh,maygiac,dieuhoa,maylanh,fridge,washing machine,air conditioning', 'Máy lạnh, Máy Giặc, Tủ lạnh, Điều hòa 2021.', '<p>Máy lạnh, máy giặc, điều hòa, tủ lạnh chất lượng cao, USA 100%!!!</p>', '2021-09-11 13:40:15', '2021-09-11 13:40:15'),
(25, 'Phụ kiện - Thiết bị số', 'phu-kien-thiet-bi-so', NULL, 'tai nghe,sạc,thẻ nhớ,ốp,chuột,bàn phím,bộ phát wifi', 'Phụ kiện điện tử và thiết bị số mới nhất 2021.', '<p>Phụ kiện điện tử, thiết bị số mới nhất &amp; chất lượng nhất 2021.</p>', '2021-09-11 13:51:38', '2021-09-11 13:51:38'),
(26, 'Laptop', 'laptop', NULL, 'laptop', 'Laptop chất lượng cao, mới nhất 2021.', '<p>Laptop cấu hình cao, đáp ứng tất cả các nhu cầu của bạn.</p>', '2021-09-11 13:53:37', '2021-09-11 13:53:37'),
(27, 'Máy ảnh - Quay phim', 'may-anh-quay-phim', NULL, 'máy ảnh,gopro,máy quy phim', 'Máy ảnh & máy quay phim siêu sắc nét 2021.', '<p>Máy ảnh kỹ thuật số, &nbsp;máy quay phim siêu sắc nét mới nhất 2021.</p>', '2021-09-11 13:57:07', '2021-09-11 13:57:07'),
(28, 'Điện gia dụng', 'dien-gia-dung', NULL, 'lò vi sóng,bếp điện,vỉ nướng điện,máy pha cà phê,nồi cơm điện,nồi áp suất', 'Thiết bị điện gia dụng chất lượng cao mới nhất 2021.', '<p>Tất cả các thiết bị gia dụng cho căn bếp của bạn, bảo hành 1 năm.</p>', '2021-09-11 14:00:35', '2021-09-11 14:00:35'),
(29, 'Nhà cữa đời sống', 'nha-cua-doi-song', NULL, 'ly,cốc,chén,dụng cụ nhà bếp,đèn,ổ cắm điện', 'Sản phẩm cho nhà cữa đời sống cho căn nhà của bạn.', '<p>Tất cả các sản phẩm cho cuộc sống của bạn dễ dàng, tiện lợi hơn.</p>', '2021-09-11 14:10:24', '2021-09-11 14:10:24'),
(30, 'Thực phẩm', 'thuc-pham', NULL, 'bánh,kẹo,sữa,đồ uống,đồ hộp', 'Thực phẩm chất lượng cao, hương vị thơm ngon & bổ dưỡng.', '<p>Thực phẩm chất lượng cao, đảm bảo chất lượng cho sức khỏe của gia đình bạn.</p>', '2021-09-11 14:14:49', '2021-09-11 14:14:49'),
(31, 'Mẹ & bé', 'me-be', NULL, 'bỉm,đồ chơi,đồ em bé,bình sữa,tã', 'Sản phẩm dành cho mẹ bỉm sửa và các bé sơ sinh.', '<p>Sản phẩm mẹ &amp; bé chất lượng đạt chuẩn quốc tế, đảm bảo an toàn cho mẹ &amp; bé.</p>', '2021-09-11 14:19:05', '2021-09-11 14:19:05'),
(32, 'Làm đẹp - sức khỏe', 'lam-dep-suc-khoe', NULL, 'mỹ phẩm,nước hoa,dầu gội,kem dưỡng da,chống nắng', 'Sản phẩm làm đẹp & sức khỏe cho phái nữ.', '<p>Mỹ phẩm, nước hoa, sữa tắm, chống nắng,… chất lượng cao, xuất sứ từ USA.</p>', '2021-09-11 14:24:17', '2021-09-11 14:24:17'),
(33, 'Thời trang - phụ kiện', 'thoi-trang-phu-kien', NULL, 'quần,áo,khuyên tai,vòng tay,khăn choàng,giày,dép,túi,balo', 'Thời trang & phụ kiện chất lượng cao, đẹp và hợp thời trang.', '<p>Thời trang và phụ khiện chất lượng cao, luôn cập nhập xu hương thời trang mới nhất 2021.</p>', '2021-09-11 14:29:23', '2021-09-11 14:29:23'),
(34, 'Thể thao', 'the-thao', NULL, 'giày thể thao,gym,quần áo thể thao', 'Đồ thể thao của các hãng lớn nhất thế giới.', '<p>Đồ tập thể thao &amp; gym cho cả nam và nữ chất lượng cao mới nhất 2021.</p>', '2021-09-11 14:34:36', '2021-09-11 14:34:36'),
(35, 'Xe máy - xe đạp', 'xe-may-xe-dap', NULL, 'xe máy,xe đạp', 'Xe máy & xe đạp chính hãng 2021.', '<p>Các mẫu xe máy &amp; xe đạp chính hãng, chất lượng mới nhất 2021 cho các bạn.</p>', '2021-09-11 14:37:48', '2021-09-11 14:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `category_attributes`
--

CREATE TABLE `category_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_input` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_brand`
--

CREATE TABLE `category_brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id_cate` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_brand`
--

INSERT INTO `category_brand` (`id`, `category_id_cate`, `brand_id`, `created_at`, `updated_at`) VALUES
(17, 23, 7, NULL, NULL),
(18, 24, 7, NULL, NULL),
(19, 25, 7, NULL, NULL),
(20, 27, 7, NULL, NULL),
(21, 28, 7, NULL, NULL),
(22, 23, 8, NULL, NULL),
(23, 24, 8, NULL, NULL),
(24, 25, 8, NULL, NULL),
(25, 27, 8, NULL, NULL),
(26, 28, 8, NULL, NULL),
(27, 26, 8, NULL, NULL),
(28, 23, 9, NULL, NULL),
(29, 25, 9, NULL, NULL),
(30, 26, 9, NULL, NULL),
(31, 25, 10, NULL, NULL),
(32, 26, 10, NULL, NULL),
(33, 27, 10, NULL, NULL),
(34, 23, 11, NULL, NULL),
(35, 25, 11, NULL, NULL),
(36, 26, 11, NULL, NULL),
(37, 25, 12, NULL, NULL),
(38, 26, 12, NULL, NULL),
(39, 24, 13, NULL, NULL),
(40, 27, 13, NULL, NULL),
(41, 28, 13, NULL, NULL),
(42, 24, 14, NULL, NULL),
(43, 28, 14, NULL, NULL),
(44, 30, 15, NULL, NULL),
(48, 31, 19, NULL, NULL),
(49, 32, 19, NULL, NULL),
(50, 32, 20, NULL, NULL),
(51, 33, 20, NULL, NULL),
(52, 33, 21, NULL, NULL),
(54, 33, 22, NULL, NULL),
(56, 30, 23, NULL, NULL),
(57, 31, 23, NULL, NULL),
(62, 35, 18, NULL, NULL),
(63, 35, 17, NULL, NULL),
(64, 34, 18, NULL, NULL),
(65, 34, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_06_041609_create_category_table', 1),
(6, '2021_09_06_041706_create_brand_table', 1),
(7, '2021_09_09_231912_create_category_brand_table', 2),
(8, '2021_09_27_031214_create_products_table', 3),
(9, '2021_09_27_040938_create_catrgory_attributes_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_gallery` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id_category` bigint(20) UNSIGNED NOT NULL,
  `product_attribute` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variant`
--

CREATE TABLE `product_variant` (
  `id` int(11) NOT NULL,
  `SKU` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `variant` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant_price` double NOT NULL,
  `variant_quantity` int(11) NOT NULL,
  `variant_image` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `attribute_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(4, 1, 'Cam', 'cam', '2021-11-05 07:32:05', '2021-11-05 07:32:05'),
(5, 1, 'Do', 'do', '2021-11-05 07:32:08', '2021-11-05 07:32:08'),
(6, 1, 'Vang', 'vang', '2021-11-05 07:32:11', '2021-11-05 07:32:11'),
(7, 2, 'X', 'x', '2021-11-05 07:32:17', '2021-11-05 07:32:17'),
(8, 2, 'L', 'l', '2021-11-05 07:32:27', '2021-11-05 07:32:27'),
(9, 2, 'XL', 'xl', '2021-11-05 07:32:30', '2021-11-05 07:32:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_category`
--
ALTER TABLE `attribute_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_category_category_id_cate_foreign` (`category_id_cate`),
  ADD KEY `attribute_category_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cate`),
  ADD KEY `categories_category_parent_id_foreign` (`category_parent_id`);

--
-- Indexes for table `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_attributes_id_category_foreign` (`id_category`);

--
-- Indexes for table `category_brand`
--
ALTER TABLE `category_brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_brand_brandid_foreign` (`brand_id`),
  ADD KEY `category_brand_categoryid_foreign` (`category_id_cate`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_11112` (`product_id_category`);

--
-- Indexes for table `product_variant`
--
ALTER TABLE `product_variant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk00623232` (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variants_attribute_id_foreign` (`attribute_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attribute_category`
--
ALTER TABLE `attribute_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cate` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `category_attributes`
--
ALTER TABLE `category_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_brand`
--
ALTER TABLE `category_brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variant`
--
ALTER TABLE `product_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_category`
--
ALTER TABLE `attribute_category`
  ADD CONSTRAINT `attribute_category_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`),
  ADD CONSTRAINT `attribute_category_category_id_cate_foreign` FOREIGN KEY (`category_id_cate`) REFERENCES `categories` (`id_cate`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_category_parent_id_foreign` FOREIGN KEY (`category_parent_id`) REFERENCES `categories` (`id_cate`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD CONSTRAINT `category_attributes_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_cate`);

--
-- Constraints for table `category_brand`
--
ALTER TABLE `category_brand`
  ADD CONSTRAINT `category_brand_brandid_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_brand_categoryid_foreign` FOREIGN KEY (`category_id_cate`) REFERENCES `categories` (`id_cate`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_11112` FOREIGN KEY (`product_id_category`) REFERENCES `categories` (`id_cate`);

--
-- Constraints for table `product_variant`
--
ALTER TABLE `product_variant`
  ADD CONSTRAINT `fk00623232` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
