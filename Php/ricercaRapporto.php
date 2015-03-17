<?php

require("library.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE);

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Ricerca Rapporto Tecnico");
menu();

start_body();

echo "
<B><H3>Inserire i campi per la ricerca</H3></B><br>
";

$conn=connectDB();

$str1 = $_GET["str1"];
$str2 = $_GET["str2"];
$str3 = $_GET["str3"];

  $query="SELECT idRapporto,serialeApparecchiatura,Ubicazione,Data,Tipologia,idTecnico,idReferente,idOspedale FROM RapportiTecnici";

if($str1)
{
   $query="SELECT idRapporto,serialeApparecchiatura,Ubicazione,Data,Tipologia,idTecnico,idReferente,idOspedale FROM RapportiTecnici WHERE Tipologia LIKE '$str1%'";
}
if($str2)
{
  $query="SELECT idRapporto,serialeApparecchiatura,Ubicazione,Data,Tipologia,idTecnico,idReferente,idOspedale FROM RapportiTecnici WHERE Data LIKE '$str2%'";
}
if($str3)
{
  $query="SELECT idRapporto,serialeApparecchiatura,Ubicazione,Data,Tipologia,idTecnico,idReferente,idOspedale FROM RapportiTecnici WHERE Ubicazione LIKE '$str3%'";
}

$result=mysql_query($query, $conn);


echo<<<END
<form action="ricercaRapporto.php" method="GET" name="Ricerca" id="ricerca">
<input type="radio" name="tipoRicerca" id="tip" OnClick="changeRicerca()" value="tipologia" checked>Tipologia
<select name="str1" id="str1">
<option value="">--Seleziona tipologia--</option>
<option value="Generico">Generico</option>
<option value="Specifico">Specifico</option>
</select>
 <br>
<input type="radio" name="tipoRicerca" id="dat" OnClick="changeRicerca()" value="data">Data<input type="date" name="str2" id="str2" disabled> <br>
<input type="radio" name="tipoRicerca" id="ubi" OnClick="changeRicerca()" value="ubicazione">Ubicazione<input type="text" name="str3" id="str3" disabled> <br>
<br><input type="submit" value="Cerca">
<br></form><br>
END;
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
table_end();
end_body();
page_end();
?>
