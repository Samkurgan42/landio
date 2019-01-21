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

// Se connecter puis revenir a la page contact
if ($sLogStatus != 'login') {
    $_SESSION['next-view'] = 'contact';
    header("location: v2-login.php");
}

printStartHtml();
printNavigation();
printHeroSection();
printContact();
printFooter();
printEndHtml();
