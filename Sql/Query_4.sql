SELECT o.Nome, COUNT(*) AS ConteggioRapportiTecnici
FROM Ospedali o NATURAL JOIN RapportiTecnici rt 
     NATURAL JOIN Tecnici t
WHERE o.Citta="Milano" AND t.Qualifica LIKE 'Ingegnere%'
GROUP BY o.Nome
ORDER BY o.Nome;
