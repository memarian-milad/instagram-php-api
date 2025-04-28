<?php
namespace InstagramAPI\Contracts;

use InstagramAPI\Models\User;

interface UserServiceInterface {
	public function getUserProfile(string $userId): User;
	public function getMediaByUser(string $userId, int $limit = 10): array;
	public function getUserInsights(string $userId): array;
}