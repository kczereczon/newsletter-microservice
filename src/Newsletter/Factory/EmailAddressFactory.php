<?php

namespace App\Newsletter\Factory;

use App\Entity\EmailAddress;

class EmailAddressFactory
{
    public function create(string $emailAddress, string $firstName): EmailAddress
    {
        $emailAddressEntity = new EmailAddress();
        $emailAddressEntity->setEmail($emailAddress);
        $emailAddressEntity->setDisabled(false);
        $emailAddressEntity->setFirstName($firstName);

        return $emailAddressEntity;
    }
}