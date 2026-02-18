## *Présentation*

SeedPass est une solution innovante qui vise à garantir la qualité et la traçabilité des semences certifiées en Afrique. En utilisant la blockchain, l'IA et la reconnaissance faciale (via Mojip), nous luttons contre la contrefaçon, améliorons les rendements agricoles et renforçons la sécurité alimentaire.

## *Problématique*

- Seulement 32,5% des semences utilisées mondialement sont certifiées (chiffre probablement plus bas en Afrique).
- La contrefaçon et la faible qualité des semences entraînent une baisse des rendements agricoles.
- La traçabilité limitée rend difficile la lutte contre les pratiques frauduleuses.


## *Solution*

Nous proposons un passeport numérique pour chaque lot de semences, basé sur une identité numérique unique et sécurisée. Ce passeport permet de :

- Vérifier l'authenticité.
- Garantir la qualité.
- Assurer la traçabilité.
- Faciliter les échanges commerciaux.


## *Fonctionnalités Clés*

- *Authentification des semences* : Vérification de l'origine et de la qualité.
- *Traçabilité complète* : Suivi des semences à chaque étape.
- *Reconnaissance faciale* : Authentification des utilisateurs (producteurs, distributeurs, agriculteurs) via Mojip.
- *Blockchain* : Sécurisation des données.
- *Codes QR/NFC* : Identification rapide des lots de semences.


## *Architecture*

- *Backend* : Laravel (PHP)
- *Frontend* : Angular (TypeScript)

*Structure du Frontend (Angular)*


SeedPassFront/src/app
├── agricultor
│   └── seed-verification: Composants pour la vérification des semences par l'agriculteur.
├── biometric
│   └── biometric: Composants liés à l'authentification biométrique (Mojip).
├── productor
│   └── productor: Composants pour les producteurs.
└── registration-semence
    └── semence-registration: Composants pour l'enregistrement des semences.



## *Installation*

1. Cloner le dépôt.
2. Configurer les variables d'environnement.
3. Installer les dépendances (Composer pour le backend, npm ou yarn pour le frontend).
4. Migrer la base de données (pour le backend).
5. Lancer les serveurs backend et frontend.

### *Backend (Laravel)*

bash
cd SeedPass/
composer install
php artisan migrate
php artisan serve



### *Frontend (Angular)*

bash
cd SeedPassFront/
npm install
ng serve



## *Innovation*

- Solution intégrée combinant blockchain, application mobile et IA.
- Approche holistique englobant tous les acteurs de la chaîne de valeur.
- Accent mis sur l'expérience utilisateur.


## *Faisabilité*

- Technologie blockchain mature.
- Partenariats stratégiques envisagés.
- Approche progressive par phases pilotes.


## *Impact*

- Augmentation de la productivité agricole.
- Réduction de la pauvreté.
- Amélioration de la sécurité alimentaire.
- Promotion de pratiques agricoles durables.


## *Équipe*

*SeneTriDevs Solution*

- Aliou Dramé (Université Iba Der Thiam de Thiès) - dramealiou13460@gmail.com
- Ndongo Mbath (Université Iba Der Thiam de Thiès) - ndongombathie70@gmail.com
- Ibrahima Kébé (Université Iba Der Thiam de Thiès) - ibrahimakebe635@gmail.com
- Atta Fall (Université Iba Der Thiam de Thiès) - fallatta13@gmail.com


## *Contact*

Pour toute question, contactez-nous à : dramealiou13460@gmail.com
