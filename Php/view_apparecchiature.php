<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

require("library.php");

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Tabella Apparecchiature");
menu();

start_body();

echo "
<B><H3>Apparecchiature</H3></B><br>
";

$seriale=$_GET["seriale"];

$conn=connectDB();

if(isset($seriale))
  $query="SELECT * FROM Apparecchiature WHERE serialeApparecchiatura='$seriale'";
else
  $query="SELECT * FROM Apparecchiature";

$result=mysql_query($query, $conn);

$table_head =  array("Seriale Apparecchiatura","Marca","Modello","Codice","Civab");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {
  table_row($row);
}

table_end();

end_body();
page_end();
?>
