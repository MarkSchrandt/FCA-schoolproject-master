use FCA;

DROP  TABLE IF EXISTS contributie;
CREATE TABLE contributie(
  nummer int not null,
  naam varchar(25) not null,
  verhoging double not null,
  verhoging_procent double not null,
  prijs double not null,
  primary key (nummer)

);

INSERT INTO contributie VALUES
(1, 'senioren', 15.00, 5.56, 285.00),
(2, 'recreanten', 10.00, 4.65, 225.00),
(3, 'jeugd a', 15.00, 8.11, 200.00),
(4, 'jeugd b', 15.00, 8.96, 182.50),
(5, 'jeugd c', 15.00, 10.17, 162.50),
(6, 'minis', 15.00, 11.32, 147.50),
(7, 'verenigingslid', 0, 0, 15.00),
(8, 'bijzonderlid', 0, 0, 0),
(9, '1,5 uur', 0, 0, 30),
(10, '2 uur', 0, 0, 40),
(11, 'heren 1 uur', 20, 40, 70),
(12, 'dames 1 uur', 20, 28.75, 90),
(13, 'jeugd 2,5 uur', 20, 28.75, 90),
(14, 'geen', 0, 0, 0)
;

DROP TABLE IF EXISTS lid;
CREATE TABLE lid(
    id INT NOT NULL AUTO_INCREMENT,
    voornaam VARCHAR(45) NOT NULL,
    achternaam VARCHAR(45) NOT NULL,
    geboortedatum DATE NOT NULL,
    aanhef VARCHAR(7) NOT NULL,
    postcode VARCHAR(6) NOT NULL,
    plaats VARCHAR(80) NOT NULL,
    straat VARCHAR(80) NOT NULL,
    huisnummer INT NOT NULL,
    telefoonnummer VARCHAR(10) NULL,
    mobielnummer VARCHAR(10) NULL,
    email VARCHAR(80) NOT NULL,
    PRIMARY KEY (id)
);

DROP TABLE IF EXISTS kosten;
CREATE TABLE kosten(
    id INT NOT NULL AUTO_INCREMENT,
    soortlid VARCHAR(45) NOT NULL,
    betaalt VARCHAR(3) NOT NULL,
    hoeveel double,
    kosten double,
    training varchar(25),
    PRIMARY KEY (id)
);

DROP TABLE IF EXISTS user;
CREATE TABLE user
(
    id   INT NOT NULL AUTO_INCREMENT,
    naam VARCHAR(45),
    ww   VARCHAR(45),
    PRIMARY KEY (id)
);
INSERT into user values (1, 'admin', 'welkom123');
