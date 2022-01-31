CREATE DATABASE IF NOT EXISTS bienvenue;

CREATE TABLE IF NOT EXISTS bienvenue.client
(
    id_client int UNSIGNED NOT NULL AUTO_INCREMENT,
    nom_client VARCHAR(50) NOT NULL,
    pseudo_client VARCHAR(50) NOT NULL,
    password_client VARCHAR(50) NOT NULL,
    CONSTRAINT PK_client PRIMARY KEY (id_client)
) ENGINE = InnoDB CHARACTER SET utf8;




