<?php declare(strict_types=1);

include 'src/Credential.php';
include 'src/Certificate.php';
include("subirArchivo.php");


$cern=utf8_encode($_GET['cername']);
$keyn=utf8_encode($_GET['keyname']);



$cerFile = 'fiel/'.$cern;
$pemKeyFile = 'fiel/'.$keyn;
/* 
$cerFile = 'fiel/certificadoxoch.cer';
$pemKeyFile = 'fiel/private-key-xoch.key' */;
$passPhrase = '12345678a'; // contraseña para abrir la llave privada

$fiel = PhpCfdi\Credentials\Credential::openFiles($cerFile, $pemKeyFile, $passPhrase);

$sourceString = 'texto a firmar';
// alias de privateKey/sign/verify
$signature = $fiel->sign($sourceString);
echo base64_encode($signature), PHP_EOL;

// alias de certificado/publicKey/verify
$verify = $fiel->verify($sourceString, $signature);
echo "<br>";
var_dump($verify); // bool(true)
echo "<br>";
// objeto certificado
$certificado = $fiel->certificate();
echo "<br>";
echo $certificado->rfc(), PHP_EOL; // el RFC del certificado
echo "<br>";
echo $certificado->legalName(), PHP_EOL; // el nombre del propietario del certificado
echo "<br>";
echo $certificado->branchName(), PHP_EOL; // el nombre de la sucursal (en CSD, en FIEL está vacía)
echo "<br>";
echo $certificado->serialNumber()->bytes(), PHP_EOL; // número de serie del certificado

echo "cambio";