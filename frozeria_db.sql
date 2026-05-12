-- =============================================
-- Frozeria Stok Opname - Database Setup
-- Jalankan di phpMyAdmin atau MySQL CLI
-- =============================================

CREATE DATABASE IF NOT EXISTS frozeria_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE frozeria_db;

-- Tabel kategoris
CREATE TABLE IF NOT EXISTS `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel barangs
CREATE TABLE IF NOT EXISTS `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jumlah_stok` int(11) NOT NULL DEFAULT 0,
  `stok_minimum` int(11) NOT NULL DEFAULT 0,
  `satuan` varchar(50) NOT NULL DEFAULT 'pcs',
  `harga_jual` decimal(15,2) NOT NULL DEFAULT 0.00,
  `harga_beli` decimal(15,2) NOT NULL DEFAULT 0.00,
  `berat_ukuran` varchar(100) DEFAULT NULL,
  `lokasi_simpan` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`kategori_id`) REFERENCES `kategoris`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel migrations (required by Laravel)
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data Kategori
INSERT INTO `kategoris` (`nama_kategori`, `deskripsi`, `created_at`, `updated_at`) VALUES
('Ayam', 'Produk berbahan dasar ayam beku', NOW(), NOW()),
('Sapi', 'Produk berbahan dasar sapi beku', NOW(), NOW()),
('Seafood', 'Produk laut beku', NOW(), NOW()),
('Sayuran', 'Sayuran beku', NOW(), NOW()),
('Siap saji', 'Makanan beku siap saji', NOW(), NOW());

-- Data Barang
INSERT INTO `barangs` (`nama_barang`, `kategori_id`, `jumlah_stok`, `stok_minimum`, `satuan`, `harga_jual`, `harga_beli`, `berat_ukuran`, `lokasi_simpan`, `deskripsi`, `created_at`, `updated_at`) VALUES
('Ayam nugget crispy', 1, 120, 20, 'pcs', 35000, 28000, '500 gram', 'Rak A-3', 'Nugget ayam dengan lapisan tepung crispy, cocok untuk camilan atau bekal.', NOW(), NOW()),
('Sosis sapi premium', 2, 15, 20, 'pack', 28000, 22000, '250 gram', 'Rak B-1', 'Sosis sapi dengan cita rasa premium.', NOW(), NOW()),
('Dim sum udang', 3, 0, 10, 'box', 45000, 36000, '300 gram', 'Rak C-2', 'Dim sum udang beku siap kukus.', NOW(), NOW()),
('Bakso urat sapi', 2, 60, 20, 'pack', 22000, 17000, '500 gram', 'Rak B-2', 'Bakso sapi dengan urat, tekstur kenyal.', NOW(), NOW()),
('Edamame beku', 4, 0, 15, 'pack', 18000, 13000, '400 gram', 'Rak D-1', 'Edamame beku siap rebus.', NOW(), NOW()),
('Karage ayam', 1, 45, 20, 'pack', 32000, 25000, '500 gram', 'Rak A-4', 'Karage ayam gaya Jepang.', NOW(), NOW()),
('Fish cake udang', 3, 30, 10, 'pack', 38000, 30000, '300 gram', 'Rak C-1', 'Fish cake udang kenyal.', NOW(), NOW()),
('Corn dog', 5, 8, 20, 'pcs', 12000, 8000, '100 gram', 'Rak E-1', 'Corn dog siap goreng.', NOW(), NOW());
