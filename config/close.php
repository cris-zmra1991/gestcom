<?php session_start();
require '../base.php';

$database->update("sys_activitie",["status" => "0"],["id_user" => $_SESSION['id_user']]);
session_destroy();
header('Location: '.RUTA.'index.php');

 ?>
