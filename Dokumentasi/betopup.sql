-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2022 at 09:37 PM
-- Server version: 10.3.32-MariaDB-log-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kincaime_TOPUPWEB`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_deposit`
--

CREATE TABLE `data_deposit` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `PaymentMetod` varchar(255) NOT NULL,
  `InvoiceId` varchar(255) NOT NULL,
  `UniqAmount` int(11) NOT NULL,
  `Balance` int(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_harga`
--

CREATE TABLE `data_harga` (
  `Id` int(11) NOT NULL,
  `GroupName` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Price2` int(11) NOT NULL,
  `MarkUp` float NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_harga`
--

INSERT INTO `data_harga` (`Id`, `GroupName`, `Price`, `Price2`, `MarkUp`, `Status`) VALUES
(1, 'VIP', 0, 10000, 1.015, 1),
(2, 'VIP', 10000, 100000, 1.009, 1),
(3, 'VIP', 100000, 500000, 1.007, 1),
(4, 'VIP', 500000, 1000000, 1.005, 1),
(5, 'VIP', 1000000, 2000000, 1.003, 1),
(6, 'VIP', 2000000, 10000000, 1.002, 1),
(7, 'resseler', 0, 10000, 1.04, 1),
(8, 'resseler', 10000, 100000, 1.02, 1),
(9, 'resseler', 100000, 500000, 1.015, 1),
(10, 'resseler', 500000, 1000000, 1.013, 1),
(11, 'resseler', 1000000, 2000000, 1.008, 1),
(12, 'resseler', 2000000, 10000000, 1.004, 1),
(13, 'members', 0, 10000, 1.05, 1),
(14, 'members', 10000, 100000, 1.03, 1),
(15, 'members', 100000, 500000, 1.025, 1),
(16, 'members', 500000, 1000000, 1.02, 1),
(17, 'members', 1000000, 2000000, 1.02, 1),
(18, 'members', 2000000, 10000000, 1.01, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_item`
--

CREATE TABLE `data_item` (
  `Id` int(11) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `ItemSku` varchar(255) NOT NULL,
  `ItemPrice` int(11) NOT NULL,
  `ProductCode` varchar(255) NOT NULL,
  `ItemStatus` int(11) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_order`
--

CREATE TABLE `data_order` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL DEFAULT 0,
  `Email` varchar(255) NOT NULL DEFAULT '401xdssh@gmail.com',
  `Payment` varchar(255) NOT NULL,
  `ItemId` varchar(255) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `NickName` varchar(255) NOT NULL,
  `InvoiceId` varchar(255) NOT NULL,
  `TrxId` varchar(255) NOT NULL,
  `StatusOrder` int(11) NOT NULL COMMENT '0.Unpaid1.Paid2.Expired3.Failed4.Failed by server5.Success 6.pending',
  `TanggalOrder` date NOT NULL,
  `TanggalUpdate` datetime DEFAULT NULL,
  `Game` varchar(255) NOT NULL,
  `Ket` varchar(255) NOT NULL DEFAULT '  ',
  `Amount` int(11) NOT NULL,
  `Note` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_product`
--

CREATE TABLE `data_product` (
  `Id` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductSlug` varchar(255) NOT NULL,
  `ProductCode` varchar(255) NOT NULL,
  `ProductCat` varchar(255) NOT NULL,
  `ProductImage` varchar(255) NOT NULL,
  `ProductTutor` text NOT NULL,
  `ProductLink` varchar(255) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `ProductStatus` int(11) NOT NULL,
  `ProductCek` varchar(255) NOT NULL,
  `ProductType` int(11) NOT NULL COMMENT '0. Manual / 1.Otomatis',
  `ProductApi` int(11) NOT NULL COMMENT '0.Manual 1.Digiflazz 2.Smm'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_product`
--

INSERT INTO `data_product` (`Id`, `ProductName`, `ProductSlug`, `ProductCode`, `ProductCat`, `ProductImage`, `ProductTutor`, `ProductLink`, `CreatedAt`, `ProductStatus`, `ProductCek`, `ProductType`, `ProductApi`) VALUES
(1, 'Higgs Domino', 'higgs-domino', 'GMHDI', 'Games', '/assets/upload/home/product/ec068968961ad80f22460c07ca0c8c3a.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2021-10-04 17:23:02', 0, '', 1, 1),
(2, 'FREE FIRE', 'free-fire', 'GMFF', 'Games', '/assets/upload/home/product/34073d66f7d25ce6ea28020d1b956656.png', 'Untuk menemukan ID Game Anda, klik pada ikon karakter. User ID tercantum di bawah nama karakter Anda. Contoh: 5363266446.', '-', '2021-10-04 17:36:48', 1, '', 1, 1),
(3, 'MOBILE LEGEND', 'mobile-legend', 'GMML', 'Games', '/assets/upload/home/product/566fb5418f4464a22798814c2c54106e.png', 'Untuk mengetahui User ID Anda, silakan klik menu profil dibagian kiri atas pada menu utama game. User ID terlihat dibagian bawah Nama. Silakan masukkan gabungan User ID dan Zone ID. Contoh: User ID 12345678 dan Zone ID 9999. Maka tujuan diisi 123456789999.', '-', '2021-10-04 17:39:05', 1, '', 1, 1),
(4, 'POINT BLANK', 'point-blank', 'GMPB', 'Games', '/assets/upload/home/product/1556af7974f293763bca38e6179079a2.png', 'Penting! Ada 2 jenis tujuan yang dimasukkan, pilih salah satu (tergantung produk yang dibeli). OPSI 1: Masukan nomor HP untuk pembelian VOUCHER, voucher dikirim dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan. Pastikan nomor hp anda aktif. Contoh no hp: 082377823390. OPSI 2: Masukan User ID Game Anda untuk pembelian PB CASH, item langsung dikirim ke akun Anda. Untuk menemukan Zepetto ID Anda, silakan kunjungi dan masuk ke situs web Zepetto. ID Anda akan ditampilkan di kanan atas halaman beranda.', '-', '2021-10-04 17:47:57', 1, '', 1, 1),
(5, 'Valorant', 'valorant', 'GMVALO', 'Games', '/assets/upload/home/product/5d0d2d20c230224e89c44b2920a01154.png', 'Untuk menemukan ID Game Anda, silakan login ke akun dan salin User ID+Tag menggunakan tombol yang tersedia disamping Riot ID. Contoh: Westbourne#SEA.', '-', '2021-10-04 17:49:09', 1, '', 1, 1),
(6, 'PUBG MOBILE', 'pubg-mobile', 'PUBGM', 'Games', '/assets/upload/home/product/83993b22d0a93f1f231ac699597ccdd2.png', 'Penting! Ada 2 jenis tujuan yang dimasukkan, pilih salah satu (tergantung produk yang dibeli). OPSI 1: Masukan nomor HP untuk pembelian VOUCHER, voucher dikirim dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan. Pastikan nomor hp anda aktif. Contoh no hp: 082377823390. OPSI 2: Masukan User ID Game Anda untuk pembelian UC, item langsung dikirim ke akun Anda. Untuk menemukan ID Anda, klik pada ikon karakter. User ID tercantum di bawah nama karakter Anda. Contoh: 81237123.', '-', '2021-10-04 17:51:03', 1, '', 1, 1),
(7, 'Call of Duty MOBILE', 'call-of-duty-mobile', 'GMCODM', 'Games', '/assets/upload/home/product/f6d9844c8a681f77dc0b0c980a85183f.png', 'Untuk menemukan Player ID Anda, klik ikon \'settings\' yang terletak di sebelah kanan layar dan klik tab \'LEGAL AND PRIVCY\', Anda dapat menemukan Player ID Anda di sini. Contoh: 401481375599948625960.', '-', '2021-10-04 17:52:23', 1, '', 1, 1),
(8, 'Genshin Impact', 'genshin-impact', 'GMGEN', 'Games', '/assets/upload/home/product/2b5e564fb70d9e3bb00b837fcd95e024.png', 'Format no tujuan adalah gabungan ID server + UID. User ID tercantum di profil Anda. ID Server 001: Asia, Server 002: America, Server 003: Europe, Server 004: TW, HK, MO. Untuk menemukan ID Game Anda, silakan login ke game. Klik pada tombol profil di pojok kiri atas layar. Temukan UID dibawah avatar. Masukan gabungan ID server dan UID Anda di sini. Contoh: Server Asia, UID 012345678. Maka masukkan tujuan 001012345678.', '-', '2021-10-04 17:54:44', 1, '', 1, 1),
(9, 'Steam Wallet (IDR)', 'steam-wallet-idr', 'VCSWIDR', 'Voucher Games', '/assets/upload/home/product/07c1340b480a8da442671c4a85fbd22d.png', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2021-10-04 17:56:41', 1, '', 1, 1),
(10, 'PULSA', 'pulsa', 'PULSA', 'Produk PPOB', '/assets/upload/home/product/d373d600f8c03a9b5e86aedbbca63cc7.png', 'Masukan nomor tujuan sesuai operator yang digunakan. Contoh: 082377823390 untuk telkomsel.', 'pulsa', '2021-10-04 17:58:11', 1, '', 1, 1),
(14, 'PLN', 'pln', 'PLNTOKEN', 'Produk PPOB', '/assets/upload/home/product/cac71cd4f35264445b999a14fc13157b.png', 'Masukkan nomor meter PLN/ID pelanggan. Contoh: 32115296033. Nomor token dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2021-12-21 21:29:02', 1, '/api/plncek', 1, 1),
(15, 'DATA', 'data', 'DATA', 'Produk PPOB', '/assets/upload/home/product/f9ea94f208080199237c00dcd45a5d3c.png', 'Masukan nomor tujuan sesuai operator yang digunakan. Contoh: 082377823390 untuk telkomsel.', 'data', '2021-12-26 20:48:04', 1, '', 1, 1),
(16, 'GOOGLE PLAY INDONESIA', 'google-play-indonesia', 'VCGPIN', 'Voucher Games', '/assets/upload/home/product/595e43de1972bc8c44f9ea4c9e28e6fa.png', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2021-12-29 16:34:28', 1, '', 1, 1),
(17, 'WIFI ID', 'wifi-id', 'VCWIFIID', 'Produk PPOB', '/assets/upload/home/product/8620a9b8e56d2d31eac7dd4efd25dfd5.png', 'Masukkan nomor HP anda. Contoh: 082377823390. USER dan PASS dari Telkom dikirim ke nomor HP, dan catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2021-12-29 18:19:03', 1, '', 1, 1),
(18, 'Sausage Man', 'sausage-man', 'GMSSM', 'Games', '/assets/upload/home/product/2224bf2d577936eaae506f57ec48075d.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2021-12-29 18:27:31', 1, '', 1, 1),
(19, 'GARENA', 'garena', 'VGARENA', 'Voucher Games', '/assets/upload/home/product/d70f042d18dc5ff7c8e64b770f44b3eb.png', 'Penting! Ada 2 jenis tujuan yang dimasukkan, pilih salah satu (tergantung produk yang dibeli). OPSI 1: Masukan nomor HP untuk pembelian VOUCHER, voucher dikirim dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan. Pastikan nomor hp anda aktif. Contoh no hp: 082377823390. OPSI 2: Masukan User ID Game Anda untuk pembelian UC, item langsung dikirim ke akun Anda. Untuk menemukan ID Anda, klik pada ikon karakter. User ID tercantum di bawah nama karakter Anda. Contoh: 81237123.', '-', '2021-12-29 23:52:28', 1, '', 1, 1),
(20, 'Speed Drifters', 'speed-drifters', 'GMSDF', 'Games', '/assets/upload/home/product/a74723ed78345442cf52cddc7e59ff22.png', 'Untuk menemukan ID Anda, ketuk pada ikon karakter. User ID tercantum di bawah nama karakter Anda. Contoh: 11822383813597216.', '-', '2021-12-30 00:00:52', 1, '', 1, 1),
(21, 'LOST SAGA', 'lost-saga', 'GMLSGA', 'Games', '/assets/upload/home/product/dffcf9688083df21e01b63240e9ea3ae.png', 'Untuk menemukan Username Game Anda, silakan login ke game. Username tercantum di profil Anda. Contoh: mcpgaming.', '-', '2021-12-30 00:29:02', 1, '', 1, 1),
(22, 'Marvel Super War', 'marvel-super-war', 'GMMSW', 'Games', '/assets/upload/home/product/dbed5468761e4ce7e6f14faa188c41dd.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2021-12-30 01:04:38', 1, '', 1, 1),
(23, 'SPOTIFY', 'spotify', 'VCSPOTIFY', 'Voucher Hiburan', '/assets/upload/home/product/36c6db85402eedf774441d6e10889f18.png', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-01-15 07:53:00', 1, '', 1, 1),
(24, 'Ragnarok M: Eternal Love', 'ragnarok-m-eternal-love', 'GMRMEL', 'Games', '/assets/upload/home/product/6a33710bac0ff8e6de62b7251f72ae59.PNG', 'Masukan gabungan ID Player dan ID Server. Daftar ID Sever Eternal Love: 90001, Midnight Party: 90002, Memory of Faith: 90002003. Contoh: ID Player 1234567892 dan Server Eternal Love, maka masukkan tujuan diisi 123456789290001.', '-', '2022-03-14 10:14:51', 1, '', 1, 1),
(25, 'ARENA OF VALOR', 'arena-of-valor', 'GMAOV', 'Games', '/assets/upload/home/product/120a3796ba27d1470f5456834d1f5a5f.jpg', 'Untuk menemukan User ID Anda, Ketuk ikon pengaturan, scroll ke bawah, temukan bagian \"Umum\", lalu Klik \"Player ID\". Contoh: 888347346994333.', '-', '2022-03-14 10:52:10', 1, '', 1, 1),
(26, 'AU2 MOBILE', 'au2-mobile', 'GMAUM', 'Games', '/assets/upload/home/product/99a9da5867e6caeb4e24e48875eb7e40.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 11:14:19', 1, '', 1, 1),
(27, 'BOYAA DOMINO QIUQIU', 'boyaa-domino-qiuqiu', 'GMBDQ', 'Games', '/assets/upload/home/product/8cb7a773a4db6c9227057adf6e9a134c.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 11:25:03', 1, '', 1, 1),
(28, 'Eternal City', 'eternal-city', 'GMEC', 'Games', '/assets/upload/home/product/26f38f3e6bd62b15579940059c7d45bd.jpg', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 11:29:35', 1, '', 1, 1),
(29, 'Laplace M', 'laplace-m', 'GMLP', 'Games', '/assets/upload/home/product/e0e9980619f5073fc85df0cceaccaf9b.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 11:36:59', 1, '', 1, 1),
(30, 'Lords Mobile', 'lords-mobile', 'GMLML', 'Games', '/assets/upload/home/product/17690f71f4088384ae694b5e34380cec.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 11:44:11', 1, '', 1, 1),
(31, 'MangaToon', 'mangatoon', 'HBMT', 'Hiburan', '/assets/upload/home/product/42a3a41e19f83d2fbf5ad7d11aaac103.png', 'Untuk menemukan ID Anda, silakan login ke akun. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 12:19:59', 1, '', 1, 1),
(32, 'Rules of Survival Mobile', 'rules-of-survival-mobile', 'GMROSM', 'Games', '/assets/upload/home/product/6d35e0901dfcfb6130bda83fffb86333.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 12:22:11', 1, '', 1, 1),
(33, 'Starpass', 'starpass', 'HBSP', 'Hiburan', '/assets/upload/home/product/3bc9d13e5e51718d6ed6da60b4f6b0b6.png', 'Untuk menemukan ID Anda, silakan login ke akun. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 12:32:50', 1, '', 1, 1),
(34, 'Love Nikki', 'love-nikki', 'GMLN', 'Games', '/assets/upload/home/product/fd37ed340616e3480c6ed4b2a1cd519b.png', 'Untuk menemukan ID Game Anda, silakan login ke akun. User ID Game tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 12:36:11', 1, '', 1, 1),
(35, 'Bleach Mobile 3D', 'bleach-mobile-3d', 'GMBM3D', 'Games', '/assets/upload/home/product/a77f2f25f02af0cac877d5da7a5b7945.png', 'Untuk menemukan ID Game Anda, akses menu \'User Center\' di layar mulai, atau Nama Pengguna Anda di layar dan Server pada halaman start game. Format tujuan: User ID+Nama User+Server. Contoh User ID 123456789, Nama User Budi, Server BLEACH S1, maka tujuannya 123456789BudiBLEACH S1.', '-', '2022-03-14 12:37:53', 1, '', 1, 1),
(36, 'Dragon Nest M - SEA Koram', 'dragon-nest-m-sea-koram', 'GMDNSK', 'Games', '/assets/upload/home/product/1e66732a9c2ffffaa68c731e3e66c4cb.jpg', 'Untuk menemukan ID Game Anda, silakan login ke akun. User ID tercantum di profil Anda. Format tujuan masukkan User ID dan Server. Contoh User ID 12345678, Server 00001, maka masukkan 1234567800001.', '-', '2022-03-14 12:52:03', 1, '', 1, 1),
(37, 'Jade Dynasty', 'jade-dynasty', 'GMJD', 'Games', '/assets/upload/home/product/8be5363e0dd5d8027dc104cd3dc3483b.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 12:56:11', 1, '', 1, 1),
(38, 'King of Kings', 'king-of-kings', 'GMKOK', 'Games', '/assets/upload/home/product/27564ff572134e1c90b06f3f25ed46a0.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 12:59:08', 1, '', 1, 1),
(39, 'Boyaa Capsa Susun', 'boyaa-capsa-susun', 'GMBCS', 'Games', '/assets/upload/home/product/17fb414a7eaa6eca13a0de1d2b56b161.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 13:09:40', 1, '', 1, 1),
(40, 'Werewolf (Party Game)', 'werewolf-party-game', 'GMWPG', 'Games', '/assets/upload/home/product/84132a63dfcd34b4f7ab841c197122a8.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 13:13:15', 1, '', 1, 1),
(41, 'Snail Games', 'snail-games', 'VMSNG', 'Voucher Games', '/assets/upload/home/product/e7ae55a83a861a0e734dd12476322fcf.png', 'Untuk menemukan ID Akun Anda, silakan login ke akun game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 13:16:58', 1, '', 1, 1),
(42, 'Shining Spirit', 'shining-spirit', 'GMSS', 'Games', '/assets/upload/home/product/b23b361aebcf771fddb2f8cbefb656c0.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 13:19:53', 1, '', 1, 1),
(43, 'Poker Texas', 'poker-texas', 'GMPKT', 'Games', '/assets/upload/home/product/9ccb701d52ff07fc12789186a0778012.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 13:22:19', 1, '', 1, 1),
(44, 'Ride Out Heroes', 'ride-out-heroes', 'GMROH', 'Games', '/assets/upload/home/product/7f87444604fcd288fe22e9838a6968c4.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 14:06:07', 1, '', 1, 1),
(45, 'Chaos Crisis', 'chaos-crisis', 'GMCC', 'Games', '/assets/upload/home/product/6b10a094e39a598d318aeccd6efa26f8.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 14:10:21', 1, '', 1, 1),
(46, 'LifeAfter Credits', 'lifeafter-credits', 'GMLAC', 'Games', '/assets/upload/home/product/1743ee4fcb41fb66ba134210e2d8c641.jpg', 'Masukkan format User ID-Kode Server. Daftar kode server: MiskaTown 500001, SandCastle 500002, MouthSwamp 500003, RedwoodTown 500004, Obelisk 500005, ChaosOutpost 500007, IronStride 500008, FallForest 510001, MountSnow 510002, NancyCity 520001, CharlesTown 520002, SnowHighlands 520003, Santopany 520004, LevinCity 520005, ChaosCity 520007, TwinIslands 520008, HopeWall 520009, NewLand 500006, MileStone 520006. Contoh User ID 987654321, Kode Server 500001, maka masukkan tujuan: 987654321-500001.', '-', '2022-03-14 14:18:02', 1, '', 1, 1),
(47, 'IndoPlay', 'indoplay', 'GMIPL', 'Games', '/assets/upload/home/product/0197d85caa7c22a742305edebfd35380.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 14:20:44', 1, '', 1, 1),
(48, 'Lumia Saga', 'lumia-saga', 'GMLSG', 'Games', '/assets/upload/home/product/ce3b8fc47e90fdfab3608c46d4852565.jpg', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 14:25:51', 1, '', 1, 1),
(49, 'Scroll of Onmyoji', 'scroll-of-onmyoji', 'GMSOO', 'Games', '/assets/upload/home/product/fc407aaf0e21fae71e59ce331939df67.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321. Produk ini hanya untuk region indonesia, apabila input ID Game region luar indonesia akan otomatis gagal.', '-', '2022-03-14 14:33:03', 1, '', 1, 1),
(50, 'Tales of Jades: Hwarang Diamonds', 'tales-of-jades-hwarang-diamonds', 'GMTOJHD', 'Games', '/assets/upload/home/product/16df89ffbe61eddd1d760e51c48d6f15.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321. Produk ini hanya untuk region indonesia, apabila input ID Game region luar indonesia akan otomatis gagal.', '-', '2022-03-14 14:46:36', 1, '', 1, 1),
(51, 'HAGO', 'hago', 'HHAGO', 'Hiburan', '/assets/upload/home/product/d35b21e1083537362e3a103767135c43.png', 'Untuk menemukan ID Anda, silakan login ke akun. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 14:52:45', 1, '', 1, 1),
(52, 'Tom and Jerry : Chase', 'tom-and-jerry-chase', 'GMTAJC', 'Games', '/assets/upload/home/product/09bd50179ccf2d7325e2acaae04b2b51.png', 'Untuk menemukan ID Game Anda, silakan login ke akun. User ID tercantum di profil Anda.  Masukkan gabungan No Server dan User ID, dipisah dengan koma. Server default adalah Asia Server dengan nomor 10001. Contoh No Server 10001, User ID 987654321, maka masukkan tujuan 10001,987654321.', '-', '2022-03-14 15:27:40', 1, '', 1, 1),
(53, 'Knights of Valour', 'knights-of-valour', 'GMKOV', 'Games', '/assets/upload/home/product/4b6557d74d03ad440b64732ef4b517a8.png', 'Untuk menemukan ID Game Anda, silakan login ke akun. User ID tercantum di profil Anda. Masukkan gabungan No Server dan User ID. Daftar No Server: Google Play 800090, App Store 800092, Huawei AppGallery 800089, Oppo App Market 160856, Vivo App Market 160861, Xiaomi App Market 160860. Contoh untuk Server Google Play dan User ID 987654321, maka masukkan tujuan 800090,987654321.', '-', '2022-03-14 15:37:04', 1, '', 1, 1),
(54, 'One Punch Man', 'one-punch-man', 'GMPOM', 'Games', '/assets/upload/home/product/b448886abf85c956285bcc61aed75ec4.jpg', 'Untuk menemukan ID Game Anda, silakan login ke akun. User UID tercantum di profil Anda. Masukkan UID tanpa karakter (_). Contoh untuk UID 7399620_310412, maka masukkan tujuan 7399620310412.', '-', '2022-03-14 15:42:16', 1, '', 1, 1),
(55, 'DRAGON RAJA - SEA', 'dragon-raja-sea', 'GMDRS', 'Games', '/assets/upload/home/product/3abe856af77a4d043487e404adfc8178.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 15:45:34', 1, '', 1, 1),
(56, 'Bullet Angel', 'bullet-angel', 'GMBLA', 'Games', '/assets/upload/home/product/c4f8b6e3bdd8d6eb5d628371d62b7bf1.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 15:50:37', 1, '', 1, 1),
(57, '8 Ball Pool', '8-ball-pool', 'GM8BP', 'Games', '/assets/upload/home/product/5b3acb9172d246b61be5d8c144e108b2.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 16:00:55', 1, '', 1, 1),
(58, 'Light of Thel', 'light-of-thel', 'GMLOT', 'Games', '/assets/upload/home/product/7fd68ae5cdbb57b991d38045330a4abd.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 16:04:26', 1, '', 1, 1),
(59, 'LUDO CLUB', 'ludo-club', 'GMLC', 'Games', '/assets/upload/home/product/4e53dd2d6bc63d44293b7289889367e7.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 16:08:18', 1, '', 1, 1),
(60, 'League of Legends Wild Rift', 'league-of-legends-wild-rift', 'GMLOLWR', 'Games', '/assets/upload/home/product/c440e0b407d3a828d215fa11baa2d5db.jpg', 'Untuk menemukan ID RIOT Game Anda, silakan login ke game. ID RIOT tercantum di profil Anda. Format ID RIOT + Tag atau ID RIOT xyz Tag. Contoh untuk ID RIOT mcpgaming, Tag SEA, maka masukkan tujuan mcpgaming#SEA atau mcpgamingxyzSEA. Jika ID invalid (salah) atau ID region luar indonesia maka akan otomatis gagal.', '-', '2022-03-14 16:15:34', 1, '', 1, 1),
(61, 'Mango Live', 'mango-live', 'HBML', 'Hiburan', '/assets/upload/home/product/861b14fce75b6ce4f4f738a8a59680d3.png', 'Untuk menemukan ID Anda, silakan login ke akun. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 16:21:14', 1, '', 1, 1),
(62, 'Era of Celestial', 'era-of-celestial', 'GMEOC', 'Games', '/assets/upload/home/product/86a750dc07f712e8764dc307bbf2abb9.png', 'Untuk menemukan ID Game Anda, silakan login ke game. User ID tercantum di profil Anda. Contoh: 987654321.', '-', '2022-03-14 16:29:18', 1, '', 1, 1),
(63, 'MEGAXUS', 'megaxus', 'VCMGXS', 'Voucher Games', '/assets/upload/home/product/39af1312cb45f6cb588d8bbf46bc7ae0.png', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 11:19:41', 1, '', 1, 1),
(64, 'Razer Gold', 'razer-gold', 'VCRZGLD', 'Voucher Games', '/assets/upload/home/product/a5d32da8d643272d1da14e6256acff20.jpg', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 11:25:24', 1, '', 1, 1),
(65, 'PLAYSTATION', 'playstation', 'VCPLST', 'Voucher Games', '/assets/upload/home/product/b924a95e1852a195fabc90dcfa7fbbb1.jpg', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 11:33:34', 1, '', 1, 1),
(66, 'WAVE GAME', 'wave-game', 'VCWVGM', 'Voucher Games', '/assets/upload/home/product/f7145758bef61e696b3ada5e59077385.png', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 12:11:06', 1, '', 1, 1),
(67, 'ALFAMART VOUCHER', 'alfamart-voucher', 'VCALFA', 'Voucher Belanja', '/assets/upload/home/product/5c66b8269f6eb4345669613e7bd1726a.jpg', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 12:18:13', 1, '', 1, 1),
(68, 'INDOMARET', 'indomaret', 'VCINDOMA', 'Voucher Belanja', '/assets/upload/home/product/eacdf3208299a77e2627d6a347001391.jpg', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 12:23:42', 1, '', 1, 1),
(69, 'CARREFOUR / TRANSMART', 'carrefour-transmart', 'VCTMCR', 'Voucher Belanja', '/assets/upload/home/product/ab7dfea167610d9cd92c0552b93c4386.png', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 12:30:50', 1, '', 1, 1),
(70, 'PUBG', 'pubg', 'VCPUBG', 'Voucher Games', '/assets/upload/home/product/15016e5a4cebc1252fcc82cb3be3964d.png', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 12:43:27', 1, '', 1, 1),
(71, 'Game-On Credits', 'game-on-credits', 'VCGONCR', 'Voucher Games', '/assets/upload/home/product/821172b17b8b61c310e434ef111f3049.jpg', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 12:59:42', 1, '', 1, 1),
(72, 'Playwith', 'playwith', 'VCPLYWTH', 'Voucher Games', '/assets/upload/home/product/92540082cb48040e77b5b917442f7482.jpg', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 13:05:17', 1, '', 1, 1),
(73, 'Unipin Voucher', 'unipin-voucher', 'VCUNIPN', 'Voucher Games', '/assets/upload/home/product/ec46031c14fb1620a07e6175d5b54874.jpg', 'Masukkan nomor HP tujuan. Contoh: 082377823390. Voucher dikirim ke saldo unipin point, cek info lanjut di catatan bagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 13:14:32', 1, '', 1, 1),
(74, 'Karma Koin', 'karma-koin', 'VCKRMKN', 'Voucher Games', '/assets/upload/home/product/0a1c93bd018396e30f031fc633af3b8c.jpg', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 13:18:43', 1, '', 1, 1),
(75, 'Nintendo eShop', 'nintendo-eshop', 'VCNTND', 'Voucher Games', '/assets/upload/home/product/ff7677937dad707e473235e8cef31510.jpg', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 13:22:48', 1, '', 1, 1),
(76, 'Battle Net Gift Card', 'battle-net-gift-card', 'VCBNGC', 'Voucher Games', '/assets/upload/home/product/8f5e14f0d73eefe9d11e335f56ab6988.jpg', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 13:25:32', 1, '', 1, 1),
(77, 'IMVU', 'imvu', 'VCIMVU', 'Voucher Hiburan', '/assets/upload/home/product/5158363e53f99c28508f230d93cad202.jpg', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 13:33:31', 1, '', 1, 1),
(78, 'Dota Auto Chess Candy (Global)', 'dota-auto-chess-candy-global', 'VCDTACC', 'Voucher Games', '/assets/upload/home/product/e143c784f4478468cc0f5f27e4b330ff.jpg', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 13:47:40', 1, '', 1, 1),
(79, 'Vidio', 'vidio', 'VCVIDIO', 'Voucher Hiburan', '/assets/upload/home/product/777ca85509875fc85f010761bbc94208.jpg', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 13:50:50', 1, '', 1, 1),
(80, 'XBOX', 'xbox', 'VCXBOX', 'Voucher Games', '/assets/upload/home/product/34a857924ba94d452250872a840dab55.jpg', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 13:53:28', 1, '', 1, 1),
(81, 'Tokopedia', 'tokopedia', 'VCTKOPED', 'Voucher Belanja', '/assets/upload/home/product/7f756382626d85d379b168785d864602.png', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 13:57:08', 1, '', 1, 1),
(82, 'HOTELMURAH', 'hotelmurah', 'VCHTLMRH', 'Voucher Belanja', '/assets/upload/home/product/10c2e9d92ea7d4a46226ac7af8f6ca7f.png', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 13:59:48', 1, '', 1, 1),
(83, 'Roblox', 'roblox', 'VCRBLOX', 'Voucher Games', '/assets/upload/home/product/2dd5c9b368712c0d048cb43ca2320a66.jpg', 'Masukkan nomor HP anda. Contoh: 082377823390. Voucher dikirim ke catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 14:02:15', 1, '', 1, 1),
(84, 'WeTV', 'wetv', 'STWETV', 'Voucher Hiburan', '/assets/upload/home/product/8b49c8b33f037f52d22d4af5f5401a90.jpg', 'Untuk menemukan ID WeTV Anda, silakan login ke Apps WETV. Pilih Profile, Scroll Kebawah dan Lihat WETV ID. Contoh: 987654321.', '-', '2022-03-16 15:25:40', 1, '', 1, 1),
(85, 'GO PAY', 'go-pay', 'EMGPAY', 'Produk PPOB', '/assets/upload/home/product/39671f9f0363bc290a569887d229a0eb.png', 'Masukkan nomor tujuan top up. Contoh: 082377823390. Saldo dikirim otomatis, info lengkap cek catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 16:37:48', 1, '', 1, 1),
(86, 'OVO', 'ovo', 'EMOVO', 'Produk PPOB', '/assets/upload/home/product/b26fd51ac4c2d44cdc495eed0da90dea.png', 'Masukkan nomor tujuan top up. Contoh: 082377823390. Saldo dikirim otomatis, info lengkap cek catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 16:48:52', 1, '', 1, 1),
(87, 'BUKALAPAK', 'bukalapak', 'EMBKLPK', 'Produk PPOB', '/assets/upload/home/product/7fc261a9afff51c30862c3b39bf18e44.png', 'Masukkan nomor tujuan top up. Contoh: 082377823390. Saldo dikirim otomatis, info lengkap cek catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 16:49:50', 1, '', 1, 1),
(88, 'GRAB', 'grab', 'EMGRAB', 'Produk PPOB', '/assets/upload/home/product/ad3aaca53473895cabd7c652b8215fb8.png', 'Masukkan nomor tujuan top up. Contoh: 082377823390. Saldo dikirim otomatis, info lengkap cek catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 16:50:56', 1, '', 1, 1),
(89, 'DANA', 'dana', 'EMDANA', 'Produk PPOB', '/assets/upload/home/product/65e55bd1622a91a203c9e13538f99393.png', 'Masukkan nomor tujuan top up. Contoh: 082377823390. Saldo dikirim otomatis, info lengkap cek catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 16:51:50', 1, '', 1, 1),
(90, 'TIX ID', 'tix-id', 'EMTIXID', 'Produk PPOB', '/assets/upload/home/product/ab23c977bf2899a28454bd0c8b88e8f5.png', 'Masukkan nomor tujuan top up. Contoh: 082377823390. Saldo dikirim otomatis, info lengkap cek catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 16:52:42', 1, '', 1, 1),
(91, 'LinkAja', 'linkaja', 'EMLKAJ', 'Produk PPOB', '/assets/upload/home/product/6496ec43f7dbeb9efe6322be37b81144.png', 'Masukkan nomor tujuan top up. Contoh: 082377823390. Saldo dikirim otomatis, info lengkap cek catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 16:53:38', 1, '', 1, 1),
(92, 'SHOPEE PAY', 'shopee-pay', 'EMSHPEPY', 'Produk PPOB', '/assets/upload/home/product/667815c726bed8819330d449ac9d8535.png', 'Masukkan nomor tujuan top up. Contoh: 082377823390. Saldo dikirim otomatis, info lengkap cek catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 16:54:18', 1, '', 1, 1),
(93, 'MAXIM', 'maxim', 'EMMXIM', 'Produk PPOB', '/assets/upload/home/product/62fa219cfde5078a7cb4936687492db9.png', 'Masukkan nomor tujuan top up. Contoh: 082377823390. Saldo dikirim otomatis, info lengkap cek catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 16:56:03', 1, '', 1, 1),
(94, 'DOKU', 'doku', 'EMDOKU', 'Produk PPOB', '/assets/upload/home/product/66c25b404a56f81806777c909851fab3.png', 'Masukkan nomor tujuan top up. Contoh: 082377823390. Saldo dikirim otomatis, info lengkap cek catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 16:57:08', 1, '', 1, 1),
(95, 'MANDIRI E-TOLL', 'mandiri-e-toll', 'EMMANET', 'Produk PPOB', '/assets/upload/home/product/467035c7ba440bd7789de9f85c47b3dc.png', 'Masukkan nomor tujuan top up. Update saldo setelah pengisian. Saldo dikirim otomatis, info lengkap cek catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 17:15:25', 1, '', 1, 1),
(96, 'TAPCASH BNI', 'tapcash-bni', 'EMTPCBNI', 'Produk PPOB', '/assets/upload/home/product/316471a19ee60b9085583f2f41664cc9.png', 'Masukkan nomor tujuan top up. Update saldo setelah pengisian. Saldo dikirim otomatis, info lengkap cek catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 17:18:45', 1, '', 1, 1),
(97, 'BRI BRIZZI', 'bri-brizzi', 'EMBRBRZ', 'Produk PPOB', '/assets/upload/home/product/813b1c487b198314c6efece45ae87b9d.png', 'Masukkan nomor tujuan top up. Saldo dikirim otomatis, info lengkap cek catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 17:25:41', 1, '', 1, 1),
(98, 'Sakuku', 'sakuku', 'EMSKKU', 'Produk PPOB', '/assets/upload/home/product/574cab19ffbf8db8a8a6363ee233628f.png', 'Masukkan nomor tujuan top up. Saldo dikirim otomatis, info lengkap cek catatan dibagian SN/Ket pada halaman riwayat transaksi, dan juga dapat dilihat pada halaman cek pesanan dengan menginputkan ID pesanan.', '-', '2022-03-16 17:28:05', 1, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_setting`
--

CREATE TABLE `data_setting` (
  `Id` int(11) NOT NULL,
  `SiteName` varchar(255) NOT NULL,
  `BonusRegist` int(11) NOT NULL,
  `Resseler1` float NOT NULL,
  `Member1` float NOT NULL,
  `Resseler2` float NOT NULL,
  `Member2` float NOT NULL,
  `Api` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_setting`
--

INSERT INTO `data_setting` (`Id`, `SiteName`, `BonusRegist`, `Resseler1`, `Member1`, `Resseler2`, `Member2`, `Api`) VALUES
(1, 'Kincai Topup', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_slide`
--

CREATE TABLE `data_slide` (
  `Id` int(11) NOT NULL,
  `NameSlide` varchar(255) NOT NULL,
  `DescSlide` text NOT NULL,
  `FotoSlide` varchar(255) NOT NULL,
  `StatusSlide` int(11) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_slide`
--

INSERT INTO `data_slide` (`Id`, `NameSlide`, `DescSlide`, `FotoSlide`, `StatusSlide`, `CreatedAt`) VALUES
(3, 'Kincai Topup 1', 'Kincai Topup 1', '/assets/upload/home/slide/65c10cdb6ed4e16da39d1a11f51a712c.jpg', 1, '2021-09-29 07:28:33'),
(4, 'Kincai Topup 2', 'Kincai Topup 2', '/assets/upload/home/slide/feb2bfedd19a1cec73fb3cc850918a6e.jpg', 1, '2021-09-29 07:50:13'),
(5, 'Kincai Topup 3', 'Kincai Topup 3', '/assets/upload/home/slide/37465ef119a8a4f86a41161c9be882bc.png', 1, '2021-09-30 10:54:00'),
(6, 'Kincai Topup 4', 'Kincai Topup 4', '/assets/upload/home/slide/e92ae4a3b27ee9ae809ef225bebb0243.jpg', 1, '2022-03-09 12:33:38'),
(7, 'Kincai Topup 5', 'Kincai Topup 5', '/assets/upload/home/slide/ea74d49ded27b84424d1bab07eabb7a4.jpg', 1, '2022-03-09 12:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `data_untung`
--

CREATE TABLE `data_untung` (
  `Id` int(11) NOT NULL,
  `InvoiceId` varchar(255) NOT NULL,
  `Untung` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Tanggal` date DEFAULT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'Member'),
(3, 'resseler', 'Resseler'),
(4, 'VIP', 'VIP');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `Balance` int(11) NOT NULL DEFAULT 0,
  `ApiKey` varchar(255) NOT NULL,
  `PrivateKey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `Balance`, `ApiKey`, `PrivateKey`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$pcSAon9jBP3HEUG.YVzIVOVXmLjeNZPp1z7LnVZyJWDB6YbC5ISLC', 'mycoding@401xd.com', NULL, '', NULL, NULL, NULL, '898da8e14ce9c2017c575a4f95618c459d54f1e3', '$2y$10$tzzgYcLjFOpB/mz3o4whU.QRSH0nJXmxHDGUVQt5aU11L8DEIFZFK', 1268889823, 1647440437, 1, 'MC', 'Project', '401XD Group', '082377823390', 10000000, 'da4f210e748244057a81979e2068575f', 'c9318e7a58cc6522a39bf9b3be1dbaae'),
(2, '127.0.0.1', NULL, '$2y$10$pcSAon9jBP3HEUG.YVzIVOVXmLjeNZPp1z7LnVZyJWDB6YbC5ISLC', 'demo@401xd.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1646995964, 1647024931, 1, 'Demo', 'Account', 'Demo Account', '08', 0, '0f6a640ce4023ba8b40eb1d273e75ad5', '4eafe80cc4e9993b0207af2d506a61c2');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 1, 1),
(2, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_deposit`
--
ALTER TABLE `data_deposit`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `data_harga`
--
ALTER TABLE `data_harga`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `data_item`
--
ALTER TABLE `data_item`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `data_order`
--
ALTER TABLE `data_order`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `data_product`
--
ALTER TABLE `data_product`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `data_setting`
--
ALTER TABLE `data_setting`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `data_slide`
--
ALTER TABLE `data_slide`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `data_untung`
--
ALTER TABLE `data_untung`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_deposit`
--
ALTER TABLE `data_deposit`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_harga`
--
ALTER TABLE `data_harga`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `data_item`
--
ALTER TABLE `data_item`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_order`
--
ALTER TABLE `data_order`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_product`
--
ALTER TABLE `data_product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `data_setting`
--
ALTER TABLE `data_setting`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_slide`
--
ALTER TABLE `data_slide`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_untung`
--
ALTER TABLE `data_untung`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
