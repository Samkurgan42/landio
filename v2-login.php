<?php
require('v2-layout.php');

define("INDEX_PAGE", "v2-index.php");

// recuperation session
session_start();
if (!isset($_SESSION['log-status']) || !isset($_SESSION['log-email'])) {
    $_SESSION['log-status'] = 'logout';
    $_SESSION['log-email'] = '';
}
$sLogStatus = $_SESSION['log-status'];
$sLogEmail = $_SESSION['log-email'];

if ($sLogStatus=='logout') {
    // ecran de connexion
    printStartHtml();
    printNavigation();
    printHeroSection();
    printDebug();
    printLogin();
    printFooter();
    printEndHtml();
    $_SESSION['log-status'] = 'check-login';
} elseif ($sLogStatus=='check-login') {
    // Controle login
    $sEmail = '';
    if (isset($_POST['log-email'])) {
        $sEmail = $_POST['log-email'];
    }
    $sPassword = '';
    if (isset($_POST['log-password'])) {
        $sPassword = $_POST['log-password'];
    }

    // mot de passe toto quelque soit l'utilisateur
    $sPasswordHash = password_hash('toto', PASSWORD_DEFAULT);
    if(password_verify($sPassword, $sPasswordHash)){
        $_SESSION["log-status"] = 'login';
        $_SESSION["log-email"] = $sEmail;

        // si on a demande $contact alors le prochain ecran est v2-contact.php
        // si on a demande $login alors le prochain ecran est v2-index.php
        if (isset($_SESSION["next-view"])) {
            $sNextView = $_SESSION["next-view"];
        } else {
            $sNextView = 'index';
        }
        header("location: v2-".$sNextView.".php");

    } else{
        // Mot de passe incorrect
        printStartHtml();
        printNavigation();
        printHeroSection();
        printDebug();
        printLogin();
        printFooter();
        printEndHtml();
        $_SESSION["log-status"] = 'logout';
        $_SESSION["log-email"] = '';
    }

} else {
    header("location: v2-index.php");
}
