<?php
require __DIR__.'/../vendor/autoload.php';

use InstagramAPI\Models\Media\Carousel;
use InstagramAPI\Exceptions\InvalidMediaException;

try {
	new Carousel([
		'children' => [
			['media_type' => 'DOCUMENT'] // Invalid type
		]
	]);
} catch (InvalidMediaException $e) {
	echo "Error {$e->getCode()}: {$e->getMessage()}";
	// Log to error tracking service
}