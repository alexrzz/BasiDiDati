<?php

require("library.php");
error_reporting(E_ERROR | E_PARSE);
page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Query 5");
menu();

start_body();

echo "
<B><H3>Query 5</H3></B><br>
";
echo" Visualizzare tutti i test compatibili con l'apparecchiatura di seriale FDHAJ-245867TG3 tali che <br>
ognuno fa parte di un rapporto tecnico di tipologia Generico ed è relativo ad un ospedale romano.<br><br>";
$conn=connectDB();
$query="SELECT t.Descrizione
FROM Apparecchiature a NATURAL JOIN Tipi tp JOIN CompatibileCon c ON c.Civab=tp.Civab JOIN Test t ON t.idTest=c.idTest
WHERE serialeApparecchiatura=\"FDHAJ-245867TG3\" AND  
NOT EXISTS (SELECT * 
      FROM Contiene ct NATURAL JOIN RapportiTecnici rt NATURAL JOIN Ospedali o
      WHERE ct.idTest=t.idTest AND rt.Tipologia!=\"Generico\" AND o.Citta!=\"Roma\")";
$result=mysql_query($query, $conn);

$table_head =  array("Descrizione");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {
  table_row($row);
}
table_end();
end_body();
page_end();
?>
