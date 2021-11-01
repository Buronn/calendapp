<?php
session_start();
header('Content-Type: application/json');
require '../conexion.php';
if ($_SESSION['usuario'] != null) {
    $usuario = $_GET['id'];
    if ($usuario == null) {
        http_response_code(400);
        echo json_encode(array('status' => 'id required'));
    } else {
        $collection = $client->calendapp->users;
        $cursor = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($usuario)]);
        http_response_code(200);
        echo json_encode($cursor);
    }
} else {
    http_response_code(400);
    echo json_encode(array('status' => 'login required'));
}
