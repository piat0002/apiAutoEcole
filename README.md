# apiAutoEcole


Commande à faire:

Installation des packages:
composer install

Creation de la base de donée:
php bin/console doctrine:database:create

Faire la migration(creation des tables dans la base de donnée):
php bin/console doctrine:migrations:migrate

Insertion de donnée:
php bin/console doctrine:fixtures:load


Mettre en route le serveur
symfony server:start
