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
    foreach ($contrato as $datos) {
      $nprof = $datos['num_proforma'];
      $proveedor = $datos['proveedor'];
      $nproveedor = $database->select("proveedores","*",["id_prov" => $proveedor]);
      $objeto = $datos['objeto'];
      $vig = $datos['vigencia'];
      $tvig = $datos['tipo_vigencia'];
      $valor = $datos['valor'];
      $tvalor = $datos['moneda'];
    }
    require '../views/update.view.php';
    }

  }
  else{
    header('Location: '.RUTA.'panel/login.php');
  }
}
else {
  header('Location: '.RUTA.'panel/login.php');
}
?>
