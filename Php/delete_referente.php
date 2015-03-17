<?php

require("library.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE);

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Conferma eliminazione referente");
menu();

start_body();

echo "
<B><H3>Conferma eliminazione referente.</H3></B><br>
";


//Salvo in variabili i dati provenienti dal form
$id=$_POST["idPersona"];



$conn=connectDB();
$query="DELETE FROM Referenti WHERE idPersona='$id'";
$result=mysql_query($query, $conn);
$query="DELETE FROM Persone WHERE idPersona='$id'";
$result=mysql_query($query, $conn);


end_body();
page_end();
?>
