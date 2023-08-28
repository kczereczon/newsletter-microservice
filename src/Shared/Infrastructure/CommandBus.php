<?php

namespace App\Shared\Infrastructure;

use App\Shared\Application\Command;

interface CommandBus {
    public function dispatch(Command $command): void;
}