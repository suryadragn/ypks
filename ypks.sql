/*
 Navicat Premium Data Transfer

 Source Server         : mylocal
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3307
 Source Schema         : ypks

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 22/04/2026 15:27:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for contact_messages
-- ----------------------------
DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE `contact_messages`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_read` tinyint(1) NULL DEFAULT 0,
  `created_at` int NULL DEFAULT NULL,
  `updated_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contact_messages
-- ----------------------------

-- ----------------------------
-- Table structure for donation_account
-- ----------------------------
DROP TABLE IF EXISTS `donation_account`;
CREATE TABLE `donation_account`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `account_holder` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `contact_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of donation_account
-- ----------------------------
INSERT INTO `donation_account` VALUES (1, 'BSI (Bank Syariah Indonesia)', '7123456789', 'YAYASAN PENDIDIKAN KARANGANYAR SURAKARTA', 'Admin Yapendikra', '081234567890', 1);

-- ----------------------------
-- Table structure for foundation_config
-- ----------------------------
DROP TABLE IF EXISTS `foundation_config`;
CREATE TABLE `foundation_config`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `version_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vision` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mission` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `postal_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT 0,
  `created_at` int NULL DEFAULT NULL,
  `updated_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of foundation_config
-- ----------------------------
INSERT INTO `foundation_config` VALUES (1, 'Default Version', 'Menjadi badan hukum penyelenggara pendidikan dan sosial yang terpercaya, unggul dan lestari.', 'Mewujudkan pertumbuhan secara bertahap.\nMerekrut dan membina Sumber Daya Manusia profesional dalam lingkungan kerja yang sehat.\nMengembangkan nilai-nilai luhur dalam setiap lembaga/unit pelaksana.\nMenyelenggarakan operasional Sekolah/Perguruan Tinggi sesuai standar Pendidikan Kebudayaan Nasional.\nMenjadi lembaga inovatif dan produktif.', 'Jl. Lawu No.115 Karanganyar', '(0271) 4992051', 'ypk_bpp@yahoo.co.id', '57716', 1, 1776225926, 1776225926);

-- ----------------------------
-- Table structure for galleries
-- ----------------------------
DROP TABLE IF EXISTS `galleries`;
CREATE TABLE `galleries`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` int NULL DEFAULT NULL,
  `updated_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of galleries
-- ----------------------------
INSERT INTO `galleries` VALUES (4, 'Tenaga Pendidik dan Tenaga Kependidikan SMP Penda Tawangmangu', 'gallery_1776844918.jpeg', NULL, NULL);
INSERT INTO `galleries` VALUES (5, 'SMP Penda Tawangmangu', 'gallery_1776844961.jpeg', NULL, NULL);
INSERT INTO `galleries` VALUES (6, 'SMK Penda 2 Karanganyar', 'gallery_1776845097.png', NULL, NULL);
INSERT INTO `galleries` VALUES (7, 'Gedung SMK Penda 2 Karanganyar', 'gallery_1776845118.jpeg', NULL, NULL);
INSERT INTO `galleries` VALUES (8, 'STK Penda Batanghari', 'gallery_1776845916.png', NULL, NULL);
INSERT INTO `galleries` VALUES (9, 'Kegiatan Olahraga STK Penda Batanghari', 'gallery_1776845938.png', NULL, NULL);
INSERT INTO `galleries` VALUES (10, 'SMK Penda 3 Jatipuro', 'gallery_1776845974.jpg', NULL, NULL);
INSERT INTO `galleries` VALUES (11, 'Gedung Utama SMK Penda 3 Jatipuro', 'gallery_1776846064.jpg', NULL, NULL);
INSERT INTO `galleries` VALUES (12, 'Lapangan SMK Penda 3 Jatipuro', 'gallery_1776846087.jpg', NULL, NULL);
INSERT INTO `galleries` VALUES (13, 'Ruang Praktek SMK Penda 3 Jatipuro', 'gallery_1776846112.jpg', NULL, NULL);
INSERT INTO `galleries` VALUES (14, 'Lap Komputer SMK Penda 3 Jatipuro', 'gallery_1776846136.jpg', NULL, NULL);
INSERT INTO `galleries` VALUES (15, 'Ruang BKK SMK Penda 3 Jatipuro', 'gallery_1776846185.jpg', NULL, NULL);
INSERT INTO `galleries` VALUES (16, 'Perpustakaan SMK Penda 3 Jatipuro', 'gallery_1776846202.jpg', NULL, NULL);
INSERT INTO `galleries` VALUES (17, 'Ruang UKS SMK Penda 3 Jatipuro', 'gallery_1776846219.jpg', NULL, NULL);
INSERT INTO `galleries` VALUES (18, 'Pintu Akses Perpustakaan SMK Penda 3 Jatipuro', 'gallery_1776846270.jpg', NULL, NULL);
INSERT INTO `galleries` VALUES (19, 'Relax Room Perpustakaan SMK Penda 3 Jatipuro', 'gallery_1776846290.jpg', NULL, NULL);

-- ----------------------------
-- Table structure for institution_profiles
-- ----------------------------
DROP TABLE IF EXISTS `institution_profiles`;
CREATE TABLE `institution_profiles`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `institution_id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `vision` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `mission` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `history` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` int NULL DEFAULT NULL,
  `updated_at` int NULL DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tiktok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `institution_id`(`institution_id` ASC) USING BTREE,
  CONSTRAINT `fk-institution-profile-institution_id` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of institution_profiles
-- ----------------------------
INSERT INTO `institution_profiles` VALUES (1, 1, 'Profil lengkap Akademi Peternakan Karanganyar (APEKA) sedang disusun.', '', '', '', 1775035560, 1775037240, NULL, NULL, NULL, NULL);
INSERT INTO `institution_profiles` VALUES (2, 2, 'Nama Satuan Pendidikan: SMK PENDA 2 KARANGANYAR\r\nNPSN: 20312070\r\nJenjang Pendidikan: SMK (DIKMEN)\r\nStatus Sekolah: SWASTA\r\nTahun Berdiri: -\r\nNaungan/Yayasan: Yayasan Pendidikan Karanganyar Surakarta (YPKS)\r\nAlamat Sekolah: JALAN LAWU, HARJOSARI\r\nDusun/Desa: POPONGAN\r\nKecamatan: KEC. KARANGANYAR\r\nKabupaten: KAB. KARANGANYAR\r\nProvinsi: PROV. JAWA TENGAH\r\nKode Pos: 57715\r\n\r\nSMK Penda 2 Karangnyar bertujuan untuk :\r\n1. Terwujudnya SMK Penda 2 Karanganyar sebagai pusat pendidikan dan pelatihan komptensi teknologi kejuruan yang berbasis manajemen wirausaha\r\n2. Menghasilkan tamatan yang professional, tangguh berjiwa mandiri, berbudi pekerti luhur yang mampu menguasai bahasa pergaulan internasional\r\n3. Bersama instansi lain yang berkaitan menunjang pelaksanaan ekonomi daerah Kabupaten Karanganyar\r\n4. Memberikan layanan pelatihan kompetensi di bidang teknologi dan industry kepada lembaga maupun masyarakat umum\r\n5. Memberi layanan jasa dan produksi\r\n6. Mengembangkan diri menjadi Pusat Pendidikan Keunggulan Teknologi (PPKT)\r\n7. Mengembangkan diri menjadi tes center\r\n', 'Terwujudnya warga sekolah yang berakhlak mulia, terdidik, terampil dan mandiri', '1. Mengembangkan sumber daya secara optimal guna mempersiapkan lulusan yang berakhlak mulia\r\n2. Mewujudkan pendidikan yang prima untuk menghasilkan lulusan yang berprestasi\r\n3. Meningkatkan sumber daya dan peralatan praktik guna memenuhi ketrampilan siswa\r\n4. Menumbuhkan jiwa kewiraushaan guna kemandirian siswa', 'Sejarah\r\nBerdiri sejak tahun 1985, semula adalah STM Pertanian Karanganyar. Seiring berjalannya waktu, serta menyesuaikan kebutuhan dari masyarakat, maka terhitung mulai tanggal 22 April 1996 berdasar “surat persetujuan pendirian/penyelenggaraan sekolah swasta nomor 584/I03/I/1996” yang diterbitkan oleh Kepala Kantor Wilayah Departemen Pendidikan dan Kebudayaan Provinsi Jawa Tengah, STM Pertanian Karanganyar bertranformasi menjadi SMK Penda 2 Karanganyar yang beralamat di Jl. Lawu Harjosari Popongan Karanganyar.\r\nPada awal berdirinya, SMK Penda 2 Karanganyar hanya membuka 2 program keahlian yaitu Teknik Mekanik Otomotif (MO) dan Teknik Mekanik Industri (MI). Dari 2 program keahlian tersebut, pada awal beridinya SMK Penda 2 Karanganyar memiliki 4 kelas regular.  Paradigma baru pengembangan pendidikan perlu didasarkan atas kondisi lingkungan strategis yang sedang berkembang saat ini, yaitu menghadapi era globalisasi yang semakin terbuka dan kompetitif, yang diiringi dengan pesatnya perkembangan ilmu pengetahuan dan teknologi serta pentingnya dunia kesehatan bagi masyarakat. Oleh sebab itu, pada tahun 2012 SMK Penda 2 Karanganyar, membuka 1 program keahlian baru yaitu Tata Busana (TB).\r\nSampai saat ini, setelah melakukan sosialisasi dan berbagai pendekatan serta memperhatikan saran dari wali murid dan tokoh masyarakat, SMK Penda 2 Karanganyar lebih dikenal oleh masyarkat. Hal itu terbukti secara kuantitas jumlah peserta didik yang tercatat saat ini lebih dari 1000 siswa dari 3 program keahlian yang ada yaitu:\r\n\r\nTeknik Kendaraan Ringan (TKR)\r\nTeknik Mekanik Industri (TMI)\r\nDesain & Produksi Busana (DPB)', 1775035560, 1775035560, 'https://www.facebook.com/share/14JPG9BQHTH/?mibextid=wwXIfr', 'https://www.instagram.com/smkpenda2kra?igsh=MW10MHlmcjJhZWN6ag%3D%3D&utm_source=qr', 'https://www.tiktok.com/@smkpenda2kra?_r=1&_t=ZS-95jpDRT4sPH', 'https://youtube.com/@smkpenda2channel384?si=xHdcLYXgP7M4vl0h');
INSERT INTO `institution_profiles` VALUES (3, 3, 'Nama Satuan Pendidikan: SMK Penda 3 Jatipuro \r\nNPSN: 20361811\r\nJenjang Pendidikan: Sekolah Menengah Kejuruan (SMK) \r\nStatus Sekolah: Swasta\r\nTahun Berdiri: 2011\r\nNaungan/Yayasan: Yayasan Pendidikan Karanganyar Surakarta (YPKS)\r\nAlamat Sekolah: Jl. Raya Jatipuro-Karanganyar KM.1, Sekarpetak \r\nDusun/Desa: Jatipuro \r\nKecamatan: Jatipuro \r\nKabupaten: Karanganyar \r\nProvinsi: Jawa Tengah \r\nKode Pos: 57884 \r\nNomor Telepon/HP: 085725455302 \r\nEmail Sekolah: -\r\nWebsite: smkpenda3jatipuro.sch.id\r\nNama Kepala Sekolah: Arianto Widhi Nugroho, S.E Status Akreditasi: B\r\n\r\nSMK Penda 3 Jatipuro memiliki tujuan :\r\na.Tujuan Umum\r\nMeningkatkan kecerdasan, pengetahuan, kepribadian, ahlaq mulia, serta ketrampilan untuk hidup mandiri dan mengikuti pendidikan lebih lanjut sesuai dengan kejuruannya.\r\nb.Tujuan Khusus\r\n1. Menyiapkan peserta didik agar menjadi manusia produktif, mampu bekerja mandiri, mengisi lowongan pekerjaan yang ada di dunia usaha dan dunia industri sebagai tenaga kerja tingkat menengah sesuai dengan kompetensi dalam program keahlian yang dipilihnya;\r\n2. Menyiapkan peserta didik agar mampu memilih karier, ulet dan gigih dalam berkompetisi, beradaptasi di lingkungan kerja, dan mengembangkan sikap profesional dalam bidang keahlian yang diminatinya;\r\n3. Membekali peserta didik dengan ilmu pengetahuan, teknologi, dan seni, agar mampu mengembangkan diri di kemudian hari baik secara mandiri maupun melalui jenjang pendidikan yang lebih tinggi;\r\n4. Membekali peserta didik dengan kompetensi-kompetensi yang sesuai dengan program keahlian yang dipilih.\r\nc.	TUJUAN KOMPETENSI KEAHLIAN KENDARAAN RINGAN OTOMOTIF\r\nTujuan Kompetensi Keahlian Teknik Kendaraan Ringan Otomotif adalah membekali peserta didik  dengan keterampilan, pengetahuan dan sikap agar kompeten dalam:\r\n1. Menguasai dasar-dasar teknik mekanik otomotif\r\n2. Perawatan dan perbaikan motor otomotif\r\n3. Perawatan dan perbaikan sistem pemindah tenaga otomotif ( Power train)\r\n4. Perawatan dan perbaikan chasis otomotif\r\n5. Perawatan dan perbaikan sistem kelistrikan otomotif\r\n6. Perawatan dan perbaikan sistem AC kendaraan\r\n', 'Menciptakan tenaga kerja tingkat menegah yang berjiwa pancasila dan profesional yang mampu berkompetisi di era global.', '1. Menyelenggarakan pendidikan dan latihan berbasis produktif\r\n2. Menyiapkan tenaga kerja tingkat menengah sesuai kebutuhan industri yang mampu bersaing dan mempunyai keunggulan di bidang teknologi dan industry\r\n3. Memberikan bekal kepada siswa agar mampu mengembangkan diri dan meningkatkan martabatnya, dapat mandiri.\r\n', 'SMK Penda 3 Jatipuro adalah sebuah institusi Pendidikan SMK Swasta yang alamatnya di Jl. Jatipuro Karanganyar Km 01, Kab. Karanganyar.\r\nSMK swasta ini mengawali perjalanannya pada tahun 1998. Saat ini SMK Penda 3 Jatipuro memakai panduan kurikulum pemerintah yaitu Kurikulum Merdeka. Teknik Kendaraan Ringan Otomotif dan Asisten Keperawatan. SMK Penda 3 Jatipuro memiliki sosok kepala sekolah yang bernama Arianto Widhi Nugroho, S.E\r\n', 1775035560, 1775035560, NULL, 'www.instragram.com/smkpenda3jatipuro', 'www.tiktok.com/@smkpenda3jatipuro', NULL);
INSERT INTO `institution_profiles` VALUES (4, 4, 'Nama Satuan Pendidikan: SMP PENDA MOJOGEDANG \r\nNPSN: 20312046 \r\nJenjang Pendidikan: SMP (DIKDAS) \r\nStatus Sekolah: SWASTA \r\nTahun Berdiri: 1981 (Berdasarkan SK Pendirian) \r\nNaungan/Yayasan: Yayasan \r\nAlamat Sekolah: MOJOGEDANG RT 02/1 \r\nDusun/Desa: MOJOGEDANG \r\nKecamatan: KEC. MOJOGEDANG \r\nKabupaten: KAB. KARANGANYAR \r\nProvinsi: PROV. JAWA TENGAH', '', '', '', 1775035560, 1775035560, NULL, NULL, NULL, NULL);
INSERT INTO `institution_profiles` VALUES (5, 5, 'Nama Satuan Pendidikan: SMP PENDA TAWANGMANGU \r\nNPSN: 20337805 \r\nJenjang Pendidikan: SMP \r\nStatus Sekolah: Swasta \r\nTahun Berdiri: 1981 (Berdasarkan SK Pendirian) \r\nNaungan/Yayasan: Yayasan \r\nAlamat Sekolah: Jln. Desa Nglebak RT 01 / RW 01\r\nDusun/Desa: Nglebak \r\nKecamatan: Kec. Tawangmangu \r\nKabupaten: Kab. Karanganyar \r\nProvinsi: Prov. Jawa Tengah\r\nKode Pos: 57792 \r\nNomor Telepon/HP: 0271697494 \r\nEmail Sekolah: esempependa@yahoo.com \r\n\r\nDengan indicator sebagai berikut :\r\n1.	Terlaksananya kegiatan ibadah terhadap Tuhan Yang Maha Esa.\r\n2.	Terbentuknya peserta didik yang disiplin, berperilaku santun dan berbudi pekerti yang ditandai dengan berkurangnya pelanggaran tata tertib.\r\n3.	Meningkatnya nilai rata-rata bidang akademik, non akademik dan kelulusan serta mampu mengaplikasikan kemajuan teknologi.\r\n4.	Tumbuhnya kesadaran para peserta didikakan kelestarian lingkungan sekitar.\r\n', 'Terwujudnya Lulusan yang Bertaqwa, Berakhlak, Cerdas, dan  Berwawasan Lingkungan.', '1.	Melaksanakan dan mengamalkan ajaran agama di sekolah.\r\n2.	Melaksanakan sholat dhuha, sholat dhuhur berjamaah, dan sholat Jum’at.  \r\n3.	Melaksanakan kegiatan pendalaman baca tulis Al Qur’an dan Kelas Tahfidz bagi peserta didik yang beragama Islam.\r\n4.	Melaksanakan ibadah syukur dan do’a bagi peserta didik yang beragama Kristen.\r\n5.	Melaksanakan pembiasaan peserta didik berperilaku santun, bertutur kata sopan, mentaati tata tertib yang berlaku di sekolah dan norma di masyarakat.\r\n6.	Melaksanakan pembiasaan guru dengan dating lebih awal dalam menyambut kedatangan peserta didik.\r\n7.	Meningkatkan nilai rata-rata kenaikan kelas VII dan VIII, serta nilai rata-rata kelulusan kelas IX.\r\n8.	Mengenalkan dan mengaplikasikan teknologi sejak dini kepada peserta didik.\r\n9.	Mengefektifkan pelajaran tambahan untuk persiapan OSN, O2SN, FLS2N, dan MAPSI.\r\n10.	Menumbuhkan kesadaran para peserta didik akan kelestarian lingkungan sekitar menuju sekolah adiwiyata.\r\n', 'SMP Penda Tawangmangu yang berlokasi di Jl Desa Nglebak Tawangmangu, merupakan satu dari SMP di Kabupaten Karanganyar yang berdiri pada tangga l1 Januari 1977, memiliki peserta didik sejumlah 322 siswa dari kelas VII sampai kelas IX dengan rombongan belajar berjumlah 11 rombel. \r\nSMP Penda Tawangmangu sebagai satuan pendidikan yang diminati mayoritas penduduk di daerah sekitar, dengan potensi wilayah / letak yang strategis di daerah wisata tawangmangu memiliki beberapa kekuatan diantaranya: 1) input murid berasal dari keluarga yang peduli terhadap kepentingan pendidikan; 2) lingkungan pertanian dan pariwisata  yang menuntut masyarakat untuk sekolah kejenjang yang lebih tinggi; 3) kultur masyarakat desa yang bernuansa kerja keras, gotong royong, dan menjunjung tinggi nilai-nilai kearifan lokal; 4) sarana pendukung layanan proses pembelajaran yang memadai; 5) merupakan salah satu sekolah rujukan yang terletak di Desa Nglebak dengan lingkungan yang asri dan rindang; dan 6) letak sekolah sangat strategis karena akses yang mudah. Dengan adanya SMP Penda Tawangmangu, masyarakat merasakan dampak yang positif. Mulai dari mudahnya mendapatkan pendidikan bagi anaknya, lingkungan menjadi lebih kondusif, mendapat perhatian yang lebih dari sekolah.\r\nMasyarakat di sekitar SMP Penda Tawangmangu sebagian besar adalah petani, pedagang dan pengusaha. Sebagai sekolah yang berada pada lingkungan pariwisata, selalu mendapat respon positif dari warga sekolah dan masyarakat (orang tua murid) ketika sekolah menyelenggarakan kegiatan gotong royong. Dalam rangka meningkatkan potensi tersebut, SMP Penda Tawangmangu mengadakan kerjasama Puskesmas, Koramil, Polsek, tokoh masyarakat baik Kades dan Pemerintah Desa, Kecamatan dan Dinas terkait lainnya untuk mengelola Sumberdaya alam / lingkungan untuk mewujudkan sekolah yang ramah anak dan ramah lingkungan. \r\n', 1775035560, 1775035560, NULL, NULL, NULL, NULL);
INSERT INTO `institution_profiles` VALUES (6, 6, 'Nama Satuan Pendidikan	: TK Penda RinginAsri\r\nNPSN				: 20348965\r\nJenjang Pendidikan		: Taman Kanak-Kanak (TK)\r\nStatus Sekolah			: Swasta\r\nTahun Berdiri			: 1984\r\nNaungan/Yayasan		: Yayasan Pendidikan Karanganyar Surakarta (YPKS)\r\nAlamatSekolah :\r\nDusun/Desa			: Ringin Asri\r\nKecamatan			: Karanganyar\r\nKabupaten			: Karanganyar\r\nProvinsi			: Jawa Tengah\r\nKodePos			: 57716\r\nNomorTelepon/HP	: 081329740154\r\nEmail Sekolah	: -\r\nWebsite	: -\r\nNama KepalaSekolah		: Sri Mulyani, S.Pd AUD\r\nStatus Akreditasi		: B\r\nKurikulum yang Digunakan	: Kurikulum Merdeka (PAUD)\r\nWaktu Penyelenggaraan	: Pagi Hari\r\nKelompokUsiaPesertaDidik :\r\n•	Kelompok A (4–5 Tahun) \r\n•	Kelompok B (5–6 Tahun)\r\n\r\nTujuan Taman Kanak-Kanak Penda RinginAsri adalah sebagai berikut:\r\n1.	Terwujudnya anak yang bertaqwa kepadaTuhan Yang Maha Esa, \r\n2.	Terwujudnya anak yang berakhlaq mulia.\r\n3.	Terwujudnya anak yang  yang berbudiluhur. \r\n4.	Terwujudnya anak yang sehat jasmani rohani.\r\n5.	Terwujudnya berbagai kegiatan dalam proses belajar mengajar yang atraktif. \r\n6.	Terwujudnya hasil karya anak yang variatif.\r\n7.	Terwujudnya anak yang memiliki sikap sosial. \r\n8.	Terwujudnya budaya hidup sehat dan bersih. \r\n9.	Terwujudnya anak yang memiliki rasa cinta tanah air. \r\n10.	Terwujudnya anak yang memiliki rasa semangat kebangsaan\r\n', 'TanggungJawab, Kreatif, Cerdas, Beriman Dan bertakwa ,serta Berkarakter.', 'Misi TK Penda RinginAsri adalah sebagai berikut;\r\n1.	Mewujudkan  anak yang bertangguang Jawab\r\n2.	Melatih kreatif yang ada dalam diri anak\r\n3.	Melatih kemandirian dalam diri anak\r\n4.	Melatih keimanan dan ketakwaan kepada Tuhan Yang Maha Esa\r\n5.	Menanamkan rasa cinta tanah air dan bangsa.\r\n6.	Menanamkan anak untuk gotong royong\r\n', 'TK Penda Ringin Asri Kabupaten Karanganyar merupakan lembaga pendidikan anak usia dini yang berada di bawah naungan Yayasan Pendidikan Karanganyar Surakarta. Lembaga ini didirikan pada tahun 1984 sebagai wujud kepedulian yayasan dan masyarakat terhadap pentingnya pendidikan anak usia dini sebagai fondasi awal dalam membentuk karakter, kecerdasan, dan kesiapan anak untuk melanjutkan ke jenjang pendidikan berikutnya.\r\nPendirian TK Penda Ringin Asri dilatarbelakangi oleh kebutuhan masyarakat akan layanan pendidikan yang mampu mengembangkan seluruh aspek perkembangan anak sejak usia dini secara optimal. Sejak awal berdirinya, lembaga ini mendapatkan dukungan yang baik dari masyarakat sekitar yang mayoritas bekerja sebagai petani, wiraswasta, karyawan swasta, serta sebagian sebagai Pegawai Negeri Sipil.\r\nNama “Ringin Asri” diambil dari nama wilayah tempat berdirinya taman kanak-kanak ini, yang mencerminkan identitas lingkungan setempat. Lingkungan yang asri dan kondusif tersebut diharapkan mampu menciptakan suasana belajar yang nyaman, aman, dan menyenangkan bagi anak-anak.Dalam perjalanannya sejak tahun 1984, TK Penda Ringin Asri terus mengalami perkembangan baik dari segi jumlah peserta didik, tenaga pendidik, maupun sarana dan prasarana. Lingkungan masyarakat yang memiliki beragam potensi lokal, seperti kegiatan pertanian, peternakan, kerajinan, konveksi, bengkel, serta usaha kuliner, turut dimanfaatkan sebagai sumber belajar yang kontekstual dalam proses pembelajaran.\r\nSeiring dengan perkembangan zaman, TK Penda Ringin Asri terus berupaya meningkatkan kualitas layanan pendidikan melalui berbagai inovasi pembelajaran. Program pembelajaran difokuskan pada pengembangan literasi, numerasi, serta pendidikan karakter dengan pendekatan pembelajaran yang berpihak pada anak (merdeka belajar). Selain itu, sekolah juga mengembangkan kurikulum berbasis budaya Jawa dan potensi lingkungan lokal.Sebagai bentuk komitmen dalam memberikan layanan yang menyeluruh, TK Penda Ringin Asri juga menerapkan program Pengembangan Anak Usia Dini Holistik Integratif (PAUD-HI) yang mencakup aspek pendidikan, kesehatan, gizi, pengasuhan, dan perlindungan anak.\r\nHingga saat ini, TK Penda Ringin Asri tetap berkomitmen untuk menjadi lembaga pendidikan anak usia dini yang berkualitas, serta berperan aktif dalam mencetak generasi yang cerdas, mandiri, kreatif, dan berakhlak mulia.\r\n', 1775035560, 1776839704, NULL, 'https://www.instagram.com/tkpenda_kab.karanganyar?igsh=ZHQ3dzJ6cmM4Z3Fl', NULL, NULL);

-- ----------------------------
-- Table structure for institutions
-- ----------------------------
DROP TABLE IF EXISTS `institutions`;
CREATE TABLE `institutions`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `external_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `is_active` smallint NULL DEFAULT 1,
  `created_at` int NULL DEFAULT NULL,
  `updated_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of institutions
-- ----------------------------
INSERT INTO `institutions` VALUES (1, 'Akademi Peternakan Karanganyar (APEKA)', 'Akademi Peternakan Karanganyar (APEKA) menyelenggarakan pendidikan tinggi di bidang peternakan dengan fokus pada kualitas lulusan yang siap kerja.', 'logo-apeka.png', 'http://www.yapendikra.or.id/2015/10/galeri-foto-apeka.html', 0, 1775033360, 1775033360);
INSERT INTO `institutions` VALUES (2, 'SMK Penda 2 Karanganyar', 'SMK Penda 2 Karanganyar merupakan lembaga pendidikan menengah kejuruan yang berorientasi pada teknologi dan industri.\r\n\r\nSurat Persetujuan Pendirian / Penyelenggaraan Sekolah Swasta Nomor : 584 / I03 / I / 1996 Kepala Kantor Wilayah Departemen Pendidikan dan Kebudayaan Provinsi Jawa Tengah', 'logo-smk-penda-2-kra.png', 'https://smkpenda2-kra.sch.id', 1, 1775033360, 1775033360);
INSERT INTO `institutions` VALUES (3, 'SMK Penda 3 Jatipuro', 'SMK Penda 3 Jatipuro fokus pada pengembangan keterampilan siswa di bidang manajemen dan bisnis.\r\n\r\nSurat Persetujuan Pendirian / Penyelenggaraan Sekolah Swasta Nomor : 0838 / I03.08 / MN / ’98 Kepala Kantor Wilayah Departemen Pendidikan dan Kebudayaan Provinsi Jawa Tengah', 'logo-smk-penda-3-jatipuro.png', 'www.smkpenda3jatipuro.com', 1, 1775033360, 1775033360);
INSERT INTO `institutions` VALUES (4, 'SMP Penda Mojogedang', 'SMP Penda Mojogedang memberikan pendidikan dasar menengah dengan penekanan pada karakter dan akhlak mulia.\r\n\r\nBupati Kepala Daerah Tingkat II Karanganyar \r\nKeputusan Bupati Kepala Daerah Tingkat II Karanganyar Nomor : 421.3/6 39 Tahun 1984 tentang Penunjukan Yayasan Daerah Kabupaten Karanganyar Untuk Mengelola Sekolah Menengah Pertama Penda Mojogedang.\r\n', 'logo-smp-penda-mojogedang.png', 'http://www.yapendikra.or.id/2015/10/profil-smp-penda-mojogedang.html', 1, 1775033360, 1775033360);
INSERT INTO `institutions` VALUES (5, 'SMP Penda Tawangmangu', 'SMP Penda Tawangmangu terletak di kawasan wisata, memberikan lingkungan belajar yang asri dan kondusif.\r\n\r\nKeputusan Kepala Daerah Tingkat II Karanganyar Nomor : 420/387 th 1981 tentang Pengesyahan Pendiri dan Pembentukan Pengurus Pendiri Sekolah Menengah Pertama ( SMP ) Penda di Tawangmangu.', 'logo-smp-penda-tawangmangu.jpg', 'http://www.yapendikra.or.id/2015/10/profil-smp-penda-tawangmangu_23.html', 1, 1775033360, 1775033360);
INSERT INTO `institutions` VALUES (6, 'STK Penda Batanghari', 'TK Penda Karanganyar adalah awal dari perjalanan pendidikan putra-putri Anda, bermain sambil belajar dengan ceria.\r\n\r\nKepala Kantor Departemen Pendidikan Nasional Provinsi Jawa Tengah Kabupaten Karanganyar Nomor : 014/i03.33.06/ds/2001 tentang Izin Pendirian dan Penyelenggaraan Taman Kanak-kanak Kepala Kantor Departemen Pendidikan Nasional Propinsi Jawa Tengah Kabupaten Karanganyar', 'logo-tk.jpg', 'http://www.yapendikra.or.id/2015/10/profil-tk-penda-bhatanghari.html', 1, 1775033360, 1775033360);

-- ----------------------------
-- Table structure for master_permissions
-- ----------------------------
DROP TABLE IF EXISTS `master_permissions`;
CREATE TABLE `master_permissions`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `code`(`code` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_permissions
-- ----------------------------
INSERT INTO `master_permissions` VALUES (1, 'news', 'Kelola Berita', 'Izin untuk menambah, mengedit, dan menghapus postingan berita.');
INSERT INTO `master_permissions` VALUES (2, 'gallery', 'Kelola Galeri', 'Izin untuk mengunggah foto dan mengelola album dokumentasi.');
INSERT INTO `master_permissions` VALUES (3, 'institution', 'Kelola Lembaga', 'Izin untuk memperbarui profil dan data lembaga pendidikan.');
INSERT INTO `master_permissions` VALUES (4, 'page', 'Kelola Halaman Statis', 'Izin untuk mengedit profil yayasan dan halaman statis lainnya.');
INSERT INTO `master_permissions` VALUES (5, 'message', 'Kelola Pesan Masuk', 'Izin untuk membaca dan membalas aspirasi dari form kontak.');
INSERT INTO `master_permissions` VALUES (6, 'program', 'Manajemen Program Sosial', 'Akses untuk mengelola jenis program dan daftar program sosial.');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apply_time` int NULL DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', 1775021483);
INSERT INTO `migration` VALUES ('m130524_201442_init', 1775021483);
INSERT INTO `migration` VALUES ('m190124_110200_add_verification_token_column_to_user_table', 1775021483);
INSERT INTO `migration` VALUES ('m260401_065524_create_institutions_table', 1775026613);
INSERT INTO `migration` VALUES ('m260401_065525_create_galleries_table', 1775026613);
INSERT INTO `migration` VALUES ('m260401_065525_create_news_table', 1775026613);
INSERT INTO `migration` VALUES ('m260401_065525_create_pages_table', 1775026613);
INSERT INTO `migration` VALUES ('m260401_072106_add_author_and_publish_date_to_news_table', 1775028137);
INSERT INTO `migration` VALUES ('m260401_084758_seed_institutions_data', 1775033360);
INSERT INTO `migration` VALUES ('m260401_090059_fix_institution_logos_filenames', 1775034098);
INSERT INTO `migration` VALUES ('m260401_092148_add_external_link_to_institutions_table', 1775035341);
INSERT INTO `migration` VALUES ('m260401_092517_create_institution_profiles_table', 1775035560);
INSERT INTO `migration` VALUES ('m260401_093644_add_is_active_to_institutions_table', 1775036230);
INSERT INTO `migration` VALUES ('m260401_094525_final_create_contact_messages_table', 1775036839);
INSERT INTO `migration` VALUES ('m260401_102925_add_permissions_to_user_table', 1775039389);
INSERT INTO `migration` VALUES ('m260401_103411_create_master_permissions_table', 1775039670);
INSERT INTO `migration` VALUES ('m260401_103531_create_user_permissions_table', 1775039752);
INSERT INTO `migration` VALUES ('m260402_105629_create_social_program_tables', 1775102222);
INSERT INTO `migration` VALUES ('m260402_110200_add_program_permission', 1775102497);
INSERT INTO `migration` VALUES ('m260402_112000_seed_program_data', 1775103940);
INSERT INTO `migration` VALUES ('m260402_113000_create_donation_account_table', 1775104284);
INSERT INTO `migration` VALUES ('m260415_040503_create_foundation_config_table', 1776225926);
INSERT INTO `migration` VALUES ('m260422_065452_add_social_links_to_institution_profiles_table', 1776840917);

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `publish_date` date NULL DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT 10,
  `created_at` int NULL DEFAULT NULL,
  `updated_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` int NULL DEFAULT NULL,
  `updated_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `slug`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pages
-- ----------------------------

-- ----------------------------
-- Table structure for social_program
-- ----------------------------
DROP TABLE IF EXISTS `social_program`;
CREATE TABLE `social_program`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_id` int NOT NULL,
  `donation_account_id` int NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `target_amount` decimal(15, 2) NULL DEFAULT 0.00,
  `current_amount` decimal(15, 2) NULL DEFAULT 0.00,
  `status` smallint NULL DEFAULT 1,
  `is_featured` tinyint(1) NULL DEFAULT 0,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `slug`(`slug` ASC) USING BTREE,
  INDEX `idx-social_program-type_id`(`type_id` ASC) USING BTREE,
  INDEX `fk-social_program-donation_account_id`(`donation_account_id` ASC) USING BTREE,
  CONSTRAINT `fk-social_program-donation_account_id` FOREIGN KEY (`donation_account_id`) REFERENCES `donation_account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-social_program-type_id` FOREIGN KEY (`type_id`) REFERENCES `social_program_type` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of social_program
-- ----------------------------

-- ----------------------------
-- Table structure for social_program_type
-- ----------------------------
DROP TABLE IF EXISTS `social_program_type`;
CREATE TABLE `social_program_type`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `icon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of social_program_type
-- ----------------------------
INSERT INTO `social_program_type` VALUES (1, 'Dana Bantuan Sosial', 'Program penggalangan dana untuk bantuan sosial dan kemanusiaan.', 'fas fa-hands-helping');
INSERT INTO `social_program_type` VALUES (2, 'Beasiswa Pendidikan', 'Program sosialisasi dan penyaluran beasiswa bagi santri/siswa berprestasi atau kurang mampu.', 'fas fa-graduation-cap');
INSERT INTO `social_program_type` VALUES (3, 'Pembangunan & Sarpras', 'Pembangunan gedung, asrama, masjid, dan sarana prasarana lainnya.', 'fas fa-building');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_superadmin` smallint NULL DEFAULT 0,
  `status` smallint NOT NULL DEFAULT 10,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username` ASC) USING BTREE,
  UNIQUE INDEX `email`(`email` ASC) USING BTREE,
  UNIQUE INDEX `password_reset_token`(`password_reset_token` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'suryaism', 'cMi11wPt9591mWp9N0fbv3XroYZ5o6nO', '$2y$13$lIXXr5XfCNH1sePWXBAelOJLkUqJmlyrrZijQ49.94WLLuYZe2z0m', NULL, 'adhisurya05@gmail.com', 1, 10, 1775030891, 1776220524, NULL);
INSERT INTO `user` VALUES (2, 'admin', '1iWIfLw8CqnKj6gTSIUkuKju9sKcyeBk', '$2y$13$4NyTcLPF1rTaINIwHNn1o.NHp.2OP/98W5mIaai3rhP0PqD5cqR52', NULL, 'admin@ypks.id', 1, 10, 1776060716, 1776220637, 'srKzrAaw4ggTX0d0eNaiO0keaoTz9_TT_1776060716');

-- ----------------------------
-- Table structure for user_permissions
-- ----------------------------
DROP TABLE IF EXISTS `user_permissions`;
CREATE TABLE `user_permissions`  (
  `user_id` int NOT NULL,
  `permission_id` int NOT NULL,
  PRIMARY KEY (`user_id`, `permission_id`) USING BTREE,
  INDEX `fk-user_permissions-permission_id`(`permission_id` ASC) USING BTREE,
  CONSTRAINT `fk-user_permissions-permission_id` FOREIGN KEY (`permission_id`) REFERENCES `master_permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-user_permissions-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_permissions
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
