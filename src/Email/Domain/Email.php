<?php

namespace App\Email\Domain;

use App\Newsletter\Domain\EmailAddress;

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
    public function getId(): ?int
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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Email
     */
    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return ?string
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): static
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return EmailAddress
     */
    public function getEmailAddress(): ?EmailAddress
    {
        return $this->emailAddress;
    }

    /**
     * @param EmailAddress $emailAddress
     */
    public function setEmailAddress(?EmailAddress $emailAddress): static
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * @return EmailTemplate
     */
    public function getEmailTemplate(): ?EmailTemplate
    {
        return $this->emailTemplate;
    }

    /**
     * @param EmailTemplate $emailTemplate
     */
    public function setEmailTemplate(?EmailTemplate $emailTemplate): static
    {
        $this->emailTemplate = $emailTemplate;

        return $this;
    }


}