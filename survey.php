<?php

session_start();

require_once "config/config.php";

$name = $email = $helpful = $genre = "";
$name_err = $email_err = "";

// Processing form data when form is submitted
if (isset($_POST['btn-submit'])) {

    //Form input fields
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $helpful = trim($_POST['helpful']);
    $genre = trim($_POST['genre']);

    // Check input errors before inserting in database
    if ($name == "") {
        $error[] = "Please enter your name !";
    } else if ($email == "") {
        $error[] = "Please enter your email address !";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address !';
    } else if ($helpful == "") {
        $error[] = "All fields are required !";
    } else if ($genre == "") {
        $error[] = "All fields are required !";
    } else {
        if ($user->submitSurvey($name, $email, $helpful, $genre)) {
            $user->redirect('survey.php?submitted');
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

				<h2>Survey</h2>

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
} else if (isset($_GET['submitted'])) {
    ?>
						<div class="alert alert-info">
							<i class="fa fa-check" aria-hidden="true"></i> &nbsp; Successfully submitted. Go back
							<a href='index.php'>home</a>.
						</div>
						<?php
}
?>
						<form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]); ?>" method="POST">

							<div class="form-group">
								<label for="name">Name: </label>
								<input type="text" name="name" id="name">
							</div>

							<div class="form-group">
								<label for="email">Email: </label>
								<input type="email" name="email" id="email">
							</div>

							<div class="form-group">
								<label>Did this website do a good job introducing you to classical music?</label>
								<br>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="helpful" value="yes">
									<label class="form-check-label">yes</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="helpful" value="no">
									<label class="form-check-label">no</label>
								</div>
							</div>

							<div class="form-group">
								<label>What's your favorite genre of music?</label>
								<select class="form-control" name="genre">
									<option value="alternative">alternative</option>
									<option value="blues">blues</option>
									<option value="classical">classical</option>
									<option value="country">country</option>
									<option value="folk">folk</option>
									<option value="hip-hop">hip-hop</option>
									<option value="indie">indie</option>
									<option value="jazz">jazz</option>
									<option value="rock">rock</option>
									<option value="r&amp;b">r&amp;b</option>
									<option value="pop">pop</option>
									<option value="other">other</option>
								</select>
							</div>

							<button type="submit" name="btn-submit" class="btn btn-block btn-primary">
								SUBMIT
							</button>

							<br>

						</form>

			</div>


			<div class="clear-fix">

			</div>

			<?php

require_once "templates/footer.php";

?>

	</body>

	</html>