-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 09:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tagihan_pulsa`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `bukti_transfer_admin` ()  BEGIN
		SELECT a.tgl_setoran, SUM(a.jumlah_setoran) total, a.bukti_transfer, b.nama_depan, b.nama_belakang 
		FROM setoran_sales a, users b 
		WHERE a.bukti_transfer IS NOT NULL
		AND a.id_users = b.id_users AND a.keterangan = 'diterima'
		GROUP BY tgl_setoran;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `bukti_transfer_sales` (IN `idSales` VARCHAR(50))  BEGIN
		SELECT a.tgl_setoran, SUM(a.jumlah_setoran) total, a.bukti_transfer, b.nama_depan, b.nama_belakang 
		FROM setoran_sales a, users b 
		WHERE a.bukti_transfer IS NOT NULL 
		AND a.id_users = b.id_users AND a.keterangan = 'diterima'
		and a.id_users = idSales GROUP BY tgl_setoran;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cek_email` (IN `Email` VARCHAR(50))  BEGIN
		SELECT * FROM users 
		WHERE email_address=Email;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cetak_invoice_tagihan_admin` ()  BEGIN
		SELECT a.status_invoice, a.id_invoice, b.total, b.tgl_penagihan, b.kode_penembakan, c.nama_depan, c.nama_belakang, d.nama_pelanggan
		FROM invoice_tagihan a, transaksi_penembakan b, users c, data_pelanggan d
		WHERE a.id_transaksi = b.id_transaksi AND a.id_pelanggan = d.id_pelanggan AND (b.tgl_penagihan = CURDATE()) GROUP BY a.id_invoice;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cetak_invoice_tagihan_sales` (IN `idSales` VARCHAR(50))  BEGIN
		SELECT a.status_invoice, a.id_invoice, b.total, b.tgl_penagihan, b.kode_penembakan, c.nama_depan, c.nama_belakang, d.nama_pelanggan
		FROM invoice_tagihan a, transaksi_penembakan b, users c, data_pelanggan d
		WHERE a.id_transaksi = b.id_transaksi AND a.id_pelanggan = d.id_pelanggan AND (a.id_users = idSales AND b.tgl_penagihan = CURDATE()) GROUP BY a.id_invoice;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_pelanggan_by_id` (IN `idPelanggan` VARCHAR(50))  BEGIN
	  DELETE FROM data_pelanggan 
	  WHERE id_pelanggan = idPelanggan;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_saldo_limit_by_id` (IN `idSaldo` VARCHAR(50))  BEGIN
	  DELETE FROM saldo_limit 
	  WHERE id_saldo = idSaldo;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_sales_by_id` (IN `idSales` VARCHAR(50))  BEGIN
	  DELETE FROM users 
	  WHERE id_users = idSales;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_pelanggan` (IN `idSales` VARCHAR(50), IN `namaPelanggan` VARCHAR(50), IN `alamatPelanggan` VARCHAR(100), IN `noTlp` VARCHAR(15), IN `statusAktif` ENUM('Tidak Aktif','Aktif'), IN `createdAt` DATE, IN `createdBy` VARCHAR(50))  BEGIN
	  INSERT INTO data_pelanggan(
		  id_pelanggan,
		  id_users,
		  nama_pelanggan,
		  alamat_pelanggan,
		  nomor_telepon,
		  status_aktif,
		  created_at,
		  created_by
		) VALUES (
		  UUID(),
		  idSales,
		  namaPelanggan,
		  alamatPelanggan,
		  noTlp,
		  statusAktif,
		  createdAt,
		  createdBy
		);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_saldo_limit` (IN `idSales` VARCHAR(50), IN `namaAdmin` VARCHAR(50), IN `sal` DOUBLE)  BEGIN
	  INSERT INTO saldo_limit(
	    id_saldo,
	    id_users,
	    saldo,
	    created_at,
	    created_by
	  )VALUES(
	    UUID(),
	    idSales,
	    sal,
	    CURDATE(),
	    namaAdmin
	  );
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_setoran_sales` (IN `idUsers` VARCHAR(50), IN `idPelanggan` VARCHAR(50), IN `idTransaksi` VARCHAR(50), IN `idInvoice` VARCHAR(50), IN `jmlSetoran` DOUBLE, IN `tglSetoran` DATE)  BEGIN
		INSERT INTO setoran_sales(
		  id_setoran,
		  id_users,
		  id_pelanggan,
		  id_transaksi,
		  id_invoice,
		  jumlah_setoran,
		  tgl_setoran,
		  keterangan
		) VALUES(
		  UUID(),
		  idUsers,
		  idPelanggan,
		  idTransaksi,
		  idInvoice,
		  jmlSetoran,
		  tglSetoran,
		  'pending'
		);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_transaksi_baru` (IN `idUsers` VARCHAR(50), IN `idPelanggan` VARCHAR(50), IN `kodePenembakan` CHAR(7), IN `tglPenembakan` DATE, IN `tglPenagihan` DATE, IN `transaksiPenembakan` DOUBLE, IN `totalTransaksi` DOUBLE, IN `createdBy` VARCHAR(50))  BEGIN
	  insert into transaksi_penembakan(
		id_transaksi,
		id_users,
		id_pelanggan,
		kode_penembakan,
		tgl_penembakan,
		tgl_penagihan,
		transaksi_penembakan,
		total,
		created_at,
		created_by
	  ) VALUES (
		UUID(),
		idUsers,
		idPelanggan,
		kodePenembakan,
		tglPenembakan,
		tglPenagihan,
		transaksiPenembakan,
		totalTransaksi,
		CURDATE(),
		createdBy
	  );
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_transaksi_log` (IN `idUsers` VARCHAR(50), IN `idPelanggan` VARCHAR(50), IN `kodePenembakan` CHAR(7), IN `tglPenembakan` DATE, IN `tglPenambahan` DATE, IN `tglPenagihan` DATE, IN `transaksiPenembakan` DOUBLE, IN `transaksiPenambahan` DOUBLE, IN `totalTransaksi` DOUBLE, IN `ket` VARCHAR(50))  BEGIN
	   INSERT INTO transaksi_penembakan_log(
		id_transaksi_log,
		id_users,
		id_pelanggan,
		kode_penembakan,
		tgl_penembakan,
		tgl_penambahan,
		tgl_penagihan,
		transaksi_penembakan,
		transaksi_penambahan,
		total,
		keterangan
	  ) VALUES(
		UUID(),
		idUsers,
		idPelanggan,
		kodePenembakan,
		tglPenembakan,
		tglPenambahan,
		tglPenagihan,
		transaksiPenembakan,
		transaksiPenambahan,
		totalTransaksi,
		ket
	  );
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_transaksi_penambahan` (IN `transaksiPenambahan` DOUBLE, IN `totalPenambahan` DOUBLE, IN `namaSales` VARCHAR(50), IN `kdPenembakan` CHAR(7))  BEGIN
	  UPDATE transaksi_penembakan 
	  SET 
	  tgl_penambahan =CURDATE(),
	  transaksi_penambahan = transaksiPenambahan,
	  total = totalPenambahan,
	  edited_at = CURDATE(),
	  edited_by = namaSales
	  WHERE kode_penembakan = kdPenembakan;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `kembalikan_transaksi_penembakan` (IN `kdPenembakan` CHAR(7))  BEGIN
	  DELETE FROM transaksi_penembakan 
	  WHERE kode_penembakan = kdPenembakan;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `konfirmasi_terima` (IN `idSales` VARCHAR(50))  BEGIN
		SELECT * FROM setoran_sales 
		WHERE id_users = idSales
		AND tgl_setoran = CURDATE();
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `konfirmasi_terima_tolak` (IN `idSales` VARCHAR(50))  BEGIN
		SELECT * FROM setoran_sales 
		WHERE id_users = idSales
		AND tgl_setoran = CURDATE();
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `EmailAddress` VARCHAR(50), IN `passW` VARCHAR(50))  BEGIN
	SELECT * FROM users
	WHERE email_address = EmailAddress
	AND pass = passW
	AND stat = 'aktif'; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrasi` (IN `namaDepan` VARCHAR(50), IN `namaBelakang` VARCHAR(50), IN `emailAddress` VARCHAR(50), IN `rolleS` ENUM('admin','sales'), IN `passW` VARCHAR(50), IN `statS` ENUM('aktif','nonaktif'))  BEGIN
	INSERT INTO users (
		id_users,
		nama_depan, 
		nama_belakang, 
		email_address, 
		rolle, 
		pass, 
		stat
	) 
	VALUES (
		UUID(),
		namaDepan, 
		namaBelakang, 
		emailAddress, 
		rolleS, 
		passW, 
		statS
	);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_bukti_transfer_by_tgl` (IN `tglSetoran` DATE)  BEGIN
		SELECT id_invoice, jumlah_setoran, bukti_transfer FROM setoran_sales WHERE tgl_setoran = tglSetoran;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_count_pelanggan_by_sales` ()  BEGIN
	  SELECT b.nama_depan, COUNT(*) AS total_pelanggan 
	  FROM data_pelanggan a, users b 
	  WHERE a.id_users = b.id_users 
	  GROUP BY nama_depan;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_invoice_lunas` (IN `idSales` VARCHAR(50))  BEGIN
		SELECT a.status_invoice, b.tgl_penagihan FROM invoice_tagihan a, transaksi_penembakan b 
		WHERE a.status_invoice = 'sudah lunas' 
		AND b.tgl_penagihan = CURDATE() AND a.id_users = idSales
		AND a.id_transaksi = b.id_transaksi GROUP BY a.id_invoice; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_invoice_lunas_admin` ()  BEGIN
		SELECT a.status_invoice, b.tgl_penagihan FROM invoice_tagihan a, transaksi_penembakan b 
		WHERE a.status_invoice = 'sudah lunas' 
		AND a.id_transaksi = b.id_transaksi
		AND b.tgl_penagihan = CURDATE() GROUP BY a.id_invoice; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_invoice_proses` (IN `idSales` VARCHAR(50))  BEGIN
		SELECT a.status_invoice, a.id_invoice, b.tgl_penagihan FROM invoice_tagihan a, transaksi_penembakan b 
		WHERE a.status_invoice = 'belum proses' 
		AND b.tgl_penagihan = CURDATE() 
		AND a.id_users = idSales
		AND a.id_transaksi = b.id_transaksi GROUP BY a.id_invoice; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_invoice_proses_admin` ()  BEGIN
		SELECT a.status_invoice, b.tgl_penagihan FROM invoice_tagihan a, transaksi_penembakan b 
		WHERE a.status_invoice = 'belum proses' 
		AND a.id_transaksi = b.id_transaksi
		AND b.tgl_penagihan = CURDATE() GROUP BY a.id_invoice; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_invoice_tagihan_all` ()  BEGIN
		SELECT a.status_invoice, a.id_invoice, b.total, b.tgl_penagihan
		FROM invoice_tagihan a, transaksi_penembakan b
		WHERE a.id_transaksi = b.id_transaksi AND (b.tgl_penagihan = CURDATE()) GROUP BY a.id_invoice;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_invoice_tagihan_belum_proses_all` ()  BEGIN
		SELECT a.status_invoice, a.id_invoice, b.total, b.tgl_penagihan
		FROM invoice_tagihan a, transaksi_penembakan b
		WHERE a.id_transaksi = b.id_transaksi AND (b.tgl_penagihan = CURDATE() AND a.status_invoice = 'belum proses') GROUP BY a.id_invoice;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_invoice_tagihan_belum_proses_sales` (IN `idSales` VARCHAR(50))  BEGIN
		SELECT a.status_invoice, a.id_invoice, b.total, b.tgl_penagihan
		FROM invoice_tagihan a, transaksi_penembakan b
		WHERE a.id_transaksi = b.id_transaksi AND (a.id_users = idSales AND b.tgl_penagihan = CURDATE() AND a.status_invoice = 'belum proses') GROUP BY a.id_invoice;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_invoice_tagihan_by_id` (IN `idInvoice` VARCHAR(50))  BEGIN
		SELECT a.status_invoice, a.id_invoice, b.id_transaksi, b.tgl_penagihan, b.kode_penembakan, b.total, c.nama_depan, c.nama_belakang, d.id_pelanggan, d.nama_pelanggan
		FROM invoice_tagihan a, transaksi_penembakan b, users c, data_pelanggan d
		WHERE a.id_transaksi = b.id_transaksi AND a.id_users = c.id_users AND a.id_pelanggan = d.id_pelanggan 
		AND a.id_invoice = idInvoice GROUP BY a.id_invoice;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_invoice_tagihan_sales` (IN `idSales` VARCHAR(50))  BEGIN
		SELECT a.status_invoice, a.id_invoice, b.total, b.tgl_penagihan
		FROM invoice_tagihan a, transaksi_penembakan b
		WHERE a.id_transaksi = b.id_transaksi AND (a.id_users = idSales AND b.tgl_penagihan = CURDATE()) GROUP BY a.id_invoice;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_konfirmasi_setoran_all` ()  BEGIN
		SELECT a.tgl_setoran, SUM(a.jumlah_setoran) AS total, a.id_users, a.bukti_transfer, a.keterangan, b.nama_depan, b.nama_belakang 
		FROM setoran_sales a, users b 
		WHERE a.bukti_transfer IS NOT NULL AND a.keterangan <> 'pending'
		AND a.id_users = b.id_users
		GROUP BY tgl_setoran;
		
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_konfirmasi_setoran_belumkonf_all` ()  BEGIN
		SELECT a.id_setoran,a.jumlah_setoran,a.tgl_setoran,a.bukti_transfer,a.keterangan,a.id_invoice,
		b.nama_depan,b.nama_belakang,
		c.nama_pelanggan,c.limits,
		d.tgl_penagihan
		FROM setoran_sales a, users b, data_pelanggan c,transaksi_penembakan d
		WHERE a.id_users = b.id_users AND a.id_pelanggan = c.id_pelanggan AND a.id_transaksi = d.id_transaksi 
		AND a.tgl_setoran = CURDATE() AND a.keterangan = 'belum konfirmasi'
		GROUP BY a.tgl_setoran;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_pelanggan_aktif` (IN `idUsers` VARCHAR(50))  BEGIN
	  SELECT * FROM data_pelanggan
	  WHERE status_aktif = 'aktif' 
	  AND id_users=idUsers;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_pelanggan_all` ()  BEGIN
		SELECT * FROM data_pelanggan;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_pelanggan_by_id` (IN `idPelanggan` VARCHAR(50))  BEGIN
	  SELECT * FROM data_pelanggan 
	  WHERE id_pelanggan = idPelanggan;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_pelanggan_by_sales` (IN `idSales` VARCHAR(50))  BEGIN
	SELECT * FROM data_pelanggan
	WHERE id_users = idSales;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_pelanggan_by_transaksi` (IN `idSales` VARCHAR(50))  BEGIN
	  SELECT * FROM data_pelanggan
	  WHERE id_users = idSales and proses = '0';
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_pelanggan_nonaktif` (IN `idUsers` VARCHAR(50))  BEGIN
	  SELECT * FROM data_pelanggan
	  WHERE status_aktif = 'tidak aktif' 
	  AND id_users=idUsers;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_saldo_limit_all` ()  BEGIN
	SELECT a.id_saldo, a.saldo, a.created_at, a.created_by, a.edited_at, a.edited_by, b.email_address
	FROM saldo_limit a LEFT JOIN users b 
	ON a.id_users = b.id_users;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_saldo_limit_by_id` (IN `saldoID` VARCHAR(50))  BEGIN
	  SELECT a.id_saldo, a.id_users, a.saldo, b.nama_depan , b.nama_belakang 
	  FROM saldo_limit a, users b
	  WHERE a.id_users = b.id_users 
	  AND id_saldo = saldoID;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_sales_aktif` ()  BEGIN
	  SELECT * FROM users
	  WHERE stat= 'aktif' 
	  AND rolle = 'sales';
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_sales_all` ()  BEGIN
	  SELECT * FROM users WHERE rolle = 'sales';
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_sales_by_id` (IN `idSales` VARCHAR(50))  BEGIN
	  SELECT * FROM users 
	  WHERE id_users = idSales;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_sales_nonaktif` ()  BEGIN
	   SELECT * FROM users
	   WHERE stat = 'tidak aktif'
	   AND rolle = 'sales';
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_setoran_sales` (IN `idSales` VARCHAR(50))  BEGIN
		SELECT a.id_setoran,a.jumlah_setoran,a.tgl_setoran,a.bukti_transfer,a.keterangan,a.id_invoice,
		b.nama_depan,b.nama_belakang,
		c.nama_pelanggan,c.limits,
		d.tgl_penagihan
		FROM setoran_sales a, users b, data_pelanggan c,transaksi_penembakan d
		WHERE a.id_users = b.id_users AND a.id_pelanggan = c.id_pelanggan AND a.id_transaksi = d.id_transaksi 
		AND a.tgl_setoran = CURDATE() AND a.id_users = idSales;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_setoran_sales_all` ()  BEGIN
		SELECT a.id_setoran,a.jumlah_setoran,a.tgl_setoran,a.bukti_transfer,a.keterangan,a.id_invoice,
		b.nama_depan,b.nama_belakang,
		c.nama_pelanggan,c.limits,
		d.tgl_penagihan
		FROM setoran_sales a, users b, data_pelanggan c,transaksi_penembakan d
		WHERE a.id_users = b.id_users AND a.id_pelanggan = c.id_pelanggan AND a.id_transaksi = d.id_transaksi AND a.tgl_setoran = CURDATE();
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_setoran_sales_by_id` (IN `idSetoran` VARCHAR(50))  BEGIN
		SELECT a.id_setoran,a.jumlah_setoran,a.tgl_setoran,a.bukti_transfer,a.keterangan,a.id_invoice,a.pesan,
		b.nama_depan,b.nama_belakang,
		c.nama_pelanggan,c.limits,
		d.tgl_penagihan, d.kode_penembakan
		FROM setoran_sales a, users b, data_pelanggan c,transaksi_penembakan d
		WHERE a.id_users = b.id_users AND a.id_pelanggan = c.id_pelanggan AND a.id_transaksi = d.id_transaksi AND a.tgl_setoran = CURDATE() AND a.id_setoran = idSetoran;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_setoran_sales_pending` (IN `idSales` VARCHAR(50))  BEGIN
		SELECT a.id_setoran,a.jumlah_setoran,a.tgl_setoran,a.bukti_transfer,a.keterangan,a.id_invoice,
		b.nama_depan,b.nama_belakang,
		c.nama_pelanggan,c.limits,
		d.tgl_penagihan
		FROM setoran_sales a, users b, data_pelanggan c,transaksi_penembakan d
		WHERE a.id_users = b.id_users AND a.id_pelanggan = c.id_pelanggan 
		AND a.id_transaksi = d.id_transaksi AND a.tgl_setoran = CURDATE() AND a.keterangan = 'pending' 
		AND a.id_users = idSales;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_setoran_sales_pending_all` ()  BEGIN
		SELECT a.id_setoran,a.jumlah_setoran,a.tgl_setoran,a.bukti_transfer,a.keterangan,a.id_invoice,
		b.nama_depan,b.nama_belakang,
		c.nama_pelanggan,c.limits,
		d.tgl_penagihan
		FROM setoran_sales a, users b, data_pelanggan c,transaksi_penembakan d
		WHERE a.id_users = b.id_users AND a.id_pelanggan = c.id_pelanggan AND a.id_transaksi = d.id_transaksi AND a.tgl_setoran = CURDATE() AND a.keterangan = 'pending';
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_setoran_sales_sum` (IN `idSales` VARCHAR(50))  BEGIN
		SELECT SUM(jumlah_setoran) setoran FROM setoran_sales WHERE (keterangan = 'pending' OR keterangan = 'ditolak') 
		AND id_users = idSales AND tgl_setoran = CURDATE();
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_sum_saldo_limit_sales` ()  BEGIN
	  SELECT nama_depan, nama_belakang, limits 
	  FROM users
	  WHERE rolle = 'sales';
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_transaksi_penembakan` ()  BEGIN
	  SELECT b.nama_depan, b.nama_belakang, c.nama_pelanggan, a.kode_penembakan, a.tgl_penembakan, a.tgl_penambahan, a.tgl_penagihan, a.transaksi_penembakan,
	  a.transaksi_penambahan,a.total
	  FROM transaksi_penembakan a, users b, data_pelanggan c WHERE a.id_users = b.id_users AND a.id_pelanggan = c.id_pelanggan AND a.status_lunas = '0';
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_transaksi_penembakan_by_id` (IN `kodePenembakan` CHAR(7))  BEGIN
	  SELECT b.nama_depan, b.nama_belakang, b.limits, b.id_users, c.nama_pelanggan, a.kode_penembakan, a.id_pelanggan, a.tgl_penembakan, a.tgl_penambahan, a.tgl_penagihan, a.transaksi_penembakan,
	  a.transaksi_penambahan,a.total
	  FROM transaksi_penembakan a, users b, data_pelanggan c WHERE a.id_users = b.id_users AND a.id_pelanggan = c.id_pelanggan AND a.kode_penembakan = kodePenembakan;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_transaksi_penembakan_by_sales` (IN `idSales` VARCHAR(50))  BEGIN
	  SELECT b.nama_depan, b.nama_belakang, c.nama_pelanggan, a.kode_penembakan, a.tgl_penembakan, a.tgl_penambahan, a.tgl_penagihan, a.transaksi_penembakan,
	  a.transaksi_penambahan,a.total
	  FROM transaksi_penembakan a, users b, data_pelanggan c WHERE a.id_users = b.id_users AND a.id_pelanggan = c.id_pelanggan AND a.id_users = idSales AND a.status_lunas = '0';
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_transaksi_penembakan_for_admin` ()  BEGIN
	  SELECT SUM(a.total) total, b.nama_depan 
	  FROM transaksi_penembakan a,users b 
	  WHERE a.id_users = b.id_users AND a.status_lunas = '0'
	  GROUP BY a.id_users;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_transaksi_penembakan_for_sales` (IN `idSales` VARCHAR(50))  BEGIN
	  SELECT SUM(a.total) total, b.nama_pelanggan 
	  FROM transaksi_penembakan a,data_pelanggan b 
	  WHERE a.id_pelanggan = b.id_pelanggan 
	  AND a.id_users = idSales AND a.status_lunas = '0'
	  GROUP BY a.id_pelanggan;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_transaksi_penembakan_log` ()  BEGIN
	  SELECT b.nama_depan, b.nama_belakang, c.nama_pelanggan, a.kode_penembakan, a.tgl_penembakan, a.tgl_penambahan, a.tgl_penagihan, a.transaksi_penembakan,
	  a.transaksi_penambahan,a.total, a.keterangan
	  FROM transaksi_penembakan_log a, users b, data_pelanggan c WHERE a.id_users = b.id_users AND a.id_pelanggan = c.id_pelanggan;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_transaksi_penembakan_log_baru_admin` ()  BEGIN
	  SELECT * FROM transaksi_penembakan_log
	  WHERE keterangan= 'baru';
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_transaksi_penembakan_log_baru_sales` (IN `idSales` VARCHAR(50))  BEGIN
	  SELECT * FROM transaksi_penembakan_log
	  WHERE keterangan= 'baru' AND id_users = idSales;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_transaksi_penembakan_log_by_sales` (IN `idSales` VARCHAR(50))  BEGIN
	  SELECT b.nama_depan, b.nama_belakang, c.nama_pelanggan, a.kode_penembakan, a.tgl_penembakan, a.tgl_penambahan, a.tgl_penagihan, a.transaksi_penembakan,
	  a.transaksi_penambahan,a.total, a.keterangan
	  FROM transaksi_penembakan_log a, users b, data_pelanggan c WHERE a.id_users = b.id_users AND a.id_pelanggan = c.id_pelanggan AND a.id_users = idSales;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_transaksi_penembakan_log_dikembalikan_admin` ()  BEGIN
	  SELECT * FROM transaksi_penembakan_log
	  WHERE keterangan= 'dikembalikan';
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_transaksi_penembakan_log_dikembalikan_sales` (IN `idSales` VARCHAR(50))  BEGIN
	  SELECT * FROM transaksi_penembakan_log
	  WHERE keterangan= 'dikembalikan' AND id_users = idSales;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_transaksi_penembakan_log_penambahan_admin` ()  BEGIN
	  SELECT * FROM transaksi_penembakan_log
	  WHERE keterangan= 'penambahan';
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_transaksi_penembakan_log_penambahan_sales` (IN `idSales` VARCHAR(50))  BEGIN
	  SELECT * FROM transaksi_penembakan_log
	  WHERE keterangan= 'penambahan' AND id_users = idSales;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_users` (IN `ids` VARCHAR(50))  BEGIN
	  SELECT * FROM users
	  WHERE id_users = ids;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_invoice_after_setor` (IN `idInvoice` VARCHAR(50))  BEGIN
		UPDATE invoice_tagihan 
		SET status_invoice = 'sudah lunas'
		WHERE id_invoice = idInvoice;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_pelanggan` (IN `idPelanggan` VARCHAR(50), IN `namaPelanggan` VARCHAR(50), IN `alamatPelanggan` VARCHAR(100), IN `noTlp` VARCHAR(15), IN `statusAktif` ENUM('Tidak Aktif','Aktif'), IN `editedAt` DATE, IN `editedBy` VARCHAR(50))  BEGIN
	  UPDATE data_pelanggan 
	  SET nama_pelanggan = namaPelanggan,
	  alamat_pelanggan = alamatPelanggan,
	  nomor_telepon = noTlp,
	  status_aktif = statusAktif,
	  edited_at = editedAt,
	  edited_by = editedBy
	  WHERE id_pelanggan = idPelanggan;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_pelanggan_after_setor_lunas` (IN `idPelanggan` VARCHAR(50))  BEGIN
	  	UPDATE data_pelanggan 
		SET proses = '0'
		WHERE id_pelanggan = idPelanggan;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_saldo_limit` (IN `idLimit` VARCHAR(50), IN `namaAdmin` VARCHAR(50), IN `saldoSales` DOUBLE)  BEGIN
	 UPDATE saldo_limit
	  SET saldo=saldoSales, edited_at=CURDATE(), edited_by = namaAdmin
	  WHERE id_saldo=idLimit;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_sales` (IN `idUsers` VARCHAR(50), IN `statusAktif` ENUM('Tidak Aktif','Aktif'))  BEGIN
	  UPDATE users 
	  SET stat = statusAktif
	  WHERE id_users= idUsers;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_setoran_sales` (IN `buktiTf` VARCHAR(50), IN `idSales` VARCHAR(50))  BEGIN
		UPDATE setoran_sales SET bukti_transfer = buktiTf, keterangan = 'belum konfirmasi' WHERE (keterangan = 'pending' OR keterangan = 'ditolak') AND tgl_setoran = CURDATE() AND id_users = idSales;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_setoran_sales_konfirmasi_terima` (IN `idSales` VARCHAR(50))  BEGIN
		UPDATE setoran_sales SET keterangan = 'diterima' 
		WHERE keterangan = 'belum konfirmasi' AND tgl_setoran = CURDATE() AND id_users = idSales;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_setoran_sales_konfirmasi_tolak` (IN `idSales` VARCHAR(50), IN `pesanAdmin` VARCHAR(50))  BEGIN
		UPDATE setoran_sales SET keterangan = 'ditolak',pesan = pesanAdmin 
		WHERE keterangan = 'belum konfirmasi' AND tgl_setoran = CURDATE() AND id_users = idSales;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_transaksi_after_setor_belum_lunas` (IN `jumlahSetoran` DOUBLE, IN `idTransaksi` VARCHAR(50))  BEGIN
		UPDATE transaksi_penembakan 
		SET tgl_penagihan = CURDATE()+3, 
		transaksi_penambahan = 0, 
		total = total - jumlahSetoran
		WHERE id_transaksi = idTransaksi;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_transaksi_after_setor_lunas` (IN `idTransaksi` VARCHAR(50))  BEGIN
		UPDATE transaksi_penembakan
		SET status_lunas = '1', total = 0 ,transaksi_penambahan = 0
		WHERE id_transaksi = idTransaksi;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_user_no_pass` (IN `namaDepan` VARCHAR(50), IN `namaBelakang` VARCHAR(50), IN `emailAddress` VARCHAR(50), IN `noTlp` VARCHAR(15), IN `alamatS` VARCHAR(100), IN `bioS` VARCHAR(150), IN `id` VARCHAR(50))  BEGIN
		update users SET 
		nama_depan = namaDepan,
		nama_belakang = namaBelakang,
		email_address = emailAddress,
		no_tlp = noTlp,
		alamat = alamatS,
		bio = bioS 
		where id_users = id;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_user_with_pass` (IN `namaDepan` VARCHAR(50), IN `namaBelakang` VARCHAR(50), IN `emailAddress` VARCHAR(50), IN `noTlp` VARCHAR(15), IN `alamatS` VARCHAR(100), IN `passwords` VARCHAR(50), IN `bioS` VARCHAR(150), IN `id` VARCHAR(50))  BEGIN
	UPDATE users SET 
	nama_depan = namaDepan,
	nama_belakang = namaBelakang,
	email_address = emailAddress,
	no_tlp = noTlp,
	alamat = alamatS,
	pass = passwords,
	bio = bioS 
	WHERE id_users = id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `id_pelanggan` varchar(50) NOT NULL,
  `id_users` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `limits` double DEFAULT 0,
  `status_aktif` enum('tidak aktif','aktif','','') NOT NULL,
  `proses` enum('0','1','','') NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `edited_at` date DEFAULT NULL,
  `edited_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_tagihan`
--

CREATE TABLE `invoice_tagihan` (
  `id_invoice` varchar(50) NOT NULL,
  `id_users` varchar(50) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `status_invoice` enum('belum proses','sudah lunas','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `saldo_limit`
--

CREATE TABLE `saldo_limit` (
  `id_saldo` varchar(50) NOT NULL,
  `id_users` varchar(50) NOT NULL,
  `saldo` double NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `edited_at` date DEFAULT NULL,
  `edited_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `saldo_limit`
--
DELIMITER $$
CREATE TRIGGER `update_saldo_limit` AFTER UPDATE ON `saldo_limit` FOR EACH ROW BEGIN
	UPDATE users SET limits = (limits - OLD.saldo) + NEW.saldo WHERE id_users = NEW.id_users;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_saldo_sales` AFTER INSERT ON `saldo_limit` FOR EACH ROW BEGIN
 UPDATE users SET limits=limits+NEW.saldo
 WHERE id_users=NEW.id_users;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `setoran_sales`
--

CREATE TABLE `setoran_sales` (
  `id_setoran` varchar(50) NOT NULL,
  `id_users` varchar(50) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `id_invoice` varchar(50) NOT NULL,
  `jumlah_setoran` double NOT NULL,
  `tgl_setoran` date NOT NULL,
  `bukti_transfer` varchar(50) DEFAULT NULL,
  `keterangan` enum('pending','belum konfirmasi','diterima','ditolak') NOT NULL,
  `pesan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penembakan`
--

CREATE TABLE `transaksi_penembakan` (
  `id_transaksi` varchar(50) NOT NULL,
  `id_users` varchar(50) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `kode_penembakan` char(7) NOT NULL,
  `tgl_penembakan` date NOT NULL,
  `tgl_penambahan` date DEFAULT NULL,
  `tgl_penagihan` date NOT NULL,
  `transaksi_penembakan` double NOT NULL,
  `transaksi_penambahan` double DEFAULT NULL,
  `total` double NOT NULL,
  `status_lunas` enum('0','1','','') NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `edited_at` date DEFAULT NULL,
  `edited_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `transaksi_penembakan`
--
DELIMITER $$
CREATE TRIGGER `insert_invoice_tagihan` AFTER INSERT ON `transaksi_penembakan` FOR EACH ROW BEGIN
	INSERT INTO 		
 invoice_tagihan(id_invoice,id_users,id_pelanggan,id_transaksi,status_invoice) VALUES(UUID(),NEW.id_users,NEW.id_pelanggan,NEW.id_transaksi,'belum proses');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kembalikan_transaksi_penembakan` AFTER DELETE ON `transaksi_penembakan` FOR EACH ROW BEGIN
	UPDATE data_pelanggan SET limits = limits - OLD.total, proses = '0' WHERE id_pelanggan = OLD.id_pelanggan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kembalikan_transaksi_penembakan_2` AFTER DELETE ON `transaksi_penembakan` FOR EACH ROW BEGIN
	UPDATE users SET limits = limits + OLD.total WHERE id_users = OLD.id_users;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_transaksi_penambahan` AFTER UPDATE ON `transaksi_penembakan` FOR EACH ROW BEGIN
UPDATE users SET limits = limits - 	NEW.transaksi_penambahan WHERE id_users = OLD.id_users;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_transaksi_penambahan2` AFTER UPDATE ON `transaksi_penembakan` FOR EACH ROW BEGIN
UPDATE data_pelanggan SET limits = NEW.total WHERE id_pelanggan = OLD.id_pelanggan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_transaksi_penembakan` AFTER INSERT ON `transaksi_penembakan` FOR EACH ROW BEGIN
	UPDATE users SET limits = limits - 	NEW.transaksi_penembakan WHERE id_users = NEW.id_users;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_transaksi_penembakan_pelanggan` AFTER INSERT ON `transaksi_penembakan` FOR EACH ROW BEGIN
	UPDATE data_pelanggan SET limits=limits+NEW.transaksi_penembakan, proses = '1' WHERE id_pelanggan = NEW.id_pelanggan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penembakan_log`
--

CREATE TABLE `transaksi_penembakan_log` (
  `id_transaksi_log` varchar(50) NOT NULL,
  `id_users` varchar(50) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `kode_penembakan` char(7) NOT NULL,
  `tgl_penembakan` date NOT NULL,
  `tgl_penambahan` date DEFAULT NULL,
  `tgl_penagihan` date NOT NULL,
  `transaksi_penembakan` double NOT NULL,
  `transaksi_penambahan` double DEFAULT NULL,
  `total` double NOT NULL,
  `keterangan` enum('baru','penambahan','dikembalikan','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` varchar(50) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_tlp` varchar(15) DEFAULT NULL,
  `limits` double DEFAULT 0,
  `bio` varchar(150) DEFAULT NULL,
  `pass` varchar(50) NOT NULL,
  `rolle` enum('admin','sales') NOT NULL,
  `stat` enum('aktif','tidak aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama_depan`, `nama_belakang`, `email_address`, `alamat`, `no_tlp`, `limits`, `bio`, `pass`, `rolle`, `stat`) VALUES
('dd922a50-ec99-11ea-aa1d-9829a62c70a3', 'Masika', 'Reload', 'adminmasikareload@gmail.com', NULL, NULL, 0, NULL, '81c46661c57dee8e6223c4eac6dab8ad', 'admin', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `invoice_tagihan`
--
ALTER TABLE `invoice_tagihan`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `saldo_limit`
--
ALTER TABLE `saldo_limit`
  ADD PRIMARY KEY (`id_saldo`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `setoran_sales`
--
ALTER TABLE `setoran_sales`
  ADD PRIMARY KEY (`id_setoran`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_invoice` (`id_invoice`);

--
-- Indexes for table `transaksi_penembakan`
--
ALTER TABLE `transaksi_penembakan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `transaksi_penembakan_log`
--
ALTER TABLE `transaksi_penembakan_log`
  ADD PRIMARY KEY (`id_transaksi_log`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD CONSTRAINT `data_pelanggan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_tagihan`
--
ALTER TABLE `invoice_tagihan`
  ADD CONSTRAINT `invoice_tagihan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_tagihan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `data_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_tagihan_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi_penembakan` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saldo_limit`
--
ALTER TABLE `saldo_limit`
  ADD CONSTRAINT `saldo_limit_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `setoran_sales`
--
ALTER TABLE `setoran_sales`
  ADD CONSTRAINT `setoran_sales_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `setoran_sales_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `data_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `setoran_sales_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi_penembakan` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `setoran_sales_ibfk_4` FOREIGN KEY (`id_invoice`) REFERENCES `invoice_tagihan` (`id_invoice`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_penembakan`
--
ALTER TABLE `transaksi_penembakan`
  ADD CONSTRAINT `transaksi_penembakan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_penembakan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `data_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_penembakan_log`
--
ALTER TABLE `transaksi_penembakan_log`
  ADD CONSTRAINT `transaksi_penembakan_log_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_penembakan_log_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `data_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
