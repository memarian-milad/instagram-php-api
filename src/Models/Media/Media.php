<?php
namespace InstagramAPI\Models\Media;

abstract class Media {
	protected string $id;
	protected string $caption;
	protected \DateTime $timestamp;
	protected int $likeCount;
	protected int $commentCount;
	protected string $permalink;
	protected array $children = []; // برای کاروسل

	public function __construct(array $data) {
		$this->id = $data['id'];
		$this->caption = $data['caption'] ?? '';
		$this->timestamp = new \DateTime($data['timestamp']);
		$this->likeCount = $data['like_count'] ?? 0;
		$this->commentCount = $data['comment_count'] ?? 0;
		$this->permalink = $data['permalink'];

		if (isset($data['children'])) {
			$this->processChildren($data['children']);
		}
	}

	abstract public function getType(): string;

	protected function processChildren(array $children): void {
		foreach ($children as $child) {
			$this->children[] = match($child['media_type']) {
				'IMAGE' => new Image($child),
				'VIDEO' => new Video($child),
				default => throw new \InvalidArgumentException("Invalid media type")
			};
		}
	}

	// Getter Methods
	public function getInsights(): array {
		return [
			'engagement_rate' => ($this->likeCount + $this->commentCount) / 1000,
			'reach_estimate' => $this->likeCount * 5
		];
	}
}