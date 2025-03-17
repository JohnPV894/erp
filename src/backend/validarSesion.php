<?php

require __DIR__ .'/../../vendor/autoload.php';
$clienteMongoDB = new MongoDB\Client("mongodb+srv://santiago894:P5wIGtXue8HvPvli@cluster0.6xkz1.mongodb.net/");
session_start();
try{ 
   $dbs = $clienteMongoDB->listDatabases(); 
   #echo "conecto correctamente";
}
catch(Exception $e){
   echo "fallo al conectar a mongo";
   exit();
} 

$colecionSesiones = $clienteMongoDB->selectDatabase("ERP")->selectCollection("sesiones");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $input_contraseña = trim($_POST["contraseña"]);
   $input_usuario = trim($_POST["usuario"]); 
   if (empty($input_usuario) || empty($input_contraseña) ) {
      exit("Datos invalidos");
   }
   $coincidencias = $colecion->countDocuments(["usuario"=>$input_usuario,"contraseña"=> $input_contraseña]);
   if ($coincidencias>0) {
      header("");#Redirigir a Login
   }else{
      header( "");#
   }
}else {
   die('Metodo no permitido');
}
?>  