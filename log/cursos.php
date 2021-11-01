<?php
$curso = $_POST['hola'];
$salida = "";
$myfile = fopen("asignatures.txt", "r") or die("Unable to open file!");
$salida .= "<datalist id='datalistOptions'>";
while(!feof($myfile)) {
    $curso = fgets($myfile);
    $codigo = fgets($myfile);
    $salida .= "<option id='".$codigo."' value='" . $curso . "'>";
  }
  fclose($myfile);
$salida .= "</datalist>";
echo "$salida";
?>
