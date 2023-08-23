<?php

namespace App\Email\Command;

use App\Common\CQRS\Command;

class SendWelcomeEmail implements Command
{
    public function __construct(private readonly string $email)
    {
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}