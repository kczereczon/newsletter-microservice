<?php

namespace App\Tests\Email\Command;

use PHPUnit\Framework\TestCase;

class SendWelcomeEmailTest extends TestCase
{
    public function testClassExists(): void
    {
        $this->assertTrue(class_exists('App\Email\Command\SendWelcomeEmail'));
    }

    public function testConstructor(): void
    {
        $command = new \App\Email\Command\SendWelcomeEmail('email');
        $this->assertEquals('email', $command->getEmail());
    }

}
