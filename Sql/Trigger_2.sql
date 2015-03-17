DELIMITER $$
CREATE TRIGGER CheckNote
BEFORE INSERT ON RapportiTecnici
FOR EACH ROW
BEGIN
    IF (new.Note='') 
    THEN 
    SET new.Note="Nessuna nota inserita." ;
END IF ;
END $$
DELIMITER ;
