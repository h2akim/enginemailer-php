<?php

namespace HakimRazalan\EngineMailer\Contracts;

use Laravie\Codex\Contracts\Request;

interface SendEmail extends Request
{
    public function handle();

    public function getAttachments();

    public function getCCEmails();

    public function getBCCEmails();

    public function getSubstitutionTags();

    public function getTemplateId();

    public function getToEmail();

    public function getSubject();

    public function getSenderEmail();

    public function getSenderName();

    public function getSubmittedContent();

    public function getCampaignName();

    public function setAttachments($attachments);

    public function setCCEmails($ccEmails);

    public function setBCCEmails($bccEmails);

    public function setSubstitutionTags($substitutionTags);

    public function setTemplateId($templateId);

    public function setToEmail($toEmail);

    public function setSubject($subject);

    public function setSenderEmail($senderEmail);

    public function setSenderName($senderName);

    public function setSubmittedContent($submittedContent);

    public function setCampaignName($campaignName);

    public function getFullEmailBody();

    public function checkRequiredParamsIsNotNull();
}