-- C'est la table qui contient les directeurs d'études et qui est utilisé dans mon code.
-- Si elle change, il faudra probablement changer le code.
CREATE TABLE directeur_etude (
    id SERIAL PRIMARY KEY,
    name VARCHAR(150),
    email VARCHAR(150),
    password VARCHAR(150),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);