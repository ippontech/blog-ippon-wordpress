# Blog Ippon (via WordPress)
***

Ce projet est la structure pour le thème du blog d'Ippon.

***

## 1. Installations locales

### 1.1. Installation WordPress

#### 1.1.1. Pré-requis (Mac OS)

1. Installer [MAMP](http://www.mamp.info/en/downloads/index.html) (Mac Apache MySQL PHP)
2. Télécharger [WordPress](http://wordpress.org/download/) (version actuelle 3.7.1) et dézipper dans le dossier qui vous convient


#### 1.1.2. Initialisation base de données

Se connecter à son MySQL, créer la base de données et donner les droits

	mysql -u root
	create database <nomdelabase>;
	grant all privileges on <nomdelabase>.* to "<user>"@"<hote>" identified by "<userpwd>";
	flush privileges;

Dans le dossier ou WordPress a été dézippé, dupliquer le fichier wp-confog-sample.php en wp-config.php et renseigner dans celui-ci les informations pour se connecter à la base de données.

#### 1.1.3. Paramétrage MAMP

Dans la fenêtre de dialogue MAMP : Préférences > Apache > Modifier le document root pour que celui-ci pointe sur le dossier où WordPress a été dézippé.

Redémarrer les serveurs Apache et MySQL

### 1.2. Installation environnement de développement

#### 1.2.1. Pré-requis (Mac OS)

1. Installer [Git](http://git-scm.com/)
2. Installer [Node JS](http://nodejs.org/)
3. Installer [Ruby](http://www.ruby-lang.org/fr/)
4. Installer [Compass](http://compass-style.org/install/)

#### 1.2.2. Mise à jour des modules

Se positionner à la racine du projet

	sudo npm install
	
## 2. Développement

### 2.1. Les commandes

Se positionner à la racine du projet

Pour lancer, les outils de développement

	grunt dev


