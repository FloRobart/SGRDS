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

CREATE TABLE administrateur (
    id SERIAL PRIMARY KEY,
    nom_admin VARCHAR(150),
    email VARCHAR(150),
    mdp_admin VARCHAR(150),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    reset_token VARCHAR(255),
    reset_token_expiration TIMESTAMP
);


CREATE TABLE ds (
    id_ds SERIAL PRIMARY KEY,
    annee_ds INTEGER NOT NULL,
    semestre_ds VARCHAR(8) NOT NULL CHECK (semestre_ds IN ('PAIR', 'IMPAIR')),
    date_ds DATE NOT NULL,
    heure_ds TIME NOT NULL,
    duree_ds INTEGER NOT NULL,
    ressource_ds VARCHAR(50) NOT NULL,
    type_ds VARCHAR(8) NOT NULL CHECK (type_ds IN ('ORAL', 'PAPIER', 'MACHINE'))
);


CREATE TABLE rattrapage (
    id_rattrapage SERIAL PRIMARY KEY,
    id_ds INTEGER NOT NULL,
    date_rattrapage DATE NOT NULL,
    horaire_rattrapage TIME NOT NULL,
    salle_rattrapage VARCHAR(3) NOT NULL,
    etat_rattrapage VARCHAR(15) NOT NULL CHECK (etat_rattrapage IN ('EN COURS', 'PROGRAMME', 'NEUTRALISE')),
    FOREIGN KEY (id_ds) REFERENCES ds(id_ds)
);


CREATE TABLE etudiant (
    id_etudiant SERIAL PRIMARY KEY,
    mail_etudiant VARCHAR(50) NOT NULL,
    nom_etudiant VARCHAR(50) NOT NULL,
    prenom_etudiant VARCHAR(50) NOT NULL
);

CREATE TABLE eligible (
    id_rattrapage INTEGER NOT NULL,
    id_etudiant INTEGER NOT NULL,
    justification BOOLEAN NOT NULL,
    FOREIGN KEY (id_rattrapage) REFERENCES rattrapage(id_rattrapage),
    FOREIGN KEY (id_etudiant) REFERENCES etudiant(id_etudiant),
    PRIMARY KEY (id_rattrapage, id_etudiant)
);

INSERT INTO etudiant (mail_etudiant, nom_etudiant, prenom_etudiant) VALUES ('gomain.rascoin@vmail.bom','Rascoin', 'Gomain');