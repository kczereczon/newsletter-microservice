<?php

namespace App\Common\CQRS;

interface Command
{
}

interface CommandHandler
{
}

interface CommandBus {
    public function dispatch(Command $command): void;
}