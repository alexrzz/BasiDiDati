USE aruzzant-PR;

DROP TABLE IF EXISTS CompatibileCon;
DROP TABLE IF EXISTS Contiene;
DROP TABLE IF EXISTS Test;
DROP TABLE IF EXISTS RapportiTecnici;
DROP TABLE IF EXISTS Apparecchiature;
DROP TABLE IF EXISTS Tipi;
DROP TABLE IF EXISTS Ospedali;
DROP TABLE IF EXISTS Tecnici;
DROP TABLE IF EXISTS Referenti;
DROP TABLE IF EXISTS Persone;
DROP TABLE IF EXISTS Utenti;
DROP TRIGGER IF EXISTS CheckApp;
DROP TRIGGER IF EXISTS CheckNote;
DROP FUNCTION IF EXISTS calcoloEta;
DROP FUNCTION IF EXISTS calcoloSpesa;
DROP VIEW IF EXISTS Negativi;
DROP VIEW IF EXISTS SpeseOspedale;


CREATE TABLE Utenti(
       Login     CHAR(8)   PRIMARY KEY,
       Password  CHAR(40)
) ENGINE=InnoDB;

CREATE TABLE Test(
	idTest		INT PRIMARY KEY,
	Descrizione	VARCHAR(255)
) ENGINE=InnoDB;

CREATE TABLE Tipi(
	Civab		VARCHAR(5) PRIMARY KEY,
	Descrizione	VARCHAR(50)
) ENGINE=InnoDB;

CREATE TABLE Ospedali(
	idOspedale	INT PRIMARY KEY,
	Nome		VARCHAR(50),
	Citta		VARCHAR(50),
	Indirizzo	VARCHAR(50),
	Telefono	VARCHAR(15)
) ENGINE=InnoDB;

CREATE TABLE Persone(
	idPersona	INT PRIMARY KEY,
	Nome		VARCHAR(20),
	Cognome		VARCHAR(20),
	DataNascita	DATE,
	Telefono	VARCHAR(15)
) ENGINE=InnoDB;

CREATE TABLE CompatibileCon(
	idTest		INT,
	Civab		VARCHAR(5),
	PRIMARY KEY (idTest,Civab),
	FOREIGN KEY (idTest) REFERENCES Test(idTest)
			ON DELETE NO ACTION,
	FOREIGN KEY (Civab) REFERENCES Tipi(Civab)
			ON DELETE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE Apparecchiature(
	serialeApparecchiatura	VARCHAR(50) PRIMARY KEY,
	Marca	VARCHAR(50),
	Modello	VARCHAR(50),
	Codice	VARCHAR(50),
	Civab	VARCHAR(5) NOT NULL,
	FOREIGN KEY (Civab) REFERENCES Tipi(Civab)
			ON DELETE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE Tecnici(
	idPersona	INT PRIMARY KEY,
	Azienda		VARCHAR(50),
	Qualifica	VARCHAR(50),
	FOREIGN KEY (idPersona) REFERENCES Persone(idPersona)
			ON DELETE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE Referenti(
	idPersona	INT PRIMARY KEY,
	Ruolo		VARCHAR(50),
	FOREIGN KEY (idPersona) REFERENCES Persone(idPersona)
			ON DELETE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE RapportiTecnici(
	idRapporto	INT PRIMARY KEY,
	Ubicazione	VARCHAR(50),
	Data		DATE,
	Tipologia	ENUM('Generico','Specifico'),
	Note		VARCHAR(120),
	idTecnico	INT NOT NULL,
	idReferente	INT NOT NULL,
	idOspedale	INT NOT NULL,
	serialeApparecchiatura	VARCHAR(50),
	FOREIGN KEY (idTecnico) REFERENCES Tecnici(idPersona)
			ON DELETE NO ACTION,
	FOREIGN KEY (idReferente) REFERENCES Referenti(idPersona)
			ON DELETE NO ACTION,
	FOREIGN KEY (idOspedale) REFERENCES Ospedali(idOspedale)
			ON DELETE NO ACTION,
	FOREIGN KEY (serialeApparecchiatura) REFERENCES 
                 Apparecchiature(serialeApparecchiatura)
			ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE Contiene(
	idRapporto	INT,
	idTest		INT,
	Esito		ENUM('SI','NO','N.A.'),
	PRIMARY KEY (idRapporto,idTest),
	FOREIGN KEY (idRapporto) REFERENCES 
	        RapportiTecnici(idRapporto)
			ON DELETE NO ACTION,
	FOREIGN KEY (idTest) REFERENCES Test(idTest)
			ON DELETE NO ACTION
) ENGINE=InnoDB;

DELIMITER $$
CREATE TRIGGER CheckApp
BEFORE INSERT ON Apparecchiature
FOR EACH ROW
BEGIN
    IF 
    (new.serialeApparecchiatura IN 
    (SELECT serialeApparecchiatura FROM Apparecchiature)) 
    THEN
    DELETE FROM ERROR ;
END IF ;
END ;

CREATE TRIGGER CheckNote
BEFORE INSERT ON RapportiTecnici
FOR EACH ROW
BEGIN
    IF (new.Note='') THEN 
    SET new.Note="Nessuna nota inserita." ;
END IF ;
END ;

CREATE FUNCTION calcoloEta (nascita DATETIME) 
RETURNS INT 
BEGIN 
    DECLARE eta INT ; 
    DECLARE oggi DATETIME ; 
    SET oggi = CURDATE() ;
    SET eta = YEAR(oggi) - YEAR(nascita) - 
          (DATE_FORMAT(oggi, '%m%d') < DATE_FORMAT(nascita, '%m%d')) ;
    RETURN(eta) ; 
END ;
  
CREATE FUNCTION calcoloSpesa (nomeOsp VARCHAR(50), prezzo DOUBLE)
RETURNS INT
BEGIN 
    DECLARE spesa INT ;
    SET spesa = (SELECT COUNT(*) 
                 FROM  RapportiTecnici rt 
                 NATURAL JOIN Ospedali o
                 WHERE o.Nome=nomeOsp) * prezzo;
    RETURN spesa ;
END $$
DELIMITER ; 

SOURCE insertTipi.sql;
SOURCE insertTest.sql;
SOURCE insertCompatibileCon.sql;
SOURCE insertPersone.sql;
SOURCE insertTecnici.sql;
SOURCE insertReferenti.sql;
SOURCE insertOspedali.sql;
SOURCE insertRapportiTecnici.sql;
SOURCE insertContiene.sql;
