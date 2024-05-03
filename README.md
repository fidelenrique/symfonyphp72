Test Symfony 3.4 avec PHP 7.2
========================


Ce projet est un test sous Symfony 3.4 nécessitant PHP 7.2.


Prérequis
--------------

Avant de commencer, assurez-vous d'avoir installé les prérequis suivants sur votre système :

PHP 7.2
Composer
Symfony CLI (facultatif, mais recommandé pour simplifier la gestion de votre projet Symfony)


Installation
--------------


* 1. Clonez ce dépôt sur votre machine locale :

```shell
git clone https://github.com/fidelenrique/symfonyphp72.git
```

* 2. Accédez au répertoire de votre projet :
```shell
cd votre-projet
```

* 3. Installez les dépendances PHP en exécutant la commande Composer :
```shell
composer install
```

* 4. Configurez votre base de données dans le fichier parameters.yml en fonction de votre environnement.


* 5. Créez la base de données et exécutez les migrations Doctrine :

```shell
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

* 6. Démarrez le serveur de développement Symfony :

```shell
symfony server:start
```


* 7. Accédez à votre application dans votre navigateur web à l'adresse :

```shell
http://localhost:8000
```

* 8. Liens pour créer et lister des propiétaires :

```shell
http://localhost:8000/owners/create
http://localhost:8000/owners
```

* 9. Liens pour créer et lister des véhicules :

```shell
http://localhost:8000/vehicules/create
http://localhost:8000/vehicules
```

* 10. Liens pour créer et lister des caractéristiques du véhicule :

```shell
http://localhost:8000/characteristics/create
http://localhost:8000/characteristics
```

* 11. commandes pour mettre à our le schéma de la base de données :

```shell
php bin/console doctrine:migrations:diff
php bin/console doctrine:migrations:migrate
```

* 12. suivi graphique - nombre de véhicules par propriétaire :

```shell
http://symfonyphp72.localhost/chart
```

Assurez-vous de remplacer "votre-utilisateur" et "votre-projet" par votre nom d'utilisateur GitHub et le nom de votre projet respectivement. Vous pouvez également ajouter d'autres instructions spécifiques à votre projet si nécessaire.
