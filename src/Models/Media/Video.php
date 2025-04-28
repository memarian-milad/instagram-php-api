<?php
namespace InstagramAPI\Models\Media;

class Video extends Media {
	private string $videoUrl;
	private float $duration;
	private int $viewCount;

	public function __construct(array $data) {
		parent::__construct($data);
		$this->videoUrl = $data['media_url'];
		$this->duration = $data['duration'] ?? 0.0;
		$this->viewCount = $data['view_count'] ?? 0;
	}

	public function getType(): string {
		return 'VIDEO';
	}

	public function getPlaybackStats(): array {
		return [
			'completion_rate' => min(100, ($this->viewCount / 1000) * 100)
		];
	}
}