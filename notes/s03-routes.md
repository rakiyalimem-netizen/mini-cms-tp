
# Session 03 - Routes, contrôleurs et layout

## Défi

URL produite par `route('about')` : `/a-propos`

URL produite par `route('posts.show', 'routes-et-controleurs')` : `/posts/routes-et-controleurs`

URL produite par `route('posts.archive', 2025)` : `/posts/archive/2025`

Pourquoi `/posts/archive/abc` et `/posts/article-inconnu` répondent toutes deux 404, et quelle ligne de code en est responsable dans chaque cas ?

- `/posts/archive/abc` : `whereNumber('year')` refuse une valeur qui n'est pas numérique.
- `/posts/article-inconnu` : `abort(404)` est exécuté dans `PostController::show()` si le slug n'existe pas.

Que se passe-t-il si une vue appelle `route('posts.show')` sans paramètre ?

- Laravel déclenche une exception parce que le paramètre obligatoire `slug` manque.
