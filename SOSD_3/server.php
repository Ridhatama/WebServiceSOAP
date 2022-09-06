<?php
require 'vendor/autoload.php';
$server = new soap_server();
$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$server->configureWSDL('CALCULTOR');
$server->wsdl->schemaTargetNamespace = $namespace;

$server->register(
    "Penjumlahan",
    array ('a'=> 'xsd:int', 'b' => 'xsd:int'),
    array ('tambah' => 'xsd:int'),
    $namespace
);

function Penjumlahan($a = null, $b=null){
    if($a !=null && $b !=null && trim($a)!= '' && trim($b) != ''){
        return $a + $b;
    }else{
        return new error('Client', '', 'parameter tidak ditemukan');
    }
}

$server->register(
    "Perkalian",
    array ('a'=>'xsd:int', 'b'=>'xsd:int'),
    array ('kali' => 'xsd:int'),
    $namespace
);


function Perkalian($a = null, $b=null){
    if($a!=null && $b!=null && trim($a)!='' && trim($b)!=''){
        return $a * $b;
    }else{
        return new error('Client', '', 'parameter tidak ditemukan');
    }
}

$server->register(
    "Pengurangan",
    array ('a'=>'xsd:int', 'b'=>'xsd:int'),
    array ('kurang' => 'xsd:int'),
    $namespace
);


function Pengurangan($a = null, $b=null){
    if($a!=null && $b!=null && trim($a)!='' && trim($b)!=''){
        return $a - $b;
    }else{
        return new error('Client', '', 'parameter tidak ditemukan');
    }
}

$server->service(file_get_contents("php://input"));
exit();

