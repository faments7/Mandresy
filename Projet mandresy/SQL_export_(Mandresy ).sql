CREATE DATABASE mandresy;
\c mandresy;

DROP TABLE IF EXISTS artiste ;
DROP TABLE IF EXISTS tag;
DROP TABLE IF EXISTS tagArtiste ;
DROP TABLE IF EXISTS region ;
DROP TABLE IF EXISTS ville;
DROP TABLE IF EXISTS statue ;
DROP TABLE IF EXISTS evenement;


CREATE TABLE artiste  (
idArtiste  SERIAL PRIMARY KEY NOT NULL,
nom VARCHAR(50) NOT NULL,
typeArtiste VARCHAR(30) NOT NULL,
contact  NUMERIC NOT NULL,
facebook  VARCHAR(50) NOT NULL,
photoArt VARCHAR(200)
);

CREATE TABLE tag ( 
idTag SERIAL PRIMARY KEY NOT NULL,
nomTag  VARCHAR(30) NOT NULL
);

CREATE TABLE tagArtiste (
idTagArtiste SERIAL PRIMARY KEY NOT NULL,
idArtiste SERIAL NOT NULL,
idTag SERIAL NOT NULL,
FOREIGN KEY (idArtiste) REFERENCES artiste(idArtiste),
FOREIGN KEY (idTag) REFERENCES tag(idTag)
);

CREATE TABLE region  (
idRegion  SERIAL PRIMARY KEY NOT NULL,
nom VARCHAR(30) NOT NULL);

CREATE TABLE ville (
idVille  SERIAL PRIMARY KEY NOT NULL,
nom VARCHAR(50) NOT NULL,
latitude  DECIMAL ,
longitude  DECIMAL ,
idRegion  SERIAL NOT NULL,
FOREIGN KEY (idRegion) REFERENCES region(idRegion)
);

CREATE TABLE status  (
idStatus SERIAL PRIMARY KEY NOT NULL,
nom VARCHAR(30) NOT NULL
);

CREATE TABLE datePrevue(
idDate SERIAL PRIMARY KEY NOT NULL,
datePrevue DATE
);

CREATE TABLE evenement (
idEvenement SERIAL PRIMARY KEY NOT NULL,
idVille  SERIAL NOT NULL,
observation  VARCHAR(100),
idArtiste SERIAL NOT NULL,
idStatue  SERIAL NOT NULL,
idDate SERIAL NOT NULL,
FOREIGN KEY (idVille) REFERENCES ville(idVille),
FOREIGN KEY (idArtiste) REFERENCES artiste(idArtiste),
FOREIGN KEY (idStatue) REFERENCES status(idStatus),
FOREIGN KEY (idDate) REFERENCES datePrevue(idDate)
);

INSERT INTO datePrevue (dateprevue) VALUES('2023-08-18');
INSERT INTO datePrevue (dateprevue) VALUES('2023-08-19');
INSERT INTO datePrevue (dateprevue) VALUES('2023-08-20');

INSERT INTO status (nom) VALUES ('prevue');
INSERT INTO status (nom) VALUES ('confirmer');

INSERT INTO tag (nomtag) VALUES ('jeune');
INSERT INTO tag (nomtag) VALUES ('nostalgie');
INSERT INTO tag (nomtag) VALUES ('gospel');
INSERT INTO tag (nomtag) VALUES ('choral');
INSERT INTO tag (nomtag) VALUES ('pop');
INSERT INTO tag (nomtag) VALUES ('rock');
INSERT INTO tag (nomtag) VALUES ('rap');

::reinitialisation ville
DROP TABLE evenement; 
DROP TABLE ville;
DROP TABLE region;

::reinitilisation artiste
DROP TABLE tagartiste;
DROP TABLE tag;
DROP TABLE evenement;
DROP TABLE artiste;