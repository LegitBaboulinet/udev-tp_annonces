-- Création de la base de données
CREATE DATABASE tp_annonces_lucas_macori;
USE tp_annonces_lucas_macori;

-- Création des tables
CREATE TABLE Utilisateur (
	id INT PRIMARY KEY AUTO_INCREMENT,
	login VARCHAR(255) NOT NULL,
	password VARCHAR(40),
	email VARCHAR(255) NOT NULL
);

CREATE TABLE Annonce (
	id INT PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(255) NOT NULL,
	content TEXT NOT NULL,
	date DATETIME NOT NULL DEFAULT NOW()
);

-- Insertion de l'utilisateur anonyme
INSERT INTO Utilisateur (login, password, email)
VALUES ('anonymous', NULL, 'anonymous@anonymous.test');