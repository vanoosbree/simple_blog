<?php

$config['db_host'] = 'localhost';
$config['db_user'] = 'root';
$config['db_pass'] = 'root';
$config['db_name'] = 'simple_blog';

foreach ($config as $k => $v) {
	define(strtoupper($k), $v);
}