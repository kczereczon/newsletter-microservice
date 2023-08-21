<?php

namespace App\Common\CQRS;

interface CommandBus {
    public function dispatch(Command $command): void;
}