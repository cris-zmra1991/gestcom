<?php
require '../base.php';
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
  $data = $database->count("sys_users",["username" => $usuario]);
  if (!empty($data)) {
    if(!isset($_GET["name"])) {
      echo "Error al cargar la información";
    }
    else{
    $name = $_GET["name"];
    $contrato = $database->select("contratos","*",["id_cont" => $name]);
    }

    require '../views/details.view.php';
    }
  else{
    header('Location: '.RUTA.'panel/login.php');
  }
}
else {
  header('Location: '.RUTA.'panel/login.php');
}
?>
