<nav id="navbar">
    <ul class="nav nav-pills justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="fa fa-home"></i>
                Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="baroque.php">Baroque</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="romantic.php">Romantic</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="survey.php">
                <i class="fa fa-envelope"></i>
                Survey</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i>
                Account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <?php

if (isset($_SESSION['user_session'])) {
    echo "
    <a class='dropdown-item' href='admin.php'>Admin</a>
    <a class='dropdown-item' href='logout.php'>Logout</a>
    ";
} else {
    echo "
    <a class='dropdown-item' href='login.php'>Log In</a>
    <a class='dropdown-item' href='signup.php'>Sign Up</a>
    ";
}

?>
            </div>
        </li>

    </ul>
</nav>