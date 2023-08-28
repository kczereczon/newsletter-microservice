<?php

namespace App\Newsletter\Application;

use App\Newsletter\Infrastructure\DoctrineEmailAddressRepository;
use App\Newsletter\Infrastructure\EmailAddressFactory;
use App\Shared\Application\CommandHandler;

class SignIntoNewsletterHandler implements CommandHandler
{
    private EmailAddressFactory $emailAddressFactory;
    private DoctrineEmailAddressRepository $emailAddressRepository;

    public function __construct(
        EmailAddressFactory $emailAddressFactory,
        DoctrineEmailAddressRepository $emailAddressRepository
    ) {
        $this->emailAddressFactory = $emailAddressFactory;
        $this->emailAddressRepository = $emailAddressRepository;
    }

    public function __invoke(SignIntoNewsletterCommand $command)
    {
        $emailAddressExists = $this->emailAddressRepository->findOneBy(['email' => $command->getEmail()]);

        if ($emailAddressExists) {
            throw new \Exception('Email address already exists');
        }

        $emailAddress = $this->emailAddressFactory->create($command->getEmail(), $command->getFirstName());
        $this->emailAddressRepository->save($emailAddress, true);
    }
}