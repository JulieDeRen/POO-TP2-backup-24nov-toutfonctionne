{{ include('header.php', {title: 'Vente de timbres', pageHeader: 'Modifier'})}}
    <main>
        {% if errors is defined %}
            <span class="error">{{ errors | raw}}</span>
        {% endif %}
        <form action="{{ path }}user/update" method="post">
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
                    
                    <select name="idPriviledge" class="field-divided">
                        <option value = "-1">- Choisissez un privilege -</option>
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
                    <label for="addresse">Adresse</label>
                    <input type="text" name = "addresse" value="{{client.addresse}}" class="field-divided"> 
                    <select name="idCountry" class="field-divided">
                        <option value = "-1">- Choisissez un pays -</option>

                {% for country in countries %}
                    {% set selected = '' %}
                        {% for client in clients %}
                            {% if (country.idCountry) == (client.idCountry) %}
                                {% set selected = 'selected' %}
                            {% endif %}
                        {% endfor %}
                        <option value="{{country.idCountry}}" {{selected}}>{{country.countryName}}</option>
                {% endfor %}
                  
                {% for user in users %}
                    </select>              
                </li>
                <li>
                    <input type="submit" value="Modifier">
                </li>
        </form>
        <form action="{{ path }}user/delete" method="post">
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
