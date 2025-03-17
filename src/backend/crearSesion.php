<?php

require __DIR__ .'/../../vendor/autoload.php';
$clienteMongoDB = new MongoDB\Client("mongodb+srv://santiago894:P5wIGtXue8HvPvli@cluster0.6xkz1.mongodb.net/");
$colecionSesiones = $clienteMongoDB->selectDatabase("ERP")->selectCollection("sesiones");

if($_SERVER['REQUEST_METHOD']==="POST"){
      $input_usuario=trim($_POST["usuario"]);
      $input_contraseña=trim($_POST["contraseña"]);
      $input_esAdmin=$_POST["esAdmin"];
      $devolverObj = [];

      if ( empty($input_usuario) || empty($input_contraseña) || empty($input_esAdmin) ) {
            # Matar proceso die();
            # Devolver a Inicio 
            # Mejor utilizar ajax
      }
      $comprobarUsuario = $colecionSesiones -> findOne(["usuario" => $input_usuario]);
      if ($comprobarUsuario !== null) {
            $devolverObj["inserteResultado"]=false;
            $devolverObj["estado"]="Cancelado, Ya existe un usuario con ese nombre";
      }
      else if($comprobarUsuario === null){
            $crearSesion = $colecionSesiones -> insertOne(["usuario" => $input_usuario, "contraseña" => $input_contraseña, "esAdmin" => $input_esAdmin]);
            #$crearSesion = $colecionSesiones -> insertOne(["usuario" => "john", "contraseña" => "1234", "esAdmin" => false]);
            $devolverObj["insertResultado"] = $crearSesion->isAcknowledged();
            $devolverObj["estado"]="String debio ser creado";
      }
      echo json_encode($devolverObj);
}