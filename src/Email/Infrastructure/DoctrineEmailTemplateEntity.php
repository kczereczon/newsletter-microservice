<?php

namespace App\Email\Infrastructure;

use App\Repository\EmailTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'email_template')]
#[ORM\Entity(repositoryClass: EmailTemplateRepository::class)]
class DoctrineEmailTemplateEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $body = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'emailTemplate', targetEntity: DoctrineEmailEntity::class)]
    private Collection $emails;

    public function __construct()
    {
        $this->emails = new ArrayCollection();
    }

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, DoctrineEmailEntity>
     */
    public function getEmails(): Collection
    {
        return $this->emails;
    }

    public function addEmail(DoctrineEmailEntity $email): static
    {
        if (!$this->emails->contains($email)) {
            $this->emails->add($email);
            $email->setEmailTemplate($this);
        }

        return $this;
    }

    public function removeEmail(DoctrineEmailEntity $email): static
    {
        if ($this->emails->removeElement($email)) {
            // set the owning side to null (unless already changed)
            if ($email->getEmailTemplate() === $this) {
                $email->setEmailTemplate(null);
            }
        }

        return $this;
    }
}
