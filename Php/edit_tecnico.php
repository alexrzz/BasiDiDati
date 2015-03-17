<?php

require("library.php");

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Modifica Tecnico");
menu();

start_body();

echo "<form action='confirmeditTecnico.php' method=POST name='tecnico' id='tecnico' onSubmit='return checkTecnico();' >";

echo "
<B><H3>Compilare i campi</H3></B><br>
";


$conn=connectDB();
//Salvo in variabili i dati provenienti dal form
$id=$_POST["idPersona"];
$query="SELECT p.Nome, p.Cognome, p.DataNascita, p.Telefono, t.Azienda, t.Qualifica FROM Persone p NATURAL JOIN Tecnici t
        WHERE idPersona='$id'";
$result=mysql_query($query, $conn);
$row = mysql_fetch_row($result);

echo<<<END
  Id: <input type="hidden" name="id" id="id" value="$id"> $id <br>
  Nome: <input type="hidden" name="nome" id="nome" value="$row[0]"> $row[0] <br>
  Cognome: <input type="hidden" name="cognome" id="cognome" value="$row[1]"> $row[1] <br>
  Data Nascita: <input type="hidden" name="datanascita" id="datanascita" value="$row[2]"> $row[2] <br>
  Telefono: <input type="text" name="telefono" id="telefono" value="$row[3]" size="10" maxlength="10"> <font color='red'>*</font> <br>
  Azienda: <input type="text" name="azienda" id="azienda" value="$row[4]"> <font color='red'>*</font><br>
  Qualifica: <input type="text" name="qualifica" id="qualifica" value="$row[5]"> <font color='red'>*</font><br>
END;

echo "
  <br><br>
  <font color='red'>* Campo obbligatorio</font> <br>
  <input type='submit' value='Modifica Tecnico' name='btnInvia'>
  </form>
";

end_body();
page_end();
?>
