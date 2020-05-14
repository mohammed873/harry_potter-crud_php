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
  <a class="navbar-brand" href="#">WIZARDS WORLD</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
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
<div>
    <h3 class="title">The world of magic is beautiful because of many persons , Name them?</h3>
    <hr>
    <?php if(isset($_SESSION['response'])){ ?>
   <div class="alert  alert-info alert-dismissible  text-center">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
       <b> <?= $_SESSION['response']; ?> </b> 
    </div>
    <?php } unset ($_SESSION['response']); ?>
</div>

    <div class="col-md-4  form_box">
        <h5 class="text-center text-info">write down your favorite character</h5>
        <form action="action.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$id; ?>">
           <div class="form-group">
               <input type="text" name="name" value="<?=$name; ?>" class="form-control  m-2" placeholder="Enter a name"  required>
           </div>
           <div class="form-group">
               <input type="email" name="email" value="<?=$email; ?>"class="form-control  m-2" placeholder="Enter email"  required>
           </div>
           <div class="form-group">
               <input type="tel" name="phone" value="<?=$phone; ?>" class="form-control  m-2" placeholder="Enter a phone number"  required>
           </div>
           <div class="form-group">
             <input type="hidden" name="oldpicture" value="<?=$picture; ?>">
               <input type="file" name="picture" class=" m-2  custom-file" >
               <img src="<?=$picture; ?>" width="120" class="img-thumbnail">
           </div>
           <div class="form-group">
             <?php if($update==true){ ?>
                <button type="submmit" name="update" class="btn btn-success btn-block  m-2" value="update now">update now</button>
              <?php }else{ ?>
                <button type="submmit" name="add"  class="btn btn-primary btn-block  m-2" value="submmit now">subbmit  now</button>
              <?php } ?>
           </div>
        </form>
    </div>

<br><br>

    <div class="col-md-7 list_box">
      <?php  
      $query = "SELECT * FROM crud";
      $stmt = $conix->prepare($query);
      $stmt->execute();
      $result=$stmt->get_result();
      ?>
        <h5 class="text-center text-info">The most favorite and interested characters in the world of magic</h5>
        <table class="table mr-4">
        <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
      </tr>
        </thead>
        <tbody>
        <?php while($row=$result->fetch_assoc()){ ?>
      <tr>
        <td> <?=$row['Id']; ?> </td>
        <td><img src=" <?=$row['Picture']; ?>" alt="pic" width="50"></td>
        <td> <?=$row['Name']; ?> </td>
        <td> <?=$row['Email']; ?> </td>
        <td> <?=$row['phone']; ?> </td>
        <td>
            <a href="details.php?details=<?=$row['Id']; ?>" class="badge badge-primary p-3">Details</a>
            <a href="index.php?edit=<?=$row['Id']; ?>" class="badge badge-success p-3">Edit</a>
            <a href="action.php?delete=<?=$row['Id']; ?>" class="badge badge-danger p-3" onclick="return confirm('Do you want to delete this person')">Delete</a>
        </td>
      </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>


<br><br>

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