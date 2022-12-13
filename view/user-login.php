{{ include('header.php', {title: 'Vente de timbres', pageHeader: 'Login'})}}
<body>
    <main>
        <h2>Connecter</h2>
        <span class="error">{{ errors|raw }}</span>
        <form action="{{ path }}user/auth" method="post">
            <label>Courriel
                <input type="email" name="email" value="{{ user.email }}">
            </label>
            <label>Mot de passe
                <input type="password" name="password">
            </label>
            <input type="submit" value="Connecter">
        </form>
    </main>
</body>
</html>