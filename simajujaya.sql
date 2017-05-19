-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2017 at 03:41 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simajujaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_Barang` int(11) NOT NULL,
  `Nama_Barang` varchar(50) NOT NULL,
  `Harga_Barang` int(11) NOT NULL,
  `Stok_Barang` int(11) NOT NULL,
  `Deskripsi_Barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_nama` varchar(50) NOT NULL,
  `client_alamat` varchar(255) NOT NULL,
  `client_telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_order`
--

CREATE TABLE `delivery_order` (
  `do_id` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `do_nomor` varchar(50) NOT NULL,
  `do_datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_receipt`
--

CREATE TABLE `payment_receipt` (
  `pr_id` int(11) NOT NULL,
  `pr_nomor` varchar(50) NOT NULL,
  `pr_datetime` date NOT NULL,
  `quo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proof_of_item_receipt`
--

CREATE TABLE `proof_of_item_receipt` (
  `poir_id` int(11) NOT NULL,
  `po_id` int(11) DEFAULT NULL,
  `pr_id` int(11) DEFAULT NULL,
  `poir_nomor` varchar(50) NOT NULL,
  `poir_datetime` date NOT NULL,
  `poir_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `ID_Purchase_Order` int(11) NOT NULL,
  `Nomor_Purchase_Order` varchar(50) NOT NULL,
  `Perusahaan_Tujuan` int(11) NOT NULL,
  `po_datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`ID_Purchase_Order`, `Nomor_Purchase_Order`, `Perusahaan_Tujuan`, `po_datetime`) VALUES
(8, '1/MajuJaya/PO/5/2017', 1, '2017-05-19'),
(9, '9/MajuJaya/PO/5/2017', 1, '2017-05-19'),
(10, '10/MajuJaya/PO/5/2017', 1, '2017-05-19'),
(11, '11/MajuJaya/PO/5/2017', 1, '2017-05-19'),
(12, '12/MajuJaya/PO/5/2017', 1, '2017-05-19'),
(13, '13/MajuJaya/PO/5/2017', 3, '2017-05-19'),
(14, '14/MajuJaya/PO/5/2017', 4, '2017-05-19'),
(15, '15/MajuJaya/PO/5/2017', 5, '2017-05-19'),
(16, '16/MajuJaya/PO/5/2017', 4, '2017-05-19'),
(17, '17/MajuJaya/PO/5/2017', 1, '2017-05-19'),
(18, '18/MajuJaya/PO/5/2017', 3, '2017-05-19'),
(19, '19/MajuJaya/PO/5/2017', 3, '2017-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_barang`
--

CREATE TABLE `purchase_order_barang` (
  `ID_Quotation_Barang` int(11) NOT NULL,
  `Nama_Barang` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Harga_Satuan` int(11) NOT NULL,
  `ID_PO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order_barang`
--

INSERT INTO `purchase_order_barang` (`ID_Quotation_Barang`, `Nama_Barang`, `Quantity`, `Harga_Satuan`, `ID_PO`) VALUES
(6, 'sdak', 12, 12, 8),
(7, 'asdpoa', 123, 123, 8),
(8, 'alkemflkam', 123, 123, 10),
(9, 'aodaoi', 213, 123, 11),
(10, 'ad', 21, 12, 12),
(11, 'aff', 21, 1, 13),
(12, 'asda', 123, 11, 14),
(13, 'adfaffe', 213, 1000, 15),
(14, 'Life Kit', 5, 100000, 16),
(15, 'Defibrilator', 10, 200000, 16),
(16, 'Defibrilator', 5, 100000, 17),
(17, 'Infus', 3, 20000, 17),
(18, 'P3K', 20, 30000, 18),
(19, 'Infus Pack', 100, 100000, 18),
(20, 'Jarum Suntik', 4, 20000, 18),
(21, 'P3K', 20, 30000, 19),
(22, 'Infus Pack', 100, 100000, 19),
(23, 'Jarum Suntik', 4, 20000, 19);

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `quo_id` int(11) NOT NULL,
  `quo_nomor` varchar(50) NOT NULL,
  `quo_deskripsi` varchar(255) NOT NULL,
  `quo_datetime` date NOT NULL,
  `quotation_barang` int(11) NOT NULL,
  `quo_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_barang`
--

CREATE TABLE `quotation_barang` (
  `id` int(11) NOT NULL,
  `quo_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_nama` varchar(50) NOT NULL,
  `supplier_alamat` varchar(255) NOT NULL,
  `supplier_telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_nama`, `supplier_alamat`, `supplier_telepon`) VALUES
(1, 'PT Mitra Perkasa', 'Jl Mulyosari 1', '08271829321'),
(3, 'PT Adijaya', 'Jl Kertajaya no 43 blok a 2', '(021) 5339102'),
(4, 'PT Bimasakti', 'Jl Melati Raya 24 blok A2, Serpong, Tangerang Selatan', '(021) 5382928'),
(5, 'PT Adijaya Bima', 'Jl Melati Raya 24 blok A2, Serpong, Tangerang Selatan', '(021) 5382929');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_Barang`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `delivery_order`
--
ALTER TABLE `delivery_order`
  ADD PRIMARY KEY (`do_id`),
  ADD KEY `pr_id` (`pr_id`);

--
-- Indexes for table `payment_receipt`
--
ALTER TABLE `payment_receipt`
  ADD PRIMARY KEY (`pr_id`),
  ADD KEY `quo_id` (`quo_id`);

--
-- Indexes for table `proof_of_item_receipt`
--
ALTER TABLE `proof_of_item_receipt`
  ADD PRIMARY KEY (`poir_id`),
  ADD KEY `po_id` (`po_id`),
  ADD KEY `pr_id` (`pr_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`ID_Purchase_Order`),
  ADD KEY `Perusahaan_Tujuan` (`Perusahaan_Tujuan`);

--
-- Indexes for table `purchase_order_barang`
--
ALTER TABLE `purchase_order_barang`
  ADD PRIMARY KEY (`ID_Quotation_Barang`),
  ADD KEY `ID_PO` (`ID_PO`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`quo_id`),
  ADD KEY `quotation_barang` (`quotation_barang`),
  ADD KEY `quo_client` (`quo_client`);

--
-- Indexes for table `quotation_barang`
--
ALTER TABLE `quotation_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quo_id` (`quo_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_Barang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `delivery_order`
--
ALTER TABLE `delivery_order`
  MODIFY `do_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_receipt`
--
ALTER TABLE `payment_receipt`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proof_of_item_receipt`
--
ALTER TABLE `proof_of_item_receipt`
  MODIFY `poir_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `ID_Purchase_Order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `purchase_order_barang`
--
ALTER TABLE `purchase_order_barang`
  MODIFY `ID_Quotation_Barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `quo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quotation_barang`
--
ALTER TABLE `quotation_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery_order`
--
ALTER TABLE `delivery_order`
  ADD CONSTRAINT `delivery_order_ibfk_1` FOREIGN KEY (`pr_id`) REFERENCES `payment_receipt` (`pr_id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_receipt`
--
ALTER TABLE `payment_receipt`
  ADD CONSTRAINT `payment_receipt_ibfk_1` FOREIGN KEY (`quo_id`) REFERENCES `quotation` (`quo_id`) ON DELETE NO ACTION;

--
-- Constraints for table `proof_of_item_receipt`
--
ALTER TABLE `proof_of_item_receipt`
  ADD CONSTRAINT `proof_of_item_receipt_ibfk_1` FOREIGN KEY (`po_id`) REFERENCES `purchase_order` (`ID_Purchase_Order`) ON DELETE CASCADE,
  ADD CONSTRAINT `proof_of_item_receipt_ibfk_2` FOREIGN KEY (`pr_id`) REFERENCES `payment_receipt` (`pr_id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`Perusahaan_Tujuan`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION;

--
-- Constraints for table `purchase_order_barang`
--
ALTER TABLE `purchase_order_barang`
  ADD CONSTRAINT `purchase_order_barang_ibfk_1` FOREIGN KEY (`ID_PO`) REFERENCES `purchase_order` (`ID_Purchase_Order`) ON DELETE CASCADE;

--
-- Constraints for table `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `quotation_ibfk_1` FOREIGN KEY (`quo_client`) REFERENCES `client` (`client_id`) ON DELETE NO ACTION;

--
-- Constraints for table `quotation_barang`
--
ALTER TABLE `quotation_barang`
  ADD CONSTRAINT `quotation_barang_ibfk_1` FOREIGN KEY (`quo_id`) REFERENCES `quotation` (`quo_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quotation_barang_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`ID_Barang`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
