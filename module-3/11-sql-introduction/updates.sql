<?php 
UPDATE cities SET population = 7500000 WHERE city_name = 'Paris';
-- we can use the UPDATE statement to modify existing data in our tables. In this example, we are updating the population of the city named Paris to 7500000. The WHERE clause specifies which record(s) we want to UPDATE, in this case, the city with the name 'Paris'.

UPDATE cities SET is_capital = 1 WHERE city_name = 'Warsaw';
-- we can also UPDATE multiple columns at once. In this example, we are SETting the is_capital column to 1 for the city named Warsaw, indicating that it is now a capital city. Again, we use the WHERE clause to specify which record we want to UPDATE.


UPDATE cities SET trivia = 'This city is known for its beautiful architecture.' WHERE city_name = 'Oslo';
-- we can UPDATE the trivia column for the city named Oslo to provide more information about the city. In this example, we are SETting the trivia column to 'This city is known for its beautiful       architecture.' for the city named Oslo. This allows us to add interesting facts or notes about the city in our database.

UPDATE cities SET population = population + 100000 WHERE province = 'YT';
-- we can also perform calculations in our UPDATE statement. In this example, we are increasing the population of all cities in the province of 'YT' by adding 100000 to their existing population. The WHERE clause specifies that we want to UPDATE all records WHERE the province is 'YT'. This allows us to efficiently UPDATE multiple records based on a specific condition.

--UPDATE triva for id 20
UPDATE cities SET trivia = 'This city is known for its vibrant culture and rich history.' WHERE cid = 20;
-- we can also UPDATE the trivia column for a specific city using its unique identifier, which is the cid. In this example, we are SETting the trivia column to 'This city is known for its vibrant culture and rich history.' for the city with a cid of 20. This allows us    to provide more information about a specific city in our database based on its unique identifier.

-- All citys in Alberta and Saskatchewan have a population increase of 1000 people 
UPDATE cities SET population = population + 1000 WHERE province IN ('AB', 'SK');
-- we can use the IN operator in our WHERE clause to specify multiple values for a column. In this example, we are increasing the population of all cities in the provinces of Alberta (AB)     and Saskatchewan (SK) by adding 1000 to their existing population. The WHERE clause specifies that we want to UPDATE all records WHERE the province is either 'AB' or 'SK'. This allows us to efficiently UPDATE multiple records based on multiple conditions.


--to avoid duplacation in our statment for alberta and sask we can use the IN operator to specify multiple values for the province column. This way, we can UPDATE all cities in both Alberta and Saskatchewan with a single statement, rather than writing separate UPDATE statements for each province. This makes our code more efficient and easier to maintain.
update cities set population = population + 1000 where province in ('AB', 'SK');

--challange write the update statment without repeating the population = population + 1000 part of the statement .


?>