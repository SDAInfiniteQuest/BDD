
create table UTILISATEUR 
(
	idUtilisateur number(6) PRIMARY KEY;
	date_de_naissance date;
	nom varchar2(30);
	prenom varchar2(15);
	adresse varchar2(80);
	mail varchar2(80) NOT NULL;
	hash varchar2(80) NOT NULL;
	--check sur le mail de forme [a-z,A-Z,0-9]*@[a-z,A-Z,0-9]*.[a-z,A-Z,0-9]*
	--trigger a la creation d'un utilisateur
);

create table OBJETCULTUREL
(
	idObjet number(6) PRIMARY KEY;
	date_sortie date NOT NULL;
	genre varchar2(30);
);

create table FILM
(
	idObjet number(6);
	titreFilm varchar2(50) NOT NULL;
	PRIMARY KEY idObjet,
	FOREIGN KEY (idObjet) REFERENCE OBJETCULTUREL
);

create table LIVRE 
(
	idObjet number(6);
	style varchar2(30);
	collection varchar2(30);
	titreLivre varchar2(30) NOT NULL;
	PRIMARY KEY idObjet,
	FOREIGN KEY (idObjet) REFERENCE OBJETCULTUREL
);

create table ALBUM
(
	idObjet number(6);
	titreAlbum varchar2(30) NOT NULL;
	PRIMARY KEY idObjet,
	FOREIGN KEY (idObjet) REFERENCE OBJETCULTUREL
);

create table PERSONNE 
(
	idPersonne number(6) PRIMARY KEY;
	nomPersonne varchar2(30) NOT NULL;
);

create table COMMENTAIRE
(
	idComment number(6) PRIMARY KEY;
	commentaire varchar2(255) NOT NULL;
);

create table LISTEOBJET
(
	idListe number(6) PRIMARY KEY;
	typeListe  varchar2(50);
	nomListe varchar2(30) NOT NULL;
);

create table COMMENTE
(
	idUtilisateur number(6) ;
	idComment number(6) ;
	PRIMARY KEY (idUtilisateur,idComment),
	FOREIGN KEY (idUtilisateur) REFERENCE UTILISATEUR,
	FOREIGN KEY (idComment) REFERENCE COMMENTAIRE
);

create table ESTCOMMENTE
(
	idObjet number(6) ;
	idComment number(6) ;
	PRIMARY KEY (idObjet,idComment),
	FOREIGN KEY (idObjet) REFERENCE OBJETCULTUREL,
	FOREIGN KEY (idComment) REFERENCE COMMENTAIRE
);

create table CREELISTE
(
	idListe number(6) ;
	idUtilisateur number(6) ;
	PRIMARY KEY (idListe,idUtilisateur),
	FOREIGN KEY (idUtilisateur) REFERENCE UTILISATEUR,
	FOREIGN KEY (idListe) REFERENCE LISTEOBJET 
);

create table APPARTIENTLISTE
(
	idListe number(6) ;
	idObjet number(6) ;
	PRIMARY KEY (idListe,idObjet),
	FOREIGN KEY (idObjet) REFERENCE OBJETCULTUREL,
	FOREIGN KEY (idListe) REFERENCE LISTEOBJET 
);

create table ESTDECRITDANS
(
	idListe number(6) ;
	idObjet number(6) ;
	date_desc date NOT NULL;
	description_objet varchar2(255) NOT NULL;
	PRIMARY KEY (idListe,idObjet,date_desc,description_objet),
	FOREIGN KEY (idObjet) REFERENCE OBJETCULTUREL,
	FOREIGN KEY (idListe) REFERENCE LISTEOBJET 
);

create table CONSULTATION 
(
	idUtilisateur number(6) ;
	idObjet number(6) ;
	date_consultation date NOT NULL;
	PRIMARY KEY (idObjet,idUtilisateur,date_consultation),
	FOREIGN KEY (idObjet) REFERENCE OBJETCULTUREL,
	FOREIGN KEY (idUtilisateur) REFERENCE UTILISATEUR 
);

create table COMPTECONSULTER
(
	idUtilisateur number(6) ;
	idObjet number(6) ;
	PRIMARY KEY (idUtilisateur,idObjet),
	FOREIGN KEY (idObjet) REFERENCE OBJETCULTUREL,
	FOREIGN KEY (idUtilisateur) REFERENCE UTILISATEUR 
);

create table NOTE
(
	--Il faudrait creer une table intermediare noteMoyenne ,pour eviter trois tonne de
	--jointure a chaque fois qu'on doit afficher une note sur le site

	idUtilisateur number(6) ;
	idObjet number(6) ;
	note number(2);
	PRIMARY KEY (idUtilisateur,idObjet),
	FOREIGN KEY (idObjet) REFERENCE OBJETCULTUREL,
	FOREIGN KEY (idUtilisateur) REFERENCE UTILISATEUR 
);

create table REALISE
(
	idPersonne number(6) ;
	idObjet number(6) ;
	PRIMARY KEY (idPersonne,idObjet),
	FOREIGN KEY (idObjet) REFERENCE OBJETCULTUREL,
	FOREIGN KEY (idPersonne) REFERENCE PERSONNE 
);

create table JOUEDANS 
(
	idPersonne number(6) ;
	idObjet number(6) ;
	role varchar2(30) NOT NULL ;
	PRIMARY KEY (idPersonne,idObjet),
	FOREIGN KEY (idObjet) REFERENCE OBJETCULTUREL,
	FOREIGN KEY (idPersonne) REFERENCE PERSONNE 
);

create table ECRIT 
(
	idPersonne number(6) ;
	idObjet number(6) ;
	PRIMARY KEY (idPersonne,idObjet),
	FOREIGN KEY (idObjet) REFERENCE OBJETCULTUREL,
	FOREIGN KEY (idPersonne) REFERENCE PERSONNE 
);

create table CREE 
(
	idPersonne number(6) ;
	idObjet number(6) ;
	PRIMARY KEY (idPersonne,idObjet),
	FOREIGN KEY (idObjet) REFERENCE OBJETCULTUREL,
	FOREIGN KEY (idPersonne) REFERENCE PERSONNE 
);

