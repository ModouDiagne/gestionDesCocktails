# Gestion des Cocktails - Backend

Ce projet est un backend pour une application de gestion de cocktails, construit avec Laravel. Il expose une API REST qui permet de gérer les recettes de cocktails, incluant des fonctionnalités telles que la création, la mise à jour, la suppression et la récupération de cocktails.

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les éléments suivants sur votre machine :

- **PHP** >= 8.0
- **Composer** >= 2.0
- **MySQL** ou un autre SGBD compatible
- **Laravel** >= 9.x
- **Postman** (ou un autre outil similaire pour tester l'API)

## Installation

Suivez les étapes ci-dessous pour installer et exécuter le projet en local.

### Étape 1 : Cloner le dépôt

Clonez ce dépôt sur votre machine :

```bash
git clone git@github.com:ModouDiagne/gestionDesCocktails.git
```

Accédez au répertoire du projet :

```bash
cd gestionDesCocktails
```

### Étape 2 : Installer les dépendances

Installez toutes les dépendances PHP en utilisant Composer :

```bash
composer install
```

### Étape 3 : Configuration de l'environnement

Copiez le fichier `.env.example` et renommez-le en `.env` :

```bash
cp .env.example .env
```

Ensuite, générez la clé d'application Laravel :

```bash
php artisan key:generate
```

Configurez vos informations de base de données dans le fichier `.env` :

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_la_base_de_donnees
DB_USERNAME=votre_nom_d_utilisateur
DB_PASSWORD=votre_mot_de_passe
```

### Étape 4 : Migrer la base de données

Exécutez les migrations pour créer les tables nécessaires dans votre base de données :

```bash
php artisan migrate
```

### Étape 5 : Démarrer le serveur de développement

Lancez le serveur Laravel :

```bash
php artisan serve
```

L'API est maintenant accessible à l'adresse `http://127.0.0.1:8000`.

## Fonctionnalités de l'API

Voici les principales fonctionnalités de l'API :

- **Lister les cocktails** : `GET /api/cocktails`
- **Afficher un cocktail spécifique** : `GET /api/cocktails/{id}`
- **Créer un nouveau cocktail** : `POST /api/cocktails`
- **Mettre à jour un cocktail existant** : `PUT /api/cocktails/{id}`
- **Supprimer un cocktail** : `DELETE /api/cocktails/{id}`

### Exemples de requêtes

Vous pouvez utiliser **Postman** pour tester ces endpoints. Voici un exemple de requête pour créer un cocktail :

#### POST `/api/cocktails`

```json
{
    "name": "Mojito",
    "ingredients": [
        "Rhum",
        "Menthe",
        "Citron Vert",
        "Sucre",
        "Eau gazeuse"
    ],
    "instructions": "Mélanger le tout dans un verre avec des glaçons."
}
```

## Tests

Pour exécuter les tests unitaires, utilisez la commande suivante :

```bash
php artisan test
```

## Contribution

Les contributions sont les bienvenues ! Veuillez suivre ces étapes pour contribuer :

1. Forkez ce dépôt
2. Créez une nouvelle branche (`git checkout -b feature/nom-de-la-fonctionnalité`)
3. Commitez vos changements (`git commit -m 'Ajout d'une nouvelle fonctionnalité'`)
4. Poussez vers votre branche (`git push origin feature/nom-de-la-fonctionnalité`)
5. Ouvrez une Pull Request

## License

Ce projet est sous licence MIT. Consultez le fichier [LICENSE](LICENSE) pour plus d'informations.

## Auteurs

- **Modou Diagne** - Développeur web.


