<?php
echo "\nSuite de fibonacci et nombre d'or\n\n";

$nNombreOr = (1+sqrt(5)) / 2;

echo sprintf("Cour. / Prec. = Div.  Pourcentage\n");
echo sprintf("----- / ----- = ----- -----------\n");

$nPrecedent = 0;
$nCourant = 1;
echo sprintf("%5d\n", $nPrecedent);
//echo "$n2\n";

for ($i=1; $i <= 20; $i++) {

    if ($nPrecedent!=0) {
        $nDiv = $nCourant / $nPrecedent;
        $nPourcent = (($nNombreOr-$nDiv)/$nDiv)*100;
        echo sprintf("%5d / %5d = %5.3f %10f\n", $nCourant, $nPrecedent, $nDiv, $nPourcent);
    } else {
        echo sprintf("%5d\n", $nCourant);
    }

    $nSuivant = $nPrecedent+$nCourant;
    $nPrecedent=$nCourant;
    $nCourant=$nSuivant;
}
