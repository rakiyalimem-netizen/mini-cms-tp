## État actuel (tag lab-04)

- Modèles `Category` et `Tag` reliés à `Post` : un article a une catégorie et un auteur (1:N) et plusieurs tags (N:N, table pivot `post_tag`).
- Fabriques `PostFactory` (état `published()`), `CategoryFactory`, `TagFactory` et seeders pour un jeu de données réaliste.
- Chargement anticipé avec `with()` ; `Model::preventLazyLoading()` signale tout problème N+1 hors production.
- Tests Pest : `PostPagesTest`, `PostWriteTest` et `PostRelationsTest`.

## Données de démonstration

Après un clone, reconstruire la base avec `php artisan migrate:fresh --seed`. Attention : cette commande vide la base avant de la remplir.