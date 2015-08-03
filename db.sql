-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.20 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4913
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for ropeg
DROP DATABASE IF EXISTS `ropeg`;
CREATE DATABASE IF NOT EXISTS `ropeg` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ropeg`;


-- Dumping structure for table ropeg.albumphotovideo
DROP TABLE IF EXISTS `albumphotovideo`;
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin2;

-- Dumping data for table ropeg.albumphotovideo: 2 rows
/*!40000 ALTER TABLE `albumphotovideo` DISABLE KEYS */;
INSERT INTO `albumphotovideo` (`id_albumphotovideo`, `albumphotovideo_name`, `albumphotovideo_desc`, `create_time`, `update_time`, `create_author`, `publish`, `sort_number`) VALUES
	(1, 'Orientasi Kerja CPNSP Tahun 2014', 'Orientasi Kerja CPNSP Tahun 2014', '2015-05-15 10:23:22', NULL, '0', 'Y', 1),
	(2, 'Rapat Penyusunan pedoman Penilaian Kinerja Di Lingkungan Kemendagri 2014', 'Rapat Penyusunan pedoman Penilaian Kinerja Di Lingkungan Kemendagri 2014', '2015-05-15 10:23:47', NULL, '0', 'Y', 2);
/*!40000 ALTER TABLE `albumphotovideo` ENABLE KEYS */;


-- Dumping structure for table ropeg.albumphotovideo_gallery
DROP TABLE IF EXISTS `albumphotovideo_gallery`;
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin2;

-- Dumping data for table ropeg.albumphotovideo_gallery: 6 rows
/*!40000 ALTER TABLE `albumphotovideo_gallery` DISABLE KEYS */;
INSERT INTO `albumphotovideo_gallery` (`id_albumphotovideo_gallery`, `id_albumphotovideo`, `albumphotovideo_gallery_name`, `albumphotovideo_gallery_desc`, `file_foto`, `create_time`, `create_author`, `publish`, `sort_number`, `type`, `file_foto_youtube`, `link_youtube`) VALUES
	(1, 1, 'Peserta', 'Peserta', 'cpns3.jpeg', '2015-05-15 10:26:08', 'Administrator', 'Y', 1, 0, NULL, NULL),
	(2, 1, 'Peserta', '', 'cpns2.jpeg', '2015-05-15 10:26:17', 'Administrator', 'Y', 2, 0, NULL, NULL),
	(3, 1, 'Peserta', '-', 'cpns1.jpeg', '2015-05-15 10:26:32', 'Administrator', 'Y', 3, 0, NULL, NULL),
	(4, 2, 'Pembukaan', '', '14000003.jpeg', '2015-05-15 10:27:09', 'Administrator', 'Y', 1, 0, NULL, NULL),
	(5, 2, 'Peserta', '', '14000007.jpeg', '2015-05-15 10:27:21', 'Administrator', 'Y', 2, 0, NULL, NULL),
	(6, 1, 'Test Video', 'test desc', NULL, '2015-05-18 06:36:57', 'Administrator', 'Y', 0, 1, '', 'https://www.youtube.com/watch?v=HcFLJkJJzV8');
/*!40000 ALTER TABLE `albumphotovideo_gallery` ENABLE KEYS */;


-- Dumping structure for table ropeg.banner
DROP TABLE IF EXISTS `banner`;
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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin2;

-- Dumping data for table ropeg.banner: 6 rows
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` (`id_banner`, `banner_name`, `banner_link`, `banner_desc`, `file_foto`, `create_time`, `create_author`, `publish`) VALUES
	(11, 'NUS', '#', '<p>test</p>\r\n', 'nus.png', '2015-05-06 11:15:54', 'Administrator', 'Y'),
	(12, 'SIM University', '#', 'SIM University', 'client-01.jpg', '2015-05-07 16:50:52', 'Administrator', 'Y'),
	(13, 'Media Corp', '#', 'Media Corp', 'cilent-02.jpg', '2015-05-07 16:51:17', 'Administrator', 'Y'),
	(14, 'Nangyang', '#', 'Nangyang', 'nanyang.png', '2015-05-07 16:52:31', 'Administrator', 'Y'),
	(15, 'The Outward ', '#', 'The Outward ', 'client-04.jpg', '2015-05-07 16:53:20', 'Administrator', 'Y'),
	(16, 'Binus', '#', 'Binus', 'binus.jpg', '2015-05-07 16:54:11', 'Administrator', 'Y');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;


-- Dumping structure for table ropeg.images
DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_author` varchar(50) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `file_foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ropeg.images: ~0 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `create_author`, `create_time`, `file_foto`) VALUES
	(1, 'Administrator', '2015-05-18 04:25:04', 'the-warning.jpg');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;


-- Dumping structure for table ropeg.news
DROP TABLE IF EXISTS `news`;
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin2;

-- Dumping data for table ropeg.news: 7 rows
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id_news`, `id_news_category`, `news_name`, `news_desc`, `file_foto`, `create_time`, `create_author`, `publish`) VALUES
	(1, 1, 'Character Drawing: Basic and Advanced Principles', '<p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit ametMorbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>\r\n', 'featured-01.jpg', '2015-05-09 15:40:46', 'Administrator', 'Y'),
	(2, 2, 'How to find long term customers', '<p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit ametMorbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>\r\n', 'featured-02.jpg', '2015-05-07 15:42:12', 'Administrator', 'Y'),
	(3, 3, 'Neuroscience for the Beginners: Complete Course', '<p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit ametMorbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>\r\n', 'featured-03.jpg', '2015-05-08 13:44:22', 'Administrator', 'Y'),
	(4, 3, 'Neuroscience for the Beginners: Complete Course', '<p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit ametMorbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>\r\n', 'featured-03.jpg', '2015-05-08 13:44:22', 'Administrator', 'Y'),
	(5, 3, 'Neuroscience for the Beginners: Complete Course', '<p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit ametMorbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>\r\n', 'featured-03.jpg', '2015-05-08 13:44:22', 'Administrator', 'Y'),
	(6, 3, 'Neuroscience for the Beginners: Complete Course', '<p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit ametMorbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>\r\n', 'featured-03.jpg', '2015-05-08 13:44:22', 'Administrator', 'Y'),
	(7, 3, 'Neuroscience for the Beginners: Complete Course', '<p>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit ametMorbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor. Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet</p>\r\n', 'featured-03.jpg', '2015-05-08 13:44:22', 'Administrator', 'Y');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Dumping structure for table ropeg.news_category
DROP TABLE IF EXISTS `news_category`;
CREATE TABLE IF NOT EXISTS `news_category` (
  `id_news_category` int(11) NOT NULL AUTO_INCREMENT,
  `news_category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_news_category`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ropeg.news_category: ~3 rows (approximately)
/*!40000 ALTER TABLE `news_category` DISABLE KEYS */;
INSERT INTO `news_category` (`id_news_category`, `news_category`) VALUES
	(1, 'Art and Design'),
	(2, 'Marketing'),
	(3, 'Science'),
	(4, 'tes');
/*!40000 ALTER TABLE `news_category` ENABLE KEYS */;


-- Dumping structure for table ropeg.running_text
DROP TABLE IF EXISTS `running_text`;
CREATE TABLE IF NOT EXISTS `running_text` (
  `id_running_text` int(11) NOT NULL AUTO_INCREMENT,
  `running_text_desc` text COLLATE latin1_general_ci,
  `publish` enum('Y','N') COLLATE latin1_general_ci DEFAULT 'N',
  PRIMARY KEY (`id_running_text`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table ropeg.running_text: ~0 rows (approximately)
/*!40000 ALTER TABLE `running_text` DISABLE KEYS */;
INSERT INTO `running_text` (`id_running_text`, `running_text_desc`, `publish`) VALUES
	(1, 'Kami hadir sebagai pembawa harapan baru bagi kualitas layanan  yang lebih baik untuk rakyat Indonesia. ', 'Y');
/*!40000 ALTER TABLE `running_text` ENABLE KEYS */;


-- Dumping structure for table ropeg.sis_pengguna
DROP TABLE IF EXISTS `sis_pengguna`;
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

-- Dumping data for table ropeg.sis_pengguna: ~2 rows (approximately)
/*!40000 ALTER TABLE `sis_pengguna` DISABLE KEYS */;
INSERT INTO `sis_pengguna` (`nama_pengguna`, `kunci_masuk`, `nama_lengkap`, `email_pengguna`, `telp_pengguna`, `id_cabang`, `rolename`) VALUES
	('admin', '6f9b0a55df8ac28564cb9f63a10be8af6ab3f7c2', 'Administrator', 'yosep.rohayadi@gmail.com', '081320327642', 1, 'ADMIN'),
	('op1234', '3dc971a962b01b9f625dbe827d970e886038d8b5', 'operator', 'yosep.rohayadi@yahoo.com', '081320327642', 1, 'OPERATOR');
/*!40000 ALTER TABLE `sis_pengguna` ENABLE KEYS */;


-- Dumping structure for table ropeg.slider
DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(255) DEFAULT NULL,
  `slider_desc` text,
  `file_foto` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_author` varchar(50) DEFAULT NULL,
  `publish` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id_slider`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin2;

-- Dumping data for table ropeg.slider: 2 rows
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` (`id_slider`, `slider_name`, `slider_desc`, `file_foto`, `create_time`, `create_author`, `publish`) VALUES
	(1, 'Good Governance', '-', 'biropeg-kemendagri.jpg', '2015-05-15 10:20:59', 'Administrator', 'Y'),
	(2, 'Pembekalan Database Kepegawaian', '-', 'biropeg-database-pegawai.jpg', '2015-05-15 10:21:48', 'Administrator', 'Y');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;


-- Dumping structure for table ropeg.tb_cabang
DROP TABLE IF EXISTS `tb_cabang`;
CREATE TABLE IF NOT EXISTS `tb_cabang` (
  `id_cabang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_cabang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ropeg.tb_cabang: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_cabang` DISABLE KEYS */;
INSERT INTO `tb_cabang` (`id_cabang`, `nama_cabang`) VALUES
	(1, 'BIROPEG');
/*!40000 ALTER TABLE `tb_cabang` ENABLE KEYS */;


-- Dumping structure for table ropeg.tb_menu
DROP TABLE IF EXISTS `tb_menu`;
CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `link` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `parrent` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `class` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `class_icon` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table ropeg.tb_menu: ~14 rows (approximately)
/*!40000 ALTER TABLE `tb_menu` DISABLE KEYS */;
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
	(15, 'Kategori File', NULL, 14, 1, 'blue long', NULL),
	(16, 'Kategori Posting', NULL, 14, 1, 'blue long', NULL),
	(17, 'Link Banner', 'bbanner', 2, 1, 'blue long', NULL);
/*!40000 ALTER TABLE `tb_menu` ENABLE KEYS */;


-- Dumping structure for table ropeg.tb_menu_member
DROP TABLE IF EXISTS `tb_menu_member`;
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table ropeg.tb_menu_member: ~27 rows (approximately)
/*!40000 ALTER TABLE `tb_menu_member` DISABLE KEYS */;
INSERT INTO `tb_menu_member` (`id`, `nama_menu`, `parrent`, `link`, `description`, `file`, `tgl_entry`, `author`) VALUES
	(1, 'Beranda', 0, 'homepage', '', '', '2015-05-13 10:28:03', 'admin'),
	(2, 'Biodata', 0, '#', '', '', '2015-05-13 10:28:16', 'admin'),
	(3, 'Statistik', 0, '#', '', '', '2015-05-13 10:28:37', 'admin'),
	(4, 'Profil', 0, '#', '', '', '2015-05-13 10:28:54', 'admin'),
	(5, 'Layanan', 0, '#', '', '', '2015-05-13 10:29:04', 'admin'),
	(6, 'Informasi', 0, '#', '', '', '2015-05-13 10:29:18', 'admin'),
	(7, 'Galeri', 0, 'gallery', '', '', '2015-05-13 10:29:32', 'admin'),
	(8, 'Kontak', 0, '', '', '', '2015-05-13 10:29:56', 'admin'),
	(9, 'Struktur Organisasi', 4, 'http://www.google.com', '', '', '2015-05-15 06:02:00', 'admin'),
	(10, 'Berita', 6, 'news', '', '', '2015-05-13 10:40:00', 'admin'),
	(11, 'Agenda', 6, 'events', '', '', '2015-05-13 10:40:13', 'admin'),
	(13, 'Pertum Per Jenis Kelamin', 3, '', '<p>Pertum Per Jenis Kelamin</p>\r\n', '', '2015-05-19 03:23:29', 'admin'),
	(14, 'Distr. Per Kelompok Umur', 3, '', '', '', '2015-05-19 03:23:55', 'admin'),
	(15, 'Distr. Per Pendidikan', 3, '', '', '', '2015-05-19 03:24:25', 'admin'),
	(16, 'Distr. Per Golongan Pangkat', 3, '', '', '', '2015-05-19 03:24:41', 'admin'),
	(17, 'Distr. Jabfung Tertentu', 3, '', '', '', '2015-05-19 03:36:12', 'admin'),
	(18, 'Distr. Jabatan Struktural', 3, '', '', '', '2015-05-19 03:37:04', 'admin'),
	(19, 'Distr.Unit Kerja', 3, '', '', '', '2015-05-19 03:37:23', 'admin'),
	(20, 'SOP', 5, '', '', '', '2015-05-19 03:37:56', 'admin'),
	(21, 'Peraturan', 5, '', '', '', '2015-05-19 03:38:41', 'admin'),
	(22, 'Layanan Kepegawaian', 5, '', '', '', '2015-05-19 03:39:01', 'admin'),
	(23, 'Download', 5, '', '', '', '2015-05-19 03:39:21', 'admin'),
	(24, 'Aplikasi Layanan', 5, '', '', '', '2015-05-19 03:43:54', 'admin'),
	(25, 'Finger Print', 5, '', '', '', '2015-05-19 03:44:19', 'admin'),
	(26, 'E-Kinerja', 5, '', '', '', '2015-05-19 03:44:44', 'admin'),
	(27, 'Pengumuman', 6, '', '', '', '2015-05-19 03:45:11', 'admin'),
	(28, 'Suara Anda', 6, '', '', '', '2015-05-19 03:45:30', 'admin'),
	(29, 'Daftar Pensiun', 6, '', '', '', '2015-05-19 03:45:40', 'admin');
/*!40000 ALTER TABLE `tb_menu_member` ENABLE KEYS */;


-- Dumping structure for table ropeg.tb_menu_user
DROP TABLE IF EXISTS `tb_menu_user`;
CREATE TABLE IF NOT EXISTS `tb_menu_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `rolename` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=510 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table ropeg.tb_menu_user: ~17 rows (approximately)
/*!40000 ALTER TABLE `tb_menu_user` DISABLE KEYS */;
INSERT INTO `tb_menu_user` (`id`, `username`, `rolename`, `id_menu`) VALUES
	(491, NULL, 'ADMIN', 1),
	(492, NULL, 'ADMIN', 2),
	(493, NULL, 'ADMIN', 9),
	(494, NULL, 'ADMIN', 11),
	(495, NULL, 'ADMIN', 12),
	(496, NULL, 'ADMIN', 13),
	(497, NULL, 'ADMIN', 17),
	(498, NULL, 'ADMIN', 3),
	(499, NULL, 'ADMIN', 7),
	(500, NULL, 'ADMIN', 8),
	(501, NULL, 'ADMIN', 4),
	(502, NULL, 'ADMIN', 5),
	(503, NULL, 'ADMIN', 6),
	(504, NULL, 'ADMIN', 10),
	(505, NULL, 'ADMIN', 14),
	(506, NULL, 'ADMIN', 15),
	(507, NULL, 'ADMIN', 16),
	(508, NULL, 'OPERATOR', 2),
	(509, NULL, 'OPERATOR', 9);
/*!40000 ALTER TABLE `tb_menu_user` ENABLE KEYS */;


-- Dumping structure for table ropeg.tb_roles
DROP TABLE IF EXISTS `tb_roles`;
CREATE TABLE IF NOT EXISTS `tb_roles` (
  `rolename` varchar(50) NOT NULL,
  PRIMARY KEY (`rolename`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ropeg.tb_roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_roles` DISABLE KEYS */;
INSERT INTO `tb_roles` (`rolename`) VALUES
	('ADMIN'),
	('OPERATOR');
/*!40000 ALTER TABLE `tb_roles` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
