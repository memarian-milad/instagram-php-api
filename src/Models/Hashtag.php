<?php
namespace InstagramAPI\Models;

class Hashtag {
	private string $name;
	private int $mediaCount;

	public function __construct(string $name, int $mediaCount) {
		$this->name = $name;
		$this->mediaCount = $mediaCount;
	}

	public function getPopularityScore(): float {
		return log10($this->mediaCount) * 10;
	}
}