<?php
namespace InstagramAPI\Services;

use InstagramAPI\Contracts\ClientInterface;
use InstagramAPI\Exceptions\{RequestException, AuthenticationException};
use GuzzleHttp\Client;

class InstagramClient implements ClientInterface {
	private Client $httpClient;
	private string $accessToken;

	public function __construct(string $baseUrl, string $accessToken) {
		$this->httpClient = new Client(['base_uri' => $baseUrl]);
		$this->accessToken = $accessToken;
	}

	public function get(string $endpoint, array $params = []): array {
		try {
			$response = $this->httpClient->get($endpoint, [
				'query' => array_merge($params, ['access_token' => $this->accessToken]),
				'timeout' => 30
			]);
			return json_decode($response->getBody(), true);
		} catch (\Exception $e) {
			$this->handleException($e);
		}
	}

	// متدهای post و delete (مشابه get)

	private function handleException(\Exception $e): void {
		if ($e->getCode() == 401) {
			throw new AuthenticationException('Invalid access token');
		}
		throw new RequestException($e->getMessage());
	}
}