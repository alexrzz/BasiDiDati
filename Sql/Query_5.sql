SELECT t.Descrizione
FROM Apparecchiature a NATURAL JOIN Tipi tp JOIN CompatibileCon c
     ON c.Civab=tp.Civab JOIN Test t ON t.idTest=c.idTest
WHERE serialeApparecchiatura="FDHAJ-245867TG3" AND  
NOT EXISTS (SELECT *
            FROM Contiene ct NATURAL JOIN RapportiTecnici rt
            NATURAL JOIN Ospedali o
            WHERE ct.idTest=t.idTest 
            AND rt.Tipologia!="Generico"
            AND o.Citta!="Roma");
