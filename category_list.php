<?php
	include_once('resources/init.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Category List</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		ul {list-style-type: none;}
		li {display: inline; margin-right: 20px;}
		body {background-image: url('assets/images/moon.jpg'); background-repeat: no-repeat;}
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
		<h1>All Categories</h1>
		<?php
			foreach (get_categories() as $category) {
				?>
				<p><a href="category.php?id=<?= $category['id']; ?>"><?= $category['name']; ?></a> - <a href="delete_category.php?id=<?= $category['id']; ?>">Delete</a></p>
		<?php
			}
		?>
	</div>
</body>
</html>