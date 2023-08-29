<?php

namespace App\Email\Domain;

class Email
{
    public function __construct(
        private string $id,
        private string $title,
        private string $body,
        private EmailAddress $emailAddress,
        private EmailTemplate $emailTemplate
    )
    {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return EmailAddress
     */
    public function getEmailAddress(): EmailAddress
    {
        return $this->emailAddress;
    }

    /**
     * @param EmailAddress $emailAddress
     */
    public function setEmailAddress(EmailAddress $emailAddress): void
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return EmailTemplate
     */
    public function getEmailTemplate(): EmailTemplate
    {
        return $this->emailTemplate;
    }

    /**
     * @param EmailTemplate $emailTemplate
     */
    public function setEmailTemplate(EmailTemplate $emailTemplate): void
    {
        $this->emailTemplate = $emailTemplate;
    }


}