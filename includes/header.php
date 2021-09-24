<?php
  include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title> Attendence - <?php echo  $title ?></title>
</head>
<body>
     <div class="container-fluid navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">IT Conference</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link nav-item " aria-current="page" href="index.php">Home</a>
            <a class="nav-link nav-item " href="viewrecords.php">View Attendence</a>
          </div>
        </div>
        <div class="navbar-nav d-flex">
          <?php 
          if (!isset($_SESSION['id'])) 
           {
          ?>
             <a class=" navbar-brand btn btn-outline-success nav-item" aria-current="page" href="login.php">Login</a>
           <?php } else { ?>
             <span class=" navbar-brand text-secondary">Hello <?php echo $_SESSION['username']."!" ?></span>
             <a class=" navbar-brand btn btn-outline-danger nav-item" aria-current="page" href="logout.php">Logout</a>
           <?php } ?>
        </div>
     </div>
    <div class="container">
   
      </br>



