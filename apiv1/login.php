<?php
session_start();
header('Content-Type: application/json');
require '../conexion.php';
if ($_SESSION['usuario'] == null) {
    $usuario = $_POST['user'];
    $password = $_POST['pass'];
    $usuarios = [];
    $existe = false;
    $collection = $client->calendapp->users;
    $cursor = $collection->find();

    foreach ($cursor as $user) {
        if ($usuario == $user['user']) {
            if ($password == $user['pass']) {
                $existe = true;
            }
        }
    };
    if ($existe) {
        $_SESSION['usuario'] = $usuario;
        $collection = $client->calendapp->users;
        $cursor = $collection->findOne(['user' => $usuario]);
        http_response_code(200);
        echo json_encode($cursor);
    } else {
        http_response_code(400);
        echo json_encode(array('status' => 'bad credentials'));
    }
} else {
    http_response_code(200);
    echo json_encode(array('status' => 'already logged as ' . $_SESSION['usuario']));
}
