#! /bin/bash
php bin/console doctrine:migrations:migrate --no-interaction
symfony server:start &
php bin/console messenger:consume async &