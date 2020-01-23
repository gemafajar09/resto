DROP TABLE detail_pesanan;

CREATE TABLE `detail_pesanan` (
  `id_detail_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesanan` char(11) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `status_detail_pesanan` varchar(30) NOT NULL,
  `total_harga` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_pesanan`),
  KEY `id_makanan` (`id_masakan`)
) ENGINE=InnoDB AUTO_INCREMENT=481 DEFAULT CHARSET=latin1;

INSERT INTO detail_pesanan VALUES("478","IDP45556","119","1","tidak pedas","memilih menu","25000");
INSERT INTO detail_pesanan VALUES("479","IDP45556","116","1","pedes","memilih menu","20000");
INSERT INTO detail_pesanan VALUES("480","IDP8145","120","1","","memilih menu","20000");



DROP TABLE kategori;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

INSERT INTO kategori VALUES("25","Desert");
INSERT INTO kategori VALUES("26","Sup");
INSERT INTO kategori VALUES("27","Seafoods");
INSERT INTO kategori VALUES("28","Jus");
INSERT INTO kategori VALUES("29","Paket");



DROP TABLE level;

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO level VALUES("1","admin");
INSERT INTO level VALUES("2","waiter");
INSERT INTO level VALUES("3","kasir");
INSERT INTO level VALUES("4","owner");



DROP TABLE masakan;

CREATE TABLE `masakan` (
  `id_masakan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_masakan` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jenis` varchar(7) NOT NULL COMMENT 'Drink Minuman, Foods Makanan',
  `harga` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status_masakan` varchar(1) NOT NULL DEFAULT 'N' COMMENT 'N Habis, Y Tersedia',
  PRIMARY KEY (`id_masakan`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

INSERT INTO masakan VALUES("113","ayam pedes","25","Makanan","25000","user_80714.jpg","Y");
INSERT INTO masakan VALUES("114","Sate Ayam","25","Makanan","25000","user_10387.jpg","Y");
INSERT INTO masakan VALUES("115","Sate Kambing","25","Makanan","25000","user_17433.jpg","Y");
INSERT INTO masakan VALUES("116","Ayam Geprek","25","Makanan","20000","user_90183.jpg","Y");
INSERT INTO masakan VALUES("117","kue tar","25","Makanan","25000","user_3915.jpg","Y");
INSERT INTO masakan VALUES("118","jus mangga","25","Minuman","10000","menu_42946.jpg","Y");
INSERT INTO masakan VALUES("119","soto babat","25","Makanan","25000","user_35373.jpg","N");
INSERT INTO masakan VALUES("120","SateLilit","27","Makanan","20000","menu_78349.jpg","Y");



DROP TABLE meja;

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL AUTO_INCREMENT,
  `no_meja` varchar(25) NOT NULL,
  `status` varchar(6) NOT NULL,
  PRIMARY KEY (`id_meja`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

INSERT INTO meja VALUES("22","A01","kosong");
INSERT INTO meja VALUES("23","A02","kosong");
INSERT INTO meja VALUES("24","A03","kosong");
INSERT INTO meja VALUES("25","A04","kosong");
INSERT INTO meja VALUES("26","A05","kosong");
INSERT INTO meja VALUES("27","B01","kosong");
INSERT INTO meja VALUES("28","B02","kosong");
INSERT INTO meja VALUES("29","B03","kosong");
INSERT INTO meja VALUES("30","B04","kosong");
INSERT INTO meja VALUES("31","B05","kosong");



DROP TABLE pelanggan;

CREATE TABLE `pelanggan` (
  `id_pelanggan` char(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pelanggan VALUES("IP644653","pelanggan1");
INSERT INTO pelanggan VALUES("IP754608","pelanggan");



DROP TABLE pesanan;

CREATE TABLE `pesanan` (
  `id_pesanan` char(11) NOT NULL,
  `no_meja` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_pelanggan` char(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `status_pesanan` varchar(30) NOT NULL,
  `total_pesanan` int(11) NOT NULL,
  PRIMARY KEY (`id_pesanan`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pesanan VALUES("IDP45556","22","2019-04-07","26","IP754608","tidak pedas","selesai","45000");
INSERT INTO pesanan VALUES("IDP8145","22","2019-04-07","29","IP644653","","selesai","20000");



DROP TABLE recovery_keys;

CREATE TABLE `recovery_keys` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

INSERT INTO recovery_keys VALUES("1","1","94540c8b02feb18a4a522ce664cae561","1");
INSERT INTO recovery_keys VALUES("2","2","e436d7893a671386484ff33d110ea959","1");
INSERT INTO recovery_keys VALUES("3","1","cbc55f26f476d9183eb33156bd4c922b","0");
INSERT INTO recovery_keys VALUES("4","1","ae39191fab140225e8a1a56709f942ad","0");
INSERT INTO recovery_keys VALUES("5","1","10e3a403ad9d84fef2c21c4b491661fd","0");
INSERT INTO recovery_keys VALUES("6","1","de1167383d9a2abd34b44dcc38853a2a","0");
INSERT INTO recovery_keys VALUES("7","1","98c3ad70246159a7ae8cb2068c43bff3","0");
INSERT INTO recovery_keys VALUES("8","22","139bfd5fdd059d64a37fbccec34dc098","1");
INSERT INTO recovery_keys VALUES("9","1","63a5586077b04e5d1e58b14fb6e16408","1");
INSERT INTO recovery_keys VALUES("10","1","57ccbe43d6b8e65064cdca97c0215839","1");
INSERT INTO recovery_keys VALUES("11","1","c3c925bcece19be8b3685283291d4e4c","1");
INSERT INTO recovery_keys VALUES("12","1","0250619e536b71ee9d3d7e77339b5607","1");
INSERT INTO recovery_keys VALUES("13","1","0189489de251ed21a7b102e2f5f9320a","1");
INSERT INTO recovery_keys VALUES("14","1","a174011df20059cdb9206d5cfd690ab5","1");
INSERT INTO recovery_keys VALUES("15","1","56df658fb8b8a69e78ec372b399a4a4b","1");
INSERT INTO recovery_keys VALUES("16","1","75a4e6e109d4f885a0d4b34dbd858a17","1");
INSERT INTO recovery_keys VALUES("17","1","1d4b74fca2f1918a7467aa0ad94507dc","1");
INSERT INTO recovery_keys VALUES("18","1","bcbd6d4978baeac540a71015f996e659","1");
INSERT INTO recovery_keys VALUES("19","1","897dc03010385727b4930a9995a5a327","1");
INSERT INTO recovery_keys VALUES("20","1","cee9fecd6dcca851f1ecb932883c6a0c","1");
INSERT INTO recovery_keys VALUES("21","1","2464aa366072999a43c35ca2b9b0e6b5","1");
INSERT INTO recovery_keys VALUES("22","1","13aa58300a2a5f1feb704916a05e1e11","1");
INSERT INTO recovery_keys VALUES("23","1","266c88cd2b2e222b90aecbb3d5d6fc71","1");
INSERT INTO recovery_keys VALUES("24","1","ad63b565cf301ee0d95d470318270a8f","1");
INSERT INTO recovery_keys VALUES("25","1","95922000b4574b89bb219f1000783da8","1");
INSERT INTO recovery_keys VALUES("26","1","f0a5e3b5a026ee174b1d0bdec2d4e730","1");
INSERT INTO recovery_keys VALUES("27","1","54b937f775ab9bb377ae25306adf5241","1");
INSERT INTO recovery_keys VALUES("28","19","80cbf62a388c921d606713e714a4cf97","1");
INSERT INTO recovery_keys VALUES("29","19","d5c82747ba1abffa2e57d6a4679231db","1");
INSERT INTO recovery_keys VALUES("30","19","48ca0e6a516067f38d46cf543bcb4882","1");
INSERT INTO recovery_keys VALUES("31","19","d92604afdd868b181a8739c99221e675","1");
INSERT INTO recovery_keys VALUES("32","29","46d3e1c6dead5844f9527af195a84ff8","1");
INSERT INTO recovery_keys VALUES("33","29","a00af337284b473ad15b2519938df890","1");
INSERT INTO recovery_keys VALUES("34","29","6b2cc74d4d64262978dce6b7b6e683c3","1");
INSERT INTO recovery_keys VALUES("35","29","f8c405217fde66fd4c363e9ca795e10e","1");



DROP TABLE token;

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  PRIMARY KEY (`id_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO token VALUES("1","KHU8197");
INSERT INTO token VALUES("2","JAGS7812");



DROP TABLE transaksi;

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_pesanan` char(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(15) NOT NULL,
  `jumlah_uang` int(15) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_user` (`id_user`),
  KEY `id_order` (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

INSERT INTO transaksi VALUES("94","26","IDP45556","2019-04-07","45000","50000");
INSERT INTO transaksi VALUES("95","29","IDP8145","2019-04-07","20000","20000");



DROP TABLE user;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `id_level` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'N' COMMENT 'N NonAktif, Y Aktif',
  `gambar_user` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_level` (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("25","kasir","827ccb0eea8a706c4c34a16891f84e7b","Davi Perdiansyah","davi@gmail.com","3","Y","user_31635.png");
INSERT INTO user VALUES("26","waiter","827ccb0eea8a706c4c34a16891f84e7b","Maulana Fatullah","maul@gmail.com","2","Y","user_41427.png");
INSERT INTO user VALUES("27","owner","827ccb0eea8a706c4c34a16891f84e7b","Harsa Aditya","harsa@gmail.com","4","Y","user_57310.png");
INSERT INTO user VALUES("28","admin","827ccb0eea8a706c4c34a16891f84e7b","Administrator","admin@gmai.com","1","Y","user_61264.png");
INSERT INTO user VALUES("29","budi","827ccb0eea8a706c4c34a16891f84e7b","BUDAy","budibuday05@gmail.com","1","Y","user_74499.png");
INSERT INTO user VALUES("30","harsa","827ccb0eea8a706c4c34a16891f84e7b","Harsa Aditya","harsa@gmail.com","2","N","user_57099.png");
INSERT INTO user VALUES("31","andi","827ccb0eea8a706c4c34a16891f84e7b","andi","andi@gmail.com","4","Y","user_24082.png");



