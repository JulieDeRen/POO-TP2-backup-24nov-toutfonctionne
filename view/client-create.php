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
            <h1 class="titre">Nouveau client</h1>
        </header>
        <span class="error">{{ errors|raw }}</span>
        <form action="{{ path }}client/store" method="post">
            <ul class="form-style-1">
                <li>
                    <label for = "lastName">Nom complet<span class="required">*</span></label>
                    <input type="text" name = "lastName" placeholder="Nom de famille*" class="field-divided">
                    <input type="text" name = "firstName" placeholder="Prénom*"class="field-divided">
                </li>
                <li>
                    <label for="email">Courriel<span class="required">*</span><span class="form-colonne-droite">Mot de passe</span><span class="required">*</span></label>
                    <input type="email" name = "email" placeholder = "Courriel*" class="field-divided">
                    <input type="password" name = "password" placeholder = "Mot de passe*" class="field-divided">
                </li>
                <li>
                    <label for = "birthday">Anniversaire</label>
                    <input type="date" name = "birthday" placeholder = "Date d'anniversaire" class="field-divided">
                    <select name="idCountry" class="field-divided">
                        <option value = "-1">- Choisissez un pays -</option>

                    {% for country in countries %}
                        <option value="{{country.idCountry}}">{{country.countryName}}</option>
                    {% endfor %}
                    </select>
                </li>
                <li>
                    <label for="addresse">Adresse</label>
                    <input type="text" name = "addresse" placeholder = "Adresse" class="field-long">
                </li>
                <li>
                    <input type="submit" value = "save">
                </li>
            </ul> 
        </form>
    </main>
</body>
</html>