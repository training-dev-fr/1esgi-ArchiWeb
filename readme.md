## 1. Introduction
Projet 1ère année ESGI - Architecture WEB

Objectif:
- Comprendre le fonctionnement du web et internet
- Appréhender le protocole http
- Savoir identifier les différents éléments d'un message et d'une réponse http
- Configurer un serveur apache
- Créer un nom de domaine et le rediriger vers un dossier spécifique
- Mettre en place de la réécriture d'url

# 2. Objectifs du projet

Dans ce projet, le code vous est fournis. Vous devrez configurer votre environnement pour le faire fonctionner en local, afin de répondre aux contraintes de routes précisées dans la partie 3.

L'ensemble des routes devra être fonctionnelles comme spécifié dans la documentation, et testable via un outils de test api de votre choix (Postman, Talend api, Curl ...)

En plus, il faudra documenter l'api avec un fichier swagger qui permettra aux futurs développer d'avoir une visio rapide des fonctionnalités.

# 3. Routes

L'ensemble des routes devra être accessible via l'url http://1esgi-archiweb.test/

Voici les routes attendus pour ce projet

## Users
GET /Users : retourne la liste des utilisateurs
GET /Users/:id : retourne l'utilisateur selon son id
POST /Users : crée un nouvel utilisateur
PUT /Users/:id : Modifie un utilisateur selon son id
DELETE /Users/:id : Supprime un utilisateur selon son id

## Products
GET /Products : retourne la liste des produits
GET /Products/:id : retourne le produit selon son id
POST /Products : crée un nouveau produit
PUT /Products/:id : Modifie un produit selon son id
DELETE /Products/:id : Supprime un produit selon son id