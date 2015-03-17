<?php

require("library.php");

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Tabella Test");
menu();

start_body();

echo "
<B><H3>Test</H3></B><br>
";

$conn = connectDB();

$query="SELECT * FROM Test";

$result=mysql_query($query, $conn);

$table_head =  array("Id","Descrizione");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {
  table_row($row);
}

table_end();

end_body();
page_end();
?>
