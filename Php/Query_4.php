<?php

require("library.php");
error_reporting(E_ERROR | E_PARSE);
page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Query 4");
menu();

start_body();

echo "
<B><H3>Query 4</H3></B><br>
";
echo"Per ogni ospedale di Milano fornirne il nome e visualizzarne<br>
il numero dei rapporti tecnici effettuati da un tecnico con qualifica Ingegnere.<br><br>";
$conn=connectDB();
$query="SELECT o.Nome, COUNT(*) AS ConteggioRapportiTecnici
FROM Ospedali o NATURAL JOIN RapportiTecnici rt NATURAL JOIN Tecnici t
WHERE o.Citta=\"Milano\" AND t.Qualifica LIKE 'Ingegnere%'
GROUP BY o.Nome
ORDER BY o.Nome;";
$result=mysql_query($query, $conn);

$table_head =  array("Nome","ConteggioRapporti");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {
  table_row($row);
}
table_end();
end_body();
page_end();
?>
