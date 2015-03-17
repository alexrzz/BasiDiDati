<?php

require("library.php");

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Inserimento nuovo referente");
menu();

start_body();

echo "<form action='confirmReferente.php' method=POST name='referente' id='referente' onSubmit='return checkReferente();' >";

echo "
<B><H3>Compilare i campi</H3></B><br>
";


$conn=connectDB();

echo<<<END
  Nome: <input type="text" name="nome" id="nome"> <font color='red'>*</font> <br>
  Cognome: <input type="text" name="cognome" id="cognome"> <font color='red'>*</font> <br>
  Data Nascita : <input type="date" name="datanascita" id="datanascita"> <font color='red'>*</font> <br>
  Telefono: <input type="text" name="telefono" id="telefono" size="10" maxlength="10"> <font color='red'>*</font><br>
  Ruolo: <input type="text" name="ruolo" id="ruolo"> <font color='red'>*</font> <br>
END;

echo "
  <br><br>
  <font color='red'>* Campo obbligatorio</font> <br>
  <input type='submit' value='Inserisci Referente' name='btnInvia'>
  </form>
";

end_body();
page_end();
?>
