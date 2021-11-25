-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2021 lúc 09:14 AM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.23

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
-- Cấu trúc bảng cho bảng `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Màu sắc', 'mau-sac', '2021-10-06 03:45:17', '2021-10-06 03:45:17'),
(2, 'Size', 'size', '2021-10-06 03:45:21', '2021-10-06 03:45:21'),
(3, 'Ram', 'ram', '2021-10-06 05:57:54', '2021-10-06 05:57:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute_category`
--

CREATE TABLE `attribute_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id_cate` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attribute_category`
--

INSERT INTO `attribute_category` (`id`, `category_id_cate`, `attribute_id`, `created_at`, `updated_at`) VALUES
(10, 34, 1, NULL, NULL),
(13, 34, 2, NULL, NULL);

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
  `category_slug` text COLLATE utf8mb4_unicode_ci,
  `category_parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_desc` text COLLATE utf8mb4_unicode_ci,
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
-- Cấu trúc bảng cho bảng `category_attributes`
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
-- Cấu trúc bảng cho bảng `failed_jobs`
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
(7, '2021_09_09_231912_create_category_brand_table', 2),
(8, '2021_09_27_031214_create_products_table', 3),
(9, '2021_09_27_040938_create_catrgory_attributes_table', 3);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_slug`, `product_image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'iPhone 12 Pro Max', 'iphone-12-pro-max', 'iphone-13-02.jpg', 'iPhone 12 Pro Max I Chính hãng VN/A', '<p>Máy mới 100% , chính hãng Apple Việt Nam.<br>BigDeal hiện là đại lý bán lẻ uỷ quyền iPhone chính hãng VN/A của Apple Việt Nam.</p>', 'iphone,12promax,promax', '2021-10-03 01:09:23', '2021-10-03 01:09:23'),
(2, 'Samsung Galaxy A72', 'samsung-galaxy-a72', 'A721.jpg', 'Điện thoại Samsung Galaxy A72 - Thiết kế ấn tượng, hiệu năng mạnh mẽ.', '<p>Samsung A72 sở hữu thiết kế có nhiều nét tương đồng với những người đàn anh trước đó của mình.&nbsp;A72 có kích thước vô cùng nhỏ gọn.</p>', 'samsung,galaxy a72,A72', '2021-10-03 01:47:30', '2021-10-03 01:47:30'),
(3, 'Tai nghe Apple AirPods Max', 'tai-nghe-apple-airpods-max', 'airpods-max_1.jpg', 'Tai nghe chụp tai chống ồn Apple AirPods Max | Chính hãng Apple Việt Nam.', '<p>Nắm bắt được nhu cầu người dùng Apple đã cho ra mắt một sản phẩm mới đó là&nbsp;<strong> Airpods Max</strong>&nbsp;với nhiều tính năng tiện lợi như chống ồn kèm theo đó là chất lượng âm thanh rất tuyệt vời.</p>', 'tai nghe,apple airpods max,airpods', '2021-10-03 02:00:58', '2021-10-03 02:00:58'),
(4, 'Áo bộ bé trai', 'ao-bo-be-trai', 'ao-1.jpg', 'Bộ quần áo bé trai sơ sinh.', '<p>Đồ sơ sinh chất lượng cao cho trẻ em, siêu bền, siêu đẹp cho các bé thoải mái.</p>', 'trẻ em,bộ quần áo,sơ sinh,bé trai', '2021-10-03 02:09:06', '2021-10-03 02:09:06'),
(5, 'Áo da nam cao cấp', 'ao-da-nam-cao-cap', 'aoda1.jpg', 'Áo khoát da nam hàng cao cấp.', '<p>Áo khoát da nam được làm bằng da bò cao cấp, nhập khẩu USA 100%.</p>', 'áo da,áo khoát da,áo khoát nam', '2021-10-03 07:24:45', '2021-10-03 07:24:45'),
(6, 'Áo thun nam cao cấp', 'ao-thun-nam-cao-cap', 'aokhoat1.jpg', 'Áo khoác thun nam hàng cao cấp.', '<p>Áo khoác dệt làm từ vải dệt kim có in hình nhân vật&nbsp;Tornado&nbsp;trên ngực và ở lưng, áo có màu chủ đạo từ mái tóc của nữ anh hùng.</p>', 'áo khoác,áo khoác thun,khoác thun nam,nam', '2021-10-03 07:33:25', '2021-10-03 07:33:25'),
(7, 'Áo thun nam Polo', 'ao-thun-nam-polo', 'aothun1.jpg', 'Áo thun đen nam cao cấp.', '<p>LFC Mens Navy Conninsby Polo sở hữu các đặc điểm của một chiếc áo thun tinh tế: Áo polo màu đen&nbsp;có cổ và 3 nút</p>', 'thun nam,áo thun,thun đen,nam', '2021-10-03 07:35:27', '2021-10-03 07:35:27'),
(8, 'Camera Aquara Hub 045', 'camera-aquara-hub-045', 'aqara-hub-1.jpg', 'Camera Aquara Hub 045 siêu sắc nét và mượt mà.', '<p>Thiết bị không chỉ được sở hữu thiết kế độc đáo với màu sắc đa dạng mà chúng còn được trang bị rất nhiều những tính năng nổi bật giúp mang đến cho người dùng trải nghiệm sử dụng ấn tượng khó quên.</p>', 'camera,quara hub,045', '2021-10-03 07:38:24', '2021-10-03 07:38:24'),
(9, 'Màn hình Asus ProArt', 'man-hinh-asus-proart', 'asus_24_1.jpg', 'Màn hình gaming Asus ProArt siêu chân thực.', '<p>Màn hình chuyên đồ họa Asus 24 Proart PA248QV là sản phẩm chuyên dùng cho những ai có nhu cầu thiết kế đồ họa thường xuyên, những designer chuyên nghiệp.</p>', 'màn hình,gaming,asus proart', '2021-10-03 07:41:02', '2021-10-03 07:41:02'),
(10, 'Asus ROG 620', 'asus-rog-620', 'asus-rog-1.jpg', 'Điện thoại gaming Asus ROG 620.', '<p>Điện thoại Asus ROG Phone 5 vẫn giữ nguyên thiết kế hầm hố nguyên bản của dòng ROG Phone trứ danh.</p>', 'điện thoại,Asus ROG,gaming', '2021-10-03 07:44:08', '2021-10-03 07:44:08'),
(11, 'Balo Unisex Under Armour', 'balo-unisex-under-armour', 'balo-1.jpg', 'Balo thể thao Under Armour siêu bền và thời trang.', '<p>Được chế tạo để mang lại sự tiện lợi tuyệt đối cho các vận động viên, những chiếc balo với chất liệu không thấm nước, dáng cứng cáp và ngăn chứa rộng rãi, thoải mái đựng bất cứ thứ gì bạn cần để tập luyện.</p>', 'balo,thể thao,under armour', '2021-10-03 07:48:16', '2021-10-03 07:48:16'),
(12, 'Camera Aukey DR02', 'camera-aukey-dr02', 'aukey-dr02j-1.jpg', 'Camera Aukey DR02 chất lượng hình ảnh siêu nét và chất lượng.', '<p>Camera Aukey DR02 là chiếc camera hướng đến người dùng ưa thích trải nghiệm quan sát hình ảnh ghi lại một cách linh động nhưng không chiếm nhiều diện tích để đặt camera wifi trong nhà.</p>', 'camera,aukey ,DR02', '2021-10-04 01:22:35', '2021-10-04 01:22:35'),
(13, 'Camera AZDOME G71', 'camera-azdome-g71', 'azdome-g71-1.jpg', 'Camera AZDOME G71 siêu sắc nét.', '<p>Camera hành trình AZDOME G71 sở hữu ống kính góc rộng với chất lượng hình ảnh cao lên đến Ultra HD 4K. Nhờ đó các thước phim ghi lại chân thực, chi tiết sắc nét.</p>', 'camera,azdome,G71', '2021-10-04 01:26:03', '2021-10-04 01:26:03'),
(14, 'Bàn ăn trẻ em Zumi', 'ban-an-tre-em-zumi', 'ban-1.jpg', 'Bàn ăn trẻ em siêu đẹp, siêu bền.', '<p>Bàn ăn trẻ em an toàn và siêu bền cho trẻ em từ 1 đến 5 tuổi.</p>', 'bàn ăn,trẻ em,Zumi', '2021-10-04 03:10:34', '2021-10-04 03:10:34'),
(15, 'Con Lăn Tập Gym Unisex Harbinger', 'con-lan-tap-gym-unisex-harbinger', 'banh-xe-1.jpg', 'Con Lăn Tập Gym Unisex Harbinger Ab Carver Pro', '<p>Harbinger® Ab Carver® Pro là một bánh xe ab có thiết kế được cấp bằng sáng chế giúp cải thiện hiệu quả của các bài tập ab, giúp tham gia và tăng cường các cơ ở lưng, ngực, cánh tay.</p>', 'con lăn,gym,unisex harbinger', '2021-10-04 03:16:02', '2021-10-04 03:16:02'),
(16, 'Túi đựng bình sữa Hinata', 'tui-dung-binh-sua-hinata', 'binh-sua-1.jpg', 'Túi đựng bình sữa cho trẻ em Hinata.', '<p>Túi đựng bình sữa cho trẻ em Hinata tiện lợi, gọn gàn cho mẹ và bé.</p>', 'túi,trẻ em,bình sữa', '2021-10-04 03:20:30', '2021-10-04 03:20:30'),
(17, 'Bộ Dao Bếp 12 Món', 'bo-dao-bep-12-mon', 'bo-dao-1.jpeg', 'Bộ dao bếp 12 món siêu bền , siêu sắc bén.', '<p>Hộp dao làm bằng gỗ thông &amp; chuôi dao được làm bằng nhựa ABS có đặc tính cứng, rắn nhưng không giòn, cách điện, không thấm nước, bền với nhiệt độ và hóa chất - Lưỡi dao làm bằng kim loại, cố định với chuôi tại 3 điểm.</p>', 'dao,bếp,bộ dao', '2021-10-04 03:25:12', '2021-10-04 03:25:12'),
(18, 'Cà Chua', 'ca-chua', 'ca_chua1.jpg', 'Cà chua Đà Lạt siêu tươi ngon.', '<p>Cà chua đỏ tươi ngon, được trồng và thu hoạch tại Đà Lạt với hương vị siêu tươi ngon.</p>', 'cà chua,ca chua,Đà Lạt', '2021-10-04 03:28:04', '2021-10-04 03:28:04'),
(19, 'Cá Hồi', 'ca-hoi', 'cahoi.jpg', 'Cá Hồi nhập khẩu Canada 100%.', '<p>Cá Hồi nhập khẩu Canada 100%, vẫn giữ được hương vị tươi ngon và giá cả hợp lý.</p>', 'cá hồi,ca hoi,canada', '2021-10-04 03:30:59', '2021-10-04 03:30:59'),
(20, 'Cam Sành', 'cam-sanh', 'cam.jpg', 'Cam sành tươi ngon và rất nhiều nước.', '<p>Cam sành vẫn luôn giữ được độ tươi ngon vốn có và rất có lợi cho sức khỏe của bạn.</p>', 'cam,cam sành', '2021-10-04 03:33:40', '2021-10-04 03:33:40'),
(21, 'Cân Điện Tử Eufy Smart Scale', 'can-dien-tu-eufy-smart-scale', 'can_dt_1.png', 'Cân Điện Tử Thông Minh Eufy Smart Scale C1.', '<p>Eufy Smart Scale C1 là thiết bị cân điện tử thông minh có thể quản lý và theo dõi thông tin cân nặng cũng như sức khỏe trên smartphone.</p>', 'cân,cân điện tử,eufy smart scale', '2021-10-04 03:36:05', '2021-10-04 03:36:05'),
(22, 'Cà Pháo', 'ca-phao', 'caphao1.jpg', 'Cà Pháo Đà Lạt siêu tươi ngon.', '<p>Cà pháo Đà Lạt siêu tươi ngon, lựa chọn hoàn hảo cho bữa ăn ngon của gia đình bạn.</p>', 'cà,cà pháo', '2021-10-04 03:39:53', '2021-10-04 03:39:53'),
(23, 'Cà Rốt', 'ca-rot', 'carot1.jpg', 'Cà rốt siêu tươi ngon.', '<p>Cà rốt siêu tươi ngon và là lựa chọn tốt cho bữa ăn gia đình của bạn.</p>', 'cà rốt,carot', '2021-10-04 03:45:17', '2021-10-04 03:45:17'),
(24, 'Chuột không dây Logitech M238', 'chuot-khong-day-logitech-m238', 'chout_cap_1.jpg', 'Chuột không dây Logitech M238 Marvel Collection.', '<p>Bên cạnh những sản phẩm chất lượng, Logitech còn cho ra mắt bộ sưu tập lấy cảm hứng từ những sự kiện nổi tiếng như World Cup từ năm 2018.</p>', 'chuột,không dây,logitech', '2021-10-04 03:50:16', '2021-10-04 03:50:16'),
(25, 'Chuối Hương', 'chuoi-huong', 'chuoi1.png', 'Chuối hương tươi ngon, đảm bảo chất lượng.', '<p>Chuối hương tươi ngon, đảm bảo không chất hóa học, cung cấp dinh dưỡng cho bạn.</p>', 'chuối,chuối hương', '2021-10-04 03:55:37', '2021-10-04 03:55:37'),
(26, 'Chuột không dây Logit M475', 'chuot-khong-day-logit-m475', 'chuot_tech_1.jpg', 'Chuột không dây Logit M475 Marvel Collection.', '<p>Chuột không dây Logitech M238 Marvel Collection được thiết kế bằng việc lấy cảm hứng từ những nhân vật nổi tiếng đã được kể trên.</p>', 'chuột,không dây,M475', '2021-10-04 03:58:31', '2021-10-04 03:58:31'),
(27, 'Dâu Tây', 'dau-tay', 'dau.jpg', 'Dâu tây Đà Lạt 100% tươi ngon.', '<p>Dâu tây Đà Lạt 100% tươi ngon, đảm bảo chất lượng &nbsp;và an toàn sức khỏe.</p>', 'dâu tây,Đà Lạt', '2021-10-04 04:02:52', '2021-10-04 04:02:52'),
(28, 'Đèn bàn Anker LC40 T1423', 'den-ban-anker-lc40-t1423', 'den-led-1.jpg', 'Đèn pin Anker Bolder LC40 T1423 .', '<p>Đèn pin Anker Bolder LC40 T1423 là giải pháp cung cấp ánh sáng dự phòng hữu ích trong thời đại hiện nay.</p>', 'đèn,đèn bàn,anker lc40', '2021-10-04 04:08:41', '2021-10-04 04:08:41'),
(29, 'Bộ Đồ Chơi Cho Bé', 'bo-do-choi-cho-be', 'do-choi-1.jpg', 'Bộ đồ chơi cho trẻ em, an toàn cho trẻ em.', '<p>Bộ đồ chơi trẻ em chất lượng cao, an toàn cho sức khỏe của bé và mẹ.</p>', 'đồ chơi,trẻ em,bộ đồ chơi', '2021-10-04 05:28:50', '2021-10-04 05:28:50'),
(30, 'Đồ Ngậm Cho Bé', 'do-ngam-cho-be', 'do-choi-11.jpg', 'Đồ chơi ngậm cho các bé an toàn 100%.', '<p>Đồ chơi cho các bé, nhập khẩu USA, an toàn 100% cho các bé sơ sinh.</p>', 'đồ chơi,trẻ em,đồ ngậm', '2021-10-04 05:31:22', '2021-10-04 05:31:22'),
(31, 'Áo thể thao Adidas', 'ao-the-thao-adidas', 'do-tt-1.jpg', 'Áo thể thao siêu thoáng mát Adidas.', '<p>Khi chạy bộ để thanh lọc tâm trí, bạn không muốn bị cái nóng cản trở. Hãy duy trì trạng thái mát mẻ với chiếc áo thun chạy bộ adidas thoáng khí này. Công nghệ HEAT.RDY tăng cường lưu thông khí tối đa và đánh bay hơi ẩm khỏi da bạn.</p>', 'áo,thể thao,adidas', '2021-10-04 05:34:54', '2021-10-04 05:34:54'),
(32, 'Quần Ngắn Nam Adidas', 'quan-ngan-nam-adidas', 'duinam1.jpg', 'Quần đùi nam siêu bền và thoải mái.', '<p>Khi chạy bộ trong tiết trời nắng nóng, chẳng có cách nào để thực sự hạ nhiệt. Nhưng chỉ cần không tăng nhiệt thôi cũng đã làm nên khác biệt to lớn rồi.</p>', 'quần,quần ngắn,adidas', '2021-10-04 05:37:51', '2021-10-04 05:37:51'),
(33, 'Samsung Galaxy Watch Active 2', 'samsung-galaxy-watch-active-2', 'galaxy_1.jpg', 'Đồng hồ thông minh Galaxy Watch Active 2: Thiết kế thời trang, giải pháp theo dõi sức khỏe tuyệt vời', '<p><strong>Samsung Galaxy Watch Active 2</strong> được sáng tạo với mục tiêu tạo nên sự thoải mái nhất cho quá trình vận động của người dùng.</p>', 'đồng hồ,samsung,galaxy watch,active 2', '2021-10-04 05:39:59', '2021-10-04 05:39:59'),
(34, 'Vòng đeo tay Samsung Galaxy Fit 2', 'vong-deo-tay-samsung-galaxy-fit-2', 'galaxy-fit-1.jpg', 'Samsung Galaxy Fit 2 - Đồng hồ tiện lợi với một kích thước nhỏ gọn.', '<p>Samsung Fan trên thế giới đã có thể có cho mình lựa đồng hồ thông minh thế hệ mới của hàng là đồng hồ thông minh&nbsp;Galaxy Fit 2.</p>', 'samsung,galaxy,fit 2', '2021-10-04 05:42:00', '2021-10-04 05:42:00'),
(35, 'Đồng hồ Samsung Galaxy Watch 3', 'dong-ho-samsung-galaxy-watch-3', 'galaxy-watch-1.jpg', 'Đồng hồ thông minh Samsung Galaxy Watch 3 viền thép dây da.', '<p>Bạn có bao giờ nghĩ rằng, trong cuộc sống bạn sẽ phải trải qua các quá trình lớn lên và già đi nhưng không bao giờ được ghi lại các số liệu tổng thể về thể chất của bạn hay không?</p>', 'đồng hồ,samsung,galaxy,watch 3', '2021-10-04 05:46:55', '2021-10-04 05:46:55'),
(36, 'Samsung Galaxy Z Flip3', 'samsung-galaxy-z-flip3', 'galaxy-z-1.jpg', 'Samsung Galaxy Z Flip 3 (5G) – Điện thoại màn hình gập độc đáo.', '<p>Bên cạnh các siêu phẩm của dòng S hay dòng Note thì Samsung còn trình làng một dòng điện thoại siêu đặc biệt. Và cho đến 2021 hãng đã phát triển đến thế hệ thứ ba, với tên gọi <strong>Galaxy Z Flip 3</strong></p>', 'samsung,galaxy,z flip 3', '2021-10-04 05:49:18', '2021-10-04 05:49:18'),
(37, 'Giày Đá Banh Unisex Adidas', 'giay-da-banh-unisex-adidas', 'giay-1.jpg', 'Giày Đá Banh Unisex Adidas X Speedflow.3 Ll Fg.', '<p>Khi sự nhạy bén của trí óc gặp sự nhanh nhạy của cơ thể, bạn sẽ trở thành phiên bản nhanh nhất của chính mình. Tìm dòng chảy của bạn và&nbsp;quên đi&nbsp;sự nghỉ ngơi lại phía sau.&nbsp;</p>', 'giày,bóng đá,unisex adidas', '2021-10-04 05:51:27', '2021-10-04 05:51:27'),
(38, 'Giày Đá Banh Nam Adidas Predator', 'giay-da-banh-nam-adidas-predator', 'giay-den-1.jpg', 'Giày Đá Banh Nam Adidas Predator Freak .4 TF.', '<p>Hàng chắn không thể ngăn nổi bạn. Đối thủ chẳng thể cản bước chân. Trên sân đấu, bạn nắm quyền kiểm soát. Hãy khai phá tối đa sức mạnh của bạn với Predator Freak.</p>', 'giày,bóng đá,adidas predator', '2021-10-04 05:53:28', '2021-10-04 05:53:28'),
(39, 'Giày Bóng Đá Nam Nike Legend', 'giay-bong-da-nam-nike-legend', 'giay-trang-1.jpg', 'Giày Bóng Đá Nam Nike Legend 8 Club FG/MG.', '<p>Nike Tiempo Legend 8 Club MG lấy cảm hứng từ chất liệu da tổng hợp với thiết kế đa năng tạo độ bám tốt trên cả bề mặt cỏ tự nhiên và nhân tạo.</p>', 'giày,đá bóng,nike legend', '2021-10-04 05:55:06', '2021-10-04 05:55:06'),
(42, 'Giày Đá Banh Nam ADIDAS Predator 20.3', 'giay-da-banh-nam-adidas-predator-203', 'giay-xah-1.jpg', 'Giày Đá Banh Nam ADIDAS Predator 20.3 FG.', '<p>Bạn không hề chơi ăn gian. Bạn chỉ đang lách luật. Tìm kiếm lợi thế và thay đổi cục diện trận đấu với đôi giày adidas Predator hoàn toàn mới.</p>', 'giày,adidas,đá bóng', '2021-10-04 05:58:31', '2021-10-04 05:58:31'),
(43, 'Camera hành trình Gopro Hero 10', 'camera-hanh-trinh-gopro-hero-10', 'gopro-hero-1.jpeg', 'Camera hành trình GoPro Hero 10 - Camera hành trình cao cấp cho mọi chuyến đi.', '<p>Tín đồ camera hành trình GoPro đều biết chỉ đến khi Hero 9 Black ra mắt, hãng mới bắt đầu thay đổi ngôn ngữ thiết kế cho model này.</p>', 'camera,gopro,hero 10', '2021-10-04 06:00:36', '2021-10-04 06:00:36'),
(44, 'Hành Tây', 'hanh-tay', 'hanhtay.jpg', 'Hành tây Đà Lạt chất lượng tuyệt vời.', '<p>Hành tây siêu chất lượng, được trồng và thu hoạch tại trang trại Đà Lạt.</p>', 'hành tây,Đà Lạt', '2021-10-04 06:03:04', '2021-10-04 06:03:04'),
(45, 'Hạt Điều Sấy', 'hat-dieu-say', 'hatdieu.png', 'Hạt điều sấy Lâm Đồng siêu thơm ngon.', '<p>Hạt điều sấy tẩm gia vị hương vị siêu thơm ngon từ Lâm Đồng.</p>', 'hạt điều,điều sấy,Lâm Đồng', '2021-10-04 06:05:23', '2021-10-04 06:05:23'),
(46, 'Máy hút bụi Xiaomi Mi Vaccum', 'may-hut-bui-xiaomi-mi-vaccum', 'hut_bui_v9_1.jpg', 'Máy hút bụi cầm tay Xiaomi Mi Vaccum Cleaner G10.', '<p>Với Mi Vacuum Cleaner G10, hãng Xiaomi mang đến cho các nội trợ giải pháp dọn sạch không gian sống một cách hiệu quả nhất có thể.</p>', 'hút bụi,xiaomi mi,g10', '2021-10-04 06:07:25', '2021-10-04 06:07:25'),
(47, 'Camera hành trình Insta360 Go 2', 'camera-hanh-trinh-insta360-go-2', 'insta360-go-1.jpg', 'Insta360 Go 2 – Camera hành động chống rung hiệu quả.', '<p><strong>Camera hành trình Insta360 Go 2</strong> là một action camera có thiết kế thu nhỏ, hình dạng như viên thuốc. Tuy nhỏ nhưng nó vẫn chứa đầy đủ các tính năng chụp ảnh và quay phim cơ bản.</p>', 'camera,insta360,go 2', '2021-10-04 06:09:52', '2021-10-04 06:09:52'),
(48, 'Quần Jean Nam Under', 'quan-jean-nam-under', 'jeannam1.jpg', 'Quần jean nam cao cấp, siêu bền đẹp.', '<p>Quần jean nam bản cao cấp, chất lượng USA , siêu bền đẹp và thoải mái cho nam.</p>', 'quần,jean nam,under', '2021-10-04 06:15:07', '2021-10-04 06:15:07'),
(49, 'Khăn Ăn Cho Bé', 'khan-an-cho-be', 'khan-1.jpg', 'Khăn ăn cho trẻ sơ sinh, chất lượng và màu sắc chất lượng.', '<p>Khăn ăn dành cho các bé, đảm bảo chất lượng và an toàn cho các bé.</p>', 'khăn,trẻ em,khăn ăn', '2021-10-04 06:20:57', '2021-10-04 06:20:57'),
(50, 'Laptop HP 15S-FQ2602TU 4B6D3PA', 'laptop-hp-15s-fq2602tu-4b6d3pa', 'laptop_hp_1.jpg', 'Laptop HP 15s-fq2602TU 4B6D3PA là một sản phẩm mới đến từ thương hiệu HP.', '<p>Laptop HP 15s-fq2602TU 4B6D3PA sử dụng bộ xử lý Intel Core i5 thế hệ 11. Với bộ nhớ RAM 8GB và tốc độ bộ nhớ là 3200MHz giúp đảm bảo xử lý các tác vụ đa nhiệm một cách mượt mà.</p>', 'laptop,hp,15s-fq2602TU', '2021-10-04 06:23:00', '2021-10-04 06:23:00'),
(51, 'Laptop ASUS ZenBook Flip UX363EA', 'laptop-asus-zenbook-flip-ux363ea', 'laptop-asus-1.jpg', 'Laptop Asus Zenbook Flip UX363EA HP163T - Thiết kế bền bỉ, hiệu suất vô song.', '<p><a href=\"https://cellphones.com.vn/laptop/asus/zenbook.html\">Laptop Asus Zenbook</a> sang trọng được thiết kế sang trọng tạo nên độ chắc chắn và bền bỉ cho máy.</p>', 'laptop,asus,zenbook flip', '2021-10-04 06:25:33', '2021-10-04 06:25:33'),
(52, 'Laptop Dell Vostro 3500 V3500A', 'laptop-dell-vostro-3500-v3500a', 'laptop-dell-1.jpg', 'Laptop Dell Vostro 3500 V3500A – Laptop mỏng nhẹ hoạt động ổn định.', '<p>Dell Vostro 3500 V3500A sở hữu một thiết kế nguyên khối với gam màu đen mạnh mẽ và không kém phần sang trọng.</p>', 'laptop,dell,vostro', '2021-10-04 06:28:00', '2021-10-04 06:28:00');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variants`
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
-- Đang đổ dữ liệu cho bảng `variants`
--

INSERT INTO `variants` (`id`, `attribute_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 2, 'S', 's', NULL, NULL),
(14, 2, 'M', 'm', '2021-10-06 05:17:16', '2021-10-06 05:17:16'),
(24, 1, 'Đỏ', 'do', '2021-10-06 05:38:44', '2021-10-06 05:38:44'),
(32, 2, 'XL', 'xl', '2021-10-06 08:13:33', '2021-10-06 08:13:33'),
(36, 1, 'Cam', 'cam', '2021-10-06 19:03:23', '2021-10-06 19:03:23'),
(37, 3, '8GB', '8gb', '2021-10-06 19:03:36', '2021-10-06 19:03:36'),
(39, 1, 'Vàng', 'vang', '2021-10-06 20:49:18', '2021-10-06 20:49:18'),
(40, 3, '16GB', '16gb', '2021-10-22 04:17:08', '2021-10-22 04:17:08'),
(41, 3, '6GB', '6gb', '2021-10-22 04:17:16', '2021-10-22 04:17:16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `attribute_category`
--
ALTER TABLE `attribute_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_category_category_id_cate_foreign` (`category_id_cate`),
  ADD KEY `attribute_category_attribute_id_foreign` (`attribute_id`);

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
-- Chỉ mục cho bảng `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_attributes_id_category_foreign` (`id_category`);

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
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_name_unique` (`product_name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variants_attribute_id_foreign` (`attribute_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `attribute_category`
--
ALTER TABLE `attribute_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- AUTO_INCREMENT cho bảng `category_attributes`
--
ALTER TABLE `category_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category_brand`
--
ALTER TABLE `category_brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `attribute_category`
--
ALTER TABLE `attribute_category`
  ADD CONSTRAINT `attribute_category_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`),
  ADD CONSTRAINT `attribute_category_category_id_cate_foreign` FOREIGN KEY (`category_id_cate`) REFERENCES `categories` (`id_cate`);

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_category_parent_id_foreign` FOREIGN KEY (`category_parent_id`) REFERENCES `categories` (`id_cate`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD CONSTRAINT `category_attributes_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_cate`);

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
