<?php

namespace HakimRazalan\EngineMailer;

use Http\Client\Common\HttpMethodsClient as HttpClient;
use Laravie\Codex\Contracts\Request;
use InvalidArgumentException;
use Laravie\Codex\Discovery;

class Client extends \Laravie\Codex\Client
{
    public function __construct(
        HttpClient $http,
        protected string $apiKey
    ) {
        $this->http = $http;
    }

    public static function setup(string $apiKey, ?HttpClient $httpClient = null): static
    {
        return new static($httpClient ?? Discovery::client(), $apiKey);
    }

    protected $apiEndpoint = 'https://api.enginemailer.com/RESTAPI';

    protected $defaultVersion = 'V2';

    protected $supportedVersions = [
        'V2' => 'Two'
    ];

    /**
     * Resolve send email service
     * @param null|string $version 
     * @return Request 
     * @throws InvalidArgumentException 
     */
    public function sendEmail(?string $version = null): Contracts\SendEmail
    {
        return $this->uses('Submission.SendEmail', $version);
    }

    /**
     * Set API Key
     * @param string $apiKey 
     * @return Client 
     */
    public function setApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Get API Key
     * @return string 
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * Get resource namespace
     * @return string 
     */
    protected function getResourceNamespace(): string
    {
        return __NAMESPACE__;
    }
}