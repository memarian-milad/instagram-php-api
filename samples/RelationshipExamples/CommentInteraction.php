<?php
require __DIR__.'/../../vendor/autoload.php';

use InstagramAPI\Models\{Comment, User};

$user = new User([...]);
$comment = new Comment([
	'id' => '17851000000000001',
	'text' => 'Amazing content!',
	'timestamp' => '2023-10-01T19:45:00+0000',
	'like_count' => 243
], $user);

if ($comment->isPopular()) {
	echo "Popular comment from @" . $comment->getUser()->getUsername();
}