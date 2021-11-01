<?php
session_start();
require 'conexion.php';

$postid = $_POST['id'];
$existe = $_POST['existe'];
$post= $client->calendapp->post->findOne(['_id'=>new MongoDB\BSON\ObjectID($postid)]);
if($existe=='true'){
    $client->calendapp->post->updateOne(['_id' => new \MongoDB\BSON\ObjectID($postid)],array('$pull' => array("likes"=>$_SESSION['usuario'])));   
}else{
    $client->calendapp->post->updateOne(['_id' => new \MongoDB\BSON\ObjectID($postid)],array('$push' => array("likes"=>$_SESSION['usuario'])));   
}
echo sizeof($post['likes']);

?>