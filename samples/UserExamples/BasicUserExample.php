<?php
require __DIR__.'/../../vendor/autoload.php';

use InstagramAPI\Models\User\User;

//
$user = new User([
	'id' => '17841400000000001',
	'username' => 'regular_user',
	'profile_picture_url' => 'https://example.com/profiles/regular.jpg',
	'followers_count' => 1000,
	'following_count' => 500
]);

echo "{$user->getUsername()} follows {$user->getFollowingCount()} accounts";


//
$user = new User([
	'id' => '17841405309211800',
	'username' => 'test_user'
]);
echo "{$user->getUsername()} follows {$user->getFollowingCount()} accounts";
