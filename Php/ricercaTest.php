<?php

require("library.php");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Ricerca Test");
menu();
start_body();
echo "
<B><H3>Inserire i campi per la ricerca</H3></B><br>
";
$conn=connectDB();
$str1 = $_GET["str1"];
$query="SELECT * FROM Test";
if($str1)
{
	$query="SELECT idTest,Descrizione FROM Test WHERE Descrizione LIKE '%$str1%'";
}
$result=mysql_query($query, $conn);
echo<<<END
<form action="ricercaTest.php" method="GET" name="ricerca" id="ricerca">
Descrizione <input type="text" name="str1" id="str"><br><br>
<input type="submit" value="Cerca"><br><br>
</form>
END;
$table_head =  array("Id","Descrizione");
table_start($table_head);
while ($row = mysql_fetch_row($result)) 
{
	table_row($row);
}
table_end();
end_body();
page_end();
?>
