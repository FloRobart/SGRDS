-------------------------------------------------------
-- Projet SGRDS
-------------------------------------------------------
-- script init.sql
-- connexion a postgresql:    	psql 
-- execution du script:			=>\i app/Database/init.sql
-- verif:						=>\dt
-------------------------------------------------------

-- suppression du contenu des tables si elles existent déjà
DELETE FROM eligible;
DELETE FROM rattrapage;
DELETE FROM administrateur;
DELETE FROM ds;
DELETE FROM etudiant;

-- insertion des tuples dans la table etudiant
INSERT INTO etudiant (mail_etudiant, nom_etudiant, prenom_etudiant) VALUES ('gomain.rascoin@vmail.bom','Rascoin', 'Gomain');
INSERT INTO etudiant (mail_etudiant, nom_etudiant, prenom_etudiant) VALUES ('boris.flobart@coldmail.fr','Flobart', 'Boris');
INSERT INTO etudiant (mail_etudiant, nom_etudiant, prenom_etudiant) VALUES ('plorian.ficele@mozarella.fom','Ficele', 'Plorian');
INSERT INTO etudiant (mail_etudiant, nom_etudiant, prenom_etudiant) VALUES ('alexandre.michel@estunmmorpgautourpartour.com','Michel', 'Alexandre');
INSERT INTO etudiant (mail_etudiant, nom_etudiant, prenom_etudiant) VALUES ('bzzzzteban.laruche@gmiel.fr','Laruche', 'Bzzzzteban');


-- insertion des tuples dans la table ds
INSERT INTO ds (semestre_ds, intitule_ds, date_ds, heure_ds, duree_ds, ressource_ds, type_ds) VALUES (1, 'DS Manipulation d images',   '2020-01-11', '09:30:00', 120, 'Programmation Multimédia', 'MACHINE');
INSERT INTO ds (semestre_ds, intitule_ds, date_ds, heure_ds, duree_ds, ressource_ds, type_ds) VALUES (3, 'Les biais cognitifs',        '2019-11-11', '10:00:00', 90, 'Communication', 'PAPIER');
INSERT INTO ds (semestre_ds, intitule_ds, date_ds, heure_ds, duree_ds, ressource_ds, type_ds) VALUES (2, 'DS jeux de couleurs',        '2020-02-24', '14:00:00', 75, 'Programmation Multimédia', 'PAPIER');
INSERT INTO ds (semestre_ds, intitule_ds, date_ds, heure_ds, duree_ds, ressource_ds, type_ds) VALUES (4, 'La mise en page',            '2021-03-02', '09:30:00', 120, 'Communication', 'MACHINE');
INSERT INTO ds (semestre_ds, intitule_ds, date_ds, heure_ds, duree_ds, ressource_ds, type_ds) VALUES (5, 'automatisation PlpgSQL',     '2021-10-02', '08:30:00', 60, 'Base de données', 'MACHINE');
INSERT INTO ds (semestre_ds, intitule_ds, date_ds, heure_ds, duree_ds, ressource_ds, type_ds) VALUES (1, 'Droit du numérique',         '2022-11-27', '08:15:00', 90, 'Droit', 'MACHINE');
INSERT INTO ds (semestre_ds, intitule_ds, date_ds, heure_ds, duree_ds, ressource_ds, type_ds) VALUES (5, 'Droit des contrats',         '2022-11-27', '10:00:00', 90, 'Droit', 'PAPIER');
INSERT INTO ds (semestre_ds, intitule_ds, date_ds, heure_ds, duree_ds, ressource_ds, type_ds) VALUES (1, 'Les bases de MongoDB',       '2021-09-30', '09:00:00', 90, 'Base de données', 'PAPIER');
INSERT INTO ds (semestre_ds, intitule_ds, date_ds, heure_ds, duree_ds, ressource_ds, type_ds) VALUES (6, 'DS Interfaces interactives', '2021-04-16', '14:30:00', 120, 'Développement IHM', 'MACHINE');


-- insertion des tuples dans la table rattrapage
INSERT INTO rattrapage (id_ds, date_rattrapage, horaire_rattrapage, salle_rattrapage, etat_rattrapage, enseignant_rattrapage) VALUES (1, '2020-01-15', '09:30:00', '724', 'PROGRAMME', 'Philippe LE PIVERT');
INSERT INTO rattrapage (id_ds, date_rattrapage, horaire_rattrapage, salle_rattrapage, etat_rattrapage, enseignant_rattrapage) VALUES (2, '2019-11-15', '10:00:00', '619', 'PROGRAMME', 'Laurence NIVET');
INSERT INTO rattrapage (id_ds, date_rattrapage, horaire_rattrapage, salle_rattrapage, etat_rattrapage, enseignant_rattrapage) VALUES (3, '2020-02-28', '14:00:00', '619', 'NEUTRALISE', 'Philippe LE PIVERT');
INSERT INTO rattrapage (id_ds, date_rattrapage, horaire_rattrapage, salle_rattrapage, etat_rattrapage, enseignant_rattrapage) VALUES (4, '2021-03-05', '09:30:00', '720', 'EN COURS', 'Laurence NIVET');
INSERT INTO rattrapage (id_ds, date_rattrapage, horaire_rattrapage, salle_rattrapage, etat_rattrapage, enseignant_rattrapage) VALUES (5, '2021-10-05', '08:30:00', '712', 'PROGRAMME', 'Bruno SADEG');
INSERT INTO rattrapage (id_ds, date_rattrapage, horaire_rattrapage, salle_rattrapage, etat_rattrapage, enseignant_rattrapage) VALUES (6, '2022-11-30', '08:15:00', '715', 'PROGRAMME', 'Quentin LAFFEACH');
INSERT INTO rattrapage (id_ds, date_rattrapage, horaire_rattrapage, salle_rattrapage, etat_rattrapage, enseignant_rattrapage) VALUES (7, '2022-11-30', '10:00:00', '621', 'NEUTRALISE', 'Quentin LAFFEACH');
INSERT INTO rattrapage (id_ds, date_rattrapage, horaire_rattrapage, salle_rattrapage, etat_rattrapage, enseignant_rattrapage) VALUES (8, '2021-10-04', '09:00:00', '621', 'EN COURS', 'Bruno SADEG');
INSERT INTO rattrapage (id_ds, date_rattrapage, horaire_rattrapage, salle_rattrapage, etat_rattrapage, enseignant_rattrapage) VALUES (9, '2021-04-19', '14:30:00', '724', 'PROGRAMME', 'Philippe LE PIVERT');


-- insertion des tuples dans la table eligible
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (1, 1, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (2, 1, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (3, 1, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (4, 1, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (5, 1, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (1, 2, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (2, 2, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (3, 2, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (4, 2, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (5, 2, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (1, 3, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (2, 3, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (3, 3, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (4, 3, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (5, 3, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (1, 4, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (2, 4, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (3, 4, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (4, 4, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (5, 4, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (1, 5, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (2, 5, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (3, 5, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (4, 5, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (5, 5, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (1, 6, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (2, 6, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (3, 6, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (4, 6, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (5, 6, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (1, 7, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (2, 7, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (3, 7, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (4, 7, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (5, 7, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (1, 8, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (2, 8, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (3, 8, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (4, 8, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (5, 8, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (1, 9, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (2, 9, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (3, 9, false);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (4, 9, true);
INSERT INTO eligible (id_etudiant, id_rattrapage, justification) VALUES (5, 9, true);