<?php
require __DIR__.'/../../vendor/autoload.php';

use InstagramAPI\Models\Media\Image;

$image = new Image([
	'id' => '17887400000000001',
	'media_url' => 'https://example.com/media/sunset.jpg',
	'caption' => 'Beautiful sunset #nature',
	'timestamp' => '2023-10-01T18:30:00+0000',
	'permalink' => 'https://instagram.com/p/CxYz123',
	'width' => 1080,
	'height' => 1350,
	'like_count' => 5243,
	'comment_count' => 287
]);

echo "Engagement Rate: " . $image->getInsights()['engagement_rate'] . "%";