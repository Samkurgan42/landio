<?php
require('v3-model-auth.php');

$bErreur = false;

if ($argc!==3) {
    die( "Erreur paramètres\n" . "php ". $argv[0]. " email motdepasse\n" );
}

$sEmail = $argv[1];
$sPassword = $argv[2];

if (filter_var($sEmail, FILTER_VALIDATE_EMAIL)===false) {
    $bErreur = true;
    echo "Erreur: email incorrect\n";
}

if ( (! $bErreur) && (strlen($sPassword)<4) ){
    $bErreur = true;
    echo "Erreur: mot de passe trop petit\n";
}

if ( (! $bErreur)  ){
    $bUnChiffre = false;
    $bUneMaj = false;
    $bUneMin = false;
    $bUnSpec = false;
    $bPasswordOK = true;

    $aCaracSpeciaux = [
        33,                 // !
        34,                 // "
        35,                 // #
        36,                 // $
        37,                 // %
        43,                 // +
        45,                 // -
        46                  // .
    ];

    for ($i=0; $i < strlen($sPassword); $i++) {
        $sChar = substr($sPassword,$i,1);

        $bValid = false;
        if (ctype_digit($sChar)) {
            $bValid = true;
            $bUnChiffre = true;
        }
        if (ctype_upper($sChar)) {
            $bValid = true;
            $bUneMaj = true;
        }
        if (ctype_lower($sChar)) {
            $bValid = true;
            $bUneMin = true;
        }

        if (in_array(ord($sChar), $aCaracSpeciaux)) {
            $bValid = true;
            $bUnSpec = true;
        }

        if ($bValid) {
            $bPasswordOK = false;
        }

    }

    if (!$bUnChiffre || !$bUneMaj || !$bUneMin || !$bUnSpec) {
        $bPasswordOK = false;
    }

    if (!$bPasswordOK) {
        $bErreur = true;
        echo "Erreur: Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial\n";
    }
}

if ($bErreur === false) {
    createUser($sEmail, $sPassword);
}

//print_r($argv);
//echo "argc" . $argc;
