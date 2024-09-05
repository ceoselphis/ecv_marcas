CREATE TABLE `tbl_contador_galena` (
  `id` int NOT NULL AUTO_INCREMENT,
  `contador` int DEFAULT NULL,
  `materia` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;