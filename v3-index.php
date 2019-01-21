<?php
require('v3-view.php');
require('v3-model-auth.php');

session_start();

if (isset($_SESSION['log-status'])) {
    $sLogStatus = $_SESSION['log-status'];
    $sUserEmail = $_SESSION['user-email'];

} else {
    $_SESSION['log-status'] = 'logout';
    $_SESSION['user-email'] = '';

    $sLogStatus = $_SESSION['log-status'];
    $sUserEmail = $_SESSION['user-email'];
}

/* Reprendre ici !!!!!
//////////////////////
if ($_SESSION['log-status']=='check-login') {
//    $sEmail = $_POST['log-email'] ?? '';  PHP 7
//    $sEmail = isset($_POST['log-email'] ? $_POST['log-email'] : ''; //PHP 5
    if (isset($_POST['log-email'])) {
        $sEmail = $_POST['log-email'];
    } else {
        $sEmail = "";
    }

    $bLogin = verifyPassword($sUserEmail,$sPassword);
}
*/


$sCmd = '';

if (isset($_POST['search'])) {
    switch ($_POST['search']) {
        case 'contact':
        case 'contacts':
            $sCmd = 'contact';
            break;
        case 'login':
            $sCmd = 'login';
            break;
        case 'logout':
            $sCmd = 'logout';
            break;
        case 'index':
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
            $_SESSION['user-email'] = '';
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
                printPage('login');
            }
            break;
        default:
            printPage('index');
    }


//printPage('contact');
//printPage('login');

//$bLoggedIn = verifyPassword('toto@greta.fr', '0+0');
