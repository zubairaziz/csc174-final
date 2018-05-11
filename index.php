<?php

require_once "config/config.php";

require_once "includes/head.php";

?>

	<body>

		<?php

// require_once "templates/navbar.php";

?>

			<main class="home-grid home-text">

				<div class="item-1">
					<a class="btn btn-dark btn-lg" href="index.php">
						<i class="fas fa-music"></i> Home
					</a>
				</div>

				<div class="item-2">
					<a class="btn btn-dark btn-lg" href="login.php">
						<i class="fas fa-sign-in-alt"></i> Login</a>
				</div>

				<div class="item-3 main-title">
					<a class="" href="index.php">
						<h1>
							Classical Music
						</h1>
						<p class="lead">The Baroque and Romantic period.</p>
					</a>
				</div>

				<div class="item-4">
					<a class="btn btn-dark btn-lg" href="https://en.wikipedia.org/wiki/Classical_music">
						<i class="fab fa-wikipedia-w"></i> Wiki</a>
				</div>

				<div class="item-5">
					<a class="btn btn-warning btn-lg" href="baroque.php">Learn more here!</a>
				</div>

			</main>

			<?php

// require_once "templates/footer.php";

?>

	</body>

	</html>