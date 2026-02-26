<?php

INSERT INTO `cities` (`cid`, `city_name`, `province`, `population`, `is_capital`, `trivia`) VALUES (NULL, 'Paris', 'YT', '1', '0', 'this is my special place');
-- from phpmyadmin

INSERT INTO `cities` (`city_name`, `province`, `population`, `is_capital`, `trivia`) VALUES ('Sicily', 'YT', 750000, 0, NULL);

INSERT INTO cities (city_name, province, population, is_capital, trivia) VALUES ('Warsaw', 'YT', 7500, 0, NULL);



INSERT INTO cities (city_name, province, population, is_capital, trivia) VALUES 
('Oslo', 'YT', 75900, 0, NULL), 
('Boston', 'YT', 175900, 0, NULL),
('Helsinki', 'YT', 65900, 0, 'It\'s fantastic! ')



?>