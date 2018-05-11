<?php

require_once "../config/config.php";

$connect = null;
$user->connection = null;

$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$sql = "DELETE FROM survey WHERE surveyID = '" . $_POST["id"] . "'";
if (mysqli_query($connect, $sql)) {
    echo 'Data Deleted';
}
