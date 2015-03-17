DELIMITER $$
CREATE FUNCTION calcoloEta (nascita DATETIME) 
RETURNS INT 
BEGIN 
    DECLARE eta INT ; 
    DECLARE oggi DATETIME ; 
    SET oggi = CURDATE() ;
    SET eta = YEAR(oggi) - YEAR(nascita) - 
             (DATE_FORMAT(oggi, '%m%d') < 
              DATE_FORMAT(nascita, '%m%d')) ;
    RETURN(eta) ; 
END $$ 
DELIMITER ;

/* L'espressione (DATE_FORMAT(data1, '%m%d') < 
DATE_FORMAT(data2, '%m%d')) è vera se data1 è 
"precedente nell'anno" a data2 e poichè in mysql true = 1 
e false = 0 l'aggiustamento (cioè sottrarre 1 anno all'età
se la persona deve ancora compiere gli anni quest'anno) 
consiste nel sottrarre il risultato di quest'espressione. */
