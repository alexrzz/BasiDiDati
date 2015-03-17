<?php

require("library.php");

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Tabella Ospedali");
menu();

start_body();

echo "
<B><H3>Ospedali</H3></B><br>
";

$conn=connectDB();
$query="SELECT * FROM Ospedali";
$result=mysql_query($query, $conn);

$request = $_GET["request"];

echo "<form action='";

if($request=="view")
  echo "delete_ospedale.php";
else  echo "edit_ospedale.php";


echo "' method=POST>";

$table_head =  array("","Id","Nome","Citta","Indirizzo","Telefono");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {
  $radio[0]="<input type=\"radio\" name=\"idOspedale\" value=\"$row[0]\" />";
  table_row(array_merge($radio,$row));
}
table_end();

echo "<br><input type='submit' value='";

if($request=="view")
  echo "Elimina";
else  echo "Modifica";

echo"'>";
echo"</form>";

end_body();
page_end();
?>
