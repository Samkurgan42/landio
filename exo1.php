<?php

echo "\nEst divisible par\n\n";
/*
if ($argc==5) {
    $nMax = intval($argv[1]);
    $nDiv1 = intval($argv[2]);
    $nDiv2 = intval($argv[3]);
    $nDiv3 = intval($argv[4]);
} elseif ($argc=2) {
    $nMax = intval($argv[1]);
    $nDiv1 = 2;
    $nDiv2 = 3;
    $nDiv3 = 5;
} else {
    $nMax = 100;
    $nDiv1 = 2;
    $nDiv2 = 3;
    $nDiv3 = 5;
}
*/
$nMax = $argv[1] ?? 100;
$nDiv1 = $argv[2] ?? 2;
$nDiv2 = $argv[3] ?? 3;
$nDiv3 = $argv[4] ?? 5;

for ($i=1; $i <= $nMax; $i++) {
    echo "$i ->";

    if ($i%$nDiv1 == 0) {
        echo " divisible par $nDiv1";
    }
    if ($i%$nDiv2 == 0) {
        echo " divisible par $nDiv2";
    }
    if ($i%$nDiv3 == 0) {
        echo " divisible par $nDiv3";
    }

    echo "\n";
}
