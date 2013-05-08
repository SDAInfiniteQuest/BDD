--fonction n°1
CREATE OR REPLACE FUNCTION moy_appreciation(integer) RETURN integer IS 
BEGIN
  RETURN (SELECT avg(n1.note) FROM note n1	WHERE $1=n1.idObjet GROUP BY idObjet HAVING count(*)>=20);
END;
/

SELECT idObjet, moy_appreciation(3) FROM note ;
SELECT moy_appreciation(3) FROM note ;

SELECT avg(n1.note) 
FROM note n1
WHERE 3=n1.idObjet 
GROUP BY idObjet
HAVING count(*)>=20;

