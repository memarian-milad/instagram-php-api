<?php
namespace InstagramAPI\Models\User;

use InstagramAPI\Models\Media\Media;

class CreatorUser extends User {
	private string $category;
	private array $brandPartnerships = [];

	public function __construct(array $data) {
		parent::__construct($data);
		$this->category = $data['creator_category'] ?? 'General';
	}

	public function getAccountType(): string {
		return 'CREATOR';
	}

	public function addBrandPartnership(string $brandName, float $estimatedValue): void {
		$this->brandPartnerships[$brandName] = $estimatedValue;
	}

	public function getCreatorScore(): float {
		$baseScore = $this->followerCount * 0.001;
		$engagementBonus = count($this->media) * 0.5;
		return min(100, $baseScore + $engagementBonus);
	}
}