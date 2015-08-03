-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2015 pada 09.29
-- Versi Server: 5.6.14
-- Versi PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `ropeg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `albumphotovideo`
--

CREATE TABLE IF NOT EXISTS `albumphotovideo` (
  `id_albumphotovideo` int(11) NOT NULL AUTO_INCREMENT,
  `albumphotovideo_name` varchar(100) DEFAULT NULL,
  `albumphotovideo_desc` text,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `create_author` varchar(50) DEFAULT NULL,
  `publish` enum('Y','N') DEFAULT 'N',
  `sort_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_albumphotovideo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `albumphotovideo`
--

INSERT INTO `albumphotovideo` (`id_albumphotovideo`, `albumphotovideo_name`, `albumphotovideo_desc`, `create_time`, `update_time`, `create_author`, `publish`, `sort_number`) VALUES
(1, 'Orientasi Kerja CPNSP Tahun 2014', 'Orientasi Kerja CPNSP Tahun 2014', '2015-05-15 10:23:22', NULL, '0', 'Y', 1),
(2, 'Rapat Penyusunan pedoman Penilaian Kinerja Di Lingkungan Kemendagri 2014', 'Rapat Penyusunan pedoman Penilaian Kinerja Di Lingkungan Kemendagri 2014', '2015-05-15 10:23:47', NULL, '0', 'Y', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `albumphotovideo_gallery`
--

CREATE TABLE IF NOT EXISTS `albumphotovideo_gallery` (
  `id_albumphotovideo_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `id_albumphotovideo` int(11) NOT NULL,
  `albumphotovideo_gallery_name` varchar(100) DEFAULT NULL,
  `albumphotovideo_gallery_desc` text,
  `file_foto` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_author` varchar(50) DEFAULT NULL,
  `publish` enum('Y','N') DEFAULT 'N',
  `sort_number` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT '0' COMMENT '0. Foto  1. Link Youtube',
  `file_foto_youtube` varchar(255) DEFAULT NULL,
  `link_youtube` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_albumphotovideo_gallery`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `albumphotovideo_gallery`
--

INSERT INTO `albumphotovideo_gallery` (`id_albumphotovideo_gallery`, `id_albumphotovideo`, `albumphotovideo_gallery_name`, `albumphotovideo_gallery_desc`, `file_foto`, `create_time`, `create_author`, `publish`, `sort_number`, `type`, `file_foto_youtube`, `link_youtube`) VALUES
(1, 1, 'Peserta', 'Peserta', 'cpns3.jpeg', '2015-05-15 10:26:08', 'Administrator', 'Y', 1, 0, NULL, NULL),
(2, 1, 'Peserta', '', 'cpns2.jpeg', '2015-05-15 10:26:17', 'Administrator', 'Y', 2, 0, NULL, NULL),
(3, 1, 'Peserta', '-', 'cpns1.jpeg', '2015-05-15 10:26:32', 'Administrator', 'Y', 3, 0, NULL, NULL),
(4, 2, 'Pembukaan', '', '14000003.jpeg', '2015-05-15 10:27:09', 'Administrator', 'Y', 1, 0, NULL, NULL),
(5, 2, 'Peserta', '', '14000007.jpeg', '2015-05-15 10:27:21', 'Administrator', 'Y', 2, 0, NULL, NULL),
(6, 1, 'Test Video', 'test desc', NULL, '2015-05-18 06:36:57', 'Administrator', 'Y', 0, 1, '', 'https://www.youtube.com/watch?v=HcFLJkJJzV8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(255) DEFAULT NULL,
  `banner_link` varchar(255) DEFAULT NULL,
  `banner_desc` text,
  `file_foto` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_author` varchar(50) DEFAULT NULL,
  `publish` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id_banner`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=23 ;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id_banner`, `banner_name`, `banner_link`, `banner_desc`, `file_foto`, `create_time`, `create_author`, `publish`) VALUES
(19, 'BKN', 'bkn', '', 'link_bkn.PNG', '2015-07-22 11:15:06', 'Administrator', 'Y'),
(18, 'Setjen Kemendagri`', 'http://setjen.kemendagri.go.id/', '', 'link_kesbangpol.PNG', '2015-07-22 10:41:10', 'Administrator', 'Y'),
(20, 'Menpan', '#', '', 'link_menpan.PNG', '2015-07-22 11:15:53', 'Administrator', 'Y'),
(17, 'Kemendagri', 'http://www.kemendagri.go.id/', '', 'link_kemendagri.PNG', '2015-07-22 10:37:03', 'Administrator', 'Y'),
(21, 'Otda', 'otada.com', '', 'link_otda.PNG', '2015-07-22 11:16:33', 'Administrator', 'Y'),
(22, 'Ropeg', '#', '', 'logo_ropeg.png', '2015-07-22 11:17:05', 'Administrator', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id_events` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `author` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_events`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id_events`, `judul`, `keterangan`, `author`, `tanggal`) VALUES
(1, ' Persyaratan Perjalanan Dinas Ke Luar Negeri (PDLN)', '<p><span style="color: rgb(0, 0, 0); font-family: Verdana, Geneva, sans-serif; font-size: 12px; line-height: normal;">Assalamu &lsquo;alaikum Warakhmatullahi Wabarakatuh Salam sejahtera bagi kita semua. Segala puji bagi Allah SWT, Tuhan Yang Maha Kuasa atas segala rahmat dan karunia-Nya sehingga Biro Kepegawaian Kementerian Dalam Negeri dapat menyediakan layanan Informasi tentang Pembinaan dan Pengelolaan Administrasi Kepegawaian dilingkungan Kementerian Dalam Negeri dan Pemerintah Daerah. Adapun maksud dan tujuan website ini dibangun guna untuk memudahkan para pejabat pengelola kepegawaian di lingkungan Kementerian Dalam Negeri dan Pemerintah Daerah dalam memperoleh informasi Kepegawaian secara baik dan benar.</span></p>\r\n', 'Administrator', '2015-07-24'),
(3, 'DAFTAR NOMINATIF PEGAWAI NEGERI SIPIL BERDASARKAN STATUS KPE BELUM FOTO DAN SUDAH FOTO TAPI BELUM DAPAT KPE DI LINGKUNGAN KEMENTERIAN DALAM NEGERI (Update 20/06/2014)', '<p><span style="color: rgb(0, 0, 0); font-family: Verdana, Geneva, sans-serif; font-size: 12px; line-height: normal;">Assalamu &lsquo;alaikum Warakhmatullahi Wabarakatuh Salam sejahtera bagi kita semua. Segala puji bagi Allah SWT, Tuhan Yang Maha Kuasa atas segala rahmat dan karunia-Nya sehingga Biro Kepegawaian Kementerian Dalam Negeri dapat menyediakan layanan Informasi tentang Pembinaan dan Pengelolaan Administrasi Kepegawaian dilingkungan Kementerian Dalam Negeri dan Pemerintah Daerah. Adapun maksud dan tujuan website ini dibangun guna untuk memudahkan para pejabat pengelola kepegawaian di lingkungan Kementerian Dalam Negeri dan Pemerintah Daerah dalam memperoleh informasi Kepegawaian secara baik dan benar.</span></p>\r\n', 'Administrator', '2015-07-24'),
(4, ' PP NOMOR 34 TAHUN 2014 (Update :19/06/2014)', '<p><span style="color: rgb(0, 0, 0); font-family: Verdana, Geneva, sans-serif; font-size: 12px; line-height: normal;">Assalamu &lsquo;alaikum Warakhmatullahi Wabarakatuh Salam sejahtera bagi kita semua. Segala puji bagi Allah SWT, Tuhan Yang Maha Kuasa atas segala rahmat dan karunia-Nya sehingga Biro Kepegawaian Kementerian Dalam Negeri dapat menyediakan layanan Informasi tentang Pembinaan dan Pengelolaan Administrasi Kepegawaian dilingkungan Kementerian Dalam Negeri dan Pemerintah Daerah. Adapun maksud dan tujuan website ini dibangun guna untuk memudahkan para pejabat pengelola kepegawaian di lingkungan Kementerian Dalam Negeri dan Pemerintah Daerah dalam memperoleh informasi Kepegawaian secara baik dan benar.</span></p>\r\n', 'Administrator', '2015-07-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id_files` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `id_kategori` int(11) DEFAULT NULL,
  `files_data` text,
  `publish` enum('N','Y') DEFAULT 'Y',
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id_files`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `files`
--

INSERT INTO `files` (`id_files`, `judul`, `keterangan`, `id_kategori`, `files_data`, `publish`, `create_time`) VALUES
(2, 'Formulir B LHKPN', '', 1, '120000031.jpeg', 'Y', '2015-07-24 04:09:07'),
(3, 'PERATURAN PEMERINTAH REPUBLIK INDONESIA', 'PERUBAHAN KEENAM BELAS ATAS PERATURAN PEMERINTAH NOMOR 7 TAHUN 1977 TENTANG PERATURAN GAJI PEGAWAI NEGERI SIPIL', 2, 'PP_Gaji_2014.pdf', 'Y', '2015-07-24 04:33:49'),
(4, 'PERATURAN MENTERI NOMOR 41 TAHUN 2014', 'PERMENDAGRI NO 41 TAHUN 2014 TENTANG PELAKSANAAN PEMBAYARAN TUNJANGAN KINERJA PEGAWAI NEGERI SIPIL DI LINGKUNGAN KEMENTERIAN DALAM NEGERI', 2, 'PERMENDAGRI_NO_41_TAHUN_2014.pdf', 'Y', '2015-07-24 04:35:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_author` varchar(50) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `file_foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `images`
--

INSERT INTO `images` (`id`, `create_author`, `create_time`, `file_foto`) VALUES
(1, 'Administrator', '2015-05-18 04:25:04', 'the-warning.jpg'),
(2, 'Administrator', '2015-07-27 04:46:59', 'tabel_potongan.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_file`
--

CREATE TABLE IF NOT EXISTS `kategori_file` (
  `id_kategori_files` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_files`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `kategori_file`
--

INSERT INTO `kategori_file` (`id_kategori_files`, `kategori_file`) VALUES
(1, 'Download Dokumen'),
(2, 'Peraturan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `id_news_category` int(11) NOT NULL DEFAULT '0',
  `news_name` varchar(255) DEFAULT NULL,
  `news_desc` text,
  `file_foto` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_author` varchar(50) DEFAULT NULL,
  `publish` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id_news`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id_news`, `id_news_category`, `news_name`, `news_desc`, `file_foto`, `create_time`, `create_author`, `publish`) VALUES
(1, 1, 'Character Drawing: Basic and Advanced Principles', '<p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit ametMorbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>\r\n', 'featured-01.jpg', '2015-05-09 15:40:46', 'Administrator', 'Y'),
(2, 2, 'How to find long term customers', '<p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit ametMorbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>\r\n', 'featured-02.jpg', '2015-05-07 15:42:12', 'Administrator', 'Y'),
(3, 1, 'Neuroscience for the Beginners: Complete Course', '<p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit ametMorbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>\r\n', 'featured-03.jpg', '2015-05-08 13:44:22', 'Administrator', 'Y'),
(4, 1, 'Neuroscience for the Beginners: Complete Course', '<p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit ametMorbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>\r\n', 'featured-03.jpg', '2015-05-08 13:44:22', 'Administrator', 'Y'),
(5, 1, 'Neuroscience for the Beginners: Complete Course', '<p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit ametMorbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>\r\n', 'featured-03.jpg', '2015-05-08 13:44:22', 'Administrator', 'Y'),
(6, 1, 'Neuroscience for the Beginners: Complete Course', '<p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit ametMorbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>\r\n', 'featured-03.jpg', '2015-05-08 13:44:22', 'Administrator', 'Y'),
(7, 1, 'Neuroscience for the Beginners: Complete Course', '<p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit ametMorbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>\r\n', 'featured-03.jpg', '2015-05-08 13:44:22', 'Administrator', 'Y'),
(8, 2, ' PEMOTONGAN TUNJANGAN KINERJA (DASAR HUKUM PERMENDAGRI NO. 41 TAHUN 2014)', '<p>Lorem Ipsum&nbsp;<span style="line-height: 20.7999992370605px;">Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Ipsum</span></p>\r\n', 'tabel_potongan.png', '2015-07-27 04:47:32', 'Administrator', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_category`
--

CREATE TABLE IF NOT EXISTS `news_category` (
  `id_news_category` int(11) NOT NULL AUTO_INCREMENT,
  `news_category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_news_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `news_category`
--

INSERT INTO `news_category` (`id_news_category`, `news_category`) VALUES
(1, 'Berita'),
(2, 'Pengumuman'),
(3, 'Science');

-- --------------------------------------------------------

--
-- Struktur dari tabel `running_text`
--

CREATE TABLE IF NOT EXISTS `running_text` (
  `id_running_text` int(11) NOT NULL AUTO_INCREMENT,
  `running_text_desc` text COLLATE latin1_general_ci,
  `publish` enum('Y','N') COLLATE latin1_general_ci DEFAULT 'N',
  PRIMARY KEY (`id_running_text`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `running_text`
--

INSERT INTO `running_text` (`id_running_text`, `running_text_desc`, `publish`) VALUES
(1, 'Kami hadir sebagai pembawa harapan baru bagi kualitas layanan  yang lebih baik untuk rakyat Indonesia. ', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sis_pengguna`
--

CREATE TABLE IF NOT EXISTS `sis_pengguna` (
  `nama_pengguna` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kunci_masuk` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email_pengguna` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `telp_pengguna` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `rolename` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`nama_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `sis_pengguna`
--

INSERT INTO `sis_pengguna` (`nama_pengguna`, `kunci_masuk`, `nama_lengkap`, `email_pengguna`, `telp_pengguna`, `id_cabang`, `rolename`) VALUES
('admin', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'Administrator', 'yosep.rohayadi@gmail.com', '081320327642', 1, 'ADMIN'),
('op1234', '3dc971a962b01b9f625dbe827d970e886038d8b5', 'operator', 'yosep.rohayadi@yahoo.com', '081320327642', 1, 'OPERATOR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(255) DEFAULT NULL,
  `slider_desc` text,
  `file_foto` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_author` varchar(50) DEFAULT NULL,
  `publish` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id_slider`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `slider_name`, `slider_desc`, `file_foto`, `create_time`, `create_author`, `publish`) VALUES
(1, 'Good Governance', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum ', 'biropeg-kemendagri.jpg', '2015-05-15 10:20:59', 'Administrator', 'Y'),
(2, 'Pembekalan Database Kepegawaian', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', 'biropeg-database-pegawai.jpg', '2015-05-15 10:21:48', 'Administrator', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bacajawab_forum`
--

CREATE TABLE IF NOT EXISTS `tb_bacajawab_forum` (
  `id_bacajawab` int(11) NOT NULL AUTO_INCREMENT,
  `dibaca` int(11) NOT NULL,
  `diprint` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_bacajawab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cabang`
--

CREATE TABLE IF NOT EXISTS `tb_cabang` (
  `id_cabang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_cabang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tb_cabang`
--

INSERT INTO `tb_cabang` (`id_cabang`, `nama_cabang`) VALUES
(1, 'BIROPEG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_forum_konsultasi`
--

CREATE TABLE IF NOT EXISTS `tb_forum_konsultasi` (
  `id_forum` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `tanggal_kirim` datetime NOT NULL,
  `tanggal_jawab` datetime NOT NULL,
  `baca_jawab` int(11) NOT NULL DEFAULT '0',
  `baca_pertanyaan` int(11) NOT NULL,
  `id_petanya` varchar(40) NOT NULL,
  `id_penjawab` int(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `akses` int(11) DEFAULT '0',
  `status_kaitannya` int(11) NOT NULL DEFAULT '0',
  `status_ditanyakan` int(11) NOT NULL DEFAULT '0',
  `status_print` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_forum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `tb_forum_konsultasi`
--

INSERT INTO `tb_forum_konsultasi` (`id_forum`, `pertanyaan`, `jawaban`, `tanggal_kirim`, `tanggal_jawab`, `baca_jawab`, `baca_pertanyaan`, `id_petanya`, `id_penjawab`, `id_kategori`, `akses`, `status_kaitannya`, `status_ditanyakan`, `status_print`) VALUES
(11, 'Apa Yang di maksud dengan Simpeg ?', '<b>sdsdsd </b>sdsdsdsdsdsd<br>', '2015-06-08 05:03:11', '2015-06-08 10:41:28', 1, 0, '196502041619832001', 0, 1, 0, 0, 0, NULL),
(12, 'Apa yang di maksud dengan Finger Print', '<b>harry</b><br>', '2015-06-08 05:20:13', '2015-06-08 10:54:42', 1, 0, '196502041619832001', 0, 2, 0, 0, 0, NULL),
(14, 'Bagaimana Cara Absen di Ropeg', 'sdfdsdsdsds', '2015-06-09 10:13:39', '2015-06-15 11:05:36', 1, 0, '196502041619832001', 0, 1, 2, 1, 1, NULL),
(15, 'sdsdsd', 'xxxx', '2015-06-15 05:46:59', '2015-06-15 11:05:20', 1, 0, '196502041619832001', 0, 1, 2, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_forum`
--

CREATE TABLE IF NOT EXISTS `tb_kategori_forum` (
  `id_kategori_forum` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori_forum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_kategori_forum`
--

INSERT INTO `tb_kategori_forum` (`id_kategori_forum`, `kategori`) VALUES
(1, 'Simpeg '),
(2, 'Finger Print '),
(3, 'Disiplin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `link` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `parrent` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `class` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `class_icon` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `nama_menu`, `link`, `parrent`, `status`, `class`, `class_icon`) VALUES
(1, 'Home', 'backpage', 0, 0, 'blue long', NULL),
(2, 'Posting Data', NULL, 0, 1, 'blue long', NULL),
(3, 'Multimedia', NULL, 0, 1, 'blue long', NULL),
(4, 'Setting', NULL, 0, 1, 'blue long', NULL),
(5, 'Users', 'buser', 4, 1, 'blue long', NULL),
(6, 'Akses Menu', 'bakses', 4, 1, 'blue long', NULL),
(7, 'Photo & Video Gallery ', 'balbumphotovideo', 3, 1, 'blue long', NULL),
(8, 'Images Library', 'bimages', 3, 1, 'blue long', NULL),
(9, 'Berita', 'bnews', 2, 1, 'blue long', NULL),
(10, 'Publik Menu', 'bpublik', 4, 1, 'blue long', NULL),
(11, 'Image Slider', 'bslider', 2, 1, 'blue long', NULL),
(12, 'Running Text', 'brunning', 2, 1, 'blue long', NULL),
(13, 'Files Management', 'bfiles', 2, 1, 'blue long', NULL),
(14, 'Data Master', NULL, 0, 1, 'blue long', NULL),
(15, 'Kategori File', 'bkatfile', 14, 1, 'blue long', NULL),
(16, 'Kategori Posting', 'bkatpost', 14, 1, 'blue long', NULL),
(17, 'Link Banner', 'bbanner', 2, 1, 'blue long', NULL),
(18, 'Events', 'bkevents', 2, 1, 'blue long', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu_member`
--

CREATE TABLE IF NOT EXISTS `tb_menu_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `parrent` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `description` text COLLATE latin1_general_ci,
  `file` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_entry` datetime DEFAULT NULL,
  `author` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=31 ;

--
-- Dumping data untuk tabel `tb_menu_member`
--

INSERT INTO `tb_menu_member` (`id`, `nama_menu`, `parrent`, `link`, `description`, `file`, `tgl_entry`, `author`) VALUES
(1, 'Beranda', 0, 'homepage', '', '', '2015-05-13 10:28:03', 'admin'),
(2, 'Blog Pegawai', 0, 'biodata', '', '', '2015-06-12 04:35:57', 'admin'),
(3, 'Statistik', 0, '#', '', '', '2015-05-13 10:28:37', 'admin'),
(4, 'Profil', 0, '#', '', '', '2015-05-13 10:28:54', 'admin'),
(5, 'Layanan', 0, '#', '', '', '2015-05-13 10:29:04', 'admin'),
(6, 'Informasi', 0, '#', '', '', '2015-05-13 10:29:18', 'admin'),
(7, 'Galeri', 0, 'gallery', '', '', '2015-05-13 10:29:32', 'admin'),
(8, 'Kontak', 0, '', '', '', '2015-05-13 10:29:56', 'admin'),
(9, 'Struktur Organisasi', 4, '', '<div>&nbsp;</div>\r\n\r\n<div>\r\n<table border="0" cellpadding="3" class="tbbrowse" style="border-spacing: 1px;">\r\n	<tbody>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/197003051993031001.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">MUHAMAD NUR</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>BIRO KEPEGAWAIAN</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA BIRO KEPEGAWAIAN PADA SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/196211051993011001.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">ABDULLAH</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>BAGIAN DISIPLIN DAN KESEJAHTERAAN</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA BAGIAN DISIPLIN DAN KESEJAHTERAAN PADA BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/197407171993111003.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">DIAN ANDY PERMANA</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>BAGIAN PERENCANAAN KEPEGAWAIAN</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA BAGIAN PERENCANAAN KEPEGAWAIAN PADA BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/197909191998021001.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">CHEKA VIRGOWANSYAH</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>BAGIAN PENGEMBANGAN KARIER</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA BAGIAN PENGEMBANGAN KARIER PADA BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/196307111985031001.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">SUHAERI</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>BAGIAN MUTASI</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA BAGIAN MUTASI PADA BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/196906301998031001.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">AHMAD GHOZALI</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>SUBBAG DATA PEGAWAI</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA SUBBAG DATA PEGAWAI PADA BAGIAN PERENCANAAN KEPEGAWAIAN BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/197507221995032001.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">RAHMAWATI</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>SUBBAG PEMINDAHAN, PEMBERHENTIAN DAN PENSIUN</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA SUBBAG PEMINDAHAN, PEMBERHENTIAN DAN PENSIUN PADA BAGIAN MUTASI BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/197108171994011001.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">AGUS SALIM</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>SUBBAG DISIPLIN</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA SUBBAG DISIPLIN PADA BAGIAN DISIPLIN DAN KESEJAHTERAAN BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/img-Y07104648-0001.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">AMALIANI TRIMURTI</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>SUBBAG KESEJAHTERAAN DAN PENGHARGAAN</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA SUBBAG KESEJAHTERAAN DAN PENGHARGAAN PADA BAGIAN DISIPLIN DAN KESEJAHTERAAN BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/197008071992031001.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">SYAFII</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>SUBBAG KENAIKAN PANGKAT</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA SUBBAG KENAIKAN PANGKAT PADA BAGIAN MUTASI BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/197312141995032001.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">SRI WAHYUNI</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>SUBBAG TATA USAHA BIRO</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA SUBBAG TATA USAHA BIRO PADA BAGIAN PERENCANAAN KEPEGAWAIAN BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/197208151993031001.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">BAHRUDIN</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>SUBBAG ADMINISTRASI KADERISASI</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA SUBBAG ADMINISTRASI KADERISASI PADA BAGIAN MUTASI BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/197204111993031001.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">SUJATMOKO</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>SUBBAG FORMASI DAN PERENCANAAN</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA SUBBAG FORMASI DAN PERENCANAAN PADA BAGIAN PERENCANAAN KEPEGAWAIAN BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/198304102001122001.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">FITRI UTAMI SLAGAI</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>SUBBAG PENINGKATAN KAPASITAS PEGAWAI</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA SUBBAG PENINGKATAN KAPASITAS PEGAWAI PADA BAGIAN PENGEMBANGAN KARIER BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/196805061993031001.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">SEDYO BUDI UTOMO</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>SUBBAG JABATAN FUNGSIONAL</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA SUBBAG JABATAN FUNGSIONAL PADA BAGIAN PENGEMBANGAN KARIER BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/198108271999121002.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">AGUS YUDI WICAKSONO</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>SUBBAG JABATAN STRUKTURAL</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA SUBBAG JABATAN STRUKTURAL PADA BAGIAN PENGEMBANGAN KARIER BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td colspan="4">\r\n			<hr /></td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td width="70">&nbsp;</td>\r\n			<td align="center" rowspan="3" width="150"><img alt="Photo" height="120" src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/197902202008121002.jpg" width="100" /></td>\r\n			<td width="100">Nama</td>\r\n			<td>:</td>\r\n			<td style="color: rgb(27, 95, 9);">SYAHRI DEWANTO</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Unit Kerja</td>\r\n			<td>:</td>\r\n			<td>SUBBAG PERATURAN PERUNDANG-UNDANGAN KEPEGAWAIAN</td>\r\n		</tr>\r\n		<tr class="field-caption" style="color: rgb(119, 119, 119); padding-right: 3px; padding-left: 5px; font-weight: bold;" valign="top">\r\n			<td>&nbsp;</td>\r\n			<td>Jabatan</td>\r\n			<td>:</td>\r\n			<td>KEPALA SUBBAG PERATURAN PERUNDANG-UNDANGAN KEPEGAWAIAN PADA BAGIAN DISIPLIN DAN KESEJAHTERAAN BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="color: rgb(0, 0, 0); font-family: verdana, helvetica, sans-serif; font-size: 12.8000001907349px; line-height: normal;">&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '2015-07-23 04:21:43', 'admin'),
(10, 'Berita', 6, 'news/category/1', '', '', '2015-07-24 06:44:25', 'admin'),
(11, 'Agenda', 6, 'events', '', '', '2015-05-13 10:40:13', 'admin'),
(13, 'Pertum Per Jenis Kelamin', 3, 'statistik/index', '<p>Pertum Per Jenis Kelamin</p>\r\n', '', '2015-07-27 05:00:13', 'admin'),
(14, 'Distr. Per Kelompok Umur', 3, 'statistik/kelompok_umur', '', '', '2015-07-27 05:58:09', 'admin'),
(15, 'Distr. Per Pendidikan', 3, 'statistik/pendidikan', '', '', '2015-07-28 04:15:19', 'admin'),
(16, 'Distr. Per Golongan Pangkat', 3, 'statistik/pangkat', '', '', '2015-07-28 04:24:51', 'admin'),
(17, 'Distr. Jabfung Tertentu', 3, 'statistik/jabatan_fungsional', '', '', '2015-07-28 09:04:42', 'admin'),
(18, 'Distr. Jabatan Struktural', 3, 'statistik/struktural', '', '', '2015-07-28 09:58:42', 'admin'),
(19, 'Distr.Unit Kerja', 3, 'statistik/unit_kerja', '', '', '2015-07-28 10:49:46', 'admin'),
(20, 'SOP', 5, '', '', '', '2015-05-19 03:37:56', 'admin'),
(21, 'Peraturan', 5, 'files/category/2', '', '', '2015-07-24 05:23:30', 'admin'),
(22, 'Layanan Kepegawaian', 5, '', '', '', '2015-05-19 03:39:01', 'admin'),
(23, 'Download', 5, 'files/category/1', '', '', '2015-07-24 06:04:30', 'admin'),
(24, 'Aplikasi Layanan', 5, '', '', '', '2015-05-19 03:43:54', 'admin'),
(25, 'Finger Print', 5, 'http://103.245.225.55:8090/', '', '', '2015-07-23 04:52:38', 'admin'),
(26, 'E-Kinerja', 5, '', '', '', '2015-05-19 03:44:44', 'admin'),
(27, 'Pengumuman', 6, 'news/category/2', '', '', '2015-07-24 06:44:49', 'admin'),
(28, 'Suara Anda', 6, '', '', '', '2015-05-19 03:45:30', 'admin'),
(29, 'Daftar Pensiun', 6, '', '', '', '2015-05-19 03:45:40', 'admin'),
(30, 'Forum Konsultasi', 6, 'forumkonsultasi', '', '', '2015-06-12 03:37:27', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu_user`
--

CREATE TABLE IF NOT EXISTS `tb_menu_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `rolename` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=527 ;

--
-- Dumping data untuk tabel `tb_menu_user`
--

INSERT INTO `tb_menu_user` (`id`, `username`, `rolename`, `id_menu`) VALUES
(508, NULL, 'OPERATOR', 2),
(509, NULL, 'OPERATOR', 9),
(510, NULL, 'ADMIN', 2),
(511, NULL, 'ADMIN', 9),
(512, NULL, 'ADMIN', 11),
(513, NULL, 'ADMIN', 12),
(514, NULL, 'ADMIN', 13),
(515, NULL, 'ADMIN', 17),
(516, NULL, 'ADMIN', 18),
(517, NULL, 'ADMIN', 3),
(518, NULL, 'ADMIN', 7),
(519, NULL, 'ADMIN', 8),
(520, NULL, 'ADMIN', 4),
(521, NULL, 'ADMIN', 5),
(522, NULL, 'ADMIN', 6),
(523, NULL, 'ADMIN', 10),
(524, NULL, 'ADMIN', 14),
(525, NULL, 'ADMIN', 15),
(526, NULL, 'ADMIN', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_roles`
--

CREATE TABLE IF NOT EXISTS `tb_roles` (
  `rolename` varchar(50) NOT NULL,
  PRIMARY KEY (`rolename`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_roles`
--

INSERT INTO `tb_roles` (`rolename`) VALUES
('ADMIN'),
('OPERATOR');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
