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

// Terme recherche
$sSearch = '';
if (isset($_POST['search2'])) {
    $sSearch = $_POST['search2'];
} elseif (isset($_POST['search1'])) {
    $sSearch = $_POST['search1'];
}

if (($sSearch=='$login') && ($sLogStatus!='login') ){
    $_SESSION['next-view'] = 'index';
    header("location: v2-login.php");
}

if ( ($sSearch=='$logout') && ($sLogStatus=='login') ){
    $_SESSION = array();
    session_destroy();
}

if ($sSearch=='$contact') {
    if ($sLogStatus=='login') {
        header("location: v2-contact.php");
    } else {
        // Se connecter puis aller sur la page contact
        $_SESSION['next-view'] = 'contact';
        header("location: v2-login.php");
    }
}

printStartHtml();
printNavigation();
printHeroSection();
printDebug();
printIntro();
prinFeatures();
printPricing();
printTextRow();
printNews();
printSignup();
printFooter();
printEndHtml();
