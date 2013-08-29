<?php

include_once('resources/init.php');

if (!isset($_GET['id'])) {
	header('Location: index.php');
	die();
}
mysql_query("UPDATE `posts` SET
				`cat_id` = 7 
				WHERE `cat_id` = {$_GET['id']}");
delete('categories', $_GET['id']);

header('Location: category_list.php');
