
<?php

session_start();

require_once "config/config.php";

logout();
redirect("login.php");