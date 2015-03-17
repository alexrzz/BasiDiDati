<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

require("library.php");

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Tecnici Operatori");
menu();

start_body();

echo "
<B><H3>Tecnici</H3></B><br>
";

$conn=connectDB();
$id=$_GET["idTecnico"];

if($id=="")
  $query="SELECT p.idPersona,p.Nome, p.Cognome, p.DataNascita, p.Telefono, t.Azienda, t.Qualifica FROM Persone p NATURAL JOIN Tecnici t";
else  $query="SELECT p.idPersona,p.Nome, p.Cognome, p.DataNascita, p.Telefono, t.Azienda, t.Qualifica FROM Persone p NATURAL JOIN Tecnici t WHERE idPersona=$id";

$result=mysql_query($query, $conn);

$request = $_GET["request"];

echo "<form action='";

if($request=="view")
  echo "delete_tecnico.php";
else  echo "edit_tecnico.php";


echo "' method=POST>";


$table_head =  array("","Id","Nome","Cognome","DataNascita","Telefono","Azienda","Qualifica","Rapporti Eseguiti");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {
  $radio[0]="<input type=\"radio\" name=\"idPersona\" value=\"$row[0]\" />";
  $numRapporti="SELECT COUNT(*) FROM RapportiTecnici WHERE idTecnico=$row[0]";
  $res=mysql_query($numRapporti, $conn);
  $num=mysql_fetch_row($res);

  table_row(array_merge($radio,$row,$num));
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
