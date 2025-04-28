<?php
require __DIR__.'/../../vendor/autoload.php';

use InstagramAPI\Models\Media\Carousel;

$carousel = new Carousel([
	'id' => '17887400000000003',
	'children' => [
		[
			'media_type' => 'IMAGE',
			'media_url' => 'https://example.com/media/product1.jpg',
			'width' => 800,
			'height' => 1000
		],
		[
			'media_type' => 'VIDEO',
			'media_url' => 'https://example.com/media/demo.mp4',
			'duration' => 30.0
		]
	],
	'caption' => 'Check out our new collection!',
	'timestamp' => '2023-10-03T11:00:00+0000'
]);

echo "Carousel contains: " . $carousel->getItem(1)->getType(); // Returns "VIDEO"