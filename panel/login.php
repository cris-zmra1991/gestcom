<?php
require '../base.php';
$errores = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['user'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);
    //Verificar que el usuario sea unico
    $count = $database->count("sys_users",["username" => $usuario]);
    if ($count == 1) {
      //buscar usuario en BD
      $data = $database->select("sys_users","*",["username" => $usuario]);
      foreach ($data as $sesion)
      {
      //Asignar los resultados a variables de sesion
      $_SESSION['id_user'] = $sesion["user_id"];
      $_SESSION['usuario'] = $sesion["username"];
      $_SESSION['fname'] = $sesion["userfullname"];
      $_SESSION['mail'] = $sesion["email"];
      $itempass = $sesion["password"];
      $_SESSION['position'] = $sesion["position"];
      }
      //Comprobar que la contraseña sea correcta
      if ($password == $itempass) {
      $database->update("sys_activitie",["status" => "1"],["id_user" => $_SESSION['id_user']]);
      header('Location: '.RUTA.'index.php');
      }
      else {
        $errores = '<p>Error, revise los datos</p>';
      }
    }
    else {
      $errores = '<p>Nombre de usuario duplicado o inexistente<br>Consulte al administrador</p>';
    }
    }

require_once '../views/login.view.php';
 ?>
