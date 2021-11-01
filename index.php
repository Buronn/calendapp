<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicie Sesión | Calendapp</title>
    <link rel="shortcut icon" href="/iconos/calendar.jpg">
    <link rel="preload" href="css/main.css" as="style">
    <link rel="preload" href="css/mainbs.css" as="style">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="css/mainbs.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body class="calendar-background">

    <section>
        <form class="sesion" autocomplete="off">
            <div>
                <img src="/iconos/calendar.jpg" class="img-fluid" alt="Image not found"
                    style="margin:auto;max-width: 15vw;">
            </div>
            <fieldset class="formulario">
                <legend style="color:rgb(0, 0, 0); font-weight: bold;font-size: 4vw;" class="titulo">Inicie sesión
                </legend>
                <div style="font-size:2vw;">
                    <div class="form-floating mb-3 row align-items-center">
                        <span class="input-group-text" id="basic-addon1" style="font-size: 1.8vw;">@</span>
                        <input class="col" type="text" placeholder="Usuario" id="user">
                    </div>
                    <div class="form-floating mb-3 row align-items-center">

                        <input class="col" type="password" placeholder="Contraseña" id="pass">
                    </div>
                </div>
                <div style="padding-top: 1vw;"></div>
                <button class="btn btn-success btn-block" onclick="login()" style="font-size: 2vw;" type="button">Continuar</button>
                <button class="btn btn-success btn-block" style="font-size: 2vw;" type="button"
                    onclick="GoTo('registro.php')">Registrarse</button>
            </fieldset>

            <div id="alerta" class="p-5"></div>
        </form>
    </section>
</body>
<script type="text/javascript" src="/scripts/funciones.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>