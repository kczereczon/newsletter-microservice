<?php

namespace App\Cqrs\CommandHandler;

use App\Common\CQRS\CommandHandler;
use App\Cqrs\Command\SignIntoNewsletterCommand;
use App\Factory\EmailAddressFactory;
use App\Repository\EmailAddressRepository;

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