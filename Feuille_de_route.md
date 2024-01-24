# Feuille de route du projet

## Table des matières

- [Feuille de route du projet](#feuille-de-route-du-projet)
  - [Table des matières](#table-des-matières)
  - [Chose à faire](#chose-à-faire)
  - [Rendu de différents livrables](#rendu-de-différents-livrables)
  - [Code source de l’application](#code-source-de-lapplication)
    - [Fonctionnalité](#fonctionnalité)
  - [Rapport de projet](#rapport-de-projet)
  - [Manuelle d’installation et d’utilisation](#manuelle-dinstallation-et-dutilisation)
  - [Démonstration (Diaporama)](#démonstration-diaporama)

<div class="page"></div>

## Chose à faire

- Code source de l’application.
- Rapport de projet
- Manuelle d’installation et d’utilisation.
- Démonstration (Diaporama)

## Rendu de différents livrables

- Vendredi 2 février
  - Code source de l’application.
  - Rapport de projet
  - Manuelle d’installation et d’utilisation.
  - Démonstration (Diaporama)

## Code source de l’application

### Fonctionnalité

- Pour le directeur des études uniquement
  - Se connecte à l’application
  - Saisir les rattrapages
    - Choisir le semestre et la ressource concernée par le rattrapage
      - Il doit d'abord choisir l'année, se qui affichera uniquement les semestres de l'année sur laquelle il a cliqué
    - Saisir les informations du DS à rattraper
      - la date du DS raté
      - Le type (papier, machine, oral) du DS raté
      - La durée du DS raté
      - l’enseignant concerné par le DS raté
    - Sélectionner les étudiants absents et les étudiants absents justifiés
    - Valider la saisie
      - Envoyer un mail automatique à l’enseignant concerné avec la liste des absents justifiés. (et les informations du DS à rattraper ?)
  - Afficher la liste des rattrapages, par semestre, et leur état (en cours, programmé, neutralisé, …).
  - Afficher la liste des rattrapages par étudiant.
  - Gestion de Mot de passe oublié
- Pour les enseignants concernés par les rattrapages
  - Ajout d'un rattrapage
  - Modification d'un rattrapage
  - Suppression d'un rattrapage
  - Consulte la liste des rattrapages
    - Tout les rattrapages
    - Trié par semestre
    - Trié par ressource
  - Saisir les informations du rattrapage
    - la date de rattrapage
    - L'horaire
    - Le type
    - La salle
    - Si l’enseignant ne prévoit pas de faire un rattrapage alors il doit le mentionné ou le non-rattrapage (prévoir un zone commentaire : non-rattrapage).
  - Valider la saisie (Pour un ajout, une modification ou une suppression)
    - Enregistrer les informations dans la base de données
    - Envoyer un mail automatique à l’étudiant concerné avec les informations (date, horaire, type et salle).

## Rapport de projet

- Le rapport doit contenir
  - Une page de garde
  - Une table des matières
  - Une introduction
  - Choix de conception
  - Fonctionnalités
  - Maquette
  - Structure de l’application
  - Structure du code (MVC)
  - Répartition des tâches
  - Pourcentage de participation de chaque membre de l’équipe.
  - Une  check  liste  avec  les  fonctionnalités  implémentées,  à  améliorer  et  non implémentées.
  - Une conclusion

## Manuelle d’installation et d’utilisation

- Installation de l’application
  - Prérequis
    - Avoir accès au réseau de l’IUT
    - PHP 8.0
  - Installation
    - Télécharger le code source de l’application dans les realeases du projet
    - Configurer la base de données si nécessaire
- Utilisation de l'application
  - Pour le directeur des études
    - Se connecte à l’application
      - S'il a oublié son mot de passe, il peut le réinitialiser en cliquant sur "mot de passe oublié"
    - Saisir les rattrapages
      - Choisir le semestre et la ressource concernée par le rattrapage
        - Il doit d'abord choisir l'année, se qui affichera uniquement les semestres de l'année sur laquelle il a cliqué
      - Saisir les informations du DS à rattraper
        - la date du DS raté
        - Le type (papier, machine, oral) du DS raté
        - La durée du DS raté
        - l’enseignant concerné par le DS raté
      - Sélectionner les étudiants absents et les étudiants absents justifiés
      - Valider la saisie
  - Pour les enseignants concernés par les rattrapages
    - Ajout d'un rattrapage
      - Saisir les informations du rattrapage
        - la date de rattrapage
        - L'horaire
        - Le type
        - La salle
        - Si l’enseignant ne prévoit pas de faire un rattrapage alors il doit le mentionné ou le non-rattrapage (prévoir un zone commentaire : non-rattrapage).
        - Valider la saisie

## Démonstration (Diaporama)
