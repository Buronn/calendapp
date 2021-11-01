<?php
session_start();
require './conexion.php';
$email = $_POST['email'];
$usuario = $_POST['user'];
$password = $_POST['pass'];
$cursos = $_POST['cursos'];
$phpsession = $_POST['phpsession'];
$description = $_POST['description'];
$img = "/uploads/$usuario";
$usuarios = [];
$existe = 0;
$collection = $client->calendapp->users;
$cursor = $collection->find();
foreach ($cursor as $user) {
    if($usuario == $user['user']){
		$existe = 1;
	}
    if($email == $user['email']){
        $existe = 2;
    }
};
if($existe ==0){
	$_SESSION['usuario']= $usuario;
    rename("uploads/$phpsession.png", "uploads/$usuario.png");
    $collection-> insertOne(array('email'=>$email, 'pass'=>$password, 'user'=>$usuario, 'img'=>$img.".png",'cursos'=>$cursos,'description'=>$description));
	echo "<div class=\"spinner-grow\" style=\"width: 3rem; height: 3rem;\" role=\"status\">
    <span class=\"visually-hidden\"></span>
  </div></span>
    </div><script>setTimeout(() => { window.top.location='../bienvenido.php';},2000);</script>";
}
if($existe == 1){
    echo "<div class=\"alert alert-info\" role=\"alert\">
    El nombre de usuario ya está en uso.
    </div>";
}
if($existe == 2){
    echo "<div class=\"alert alert-info\" role=\"alert\">
    El correo electrónico ya existe.
    </div>";
}


