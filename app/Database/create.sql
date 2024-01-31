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

DROP TABLE IF EXISTS eligible cascade;
DROP TABLE IF EXISTS rattrapage cascade;
DROP TABLE IF EXISTS administrateur cascade;
DROP TABLE IF EXISTS ds cascade;
DROP TABLE IF EXISTS etudiant cascade;


-- création des tables

CREATE TABLE Administrateur (
    id SERIAL PRIMARY KEY,
    name_directeur VARCHAR(150),
    email VARCHAR(150),
    password_directeur VARCHAR(150),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    reset_token VARCHAR(255),
    reset_token_expiration TIMESTAMP
);


CREATE TABLE DS (
    idDS SERIAL PRIMARY KEY,
    anneeDS INTEGER NOT NULL,
    semestreDS VARCHAR(8) NOT NULL CHECK (semestreDS IN ('PAIR', 'IMPAIR')),
    dateDS DATE NOT NULL,
    heureDS TIME NOT NULL,
    dureeDS INTEGER NOT NULL,
    ressourceDS VARCHAR(50) NOT NULL,
    typeDS VARCHAR(8) NOT NULL CHECK (typeDS IN ('ORAL', 'PAPIER', 'MACHINE'))
);


CREATE TABLE Rattrapage (
    idRattrapage SERIAL PRIMARY KEY,
    idDS INTEGER NOT NULL,
    dateRattrapage DATE NOT NULL,
    horaireRattrapage TIME NOT NULL,
    salleRattrapage VARCHAR(3) NOT NULL,
    etatRattrapage VARCHAR(15) NOT NULL CHECK (etatRattrapage IN ('EN COURS', 'PROGRAMME', 'NEUTRALISE')),
    FOREIGN KEY (idDS) REFERENCES DS(idDS)
);


CREATE TABLE etudiant (
    id_etudiant SERIAL PRIMARY KEY,
    nom_etudiant VARCHAR(50) NOT NULL,
    prenom_etudiant VARCHAR(50) NOT NULL
);
-- TODO: ajouter une colonne pour le mail d'étudiant

CREATE TABLE Eligible (
    idDS INTEGER NOT NULL,
    idEtudiant INTEGER NOT NULL,
    justification BOOLEAN NOT NULL,
    FOREIGN KEY (idDS) REFERENCES DS(idDS),
    FOREIGN KEY (idEtudiant) REFERENCES Etudiant(idEtudiant),
    PRIMARY KEY (idDS, idEtudiant)
);

INSERT INTO Etudiant (nomEtudiant, prenomEtudiant) VALUES ('Rascoin', 'Gomain');