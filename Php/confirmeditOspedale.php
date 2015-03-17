<?php

require("library.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE);

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Conferma modifica ospedale");
menu();

start_body();

echo "
<B><H3>Conferma modifica ospedale.</H3></B><br>
";


//Salvo in variabili i dati provenienti dal form
$id=$_POST["id"];
$nome=$_POST["nome"];
$citta=$_POST["citta"];
$indirizzo=$_POST["indirizzo"];
$telefono=$_POST["telefono"];

echo "Riepilogo: <br><br>
Id: $id<br>
Nome: $nome<br>
Città: $citta<br>
Indirizzo: $indirizzo<br>
Telefono: $telefono<br>
";


$conn=connectDB();
$query="UPDATE Ospedali
SET Nome='$nome', Citta='$citta', Indirizzo='$indirizzo', Telefono='$telefono'
WHERE idOspedale=$id";
$result=mysql_query($query, $conn);



end_body();
page_end();
?>
