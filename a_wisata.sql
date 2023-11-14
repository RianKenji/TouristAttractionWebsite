-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 06:12 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` char(4) NOT NULL,
  `adminNAMA` varchar(30) NOT NULL,
  `adminEMAIL` varchar(60) NOT NULL,
  `adminPASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminNAMA`, `adminEMAIL`, `adminPASSWORD`) VALUES
('A001', 'Halo', 'Halo@gmail.com', '12345'),
('A002', 'Tdiak', 'Email', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaID` char(4) NOT NULL,
  `areaNama` char(35) NOT NULL,
  `areaWilayah` char(35) NOT NULL,
  `areaKeterangan` varchar(255) NOT NULL,
  `kabupatenKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaID`, `areaNama`, `areaWilayah`, `areaKeterangan`, `kabupatenKODE`) VALUES
('AR01', 'Lembang', 'Bandung Utara', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, ', 'K001'),
('AR02', 'Ledeng', 'Bandung Utara', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n', 'K003'),
('AR03', 'Dago', 'Bandung Utara', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions ', 'K002');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `beritaID` char(4) NOT NULL,
  `beritajudul` varchar(60) NOT NULL,
  `beritainti` varchar(1000) NOT NULL,
  `penulis` char(50) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tanggalterbit` date NOT NULL,
  `destinasiID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`beritaID`, `beritajudul`, `beritainti`, `penulis`, `penerbit`, `tanggalterbit`, `destinasiID`) VALUES
('B001', 'Wisata Bandung', 'Sebuah Tempat Wisata Di Kota Bandung', 'Budi', 'Kompas', '2022-11-30', 'WS01'),
('B002', 'Judul', 'Inti', 'bcfd', 'Penerbit', '2022-12-01', 'WS03'),
('B003', 'Berita Utama', 'Kucing Kejepit', 'Vin', 'Denn', '2022-12-08', 'WS02'),
('B004', 'Jakarta Tenggelam', 'Jakarta Jadi Atlantis Baru', 'MC', 'VVV', '2022-12-31', 'WS01');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiID` char(5) NOT NULL,
  `destinasiNama` varchar(35) NOT NULL,
  `destinasiAlamat` varchar(255) NOT NULL,
  `kategoriID` char(4) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiID`, `destinasiNama`, `destinasiAlamat`, `kategoriID`, `areaID`) VALUES
('WS01', 'Pantai Kuta', 'Yogyakarta', 'WK01', 'AR03'),
('WS02', 'Gunung', 'Puncak', 'WK05', 'AR01'),
('WS03', 'Danau Toba', 'Sumatera', 'WK03', 'AR02');

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `developerID` char(6) NOT NULL,
  `developerNAMA` varchar(50) NOT NULL,
  `rilisterbaru` varchar(50) NOT NULL,
  `website` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`developerID`, `developerNAMA`, `rilisterbaru`, `website`) VALUES
('DV01', 'KEY', 'Tsui no Stella!', 'http://key.visualarts.gr.jp/'),
('DV02', 'NitroPlus234', 'Steins Gate', 'Rumahku'),
('DV03', 'DeveloperBaru2022', '2313', '1asd');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotoID` char(5) NOT NULL,
  `fotonama` char(60) NOT NULL,
  `destinasiID` char(4) NOT NULL,
  `fotofile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotoID`, `fotonama`, `destinasiID`, `fotofile`) VALUES
('F001', 'Foto Wisata 1', 'WS01', 'Foto1.jpg'),
('F002', 'Gunung', 'WS02', 'gunung1.jpg'),
('F003', 'Danau Toba', 'WS03', 'danau1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` char(4) NOT NULL,
  `hotelnama` varchar(60) NOT NULL,
  `hotelalamat` varchar(255) NOT NULL,
  `hotelketerangan` varchar(300) NOT NULL,
  `hotelfoto` text NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelID`, `hotelnama`, `hotelalamat`, `hotelketerangan`, `hotelfoto`, `areaID`) VALUES
('H001', 'Panama', 'Bandung', 'Hotel Berlokasi di bandung utara', 'hotel1.jpg', 'AR01'),
('H002', 'Hotel 101', 'Jl. Taman Kebon Sirih 1 No.3, RT.10/RW.10, Kampung Bali, Tanah Abang, Central Jakarta City, Jakarta 10250', 'Set in a pagoda-style building in the business district, this casual hotel is 10 minutes\' walk from Merdeka Square, 1 km from Tanahabang train station and 11 km from Sea World Indonesia.', 'hotel2.jpg', 'AR01');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kabupatenKODE` char(4) NOT NULL,
  `kabupatenNAMA` char(60) NOT NULL,
  `kabupatenALAMAT` varchar(255) NOT NULL,
  `kabupatenKET` text NOT NULL,
  `kabupatenFOTOICON` varchar(255) NOT NULL,
  `kabupatenFOTOICONKET` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`kabupatenKODE`, `kabupatenNAMA`, `kabupatenALAMAT`, `kabupatenKET`, `kabupatenFOTOICON`, `kabupatenFOTOICONKET`) VALUES
('K001', 'Bandung', 'Indo', 'Wilayah', 'gunung1.jpg', 'Foto Pemandangan Indah'),
('K002', 'Medan', 'Sumatra', 'Tempat Wisata', 'foto1.jpg', 'Foto Alam'),
('K003', 'Jakarta', 'Indonesia', 'DKI Jakarta', 'danau1.jpg', 'Foto Alam WWW');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` char(4) NOT NULL,
  `kategorinama` char(30) NOT NULL,
  `kategoriket` varchar(255) NOT NULL,
  `kategoriref` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategorinama`, `kategoriket`, `kategoriref`) VALUES
('WK01', 'Alam', 'Wisata Dengan Pemandangan Pantai dan Gunung', 'Buku'),
('WK02', 'Budaya', 'Wisata Sejarah, Peninggalan masa lalu', 'Buku'),
('WK03', 'Pantai', 'Laut', 'Pengguna'),
('WK04', 'Danau', 'Wisata Alami', 'User'),
('WK05', 'Religi', 'Wisata Rohani', 'Buku');

-- --------------------------------------------------------

--
-- Table structure for table `lightnovel`
--

CREATE TABLE `lightnovel` (
  `lnID` char(6) NOT NULL,
  `lnJudul` varchar(69) NOT NULL,
  `lnAuthor` varchar(50) NOT NULL,
  `lnSynopsis` text NOT NULL,
  `lnIllustrator` varchar(50) NOT NULL,
  `lnIllust` text NOT NULL,
  `tahunRilis` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lightnovel`
--

INSERT INTO `lightnovel` (`lnID`, `lnJudul`, `lnAuthor`, `lnSynopsis`, `lnIllustrator`, `lnIllust`, `tahunRilis`) VALUES
('LN01', 'Re: Zero Kara Hajimeru Isekai Seikatsu', 'Nagatsuki Tappei', 'Exiting the convenience store, Subaru Natsuki emerges to a busy town inhabited by humans and demi-humans. Using dragons and carriages as transportation, the town is clearly not the modern-day Japan that he is familiar with. However, as someone who spends his days engrossed in comics and games, Subaru assumes that he is a protagonist in this new fantasy world, harnessing supreme magical powers.  Much to his dismay, that is not the case and things quickly go awry as he bumps into a group of thugs. Fortunately, a silver-haired beauty named Satella comes to his rescue, while looking for her stolen insignia. In return for her kindness, Subaru offers to help with the search, which eventually leads them to a loot shop. Assuming that the insignia was traded for money, Subaru enters the shop hoping to negotiate with the owner regarding the stolen item. However, much to his surprise, what awaits them is not the insignia but a brutal assassin that leads the two to their demise.  But instead of waking up in the afterlife, Subaru is shocked to find himself standing alone in the midst of daytime, as if he never left the town in the first place. Thus, his life in another world mysteriously begins a second time.', 'Shinichirou Otsuka', 'lncover1.jpg', 2014),
('LN02', 'Mushoku Tensei', 'Rifujin na Magonote', 'The series is about a jobless and hopeless man who dies after having a sad and withdrawn life and reincarnates in a fantasy world while keeping his memories, determined to enjoy his new life without regrets under the name Rudeus Greyrat', 'Shirotaka', 'lncover2.jpg', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `visualnovel`
--

CREATE TABLE `visualnovel` (
  `vnID` char(6) NOT NULL,
  `vnNAMA` varchar(50) NOT NULL,
  `developerID` char(6) NOT NULL,
  `rating` float NOT NULL,
  `genre` text NOT NULL,
  `tahunterbit` int(4) NOT NULL,
  `vnfoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visualnovel`
--

INSERT INTO `visualnovel` (`vnID`, `vnNAMA`, `developerID`, `rating`, `genre`, `tahunterbit`, `vnfoto`) VALUES
('VN01', 'Rewrite', 'DV02', 8.52, 'The story follows the life of Kotarou Tennouji, a high school student with superhuman abilities who investigates supernatural mysteries with five girls from his school in the fictional city of Kazamatsuri.', 2011, 'vn1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`beritaID`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiID`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`developerID`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotoID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kabupatenKODE`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `lightnovel`
--
ALTER TABLE `lightnovel`
  ADD PRIMARY KEY (`lnID`);

--
-- Indexes for table `visualnovel`
--
ALTER TABLE `visualnovel`
  ADD PRIMARY KEY (`vnID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
