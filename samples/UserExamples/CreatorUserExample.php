<?php
require __DIR__.'/../../vendor/autoload.php';

use InstagramAPI\Models\User\CreatorUser;

$creator = new CreatorUser([
	'id' => '17841400000000003',
	'username' => 'travel_creator',
	'profile_picture_url' => 'https://example.com/profiles/travel.jpg',
	'followers_count' => 85000,
	'creator_category' => 'Travel'
]);

$creator->addBrandPartnership('LuggageCo', 12000.00);
echo "Creator Score: " . $creator->getCreatorScore() . "/100";