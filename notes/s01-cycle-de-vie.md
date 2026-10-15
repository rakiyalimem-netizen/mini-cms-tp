# Cycle de vie d'une requête Laravel

1. Le navigateur envoie une requête HTTP vers l'application Laravel.
2. Le fichier public/index.php constitue le point d'entrée de l'application.
3. Laravel initialise l'application et exécute les middlewares nécessaires.
4. Le routeur analyse l'URL et cherche la route correspondante dans routes/web.php.
5. La fonction associée à la route est exécutée.
6. La route retourne une réponse : texte, vue Blade ou autre contenu.
7. Laravel renvoie la réponse HTTP au navigateur.
