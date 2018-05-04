<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'urcscon3_zabaziz');
define('DB_PASSWORD', 'zabaziz1');
define('DB_NAME', 'urcscon3_zabaziz');

$server = DB_SERVER;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$db = DB_NAME;

/* Connect to MySQL database */
$dsn = "mysql:host=$server;dbname=$db";

try {
    // create a PDO connection with the configuration data
    $connect = new PDO($dsn, $username, $password);

    // display a message if connected to database successfully
    // if ($connect) {
    //     echo "Connected to the <strong>$db</strong> database successfully!";
    // }
} catch (PDOException $e) {
    // report error message
    echo $e->getMessage();
}
