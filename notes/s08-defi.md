
# Session 08 - Défi

## Checklist

La route posts.tag utilise {tag:slug} : oui / non

La page d'un tag n'affiche ni brouillon ni article d'un autre tag : oui / non

Les tags des cartes sont des liens : oui / non

L'accueil n'affiche que les tags qui ont au moins un article publié : oui / non

Les trois nouveaux tests passent et php artisan test est vert : oui / non

## Questions

### Pourquoi filtrer les tags vides après get() plutôt que d'afficher (0) ?

Un tag sans article publié mènerait à une page vide. On ne l'affiche donc pas.

### Combien de requêtes ajoute la liste des tags populaires, et pourquoi pas une par tag ?

Elle ajoute une seule requête. withCount calcule le nombre d'articles publiés dans une sous-requête SQL pour tous les tags à la fois, et non une requête par tag.
