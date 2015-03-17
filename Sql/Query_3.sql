SELECT p.Nome AS NomeReferente,p.Cognome AS CognomeReferente,
       p1.Nome AS NomeTecnico,p1.Cognome AS CognomeTecnico
FROM RapportiTecnici rt JOIN Persone p
     ON rt.idReferente=p.idPersona
     JOIN Persone p1 ON rt.idTecnico=p1.idPersona
WHERE rt.Data<'1999-12-07' AND
NOT EXISTS 
  (SELECT * 
   FROM Apparecchiature a 
   WHERE rt.serialeApparecchiatura=a.serialeApparecchiatura 
   AND a.Civab IN
		(SELECT tp.Civab 
		 FROM Tipi tp 
		 WHERE tp.Descrizione!="AUTOCLAVE"));
