<?php

require("library.php");

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Inserimento nuovo rapporto tecnico");
menu();

start_body();

echo "<form action='confirmRapporto.php' method=POST name='rapporto' id='rapporto' onSubmit='return checkForm();' >";

echo "
<B><H3>Compilare i campi</H3></B><br>
";

$civab=$_GET["civab"];

$conn=connectDB();

echo<<<END
  Ubicazione: <input type="text" name="ubicazione" id="ubicazione"> <font color='red'>*</font> <br>
  Data: <input type="date" name="data" id="data"> <font color='red'>*</font><br><br>
   Note:<br>
  <textarea rows=10 cols=50 name="note"></textarea>
END;

//Seleziono i referenti
$query="SELECT idPersona, p.Nome, p.Cognome FROM Persone p NATURAL JOIN Referenti r";
$result=mysql_query($query, $conn);

echo<<<END
  <br>
  Referente:
  <select name="referente"> 
END;

while($row=mysql_fetch_array($result))
{
echo<<<END
  <option value="$row[0]">$row[1] $row[2]</option>
END;
}
echo<<<END
  </select><font color='red'>*</font>
END;

//Seleziono i tecnici
$query="SELECT idPersona, p.Nome, p.Cognome FROM Persone p NATURAL JOIN Tecnici t";
$result=mysql_query($query, $conn);

echo<<<END
  <br>
  Tecnico:
  <select name="tecnico"> 
END;

while($row=mysql_fetch_array($result))
{
echo<<<END
  <option value="$row[0]">$row[1] $row[2]</option>
END;
}
echo<<<END
  </select><font color='red'>*</font>
END;

//Seleziono gli ospedali
$query="SELECT o.idOspedale, o.Nome, o.Citta FROM Ospedali o";
$result=mysql_query($query, $conn);

echo<<<END
  <br>
  Ospedale:
  <select name="ospedale">
END;

while($row=mysql_fetch_array($result))
{
echo<<<END
  <option value="$row[0]">$row[1] | $row[2]</option>
END;
}
echo<<<END
  </select><font color='red'>*</font><br><br>
END;

//Apparecchiatura

$query="SELECT * FROM Apparecchiature WHERE Civab='$civab'";
$result=mysql_query($query, $conn);

echo<<<END
  <hr width=100%><br>
  <input type="radio" name="selectApp" value="presente"  onclick="changeApp();" id="radioPres" checked>
  <b>Selezione apparecchiatura esistente</b>
  <br>
  <select name="serial" id="pres"> <font color='red'>*</font>
END;

while($row=mysql_fetch_array($result))
  echo "<option value='$row[0]'>$row[0] | $row[1] | $row[2] | $row[3] | $row[4]</option>";

echo<<<END
  <select>
END;





//modulo per inserimento apparecchiatura

echo<<<END
  <hr width=100% color="red">
  <input type="radio" name="selectApp" value="nuova" onclick="changeApp();" id="radioNew"><b>Inserimento nuova apparecchiatura - Dati apparecchiatura</b> <br>
  Seriale: <input name="serialeApparecchiatura" id="newSer" disabled> <font color='red'>*</font> <br>
  Marca: <input name="marcaApp"  id="newMar" disabled> <font color='red'>*</font> <br>  
  Modello: <input name="modelloApp"  id="newMod" disabled> <font color='red'>*</font> <br>
  Codice Inventario: <input name="codiceApp" id="newCod" disabled> <font color='red'>*</font> <br>
END;

echo<<<END
  Civab: $civab<input type="hidden" name="civabApp" value="$civab"><br>
END;

echo<<<END
  <hr width=100%>
  <br>
END;

//Selezione dei test
$query="SELECT t.idTest, t.Descrizione FROM CompatibileCon cn NATURAL JOIN Test t WHERE cn.Civab='$civab'";
$result=mysql_query($query, $conn);

$i=0;

  echo "<b>Test</b>";
$table_head =  array("Id","Descrizione","OK","NO","N.A.");
table_start($table_head);
while ($row = mysql_fetch_row($result)) {
  $radio[0]="<input type=\"radio\" name=\"test$row[0]\" value='SI' checked/>";
  $radio[1]="<input type=\"radio\" name=\"test$row[0]\" value='NO' />";
  $radio[2]="<input type=\"radio\" name=\"test$row[0]\" value='N.A.' />";
  echo "<input type='hidden' name='desc$i' value='$row[0]'";
  table_row(array_merge($row,$radio));
  $i++;
}

table_end();
echo "
  <br><br>
  <input type='hidden' name='numTest' value='$i'>
  <br>
  <font color='red'>* Campo obbligatorio</font> <br>
  <input type='submit' value='Inserisci Rapporto' name='btnInvia'>
  </form>
";

end_body();
page_end();
?>
