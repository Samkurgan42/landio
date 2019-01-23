<?php
require('v3-model-auth.php');

if ($argc!==3) {
    die( "Erreur paramètres\n" . "php ". $argv[0]. " email motdepasse\n" );
}


createUser($argv[1], $argv[2]);

//print_r($argv);
//echo "argc" . $argc;
