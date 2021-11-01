<?php
$curso = $_POST['curso'];
$id = str_replace(" ", "_", $curso);
$salida = $_POST['texto'];
$salida = str_replace("<div class=\"input-group mb-3\" id=\"ListaCursos\">", "", $salida);
$salida = str_replace("</div>", "", $salida);
$salida .= "<p class=\"input-group mb-3\" id='".$id."'><a style='pointer-events:none;' type='text' class='form-control'
aria-describedby='basic-addon1'>".$curso."</a><span id='".$id."1' onclick=DelCurso('".$id."') class='btn btn-danger' id='basic-addon1' style='font-size: 1.2vw;'>-</span></p>";
$top = $salida;

echo "$top";

