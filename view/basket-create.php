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
                    <a href="{{ path }}uxui_maquette_catalogue/">Site web</a>
                </div>
            </button>
        </nav>
        <header class="entete-principal">
            <img src="{{ path }}img/stamp_queen_1400.jpg" alt="Timbres">
            <h1>{{ stamp_list }}</h1>
        </header>
        <main>
        <div class="les-grilles-page-rechercher rechercher">
        <div class="barre-recherche">
          <form action="">
            <input type="text" placeholder="Rechercher..." name="rechercher">
            <button type="button" class="bouton-rechercher"><i class="fa fa-search"></i></button>
          </form>
        </div>
    </div>
    <main>
        <section class="les-grilles-page-main caroussel-portail">
            {% for stamp in stamps %}
                <article class = "flexVertical carte">
                    <img src="{{ path }}img/imgStamp/{{ stamp.stampImgFile }}" alt="Timbre">
                    <div>
                        <header>
                            <h2>{{ stamp.stampName }}</h2>
                        </header>
                        <section>
                            <dl>
                                <dt>Date d'émission</dt>
                                    <dd>{{ stamp.date }}</dd>
                                <dt>Prix demandé</dt>
                                    <dd>${{ stamp.price }}</dd>
                                <dt>Estimation</dt>
                                    <dd>${{ stamp.priceEstimation }}</dd>
                                <dt>Format</dt>
                                    <dd>{{ stamp.formatName }}</dd>
                                <dt>Condition</dt>
                                    <dd>{{ stamp.conditionName }}</dd>
                            </dl>
                            <div class="utilitaire-alinement-bouton-encherir">
                                <a href="{{ path }}basket/store">Ajouter au panier</a>
                            </div>
                        </section>
                    </div>
                </article>
            {% endfor %}
        </section>
    </main>
    <footer>
        Tous les droits
    </footer>
    </body>
</html>