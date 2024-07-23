-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 09:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manga`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `chapter` float NOT NULL,
  `papers` int(11) DEFAULT NULL,
  `manga` int(11) NOT NULL,
  `user` int(120) NOT NULL,
  `isSexy` varchar(12) NOT NULL DEFAULT 'false',
  `size` int(11) NOT NULL,
  `compressed` varchar(12) NOT NULL DEFAULT 'false',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`id`, `chapter`, `papers`, `manga`, `user`, `isSexy`, `size`, `compressed`, `date`) VALUES
(53, 1, 54, 17, 1, 'false', 0, 'true', '2023-07-20 10:41:20'),
(54, 2, 25, 17, 1, 'false', 0, 'true', '2023-07-20 11:10:39'),
(55, 3, 24, 17, 1, 'false', 0, 'true', '2023-07-20 20:58:02'),
(57, 190, 37, 11, 1, 'false', 0, 'true', '2023-08-12 15:42:36'),
(58, 1090, 14, 2, 1, 'false', 0, 'true', '2023-08-12 16:49:58'),
(59, 1, 2, 2, 1, 'false', 0, 'true', '2023-08-13 23:18:49'),
(60, 1, 8, 1, 1, 'false', 0, 'true', '2023-08-21 05:39:17'),
(61, 2, 6, 1, 1, 'false', 0, 'true', '2023-08-21 05:50:24'),
(62, 3, 2, 1, 1, 'false', 0, 'true', '2023-08-21 05:58:05'),
(63, 1, 2, 4, 1, 'false', 0, 'true', '2023-08-24 03:51:55'),
(64, 11, 2, 2, 1, 'false', 376507, 'true', '2023-08-24 21:21:36'),
(67, 44, 23, 17, 1, 'false', 3195677, 'true', '2023-10-12 02:29:35'),
(68, 1103, 14, 2, 1, 'false', 3490446, 'false', '2024-01-05 13:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `chapter_view`
--

CREATE TABLE `chapter_view` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `manga` int(11) NOT NULL,
  `chapter` int(11) NOT NULL,
  `save_page` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chapter_view`
--

INSERT INTO `chapter_view` (`id`, `user`, `manga`, `chapter`, `save_page`, `date`) VALUES
(87, 9, 2, 1, 0, '2024-02-23 06:16:50'),
(88, 9, 2, 11, 1, '2024-06-19 06:40:26'),
(89, 9, 2, 1090, 0, '2023-08-28 03:58:51'),
(90, 9, 4, 1, 1, '2023-08-28 04:16:40'),
(91, 11, 4, 1, 1, '2023-08-28 04:13:56'),
(92, 9, 17, 44, 0, '2024-06-06 11:46:17'),
(93, 9, 1, 3, 0, '2024-02-23 11:04:56'),
(94, 9, 2, 1103, 0, '2024-06-19 06:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `message` longblob NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `id_user`, `Subject`, `message`, `Date`) VALUES
(1, 9, 'رسالة جديدوةة ', 0xd8b1d8b3d8a7d984d8a920d988d988d8b5d98120d988d8b4d8b1d8ad20d8b7d988d98ad984d8a9203f3f3f3f3f3f3f3fe29aa13f3f3f3fe29aa13f3f3f3fe29aa13f3f3f3fe29aa13f3f3f3fe29aa13f3f3f3fe29aa13f3f3f3fe29aa13f3f3f3fe29aa13f3f3f3fe29aa13f3f3f3fe29aa13f3f3f3f3f3f3f3fe29aa13f3f3f3fe29aa13f3f3f3fe29aa13f3f3f3fe29aa13f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f3f20, '2023-07-22 22:19:53'),
(2, 9, 'سي جداا', 0xf09f988ff09f988f, '2023-08-28 04:02:48'),
(3, 1, 'jnj', 0x6474647464, '2024-01-31 19:09:47'),
(4, 1, 'مووضوووع', 0xd8b1d8b3d8a7d984d8a9, '2024-01-31 19:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `manga` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `manga`, `userid`, `date`) VALUES
(1, 1, 9, '2023-08-11 04:01:31'),
(2, 8, 9, '2023-08-17 11:04:06'),
(5, 11, 11, '2023-08-19 05:34:27'),
(6, 17, 11, '2023-08-19 05:34:29'),
(7, 13, 11, '2023-08-19 05:34:34'),
(8, 10, 11, '2023-08-19 05:34:55'),
(29, 2, 9, '2024-02-23 09:17:23'),
(30, 15, 9, '2024-02-23 12:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `manga`
--

CREATE TABLE `manga` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subname` varchar(250) DEFAULT NULL,
  `Type` varchar(45) NOT NULL,
  `description` longtext NOT NULL,
  `image1` varchar(120) DEFAULT NULL,
  `genre` text DEFAULT NULL,
  `written` varchar(45) DEFAULT NULL,
  `drawer` varchar(50) DEFAULT NULL,
  `state` varchar(25) NOT NULL DEFAULT 'مُستمر',
  `Published` varchar(12) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `r_age` int(11) NOT NULL DEFAULT 12,
  `userid` bigint(255) DEFAULT NULL,
  `youtube_url` text DEFAULT NULL,
  `view_total` int(11) NOT NULL DEFAULT 0,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manga`
--

INSERT INTO `manga` (`id`, `name`, `subname`, `Type`, `description`, `image1`, `genre`, `written`, `drawer`, `state`, `Published`, `rate`, `r_age`, `userid`, `youtube_url`, `view_total`, `creationdate`) VALUES
(1, 'Hokuto no Ken', NULL, 'Manga', 'Fist of The North Star قبضة نجم الشمال وتنطق ‏، وسمي في الدبلجة العربية سيف النار، هي سلسلة مانغا يابانية من تأليف برونسون ورسوم تتسو هارا واقتبست إلى مسلسل أنمي تلفزيوني، عرض في 11 أكتوبر عام 1984 حتى 5 مارس عام 1987.', '1.jpg', 'اكشن, رعب, فنون قتال', 'برونسون', NULL, 'مُنتهي', '1983', 8.1, 12, 1, NULL, 2652, '2022-09-13 00:32:55'),
(2, 'One Piece', 'ون بيس', 'Manga', 'وَن بيس، هي سلسلة مانغا يابانية من تأليف ورسم إييتشيرو أودا. سُلسِلت المانغا في شونن جمب الأسبوعية منذ 4 أغسطس 1997؛ تُنشر الفصول المفردة في مجلدات تانكوبون من قِبل شوئيشا مع كون الإصدار الأوَّل في 14 ديسمبر 1997.', '2.jpg', 'مغامرة,   كوميديا,   شونين', 'إييتشيرو أودا', 'إييتشيرو أودا', 'مُستمر', '1997', 8.67, 12, 1, 'https://www.youtube.com/watch?v=fX9NK-_YqlI', 1132, '2022-11-14 13:05:42'),
(3, 'Hunter × Hunter', NULL, 'Manga', 'تدور القصة حول صبي يُدعى (غون) يعلم أن والده في الواقع يتمتع بصحة جيدة وعلى قيد الحياة تمامًا عندما يسمع أنه قد مات ، و (غون) الذي اكتشف أن والده (جينغ) هو صياد أسطوري. من الأفراد الذين أثبتوا أنهم من النخبة البشرية المتخصصة في اكتشاف المخلوقات النادرة والكنوز السرية وغيرها. يتخلى جينغ عن ابنه ويسعى لتحقيق حلمه مع أقاربه ، لكن غون قرر أن يسير على خطى والده ، واجتياز امتحان الصياد الصعب ، والعثور تدريجيًا على أب سيصبح صيادًا بإمكانياته.', '3.jpg', 'اكشن, مغامرة, شونين', 'يوشيهيرو توغاشي', NULL, 'مُستمر', '1998', 8.71, 12, 1, NULL, 129, '2022-08-10 19:14:22'),
(4, 'Dr. Stone', NULL, 'Manga', 'دكتور ستون ‏ هي سلسلة مانغا يابانية من تأليف ريتشيرو إيناغاكي ورسم بويتشي، نشرت من قبل شوئيشا في مجلة شونن جمب الأسبوعية منذ 6 مارس عام 2017. اقتبست المانغا إلى أنمي تلفزيوني من قبل استوديو طوكيو موفي شينشا، عرض الأنمي منذ 5 يوليو 2019 واستمر لغاية 13 ديسمبر من نفس العام بتعداد 24 حلقة. ', '4.jpg', 'كوميديا, خيال, عائلي, ذكاء', 'ريتشيرو إيناجاكي', NULL, 'مُنتهي', '2017', 8.2, 12, 1, NULL, 183, '2022-08-10 19:21:28'),
(5, 'Shingeki No Kyojin', NULL, 'Manga', 'هجوم العمالقة العمالقة وهِيّ سلسلة مانغا يابانية مِن تأليفِ ورسمِ هاجيمي إيساياما. وتقعُ أحداثها فِي عالمٍ خيالِي حيثُ يعيشُ البشرُ داخل أراضٍ محاطة بثلاثة أسوار ضخمة تحميهم من عمالقةٍ يأكلون البشر، تبدأُ الأحداثُ حِين يتم اختراق أحد الأسوار وهُو سُور ماريا حيثُ تقُومُ العمالقة بإبادةِ ثُلثِ البشرية.\r\n\r\nبدأت سلسلةُ المانغا لأوّلِ مرة فِي مجلةِ في كودانشا، بيساتسو شونن في 9 سبتمبر 2009. وقد تم جمعها في 28 مجلد تانكوبون اعتبارًا من أبريل 2019. لاقت سلسلة هجوم العمالقة نجاحاً تجارياً، واعتبارًا من أبريل 2019 تم طبع ما يقرب من 90 مليون نسخة تانكوبون في جميع أنحاء العالم (80 مليون في اليابان و 10 ملايين خارج اليابان)، مما يجعلها واحدة من سلسلة المانغا الأكثر مبيعا. وقد فازت بجوائز عديدة، مثل جائزة كودانشا للمانغا،جوائز ميشيلوزي، و جائزة هارفي.', '5.jpg', 'سينين, اكشن, إنتقام', 'هاجيمي إيساياما', NULL, 'مُنتهي', '2009', 8.6, 18, 1, NULL, 127, '2022-08-10 19:24:15'),
(6, 'Solo Leveling', NULL, 'Manhwa', 'سولو ليفلينج ‏ التي تُرجمت أيضًا بدلًا من ذلك بعبارة «أنا فقط في المستوى الأعلى»، هي رواية إنترنت كورية جنوبية كتبها تشوجونغ. تُسلسِلت في منصة للرسوم الهزلية الخيالية ونشرت لأول مرة في 25 يوليو 2016، تم تحويلها لويبتونز نشرت في مارس 2018، ووُضحت بوساطة جانغ سوك راك، الرئيس التنفيذي لريديك ستوديو. ', '6.jpg', 'فنتازيا, مغامرة, اكشن', 'Chugong', NULL, 'مُستمر', '2016', 8.7, 12, 1, NULL, 38, '2022-08-10 19:24:40'),
(7, 'Bleach', NULL, 'Manga', 'بليتش‏ هي مانغا يابانية من فئة الشونن من تأليف رسام المانغا الياباني تايت كوبو، بليتش يتّبع أحداث قصة \"إيتشيغو كوروساكي\" بعد اكتسابه لطاقة الشينيغامي (死神 شينيغامي؟، تعني حرفيا \"إله الموت\") من شينيغامي آخر، ونظرًا لاكتسابه هذه الطاقة الجديدة فهو عليه القيام بواجبات الشينيغامي، والتي هي هزيمة الأرواح الشريرة والتي تسمى المجوفين أو الهولو (بالإنجليزية: Hollow)‏ وقيادتهم إلى الحياة.', '7.jpg', 'خيال, اكشن, مغامرة', 'Kubo Tite', NULL, 'مُنتهي', '2001', 7.8, 12, 1, NULL, 71, '2022-08-10 19:27:37'),
(8, 'Dragon Ball Super', NULL, 'Manga', 'قصة مانغا Dragon Ball Super .. من خلال إعادة توحيد شخصيات الامتياز الشهيرة ، يتبع دراغون بول سوبر آثار معركة غوكو الشرسة مع ماجين بو وهو يحاول الحفاظ على سلام الأرض الهش.', '8.jpg', 'مغامرة, شونين, اكشن', 'اكيرا تورياما', NULL, 'مُستمر', '2015', 7.26, 12, 1, NULL, 871, '2022-08-10 19:29:44'),
(9, 'Death Note', NULL, 'Manga', 'قصة مانجا Death Note مفكرة الموت تدور عندما يُسقط ريوك -زعيم الموت- مذكرة الموت الخاصة به في عالم البشر من أجل المتعة الشخصية. في اليابان، يتعثر طالب المدرسة الثانوية المذهل شديد الذكاء “لايت ياجامي” عليها. داخل مفكرة الملاحظات، وجد رسالة تقشعر لها الأبدان: أولئك الذين كتبت أسماؤهم فيها سيموتون. طبيعتها غير المنطقية تسلي الضوء. لكن عندما يختبر قوتها من خلال كتابة اسم مجرم فيه، فإنهم فجأة يواجهون زوالهم.\r\n\r\nمن خلال إدراك إمكانات مذكرة الموت الهائلة، يبدأ لايت سلسلة من جرائم القتل الشائنة تحت الاسم المستعار “كيرا” ، متعهداً بتطهير العالم من الأفراد الفاسدين وإنشاء مجتمع مثالي حيث تتوقف الجريمة عن الوجود. ومع ذلك، أدركت الشرطة بسرعة، وطلبوا مساعدة المحقق إل L – العقل المدبر – للكشف عن الجاني.', '9.jpg', 'خيال, شونين, غموض', 'اوباتا تاكيشي', NULL, 'مُنتهي', '2003', 8.7, 12, 1, NULL, 77, '2022-08-10 19:30:57'),
(10, 'Vinland Saga', NULL, 'Manga', 'قصة مانغا Vinland Saga تدور حول ثورفين ابن أحد أعظم محاربي الفايكنج ، هو من بين أفضل المقاتلين في فرقة المرتزقة المرحة التي يديرها أسكيلاد الماكرة ، وهو إنجاز رائع لشخص في مثل عمره. ومع ذلك ، فإن ثورفين ليس جزءًا من مجموعة النهب الذي ينضم إليها، لأنه تسبب في مأساة كبيرة لعائلته ، فقد تعهد الصبي بقتل أسكيلاد في مبارزة عادلة. لم يكن ثورفين ماهرًا بما يكفي لإلحاق الهزيمة به ، لكنه غير قادر على التخلي عن ثأره ، يقضي طفولته مع طاقم المرتزقة ، ويصقل مهاراته في ساحة المعركة بين الدنماركيين المحبين للحرب ، حيث القتل هو مجرد متعة أخرى في الحياة.', '10.jpg', 'دراما, اكشن, مغامرة', ' Yukimura, Makoto', NULL, 'مُستمر', '2005', 9, 12, 1, NULL, 59, '2022-08-10 19:31:58'),
(11, 'One Punch Man', NULL, 'Manga', 'بعد تدريب صارم لمدة ثلاث سنوات ، اكتسب Saitama العادي قوة هائلة تسمح له بإخراج أي شخص وأي شيء بلكمة واحدة فقط. قرر استخدام مهارته الجديدة بشكل جيد من خلال أن يصبح بطلاً. ومع ذلك ، سرعان ما يشعر بالملل من هزيمة الوحوش بسهولة ، ويريد من شخص ما أن يعطيه تحديًا لإعادة شرارة كونه بطلاً.', '11.jpg', 'كوميديا, خيال, فنون قتال', 'Murata, Yusuke', NULL, 'مُستمر', '2013', 8.75, 12, 1, NULL, 228, '2022-09-23 10:43:54'),
(12, 'Detective Conan', NULL, 'Manga', 'مانجا المحقق كونان : يستخدم المحقق في المدرسة الثانوية شينيتشي كودو ، الذي تم الترحيب به باعتباره المنقذ لقسم الشرطة اليابانية ، مزيجًا من مهارات الملاحظة والتفكير النقدي والمعرفة الشاملة لحل القضايا التي تترك الشرطة في حيرة من أمرها. ذات يوم ، أثناء نزهة مع صديق الطفولة ران موري ، شهد شينيتشي على صفقة مشبوهة بين رجلين وتم القبض عليه. نتيجة لذلك ، يُجبر على تناول سم من المفترض أن يقتله ، ولكن بشكل غير متوقع يتقلص جسده إلى حجم طالب في المدرسة بدلاً من ذلك. يُعتقد الآن أنه ميت ، يأخذ شينيتشي الاسم المستعار كونان إيدوغاوا (مركب لأسماء مؤلفي الألغاز المشهورين آرثر كونان دويل ورانبو إيدوغاوا) من أجل إخفاء هويته ويبدأ حياته الجديدة كطفل يبلغ من العمر سبع سنوات العيش مع ران ووالدها المباحث الخاص.', '12.jpg', 'جريمة, ذكاء, غموض', 'Aoyama, Gosho', NULL, 'مُستمر', '1994', 8.29, 12, 1, NULL, 505, '2022-09-25 07:57:14'),
(13, 'Batman', NULL, 'Comics', 'باتمان هي سلسلة كتب كوميدية أمريكية مستمرة تتميز ببطلها الرئيسي باتمان من DC Comics. ظهرت الشخصية ، التي أنشأها Bill Finger و Bob Kane ، لأول مرة في Detective Comics رقم 27 (غلاف مؤرخ في مايو 1939). أثبت باتمان أنه شائع جدًا لدرجة أن سلسلة كتب كوميدية مستمرة تحمل عنوانًا ذاتيًا بدأ نشرها بتاريخ غلاف ربيع عام 1940. تم الإعلان عنها لأول مرة في أوائل أبريل عام 1940 ، بعد شهر واحد من الظهور الأول لصديقه الجديد ، روبن الصبي العجائب. أثبتت كاريكاتير باتمان أنها تحظى بشعبية منذ الأربعينيات.', '13.jpg', 'رعب, جريمة, اكشن', 'Chip Zdarsky', NULL, 'مُستمر', '0', 9, 12, 1, NULL, 63, '2023-05-31 10:13:17'),
(14, 'Chainsaw Man', NULL, 'Manga', 'مانجا رجل المنشار : “دينجي” لديه حلم بسيط، أن يعيش حياة سعيدة وسلمية، ويقضي الوقت مع فتاة يحبها. لكن هذا بعيد كل البعد عن الواقع، حيث عصابة الياكوزا أجبرت “دينجي” على قتل الشياطين من أجل سداد ديونه الساحقة. باستخدام شيطانه الأليف “بوشيتا” كسلاح، فهو مستعد لفعل أي شيء مقابل القليل من المال. لسوء الحظ، تنتهي حياته العديمة الفائدة وقُتل على يد شيطان متعاقد مع الياكوزا. لكن، في تحول غير متوقع للأحداث، يندمج “بوشيتا” مع جثة “دينجي” ويمنحه قدرات شيطان المنشار. الآن هو قادر على تحويل أجزاء من جسده إلى مناشير، ويستخدم “دينجي” الذي تم إحياؤه قدراته الجديدة لقتل أعدائه بسرعة ووحشية. جذب انتباه صائدي الشياطين الرسميين الذين وصلوا إلى مكان الحادث، وعرض عليه العمل في مكتب السلامة العامة كواحد منهم. الآن يمكن أن يواجه حتى أعداء أقوى، ولكن لن يتوقف “دينجي” عند أي شيء لتحقيق أحلام المراهقين البسيطة التي يرغب بها.', '14.jpg', 'رعب, اكشن, عنف', 'Fujimoto Yuuki', NULL, 'مُستمر', '0', 8, 12, 1, NULL, 42, '2023-06-30 07:58:36'),
(15, 'Naruto Shippuden', NULL, 'Manga', 'هاجم الثعلب الأسطوري ذو التسعة ذيول قرية كونوها وقتل العديد من سكانها وأحلَّ بها الدمار، تصدى له الهوكاغي الرابع، فضحى بحياته ليستعمل عليه أحد تقنيات الختم التي ختم بها إياه في جسد مولودٍ جديد، وهذا المولود هو \"أوزوماكي ناروتو\".', '15.jpg', 'كوميديا, دراما, شونين', 'Kishimoto Masashi', NULL, 'مُستمر', '0', 8.8, 12, 1, NULL, 23, '2023-06-30 09:45:12'),
(16, 'jujutsu kaisen', 'Sorcery Fight , مكافحة السحر , جوجوتسو كايسن', 'Manga', 'في عالم تتغذى فيه الشياطين على البشر الذين بدأو بخسارة أنفسهم، ضاعت شظايا الشيطان الأسطوري والمخيف “ريومين سوكونا” وتفرقت. إذا استهلك أي شيطان أجزاء من جسم “سوكونا”، فإن القوة التي يكتسبونها يمكن أن تدمر العالم الذي نعرفه. لحسن الحظ، هناك مدرسة غامضة من السحرة “جوجوتسو” الذين يعيشون لحماية هذا الكون الغير المستقر، من الشياطين والموتى الأحياء! “ايتادوري يووجي” هو طالب في المدرسة الثانوية يمضي أيامه في زيارة جده طريح الفراش. على الرغم من أنه يبدو مثل المراهق العادي، إلا أن قوته الجسدية الهائلة شيء يستحق الانتباه! كل ناد رياضي يرغب منه أن ينضم إليه، لكن “ايتادوري” يفضل التسكع مع منبوذي المدرسة في نادي الغموض والخوارق. في أحد الأيام، تمكن النادي من وضع أيديهم على جسم ملعون مختوم، لكن ليست لديهم أي فكرة عن الرعب الذي سيطلقونه عندما يكسرون الختم…', '16.jpg', 'رعب, اكشن, عنف', 'Akutami Gege', 'Akutami Gege', 'مُستمر', '2018', 8.52, 12, 1, NULL, 29, '2023-07-02 06:55:16'),
(17, 'Kimetsu no Yaiba', 'Demon Slayer قاتل الشياطين', 'Manga', 'تانجيرو هو الابنُ الأكبرُ لعائلته التي فقدت عائلها. وفي أحدِ الأيام، يُخاطرُ تانجيرو بالذهابِ إلى قريةٍ أخرى لبيعِ الفحم. ولكن نظرًا لحلولِ الليل وانتشارِ إشاعاتٍ بوجودِ شياطينَ تجولُ قريبًا في الجبال، ينتهي بهِ الحالُ بأن يبيتَ ليلتهُ في منزلِ شخصٍ آخرَ بدلًا من العودةِ إلى منزله، وحينَ يصلُ إلى منزلهِ في الصباحِ التالي، يجدُ مأساةً مريعةً في انتظاره...', '17.jpg', 'اكشن, مغامرة, شونين', 'Gotouge Koyoharu', 'Gotouge Koyoharu', 'مُنتهي', '2016', 8.56, 12, 1, NULL, 396, '2023-07-02 10:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image1` text NOT NULL,
  `description` longtext NOT NULL,
  `user` int(11) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image1`, `description`, `user`, `creationdate`) VALUES
(1, 'Kimetsu no Yaiba', '2022-11-05-16-43-53 - 59802255.png', 'الموسم الثالث من قاتل الشياطين سيدور حول سفر “تانجيرو” إلى قرية صانع السيوف لاستبدال سيفه لأن “هوتارو هاغانيزويكا” تعب من إصلاحه ', 1, '2022-04-06 15:23:52'),
(2, 'Dragon Ball Super', '2.jpg', 'تم اقتباس شخصية بيروس من قطة فرعونية يمتلكها اكيرا تورياما', 1, '2022-07-03 20:37:47'),
(3, 'Hokto No Ken', '2022-11-05-15-39-06 - 1621390037.jpg', 'يعتبر من أكثر الانميات نجاحاً وتحقيقاً للارباح ومن اوائل بداية عصر الانمي العظيم', 1, '2022-11-05 14:35:53'),
(4, 'One Piece', '3.jpg', 'عاجل ورسميا الحلقة المنتظرة من أنمي ون بيس التي\nستشهد تحول لوفي للجير الخامس و ايقاظ الفاكهة\nستكون أغلى حلقة في تاريخ عالم الأنمي بتكلفة فوق\nالـ 5 مليون دولار و سوف تعرض بعد شهر فقط', 1, '2023-07-13 14:36:34'),
(12, 'hhh', '64e2f84565b11.jpg', 'bbvvb', 1, '2023-08-21 05:38:13'),
(14, 'ccc', '64e2fdfabe4d3.jpg', 'vvvvcvv', 1, '2023-08-21 06:02:34'),
(15, 'One Piece', '64f1804b51438.jpg', 'عاجل ورسميا الحلقة المنتظرة من أنمي ون بيس التي\nستشهد تحول لوفي للجير الخامس و ايقاظ الفاكهة\nستكون أغلى حلقة في تاريخ عالم الأنمي بتكلفة فوق\nالـ 5 مليون دولار و سوف تعرض بعد شهر فقط', 1, '2023-09-01 06:10:19'),
(16, 'خبر محزن', '65ea8dc317714.jpg', 'وفاة مؤلف سلسلة دراقون بول اكيرا تورياما ????', 1, '2024-03-08 04:02:11'),
(17, 'gtgtgtg', '6692d1587bf23.jpg', 'bbbbbbbbbbbbbbbbb', 1, '2024-07-13 19:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `manga` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `manga`, `rate`, `user_id`, `date`) VALUES
(1, 17, 8, 9, '2023-08-15 08:10:26'),
(2, 7, 7, 9, '2023-08-13 19:54:09'),
(3, 11, 9, 9, '2023-08-13 22:20:11'),
(4, 1, 8, 9, '2023-08-14 16:49:35'),
(5, 2, 6, 9, '2023-08-14 20:27:44'),
(6, 17, 0, 1, '2023-10-24 19:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `type` varchar(12) NOT NULL,
  `request` varchar(120) NOT NULL,
  `note` blob DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `type`, `request`, `note`, `user_id`, `date`) VALUES
(1, 'مانجا', 'قاتل الشياطين', 0xd985d8a7d986d8acd8a720d985d985d8aad8b9d8a920d8acd8afd8a720d8a7d986d8b5d8ad20d8a8d987d8a7, 9, '2022-07-27 00:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image1` varchar(120) NOT NULL DEFAULT 'img_avatar1.png',
  `bio` text DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `facebook` varchar(200) DEFAULT NULL,
  `telegram` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `type` varchar(55) NOT NULL DEFAULT 'user',
  `born` varchar(55) DEFAULT NULL,
  `gender` varchar(55) DEFAULT 'ذكر',
  `country` varchar(55) DEFAULT NULL,
  `loginFrom` varchar(50) NOT NULL DEFAULT 'Google',
  `isDeleted` varchar(12) NOT NULL DEFAULT 'false',
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `image1`, `bio`, `verified`, `facebook`, `telegram`, `instagram`, `type`, `born`, `gender`, `country`, `loginFrom`, `isDeleted`, `creationdate`, `updationdate`) VALUES
(1, 'Mahmoud Shamran', 'admin_Mahmoud', 'Mahmoud.shmran88@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'img_avatar1.png', 'Senior Full Stack Developer 🥈 Desktop & Android & IOS & Web', 0, 'https://www.facebook.com/Mahmoud.Shmran/', 'https://t.me/pr_mah99', 'https://www.instagram.com/pr_mah99/', 'Admin', NULL, 'ذكر', '', 'Google', 'false', '2022-02-14 17:32:59', '2024-07-23 07:10:28'),
(2, 'Hawra Pro', 'admin_Hawra', 'Hawra22@gmail.com', 'yvaFKOwjAH+vMw==', 'img_avatar2.png', NULL, 0, NULL, NULL, NULL, 'Admin', NULL, 'انثى', '', 'Google', 'false', '2022-07-20 16:18:03', '2023-08-28 08:27:19'),
(3, 'Aliaa Pro', 'admin_Aliaa', 'Aliaa13@gmail.com', 'c3c1b6b43180c597c85a1ed7dc04bbee', 'img_avatar2.png', NULL, 0, NULL, NULL, NULL, 'Admin', NULL, 'انثى', '', 'Google', 'false', '2022-07-20 16:18:03', '2023-08-28 08:27:16'),
(4, 'Abbas Saleh', 'admin_Abbas', 'asas@gmail.com', 'c3c1b6b43180c597c85a1ed7dc04bbee', 'img_avatar1.png', NULL, 0, NULL, NULL, NULL, 'Admin', NULL, 'ذكر', '', 'Google', 'false', '2022-07-20 16:18:03', '2023-08-28 08:27:23'),
(5, 'Mostafa Salman', 'admin_Mostafa', 'Moss2@gamil.com', 'c3c1b6b43180c597c85a1ed7dc04bbee', 'img_avatar1.png', NULL, 0, NULL, NULL, NULL, 'Admin', NULL, 'ذكر', '', 'Google', 'false', '2022-07-20 16:18:03', '2023-08-28 08:27:29'),
(6, 'Ibrah Shamranem', 'admin_Ibrahim ', 'ibrah22@gmail.com', 'c3c1b6b43180c597c85a1ed7dc04bbee', 'img_avatar1.png', NULL, 0, NULL, NULL, NULL, 'Admin', NULL, 'ذكر', '', 'Google', 'false', '2022-07-21 22:17:31', '2023-08-28 08:27:37'),
(7, 'Ahmed Barakat', 'admin_Ahmed', 'Ahmed22@gmail.com', 'c3c1b6b43180c597c85a1ed7dc04bbee', 'img_avatar1.png', NULL, 0, NULL, NULL, NULL, 'Admin', NULL, 'ذكر', '', 'Google', 'false', '2022-07-21 22:17:31', '2023-08-28 08:27:41'),
(8, 'Mariam Rahem', 'admin_Mariam', 'Mariam.rh12@gmail.com', 'c3c1b6b43180c597c85a1ed7dc04bbee', 'img_avatar2.png', NULL, 0, NULL, NULL, NULL, 'Admin', NULL, 'انثى', '', 'Google', 'false', '2022-07-22 10:22:09', '2023-08-28 08:27:45'),
(9, 'محمود شمران عذيب جبل', 'pr_mah99', 'mahmoud.shmran88@gmail.com', NULL, '64a9f05074173.jpg', NULL, 0, NULL, NULL, NULL, 'user', '2023-07-13', 'ذكر', 'العراق', 'Google', 'false', '2023-07-08 23:23:36', '2024-02-22 21:18:53'),
(10, 'Luca For Programmers', 'luca', 'ismail@gmail.com', NULL, '64d690a55ba5b.jpg', NULL, 0, NULL, NULL, NULL, 'user', NULL, 'ذكر', NULL, 'Google', 'false', '2023-08-11 19:48:53', '2024-07-23 07:10:58'),
(11, 'Mahmoud Shamran', '1812283332', 'mahmoud.shmran88@gmail.com', NULL, '64e841a0a3074.jpg', NULL, 0, NULL, NULL, NULL, 'user', NULL, 'ذكر', NULL, 'Facebook', 'false', '2023-08-25 05:52:32', '2023-08-25 05:52:48'),
(12, 'Mahmoud Shamran', '1301930375', 'Mahmoud.shmran88@gmail.com', NULL, '64f2ce4140469.jpg', NULL, 0, NULL, NULL, NULL, 'user', NULL, 'ذكر', NULL, 'Apple', 'false', '2023-09-02 05:55:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapter_view`
--
ALTER TABLE `chapter_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `chapter_view`
--
ALTER TABLE `chapter_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `manga`
--
ALTER TABLE `manga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
