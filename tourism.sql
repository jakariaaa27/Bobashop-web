-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2020 pada 06.20
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `city`
--

CREATE TABLE `city` (
  `city_id` tinyint(3) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `province_id`, `created_at`, `updated_at`) VALUES
(1, 'Banda Aceh', 1, '2020-01-05 05:49:47', '2020-01-05 05:49:47'),
(2, 'Aceh Barat', 1, '2020-01-05 05:50:37', '2020-01-05 05:50:37'),
(3, 'Lhokseumawe', 1, '2020-01-05 05:50:56', '2020-01-05 05:50:56'),
(4, 'Sabang', 1, '2020-01-05 05:51:16', '2020-01-05 05:51:16'),
(5, 'Singaraja', 2, '2020-01-05 05:51:43', '2020-01-05 05:51:43'),
(6, 'Tabanan', 2, '2020-01-05 05:51:54', '2020-01-05 05:51:54'),
(7, 'Bandung', 7, '2020-01-05 05:52:27', '2020-01-05 05:52:27'),
(8, 'Cirebon', 7, '2020-01-05 05:52:41', '2020-01-05 05:52:41'),
(9, 'Bekasi', 7, '2020-01-05 05:52:52', '2020-01-05 05:52:52'),
(10, 'Sumedang', 7, '2020-01-05 05:53:04', '2020-01-05 05:53:04'),
(11, 'Semarang', 6, '2020-01-05 05:53:18', '2020-01-05 05:53:18'),
(12, 'Demak', 6, '2020-01-05 05:53:33', '2020-01-05 05:53:33'),
(13, 'Surabaya', 8, '2020-01-05 05:53:44', '2020-01-05 05:53:44'),
(14, 'Pangkal Pinang', 3, '2020-01-05 05:54:50', '2020-01-05 05:54:50'),
(15, 'Ketapang', 5, '2020-01-05 05:55:22', '2020-01-05 05:55:22'),
(16, 'Tanggerang', 4, '2020-01-05 05:55:36', '2020-01-05 05:55:36'),
(17, 'Jakarta Pusat', 9, '2020-01-05 20:31:28', '2020-01-05 20:31:28'),
(18, 'Jakarta Utara', 9, '2020-01-05 20:31:51', '2020-01-05 20:31:51'),
(19, 'Sleman', 10, '2020-01-05 20:32:06', '2020-01-05 20:32:06'),
(20, 'Gunung Kidul', 10, '2020-01-05 20:32:22', '2020-01-05 20:32:22'),
(21, 'Malang', 8, '2020-01-05 20:32:41', '2020-01-05 20:36:14'),
(22, 'Banjarnegara', 6, '2020-01-05 20:34:37', '2020-01-05 20:34:37'),
(23, 'Magelang', 6, '2020-01-05 21:01:19', '2020-01-05 21:01:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destination`
--

CREATE TABLE `destination` (
  `dest_id` smallint(5) UNSIGNED NOT NULL,
  `dest_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pict` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `city_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `users_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `destination`
--

INSERT INTO `destination` (`dest_id`, `dest_name`, `address`, `desc`, `pict`, `province_id`, `city_id`, `type_id`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 'Kuta Beach', 'Kuta, Badung Regency, Bali, Indonesia', '<p class=\"text-justify\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-size: 0.95em; font-family: Tahoma, Geneva, sans-serif; color: #212529; text-align: justify !important;\"><span style=\"box-sizing: border-box; font-weight: bolder;\"><a style=\"box-sizing: border-box; color: #65bee9; text-decoration-line: none;\" title=\"Bali Kuta Beach\" href=\"http://www.baligoldentour.com/kuta-beach.php\">Bali Kuta Beach</a></span>&nbsp;is located near Bali\'s Ngurah Rai Airport, only 15 minutes\' drive by car from the airport. It is the most famous beach resort on the island.&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Kuta Beach is the bustling area with the most tourists in all over Bali</span>. In the past, it was only a very small village. Nowadays, it has developed into a prosperous tourist resort. On the beach, there are many peddlers along the street, selling various local specialties, such as crafts, T-shirts, beach clothes and accessories. As the beach is windy with high waves, it is not suitable for boating or swimming there. But it is an ideal place for wind surfing, which is favored by the young who look for excitement. It is also an ideal place for watching the beautiful sunset. At night, there are local Balinese singing and dancing, performing especially for tourists.</p>\r\n<p class=\"text-justify\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-size: 0.95em; font-family: Tahoma, Geneva, sans-serif; color: #212529; text-align: justify !important;\">Kuta Beach is just like a holiday paradise with beautiful clean beach, numerous shops, bars, restaurants and shopping centers. Kuta Beach is not only a unique scenic spot for sun bathing and water activities, but also a perfect place for watching sunset. The commercial area in the center of Kuta Square is a new and modern shopping skyscraper.</p>\r\n<h3 class=\"font-small\" style=\"box-sizing: border-box; margin: 5px 0px; line-height: 1.2; font-size: 16px; padding: 0px; font-family: Tahoma, Arial; color: #212529;\">Kuta Beach History</h3>\r\n<p class=\"text-justify\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-size: 0.95em; font-family: Tahoma, Geneva, sans-serif; color: #212529; text-align: justify !important;\">Since the 18th century Kuta has served as the entry for foreigners visiting southern Bali. In the 1830s Kuta was a thriving slave market, attracting a wide variety of inter&shy;national \'lowlifes\'. Since its rediscovery by hippies and surfers in the 1960s, Kuta and Legian have expanded so rapidly that the district is now one of the busiest tourist areas in the world. At three hundred year ago, in this place had been built a Konco (Buddhist Temple) located beside of Tukad Mati ( Dead River) where it river can be navigable at that time. The boat steps into the hinterland of Kuta, so that Kuta is a port trade. Mad Lange is a merchant from Denmark in 19 century had built its trade station in the river periph&shy;ery. During living in Bali, he often becomes the medium between king of Bali and Dutch. Mad Lange has mysteriously died and his grave is located inside of Konco ( Buddhist Temple ) right in the river periphery. Kuta is quiet fisherman countryside in the past, but now it has been turned into the hilarious town and it is completed by post office, po&shy;lice office, market, pharmacy, photo center, and shop. There are a lot of hotels which are designed luxury and comfortable set in a long side of white sandy beach of Kuta .</p>\r\n<h3 class=\"font-small\" style=\"box-sizing: border-box; margin: 5px 0px; line-height: 1.2; font-size: 16px; padding: 0px; font-family: Tahoma, Arial; color: #212529;\">Kuta Beach Night Life</h3>\r\n<p class=\"text-justify\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-size: 0.95em; font-family: Tahoma, Geneva, sans-serif; color: #212529; text-align: justify !important;\">Party central, Kuta at night refers to the area extending about 7km north of the original village of Kuta. This area now includes Legian, Seminyak and even Basangkasa. The Kuta area is the epicenter of Balis nightlife. The majority of Bali\'s better entertainment places offer anything and everything a \'night owl\' would want. Located at the center of the original village are Kuta\'s many open-air pubs and discos.</p>\r\n<p class=\"text-justify\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-size: 0.95em; font-family: Tahoma, Geneva, sans-serif; color: #212529; text-align: justify !important;\">Entrance to bars is usually free with special drinks promotions and Happy Hours from 6pm to 9pm, and sometimes even longer. Jalan Legian and Jalan Padma have the biggest concentration of watering holes. Take up the option of joining surfers to guz&shy;zle beer, play pool and watch surfing videos at Tubes Cafe. Or drop by the eye-catching and uniquely sailship-shaped Bounty Res&shy;taurant I, which sways to the music of its dance floor till dawn. Other happening out&shy;lets in town are the trendy 66 Club (but say \'double six\') and hyper chic Gado Gado. For Kuta\'s magnetic live music, The Maccaroni Club is irresistible.</p>\r\n<p class=\"text-justify\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-size: 0.95em; font-family: Tahoma, Geneva, sans-serif; color: #212529; text-align: justify !important;\">One of Bali\'s latest and most extraor&shy;dinary; this place jazzes it up every Sunday from 10.30pm and invites guests to jam along on Friday nights. For a rare and special combination of Balinese dancing and rock bands near the beach, head straight for the Zero Six in Tuban while the new Hard Rock Cafe draws the crowds with live music and pricey drinks. Other live music spots include the Aussie-style \'pubs\' along Jalan Melasti and the semi-submerged Joni Sunken Bar Restaurant. Classier up-market hotels like the Bali Padma Hotel on Legian beach offer more relaxed entertainment</p>\r\n<p class=\"text-justify\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-size: 0.95em; font-family: Tahoma, Geneva, sans-serif; color: #212529; text-align: justify !important;\"><img src=\"http://www.baligoldentour.com/images/bali-interest-place/kuta-beach-bali-golden-tour.jpg\" alt=\"\" width=\"840\" height=\"336\" /></p>', 'Kuta Beach - pict .jpg', 2, 5, 1, 1, '2020-01-05 06:08:04', '2020-01-05 06:08:04'),
(2, 'Kawah Putih', 'Sugihmukti, Pasirjambu, Bandung, West Java, Indonesia', '<p style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff;\">Kawah Putih is located near the charming little market town of Ciwidey, approximately 50 Kilometers south of&nbsp;<u style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><a style=\"box-sizing: inherit; margin: 0px; padding: 0px; background-color: transparent; color: #0275d8; text-decoration-line: none; touch-action: manipulation; white-space: pre-wrap; overflow-wrap: break-word;\" href=\"https://www.indonesia.travel/content/indtravelrevamp/gb/en/destinations/java/bandung.html\" target=\"_self\">Bandung</a></u>. The Crater Lake is one of two craters of Mount Patuha, with the dry Kawah Patuha or the Patuha Crater located 600 meters to its northwest, being the other. Stepping into Kawah Putih is like entering a different realm.<br style=\"box-sizing: inherit; margin: 0px; padding: 0px;\" /><a class=\"btn btn-link w-100 btn-360-link\" style=\"box-sizing: inherit; margin: 15px auto; padding: 0px; background-color: transparent; color: #c8337c; text-decoration-line: none; touch-action: manipulation; display: block; line-height: 1.25; text-align: center; white-space: pre-wrap; vertical-align: middle; user-select: none; border: 1px solid transparent; font-size: 24px; border-radius: 0px; transition: all 0.3s ease 0s; width: 745px; cursor: pointer; position: relative; background-image: unset; background-position: 0px -130px; background-size: cover; background-repeat: no-repeat; height: auto; overflow-wrap: break-word;\" href=\"https://www.indonesia.travel/content/indtravelrevamp/gb/en/packages?intcmp=Articles-Package-Banner:Packages:GB:Image:Article-Body-Banner:609\" target=\"_blank\" rel=\"noopener\" data-rr=\"\"><img style=\"box-sizing: inherit; margin: 0px; padding: 0px; border-style: none; vertical-align: middle; width: 743px; height: auto; max-width: 100%;\" src=\"https://www.indonesia.travel/content/dam/indtravelrevamp/en/BANNER-PACKAGE-MOT_21MAY19_1.jpg\" alt=\"goto packages\" /></a></p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">As the name suggests, the Crater Lake and its surroundings are dominated by a pale white color which radiates a rather hypnotizing ambience. The vast dormant volcanic crater is filled with surreal turquoise-colored water. The tree-clad cliffs surrounding the crater reach around 2,500 meters above sea level and make for a stunning backdrop, especially when the clouds start to roll in. The altitude here brings with it chilly temperatures, which in a way, will add to the magical splendor of Kawah Putih.</span></p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">In World War II the plant was taken over by the Japanese military and was operated under the name Kawah Putih Kenzanka Yokoya Ciwidey. Today the plant no longer exists , however, entry points to its tunnels, remnants of these mining activities can still be seen at several points around the current site. First opened for visitors in 1987, nowadays Kawah Putih is a favorite destination for tourists and day trippers who are simply stunned by its mesmerizing ambience. On weekends and on holidays, quite large numbers of visitors frequently visit the area just to immerse themselves in the mystical beauty of nature.</span></p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">&nbsp;</span></p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: 24px; line-height: 1.42857;\">Get There</span></p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">Kawah Putih is located approximately 44 KM south from the center of Bandung City. Depending on the traffic in and around Bandung, the trip will take a little over 2 hours. The main road is the busy road south from Bandung through the town of&nbsp;Soreang, capital of the Bandung Regency, continuing down to the town of Ciwidey.</span></p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">The turn from the main road to Kawah Putih is hard to miss: there is a large signboard to the left of the main road and a prominent entry gate.&nbsp;If you wish to use public transportation you must first find your way to the Leuwipanjang Bus Station and then take the bus in the direction of Ciwidey. From Ciwidey, you can take the&nbsp;angkot&nbsp;mini bus to the entrance of Kawah Putih.</span></p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">Once at the Kawah Putih entrance, it is a long trek uphill to the crater but &nbsp;you won&rsquo;t see many attempting to walk this. The usual arrangement is for visitors to leave their vehicles in the main carpark at the entrygate &nbsp;to the site and catch one of the regular mini shuttle buses (leaving every five minutes or so) for the 5 KM up to the crater.</span></p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;<img src=\"https://www.indonesia.travel/content/dam/indtravelrevamp/en/destinations/java/west-java/bandung/point-of-interest/kawah-putih/4e6db25a6f27c6eca6cb19910122877cad00b6ac-7d741.jpg/_jcr_content/renditions/cq5dam.web.1280.1280.jpeg\" alt=\"\" width=\"1280\" height=\"560\" /></p>', 'Kawah Putih - pict .jpg', 7, 7, 1, 1, '2020-01-05 06:11:11', '2020-01-05 06:11:11'),
(3, 'Gua Sunyaragi', 'Sunyaragi, Kesambi, Cirebon City, West Java 45132, Indonesia', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: manrope, sans-serif; font-size: 16px; letter-spacing: 0.3px; background-color: #ffffff;\">Taman Sari Gua Sunyaragi is located in Western Java region of Indonesia. It is a cave that is situated in the village of Sunyaragi in Cirebon City. The Sunyaragi cave is a cultural site in Cirebon sprawling over fifteen hectares. The cave has artificial waterfalls, along with beautiful gardens where one can see statues of the Garuda, Virgin Sunti Women and majestic elephants. Taman Sari Gua Sunyaragi cave is a small part of the Pakungwati Palace (now Kasepuhan Palace).</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: manrope, sans-serif; font-size: 16px; letter-spacing: 0.3px; background-color: #ffffff;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: manrope, sans-serif; font-size: 16px; letter-spacing: 0.3px; background-color: #ffffff;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: manrope, sans-serif; font-size: 16px; letter-spacing: 0.3px; background-color: #ffffff;\">Taman Sari Gua Sunyaragi used to be a water palace for the Sultans of Cirebon. This part of the Javanese island was formerly enveloped by a lot of lakes (in ancient times Lake Jati used to flow in this area), ponds, swimming pools and magnificent waterfalls.&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: manrope, sans-serif; font-size: 16px; letter-spacing: 0.3px; background-color: #ffffff;\">&ldquo;Sunyaragi&rdquo; in the Javanese language literally means &ldquo;in a silent form&rdquo;. This place used to be a place of spiritual escape where the Sultans would come to meditate in the serene surroundings.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: manrope, sans-serif; font-size: 16px; letter-spacing: 0.3px; background-color: #ffffff;\"><img src=\"https://i2.wp.com/www.indonesia-az.com/wp-content/uploads/2018/02/Gua-Sunyaragi.jpg?fit=1500%2C1125&amp;ssl=1\" alt=\"\" width=\"1500\" height=\"1125\" /></p>', 'Gua Sunyaragi - pict .jpg', 7, 8, 3, 2, '2020-01-05 06:19:16', '2020-01-05 06:19:16'),
(4, 'Dieng Platau', 'Bakal Buntu, Bakal, Batur, Banjarnegara, Central Java, Indonesia', '<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\">Dieng Volcanic Complex (also called the Dieng Plateau) is a complex volcano. A complex volcano is an extensive assemblage of spatially, temporally, and genetically related major and minor volcanic centers with the associated lava flows and pyroclastic rocks. This is another place worth visiting in Central Java, situated around 2000 m above sea level and 100 km from Borobudur. This area northwest of Yogyakarta is in the volcanic mountains and over 2,000 meters elevation. The name \"Dieng\" means \"abode of the gods.\" There the visitor can find restarted temples build around year 800, colorful lakes and steaming ones. On the road we will see how the farmer use all the land available by using terraces. It\'s also fresher up here and we are almost above the clouds. The plateau, located 2,093 meters above sea level, offers two sunrises, the golden sunrise and the silver sunrise. Both are equally amazing natural phenomena. The golden sunrise refers to the first sunrise between 5:30 and 6 a.m. It is said to be golden because of its sparkling golden red color. We can enjoy this sunrise from a viewing post at a height of 1,700 meters above sea level in Wonosobo. The place, located in a mountainous area, is easily accessible because the roads leading to this area are all paved.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\">After savoring the beauty of the double sunrise, a natural phenomenon perhaps found only on Dieng Plateau, we could still enjoy the beauty of the surrounding nature. Walk about 10 minutes over a distance of some two kilometers to the southeast of the temple where there is a colorful lake. From the top of a hill the lake reflects a greenish yellow color, the reflection of the sulfate acid that the lake water contains. Beside this colorful lake there is another lake with pristine water. Locals call it the mirror lake because the water is very clear. The surface of the lake water also reflects sunlight. Unfortunately, this beautiful morning panorama is slightly impaired by the rampant felling of trees around the lakes. Unless the tree feeling is checked, this beautiful panorama will soon vanish for good.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\">Beside the beautiful panorama above, there is also small monuments, which are not more than 50 feet high stand on a crater floor amidst sulfurous fumes and underlined by the presence of a few of the starkest Shivaite temples at an elevation of more than 6.000 feet, are impressive. The site is located four hours from Semarang. In this site, the visitor will see some of the oldest Hindu temples of Java. On the way to the Dieng Plateau, visitors will pass through tobacco plantations and beautiful mountain scenery. This area can reach about four hours from Semarang, the site of some of the oldest Hindu temples on Java. These 50m-foot high monuments stand on a crater floor amidst sulfur fumes. The road to the Dieng Plateau passes through tobacco plantations and beautiful mountain scenery.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://www.indonesia-tourism.com/central-java/images/dieng-kailasa.jpg\" alt=\"\" width=\"500\" height=\"350\" /></p>', 'Dieng Platau - pict .jpg', 6, 22, 1, 1, '2020-01-05 20:40:12', '2020-01-05 20:40:12'),
(5, 'Batik Mega Mendung', 'Jl. Trusmi Kulon, Cirebon 40124, Indonesia', '<p>Batik Trusmi is one of the centers of the creative industry in Cirebon. In addition to batik, the area which is located in Plered, Cirebon, about four kilometers west of the city of Cirebon also provides culinary tours, such as tofu gejrot or four barrel-shaped tunnels.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://cdn-image.bisnis.com/upload/img/Batik2sah.jpg\" alt=\"\" width=\"600\" height=\"400\" /></p>\r\n<p>In addition, the Batik Trusmi village is also known as a center for arts and culture training. For example for the procurement of seminars or batik training.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://cdn-image.bisnis.com/upload/img/Batik3sah%20(1).jpg\" alt=\"\" width=\"600\" height=\"400\" /></p>\r\n<p>For a long time, Batik Trusmi became an icon of a national fabric collection. In addition to Cirebon batik, Batik Trusmi provides written batik, coastal batik, and palace batik. Understandably, there are two palace that greatly affect the keratin batik motif. namely Kanoman Palace and Kasepuhan Palace.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://cdn-image.bisnis.com/upload/img/Batik4sah.jpg\" alt=\"\" width=\"600\" height=\"400\" /></p>\r\n<p>&nbsp;</p>\r\n<p>Some expensive motives, for example, Paksinaga Liman\'s motif, motifs with the name of the kencana train belonging to the Kasepuhan Palace.</p>\r\n<p>&nbsp;</p>\r\n<p>Paksinaga Liman\'s motive is a combination of three animals, and this is a symbol of the strength of the Cirebon Kingdom. There are also prices for batik with this unique motif. This place ranges from Rp. 5,000 to Rp. 1 million.</p>\r\n<p>&nbsp;</p>\r\n<p>To get to Batik Trusmi, you can travel via Cikupa-Palimanan Toll Road or Cipali Toll Road. You then exit at the Plumbon toll gate, then around 500 meters to about 1 kilometer will arrive at the Plered intersection.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>If you have found a batik sculpture in the area, then that village will be available in Cirebon, culinary specialties, batik boutiques, and of course the Batik Trusmi area.</p>\r\n<p>&nbsp;</p>\r\n<p>In addition to private vehicles, you can go by train to East Java and Central Java, then get off at Cirebon Station. There are many choices from Cirebon Station to arrive to Batik Trusmi.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>The presence of Batik Trusmi cannot be separated from the figure of Ki Gede Trusmi, a loyal follower of Islamic leaders in Cirebon, Sunan Gunung Jati. Ki Gede Trusmi often teaches the batik arts community, besides participating in spreading Islam in the area.</p>\r\n<p>&nbsp;</p>\r\n<p>People who live there, and used to make batik, believe that they are descendants of Ki Gede Trusmi.</p>\r\n<p>&nbsp;</p>\r\n<p>Until now, Ki Gede Trusmi\'s grave is still well maintained. Every year a ceremony is made to change the welit, and replace the shingle every four years.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://cdn-image.bisnis.com/upload/img/Batik1sah%20(1).jpg\" alt=\"\" width=\"600\" height=\"400\" /></p>', 'Batik Mega Mendung - pict .jpg', 7, 8, 2, 1, '2020-01-05 20:47:25', '2020-01-05 20:47:25'),
(6, 'Mountain Bromo', 'Jl. Bromo Km. 3 | Probolinggo City Town, Bromo Tengger Semeru National Park, Indonesia', '<p><span style=\"color: #333333; font-family: Verdana, Arial, Tahoma, Calibri, Geneva, sans-serif; font-size: 13px; background-color: #ffffff;\">Mount Bromo is one of the favorite tourist destinations in East Java. Not only domestic tourists, but also foreign tourist are competing to come here. They come to see the beautiful sunrise of Bromo.</span><br style=\"color: #333333; font-family: Verdana, Arial, Tahoma, Calibri, Geneva, sans-serif; font-size: 13px; background-color: #ffffff; box-shadow: none !important;\" /><br style=\"color: #333333; font-family: Verdana, Arial, Tahoma, Calibri, Geneva, sans-serif; font-size: 13px; background-color: #ffffff; box-shadow: none !important;\" /><span style=\"color: #333333; font-family: Verdana, Arial, Tahoma, Calibri, Geneva, sans-serif; font-size: 13px; background-color: #ffffff;\">Bromo has known as one of the prime tourist spot in East Java. This place is located in the Bromo Tengger Semeru National Park, in the eastern city of Malang. The beauty of this mountain has attract many visitors from many countries in the world. Watching the sunrise is an interesting event. The visitors are willing to wait from 05.00 am facing east, in order to not lose this special moment. You also do not always get to see this event, because if the cloudy sky, the sun is not seen clearly. However, when the sky is clear, you can see the sun sphere. First, the sun looks like a blotter matches, slowly enlarge until it formed a complete circle and enlighten. So we can see the mountains surrounded.</span><br style=\"color: #333333; font-family: Verdana, Arial, Tahoma, Calibri, Geneva, sans-serif; font-size: 13px; background-color: #ffffff; box-shadow: none !important;\" /><br style=\"color: #333333; font-family: Verdana, Arial, Tahoma, Calibri, Geneva, sans-serif; font-size: 13px; background-color: #ffffff; box-shadow: none !important;\" /><span style=\"color: #333333; font-family: Verdana, Arial, Tahoma, Calibri, Geneva, sans-serif; font-size: 13px; background-color: #ffffff;\">After watching the sunrise, you can go back down of Mount Pananjakan and go to Mount Bromo. Sunlight can make you see the scenery around. You will pass through the sea of sand which covers 10 square kilometers. Arid areas filled with sand and only a little dry grasses grow there. Wind, making the sand fly and can make it difficult for you to breathe.</span><br style=\"color: #333333; font-family: Verdana, Arial, Tahoma, Calibri, Geneva, sans-serif; font-size: 13px; background-color: #ffffff; box-shadow: none !important;\" /><br style=\"color: #333333; font-family: Verdana, Arial, Tahoma, Calibri, Geneva, sans-serif; font-size: 13px; background-color: #ffffff; box-shadow: none !important;\" /><span style=\"color: #333333; font-family: Verdana, Arial, Tahoma, Calibri, Geneva, sans-serif; font-size: 13px; background-color: #ffffff;\">To reach the foot of Mount Bromo, you can&rsquo;t use the vehicle. Instead, you should hire a horse or when you feel powerful, you can choose to walk with the challenges of the scorching sun, the distance, and the flying dust. When you arrive at the foot of Bromo and want to see the crater, you have to climb about 250 stairs. At the top, you can see the crater of Mount Bromo that emit smoke. You also can look down and see the sea of sand with a temple in the middle. It&rsquo;s really incredibly and extraordinary scenery that we can enjoy!</span></p>\r\n<p><span style=\"color: #333333; font-family: Verdana, Arial, Tahoma, Calibri, Geneva, sans-serif; font-size: 13px; background-color: #ffffff;\"><img src=\"http://www.dronestagr.am/wp-content/uploads/2017/09/4-4-1200x800.jpg\" alt=\"\" /></span></p>', 'Mountain Bromo - pict .jpg', 8, 21, 1, 1, '2020-01-05 20:51:51', '2020-01-05 20:51:51'),
(7, 'Taman Ancol', 'Jl. Lodan Timur No.7, RW.10, Ancol, Kec. Pademangan, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14430, Indonesia', '<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\">Taman Impian Jaya Ancol, an amusement park in north Jakarta, Indonesia, is one of the most attractive places serving the densely populated city of Jakarta. It has all the adventures people crave for; Sea World, Fantasy World, Atlantis Water Adventure and Marina Beach. This is Jakarta\'s largest and most popular recreation park. It is built on reclaimed beach land at the Bay of Jakarta, having, sea and freshwater aquariums, swimming pools, an artificial lagoon for fishing, boating, bowling, an assortment of nightclubs, restaurants, a steam-bath and massage parlors. The Ancol complex includes a Marina, Dunia Fantasi (Fantasy Land), a golf course, hotels and a drive-in theater. The \"Pasar Seni\" or art market has a varied collection of Indonesian handicraft, paintings and souvenirs on sale. At a nearby open-air theater art performances are held using the local dialect.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\">Inside the Ancol Dreamland, there is Ancol Art Market, it is outdoor art market likely recreational place where we will be most tempted to purchase something. Items include antiques, handicrafts, painting, potters, and knickknacks. With many of the artisans working on site, it is a paradise for souvenir hunters and art lovers. This colorful open-air market located in the Ancol Amusement Park provides the unique experience of not only buying quality Indonesian arts and craft, but also a chance to see and meet the artisans at work. We can watch puppet makers, wood-carvers, painters, and many other craft makers from throughout the archipelago cheerfully working on their creations. At this art and handicraft market, visitors get to watch Indonesian artists creating their masterpieces. Hundreds of artists from all over the country congregate here to exhibit their work, making the spot a fascinating place for tourists and art connoisseurs. We can even get a portrait of our self-done. Both traditional and modern art and crafts are on display, including paintings, sculptures, traditional Indonesian wayang kulit (leather puppets), gemstone jewelry and many other artistic products. Art performances are frequently held at the Art Market (Pasar Seni) inside the Jaya Ancol Dreamland on Jakarta\'s beach. They normally range from wayang kulit shadow plays to folk dances and modern drama. This location is open Monday to Saturday, from 2 p.m. to 9 p.m.; Sunday, from 10 a.m. to 9 p.m.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://www.indonesia-tourism.com/jakarta/images/jaya-ancol-dreamland.jpg\" alt=\"\" width=\"500\" height=\"338\" /></p>', 'Taman Ancol - pict .jpg', 9, 18, 1, 2, '2020-01-05 20:58:14', '2020-01-05 20:58:14'),
(8, 'Prambanan Temple', 'Bokoharjo, Prambanan, Sleman Regency, Special Region of Yogyakarta', '<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\">This is the most famous and also the most magnificent of Central Java\'s temples or more precisely complex of temples. Situated about 15 kilometers from Yogyakarta, the top of the main shrine is visible from a great distance and rises high above the scattered ruins of the former temples. Prambanan is the masterpiece of Hindu culture of the tenth century. The slim building soaring up to 47 meters makes its beautiful architecture incomparable. Seventeen kilometers east of Yogyakarta, King Balitung Maha Sambu built the Prambanan temple in the middle of the ninth century. Its parapets are adorned with bas-reliefs depicting the famous Ramayana story. This magnificent Shivaite temple derives it name from the village where it is located.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\">Prambanan Temple is locally known as the Roro Jonggrang Temple, or the Temple of the \"Slender Virgin\", it is the biggest and most beautiful Hindu temple in Indonesia. The temple complex of Prambanan lies among green fields and villages. It has eight shrines, of which the three main ones are dedicated to Shiva, Vishnu and Brahma. The main temple of Shiva rises to a height of 130 feet and houses the magnificent statue of Shiva\'s consort, Durga. There are 224 temples in the complex; three of them, the main temples are Brahma Temple in the north, Vishnu Temple in the south, and the biggest among the three which lies between Brahma and Vishnu temples is Shiva Temple (47 meters high).</p>\r\n<p>&nbsp;</p>\r\n<div class=\"soc-bott\" style=\"box-sizing: border-box; max-height: 33px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\">&nbsp;</div>\r\n<p>&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 300; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">Two theatres have provided the temple. Enjoy sunrise behind the glory of Prambanan Temple. Visitors should be at the location - in the area of The Open Air Theater and archaeological park of the temple - before sunrise at about 5:00 o\'clock in the morning. The First open-air theatre was built on the southern side of the temple in 1960 and the second was built on the western side of the temple in 1988. During full moon evenings in the month from May to October, the Ramayana ballet is performed right here. Perhaps one of the most majestic temples in the South-East Asia, Prambanan attracts many admirers each year from abroad.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 300; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://www.indonesia-tourism.com/yogyakarta/images/candi_prambanan.jpg\" alt=\"\" width=\"500\" height=\"350\" /></p>', 'Prambanan Temple - pict .jpg', 10, 19, 2, 2, '2020-01-05 21:00:37', '2020-01-05 21:00:37'),
(9, 'Borobudur Temple', 'Jl. Badrawati, Kw. Candi Borobudur, Borobudur, Kec. Borobudur, Magelang, Jawa Tengah, Indonesia', '<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\">Borobudur is the biggest Buddhist temple in the ninth century measuring 123 x 123 meters. It is located at Magelang, 90-km southeast of Semarang, or 42-km northwest of Yogyakarta. Borobudur temple is the one of the best-preserved ancient monument in Indonesia that are most frequently visited by over a million domestic as well as foreign visitors. It also had been acclaimed by the world as a cultural heritage main kind. The architectural style has no equal through out the world. It was completed centuries before Angkor Wat in Kamboja. Borobudur is one of the world\'s most famous temples; it stands majestically on a hilltop overlooking lush green fields and distant hills. Borobudur is built of gray andesite stone. It rises to seven terraces, each smaller than the one below it. The top is the Great Stupa, standing 40 meters above the ground. The walls of the Borobudur are sculptured in bas-reliefs extending over a total length of six kilometers. It has been hailed as the largest and most complete ensemble of Buddhist relieves in the world, unsurpassed in artistic merit and each scene an individual masterpiece.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\">Borobudur temple built in the eighth century by the Cailendra dynasty, is believed to have been derived from the Sanskrit words \"Vihara Buddha Uhr\" the Buddhist Monastery on the hill. Borobudur is a terraced temple surmounted by stupas, or stone towers; the terraces resemble Indonesian burial foundations, indicating that Borobudur was regarded as the symbol of the final resting place of its founder, a Syailendra, who was united after his death with the Buddha. The Prambanan temple complex is also associated with a dead king. The inscription of 856 mentions a royal funeral ceremony and shows that the dead king had joined Shiva, just as the founder of the Borobudur monument had joined the Buddha. Divine attributes, however, had been ascribed to kings during their lifetimes. A Mahayana inscription of this period shows that a ruler was said to have the purifying powers of a bodhisattva, the status assumed by the ruler of Shrivijaya in the 7th century; a 9th-century Shaivite inscription from the Kedu Plain describes a ruler as being \"a portion of Shiva.\"</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\">The Borobudur was in danger of collapsing as its stone statues and stone cancer, moss and lichen affected bas-reliefs. But, the monument has been completely restored and was officially opened by the President on 23rd February 1983. The restoration took eight years to complete, funded by the Government of Indonesia with aid from the UNESCO and donations from private citizens as well as from foreign governments.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\">The visitors have the option of going by taxi or public bus to reach this temple. Public transportation is available from the bus terminal. From that point visitors can hire becaks or horse carts, or walk the rest of the way to the monument. A large parking area is available not far from the monument, so private cars and buses can park in this area.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #676767; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://allindonesiatravel.com/images/borobudur-panaroma-java-indonesia.jpg\" alt=\"\" width=\"600\" height=\"398\" /></p>', 'Borobudur Temple - pict .jpg', 6, 23, 2, 2, '2020-01-05 21:04:11', '2020-01-05 21:04:11'),
(10, 'Indrayanti Beach', 'Sidoharjo, Tepus, Gunung Kidul, Indonesia', '<p style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff;\">Indonesia is an archipelago of endless seaside escapades. The romantic Indrayanti Beach in Gunungkidul District of the Special Region of Yogyakarta is no exception. This beach offers couples who intend to travel to a peaceful romantic vacation a unique panoramic view compared to other beaches. Aside from its silky white sand surrounded by enormous powerful rocks, the clear blue hypnotizing color of the sea invites visitors to come and plunge into the underworld. The sea is still clear and beautiful because trash or any other waste has not contaminated in this remote area.<br style=\"box-sizing: inherit; margin: 0px; padding: 0px;\" /><br /></p>\r\n<p style=\"box-sizing: inherit; margin: 0pt 0px 10pt; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff; text-align: center; line-height: 1.38;\"><img style=\"box-sizing: inherit; margin: 0px; padding: 0px; border-style: none; vertical-align: middle; width: 745px; height: auto; max-width: 100%;\" src=\"https://www.indonesia.travel/content/dam/indtravelrevamp/en/destinations/java/di-yogyakarta/yogyakarta/indrayanti-beach/faa389c98027a59e7d8907290155c59cf8326fb9-3bb2d.jpg\" alt=\"Indrayanti Beach\" /><span id=\"docs-internal-guid-5cb39d9e-6927-dba8-1af5-07562afb3be0\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: #000000; background-color: transparent; vertical-align: baseline;\"><br style=\"box-sizing: inherit; margin: 0px; padding: 0px;\" /></span></span></p>\r\n<p style=\"box-sizing: inherit; margin: 0pt 0px 10pt; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff; line-height: 1.38; text-align: justify;\"><span id=\"docs-internal-guid-5cb39d9e-6927-dba8-1af5-07562afb3be0\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: #000000; background-color: transparent; vertical-align: baseline;\">The story behind the beach&rsquo;s name is pretty interesting. To Indonesians, Indrayanti is a popular name for women. It all started with a restaurant called &lsquo;Indrayanti&rsquo;, which is also the name of the lady who owns it. The restaurant had its name hugely posted in front of the beach. People then referred to this beach as the Indrayanti beach, despite the Gunungkidul District Government officially naming it Pulang Syawal beach.</span></span></p>\r\n<p style=\"box-sizing: inherit; margin: 0pt 0px 10pt; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff; text-align: center; line-height: 1.38;\"><img style=\"box-sizing: inherit; margin: 0px; padding: 0px; border-style: none; vertical-align: middle; width: 745px; height: auto; max-width: 100%;\" src=\"https://www.indonesia.travel/content/dam/indtravelrevamp/en/destinations/java/di-yogyakarta/yogyakarta/indrayanti-beach/d8d5536fc4052ece11c1c7f553a9cc00000fd468-1021a.jpg\" alt=\"Indrayanti Beach\" /><span id=\"docs-internal-guid-5cb39d9e-6927-dba8-1af5-07562afb3be0\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: #000000; background-color: transparent; vertical-align: baseline;\"><br style=\"box-sizing: inherit; margin: 0px; padding: 0px;\" /></span></span></p>\r\n<p style=\"box-sizing: inherit; margin: 0pt 0px 10pt; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff; line-height: 1.38; text-align: justify;\"><span id=\"docs-internal-guid-5cb39d9e-6927-dba8-1af5-07562afb3be0\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: #000000; background-color: transparent; vertical-align: baseline;\">When the night falls, visitors can enjoy a magnificent view of the horizon changing its colors from bright blue, to orangey-red and finally darkness with glittering twinkling stars above. This makes a very romantic scenery for couples visiting the beach. On the land, the view is no less great as the gazebos of restaurants lining the beach sparkle with colorful lighting.</span></span></p>\r\n<p style=\"box-sizing: inherit; margin: 0pt 0px 10pt; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff; line-height: 1.38; text-align: justify;\"><span id=\"docs-internal-guid-5cb39d9e-6927-dba8-1af5-07562afb3be0\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">Want to know why locals have managed to preserve this beach? They hit visitors with a strict fine for littering!</span></p>\r\n<p style=\"box-sizing: inherit; margin: 0pt 0px 10pt; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff; line-height: 1.38; text-align: justify;\">&nbsp;</p>\r\n<p style=\"box-sizing: inherit; margin: 0pt 0px 10pt; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff; line-height: 1.38; text-align: justify;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: 22px; color: #000000; background-color: transparent; vertical-align: baseline;\">Get Around</span></p>\r\n<p style=\"box-sizing: inherit; margin: 0pt 0px 10pt; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff; font-weight: bold; text-align: center; line-height: 1.38;\"><img style=\"box-sizing: inherit; margin: 0px; padding: 0px; border-style: none; vertical-align: middle; width: 745px; height: auto; max-width: 100%;\" src=\"https://www.indonesia.travel/content/dam/indtravelrevamp/en/destinations/java/di-yogyakarta/yogyakarta/indrayanti-beach/57065ff4a2d6d8510c18c2a2e11dc6d8b27e3e42-31791.jpg\" alt=\"Indrayanti Beach\" /><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: #000000; background-color: transparent; font-weight: 400; vertical-align: baseline;\"><br style=\"box-sizing: inherit; margin: 0px; padding: 0px;\" /></span></p>\r\n<p style=\"box-sizing: inherit; margin: 0pt 0px 10pt; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff; line-height: 1.38; text-align: justify;\">Indrayanti beach is a long stretch of sand lined with the ocean on one end and gazebos of restaurants, tiny shops and others on the other end. You can leisurely walk around and enjoy the beach in a pair of comfortable footwear.</p>\r\n<p style=\"box-sizing: inherit; margin: 0pt 0px 10pt; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff; line-height: 1.38; text-align: justify;\">&nbsp;</p>\r\n<p style=\"box-sizing: inherit; margin: 0pt 0px 10pt; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff; line-height: 1.38; text-align: justify;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: 22px; color: #000000; background-color: transparent; vertical-align: baseline;\">Get There</span></p>\r\n<p style=\"box-sizing: inherit; margin: 0pt 0px 10pt; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff; text-align: center; font-weight: bold; line-height: 1.38;\"><img style=\"box-sizing: inherit; margin: 0px; padding: 0px; border-style: none; vertical-align: middle; width: 745px; height: auto; max-width: 100%;\" src=\"https://www.indonesia.travel/content/dam/indtravelrevamp/en/destinations/java/di-yogyakarta/yogyakarta/indrayanti-beach/812db7fda6385fb8ff8dad034e2134381bcd97ba-3504d.jpg\" alt=\"Indrayanti Beach\" /></p>\r\n<p style=\"box-sizing: inherit; margin: 0pt 0px 10pt; padding: 0px; color: #292b2c; font-family: \'Open Sans\', sans-serif; font-size: 16px; background-color: #ffffff; line-height: 1.38;\">In order to get there, one must travel to the city of Yogyakarta first. Then, it is advisable to either use your own car or rent a vehicle to drive to the beach because there are no public transportation that leads directly to the beach. It is quite easy to get to Indrayanti beach because the road leading there is already in good shape. The distance between Yogyakarta and Indrayanti beach is around 65.8 km, which means the drive would take around 2 hours.</p>', 'Indrayanti Beach - pict .jpg', 10, 20, 1, 2, '2020-01-05 21:07:27', '2020-01-05 21:10:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guide`
--

CREATE TABLE `guide` (
  `guide_id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dest_id` smallint(5) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guide`
--

INSERT INTO `guide` (`guide_id`, `name`, `email`, `phone`, `photo`, `dest_id`, `created_at`, `updated_at`) VALUES
(1, 'I Dewa Krinayana', 'krinayana@gmail.com', '+62817827872878', 'I Dewa Krinayana - guide .jpg', 1, '2020-01-05 06:14:58', '2020-01-05 06:14:58'),
(2, 'Pratama Gusta', 'gusta@gmail.com', '+6283217268168268', 'Pratama Gusta - guide .jpg', 2, '2020-01-05 06:15:30', '2020-01-05 06:15:30'),
(3, 'Jakaria', 'jakariaaa27@gmail.com', '+6289127971927', 'Jakaria - guide .jpg', 3, '2020-01-05 06:19:57', '2020-01-05 06:19:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2020_01_01_101257_create_type', 1),
(3, '2020_01_01_102941_create_province', 1),
(4, '2020_01_01_103036_create_city', 1),
(5, '2020_01_01_103221_create_destination', 1),
(6, '2020_01_01_103534_create_setting', 1),
(7, '2020_01_01_142012_create_guide', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `province`
--

CREATE TABLE `province` (
  `province_id` tinyint(3) UNSIGNED NOT NULL,
  `province_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `province`
--

INSERT INTO `province` (`province_id`, `province_name`, `created_at`, `updated_at`) VALUES
(1, 'Aceh', '2020-01-05 05:46:32', '2020-01-05 05:46:32'),
(2, 'Bali', '2020-01-05 05:46:40', '2020-01-05 05:46:40'),
(3, 'Bangka Belitung', '2020-01-05 05:46:54', '2020-01-05 05:46:54'),
(4, 'Banten', '2020-01-05 05:47:26', '2020-01-05 05:47:26'),
(5, 'Bengkulu', '2020-01-05 05:47:37', '2020-01-05 05:47:37'),
(6, 'Jawa Tengah', '2020-01-05 05:48:07', '2020-01-05 05:48:07'),
(7, 'Jawa Barat', '2020-01-05 05:48:16', '2020-01-05 05:48:16'),
(8, 'Jawa Timur', '2020-01-05 05:48:24', '2020-01-05 05:48:24'),
(9, 'DKI Jakarta', '2020-01-05 20:30:41', '2020-01-05 20:31:05'),
(10, 'DIY Yogyakarta', '2020-01-05 20:30:55', '2020-01-05 20:31:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `setting_id` tinyint(3) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_text1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_text2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_backend` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_login` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `simple_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_frontend` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumbotron` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`setting_id`, `site_name`, `site_desc`, `logo_text1`, `logo_text2`, `footer_backend`, `background_login`, `logo`, `simple_text`, `footer_frontend`, `front_logo`, `jumbotron`, `created_at`, `updated_at`) VALUES
(1, 'Wonderfull Indonesia', 'This website provides information about tourist attractions in Indonesia. information submitted regarding information on the types of places and recommendations of trusted tour guides', 'Won', 'Indo', 'Wonderfull Indonesia | By Jakaria', 'default-backgroug-login.jpg', 'default_logo.png', 'Website information about taourist attractions in Indonesia', 'Wonderfull Indonesia | By Jakaria', 'default-front-logo.png', 'default_jumbotron.jpg', '2020-01-05 12:35:58', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type`
--

CREATE TABLE `type` (
  `type_id` tinyint(3) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `type`
--

INSERT INTO `type` (`type_id`, `type_name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Sea', 'Sea - icon .png', '2020-01-05 05:56:32', '2020-01-05 05:56:32'),
(2, 'Culture', 'Culture - icon .png', '2020-01-05 05:56:49', '2020-01-05 05:56:49'),
(3, 'Religi', 'Religi - icon .png', '2020-01-05 05:57:11', '2020-01-05 05:57:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `users_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('admin','staff') COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`users_id`, `name`, `email`, `password`, `status`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator@gmail.com', '$2y$10$3rnuwQI1MExQ.O7vkkYK7OnzRHcmFtaSl.j9JHDns1D2TDEmGg.OC', 'admin', 'default_admin.png', '2020-01-05 12:35:58', NULL),
(2, 'Jakaria', 'jakariaaa27@gmail.com', '$2y$10$Calc2f8Oe84uxkSkua6oR.DAC8q7ab4GgVlX9SYfZ36mx4GZ2vpWu', 'staff', 'Jakaria - photo .jpg', '2020-01-05 05:59:35', '2020-01-05 05:59:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `city_province_id_foreign` (`province_id`);

--
-- Indeks untuk tabel `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`dest_id`),
  ADD KEY `destination_province_id_foreign` (`province_id`),
  ADD KEY `destination_city_id_foreign` (`city_id`),
  ADD KEY `destination_type_id_foreign` (`type_id`),
  ADD KEY `destination_users_id_foreign` (`users_id`);

--
-- Indeks untuk tabel `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`guide_id`),
  ADD KEY `guide_dest_id_foreign` (`dest_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indeks untuk tabel `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `city`
--
ALTER TABLE `city`
  MODIFY `city_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `destination`
--
ALTER TABLE `destination`
  MODIFY `dest_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `guide`
--
ALTER TABLE `guide`
  MODIFY `guide_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `province`
--
ALTER TABLE `province`
  MODIFY `province_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `type`
--
ALTER TABLE `type`
  MODIFY `type_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `users_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `destination`
--
ALTER TABLE `destination`
  ADD CONSTRAINT `destination_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `destination_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `destination_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `destination_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guide`
--
ALTER TABLE `guide`
  ADD CONSTRAINT `guide_dest_id_foreign` FOREIGN KEY (`dest_id`) REFERENCES `destination` (`dest_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
