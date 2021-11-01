<?php
session_start();
require '../conexion.php';
header('Content-Type: application/json');
if ($_SESSION['usuario'] == null) {
    $email = $_POST['email'];
    $usuario = $_POST['user'];
    $password = $_POST['pass'];
    $cursos = $_POST['cursos'];
    $description = $_POST['description'];
    $phpsession = $_COOKIE['PHPSESSID'];
    if($email==null or $usuario==null or $password==null){
        http_response_code(400);
        echo json_encode(array('status' => 'required user credentials'));
    }else{
        $img = "/uploads/$usuario";
        $usuarios = [];
        $existe = 0;
        $collection = $client->calendapp->users;
        $cursor = $collection->find();
        foreach ($cursor as $user) {
            if ($usuario == $user['user']) {
                $existe = 1;
            }
            if ($email == $user['email']) {
                $existe = 2;
            }
        };
        if ($existe == 0) {
            $_SESSION['usuario'] = $usuario;
            rename("uploads/$phpsession.png", "uploads/$usuario.png");
            $collection->insertOne(array('email' => $email, 'pass' => $password, 'user' => $usuario, 'img' => $img . ".png", 'cursos' => $cursos, 'description' => $description));
            http_response_code(400);
            echo json_encode(array('status' => 'user registered'));
        }
        if ($existe == 1) {
            http_response_code(400);
            echo json_encode(array('status' => 'user already exists'));
        }
        if ($existe == 2) {
            http_response_code(400);
            echo json_encode(array('status' => 'email already exists'));
        }
    }
    
} else {
    http_response_code(400);
    echo json_encode(array('status' => 'cannot register while logged in'));
}
