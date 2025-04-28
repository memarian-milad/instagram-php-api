<?php
require __DIR__.'/../../vendor/autoload.php';

use InstagramAPI\Models\Media\Video;

$video = new Video([
	'id' => '17887400000000002',
	'media_url' => 'https://example.com/media/tutorial.mp4',
	'caption' => 'How to make perfect coffee',
	'timestamp' => '2023-10-02T09:15:00+0000',
	'duration' => 87.5,
	'view_count' => 12543,
	'like_count' => 3842
]);

echo "Completion Rate: " . $video->getPlaybackStats()['completion_rate'] . "%";