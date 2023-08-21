<?php

namespace App\CommandHandler;

use App\Command\SignIntoNewsletterCommand;
use App\Common\CQRS\CommandHandler;

class SignIntoNewsletterHandler implements CommandHandler
{
    public function __construct()
    {
    }

    public function __invoke(SignIntoNewsletterCommand $command)
    {
        // TODO: Implement __invoke() method.
    }
}