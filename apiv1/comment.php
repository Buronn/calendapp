<?php
session_start();
header('Content-Type: application/json');
require '../conexion.php';
$request = $_SERVER['REQUEST_METHOD'];
header('Content-Type: application/json');
if ($_SESSION['usuario'] != null) {
    if ($request == "POST") {
        $postid = $_GET['id'];
        $comment = $_POST['comment'];
        $nombre = $_SESSION['usuario'];
        if (isset($comment) && trim($comment) != "") {
            $xd = array('user' => $nombre, 'comment' => $comment, 'likes' => array(), 'time' => date("d-m-y H:i:s", strtotime('-4 hours')));

            $post = $client->calendapp->post->findOne(['_id' => new MongoDB\BSON\ObjectID($postid)]);
            if (!empty($post)) {
                http_response_code(200);
                $client->calendapp->post->updateOne(['_id' => new \MongoDB\BSON\ObjectID($postid)], array('$push' => array("comment" => $xd)));
                echo json_encode(array('status' => 'commented'));
            } else {
                http_response_code(400);
                echo json_encode(array('status' => 'bad id'));
            }
        } else {
            http_response_code(400);
            echo json_encode(array('status' => 'empty comment'));
        }
    } else if ($request == "GET") {
        $postid = $_GET['id'];
        $nombre = $_SESSION['usuario'];


        $post = $client->calendapp->post->findOne(['_id' => new MongoDB\BSON\ObjectID($postid)]);
        http_response_code(200);
        echo json_encode($post['comment']);
    } else {
        http_response_code(400);
        echo json_encode(array('status' => 'empty comment'));
    }
} else {
    http_response_code(400);
    echo json_encode(array('status' => 'login required'));
}
