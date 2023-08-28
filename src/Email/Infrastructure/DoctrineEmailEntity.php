<?php

namespace App\Email\Infrastructure;

use App\Newsletter\Infrastructure\DoctrineEmailAddressEntity;
use App\Repository\EmailRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'email')]
#[ORM\Entity(repositoryClass: EmailRepository::class)]
class DoctrineEmailEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $body = null;

    #[ORM\ManyToOne(inversedBy: 'emails')]
    private ?DoctrineEmailAddressEntity $emailAddress = null;

    #[ORM\ManyToOne(inversedBy: 'emails')]
    private ?DoctrineEmailTemplateEntity $emailTemplate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): static
    {
        $this->body = $body;

        return $this;
    }

    public function getEmailAddress(): ?DoctrineEmailAddressEntity
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(?DoctrineEmailAddressEntity $emailAddress): static
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    public function getEmailTemplate(): ?DoctrineEmailTemplateEntity
    {
        return $this->emailTemplate;
    }

    public function setEmailTemplate(?DoctrineEmailTemplateEntity $emailTemplate): static
    {
        $this->emailTemplate = $emailTemplate;

        return $this;
    }
}
