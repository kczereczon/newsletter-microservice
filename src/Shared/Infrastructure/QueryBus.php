<?php

namespace App\Shared\Infrastructure;

use App\Shared\Application\Query;

interface QueryBus
{
    public function handle(Query $query);
}