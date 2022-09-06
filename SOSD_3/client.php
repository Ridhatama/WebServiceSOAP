<?php

require 'vendor/autoload.php';

$soap = new soapclient('http://localhost/SOSD_3/server.php?wsdl', true);
$proxy = $soap->getProxy();

$a = 4;
$b = 100;

$sum = $proxy->Penjumlahan($a,$b);
echo 'Hasil Penjumlah '. $a . "+" . $b ." = ". $sum;
echo '<br>';

$mul = $proxy->Perkalian($a,$b);
echo 'Hasil Perkalian ' . $a . "*" . $b ." = ". $mul;
echo '<br>';

$mul = $proxy->Pengurangan($a,$b);
echo 'Hasil Perkalian ' . $a . "-" . $b ." = ". $mul;