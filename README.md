# Mini-CMS

## Description

Mini-CMS est une application web de gestion de contenu développée avec Laravel 13 dans le cadre de l'atelier Framework Côté Serveur à l'ISET Sidi Bouzid.

L'application permet de gérer des articles, des catégories et des tags. Elle propose également un système d'authentification avec deux rôles : administrateur et auteur, ainsi qu'une API REST pour accéder aux données.

**Environnement technique :**
- Laravel 13.43.0
- PHP 8.5.11
- SQLite
- Laravel Sanctum
- Pest pour les tests
- Node.js v22.20.0
- npm 11.6.2

## Fonctionnalités

- Affichage de la page d'accueil et des articles.
- Consultation des détails d'un article.
- Création, modification et suppression des articles.
- Gestion des catégories et des tags.
- Association des articles aux catégories et aux tags.
- Authentification des utilisateurs.
- Gestion des rôles administrateur et auteur.
- Autorisation des opérations avec PostPolicy.
- Validation des formulaires avec les Form Requests.
- Messages flash après les opérations.
- Pagination et filtrage des articles.
- API REST pour les articles, catégories et tags.
- Authentification API avec Laravel Sanctum.
- Tests automatisés avec Pest.

## Installation

### Bash

```bash
git clone https://github.com/rakiyalimem-netizen/mini-cms-tp.git
cd mini-cms-tp

composer install

cp .env.example .env

touch database/database.sqlite

php artisan key:generate

php artisan migrate --seed

npm install

npm run build

php artisan serve
```

L'application sera accessible à l'adresse :

http://127.0.0.1:8000

### PowerShell

```powershell
git clone https://github.com/rakiyalimem-netizen/mini-cms-tp.git
cd mini-cms-tp

composer install

Copy-Item .env.example .env

New-Item database/database.sqlite -ItemType File -Force

php artisan key:generate

php artisan migrate --seed

npm install

npm run build

php artisan serve
```

L'application sera accessible à l'adresse :

http://127.0.0.1:8000

**Remarque :** Le projet utilise SQLite. Le fichier `database/database.sqlite` contient la base de données locale.

## Comptes de test

Les comptes suivants sont présents dans la base de données de développement.

| Rôle | Adresse e-mail | Mot de passe |
|---|---|---|
| Administrateur | test@example.com | password |
| Auteur | clemens.thompson@example.net | password |
| Auteur | ledner.shirley@example.org | password |
| Auteur | auteur-b@example.com | password |

Ces comptes sont destinés uniquement aux tests locaux.

## API

L'API REST est accessible avec le préfixe :

`http://127.0.0.1:8000/api`

### Endpoints

| Méthode | Endpoint | Description | Accès |
|---|---|---|---|
| GET | `/api/posts` | Liste des articles publiés | Public |
| GET | `/api/posts/{post}` | Détails d'un article | Public |
| POST | `/api/posts` | Créer un article | Authentifié |
| PUT/PATCH | `/api/posts/{post}` | Modifier un article | Authentifié et autorisé |
| DELETE | `/api/posts/{post}` | Supprimer un article | Authentifié et autorisé |
| GET | `/api/categories` | Liste des catégories | Public |
| GET | `/api/categories/{category}` | Détails d'une catégorie | Public |
| GET | `/api/tags` | Liste des tags | Public |
| GET | `/api/tags/{tag}` | Détails d'un tag | Public |
| POST | `/api/login` | Connexion et génération d'un jeton | Public |
| POST | `/api/logout` | Déconnexion et révocation du jeton courant | Authentifié |
| GET | `/api/user` | Informations de l'utilisateur connecté | Authentifié |

Le filtrage et la pagination des articles sont également disponibles :

- `GET /api/posts?per_page=5`
- `GET /api/posts?category=slug-categorie`
- `GET /api/posts?tag=slug-tag`

### Authentification par jeton

L'API utilise Laravel Sanctum pour l'authentification par jeton Bearer.

**1. Connexion**

Envoyer une requête POST vers :

`http://127.0.0.1:8000/api/login`

Corps JSON :

```json
{
    "email": "test@example.com",
    "password": "password"
}
```

La réponse contient un jeton d'accès :

```json
{
    "token": "VOTRE_JETON",
    "token_type": "Bearer"
}
```

**2. Utilisation du jeton**

Pour accéder aux routes protégées, ajouter cet en-tête HTTP :

```http
Authorization: Bearer VOTRE_JETON
Accept: application/json
```

**3. Déconnexion**

Envoyer une requête POST vers :

`http://127.