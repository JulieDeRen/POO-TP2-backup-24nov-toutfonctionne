{{ include('header.php', {title: 'Vente de timbres', pageHeader: 'Liste des formats'})}}
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nom des format</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                {% for format in formats %}
                        <tr>
                            <td><a href="{{ path }}format/show/{{ format.id}}">{{ format.name }}</a></td>
                            <td><a href="{{ path }}format/show/{{ format.id}}">{{ format.description }}</a></td>
                        </tr>
                {% endfor %}
                
            </tbody>
        </table>
    </main>
</body>
</html>