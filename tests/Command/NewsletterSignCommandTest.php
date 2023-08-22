<?php

namespace App\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class NewsletterSignCommandTest extends KernelTestCase
{

    protected function tearDown(): void
    {
        $kernel = self::bootKernel();
        self::getContainer()->get('doctrine')->getConnection()->executeQuery('TRUNCATE TABLE email_address');
    }

    public function testCommandEmailMissing(): void
    {
        $kernel = self::bootKernel();

        $application = new Application($kernel);

        $command = $application->find('newsletter:sign');
        $commandTester = new CommandTester($command);

        $this->expectException(\RuntimeException::class);
        $commandTester->execute([
            // pass arguments to the helper
            'name' => 'test',

            // prefix the key with two dashes when passing options,
            // e.g: '--some-option' => 'option_value',
            // use brackets for testing array value,
            // e.g: '--some-option' => ['option_value'],
        ]);
    }

    public function testCommandNameMissing(): void
    {
        $kernel = self::bootKernel();

        $application = new Application($kernel);

        $command = $application->find('newsletter:sign');
        $commandTester = new CommandTester($command);

        $this->expectException(\RuntimeException::class);
        $commandTester->execute([
            'email' => 'test@email.com',
        ]);
    }

    public function testCommandSuccess(): void
    {
        $kernel = self::bootKernel();

        $application = new Application($kernel);

        $command = $application->find('newsletter:sign');
        $commandTester = new CommandTester($command);

        $commandTester->execute([
            // pass arguments to the helper
            'email' => 'test@email.com',
            'name' => 'test',

            // prefix the key with two dashes when passing options,
            // e.g: '--some-option' => 'option_value',
            // use brackets for testing array value,
            // e.g: '--some-option' => ['option_value'],
        ]);

        $commandTester->assertCommandIsSuccessful();
    }
}
