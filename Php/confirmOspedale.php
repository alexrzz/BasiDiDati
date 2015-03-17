<?php

require("library.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE);

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Conferma inserimento ospedale");
menu();

start_body();

echo "
<B><H3>Conferma inserimento ospedale.</H3></B><br>
";


//Salvo in variabili i dati provenienti dal form
$nome=$_POST["nome"];
$citta=$_POST["citta"];
$indirizzo=$_POST["indirizzo"];
$telefono=$_POST["telefono"];

echo "Riepilogo: <br><br>
Nome: $nome<br>
Città: $citta<br>
Indirizzo: $indirizzo<br>
Telefono: $telefono<br>
";


$conn=connectDB();
$query="SELECT MAX(idOspedale) FROM Ospedali";
$result=mysql_query($query, $conn);
$id=mysql_fetch_array($result);
$id[0]+=1;
$query="INSERT INTO Ospedali VALUES 
('$id[0]','$nome','$citta','$indirizzo','$telefono')";
$result=mysql_query($query, $conn);



end_body();
page_end();
?>
