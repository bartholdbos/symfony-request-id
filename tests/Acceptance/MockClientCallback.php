<?php

namespace DR\SymfonyRequestId\Tests\Acceptance;

use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\ResponseInterface;

class MockClientCallback
{
    public function __invoke(string $method, string $url, array $options = []): ResponseInterface
    {
        $headers = [];

        foreach ($options['headers'] as $header) {
            [$key, $value] = explode(': ', $header);
            $headers[$key] = $value;
        }

        return new MockResponse('success', [
            'response_headers' => $headers
        ]);
    }
}
