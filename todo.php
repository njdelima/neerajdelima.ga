
<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Neeraj\'s Private Space."');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Not allowed.';
    exit;
} else {
    if (!($_SERVER['PHP_AUTH_USER'] === "neeraj" && $_SERVER['PHP_AUTH_PW'] === "delima13")) {
	echo 'Incorrect credentials';
	exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<title>Neeraj DeLima</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="robots" content="noindex, nofollow" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="todo.css" />
	<link rel="icon" type="image/jpg" href="../images/headshot.jpg" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	<?php
		require_once 'login.php';

		$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

		if ($connection -> connect_error) {
			die($connection -> connect_error);
		}

		if (isset($_GET['id'])) {
			$id = sanitizeString($_GET['id']);
			$query = "DELETE FROM todo WHERE id='$id'";
			$result = $connection -> query($query);

			if (!$result) {
				die($connection ->error);
			}
		}
		if (isset($_GET['text']) && isset($_GET['block'])) {
			$text = sanitizeString($_GET['text']);
			$block = sanitizeString($_GET['block']);

			$query = "INSERT INTO todo (text, block) VALUES ('$text', '$block')";
			$result = $connection -> query($query);

			if (!$result) {
				die($connection -> error);
			}
		}

	?>
	<div class="first-block">
		<div class="header-row item-row">Urgent / Important</div>
		<div class="items-list">
	<?php
		printAllItems(1);
	?>
		</div>
	</div>
	<div class="second-block">
		<div class="header-row item-row">Urgent</div>
		<div class="items-list">
	<?php
		printAllItems(2);
	?>
		</div>
	</div>

	<div class="third-block">
		<div class="header-row item-row">Important</div>
		<div class="items-list">
	<?php
		printAllItems(3);
	?>
		</div>
	</div>
	<div class="fourth-block">
		<div class="header-row item-row">Not Urgent / Not Important</div>
		<div class="items-list">
	<?php
		printAllItems(4);
	?>
		</div>
	</div>
	<!--<div class="fifth-block">
		<div class="header-row item-row">Miscellaneous</div>
		<div class="text-blob">
	<?php
		$query = "SELECT * FROM todo WHERE block='5'";
		$result = $connection -> query($query);
		if (!$result) {
			die ($connection -> error);
		}
		$result -> data_seek($i);
		$row = $result -> fetch_array(MYSQLI_ASSOC);
		$text = $row['text'];
		$id = $row['id'];
		echo "<form class='misc-form'><textarea name='misc-text'>$text</textarea>";
		echo "<input type='hidden' name='block' value='5' />";
		echo "<input type='hidden' name='id' value='$id' />";
		echo "<button class='add-button'><i class='fa fa-plus add-icon'></i></button></form>";
	?>
		</div>
	</div>-->

	<?php
		function sanitizeString($var) {
			$var = stripslashes($var);
			$var = htmlentities($var);
			$var = strip_tags($var);
			return $var;
		}
		function printAllItems($block) {
			global $connection;
			$query = "SELECT * FROM todo WHERE block='$block'";
			$result = $connection -> query($query);
			if (!$result) {
				die ($connection -> error);
			}
			$rows = $result -> num_rows;
			for  ($i = 0; $i < $rows; $i++) {
				$result -> data_seek($i);
				$row = $result -> fetch_array(MYSQLI_ASSOC);
				$text = $row['text'];
				$id = $row['id'];
				echo "<div class='item-row'>";
				echo "<form class='delete-form'><input type='hidden' name='id' value='$id' /></form>";
				echo "$text<i class='fa fa-minus-square delete-icon'></i></div>";
			}
			echo "<div class='item-row add-row'>";
			echo "<form class='add-form'><input type='hidden' name='block' value='$block' /><input class='input-text' type='text' value=''  name='text' />";
			echo "<button class='add-button'><i class='fa fa-plus add-icon'></i></button></form></div>";
		}

	?>
	<script>
		$(document).ready(function() {
			$('.delete-icon').click(function() {
				$(this).prev('form').submit();
			});
			$('.input-text').focusout(function() {
				$(this).parents('.add-row').fadeTo(100, 0.2);
			});
			$('.input-text').focusin(function() {
				$(this).parents('.add-row').fadeTo(100, 1);
			});

		});
	</script>
</body>
</html>

