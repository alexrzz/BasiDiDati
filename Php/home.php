<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require("library.php");

page_start("Progetto Basi Di Dati - A.A. 2012-2013");
subtitle("Ruzzante Alex - Vegro Federico");

menu();

start_body();

echo "
<B><H3>Abstract</H3></B>
Il progetto prevede la gestione dei processi relativi alla manutenzione preven-<BR>
tiva su apparecchiature elettromedicali. In particolare, vengono elaborati i<BR>
rapporti tecnici relativi a ciascun intervento effettuato da un tecnico.<BR>
Inoltre vengono considerati committenti e le varie apparecchiature.<BR>
";

end_body();


page_end();
?>
