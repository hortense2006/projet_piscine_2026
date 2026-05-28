-- ----------------------------------------------------------
-- Script MYSQL pour mcd 
-- ----------------------------------------------------------


-- ----------------------------
-- Table: Destination
-- ----------------------------
CREATE TABLE Destination (
  Id_destination INT NOT NULL AUTO_INCREMENT,
  Nom_ville VARCHAR(150) NOT NULL,
  Pays VARCHAR(150) NOT NULL,
  Description TEXT NOT NULL,
  CONSTRAINT Destination_PK PRIMARY KEY (Id_destination)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: Utilisateur
-- ----------------------------
CREATE TABLE Utilisateur (
  Id_utilisateur INT NOT NULL AUTO_INCREMENT,
  Nom VARCHAR(150) NOT NULL,
  Prenom VARCHAR(150) NOT NULL,
  Email VARCHAR(150) NOT NULL,
  Password VARCHAR(150) NOT NULL,
  Role VARCHAR(500) NOT NULL CHECK (Role IN ('Client', 'Administrateur', 'Gestionnaire')),
  CONSTRAINT Utilisateur_PK PRIMARY KEY (Id_utilisateur)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: Transport
-- ----------------------------
CREATE TABLE Transport (
  ID_transport INT NOT NULL AUTO_INCREMENT,
  Type_transport VARCHAR(150) NOT NULL CHECK (Type_transport IN ('Train', 'Avion', 'Car', 'Voiture', 'Bateau')),
  Lieu_depart VARCHAR(150) NOT NULL,
  Lieu_arrivee VARCHAR(150) NOT NULL,
  Date_depart DATETIME NOT NULL,
  Date_arrivee DATETIME NOT NULL,
  Prix DECIMAL(19,4) NOT NULL,
  Capacite INT NOT NULL,
  CONSTRAINT Transport_PK PRIMARY KEY (ID_transport)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: Activite
-- ----------------------------
CREATE TABLE Activite (
  ID_activite INT NOT NULL AUTO_INCREMENT,
  Nom_activite VARCHAR(150) NOT NULL,
  Description TEXT NOT NULL,
  Heure DATETIME NOT NULL,
  Capacite_max INT NOT NULL,
  Prix DECIMAL(19,4) NOT NULL,
  CONSTRAINT Activite_PK PRIMARY KEY (ID_activite)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: Hebergement
-- ----------------------------
CREATE TABLE Hebergement (
  ID_hebergement INT NOT NULL AUTO_INCREMENT,
  Nom VARCHAR(150) NOT NULL,
  Type VARCHAR(150) NOT NULL CHECK (Type IN ('Hôtel', 'Appartement', 'Villa', 'Camping')),
  Capacite_max INT NOT NULL,
  Prix_nuit DECIMAL(19,4) NOT NULL,
  CONSTRAINT Hebergement_PK PRIMARY KEY (ID_hebergement)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: Sejour
-- ----------------------------
CREATE TABLE Sejour (
  ID_sejour INT NOT NULL AUTO_INCREMENT,
  Date_creation TIMESTAMP NOT NULL,
  Statut VARCHAR(500) NOT NULL CHECK (Statut IN ('En attente', 'Confirmé', 'Annulé')),
  Prix_total DECIMAL(19,4) NOT NULL,
  Id_utilisateur INT NOT NULL,
  CONSTRAINT Sejour_PK PRIMARY KEY (ID_sejour),
  CONSTRAINT Sejour_Id_utilisateur_FK FOREIGN KEY (Id_utilisateur) REFERENCES Utilisateur (Id_utilisateur)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: Payer
-- ----------------------------
CREATE TABLE Payer (
  ID_paiement INT NOT NULL,
  Id_utilisateur INT NOT NULL,
  CONSTRAINT Payer_PK PRIMARY KEY (ID_paiement, Id_utilisateur),
  CONSTRAINT Payer_Id_utilisateur_FK FOREIGN KEY (Id_utilisateur) REFERENCES Utilisateur (Id_utilisateur)
)ENGINE=InnoDB;


-- ----------------------------

/******************************************************************************************************
*                                                                                                     *
*      -->    Désolé, il faut activer cette version pour voir la suite du script !                    *
*                                                                                                     *
*******************************************************************************************************/