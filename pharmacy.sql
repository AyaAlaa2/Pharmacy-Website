-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 10:46 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password1`) VALUES
(1 , 'آية الشيخ علي', 'aya', '25f9e794323b453885f5181f1b624d0b'),
(2 , 'مي عكاشة', 'mai', '25f9e794323b453885f5181f1b624d0b'),
(3 , 'ربا شحادة', 'ruba ', '25f9e794323b453885f5181f1b624d0b'),
(4 , 'سجد عواجة', 'sajd ', '25f9e794323b453885f5181f1b624d0b'),
(5 , 'فرح أبو طه', 'farah ', '25f9e794323b453885f5181f1b624d0b'),
(6 , 'إخلاص حمد', 'ekhlas ', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adv`
--

CREATE TABLE `tbl_adv` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `featured` varchar(10) NOT NULL,
  `id_pharm_admin` varchar(10) NOT NULL,
  `active` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_adv`
--

INSERT INTO `tbl_adv` (`id`, `image_name`, `description`, `featured`, `id_pharm_admin`, `active`) VALUES
(6, 'advph_773.png', '     اعلان شهر 2', 'نعم', '220170000', 'نعم'),
(7, 'advph_341.png', ' اعلان تجميلي شهر 11', 'نعم', '220170000', 'نعم'),
(9, 'advph_71.PNG', '  go', 'نعم', '220170000', 'لا'),
(11, '', '  dont know', 'لا', '220170000', 'لا'),
(12, 'advph_312.jpg', '      احدث انواع المنتجات لعام 2022', 'لا', '220170000', 'لا'),
(13, 'advph_690.jpg', ' ترقبوا .. منتجات تجميلية عرض خاص 2022', 'نعم', '220170001', 'نعم'),
(14, 'advph_151.png', '   الطب البديل2', 'نعم', '220170000', 'نعم'),
(15, 'advph_440.jpg', ' منتجات العناية بالشعر بعد ', 'نعم', '220170000', 'نعم'),
(16, 'advph_732.jpg', ' جديد العناية بالشعر و البشرة', 'نعم', '220170000', 'نعم');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medi`
--

CREATE TABLE `tbl_medi` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name_en` text NOT NULL,
  `full_name_ar` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `available` varchar(20) NOT NULL,
  `id_pharm_admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_medi`
--

INSERT INTO `tbl_medi` (`id`, `full_name_en`, `full_name_ar`, `price`, `description`, `available`, `id_pharm_admin`) VALUES
(1, '  Aspirin  ', '  الأسبرين ', '17', '  https://www.webteb.com/drug/%D8%A7%D9%84%D8%A7%D8%B3%D8%A8%D8%B1%D9%8A%D9%86  ', 'نعم', '220170000'),
(2, 'Omeprazole', 'أوميبرازول', '50', 'https://www.webteb.com/drug/%D8%A7%D9%88%D9%85%D9%8A%D8%A8%D8%B1%D8%A7%D8%B2%D9%88%D9%84', 'لا', '220170000'),
(4, ' a ', ' الاننق ', '11', ' https://www.webteb.com/drug/%D8%A7%D9%88%D9%85%D9%8A%D8%A8%D8%B1%D8%A7%D8%B2%D9%88%D9%84 ', 'نعم', '220170000'),
(5, 'amantadine', 'امنتادين', '2', 'https://www.webteb.com/drug/الامانتادين', 'نعم', '220170000'),
(6, 'cetrizine', 'سيتريزين', '7', 'https://altibbi.com/الادوية/سترزين-علمي', 'لا', '220170000'),
(7, 'fexofenadine', 'فيكسوفينادين', '50', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiTvf7k3of3AhWQ_rsIHcyqBZsQFnoECAQQAQ&url=https%3A%2F%2Faltibbi.com%2F%25D8%25A7%25D9%2584%25D8%25A7%25D8%25AF%25D9%2588%25D9%258A%25D8%25A9%2F%25D9%2581%25D9%258A%25D9%2583%25D8%25B3%25D9%2588%25D9%2581%25D9%2586%25D8%25A7%25D8%25AF%25D9%258A%25D9%2586-%25D8%25B9%25D9%2584%25D9%2585%25D9%258A&usg=AOvVaw2OXoDrgGRBlQnm-uPPJH5V', 'لا', '220170000'),
(8, 'Levocetirizine', 'ليفوسيتريزين', '33', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwik9Mid34f3AhWegv0HHeScDpsQFnoECAkQAQ&url=https%3A%2F%2Fwww.almrsal.com%2Fpost%2F178202&usg=AOvVaw1c01eNdUNrmTD33sduH7Ow', 'لا', '220170000'),
(9, 'Oxymetazoline', 'بخاخ أوكسي ميتازولين', '90', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiBqtOM7of3AhVI7rsIHfvtCT8QFnoECAgQAQ&url=https%3A%2F%2Fe3arabi.com%2F%25D8%25A7%25D9%2584%25D8%25B5%25D9%258A%25D8%25AF%25D9%2584%25D8%25A9%2F%25D8%25AF%25D9%2588%25D8%25A7%25D8%25A1-%25D8%25A3%25D9%2588%25D9%2583%25D8%25B3%25D9%258A-%25D9%2585%25D9%258A%25D8%25AA%25D8%25A7%25D8%25B2%25D9%2588%25D9%2584%25D9%258A%25D9%2586-oxymetazoline%2F&usg=AOvVaw3DBL2O4ZS9O3My1InH31qd', 'نعم', '220170000'),
(10, 'congestal', 'كونجستال', '33', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjAnc_D7If3AhUIgv0HHX0pCfYQFnoECAMQAQ&url=https%3A%2F%2Faltibbi.com%2F%25D8%25A7%25D9%2584%25D8%25A7%25D8%25AF%25D9%2588%25D9%258A%25D8%25A9%2F%25D9%2583%25D9%2588%25D9%2586%25D8%25AC%25D8%25B3%25D8%25AA%25D8%25A7%25D9%2584&usg=AOvVaw1Ek4q7a7Dc95SYuQJ0QgrB', 'نعم', '220170000'),
(11, 'Flurest N', 'فلوريست إن', '7', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&ved=2ahUKEwi_17eL7If3AhXzh_0HHcv5Ap4QFnoECAQQAQ&url=https%3A%2F%2Fwww.al-agzakhana.com%2F3399%2Fflurest-n-tablets-cold-flu.html&usg=AOvVaw0vKNxUop-kSA9phLikr3Bb', 'لا', '220170000'),
(12, 'Oxymetazoline', 'بخاخ أوكسي ميتازولين', '92', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiBqtOM7of3AhVI7rsIHfvtCT8QFnoECBIQAQ&url=https%3A%2F%2Ffunjaan.com%2F%25D8%25A3%25D9%2588%25D9%2583%25D8%25B3%25D9%258A-%25D9%2585%25D9%258A%25D8%25AA%25D8%25A7%25D8%25B2%25D9%2588%25D9%2584%25D9%258A%25D9%2586-%25D8%25A8%25D8%25AE%25D8%25A7%25D8%25AE-oxymetazoline%2F&usg=AOvVaw1wB01BrW_sj7oZ5yvne7Gr', 'نعم', '220170001'),
(13, 'Trazodone', 'ترازودون', '50', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjQubmH6of3AhVdiv0HHTY3A8IQFnoECDMQAQ&url=https%3A%2F%2Faltibbi.com%2F%25D8%25A7%25D9%2584%25D8%25A7%25D8%25AF%25D9%2588%25D9%258A%25D8%25A9%2F%25D8%25AA%25D8%25B1%25D8%25A7%25D8%25B2%25D9%2588%25D8%25AF%25D9%2588%25D9%2586-%25D8%25B9%25D9%2584%25D9%2585%25D9%258A&usg=AOvVaw24Zza4GGGzsv39GvodFOJ-', 'نعم', '220170001'),
(14, 'Modafinil', 'مودافينيل', '37', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjUiZC66of3AhVx57sIHb9wDEoQFnoECAoQAQ&url=https%3A%2F%2Fmqaall.com%2Findications-modafinil%2F&usg=AOvVaw1JglcjxFdpikX-vQ4DkERk', 'نعم', '220170001'),
(15, 'Sertraline', 'سيترالين', '32', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjCtf-d6Yf3AhVYlf0HHS8hATcQFnoECAcQAQ&url=https%3A%2F%2Fwww.hopeeg.com%2Fblog%2Fshow%2Fsertraline&usg=AOvVaw0SXswhWSr7z-WmdHolmkga', 'لا', '220170001'),
(16, 'Captopril', 'كابتوبريل', '11', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjXyffw5of3AhUoiv0HHV7wDnIQFnoECDcQAQ&url=https%3A%2F%2Fwww.enabbaladi.net%2Farchives%2F198421&usg=AOvVaw1QMgvpFcr46C7JEu8-b1ah', 'لا', '220170001'),
(17, 'ACE inhibitor', 'مثبط الإنزيم المحول للأنجيوتنسين', '100', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwj3xJn25Yf3AhUKiv0HHSCZCz8QFnoECAoQAQ&url=https%3A%2F%2Fwww.mayoclinic.org%2Far%2Fdiseases-conditions%2Fhigh-blood-pressure%2Fin-depth%2Face-inhibitors%2Fart-20047480&usg=AOvVaw1ZsiseHQlXdIN-i9XSLmwR', 'نعم', '220170001'),
(18, ' Aspirin', 'أسبرين', '17', 'https://www.webteb.com/drug/%D8%A7%D9%84%D8%A7%D8%B3%D8%A8%D8%B1%D9%8A%D9%86', 'نعم', '220170001'),
(19, 'congestal', 'الكونجستال', '33', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&ved=2ahUKEwjbgdW064f3AhUkhv0HHU6SCkwQFnoECA8QAQ&url=https%3A%2F%2Fwww.muhtwa.com%2F117648%2F%25D9%2583%25D9%2588%25D9%2586%25D8%25AC%25D8%25B3%25D8%25AA%25D8%25A7%25D9%2584-%25D9%2584%25D8%25B9%25D9%2584%25D8%25A7%25D8%25AC-%25D8%25A7%25D9%2584%25D8%25A8%25D8%25B1%25D8%25AF%2F&usg=AOvVaw0TGEEA10N-Y0SDE6kL1gMh', 'نعم', '220170001'),
(20, ' Aspirin   ', 'الأسبرين', '18', 'https://www.webteb.com/drug/%D8%A7%D9%84%D8%A7%D8%B3%D8%A8%D8%B1%D9%8A%D9%86', 'نعم', '220172006'),
(21, 'amantadine ', 'امنتادين', '2', 'https://www.webteb.com/drug/الامانتادين', 'لا', '220172006'),
(22, 'cetrizine ', 'سيتريزين', '7', 'https://altibbi.com/الادوية/سترزين-علمي', 'نعم', '220172006'),
(23, 'fexofenadine', 'فيكسوفينادين', '50', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiTvf7k3of3AhWQ_rsIHcyqBZsQFnoECAQQAQ&url=https%3A%2F%2Faltibbi.com%2F%25D8%25A7%25D9%2584%25D8%25A7%25D8%25AF%25D9%2588%25D9%258A%25D8%25A9%2F%25D9%2581%25D9%258A%25D9%2583%25D8%25B3%25D9%2588%25D9%2581%25D9%2586%25D8%25A7%25D8%25AF%25D9%258A%25D9%2586-%25D8%25B9%25D9%2584%25D9%2585%25D9%258A&usg=AOvVaw2OXoDrgGRBlQnm-uPPJH5V', 'نعم', '220172006'),
(24, 'Oxymetazoline ', ' بخاخ أوكسي ميتازولين', '90', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiBqtOM7of3AhVI7rsIHfvtCT8QFnoECBIQAQ&url=https%3A%2F%2Ffunjaan.com%2F%25D8%25A3%25D9%2588%25D9%2583%25D8%25B3%25D9%258A-%25D9%2585%25D9%258A%25D8%25AA%25D8%25A7%25D8%25B2%25D9%2588%25D9%2584%25D9%258A%25D9%2586-%25D8%25A8%25D8%25AE%25D8%25A7%25D8%25AE-oxymetazoline%2F&usg=AOvVaw1wB01BrW_sj7oZ5yvne7Gr', 'نعم', '220172006'),
(25, '  Aspirin ', 'الأسبرين', '17', 'https://www.webteb.com/drug/%D8%A7%D9%84%D8%A7%D8%B3%D8%A8%D8%B1%D9%8A%D9%86', 'نعم', '220170002'),
(26, 'Omeprazole ', 'أوميبرازول', '50', 'https://www.webteb.com/drug/%D8%A7%D9%88%D9%85%D9%8A%D8%A8%D8%B1%D8%A7%D8%B2%D9%88%D9%84', 'نعم', '220170002'),
(27, 'amantadine ', 'امنتادين', '2', 'https://www.webteb.com/drug/الامانتادين', 'نعم', '220170002'),
(28, 'cetrizine', 'سيتريزين', '7', 'https://altibbi.com/الادوية/سترزين-علمي', 'نعم', '220170002'),
(29, 'congestal', 'كونجستال', '33', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjAnc_D7If3AhUIgv0HHX0pCfYQFnoECEAQAQ&url=https%3A%2F%2F3elagi.com%2Fblog%2Fdrug%2Fcongestal%2F&usg=AOvVaw3WowHiE0SEXyn2kbyy0BA2', 'نعم', '220170002'),
(30, 'Oxymetazoline', 'بخاخ أوكسي ميتازولين', '95', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiBqtOM7of3AhVI7rsIHfvtCT8QFnoECBIQAQ&url=https%3A%2F%2Ffunjaan.com%2F%25D8%25A3%25D9%2588%25D9%2583%25D8%25B3%25D9%258A-%25D9%2585%25D9%258A%25D8%25AA%25D8%25A7%25D8%25B2%25D9%2588%25D9%2584%25D9%258A%25D9%2586-%25D8%25A8%25D8%25AE%25D8%25A7%25D8%25AE-oxymetazoline%2F&usg=AOvVaw1wB01BrW_sj7oZ5yvne7Gr', 'نعم', '220170002'),
(31, 'Levocetirizine', 'ليفوسيتريزين', '33', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwik9Mid34f3AhWegv0HHeScDpsQFnoECAkQAQ&url=https%3A%2F%2Fwww.almrsal.com%2Fpost%2F178202&usg=AOvVaw1c01eNdUNrmTD33sduH7Ow', 'لا', '220170002'),
(32, 'Flurest N', 'فلوريست إن', '7', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&ved=2ahUKEwi_17eL7If3AhXzh_0HHcv5Ap4QFnoECAQQAQ&url=https%3A%2F%2Fwww.al-agzakhana.com%2F3399%2Fflurest-n-tablets-cold-flu.html&usg=AOvVaw0vKNxUop-kSA9phLikr3Bb', 'نعم', '220170002'),
(33, 'Modafinil', 'مودافينيل', '36', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjUiZC66of3AhVx57sIHb9wDEoQFnoECAoQAQ&url=https%3A%2F%2Fmqaall.com%2Findications-modafinil%2F&usg=AOvVaw1JglcjxFdpikX-vQ4DkERk', 'نعم', '220170002'),
(34, 'Adol', 'أدول', '16', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjLos7q4of3AhVj_7sIHbZ-DH4QFnoECAkQAQ&url=https%3A%2F%2Faltibbi.com%2F%25D8%25A7%25D9%2584%25D8%25A7%25D8%25AF%25D9%2588%25D9%258A%25D8%25A9%2F%25D8%25A7%25D8%25AF%25D9%2588%25D9%2584-2&usg=AOvVaw3kB7rQhNNA7580BxO59xan', 'نعم', '220170002'),
(35, 'INFECTOFLAM', 'انفكتوفلام', '4', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiUpIPj54f3AhXO_7sIHc-CBAYQFnoECA4QAQ&url=https%3A%2F%2Fwww.aic-tech.net%2F%25D8%25A7%25D9%2586%25D9%2581%25D9%258A%25D9%2583%25D8%25AA%25D9%2588%25D9%2581%25D9%2584%25D8%25A7%25D9%2585%2F&usg=AOvVaw0iYuEAAMfU-BkjchGtbiE3', 'نعم', '220170002'),
(36, 'OLOPAT', 'اولوبات', '14', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwifn4656If3AhVt8LsIHSt4CxIQFnoECAgQAQ&url=https%3A%2F%2Faltibbi.com%2F%25D8%25A7%25D9%2584%25D8%25A7%25D8%25AF%25D9%2588%25D9%258A%25D8%25A9%2F%25D8%25A7%25D9%2588%25D9%2584%25D9%2588%25D8%25A8%25D8%25A7%25D8%25AA&usg=AOvVaw0Ws8qByezeXS4fbR9bJzpL', 'لا', '220170002'),
(37, 'Desloratadine', 'ديسلوراتادين', '4', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjHoNGJ4If3AhVL_rsIHdu8A4cQFnoECAMQAQ&url=https%3A%2F%2Fwww.webteb.com%2Fdrug%2F%25D8%25AF%25D9%258A%25D8%25B3%25D9%2584%25D9%2588%25D8%25B1%25D8%25A7%25D8%25AA%25D8%25A7%25D8%25AF%25D9%258A%25D9%2586&usg=AOvVaw3jItX9QiEMQhTqFUQbDhxX', 'نعم', '220170002'),
(38, 'Trazodone', 'ترازودون', '50', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjQubmH6of3AhVdiv0HHTY3A8IQFnoECDMQAQ&url=https%3A%2F%2Faltibbi.com%2F%25D8%25A7%25D9%2584%25D8%25A7%25D8%25AF%25D9%2588%25D9%258A%25D8%25A9%2F%25D8%25AA%25D8%25B1%25D8%25A7%25D8%25B2%25D9%2588%25D8%25AF%25D9%2588%25D9%2586-%25D8%25B9%25D9%2584%25D9%2585%25D9%258A&usg=AOvVaw24Zza4GGGzsv39GvodFOJ-', 'لا', '220170002'),
(39, 'Citalopram', 'سيتالوبرام', '30', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwijqfTb6If3AhWS_rsIHfdUDzUQFnoECAgQAQ&url=https%3A%2F%2Fwww.webteb.com%2Fdrug%2F%25D8%25B3%25D9%258A%25D8%25AA%25D8%25A7%25D9%2584%25D9%2588%25D8%25A8%25D8%25B1%25D8%25A7%25D9%2585&usg=AOvVaw1cdAVEIBmkt4OHEfn81p8E\\r\\n', 'نعم', '220170002'),
(40, 'Paroxetine', 'باروكستين', '34', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwi07PPj6Yf3AhVw8bsIHU_dABcQFnoECAkQAw&url=https%3A%2F%2Fwww.webteb.com%2Fdrug%2F%25D8%25A8%25D8%25A7%25D8%25B1%25D9%2588%25D9%2583%25D8%25B3%25D9%258A%25D8%25AA%25D9%258A%25D9%2586%23%3A~%3Atext%3D%25D8%25A8%25D8%25A7%25D8%25B1%25D9%2588%25D9%2583%25D8%25B3%25D8%25AA%25D9%258A%25D9%2586%2520(Paroxetine)%2520%25D9%2587%25D9%2588%2520%25D8%25AF%25D9%2588%25D8%25A7%25D8%25A1%2520%25D9%2585%25D8%25B6%25D8%25A7%25D8%25AF%2C%25D8%25A7%25D9%2584%25D8%25AD%25D9%2581%25D8%25A7%25D8%25B8%2520%25D8%25B9%25D9%2584%25D9%2589%2520%25D8%25A7%25D9%2584%25D8%25AA%25D9%2588%25D8%25A7%25D8%25B2%25D9%2586%2520%25D8%25A7%25D9%2584%25D8%25B9%25D9%2582%25D9%2584%25D9%258A%2520%25D9%2588%25D8%25A7%25D9%2584%25D9%2586%25D9%2581%25D8%25B3%25D9%258A.&usg=AOvVaw15lnx9lFj3XDyqsDq8GIh0', 'لا', '220170002'),
(41, 'Comtrex', 'كومتريكس', '7', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiMmMaF64f3AhUngf0HHUQxDw8QFnoECAQQAQ&url=https%3A%2F%2Faltibbi.com%2F%25D8%25A7%25D9%2584%25D8%25A7%25D8%25AF%25D9%2588%25D9%258A%25D8%25A9%2F%25D9%2583%25D9%2588%25D9%2585%25D8%25AA%25D8%25B1%25D9%2583%25D8%25B3&usg=AOvVaw3olY3m0np3KGY0R91dd9oH', 'نعم', '220170002'),
(42, 'Rifaximin', 'ريفاكسيمين', '10', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiko6bf4If3AhW1gP0HHUG0B0cQFnoECAYQAQ&url=https%3A%2F%2Faltibbi.com%2F%25D8%25A7%25D9%2584%25D8%25A7%25D8%25AF%25D9%2588%25D9%258A%25D8%25A9%2F%25D8%25B1%25D9%258A%25D9%2581%25D8%25A7%25D9%2583%25D8%25B3%25D9%2585%25D9%258A%25D9%2586-%25D8%25B9%25D9%2584%25D9%2585%25D9%258A&usg=AOvVaw3QQG9RDNXG0URE2HZN5uOZ', 'نعم', '220170002'),
(43, 'Linaclotide', 'ليناكلوتيد', '10', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwic3Kuv4Yf3AhW6hf0HHSyjC7cQFnoECAcQAQ&url=https%3A%2F%2Fdailymedicalinfo.com%2Fview-drug%2F%25D9%2584%25D9%258A%25D9%2586%25D8%25A7%25D9%2583%25D9%2584%25D9%2588%25D8%25AA%25D9%258A%25D8%25AF%2F&usg=AOvVaw3qeBcnYgtLSYqguBnErocS', 'لا', '220170002'),
(44, 'Rofenac', 'روفيناك', '6', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjsjsaM5If3AhV0g_0HHRE3AHkQFnoECAgQAQ&url=https%3A%2F%2Faltibbi.com%2F%25D8%25A7%25D9%2584%25D8%25A7%25D8%25AF%25D9%2588%25D9%258A%25D8%25A9%2F%25D8%25B1%25D9%2588%25D9%2581%25D9%258A%25D9%2586%25D8%25A7%25D9%2583&usg=AOvVaw1l0H5WOxxaGWO56pk6T_U4', 'لا', '220170002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmcy`
--

CREATE TABLE `tbl_pharmcy` (
  `id` varchar(10) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `address` varchar(170) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` text NOT NULL,
  `password1` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `worktime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pharmcy`
--

INSERT INTO `tbl_pharmcy` (`id`, `full_name`, `address`, `featured`, `active`, `state`, `phone`, `email`, `password1`, `location`, `worktime`) VALUES
('220170000', 'الأمير', 'غزة', 'نعم', 'لا', 'مضاف ', '059967376', 'al-ameer@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54465.23171756805!2d34.34902002688673!3d31.439547553400732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd83a316319053%3A0xe6fa2db91935db43!2z2LXZitiv2YTZitipINin2YTYo9mF2YrYsQ!5e0!3m2!1sen!2s!4v1732385908189!5m2!1sen!2s', '11 صباحاَ - 11 مساءً'),
('220170001', 'Green Pharm', 'خانيونس', 'نعم', 'لا', 'مضاف', '0592303810', 'greenPharm@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13635.166807922353!2d34.247044907516454!3d31.309501783089097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd93423f7cb7d5%3A0xd6ea5da686598e49!2z2KzYsdmK2YYg2YHYp9ix2YUgR3JlZW4gUGhhcm0!5e0!3m2!1sen!2s!4v1732382742935!5m2!1sen!2s', '11 صباحاَ - 11 مساءً'),
('220170002', 'خالد بن الوليد', 'جباليا التوام', 'نعم', 'لا', 'مضاف', '1111111111', 'khaledBinAlwaleed@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54404.440305672404!2d34.425749785115734!3d31.54399756713972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7e42794c15e3%3A0xcf992aabc961b481!2sKhaled%20Bin%20Al%20Waleed%20Pharmacy!5e0!3m2!1sen!2s!4v1732382873857!5m2!1sen!2s', '8 صباحا - 10 مساءً'),
('220170005', 'اليازوري', 'غزة تل الهوا', 'نعم', 'نعم', 'مضاف', '0598822090', 'yazouri@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27260.561297182503!2d34.268133044242866!3d31.343241934208272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd91546a280b09%3A0xc61cab15beb6bb8!2z2KfZhNmK2KfYstmI2LHZiiDZgdin2LHZhQ!5e0!3m2!1sen!2s!4v1732383189678!5m2!1sen!2s', '11صباحا - 12-مساء'),
('220170266', 'البشير', 'دير البلح', 'نعم', 'لا', 'مضاف ', '0599123456', 'al-basher@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27241.27129947524!2d34.31763324627234!3d31.409747500000012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd8529bd61b45f%3A0x90c890a59bbee5cd!2z2LXZitiv2YTZitipINin2YTYqNi02YrYsSDYr9mK2LEg2KfZhNio2YTYrQ!5e0!3m2!1sen!2s!4v1732382964631!5m2!1sen!2s', '8 صباحاَ - 12 مساءً'),
('220171682', 'السطر المركزية','خانيونس ', 'نعم', 'نعم', 'مضاف', '0567475932', 'khanyounis@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27256.71072812031!2d34.3070465326309!3d31.356527548075796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd91f81166c3eb%3A0xc67819c71be5f3af!2z2LXZitiv2YTZitipINin2YTYs9i32LEg2KfZhNmF2LHZg9iy2YrYqQ!5e0!3m2!1sen!2s!4v1732383348879!5m2!1sen!2s', '  12 صباحاَ - 10 مساءً'),
('220172000', 'فارما كير ', 'خانيونس عمارة جاسر', 'نعم', 'نعم', 'مضاف', '0599195350', 'alosrapharmacare@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3407.510664646525!2d34.302156084898776!3d31.34488448142795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd91f96e1682f9%3A0x38ba060600022535!2z2LXZitiv2YTZitipINin2YTYp9iz2LHYqSDZgdin2LHZhdinINmD2YrYsQ!5e0!3m2!1sar!2s!4v1650995859716!5m2!1sar!2s', '  على مدار 24 ساعة '),
('220172001', 'الانصار', 'جباليا', 'نعم', 'نعم', 'إضافة', '0595648730', 'alansarpharm@gmail.com', '', '', '10 صباحاَ - 10 مساءً'),
('220172002', 'د سامح', 'غزة النصر', 'نعم', 'نعم', 'إضافة', '0599723225', 'dr-sameh-pharm@gmail.com', '', '', '10 صباحاَ - 10 مساءً'),
('220172003', 'بلال', 'خانيونس ', 'نعم', 'نعم', 'مضاف', '0598205338', 'bilalpharm@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27259.53633917158!2d34.25992548465729!3d31.346778839542385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd91d870c5a899%3A0x8f3d9fc08a3649d5!2z2LXZitiv2YTZitipINio2YTYp9mE!5e0!3m2!1sen!2s!4v1732383254003!5m2!1sen!2s', '10 صباحاَ - 10 مساءً'),
('220172006', 'يافا المركزية', 'البريج', 'نعم', 'نعم', 'مضاف', '0595500343', 'alamirpharm@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109003.87429783709!2d34.283422609833856!3d31.376330308787157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd83cd67138097%3A0x479e7e93b2cc266d!2z2LXZitiv2YTZitipINmK2KfZgdinINin2YTZhdix2YPYstmK2Kk!5e0!3m2!1sen!2s!4v1732383440759!5m2!1sen!2s', 'على مدار 24 ساعة ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `full_description` text NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `image_name`, `description`, `full_description`, `featured`, `active`) VALUES
(17, 'علاج مقاومة الإنسولين بالأكل', 'post_378.PNG', 'تزيد مقاومة الإنسولين من خطر الإصابة بمرض السكري من النوع الثاني، ولكن هل من الممكن علاج مقاومة الإنسولين بالأكل؟', 'يمكن علاج مقاومة الإنسولين (Insulin resistance) بالأكل، ومن خلال هذا المقال سنتطرق إلى أهم ما يتعلق بعلاج مقاومة الإنسولين بالأكل ومعلومات أخرى هامة:\r\n\r\nعلاج مقاومة الإنسولين بالأكل\r\nبشكل عام يُنصح مرضى مقاومة الإنسولين عادةً باختيار الأطعمة الكاملة غير المصنعة وتجنب الأطعمة المكررة والجاهزة، كما يجدر التنويه إلى أن علاج مقاومة الإنسولين لا يكون بالطعام وحده، إذ يجب اتباع تعليمات الطبيب المختص في الوقت ذاته.\r\n\r\nويسهم تناول بعض الأطعمة في تخفيف الضغط على البنكرياس، وبالتالي زيادة احتمالية علاج مقاومة الإنسولين بالأكل، إليك أهم هذه الأطعمة في ما يأتي:﻿\r\n\r\nالخضروات:\r\nتتميز الخضروات بأنها قليلة السعرات وغنية بالألياف، ممّا قد يجعلها خيارًا مثاليًا للحفاظ على مستويات السكر بالدم ضمن حدودها الطبيعية، ومن الأمثلة على الخضروات التي يمكنك تناولها ما يأتي:\r\nالبندورة.\r\nالفاصوليا الخضراء.\r\nالجزر.\r\nالفلفل الملون.\r\nالسبانخ.\r\nاللفت.\r\nالكرنب.\r\nالبروكلي.\r\nالقرنبيط.', 'نعم', 'نعم'),
(18, ' ممارسة الرياضة رغم الإصابة بالسمنة لا تحمي من أمراض القلب', 'post_900.jpg', 'هل القيام بالتمارين الرياضية بالرغم من السمنة يحمي من الإصابة بأمراض القلب؟ إليك التفاصيل', 'اثبتت دراسة جديدة ان امراض القلب التي تنتج بسبب زيادة الدهون في الجسم لا يمكن تجنب حدوثها من خلال ممارسة الرياضة!﻿\r\n\r\nالدراسة الجديدة تبطل المعتقدات القديمة!\r\nلطالما ساد الاعتقاد بان ممارسة الرياضة والتمتع بلياقة بدنية عالية امر كفيل للحد من الاعراض الجانبية السيئة التي تسببها الدهون على صحة القلب ولكن الدراسة الحديثة التي قامت بها European Journal of Preventive Cardiology دحضت هذا الاعتقاد. \r\n\r\nحيث يوضح الدكتور اليهاندرو لوسيا الذي قام بهذه الدراسة، انه ليس من الممكن ان يتمتع الشخص بصحة جيدة بالرغم من كونه سمينًا، إذ انه لا يمكن إلغاء الاعراض الجانبية لارتفاع الدهون على القلب. \r\n\r\nولطالما كان مقترحًا ان الاشخاص الرياضيين الذين يعانون من السمنة لديهم نفس مستوى خطر الإصابة بامراض القلب الموجود عند الاشخاص النحيلين غير الرياضيين، مما ادى إلى اقتراحات مثيرة للجدل حول اولوية للقيام بالتمارين الرياضية على خسارة الوزن.', 'نعم', 'نعم'),
(19, 'كورونا أخف على الأطفال', 'post_483.PNG', ' نذ بدء الجائحة لوحظ أن تأثير فيروس كورونا المستجد على الأطفال غالبًا ما يكون طفيفًا،. لكن لمَ ليس.. ', ' اظهرت دراسة جديدة نشرت مؤخرًا ان الاطفال اقل عرضة لمضاعفات كورونا الخطيرة - مقارنة بالبالغين- بسبب ما يطلق عليه العلماء اسم المناعة الفطرية (Innate immunity)؛ هذا النوع من المناعة قد يجعل اجسام الاطفال اكثر قدرة على مقاوم فيروس كورونا ودرء مضاعفاته.\r\n\r\nمنذ بدء الجائحة وقف العلماء حائرين حول السبب الذي جعل الاطفال اقل تاثرًا بمضاعفات فيروس كورونا الصحية، لتاتي هذه الدراسة حاملة الإجابة العلمية التي تفسر ما يحصل.\r\nما المقصود بالمناعة الفطرية؟\r\nيمتلك الجسم اكثر من خط دفاع مناعي تتدرج في لعب ادوار مختلفة اثناء محاولة درء العدوى والامراض، بدايًة تعمل المناعة الفطرية -والتي تتضمن المخاط الموجود في الانف والحلق- على حبس الجراثيم الداخلة إلى الجسم، بالإضافة لتنسيق طرق الاستجابة الاولية لجهاز المناعة تجاه عدوى ما، يبدي هذا الخط المناعي رد الفعل بناء على اي نمط مثير للشك قد يتم رصده، حتى لو لم يكن قد سبق لجهاز المناعة التعرض له او التعامل معه.', 'نعم', 'نعم'),
(20, 'العالم يتحرر من قيود كورونا: هل انتهى الوباء؟', 'post_846.PNG', '  بدأت العديد من الدول حول العالم مؤخرًا برفع العديد من القيود التي فرضتها على مواطنيها ..', '  خلال الاسابيع الماضية بدات العديد من الدول برفع بعض القيود التي فرضت خلال جائحة كورونا، لا سيما دول مثل بريطانيا وإيرلندا وفرنسا، كما تنوي دول اخرى مثل النمسا ان تبدا كذلك برفع قيود كورونا تدريجيًا خلال الشهر الحالي، لتبدا الحياة بالعودة لطبيعتها في حقبة ما قبل جائحة كورونا، بما في ذلك:\r\n\r\nالتوقف عن ارتداء الكمامات في الاماكن العامة.\r\nالتوقف عن فرض قواعد التباعد الاجتماعي في المرافق العامة، مثل: دور السينما.\r\nالتوقف عن العمل من المنزل، وعودة الموظفين للعمل من مقر عملهم.\r\nكما بدات بعض الدول بالتوقف عن طلب إثبات التطعيم والذي كان يعد من الإجراءات الهامة لدخول بعض المرافق العامة او للسفر. \r\n\r\nوتشكل خطوات رفع قيود كورونا الجديدة هذه نقطة تحول في الجائحة الحالية والتي بدات منذ اكثر من عامين، حيث تامل الدول التي تبنت هذه الخطوات ان تكون الجائحة بالفعل قاربت على لفظ انفاسها الاخيرة، لكن وفي ذات الوقت لا تزال هذه الدول ملتزمة بشروط وقيود معينة، ابرزها ضرورة التزام اي شخص تظهر إصابته بفيروس كورونا بالحجر المنزلي.', 'نعم', 'نعم');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_adv`
--
ALTER TABLE `tbl_adv`
  ADD PRIMARY KEY (`id`,`id_pharm_admin`),
  ADD KEY `FK` (`id_pharm_admin`);

--
-- Indexes for table `tbl_medi`
--
ALTER TABLE `tbl_medi`
  ADD PRIMARY KEY (`id`,`id_pharm_admin`),
  ADD KEY `FK_ID` (`id_pharm_admin`);

--
-- Indexes for table `tbl_pharmcy`
--
ALTER TABLE `tbl_pharmcy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_ID` (`id`),
  ADD UNIQUE KEY `UN_email` (`email`) USING HASH;

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_adv`
--
ALTER TABLE `tbl_adv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_medi`
--
ALTER TABLE `tbl_medi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_adv`
--
ALTER TABLE `tbl_adv`
  ADD CONSTRAINT `FK` FOREIGN KEY (`id_pharm_admin`) REFERENCES `tbl_pharmcy` (`id`);

--
-- Constraints for table `tbl_medi`
--
ALTER TABLE `tbl_medi`
  ADD CONSTRAINT `FK_ID` FOREIGN KEY (`id_pharm_admin`) REFERENCES `tbl_pharmcy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
