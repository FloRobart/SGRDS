-- C'est la table qui contient les directeurs d'études et qui est utilisé dans mon code.
-- Si elle change, il faudra probablement changer le code.
CREATE TABLE directeur_etude (
    id SERIAL PRIMARY KEY,
    name_directeur VARCHAR(150),
    email VARCHAR(150),
    password_directeur VARCHAR(150),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    reset_token VARCHAR(255),
    reset_token_expiration TIMESTAMP
);