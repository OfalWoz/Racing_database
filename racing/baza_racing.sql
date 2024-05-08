
DROP TABLE IF EXISTS `kierowcy`;

CREATE table `kierowcy`(
    `idk` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `nazwa` varchar(40) NOT NULL,
    `Staz` int(11) NOT NULL,
    PRIMARY KEY (`idk`)
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

LOCK TABLES `kierowcy` WRITE;

INSERT INTO kierowcy(idk,nazwa,Staz) VALUES 
(NULL,"StefanGnok",6),
(NULL,"RadekUpojnik",9),
(NULL,"MarekStar",1),
(NULL,"JaneDrugi",2),
(NULL,"KondratSzyb",0);

UNLOCK TABLES;

drop table if EXISTS `przejazdy`;

CREATE table `przejazdy`(
    `idp` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `ilosc` int(11) not null,
    `czas` time not null,
    `idk` int(11) not null,
    `idt` int (11) not null,
    `data_przejazdow` date not null,
    PRIMARY KEY (`idp`),
    KEY `kierowca.idk` (`idk`),
    KEY `tor.idt` (`idt`)
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

LOCK TABLES `przejazdy` WRITE;

INSERT INTO `przejazdy` VALUES 
(NULL,4,"00:02:07",1,1,"2022-04-09"),
(NULL,3,"00:03:07",2,2,"2022-04-01"),
(NULL,6,"00:02:11",3,3,"2022-04-04"),
(NULL,1,"00:03:53",1,2,"2022-04-01"),
(NULL,9,"00:01:47",5,1,"2022-04-09");

UNLOCK TABLES;

drop table if EXISTS `tor`;

CREATE table `tor`(
    `idt` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `Nazwa` varchar(30) not null,
    `dlugosc` FLOAT not null,
    `zakrety` int(11) not null,
    PRIMARY KEY (`idt`)
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

LOCK TABLES `tor` WRITE;

INSERT into `tor` VALUES
(NULL, "RonRace", 9.04, 17),
(NULL, "BlainCounty24", 12.03, 20),
(NULL, "LTDGrandPrix", 5.21, 14),
(NULL, "GroveRace", 7.91, 18),
(NULL, "VinewoodRace", 8.13, 16);

UNLOCK TABLES;

drop table if EXISTS `Zawody`;

CREATE table `Zawody`(
    `idz` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `nazwa` varchar(30) not null,
    `data` date not null,
    `nagroda` text DEFAULT NULL,
    PRIMARY KEY (`idz`)
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

LOCK TABLES `Zawody` WRITE;

INSERT into `Zawody` VALUES
(NULL, "RonRaceEvent", "2022-04-09", "samochod"),
(NULL, "BlainRaces", "2022-04-01", "Nagroda pieniezna");

UNLOCK TABLES;

drop table if EXISTS `zawody_szczegoly`;

CREATE table `zawody_szczegoly`(
    `idsz` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `idz` int(11) not null,
    `idt` int(11) not null,
    `ilosc_wyscigow` int(11) not NULL,
    PRIMARY KEY (`idsz`),
    KEY `zawody.idz` (`idz`),
    KEY `tor.idt` (`idt`)
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

LOCK TABLES `zawody_szczegoly` WRITE;

INSERT into `zawody_szczegoly` VALUES
(NULL, 1, 2, 2),
(NULL, 2, 1, 1),
(NULL, 2, 2, 1);

UNLOCK TABLES;