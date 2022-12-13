{{ include('header.php', {title: 'Vente de timbres', pageHeader: 'Liste de timbres'})}}
        <main>
            <section>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prix actuel</th>
                            <th>Estimation</th>
                            <th>Date d'émission</th>
                            <th>Description</th>
                            <th>Pays</th>
                            <th>Format</th>
                            <th>Condition</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for stamp in stamps %}
                        <tr>
                            <td><a href="{{ path }}stamp/show/{{ stamp.id}}">{{ stamp.stampName }}</a></td>
                            <td><a href="{{ path }}stamp/show/{{ stamp.id}}">{{ stamp.price }}</a></td>
                            <td><a href="{{ path }}stamp/show/{{ stamp.id}}">{{ stamp.priceEstimation }}</a></td>
                            <td><a href="{{ path }}stamp/show/{{ stamp.id}}">{{ stamp.date }}</a></td>
                            <td><a href="{{ path }}stamp/show/{{ stamp.id}}">{{ stamp.description }}</a></td>
                            <td><a href="{{ path }}stamp/show/{{ stamp.id}}">{{ stamp.countryName }}</a></td>
                            <td><a href="{{ path }}stamp/show/{{ stamp.id}}">{{ stamp.formatName }}</a></td>
                            <td><a href="{{ path }}stamp/show/{{ stamp.id}}">{{ stamp.conditionName }}</a></td>
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