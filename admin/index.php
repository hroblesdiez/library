<?php
session_start();

if($_POST) {

    if(($_POST['user']) == 'xxxxxx' && ($_POST['password']) == 'xxxxxx'){

        $_SESSION['user'] = 'guess';
        $_SESSION['userName'] = 'xxxxxx';

        header('location:home.php');
 }  elseif (($_POST['user']) == '' || ($_POST['password']) == '') {
    $message = 'Please fill all fields';
 }  elseif (($_POST['user']) != 'xxxxxx' || ($_POST['password']) != 'xxxxxx') {
    $message = 'User or password are incorrect';
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
        <div class="container ">
        <br><br><br>
            <div class="row d-flex justify-content-center align-items-center">

                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Login
                        </div>
                        <div class="card-body">

                        <?php if(isset($message)) {?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $message; ?>
                            </div>
                        <?php } ?>

                            <form method="post">
                            <div class = "form-group">
                            <label for="exampleInputEmail1">User</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="user" aria-describedby="emailHelp" placeholder="User">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Sign In</button>
                            </form>


                        </div>

                    </div>
                </div>

            </div>
        </div>

  </body>
</html>