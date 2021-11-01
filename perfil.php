<?php
session_start();
require 'conexion.php';
$collection = $client->calendapp->users;
$cursor = $collection->findOne(array('user' => $_SESSION['usuario']));
$_SESSION['email'] = $cursor['email'];
$_SESSION['description'] = $cursor['description'];
$_SESSION['cursos'] = $cursor['cursos'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil | Calendapp</title>
    <link rel="shortcut icon" href="/iconos/calendar.jpg">
    <link rel="preload" href="/css/main.css" as="style">
    <link rel="preload" href="/css/mainbs.css" as="style">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/mainbs.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/scripts/funciones.js"></script>
    <script type="text/javascript" src="/scripts/bootstrap.js"></script>



</head>

<body class="calendar-background">


    <div class="home-box">
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container-fluid">
                <script>
                    console.log("xd");
                </script>

                <a style="font-size: 2vw;" id="top" class="navbar-brand" href="home.php"><i class="far fa-calendar-alt"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 col-9">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                    </ul>

                    <form class="d-flex col-2">
                        <input class="form-control me-2" type="search" aria-label="Search">
                        <button style="font-size: 1vw;" class="btn btn-outline-info" type="submit">Buscar</button>
                    </form>

                    <div class="col-1">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-1">
                            <li class="nav-item dropdown d-flex">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Perfil
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#" style="font-size:1vw">Mi Perfil</a></li>
                                    <li><a class="dropdown-item" href="#" style="font-size:1vw">Mi Calendario</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="index.php" style="font-size:1vw">Cerrar
                                            Sesión</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </nav>
        <div class="profile-container" style="margin: 3vw;
        background-color: white;
        border-radius: 1.5vw;
        border-style: ridge;">
            <div class="center" style="padding-top: 1vw;">
                <h1 for="formFileSm" class="form-label center">@<?php echo $_SESSION['usuario'] ?></h1>

                <span class="d-inline-block center" data-bs-placement="bottom" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Cambia tu foto de perfil">
                    <input id="profile-image-upload" class="d-none position-absolute top-50 start-50" type="file" accept="image/x-png,image/gif,image/jpeg">
                    <input type="image" class="profile-pic-big img-fluid" id="profile-pic" src="/uploads/<?php echo $_SESSION['usuario'] ?>.png" onerror="this.onerror=null; this.src='/profile-picture/default.png'">
                    <span class="spinner-border text-info d-none" id="cargando" role="status">
                    </span>
                    <div class="mt-5 mb-5">
                        <h1>Descripción</h1>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                <h2><?php echo $_SESSION['description'] ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                </span>
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <h1>Información personal</h1>
                            <div class="m-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <span class="input-group-text m-2" id="basic-addon1">
                                        <h3><?php echo $_SESSION['email'] ?></h3>
                                    </span>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <span class="input-group-text m-2" id="basic-addon1">
                                        <h3><?php echo $_SESSION['usuario'] ?></h3>
                                    </span>
                                </div>

                            </div>
                        </div>


                        <div class="col-6 mb-5">
                            <h1 class="mb-5">Cursos</h1>
                            <ul class="list-group">

                                <?php
                                if (count($_SESSION['cursos']) == 0) {
                                    echo "<h3>No hay cursos</h3>";
                                }

                                for ($i = 0; $i < count($_SESSION['cursos']); $i++) {
                                    $curso = str_replace("_", " ", $_SESSION['cursos'][$i]);
                                    echo "<li style='font-size:20px' class='py-2 list-group-item'>$curso</li>";
                                }
                                ?>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>