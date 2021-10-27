<?php
require '../base.php';
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
  $data = $database->count("sys_users",["username" => $usuario]);
  if (!empty($data)) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $errores = "";

      $proveedor = $_POST['proveedor'];

      $count = $database->count("proveedores",["desc_prov" => $proveedor]);
      if(empty($count))
      {
        $database->insert("proveedores",["desc_prov" => $proveedor]);
        $errores = "El proveedor se registró correctamente";
      }
      else {
        $errores = "El proveedor ya está registrado (No pueden existir duplicados)";
      }
    }
    require '../views/addprov.view.php';
  }
  else{
    header('Location: '.RUTA.'panel/login.php');
  }
}
else {
  header('Location: '.RUTA.'panel/login.php');
}
?>
