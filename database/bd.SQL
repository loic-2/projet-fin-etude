DROP DATABASE IF EXISTS archivage_supptic;

CREATE DATABASE IF NOT EXISTS archivage_supptic;
USE archivage_supptic;
# -----------------------------------------------------------------------------
#       TABLE : MEMBRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MEMBRE
 (
   ID_MEMBRE INTEGER NOT NULL AUTO_INCREMENT,
   NOM_MEMBRE VARCHAR(255) NULL  ,
   FILIERE_MEMBRE VARCHAR(255) NULL  ,
   TELEPHONE_MEMBRE VARCHAR(255) NULL  
   , PRIMARY KEY (ID_MEMBRE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : UTILISATEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS UTILISATEUR
 (
   ID_UTILISATEUR INTEGER NOT NULL AUTO_INCREMENT,
   NOM_UTILISATEUR VARCHAR(255) NULL  ,
   LOGIN_UTILISATEUR VARCHAR(255) NULL  ,
   EMAIL_UTILISATEUR VARCHAR(255) NULL  ,
   MOT_DE_PASSE_UTILISATEUR VARCHAR(255) NULL  ,
   MATRICULE_UTILISATEUR VARCHAR(255) NULL  ,
   DATE_CREATION_UTILISATEUR DATETIME NULL  
   , PRIMARY KEY (ID_UTILISATEUR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ADMINISTRATEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ADMINISTRATEUR
 (
   ID_ADMINISTRATEUR INTEGER NOT NULL AUTO_INCREMENT ,
   NOM_ADMINISTRATEUR VARCHAR(255) NULL  ,
   EMAIL_ADMINISTRATEUR VARCHAR(255) NULL  ,
   LOGIN_ADMINISTRATEUR VARCHAR(255) NULL  ,
   MOT_DE_PASSE_ADMINISTRATEUR VARCHAR(255) NULL  ,
   TELEPHONE_ADMINISTRATEUR VARCHAR(255) NULL  ,
   CONNECTE BOOL NULL  ,
   DATE_CREATION_ADMINISTRATEUR DATETIME NULL  
   , PRIMARY KEY (ID_ADMINISTRATEUR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ENCADREUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ENCADREUR
 (
   ID_ENCADREUR INTEGER NOT NULL AUTO_INCREMENT ,
   NOM_ENCADREUR VARCHAR(255) NULL  ,
   PROFESSION_ENCADREUR VARCHAR(255) NULL  ,
   TELEPHONE_ENCADREUR VARCHAR(32) NULL  
   , PRIMARY KEY (ID_ENCADREUR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : HISTORIQUE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS HISTORIQUE
 (
   ID_HISTORIQUE INTEGER NOT NULL AUTO_INCREMENT ,
   ID_ADMINISTRATEUR INTEGER NOT NULL  ,
   ACTION_HISTORIQUE VARCHAR(255) NULL  ,
   DATE_HISTORIQUE DATETIME NULL  
   , PRIMARY KEY (ID_HISTORIQUE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE HISTORIQUE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_HISTORIQUE_ADMINISTRATEUR
     ON HISTORIQUE (ID_ADMINISTRATEUR ASC);

# -----------------------------------------------------------------------------
#       TABLE : PROJET
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PROJET
 (
   ID_PROJET INTEGER NOT NULL AUTO_INCREMENT ,
   TYPE_PROJET VARCHAR(255) NULL  ,
   PROMOTION_PROJET VARCHAR(32) NULL  ,
   LIEN_FICHIER_PROJET VARCHAR(255) NULL  ,
   NOM_PROJET VARCHAR(255) NULL  ,
   VUE_PROJET INTEGER NULL  ,
   TELECHARGEMENT_PROJET INTEGER NULL  ,
   GROUPE_PROJET INTEGER NULL  
   , PRIMARY KEY (ID_PROJET) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : VISITE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VISITE
 (
   ID_VISITE INTEGER NOT NULL AUTO_INCREMENT ,
   DATE_VISITE DATETIME NULL  
   , PRIMARY KEY (ID_VISITE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : CATEGORIE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CATEGORIE
 (
   ID_CATEGORIE INTEGER NOT NULL AUTO_INCREMENT ,
   NOM_CATEGORIE VARCHAR(255) NULL  
   , PRIMARY KEY (ID_CATEGORIE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : CATEGORIE_PROJET
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CATEGORIE_PROJET
 (
   ID_CATEGORIE INTEGER NOT NULL  ,
   ID_PROJET INTEGER NOT NULL  
   , PRIMARY KEY (ID_CATEGORIE,ID_PROJET) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CATEGORIE_PROJET
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CATEGORIE_PROJET_CATEGORIE
     ON CATEGORIE_PROJET (ID_CATEGORIE ASC);

CREATE  INDEX I_FK_CATEGORIE_PROJET_PROJET
     ON CATEGORIE_PROJET (ID_PROJET ASC);

# -----------------------------------------------------------------------------
#       TABLE : ENCADREMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ENCADREMENT
 (
   ID_ENCADREUR INTEGER NOT NULL  ,
   ID_PROJET INTEGER NOT NULL  ,
   ID_MEMBRE INTEGER NOT NULL  ,
   ANNEE_ENCADREMENT VARCHAR(255) NULL  ,
   TYPE_ENCADREMENT VARCHAR(255) NULL  
   , PRIMARY KEY (ID_ENCADREUR,ID_PROJET,ID_MEMBRE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ENCADREMENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ENCADREMENT_ENCADREUR
     ON ENCADREMENT (ID_ENCADREUR ASC);

CREATE  INDEX I_FK_ENCADREMENT_PROJET
     ON ENCADREMENT (ID_PROJET ASC);

CREATE  INDEX I_FK_ENCADREMENT_MEMBRE
     ON ENCADREMENT (ID_MEMBRE ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE HISTORIQUE 
  ADD FOREIGN KEY FK_HISTORIQUE_ADMINISTRATEUR (ID_ADMINISTRATEUR)
      REFERENCES ADMINISTRATEUR (ID_ADMINISTRATEUR) ;


ALTER TABLE CATEGORIE_PROJET 
  ADD FOREIGN KEY FK_CATEGORIE_PROJET_CATEGORIE (ID_CATEGORIE)
      REFERENCES CATEGORIE (ID_CATEGORIE) ;


ALTER TABLE CATEGORIE_PROJET 
  ADD FOREIGN KEY FK_CATEGORIE_PROJET_PROJET (ID_PROJET)
      REFERENCES PROJET (ID_PROJET) ;


ALTER TABLE ENCADREMENT 
  ADD FOREIGN KEY FK_ENCADREMENT_ENCADREUR (ID_ENCADREUR)
      REFERENCES ENCADREUR (ID_ENCADREUR) ;


ALTER TABLE ENCADREMENT 
  ADD FOREIGN KEY FK_ENCADREMENT_PROJET (ID_PROJET)
      REFERENCES PROJET (ID_PROJET) ;


ALTER TABLE ENCADREMENT 
  ADD FOREIGN KEY FK_ENCADREMENT_MEMBRE (ID_MEMBRE)
      REFERENCES MEMBRE (ID_MEMBRE) ;

