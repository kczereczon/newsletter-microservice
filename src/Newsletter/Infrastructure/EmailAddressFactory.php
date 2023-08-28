<?php

namespace App\Newsletter\Infrastructure;

class EmailAddressFactory
{
    public function create(string $emailAddress, string $firstName): DoctrineEmailAddressEntity
    {
        $emailAddressEntity = new DoctrineEmailAddressEntity();
        $emailAddressEntity->setEmail($emailAddress);
        $emailAddressEntity->setDisabled(false);
        $emailAddressEntity->setFirstName($firstName);

        return $emailAddressEntity;
    }
}