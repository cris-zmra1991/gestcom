<?php
//define('RUTA', 'http://gestcom.latino.epem.une.cu/');
define('RUTA', 'http://localhost:8030/gestcom/');
require 'config/session_handler.php';
require 'config/medoo.php';
use Medoo\Medoo;
try {
  $database = new Medoo([
  	// [required]
  	'type' => 'mysql',
  	'host' => 'localhost',
  	'database' => 'gestcom',
  	'username' => 'root',
  	'password' => '',
   ]);
} catch (PDOException $e) {
  echo "No se pudo conectar a la Base de Datos";
}
?>
