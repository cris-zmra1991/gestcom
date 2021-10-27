<?php
require '../base.php';
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
  $data = $database->count("sys_users",["username" => $usuario]);
  if (!empty($data)) {
    $proveedores = $database->select("proveedores","*");
    require '../views/listadoprov.view.php';
    }
  else{
    header('Location: '.RUTA.'panel/login.php');
  }
}
else {
  header('Location: '.RUTA.'panel/login.php');
}
?>
