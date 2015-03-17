<?php

require("library.php");
error_reporting(E_ERROR | E_PARSE);
page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Query 2");
menu();

start_body();

echo "
<B><H3>Query 2</H3></B><br>
";
echo"Definire una vista Negativi contenente i Rapporti tecnici<br> 
     dove il test \"Verifica della presenza e della completezza<br>
     dei dati di targa.\" ha avuto esito negativo.<br>
     Utilizzare la vista Negativi per trovare il tipo delle apparecchiature<br>
     di marca \"Fisiotre\".<br><br>";
$conn=connectDB();
$query="DROP VIEW IF EXISTS Negativi";
$result=mysql_query($query, $conn);
$query="CREATE VIEW Negativi AS
SELECT rt.idRapporto,rt.Ubicazione,rt.Data,rt.Tipologia,rt.Note,rt.idTecnico,
rt.idReferente,rt.idOspedale,rt.serialeApparecchiatura
FROM Test t NATURAL JOIN Contiene c NATURAL JOIN RapportiTecnici rt 
WHERE t.Descrizione=\"Verifica della presenza e della completezza dei dati di targa.\" AND c.Esito=\"NO\"";
$result=mysql_query($query, $conn);
$query="SELECT tp.Civab,tp.Descrizione
FROM Negativi NATURAL JOIN Apparecchiature a NATURAL JOIN Tipi tp
WHERE a.Marca=\"Fisiotre\"";
$result=mysql_query($query, $conn);

$table_head =  array("Civab","Descrizione");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {
  table_row($row);
}
table_end();


end_body();
page_end();
?>
