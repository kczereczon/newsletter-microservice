<?php

namespace App\Email\Application;

use App\Shared\Application\Command;

class SendWelcomeEmailCommand implements Command
{
    public function __construct(public readonly string $email)
    {
    }
}