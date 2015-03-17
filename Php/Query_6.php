<?php

require("library.php");
error_reporting(E_ERROR | E_PARSE);
page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Query 6");
menu();

start_body();

echo "
<B><H3>Query 6</H3></B><br>
";
echo"Query che restituisce le spese di manutenzione per l'ospedale San Raffaele <br>
utilizzando la Funzione 2, la spesa per ogni rapporto tecnico è assunta <br>
come standard e specificata anch'essa come parametro.<br><br>";
$conn=connectDB();
$query="DROP VIEW IF EXISTS SpeseOspedale";
$result=mysql_query($query, $conn);
$query="CREATE VIEW SpeseOspedale AS
SELECT calcoloSpesa (\"San Raffaele\",150)";
$result=mysql_query($query, $conn);

$query="SELECT * FROM SpeseOspedale";
$result=mysql_query($query, $conn);

$table_head =  array("SpeseOspedale");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {
  table_row($row);
}
table_end();
end_body();
page_end();
?>
