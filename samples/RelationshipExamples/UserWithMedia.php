<?php
require __DIR__.'/../../vendor/autoload.php';

use InstagramAPI\Models\User\CreatorUser;
use InstagramAPI\Models\Media\{Image, Video};

$user = new CreatorUser([...]);

$user->addMedia(new Image([...]));
$user->addMedia(new Video([...]));

foreach ($user->getTopMedia() as $media) {
	echo "Post {$media->getId()} has {$media->getLikeCount()} likes\n";
}