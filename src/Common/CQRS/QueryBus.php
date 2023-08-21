<?php

namespace App\Common\CQRS;

interface QueryBus
{
    public function handle(Query $query);
}