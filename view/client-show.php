{{ include('header.php', {title: 'Vente de timbres', pageHeader: 'Liste de client'})}}
    <main>
        {% if errors is defined %}
            <span class="error">{{ errors | raw}}</span>
        {% endif %}
        <main>
        <form action="{{ path }}client/update" method="post">
            <ul class="form-style-1">
                {% for user in users %}
                <li>
                    <input type="hidden" name="id" value="{{user.id}}">
                </li>
                <li>
                    <label for = "lastName">Nom Complet <span class="required">*</span></label>
                    <input type="text" name = "lastName" value="{{user.lastName}}" class="field-divided">
                    <input type="text" name = "firstName" value="{{user.firstName}}" class="field-divided">
                </li>
                <li>
                    <label for="email">Courriel<span class="required">*</span><span class="form-colonne-droite">Mot de passe</span><span class="required">*</span></label>
                    <input type="email" name = "email" value="{{user.email}}" class="field-divided">
                    <input type="password" name = "password" value="{{user.password}}" class="field-divided">
                </li>
                <li>
                    <label for = "birthday">Anniversaire</label>
                    <input type="date" name = "birthday" value="{{user.birthday}}" class="field-divided">

                {% endfor %}
                {% for client in clients %}
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
                    <input type="text" name = "addresse" value="{{client.addresse}}" class="field-divided">
                {% endfor %}
                {% for user in users %}
                    <select name="idPriviledge" class="field-divided">
                        <option value = "-1">- Choisissez un privilège -</option>
                        <!--Ajout d'une condition sélected -->
                    {% for priviledge in priviledges %}
                        {% set selected = '' %}
                            {% if (priviledge.id) == (user.idPriviledge) %}
                                {% set selected = 'selected' %}
                            {% endif %}
                        <option value="{{priviledge.id}}" {{selected}}>{{priviledge.type}}</option>
                    {% endfor %}
                    </select>
                </li>
                <li>
                    <input type="submit" value="Modifier">
                </li>
        </form>
        <form action="{{ path }}client/delete" method="post">
                <li>
                    <input type="hidden" name="id" value="{{user.id}}">
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