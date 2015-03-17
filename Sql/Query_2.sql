DELIMITER $$
DROP VIEW IF EXISTS Negativi;
CREATE VIEW Negativi AS
SELECT rt.idRapporto,rt.Ubicazione,rt.Data,
       rt.Tipologia,rt.Note,rt.idTecnico,
       rt.idReferente,rt.idOspedale,rt.serialeApparecchiatura
FROM Test t NATURAL JOIN Contiene c 
     NATURAL JOIN RapportiTecnici rt 
WHERE t.Descrizione="Verifica della presenza e della
completezza dei dati di targa."
      AND c.Esito="NO";
 
SELECT tp.Civab,tp.Descrizione
FROM Negativi NATURAL JOIN Apparecchiature a NATURAL JOIN Tipi tp
WHERE a.Marca="Fisiotre" $$
DELIMITER ;
