<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

require("library.php");
page_start("Esercitazione di Basi di Dati - Registrazione");

if ($_POST['submit']) {
  /* recupera i dati immessi */
  $login=$_POST['login'];
  $password=$_POST['password'];
  $confirm=$_POST['confirm'];
  
  /* si verifica se login e password soddisfano opportuni
     criteri ... alfanumerici, lunghezza, ecc. */
  if (!ctype_alnum($login) || ! ctype_alnum($password))
    $error="Login e password devono essere alfanumerici e non vuoti";
  elseif  ($password != $confirm)
    /* verifica se le password e la conferma sono uguali */
    $error = "Errore! Password e Conferma sono diverse. ";
  elseif (get_pwd($login))
    $error= "Errore! Login gia` in uso. ";
  else {
    /* inserisce il login e password nella BD */
    new_user($login, $password);
  };
};

if ($error || ! $_POST['submit']) {
  /* se c'era un errore nei dati oppure si arriva alla pagina per la
     prima volta, visualizza la form */ 
  echo<<<END
<form method="post" action="register.php">
  <fieldset>
     <p>
       <label for="login">Login:</label>
       <input type="text" id="login" name="login" value="$login" />
     </p>
     <p>
       <label for="password">Password:</label>
       <input type="password" id="password" name="password" maxlength="8" />
     </p>
     <p>
       <label for="confirm">Confirm password:</label>
        <input type="password" id="confirm" name="confirm" maxlength="8" />
     </p>
     <input type="submit" name="submit" value="Vai" />
</form>
END;
  
  if ($error) {
    echo "<br /><br /><b>$error</b><br />";
  };
} else {
  /* altrimenti registrazione ok! */
  echo "Registrazione effettuata con successo! " .
    "Vai al <a href=\"login.php\">login</a>.";
};

page_end();
?>
