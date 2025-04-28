<?php
namespace InstagramAPI\Contracts;

use InstagramAPI\Models\Media;

interface MediaServiceInterface {
	public function uploadPhoto(string $imagePath, string $caption): Media;
	public function getMedia(string $mediaId): Media;
	public function deleteMedia(string $mediaId): bool;
	public function getMediaInsights(string $mediaId): array;
}