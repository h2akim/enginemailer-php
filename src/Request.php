<?php

namespace HakimRazalan\EngineMailer;

use HakimRazalan\EngineMailer\Response;
use Laravie\Codex\Contracts\Endpoint;
use Laravie\Codex\Contracts\Filterable;
use Laravie\Codex\Contracts\Response as ContractsResponse;
use Laravie\Codex\Filter\Sanitizer;
use Laravie\Codex\Filter\WithSanitizer;
use Psr\Http\Message\ResponseInterface;

/**
 * @property \HakimRazalan\EngineMailer\Client $client
 */
class Request extends \Laravie\Codex\Request implements Filterable
{
    use WithSanitizer;

    /**
     * Get api headers
     * @return array<string, mixed> 
     */
    protected function getApiHeaders(): array
    {
        if (! \is_null($this->client->getApiKey())) {
            $headers['Content-Type'] = 'application/json';
            $headers['APIKey'] = $this->client->getApiKey();
        }

        return $headers;
    }

    /**
     * Get URI Endpoint.
     *
     * @param  array<int, string>|string  $path
     */
    protected function getApiEndpoint($path = []): Endpoint
    {
        $paths = is_array($path) ? $path : [$path];

        array_unshift($paths, $this->getVersion());

        return parent::getApiEndpoint($paths);
    }

    /**
     * Resolve reponse class
     * @return Response
     */
    protected function responseWith(ResponseInterface $message): ContractsResponse
    {
        return new Response($message);
    }

    protected function sanitizeWith(): Sanitizer
    {
        return new Sanitizer();
    }
}