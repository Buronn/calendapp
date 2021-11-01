<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido | Calendapp</title>
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
    <div class="bienvenido">
    <?php echo "<h1 class='pt'>Bienvenido ".$_SESSION['usuario']."</h1>";?>
    <div class="center">
      <img type="image" class="profile-pic img-fluid" id="fotodeperfil" src="/uploads/<?php echo $_SESSION['usuario']?>.png">
      
    </div>
    <div style="padding: 2vw;" class="center">
      <a href="registro.php"><button class="btn btn-info" style="font-size: 1.5vw;" type="button">Volver</button></a>
    <a href="home.php"><button class="btn btn-info" style="font-size: 1.5vw;" type="button">Continuar</button></a>
    </div>
  </div>
  </div>


</body>

</html>