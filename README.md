# Actions

Action est site collaboratif presentant des actions solidaires
# Association
# PREREQUIS
on doit avoir docker 
composer 
cli de symfony
This creates a binary called symfony that provides all the tools you need to develop and run your Symfony application locally.
PHP 7.4 minimum


# Lancer le projet
symfony serve -d 
lancer le serveur
server stop
php bin/console server:dump

# DOCKER
Pour creer une database
symfony console make:docker:database
Lancer docker 
docker-compose up -d

# TEST
Make a test
symfony console make:unit-test
Pour initialiser les tests
php .\bin\phpunit
Pour lancer le test meilleur mise en page
php .\bin\phpunit --testdo


# WEBPACK ENCORE
composer require symfony/webpack-encore-bundle
pour le css
npm install postcss-loader autoprefixer --dev
npm install bootstrap@next


# symfony
symfony serve -d 
symfony server:stop