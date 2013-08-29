INSERT INTO `posts` (`title`, `contents`) VALUES ('this is the first post', 'Yes, it is.')

INSERT INTO `posts` SET
	`title` = 'The second post',
	`contents` = 'Once again, yes it is.'

SELECT `id`, `title`, `contents` FROM `posts`

UPDATE `posts` SET
	`title` = 'This is a post',
	`contents` = 'New content'
	WHERE `id` = 8;

DELETE FROM `posts` WHERE `id` = 8