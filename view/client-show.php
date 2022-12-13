{{ include('header.php', {title: 'Vente de timbres', pageHeader: 'Modifier'})}}
    <main>
        {% if errors is defined %}
            <span class="error">{{ errors | raw}}</span>
        {% endif %}
        <form action="{{ path }}client/update" method="post">
            <ul class="form-style-1">
                {% for client in clients %}
                <li>
                    <input type="hidden" name="id" value="{{client.id}}">
                </li>
                <li>
                    <label for = "lastName">Nom Complet <span class="required">*</span></label>
                    <input type="text" name = "lastName" value="{{client.lastName}}" class="field-divided">
                    <input type="text" name = "firstName" value="{{client.firstName}}" class="field-divided">
                </li>
                <li>
                    <label for="email">Courriel<span class="required">*</span><span class="form-colonne-droite">Mot de passe</span><span class="required">*</span></label>
                    <input type="email" name = "email" value="{{client.email}}" class="field-divided">
                    <input type="password" name = "password" value="{{client.password}}" class="field-divided">
                </li>
                <li>
                    <label for = "birthday">Anniversaire</label>
                    <input type="date" name = "birthday" value="{{client.birthday}}" class="field-divided">
                    <select name="idCountry" class="field-divided">
                        <option value = "-1">- Choisissez un pays -</option>
                        <!--Ajout d'une condition sélected -->
                    {% for country in countries %}
                        {% set selected = '' %}
                            {% if (country.idCountry) == (client.idCountry) %}
                                {% set selected = 'selected' %}
                            {% endif %}
                        <option value="{{country.idCountry}}" {{selected}}>{{country.countryName}}</option>
                    {% endfor %}
                    </select>
                </li>
                <li>
                    <label for="addresse">Adresse</label>
                    <input type="text" name = "addresse" value="{{client.addresse}}" class="field-long">
                </li>
                <li>
                    <input type="submit" value="Modifier">
                </li>
        </form>
        <form action="{{ path }}client/delete" method="post">
                <li>
                    <input type="hidden" name="id" value="{{client.id}}">
                </li>
                {% endfor %}
                <li>
                    <input type="submit" value="Effacer">
                </li>
            </ul>
        </form>
    </main>  
</body>
</html>
