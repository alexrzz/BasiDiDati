<?php

require("library.php");
error_reporting(E_ERROR | E_PARSE);
page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Query 1");
menu();

start_body();

echo "
<B><H3>Query 1</H3></B><br>
";
echo" Trovare Nome, Cognome, Ruolo dei referenti <br>
con età superiore a 30 anni per i quali non esistono <br>
rapporti tecnici riguardanti ospedali di Parma. <br><br>";
$conn=connectDB();
$query="SELECT p.Nome,p.Cognome,r.Ruolo
FROM Persone p NATURAL JOIN Referenti r
WHERE calcoloEta(p.DataNascita)>30 AND 
NOT EXISTS (SELECT * FROM Ospedali o JOIN RapportiTecnici rt ON o.idOspedale=rt.idOspedale
WHERE rt.idReferente=p.idPersona AND o.Citta=\"Parma\")";
$result=mysql_query($query, $conn);



$table_head =  array("Nome","Cognome","Ruolo");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {
  table_row($row);
}
table_end();


end_body();
page_end();
?>
