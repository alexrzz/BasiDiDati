<?php

require("library.php");

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Note relative al rapporto.");
menu();

start_body();

echo "
<B><H3>Note</H3></B><br>
";

$idRapporto = $_GET["idRapporto"];

$conn=connectDB();
$query="SELECT Note FROM RapportiTecnici WHERE idRapporto=$idRapporto";
$result=mysql_query($query, $conn);

$table_head =  array("Note");
table_start($table_head);


while ($row = mysql_fetch_row($result)) {
  table_row($row);
}

table_end();

end_body();
page_end();
?>
