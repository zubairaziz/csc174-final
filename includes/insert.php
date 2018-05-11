<?php
require_once "../config/config.php";

$connect = null;
$user->connection = null;

$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$name = $_POST['name'];
$email = $_POST['email'];
$helpful = $_POST['helpful'];
$genre = $_POST['genre'];

$sql = "INSERT INTO survey(name, email, helpful, genre) VALUES('$name', '$email', '$helpful', '$genre')";
if (mysqli_query($connect, $sql)) {
    echo 'Data Inserted';
}
