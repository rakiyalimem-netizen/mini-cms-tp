
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - Mini-CMS</title>
</head>
<body>
    <h1>Bienvenue sur Mini-CMS</h1>
    <p>Cette page est une vue Blade renvoyée par une route closure.</p>

    <dl>
        <dt>Étudiant</dt>
        <dd>{{ $etudiant }}</dd>

        <dt>Groupe</dt>
        <dd>{{ $groupe }}</dd>

        <dt>Cours</dt>
        <dd>{{ $cours }}</dd>
    </dl>
</body>
</html>
