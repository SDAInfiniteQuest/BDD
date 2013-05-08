INSERT INTO utilisateur 
VALUES (1,to_date('2013/03/14','YYYY/MM/DD'),'test1','john','smith','mail@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (2,to_date('2013/01/04','YYYY/MM/DD'),'test2','marc','klein','mail2@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (3,to_date('2011/07/14','YYYY/MM/DD'),'test3','indiana','johns','mail3@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (4,to_date('2011/06/12','YYYY/MM/DD'),'test4','napoléon','bonaparte','mail4@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (5,to_date('2013/01/4','YYYY/MM/DD'),'test5','rené','descartes','mail5@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (6,to_date('2012/12/21','YYYY/MM/DD'),'test6','roland','emmerich','mail6@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (7,to_date('2012/10/19','YYYY/MM/DD'),'test7','mickael','von clausewitz','mail7@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (8,to_date('2012/03/09','YYYY/MM/DD'),'test8','vladimir','kramnik','mail8@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (9,to_date('2012/09/01','YYYY/MM/DD'),'test9','yi','wukong','mail9@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (10,to_date('2012/08/15','YYYY/MM/DD'),'test10','domo','vedugato','mail10@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (11,to_date('2011/02/28','YYYY/MM/DD'),'test11','michel','trepane','mail11@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (12,to_date('2013/02/11','YYYY/MM/DD'),'test12','daniel','toscan','mail12@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (13,to_date('2010/07/4','YYYY/MM/DD'),'test13','pascal','preche','mail13@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (14,to_date('2013/01/02','YYYY/MM/DD'),'test14','leon','gambetta','mail14@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (15,to_date('2013/01/04','YYYY/MM/DD'),'test15','marie','antoinette','mail15@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (16,to_date('2009/01/21','YYYY/MM/DD'),'test16','louis','unix','mail16@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (17,to_date('2012/10/31','YYYY/MM/DD'),'test17','victor-paul','emile','mail17@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (18,to_date('2012/03/22','YYYY/MM/DD'),'test18','dorian','gris','mail18@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (19,to_date('2011/08/29','YYYY/MM/DD'),'test19','elsa','feuerbach','mail19@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (20,to_date('2012/08/30','YYYY/MM/DD'),'test20','alan','turing','mail20@testmail.fr','FFFFFF');

INSERT INTO utilisateur 
VALUES (21,to_date('2012/08/30','YYYY/MM/DD'),'test21','catherine','maillard','mail21@testmail.fr','FFFFFF');



INSERT INTO objetculturel
VALUES (1,to_date('1995/04/14','YYYY/MM/DD') ,'fantastistique');

INSERT INTO objetculturel
VALUES (2,to_date('1735/12/25','YYYY/MM/DD') ,'classique');

INSERT INTO objetculturel
VALUES (3,to_date('2002/06/08','YYYY/MM/DD') ,'rock');

INSERT INTO objetculturel
VALUES (4,to_date('2005/05/11','YYYY/MM/DD') ,'aventure');


INSERT INTO FILM
VALUES (1,'super film fantastique');

INSERT INTO LIVRE
VALUES (2,'roman',null,'litterature classique');

INSERT INTO ALBUM
VALUES (3,'super groupe');

INSERT INTO FILM
VALUES (4,'super film aventure');


INSERT INTO PERSONNE
VALUES (1,'Mark','A.Butler');

INSERT INTO PERSONNE
VALUES (2,'Ray','S.Tilis');

INSERT INTO PERSONNE
VALUES (3,'Taylor','Swanson');

INSERT INTO PERSONNE
VALUES (4,'Edward','Rines');

INSERT INTO PERSONNE
VALUES (5,'Robert','Murray');

INSERT INTO PERSONNE
VALUES (6,'lois','Drew');

INSERT INTO PERSONNE
VALUES (7,'Rachel','Nguyen');

INSERT INTO PERSONNE
VALUES (8,'Erich','Thomas');

INSERT INTO PERSONNE
VALUES (9,'Paul','Lembo');


INSERT INTO REALISE
VALUES (1,'1');

INSERT INTO JOUEDANS
VALUES (2,'1','policier');

INSERT INTO JOUEDANS
VALUES (3,'1','pompier');

INSERT INTO ECRIT
VALUES (4,'2');

INSERT INTO CREE
VALUES (5,'3');

INSERT INTO CREE
VALUES (6,'3');

INSERT INTO REALISE
VALUES (7,'4');

INSERT INTO JOUEDANS
VALUES (8,'4','Terroriste');

INSERT INTO JOUEDANS
VALUES (9,'4','Le shériff');



INSERT INTO LISTEOBJET
VALUES(1,'LIVRE','liste litterature classique');

INSERT INTO LISTEOBJET
VALUES(2,'ALBUM','liste rock !');

INSERT INTO LISTEOBJET
VALUES(3,'FILM','liste film cool');


INSERT INTO SUIVRE
VALUES(1,2);

INSERT INTO SUIVRE
VALUES(1,3);

INSERT INTO SUIVRE
VALUES(1,4);

INSERT INTO SUIVRE
VALUES(1,5);

INSERT INTO SUIVRE
VALUES(1,6);

INSERT INTO SUIVRE
VALUES(1,7);

INSERT INTO SUIVRE
VALUES(1,8);

INSERT INTO SUIVRE
VALUES(1,9);

INSERT INTO SUIVRE
VALUES(1,10);

INSERT INTO SUIVRE
VALUES(1,11);

INSERT INTO SUIVRE
VALUES(1,12);

INSERT INTO SUIVRE
VALUES(11,1);

INSERT INTO SUIVRE
VALUES(12,1);

INSERT INTO SUIVRE
VALUES(13,1);

INSERT INTO SUIVRE
VALUES(14,1);

INSERT INTO SUIVRE
VALUES(15,1);

INSERT INTO SUIVRE
VALUES(2,1);

INSERT INTO SUIVRE
VALUES(3,1);

INSERT INTO SUIVRE
VALUES(4,1);

INSERT INTO SUIVRE
VALUES(5,1);

INSERT INTO SUIVRE
VALUES(6,1);

INSERT INTO SUIVRE
VALUES(7,1);

INSERT INTO SUIVRE
VALUES(8,1);

INSERT INTO SUIVRE
VALUES(7,3);

INSERT INTO SUIVRE
VALUES(4,3);

INSERT INTO SUIVRE
VALUES(7,16);


INSERT INTO NOTE
VALUES(2,2,7);

INSERT INTO NOTE
VALUES(2,1,1);

INSERT INTO NOTE
VALUES(1,2,10);

INSERT INTO NOTE
VALUES(1,3,7);

INSERT INTO NOTE
VALUES(2,3,4);

INSERT INTO NOTE
VALUES(3,3,6);

INSERT INTO NOTE
VALUES(4,3,10);

INSERT INTO NOTE
VALUES(5,3,5);

INSERT INTO NOTE
VALUES(6,3,5);

INSERT INTO NOTE
VALUES(7,3,6);

INSERT INTO NOTE
VALUES(8,3,2);

INSERT INTO NOTE
VALUES(9,3,7);

INSERT INTO NOTE
VALUES(10,3,7);

INSERT INTO NOTE
VALUES(11,3,3);

INSERT INTO NOTE
VALUES(12,3,10);

INSERT INTO NOTE
VALUES(13,3,1);

INSERT INTO NOTE
VALUES(14,3,4);

INSERT INTO NOTE
VALUES(15,3,3);

INSERT INTO NOTE
VALUES(16,3,1);

INSERT INTO NOTE
VALUES(17,3,9);

INSERT INTO NOTE
VALUES(18,3,9);

INSERT INTO NOTE
VALUES(19,3,2);

INSERT INTO NOTE
VALUES(20,3,1);


INSERT INTO CREELISTE
VALUES(1,1);

INSERT INTO LISTEOBJET
VALUES(4,'LIVRE','FilmComique');

INSERT INTO LISTEOBJET
VALUES(5,'FILM','Funk');


INSERT INTO APPARTIENTLISTE
VALUES(1,2);

INSERT INTO APPARTIENTLISTE
VALUES(2,3);

INSERT INTO APPARTIENTLISTE
VALUES(3,1);

INSERT INTO APPARTIENTLISTE
VALUES(3,4);


INSERT INTO COMMENTAIRE
VALUES(1,9,2,'cest une très belle oeuvre',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(2,8,2,'ca cest du commentaire de la mort qui tue',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(3,7,2,'lalala schtroumpf lala',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(4,6,2,'first',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(5,5,2,'wahooo',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(6,4,2,'nul nul et nul',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(7,3,2,'ahah nul',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(8,2,2,'bien mais pas top',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(9,1,2,'excellent',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(10,18,2,'could be better',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(11,17,2,'not bad',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(12,16,2,'yeah',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(13,15,2,'nice',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(14,14,2,'sympa',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(15,13,2,'cool',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(16,12,2,'cest trop nul',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(17,19,2,'pas mal',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(18,20,2,'ouais pas mal',to_date('2011/01/03','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(19,9,2,'pas trop mal',to_date('2013/05/04','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(20,10,2,'pas trop trop mal',to_date('2013/05/04','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(21,11,4,'pas nul mais pas bien',to_date('2013/05/04','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(22,14,5,'pas trop trop trop mal',to_date('2013/05/06','YYYY/MM/DD'));

INSERT INTO COMMENTAIRE
VALUES(23,11,1,'pas mal',to_date('2013/05/05','YYYY/MM/DD'));

