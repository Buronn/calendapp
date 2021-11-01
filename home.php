<?php
session_start();
require 'conexion.php';
$collection = $client->calendapp->post;
$cursor = $collection->find();
$cursor = iterator_to_array($cursor);
$cursor = array_reverse($cursor);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio | Calendapp</title>
  <link rel="shortcut icon" href="/iconos/calendar.jpg">
  <link rel="preload" href="/css/main.css" as="style">
  <link rel="preload" href="/css/mainbs.css" as="style">
  <link href="/css/main.css" rel="stylesheet" type="text/css">
  <link href="/css/mainbs.css" rel="stylesheet" type="text/css">
  <link href="/css/carousel.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="/scripts/funciones.js"></script>
  <script type="text/javascript" src="/scripts/bootstrap.js"></script>
  <script type="text/javascript" src="/scripts/test.js"></script>




</head>

<body class="calendar-background">
  <div class="home-box">
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
      <div class="container-fluid">

        <a style="font-size: 2vw;" id="top" class="navbar-brand" href="#"><i class="far fa-calendar-alt"></i></a>
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
                  <li><a class="dropdown-item" href="perfil.php" style="font-size:1vw">Mi Perfil</a></li>
                  <li><a class="dropdown-item" href="#" style="font-size:1vw">Mi Calendario</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="index.php" style="font-size:1vw">Cerrar Sesión</a></li>
                </ul>
              </li>
            </ul>
          </div>

        </div>

      </div>
    </nav>
    <div class="center" style="padding-top: 1vw;">
      <div class="publicar">

        <div class="white-container">
          <a data-bs-toggle="modal" onclick="window.scrollTo(0,0);" data-bs-target="#Publicar">
            <div class="input-group mb-3">
              <span><img class="profile-pic" src="/uploads/<?php echo $_SESSION['usuario'] ?>.png" id="fotodeperfil" onerror="this.onerror=null; this.src='/profile-picture/default.png'"></span>
              <h2 style="padding-left: 1vw;">¿Qué quieres publicar?</h2>

            </div>
          </a>
        </div>
      </div>
      <div class="publicaciones">
        <h1>Publicaciones</h1>



        <!-- <div class="white-container">
          <div class="input-group mb-3">
            <span><img class="profile-pic" src="/profile-picture/default.png" onerror="this.onerror=null; this.src='/profile-picture/default.png'"></span>
            <div class="col-0">
              <h1 style="padding-left: 1vw;">Usuario 1</h1>
            </div>
            <div style="text-align:right; flex-grow: 1;">
              <h4>Hora: 15:45</h4>
            </div>
            <div style="text-align: left;padding-top: 1vw;">


              <div style="padding-bottom: 1vw;">
                <div class="slideshow-container" id="slider">
                  <div class="mySlides1" style="display: block;">
                    <img class="img-fluid" src="/images/foto1.jpg" name="slide" style="width:100%;object-fit: cover;">
                  </div>

                  <div class="mySlides1">
                    <img class="img-fluid" src="/images/foto2.jpg" name="slide" style="width:100%;object-fit: cover;">
                  </div>

                  <div class="mySlides1">
                    <img class="img-fluid" src="/images/foto3.jpg" name="slide" style="width:100%;object-fit: cover;">
                  </div>

                  <div class="mySlides1">
                    <img class="img-fluid" src="/images/calendario-random.png" style="width:100%;object-fit: cover;">
                  </div>

                  <div class="mySlides1">
                    <img class="img-fluid" src="/images/foto4.png" style="width:100%;object-fit: cover;">
                  </div>

                  <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
                  <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
                </div>

              </div>


              <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. At itaque tenetur ea similique inventore quam
                temporibus. Tenetur dolores temporibus consectetur. Reprehenderit voluptate corrupti praesentium vitae
                consectetur distinctio cum, possimus veritatis!</h2>
            </div>
          </div>
          <div class="input-group" style="text-align: left;padding-left: 1vw;">
            <div class="col-1"> <i class="far fa-heart"></i>
            </div>
            <div class="col-1"> <i class="far fa-comment"></i>
            </div>
            <div class="col-10"> <i class="fas fa-share"></i>
            </div>
          </div>
        </div> -->



        <?php
        foreach ($cursor as $user) {

          $a = $user['likes'];
          $existe = false;
          for ($i = 0; $i < sizeof($a); $i++) {
            if ($a[$i] == $_SESSION['usuario']) {
              $existe = true;
            }
          }

          echo "<div class='white-container'>
          <div id=" . $user['_id'] . " class='input-group mb-3'>
            <span><img class='profile-pic' src='/uploads/" . $user['user'] . ".png' onerror=\"this.onerror=null; this.src='/profile-picture/default.png'\"></span>
            <div class='col-0'>
              <h1 style='padding-left: 1vw;'>" . $user['user'] . "</h1>
            </div>
            <div style='text-align:right; flex-grow: 1;'>
              <h4>Hora " . $user['time'] . "</h4>
            </div>
            <div class='col-12' style='text-align: left;padding-top: 1vw;'>
              <h2>" . $user['text'] . "</h2>
            </div>
          </div>
          <div class='input-group' style='text-align: left;padding-left: 1vw;'>";
          if ($existe) {
            echo "<div onclick=Like('" . $user['_id'] . "','true') class='col-1'> <i style='color: red' id=like" . $user['_id'] . "  class='fas fa-heart'></i>
            </div>
            " . sizeof($user['likes']) . "";
          } else {
            echo "<div onclick=Like('" . $user['_id'] . "','false') class='col-1'> <i id=like" . $user['_id'] . "  class='far fa-heart'></i>
            </div>
            " . sizeof($user['likes']) . "";
          }
          echo "
            <div class='col-1' onclick=ShowComments('" . $user['_id'] . "') id=comment" . $user['_id'] . "> <i class='far fa-comment'></i>
            </div>
            " . sizeof($user['comment']) . "

          </div>";

          


          echo "<div class='col-12 hide' id=hide" . $user['_id'] . " style='text-align: left;'>";
          $comentarios = $user['comment'];
          for ($i = 0; $i < sizeof($comentarios); $i++) {
              echo "<div class='m-2'>";
              echo "<span class='m-1'><img class='profile-pic-sm' src='/uploads/" . $comentarios[$i]['user'] . ".png' onerror=\"this.onerror=null; this.src='/profile-picture/default.png'\"></span>";
              echo "<b>".$comentarios[$i]['user']."</b> ";
              echo $comentarios[$i]['comment'];
              echo "<div style='text-align:right'><span><h4>".$comentarios[$i]['time']."</h4></span></div>";
              echo "</div>";
          }

          echo "
          <div class='input-group'>
            <span class='m-1'><img class='profile-pic-sm' src='/uploads/" . $_SESSION['usuario'] . ".png' onerror=\"this.onerror=null; this.src='/profile-picture/default.png'\"></span>
            <input type='text' id=text" . $user['_id'] . " class='form-control' placeholder='Comentar' aria-label='Username' aria-describedby='basic-addon1'>
            </div>
            <script>
            $('#text" . $user['_id'] . "').bind('enterKey',function(e){
              Comment('" . $user['_id'] . "');
           });
           $('#text" . $user['_id'] . "').keyup(function(e){
               if(e.keyCode == 13)
               {
                   $(this).trigger('enterKey');
               }
           });
            </script>
          </div>


        </div>";
        };
        ?>





      </div>
      <div class="modal fade" id="Publicar" tabindex="-1" aria-labelledby="PublicarLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title" id="PublicarLabel">Publicar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <textarea class="form-control" id="to-publish"></textarea>

                </div>
                <i class="far fa-image"></i>
              </form>
            </div>
            <div class="modal-footer">
              <button style="font-size: 1vw;" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button onclick="Publicar(),setTimeout(() => { location.reload(); }, 2000);" style="font-size: 1vw;" type="button" data-bs-dismiss="modal" class="btn btn-outline-info">Publicar</button>

            </div>
          </div>
        </div>
      </div>


    </div>


</body>

</html>