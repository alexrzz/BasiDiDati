SELECT p.Nome,p.Cognome,r.Ruolo
FROM Persone p JOIN Referenti r ON p.idPersona=r.idPersona 
WHERE calcoloEta(p.DataNascita)>30 AND 
NOT EXISTS 
          (SELECT * 
           FROM Ospedali o JOIN RapportiTecnici rt 
           ON o.idOspedale=rt.idOspedale
           WHERE rt.idReferente=p.idPersona 
           AND o.Citta="Parma");
