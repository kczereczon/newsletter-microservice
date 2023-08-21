<?php

namespace App\Command;

use App\Common\CQRS\Command;

class SignIntoNewsletterCommand implements Command
{
    private string $id;
    private string $email;
    private string $firstName;

    /**
     * @param string $id
     * @param string $email
     * @param string $firstName
     */
    public function __construct(string $id, string $email, string $firstName)
    {
        $this->id = $id;
        $this->email = $email;
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

}