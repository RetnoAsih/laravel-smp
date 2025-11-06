-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2025 at 09:40 AM
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
-- Database: `smpmaarif`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensis`
--

CREATE TABLE `absensis` (
  `id` int(11) NOT NULL,
  `id_siswa` varchar(15) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensis`
--

INSERT INTO `absensis` (`id`, `id_siswa`, `waktu`) VALUES
(147, '8A4160AC', '2025-09-03 05:15:50'),
(148, 'CA8295AC', '2025-09-03 05:35:12'),
(149, '8A4160AC', '2025-09-03 05:35:29'),
(150, '25EA453', '2025-09-03 05:35:36'),
(151, 'CA8295AC', '2025-09-03 05:36:14'),
(152, '25EA453', '2025-09-03 05:36:24'),
(153, 'CA8295AC', '2025-09-03 05:36:41'),
(154, '25EA453', '2025-09-03 05:36:46'),
(155, 'CA8295AC', '2025-09-03 05:36:55'),
(156, '25EA453', '2025-09-03 05:36:59'),
(157, '42AA7C5', '2025-09-17 09:20:49'),
(158, 'EE5C7E5', '2025-09-17 09:23:41'),
(159, 'EE5C7E5', '2025-09-17 09:46:39'),
(160, '744C7C5', '2025-09-17 09:47:58'),
(161, '85397E5', '2025-09-17 09:48:40'),
(162, 'D7497E5', '2025-09-17 09:49:21'),
(163, 'EE5C7E5', '2025-09-17 09:59:13'),
(164, '744C7C5', '2025-09-17 09:59:30'),
(165, '85397E5', '2025-09-17 09:59:41'),
(166, 'D7497E5', '2025-09-17 09:59:52'),
(167, '42AA7C5', '2025-09-17 10:00:02'),
(168, 'EE5C7E5', '2025-09-17 10:05:35'),
(169, 'EE5C7E5', '2025-09-18 01:33:40'),
(170, '42AA7C5', '2025-09-18 01:33:48'),
(171, 'D7497E5', '2025-09-18 01:33:53'),
(172, '744C7C5', '2025-09-18 01:34:39'),
(173, '42AA7C5', '2025-09-18 01:40:34'),
(174, '85397E5', '2025-09-18 04:28:57'),
(175, 'D7497E5', '2025-09-18 04:29:39'),
(176, '42AA7C5', '2025-09-18 04:30:44'),
(177, '744C7C5', '2025-09-18 04:31:06'),
(178, 'EE5C7E5', '2025-09-18 04:31:24'),
(179, '8A4160AC', '2025-10-29 09:09:02'),
(180, 'CA8295AC', '2025-10-29 09:09:09'),
(181, '8A4160AC', '2025-10-29 09:22:28'),
(182, 'CA8295AC', '2025-10-29 09:22:40'),
(183, '8A4160AC', '2025-10-29 09:22:46'),
(184, 'CA8295AC', '2025-11-06 08:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `roles` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `nama_lengkap`, `roles`) VALUES
(2, 'retno_kinasih123', '$2y$10$twIYCn3L4V/mkHNOF7vciONr2sIeilUSamvQ83V9FRID688Mevy8C', 'Retno Kinasih Asih', 'guru'),
(3, 'arvinnoer', '$2y$10$AT1hJyEIWPb9S7fV3IFpGuZKb91LzdPUCXqow4eQnPyflSvZOmn86', 'Arvin Noer Hakim', 'guru'),
(4, 'admin', '$2y$10$3RP3tq7fUirPLIRA12uAsexrfQXfdw9f2mNcBS3i6zl1EZMficmXW', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `tanggal_publish` datetime DEFAULT current_timestamp(),
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id_berita`, `judul`, `slug`, `isi`, `penulis`, `tanggal_publish`, `gambar`) VALUES
(17, 'Sarana dan Prasarana', 'sarana-dan-prasarana', '<p>Adapun sarana dan prasarana di SMP Ma\'arif NU 01 Wanareja adalah sebagai berikut:&nbsp;</p>\r\n<ol>\r\n<li>Lapangan</li>\r\n<li>Aula</li>\r\n<li>Perpustakaan</li>\r\n<li>Lab Komputer</li>\r\n</ol>\r\n<p>&nbsp;</p>', 'SMP Ma\'arif NU 01 Wanareja', '2025-08-24 17:39:46', 'uploads/berita/6ddbd1ba-65c1-486b-a7fb-377205ea3f26.jpeg'),
(18, 'Prestasi', 'prestasi', '<p>Adapun prestasi yang pernah diraih oleh SMP Ma\'arif NU 01 Wanareja adalah sebagai berikut:</p>\r\n<h2>2025</h2>\r\n<ul>\r\n<li>Pasukan pengibar bendera HUT RI Ke-80 tingkat desa bantar</li>\r\n</ul>\r\n<h2>2024</h2>\r\n<ul>\r\n<li>Pasukan Drumband pada acara Hari Santri Nasional ke-10 tingkat kecamatan Wanareja</li>\r\n<li>Pasukan Drumband HUT RI Ke-79 tingkat desa Bantar</li>\r\n</ul>\r\n<h2>2023</h2>\r\n<ul>\r\n<li>Pasukan Drumband pada acara Hari Santri Nasional ke-9 tingkat kecamatan Wanareja</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>&nbsp;</li>\r\n</ul>', 'SMP Ma\'arif NU 01 Wanareja', '2025-08-24 17:51:54', 'uploads/berita/b984fe53-5784-4dd9-890c-ce6109236961.jpeg'),
(19, 'OSIS', 'osis', '<p>Struktur Organisasi OSIS SMP Ma\'arif NU 01 Wanareja</p>\r\n<p>Pembina OSIS: Erika Aura Sucia</p>\r\n<p>Ketua OSIS: Melfi</p>\r\n<p>Wakil Ketua:</p>\r\n<p>Sekretaris:&nbsp;</p>\r\n<p>Bendahara:</p>\r\n<p>Anggota:</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'OSIS', '2025-08-25 16:16:23', 'uploads/berita/3cb6bc7d-79e5-4eb5-9041-ebd29eae9bdb.jpg'),
(20, 'Ekstrakurikuler', 'ekstrakurikuler', '<p>Ekstrakurikuler SMP Ma\'arif NU 01 Wanareja yakni:</p>\r\n<ol>\r\n<li>Drumband</li>\r\n<li>Pramuka</li>\r\n<li>Hadroh</li>\r\n<li>Pagar Nusa</li>\r\n<li>Paskibra</li>\r\n<li>Panahan</li>\r\n<li>Berkuda</li>\r\n</ol>', 'Ekstrakurikuler', '2025-08-25 16:22:24', 'uploads/berita/27e775aa-5c0b-49cf-9b08-df7b70cb2d68.jpeg'),
(21, 'Alur Layanan HUMAS', 'alur-layanan-humas', '<p>Alur Layanan HUMAS SMP Ma\'arif NU 01 Wanareja</p>', 'SMP Ma\'arif NU 01 Wanareja', '2025-08-25 17:01:41', 'uploads/berita/d16d8d81-e660-41dd-9789-2d306a98408d.png'),
(22, 'Wali Kelas', 'wali-kelas', '<p>Wali Kelas 7: Yayan Noviyanti, S.Pd</p>\r\n<p>Wali Kelas 8: Muhtihatun Ni\'Mah, S.Pd</p>\r\n<p>Wali Kelas 9: Ining Suryani, S.Ag</p>', 'SMP Ma\'arif NU 01 Wanareja', '2025-08-25 17:49:20', 'uploads/berita/e8798b0e-61a4-4d86-8f92-a1da6fcbf96b.png'),
(23, 'Kurikulum', 'kurikulum', '<p>SMP Ma\'arif NU 01 Wanareja menggunakan kurikulum Merdeka</p>', 'SMP Ma\'arif NU 01 Wanareja', '2025-08-25 17:51:08', 'uploads/berita/93a0e3e0-6f4b-41bf-a224-33cf9a6bd6cd.png'),
(24, 'Jadwal Pelajaran', 'jadwal-pelajaran', '<p>Jadwal Pelajaran SMP Ma\'arif NU 01 Wanareja</p>', 'SMP Ma\'arif NU 01 Wanareja', '2025-08-25 17:54:46', 'uploads/berita/76368530-b2b2-4f92-a422-12f5261b114e.jpeg'),
(25, 'Kalender Pendidikan', 'kalender-pendidikan', '<p>Kalender Pendidikan SMP Ma\'arif NU 01 Wanareja</p>', 'SMP Ma\'arif NU 01 Wanareja', '2025-08-25 17:57:15', 'uploads/berita/7aee489d-b03f-4373-903d-0f453b247e47.jpeg'),
(26, 'Tata Tertib SMP Ma\'arif NU 01 Wanareja', 'tata-tertib-smp-maarif-nu-01-wanareja', '<p><strong>BAB I</strong></p><p><strong>KETENTUAN UMUM</strong></p><p>&nbsp;</p><p>Tata&nbsp; krama&nbsp; dan&nbsp; tata&nbsp; tertib&nbsp; sekolah ini &nbsp;dimaksudkan sebagai rambu rambu bagi siswa dalam bersikap, berucap, bertindak, dan melaksanakan kegiatan sehari-hari di sekolah&nbsp; dalam rangka menciptakan iklim dan kultur yang dapat menunjang kegiatan pembelajaran yang efektif.</p><p>Tata krama dan tata tertib sekolah ini dibuat berdasarkan nilai-nilai yang dianut sekolah&nbsp; dan&nbsp; masyarakat sekitar, yang meliputi: nilai ketaqwaan, sopan santun, pergaulan, kedisiplinan&nbsp; dan ketertiban, kebersihan, kesehatan, kerapian, keamaan, dan lain-lain yang mendukung&nbsp; kegiatan belajar yang efektif.</p><p>Setiap siswa wajib melaksanakan ketentuan yang tercantum dalam tata krama dan tata tertib ini secara konsekuen dan penuh kesadaran.</p><p>Tata krama dan tata tertib sekolah ini mengikat selama menjadi siswa.</p><p>&nbsp;</p><p><strong>PASAL</strong><strong>&nbsp;1</strong></p><p><strong>&nbsp;</strong></p><p><strong>PAKAIAN SEKOLAH</strong></p><p><strong>&nbsp;</strong></p><ol><li><strong>Pakaian Seragam</strong></li></ol><p>Siswa wajib mengenakan&nbsp; pakaian&nbsp; seragam&nbsp; sekolah&nbsp; dengan&nbsp; ketentuan sebagai&nbsp; berikut :</p><p><strong>&nbsp;</strong></p><p><strong>Umum</strong></p><ol><li>Pakaian hari senin dan selasa</li></ol><ul><li>Baju warna putih kain teteron / sejenis, potongan krah dan memakai dasi berlogo SMPN 1 Kalijati</li><li>Memakai badge OSIS, badge kelas, badge nama,badge merah putih dan lokasi sekolah</li><li>Topi sekolah sesuai ketentuan, ikat pinggang warna hitam berlogo OSIS.</li><li>Kaos kaki warna putih, sepatu warrior.</li></ul><ol><li>Pakaian hari rabu dan kamis</li></ol><ul><li>Baju batik yang sudah disepakati Sekolah (gambar yang telah dibagikan)</li><li>Mengenakan dasi berlogo SMPN 1 Kalijati</li><li>Mengenakan celana biru seperti yang dipakai pada hari senin dan selasa</li></ul><ol><li>Pakaian hari Jumat</li></ol><p>Mengenakan seragam muslim (gambar yang telah dibagikan)</p><ol><li>Pakaian hari Sabtu (Kalau hari sabtu masuk sekolah)</li></ol><p>Mengenakan seragam pramuka lengkap dengan atributnya (setiap Tanggal 14)</p><ol><li>Sopan dan rapi sesuai dengan ketentuan yang berlaku</li><li>Tidak mengenakan perhiasan yang mencolok.</li><li>Pakaian tidak terbuat dari kain yang tipis/ tembus&nbsp; pandang&nbsp; dan tidak&nbsp; ketat.</li></ol><p>&nbsp;</p><p><strong>Khusus Laki-laki</strong></p><ol><li>Baju dimasukkan ke dalam celana</li><li>Pakai sabuk warna hitam berlogo OSIS</li><li>Celana dan lengan baju tidak&nbsp; digulung</li><li>Bagi celana panjang harus menutup matakaki</li><li>Celana tidak disobek, jahitan tidak menyempit ke mata kaki atau tidak dijahit cut brai</li><li>Benang sesuai warna kain.</li><li>Potongan celana sesuai model yang disepakati sekolah (gambar yang telah dibagikan)</li></ol><p>&nbsp;</p><p><strong>Khusus Perempuan</strong></p><ol><li>Baju dimasukkan ke dalam rok</li><li>Pakai sabuk warna hitam berlogo OSIS</li><li>Panjang rok sampai matakaki, jilbab warna putih</li><li>Tidak memakai perhiasan aksesories yang mencolok</li><li>Lengan baju tidak digulung</li><li>benang sesuai warna kain dan berploi (lipatan) depan dua.</li><li>Potongan rok sesuai model yang disepakati sekolah (gambar yang telah dibagikan)</li><li><strong>Pakaian Olahraga</strong></li></ol><p>Untuk pelajaran olah raga&nbsp; siswa wajib memakai pakaian olahraga&nbsp; yang telah ditetapkan sekolah.</p><p>&nbsp;</p><p><strong>&nbsp;</strong></p><p><strong>&nbsp;</strong></p><p><strong>&nbsp;</strong></p><p><strong>&nbsp;</strong></p><p><strong>PASAL</strong><strong>&nbsp;2</strong></p><p><strong>&nbsp;</strong></p><p><strong>RAMBUT, KUKU, TATO, MAKE &ndash; UP</strong></p><p>&nbsp;</p><p><strong>Umum</strong></p><ol><li>Siswa dilarang :</li><li>Berkuku panjang</li><li>Mengecat rambut, kuku</li><li>Bertato</li></ol><p>&nbsp;</p><p><strong>Khusus Siswa Laki-laki</strong></p><ol><li>Tidak rambut panjang (tidak menyentuh alis mata, ujung cuping telinga atas, dan krah belakang)</li><li>Tidak bercukur gundul</li><li>Rambut tidak berkucir</li><li>Tidak memakai kalung</li><li>Tidak memakai gelang</li><li>Tidak memakai cincin</li><li>Tidak memakai anting-anting</li><li>Tidak bertindik.</li></ol><p>&nbsp;</p><p><strong>Khusus Siswa Perempuan</strong></p><p>Tidak memakai make-up atau sejenisnya kecuali bedak tipis.</p><p>&nbsp;</p><p><strong>PASAL</strong><strong>&nbsp;3</strong></p><p><strong>MASUK DAN PULANG SEKOLAH</strong></p><p>&nbsp;</p><ol><li>Siswa wajib hadir di sekolah 10 menit sebelum bel berbunyi</li><li>Siswa terlambat datang harus lapor&nbsp; kepada guru piket dan&nbsp; minta ijin untuk masuk kelas.</li><li>Selama pelajaran berlangsung dan pada pergantian jam pelajaran siswa dilarang berada di luar kelas.</li><li>Pada waktu istirahat siswa dilarang berada di dalam kelas.</li><li>Pada waktu pulang&nbsp; siswa diwajibkan&nbsp; langsung&nbsp; pulang&nbsp; ke rumah</li><li>Bila siswa tidak langsung pulang ke rumah harus ijin kepada orang tua.</li></ol><p>&nbsp;</p><p><strong>P</strong><strong>ASAL</strong><strong>&nbsp;4</strong></p><p><strong>KEBERSIHAN, KEDISIPLINAN, DAN KETERTIBAN</strong></p><p><strong>&nbsp;</strong></p><ol><li>Setiap kelas dibentuk tim piket&nbsp; kelas&nbsp; yang&nbsp; secara&nbsp; bergiliran&nbsp; bertugas&nbsp;&nbsp;&nbsp;&nbsp; menjaga&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kebersihan dan ketertiban kelas.</li><li>Setiap tim&nbsp; piket&nbsp; kelas&nbsp; hendaknya menyiapkan dan&nbsp; memelihara perlengkapan kelas antara lain :</li><li>Penghapus papan tulis, penggaris, spidol dan kapur tulis.</li><li>Taplak meja dan bunga</li><li>Sapu, dan tempat sampah</li><li>Memberikan keindahan di kelas masing-masing.</li><li>Tim piket kelas mempunyai tugas :</li><li>Membersihkan lantai dan dinding serta merapikan kursi dan meja sebelum jam pelajaran pertama dimulai.</li><li>Mempersiapkan sarana dan prasarana pembelajaran, membersihkan papan tulis, dan lain-lain..</li><li>Melengkapi dan merapikan hiasan dinding kelas, seperti bagan, Struktur organisasi kelas, jadwal piket, papan absensi dan hiasan lainnya.</li><li>Melaporkan kepada guru piket tentang tindakan-tindakan pelanggaran di kelas misalnya : coret-coret, berbuat gaduh&nbsp; (ramai), atau merusak benda-benda yang ada di kelas</li><li>Setiap siswa membiasakan membuang sampah&nbsp; pada tempat yang telah ditentukan.</li><li>Setiap siswa&nbsp; menjaga suasana ketenangan belajar baik di kelas perpustakaan, laboratorium, ruang praktik, maupun di lingkungan sekolah.</li><li>Setiap siswa mentaati&nbsp; jadwal kegiatan sekolah, seperti penggunaan dan peminjaman buku di&nbsp; perpustakaan, penggunaan laboratorium, ruang komputer dan sumber belajar lainnya.</li><li>Setiap siswa menyelesaikan tugas yang diberikan sekolah sesuai ketentuan yang ditetapkan.</li><li>Bagi tim piket datang 15 menit sebelum&nbsp;masuk.Tim&nbsp;Piket menyiram tanaman di luar kelas masing-masing.</li></ol><p>&nbsp;</p><p><strong>PASAL</strong><strong>&nbsp;5</strong></p><p><strong>SOPAN SANTUN PERGAULAN</strong></p><p><strong>&nbsp;</strong></p><p>Dalam pergaulan sehari-hari di sekolah, setiap siswa hendaknya :</p><ol><li>Mengucapkan&nbsp; salam&nbsp; antar&nbsp; sesama&nbsp; teman,&nbsp; dengan&nbsp; kepala&nbsp; sekolah&nbsp; dan guru, serta dengan karyawan apabila&nbsp; baru bertemu &nbsp;pada pagi / siang hari atau akan berpisah pada siang / sore hari.</li><li>Saling menghormati pendapat, menghargai perbedaan dan memilih teman belajar, bermain dan&nbsp; bergaul.</li><li>Berani menyampaikan sesuatu yang salah&nbsp; adalah&nbsp; salah&nbsp; dan&nbsp; yang&nbsp; benar adalah benar</li><li>Berani mengakui kesalahan yang terlanjur dilakukan dan meminta maaf apabila merasa&nbsp; melanggar hak orang lain</li><li>Menggunakan bahasa (kata) santun.</li></ol><p>&nbsp;</p><p><strong>PASAL</strong><strong>&nbsp;6</strong></p><p><strong>UPACARA&nbsp; BENDERA&nbsp; DAN PERINGATAN HARI-HARI BESAR</strong></p><p>&nbsp;</p><ol><li>Setiap siswa wajib mengikuti upacara bendera dengan pakaian seragam,yang telah ditentukan sekolah.</li><li>Setiap siswa wajib menjaga kehikmatan upacara Bendera dan Peringatan Hari-hari Besar Setiap siswa wajib mengikuti&nbsp; upacara peringatan hari-hari besar nasional sesuai dengan ketentuan.</li></ol><p>&nbsp;</p><p><strong>PASAL&nbsp;</strong><strong>&nbsp;7</strong></p><p><strong>LARANGAN &ndash; LARANGAN</strong></p><p>&nbsp;</p><p>Dalam kegiatan sehari-hari di sekolah, setiap siswa dilarang&nbsp;&nbsp; melakukan&nbsp; hal-hal sebagai berikut</p><ol><li>Keluar tanpa izin</li><li>Makan di dalam kelas, membeli makanan waktu pelajaran /&nbsp; bergerombol di warung / rumah tetangga.</li><li>Berpakaian seragam tidak sesuai ketentuan sekolah</li><li>Membuang sampah tidak pada tempatnya</li><li>Bermain di tempat parkir dan mengganggu sepeda teman</li><li>Berhias yang berlebihan, memakai aksesories bagi siswa putra</li><li>Rambut gondrong / disemir berwarna / tidak rapi.</li><li>Mencoret-coret&nbsp; tembok, pintu, jendela, meja dan kursi</li><li>Bersikap, berbicara, berbuat tidak sopan sesama siswa</li><li>Membolos / meninggalkan sekolah tanpa izin</li><li>Membawa buku, majalah, VCD, dan porno</li><li>Membawa kendaraan bermotor</li><li>Membawa dan merokok di lingkungan sekolah dan sekitarnya</li><li>Berkelahi / main hakim sendiri / mengancam</li><li>Merusak sarana prasarana sekolah</li><li>Mencuri / memeras</li><li>Membawa senjata tajam</li><li>Berjudi / bermain kartu dan sejenisnya</li><li>Membawa / menyebarkan&nbsp; selebaran yang menimbulkan keresahan</li><li>Membawa/ memakai/ menyimpan/ mengedarkan minum minuman keras,</li><li>Narkoba atau obat terlarang</li><li>Berpacaran</li><li>Membawa/ menggunakan Handphone di Sekolah</li><li>Membawa/menggunakan Laptop/Notebook/Tablet tanpa seijin guru mata pelajaran tertentu. Jika terjadi kerusakan atau kehilangan Laptop/Notebook/Tablet yang dibawa siswa, bukan merupakan tanggung jawab Sek</li></ol><p><strong>BAB II</strong></p><p><strong>&nbsp;</strong></p><p><strong>PELANGGARAN, SAKSI, DAN PENGHARGAAN</strong></p><p>&nbsp;</p><p>Siswa yang melakukan pelanggaran terhadap ketentuan tertentu yang tercantum dalam tatakrama dan tata tertib sekolah dikenakan sanksi sebagai berikut :</p><ol><li>Teguran lisan/tertulis</li><li>Teguran lisan/tertulis, membersihkan kelas.</li><li>Tegruan lisan/tertulis, membersihkan lingkungan kelas, melengkapi atribut seragam</li><li>Teguran lisan/tertulis, membersihkan lingkungan kelas</li><li>Teguran lisan/tertulis, jika ada yang rusak atau kehilangan maka siswa yang bersangkutan harus menggantinya</li><li>Teguran lisan/tertulis, melepas aksesoris</li><li>Teguran lisan/tertulis, rambut dipotong di tempat dan dirapikan di rumah oleh orang tua</li><li>Teguran lisan/tertulis, membersihkan dan merapikan kembali.</li><li>Teguran lisan/tertulis, ditangani oleh walikelas atau BP</li><li>Teguran lisan/tertulis, ditangani oleh walikelas atau BP</li><li>Teguran lisan/tertulis, ditangani oleh walikelas atau BP, buku, majalah, VCD, dan porno tersebut di musnahkan.</li><li>Teguran lisan/tertulis</li><li>Satu kali pelanggaran motor di tahan di Sekolah dan diambil oleh orang tua</li><li>Dua kali pelanggaran motor di tahan di Sekolah dan diambil oleh orang tua serta membayar denda untuk kegiatan kesiswaan di sekolah</li><li>Teguran lisan/tertulis, ditangani oleh walikelas atau BP serta membayar denda untuk kegiatan kesiswaan di Sekolah.</li><li>Teguran lisan/tertulis, ditangani oleh walikelas atau BP</li><li>Teguran lisan/tertulis, ditangani oleh walikelas atau BP, memperbaiki sarana yang rusak</li><li>Teguran lisan/tertulis, ditangani oleh walikelas atau BP</li><li>Teguran lisan/tertulis, ditangani oleh walikelas atau BP, senjata tajam di amankan oleh pihak Sekolah</li><li>Teguran lisan/tertulis, ditangani oleh walikelas atau BP</li><li>Teguran lisan/tertulis, ditangani oleh walikelas atau BP, selebaran di musnahkan</li><li>Teguran lisan/tertulis, ditangani oleh walikelas atau BP, minuman keras dimusnahkan</li><li>Teguran lisan/tertulis, ditangani oleh walikelas atau BP, Narkoba dan obat terlaran di musnahkan</li><li>Teguran lisan/tertulis, ditangani oleh walikelas atau BP</li><li>Teguran lisan/tertulis, ditangani oleh walikelas atau BP</li><li>Satu kali pelanggaran, Handphone diambil oleh orang tua</li><li>Dua kali pelanggaran, Handphone diambil di sekolah dan diambil setelah siswa yang bersangkutan lulus dari SMPN 1 Kalijati. Sekolah tidak bertanggung jawab apabila terjadi kerusakan selama dia bersekolah di SMPN 1 Kalijati.</li><li>Tiga kali pelanggaran atau lebih, Handphone tersebut menjadi milik sekolah.</li></ol><p>&nbsp;</p><p>&nbsp;</p><p><strong>PASAL</strong><strong>&nbsp;10</strong></p><p><strong>PELANGGARAN</strong></p><p><strong>&nbsp;</strong></p><ol><li>Dicatat dalam buku khusus pelanggaran, diberi nilai dan dibina.</li><li>Membuat / menandatangani&nbsp; buku pelanggaran</li><li>Jika pelanggaran diulangi nilai ditambah dan membuat/menandatangani surat pernyataan kedua.</li></ol><p>&nbsp;</p><p><strong>P</strong><strong>ASAL</strong><strong>&nbsp;11</strong></p><p><strong>PENGHARGAAN</strong></p><p><strong>&nbsp;</strong></p><p>Siswa yang berprestasi memperoleh penghargaan, antara lain :</p><ol><li>Pujian</li><li>Hadiah barang</li><li>Piagam</li><li>Tropy / piala</li><li>Surat keterangan</li><li>Nilai</li></ol><p>&nbsp;</p><p>&nbsp;</p><p><strong>BAB II</strong><strong>I</strong></p><p><strong>LAIN &ndash; LAIN</strong></p><p>&nbsp;</p><p>Tata krama dan tata&nbsp; tertib kehidupan&nbsp; sosial sekolah ini mengikat siswa sejak berangkat dari rumah di sekolah sampai di rumah kembali.Apabila orang tua/wali murid tidak memenuhi&nbsp; panggilan dari sekolah, siswa yang&nbsp; bersangkutan&nbsp; (melanggar&nbsp; tata&nbsp; tetib)&nbsp; tidak&nbsp; diperkenankan mengikuti pelajaran sampai orang tua/wali murid datang ke sekolah.Untuk menentukan sanksi&nbsp; pelanggaran&nbsp; yang&nbsp; berkaitan&nbsp; dengan&nbsp; tindak kejahatan/kriminal&nbsp; ditentukan&nbsp; oleh&nbsp; pihak&nbsp; yang&nbsp; berwenang&nbsp; dengan pertimbangan Tim Tertib Sekolah.Tata krama dan tata tertib ini berlaku mulai sejak tanggal ditetapkan.Tata krama yang tidak tercantum dalam tata krama dan tata tetib ini akan diputuskan lebih lanjut melalui rapat dewan guru.</p>', 'SMP Ma\'arif NU 01 Wanareja', '2025-08-26 16:17:48', 'uploads/berita/dca329eb-d0f7-4557-ab8c-ee79925fc939.png'),
(27, 'Desain', 'desain', '<p>Tata&nbsp; krama&nbsp; dan&nbsp; tata&nbsp; tertib&nbsp; sekolah ini &nbsp;dimaksudkan sebagai rambu rambu bagi siswa dalam bersikap, berucap, bertindak, dan melaksanakan kegiatan sehari-hari di sekolah&nbsp; dalam rangka menciptakan iklim dan kultur yang dapat menunjang kegiatan pembelajaran yang efektif.</p>\r\n<p>Tata krama dan tata tertib sekolah ini dibuat berdasarkan nilai-nilai yang dianut sekolah&nbsp; dan&nbsp; masyarakat sekitar, yang meliputi: nilai ketaqwaan, sopan santun, pergaulan, kedisiplinan&nbsp; dan ketertiban, kebersihan, kesehatan, kerapian, keamaan, dan lain-lain yang mendukung&nbsp; kegiatan belajar yang efektif.</p>\r\n<p>Setiap siswa wajib melaksanakan ketentuan yang tercantum dalam tata krama dan tata tertib ini secara konsekuen dan penuh kesadaran.</p>\r\n<p>Tata krama dan tata tertib sekolah ini mengikat selama menjadi siswa.</p>', 'Kupu-kupu', '2025-08-26 17:32:22', 'uploads/berita/afd8555d-b0f5-418d-9bfe-724eb008fe0e.jpeg'),
(28, 'Hubungi Kami', 'hubungi-kami', '<p>Hubungi Kami</p>\r\n<p>SMP Ma\'arif NU 01 Wanareja</p>\r\n<p>JL. KH. Hasyim Asy\'ari No.9 Wanareja Cilacap</p>\r\n<p class=\"mt-3\"><strong>Phone:</strong>&nbsp;<a href=\"https://wa.me/6282358767313?text=Halo%2C%20saya%20ingin%20bertanya%20lebih%20lanjut.\" target=\"_blank\" rel=\"noopener\">082358767313</a></p>\r\n<p><strong>Email:</strong>&nbsp;<a href=\"https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=smpmfnuwanareja@gmail.com&amp;su=Permohonan%20Informasi&amp;body=Yth.%20SMP%20Ma%27arif%20NU%201%20Wanareja%2C%0D%0ASaya%20ingin%20menanyakan%20mengenai...\" target=\"_blank\" rel=\"noopener\">smpmfnuwanareja@gmail.com</a></p>\r\n<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.8366378414785!2d108.68948977371831!3d-7.372199872552194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f7df3a68e3691%3A0x8ff2fcf8fcb8cf2a!2sSMP%20Ma&#39;arif%20NU%201%20Wanareja!5e0!3m2!1sid!2sid!4v1756204868654!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'SMP Ma\'arif NU 01 Wanareja', '2025-08-26 17:42:42', 'uploads/berita/b344dbc0-4413-4aaf-99cb-870bd15ea7b5.png'),
(30, 'Ekstrakurikuler Panahan', 'ekstrakurikuler-panahan', '<p>Ekstrakulikuler panahan adalah salah satu kegiatan di luar jam pelajaran yang bertujuan untuk mengembangkan keterampilan memanah dan mempromosikan olahraga panahan di antara siswa-siswa di sekolah. Kegiatan ini biasanya diselenggarakan di banyak sekolah sebagai bagian dari upaya untuk memberikan siswa pengalaman ekstrakurikuler yang beragam dan untuk mengembangkan keterampilan serta minat mereka di luar mata pelajaran utama. Berikut adalah beberapa informasi lebih lanjut tentang ekstrakulikuler panahan:</p>\r\n<ol>\r\n<li>\r\n<p>Tujuan Ekstrakurikuler Panahan:</p>\r\n<ul>\r\n<li>Mengembangkan keterampilan memanah siswa.</li>\r\n<li>Memperkenalkan siswa pada olahraga panahan.</li>\r\n<li>Mendorong gaya hidup aktif dan sehat.</li>\r\n<li>Memajukan nilai-nilai disiplin, fokus, dan ketekunan.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p>Aktivitas yang Dilakukan:</p>\r\n<ul>\r\n<li>Latihan teknik memanah, seperti membidik, menarik tali busur, dan melepaskan anak panah.</li>\r\n<li>Pelatihan fisik untuk meningkatkan kekuatan, ketahanan, dan keseimbangan.</li>\r\n<li>Berlatih dalam berbagai jarak dan situasi.</li>\r\n<li>Berpartisipasi dalam kompetisi atau turnamen panahan di tingkat sekolah, lokal, atau regional.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p>Fasilitas dan Perlengkapan:</p>\r\n<ul>\r\n<li>Sekolah yang memiliki ekstrakurikuler panahan biasanya menyediakan busur dan anak panah untuk siswa yang berpartisipasi.</li>\r\n<li>Fasilitas sasaran dan tempat latihan yang aman dan sesuai standar keamanan.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p>Manfaat Ekstrakulikuler Panahan:</p>\r\n<ul>\r\n<li>Pengembangan keterampilan fisik dan teknis.</li>\r\n<li>Peningkatan konsentrasi dan fokus.</li>\r\n<li>Pembentukan disiplin diri dan etika kerja.</li>\r\n<li>Kesempatan untuk berkompetisi dan memperoleh prestasi dalam olahraga.</li>\r\n<li>Meningkatkan kebugaran dan kesehatan umum.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p>Partisipasi dan Seleksi:</p>\r\n<ul>\r\n<li>Ekstrakulikuler panahan biasanya terbuka untuk siswa dari berbagai tingkat kecakapan, mulai dari pemula hingga yang berpengalaman.</li>\r\n<li>Seringkali, ada sesi seleksi untuk tim panahan sekolah atau tim yang akan mewakili sekolah dalam kompetisi.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>Siswa yang tertarik untuk mengikuti ekstrakurikuler panahan di sekolah mereka harus mencari informasi lebih lanjut tentang program yang tersedia dan tanyakan kepada guru atau koordinator ekstrakurikuler tentang cara bergabung. Selain itu, mereka juga perlu mematuhi aturan keselamatan dan etika yang berkaitan dengan olahraga panahan untuk memastikan bahwa kegiatan ini berlangsung dengan aman dan bermanfaat.</p>', 'SMP Ma\'arif NU 01 Wanareja', '2025-09-16 15:48:36', 'uploads/berita/d89f866f-9b8b-44eb-9a76-4453e83527f8.png'),
(31, 'Pagar Nusa', 'pagar-nusa', '<div class=\"elementor-element elementor-element-1d8addc elementor-widget elementor-widget-text-editor\" data-id=\"1d8addc\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\">\r\n<div class=\"elementor-widget-container\">\r\n<p>Pagar Nusa atau sering disingkat PN, adalah organisasi pencak silat di bawah naungan Nahdlatul Ulama yang berdiri pada 22 Rabi&rsquo;ul Akhir 1406 H / 3 Januari 1986 M di Pondok Pesantren Lirboyo Kediri, Jawa Timur dengan Ketua Umum pertamanya adalah KH. Abdulloh Maksum Jauhari dalam rangka menyatukan dan mewadahi sejumlah perguruan silat NU yang dahulunya beragam dan berdiri sendiri-sendiri.[1] Hingga saat ini Pagar Nusa memiliki nama resmi &ldquo;Pencak Silat Nahdlatul Ulama Pagar Nusa&rdquo;.</p>\r\n<p>Pagar Nusa berdiri sebagai badan otonom di bawah naungan Nahdlatul Ulama yang berbasis gerakan dalam melaksanakan kebijakan NU pada pengembangan seni, budaya, tradisi, olahraga pencak silat, pengobatan alternatif, dan pengabdian masyarakat.</p>\r\n</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-eafc4e7 elementor-widget elementor-widget-menu-anchor\" data-id=\"eafc4e7\" data-element_type=\"widget\" data-widget_type=\"menu-anchor.default\">\r\n<div class=\"elementor-widget-container\">\r\n<div id=\"sejarah\" class=\"elementor-menu-anchor\"></div>\r\n</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-ce9ddf8 elementor-widget elementor-widget-text-editor\" data-id=\"ce9ddf8\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\">\r\n<div class=\"elementor-widget-container\">\r\n<h2><strong>Sejarah</strong></h2>\r\n<p>Berdirinya gerakan pencak silat Pagar Nusa ini pada umumnya dilatarbelakangi oleh perasaan gelisah yang dirasakan oleh para ulama terutama aktifis pencak silat yang kala itu tidak ada suatu wadah yang menaungi para aktifis pencak silat yang jumlahnya tidak sedikit, para ulama dan aktifis menyayangkan jika aktifis pencak silat di lingkungan NU kala itu tidak ada wadah tersendiri untuk bersatu dalam suatu wadah. Lantas kemudian suatu ketika, pendekar asal&nbsp;<a title=\"\" href=\"https://id.wikipedia.org/wiki/Kota_Surabaya\">Surabaya, Jawa Timur</a>&nbsp;Kiai Suharbillah sowan kepada&nbsp;<a title=\"Mustofa Bisri\" href=\"https://id.wikipedia.org/wiki/Mustofa_Bisri\">KH. A. Mustofa Bisri</a>&nbsp;(Gus Mus) untuk meminta pendapat dan fatwa akan hal tersebut. Lalu&nbsp;<a title=\"Mustofa Bisri\" href=\"https://id.wikipedia.org/wiki/Mustofa_Bisri\">KH. A. Mustofa Bisri</a>&nbsp;memberi saran kepada KH. Suharbillah untuk mendatangi dan menghadap kepada Gus Maksum (<a title=\"Pondok Pesantren Lirboyo\" href=\"https://id.wikipedia.org/wiki/Pondok_Pesantren_Lirboyo\">Lirboyo, Kediri</a>).</p>\r\n<p>Lalu tepat pada tanggal 27 September 1985, para ulama dan aktifis pencak silat melakukan musyawarah di&nbsp;<a title=\"Pondok Pesantren Tebuireng\" href=\"https://id.wikipedia.org/wiki/Pondok_Pesantren_Tebuireng\">Pesantren Tebuireng</a>, Jombang dan beragenda untuk mendirikan sebuah organisasi yang berafiliasi kepada Jam&rsquo;iyah&nbsp;<a title=\"Nahdlatul Ulama\" href=\"https://id.wikipedia.org/wiki/Nahdlatul_Ulama\">Nahdlatul Ulama</a>&nbsp;dengan tujuan khusus untuk mewadahi dan mengembangkan kemampuan di bidang pencak silat.</p>\r\n<p>Satu tahun setelah itu, yakni pada tanggal 3 Januari 1986, para ulama dan aktifis pencak silat di kalangan NU tadu menyelenggarakan pertemuan dan musyawarah di&nbsp;<a title=\"Pondok Pesantren Lirboyo\" href=\"https://id.wikipedia.org/wiki/Pondok_Pesantren_Lirboyo\">Pondok Pesantren Lirboyo</a>, dan di pertemuan inilah disepakati pembentukan organisasi pencak silat di bawah naungan NU dengan nama &ldquo;Pagar Nusa&rdquo;.</p>\r\n<p>Kemudian pada tanggal 16 Juli 1986,&nbsp;<a title=\"Nahdlatul Ulama\" href=\"https://id.wikipedia.org/wiki/Nahdlatul_Ulama\">Pengurus Besar Nahdlatul Ulama</a>&nbsp;yang ketika itu diketuai oleh&nbsp;<a title=\"Ahmad Shiddiq\" href=\"https://id.wikipedia.org/wiki/Ahmad_Shiddiq\">KH. Ahmad Shidiq</a>&nbsp;sebagai Rais &lsquo;Aam dan&nbsp;<a title=\"Abdurrahman Wahid\" href=\"https://id.wikipedia.org/wiki/Abdurrahman_Wahid\">KH. Abdurrahman Wahid</a>&nbsp;(Gus Dur) sebagai Ketua Umum-nya, melakukan peresmian terhadap Pencak Silat Pagar Nusa sebagai salah satu badan otonom di bawah pangkuan Jam&rsquo;iyah Nahdlatul Ulama dan ketua umum Pagar Nusa pertama kali dijabat oleh&nbsp;<a class=\"new\" title=\"Abdulloh Maksum Jauhari (halaman belum tersedia)\" href=\"https://id.wikipedia.org/w/index.php?title=Abdulloh_Maksum_Jauhari&amp;action=edit&amp;redlink=1\">KH. A. Maksum Jauhari</a>.</p>\r\n</div>\r\n</div>', 'Junior_IT', '2025-09-16 16:14:34', 'uploads/berita/54dfd5cd-5dde-4f9a-ad31-294a1687a6a8.jpeg'),
(32, 'Hadroh', 'hadroh', '<p>Hadrah adalah sebuah seni pertunjukan tradisional dalam budaya Islam yang melibatkan musik, nyanyian, tari, dan gerakan-gerakan tubuh yang bersifat spiritual dan religius. Pertunjukan hadrah sering dilakukan dalam rangkaian acara keagamaan atau perayaan agama.</p>\r\n<p>Hadrah adalah bentuk pujian yang sangat penting dalam budaya Islam. Ia bukan hanya sekadar ungkapan syukur dan penghormatan kepada Nabi Muhammad, tetapi juga menjadi sarana silaturrahim dan kebersamaan dalam umat Islam.</p>\r\n<p>Hadrah adalah seni yang menggabungkan unsur-unsur budaya, dan agama dalam satu kesatuan. Seni hadrah memiliki variasi yang khas dalam berbagai negara dan wilayah, yang mayoritas penduduknya beragama Islam.</p>\r\n<p>Hadrah sering dimulai atau diiringi oleh doa dan zikir, yang menciptakan suasana kerohanian dalam pertunjukan. Seni ini memiliki peran penting, dalam menjaga dan mewariskan budaya juga tradisi Islam dari generasi ke generasi.</p>', 'SMP Ma\'arif NU 01 Wanareja', '2025-09-16 16:35:20', 'uploads/berita/39bec5e8-3dbe-4748-9367-420c9fa395d4.png');

-- --------------------------------------------------------

--
-- Table structure for table `rfid_log`
--

CREATE TABLE `rfid_log` (
  `id` int(11) NOT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rfid_log`
--

INSERT INTO `rfid_log` (`id`, `uid`, `waktu`) VALUES
(1, 'Tempelkan Kartu RFID...', '2025-08-30 09:10:01'),
(2, 'Tempelkan Kartu RFID...', '2025-08-30 09:24:09'),
(3, 'Tempelkan Kartu RFID...', '2025-09-01 09:00:55'),
(4, '49C2C92', '2025-09-01 09:01:12'),
(5, '49C2C92', '2025-09-01 09:01:34'),
(6, '8A4160AC', '2025-09-01 09:01:50'),
(7, '8A83A0AC', '2025-09-01 09:02:03'),
(8, 'E5803E2', '2025-09-01 09:02:12'),
(9, 'CA8295AC', '2025-09-01 09:02:21'),
(10, '25EA453', '2025-09-01 09:02:40'),
(11, '8A4160AC', '2025-09-01 09:05:26'),
(12, '8A4160AC', '2025-09-01 09:05:28'),
(13, '8A4160AC', '2025-09-01 09:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `rfid_logs`
--

CREATE TABLE `rfid_logs` (
  `id` int(11) NOT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `kelas` varchar(5) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nama_siswa`, `uid`, `kelas`, `no_hp`, `password`) VALUES
(1, 'Retno Kinasih', 'CA8295AC', '8', '6288980328786', '$2y$10$TpDf9Kqq.4xgYtDNpCThjut89YX/gWSDlbSMmr7d5jVBb8EMmKDyC'),
(2, 'Arvin Noer Hakim', '8A4160AC', '9', '6285842874446', '$2y$10$SXXBImsgq3hKLalZBGNZq.0rboUjBlcQpzZXZY/ClK0JyWPmg/b2O'),
(3, 'Aliya', '25EA453', '8', '6288980328786', '$2y$10$O01rx01Pr3v2wtva.iD0HeQeKxT6EdUmdDe2YcL1nQ94rc7FG7/lG'),
(4, 'Elfris Richardo', '42AA7C5', '7', '6288902824242', '$2y$10$fjyKFG38nPlaqNTljBFVRu7H.F75944ljYdLCg5LTgl.BFGDDFN1m'),
(5, 'Arshilla Natasya Rifky', 'D7497E5', '8', '6281298653100', '$2y$10$Mu1.Z1QRzVOU6ebYx3crNeVHpUSz6.xyUIwy95Jw9zQTnJDvKgEfq'),
(6, 'Safira Lailatul Jannah', '85397E5', '8', '6288220418442', '$2y$10$h9u/yRUS6vDXVlGoSiaX8eMN1Xs2EKMOClEreq1vcKIB6t4tZkYJ6'),
(7, 'Siti Maysaroh', '744C7C5', '8', '6283181960881', '$2y$10$aD4uNK6qY4S6/mYxyrX67unfgf/IqBOiHMkL7F5fVEk5suFrqWF4K'),
(9, 'Billy Barasaputra', 'EE5C7E5', '9', '6283121200191', '$2y$10$k.xcWKE3jlwsiIglypHB7eSymVyFoXwpmxiNdZistHRERxe7xq6WK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_siswa_2` (`id_siswa`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id_berita`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `rfid_log`
--
ALTER TABLE `rfid_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfid_logs`
--
ALTER TABLE `rfid_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rfid_log`
--
ALTER TABLE `rfid_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rfid_logs`
--
ALTER TABLE `rfid_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
