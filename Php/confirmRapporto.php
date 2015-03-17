<?php

require("library.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE);

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Conferma inserimento rapporto");
menu();

start_body();

echo "
<B><H3>Conferma inserimento rapporto.</H3></B><br>
";

$conn=connectDB();

//Salvo in variabili i dati provenienti dal form
$selectApp=$_POST["selectApp"];
$ubicazione=$_POST["ubicazione"];
$data=$_POST["data"];
$note=$_POST["note"];
$referente=$_POST["referente"];
$tecnico=$_POST["tecnico"];
$ospedale=$_POST["ospedale"];

if($selectApp=="nuova")
  $seriale=$_POST["serialeApparecchiatura"];
else  $seriale=$_POST["serial"];

$marca=$_POST["marcaApp"];
$modello=$_POST["modelloApp"];
$codice=$_POST["codiceApp"];
$civabApp=$_POST["civabApp"];
$numTest=$_POST["numTest"];

$esiti = array();
for($i=0;$i<$numTest;$i++)
{
  $id=$_POST["desc$i"];
  $esiti["$id"] = $_POST["test$id"];
}

echo "Riepilogo: <br><br>
Ubicazione: $ubicazione<br>
Data: $data<br>
Note: $note<br>
Referente: $referente<br>
Tecnico: $tecnico<br>
Ospedale: $ospedale<br>
Seriale Apparecchiatura: $seriale<br>
Marca: $marca<br>
Modello: $modello<br>
Codice: $codice<br>
Civab: $civabApp<br>
";

for($i=0;$i<$numTest;$i++)
{
  $id=$_POST["desc$i"];
  echo $id."->".$esiti["$id"]."<br>";
}

$query="SELECT MAX(idRapporto) FROM RapportiTecnici";
$result=mysql_query($query, $conn);
$idRapp=mysql_fetch_array($result);
$idRapp[0]+=1;

if($id<=28)
  $tipologia="Generico";
else  $tipologia="Specifico";

if($selectApp=="nuova")
{
  $query="INSERT INTO Apparecchiature VALUES ('$seriale','$marca','$modello','$codice','$civabApp')";
  $result=mysql_query($query, $conn);
}

$query="INSERT INTO RapportiTecnici VALUES ($idRapp[0],'$ubicazione','$data','$tipologia','$note','$tecnico','$referente','$ospedale','$seriale')";
$result=mysql_query($query, $conn);

for($i=0;$i<$numTest;$i++)
{
  $id=$_POST["desc$i"];
  echo $id."->".$esiti["$id"]."<br>";
  $esito =$esiti["$id"];
  $query="INSERT INTO Contiene VALUES ($idRapp[0],'$id','$esito')";
  $result=mysql_query($query, $conn);
}

echo $tipologia;

end_body();
page_end();
?>
