<?php
session_start();
require 'conexion.php';

$postid = $_POST['id'];
$comment = $_POST['comment'];
$nombre = $_SESSION['usuario'];

$xd = array('user'=>$nombre,'comment'=>$comment,'likes' => array(),'time' => date("d-m-y H:i:s", strtotime('-4 hours')));
$post = $client->calendapp->post->findOne(['_id' => new MongoDB\BSON\ObjectID($postid)]);

$client->calendapp->post->updateOne(['_id' => new \MongoDB\BSON\ObjectID($postid)], array('$push' => array("comment" => $xd)));

echo sizeof($post['comments']);
