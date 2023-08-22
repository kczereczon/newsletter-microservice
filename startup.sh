#! /bin/bash
symfony server:start &
php bin/console messenger:consume async &
