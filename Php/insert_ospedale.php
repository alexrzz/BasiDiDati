<?php

require("library.php");

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Inserimento nuovo ospedale");
menu();

start_body();

echo "<form action='confirmOspedale.php' method=POST name='ospedale' id='ospedale' onSubmit='return checkOspedale();' >";

echo "
<B><H3>Compilare i campi</H3></B><br>
";


$conn=connectDB();

echo<<<END
  Nome: <input type="text" name="nome" id="nome"> <font color='red'>*</font> <br>
  Citta: <input type="text" name="citta" id="citta"> <font color='red'>*</font><br>
  Indirizzo: <input type="text" name="indirizzo" id="indirizzo"> <font color='red'>*</font><br>
  Telefono: <input type="text" name="telefono" id="telefono" size="10" maxlength="10"> <font color='red'>*</font><br>
END;

echo "
  <br><br>
  <font color='red'>* Campo obbligatorio</font> <br>
  <input type='submit' value='Inserisci Ospedale' name='btnInvia'>
  </form>
";

end_body();
page_end();
?>
