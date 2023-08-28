<?php

namespace App\Newsletter\CommandHandler;

use App\Newsletter\Command\SignIntoNewsletterCommand;
use App\Newsletter\Factory\EmailAddressFactory;
use App\Newsletter\Repository\EmailAddressRepository;
use App\Shared\Application\CommandHandler;

class SignIntoNewsletterHandler implements CommandHandler
{
    private EmailAddressFactory $emailAddressFactory;
    private EmailAddressRepository $emailAddressRepository;

    public function __construct(
        EmailAddressFactory $emailAddressFactory,
        EmailAddressRepository $emailAddressRepository
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