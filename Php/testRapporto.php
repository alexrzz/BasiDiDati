<?php

require("library.php");

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Test relativi ad un rapporto.");
menu();

start_body();

echo "
<B><H3>Test</H3></B><br>
";

$idRapporto = $_GET["idRapporto"];

$conn=connectDB();
$query="SELECT * FROM Contiene WHERE idRapporto=$idRapporto";
$result=mysql_query($query, $conn);

$table_head =  array("Id","Descrizione","Esito");
table_start($table_head);


while ($row = mysql_fetch_row($result)) {

$query="SELECT * FROM Test WHERE idTest=$row[1]";
$res=mysql_query($query, $conn);
$desc = mysql_fetch_array($res);
$stampa = array("$desc[0]","$desc[1]","$row[2]");

  table_row($stampa);
}

table_end();

end_body();
page_end();
?>
