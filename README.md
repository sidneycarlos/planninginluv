# BWB-CS-planning-in-luv

## Description du projet

Projet de découverte de PHP au travers d'un back office type Trello permettant de visualiser:
- les projets en cours
- les équipes affectées au projets
- les utilisateurs affectés aux équipes
- les tickets (status, projets liés aux tickets...) 


## Part 1 - Server Rendering

### Generation du templating + pages
Dans un premier temps nous abordons le projet sous l'angle de templating de pages qui permettra de simplement faire évoluer le template. Pour ce faire, les parties communes des pages (header, navigation et footer) seront divisées de sorte de les rendre autonomes et de les inclure dans un fichier principal index.php

## Couche d'accès aux données
Afin de persister nos données nous accèderons à une base de données relationnelles. Nous allons donc isolé dans la fonction d'accès à l'objet PDO la connexion à la base de données. L'ensemble de nos requêtes SQL seront réalisées dans ce même fichier.

#### Couche métier
La couche métier seront créées dans un dossier "pages" qui acueillera l'ensemble des pages de navigation. Elles sont destinées à afficher la vue c'est-à-dire l'interface utilisateur qui affichera les données de la BDD

### Sécurisation 
Afin de sécuriser le projet nous allons gérer dans un premier temps les sessions et les cookies.
Puis rajouter un middleware de login permettant de gérer les droits d'accès à l'interface utilisateur.




## Part 2 - Framework MVC
Enfin nous développerons un framework MVC que l'on retrouvera ci-après:
[Mon projet MVC](https://github.com/sidneycarlos/php-mvc)
