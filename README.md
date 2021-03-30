# Projet de Soutenance de fin de formation de développeuse web fullstack WF3
Il s'agit de la création d'un site vitrine à usage commercial à destination des particuliers et des entreprises.
Le but de ce site sera de remplacer le site actuel, d'activer un levier de croissance en permettant au client : 
- Une plus grande visibilité grâce au web, l'outil aujourd'hui utilisée  par plus de 4 milliards de personnes.
- Une fidélisation de la clientèle ayant besoin de s'informer d'avantage sur la boutique et pour contacter cette dernière plus facilement.
- S'aligner à la concurrence, voir la réorienter vers la boutique de notre client.
-  Moderniser son image.

Fonctionnalités :

- Formulaire de contact : 
Création d'un formulaire de contact pour le visiteur, lié à l'adresse mail de contact de la chocolaterie grâce au Bundle Swift Mailer.

- Gestion des produits en ligne : 
Ajout de produit sur une page ciblée selon la catégorie indiquée dans le formulaire d'ajout grâce aux relations BDD et aux méthodes getRepository() / findAll() etc.
Suppression et édition des produits avec la récupération de l'id du produit. remove() / flush() / persist() etc.
Listing de tous les produits.


- Section personnalisable :
Création d'une entité "sélection" et sa table afin de mettre en place une section personnalisable dans la page d'accueil afin de mettre en avant les produits du moment avec un titre et trois images au choix.

- Téléchargement d'image :
Inclusion de la fonctionnalité de téléchargement d'image dans les formulaires d'ajout de produit et d'édition de la sélection. Et le renommage automatique avec un nom unique pour éviter l'écrasement. 

- Création de compte et connexion :
Possibilité de création de compte pour un visiteur.
Création de compte et connexion obligatoire pour un administrateur voulant agir sur le site. make:user / make:auth / make:registration-form etc.

- Sécurisation et gestion des rôles :
Mise en place d'un système de sécurité pour toutes les pages ayant des fonctionnalités de modification du site, en réservant l'accès à ces pages (routes) seulement aux administrateurs du site.
Ceci est permis grâce à la gestion des rôles mis en place. (path: ^/admin, roles: ROLE_ADMIN)

Sécurisation des mots de passe lors de la création de compte grâce à la méthode de hash dans la base de donnée.





