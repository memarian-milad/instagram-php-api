<?php
namespace InstagramAPITests;

use PHPUnit\Framework\TestCase;
use InstagramAPI\Services\UserService;
use InstagramAPI\Contracts\ClientInterface;
use InstagramAPI\Models\User;

class UserServiceTest extends TestCase {
	private UserService $userService;
	private ClientInterface $mockClient;

	protected function setUp(): void {
		$this->mockClient = $this->createMock(ClientInterface::class);
		$this->userService = new UserService($this->mockClient);
	}

	public function testGetUserProfileSuccess() {
		$this->mockClient->method('get')
			->willReturn(['id' => '123', 'username' => 'test']);

		$user = $this->userService->getUserProfile('123');
		$this->assertInstanceOf(User::class, $user);
		$this->assertEquals('test', $user->getUsername());
	}
}