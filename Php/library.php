<?php
/***************************************/
/* FUNZIONI GENERALI PER PAGINE HTML   */
/***************************************/

/* Funzione per iniziare la pagina. In input il titolo */

function page_start($title) {
  echo<<<END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="it" lang="it">

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="script.js"></script>
<title>$title</title>
</head>
<body>
<hr />
<h2>$title</h2>
<hr />
END;
};

/* Funzione per stampare il menu */
function menu()
{

$login=authenticate() or
  die("Accesso negato. Effettuare il <a href=\"login.php\">login</a>");;

echo "Utente: <b>" . strtoupper($login) .  "</b>";
echo "<br />";
echo hyperlink("Logout", "logout.php");

echo<<<END
<div style="position:absolute; left:1%; width:auto;">
<h1>Menu</h1>
<hr width=100% align="left">
<ul style="font-size:16pt;">
<li style="color:white;background-color:grey;text-align:center;"><A HREF="home.php"><b>HOMEPAGE</b></A></li>
</ul>

<text style="font-size:16pt;"><B>TABELLE</B></text>
<ul style="font-size:16pt;">
<li style="color:white;background-color:grey;text-align:center;"><b>RAPPORTI TECNICI</b></li>
  <ul>
  <li><a href="view_rapporti.php">Visualizza</a></li>
  <li><a href="select_tipo.php">Compila rapporto</a></li>
  <li><a href="ricercaRapporto.php">Ricerca rapporto</a></li>
  </ul>
<li style="color:white;background-color:grey;text-align:center;"><b>TEST</b></li>
  <ul>
  <li><a href="view_test.php">Visualizza</a></li>
  <li><a href="ricercaTest.php">Ricerca</a></li>
  </ul>
<li style="color:white;background-color:grey;text-align:center;"><b>APPARECCHIATURE</b></li>
  <ul>
  <li><a href="view_apparecchiature.php">Visualizza</a></li>
  <li><a href="ricercaApparecchiatura.php">Ricerca</a></li>
  </ul>
<li style="color:white;background-color:grey;text-align:center;"><b>TIPI</b></li>
  <ul>
  <li><a href="view_tipi.php">Visualizza</a></li>
  <li><a href="ricercaTipo.php">Ricerca</a></li>
  </ul>
<li style="color:white;background-color:grey;text-align:center;"><b>OSPEDALI</b></li>
  <ul>
  <li><a href="view_ospedali.php?request=view">Visualizza</a></li>
  <li><a href="insert_ospedale.php">Inserisci</a></li>
  <li><a href="view_ospedali.php?request=edit">Modifica</a></li>
  <li><a href="ricercaOspedale.php">Ricerca</a></li>
  </ul>
<li style="color:white;background-color:grey;text-align:center;"><b>REFERENTI</b></li>
  <ul>
  <li><a href="view_referenti.php?request=view">Visualizza</a></li>
  <li><a href="insert_referente.php">Inserisci</a></li>
  <li><a href="view_referenti.php?request=edit">Modifica</a></li>
  <li><a href="ricercaReferente.php">Ricerca</a></li>
  </ul>
<li style="color:white;background-color:grey;text-align:center;"><b>TECNICI</b></li>
  <ul>
  <li><a href="view_tecnici.php?request=view">Visualizza</a></li>
  <li><a href="insert_tecnico.php">Inserisci</a></li>
  <li><a href="view_tecnici.php?request=edit">Modifica</a></li>
  <li><a href="ricercaTecnico.php">Ricerca</a></li>
  </ul>
<li style="color:white;background-color:grey;text-align:center;"><b>QUERY</b></li>
  <ul>
  <li><a href="Query_1.php">Query 1</a></li>
  <li><a href="Query_2.php">Query 2</a></li>
  <li><a href="Query_3.php">Query 3</a></li>
  <li><a href="Query_4.php">Query 4</a></li>
  <li><a href="Query_5.php">Query 5</a></li>
  <li><a href="Query_6.php">Query 6</a></li>
  </ul>
</ul>
</div>
END;
}

/* Funzione per iniziare il corpo della pagina */
function start_body()
{
echo<<<END
<div style="position:absolute; right:10%; left:30%; min-width:40%; width:auto;">
END;
}

/* Funzione per terminare il corpo della pagina */
function end_body()
{
echo<<<END
</div>
END;
}

/* Funzione per terminare una pagina */

function page_end() {
  echo "
</body>
</html>";
};

/* funzione per il sottotitolo */
function subtitle($str) {
  echo "<h3>$str</h3>\n";
};


/* Funzione che ritorna un link, associato ad una URL. */
function hyperlink($str, $url) {
  return "<a href=\"$url\">$str</a>";
};

/***************************************/
/* FUNZIONI PER LA GESTIONE DI TABELLE */
/***************************************/

/* Funzione per iniziare una tabella html. In input l'array che
   contiene gli header delle colonne */
function table_start($row) {
  echo "<table border=\"1\">\n";
  echo "<tr>\n";
  foreach ($row as $field) 
    echo "<th>$field</th>\n";
  echo "</tr>\n";
};
  
/* funzione per stampare un array, come riga di tabella html */
function table_row($row) {
  echo "<tr>";
  foreach ($row as $field) 
    if ($field)
      echo "<td style='max-width:500px; height:auto;'>$field</td>\n";
    else
      echo "<td>---</td>\n";
  echo "</tr>";
  };

/* funzione per chiudere una tabella html */
function table_end() {
  echo "</table>\n";
};

/***************************************/
/* CONNESSIONE AL DATABASE             */
/***************************************/

/* Si connette e seleziona il database */

function dbConnect($dbname) {

  /* da cambiare con il proprio login e password */
  $server="basidati";
  $username="aruzzant";
  $password="dRLOFR7J";


  $conn=mysql_connect($server,$username,$password)
    or die("Impossibile connettersi!");

  mysql_select_db($dbname,$conn);

  return $conn;
}

function connectDB()
{
  $conn=dbConnect("aruzzant-PR");
  return $conn;
}

function get_pwd($login) {

  /* si connette e seleziona il database da usare */
  $conn = connectDB();


  /* preparazione dello statement */
  $query= sprintf("SELECT * FROM Utenti WHERE Login=\"%s\"", 
      $login);
  
  /* Stampa la query a video ... utile per debug */
  /* echo "<b>Query</b>: $query <br />"; */
  
  $result=mysql_query($query,$conn)
    or die("Query fallita" . mysql_error($conn));

  $output=mysql_fetch_assoc($result);

  if ($output)
    return $output['Password'];
  else 
    return FALSE;
}

function new_user($login, $password) {

  /* si connette e seleziona il database da usare */
  $conn = connectDB();

  /* preparazione dello statement */

  $query= sprintf("INSERT INTO Utenti VALUES (\"%s\", \"%s\")", 
      $login, SHA1($password));
  
  /* Stampa la query a video ... utile per debug */
  /* echo "<B>Query</B>: $query <BR />"; */
  
  mysql_query($query,$conn)
    or die("Query fallita" . mysql_error($conn));
}

function authenticate() {
  session_start();
  $login=$_SESSION['logged'];
  if (! $login) {
    return FALSE;
  } else {
    return $login;
  }
}

?>
