<?php
    include('template/header.php');

?>
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1 class="display-3">Welcome <?php echo ucfirst($userName); ?></h1>
                        <p class="lead">Here you will be able to administrate the books in your web site</p>
                        <hr class="my-2">
                        <br>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="sections/books.php" role="button">Manage books</a>
                        </p>
                    </div>
                </div>

                <?php
    include('template/footer.php');

?>