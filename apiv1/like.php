<?php
session_start();
header('Content-Type: application/json');
require '../conexion.php';
if ($_SESSION['usuario'] != null) {
    $postid = $_POST['id'];
    if ($postid != null) {
        $collection = $client->calendapp->post;
        $cursor = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($postid)]);
        $existe = false;

        foreach ($cursor['likes'] as $persona) {
            if ($persona == $_SESSION['usuario']) {
                $existe = true;
            }
        }

        if ($existe == 'true') {
            $client->calendapp->post->updateOne(['_id' => new \MongoDB\BSON\ObjectID($postid)], array('$pull' => array("likes" => $_SESSION['usuario'])));
            http_response_code(200);
            echo json_encode(array('status' => 'unliked'));
        } else {
            $client->calendapp->post->updateOne(['_id' => new \MongoDB\BSON\ObjectID($postid)], array('$push' => array("likes" => $_SESSION['usuario'])));
            http_response_code(200);
            echo json_encode(array('status' => 'liked'));
        }
    } else {
        http_response_code(400);
        echo json_encode(array('status' => 'id required'));
    }
} else {
    http_response_code(400);
    echo json_encode(array('status' => 'login required'));
}
