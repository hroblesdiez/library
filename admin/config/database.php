<?php
//Connection to database
$host = 'localhost';
$db = 'database_name';
$user= 'database_user';
$password= 'database_password';

try {
    $connection = new PDO("mysql:host=$host;dbname=$db",$user,$password);

    if($connection) {
        // echo 'Conectado a la base de datos';
    }

} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>