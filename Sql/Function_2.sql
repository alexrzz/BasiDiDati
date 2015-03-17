DELIMITER $$
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
