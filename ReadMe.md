# Ibrahim_Nidam_Youdemy

**Plateforme de Cours en Ligne Youdemy**

**Author du Brief:** Iliass RAIHANI.

**Author:** Ibrahim Nidam.

## Links

- **Presentation Link :** [View Presentation](https://www.canva.com/design/DAGcEVOlLS4/EvMZ7a-xo3pwKxhqKss8JQ/view?utm_content=DAGcEVOlLS4&utm_campaign=designshare&utm_medium=link2&utm_source=uniquelinks&utlId=hc1fa5432e4)
- **UML USE CASE Link :** [View UML USE CASE](https://lucid.app/lucidchart/a92f7122-610e-4575-b31e-0b7b394ee8bc/edit?viewport_loc=-1042%2C-122%2C5344%2C2471%2C0_0&invitationId=inv_ff6d6faf-8dd3-4625-969a-597b39f80e55)
- **UML CLASS DIAGRAM Link :** [View UML CLASS DIAGRAM](https://lucid.app/lucidchart/e46b6b4e-fcdf-4b91-b6c4-8229c2bd9e40/edit?viewport_loc=-1305%2C-577%2C3818%2C1765%2C0_0&invitationId=inv_71650fc3-5a5f-4c5b-a619-a90eece138e2)
- **GitHub Repository :** [View on GitHub](https://github.com/Youcode-Classe-E-2024-2025/Ibrahim_Nidam_Youdemy.git)

### Créé : 13/01/25

Le projet repose sur les concepts de programmation orientée objet (OOP) en PHP natif pour assurer une architecture modulaire, claire et extensible.


# Configuration et Exécution du Projet

### Prérequis
* **Node.js** et **npm** installés (téléchargez [Node.js](https://nodejs.org/)).
* **Laragon** installé (téléchargez [Laragon](https://laragon.org/download/)).
* **PHP** installé et ajouté au PATH (Environnement système).

### Étapes d’installation

1. **Cloner le projet** :
   - Ouvrir un terminal et exécuter :  
     `git clone https://github.com/Youcode-Classe-E-2024-2025/Ibrahim_Nidam_Youdemy.git`

2. **Placer le projet dans le dossier Laragon** :
   - Cliquez sur le bouton **Root** dans Laragon pour ouvrir le dossier `www` (par défaut, `C:\laragon\www`).
   - Le chemin de votre projet devrait être `C:\laragon\www\Ibrahim_Nidam_Youdemy`.

3. **Configurer la base de données** :
   - Faites un clic droit sur **Laragon**, puis allez dans **Tools** > **Quick Add** et téléchargez **phpMyAdmin** et **MySQL**.
   - Ouvrir **phpMyAdmin** via Laragon :
     - Dans Laragon, cliquez sur le bouton **Database** pour accéder à phpMyAdmin (username = `root` et mot de passe est vide).
     - Créez une base de données `youdemy_db` et importez le fichier `script.sql` (disponible dans le dossier `/database/`).

4. **Installer les dépendances Node.js** :
   - Ouvrez un terminal dans le dossier du projet cloné.
   - Exécutez :  `npm install` ou `npm i`

5. **Installer Composer** :
   - Ouvrez un terminal dans le dossier du projet cloné et exécutez les commandes suivantes :

     ```cmd
     REM Télécharger l'installateur Composer
     php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

     REM Vérifier le hash SHA-384 de l'installateur
     php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') echo Installer verified && exit; echo Installer corrupt && del composer-setup.php && exit /b 1"

     REM Exécuter l'installateur
     php composer-setup.php

     REM Supprimer le script d'installation
     php -r "unlink('composer-setup.php');"

     REM Déplacer composer.phar dans un répertoire du PATH (optionnel pour un usage global)
     move composer.phar C:\bin\composer.phar
     ```

    - Ajoutez le dossier `C:\bin` à votre variable d'environnement PATH pour utiliser Composer globalement.

6. **Initialiser Composer dans le projet** :
   - Dans le dossier racine du projet, exécutez :

     ```cmd
     composer init
     ```
   - Suivez les instructions pour générer un fichier `composer.json` et accepter **psr-4**.

7. **Installer les dépendances PHP** :
   - Une fois le fichier `composer.json` généré, installez les dépendances en exécutant :

     ```cmd
     composer install
     ```

8. **Configurer Laragon pour le serveur local** :
   - Lancez **Laragon** et démarrez les services **Apache** et **MySQL** en cliquant sur **Start All**.

9. **Exécuter le projet** :
   - Une fois les services lancés dans Laragon, cliquez sur le bouton **Web** pour accéder à `http://localhost/Ibrahim_Nidam_Youdemy` dans votre navigateur.



# Contexte du projet:

La plateforme de cours en ligne Youdemy vise à révolutionner l’apprentissage en proposant un système interactif et personnalisé pour les étudiants et les enseignants.


# Fonctionnalités principales

## En tant que chef de projet : 

**Partie Front Office:**

​
Visiteur:

- Accès au catalogue des cours avec pagination.
- Recherche de cours par mots-clés.
- Création d’un compte avec le choix du rôle (Étudiant ou Enseignant).

​

Étudiant:

- Visualisation du catalogue des cours.
- Recherche et consultation des détails des cours (description, contenu, enseignant, etc.).
- Inscription à un cours après authentification.
- Accès à une section “Mes cours” regroupant les cours rejoints.

​

Enseignant:

- Ajout de nouveaux cours avec des détails tels que:
    - Titre, description, contenu (vidéo ou document), tags, et catégorie.
- Gestion des cours :
    - Modification, suppression et consultation des inscriptions.
- Accès à une section “Statistiques” sur les cours:
    - Nombre d’étudiants inscrits, Nombre de cours, etc.

​


**Partie Back Office:**


Administrateur:

- Validation des comptes enseignants.
- Gestion des utilisateurs :
    - Activation, suspension ou suppression.
- Gestion des contenus :
    - Cours, catégories et tags.
- Insertion en masse de tags pour gagner en efficacité.
- Accès à des statistiques globales :
    - Nombre total de cours, répartition par catégorie, Le cour avec le plus d' étudiants, Les Top 3 enseignants.


# Fonctionnalités Transversales:


- Un cours peut contenir plusieurs tags (relation many-to-many).
- Application du concept de polymorphisme dans les méthodes suivantes : Ajouter cours et afficher cours.
- Système d’authentification et d’autorisation pour protéger les routes sensibles.
- Contrôle d’accès : chaque utilisateur ne peut accéder qu’aux fonctionnalités correspondant à son rôle.

​

### Exigences Techniques:


- Respect des principes OOP (encapsulation, héritage, polymorphisme).
- Base de données relationnelle avec gestion des relations (one-to-many, many-to-many).
- Utilisation des sessions PHP pour la gestion des utilisateurs connectés.
- Système de validation des données utilisateur pour garantir la sécurité.

​

### Bonus:



- Recherche avancée avec filtres (catégorie, tags, auteur).
- Statistiques avancées :
    - Taux d’engagement par cours, catégories les plus populaires.
- Mise en place d’un système de notification:
    - Par exemple, validation de compte enseignant ou inscription confirmée à un cours.
- Implémentation d’un système de commentaires ou d’évaluations sur les cours.
- Génération de certificats PDF de complétion pour les étudiants.



## **Modalités pédagogiques**

**Version 1 :**

- Travail: individuel 
- Durée de travail:
    - 5 jours Date de lancement du brief: 13/01/2025 à 09:00 am
    - Date limite de soumission: 20/01/2025 avant 05:30 pm


## **Modalités d'évaluation**

Une durée de 35 min organisée comme suit:
- Présenter une défense publique de son travail devant les jurys.
- Chaque apprenants n'aura que ~10 minutes pour Démontrer le contenu et la fonctionnalité du site Web (Démonstration, explication du code source).
- Code Review \ Questions culture Web (10 minutes)
- Mise en situation (15 minutes)

## **Livrables**
- Lien de Repository Github du projet 
- Lien de la présentation.
- Les diagrammes UML
  - Diagramme des cas d'utilisations
  - Diagramme de classes

## **Critères de performance**

- La logique métier et votre architecture doivent être clairement séparés.
- Cohérence dans l'application des concepts OOP.
- Amélioration de la structure et de la lisibilité du code.
- Utilisation appropriée des classes, objets, méthodes, etc.
- Les pages web doivent bien s'ajuster à tous les types d'écrans .
- Utilisation de la validation côté client avec HTML5 et JavaScript (Natif) pour minimiser les erreurs avant même la soumission du formulaire.
- Validation côté serveur doit inclure des mesures pour éviter les attaques de type Cross-Site Scripting (XSS) et Cross-Site Request Forgery (CSRF)
- Utilisez des requêtes préparées pour interagir avec la base de données, afin de prévenir les attaques SQL injection.
- Effectuez une validation et une échappement des données d'entrée pour éviter toute injection malveillante.