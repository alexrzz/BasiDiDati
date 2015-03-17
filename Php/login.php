<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);


session_start();
if ($_SESSION['logged'])
  header("Location: home.php");

require("library.php");



$conn = connectDB();

$login=$_POST['login'];
$pwd=$_POST['password'];

if ($login && (SHA1($pwd) == get_pwd($login))) {
  $_SESSION['logged']=$login;
  header("Location: home.php");
} else {
  page_start("Progetto Basi Di Dati - A.A. 2012-2013");
};

echo<<<END

<div style='left:50%; right:50%; padding-top:10%;'>

<form action="login.php" method="POST">
<center>
Username: <input type="text" name="login"><br>
Password: <input type="password" name="password"><br>
<input type="submit" value="Login">
<p>
  <a href="register.php">Registrazione</a>
</p>
</center>
</form>



</div>
END;

if ($login or $pwd) {
     echo "<p>Autenticazione fallita!</p>";
   };

page_end();
?>
