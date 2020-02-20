<?php

    $host = "51.159.55.113";
    $user = "support";
    $pass = "vas@2020";
    $dateBaseName = "vtit_vtsms";

    $connect=@mysql_connect($host, $user, $pass) or die("erreur de connexion a la BD");
    $select=@mysql_select_db($dateBaseName) or die("erreur de selection de la BD");

?>