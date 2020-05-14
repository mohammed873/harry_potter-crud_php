<?php
include 'action.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
</head>


<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php">WIZARDS WORLD</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Gallery</a>
      </li>
    </ul>
  </div>
</nav>

<div class="header_pic">
    <img src="https://coverfiles.alphacoders.com/675/67588.png" alt="">
</div>

<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-3 p-2 rounded">
            <h2 class="bg-light p-2 rounded text-center text-dark">ID : <?= $vid; ?></h2>
            <div class="text-center">
                <img src="<?= $vpicture; ?>" width="300"  class="img-thumbnail">
            </div>
            <h4 class="text-light text-center">Name : <?= $vname; ?></h4>
            <h4 class="text-light text-center">Email : <?= $vemail; ?></h4>
            <h4 class="text-light text-center">Phone : <?= $vphone; ?></h4>

        </div>
    </div>
</div>

<br>

<div class="footer">
  <p>all right reseved from youcode</p>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>