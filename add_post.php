<?php
	include_once('resources/init.php');

	if (isset($_POST['title'], $_POST['contents'], $_POST['category'])) {
		$errors = array();

		$title 		= trim($_POST['title']);
		$contents 	= trim($_POST['contents']);
		
		if (empty($title)) {
			$errors[] = "You need to supply a title.";
		} else if (strlen($title) > 255) {
			$errors[] = "The title cannot be longer than 255 characters.";
		}

		if (empty($contents)) {
			$errors[] = "You need to supply some content.";
		}

		if (!category_exists('id', $_POST['category'])) {
			$errors[] = "Category does not exist.";
		}

		if (empty($errors))	{
			add_post($title, $contents, $_POST['category']);

			$id = mysql_insert_id(); //<-- this function gets the id of the most recently 
									 //inserted id into a primary field

			header("Location: index.php?id={$id}"); //putting that $id into the url and redirecting thither
			die();
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add a Post</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		label { display: block;}
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
		<h1>Add a Post</h1>
		<?php
			if (isset($errors) && !empty($errors)) {
				echo "<ul><li>", implode('</li><li>', $errors), "</li></ul>";
			}
		?>
		<form action="" method="post">
			<div>
				<label for="title">Title</label>
				<input type="text" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title'];  ?>" />
			</div>
			<div>
				<label for="contents">Contents</label>
				<textarea name="contents" rows="15" cols="50" value="<?php if (isset($_POST['contents'])) echo $_POST['contents'];  ?>"></textarea>
			</div>
			<div>
				<label for="category">Category</label>
				<select name="category">
					<?php
						foreach (get_categories() as $category) {
					?>
						<option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div>
				<input type="submit" value="Add Post" />
			</div>
		</form>
	</div>
</body>
</html>