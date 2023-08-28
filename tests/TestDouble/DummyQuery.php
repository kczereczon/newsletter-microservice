<?php

namespace App\Tests\TestDouble;

class DummyQuery implements \App\Shared\Application\Query
{
    private array $payload;

    public function __construct(array $payload = [])
    {
        $this->payload = $payload;
    }

    public function getPayload(): array
    {
        return $this->payload;
    }
}