<?php
namespace InstagramAPI\Models\User;

abstract class User {
	protected string $id = "";
	protected string $username;
	protected string $profilePicUrl;
	protected int $followerCount;
	protected int $followingCount;
	protected string $bio;
	protected array $media = [];

	public function __construct(array $data) {
		if(!isset($data["id"]) || empty($data["id"]))
		{
			$data["id"] = $this->getInstagramUserId($data['username']);
		}
		$this->id = $data['id'];
		$this->username = $data['username'];
		$this->profilePicUrl = $data['profile_picture_url'];
		$this->followerCount = $data['followers_count'] ?? 0;
		$this->followingCount = $data['following_count'] ?? 0;
		$this->bio = $data['bio'] ?? '';
	}

	function getInstagramUserId($username) {
		$url = "https://www.instagram.com/$username/?__a=1";
		$data = json_decode(file_get_contents($url), true);
		return $data['graphql']['user']['id'] ?? null;
	}


	abstract public function getAccountType(): string;

	public function addMedia(Media $media): void {
		$this->media[] = $media;
	}

	public function getTopMedia(int $limit = 3): array {
		usort($this->media, fn($a, $b) => $b->likeCount <=> $a->likeCount);
		return array_slice($this->media, 0, $limit);
	}
}