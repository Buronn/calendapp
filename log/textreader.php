<?php
$myfile = fopen("asignatures.txt", "r") or die("Unable to open file!");
$a = "";
while(!feof($myfile)) {
    $a .= fgets($myfile) . "<br>";
  }
  fclose($myfile);
?>