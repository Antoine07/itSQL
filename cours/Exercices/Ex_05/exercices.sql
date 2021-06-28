-- Sélectionnez tous les pilotes de la compagnie AUS

SELECT * FROM pilots 
WHERE `compagny` = 'AUS';

-- Sélectionnez les noms des pilotes de la compagnie FRE1 ayant fait plus de 15 heures de vols.

SELECT `name` FROM pilots WHERE compagny = 'FRE1' AND numFlying > 15;

-- Sélectionnez les noms des pilotes de la compagnie FRE1 ayant fait plus de 20 heures de vols.

SELECT `name` FROM pilots WHERE compagny = 'FRE1' AND numFlying > 20;

-- Sélectionnez les noms des pilotes de la compagnie FRE1 ou AUST ayant fait plus de 20 de vols.

SELECT `name` FROM pilots WHERE (compagny = 'FRE1' or compagny = 'AUS') and numFlying > 20;

-- une autre version de la question précédente
SELECT `name` FROM pilots WHERE compagny IN ('FRE1','AUS') and numFlying > 20;

-- Sélectionnez les noms des pilotes ayant fait entre 190 et 200 heures de vols.
SELECT `name`
FROM pilots
WHERE numFlying BETWEEN 190 AND 200;

-- Sélectionnez les noms des pilotes qui sont nés après 1978.

SELECT `name`, `birth_date` FROM `pilots` WHERE `birth_date` > '1979';

-- Sélectionnez les noms des pilotes qui sont nés avant 1978.

SELECT `name`, `birth_date` FROM `pilots` WHERE `birth_date` < '1978';

-- Sélectionnez les noms des pilotes qui sont nés entre 1978 et 2000.

SELECT `name`, `birth_date` FROM `pilots` WHERE YEAR(`birth_date`) BETWEEN '1978' AND '2000';

SELECT `name`, `birth_date` FROM `pilots` WHERE `birth_date` < '2001' AND  `birth_date` > '1978';

-- Quels sont les pilotes qui ont un vol programmé après 2020-05-08 ?

SELECT name FROM pilots WHERE next_flight > '2020-05-09 23:59:59';

-- deuxième correction

SELECT `name` FROM `pilots` WHERE DATE(`next_flight`) > '2020-05-08';


-- Sélectionnez tous les noms des pilotes qui sont dans les compagnies : AUS et FRE1.

SELECT `name` FROM pilots WHERE `compagny` ='AUS' OR `compagny`='FRE1';

-- Sélectionnez tous les des pilotes dont le nom de compagnie contient un A.

SELECT `name` FROM pilots WHERE `compagny` like '%a%' ;

-- Sélectionnez tous les pilotes dont le nom de la compagnie commence par un F.

SELECT `name`, compagny FROM pilots WHERE `compagny` like 'f%' ;

-- Sélectionnez tous les pilotes dont le nom de la compagnie contient un I suivi d'un caractère.

SELECT `name`, compagny FROM pilots WHERE compagny LIKE '%i_';