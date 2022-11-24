<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ path }}css/stylesheet.css">
        <title>Vente de timbre chez Stampee</title>
    </head>
    <body>
        <nav class="navigation">
            <div class="logo"><a href="{{ path }}"class="logo"><img src="{{ path }}img/logo.png" alt="logo"></a></div>
            <a href="{{ path }}client/index">Registre des clients</a>
            <a href="{{ path }}client/create">Ajouter un client</a>
            <a href="{{ path }}stamp/index">Registre des timbres</a>
            <a href="{{ path }}stamp/create">Ajouter timbre</a>
            <a href="{{ path }}country/create">Ajouter un pays</a>
            <button class="menu-button dropdown"> ...
                <i class="fa fa-caret-down"></i>
                <div class="dropdown-content">
                    <a href="{{ path }}country/index">Liste pays</a>
                    <a href="{{ path }}format/create">Ajouter format</a>
                    <a href="{{ path }}format/index">Liste formats</a>
                    <a href="{{ path }}condition/create">Ajouter condition</a>
                    <a href="{{ path }}condition/index">Liste conditions</a>
                    <a href="site-en-ligne/index.html">Site web</a>
                </div>
            </button>
        </nav>
        <header class="entete-principal">
            <img src="{{ path }}img/stamp_queen_1400.jpg" alt="Timbres">
            <h1>{{ client_list }}</h1>
        </header>
        <main>
            <section>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Adresse</th>
                            <th>Anniversaire</th>
                            <th>Courriel</th>
                            <th>Pays</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for client in clients %}
                        <tr>
                            <td><a href="{{ path }}client/show/{{ client.id}}">{{ client.firstName }}</a></td>
                            <td><a href="{{ path }}client/show/{{ client.id}}">{{ client.lastName }}</a></td>
                            <td><a href="{{ path }}client/show/{{ client.id}}">{{ client.addresse }}</a></td>
                            <td><a href="{{ path }}client/show/{{ client.id}}">{{ client.birthday }}</a></td>
                            <td><a href="{{ path }}client/show/{{ client.id}}">{{ client.email }}</a></td>
                            <td><a href="{{ path }}client/show/{{ client.id}}">{{ client.countryName }}</a></td>
                        </tr>
                        {% endfor %}
                    </tbody>
                    
                </table>
            </section>
        </main>
        <footer>
            Tous les droits
        </footer>
    </body>
</html>