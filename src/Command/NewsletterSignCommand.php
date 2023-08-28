<?php

namespace App\Command;

use App\Newsletter\Command\SignIntoNewsletterCommand;
use App\Shared\Infrastructure\CommandBus;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'newsletter:sign',
    description: 'Add a short description for your command',
)]
class NewsletterSignCommand extends Command
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Argument description')
            ->addArgument('name', InputArgument::REQUIRED, 'Argument description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $email = $input->getArgument('email');
        $name = $input->getArgument('name');

        $this->commandBus->dispatch(new SignIntoNewsletterCommand(Uuid::uuid4(), $email, $name));


        $io->success('Success, you added email address to newsletter!');
        return Command::SUCCESS;
    }
}
