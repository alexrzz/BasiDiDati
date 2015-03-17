<?php

require("library.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE);

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Conferma modifica referente");
menu();

start_body();

echo "
<B><H3>Conferma modifica referente.</H3></B><br>
";


//Salvo in variabili i dati provenienti dal form
$id=$_POST["id"];
$nome=$_POST["nome"];
$cognome=$_POST["cognome"];
$dataNascita=$_POST["datanascita"];
$telefono=$_POST["telefono"];
$ruolo=$_POST["ruolo"];

echo "Riepilogo: <br><br>
Id: $id<br>
Nome: $nome<br>
Cognome: $cognome<br>
Data Nascita: $dataNascita<br>
Telefono: $telefono<br>
Ruolo: $ruolo<br>
";


$conn=connectDB();
$query="UPDATE Referenti
SET Ruolo='$ruolo'
WHERE idPersona=$id";
$result=mysql_query($query, $conn);
$query="UPDATE Persone
SET Telefono='$telefono'
WHERE idPersona=$id";
$result=mysql_query($query, $conn);


end_body();
page_end();
?>
