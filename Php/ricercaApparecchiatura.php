<?php
require("library.php");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Ricerca Apparecchiatura");
menu();
start_body();
echo "<B><H3>Inserire i campi per la ricerca</H3></B><br>";
$conn=connectDB();
$str1 = $_GET["str1"];
$str2 = $_GET["str2"];
$str3 = $_GET["str3"];
$str4 = $_GET["str4"];
$str5 = $_GET["str5"];
$query="SELECT * FROM Apparecchiature";
if($str1)
{
   $query="SELECT * FROM Apparecchiature WHERE serialeApparecchiatura LIKE '%$str1%'";
}
if($str2)
{
  $query="SELECT * FROM Apparecchiature WHERE Marca LIKE '%$str2%'";
}
if($str3)
{
  $query="SELECT * FROM Apparecchiature WHERE Modello LIKE '%$str3%'";
}
if($str4)
{
  $query="SELECT * FROM Apparecchiature WHERE Codice LIKE '%$str4%'";
}
if($str5)
{
  $query="SELECT * FROM Apparecchiature WHERE Civab LIKE '%$str5%'";
}
$result=mysql_query($query, $conn);
echo<<<END
<form action="ricercaApparecchiatura.php" method="GET" name="RicercaApparecchiatura" id="ricercaApparecchiatura">
<input type="radio" name="tipoRicerca" id="tp" OnClick="changeRicercaApparecchiatura()" value="seriale" checked>Seriale<input type="text" name="str1" id="str1"> <br>
<input type="radio" name="tipoRicerca" id="dt" OnClick="changeRicercaApparecchiatura()" value="marca">Marca<input type="text" name="str2" id="str2" disabled> <br>
<input type="radio" name="tipoRicerca" id="mod" OnClick="changeRicercaApparecchiatura()" value="modello">Modello<input type="text" name="str3" id="str3" disabled> <br>
<input type="radio" name="tipoRicerca" id="cod" OnClick="changeRicercaApparecchiatura()" value="codice">Codice<input type="text" name="str4" id="str4" disabled> <br>
<input type="radio" name="tipoRicerca" id="civ" OnClick="changeRicercaApparecchiatura()" value="civab">Civab<input type="text" name="str5" id="str5" disabled> <br>
<br><input type="submit" value="Cerca">
</form><br>
END;
$table_head =  array("Seriale Apparecchiatura","Marca","Modello","Codice","Civab");
table_start($table_head);
while ($row = mysql_fetch_row($result)) 
{
  table_row($row);
}
table_end();
end_body();
page_end();
?>
