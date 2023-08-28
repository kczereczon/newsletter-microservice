<?php

namespace App\Tests\Email\Command;

use PHPUnit\Framework\TestCase;

class SendWelcomeEmailTest extends TestCase
{
    public function testClassExists(): void
    {
        $this->assertTrue(class_exists('App\Email\Application\SendWelcomeEmailCommand'));
    }

    public function testConstructor(): void
    {
        $command = new \App\Email\Application\SendWelcomeEmailCommand('email');
        $this->assertEquals('email', $command->getEmail());
    }

}
