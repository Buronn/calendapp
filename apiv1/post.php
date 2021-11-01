<?php
session_start();
require '../conexion.php';
$request = $_SERVER['REQUEST_METHOD'];
header('Content-Type: application/json');
if ($_SESSION['usuario'] != null) {
    if ($request == "POST") {

        $post = $_POST['post'];
        if ($post != null) {
            $collection = $client->calendapp->post;
            $cursor = $collection->find();
            $id = count($cursor);
            $collection->insertOne(array('user' => $_SESSION['usuario'], 'text' => $post, 'likes' => array(), 'comments' => array(), 'time' => date("d-m-y H:i:s", strtotime('-4 hours')), 'photos' => array()));
            http_response_code(200);
            echo json_encode(array('status' => 'posted'));
        } else {
            http_response_code(400);
            echo json_encode(array('status' => 'post required'));
        }
    } else if ($request == "GET") {
        $postid = $_GET['id'];
        if ($postid != null) {
            $collection = $client->calendapp->post;
            $cursor = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($postid)]);
            echo json_encode($cursor);
        } else {
            http_response_code(400);
            echo json_encode(array('status' => 'id required'));
        }
    }
} else {
    http_response_code(400);
    echo json_encode(array('status' => 'login required'));
}
