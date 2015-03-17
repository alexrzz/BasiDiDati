<?php

require("library.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE);

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Ricerca Tecnico");
menu();

start_body();

echo "
<B><H3>Inserire i campi per la ricerca</H3></B><br>
";

$conn=connectDB();

$str1 = $_GET["str1"];
$str2 = $_GET["str2"];
$str3 = $_GET["str3"];
$str4 = $_GET["str4"];
$str5 = $_GET["str5"];
$str6 = $_GET["str6"];

  $query="SELECT idPersona, Nome, Cognome, DataNascita, Telefono, Azienda, Qualifica FROM Persone NATURAL JOIN Tecnici";

if($str1)
{
   $query="SELECT idPersona, Nome, Cognome, DataNascita, Telefono, Azienda, Qualifica FROM Persone NATURAL JOIN Tecnici WHERE Nome LIKE '%$str1%'";
}
if($str2)
{
  $query="SELECT idPersona, Nome, Cognome, DataNascita, Telefono, Azienda, Qualifica FROM Persone NATURAL JOIN Tecnici WHERE Cognome LIKE '%$str2%'";
}
if($str3)
{
  $query="SELECT idPersona, Nome, Cognome, DataNascita, Telefono, Azienda, Qualifica FROM Persone NATURAL JOIN Tecnici WHERE DataNascita='$str3'";
}
if($str4)
{
  $query="SELECT idPersona, Nome, Cognome, DataNascita, Telefono, Azienda, Qualifica FROM Persone NATURAL JOIN Tecnici WHERE Telefono LIKE '%$str4%'";
}
if($str5)
{
  $query="SELECT idPersona, Nome, Cognome, DataNascita, Telefono, Azienda, Qualifica FROM Persone NATURAL JOIN Tecnici WHERE Azienda LIKE '%$str5%'";
}
if($str6)
{
  $query="SELECT idPersona, Nome, Cognome, DataNascita, Telefono, Azienda, Qualifica FROM Persone NATURAL JOIN Tecnici WHERE Qualifica LIKE '%$str6%'";
}
$result=mysql_query($query, $conn);


echo<<<END
<form action="ricercaTecnico.php" method="GET" name="RicercaTecnico" id="ricercaTecnico">
<input type="radio" name="tipoRicerca" id="no" OnClick="changeRicercaTecnico()" value="nome" checked>Nome<input type="text" name="str1" id="str1"> <br>
<input type="radio" name="tipoRicerca" id="co" OnClick="changeRicercaTecnico()" value="cognome">Cognome<input type="text" name="str2" id="str2" disabled> <br>
<input type="radio" name="tipoRicerca" id="da" OnClick="changeRicercaTecnico()" value="datanascita">Data Nascita<input type="text" name="str3" id="str3" disabled> <br>
<input type="radio" name="tipoRicerca" id="te" OnClick="changeRicercaTecnico()" value="telefono">Telefono<input type="text" name="str4" id="str4" disabled> <br>
<input type="radio" name="tipoRicerca" id="az" OnClick="changeRicercaTecnico()" value="azienda">Azienda<input type="text" name="str5" id="str5" disabled> <br>
<input type="radio" name="tipoRicerca" id="qu" OnClick="changeRicercaTecnico()" value="qualifica">Qualifica<input type="text" name="str6" id="str6" disabled> <br>
<br><input type="submit" value="Cerca">
</form><br>
END;
$table_head =  array("Id","Nome","Cognome","DataNascita","Telefono","Azienda","Qualifica");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {
  table_row($row);
}
table_end();
end_body();
page_end();
?>
