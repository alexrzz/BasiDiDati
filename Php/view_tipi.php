<?php

require("library.php");

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Tabella Tipi");
menu();

start_body();

echo "
<B><H3>Tipi apparecchiature</H3></B><br>
";

$conn=connectDB();
$query="SELECT * FROM Tipi";

$result=mysql_query($query, $conn);

$table_head =  array("Civab","Descrizione");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {
  table_row($row);
}

end_body();
page_end();
?>
