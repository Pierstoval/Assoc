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

# Automatiser slug et date
composer require antishov/doctrine-extensions-bundle

# Ck editor
composer 
require friendsymfony/ckeditor-bundle
pour pouvoir parcourir directement sur le server 
 composer require helios-ag/fm-elfinder-bundle
+ symfony console elfinder:install
# pb de verison avec les dependencies change juste la versions ds composer.json
"require": {
    "php": "^7.3|^8.0",
    .....
},
# Knp paginator
composer require knplabs/knp-paginator-bundle

# info supp
<p>{{dump(peintre)}}</p>
   et la tu a aceces a toutes les infos

# register
php bin/console make:registration-form
# login
php bin/console make:auth     