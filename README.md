# Projet Doriane
Web-app de planification et gestion de calendrier pour MDS
---

Requirements :
- avoir Composer d'installé

- Base de données (MySQL ou PostgreSQL), locale ou distante
  - des template de base de données se trouvent dans le dossier `/db`

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
- Renommer ce fichier en `config.ini`
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

----
## Justification
### Tailwind
L'utilisation d'un framework comme tailwind permet de limiter la création de fichiers css. L'utilisation des classes tailwind permet de limiter les sources de conflits css et les potentielles sources de dettes techniques.

### Composer
Manager de dépendances comparable à npm/node pour PHP, permet de créer plus facilement des projets php plus facilement avec nottement l'utilisation de autoload.
