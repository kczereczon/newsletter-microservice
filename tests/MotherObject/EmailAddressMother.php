<?php

namespace App\Tests\MotherObject;

use App\Entity\EmailAddress;

class EmailAddressMother
{
    public static function anyActive(): EmailAddress
    {
        $faker = \Faker\Factory::create();

        $emailAddress = new EmailAddress();
        $emailAddress->setEmail($faker->email());
        $emailAddress->setFirstName($faker->firstName());
        $emailAddress->setDisabled(false);

        return $emailAddress;
    }

    public static function anyDisabled(): EmailAddress
    {
        $faker = \Faker\Factory::create();

        $emailAddress = new EmailAddress();
        $emailAddress->setEmail($faker->email());
        $emailAddress->setFirstName($faker->firstName());
        $emailAddress->setDisabled(true);

        return $emailAddress;
    }
}