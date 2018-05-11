<?php

require_once "../config/config.php";

$connect = null;
$user->connection = null;

$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$id = $_POST["id"];
$text = $_POST["text"];
$column_name = $_POST["column_name"];
$sql = "UPDATE survey SET " . $column_name . "='" . $text . "' WHERE surveyID = '" . $id . "'";
if (mysqli_query($connect, $sql)) {
    echo 'Data Updated';
}
