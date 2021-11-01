<?php
session_start();
require 'conexion.php';
$usuario = $_POST['user'];
$password = $_POST['pass'];
$usuarios = [];
$existe = false;
$collection = $client->calendapp->users;
$cursor = $collection->find();

foreach ($cursor as $user) {
    if($usuario == $user['user']){
		if($password == $user['pass']){
			$existe = true;
		}
	}
};
if($existe){
	$_SESSION['usuario']= $usuario;
	echo "<div class=\"spinner-grow\" style=\"width: 3rem; height: 3rem;\" role=\"status\">
    <span class=\"visually-hidden\"></span>
  </div></span>
    </div><script>setTimeout(() => { window.top.location='../home.php';},2000);</script>";
}
else{
    echo "<div class=\"alert alert-info\" role=\"alert\">
    Clave o usuario incorrectos
    </div>";
}