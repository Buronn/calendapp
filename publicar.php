<?php
session_start();
require 'conexion.php';

$post = $_POST['post'];
$collection = $client->calendapp->post;
$cursor = $collection->find();
$id =count($cursor);
$collection->insertOne(array('user' => $_SESSION['usuario'], 'text' => $post, 'likes' => array(), 'comments' => array(), 'time' => date("d-m-y H:i:s", strtotime('-4 hours')), 'photos' => array()));
echo $id

?>