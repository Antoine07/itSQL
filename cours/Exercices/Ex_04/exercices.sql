/*



*/ -- La requête

ALTER TABLE `compagnies` ADD COLUMN `numStreet` INT;


INSERT INTO `compagnies` (`comp`, `street`, `city`, `name`, `numStreet`, `status`)
VALUES ('AUS',
        'sidney',
        'Australie',
        'AUSTRA Air',
        19,
        'draft'), ('CHI',
                   'chi',
                   'Chine',
                   'CHINA Air',
                   NULL,
                   'draft'), ('FRE1',
                              'beaubourg',
                              'France',
                              'Air France',
                              17,
                              'draft'), ('FRE2',
                                         'paris',
                                         'France',
                                         'Air Electric',
                                         22,
                                         'draft'), ('SIN',
                                                    'pasir',
                                                    'Singapour',
                                                    'SIN A',
                                                    15,
                                                    'draft');

-- insert pilots

INSERT INTO `pilots` (`certificate`,`numFlying`,`compagny`,`name`)
VALUES ('ct-1',
        90,
        'AUS',
        'Alan'), ('ct-12',
                  190,
                  'AUS',
                  'Albert'), ('ct-7',
                              80,
                              'CHI',
                              'Pierre'), ('ct-11',
                                          200,
                                          'AUS',
                                          'Sophie'), ('ct-6',
                                                      20,
                                                      'FRE1',
                                                      'Jhon'), ('ct-10',
                                                                90,
                                                                'FRE1',
                                                                'Tom'), ('ct-100',
                                                                         200,
                                                                         'SIN',
                                                                         'Yi'), ('ct-16',
                                                                                 190,
                                                                                 'SIN',
                                                                                 'Yan'), ('ct-56',
                                                                                          300,
                                                                                          'AUS',
                                                                                          'Benoit') ;

-- Avant d'exécutez ne marche pas contrainte d'intégrité IRL

INSERT INTO `pilots` (`certificate`,`numFlying`,`compagny`,`name`)
VALUES ('ct-59',
        300,
        'IRL',
        'Philippe');


ALTER TABLE pilots ADD COLUMN created DATETIME DEFAULT CURRENT_TIMESTAMP;


INSERT INTO `pilots` (`certificate`,`numFlying`,`compagny`,`name`, `created`)
VALUES ('ct-60',
        300,
        'FRE1',
        'Philippe',
        '2021-05-18 11:00:00');

-- champs supplémentaires
 /*
    Attention si vous mettez une option unsigned il faut mettre cette option de type après le type lui-même
 */
ALTER TABLE pilots ADD (next_flight DATETIME,
                        num_jobs SMALLINT UNSIGNED , birth_date DATETIME);

-- pour supprimer une colonne

ALTER TABLE pilots
DROP num_jobs;


ALTER TABLE pilots
DROP next_flight;

-- mise à jour de Alan & Tom
/*
        num_flight    next_flight                 birth_date
Alan   |      30   | 2020-04-04 07:50:52        | 2001-03-04 00:00:00
Tom    |     10   | 2020-12-04 09:50:52        | 1978-02-04 00:00:00
*/

UPDATE `pilots`
SET `birth_date` = '2001-03-04 00:00:00',
    `next_flight` = '2020-04-04 07:50:52',
    `num_jobs` = 30
WHERE name = 'Alan';

UPDATE `pilots`
SET `birth_date` = '1978-02-04 00:00:00',
    `next_flight` = '2020-12-04 09:50:52',
    `num_jobs` = 10
WHERE name = 'Tom';