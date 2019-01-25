<?php


function printLogin()
{

  $sLoginTemplate = '
  <!-- Login
  ================================================== -->

  <section class="section-signup bg-light" id="login">
    <div class="container">
      <form action="%s" method="post">
        <div class="row">

            <div class="col-md-6 col-xl-3">
              <div class="form-group has-icon-left form-control-email">
                <label class="sr-only" for="log-email">votre courriel</label>
                <input type="email" name="log-email" class="form-control form-control-lg" id="log-email" placeholder="addresse email" autocomplete="off">
              </div>
            </div>

          <div class="col-md-6 col-xl-3">
            <div class="form-group has-icon-left form-control-name">
              <label class="sr-only" for="log-password">Mot de passe</label>
              <input type="password" name="log-password" class="form-control form-control-lg" id="log-password" placeholder="Votre mot de passe">
            </div>
          </div>

          <div class="col-md-6 col-xl-3">
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block btn-pill">Connexion</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
  ';

  echo sprintf($sLoginTemplate, 'v3-index.php');
}

function printHeroSectionTemplate($sView)
{
    switch ($sView) {
        case 'login':
            $sContenu = '<h2 class="mb-5">Connexion</h2>';
            break;
        case 'contact':
            $sContenu = '<h2 class="mb-5">Contact</h2>';
            break;
        case 'recherche':
            $sContenu = '<h2 class="mb-5">Recherche</h2>';
            break;
        case 'index':
        default:
            $sContenu = '
                <h2 class="mb-5">en quelques <em>clics</em> avec un accompagnement professionnel </a>.</h2>
                <a class="btn btn-outline-light btn-lg btn-outline-light mb-4 mb-md-0" href="#features" role="button"><span class="icon-sketch"></span>En savoir plus</a>
                ';
            break;
    }

  $sHeroTemplate = '

      <header class="jumbotron bg-dark d-md-flex flex-md-column justify-content-md-center align-items-md-center" role="banner">

        <div class="text-center">
          <h1 class="display-3">Mon site web sur mesure</h1>
          %s
        </div>
      </header>
  ';

  echo sprintf($sHeroTemplate, $sContenu);


}

/*
function printHero2Section()
{
  echo '
      <!-- Hero 2 Section
      ================================================== -->

      <header class="jumbotron bg-dark d-md-flex flex-md-column justify-content-md-center align-items-md-center" role="banner">

        <div class="text-center">
          <h1 class="display-3">Mon site web sur mesure</h1>
          <h2 class="mb-5">Connexion</h2>
        </div>
      </header>
  ';
}

function printHero3Section()
{
  echo '
      <!-- Hero 2 Section
      ================================================== -->

      <header class="jumbotron bg-dark d-md-flex flex-md-column justify-content-md-center align-items-md-center" role="banner">

        <div class="text-center">
          <h1 class="display-3">Mon site web sur mesure</h1>
          <h2 class="mb-5">Liste des contacts</h2>
        </div>
      </header>
  ';
}

function printHeroSection()
{
  echo '
      <!-- Hero Section
      ================================================== -->

      <header class="jumbotron bg-dark d-md-flex flex-md-column justify-content-md-center align-items-md-center" role="banner">

        <div class="text-center">
          <h1 class="display-3">Mon site web sur mesure</h1>
          <h2 class="mb-5">en quelques <em>clics</em> avec un accompagnement professionnel </a>.</h2>
          <a class="btn btn-outline-light btn-lg btn-outline-light mb-4 mb-md-0" href="#features" role="button"><span class="icon-sketch"></span>En savoir plus</a>
        </div>
      </header>
  ';
}
*/

function printContact()
{
  echo '
  <section class="section-text">
    <div class="container">
      <div class="row py-5 justify-content-between">
        <div class="col">';

echo '
    <table>
    <tr>
        <td>Toto</td>
        <td>toto@toto.fr</td>
    </tr>
    <tr>
        <td>Titi</td>
        <td>titi@titi.fr</td>
    </tr>
    </table>
';


  echo '        </div>
      </div>
    </div>
  </section>
  ';
}

function printDebug()
{
  echo '
  <section class="section-text">
    <div class="container">
      <h3 class="text-center">Debug</h3>
      <div class="row py-5 justify-content-between">
        <div class="col">';

//    printSuperGlobal($_GET, '_GET');
    printSuperGlobal($_POST, '_POST');
//    printSuperGlobal($_REQUEST, '_REQUEST');
//    printSuperGlobal($_FILES, '_FILES');
    printSuperGlobal($_COOKIE, '_COOKIE');
    printSuperGlobal($_SESSION, '_SESSION');
//    printSuperGlobal($_ENV, '_ENV');
//    printSuperGlobal($_SERVER, '_SERVER');

  echo '        </div>
      </div>
    </div>
  </section>
  ';
}

function printSuperGlobal($aVariable, $sTitre)
{
    echo "<h4>$sTitre</h4>";
    echo "<p>";
    foreach( $aVariable as $cle => $valeur) {
      echo $cle . ' = ' . $valeur . ' <br>';
    }
    echo "</p>";

}

function printStartHtml()
{
    echo '
    <!DOCTYPE html>
    <html lang="fr">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Votre pésence sur internet  | fabricatic.fr</title>
        <meta name="description" content="Soyez présent sur internet et rencontrez vos prochains clients sur le web." />
        <meta name="keywords" content="site web, saint-étienne, site web sur mesure, wordpress, joomla, prestashop" />
        <meta name="author" content="fabricatic.fr" />
        <link rel="apple-touch-icon" sizes="57x57"   href="./assets/img/favicon/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60"   href="./assets/img/favicon/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72"   href="./assets/img/favicon/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76"   href="./assets/img/favicon/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="./assets/img/favicon/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="./assets/img/favicon/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="./assets/img/favicon/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="./assets/img/favicon/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/favicon/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" href="./assets/img/favicon/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="./assets/img/favicon/android-chrome-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="./assets/img/favicon/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="./assets/img/favicon/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="./assets/img/favicon/manifest.json">
        <link rel="shortcut icon" href="./assets/img/favicon/favicon.ico">
        <meta name="msapplication-TileColor" content="#663fb5">
        <meta name="msapplication-TileImage" content="./assets/img/favicon/mstile-144x144.png">
        <meta name="msapplication-config" content="./assets/img/favicon/browserconfig.xml">
        <meta name="theme-color" content="#663fb5">
        <link rel="stylesheet" href="./assets/css/landio.min.css">
      </head>
      <body>
      ';
}

function printEndHtml()
{
  echo '<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="./assets/js/landio.min.js"></script>
    </body>
  </html>
  ';
}

function printNavigation()
{

    $sNavTemplate = '
  <!-- Navigation
  ================================================== -->

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-inverse-custom" id="totop">
    <div class="container">
      <a class="navbar-brand mr-auto" href="#">
        <img src="/assets/img/site-web.jpg" width="75" height="75">
        <span class="sr-only">fabricatic.fr</span>
      </a>

      <div class="hidden-md-up">
        <a class="navbar-toggler collapsed" data-toggle="collapse" href="#collapsingNavbar" aria-expanded="false" aria-controls="collapsingNavbar">
          <div class="sr-only">Toggle mobile navigation</div>
        </a>
      </div>

      <div id="collapsingNavbar" class="collapse navbar-toggleable-custom">
        <ul class="nav navbar-nav navbar-nav-transparent float-right">
          <li class="nav-item nav-item-toggable">
            <a class="nav-link" href="#features">Produits</a>
          </li>
          <li class="nav-item nav-item-toggable">
            <a class="nav-link" href="#actu">Actualités</a>
          </li>
          <li class="nav-item nav-item-toggable">
            <a class="nav-link" href="#contact" >Contact</a>
          </li>
          <li class="nav-item nav-item-toggable hidden-md-up">
            <form class="navbar-form" role="form" action="%s" method="post">
              <input name="search1" class="form-control navbar-search-input" type="text" placeholder="Type your search &amp; hit Enter&hellip;">
            </form>
          </li>
          <li class="navbar-divider hidden-md-down" aria-hidden="true"></li>
          <li class="nav-item dropdown nav-dropdown-search hidden-md-down">
            <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="icon-search"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-search" aria-labelledby="dropdownMenu1">
              <form class="navbar-form" action="%s" method="post">
                <input name="search2" class="form-control navbar-search-input" type="text" placeholder="Type your search &amp; hit Enter&hellip;">
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  ';

  echo sprintf($sNavTemplate, INDEX_PAGE, INDEX_PAGE);

}



function printIntro()
{
  echo '
  <!-- Intro
  ================================================== -->

  <section class="section-intro bg-light text-center">
    <div class="container">
      <h3 class="wp wp-1">Build your beautiful UI, the way you want it, with Land.io</h3>
      <p class="lead wp wp-2">Craft memorable, emotive experiences with our range of beautiful UI elements.</p>
      <img src="assets/img/mock.png" alt="iPad mock" class="img-fluid wp wp-3">
    </div>
  </section>
  ';
}

function prinFeatures()
{
  echo '
      <!-- Features
      ================================================== -->

      <section class="section-features text-center" id="features">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <span class="icon-pen display-4"></span>
                  <h4 class="card-title">évolutif</h4>
                  <h6 class="card-subtitle text-muted">UI Elements</h6>
                  <p class="card-text">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl cras eu adipiscing ac cras at sem cras per senectus eu parturient quam.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <span class="icon-thunderbolt display-4"></span>
                  <h4 class="card-title">technologie</h4>
                  <h6 class="card-subtitle text-muted">Modern CMS</h6>
                  <p class="card-text">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl cras eu adipiscing ac cras at sem cras per senectus eu parturient quam.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-0">
                <div class="card-body">
                  <span class="icon-heart display-4"></span>
                  <h4 class="card-title">support</h4>
                  <h6 class="card-subtitle text-muted">assistance professionnelle</h6>
                  <p class="card-text">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl cras eu adipiscing ac cras at sem cras per senectus eu parturient quam.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  ';
}

function printPricing()
{
  echo '
  <!-- Pricing
  ================================================== -->

  <section class="section-pricing bg-light text-center">
    <div class="container">
      <h3>Choisissez votre site web</h3>
      <div class="row py-5">
        <div class="col-md-4 p-t-md wp wp-5">
          <div class="card pricing-box">
            <div class="card-header text-uppercase">
              Artisans - TPE
            </div>
            <div class="card-body">
              <p class="card-title">Votre présence sur internet</p>
              <h4 class="card-text">
                <span class="pricing-box-price">99 </span>
                <sup class="pricing-box-currency">€</sup>
                <small class="text-muted text-uppercase">/an</small>
              </h4>
            </div>
            <ul class="list-group list-group-flush px-0">
              <li class="list-group-item">Sed risus feugiat</li>
              <li class="list-group-item">Sed risus feugiat fusce eu sit</li>
              <li class="list-group-item">Sed risus feugiat fusce</li>
            </ul>
            <a href="#" class="btn btn-outline-primary btn-lg align-self-center">Commencer</a>
          </div>
        </div>
        <div class="col-md-4 stacking-top">
          <div class="card pricing-box pricing-best px-0">
            <div class="card-header text-uppercase">
              Entreprise
            </div>
            <div class="card-body">
              <p class="card-title">Votre communication en ligne</p>
              <h4 class="card-text">
                <span class="pricing-box-price">149 </span>
                <sup class="pricing-box-currency">€</sup>
                <small class="text-muted text-uppercase">/an</small>
              </h4>
            </div>
            <ul class="list-group list-group-flush px-0">
              <li class="list-group-item">Sed risus feugiat</li>
              <li class="list-group-item">Sed risus feugiat fusce eu sit</li>
              <li class="list-group-item">Sed risus feugiat fusce</li>
              <li class="list-group-item">Sed risus feugiat</li>
            </ul>
            <a href="#" class="btn btn-primary btn-lg align-self-center">Commencer</a>
          </div>
        </div>
        <div class="col-md-4 p-t-md wp wp-6">
          <div class="card pricing-box">
            <div class="card-header text-uppercase">
              Commerçants
            </div>
            <div class="card-body">
              <p class="card-title">Votre site de vente en ligne</p>
              <h4 class="card-text">
                <span class="pricing-box-price">199 </span>
                <sup class="pricing-box-currency">€</sup>
                <small class="text-muted text-uppercase">/an</small>
              </h4>
            </div>
            <ul class="list-group list-group-flush px-0">
              <li class="list-group-item">Sed risus feugiat</li>
              <li class="list-group-item">Sed risus feugiat fusce eu sit</li>
              <li class="list-group-item">Sed risus feugiat fusce</li>
            </ul>
            <a href="#" class="btn btn-outline-primary btn-lg align-self-center">Commencer</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  ';
}

function printTextRow()
{
  echo '
  <!-- Text Content
  ================================================== -->

  <section class="section-text">
    <div class="container">
      <h3 class="text-center">Make your mark on the product industry</h3>
      <div class="row py-5 justify-content-between">
        <div class="col-md-5">
          <p class="wp wp-7">A posuere donec senectus suspendisse bibendum magna ridiculus a justo orci parturient suspendisse ad rhoncus cursus ut parturient viverra elit aliquam ultrices est sem. Tellus nam ad fermentum ac enim est duis facilisis congue a lacus adipiscing consequat risus consectetur scelerisque integer suspendisse a mus integer elit massa ut.</p>
        </div>
        <div class="col-md-5 align-self-end separator-x">
          <p class="wp wp-8">A posuere donec senectus suspendisse bibendum magna ridiculus a justo orci parturient suspendisse ad rhoncus cursus ut parturient viverra elit aliquam ultrices est sem. Tellus nam ad fermentum ac enim est duis facilisis congue a lacus adipiscing consequat risus consectetur scelerisque integer suspendisse a mus integer elit massa ut.</p>
        </div>
      </div>
    </div>
  </section>
  ';
}

function printNews()
{
  echo '
  <!-- News
  ================================================== -->

  <section class="section-news" id="actu">
    <h3 class="sr-only">Actualités</h3>
    <div class="container">
      <div class="row align-items-center no-gutters bg-dark">
        <div class="col-md">
          <figure class="has-light-mask mb-0 image-effect">
            <img src="/assets/img/wordpress.jpg" alt="Article thumbnail" class="img-fluid">
          </figure>
        </div>
        <div class="col-md">
          <article class="mx-auto">
            <span class="badge badge-info">Nouvelle version</span>
            <h5><a href="#">Wordpress smplifie la mise en page <span class="icon-arrow-right"></span></a></h5>
            <p class="mb-0">
              <a href="#"><span class="badge badge-default text-uppercase"><span class="icon-tag"></span> Wordpress</span></a>
              <a href="#"><span class="badge badge-default text-uppercase"><span class="icon-time"></span> 21/12/2018</span></a>
            </p>
          </article>
        </div>
      </div>
      <div class="row align-items-center no-gutters bg-dark flex-md-row-reverse">
        <div class="col-md">
          <figure class="has-light-mask mb-0 image-effect">
            <img src="/assets/img/referencement-naturel.jpg" alt="Article thumbnail" class="img-fluid">
          </figure>
        </div>
        <div class="col-md">
          <article class="mx-auto">
            <span class="badge badge-info">Formation</span>
            <h5><a href="#">optimiser son référencement naturel <span class="icon-arrow-right"></span></a></h5>
            <p class="mb-0">
              <a href="#"><span class="badge badge-default text-uppercase"><span class="icon-tag"></span> SEO</span></a>
              <a href="#"><span class="badge badge-default text-uppercase"><span class="icon-time"></span> 20/12/2018</span></a>
            </p>
          </article>
        </div>
      </div>
    </div>
  </section>
  ';
}


function printSignup()
{

  $sSignupTemplate = '
  <!-- Sign Up
  ================================================== -->

  <section class="section-signup bg-light" id="contact">
    <div class="container">
      <h3 class="text-center mb-5">Contactez nous</h3>
      <form action="%s" method="post">
        <div class="row">
          <div class="col-md-6 col-xl-3">
            <div class="form-group has-icon-left form-control-name">
              <label class="sr-only" for="inputName">Votre nom</label>
              <input type="text" name="leadname" class="form-control form-control-lg" id="inputName" placeholder="Nom prénom">
            </div>
          </div>
          <div class="col-md-6 col-xl-3">
            <div class="form-group has-icon-left form-control-email">
              <label class="sr-only" for="inputEmail">votre courriel</label>
              <input type="email" name="leademail" class="form-control form-control-lg" id="inputEmail" placeholder="addresse email" autocomplete="off">
            </div>
          </div>
          <div class="col-md-6 col-xl-3">
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block btn-pill">contactez nous</button>
            </div>
          </div>
        </div>
        <label class="c-input c-checkbox">
          <input type="checkbox" checked>
          <span class="c-indicator"></span> J accepte les <a href="#">CGU</a>
        </label>
      </form>
    </div>
  </section>
  ';

  echo sprintf($sSignupTemplate, INDEX_PAGE);
}

function printFooter()
{
  echo '
  <!-- Footer
  ================================================== -->

  <footer class="section-footer bg-dark" role="contentinfo">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 col-lg-5">
          <div class="media flex-column flex-md-row">
            <span class="d-flex align-self-center align-self-md-start icon-logo"></span>
            <small class="media-body text-center text-md-left">&copy; fabricatic.fr 2018</small>
          </div>
        </div>
        <div class="col-md-6">
          <ul class="nav flex-column flex-md-row justify-content-md-end">
            <li class="nav-item"><a class="nav-link" href="#features">Produits</a></li>
            <li class="nav-item"><a class="nav-link" href="#actu">Actualités</a></li>
            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            <li class="nav-item"><a class="nav-link scroll-top" href="#totop">Back to top <span class="icon-caret-up"></span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  ';
}
