{{ include('header.php', {title: 'Vente de timbres', pageHeader: 'Liste de timbres'})}}
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