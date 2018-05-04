<?php

require_once "config/config.php";

require_once "includes/head.php";

?>

	<body>

		<?php

// require_once "templates/navbar.php";

?>

			<main class="grid">

				<div class="item-1">
					<a href="index.php">
						<i class="fas fa-music"></i> Home
					</a>
				</div>

				<div class="item-2">
					<a href="login.php">Login</a>
				</div>

				<div class="item-3">
					<a href="index.php">
						<h1 class="title">
							Classical Music
						</h1>
						<p class="subtitle">Baroque &amp; Romantic Periods</p>
					</a>
				</div>

				<div class="item-4">
					Wiki page for classical music
				</div>

				<div class="item-5">
					<a class="button" href="baroque.php">Learn about music starting from the Baoque period</a>
				</div>

			</main>

			<?php

// require_once "templates/footer.php";

?>

	</body>

	</html>