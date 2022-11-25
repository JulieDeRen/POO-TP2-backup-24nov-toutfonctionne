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
            <h1>Modifier</h1>
        </header>
    <main>
        <form action="{{ path }}stamp/update" method="post">
            <ul class="form-style-1">
                {% for stamp in stamps %}
                <li>
                    <input type="hidden" name="id" value="{{stamp.id}}">
                </li>
                <li>
                    <label for = "name">Nom du timbre<span class="required">*</span></label>
                    <input type="text" name = "name" value="{{stamp.name}}" placeholder="Nom du timbre" class="field-long">
                </li>
                <li>
                    <label for="price">Valeur<span class="required">*</span></label>
                    <input type="number" name = "price" value="{{stamp.price}}" placeholder = "Prix actuel" class="field-divided">
                    <input type="number" name = "priceEstimation" value="{{stamp.priceEstimation}}" placeholder = "Estimation de la valeur*" class="field-divided">
                </li>
                <li>
                    <label for = "date">Date émission<span class="required">*</span></label>
                    <input type="date" name = "date" value="{{stamp.date}}" placeholder = "Date d'émission'" class="field-long">
                </li>
                <li>
                    <label for="description">Description du timbre</label>
                    <textarea name="description" id="description" value="{{stamp.description}}" placeholder = "Décrivez le timbre" class="field-long" cols="30" rows="10"></textarea>
                </li>
                <li>
                    <label for="idCountry">Pays</label>
                    <select name="idCountry" class="field-long">
                        <option value = "-1">- Choisissez un pays -</option>
                {% endfor %}

                {% for country in countries %}
                    {% set selected = '' %}
                        {% for stamp in stamps %}
                            {% if (country.idCountry) == (stamp.idCountry) %}
                                {% set selected = 'selected' %}
                            {% endif %}
                        {% endfor %}
                        <option value="{{country.idCountry}}" {{selected}}>{{country.countryName}}</option>
                {% endfor %}
                        
                    </select>
                </li>
                <li>
                    <label for = "idFormat">Format & Condition<span class="required">*</span></label>
                    <select name="idFormat" class="field-divided">
                        <option value = "-1">- Choisissez un format -</option>

                {% for format in formats %}
                    {% set selected = '' %}
                        {% for stamp in stamps %}
                            {% if (format.id) == (stamp.idFormat) %}
                                {% set selected = 'selected' %}
                            {% endif %}
                        {% endfor %}
                        <option value="{{format.id}}" {{selected}}>{{format.name}}</option>
                {% endfor %}
                    </select>
                    <select name="idCondition" class="field-divided">
                        <option value = "-1">- Type de condition -</option>

                {% for condition in conditions %}
                    {% set selected = '' %}
                    {% for stamp in stamps %}
                        {% if (condition.id) == (stamp.idCondition) %}
                            {% set selected = 'selected' %}
                        {% endif %}
                    {% endfor %}
                        <option value="{{condition.id}}" {{selected}}>{{condition.name}}</option>
                {% endfor %}
                {% for stamp in stamps %}
                    </select>
                </li>
                <li>
                    <input type="submit" value="Modifier">
                </li>
        </form>
        <form action="{{ path }}stamp/delete" method="post">
                <li>
                    <input type="hidden" name="id" value="{{stamp.id}}">
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
