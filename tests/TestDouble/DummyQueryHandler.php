<?php

namespace App\Tests\TestDouble;

class DummyQueryHandler implements \App\Common\CQRS\QueryHandler
{

    public function __invoke(DummyQuery $query): array
    {
        return $query->getPayload();
    }
}