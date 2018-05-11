<?php

session_start();

require_once "config/config.php";

if ($user->is_loggedin() != "") {
    $user->redirect('admin.php');
}

if (isset($_POST['btn-login'])) {
    $uname = $_POST['txt_uname_email'];
    $umail = $_POST['txt_uname_email'];
    $upass = $_POST['txt_password'];

    if ($user->login($uname, $umail, $upass)) {
        $user->redirect('admin.php');
    } else {
        $error = "Wrong Details !";
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
						<h2>Log In</h2>
						<hr />
						<?php
if (isset($error)) {
    ?>
							<div class="alert alert-danger">
								<i class="fa fa-exclamation" aria-hidden="true"></i> &nbsp;
								<?php echo $error; ?> !
							</div>
							<?php
}
?>
							<div class="form-group">
								<input type="text" class="form-control" name="txt_uname_email" placeholder="Username or Email" required />
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="txt_password" placeholder="Password" required />
							</div>
							<div class="clearfix"></div>
							<hr />
							<div class="form-group">
								<button type="submit" name="btn-login" class="btn btn-block btn-primary">
									SIGN IN
								</button>
							</div>
							<br />
							<label>Don't have account yet ?
								<a href="signup.php">Sign Up Here</a>
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