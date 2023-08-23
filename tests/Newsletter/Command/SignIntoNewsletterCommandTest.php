<?php

namespace App\Tests\Newsletter\Command;

use App\Newsletter\Command\SignIntoNewsletterCommand;
use PHPUnit\Framework\TestCase;

class SignIntoNewsletterCommandTest extends TestCase
{
    public function testGetters(): void
    {
        $command = new SignIntoNewsletterCommand(
            'id', 'email', 'firstName'
        );

        $this->assertEquals('id', $command->getId());
        $this->assertEquals('email', $command->getEmail());
        $this->assertEquals('firstName', $command->getFirstName());
    }
}
