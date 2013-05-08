--Requete n°3
SELECT * 
FROM objetCulturel oc
WHERE 
		4<(SELECT avg(n1.note) 
		FROM note n1
		WHERE n1.idObjet=oc.idObjet;)
	AND
		20<(SELECT count(*)
		FROM estCommente ec
		WHERE ec.idObjet=oc.idObjet
		GROUP BY idObjet;)
;

--Requete n°4
SELECT *
FROM utilisateur u, note n
WHERE u.isUtilisateur=n.idUtilisateur 
	AND
		3<=n.note 
;

--Requete n°5
SELECT
FROM
WHERE
