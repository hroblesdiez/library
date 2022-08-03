<?php
include("../template/header.php");
?>
<?php

$txtID = (isset($_POST['txtID']))? $_POST['txtID'] : '';
$txtName = (isset($_POST['txtName']))? $_POST['txtName'] : '';
$txtImage = (isset($_FILES['txtImage']['name']))? $_FILES['txtImage']['name'] : '';
$action = (isset($_POST['action']))? $_POST['action'] : '';

include("../config/database.php");

switch($action) {
    case "Add":

        $query = "INSERT INTO books (name, image) VALUES ( :name, :image);";

        $statementSQL = $connection->prepare($query);
        $statementSQL->bindParam(':name',$txtName);

        $date = new DateTime();
        $fileName = ($txtImage !='')? $date->getTimestamp(). '_' .$_FILES['txtImage']['name']: 'image.jpg';

        $tmpImage = $_FILES['txtImage']['tmp_name'];
        if($tmpImage != '') {
            move_uploaded_file($tmpImage, '../../img/'.$fileName);
        }

        $statementSQL->bindParam(':image',$fileName);
        $statementSQL->execute();
        header('location:books.php');
        break;

    case "Save":
        //echo 'You clicked Modify button';
        $statementSQL = $connection->prepare("UPDATE books SET name=:name WHERE id=:id");
        $statementSQL->bindParam(':id',$txtID);
        $statementSQL->bindParam(':name',$txtName);
        $statementSQL->execute();
        header('location:books.php');
        if($txtImage != '') {

            $date = new DateTime();
            $fileName = ($txtImage !='')? $date->getTimestamp(). '_' .$_FILES['txtImage']['name']: 'image.jpg';
            $tmpImage = $_FILES['txtImage']['tmp_name'];
            move_uploaded_file($tmpImage, '../../img/'.$fileName);

            $statementSQL = $connection->prepare("SELECT * FROM books WHERE id=:id");
            $statementSQL->bindParam(':id',$txtID);
            $statementSQL->execute();
            $book = $statementSQL->fetch(PDO::FETCH_LAZY);

            if(isset($book['image']) && ($book['image'] != 'image.jpg')) {
                if(file_exists('../../img/'.$book['image'])) {
                    unlink('../../img/'.$book['image']);
                }
            }

        $statementSQL = $connection->prepare("UPDATE books SET image=:image WHERE id=:id");
        $statementSQL->bindParam(':id',$txtID);
        $statementSQL->bindParam(':image',$fileName);
        $statementSQL->execute();
        header('location:books.php');
        }
        break;

    case "Cancel":
        header('location:books.php');
        break;

    case "Edit":
        $statementSQL = $connection->prepare("SELECT * FROM books WHERE id=:id");
        $statementSQL->bindParam(':id',$txtID);
        $statementSQL->execute();
        $book = $statementSQL->fetch(PDO::FETCH_LAZY);

        $txtName = $book['name'];
        $txtImage = $book['image'];

        break;

    case "Delete":
        $statementSQL = $connection->prepare("SELECT * FROM books WHERE id=:id");
        $statementSQL->bindParam(':id',$txtID);
        $statementSQL->execute();
        $book = $statementSQL->fetch(PDO::FETCH_LAZY);

        if(isset($book['image']) && ($book['image'] != 'image.jpg')) {
            if(file_exists('../../img/'.$book['image'])) {
                unlink('../../img/'.$book['image']);
            }
        }

        $statementSQL = $connection->prepare("DELETE FROM books WHERE id=:id");
        $statementSQL->bindParam(':id',$txtID);
        $statementSQL->execute();
        header('location:books.php');
        break;
}

$statementSQL = $connection->prepare("SELECT * FROM books");
$statementSQL->execute();

$bookList = $statementSQL->fetchAll(PDO::FETCH_ASSOC);


?>
<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            <span>Book details</span>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class = "form-group">
                    <label for="txtID">ID</label>
                    <input type="text" required readonly class="form-control" name="txtID" id="txtID" placeholder="ID" value="<?php echo $txtID; ?>"/>
                </div>

                <div class = "form-group">
                    <label for="txtName">Name</label>
                    <input type="text" required class="form-control" name="txtName" id="txtName" placeholder="Name" value="<?php echo $txtName; ?>"/>
                </div>

                <div class = "form-group">
                    <label for="txtImage">Image</label>
                    <?php echo $txtImage; ?>

                    <?php if($txtImage != '') { ?>
                        <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImage; ?>" width="50" alt="" srcset="">

                    <?php } ?>

                    <input type="file" <?php echo ($action=='Add')? 'required': ''; ?> class="form-control" name="txtImage" id="txtImage" placeholder="Image" />
                </div>

                <div class="btn-group" role="group" aria-label="">

                    <button type="submit" name="action" <?php echo ($action=='Edit')? 'disabled': ''; ?> value="Add" class="btn btn-success">Add</button>

                    <button type="submit" name="action" <?php echo ($action!='Edit')? 'disabled': ''; ?> value="Save" class="btn btn-warning">Save</button>

                    <button type="submit" name="action" <?php echo ($action!='Edit')? 'disabled': ''; ?> value="Cancel" class="btn btn-info">Cancel</button>
                </div>
            </form>
        </div>

    </div>




</div>
<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($bookList as $book) { ?>
            <tr>
                <td><?php echo $book['id']; ?></td>
                <td><?php echo $book['name']; ?></td>

                <td><img src="../../img/<?php echo $book['image']; ?>" class="img-thumbnail rounded" width="50" alt="" srcset=""></td>

                <td>

                    <form method="post">
                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $book['id']; ?>>" />

                        <input type="submit" name="action" value="Edit" class="btn btn-primary"/>

                        <input type="submit" name="action" value="Delete" class="btn btn-danger"/>

                    </form>


                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
include("../template/footer.php");
?>