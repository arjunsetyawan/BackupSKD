SET foreign_key_checks = 0;
#
# TABLE STRUCTURE FOR: barang
#

CREATE TABLE `barang` (
  `kode` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `barang` (`kode`, `nama`, `kategori`, `satuan`, `stok`, `harga`) VALUES (1, 'Susu Frisian Flag Chocolate Swiss 900 ml', 'Makanan & Minuman', 'Box', 120, 15000);
INSERT INTO `barang` (`kode`, `nama`, `kategori`, `satuan`, `stok`, `harga`) VALUES (2, 'Gelas Plastik Lucu Warna Warni', 'Alat Makan & Minum', 'Buah', 40, 5000);
INSERT INTO `barang` (`kode`, `nama`, `kategori`, `satuan`, `stok`, `harga`) VALUES (4, 'Nakirium', 'Obat-obatan', 'Botol', 50, 55000);


#
# TABLE STRUCTURE FOR: user
#

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES (4, 'Ismaturrofiah', 'isma.turrofiah05@student.uns.ac.id', 'default.jpg', '$2y$10$x0ffkH/x6NDoQonCI6hqneyCmJ9BHNsisosJxVAi.l/CZ0i0P0zJO', 2, 1, '24-11-2021');
INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES (5, 'Mu\'adz', 'muadz@gmail.com', 'default.jpg', '$2y$10$1T38.V0qIMSFMlxCtr0SCulEiSzbWaWl3SP38ZLQKw5/x7wp7hioG', 2, 1, '25-11-2021');
INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES (8, 'Admin', 'admin@gmail.com', 'default.jpg', '$2y$10$RUSs.6zzBImQ5gi41zYAz.OHu4Ya9fPKBc3e0jHh2Uf5OUai/x7Ru', 1, 1, '28-11-2021');
INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES (9, 'Indra', 'indra@gmail.com', 'default.jpg', '$2y$10$gmtexSWhtK.0PCBuhsY6EOUbmafQNGZsX.syDkJgUhFhbXNOsWT8e', 2, 1, '29-11-2021');
INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES (10, 'Gita Bangun', 'gita@gmail.com', 'default.jpg', '$2y$10$fOMyRnqDyKEVazKNAwMxyeMU17vLP4QAP1JlZVm5Ld7nuxfjL0rFO', 3, 1, '29-11-2021');
INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES (11, 'Dito Rizky Maulana', 'dito@gmail.com', 'default.jpg', '$2y$10$djPk59iHi.sWxtqWeC3GNuDzSgzvbUygVtAg1pY6JhLXFu1t0ze36', 3, 1, '29-11-2021');


#
# TABLE STRUCTURE FOR: user_role
#

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_role` (`id`, `role`) VALUES (1, 'Admin');
INSERT INTO `user_role` (`id`, `role`) VALUES (2, 'Staff');
INSERT INTO `user_role` (`id`, `role`) VALUES (3, 'Member');


SET foreign_key_checks = 1;
