CREATE DATABASE IF NOT EXISTS projet_reservation;
USE projet_reservation;

CREATE TABLE Personne (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE Salle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    capacite INT NOT NULL
);

CREATE TABLE Materiel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT
);

CREATE TABLE ReserverSalle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    personne_id INT,
    salle_id INT,
    date_reservation DATE,
    FOREIGN KEY (personne_id) REFERENCES Personne(id),
    FOREIGN KEY (salle_id) REFERENCES Salle(id)
);


CREATE TABLE ReserverMateriel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    personne_id INT,
    materiel_id INT,
    date_reservation DATE,
    FOREIGN KEY (personne_id) REFERENCES Personne(id),
    FOREIGN KEY (materiel_id) REFERENCES Materiel(id)
);

CREATE TABLE Rapport (
    id INT AUTO_INCREMENT PRIMARY KEY,
    personne_id INT,
    type_rapport VARCHAR(100) NOT NULL,
    description TEXT,
    date_rapport DATE,
    FOREIGN KEY (personne_id) REFERENCES Personne(id)
);

CREATE TABLE plannings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    personne_id INT,
    salle_id INT,
    materiel_id INT,
    date_reservation DATE,
    FOREIGN KEY (personne_id) REFERENCES Personne(id),
    FOREIGN KEY (salle_id) REFERENCES Salle(id),
    FOREIGN KEY (materiel_id) REFERENCES Materiel(id)
);

CREATE TABLE users (  
    user_id INT PRIMARY KEY,  
    username VARCHAR(50) UNIQUE NOT NULL,  
    password VARCHAR(255) NOT NULL,  
    email VARCHAR(255) UNIQUE NOT NULL,  
    first_name VARCHAR(50),  
    last_name VARCHAR(50),  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
); 

INSERT INTO users (user_id, username, password, email, first_name, last_name)  
VALUES (1, 'Insa.mbaye', 'mbaye2005', 'insam621.com@gmail.com', 'Insa', 'Mbaye');  




INSERT INTO Personne (nom, prenom, email)
VALUES ('Ousmane', 'Sene', 'ousmane.com@gmail.com');


INSERT INTO Materiel (nom, description)
VALUES ('Table', 'Table de réunion');
INSERT INTO Materiel (nom, description)
VALUES ('Chaise', 'Chaise de bureau');

INSERT INTO Salle (nom, capacite)
VALUES ('Salle de réunion 1', 50);
INSERT INTO Salle (nom, capacite)
VALUES ('Salle de réunion 2', 75);




INSERT INTO plannings (personne_id, salle_id, materiel_id, date_reservation)
VALUES (1, 1, 1, '2022-01-01');

INSERT INTO plannings (personne_id, salle_id, materiel_id, date_reservation)
VALUES (1, 2, 2, '2022-01-01');


INSERT INTO ReserverSalle (personne_id, salle_id, date_reservation)
VALUES (1, 1, '2022-01-01');

INSERT INTO ReserverSalle (personne_id, salle_id, date_reservation)
VALUES (1, 1, '2022-01-01');

INSERT INTO ReserverMateriel (personne_id, materiel_id, date_reservation)
VALUES (2, 1, '2022-01-01');

INSERT INTO Rapport (personne_id, type_rapport, description, date_rapport)
VALUES (1, 'Rapport de réunion', 'Rapport de réunion du 1er janvier 2022', '2022-01-01');


INSERT INTO Personne (nom, prenom, email)
VALUES ('Mbaye', 'Insa', 'Insam621.com@gmail.com');

SHOW TABLES;
SELECT * FROM Personne;
SELECT * FROM Salle;
SELECT * FROM Materiel;
SELECT * FROM ReserverSalle;
SELECT * FROM ReserverMateriel;
SELECT * FROM Rapport;
SELECT * FROM plannings;

SELECT * FROM Personne WHERE id = '3';
SELECT * FROM Personne WHERE prenom = 'Insa';
SELECT * FROM Personne WHERE email = 'Insam621.com@gmail.com';

SELECT * FROM Salle WHERE nom = 'Salle de réunion 1';
SELECT * FROM Salle WHERE capacite = 50;

SELECT * FROM Materiel WHERE nom = 'Table';
SELECT * FROM Materiel WHERE description = 'Table de réunion';

SELECT * FROM users WHERE email = '$email' AND password = '$password';


