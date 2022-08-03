<?php include('template/header.php'); ?>

<?php include('admin/config/database.php');

$statementSQL = $connection->prepare("SELECT * FROM books");
$statementSQL->execute();
$bookList = $statementSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach($bookList as $book) { ?>

    <div class="col-md-4">
        <div class="card me-2 mb-5" style="height:275px;">
            <img class="card-img-top" src="./img/<?php echo $book['image']; ?>" height="150" alt="" style="object-fit: fill !important;">
            <div class="card-body text-center">
                <h4 class="card-title"><?php echo $book['name']; ?></h4>
                <a name="" id="" class="btn btn-primary" href="#" role="button">See more</a>
            </div>
        </div>
    </div>

<?php }

include('template/footer.php');

?>