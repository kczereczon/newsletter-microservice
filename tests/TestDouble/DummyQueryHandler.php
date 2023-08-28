<?php

namespace App\Tests\TestDouble;

class DummyQueryHandler implements \App\Shared\Application\QueryHandler
{

    public function __invoke(DummyQuery $query): array
    {
        return $query->getPayload();
    }
}