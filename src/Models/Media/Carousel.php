<?php
namespace InstagramAPI\Models\Media;

use InstagramAPI\Exceptions\InvalidMediaException;

class Carousel extends Media {
	private array $carouselItems = [];
	private int $carouselSize;

	public function __construct(array $data) {
		parent::__construct($data);
		$this->carouselSize = count($data['children']);

		foreach ($data['children'] as $item) {
			$this->validateCarouselItem($item);
			$this->carouselItems[] = $this->createMediaItem($item);
		}
	}

	private function validateCarouselItem(array $item): void {
		if (!in_array($item['media_type'], ['IMAGE', 'VIDEO'])) {
			throw new InvalidMediaException("Invalid carousel item type");
		}
	}

	private function createMediaItem(array $item): Media {
		return match($item['media_type']) {
			'IMAGE' => new Image($item),
			'VIDEO' => new Video($item),
			default => throw new InvalidMediaException("Unsupported media type")
		};
	}

	public function getType(): string