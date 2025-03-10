-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2025 at 11:11 PM
-- Server version: 10.5.28-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ElitePixel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `name`, `user`, `password`) VALUES
(1, 'จีราภร', 'admin', '$2y$10$NS9hFMI8Ps2NMOdw2XW32ue91JIgcjUqzwXNqbg7TDnJODB.hmr02');

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `Id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`Id`, `name`) VALUES
(1, 'Keyboard'),
(2, 'Gaming Laptop'),
(3, 'Mouse'),
(4, 'Gaming Chair'),
(5, 'Gaming Mic'),
(6, ' Joy Stick & Console\r\n'),
(7, 'Speaker'),
(8, 'Screen'),
(9, 'Earphones');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `firstname`, `lastname`, `phone`, `username`, `password`) VALUES
(000001, 'จีราภร', 'ปานกุลพานิชย์', 631133439, 'user', '$2y$10$dMJOJu9EwGbmxEJVOQP1oOerjwbB0ynTOnx8dT6TBdzm5CCf/ZwZG'),
(000002, 'สมชาย', 'ปานกุลพานิชย์', 954563254, 'somshi', '$2y$10$VMQzfZ/QePbqWs5f47Z4QOARjaLkrK8jVDi85w8k.Wa94g3DyRLxW'),
(000003, 'en', 'ter', 25, 'enter', '$2y$10$hdGfiT4Z39l59WSf7X/u5OYCZrmtRSNXUsBXB.2dFRo2.mi1YGABq'),
(000004, 'log', 'in', 25, 'login', '$2y$10$ElGOE2LomF9c9u6RkM1miOEzjYkwxX13TL.ExB44R/Nk08sTjjVx2');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `Iditem` int(5) NOT NULL,
  `Categories` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Detail` text NOT NULL,
  `Price` float NOT NULL,
  `Ext` varchar(50) NOT NULL,
  `Num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`Iditem`, `Categories`, `Name`, `Detail`, `Price`, `Ext`, `Num`) VALUES
(101, 1, ' Gconic A98 Ultra', 'คีย์บอร์ดเกมมิ่ง Gconic A98 Ultra เป็นคีย์บอร์ดเกมมิ่งที่มาพร้อมกับนวัตกรรมสูงสุดของไทยในโลกของคีย์บอร์ดเมคานิคอล ดีไซน์บางเฉียบและสีที่เป็นเอกลักษณ์ของแบรนด์ Gconic ด้วย Layout แบบ 98% ทำให้ Gconic A98 ประหยัดพื้นที่ทำงานมากกว่าเดิม แต่ยังคงใช้งานง่าย เชื่อมต่อได้หลากหลายแบบไม่มีดีเลย์รองรับการใช้งานผ่าน Window,MacOS พร้อมด้วยความสวยงามที่เข้ากับโต๊ะทำงานได้ทุกรูปแบบ\r\n\r\nมีไฟ RGB ปรับโหมดได้มากกว่า 17 โหมด\r\nรองรับระบบปฏิบัติการ Window , MacOs\r\nเชื่อมต่อได้ทั้ง USB , Wireless 2.4GHz และ Bluetooth 5.0\r\nรองรับ Hot-Swappable ถอดเปลี่ยนสวิตช์ได้เลย ไม่ต้องบัดกรี', 3990, 'jpg', 6),
(102, 1, 'Ajazz Gaming Keyboard AK832 Pro Black', 'คีย์บอร์ดเกมมิ่ง Ajazz Gaming Keyboard AK832 Pro Black คือคีย์บอร์ดเกมมิ่งที่มาพร้อมกับคุณสมบัติและสเปกที่ทันสมัย ทำให้เป็นตัวเลือกที่เหมาะสำหรับนักเล่นเกมทุกคนที่ต้องการประสบการณ์การใช้งานที่เพลิดเพลินและมีประสิทธิภาพสูงในทุก ๆ การใช้งาน\r\n\r\nมาพร้อมไฟ RGB\r\nรองรับระบบปฏิบัติการ Windows,MacOS\r\nคีย์บอร์ดเกมมิ่ง Ajazz Gaming Keyboard AK832 Pro Black คือคีย์บอร์ดเกมมิ่งที่มาพร้อมกับคุณสมบัติและสเปกที่ทันสมัย ทำให้เป็นตัวเลือกที่เหมาะสำหรับนักเล่นเกมทุกคนที่ต้องการประสบการณ์การใช้งานที่เพลิดเพลินและมีประสิทธิภาพสูงในทุก ๆ การใช้งาน\r\n\r\nมาพร้อมไฟ RGB\r\nรองรับระบบปฏิบัติการ Windows,MacOS\r\nการเชื่อมต่อ สาย Type-C, wireless 2.4Ghz, Bluetooth', 2290, 'jpg', 3),
(103, 1, 'Neolution E-Sport Galactus', 'Neolution E-Sport Galactus คีย์บอร์ดเกมมิ่ง ขนาดกะทัดรัด พกพาสะดวก ใช้งานแบบเสียบสาย สามารถถอดได้ ออกแบบมาเพื่อเกมเมอร์โดยเฉพาะ ทั้งเรื่องดีไซน์และฟังก์ชันการใช้งาน ตอบโจทย์ทุกสไตล์การใช้งานของคุณ\r\n\r\nคีย์บอร์ดขนาด 65%\r\nไฟ LED สูงสุด 19 โหมด\r\nกดปุ่มได้ 50 ล้านครั้ง\r\nรองรับการเชื่อมต่อแบบ Wired', 600, 'jpg', 3),
(201, 2, 'Asus Zenbook S 14 ', 'Asus Zenbook S 14 OLED (UX5406) สัมผัสประสบการณ์พลัง AI ที่จะเปลี่ยนแปลงโลกด้วย Zenbook S 14 ซึ่งเป็น ASUS Copilot+ PC ยุคใหม่ที่ผสมผสานดีไซน์บางเฉียบเพียง 1.1 ซม. ขับเคลื่อนด้วยโปรเซสเซอร์ Intel Core Ultra (Series 2) รุ่นล่าสุด\r\n\r\nCPU: Intel Core Ultra 7 258V (1.8 GHz up to 4.8 GHz, 8C/8T, 12MB Intel Smart Cache, Intel AI Boost)\r\nGraphics: Intel Arc Graphics\r\nRAM: 32GB LPDDR5X\r\nSSD: 1TB NVMe PCIe 4.0', 62990, 'jpg', 4),
(202, 2, 'Asus ROG Strix SCAR', 'Asus ROG Strix SCAR 16 ขับเคลื่อนเกมและโปรเจ็กต์ต่าง ๆ ด้วยโปรเซสเซอร์ Intel และ NVIDIA GeForce RTX 40 Series ทำให้การเล่นเกมระดับ AAA นั้นไร้ที่ติ และการสตรีมก็ทำได้อย่างง่ายดาย\r\n\r\nCPU:  Intel Core i9-14900HX (2.2 GHz up to 5.8 GHz, 24C(8P+16E)/32T, 36MB Intel Smart Cache)\r\nGraphics:  NVIDIA GeForce RTX 4090 16GB GDDR6\r\nRAM:  32GB DDR5\r\nSSD:  2TB NVMe PCIe 4.0 Performance', 135990, 'jpg', 3),
(203, 2, 'Asus ROG Zephyrus G16', '\"Asus ROG Zephyrus G16 GU605  ใหญ่ขึ้นอีกด้วยขนาดจอ 16 นิ้ว แต่ยังคงมีสไตล์และเอกลักษณ์เฉพาะตัว บางและโฉบเฉี่ยวกว่าที่เคย พร้อมขุมพลัง Intel Core Ultra ที่รองรับการทำงาน AI อย่างเต็มประสิทธิภาพ และ NVIDIA GeForce RTX 40 Series ที่จะสามารถจัดการงานหรือการเล่นเกมได้แบบลื่นไหล\r\n\r\nCPU: Intel Core Ultra 9 185H  (2.30GHz up to 5.10GHz, 16C(6P+8E+2PE)/22T, 24MB Intel Smart Cache)\r\nGraphics: NVIDIA GeForce RTX 4060 Laptop\r\nRAM: 16GB LPDDR5X\r\nSSD: 1TB NVMe PCIe 4.0 M.2\"\r\n', 74990, 'jpg', 3),
(301, 3, 'HyperX Pulsefire Haste\r\n', '\"HyperX Pulsefire Haste สร้างขึ้นสำหรับเกมเมอร์ชั้นยอดที่ต้องการได้รับทุกเสี้ยววินาทีที่เป็นไปได้ในการแสวงหาสิ่งที่ดีที่สุด ด้วยน้ำหนัก 59 กรัม เมาส์แบบรังผึ้งที่มีคุณสมบัติครบถ้วนและตอบสนองได้ดีนี้มีทุกสิ่งที่คุณต้องการ โดยไม่ต้องใช้น้ำหนักเพิ่ม ไมโครสวิตช์ TTC Golden ให้การคลิกที่น่าพึงพอใจและเชื่อถือได้ และได้รับการจัดอันดับสำหรับการคลิก 60 ล้านครั้ง ดังนั้นคุณจึงไม่ต้องกังวลกับอินพุตที่ขาดหายไป สายเคเบิล HyperFlex USB ที่ยืดหยุ่นและรองเท้าสเก็ต PTFE เกรดบริสุทธิ์ทำงานร่วมกันเพื่อให้คุณลากเส้นที่ราบรื่นและง่ายดายเพื่อให้ครองเกมได้ง่ายขึ้น\r\n\r\n เกรด PTFE\r\nคลิก 60 ล้านครั้ง\r\nน้ำหนัก 59 กรัม \"\r\n', 1490, 'jpg', 4),
(302, 3, 'ONIKUMA  Kame\r\n', '\" เกมมิ่งเมาส์ ONIKUMA  Kame มาพร้อมการออกแบบที่ดูดีเหมาะกับเกมเมอร์และเพื่อความเกาะมือและการควบคุมที่ดี เมาส์ตัวนี้มาพร้อมไฟ RGB และมี DPI สูงสุดอยู่ 7200 เมาส์ใช้การออกแบบตามหลักสรีรศาสตร์ที่พอดีกับมือทำให้คุณรู้สึกสบายและสามารถใช้งานได้นาน และสามารถใช้ได้กับระบบปฏิบัติการที่หลากหลาย\r\n\r\nปรับความไวเมาส์ได้สูงสุด 7,200\r\nตัวเมาส์มีถึง 6 ปุ่ม\r\nเมาส์ออฟติคอลพอยเตอร์แม่นยำ\"\r\n', 359, 'jpg', 4),
(303, 3, 'Signo Pro-Series RGB Capte\r\n', '\"เมาส์เกมมิ่ง Signo Pro-Series RGB Capte ที่มาพร้อมคุณสมบัติหลากหลาย เหมาะสำหรับนักเล่นเกมทุกคน มีมาโคร 6 ปุ่ม และสามารถปรับความเร็วได้ในช่วง 200 - 4800 DPI เพื่อความแม่นยำในการเล่นเกมรองรับการกดได้มากถึง 5 ล้านครั้ง มีไฟ RGB ที่สามารถปรับได้ใน 12 โหมด และมีโปรแกรมสำหรับตั้งค่ามาโครและไฟให้เลือกใช้งานได้อย่างง่ายดาย นอกจากนี้ยังสามารถเชื่อมต่อและใช้งานได้ทันทีเมื่อเสียบเข้ากับระบบของคุณ\r\n\r\nปรับไฟ RGB ได้ 12 โหมด\r\nรองรับการคลิ๊กถึง 5 ล้านครั้ง\r\nปรับความเร็วของ Dpi ได้ตั้งแต่ 200 - 4800 Dpi\"\r\n', 290, 'jpg', 3),
(401, 4, 'Neolution E-Sport Mandala\r\n', '\"เก้าอี้เกมมิ่ง Neolution E-Sport Mandala การออกแบบเอาใจชาวเกมมิ่ง เบาะอัดแน่นด้วย Original Foam ให้ความนุ่มสบายเวลานั่ง รับน้ำหนักได้ถึง 100-120 KG ปรับเอนได้ถึง 180 องศา นอนหลับได้สบาย\r\n\r\nเบาะหุ้มด้วยหนัง PVC ทนทาน ใช้งานได้ยาวนาน\r\nโครงสร้างหนาแน่น มีความแข็งแรง\r\nปรับระดับความสูง-ต่ำ ได้ 7-10 CM\"\r\n', 2190, 'jpg', 2),
(402, 4, 'Anda Seat Gaming Chair Phantom 3\r\n', '\"Anda Seat Phantom 3 Series Premium Office Gaming Chair ประสบการณ์การนั่งที่สะดวกสบาย การออกแบบตามหลักสรีรศาสตร์ มั่นใจได้ถึงความสบายและป้องกันปัญหาสุขภาพที่อาจเกิดขึ้นจากการนั่งทำงานเป็นเวลานาน Anda Seat Phantom 3 series เก้าอี้เกมมิ่งและเก้าอี้สำนักงานที่ออกแบบตามหลักสรีรศาสตร์  ตัวหนังเป็นแบบ DuraXtra ซึ่งมีความนุ่มและสบาย และออกแบบมาให้ประกอบได้ง่าย\r\n\r\n เก้าอี้ขนาดใหญ่พิเศษ รองรับน้ำหนักได้สูงสุด 90 กิโลกรัม\r\n ที่วางแขนปรับได้แบบ 1D\r\n พนักพิงปรับเอน 90 - 160 องศา\r\n เก้าอี้ E-Sports สำหรับเกมเมอร์ ออกแบบตามหลักสรีระศาสตร์\"\r\n', 8900, 'jpg', 3),
(403, 4, 'Tengu Masamune\r\n', '\"Masamune Series    เก้าอี้เกมมิ่งที่สมบูรณ์แบบที่สุดจาก Tengu ด้วยการออกแบบที่เป็นเอกลักษณ์เฉพาะตัว ไม่สามารถหาได้จากแบรนด์อื่นๆ พร้อมฟังก์ชั่นที่ครบครัน ไม่ว่าจะเป็น การปรับเอนได้ 90-180 องศา แขนแบบ 3D ปรับได้อย่างอิสระ ขึ้น ลง ซ้าย ขวา เบาะพักขาพับเก็บได้\r\n\r\nวัสดุหนัง PU เกรดพรีเมี่ยมทำความสะอาดง่าย\r\nโครงสร้างเหล็กหนาพิเศษรับน้ำหนักได้ 150 กก.\r\nตัดสลับหนัง Kevlar เพื่อเพิ่มความโดดเด่นให้ดีไซน์\"\r\n', 3590, 'jpg', 3),
(501, 5, 'Onikuma Hoko M630\r\n', '\" Onikuma Hoko M630 ไมโครโฟนแบบตั้งโต๊ะ ใช้งานง่ายเพียงเสียบสาย USB เข้ากับไมโครโฟนและอุปกรณ์ที่จะเชื่อมต่อก็สามารถใช้ได้แล้ว เหมาะกับการสตรีมมิ่ง  มาพร้อมผ่นกันเสียง ให้เสียงที่ชัดเจนและเป็นธรรมชาติขนาดเล็กกระทัดรัดไม่เปลืองพื้นที่ สามารถถอดตัวไมค์ออกจากฐานได้และปรับองศาของตัวไมค์ให้ตรงกับปากชองผู้ใช้ได้\r\n\r\nปรับระดับให้ตรงกับปากผู้ใช้ได้\r\nถอดไมค์ออกจากตัวฐานได้\r\nปิด-เปิดไมค์ง่าย ๆ เพียงสัมผัส\r\nเหมาะกับการสตรีมมิ่ง พอดแคสต์ เล่นเกมและอื่น ๆ\"\r\n', 990, 'jpg', 3),
(502, 5, 'Hyper X Duocast USB \r\n', '\"Hyper X DuoCast ไมโครโฟน มาพร้อมตัวยึดกันสะเทือนที่เรียบง่าย และวงแหวนไฟ RGB ที่ดูดีมีรสนิยม ปุ่มแตะเพื่อปิดเสียงและไฟ LED สีสันสดใสที่แจ้งสถานะปิดเสียงไมค์ แต่ก็ยังมีสไตล์ที่ดูลึกลับและเป็นเอกลักษณ์เฉพาะของตัวเอง\r\n\r\nไฟ RGB\r\nปรับแต่งได้ด้วยซอฟต์แวร์ NGENUITY\r\nเซ็นเซอร์แตะเพื่อปิดเสียงพร้อมไฟ LED แสดงสถานะ \r\nCardioid รอบทิศทาง\"\r\n', 2590, 'jpg', 3),
(503, 5, 'HyperX Quadcast S Standalone USB\r\n', 'HyperX QuadCast คือไมโครโฟนแยกแบบครบวงจรที่ดีที่สุดสำหรับสตรีมเมอร์และพอดแคสเตอร์ที่ต้องการไมค์คอนเดนเซอร์คุณภาพสูง QuadCast มาพร้อมกับตัวยึดแบบป้องกันการสั่นสะเทือนในตัวเพื่อช่วยลดการสั่นสะเทือนระหว่างการใช้งานจริง นอกจากนี้ยังมีตัวกรองเสียงปะทุในตัวเพื่อกรองเสียงกระทบต่าง ๆ  ทราบสถานะการทำงานของไมค์ได้ในทันทีด้วยไฟ LED แจ้งสถานะ หรือสามารถกดสั่งปิดเสียงเพื่อป้องกันปัญหาเสียงแทรกขณะถ่ายทอดโดยไม่ได้ตั้งใจ  นอกจากนี้ยังมีแป้นควบคุมเกนที่อยู่ในตำแหน่งที่ใช้งานได้สะดวก ทำให้สามารถปรับความไวในการรับเสียงของไมค์ได้อย่างรวดเร็ว  รุ่น QuadCast S จำหน่ายพร้อมไฟ RGB และไดนามิคเอฟเฟกต์ที่ปรับแต่งได้ผ่านซอฟต์แวร์ HyperX NGENUITY\r\n', 4790, 'jpg', 3),
(601, 6, 'Sony DualSense Edge Controller\r\n', '\"จอยคอนโทรลเลอร์ Sony DualSense Edge Controller สัมผัสประสบการณ์ใหม่เข้าถึงอารมณ์ของการเล่นเกมขั้นสูงสุด ด้วยระบบ Adaptive Trigger ที่เพิ่มความหน่วงของตัวจอยเช่น เหนี่ยวไกปืน และ Haptic Feedback เช่น การสั่นของจอยเปรียบเสมือนจริง เช่นเกมขับรถบนทางขรุขระ\r\n\r\nรองรับการใช้งานผ่าน Bluetooth 5.1\r\nเพิ่มความหน่วงด้วย Adaptive trigger\r\nHaptic Feedback  ที่เพิ่มการสั่นสมจริงมากยิ่งขึ้น\"\r\n', 7790, 'jpg', 3),
(602, 6, 'Logitech Gaming Joy Pad F310\r\n', 'จับสบายมือ ใช้งานง่ายในมือคุณ พร้อมให้ความเพลิดเพลินไปกับการเล่นเกมที่ยาวนานได้อย่างสะดวกสบาย ด้วยยางจับที่โค้งมนและเรียบลื่น\r\n', 690, 'jpg', 3),
(603, 6, ' Razer Wolverine V3 Tournament Edition\r\n', '\"Razer Wolverine V3 Tournament Edition จอยคอนโทลเลอร์สำหรับเกมเมอร์ที่ต้องการประสิทธิภาพสูงในการแข่งขัน มาพร้อมคุณสมบัติที่โดดเด่น ออกแบบมาเพื่อเพิ่มความแม่นยำและการตอบสนองที่รวดเร็ว\r\n\r\nวัสดุพรีเมียม ช่วยเพิ่มความทนทานและให้สัมผัสที่ดี\r\nไฟ RGB แบบ Razer Chroma\r\nรองรับการเชื่อมต่อผ่าน USB\"\r\n', 3290, 'jpg', 3),
(701, 7, 'Marshall Woburn III Black\r\n', '\"Marshall Woburn III เป็นลำโพงขนาดใหญ่ มาพร้อมกับเสียงที่ทรงพลังได้รับการออกแบบใหม่ด้วยระบบไดรเวอร์สามทางใหม่ซึ่งให้ความคมชัดยิ่งขึ้นไม่ว่าคุณจะใช้เป็นเครื่องเสียงภายในบ้านหรือเป็นลำโพงทีวี Dynamic Loudness ปรับสมดุลโทนเสียงของลำโพง Bluetooth นี้ มอบสิ่งที่ดีที่สุดจากเสียงในบ้านให้กับคุณ\r\n\r\nสามารถอัปเดทลำโพงผ่านระบบ Over-The-Air (OTA)\r\nเชื่อมต่อ Bluetooth, RCA หรือ 3.5 มม. อินพุต HDMI\r\nใช้วัสดุที่ปราศจาก PVC และที่ประกอบด้วยพลาสติกรีไซเคิล 70% และวัสดุ Vegan\"\r\n', 28990, 'jpg', 2),
(702, 7, 'JBL PartyBox Encore Essential\r\n', '\"ลำโพงปาร์ตี้ไร้สายแบบพกพา JBL Partybox Encore Essential ใหม่! สนุกยาวนานถึง 6 ชม. กับขนาดกะทัดรัดสะดวกต่อการพกพา ไม่ว่าจะใช้สำหรับเต้นบนชายหาด หรือนั่งชิลๆ ที่ริมสระน้ำเต็มที่กับความสนุกด้วยเสียงคุณภาพ JBL Original Pro Sound มาพร้อมเสียงเบสที่หนักแน่นลงลึก โดยใน Partybox Encore มาในรูปทรงสี่เหลี่ยมคล้ายลูกบาศก์ พร้อมไฟ Lightshow  สามารถเคลื่อนย้ายลำโพงไปยังจุดปาร์ตี้ที่ต้องการ\r\n\r\nมาตรฐาน IPX4 ที่สามารถกันน้ำกระเซ็น\r\nเทคโนโลยี True Wireless Stereo ที่เชื่อมต่อลำโพง 2 ตัวเพื่อเสียงที่กระหึ่มขึ้น\r\nสตรีมเพลงแบบไร้สายผ่านบลูทูธ เปลี่ยนปาร์ตี้ให้เป็นปาร์ตี้คาราโอเกะด้วยอินพุตไมโครโฟนแบบมีสาย\r\nแอป JBL PartyBox ควบคุมเพลง อัปเดตการตั้งค่า และปรับแต่งสีสันของการแสดงแสงสีเพื่อบรรยากาศปาร์ตี้ที่สมบูรณ์แบบ\"\r\n', 12900, 'jpg', 4),
(703, 7, ' JBL Light Effects Party Box 710\r\n', '\"JBL PartyBox 710 ที่กันน้ำได้จะเปลี่ยนงานอีเวนต์ของคุณให้กลายเป็นปาร์ตี้ คอนเสิร์ต หรือไนท์คลับอย่างแท้จริง ช่วยให้คุณสร้างประสบการณ์ทางดนตรีและภาพในระดับสูง ปรับแต่งทั้งไฟกระพริบ ไฟสโตรบ และเสียงที่น่าทึ่งจากทวีตเตอร์คู่และวูฟเฟอร์เสียงเบสหนักแน่นได้ และด้วยด้ามจับที่จับง่ายและล้อที่แข็งแรง คุณจึงสามารถสนุกสนานได้ทุกที่ทุกเวลาที่ปาร์ตี้ไป\r\n\r\nควบคุมผ่านแอพ JBL   Party   Box\r\nขนย้ายสะดวก แข๊งแรง ทนทาน\r\nสามารถจับคู่ลำโพงได้หลากหลายตัว\"\r\n', 32900, 'jpg', 3),
(801, 8, 'LG 24MR400-B FHD 3-Side Borderless\r\n', '\"จอมอนิเตอร์ LG 24MR400-B จอภาพ LG พร้อมเทคโนโลยี IPS เน้นประสิทธิภาพของจอแสดงผล liquid crystal สามารถให้สีที่แม่นยำ และค่า Refresh Rate 100Hz ที่รวดเร็วทำให้การโหลดเฟรมในโปรแกรมต่างๆ ราบรื่น นอกจากนี้คุณยังสามารถเพลิดเพลินกับการเล่นเกมที่สมจริงโดยลดการกระตุกของหน้าจอ\r\n\r\nจอแสดงผล IPS Full HD ขนาด 23.8 นิ้ว\r\nค่า Refresh Rate 100 Hz\r\nรองรับเทคโนโลยี AMD FreeSync \"\r\n', 2800, 'jpg', 4),
(802, 8, 'MSI PRO MP251\r\n', '\"จอมอนิเตอร์ MSI รุ่น PRO MP251 จอ Ergonomic ที่มีขนาดเหมาะสมที่สุดสำรับการทำงาน มาพร้อมกับเทคโนโลยี Eye care ลดแสงสีฟ้า ปกป้องดวงตาของคุณในการทำงานเป็นระยะเวลานาน จอแสดงผลที่มีอัตราการรีเฟรชสูงถึง 100 Hz มอบประสบการณ์การรับชมที่ดียิ่งขึ้น ด้วยการออกแบบ VESA Mountable คุณสามารถแขวนหน้าจอบนผนังได้ทุกที่ในบ้านของคุณ สามารถปรับตำแหน่งจอมอนิเตอร์และมุมมองให้เหมาะสมกับผู้ใช้งาน\r\n\r\nหน้าจอ IPS 24.5 นิ้ว \r\nความละเอียด: 1920 x 1080 @ 100 Hz | เวลาตอบสนอง: 1 ms\r\nEyesErgo เทคโนโลยีช่วยในการมองเป็นไปอย่างธรรมชาติ\"\r\n', 2800, 'jpg', 4),
(803, 8, 'Xiaomi G27i Gaming Monitor \r\n', '\"จอมอนิเตอร์ Xiaomi G27i ตอบสนองไว เห็นภาพทั้งหมดในพริบตา หน้าจออีสปอร์ตขนาด 27 นิ้ว เครื่องนี้มีความละเอียดสูง ตัวเครื่องใช้จอ IPS LCD ที่ตอบสนองไว ขาตั้งที่เรียบง่ายและปรับได้สะดวกสบายตลอดเวลา รองรับการปรับมุมเอียงโดยละเอียดและการติดตั้งบนผนัง สะดวกสบายทุกเวลา ไม่ว่าท่าไหน \r\n\r\nหน้าจอ IPS 27 นิ้ว\r\nความละเอียด 1920 x 1080\r\nอัตราการรีเฟรชเรท 165 Hz\r\nรองรับเทคโนโลยี AMD FreeSync Premium\"\r\n', 4250, 'jpg', 3),
(901, 9, 'Marshall Monitor III A.N.C\r\n', '\"หูฟัง Marshall Monitor III A.N.C Black เหนือชั้นด้วยพลังเสียงที่ดีที่สุด เชื่อมต่อกับโลกแห่งดนตรี ไร้ซึ่งสิ่งรบกวน หูฟังทุกคู่ของ Marshall ถูกรังสรรค์ขึ้นจากประสบการณ์กว่า 60 ปี ในการสร้างเสียงที่โดดเด่นจนเป็นเอกลักษณ์เฉพาะ ที่ใครได้เห็นเป็นต้องเหลียวมอง และ Monitor III A.N.C. เป็นหนึ่งในนั้น ทุกครั้งที่คุณกดเล่น เตรียมตัวให้พร้อมที่จะดื่มด่ำไปกับเสียงเบสที่หนักแน่น กับเสียงแหลมอันกึกก้องตลอดเวลา   จะทำให้คุณรู้สึกว่ามีเพียงคุณและนักดนตรีคนโปรดเท่านั้น ไม่ว่าจะในห้อง บนถนน หรือบนรถไฟ  ให้คุณเข้าถึงอารมณ์ของเพลงโปรดได้ยาวนานหลายชั่วโมงโดยไม่ต้องชาร์จ \r\n\r\n70 ชั่วโมงเมื่อใช้ Bluetooth และ ANC 100 ชั่วโมงเมื่อใช้ Bluetooth เท่านั้น\r\nโหมดตัดเสียงรบกวน & โหมดรับเสียงภายนอก\r\nระยะในการเชื่อมต่อ   10 เมตร / 30  ฟุต\r\nรองรับ   Bluetooth 5.3\"\r\n', 12990, 'jpg', 3),
(902, 9, 'Onikuma B3 RGB Bluetooth 5.3\r\n', '\"Onikuma B3 หูฟังเกมมิ่งแบบไร้สาย ใช้งานได้หลายแพลตฟอร์ม การฟังเพลง เล่นเกมไม่มีหน่วง  ให้เสียงที่ชัดเจนและทรงพลัง หูฟังมีน้ำหนักเบา ฟองน้ำหูฟังระบายอากาศได้ดีสวมใส่สบาย การควบคุมทำได้ง่ายเพราะปุ่มต่างๆ อยู่บนหูฟัง มีโหมดเกมและเพลง\r\n\r\n แสงไฟ RGB มี 3 โหมด\r\nไดร์เวอร์ขนาด 40 มม.\r\nรองรับทั้ง Bluetooth 5.3 / AUX 3.5mm\"\r\n', 990, 'jpg', 3),
(903, 9, 'Beats Studio 3 Matte Black\r\n', 'หูฟังไร้สาย Beats Studio3 Wireless พร้อมมอบประสบการณ์การฟังระดับพรีเมี่ยมด้วยคุณสมบัติ Pure Active Noise Canceling (Pure ANC) โดย Pure ANC ของ Beats จะตัดเสียงรบกวนจากภายนอกให้อยู่ตลอด และใช้การปรับเทียบเสียงแบบเรียลไทม์เพื่อรักษาความคมชัด ช่วงเสียง และอารมณ์ ซึ่งจะบล็อกเสียงแบบเจาะจงอย่างต่อเนื่องในขณะที่ปรับแต่งเสียงตามการเล่นเพลงแต่ละเพลงโดยอัตโนมัติแบบเรียลไทม์ เสริมคุณภาพผลลัพธ์ด้านเสียงให้เติมประสิทธิภาพเพื่อคงไว้ซึ่งประสบการณ์ฟังเพลงระดับพรีเมียมในแบบที่ศิลปินต้องการสื่อออกมา\r\n', 11250, 'jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`Iditem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `Iditem` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=904;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
