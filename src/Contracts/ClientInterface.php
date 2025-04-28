<?php
namespace InstagramAPI\Contracts;

interface ClientInterface {
	public function get(string $endpoint, array $params = []): array;
	public function post(string $endpoint, array $data = []): array;
	public function delete(string $endpoint, array $params = []): array;
	public function setAccessToken(string $token): void;
}