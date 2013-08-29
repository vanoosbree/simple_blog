<?php 
	include_once('resources/init.php'); 

	//for deciding whether to get ALL the posts or a SPECIFIC post
	$posts  = get_posts(((isset($_GET['id'])) ? $_GET['id'] : null));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Simple Blog</title>
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
		<h1>Simple Blog</h1>
		<?php
			foreach ($posts as $post) {
		?>
		<h2><a href="index.php?id=<?= $post['post_id']; ?>"><?= $post['title']; ?></a></h2>
		<p>Posted on <?= date('d-m-Y h:i:s', strtotime($post['date_posted'])); ?>
			in <a href="category.php?id=<?= $post['category_id']; ?>"><?= $post['name']; ?></a>
		</p>
		<div> <?= nl2br($post['contents']); ?></div>
		<menu>
			<ul>
				<li><a href="delete_post.php?id=<?= $post['post_id']; ?>">Delete This Post</a></li>
				<li><a href="edit_post.php?id=<?= $post['post_id']; ?>">Edit This Post</a></li>
			</ul>
		</menu>
		<?php
			}
		?>
	</div>
</body>
</html>