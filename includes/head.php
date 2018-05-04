<?php

$page = $_SERVER[REQUEST_URI];
$page = str_replace("/csc174/final/", "", $page);

switch ($page) {
    case '':
        $title = "Home";
        break;
    case 'baroque.php':
        $title = "Baroque";
        break;
    case 'classical.php':
        $title = "Classical";
        break;
    case 'romantic.php':
        $title = "Romantic";
        break;
    case 'contact.php':
        $title = "Contact";
        break;
    case 'admin.php':
        $title = "Admin";
        break;
    default:
        $title = "Home";
        break;
}

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Classical Music |
            <?php echo $title ?>
        </title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/fa.css">
        <link href="https://fonts.googleapis.com/css?family=Alegreya|Dancing+Script" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/fa.js"></script>
        <script src="js/menu-highlighter.js"></script>
        <script src="js/scripts.js"></script>
    </head>