<?php

require("library.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE);

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Selezione del tipo di apparecchiatura per un nuovo rapporto tecnico");
menu();

start_body();

echo "
<B><H3>Selezionare il tipo di apparecchiatura</H3></B><br>
";

$conn=connectDB();

$str = $_GET["str"];

if(isset($str))
  $query="SELECT * FROM Tipi WHERE Civab LIKE '$str%'";
else
  $query="SELECT * FROM Tipi";

$result=mysql_query($query, $conn);



echo<<<END
<form action="select_tipo.php" method="GET">
<input type="text" name="str">
<input type="submit" value="Filtra per Civab">
</form>
END;


echo"<form action='insert_rapporto.php' method='GET'>";

$table_head =  array(" ","Civab","Decrizione");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {
  $radio[0]="<input type=\"radio\" name=\"civab\" value=\"$row[0]\" />";
  table_row(array_merge($radio,$row));
}
table_end();

echo "<br><input type='submit' value='Invia'>";
echo"</form>";

end_body();
page_end();
?>
