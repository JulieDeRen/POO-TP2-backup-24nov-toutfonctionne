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
            <h1>Modifier</h1>
        </header>
    <main>
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
                        <option>- Choisissez un pays -</option>
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
