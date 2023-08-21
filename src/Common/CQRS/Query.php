<?php

namespace App\Common\CQRS;

interface Query
{

}

interface QueryBus
{
    public function handle(Query $query);
}

interface QueryHandler
{

}