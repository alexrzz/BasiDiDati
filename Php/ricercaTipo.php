<?php
require("library.php");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Ricerca Tipo");
menu();
start_body();
echo "<B><H3>Inserire i campi per la ricerca</H3></B><br>";
$conn=connectDB();
$str1 = $_GET["str1"];
$str2 = $_GET["str2"];
$query="SELECT * FROM Tipi";
if($str1)
{
   $query="SELECT * FROM Tipi WHERE Civab LIKE '$str1%'";
}
if($str2)
{
  $query="SELECT * FROM Tipi WHERE Descrizione LIKE '%$str2%'";
}
$result=mysql_query($query, $conn);
echo<<<END
<form action="ricercaTipo.php" method="GET" name="RicercaTipo" id="ricercaTipo">
<input type="radio" name="tipoRicerca" id="cv" OnClick="changeRicercaTipo()" value="civab" checked>Civab<input type="text" name="str1" id="str1"> <br>
<input type="radio" name="tipoRicerca" id="des" OnClick="changeRicercaTipo()" value="descrizione">Descrizione<input type="text" name="str2" id="str2" disabled> <br>
<br><input type="submit" value="Cerca">
</form><br>
END;
$table_head =  array("Id","Descrizione");
table_start($table_head);
while ($row = mysql_fetch_row($result)) 
{
  table_row($row);
}
table_end();
end_body();
page_end();
?>
