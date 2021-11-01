<?php
session_start();
header('Content-Type: application/json');
$request = $_SERVER['REQUEST_METHOD'];
require '../conexion.php';
if ($_SESSION['usuario'] != null) {
    if ($request == "GET") {
        $collection = $client->calendapp->post;
        $cursor = $collection->find();
        $cursor = iterator_to_array($cursor);
        $cursor = array_reverse($cursor);
        http_response_code(200);
        echo json_encode($cursor);
    } else {
        http_response_code(200);
        echo json_encode(array('status' => 'only get method allowed'));
    }
} else {
    http_response_code(400);
    echo json_encode(array('status' => 'login required'));
}
