# PHP framework agnostic to work with EngineMailer REST Transaction Email API

## Installation

#### Composer

To install through composer by using the following command:

    composer require php-http/guzzle7-adapter hakimrazalan/enginemailer-php

#### HTTP Adapter

Refer [PHP-HTTP Clients & Adapters](http://docs.php-http.org/en/latest/clients.html) for other supported clients and adapters.

## Get Started

### Creating client

To create EngineMailer client, use the following codes:

```
use HakimRazalan\EngineMailer\Client;

$client = Client::setup("<api-key>");
```

Alternatively, you could configure `Http\Client\Common\HttpMethodsClient` manually

```
use HakimRazalan\EngineMailer\Client;

$http = Laravie\Codex\Discovery::client();
$client = Client::setup("<api-key>", $http);
```

# Usages

Currently this library only cater to send transactional email

```
use HakimRazalan\EngineMailer\Client;

$http = Laravie\Codex\Discovery::client();
$client = Client::setup("<api-key>", $http);

$emailSender = $client->sendEmail();
$response = $emailSender
  ->sendEmail()
  ->setToEmail("receiver@receiver.com")
  ->setSenderEmail("sender@sender.my")
  ->setSubject("Test subject")
  ->setSubmittedContent("Email content")
  ->handle();
```

For full supported parameter please refer EngineMailer [documentation](https://enginemailer.zendesk.com/hc/en-us/articles/23132996552473-Submitting-Transactional-Emails-via-REST-API-Version-2).

**Note:** Just append `set` infront of the parameter name to include in the request. eg. `TemplateId` to `setTemplateId('<template-id>')`
