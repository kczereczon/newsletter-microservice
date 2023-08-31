<?php

namespace App\Newsletter\Infrastructure;

use App\Email\Infrastructure\DoctrineEmailEntity;
use App\Newsletter\Domain\EmailAddress;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'email_address')]
#[ORM\Entity(repositoryClass: DoctrineEmailAddressRepository::class)]
class DoctrineEmailAddressEntity extends EmailAddress
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column]
    private ?bool $disabled = null;

    #[ORM\OneToMany(mappedBy: 'emailAddress', targetEntity: DoctrineEmailEntity::class)]
    private Collection $emails;

    public function __construct()
    {
        $this->emails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function isDisabled(): ?bool
    {
        return $this->disabled;
    }

    public function setDisabled(bool $disabled): static
    {
        $this->disabled = $disabled;

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
            $email->setEmailAddress($this);
        }

        return $this;
    }

    public function removeEmail(DoctrineEmailEntity $email): static
    {
        if ($this->emails->removeElement($email)) {
            // set the owning side to null (unless already changed)
            if ($email->getEmailAddress() === $this) {
                $email->setEmailAddress(null);
            }
        }

        return $this;
    }
}
