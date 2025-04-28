<?php
namespace InstagramAPI\Models;

class Comment {
	private string $id;
	private string $text;
	private User $user;
	private \DateTime $timestamp;
	private int $likeCount;

	public function __construct(array $data, User $user) {
		$this->id = $data['id'];
		$this->text = $data['text'];
		$this->user = $user;
		$this->timestamp = new \DateTime($data['timestamp']);
		$this->likeCount = $data['like_count'] ?? 0;
	}

	public function isPopular(): bool {
		return $this->likeCount > 100;
	}
}