{{ include('header.php', {title: 'Vente de timbres', pageHeader: 'Liste de condition'})}}
    <main>
        <table>
            <thead>
                <tr>
                    <th>Types de conditions</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                {% for condition in conditions %}
                        <tr>
                            <td><a href="{{ path }}condition/show/{{ condition.id }}">{{ condition.name }}</a></td>
                            <td><a href="{{ path }}condition/show/{{ condition.id }}">{{ condition.description }}</a></td>
                        </tr>
                {% endfor %}
                
            </tbody>
        </table>
    </main>
</body>
</html>