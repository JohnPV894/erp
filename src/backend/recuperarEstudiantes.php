<?php

header('Content-Type: application/json');
require __DIR__ .'/../../vendor/autoload.php';
$clienteMongoDB = new MongoDB\Client("mongodb+srv://santiago894:P5wIGtXue8HvPvli@cluster0.6xkz1.mongodb.net/");
$colecionEstudiantes = $clienteMongoDB->selectDatabase("ERP")->selectCollection("estudiantes");
$consulta=$colecionEstudiantes->find();

$empresas =[];
foreach ($consulta as $cadaDocumento) {
      array_push($empresas,$cadaDocumento);
}
echo json_encode($empresas);