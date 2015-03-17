<?php

require("library.php");

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Modifica ospedale");
menu();

start_body();

echo "<form action='confirmeditOspedale.php' method=POST name='ospedale' id='ospedale' onSubmit='return checkOspedale();' >";

echo "
<B><H3>Compilare i campi</H3></B><br>
";


$conn=connectDB();
$osp=$_POST["idOspedale"];
$query="SELECT * FROM Ospedali WHERE idOspedale='$osp'";
$result=mysql_query($query, $conn);
$row = mysql_fetch_row($result);

echo<<<END
  Id: <input type="hidden" name="id" id="id" value="$osp"> $osp<br>
  Nome: <input type="text" name="nome" id="nome" value="$row[1]"> <font color='red'>*</font> <br>
  Citta: <input type="text" name="citta" id="citta" value="$row[2]"> <font color='red'>*</font><br>
  Indirizzo: <input type="text" name="indirizzo" id="indirizzo" value="$row[3]"> <font color='red'>*</font><br>
  Telefono: <input type="text" name="telefono" id="telefono" value="$row[4]" size="10" maxlength="10"> <font color='red'>*</font><br>
END;

echo "
  <br><br>
  <font color='red'>* Campo obbligatorio</font> <br>
  <input type='submit' value='Modifica Ospedale' name='btnInvia'>
  </form>
";

end_body();
page_end();
?>
