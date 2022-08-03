<?php
session_start();

if(!isset($_SESSION['user'])) {
  header('location:../admin/index.php');
} else {
  if($_SESSION['user'] == 'guess') {
    $userName = $_SESSION['userName'];
  }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
        <?php $url="http://".$_SERVER['HTTP_HOST']."/library"; ?>

        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active" href="#">Library Administration <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="<?php echo $url."/admin/sections/books.php"; ?>">Books</a>
                <a class="nav-item nav-link" href="<?php echo $url; ?>" target="_blank">See web site</a>
                <a class="nav-item nav-link" href="<?php echo $url."/admin/sections/close.php"; ?>">Log Out</a>

            </div>
        </nav>
        <br>
        <div class="container">
            <div class="row">