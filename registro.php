<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro | Calendapp</title>
  <link rel="shortcut icon" href="/iconos/calendar.jpg">
  <link rel="preload" href="/css/main.css" as="style">
  <link rel="preload" href="/css/mainbs.css" as="style">
  <link href="/css/main.css" rel="stylesheet" type="text/css">
  <link href="/css/mainbs.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="/scripts/funciones.js"></script>
  <script type="text/javascript" src="/scripts/bootstrap.js"></script>
  


</head>

<body class="calendar-background">
  <div class="black-box">
    <h1 class="pt">Registro</h1>
    <div class="registro">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Registro</li>
        </ol>
      </nav>
      <h2 class="pt">Datos</h2>
      <div class="mb-3">
        
        <label for="formFileSm" class="form-label center">Foto de perfil</label>
        
        <span class="d-inline-block center" data-bs-placement="bottom" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Sube tu foto de perfil">
            <input id="profile-image-upload" class="d-none position-absolute top-50 start-50" type="file" accept="image/x-png,image/gif,image/jpeg">
            <input type="image" class="profile-pic img-fluid" id="profile-pic" src="/profile-picture/default.png">
            <span class="spinner-border text-info d-none" id="cargando" role="status">
            </span>
        </span>
        
<!--         <input style="font-size: 1vw;height: 2.7vw;" class="form-control form-control-sm" id="formFileSm" type="file" accept="image/x-png,image/gif,image/jpeg">
 -->      </div>
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
        <input type="text" class="form-control" id="correo" placeholder="Correo electronico">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
        <input type="text" class="form-control" id="usuario" placeholder="Nombre de usuario" aria-label="Username"
          aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
        <input type="password" class="form-control" id="clave" placeholder="Contraseña" aria-label="Password">
      </div>
      



      <h2 class="pt">Cursos<h2 style="font-size: 1.2vw;color: rgb(109, 109, 109);text-align: right;">Si no encuentras tu curso, añádelo de todas formas</h2></h2>
      <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Busca tus cursos aquí" >
      
      <div id="OpcionesCurso">
      </div>
      <script>
        Cursos();
      </script>
    <button class="btn btn-success btn-block" style="font-size: 1vw;" type="button"
    onclick="AddCurso()">Añadir</button>

    <div class="input-group mb-3" id="ListaCursos">

    </div>



      <div class="input-group" style="padding-top: 1vw;padding-bottom: 1vw;">
        <span class="input-group-text">Descripción personal</span>
        <textarea id="description" class="form-control" aria-label="Añada una descripción"></textarea>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a onclick="Register()"><button class="btn btn-info" style="font-size: 1.5vw;" type="button">Continuar</button></a>
      </div>
      
      <div id="alerta" class="p-5">
      
      </div>



    </div>
  </div>


</body>

</html>