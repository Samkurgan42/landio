<?php
require('v3-view.php');
require('v3-model-auth.php');
require('v3-model-contact.php');

define("DB_HOST", "localhost");
define("DB_USER", "user_landio");
define("DB_PWD",  "pwd_landio");
define("DB_BASE", "landio");

// variables globales
$dbLink = 0;

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

$sCmd = '';
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

    if ( ($sEmail !== '') && ($sPassword !== '') &&
         filter_var($sEmail, FILTER_VALIDATE_EMAIL)!==false ) {
        $bLogin = verifyPassword($sEmail,$sPassword);
//        echo "bLogin=$bLogin<br>";
        if ($bLogin) {
            $_SESSION['log-status'] = 'login';
            $_SESSION['log-email'] = $sEmail;
            $sCmd = $_SESSION['next-view'];
            $sLogStatus = $_SESSION['log-status'];
            //echo "login correct commande $sCmd |".$_SESSION['log-status']."<br>";
        } else {
            echo "mot de passe incorrect";
        }
    } else {
        $_SESSION['log-status'] = 'logout';
        $_SESSION['log-email'] = '';
    }
}

$sSearch = '';
if (isset($_POST['search2'])) {
    $sSearch = $_POST['search2'];
} elseif (isset($_POST['search1'])) {
    $sSearch = $_POST['search1'];
}


if (($sCmd==='') && ($sSearch!=='')) {
    switch ($sSearch) {
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
            $sSearch = $sSearch;
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
            $_SESSION['next-view'] = 'index';
            printPage('login');
            break;
        case 'recherche':
            printPage('recherche');
            break;
        case 'contact':
            if ($sLogStatus=='login') {
                openDB();
                $aListeContact = listContact();
                closeDB();
                printPage('contact', $aListeContact);
            } else {
                $_SESSION['log-status'] = 'check-login';
                $_SESSION['next-view'] = 'contact';
                printPage('login');
            }
            break;
        default:
            if (
                isset($_POST['leadname'])  &&
                isset($_POST['leademail']) &&
                $_POST['leadname']  !== '' &&
                $_POST['leademail'] !== ''
            ) {
                openDB();
                insertContact( $_POST['leadname'], $_POST['leademail']);
                closeDB();
            }

            printPage('index');
    }
