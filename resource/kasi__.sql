-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 Mei 2018 pada 07.53
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasi__`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_disposisi`
--

CREATE TABLE `tbl_disposisi` (
  `id_disposisi` int(10) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `isi_disposisi` mediumtext NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` varchar(250) NOT NULL,
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_disposisi`
--

INSERT INTO `tbl_disposisi` (`id_disposisi`, `tujuan`, `isi_disposisi`, `sifat`, `batas_waktu`, `catatan`, `id_surat`, `id_user`) VALUES
(2, 'Nur Hafid', 'Segera Koordinasi Pelaksanaan Zakat Fitrah', 'Segera', '2016-06-12', 'Segera Laksanakan', 11, 5),
(4, 'Muriati', 'fsefetes', 'Penting', '2018-04-28', 'rgregr', 14, 1),
(5, 'jfdhd', 'hfdhsdfg', 'Biasa', '2018-06-08', 'jfdsf', 14, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_disposisilain`
--

CREATE TABLE `tbl_disposisilain` (
  `id_diposisi` int(10) NOT NULL,
  `skpd_ukpd` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `perihal` varchar(200) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_disposisilain`
--

INSERT INTO `tbl_disposisilain` (`id_diposisi`, `skpd_ukpd`, `tgl`, `perihal`, `kepada`, `keterangan`) VALUES
(1, 'PUSKESMAS', '2018-05-18', 'kkljgjfdh', 'staf1', 'jkhghgfzdf'),
(2, 'PUSKESMAS', '2018-05-18', 'lkkj', 'staf1', 'iuytr');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_disposisisurat`
--

CREATE TABLE `tbl_disposisisurat` (
  `id_disposisi` int(10) NOT NULL,
  `no_surat` int(20) NOT NULL,
  `skpd_ukpd` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` varchar(200) NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_disposisisurat`
--

INSERT INTO `tbl_disposisisurat` (`id_disposisi`, `no_surat`, `skpd_ukpd`, `tgl_surat`, `perihal`, `attachment`, `kepada`, `keterangan`, `status`) VALUES
(1, 352, 'KELURAHAN KEMBANGAN', '0000-00-00', 'dfghjk', 'document.pdf', 'KELURAHAN KEMBANGAN', 'fgvhb', 'grger'),
(2, 868962, 'KELURAHAN KEMBANGAN', '0000-00-00', 'dferge', '153-517-1-PB.pdf', 'KELURAHAN KEMBANGAN', 'rgregegerg', 'fvdfgdg'),
(3, 90272193, 'PUSKESMAS', '2018-05-18', 'gregregv', 'Daya_Guna_Barang.pdf', 'PUSKESMAS', 'regrege', 'gergregeref'),
(4, 1434453, 'PUSKESMAS', '2018-05-18', 'vdfvfvvr', '15.04.1240_jurnal_eproc.pdf', 'staf1', 'vrvrvr', 'grvgrvr');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_disposisitlp`
--

CREATE TABLE `tbl_disposisitlp` (
  `id_disposisi` int(10) NOT NULL,
  `no_telepon` int(15) NOT NULL,
  `skpd_ukpd` varchar(50) NOT NULL,
  `tgl_telepon` date NOT NULL,
  `perihal` varchar(200) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_disposisitlp`
--

INSERT INTO `tbl_disposisitlp` (`id_disposisi`, `no_telepon`, `skpd_ukpd`, `tgl_telepon`, `perihal`, `kepada`, `keterangan`) VALUES
(1, 899964433, 'PUSKESMAS', '2018-05-18', 'fafdafe', 'staf1', 'fsfee'),
(2, 876543221, 'KELURAHAN KEMBANGAN', '2018-05-11', 'DdDQDQD', 'staf1', 'sfefef');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_instansi`
--

CREATE TABLE `tbl_instansi` (
  `id_instansi` tinyint(1) NOT NULL,
  `institusi` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_instansi`
--

INSERT INTO `tbl_instansi` (`id_instansi`, `institusi`, `nama`, `status`, `alamat`, `nip`, `website`, `email`, `logo`, `id_user`) VALUES
(1, 'PEMERINTAHAN', 'Kantor Walikota Administrasi Jakarta Barat', '-', 'Jalan Raya Kembangan No.2, Kembangan Selatan, Kembangan, RT.2/RW.2, Kembangan Sel., Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610', '-', 'https://barat.jakarta.go.id/', '-', 'logo1.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_klasifikasi`
--

CREATE TABLE `tbl_klasifikasi` (
  `id_klasifikasi` int(5) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `uraian` mediumtext NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_klasifikasi`
--

INSERT INTO `tbl_klasifikasi` (`id_klasifikasi`, `kode`, `nama`, `uraian`, `id_user`) VALUES
(1, '420', 'PENDIDIKAN', 'PENDIDIKAN', 1),
(2, '420.1', 'Pendidikan Khusus Klasifikasi disini Pendidikan Putra/I Irja', 'Pendidikan Khusus Klasifikasi disini Pendidikan Putra/I Irja', 1),
(3, '421', 'Sekolah', 'Sekolah', 1),
(4, '421.1', 'Pra Sekolah', 'Pra Sekolah', 1),
(5, '421.2', 'Sekolah Dasar', 'Sekolah Dasar', 1),
(6, '421.3', 'Sekolah Menengah', 'Sekolah Menengah', 1),
(7, '421.4', 'Sekolah Tinggi', 'Sekolah Tinggi', 1),
(8, '421.5', 'Sekolah Kejuruan', 'Sekolah Kejuruan', 1),
(9, '421.6', 'Kegiatan Sekolah, Dies Natalis Lustrum', 'Kegiatan Sekolah, Dies Natalis Lustrum', 1),
(10, '421.7', 'Kegiatan Pelajar', 'Kegiatan Pelajar', 1),
(11, '421.71', 'Reuni Darmawisata', 'Reuni Darmawisata', 1),
(12, '421.72', 'Pelajar Teladan', 'Pelajar Teladan', 1),
(13, '421.73', 'Resimen Mahasiswa', 'Resimen Mahasiswa', 1),
(14, '421.8', 'Sekolah Pendidikan Luar Biasa', 'Sekolah Pendidikan Luar Biasa', 1),
(15, '421.9', 'PLS / Pemberantasan Buta Huruf', 'PLS / Pemberantasan Buta Huruf', 1),
(16, '422', 'Administrasi Sekolah', 'Administrasi Sekolah', 1),
(17, '422.1', 'Persyaratan Masuk Sekolah, Testing, Ujian,Pendaftaran, Mapras', 'Persyaratan Masuk Sekolah, Testing, Ujian,Pendaftaran, Mapras', 1),
(18, '422.2', 'Tahun Pelajaran', 'Tahun Pelajaran', 1),
(19, '422.3', 'Hari Libur', 'Hari Libur', 1),
(20, '422.4', 'Uang Sekolah, Klasifikasi Disini SPP', 'Uang Sekolah, Klasifikasi Disini SPP', 1),
(21, '422.5', 'Beasiswa', 'Beasiswa', 1),
(22, '423', 'Metode Belajar', 'Metode Belajar', 1),
(23, '423.1', 'Kuliah', 'Kuliah', 1),
(24, '423.2', 'Ceramah, Simposium', 'Ceramah, Simposium', 1),
(25, '423.3', 'Diskusi', 'Diskusi', 1),
(26, '423.4', 'Kuliah Lapangan, Widyawisata, KKN, Studi Tur', 'Kuliah Lapangan, Widyawisata, KKN, Studi Tur', 1),
(27, '423.5', 'Kurikulum', 'Kurikulum', 1),
(28, '423.6', 'Karya Tulis', 'Karya Tulis', 1),
(29, '423.7', 'Ujian', 'Ujian', 1),
(30, '424', 'Tenaga Pengajar, Guru, Dosen, Dekan, Rektor', 'Tenaga Pengajar, Guru, Dosen, Dekan, Rektor', 1),
(31, '425', 'Sarana Pendidikan', 'Sarana Pendidikan', 1),
(32, '425.1', 'Gedung', 'Gedung', 1),
(33, '425.11', 'Gedung Sekolah', 'Gedung Sekolah', 1),
(34, '425.12', 'Kampus', 'Kampus', 1),
(35, '425.13', 'Pusat Kegiatan Mahasiswa', 'Pusat Kegiatan Mahasiswa', 1),
(36, '425.2', 'Buku', 'Buku', 1),
(37, '425.3', 'Perlengkapan Sekolah', 'Perlengkapan Sekolah', 1),
(38, '426', 'Keolahragaan', 'Keolahragaan', 1),
(39, '426.1', 'Cabang Olah Raga', 'Cabang Olah Raga', 1),
(40, '426.2', 'Sarana', 'Sarana', 1),
(41, '426.21', 'Gedung Olah Raga', 'Gedung Olah Raga', 1),
(42, '426.22', 'Stadion', 'Stadion', 1),
(43, '426.23', 'Lapangan', 'Lapangan', 1),
(44, '426.24', 'Kolam renang', 'Kolam renang', 1),
(45, '426.3', 'Pesta Olah Raga, Klasifikasi nya: PON, Porsade, Olimpiade,', 'Pesta Olah Raga, Klasifikasi nya: PON, Porsade, Olimpiade,', 1),
(46, '426.4', 'KONI', 'KONI', 1),
(47, '427', 'Kepramukaan Meliputi: Organisasi dan Kegiatan Remaja', 'Kepramukaan Meliputi: Organisasi dan Kegiatan Remaja', 1),
(48, '428', 'Kepramukaan', 'Kepramukaan', 1),
(49, '429', 'Pendidikan Kedinasan Untuk Depdagri', 'Pendidikan Kedinasan Untuk Depdagri', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sett`
--

CREATE TABLE `tbl_sett` (
  `id_sett` tinyint(1) NOT NULL,
  `surat_masuk` tinyint(2) NOT NULL,
  `surat_keluar` tinyint(2) NOT NULL,
  `referensi` tinyint(2) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sett`
--

INSERT INTO `tbl_sett` (`id_sett`, `surat_masuk`, `surat_keluar`, `referensi`, `id_user`) VALUES
(1, 100, 5, 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_keluar`
--

CREATE TABLE `tbl_surat_keluar` (
  `id_surat` int(10) NOT NULL,
  `no_agenda` int(10) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `isi` mediumtext NOT NULL,
  `kode` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_catat` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_surat_keluar`
--

INSERT INTO `tbl_surat_keluar` (`id_surat`, `no_agenda`, `tujuan`, `no_surat`, `isi`, `kode`, `tgl_surat`, `tgl_catat`, `file`, `keterangan`, `id_user`) VALUES
(2, 1, 'Siswa', '420 / 015 /SMK.AH/VIII/2015', 'Surat edaran untuk mengikuti kegiatan sholat Idhul Adha di sekolah.', '421.6', '2015-08-28', '2016-07-24', '4718-surat keluar 1.jpg', 'Wajib', 5),
(3, 2, 'Darmaji, S.T. (Guru)', '421 / 056 /SMK-AH / XII /2015', 'Surat tugas untuk menghadiri undangan Penganugerahan Bursa Khusus SMK', '421', '2015-12-07', '2016-07-24', '7773-surat keluar 2.jpg', '-', 5),
(4, 3, 'Siswa', '421/059/SMK-AH/XII/2015', 'Surat edaran pelaksanaan praktik kerja industri (Prakerin)', '421', '2015-12-17', '2016-07-24', '', 'Penting', 5),
(5, 4, 'Guru', '042/067 / SMk-AH/I/2016', 'Surat undangan rapat dinas koordinasi ujian sekolah\r\n', '421', '2016-02-01', '2016-07-24', '', 'Wajib Hadir', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_masuk`
--

CREATE TABLE `tbl_surat_masuk` (
  `id_surat` int(10) NOT NULL,
  `no_agenda` int(10) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `asal_surat` varchar(250) NOT NULL,
  `sumber` varchar(30) NOT NULL,
  `isi` mediumtext NOT NULL,
  `kode` varchar(30) NOT NULL,
  `indeks` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_surat_masuk`
--

INSERT INTO `tbl_surat_masuk` (`id_surat`, `no_agenda`, `no_surat`, `asal_surat`, `sumber`, `isi`, `kode`, `indeks`, `tgl_surat`, `status`, `tgl_diterima`, `file`, `keterangan`, `id_user`) VALUES
(11, 2, '001/PPH/VI/2016', 'Pondok Pesantren Hidayatullah Nganjuk', 'Telepone', 'Permohonan Zakat Fitrah', '421.7', 'A.1', '2016-06-09', 'Selesai', '2016-07-24', '601-surat masuk 1.jpg', 'Penting', 5),
(14, 1, '560/402.1/411.203/2016', 'Dinas Sosial Tenaga Kerja Dan Transmigrasi Daerah Kabupaten Nganjuk', '', 'Surat undangan untuk menghadiri acara Pameran Bursa Kerja Untuk Percepatan Penempatan Tenaga Kerja / Job Fair Tahun 2016', '421', 'A.2', '2016-05-12', 'Dalam Proses', '2016-07-24', '', 'Segera laksanakan', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_masuk_skpd`
--

CREATE TABLE `tbl_surat_masuk_skpd` (
  `id_surat` int(10) NOT NULL,
  `no_agenda` int(10) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `asal_surat` varchar(250) NOT NULL,
  `isi` mediumtext NOT NULL,
  `kode` varchar(30) NOT NULL,
  `indeks` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_masuk_staff`
--

CREATE TABLE `tbl_surat_masuk_staff` (
  `id_surat` int(10) NOT NULL,
  `no_agenda` int(30) NOT NULL,
  `no_surat` int(50) NOT NULL,
  `asal_surat` mediumtext NOT NULL,
  `sumber` varchar(50) NOT NULL,
  `isi` mediumtext NOT NULL,
  `kode` varchar(30) NOT NULL,
  `indeks` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `disposisi` varchar(50) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_surat_masuk_staff`
--

INSERT INTO `tbl_surat_masuk_staff` (`id_surat`, `no_agenda`, `no_surat`, `asal_surat`, `sumber`, `isi`, `kode`, `indeks`, `tgl_surat`, `status`, `disposisi`, `tgl_diterima`, `file`, `keterangan`, `id_user`) VALUES
(1, 1, 8764334, 'puskesmas', 'surat', 'perbaikan jarigan', '6655', 'hgfgss', '2018-05-01', 'Dalam Proses', 'Staff 1', '2018-05-02', 'hghfghf', 'hfgsreads', 1),
(2, 142, 14142, 'wrewrfe', 'gferger', 'rgerger', '23', 'hjfgjm', '2018-05-02', 'dgdg', 'fdsgsg', '2018-05-02', 'fgfdg', 'fdgdfgd', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tl`
--

CREATE TABLE `tbl_tl` (
  `id_tl` int(11) NOT NULL,
  `nama_staf` varchar(50) NOT NULL,
  `skpd_ukpd` varchar(50) NOT NULL,
  `tlp` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `pengecekan_perbaikan` varchar(50) NOT NULL,
  `p_perbaikanjaringan` varchar(50) NOT NULL,
  `p_perangkatjaringan` varchar(50) NOT NULL,
  `pemakaian_bphtik` varchar(50) NOT NULL,
  `penjelasan_teknis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tl`
--

INSERT INTO `tbl_tl` (`id_tl`, `nama_staf`, `skpd_ukpd`, `tlp`, `tgl`, `ip_address`, `pengecekan_perbaikan`, `p_perbaikanjaringan`, `p_perangkatjaringan`, `pemakaian_bphtik`, `penjelasan_teknis`) VALUES
(1, 'dgdgs', 'erewwe', 231314, '0000-00-00', 'egee', 'Memory', 'Setting IP', 'Hub/Switch', 'fgdfgrdg', 'drggweg'),
(2, 'hfjhd', 'vcbfbf', 32424, '0000-00-00', 'hgtrghtr', 'Install Hardware', 'Penarikan Kabel', 'Hub/Switch', 'gndfhf', 'fgbfhbt'),
(3, 'gdgg', 'bfbf', 35252, '0000-00-00', 'dfdfg', 'Scanning Virus', 'Setting IP', 'Hub/Switch', 'fbdfd', 'ffddgd'),
(4, 'efesfesf', 'fhtfhtt', 2453634, '0000-00-00', 'fhfhh', 'Ethernet', 'Cek Koneksi', 'Perangkat Wifi', 'fdgdfgd', 'dfgdgdg'),
(5, 'asff', 'nggf', 12654, '0000-00-00', 'fbdfgdfg', 'Install Hardware', 'Pasang Perangkat Jaringan', 'Hub/Switch', 'ffdggd', 'rdgergreg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tl_tlp`
--

CREATE TABLE `tbl_tl_tlp` (
  `id_tl_tlp` int(11) NOT NULL,
  `nama_staf` varchar(50) NOT NULL,
  `skpd_ukpd` varchar(50) NOT NULL,
  `tlp` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `pengecekan_perbaikan` varchar(50) NOT NULL,
  `p_perbaikanjaringan` varchar(50) NOT NULL,
  `p_perangkatjaringan` varchar(50) NOT NULL,
  `pemakaian_bphtik` varchar(50) NOT NULL,
  `penjelasan_teknis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tl_tlp`
--

INSERT INTO `tbl_tl_tlp` (`id_tl_tlp`, `nama_staf`, `skpd_ukpd`, `tlp`, `tgl`, `ip_address`, `pengecekan_perbaikan`, `p_perbaikanjaringan`, `p_perangkatjaringan`, `pemakaian_bphtik`, `penjelasan_teknis`) VALUES
(1, 'dgdgs', 'erewwe', 231314, '0000-00-00', 'egee', 'Memory', 'Setting IP', 'Hub/Switch', 'fgdfgrdg', 'drggweg'),
(2, 'hfjhd', 'vcbfbf', 32424, '0000-00-00', 'hgtrghtr', 'Install Hardware', 'Penarikan Kabel', 'Hub/Switch', 'gndfhf', 'fgbfhbt'),
(3, 'dgdg', 'yryry', 464363, '0000-00-00', 'tftt', 'Setting Printer', 'Cek Koneksi', 'Perangkat Wifi', 'jtytyr', 'tdrty');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `nip`, `admin`) VALUES
(1, 'sugiono', '1111', 'Drs. Sugiono, MM', '196606281997031002', 1),
(32, 'staff', '1234', 'staff', '4564654', 2),
(33, 'skpd', '1234', 'skpd', '54654654', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_userstaf`
--

CREATE TABLE `tbl_userstaf` (
  `id_staf` int(10) NOT NULL,
  `nama_staf` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_userstaf`
--

INSERT INTO `tbl_userstaf` (`id_staf`, `nama_staf`) VALUES
(1, 'Hidayat, S.Kom'),
(2, 'Yasri Rahman M, S.Kom'),
(3, 'Syarifudin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_disposisi`
--
ALTER TABLE `tbl_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tbl_disposisilain`
--
ALTER TABLE `tbl_disposisilain`
  ADD PRIMARY KEY (`id_diposisi`);

--
-- Indexes for table `tbl_disposisisurat`
--
ALTER TABLE `tbl_disposisisurat`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tbl_disposisitlp`
--
ALTER TABLE `tbl_disposisitlp`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `tbl_klasifikasi`
--
ALTER TABLE `tbl_klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indexes for table `tbl_sett`
--
ALTER TABLE `tbl_sett`
  ADD PRIMARY KEY (`id_sett`);

--
-- Indexes for table `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tbl_surat_masuk_skpd`
--
ALTER TABLE `tbl_surat_masuk_skpd`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tbl_surat_masuk_staff`
--
ALTER TABLE `tbl_surat_masuk_staff`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tbl_tl`
--
ALTER TABLE `tbl_tl`
  ADD PRIMARY KEY (`id_tl`);

--
-- Indexes for table `tbl_tl_tlp`
--
ALTER TABLE `tbl_tl_tlp`
  ADD PRIMARY KEY (`id_tl_tlp`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_userstaf`
--
ALTER TABLE `tbl_userstaf`
  ADD PRIMARY KEY (`id_staf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_disposisi`
--
ALTER TABLE `tbl_disposisi`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_disposisilain`
--
ALTER TABLE `tbl_disposisilain`
  MODIFY `id_diposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_disposisisurat`
--
ALTER TABLE `tbl_disposisisurat`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_disposisitlp`
--
ALTER TABLE `tbl_disposisitlp`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_klasifikasi`
--
ALTER TABLE `tbl_klasifikasi`
  MODIFY `id_klasifikasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_surat_masuk_staff`
--
ALTER TABLE `tbl_surat_masuk_staff`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_tl`
--
ALTER TABLE `tbl_tl`
  MODIFY `id_tl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_tl_tlp`
--
ALTER TABLE `tbl_tl_tlp`
  MODIFY `id_tl_tlp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
