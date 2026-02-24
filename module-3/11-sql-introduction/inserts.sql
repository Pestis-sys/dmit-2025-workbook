<?php 

INSERT INTO `cities` (`cid`, `city_name`, `province`, `population`, `is_capital`, `trivia`) VALUES (NULL, 'Paris', 'YT', '1', '0', 'this is my special place ');
-- from phpmyadmin, we can insert data into our tables using the insert statement. We specify the table name, the columns we want to insert data into, and the values we want to insert. In this example, we are inserting a new city called Paris into the cities table. The cid is set to NULL because it is an auto-incrementing primary key, so it will automatically generate a unique id for this new city.

INSERT INTO `cities` (`city_name`, `province`, `population`, `is_capital`, `trivia`) values ('Sicily', 'YT', 750000, 1, null);
-- we can also omit the cid column in our insert statement since it is auto-incrementing. In this example, we are inserting a new city called Winnipeg into the cities table. The population is set to 750000, and it is marked as a capital city with is_capital set to null. The trivia column contains a special note about the city.
--since its an int we dont need to put it in quotes, but we can if we want to.
--Make sure to use backticks around table and column names, and single quotes around string values. (Example) ``cities` and `city_name` are column and table names, while 'Sicily' is a string value.

INSERT INTO cities (city_name, province, population, is_capital, trivia) values ('Warsaw', 'YT', 7500, 0, NULL);
-- we can also omit the backticks around the table and column names if they do not contain any special characters or reserved keywords. In this example, we are inserting a new city called Warsaw into the cities table. The population is set to 7500, and it is not marked as a capital city with is_capital set to 0. The trivia column is set to NULL, indicating that there is no special note about this city.


INSERT INTO cities (city_name, province, population, is_capital, trivia) values ('Oslo', 'YT', 75030, 0, NULL),
('Copenhagen', 'YT', 755000, 1, NULL),
('Helsinki', 'YT', 750009, 0, '(It\'s fantastic!)');
-- we can also insert multiple rows of data in a single insert statement by separating each set of values with a comma. In this example, we are inserting three new cities: Oslo, Copenhagen, and Helsinki. Each city has its own set of values for the city_name, province, population,    is_capital, and trivia columns. This allows us to efficiently add multiple records to the cities table in one go.
?>
