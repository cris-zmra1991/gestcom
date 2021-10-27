<?php
require '../base.php';
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
  $data = $database->count("sys_users",["username" => $usuario]);
  if (!empty($data)) {
    $cantcont = $database->count("contratos");
    $cantserv = $database->count("contratos",["tipo_cont"=>"Servicios"]);
    $cantcv = $database->count("contratos",["tipo_cont"=>"Compraventa"]);
    $proveedores = $database->count("proveedores");
    $fechaactual = date("Y")."-".date("m")."-".date("d");
    $contratosall = $database->select("contratos","*",["tipo_vigencia"=>"Año"]);
    require '../views/user.view.php';
    }
  else{
    header('Location: '.RUTA.'panel/login.php');
  }
}
else {
  header('Location: '.RUTA.'panel/login.php');
}
?>
