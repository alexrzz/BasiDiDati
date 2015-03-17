<?php

require("library.php");
error_reporting(E_ERROR | E_PARSE);
page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Query 3");
menu();

start_body();

echo "
<B><H3>Query 3</H3></B><br>
";
echo"Nome e Cognome di Referente e Tecnico per rapporti effettuati prima<br>
 del 7 dicembre 1999 e tali che tutte le apparecchiature coinvolte sono Autoclavi.<br><br>";
$conn=connectDB();
$query="SELECT p.Nome,p.Cognome,p1.Nome,p1.Cognome
FROM RapportiTecnici rt JOIN Persone p ON rt.idReferente=p.idPersona JOIN Persone p1 ON rt.idTecnico=p1.idPersona
WHERE rt.Data<'1999-12-07' AND
NOT EXISTS (SELECT * 
      FROM Apparecchiature a 
      WHERE rt.serialeApparecchiatura=a.serialeApparecchiatura 
      AND a.Civab IN(SELECT tp.Civab FROM Tipi tp WHERE tp.Descrizione!=\"AUTOCLAVE\"))";
$result=mysql_query($query, $conn);

$table_head =  array("NomeReferente","CognomeReferente","NomeTecnico","CognomeTecnico");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {
  table_row($row);
}
table_end();
end_body();
page_end();
?>
