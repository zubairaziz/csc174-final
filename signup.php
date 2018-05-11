<?php

session_start();

require_once "config/config.php";

if ($user->is_loggedin() != "") {
    $user->redirect('admin.php');
}

if (isset($_POST['btn-signup'])) {
    $uname = trim($_POST['txt_uname']);
    $umail = trim($_POST['txt_umail']);
    $upass = trim($_POST['txt_upass']);

    if ($uname == "") {
        $error[] = "provide username !";
    } else if ($umail == "") {
        $error[] = "provide email address !";
    } else if (!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address !';
    } else if ($upass == "") {
        $error[] = "provide password !";
    } else if (strlen($upass) < 6) {
        $error[] = "Password must be atleast 6 characters";
    } else {
        try {
            $stmt = $connect->prepare("SELECT username,email FROM users WHERE username=:uname OR email=:umail");
            $stmt->execute(array(':uname' => $uname, ':umail' => $umail));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['username'] == $uname) {
                $error[] = "Sorry, username is already taken!";
            } else if ($row['email'] == $umail) {
                $error[] = "Sorry, email address is already in use!";
            } else {
                if ($user->register($uname, $umail, $upass)) {
                    $user->redirect('signup.php?joined');
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

require_once "includes/head.php";

?>

	<body>

		<?php

require_once "templates/navbar.php";

?>

			<div class="container">

				<div class="form-container">
					<form method="post">
						<h2>Sign up.</h2>
						<hr />
						<?php
if (isset($error)) {
    foreach ($error as $error) {
        ?>
							<div class="alert alert-danger">
								<i class="fa fa-exclamation" aria-hidden="true"></i> &nbsp;
								<?php echo $error; ?>
							</div>
							<?php
}
} else if (isset($_GET['joined'])) {
    ?>
								<div class="alert alert-info">
									<i class="fa fa-check" aria-hidden="true"></i> &nbsp; Successfully registered
									<a href='login.php'>login</a> here
								</div>
								<?php
}
?>
								<div class="form-group">
									<input type="text" class="form-control" name="txt_uname" placeholder="Username" value="<?php if (isset($error)) {echo $uname;}?>"
									/>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="txt_umail" placeholder="Email address" value="<?php if (isset($error)) {echo $umail;}?>"
									/>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="txt_upass" placeholder="Password" />
								</div>
								<div class="clearfix"></div>
								<hr />
								<div class="form-group">
									<button type="submit" class="btn btn-block btn-primary" name="btn-signup">
										SIGN UP
									</button>
								</div>
								<br />
								<label>Already have an account?
									<a href="login.php">Sign In Here</a>
								</label>
					</form>
				</div>

			</div>

			<div class="clear-fix">

			</div>

			<?php

require_once "templates/footer.php";

?>

	</body>

	</html>