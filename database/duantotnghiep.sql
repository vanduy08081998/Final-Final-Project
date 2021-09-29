-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 12, 2021 lúc 11:28 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duantotnghiep`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
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
-- Đang đổ dữ liệu cho bảng `brands`
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
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id_cate` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id_cate`, `category_name`, `category_slug`, `category_parent_id`, `meta_keywords`, `meta_title`, `meta_desc`, `created_at`, `updated_at`) VALUES
(23, 'Điện thoại - Máy tính bảng', 'dien-thoai-may-tinh-bang', NULL, 'dienthoai,maytinhbang,phone,ipad', 'Điện thoại & Máy tính bảng 2021', '<p>Điện thoại , máy tính bảng chất lượng hàng đầu Việt Nam.</p>', '2021-09-11 20:28:42', '2021-09-11 20:28:42'),
(24, 'Điện tử - Điện lạnh', 'dien-tu-dien-lanh', NULL, 'tulanh,maygiac,dieuhoa,maylanh,fridge,washing machine,air conditioning', 'Máy lạnh, Máy Giặc, Tủ lạnh, Điều hòa 2021.', '<p>Máy lạnh, máy giặc, điều hòa, tủ lạnh chất lượng cao, USA 100%!!!</p>', '2021-09-11 20:40:15', '2021-09-11 20:40:15'),
(25, 'Phụ kiện - Thiết bị số', 'phu-kien-thiet-bi-so', NULL, 'tai nghe,sạc,thẻ nhớ,ốp,chuột,bàn phím,bộ phát wifi', 'Phụ kiện điện tử và thiết bị số mới nhất 2021.', '<p>Phụ kiện điện tử, thiết bị số mới nhất &amp; chất lượng nhất 2021.</p>', '2021-09-11 20:51:38', '2021-09-11 20:51:38'),
(26, 'Laptop', 'laptop', NULL, 'laptop', 'Laptop chất lượng cao, mới nhất 2021.', '<p>Laptop cấu hình cao, đáp ứng tất cả các nhu cầu của bạn.</p>', '2021-09-11 20:53:37', '2021-09-11 20:53:37'),
(27, 'Máy ảnh - Quay phim', 'may-anh-quay-phim', NULL, 'máy ảnh,gopro,máy quy phim', 'Máy ảnh & máy quay phim siêu sắc nét 2021.', '<p>Máy ảnh kỹ thuật số, &nbsp;máy quay phim siêu sắc nét mới nhất 2021.</p>', '2021-09-11 20:57:07', '2021-09-11 20:57:07'),
(28, 'Điện gia dụng', 'dien-gia-dung', NULL, 'lò vi sóng,bếp điện,vỉ nướng điện,máy pha cà phê,nồi cơm điện,nồi áp suất', 'Thiết bị điện gia dụng chất lượng cao mới nhất 2021.', '<p>Tất cả các thiết bị gia dụng cho căn bếp của bạn, bảo hành 1 năm.</p>', '2021-09-11 21:00:35', '2021-09-11 21:00:35'),
(29, 'Nhà cữa đời sống', 'nha-cua-doi-song', NULL, 'ly,cốc,chén,dụng cụ nhà bếp,đèn,ổ cắm điện', 'Sản phẩm cho nhà cữa đời sống cho căn nhà của bạn.', '<p>Tất cả các sản phẩm cho cuộc sống của bạn dễ dàng, tiện lợi hơn.</p>', '2021-09-11 21:10:24', '2021-09-11 21:10:24'),
(30, 'Thực phẩm', 'thuc-pham', NULL, 'bánh,kẹo,sữa,đồ uống,đồ hộp', 'Thực phẩm chất lượng cao, hương vị thơm ngon & bổ dưỡng.', '<p>Thực phẩm chất lượng cao, đảm bảo chất lượng cho sức khỏe của gia đình bạn.</p>', '2021-09-11 21:14:49', '2021-09-11 21:14:49'),
(31, 'Mẹ & bé', 'me-be', NULL, 'bỉm,đồ chơi,đồ em bé,bình sữa,tã', 'Sản phẩm dành cho mẹ bỉm sửa và các bé sơ sinh.', '<p>Sản phẩm mẹ &amp; bé chất lượng đạt chuẩn quốc tế, đảm bảo an toàn cho mẹ &amp; bé.</p>', '2021-09-11 21:19:05', '2021-09-11 21:19:05'),
(32, 'Làm đẹp - sức khỏe', 'lam-dep-suc-khoe', NULL, 'mỹ phẩm,nước hoa,dầu gội,kem dưỡng da,chống nắng', 'Sản phẩm làm đẹp & sức khỏe cho phái nữ.', '<p>Mỹ phẩm, nước hoa, sữa tắm, chống nắng,… chất lượng cao, xuất sứ từ USA.</p>', '2021-09-11 21:24:17', '2021-09-11 21:24:17'),
(33, 'Thời trang - phụ kiện', 'thoi-trang-phu-kien', NULL, 'quần,áo,khuyên tai,vòng tay,khăn choàng,giày,dép,túi,balo', 'Thời trang & phụ kiện chất lượng cao, đẹp và hợp thời trang.', '<p>Thời trang và phụ khiện chất lượng cao, luôn cập nhập xu hương thời trang mới nhất 2021.</p>', '2021-09-11 21:29:23', '2021-09-11 21:29:23'),
(34, 'Thể thao', 'the-thao', NULL, 'giày thể thao,gym,quần áo thể thao', 'Đồ thể thao của các hãng lớn nhất thế giới.', '<p>Đồ tập thể thao &amp; gym cho cả nam và nữ chất lượng cao mới nhất 2021.</p>', '2021-09-11 21:34:36', '2021-09-11 21:34:36'),
(35, 'Xe máy - xe đạp', 'xe-may-xe-dap', NULL, 'xe máy,xe đạp', 'Xe máy & xe đạp chính hãng 2021.', '<p>Các mẫu xe máy &amp; xe đạp chính hãng, chất lượng mới nhất 2021 cho các bạn.</p>', '2021-09-11 21:37:48', '2021-09-11 21:37:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_brand`
--

CREATE TABLE `category_brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id_cate` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_brand`
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
(45, 30, 16, NULL, NULL),
(46, 35, 17, NULL, NULL),
(47, 35, 18, NULL, NULL),
(48, 31, 19, NULL, NULL),
(49, 32, 19, NULL, NULL),
(50, 32, 20, NULL, NULL),
(51, 33, 20, NULL, NULL),
(52, 33, 21, NULL, NULL),
(53, 34, 21, NULL, NULL),
(54, 33, 22, NULL, NULL),
(55, 34, 22, NULL, NULL),
(56, 30, 23, NULL, NULL),
(57, 31, 23, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_06_041609_create_category_table', 1),
(6, '2021_09_06_041706_create_brand_table', 1),
(7, '2021_09_09_231912_create_category_brand_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cate`),
  ADD KEY `categories_category_parent_id_foreign` (`category_parent_id`);

--
-- Chỉ mục cho bảng `category_brand`
--
ALTER TABLE `category_brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_brand_brandid_foreign` (`brand_id`),
  ADD KEY `category_brand_categoryid_foreign` (`category_id_cate`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cate` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `category_brand`
--
ALTER TABLE `category_brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_category_parent_id_foreign` FOREIGN KEY (`category_parent_id`) REFERENCES `categories` (`id_cate`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `category_brand`
--
ALTER TABLE `category_brand`
  ADD CONSTRAINT `category_brand_brandid_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_brand_categoryid_foreign` FOREIGN KEY (`category_id_cate`) REFERENCES `categories` (`id_cate`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
