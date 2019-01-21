<?php
require('v3-model-auth.php');

$sEmail='';
$sPassword='';

if ($argc!=3) {
  die("Erreur paramètres incorrects: php " . $argv[0] . " <email> <password>");
}
else {
  $sEmail=$argv[1];
  $sPassword=$argv[2];
}

createUser($sEmail, $sPassword);
