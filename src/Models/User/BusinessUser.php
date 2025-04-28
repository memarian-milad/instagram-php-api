<?php
namespace InstagramAPI\Models\User;

class BusinessUser extends User {
	private string $businessCategory;
	private string $contactEmail;

	public function __construct(array $data) {
		parent::__construct($data);
		$this->businessCategory = $data['business_category'] ?? '';
		$this->contactEmail = $data['contact_email'] ?? '';
	}

	public function getAccountType(): string {
		return 'BUSINESS';
	}

	public function getBusinessStats(): array {
		return [
			'estimated_value' => $this->followerCount * 0.1 // مثال ساده
		];
	}
}