<?php
include_once('resources/init.php');

if (isset($_POST['name'])) {
	$name = trim($_POST['name']);

	if (empty($name)) {
		$error = "You must submit a category name.";
	} else if (category_exists('name', $name)) {
		$error = 'That category already exists.';
	} else if (strlen($name) > 24) {
		$error = "Category names can only be up to 24 characters.";
	}

	if (!isset($error)) {
		add_category($name);
		header("Location: add_post.php");
		die();
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add a Category</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		ul {list-style-type: none;}
		li {display: inline; margin-right: 20px;}
		body {background-image: url('assets/images/drama_sky.jpg'); background-repeat: no-repeat;}
	</style>
</head>
<body>
	<div class="container">
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="add_post.php">Add a Post</a></li>
				<li><a href="add_category.php">Add a Category</a></li>
				<li><a href="category_list.php">Category List</a></li>
			</ul>
		</nav>
		<h1>Add a Category</h1>
		<?php
			if (isset($error)) {
				echo "<p>{$error}</p>\n";
				unset($error);
			}
		?>
		<form action="" method="post">
			<div>
				<label for="name">Name</label>
				<input type="text" name="name" value="" />
			</div>
			<div>
				<input type="submit" value="Add Category" />
			</div>
		</form>
	</div>
</body>
</html>