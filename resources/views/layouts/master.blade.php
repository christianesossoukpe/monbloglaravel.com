<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mon Blog Laravel</title>
</head>

<body>
    <header>
        <h1>Mon Blog Laravel</h1>
        <nav>
            <ul>
                <li>
                    <a href="/contact-us">Contactez-nous</a>
                </li>
                <li>
                    <a href="/about">A propos</a>
                </li>
                
            </ul>
        </nav>
    </header>
    
    <main>
        <!-- Contenu de toutes les pages ici -->
        @yield('contenu')
        <!-- Contenu de toutes les pages ici -->
    </main>
</body>

</html>
