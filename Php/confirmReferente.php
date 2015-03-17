<?php

require("library.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE);

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Conferma inserimento referente");
menu();

start_body();

echo "
<B><H3>Conferma inserimento referente.</H3></B><br>
";


//Salvo in variabili i dati provenienti dal form
$nome=$_POST["nome"];
$cognome=$_POST["cognome"];
$datanascita=$_POST["datanascita"];
$telefono=$_POST["telefono"];
$ruolo=$_POST["ruolo"];

echo "Riepilogo: <br><br>
Nome: $nome<br>
Cognome: $cognome<br>
Data Nascita: $dataNascita<br>
Telefono: $telefono<br>
Ruolo: $ruolo<br>
";


$conn=connectDB();
$query="SELECT MAX(idPersona) FROM Persone";
$result=mysql_query($query, $conn);
$id=mysql_fetch_array($result);
$id[0]+=1;
$query="INSERT INTO Persone VALUES 
('$id[0]','$nome','$cognome','$datanascita','$telefono')";
$result=mysql_query($query, $conn);
$query="INSERT INTO Referenti VALUES 
('$id[0]','$ruolo')";
$result=mysql_query($query, $conn);



end_body();
page_end();
?>
