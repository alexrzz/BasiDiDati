<?php

require("library.php");

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Tabella Rapporti Tecnici");
menu();

start_body();

echo "
<B><H3>Rapporti Tecnici</H3></B><br>
";

$conn=connectDB();
$query="SELECT idRapporto,serialeApparecchiatura,Ubicazione,Data,Tipologia,idTecnico,idReferente,idOspedale FROM RapportiTecnici";

$result=mysql_query($query, $conn);

$table_head =  array("Id","serialeApparecchiatura","Ubicazione","Data","Tipologia","Tecnico","Referente","Ospedale","Test","Note");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {

$Qtecnico="SELECT Nome,Cognome,idPersona FROM Persone WHERE idPersona='$row[5]'";
$res=mysql_query($Qtecnico, $conn);
$tecnico=mysql_fetch_array($res);
$tecnico = "<a href='view_tecnici.php?idTecnico=$tecnico[2]&request=view'>$tecnico[0] $tecnico[1]</a>";

$Qreferente="SELECT Nome,Cognome,idPersona FROM Persone WHERE idPersona='$row[6]'";
$res=mysql_query($Qreferente, $conn);
$referente=mysql_fetch_array($res);
$referente = "<a href='view_referenti.php?idReferente=$referente[2]&request=view'>$referente[0] $referente[1]</a>";

$Qospedale="SELECT Nome FROM Ospedali WHERE idOspedale='$row[7]'";
$res=mysql_query($Qospedale, $conn);
$ospedale=mysql_fetch_array($res);
$ospedale = $ospedale[0];

$test = "<a href='testRapporto.php?idRapporto=$row[0]'>Test</a>";
$apparecchiatura = "<a href='view_apparecchiature.php?seriale=$row[1]'>$row[1]</a>";

$note = "<a href='view_note.php?idRapporto=$row[0]'>Note</a>";

$stampa = array("$row[0]","$apparecchiatura","$row[2]","$row[3]","$row[4]","$tecnico","$referente","$ospedale","$test","$note");

  table_row($stampa);
}

end_body();
page_end();
?>
