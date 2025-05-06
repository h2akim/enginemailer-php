<?php

namespace HakimRazalan\EngineMailer\Two\Submission;

use HakimRazalan\EngineMailer\Exceptions\RequiredParameterException;
use HakimRazalan\EngineMailer\Request;
use HakimRazalan\EngineMailer\Two\Submission\Traits\EmailParams;
use Laravie\Codex\Contracts\Response;
use TypeError;

class SendEmail extends Request
{
    use EmailParams;

    /**
     * Version namespace.
     *
     * @var string
     */
    protected $version = 'V2';

    /**
     * Handle sending email request
     * @return Response 
     * @throws RequiredParameterException 
     * @throws TypeError 
     */
    public function handle(): \Laravie\Codex\Contracts\Response
    {
        $this->checkRequiredParamsIsNotNull();
        return $this->send('POST',
            'Submission/SendEmail',
            $this->getApiHeaders(),
            $this->getFullEmailBody()
        );
    }
}