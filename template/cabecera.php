<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Wonder Hair</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/cabezera.css">
    <link rel="stylesheet" href="css/fondo.css">
    <link rel="stylesheet" href="css/Perfilsalon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.3.2/socket.io.js"></script>
    <script>
      const socket = io('http://127.0.0.1:3000');
      if (Notification.permission !== 'granted') {
          Notification.requestPermission().then((permission) => {
          if (permission === 'granted') {
              console.log('Permiso de notificación otorgado');
          } else {
              console.log('Permiso de notificación denegado');
          }
          });
      }

      function mostrarNotificacion(titulo, cuerpo) {
        console.log('Notificar');
          if (Notification.permission === 'granted') {
              const options = {
                  body: cuerpo,
              };

              const notification = new Notification(titulo, options);
          }
      }

      socket.on('messageToClient', (data) => {
          if (data.to === <?php echo $_SESSION['id']; ?>) {
              mostrarNotificacion(`Nuevo mensaje de ${data.nombre}`, data.msg);
          }
      });
    </script>
    
</head>
<body class="fondo">
   <!--------top bar----------->
  <section class="bg-primary">
    <div class="container">
      <div class="row top-bar" style="padding-botton: 3px;">
        <div class="col text-right">
          <span class="text-white" style=" font-size: 12px; padding: 1px 5px;">
            <!----Iconos de redes sociales---->
            <i class="fa-brands fa-facebook-f"></i>
          </span>
          <span class="text-white" style=" font-size: 12px; padding: 1px 5px;">
            <!----Iconos de redes sociales---->
            <i class="fa-brands fa-instagram"></i>
          </span>
          <span class="text-white" style=" font-size: 12px; padding: 1px 5px;">
            <!----Iconos de redes sociales---->
            <i class="fa-brands fa-twitter"></i>
          </span>
        </div>
        <div class="col text-right">
          <span class="text-white">
            <i class="fa fa-phone"></i>
            +(503)7978-2920
          </span>
          <span class="col text-white">
            |
          </span>
          <span class="text-white">
            <i class="fa-regular fa-envelope"></i>
            localwonder@gmail.com
          </span>
        </div>
      </div>
    </div>
  </section>
  <!--------top bar----------->

  <!-------add nav------ bereeee----->
  <section class="bg-white">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand p-0" href="#">
            <!---logooooo---->
            <img src="img/Logo.png" style="height: 60px;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto" >
              <li class="nav-item" style="font-weight: 600; margin: 6px; ">
                <a class="nav-link active" aria-current="page" href="index.php" style="font-size: 20px;" >Salones</a>
              </li>
              <li class="nav-item" style="font-weight: 600; margin: 6px; " >
                <a class="nav-link" href="#" style="font-size: 20px;">Productos</a>
              </li>
              <li class="nav-item"  style="font-weight: 600; margin: 6px; ">
                <a class="nav-link" href="cursos.php" style="font-size: 20px;">Cursos de belleza</a>
              </li>
              <li class="nav-item dropdown"  style="font-weight: 600; margin: 6px; ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 20px;">
                  Mas...
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#"><i class="fa fa-bookmark"></i> Mis marcadores</a></li>
                  <li><a class="dropdown-item" href="contacto.php"><i class="fa-solid fa-address-book"></i> Contacto</a></li>
                  <li><a class="dropdown-item" href="#">Acerca de.</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- Example split danger button -->
          <!--<div class="btn-group">
            <button type="button" class="btn btn-primary">INGRESAR</button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="Registro.php"><img src="img\barbershop.png" style="height: 30px;"> PUBLICAR SALON</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="loginUsuario/indexUsuario.php"><i class="fa-solid fa-user" style="height: 30px;"></i> INICIO DE SECCION</a></li>
            </ul>
          </div>-->
          <a class="navbar-brand p-0" href="chat-wonder/chat.php">
            <!---logooooo---->
            <img src="images/burbuja-de-chat.png" style="height: 60px;">
          </a>
          <a class="navbar-brand p-0"  href="<?php if(isset($_SESSION['id'])) { ?> Perfil_Salon.php?id=<?php echo $_SESSION['id'] ?> <?php } else { ?>  loginUsuario/indexUsuario.php <?php } ?>">
            <!---logooooo---->
            <?php 
              if(isset($_SESSION['logo'])) {
                echo '<img src="img/logos/'.$_SESSION['logo'].'" alt="Logo" style="height: 60px; border: 2px solid #000; border-radius: 50%;">';
              } else {
                echo '<img src="images/personal.png" style="height: 60px; border: 2px solid #000; border-radius: 50%;">';
              }
            ?>

            <!-- <li><a class="dropdown-item" href="loginUsuario/servidor/login/logout.php">Salir del sistema</a></li> -->
          </a>
          
        </div>
      </nav>
    </div>
  </section>
  <!-------add nav------ bereeee----->

    <div class="container">
        <br/>
        <div class="row">