<?php
	include_once('resources/init.php');

	$post = get_posts($_GET['id']);


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
			edit_post($_GET['id'], $title, $contents, $_POST['category']);
			header("Location: index.php?id={$post[0]['post_id']}");
			die();
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Post</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		label { display: block;}
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
		<h1>Edit Post</h1>
		<!-- for displaying errors -->
		<?php
			if (isset($errors) && !empty($errors)) {
				echo "<ul><li>", implode('</li><li>', $errors), "</li></ul>";
			}
		?>
		<!-- end errors -->
			<form action="" method="post">
			<div>
				<label for="title">Title</label>
				<input type="text" name="title" value="<?= $post[0]['title']; ?>" />
			</div>
			<div>
				<label for="contents">Contents</label>
				<textarea name="contents" rows="15" cols="50"><?= $post[0]['contents']; ?></textarea>
			</div>
			<div>
				<label for="category">Category</label>
				<select name="category">
					<?php
						foreach (get_categories() as $category) {
							$selected = ($category['name'] == $post[0]['name']) ? 'selected' : '';
					?>
						<option value="<?= $category['id']; ?>" <?= $selected; ?>><?= $category['name']; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div>
				<input type="submit" value="Update Post" />
			</div>
		</form>
	</div>
</body>
</html>