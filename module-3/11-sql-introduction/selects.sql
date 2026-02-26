SELECT `city_name` FROM `cities`;
-- returns all city names in our table

SELECT * FROM `cities` LIMIT 3;
-- only return 3 results

SELECT * FROM `cities` WHERE CID = 4;
-- returns all info for the city with an id of 4

SELECT * FROM `cities` WHERE province = 'mb';
-- returns all info about cities in manitoba

SELECT city_name FROM `cities` WHERE is_capital = TRUE;
-- gets all capital city names

SELECT city_name, province FROM `cities` WHERE is_capital = TRUE ORDER BY province
-- capital city and province in order of provinces

select * from cities where city_name LIKE '%john%';
-- gets all cities where name contains john

select * from cities where province = 'on' and population > 1000000;
-- all cities from Ontario with over 1 million population

select * from cities where province = 'on' or population > 1000000;
-- will include cities in ON under a million and cities in other provinces over a million

select city_name, population from cities order by population desc;
-- order results by population from largest to smallest


-- find me the smallest city


-- find cities where population between 1000 and 30,000 (use AND and BETWEEN versions)


-- find all Ontario cities from largest to smallest, return the 3rd to 5th results only
SELECT * FROM `cities` where province = 'on' order by population desc limit 3, 3;