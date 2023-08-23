<?php

namespace App\Tests\Newsletter\CommandHandler;

use App\Entity\EmailAddress;
use App\Newsletter\Command\SignIntoNewsletterCommand;
use App\Newsletter\CommandHandler\SignIntoNewsletterHandler;
use App\Tests\MotherObject\EmailAddressMother;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SignIntoNewsletterHandlerTest extends KernelTestCase
{
    protected function tearDown(): void
    {
        $kernel = self::bootKernel();
        self::getContainer()->get('doctrine')->getConnection()->executeQuery('TRUNCATE TABLE email_address CASCADE');
    }

    public function testHandlerThrowExceptionWhenEmailAlreadySigned(): void
    {
        $kernel = self::bootKernel();

        $emailAddress = EmailAddressMother::anyActive();

        static::getContainer()->get('doctrine')->getManager()->persist($emailAddress);
        static::getContainer()->get('doctrine')->getManager()->flush();

        $command = new SignIntoNewsletterCommand(
            Uuid::uuid4(), $emailAddress->getEmail(), $emailAddress->getFirstName()
        );

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Email address already exists');

        $handler = static::getContainer()->get(SignIntoNewsletterHandler::class);
        $handler($command);
    }

    public function testHandlerSuccess(): void
    {
        $kernel = self::bootKernel();

        $emailAddress = EmailAddressMother::anyActive();

        $command = new SignIntoNewsletterCommand(
            Uuid::uuid4(), $emailAddress->getEmail(), $emailAddress->getFirstName()
        );

        $handler = static::getContainer()->get(SignIntoNewsletterHandler::class);
        $handler($command);

        $emailAddressRepository = static::getContainer()->get('doctrine')->getRepository(EmailAddress::class);
        $emailAddressExists = $emailAddressRepository->findOneBy(['email' => $emailAddress->getEmail()]);

        $this->assertNotNull($emailAddressExists);
    }
}
