<?php
require '../base.php';
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
  $data = $database->count("sys_users",["username" => $usuario]);
  if (!empty($data)) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $errores = "";

      $nprof = $_POST['nprof'];
      $proveedor = $_POST['proveedor'];
      $objeto = $_POST['objeto'];
      $vig = $_POST['vig'];
      $tvig = $_POST['tvig'];
      $valor = $_POST['valor'];
      $tvalor = $_POST['tvalor'];
      $actaueb = $_POST['actaueb'];
      $acuerdoueb = $_POST['acuerdoueb'];
      $fechaueb = $_POST['fechaueb'];
      $actaepe = $_POST['actaepe'];
      $acuerdoepe = $_POST['acuerdoepe'];
      $fechaepe = $_POST['fechaepe'];
      $ffirma = $_POST['ffirma'];
      $numcont = $_POST['numcont'];
      $status = $_POST['status'];
      $tipocont = $_POST['tipocont'];

      $count = $database->count("contratos",["num_proforma" => $nprof]);
      if(empty($count))
      {
        $database->insert("contratos",[
          "num_proforma" => $nprof,
          "proveedor" => $proveedor,
          "objeto" => $objeto,
          "vigencia" => $vig,
          "tipo_vigencia" => $tvig,
          "valor" => $valor,
          "moneda" => $tvalor,
          "acta_fca" => $actaueb,
          "acuerdo_fca" => $acuerdoueb,
          "fecha_fca" => $fechaueb,
          "acta_epe" => $actaepe,
          "acuerdo_epe" => $acuerdoepe,
          "fecha_epe" => $fechaepe,
          "fecha_firma" => $ffirma,
          "numero_cont" => $numcont,
          "estado_cont" => $status,
          "tipo_cont" => $tipocont
        ]);
        $errores = "El contrato se guardó correctamente";
      }
      else {
        $errores = "El contrato ya está registrado (No pueden existir duplicados)";
      }
    }
    require '../views/add.view.php';
  }
  else{
    header('Location: '.RUTA.'panel/login.php');
  }
}
else {
  header('Location: '.RUTA.'panel/login.php');
}
?>
