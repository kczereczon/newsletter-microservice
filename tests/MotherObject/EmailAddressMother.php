<?php

namespace App\Tests\MotherObject;

use App\Newsletter\Infrastructure\DoctrineEmailAddressEntity;

class EmailAddressMother
{
    public static function anyActive(): DoctrineEmailAddressEntity
    {
        $faker = \Faker\Factory::create();

        $emailAddress = new DoctrineEmailAddressEntity();
        $emailAddress->setEmail($faker->email());
        $emailAddress->setFirstName($faker->firstName());
        $emailAddress->setDisabled(false);

        return $emailAddress;
    }

    public static function anyDisabled(): DoctrineEmailAddressEntity
    {
        $faker = \Faker\Factory::create();

        $emailAddress = new DoctrineEmailAddressEntity();
        $emailAddress->setEmail($faker->email());
        $emailAddress->setFirstName($faker->firstName());
        $emailAddress->setDisabled(true);

        return $emailAddress;
    }
}