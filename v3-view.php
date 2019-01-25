<?php
require('v3-layout.php');

define("INDEX_PAGE", "v3-index.php");

function printPage($sView)
{
    switch ($sView) {
        case 'index':
//            $sTitrePage = 'Page index';
//            $sFonctionLayout = 'printBodyIndex';

            printStartHtml();
            printNavigation();
            //printHeroSection();
            printHeroSectionTemplate($sView);
//            printDebug();
            printIntro();
            prinFeatures();
            printPricing();
            printTextRow();
            printNews();
            printSignup();
            printFooter();
            printEndHtml();


            break;
        case 'contact':
//            $sTitrePage = 'Page contact';
//            $sFonctionLayout = 'printBodyContact';

            printStartHtml();
            printNavigation();
//            printHero3Section();
            printHeroSectionTemplate($sView);
            printContact();
            printFooter();
            printEndHtml();

            break;
        case 'login':
//            $sTitrePage = 'Page login';
//            $sFonctionLayout = 'printBodyLogin';
            printStartHtml();
            printNavigation();
//            printHero2Section();
            printHeroSectionTemplate($sView);
            printLogin();
//            printDebug();
            printFooter();
            printEndHtml();

            break;
        case 'recherche':
//            $sTitrePage = 'Page recherche';
//            $sFonctionLayout = 'printBodyRecherche';
            printStartHtml();
            printNavigation();
//            printHero2Section();
            printHeroSectionTemplate($sView);
//            printLogin();
//            printDebug();
            printFooter();
            printEndHtml();
            break;
        default:
//            $sTitrePage = 'Page index';
//            $sFonctionLayout = 'printBodyIndex';
            printStartHtml();
            printNavigation();
//            printHeroSection();
            printHeroSectionTemplate($sView);
//            printDebug();
            printIntro();
            prinFeatures();
            printPricing();
            printTextRow();
            printNews();
            printSignup();
            printFooter();
            printEndHtml();

            break;
    }
/*
    printHtmlHeader($sTitrePage);
    printHeader();
    printDebug();
    */
/*
    switch ($sView) {
        case 'index':
            printBodyIndex();
            break;
        case 'contact':
            printBodyContact();
            break;
        case 'login':
            printBodyLogin();
            break;
        case 'recherche':
            printBodyRecherche();
            break;
        default:
            printBodyIndex();
            break;
    }
    */
    /*
    $sFonctionLayout();
    printFooter();
    printHtmlFooter();
    */
}

/*
function printDebug()
{
    global $sCmd, $sSearch;

echo '<hr>';
echo "sCmd:$sCmd<br>";
echo "sSearch:$sSearch<br>";
echo "POST ";
print_r($_POST);
echo "SESSION ";
print_r($_SESSION);
echo '<hr>';
}

function printHeader()
{
    echo '<header>
    header
    <form action="v3-index.php" method="post">
    <input type="text" name="search" placeholder="recherche">
    <input type="submit">
    </form>
    </header>
';

}

function printFooter()
{
    echo '<footer>footer</footer>';
}

function printBodyIndex()
{
    echo '<H1>Page index</H1>';
}

function printBodyContact()
{
    echo '<H1>Page contact</H1>';
}

function printBodyRecherche()
{
    echo '<H1>Page recherche</H1>';
}

function printBodyLogin()
{
    echo '<H1>Page login</H1>
        <form action="v3-index.php" method="post">
        email:<input type="email" name="log-email" placeholder="email">
        password:<input type="password" name="log-password" placeholder="password">
        <input type="submit">
        </form>
    ';
}

function printHtmlHeader($sTitrePage)
{
    $sHtmlTemplate = '
    <!DOCTYPE HTML>
    <HTML>
    <HEAD>
    <TITLE>%s</TITLE>
    </HEAD>
    <BODY>';

    echo sprintf($sHtmlTemplate,$sTitrePage);
}

function printHtmlFooter()
{
    echo '
    </BODY>
    </HTML>
    ';
}
*/
