<?php

include_once('resources/init.php');

$query = mysql_query('SELECT `title`, `contents` FROM `posts`
					WHERE `id` = 3 OR `title` = "this is the first post"');


while ($row = mysql_fetch_assoc($query)) {
	?>
		<h2><a href='post.php?id='> <?= $row['title'] ?> </a></h2>
		<p><?= $row['contents']; ?></p>
	<?php
}

		

?>

<html>
<head>
	<title>Post List</title>
</head>
<body>
	<div id="main">

	</div>
</body>
</html>