<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<html>
  <head>
    <meta charset="utf-8">
    <title>Mercadito</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="php-login/assets/style.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 50%;
    height: 50%;
  }
  </style>




  </head>
  <body>
    <?php require 'php-login/partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $user['email']; ?>
      <br>Ahora tus compras son personalizadas
      <a href="logout.php">
        Logout
      </a>
    <?php else: ?>
      <h1>Please Login or SignUp</h1>

      <a href="login.php">Login</a> or
      <a href="signup.php">SignUp</a>
    <?php endif; ?>



<div class="container mt-3">
<div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/mandarina-0.jpg" alt="Mandarina" width="100" height="100">
    </div>
    <div class="carousel-item">
      <img src="/fresa.jpg" alt="Fresa" width="100" height="100">
    </div>
    <div class="carousel-item">
      <img src="/limon.jpg" alt="limon" width="100" height="100">
    </div>
    <div class="carousel-item">
      <img src="/mv.jpg" alt="M.Verde" width="100" height="100">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

</div>









  </body>
</html>
