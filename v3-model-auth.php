<?php

//createUser('toto@greta.fr', '0+0');
//$aAuth = getUserAuth('toto@greta.fr');
//$bLoggedIn = verifyPassword('toto@greta.fr', '0+0');


function verifyPassword($sEmail,$sPassword)
{
    $bAllowed = false;

    $aAuth = getUserAuth($sEmail);

    if (password_verify($sPassword, $aAuth['password_hash'])) {
//        echo 'Le mot de passe est valide !';
        $bAllowed = true;
    }

    return($bAllowed);
}

function getUserAuth($sEmail)
{
    $aAuth = array();

    $sFilename = getFilename($sEmail);

    if (file_exists($sFilename)) {
        $fp = fopen($sFilename, "r");
        $sJson = fread($fp, 1024);
        fclose($fp);

//        echo "sJson=$sJson\n";
        $aAuth = json_decode($sJson, true);
    }

    return($aAuth);
}

function createUser($sEmail, $sPassword)
{
    $sFilename = getFilename($sEmail);
//    echo "sEmail:$sEmail\n";
//    echo "sFilename:$sFilename\n";
    /*
    if (file_exists($sFilename)) {
        unlink($sFilename);
    }
    */
    $sPasswordHash = password_hash($sPassword, PASSWORD_DEFAULT);

    $aAuth = array(
        "email" => $sEmail,
        "password_hash" => $sPasswordHash
    );
    $sJson = json_encode($aAuth);

    $fp = fopen($sFilename, "w");
    fwrite($fp, $sJson);
    fclose($fp);

}

function getFilename($sEmail)
{
    $sFilename = 'user_'. str_replace(['@','.'], ['-','-'], $sEmail) . '.json';
    return($sFilename);
}
