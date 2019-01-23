<?php
require('v3-view.php');
require('v3-model-auth.php');

session_start();

$sLogStatus = 'logout';
$sUserEmail = '';
if (isset($_SESSION['log-status'])) {
    $sLogStatus = $_SESSION['log-status'];
    $sUserEmail = $_SESSION['log-email'];

} else {
    $_SESSION['log-status'] = $sLogStatus;
    $_SESSION['log-email'] = $sUserEmail;
}

if ($sLogStatus=='check-login') {
//    $sEmail = $_POST['log-email'] ?? '';  PHP 7
//    $sEmail = isset($_POST['log-email'] ? $_POST['log-email'] : ''; //PHP 5
    $sEmail = "";
    if (isset($_POST['log-email'])) {
        $sEmail = $_POST['log-email'];
    }

    $sPassword = "";
    if (isset($_POST['log-password'])) {
        $sPassword = $_POST['log-password'];
    }

    if ( ($sEmail !== '') || ($sPassword !== '') ) {
        $bLogin = verifyPassword($sEmail,$sPassword);
        if ($bLogin) {
            $_SESSION['log-status'] = 'login';
            $_SESSION['log-email'] = $sEmail;


        } else {
            echo "mot de passe incorrect";
        }
    }

}



$sCmd = '';

if (isset($_POST['search'])) {
    switch ($_POST['search']) {
        case '$contact':
        case '$contacts':
            $sCmd = 'contact';
            break;
        case '$login':
            $sCmd = 'login';
            break;
        case '$logout':
            $sCmd = 'logout';
            break;
        case '$index':
            $sCmd = 'index';
            break;
        default:
            $sCmd = 'recherche';
            $sSearch = $_POST['search'];
            break;
    }
}

    switch ($sCmd) {
        case 'index':
            printPage('index');
            break;
        case 'logout':
            $_SESSION['log-status'] = 'logout';
            $_SESSION['log-email'] = '';
            session_destroy();

            printPage('index');
            break;
        case 'login':
            $_SESSION['log-status'] = 'check-login';
            printPage('login');
            break;
        case 'recherche':
            printPage('recherche');
            break;
        case 'contact':
            if ($sLogStatus=='login') {
                printPage('contact');
            } else {
                $_SESSION['log-status'] = 'check-login';
                $_SESSION['next-view'] = 'contact';
                printPage('login');
            }
            break;
        default:
            printPage('index');
    }


//printPage('contact');
//printPage('login');

//$bLoggedIn = verifyPassword('toto@greta.fr', '0+0');
