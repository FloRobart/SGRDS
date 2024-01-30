-- Création des utilisateurs
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(150),
    email VARCHAR(150),
    password VARCHAR(150),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

/*
-------------------------------------------------------
-- Projet SGRDS
-------------------------------------------------------
-- script creer.sql
-- connexion a postgresql:    	psql 
-- execution du script:			=>\i creer.sql
-- verif:						=>\dt
-------------------------------------------------------

-- suppression des tables si elles existent déjà
-- NB : cela supprime donc les éventuels tuples contenus

DROP TABLE IF EXISTS Enseignant cascade;
DROP TABLE IF EXISTS Administrateur cascade;
DROP TABLE IF EXISTS DS cascade;
DROP TABLE IF EXISTS Etudiant cascade;
DROP TABLE IF EXISTS Rattrapage cascade;
DROP TABLE IF EXISTS Elligible cascade;

-- création des tables

CREATE TABLE Enseignant (
    idEnseignant SERIAL PRIMARY KEY,
    nomEnseignant VARCHAR(50) NOT NULL,
    prenomEnseignant VARCHAR(50) NOT NULL,
    mailEnseignant VARCHAR(50) NOT NULL,
    mdpEnseignant VARCHAR(50) NOT NULL
);


CREATE TABLE Administrateur (
    idAdministrateur SERIAL PRIMARY KEY,
    idEnseignant INTEGER NOT NULL,
    FOREIGN KEY (idEnseignant) REFERENCES Enseignant(idEnseignant)
)


CREATE TABLE DS (
    idDS SERIAL PRIMARY KEY,
    anneeDS INTEGER NOT NULL,
    semestreDS VARCHAR(8) NOT NULL CHECK (semestreDS IN ('PAIR', 'IMPAIR')),
    dateDS DATE NOT NULL,
    heureDS TIME NOT NULL,
    dureeDS INTEGER NOT NULL,
    ressourceDS VARCHAR(50) NOT NULL,
    typeDS VARCHAR(8) NOT NULL CHECK (typeDS IN ('ORAL', 'PAPIER', 'MACHINE')),
    idEnseignant INTEGER NOT NULL,
    FOREIGN KEY (idEnseignant) REFERENCES Enseignant(idEnseignant)
);


CREATE TABLE Rattrapage (
    idRattrapage SERIAL PRIMARY KEY,
    idDS INTEGER NOT NULL,
    dateRattrapage DATE NOT NULL,
    horaireRattrapage TIME NOT NULL,
    salleRattrapage VARCHAR(3) NOT NULL,
    etatRattrapage VARCHAR(15) NOT NULL CHECK (etatRattrapage IN ('EN COURS', 'PROGRAMME', 'NEUTRALISE')),
    FOREIGN KEY (idDS) REFERENCES DS(idDS),
);


CREATE TABLE Etudiant (
    idEtudiant SERIAL PRIMARY KEY,
    nomEtudiant VARCHAR(50) NOT NULL,
    prenomEtudiant VARCHAR(50) NOT NULL,
);


CREATE TABLE Eligible (
    idDS INTEGER NOT NULL,
    idEtudiant INTEGER NOT NULL,
    justification BOOLEAN NOT NULL,
    FOREIGN KEY (idDS) REFERENCES DS(idDS),
    FOREIGN KEY (idEtudiant) REFERENCES Etudiant(idEtudiant),
    PRIMARY KEY (idDS, idEtudiant)
);
*/