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
        <form action="{{ path }}format/update" method="post">
            <ul class="form-style-1">
                {% for format in formats %}
                <li>
                    <input type="hidden" name="id" value="{{format.id}}">
                </li>
                <li>
                    <label for="name">Nom du format</label>
                    <input type="text" name = "name" value="{{format.name}}" class="field-long">
                </li>
                <li>
                    <label for = "description">Description<span class="required">*</span></label>
                    <textarea name="description" id="description" cols="30" rows="10" class="field-long">{{format.description}}</textarea>
                </li>
                <li>
                    <input type="submit" value="Modifier">
                </li>
        </form>
        <form action="{{ path }}format/delete" method="post">
                <li>
                    <input type="hidden" name="id" value="{{format.id}}">
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
