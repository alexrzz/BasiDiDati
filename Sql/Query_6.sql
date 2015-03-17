DELIMITER $$
DROP VIEW IF EXISTS SpeseOspedale;
CREATE VIEW SpeseOspedale AS
SELECT calcoloSpesa ("San Raffaele",150);

SELECT * FROM SpeseOspedale $$
DELIMITER ;

