<?php
declare(strict_types=1);

namespace Chindit\Bundle;


use Symfony\Contracts\HttpClient\HttpClientInterface;

class FacebookGraph
{
    public function __construct(private ?string $token, private HttpClientInterface $httpClient)
    {
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function get(string $query, ?string $token): array
    {
        $accessToken = $token ?? $this->token;

        if ($accessToken) {
            $connector = (strpos($query, '?') >= 0) ? '&' : '?';
            $query .= $connector . 'access_token=' . $accessToken;
        }

        $graphRequest = $this->httpClient->request('GET', $query);

        return json_decode($graphRequest->getContent(), true, JSON_THROW_ON_ERROR);
    }
}