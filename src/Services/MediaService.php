<?php
namespace InstagramAPI\Services;

use InstagramAPI\Contracts\{ClientInterface, MediaServiceInterface};
use InstagramAPI\Models\Media;
use InstagramAPI\Exceptions\InstagramAPIException;

class MediaService implements MediaServiceInterface {
	public function __construct(private ClientInterface $client) {}

	public function uploadPhoto(string $imagePath, string $caption): Media {
		if (!file_exists($imagePath)) {
			throw new InstagramAPIException("Image file not found");
		}

		$response = $this->client->post('media', [
			'image' => new \CURLFile($imagePath),
			'caption' => $caption
		]);

		return new Media($response);
	}

	// سایر متدها با پیاده‌سازی کامل
}