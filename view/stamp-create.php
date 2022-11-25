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
            <h1 class="titre">Nouveau timbre</h1>
        </header>
        <form action="{{ path }}stamp/store" method="post">
            <ul class="form-style-1">
                <li>
                    <label for = "name">Nom du timbre<span class="required">*</span></label>
                    <input type="text" name = "name" placeholder="Nom du timbre*" class="field-long">
                </li>
                <li>
                    <label for="price">Valeur<span class="required">*</span></label>
                    <input type="number" name = "price" placeholder = "Prix actuel*" class="field-divided">
                    <input type="number" name = "priceEstimation" placeholder = "Estimation de la valeur" class="field-divided">
                </li>
                <li>
                    <label for = "date">Date émission</label>
                    <input type="date" name = "date" placeholder = "Date d'émission'" class="field-long">
                </li>
                <li>
                    <label for="description">Description du timbre</label>
                    <textarea name="description" id="description" placeholder = "Décrivez le timbre" class="field-long" cols="30" rows="10"></textarea>
                </li>
                <li>
                    <label for="idCountry">Pays</label>
                    <select name="idCountry" class="field-long">
                        <option value = "-1">- Choisissez un pays -</option>

                    {% for country in countries %}
                        <option value="{{country.idCountry}}">{{country.countryName}}</option>
                    {% endfor %}
                        
                    </select>
                </li>
                <li>
                    <label for = "idFormat">Format & Condition<span class="required">*</span></label>
                    <select name="idFormat" class="field-divided">
                        <option value = "-1">- Choisissez un format* -</option>

                    {% for format in formats %}
                        <option value="{{format.id}}">{{format.name}}</option>
                    {% endfor %}
                    </select>
                    <select name="idCondition" class="field-divided">
                        <option value = "-1">- Type de condition* -</option>

                    {% for condition in conditions %}
                        <option value="{{condition.id}}">{{condition.name}}</option>
                    {% endfor %}
                        
                    </select>
                </li>
                <li>
                    <input type="submit" value = "save">
                </li>
            </ul> 
        </form>
    </main>
</body>
</html>