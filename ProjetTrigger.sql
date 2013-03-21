--Il faudra peut etres reecrire tout les triggers de maniere plus 'imperative', car risque
--de maxi bordel avec les appelle en cascade 


--Trigger a l'insertion dans utilisateur 
	--verifie qu'un pseudo n'est pas deja attribue et sinon en creer un en incrementer un
	--chiffre

	
CREATE TRIGGER insertUtil
	BEFORE
		INSERT ON UTILISATEUR
		
		REFERENCING 	
			
		DECLARE
			newId UTILISATEUR.idUtilisateur%type;
			testPseudo UTILISATEUR.pseudo%type;
/* test a faire sur le site			
			CURSOR testPseudo IS 
				SELECT pseudo
				FROM UTILISATEUR 
				WHERE new.pseudo==pseudo; 

			CURSOR testEmail IS 
				SELECT pseudo 
				FROM UTILISATEUR 
				WHERE new.mail==mail;
*/
		BEGIN

			--OPEN testPseudo;

			--if(testPseudo%FOUND)
			--	EXCEPTION 
				
		--	OPEN testEmail;

			--if(testEmail%FOUND)
			--	EXCEPTION 
			
	--		SELECT mail FROM new WHERE REGEX_LIKE(mail,)	

			SELECT max(idUtilisateur) INTO newId FROM UTILISATEUR;
			:new.idUtilisateur=newId;

			
END;
/
-- TRIGGER de suppression
--En cas de supression d'un utilisateur les trigger s'appelle en cascade
--------
CREATE TRIGGER SupprUtil
	BEFORE
		DELETE ON UTILISATEUR
		
		REFERENCING 	
			
		DECLARE
			newId UTILISATEUR.idUtilisateur%type;
			testPseudo UTILISATEUR.pseudo%type;
			

			BEGIN
			
				DELETE 
				FROM COMMENTE 
				WHERE old.idUtilisateur==COMMENTE.idUtilisateur; 

				DELETE 
				FROM CREELISTE
				WHERE old.idUtilisateur==CREELISTE.idUtilisateur;

				DELETE 
				FROM CONSULTATION
				WHERE old.idUtilisateur==CONSULTATION.idUtilisateur;
			
				DELETE 
				FROM COMPTECONSULTER 
				WHERE old.idUtilisateur==COMPTECONSULTER.idUtilisateur;

			END;
/


CREATE TRIGGER supprComment
	BEFORE
		DELETE ON COMMENTE
		
		REFERENCING 	
			
		DECLARE

			BEGIN
			
				DELETE 
				FROM COMMENTAIRE
				WHERE old.idComment==COMMENTAIRE.idComment; 

			END;
/


CREATE TRIGGER supprCreeliste
	BEFORE
		DELETE ON CREELISTE
		
		REFERENCING 	
			
		DECLARE

			BEGIN
			
				DELETE 
				FROM LISTEOBJET
				WHERE old.idListe==LISTEOBJET.idComment; 

			END;
/

CREATE TRIGGER supprListe
	BEFORE
		DELETE ON LISTEOBJET
		
		REFERENCING 	
			
		DECLARE

			BEGIN
			
				DELETE 
				FROM APPARTIENTLISTE
				WHERE old.idListe==APPARTIENTLISTE.idListe; 

				DELETE 
				FROM ESTDECRITDANS
				WHERE old.idListe==ESTDECRITDANS.idListe; 
				
			END;
/

--supression Objetculturel

CREATE TRIGGER supprObjetCulturel
	BEFORE
		DELETE ON LISTEOBJET
		
		REFERENCING 	
			
		DECLARE

			BEGIN
			
				DELETE 
				FROM APPARTIENTLISTE
				WHERE old.idObjet==APPARTIENTLISTE.idObjet; 

				DELETE 
				FROM ESTDECRITDANS
				WHERE old.idObjet=ESTDECRITDANS.idObjet; 
				
				DELETE 
				FROM ESTCOMMENTE
				WHERE old.idObjet==ESTCOMMENTE.idObjet; 

				DELETE 
				FROM NOTE
				WHERE old.idObjet==NOTE.idObjet; 

			END;
/



CREATE TRIGGER supprEstCommente
	BEFORE
		DELETE ON ESTCOMMENTE
		
		REFERENCING 	
			
		DECLARE
			idComment_aSuppr COMMENTAIRE.idComment%type;
			BEGIN
			
				SELECT idComment
				INTO idComment_aSuppr
				FROM COMMENTAIRE
				WHERE old.idComment==COMMENTAIRE.idComment; 

				DELETE 
				FROM COMMENTAIRE
				WHERE old.idComment==COMMENTAIRE.idComment; 

				DELETE 
				FROM COMMENTE
				WHERE COMMENTE.idComment==idComment_aSuppr;
			
			END;
/

	

--/TRIGGER de suppression

--Ajout automatiquement l'objet a la liste mois/annee de sa date de sortie
CREATE TRIGGER insertObjetCulturelListe
	AFTER
		INSERT ON OBJETCULTUREL
		
		REFERENCING 	
		
		mois	varchar2(6);
		annee varchar2(6);
		nom_liste varchar(12);

		DECLARE
			BEGIN
			
			mois=Trunc(sysdate,'MM');
			annee=Trunc(sysdate,'YYYY');

				SELECT 
				INTO mois
				FROM 
				WHERE old.idComment==COMMENTAIRE.idComment; 

				DELETE 
				FROM COMMENTAIRE
				WHERE old.idComment==COMMENTAIRE.idComment; 

				DELETE 
				FROM COMMENTE

--TRIGGER d'insertion 


--Divers trigger de test d'integrite de la base apres transaction
