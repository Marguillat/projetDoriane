# Projet Doriane
Web-app de planification et gestion de calendrier pour MDS
---

Requirements :
- avoir Composer d'installé

- Base de données (MySQL ou PostgreSQL), locale ou distante

----
### Clonage du répository distant
version https
```bash
git clone https://github.com/Marguillat/projetDoriane.git
```

version ssh
```bash
git clone git@github.com:Marguillat/projetDoriane.git
```

----

### Instalation des dépendances
~~~bash
composer install
~~~

----
### Configuration des informations principales

- Dupliquer le fichier `config.exemple.ini` qui se trouve à la racine du projet.
- Renomer se fichier en `config.ini`
- Modifier les données pour qu'elles correspondent à votre configuration

```ini
[site]
name        = 'appDoriane'
appName     = 'rien'
host        = 'localhost'
protocol    = 'http'
rootUrl     = ''
port        = ':8000'

[db]
type        = mysql
host        = 'localhost'
dbname      = 'projetdoriane'
login       = '****'
pwd         = '****'
```
- site['port'] --> port sur lequel votre web serveur tourne
- site['rootUrl'] --> chemin d'accès vers le fichier `index.php` en partant du point d'entrée de votre serveur web.
  - Si le serveur php à été démaré sur la racine du projet mettre `rootUrl = '' `
----
- db['type']
  - si MySQL -> `type = mysql`
  - si PostgreSQL -> `type = pgsql`
----

### Démarage du serveur local (si besoin)
~~~bash
php -S localhost:8000
~~~

----
### Vérifier le .htaccess (on ne sait jamais)

```htaccess
# Activer le module de réécriture
RewriteEngine On

# Condition pour exclure le sous-dossier public
RewriteCond %{REQUEST_URI} !^/{rootUrl}/public/
RewriteCond %{REQUEST_URI} !^/public/

# Rediriger toutes les autres requêtes vers index.php
RewriteRule ^ index.php [L]
```
