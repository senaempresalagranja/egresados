SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS egresados;

USE egresados;

DROP TABLE IF EXISTS asociacion_egresados;

CREATE TABLE `asociacion_egresados` (
  `Id_asociacion_egresados` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_Egresado` bigint(20) NOT NULL,
  `id_Programa_Ficha` bigint(20) NOT NULL,
  `FechaCertificacion` date NOT NULL,
  `Ultima_Actualizacion` datetime NOT NULL,
  PRIMARY KEY (`Id_asociacion_egresados`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO asociacion_egresados VALUES("1","1","1","2017-12-27","2017-12-27 13:51:30");
INSERT INTO asociacion_egresados VALUES("2","2","1","2018-01-31","2018-01-11 09:12:44");
INSERT INTO asociacion_egresados VALUES("3","3","1","2018-01-24","2018-01-16 09:01:27");
INSERT INTO asociacion_egresados VALUES("4","4","1","2018-01-09","2018-01-17 15:23:40");
INSERT INTO asociacion_egresados VALUES("5","5","1","2018-01-19","2018-01-17 15:25:59");
INSERT INTO asociacion_egresados VALUES("6","6","1","2018-01-19","2018-01-17 15:26:35");
INSERT INTO asociacion_egresados VALUES("7","8","1","2018-01-23","2018-01-22 02:25:09");
INSERT INTO asociacion_egresados VALUES("8","9","1","2017-11-01","2018-02-04 22:41:24");
INSERT INTO asociacion_egresados VALUES("9","10","1","2017-11-01","2018-02-04 22:46:20");
INSERT INTO asociacion_egresados VALUES("10","11","1","2018-02-14","2018-02-05 03:25:28");



DROP TABLE IF EXISTS asociacion_situacion_laboral;

CREATE TABLE `asociacion_situacion_laboral` (
  `id_asociacion_situacion_laboral` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_Egresado` bigint(20) NOT NULL,
  `Id_Situacion` bigint(20) NOT NULL,
  `Ultima_Actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_asociacion_situacion_laboral`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO asociacion_situacion_laboral VALUES("1","1","1","2017-12-27 14:36:42");
INSERT INTO asociacion_situacion_laboral VALUES("2","1","3","2017-12-27 14:44:50");
INSERT INTO asociacion_situacion_laboral VALUES("3","1","2","2017-12-27 14:57:25");
INSERT INTO asociacion_situacion_laboral VALUES("4","1","1","2017-12-27 14:59:57");
INSERT INTO asociacion_situacion_laboral VALUES("5","2","1","2018-01-11 09:13:03");
INSERT INTO asociacion_situacion_laboral VALUES("6","3","1","2018-01-16 09:01:43");
INSERT INTO asociacion_situacion_laboral VALUES("7","4","2","2018-01-17 15:24:17");
INSERT INTO asociacion_situacion_laboral VALUES("8","6","1","2018-01-17 15:27:10");
INSERT INTO asociacion_situacion_laboral VALUES("9","2","6","2018-01-22 02:10:34");
INSERT INTO asociacion_situacion_laboral VALUES("10","2","2","2018-01-22 02:10:56");
INSERT INTO asociacion_situacion_laboral VALUES("11","2","2","2018-01-22 02:11:46");
INSERT INTO asociacion_situacion_laboral VALUES("12","9","2","2018-02-04 22:42:09");
INSERT INTO asociacion_situacion_laboral VALUES("13","10","2","2018-02-04 22:46:32");
INSERT INTO asociacion_situacion_laboral VALUES("14","10","2","2018-02-05 02:39:26");
INSERT INTO asociacion_situacion_laboral VALUES("15","10","3","2018-02-05 02:42:55");
INSERT INTO asociacion_situacion_laboral VALUES("16","10","6","2018-02-05 02:43:30");
INSERT INTO asociacion_situacion_laboral VALUES("17","10","5","2018-02-05 02:44:03");
INSERT INTO asociacion_situacion_laboral VALUES("18","10","5","2018-02-05 02:47:48");
INSERT INTO asociacion_situacion_laboral VALUES("19","10","1","2018-02-05 03:01:53");
INSERT INTO asociacion_situacion_laboral VALUES("20","10","2","2018-02-05 03:08:22");
INSERT INTO asociacion_situacion_laboral VALUES("21","10","3","2018-02-05 03:08:38");
INSERT INTO asociacion_situacion_laboral VALUES("22","10","2","2018-02-05 03:11:10");
INSERT INTO asociacion_situacion_laboral VALUES("23","10","1","2018-02-05 03:12:11");
INSERT INTO asociacion_situacion_laboral VALUES("24","11","2","2018-02-05 03:26:00");
INSERT INTO asociacion_situacion_laboral VALUES("25","11","2","2018-02-05 03:26:15");



DROP TABLE IF EXISTS contactacion;

CREATE TABLE `contactacion` (
  `id_contactado` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_Egresado` bigint(20) NOT NULL,
  `contactado` varchar(2) NOT NULL,
  `actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_contactado`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO contactacion VALUES("4","1","Si","2017-12-27 15:26:34");
INSERT INTO contactacion VALUES("5","2","Si","2018-02-04 22:44:39");
INSERT INTO contactacion VALUES("6","3","Si","2018-01-16 09:01:50");
INSERT INTO contactacion VALUES("7","4","Si","2018-01-17 15:24:31");
INSERT INTO contactacion VALUES("8","2","Si","2018-02-04 22:44:39");
INSERT INTO contactacion VALUES("9","9","No","2018-02-04 22:43:55");
INSERT INTO contactacion VALUES("10","10","Si","2018-02-04 22:46:35");
INSERT INTO contactacion VALUES("11","11","Si","2018-02-05 03:26:11");



DROP TABLE IF EXISTS departamentos;

CREATE TABLE `departamentos` (
  `id_Departamento` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_Departamento` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_Departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO departamentos VALUES("1","AMAZONAS");
INSERT INTO departamentos VALUES("2","ANTIOQUIA");
INSERT INTO departamentos VALUES("3","ARAUCA");
INSERT INTO departamentos VALUES("4","ATLÃNTICO ");
INSERT INTO departamentos VALUES("5","BOLÃVAR ");
INSERT INTO departamentos VALUES("6","BOYACA ");
INSERT INTO departamentos VALUES("7","CALDAS");
INSERT INTO departamentos VALUES("8","CAQUETÃ");
INSERT INTO departamentos VALUES("9","CASANARE");
INSERT INTO departamentos VALUES("10","CAUCA");
INSERT INTO departamentos VALUES("11","CESAR");
INSERT INTO departamentos VALUES("12","CHOCÃ“");
INSERT INTO departamentos VALUES("13","CÃ“RDOBA ");
INSERT INTO departamentos VALUES("14","CUNDINAMARCA");
INSERT INTO departamentos VALUES("15","GUAINÃA");
INSERT INTO departamentos VALUES("16","GUAVIARE");
INSERT INTO departamentos VALUES("17","HUILA");
INSERT INTO departamentos VALUES("18","LA GUAJIRA");
INSERT INTO departamentos VALUES("19","MAGDALENA");
INSERT INTO departamentos VALUES("20","META");
INSERT INTO departamentos VALUES("21","NARIÃ‘O");
INSERT INTO departamentos VALUES("22","NORTE DE SANTANDER");
INSERT INTO departamentos VALUES("23","PUTUMAYO");
INSERT INTO departamentos VALUES("24","QUINDÃO");
INSERT INTO departamentos VALUES("25","RISARALDA");
INSERT INTO departamentos VALUES("26","SAN ANDRES Y PROVIDENCIA");
INSERT INTO departamentos VALUES("27","SANTANDER");
INSERT INTO departamentos VALUES("28","SUCRE");
INSERT INTO departamentos VALUES("29","TOLIMA");
INSERT INTO departamentos VALUES("30","VALLE DEL CAUCA");
INSERT INTO departamentos VALUES("31","VAUPÃ‰SP");
INSERT INTO departamentos VALUES("32","VICHADA");
INSERT INTO departamentos VALUES("33","SDASDASDA");



DROP TABLE IF EXISTS egresados;

CREATE TABLE `egresados` (
  `id_Egresado` bigint(20) NOT NULL AUTO_INCREMENT,
  `Tipo_Documento` varchar(10) NOT NULL,
  `Numero_Documento` int(20) NOT NULL,
  `Nombre_Aprendiz` varchar(50) NOT NULL,
  `Apellidos_Aprendiz` varchar(50) NOT NULL,
  `id_Municipio` bigint(20) NOT NULL,
  `Correo_Electronico` varchar(60) NOT NULL,
  `Telefono_Fijo` int(20) NOT NULL,
  `Telefono_Alterno` int(20) NOT NULL,
  `Telefono_Celular` int(20) NOT NULL,
  `Facebook` varchar(50) NOT NULL,
  `Sexo` varchar(2) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Ultima_Actualizacion` datetime NOT NULL,
  `id_Usuario` bigint(20) NOT NULL,
  PRIMARY KEY (`id_Egresado`),
  KEY `id_Usuario` (`id_Usuario`),
  KEY `id_Municipio` (`id_Municipio`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO egresados VALUES("1","CC","1105691815","JOAQUIN ESTIVENB","REYES","1030","JSREYES048@MISENA.EDU.CO","2147483647","2147483647","2","","M","1998-04-29","2017-12-27 13:51:00","1");
INSERT INTO egresados VALUES("2","CC","105692193","Alexi","Espinosa Vidal","644","aespinosa68@misena.edu.co","3","3","2147483647","Alexis espinosa vidal","M","1998-09-19","2018-02-04 21:16:16","1");
INSERT INTO egresados VALUES("3","TI","1234567","sdssdfs","dasdasdas","718","qqeqweqw","23423423","213123","12124","124sdfsdfsd","M","2018-01-09","2018-01-16 09:00:56","1");
INSERT INTO egresados VALUES("4","TI","1234","sdssdfs","dasdasdas","717","qqeqweqw","23423423","213123","12124","124sdfsdfsd","M","2018-01-09","2018-01-17 15:23:27","1");
INSERT INTO egresados VALUES("5","TI","123","sdssdfs","dasdasdas","716","qqeqweqw","23423423","213123","12124","124sdfsdfsd","M","2018-01-09","2018-01-17 15:25:45","1");
INSERT INTO egresados VALUES("6","TI","12367789","sdssdfs","dasdasdas","716","qqeqweqw","23423423","213123","12124","124sdfsdfsd","M","2018-01-09","2018-01-17 15:26:32","1");
INSERT INTO egresados VALUES("7","TI","2147483647","sdssdfs","dasdasdas","717","qqeqweqw","23423423","213123","12124","124sdfsdfsd","M","2018-01-09","2018-01-18 16:10:30","1");
INSERT INTO egresados VALUES("8","CC","104587913","Estefania ","Espinosa vidal","530","estefania@gmail.com","123456789","123456789","123456789","estefania espinosa vidal","F","2018-01-23","2013-01-22 02:24:48","1");
INSERT INTO egresados VALUES("9","CC","52419478","Maria Cecilia ","Vidal Yamguma","1037","mariaceciliaestilo@gmail.com","89256","0","2147483647","Maria C Vidal","F","1977-01-06","2018-02-04 22:40:58","1");
INSERT INTO egresados VALUES("10","CC","1105692193","Alexi","Espinosa Vidal","1037","alexisvidaldragon@gmail.com","96582","0","2147483647","Alexis espinosa vidal","M","1998-09-19","2018-02-04 22:45:58","1");
INSERT INTO egresados VALUES("11","TI","32145689","valentina ","Espinosa Vidal","1037","valentinaespi@gmail.com","123","0","2147483647","valentina espinosa vidal","F","2018-02-28","2018-02-05 03:25:02","1");



DROP TABLE IF EXISTS empresa;

CREATE TABLE `empresa` (
  `id_Empresa` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre_Empresa` varchar(11) NOT NULL,
  `Nit_Empresa` int(11) NOT NULL,
  `id_Municipio` bigint(20) NOT NULL,
  PRIMARY KEY (`id_Empresa`),
  KEY `id_Municipio` (`id_Municipio`),
  CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_Municipio`) REFERENCES `municipios` (`id_Municipio`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO empresa VALUES("1","FLOANDES","156842","884");



DROP TABLE IF EXISTS estudiando_egresado;

CREATE TABLE `estudiando_egresado` (
  `Id_Estudiando_Egresado` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_Egresado` bigint(20) NOT NULL,
  `Id_universidad` bigint(50) NOT NULL,
  `Nombre_Carrera` varchar(50) NOT NULL,
  `Ultima_Actualizacion` datetime NOT NULL,
  PRIMARY KEY (`Id_Estudiando_Egresado`),
  KEY `id_Egresado` (`id_Egresado`),
  KEY `Id_universidad` (`Id_universidad`),
  CONSTRAINT `estudiando_egresado_ibfk_1` FOREIGN KEY (`Id_universidad`) REFERENCES `universidades` (`Id_universidad`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO estudiando_egresado VALUES("1","4","1","ESTSDSAD","2017-12-27 14:44:50");
INSERT INTO estudiando_egresado VALUES("2","10","10","sistemas","2018-02-05 02:42:55");
INSERT INTO estudiando_egresado VALUES("3","10","3","sdfsdfsd","2018-02-05 03:08:38");



DROP TABLE IF EXISTS etapa_practica_egresado;

CREATE TABLE `etapa_practica_egresado` (
  `Id_Etapa_Practica_Egresado` bigint(20) NOT NULL AUTO_INCREMENT,
  `Id_asociacion_egresados` bigint(20) NOT NULL,
  `id_Empresa` bigint(20) DEFAULT NULL,
  `Id_Tipo_Etapa_Practica` bigint(20) NOT NULL,
  `Nombre_Proyecto` varchar(50) DEFAULT NULL,
  `Ultima_Actualizacion` datetime NOT NULL,
  PRIMARY KEY (`Id_Etapa_Practica_Egresado`),
  KEY `id_Egresado` (`Id_asociacion_egresados`),
  KEY `id_Empresa` (`id_Empresa`),
  CONSTRAINT `etapa_practica_egresado_ibfk_1` FOREIGN KEY (`id_Empresa`) REFERENCES `empresa` (`id_Empresa`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO etapa_practica_egresado VALUES("1","1","1","1","","2017-12-27 13:51:57");
INSERT INTO etapa_practica_egresado VALUES("2","2","1","1","","2018-01-22 02:13:12");
INSERT INTO etapa_practica_egresado VALUES("3","3","1","1","","2018-01-16 09:01:34");
INSERT INTO etapa_practica_egresado VALUES("4","4","","2","","2018-01-17 15:24:02");
INSERT INTO etapa_practica_egresado VALUES("5","2","1","1","","2018-01-22 02:12:49");
INSERT INTO etapa_practica_egresado VALUES("6","2","1","3","","2018-01-22 02:12:59");
INSERT INTO etapa_practica_egresado VALUES("7","8","1","1","","2018-02-04 22:41:43");
INSERT INTO etapa_practica_egresado VALUES("8","9","1","1","","2018-02-04 22:46:28");
INSERT INTO etapa_practica_egresado VALUES("9","10","1","1","","2018-02-05 03:25:38");



DROP TABLE IF EXISTS fichas;

CREATE TABLE `fichas` (
  `id_Ficha` bigint(20) NOT NULL AUTO_INCREMENT,
  `numero_Ficha` int(20) NOT NULL,
  `id_Usuario` bigint(20) NOT NULL,
  PRIMARY KEY (`id_Ficha`),
  KEY `id_Usuario` (`id_Usuario`),
  CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuarios` (`id_Usuario`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO fichas VALUES("1","1096123","1");
INSERT INTO fichas VALUES("2","105566","1");
INSERT INTO fichas VALUES("3","147896","1");



DROP TABLE IF EXISTS municipios;

CREATE TABLE `municipios` (
  `id_Municipio` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_Departamento` bigint(20) NOT NULL,
  `nombre_Municipio` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_Municipio`),
  KEY `id_Departamento` (`id_Departamento`),
  CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`id_Departamento`) REFERENCES `departamentos` (`id_Departamento`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1115 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO municipios VALUES("1","1","EL ENCANTO");
INSERT INTO municipios VALUES("2","1","LA CHORRERA");
INSERT INTO municipios VALUES("3","1","LA PEDRERA");
INSERT INTO municipios VALUES("4","1","LA VICTORIA");
INSERT INTO municipios VALUES("5","1","LETICIA");
INSERT INTO municipios VALUES("6","1","MIRITI");
INSERT INTO municipios VALUES("7","1","PUERTO ALEGRIA");
INSERT INTO municipios VALUES("8","1","PUERTO ARICA");
INSERT INTO municipios VALUES("9","1","PUERTO NARIÃ‘O");
INSERT INTO municipios VALUES("10","1","PUERTO SANTANDER");
INSERT INTO municipios VALUES("11","1","TURAPACA");
INSERT INTO municipios VALUES("12","2","ABEJORRAL");
INSERT INTO municipios VALUES("13","2","ABRIAQUI");
INSERT INTO municipios VALUES("14","2","ALEJANDRIA");
INSERT INTO municipios VALUES("15","2","AMAGA");
INSERT INTO municipios VALUES("16","2","AMALFI");
INSERT INTO municipios VALUES("17","2","ANDES");
INSERT INTO municipios VALUES("18","2","ANGELOPOLIS");
INSERT INTO municipios VALUES("19","2","ANGOSTURA");
INSERT INTO municipios VALUES("20","2","ANORI");
INSERT INTO municipios VALUES("21","2","ANTIOQUIA");
INSERT INTO municipios VALUES("22","2","ANZA");
INSERT INTO municipios VALUES("23","2","APARTADO");
INSERT INTO municipios VALUES("24","2","ARBOLETES");
INSERT INTO municipios VALUES("25","2","ARGELIA");
INSERT INTO municipios VALUES("26","2","ARMENIA");
INSERT INTO municipios VALUES("27","2","BARBOSA");
INSERT INTO municipios VALUES("28","2","BELLO");
INSERT INTO municipios VALUES("29","2","BELMIRA");
INSERT INTO municipios VALUES("30","2","BETANIA");
INSERT INTO municipios VALUES("31","2","BETULIA");
INSERT INTO municipios VALUES("32","2","BOLIVAR");
INSERT INTO municipios VALUES("33","2","BRICEÑO");
INSERT INTO municipios VALUES("34","2","BURITICA");
INSERT INTO municipios VALUES("35","2","CACERES");
INSERT INTO municipios VALUES("36","2","CAICEDO");
INSERT INTO municipios VALUES("37","2","CALDAS");
INSERT INTO municipios VALUES("38","2","CAMPAMENTO");
INSERT INTO municipios VALUES("39","2","CANASGORDAS");
INSERT INTO municipios VALUES("40","2","CARACOLI");
INSERT INTO municipios VALUES("41","2","CARAMANTA");
INSERT INTO municipios VALUES("42","2","CAREPA");
INSERT INTO municipios VALUES("43","2","CARMEN DE VIBORAL");
INSERT INTO municipios VALUES("44","2","CAROLINA DEL PRINCIPE");
INSERT INTO municipios VALUES("45","2","CAUCASIA");
INSERT INTO municipios VALUES("46","2","CHIGORODO");
INSERT INTO municipios VALUES("47","2","CISNEROS");
INSERT INTO municipios VALUES("48","2","COCORNA");
INSERT INTO municipios VALUES("49","2","CONCEPCION");
INSERT INTO municipios VALUES("50","2","CONCORDIA");
INSERT INTO municipios VALUES("51","2","COPACABANA");
INSERT INTO municipios VALUES("52","2","DABEIBA");
INSERT INTO municipios VALUES("53","2","DONMATIAS");
INSERT INTO municipios VALUES("54","2","EBEJICO");
INSERT INTO municipios VALUES("55","2","EL BAGRE");
INSERT INTO municipios VALUES("56","2","EL PENOL");
INSERT INTO municipios VALUES("57","2","EL RETIRO");
INSERT INTO municipios VALUES("58","2","ENTRERRIOS");
INSERT INTO municipios VALUES("59","2","ENVIGADO");
INSERT INTO municipios VALUES("60","2","FREDONIA");
INSERT INTO municipios VALUES("61","2","FRONTINO");
INSERT INTO municipios VALUES("62","2","GIRALDO");
INSERT INTO municipios VALUES("63","2","GIRARDOTA");
INSERT INTO municipios VALUES("64","2","GOMEZ PLATA");
INSERT INTO municipios VALUES("65","2","GRANADA");
INSERT INTO municipios VALUES("66","2","GUADALUPE");
INSERT INTO municipios VALUES("67","2","GUARNE");
INSERT INTO municipios VALUES("68","2","GUATAQUE");
INSERT INTO municipios VALUES("69","2","HELICONIA");
INSERT INTO municipios VALUES("70","2","HISPANIA");
INSERT INTO municipios VALUES("71","2","ITAGUI");
INSERT INTO municipios VALUES("72","2","ITUANGO");
INSERT INTO municipios VALUES("73","2","JARDIN");
INSERT INTO municipios VALUES("74","2","JERICO");
INSERT INTO municipios VALUES("75","2","LA CEJA");
INSERT INTO municipios VALUES("76","2","LA ESTRELLA");
INSERT INTO municipios VALUES("77","2","LA PINTADA");
INSERT INTO municipios VALUES("78","2","LA UNION");
INSERT INTO municipios VALUES("79","2","LIBORINA");
INSERT INTO municipios VALUES("80","2","MACEO");
INSERT INTO municipios VALUES("81","2","MARINILLA");
INSERT INTO municipios VALUES("82","2","MEDELLIN");
INSERT INTO municipios VALUES("83","2","MONTEBELLO");
INSERT INTO municipios VALUES("84","2","MURINDO");
INSERT INTO municipios VALUES("85","2","MUTATA");
INSERT INTO municipios VALUES("86","2","NARINO");
INSERT INTO municipios VALUES("87","2","NECHI");
INSERT INTO municipios VALUES("88","2","NECOCLI");
INSERT INTO municipios VALUES("89","2","OLAYA");
INSERT INTO municipios VALUES("90","2","PEQUE");
INSERT INTO municipios VALUES("91","2","PUEBLORRICO");
INSERT INTO municipios VALUES("92","2","PUERTO BERRIO");
INSERT INTO municipios VALUES("93","2","PUERTO NARE");
INSERT INTO municipios VALUES("94","2","PUERTO TRIUNFO");
INSERT INTO municipios VALUES("95","2","REMEDIOS");
INSERT INTO municipios VALUES("96","2","RIONEGRO");
INSERT INTO municipios VALUES("97","2","SABANALARGA");
INSERT INTO municipios VALUES("98","2","SABANETA");
INSERT INTO municipios VALUES("99","2","SALGAR");
INSERT INTO municipios VALUES("100","2","SAN ANDRES DE CUERQUIA");
INSERT INTO municipios VALUES("101","2","SAN CARLOS");
INSERT INTO municipios VALUES("102","2","SAN FRANCISCO");
INSERT INTO municipios VALUES("103","2","SAN JERONIMO");
INSERT INTO municipios VALUES("104","2","SAN JOSE DE LA MONTAÃ‘A");
INSERT INTO municipios VALUES("105","2","SAN JUAN DE URABA");
INSERT INTO municipios VALUES("106","2","SAN LUIS");
INSERT INTO municipios VALUES("107","2","SAN PEDRO DE LOS MILAGROS");
INSERT INTO municipios VALUES("108","2","SAN PEDRO DE URABA");
INSERT INTO municipios VALUES("109","2","SAN RAFAEL");
INSERT INTO municipios VALUES("110","2","SAN ROQUE");
INSERT INTO municipios VALUES("111","2","SAN VICENTE");
INSERT INTO municipios VALUES("112","2","SANTA BARBARA");
INSERT INTO municipios VALUES("113","2","SANTA ROSA DE OSOS");
INSERT INTO municipios VALUES("114","2","SANTO DOMINGO");
INSERT INTO municipios VALUES("115","2","SANTUARIO");
INSERT INTO municipios VALUES("116","2","SEGOVIA");
INSERT INTO municipios VALUES("117","2","SONSON");
INSERT INTO municipios VALUES("118","2","SOPETRAN");
INSERT INTO municipios VALUES("119","2","TAMESIS");
INSERT INTO municipios VALUES("120","2","TARAZA");
INSERT INTO municipios VALUES("121","2","TARSO");
INSERT INTO municipios VALUES("122","2","TITIRIBI");
INSERT INTO municipios VALUES("123","2","TOLEDO");
INSERT INTO municipios VALUES("124","2","TURBO");
INSERT INTO municipios VALUES("125","2","URAMITA");
INSERT INTO municipios VALUES("126","2","URRAO");
INSERT INTO municipios VALUES("127","2","VALDIVIA");
INSERT INTO municipios VALUES("128","2","VALPARAISO");
INSERT INTO municipios VALUES("129","2","VEGACHI");
INSERT INTO municipios VALUES("130","2","VENECIA");
INSERT INTO municipios VALUES("131","2","VIGIA DEL FUERTE");
INSERT INTO municipios VALUES("132","2","YALI");
INSERT INTO municipios VALUES("133","2","YARUMAL");
INSERT INTO municipios VALUES("134","2","YOLOMBO");
INSERT INTO municipios VALUES("135","2","YONDO");
INSERT INTO municipios VALUES("136","2","ZARAGOZA");
INSERT INTO municipios VALUES("137","3","ARAUCA");
INSERT INTO municipios VALUES("138","3","ARAUQUITA");
INSERT INTO municipios VALUES("139","3","CRAVO NORTE");
INSERT INTO municipios VALUES("140","3","FORTUL");
INSERT INTO municipios VALUES("141","3","PUERTO RONDON");
INSERT INTO municipios VALUES("142","3","SARAVENA");
INSERT INTO municipios VALUES("143","3","TAME");
INSERT INTO municipios VALUES("144","4","BARANOA");
INSERT INTO municipios VALUES("145","4","BARRANQUILLA");
INSERT INTO municipios VALUES("146","4","CAMPO DE LA CRUZ");
INSERT INTO municipios VALUES("147","4","CANDELARIA");
INSERT INTO municipios VALUES("148","4","GALAPA");
INSERT INTO municipios VALUES("149","4","JUAN DE ACOSTA");
INSERT INTO municipios VALUES("150","4","LURUACO");
INSERT INTO municipios VALUES("151","4","MALAMBO");
INSERT INTO municipios VALUES("152","4","MANATI");
INSERT INTO municipios VALUES("153","4","PALMAR DE VARELA");
INSERT INTO municipios VALUES("154","4","PIOJO");
INSERT INTO municipios VALUES("155","4","POLO NUEVO");
INSERT INTO municipios VALUES("156","4","PONEDERA");
INSERT INTO municipios VALUES("157","4","PUERTO COLOMBIA");
INSERT INTO municipios VALUES("158","4","REPELON");
INSERT INTO municipios VALUES("159","4","SABANAGRANDE");
INSERT INTO municipios VALUES("160","4","SABANALARGA");
INSERT INTO municipios VALUES("161","4","SANTA LUCIA");
INSERT INTO municipios VALUES("162","4","SANTO TOMAS");
INSERT INTO municipios VALUES("163","4","SOLEDAD");
INSERT INTO municipios VALUES("164","4","SUAN");
INSERT INTO municipios VALUES("165","4","TUBARA");
INSERT INTO municipios VALUES("166","4","USIACURI");
INSERT INTO municipios VALUES("167","5","ACHI");
INSERT INTO municipios VALUES("168","5","ALTOS DEL ROSARIO");
INSERT INTO municipios VALUES("169","5","ARENAL");
INSERT INTO municipios VALUES("170","5","ARJONA");
INSERT INTO municipios VALUES("171","5","ARROYOHONDO");
INSERT INTO municipios VALUES("172","5","BARRANCO DE LOBA");
INSERT INTO municipios VALUES("173","5","BRAZUELO DE PAPAYAL");
INSERT INTO municipios VALUES("174","5","CALAMAR");
INSERT INTO municipios VALUES("175","5","CANTAGALLO");
INSERT INTO municipios VALUES("176","5","CARTAGENA DE INDIAS");
INSERT INTO municipios VALUES("177","5","CICUCO");
INSERT INTO municipios VALUES("178","5","CLEMENCIA");
INSERT INTO municipios VALUES("179","5","CORDOBA");
INSERT INTO municipios VALUES("180","5","EL CARMEN DE BOLIVAR");
INSERT INTO municipios VALUES("181","5","EL GUAMO");
INSERT INTO municipios VALUES("182","5","EL PENION");
INSERT INTO municipios VALUES("183","5","HATILLO DE LOBA");
INSERT INTO municipios VALUES("184","5","MAGANGUE");
INSERT INTO municipios VALUES("185","5","MAHATES");
INSERT INTO municipios VALUES("186","5","MARGARITA");
INSERT INTO municipios VALUES("187","5","MARIA LA BAJA");
INSERT INTO municipios VALUES("188","5","MONTECRISTO");
INSERT INTO municipios VALUES("189","5","MORALES");
INSERT INTO municipios VALUES("190","5","MORALES");
INSERT INTO municipios VALUES("191","5","NOROSI");
INSERT INTO municipios VALUES("192","5","PINILLOS");
INSERT INTO municipios VALUES("193","5","REGIDOR");
INSERT INTO municipios VALUES("194","5","RIO VIEJO");
INSERT INTO municipios VALUES("195","5","SAN CRISTOBAL");
INSERT INTO municipios VALUES("196","5","SAN ESTANISLAO");
INSERT INTO municipios VALUES("197","5","SAN FERNANDO");
INSERT INTO municipios VALUES("198","5","SAN JACINTO");
INSERT INTO municipios VALUES("199","5","SAN JACINTO DEL CAUCA");
INSERT INTO municipios VALUES("200","5","SAN JUAN DE NEPOMUCENO");
INSERT INTO municipios VALUES("201","5","SAN MARTIN DE LOBA");
INSERT INTO municipios VALUES("202","5","SAN PABLO");
INSERT INTO municipios VALUES("203","5","SAN PABLO NORTE");
INSERT INTO municipios VALUES("204","5","SANTA CATALINA");
INSERT INTO municipios VALUES("205","5","SANTA CRUZ DE MOMPOX");
INSERT INTO municipios VALUES("206","5","SANTA ROSA");
INSERT INTO municipios VALUES("207","5","SANTA ROSA DEL SUR");
INSERT INTO municipios VALUES("208","5","SIMITI");
INSERT INTO municipios VALUES("209","5","SOPLAVIENTO");
INSERT INTO municipios VALUES("210","5","TALAIGUA NUEVO");
INSERT INTO municipios VALUES("211","5","TUQUISIO");
INSERT INTO municipios VALUES("212","5","TURBACO");
INSERT INTO municipios VALUES("213","5","TURBANA");
INSERT INTO municipios VALUES("214","5","VILLANUEVA");
INSERT INTO municipios VALUES("215","5","ZAMBRANO");
INSERT INTO municipios VALUES("216","6","AQUITANIA");
INSERT INTO municipios VALUES("217","6","ARCABUCO");
INSERT INTO municipios VALUES("218","6","BELÉN");
INSERT INTO municipios VALUES("219","6","BERBEO");
INSERT INTO municipios VALUES("220","6","BETÉITIVA");
INSERT INTO municipios VALUES("221","6","BOAVITA");
INSERT INTO municipios VALUES("222","6","BOYACÁ");
INSERT INTO municipios VALUES("223","6","BRICEÑO");
INSERT INTO municipios VALUES("224","6","BUENAVISTA");
INSERT INTO municipios VALUES("225","6","BUSBANZÁ");
INSERT INTO municipios VALUES("226","6","CALDAS");
INSERT INTO municipios VALUES("227","6","CAMPO HERMOSO");
INSERT INTO municipios VALUES("228","6","CERINZA");
INSERT INTO municipios VALUES("229","6","CHINAVITA");
INSERT INTO municipios VALUES("230","6","CHIQUINQUIRÁ");
INSERT INTO municipios VALUES("231","6","CHÍQUIZA");
INSERT INTO municipios VALUES("232","6","CHISCAS");
INSERT INTO municipios VALUES("233","6","CHITA");
INSERT INTO municipios VALUES("234","6","CHITARAQUE");
INSERT INTO municipios VALUES("235","6","CHIVATÁ");
INSERT INTO municipios VALUES("236","6","CIÉNEGA");
INSERT INTO municipios VALUES("237","6","CÓMBITA");
INSERT INTO municipios VALUES("238","6","COPER");
INSERT INTO municipios VALUES("239","6","CORRALES");
INSERT INTO municipios VALUES("240","6","COVARACHÍA");
INSERT INTO municipios VALUES("241","6","CUBARA");
INSERT INTO municipios VALUES("242","6","CUCAITA");
INSERT INTO municipios VALUES("243","6","CUITIVA");
INSERT INTO municipios VALUES("244","6","DUITAMA");
INSERT INTO municipios VALUES("245","6","EL COCUY");
INSERT INTO municipios VALUES("246","6","EL ESPINO");
INSERT INTO municipios VALUES("247","6","FIRAVITOBA");
INSERT INTO municipios VALUES("248","6","FLORESTA");
INSERT INTO municipios VALUES("249","6","GACHANTIVÁ");
INSERT INTO municipios VALUES("250","6","GÁMEZA");
INSERT INTO municipios VALUES("251","6","GARAGOA");
INSERT INTO municipios VALUES("252","6","GUACAMAYAS");
INSERT INTO municipios VALUES("253","6","GÜICÁN");
INSERT INTO municipios VALUES("254","6","IZA");
INSERT INTO municipios VALUES("255","6","JENESANO");
INSERT INTO municipios VALUES("256","6","JERICÓ");
INSERT INTO municipios VALUES("257","6","LA UVITA");
INSERT INTO municipios VALUES("258","6","LA VICTORIA");
INSERT INTO municipios VALUES("259","6","LABRANZA GRANDE");
INSERT INTO municipios VALUES("260","6","MACANAL");
INSERT INTO municipios VALUES("261","6","MARIPÍ");
INSERT INTO municipios VALUES("262","6","MIRAFLORES");
INSERT INTO municipios VALUES("263","6","MONGUA");
INSERT INTO municipios VALUES("264","6","MONGUÍ");
INSERT INTO municipios VALUES("265","6","MONIQUIRÁ");
INSERT INTO municipios VALUES("266","6","MOTAVITA");
INSERT INTO municipios VALUES("267","6","MUZO");
INSERT INTO municipios VALUES("268","6","NOBSA");
INSERT INTO municipios VALUES("269","6","NUEVO COLÓN");
INSERT INTO municipios VALUES("270","6","OICATÁ");
INSERT INTO municipios VALUES("271","6","OTANCHE");
INSERT INTO municipios VALUES("272","6","PACHAVITA");
INSERT INTO municipios VALUES("273","6","PÁEZ");
INSERT INTO municipios VALUES("274","6","PAIPA");
INSERT INTO municipios VALUES("275","6","PAJARITO");
INSERT INTO municipios VALUES("276","6","PANQUEBA");
INSERT INTO municipios VALUES("277","6","PAUNA");
INSERT INTO municipios VALUES("278","6","PAYA");
INSERT INTO municipios VALUES("279","6","PAZ DE RÍO");
INSERT INTO municipios VALUES("280","6","PESCA");
INSERT INTO municipios VALUES("281","6","PISBA");
INSERT INTO municipios VALUES("282","6","PUERTO BOYACA");
INSERT INTO municipios VALUES("283","6","QUÍPAMA");
INSERT INTO municipios VALUES("284","6","RAMIRIQUÍ");
INSERT INTO municipios VALUES("285","6","RÁQUIRA");
INSERT INTO municipios VALUES("286","6","RONDÓN");
INSERT INTO municipios VALUES("287","6","SABOYÁ");
INSERT INTO municipios VALUES("288","6","SÁCHICA");
INSERT INTO municipios VALUES("289","6","SAMACÁ");
INSERT INTO municipios VALUES("290","6","SAN EDUARDO");
INSERT INTO municipios VALUES("291","6","SAN JOSÉ DE PARE");
INSERT INTO municipios VALUES("292","6","SAN LUÍS DE GACENO");
INSERT INTO municipios VALUES("293","6","SAN MATEO");
INSERT INTO municipios VALUES("294","6","SAN MIGUEL DE SEMA");
INSERT INTO municipios VALUES("295","6","SAN PABLO DE BORBUR");
INSERT INTO municipios VALUES("296","6","SANTA MARÍA");
INSERT INTO municipios VALUES("297","6","SANTA ROSA DE VITERBO");
INSERT INTO municipios VALUES("298","6","SANTA SOFÍA");
INSERT INTO municipios VALUES("299","6","SANTANA");
INSERT INTO municipios VALUES("300","6","SATIVANORTE");
INSERT INTO municipios VALUES("301","6","SATIVASUR");
INSERT INTO municipios VALUES("302","6","SIACHOQUE");
INSERT INTO municipios VALUES("303","6","SOATÁ");
INSERT INTO municipios VALUES("304","6","SOCHA");
INSERT INTO municipios VALUES("305","6","SOCOTÁ");
INSERT INTO municipios VALUES("306","6","SOGAMOSO");
INSERT INTO municipios VALUES("307","6","SORA");
INSERT INTO municipios VALUES("308","6","SORACÁ");
INSERT INTO municipios VALUES("309","6","SOTAQUIRÁ");
INSERT INTO municipios VALUES("310","6","SUSACÓN");
INSERT INTO municipios VALUES("311","6","SUTARMACHÁN");
INSERT INTO municipios VALUES("312","6","TASCO");
INSERT INTO municipios VALUES("313","6","TIBANÁ");
INSERT INTO municipios VALUES("314","6","TIBASOSA");
INSERT INTO municipios VALUES("315","6","TINJACÁ");
INSERT INTO municipios VALUES("316","6","TIPACOQUE");
INSERT INTO municipios VALUES("317","6","TOCA");
INSERT INTO municipios VALUES("318","6","TOGÜÍ");
INSERT INTO municipios VALUES("319","6","TÓPAGA");
INSERT INTO municipios VALUES("320","6","TOTA");
INSERT INTO municipios VALUES("321","6","TUNJA");
INSERT INTO municipios VALUES("322","6","TUNUNGUÁ");
INSERT INTO municipios VALUES("323","6","TURMEQUÉ");
INSERT INTO municipios VALUES("324","6","TUTA");
INSERT INTO municipios VALUES("325","6","TUTAZÁ");
INSERT INTO municipios VALUES("326","6","UMBITA");
INSERT INTO municipios VALUES("327","6","VENTA QUEMADA");
INSERT INTO municipios VALUES("328","6","VILLA DE LEYVA");
INSERT INTO municipios VALUES("329","6","VIRACACHÁ");
INSERT INTO municipios VALUES("330","6","ZETAQUIRA");
INSERT INTO municipios VALUES("331","7","AGUADAS");
INSERT INTO municipios VALUES("332","7","ANSERMA");
INSERT INTO municipios VALUES("333","7","ARANZAZU");
INSERT INTO municipios VALUES("334","7","BELALCAZAR");
INSERT INTO municipios VALUES("335","7","CHINCHINÁ");
INSERT INTO municipios VALUES("336","7","FILADELFIA");
INSERT INTO municipios VALUES("337","7","LA DORADA");
INSERT INTO municipios VALUES("338","7","LA MERCED");
INSERT INTO municipios VALUES("339","7","MANIZALES");
INSERT INTO municipios VALUES("340","7","MANZANARES");
INSERT INTO municipios VALUES("341","7","MARMATO");
INSERT INTO municipios VALUES("342","7","MARQUETALIA");
INSERT INTO municipios VALUES("343","7","MARULANDA");
INSERT INTO municipios VALUES("344","7","NEIRA");
INSERT INTO municipios VALUES("345","7","NORCASIA");
INSERT INTO municipios VALUES("346","7","PACORA");
INSERT INTO municipios VALUES("347","7","PALESTINA");
INSERT INTO municipios VALUES("348","7","PENSILVANIA");
INSERT INTO municipios VALUES("349","7","RIOSUCIO");
INSERT INTO municipios VALUES("350","7","RISARALDA");
INSERT INTO municipios VALUES("351","7","SALAMINA");
INSERT INTO municipios VALUES("352","7","SAMANA");
INSERT INTO municipios VALUES("353","7","SAN JOSE");
INSERT INTO municipios VALUES("354","7","SUPÍA");
INSERT INTO municipios VALUES("355","7","VICTORIA");
INSERT INTO municipios VALUES("356","7","VILLAMARÍA");
INSERT INTO municipios VALUES("357","7","VITERBO");
INSERT INTO municipios VALUES("358","8","ALBANIA");
INSERT INTO municipios VALUES("359","8","BELÉN ANDAQUIES");
INSERT INTO municipios VALUES("360","8","CARTAGENA DEL CHAIRA");
INSERT INTO municipios VALUES("361","8","CURILLO");
INSERT INTO municipios VALUES("362","8","EL DONCELLO");
INSERT INTO municipios VALUES("363","8","EL PAUJIL");
INSERT INTO municipios VALUES("364","8","FLORENCIA");
INSERT INTO municipios VALUES("365","8","LA MONTAÑITA");
INSERT INTO municipios VALUES("366","8","MILÁN");
INSERT INTO municipios VALUES("367","8","MORELIA");
INSERT INTO municipios VALUES("368","8","PUERTO RICO");
INSERT INTO municipios VALUES("369","8","SAN  VICENTE DEL CAGUAN");
INSERT INTO municipios VALUES("370","8","SAN JOSÉ DE FRAGUA");
INSERT INTO municipios VALUES("371","8","SOLANO");
INSERT INTO municipios VALUES("372","8","SOLITA");
INSERT INTO municipios VALUES("373","8","VALPARAÍSO");
INSERT INTO municipios VALUES("374","9","AGUAZUL");
INSERT INTO municipios VALUES("375","9","CHAMEZA");
INSERT INTO municipios VALUES("376","9","HATO COROZAL");
INSERT INTO municipios VALUES("377","9","LA SALINA");
INSERT INTO municipios VALUES("378","9","MANÍ");
INSERT INTO municipios VALUES("379","9","MONTERREY");
INSERT INTO municipios VALUES("380","9","NUNCHIA");
INSERT INTO municipios VALUES("381","9","OROCUE");
INSERT INTO municipios VALUES("382","9","PAZ DE ARIPORO");
INSERT INTO municipios VALUES("383","9","PORE");
INSERT INTO municipios VALUES("384","9","RECETOR");
INSERT INTO municipios VALUES("385","9","SABANA LARGA");
INSERT INTO municipios VALUES("386","9","SACAMA");
INSERT INTO municipios VALUES("387","9","SAN LUIS DE PALENQUE");
INSERT INTO municipios VALUES("388","9","TAMARA");
INSERT INTO municipios VALUES("389","9","TAURAMENA");
INSERT INTO municipios VALUES("390","9","TRINIDAD");
INSERT INTO municipios VALUES("391","9","VILLANUEVA");
INSERT INTO municipios VALUES("392","9","YOPAL");
INSERT INTO municipios VALUES("393","10","ALMAGUER");
INSERT INTO municipios VALUES("394","10","ARGELIA");
INSERT INTO municipios VALUES("395","10","BALBOA");
INSERT INTO municipios VALUES("396","10","BOLÍVAR");
INSERT INTO municipios VALUES("397","10","BUENOS AIRES");
INSERT INTO municipios VALUES("398","10","CAJIBIO");
INSERT INTO municipios VALUES("399","10","CALDONO");
INSERT INTO municipios VALUES("400","10","CALOTO");
INSERT INTO municipios VALUES("401","10","CORINTO");
INSERT INTO municipios VALUES("402","10","EL TAMBO");
INSERT INTO municipios VALUES("403","10","FLORENCIA");
INSERT INTO municipios VALUES("404","10","GUAPI");
INSERT INTO municipios VALUES("405","10","INZA");
INSERT INTO municipios VALUES("406","10","JAMBALÓ");
INSERT INTO municipios VALUES("407","10","LA SIERRA");
INSERT INTO municipios VALUES("408","10","LA VEGA");
INSERT INTO municipios VALUES("409","10","LÓPEZ");
INSERT INTO municipios VALUES("410","10","MERCADERES");
INSERT INTO municipios VALUES("411","10","MIRANDA");
INSERT INTO municipios VALUES("412","10","MORALES");
INSERT INTO municipios VALUES("413","10","PADILLA");
INSERT INTO municipios VALUES("414","10","PÁEZ");
INSERT INTO municipios VALUES("415","10","PATIA (EL BORDO)");
INSERT INTO municipios VALUES("416","10","PIAMONTE");
INSERT INTO municipios VALUES("417","10","PIENDAMO");
INSERT INTO municipios VALUES("418","10","POPAYÁN");
INSERT INTO municipios VALUES("419","10","PUERTO TEJADA");
INSERT INTO municipios VALUES("420","10","PURACE");
INSERT INTO municipios VALUES("421","10","ROSAS");
INSERT INTO municipios VALUES("422","10","SAN SEBASTIÁN");
INSERT INTO municipios VALUES("423","10","SANTA ROSA");
INSERT INTO municipios VALUES("424","10","SANTANDER DE QUILICHAO");
INSERT INTO municipios VALUES("425","10","SILVIA");
INSERT INTO municipios VALUES("426","10","SOTARA");
INSERT INTO municipios VALUES("427","10","SUÁREZ");
INSERT INTO municipios VALUES("428","10","SUCRE");
INSERT INTO municipios VALUES("429","10","TIMBÍO");
INSERT INTO municipios VALUES("430","10","TIMBIQUÍ");
INSERT INTO municipios VALUES("431","10","TORIBIO");
INSERT INTO municipios VALUES("432","10","TOTORO");
INSERT INTO municipios VALUES("433","10","VILLA RICA");
INSERT INTO municipios VALUES("434","11","AGUACHICA");
INSERT INTO municipios VALUES("435","11","AGUSTÍN CODAZZI");
INSERT INTO municipios VALUES("436","11","ASTREA");
INSERT INTO municipios VALUES("437","11","BECERRIL");
INSERT INTO municipios VALUES("438","11","BOSCONIA");
INSERT INTO municipios VALUES("439","11","CHIMICHAGUA");
INSERT INTO municipios VALUES("440","11","CHIRIGUANÁ");
INSERT INTO municipios VALUES("441","11","CURUMANÍ");
INSERT INTO municipios VALUES("442","11","EL COPEY");
INSERT INTO municipios VALUES("443","11","EL PASO");
INSERT INTO municipios VALUES("444","11","GAMARRA");
INSERT INTO municipios VALUES("445","11","GONZÁLEZ");
INSERT INTO municipios VALUES("446","11","LA GLORIA");
INSERT INTO municipios VALUES("447","11","LA JAGUA IBIRICO");
INSERT INTO municipios VALUES("448","11","MANAURE BALCÓN DEL CESAR");
INSERT INTO municipios VALUES("449","11","PAILITAS");
INSERT INTO municipios VALUES("450","11","PELAYA");
INSERT INTO municipios VALUES("451","11","PUEBLO BELLO");
INSERT INTO municipios VALUES("452","11","RÍO DE ORO");
INSERT INTO municipios VALUES("453","11","ROBLES (LA PAZ)");
INSERT INTO municipios VALUES("454","11","SAN ALBERTO");
INSERT INTO municipios VALUES("455","11","SAN DIEGO");
INSERT INTO municipios VALUES("456","11","SAN MARTÍN");
INSERT INTO municipios VALUES("457","11","TAMALAMEQUE");
INSERT INTO municipios VALUES("458","11","VALLEDUPAR");
INSERT INTO municipios VALUES("459","12","ACANDI");
INSERT INTO municipios VALUES("460","12","ALTO BAUDO (PIE DE PATO)");
INSERT INTO municipios VALUES("461","12","ATRATO");
INSERT INTO municipios VALUES("462","12","BAGADO");
INSERT INTO municipios VALUES("463","12","BAHIA SOLANO (MUTIS)");
INSERT INTO municipios VALUES("464","12","BAJO BAUDO (PIZARRO)");
INSERT INTO municipios VALUES("465","12","BOJAYA (BELLAVISTA)");
INSERT INTO municipios VALUES("466","12","CANTON DE SAN PABLO");
INSERT INTO municipios VALUES("467","12","CARMEN DEL DARIEN");
INSERT INTO municipios VALUES("468","12","CERTEGUI");
INSERT INTO municipios VALUES("469","12","CONDOTO");
INSERT INTO municipios VALUES("470","12","EL CARMEN");
INSERT INTO municipios VALUES("471","12","ISTMINA");
INSERT INTO municipios VALUES("472","12","JURADO");
INSERT INTO municipios VALUES("473","12","LITORAL DEL SAN JUAN");
INSERT INTO municipios VALUES("474","12","LLORO");
INSERT INTO municipios VALUES("475","12","MEDIO ATRATO");
INSERT INTO municipios VALUES("476","12","MEDIO BAUDO (BOCA DE PEPE)");
INSERT INTO municipios VALUES("477","12","MEDIO SAN JUAN");
INSERT INTO municipios VALUES("478","12","NOVITA");
INSERT INTO municipios VALUES("479","12","NUQUI");
INSERT INTO municipios VALUES("480","12","QUIBDO");
INSERT INTO municipios VALUES("481","12","RIO IRO");
INSERT INTO municipios VALUES("482","12","RIO QUITO");
INSERT INTO municipios VALUES("483","12","RIOSUCIO");
INSERT INTO municipios VALUES("484","12","SAN JOSE DEL PALMAR");
INSERT INTO municipios VALUES("485","12","SIPI");
INSERT INTO municipios VALUES("486","12","TADO");
INSERT INTO municipios VALUES("487","12","UNGUIA");
INSERT INTO municipios VALUES("488","12","UNIÓN PANAMERICANA");
INSERT INTO municipios VALUES("489","13","AYAPEL");
INSERT INTO municipios VALUES("490","13","BUENAVISTA");
INSERT INTO municipios VALUES("491","13","CANALETE");
INSERT INTO municipios VALUES("492","13","CERETÉ");
INSERT INTO municipios VALUES("493","13","CHIMA");
INSERT INTO municipios VALUES("494","13","CHINÚ");
INSERT INTO municipios VALUES("495","13","CIENAGA DE ORO");
INSERT INTO municipios VALUES("496","13","COTORRA");
INSERT INTO municipios VALUES("497","13","LA APARTADA");
INSERT INTO municipios VALUES("498","13","LORICA");
INSERT INTO municipios VALUES("499","13","LOS CÓRDOBAS");
INSERT INTO municipios VALUES("500","13","MOMIL");
INSERT INTO municipios VALUES("501","13","MONTELÍBANO");
INSERT INTO municipios VALUES("502","13","MONTERÍA");
INSERT INTO municipios VALUES("503","13","MOÑITOS");
INSERT INTO municipios VALUES("504","13","PLANETA RICA");
INSERT INTO municipios VALUES("505","13","PUEBLO NUEVO");
INSERT INTO municipios VALUES("506","13","PUERTO ESCONDIDO");
INSERT INTO municipios VALUES("507","13","PUERTO LIBERTADOR");
INSERT INTO municipios VALUES("508","13","PURÍSIMA");
INSERT INTO municipios VALUES("509","13","SAHAGÚN");
INSERT INTO municipios VALUES("510","13","SAN ANDRÉS SOTAVENTO");
INSERT INTO municipios VALUES("511","13","SAN ANTERO");
INSERT INTO municipios VALUES("512","13","SAN BERNARDO VIENTO");
INSERT INTO municipios VALUES("513","13","SAN CARLOS");
INSERT INTO municipios VALUES("514","13","SAN PELAYO");
INSERT INTO municipios VALUES("515","13","TIERRALTA");
INSERT INTO municipios VALUES("516","13","VALENCIA");
INSERT INTO municipios VALUES("517","14","AGUA DE DIOS");
INSERT INTO municipios VALUES("518","14","ALBAN");
INSERT INTO municipios VALUES("519","14","ANAPOIMA");
INSERT INTO municipios VALUES("520","14","ANOLAIMA");
INSERT INTO municipios VALUES("521","14","ARBELAEZ");
INSERT INTO municipios VALUES("522","14","BELTRÁN");
INSERT INTO municipios VALUES("523","14","BITUIMA");
INSERT INTO municipios VALUES("524","14","BOGOTÁ DC");
INSERT INTO municipios VALUES("525","14","BOJACÁ");
INSERT INTO municipios VALUES("526","14","CABRERA");
INSERT INTO municipios VALUES("527","14","CACHIPAY");
INSERT INTO municipios VALUES("528","14","CAJICÁ");
INSERT INTO municipios VALUES("529","14","CAPARRAPÍ");
INSERT INTO municipios VALUES("530","14","CAQUEZA");
INSERT INTO municipios VALUES("531","14","CARMEN DE CARUPA");
INSERT INTO municipios VALUES("532","14","CHAGUANÍ");
INSERT INTO municipios VALUES("533","14","CHIA");
INSERT INTO municipios VALUES("534","14","CHIPAQUE");
INSERT INTO municipios VALUES("535","14","CHOACHÍ");
INSERT INTO municipios VALUES("536","14","CHOCONTÁ");
INSERT INTO municipios VALUES("537","14","COGUA");
INSERT INTO municipios VALUES("538","14","COTA");
INSERT INTO municipios VALUES("539","14","CUCUNUBÁ");
INSERT INTO municipios VALUES("540","14","EL COLEGIO");
INSERT INTO municipios VALUES("541","14","EL PEÑÓN");
INSERT INTO municipios VALUES("542","14","EL ROSAL1");
INSERT INTO municipios VALUES("543","14","FACATATIVA");
INSERT INTO municipios VALUES("544","14","FÓMEQUE");
INSERT INTO municipios VALUES("545","14","FOSCA");
INSERT INTO municipios VALUES("546","14","FUNZA");
INSERT INTO municipios VALUES("547","14","FÚQUENE");
INSERT INTO municipios VALUES("548","14","FUSAGASUGA");
INSERT INTO municipios VALUES("549","14","GACHALÁ");
INSERT INTO municipios VALUES("550","14","GACHANCIPÁ");
INSERT INTO municipios VALUES("551","14","GACHETA");
INSERT INTO municipios VALUES("552","14","GAMA");
INSERT INTO municipios VALUES("553","14","GIRARDOT");
INSERT INTO municipios VALUES("554","14","GRANADA2");
INSERT INTO municipios VALUES("555","14","GUACHETÁ");
INSERT INTO municipios VALUES("556","14","GUADUAS");
INSERT INTO municipios VALUES("557","14","GUASCA");
INSERT INTO municipios VALUES("558","14","GUATAQUÍ");
INSERT INTO municipios VALUES("559","14","GUATAVITA");
INSERT INTO municipios VALUES("560","14","GUAYABAL DE SIQUIMA");
INSERT INTO municipios VALUES("561","14","GUAYABETAL");
INSERT INTO municipios VALUES("562","14","GUTIÉRREZ");
INSERT INTO municipios VALUES("563","14","JERUSALÉN");
INSERT INTO municipios VALUES("564","14","JUNÍN");
INSERT INTO municipios VALUES("565","14","LA CALERA");
INSERT INTO municipios VALUES("566","14","LA MESA");
INSERT INTO municipios VALUES("567","14","LA PALMA");
INSERT INTO municipios VALUES("568","14","LA PEÑA");
INSERT INTO municipios VALUES("569","14","LA VEGA");
INSERT INTO municipios VALUES("570","14","LENGUAZAQUE");
INSERT INTO municipios VALUES("571","14","MACHETÁ");
INSERT INTO municipios VALUES("572","14","MADRID");
INSERT INTO municipios VALUES("573","14","MANTA");
INSERT INTO municipios VALUES("574","14","MEDINA");
INSERT INTO municipios VALUES("575","14","MOSQUERA");
INSERT INTO municipios VALUES("576","14","NARIÑO");
INSERT INTO municipios VALUES("577","14","NEMOCÓN");
INSERT INTO municipios VALUES("578","14","NILO");
INSERT INTO municipios VALUES("579","14","NIMAIMA");
INSERT INTO municipios VALUES("580","14","NOCAIMA");
INSERT INTO municipios VALUES("581","14","OSPINA PÉREZ");
INSERT INTO municipios VALUES("582","14","PACHO");
INSERT INTO municipios VALUES("583","14","PAIME");
INSERT INTO municipios VALUES("584","14","PANDI");
INSERT INTO municipios VALUES("585","14","PARATEBUENO");
INSERT INTO municipios VALUES("586","14","PASCA");
INSERT INTO municipios VALUES("587","14","PUERTO SALGAR");
INSERT INTO municipios VALUES("588","14","PULÍ");
INSERT INTO municipios VALUES("589","14","QUEBRADANEGRA");
INSERT INTO municipios VALUES("590","14","QUETAME");
INSERT INTO municipios VALUES("591","14","QUIPILE");
INSERT INTO municipios VALUES("592","14","RAFAEL REYES");
INSERT INTO municipios VALUES("593","14","RICAURTE");
INSERT INTO municipios VALUES("594","14","SAN  ANTONIO DEL  TEQUENDAMA");
INSERT INTO municipios VALUES("595","14","SAN BERNARDO");
INSERT INTO municipios VALUES("596","14","SAN CAYETANO");
INSERT INTO municipios VALUES("597","14","SAN FRANCISCO");
INSERT INTO municipios VALUES("598","14","SAN JUAN DE RIOSECO");
INSERT INTO municipios VALUES("599","14","SASAIMA");
INSERT INTO municipios VALUES("600","14","SESQUILÉ");
INSERT INTO municipios VALUES("601","14","SIBATÉ");
INSERT INTO municipios VALUES("602","14","SILVANIA");
INSERT INTO municipios VALUES("603","14","SIMIJACA");
INSERT INTO municipios VALUES("604","14","SOACHA");
INSERT INTO municipios VALUES("605","14","SOPO");
INSERT INTO municipios VALUES("606","14","SUBACHOQUE");
INSERT INTO municipios VALUES("607","14","SUESCA");
INSERT INTO municipios VALUES("608","14","SUPATÁ");
INSERT INTO municipios VALUES("609","14","SUSA");
INSERT INTO municipios VALUES("610","14","SUTATAUSA");
INSERT INTO municipios VALUES("611","14","TABIO");
INSERT INTO municipios VALUES("612","14","TAUSA");
INSERT INTO municipios VALUES("613","14","TENA");
INSERT INTO municipios VALUES("614","14","TENJO");
INSERT INTO municipios VALUES("615","14","TIBACUY");
INSERT INTO municipios VALUES("616","14","TIBIRITA");
INSERT INTO municipios VALUES("617","14","TOCAIMA");
INSERT INTO municipios VALUES("618","14","TOCANCIPÁ");
INSERT INTO municipios VALUES("619","14","TOPAIPÍ");
INSERT INTO municipios VALUES("620","14","UBALÁ");
INSERT INTO municipios VALUES("621","14","UBAQUE");
INSERT INTO municipios VALUES("622","14","UBATÉ");
INSERT INTO municipios VALUES("623","14","UNE");
INSERT INTO municipios VALUES("624","14","UTICA");
INSERT INTO municipios VALUES("625","14","VERGARA");
INSERT INTO municipios VALUES("626","14","VIANI");
INSERT INTO municipios VALUES("627","14","VILLA GOMEZ");
INSERT INTO municipios VALUES("628","14","VILLA PINZÓN");
INSERT INTO municipios VALUES("629","14","VILLETA");
INSERT INTO municipios VALUES("630","14","VIOTA");
INSERT INTO municipios VALUES("631","14","YACOPÍ");
INSERT INTO municipios VALUES("632","14","ZIPACÓN");
INSERT INTO municipios VALUES("633","14","ZIPAQUIRÁ");
INSERT INTO municipios VALUES("634","15","BARRANCO MINAS");
INSERT INTO municipios VALUES("635","15","CACAHUAL");
INSERT INTO municipios VALUES("636","15","INÍRIDA");
INSERT INTO municipios VALUES("637","15","LA GUADALUPE");
INSERT INTO municipios VALUES("638","15","MAPIRIPANA");
INSERT INTO municipios VALUES("639","15","MORICHAL");
INSERT INTO municipios VALUES("640","15","PANA PANA");
INSERT INTO municipios VALUES("641","15","PUERTO COLOMBIA");
INSERT INTO municipios VALUES("642","15","SAN FELIPE");
INSERT INTO municipios VALUES("643","16","CALAMAR");
INSERT INTO municipios VALUES("644","16","EL RETORNO");
INSERT INTO municipios VALUES("645","16","MIRAFLOREZ");
INSERT INTO municipios VALUES("646","16","SAN JOSÉ DEL GUAVIARE");
INSERT INTO municipios VALUES("647","17","ACEVEDO");
INSERT INTO municipios VALUES("648","17","AGRADO");
INSERT INTO municipios VALUES("649","17","AIPE");
INSERT INTO municipios VALUES("650","17","ALGECIRAS");
INSERT INTO municipios VALUES("651","17","ALTAMIRA");
INSERT INTO municipios VALUES("652","17","BARAYA");
INSERT INTO municipios VALUES("653","17","CAMPO ALEGRE");
INSERT INTO municipios VALUES("654","17","COLOMBIA");
INSERT INTO municipios VALUES("655","17","ELIAS");
INSERT INTO municipios VALUES("656","17","GARZÓN");
INSERT INTO municipios VALUES("657","17","GIGANTE");
INSERT INTO municipios VALUES("658","17","GUADALUPE");
INSERT INTO municipios VALUES("659","17","HOBO");
INSERT INTO municipios VALUES("660","17","IQUIRA");
INSERT INTO municipios VALUES("661","17","ISNOS");
INSERT INTO municipios VALUES("662","17","LA ARGENTINA");
INSERT INTO municipios VALUES("663","17","LA PLATA");
INSERT INTO municipios VALUES("664","17","NATAGA");
INSERT INTO municipios VALUES("665","17","NEIVA");
INSERT INTO municipios VALUES("666","17","OPORAPA");
INSERT INTO municipios VALUES("667","17","PAICOL");
INSERT INTO municipios VALUES("668","17","PALERMO");
INSERT INTO municipios VALUES("669","17","PALESTINA");
INSERT INTO municipios VALUES("670","17","PITAL");
INSERT INTO municipios VALUES("671","17","PITALITO");
INSERT INTO municipios VALUES("672","17","RIVERA");
INSERT INTO municipios VALUES("673","17","SALADO BLANCO");
INSERT INTO municipios VALUES("674","17","SAN AGUSTÍN");
INSERT INTO municipios VALUES("675","17","SANTA MARIA");
INSERT INTO municipios VALUES("676","17","SUAZA");
INSERT INTO municipios VALUES("677","17","TARQUI");
INSERT INTO municipios VALUES("678","17","TELLO");
INSERT INTO municipios VALUES("679","17","TERUEL");
INSERT INTO municipios VALUES("680","17","TESALIA");
INSERT INTO municipios VALUES("681","17","TIMANA");
INSERT INTO municipios VALUES("682","17","VILLAVIEJA");
INSERT INTO municipios VALUES("683","17","YAGUARA");
INSERT INTO municipios VALUES("684","18","ALBANIA");
INSERT INTO municipios VALUES("685","18","BARRANCAS");
INSERT INTO municipios VALUES("686","18","DIBULLA");
INSERT INTO municipios VALUES("687","18","DISTRACCIÓN");
INSERT INTO municipios VALUES("688","18","EL MOLINO");
INSERT INTO municipios VALUES("689","18","FONSECA");
INSERT INTO municipios VALUES("690","18","HATO NUEVO");
INSERT INTO municipios VALUES("691","18","LA JAGUA DEL PILAR");
INSERT INTO municipios VALUES("692","18","MAICAO");
INSERT INTO municipios VALUES("693","18","MANAURE");
INSERT INTO municipios VALUES("694","18","RIOHACHA");
INSERT INTO municipios VALUES("695","18","SAN JUAN DEL CESAR");
INSERT INTO municipios VALUES("696","18","URIBIA");
INSERT INTO municipios VALUES("697","18","URUMITA");
INSERT INTO municipios VALUES("698","18","VILLANUEVA");
INSERT INTO municipios VALUES("699","19","ALGARROBO");
INSERT INTO municipios VALUES("700","19","ARACATACA");
INSERT INTO municipios VALUES("701","19","ARIGUANI");
INSERT INTO municipios VALUES("702","19","CERRO SAN ANTONIO");
INSERT INTO municipios VALUES("703","19","CHIVOLO");
INSERT INTO municipios VALUES("704","19","CIENAGA");
INSERT INTO municipios VALUES("705","19","CONCORDIA");
INSERT INTO municipios VALUES("706","19","EL BANCO");
INSERT INTO municipios VALUES("707","19","EL PIÑON");
INSERT INTO municipios VALUES("708","19","EL RETEN");
INSERT INTO municipios VALUES("709","19","FUNDACION");
INSERT INTO municipios VALUES("710","19","GUAMAL");
INSERT INTO municipios VALUES("711","19","NUEVA GRANADA");
INSERT INTO municipios VALUES("712","19","PEDRAZA");
INSERT INTO municipios VALUES("713","19","PIJIÑO DEL CARMEN");
INSERT INTO municipios VALUES("714","19","PIVIJAY");
INSERT INTO municipios VALUES("715","19","PLATO");
INSERT INTO municipios VALUES("716","19","PUEBLO VIEJO");
INSERT INTO municipios VALUES("717","19","REMOLINO");
INSERT INTO municipios VALUES("718","19","SABANAS DE SAN ANGEL");
INSERT INTO municipios VALUES("719","19","SALAMINA");
INSERT INTO municipios VALUES("720","19","SAN SEBASTIAN DE BUENAVISTA");
INSERT INTO municipios VALUES("721","19","SAN ZENON");
INSERT INTO municipios VALUES("722","19","SANTA ANA");
INSERT INTO municipios VALUES("723","19","SANTA BARBARA DE PINTO");
INSERT INTO municipios VALUES("724","19","SANTA MARTA");
INSERT INTO municipios VALUES("725","19","SITIONUEVO");
INSERT INTO municipios VALUES("726","19","TENERIFE");
INSERT INTO municipios VALUES("727","19","ZAPAYAN");
INSERT INTO municipios VALUES("728","19","ZONA BANANERA");
INSERT INTO municipios VALUES("729","20","ACACIAS");
INSERT INTO municipios VALUES("730","20","BARRANCA DE UPIA");
INSERT INTO municipios VALUES("731","20","CABUYARO");
INSERT INTO municipios VALUES("732","20","CASTILLA LA NUEVA");
INSERT INTO municipios VALUES("733","20","CUBARRAL");
INSERT INTO municipios VALUES("734","20","CUMARAL");
INSERT INTO municipios VALUES("735","20","EL CALVARIO");
INSERT INTO municipios VALUES("736","20","EL CASTILLO");
INSERT INTO municipios VALUES("737","20","EL DORADO");
INSERT INTO municipios VALUES("738","20","FUENTE DE ORO");
INSERT INTO municipios VALUES("739","20","GRANADA");
INSERT INTO municipios VALUES("740","20","GUAMAL");
INSERT INTO municipios VALUES("741","20","LA MACARENA");
INSERT INTO municipios VALUES("742","20","LA URIBE");
INSERT INTO municipios VALUES("743","20","LEJANÍAS");
INSERT INTO municipios VALUES("744","20","MAPIRIPÁN");
INSERT INTO municipios VALUES("745","20","MESETAS");
INSERT INTO municipios VALUES("746","20","PUERTO CONCORDIA");
INSERT INTO municipios VALUES("747","20","PUERTO GAITÁN");
INSERT INTO municipios VALUES("748","20","PUERTO LLERAS");
INSERT INTO municipios VALUES("749","20","PUERTO LÓPEZ");
INSERT INTO municipios VALUES("750","20","PUERTO RICO");
INSERT INTO municipios VALUES("751","20","RESTREPO");
INSERT INTO municipios VALUES("752","20","SAN  JUAN DE ARAMA");
INSERT INTO municipios VALUES("753","20","SAN CARLOS GUAROA");
INSERT INTO municipios VALUES("754","20","SAN JUANITO");
INSERT INTO municipios VALUES("755","20","SAN MARTÍN");
INSERT INTO municipios VALUES("756","20","VILLAVICENCIO");
INSERT INTO municipios VALUES("757","20","VISTA HERMOSA");
INSERT INTO municipios VALUES("758","21","ALBAN");
INSERT INTO municipios VALUES("759","21","ALDAÑA");
INSERT INTO municipios VALUES("760","21","ANCUYA");
INSERT INTO municipios VALUES("761","21","ARBOLEDA");
INSERT INTO municipios VALUES("762","21","BARBACOAS");
INSERT INTO municipios VALUES("763","21","BELEN");
INSERT INTO municipios VALUES("764","21","BUESACO");
INSERT INTO municipios VALUES("765","21","CHACHAGUI");
INSERT INTO municipios VALUES("766","21","COLON (GENOVA)");
INSERT INTO municipios VALUES("767","21","CONSACA");
INSERT INTO municipios VALUES("768","21","CONTADERO");
INSERT INTO municipios VALUES("769","21","CORDOBA");
INSERT INTO municipios VALUES("770","21","CUASPUD");
INSERT INTO municipios VALUES("771","21","CUMBAL");
INSERT INTO municipios VALUES("772","21","CUMBITARA");
INSERT INTO municipios VALUES("773","21","EL CHARCO");
INSERT INTO municipios VALUES("774","21","EL PEÑOL");
INSERT INTO municipios VALUES("775","21","EL ROSARIO");
INSERT INTO municipios VALUES("776","21","EL TABLÓN");
INSERT INTO municipios VALUES("777","21","EL TAMBO");
INSERT INTO municipios VALUES("778","21","FUNES");
INSERT INTO municipios VALUES("779","21","GUACHUCAL");
INSERT INTO municipios VALUES("780","21","GUAITARILLA");
INSERT INTO municipios VALUES("781","21","GUALMATAN");
INSERT INTO municipios VALUES("782","21","ILES");
INSERT INTO municipios VALUES("783","21","IMUES");
INSERT INTO municipios VALUES("784","21","IPIALES");
INSERT INTO municipios VALUES("785","21","LA CRUZ");
INSERT INTO municipios VALUES("786","21","LA FLORIDA");
INSERT INTO municipios VALUES("787","21","LA LLANADA");
INSERT INTO municipios VALUES("788","21","LA TOLA");
INSERT INTO municipios VALUES("789","21","LA UNION");
INSERT INTO municipios VALUES("790","21","LEIVA");
INSERT INTO municipios VALUES("791","21","LINARES");
INSERT INTO municipios VALUES("792","21","LOS ANDES");
INSERT INTO municipios VALUES("793","21","MAGUI");
INSERT INTO municipios VALUES("794","21","MALLAMA");
INSERT INTO municipios VALUES("795","21","MOSQUEZA");
INSERT INTO municipios VALUES("796","21","NARIÑO");
INSERT INTO municipios VALUES("797","21","OLAYA HERRERA");
INSERT INTO municipios VALUES("798","21","OSPINA");
INSERT INTO municipios VALUES("799","21","PASTO");
INSERT INTO municipios VALUES("800","21","PIZARRO");
INSERT INTO municipios VALUES("801","21","POLICARPA");
INSERT INTO municipios VALUES("802","21","POTOSI");
INSERT INTO municipios VALUES("803","21","PROVIDENCIA");
INSERT INTO municipios VALUES("804","21","PUERRES");
INSERT INTO municipios VALUES("805","21","PUPIALES");
INSERT INTO municipios VALUES("806","21","RICAURTE");
INSERT INTO municipios VALUES("807","21","ROBERTO PAYAN");
INSERT INTO municipios VALUES("808","21","SAMANIEGO");
INSERT INTO municipios VALUES("809","21","SAN BERNARDO");
INSERT INTO municipios VALUES("810","21","SAN LORENZO");
INSERT INTO municipios VALUES("811","21","SAN PABLO");
INSERT INTO municipios VALUES("812","21","SAN PEDRO DE CARTAGO");
INSERT INTO municipios VALUES("813","21","SANDONA");
INSERT INTO municipios VALUES("814","21","SANTA BARBARA");
INSERT INTO municipios VALUES("815","21","SANTACRUZ");
INSERT INTO municipios VALUES("816","21","SAPUYES");
INSERT INTO municipios VALUES("817","21","TAMINANGO");
INSERT INTO municipios VALUES("818","21","TANGUA");
INSERT INTO municipios VALUES("819","21","TUMACO");
INSERT INTO municipios VALUES("820","21","TUQUERRES");
INSERT INTO municipios VALUES("821","21","YACUANQUER");
INSERT INTO municipios VALUES("822","22","ABREGO");
INSERT INTO municipios VALUES("823","22","ARBOLEDAS");
INSERT INTO municipios VALUES("824","22","BOCHALEMA");
INSERT INTO municipios VALUES("825","22","BUCARASICA");
INSERT INTO municipios VALUES("826","22","CÁCHIRA");
INSERT INTO municipios VALUES("827","22","CÁCOTA");
INSERT INTO municipios VALUES("828","22","CHINÁCOTA");
INSERT INTO municipios VALUES("829","22","CHITAGÁ");
INSERT INTO municipios VALUES("830","22","CONVENCIÓN");
INSERT INTO municipios VALUES("831","22","CÚCUTA");
INSERT INTO municipios VALUES("832","22","CUCUTILLA");
INSERT INTO municipios VALUES("833","22","DURANIA");
INSERT INTO municipios VALUES("834","22","EL CARMEN");
INSERT INTO municipios VALUES("835","22","EL TARRA");
INSERT INTO municipios VALUES("836","22","EL ZULIA");
INSERT INTO municipios VALUES("837","22","GRAMALOTE");
INSERT INTO municipios VALUES("838","22","HACARI");
INSERT INTO municipios VALUES("839","22","HERRÁN");
INSERT INTO municipios VALUES("840","22","LA ESPERANZA");
INSERT INTO municipios VALUES("841","22","LA PLAYA");
INSERT INTO municipios VALUES("842","22","LABATECA");
INSERT INTO municipios VALUES("843","22","LOS PATIOS");
INSERT INTO municipios VALUES("844","22","LOURDES");
INSERT INTO municipios VALUES("845","22","MUTISCUA");
INSERT INTO municipios VALUES("846","22","OCAÑA");
INSERT INTO municipios VALUES("847","22","PAMPLONA");
INSERT INTO municipios VALUES("848","22","PAMPLONITA");
INSERT INTO municipios VALUES("849","22","PUERTO SANTANDER");
INSERT INTO municipios VALUES("850","22","RAGONVALIA");
INSERT INTO municipios VALUES("851","22","SALAZAR");
INSERT INTO municipios VALUES("852","22","SAN CALIXTO");
INSERT INTO municipios VALUES("853","22","SAN CAYETANO");
INSERT INTO municipios VALUES("854","22","SANTIAGO");
INSERT INTO municipios VALUES("855","22","SARDINATA");
INSERT INTO municipios VALUES("856","22","SILOS");
INSERT INTO municipios VALUES("857","22","TEORAMA");
INSERT INTO municipios VALUES("858","22","TIBÚ");
INSERT INTO municipios VALUES("859","22","TOLEDO");
INSERT INTO municipios VALUES("860","22","VILLA CARO");
INSERT INTO municipios VALUES("861","22","VILLA DEL ROSARIO");
INSERT INTO municipios VALUES("862","23","COLÓN");
INSERT INTO municipios VALUES("863","23","MOCOA");
INSERT INTO municipios VALUES("864","23","ORITO");
INSERT INTO municipios VALUES("865","23","PUERTO ASÍS");
INSERT INTO municipios VALUES("866","23","PUERTO CAYCEDO");
INSERT INTO municipios VALUES("867","23","PUERTO GUZMÁN");
INSERT INTO municipios VALUES("868","23","PUERTO LEGUÍZAMO");
INSERT INTO municipios VALUES("869","23","SAN FRANCISCO");
INSERT INTO municipios VALUES("870","23","SAN MIGUEL");
INSERT INTO municipios VALUES("871","23","SANTIAGO");
INSERT INTO municipios VALUES("872","23","SIBUNDOY");
INSERT INTO municipios VALUES("873","23","VALLE DEL GUAMUEZ");
INSERT INTO municipios VALUES("874","23","VILLAGARZÓN");
INSERT INTO municipios VALUES("875","24","ARMENIA");
INSERT INTO municipios VALUES("876","24","BUENAVISTA");
INSERT INTO municipios VALUES("877","24","CALARCÁ");
INSERT INTO municipios VALUES("878","24","CIRCASIA");
INSERT INTO municipios VALUES("879","24","CÓRDOBA");
INSERT INTO municipios VALUES("880","24","FILANDIA");
INSERT INTO municipios VALUES("881","24","GÉNOVA");
INSERT INTO municipios VALUES("882","24","LA TEBAIDA");
INSERT INTO municipios VALUES("883","24","MONTENEGRO");
INSERT INTO municipios VALUES("884","24","PIJAO");
INSERT INTO municipios VALUES("885","24","QUIMBAYA");
INSERT INTO municipios VALUES("886","24","SALENTO");
INSERT INTO municipios VALUES("887","25","APIA");
INSERT INTO municipios VALUES("888","25","BALBOA");
INSERT INTO municipios VALUES("889","25","BELÉN DE UMBRÍA");
INSERT INTO municipios VALUES("890","25","DOS QUEBRADAS");
INSERT INTO municipios VALUES("891","25","GUATICA");
INSERT INTO municipios VALUES("892","25","LA CELIA");
INSERT INTO municipios VALUES("893","25","LA VIRGINIA");
INSERT INTO municipios VALUES("894","25","MARSELLA");
INSERT INTO municipios VALUES("895","25","MISTRATO");
INSERT INTO municipios VALUES("896","25","PEREIRA");
INSERT INTO municipios VALUES("897","25","PUEBLO RICO");
INSERT INTO municipios VALUES("898","25","QUINCHÍA");
INSERT INTO municipios VALUES("899","25","SANTA ROSA DE CABAL");
INSERT INTO municipios VALUES("900","25","SANTUARIO");
INSERT INTO municipios VALUES("901","26","PROVIDENCIA");
INSERT INTO municipios VALUES("902","26","SAN ANDRES");
INSERT INTO municipios VALUES("903","26","SANTA CATALINA");
INSERT INTO municipios VALUES("904","27","AGUADA");
INSERT INTO municipios VALUES("905","27","ALBANIA");
INSERT INTO municipios VALUES("906","27","ARATOCA");
INSERT INTO municipios VALUES("907","27","BARBOSA");
INSERT INTO municipios VALUES("908","27","BARICHARA");
INSERT INTO municipios VALUES("909","27","BARRANCABERMEJA");
INSERT INTO municipios VALUES("910","27","BETULIA");
INSERT INTO municipios VALUES("911","27","BOLÍVAR");
INSERT INTO municipios VALUES("912","27","BUCARAMANGA");
INSERT INTO municipios VALUES("913","27","CABRERA");
INSERT INTO municipios VALUES("914","27","CALIFORNIA");
INSERT INTO municipios VALUES("915","27","CAPITANEJO");
INSERT INTO municipios VALUES("916","27","CARCASI");
INSERT INTO municipios VALUES("917","27","CEPITA");
INSERT INTO municipios VALUES("918","27","CERRITO");
INSERT INTO municipios VALUES("919","27","CHARALÁ");
INSERT INTO municipios VALUES("920","27","CHARTA");
INSERT INTO municipios VALUES("921","27","CHIMA");
INSERT INTO municipios VALUES("922","27","CHIPATÁ");
INSERT INTO municipios VALUES("923","27","CIMITARRA");
INSERT INTO municipios VALUES("924","27","CONCEPCIÓN");
INSERT INTO municipios VALUES("925","27","CONFINES");
INSERT INTO municipios VALUES("926","27","CONTRATACIÓN");
INSERT INTO municipios VALUES("927","27","COROMORO");
INSERT INTO municipios VALUES("928","27","CURITÍ");
INSERT INTO municipios VALUES("929","27","EL CARMEN");
INSERT INTO municipios VALUES("930","27","EL GUACAMAYO");
INSERT INTO municipios VALUES("931","27","EL PEÑÓN");
INSERT INTO municipios VALUES("932","27","EL PLAYÓN");
INSERT INTO municipios VALUES("933","27","ENCINO");
INSERT INTO municipios VALUES("934","27","ENCISO");
INSERT INTO municipios VALUES("935","27","FLORIÁN");
INSERT INTO municipios VALUES("936","27","FLORIDABLANCA");
INSERT INTO municipios VALUES("937","27","GALÁN");
INSERT INTO municipios VALUES("938","27","GAMBITA");
INSERT INTO municipios VALUES("939","27","GIRÓN");
INSERT INTO municipios VALUES("940","27","GUACA");
INSERT INTO municipios VALUES("941","27","GUADALUPE");
INSERT INTO municipios VALUES("942","27","GUAPOTA");
INSERT INTO municipios VALUES("943","27","GUAVATÁ");
INSERT INTO municipios VALUES("944","27","GUEPSA");
INSERT INTO municipios VALUES("945","27","HATO");
INSERT INTO municipios VALUES("946","27","JESÚS MARIA");
INSERT INTO municipios VALUES("947","27","JORDÁN");
INSERT INTO municipios VALUES("948","27","LA BELLEZA");
INSERT INTO municipios VALUES("949","27","LA PAZ");
INSERT INTO municipios VALUES("950","27","LANDAZURI");
INSERT INTO municipios VALUES("951","27","LEBRIJA");
INSERT INTO municipios VALUES("952","27","LOS SANTOS");
INSERT INTO municipios VALUES("953","27","MACARAVITA");
INSERT INTO municipios VALUES("954","27","MÁLAGA");
INSERT INTO municipios VALUES("955","27","MATANZA");
INSERT INTO municipios VALUES("956","27","MOGOTES");
INSERT INTO municipios VALUES("957","27","MOLAGAVITA");
INSERT INTO municipios VALUES("958","27","OCAMONTE");
INSERT INTO municipios VALUES("959","27","OIBA");
INSERT INTO municipios VALUES("960","27","ONZAGA");
INSERT INTO municipios VALUES("961","27","PALMAR");
INSERT INTO municipios VALUES("962","27","PALMAS DEL SOCORRO");
INSERT INTO municipios VALUES("963","27","PÁRAMO");
INSERT INTO municipios VALUES("964","27","PIEDECUESTA");
INSERT INTO municipios VALUES("965","27","PINCHOTE");
INSERT INTO municipios VALUES("966","27","PUENTE NACIONAL");
INSERT INTO municipios VALUES("967","27","PUERTO PARRA");
INSERT INTO municipios VALUES("968","27","PUERTO WILCHES");
INSERT INTO municipios VALUES("969","27","RIONEGRO");
INSERT INTO municipios VALUES("970","27","SABANA DE TORRES");
INSERT INTO municipios VALUES("971","27","SAN ANDRÉS");
INSERT INTO municipios VALUES("972","27","SAN BENITO");
INSERT INTO municipios VALUES("973","27","SAN GIL");
INSERT INTO municipios VALUES("974","27","SAN JOAQUÍN");
INSERT INTO municipios VALUES("975","27","SAN JOSÉ DE MIRANDA");
INSERT INTO municipios VALUES("976","27","SAN MIGUEL");
INSERT INTO municipios VALUES("977","27","SAN VICENTE DE CHUCURÍ");
INSERT INTO municipios VALUES("978","27","SANTA BÁRBARA");
INSERT INTO municipios VALUES("979","27","SANTA HELENA");
INSERT INTO municipios VALUES("980","27","SIMACOTA");
INSERT INTO municipios VALUES("981","27","SOCORRO");
INSERT INTO municipios VALUES("982","27","SUAITA");
INSERT INTO municipios VALUES("983","27","SUCRE");
INSERT INTO municipios VALUES("984","27","SURATA");
INSERT INTO municipios VALUES("985","27","TONA");
INSERT INTO municipios VALUES("986","27","VALLE SAN JOSÉ");
INSERT INTO municipios VALUES("987","27","VÉLEZ");
INSERT INTO municipios VALUES("988","27","VETAS");
INSERT INTO municipios VALUES("989","27","VILLANUEVA");
INSERT INTO municipios VALUES("990","27","ZAPATOCA");
INSERT INTO municipios VALUES("991","28","BUENAVISTA");
INSERT INTO municipios VALUES("992","28","CAIMITO");
INSERT INTO municipios VALUES("993","28","CHALÁN");
INSERT INTO municipios VALUES("994","28","COLOSO");
INSERT INTO municipios VALUES("995","28","COROZAL");
INSERT INTO municipios VALUES("996","28","EL ROBLE");
INSERT INTO municipios VALUES("997","28","GALERAS");
INSERT INTO municipios VALUES("998","28","GUARANDA");
INSERT INTO municipios VALUES("999","28","LA UNIÓN");
INSERT INTO municipios VALUES("1000","28","LOS PALMITOS");
INSERT INTO municipios VALUES("1001","28","MAJAGUAL");
INSERT INTO municipios VALUES("1002","28","MORROA");
INSERT INTO municipios VALUES("1003","28","OVEJAS");
INSERT INTO municipios VALUES("1004","28","PALMITO");
INSERT INTO municipios VALUES("1005","28","SAMPUES");
INSERT INTO municipios VALUES("1006","28","SAN BENITO ABAD");
INSERT INTO municipios VALUES("1007","28","SAN JUAN DE BETULIA");
INSERT INTO municipios VALUES("1008","28","SAN MARCOS");
INSERT INTO municipios VALUES("1009","28","SAN ONOFRE");
INSERT INTO municipios VALUES("1010","28","SAN PEDRO");
INSERT INTO municipios VALUES("1011","28","SINCÉ");
INSERT INTO municipios VALUES("1012","28","SINCELEJO");
INSERT INTO municipios VALUES("1013","28","SUCRE");
INSERT INTO municipios VALUES("1014","28","TOLÚ");
INSERT INTO municipios VALUES("1015","28","TOLUVIEJO");
INSERT INTO municipios VALUES("1016","29","ALPUJARRA");
INSERT INTO municipios VALUES("1017","29","ALVARADO");
INSERT INTO municipios VALUES("1018","29","AMBALEMA");
INSERT INTO municipios VALUES("1019","29","ANZOATEGUI");
INSERT INTO municipios VALUES("1020","29","ARMERO (GUAYABAL)");
INSERT INTO municipios VALUES("1021","29","ATACO");
INSERT INTO municipios VALUES("1022","29","CAJAMARCA");
INSERT INTO municipios VALUES("1023","29","CARMEN DE APICALÁ");
INSERT INTO municipios VALUES("1024","29","CASABIANCA");
INSERT INTO municipios VALUES("1025","29","CHAPARRAL");
INSERT INTO municipios VALUES("1026","29","COELLO");
INSERT INTO municipios VALUES("1027","29","COYAIMA");
INSERT INTO municipios VALUES("1028","29","CUNDAY");
INSERT INTO municipios VALUES("1029","29","DOLORES");
INSERT INTO municipios VALUES("1030","29","ESPINAL");
INSERT INTO municipios VALUES("1031","29","FALÁN");
INSERT INTO municipios VALUES("1032","29","FLANDES");
INSERT INTO municipios VALUES("1033","29","FRESNO");
INSERT INTO municipios VALUES("1034","29","GUAMO");
INSERT INTO municipios VALUES("1035","29","HERVEO");
INSERT INTO municipios VALUES("1036","29","HONDA");
INSERT INTO municipios VALUES("1037","29","IBAGUE");
INSERT INTO municipios VALUES("1038","29","ICONONZO");
INSERT INTO municipios VALUES("1039","29","LÉRIDA");
INSERT INTO municipios VALUES("1040","29","LÍBANO");
INSERT INTO municipios VALUES("1041","29","MARIQUITA");
INSERT INTO municipios VALUES("1042","29","MELGAR");
INSERT INTO municipios VALUES("1043","29","MURILLO");
INSERT INTO municipios VALUES("1044","29","NATAGAIMA");
INSERT INTO municipios VALUES("1045","29","ORTEGA");
INSERT INTO municipios VALUES("1046","29","PALOCABILDO");
INSERT INTO municipios VALUES("1047","29","PIEDRAS PLANADAS");
INSERT INTO municipios VALUES("1048","29","PRADO");
INSERT INTO municipios VALUES("1049","29","PURIFICACIÓN");
INSERT INTO municipios VALUES("1050","29","RIOBLANCO");
INSERT INTO municipios VALUES("1051","29","RONCESVALLES");
INSERT INTO municipios VALUES("1052","29","ROVIRA");
INSERT INTO municipios VALUES("1053","29","SALDAÑA");
INSERT INTO municipios VALUES("1054","29","SAN ANTONIO");
INSERT INTO municipios VALUES("1055","29","SAN LUIS");
INSERT INTO municipios VALUES("1056","29","SANTA ISABEL");
INSERT INTO municipios VALUES("1057","29","SUÁREZ");
INSERT INTO municipios VALUES("1058","29","VALLE DE SAN JUAN");
INSERT INTO municipios VALUES("1059","29","VENADILLO");
INSERT INTO municipios VALUES("1060","29","VILLAHERMOSA");
INSERT INTO municipios VALUES("1061","29","VILLARRICA");
INSERT INTO municipios VALUES("1062","30","ALCALÁ");
INSERT INTO municipios VALUES("1063","30","ANDALUCÍA");
INSERT INTO municipios VALUES("1064","30","ANSERMA NUEVO");
INSERT INTO municipios VALUES("1065","30","ARGELIA");
INSERT INTO municipios VALUES("1066","30","BOLÍVAR");
INSERT INTO municipios VALUES("1067","30","BUENAVENTURA");
INSERT INTO municipios VALUES("1068","30","BUGA");
INSERT INTO municipios VALUES("1069","30","BUGALAGRANDE");
INSERT INTO municipios VALUES("1070","30","CAICEDONIA");
INSERT INTO municipios VALUES("1071","30","CALI");
INSERT INTO municipios VALUES("1072","30","CALIMA (DARIEN)");
INSERT INTO municipios VALUES("1073","30","CANDELARIA");
INSERT INTO municipios VALUES("1074","30","CARTAGO");
INSERT INTO municipios VALUES("1075","30","DAGUA");
INSERT INTO municipios VALUES("1076","30","EL AGUILA");
INSERT INTO municipios VALUES("1077","30","EL CAIRO");
INSERT INTO municipios VALUES("1078","30","EL CERRITO");
INSERT INTO municipios VALUES("1079","30","EL DOVIO");
INSERT INTO municipios VALUES("1080","30","FLORIDA");
INSERT INTO municipios VALUES("1081","30","GINEBRA GUACARI");
INSERT INTO municipios VALUES("1082","30","JAMUNDÍ");
INSERT INTO municipios VALUES("1083","30","LA CUMBRE");
INSERT INTO municipios VALUES("1084","30","LA UNIÓN");
INSERT INTO municipios VALUES("1085","30","LA VICTORIA");
INSERT INTO municipios VALUES("1086","30","OBANDO");
INSERT INTO municipios VALUES("1087","30","PALMIRA");
INSERT INTO municipios VALUES("1088","30","PRADERA");
INSERT INTO municipios VALUES("1089","30","RESTREPO");
INSERT INTO municipios VALUES("1090","30","RIO FRÍO");
INSERT INTO municipios VALUES("1091","30","ROLDANILLO");
INSERT INTO municipios VALUES("1092","30","SAN PEDRO");
INSERT INTO municipios VALUES("1093","30","SEVILLA");
INSERT INTO municipios VALUES("1094","30","TORO");
INSERT INTO municipios VALUES("1095","30","TRUJILLO");
INSERT INTO municipios VALUES("1096","30","TULÚA");
INSERT INTO municipios VALUES("1097","30","ULLOA");
INSERT INTO municipios VALUES("1098","30","VERSALLES");
INSERT INTO municipios VALUES("1099","30","VIJES");
INSERT INTO municipios VALUES("1100","30","YOTOCO");
INSERT INTO municipios VALUES("1101","30","YUMBO");
INSERT INTO municipios VALUES("1102","30","ZARZAL");
INSERT INTO municipios VALUES("1103","31","CARURÚ");
INSERT INTO municipios VALUES("1104","31","MITÚ");
INSERT INTO municipios VALUES("1105","31","PACOA");
INSERT INTO municipios VALUES("1106","31","PAPUNAUA");
INSERT INTO municipios VALUES("1107","31","TARAIRA");
INSERT INTO municipios VALUES("1108","31","YAVARATÉ");
INSERT INTO municipios VALUES("1109","32","CUMARIBO");
INSERT INTO municipios VALUES("1110","32","LA PRIMAVERA");
INSERT INTO municipios VALUES("1111","32","PUERTO CARREÑO");
INSERT INTO municipios VALUES("1112","32","SANTA ROSALIA");
INSERT INTO municipios VALUES("1113","12","ALEXIS");
INSERT INTO municipios VALUES("1114","12","ALEXISS");



DROP TABLE IF EXISTS programa_ficha;

CREATE TABLE `programa_ficha` (
  `id_Programa_Ficha` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_Programa` bigint(20) NOT NULL,
  `id_Ficha` bigint(20) NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Fecha_Fin` date NOT NULL,
  `Matriculados` int(11) NOT NULL,
  `Graduados` int(11) NOT NULL,
  PRIMARY KEY (`id_Programa_Ficha`),
  KEY `id_Programa` (`id_Programa`,`id_Ficha`),
  KEY `id_Ficha` (`id_Ficha`),
  CONSTRAINT `programa_ficha_ibfk_1` FOREIGN KEY (`id_Programa`) REFERENCES `programas` (`id_Programa`) ON UPDATE NO ACTION,
  CONSTRAINT `programa_ficha_ibfk_2` FOREIGN KEY (`id_Ficha`) REFERENCES `fichas` (`id_Ficha`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO programa_ficha VALUES("1","1","1","2016-01-25","2018-01-25","30","18");
INSERT INTO programa_ficha VALUES("2","2","2","2018-01-25","2018-01-31","20","1");



DROP TABLE IF EXISTS programas;

CREATE TABLE `programas` (
  `id_Programa` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_Programa` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_Tipo_Programa` bigint(20) NOT NULL,
  `duracion` int(11) NOT NULL,
  `id_Usuario` bigint(20) NOT NULL,
  PRIMARY KEY (`id_Programa`),
  KEY `id_Usuario` (`id_Usuario`),
  KEY `id_Tipo_Programa` (`id_Tipo_Programa`),
  CONSTRAINT `programas_ibfk_1` FOREIGN KEY (`id_Tipo_Programa`) REFERENCES `tipo_programa` (`Id_Tipo_Programa`) ON UPDATE CASCADE,
  CONSTRAINT `programas_ibfk_2` FOREIGN KEY (`id_Usuario`) REFERENCES `usuarios` (`id_Usuario`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO programas VALUES("1","ADSI","2","24","1");
INSERT INTO programas VALUES("2","GESTIÃ“N DE EMPRESAS","2","15","1");
INSERT INTO programas VALUES("3","ADMIN","1","12","1");
INSERT INTO programas VALUES("4","ASDASD","2","51651","1");
INSERT INTO programas VALUES("5","RWWRWER","2","546456","1");
INSERT INTO programas VALUES("6","DFGSDGSG","1","45645","1");
INSERT INTO programas VALUES("7","DASDASDAS","1","323423","1");
INSERT INTO programas VALUES("8","WERWER","2","2147483647","1");
INSERT INTO programas VALUES("9","COSINAR COMIDA ","3","12","1");



DROP TABLE IF EXISTS situacion;

CREATE TABLE `situacion` (
  `Id_Situacion` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre_Situacion` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Situacion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO situacion VALUES("1","DESEMPLEADODSD");
INSERT INTO situacion VALUES("2","EMPLEADO");
INSERT INTO situacion VALUES("3","ESTUDIANDO");
INSERT INTO situacion VALUES("4","CASADO");
INSERT INTO situacion VALUES("5","ASDASDASDASDASD");
INSERT INTO situacion VALUES("6","HOLA GILIPOLLA");



DROP TABLE IF EXISTS tipo_etapa_practica;

CREATE TABLE `tipo_etapa_practica` (
  `Id_Tipo_Etapa_Practica` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre_Etapa` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_Tipo_Etapa_Practica`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO tipo_etapa_practica VALUES("1","CONTRATO APRENDIZAJE");
INSERT INTO tipo_etapa_practica VALUES("2","PASANTIAS");
INSERT INTO tipo_etapa_practica VALUES("3","VINCULO LABORAL");
INSERT INTO tipo_etapa_practica VALUES("4","APOYO A UNIDAD FAMILIAR");
INSERT INTO tipo_etapa_practica VALUES("5","PROYECTO PRODUCTIVO");
INSERT INTO tipo_etapa_practica VALUES("6","MONITORIAS");



DROP TABLE IF EXISTS tipo_programa;

CREATE TABLE `tipo_programa` (
  `Id_Tipo_Programa` bigint(20) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(15) NOT NULL,
  PRIMARY KEY (`Id_Tipo_Programa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tipo_programa VALUES("1","TECNICO");
INSERT INTO tipo_programa VALUES("2","TECNOLOGO");
INSERT INTO tipo_programa VALUES("3","ESPECIALIZACION");



DROP TABLE IF EXISTS trabajando_egresado;

CREATE TABLE `trabajando_egresado` (
  `Id_Trabajando_Egresado` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_Egresado` bigint(20) NOT NULL,
  `id_Empresa` bigint(20) NOT NULL,
  `Funcion_Desempena` varchar(50) NOT NULL,
  `Funcion_Relacion_Programa` varchar(2) NOT NULL,
  `Salario` int(11) NOT NULL,
  `Intensidad_Horaria` varchar(20) NOT NULL,
  `Ultima_Actualizacion` datetime NOT NULL,
  PRIMARY KEY (`Id_Trabajando_Egresado`),
  KEY `id_Egresado` (`id_Egresado`),
  KEY `id_Empresa` (`id_Empresa`),
  CONSTRAINT `trabajando_egresado_ibfk_1` FOREIGN KEY (`id_Empresa`) REFERENCES `empresa` (`id_Empresa`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO trabajando_egresado VALUES("1","1","1","JEFE","Si","123123","Medio","2017-12-27 14:57:25");
INSERT INTO trabajando_egresado VALUES("2","4","1","sadfg","Si","32456","Medio","2018-01-17 15:24:17");
INSERT INTO trabajando_egresado VALUES("3","2","1","comer","Si","51651","Medio","2018-01-22 02:10:56");
INSERT INTO trabajando_egresado VALUES("4","2","1","dormir","Si","32423","Completo","2018-01-22 02:11:46");
INSERT INTO trabajando_egresado VALUES("5","9","1","corto flores ","Si","500000","Completo","2018-02-04 22:42:09");
INSERT INTO trabajando_egresado VALUES("6","10","1","corto flores ","Si","500000","Completo","2018-02-04 22:46:32");
INSERT INTO trabajando_egresado VALUES("7","10","1","corto flores ","Si","500000","Completo","2018-02-05 02:39:26");
INSERT INTO trabajando_egresado VALUES("8","10","1","asdasd","Si","432342","Medio","2018-02-05 03:08:22");
INSERT INTO trabajando_egresado VALUES("9","10","1","asdasd","Si","432342","Medio","2018-02-05 03:11:10");
INSERT INTO trabajando_egresado VALUES("10","11","1","comer y dormir ","Si","500000","Medio","2018-02-05 03:26:00");
INSERT INTO trabajando_egresado VALUES("11","11","1","comer y dormir ","Si","500000","Medio","2018-02-05 03:26:15");



DROP TABLE IF EXISTS universidades;

CREATE TABLE `universidades` (
  `Id_universidad` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre_universidad` varchar(40) NOT NULL,
  `id_Municipio` bigint(20) NOT NULL,
  PRIMARY KEY (`Id_universidad`),
  KEY `id_Municipio` (`id_Municipio`),
  CONSTRAINT `universidades_ibfk_1` FOREIGN KEY (`id_Municipio`) REFERENCES `municipios` (`id_Municipio`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO universidades VALUES("1","UNIVERSIDAD DEL TOLIMA","1021");
INSERT INTO universidades VALUES("2","DSFSDFSD","13");
INSERT INTO universidades VALUES("3","wdasdasd","158");
INSERT INTO universidades VALUES("4","wdasdasd","231");
INSERT INTO universidades VALUES("5","alexis espinosa ","159");
INSERT INTO universidades VALUES("6","espinosa vidalasdasdas","8");
INSERT INTO universidades VALUES("7","qwertyuii","226");
INSERT INTO universidades VALUES("8","fsdfsdf","364");
INSERT INTO universidades VALUES("9","fsdfsdfsdfsdf","364");
INSERT INTO universidades VALUES("10","espinosa alexi","25");
INSERT INTO universidades VALUES("11","dfsdf","16");



DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id_Usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `rol` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_Usuario` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contrasena` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO usuarios VALUES("1","ADMINISTRADOR","CENTRO AGROPECUARIO LA GRANJA ESPINAL","admin","d9b1d7db4cd6e70935368a1efb10e377");



SET FOREIGN_KEY_CHECKS=1;