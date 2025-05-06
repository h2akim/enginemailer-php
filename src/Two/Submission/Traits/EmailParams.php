<?php

namespace HakimRazalan\EngineMailer\Two\Submission\Traits;

use HakimRazalan\EngineMailer\Exceptions\RequiredParameterException;

trait EmailParams
{
    protected $attachments = [];
    protected $ccEmails = [];
    protected $bccEmails = [];
    protected $substitutionTags = [];
    protected $templateId;
    protected $toEmail = '';
    protected $subject;
    protected $senderEmail = '';
    protected $senderName;
    protected $submittedContent = '';
    protected $campaignName;

    /** Getters */
    public function getAttachments()
    {
        return $this->attachments;
    }

    public function getCCEmails()
    {
        return $this->ccEmails;
    }

    public function getBCCEmails()
    {
        return $this->bccEmails;
    }

    public function getSubstitutionTags()
    {
        return $this->substitutionTags;
    }

    public function getTemplateId()
    {
        return $this->templateId;
    }

    public function getToEmail()
    {
        return $this->toEmail;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getSenderEmail()
    {
        return $this->senderEmail;
    }

    public function getSenderName()
    {
        return $this->senderName;
    }

    public function getSubmittedContent()
    {
        return $this->submittedContent;
    }

    public function getCampaignName()
    {
        return $this->campaignName;
    }

    /** Setters */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
        return $this;
    }

    public function setCCEmails($ccEmails)
    {
        $this->ccEmails = $ccEmails;
        return $this;
    }

    public function setBCCEmails($bccEmails)
    {
        $this->bccEmails = $bccEmails;
        return $this;
    }

    public function setSubstitutionTags($substitutionTags)
    {
        $this->substitutionTags = $substitutionTags;
        return $this;
    }

    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
        return $this;
    }

    public function setToEmail($toEmail)
    {
        $this->toEmail = $toEmail;
        return $this;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function setSenderEmail($senderEmail)
    {
        $this->senderEmail = $senderEmail;
        return $this;
    }

    public function setSenderName($senderName)
    {
        $this->senderName = $senderName;
        return $this;
    }

    public function setSubmittedContent($submittedContent)
    {
        $this->submittedContent = $submittedContent;
        return $this;
    }

    public function setCampaignName($campaignName)
    {
        $this->campaignName = $campaignName;
        return $this;
    }

    /** Full email body */
    public function getFullEmailBody(): array
    {
        $data = [
            'ToEmail' => $this->getToEmail(),
            'SenderEmail' => $this->getSenderEmail(),
        ];

        empty($this->getCampaignName()) ?: $data['CampaignName'] = $this->getCampaignName();
        empty($this->getSubject()) ?: $data['Subject'] = $this->getSubject();
        empty($this->getSubmittedContent()) ?: $data['SubmittedContent'] = $this->getSubmittedContent();
        empty($this->getSenderName()) ?: $data['SenderName'] = $this->getSenderName();
        empty($this->getSubstitutionTags()) ?: $data['SubstitutionTags'] = $this->getSubstitutionTags();
        empty($this->getAttachments()) ?: $data['Attachments'] = $this->getAttachments();
        empty($this->getCCEmails()) ?: $data['CCEmails'] = $this->getCCEmails();
        empty($this->getBCCEmails()) ?: $data['BCCEmails'] = $this->getBCCEmails();

        return $data;
    }

    protected function checkRequiredParamsIsNotNull()
    {
        !empty($this->getToEmail()) ?: throw new RequiredParameterException('ToEmail');
        !empty($this->getSenderEmail()) ?: throw new RequiredParameterException('SenderEmail');
    }
}