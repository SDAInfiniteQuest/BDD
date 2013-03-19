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

CREATE TRIGGER supprObjetCulturel
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

--Divers trigger de test d'integrite de la base apres transaction
