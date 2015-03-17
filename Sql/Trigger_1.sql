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
END $$
DELIMITER ;
