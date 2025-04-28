<?php
namespace InstagramAPI\Models\Media;

class Image extends Media {
	private string $imageUrl;
	private int $width;
	private int $height;

	public function __construct(array $data) {
		parent::__construct($data);
		$this->imageUrl = $data['media_url'];
		$this->width = $data['width'] ?? 1080;
		$this->height = $data['height'] ?? 1350;
	}

	public function getType(): string {
		return 'IMAGE';
	}

	public function getDimensions(): array {
		return ['width' => $this->width, 'height' => $this->height];
	}
}