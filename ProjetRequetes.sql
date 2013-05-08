/*--Requete n°1
SELECT *
FROM utilisateur u
WHERE 
		u.idUtilisateur=(SELECT cl.idUtilisateur
		FROM creeListe cl
		WHERE cl.idListe=(SELECT DISTINCT l.idListe
				FROM listeObjet l
				GROUP BY typeListe
				HAVING count(*)=3))
;
*/
--Requete n°2:ok
SELECT *
FROM utilisateur u1
WHERE 
		9<(SELECT count(*)
		FROM suivre s
		WHERE s.idFollower=u1.idUtilisateur)
	AND
		9<(SELECT count(*)
		FROM suivre s1
		WHERE s1.idFollower=u1.idUtilisateur)
;

--Requete n°3:ok
SELECT * 
FROM objetCulturel oc
WHERE 
		4<(SELECT avg(n1.note) 
		FROM note n1
		WHERE n1.idObjet=oc.idObjet)
	AND
		20<=(SELECT count(*)
		FROM commentaire ec
		WHERE ec.idObjet=oc.idObjet)
;

--Requete n°4:ok
SELECT DISTINCT u.idUtilisateur
FROM utilisateur u, note n
WHERE 
		3<=(SELECT min(n.note)
		FROM note n
		WHERE n.idUtilisateur=u.idUtilisateur)
ORDER BY u.idUtilisateur
;
/*
--Requete n°5
SELECT *
FROM objetCulturel oc
WHERE
		oc.idObjet=(SELECT c.idObjet
		FROM commentaire c
		WHERE c.date_commentaire<=sysdate-7
		GROUP BY c.idObjet
		HAVING max(count(c.idObjet)))
;*/
