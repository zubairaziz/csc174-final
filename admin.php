<?php

session_start();

require_once "config/config.php";

require_once "includes/head.php";

?>

	<body>

		<?php

require_once "templates/navbar.php";

?>

			<div class="container">

				<h2>Welcome
					<?php echo $_SESSION['username']; ?>
				</h2>

				<p>Use this console to add, edit and delete data. To update data, simply edit contents in the table and deselect the row.</p>

				<br />
				<br />
				<br />
				<div class="table-responsive">
					<span id="result"></span>
					<div id="live_data"></div>
				</div>
			</div>

			<div class="clear-fix">

			</div>

			<?php

require_once "templates/footer.php";

?>

				<script>
					$(document).ready(function () {
						function fetch_data() {
							$.ajax({
								url: "includes/select.php",
								method: "POST",
								success: function (data) {
									$('#live_data').html(data);
								}
							});
						}
						fetch_data();
						$(document).on('click', '#btn_add', function () {
							var name = $('#name').text();
							var email = $('#email').text();
							var helpful = $('#helpful').text();
							var genre = $('#genre').text();
							if (name == '') {
								alert("Enter A Name");
								return false;
							}
							if (email == '') {
								alert("Enter An Email");
								return false;
							}
							if (helpful == '') {
								alert("Was It Helpful?");
								return false;
							}
							if (genre == '') {
								alert("Enter A Genre");
								return false;
							}
							$.ajax({
								url: "includes/insert.php",
								method: "POST",
								data: {
									name: name,
									email: email,
									helpful: helpful,
									genre: genre
								},
								dataType: "text",
								success: function (data) {
									alert(data);
									fetch_data();
								}
							})
						});


						function edit_data(id, text, column_name) {
							$.ajax({
								url: "includes/edit.php",
								method: "POST",
								data: {
									id: id,
									text: text,
									column_name: column_name
								},
								dataType: "text",
								success: function (data) {
									//alert(data);
									$('#result').html("<div class='alert alert-success'>" + data + "</div>");
								}
							});
						}
						$(document).on('blur', '.name', function () {
							var id = $(this).data("id1");
							var name = $(this).text();
							edit_data(id, name, "name");
						});
						$(document).on('blur', '.email', function () {
							var id = $(this).data("id2");
							var email = $(this).text();
							edit_data(id, email, "email");
						});
						$(document).on('blur', '.helpful', function () {
							var id = $(this).data("id3");
							var helpful = $(this).text();
							edit_data(id, helpful, "helpful");
						});
						$(document).on('blur', '.genre', function () {
							var id = $(this).data("id4");
							var genre = $(this).text();
							edit_data(id, name, "genre");
						});

						$(document).on('click', '.btn_delete', function () {
							var id = $(this).data("id5");
							if (confirm("Are you sure you want to delete this?")) {
								$.ajax({
									url: "includes/delete.php",
									method: "POST",
									data: {
										id: id
									},
									dataType: "text",
									success: function (data) {
										alert(data);
										fetch_data();
									}
								});
							}
						});
					});
				</script>

	</body>

	</html>