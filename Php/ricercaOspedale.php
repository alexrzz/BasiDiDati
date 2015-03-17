<?php
require("library.php");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Ricerca Ospedale");
menu();
start_body();
echo "<B><H3>Inserire i campi per la ricerca</H3></B><br>";
$conn=connectDB();
$str1 = $_GET["str1"];
$str2 = $_GET["str2"];
$str3 = $_GET["str3"];
$str4 = $_GET["str4"];
$query="SELECT * FROM Ospedali";
if($str1)
{
   $query="SELECT * FROM Ospedali WHERE Nome LIKE '%$str1%'";
}
if($str2)
{
  $query="SELECT * FROM Ospedali WHERE Citta LIKE '%$str2%'";
}
if($str3)
{
  $query="SELECT * FROM Ospedali WHERE Indirizzo LIKE '%$str3%'";
}
if($str4)
{
  $query="SELECT * FROM Ospedali WHERE Telefono LIKE '%$str4%'";
}
$result=mysql_query($query, $conn);
echo<<<END
<form action="ricercaOspedale.php" method="GET" name="RicercaOspedale" id="ricercaOspedale">
<input type="radio" name="tipoRicerca" id="nom" OnClick="changeRicercaOspedale()" value="nome" checked>Nome<input type="text" name="str1" id="str1"> <br>
<input type="radio" name="tipoRicerca" id="cit" OnClick="changeRicercaOspedale()" value="citta">Città<input type="text" name="str2" id="str2" disabled> <br>
<input type="radio" name="tipoRicerca" id="ind" OnClick="changeRicercaOspedale()" value="indirizzo">Indirizzo<input type="text" name="str3" id="str3" disabled> <br>
<input type="radio" name="tipoRicerca" id="tel" OnClick="changeRicercaOspedale()" value="telefono">Telefono<input type="text" name="str4" id="str4" disabled> <br>
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
