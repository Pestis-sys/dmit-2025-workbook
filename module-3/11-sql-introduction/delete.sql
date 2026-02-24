<php 
Delete FROM cities WHERE city_name = 'Paris';
-- we can use the DELETE statement to remove records from our tables. In this example, we are deleting the record for the city named Paris from the cities table. The WHERE clause specifies which record(s) we want to DELETE, in this case, the city with the name 'Paris'. This will permanently remove the record for Paris from our database.

-- we can also DELETE multiple records at once. For example, if we want to DELETE all cities in the province of 'YT', we can use the following statement:
DELETE FROM cities WHERE province = 'YT';
-- this will DELETE all records from the cities table WHERE the province is 'YT'. Be cautious when using the DELETE statement, as it will permanently remove data from your database. Always make sure to include a WHERE clause to specify which records you want to DELETE, unless you intend to DELETE all records from the table.

--can delete multiple records at once using the IN operator in the WHERE clause. For example, if we want to DELETE all cities in the provinces of Alberta (AB) and Saskatchewan (SK), we can use the following statement:
DELETE FROM cities WHERE province IN ('AB', 'SK');
-- this will DELETE all records from the cities table WHERE the province is either 'AB' or                  'SK'. Using the IN operator allows us to efficiently DELETE multiple records based on multiple conditions without having to write separate DELETE statements for each province.

DELETE FROM cities WHERE cid = 20;
-- we can also DELETE a specific record using its unique identifier, which is the cid. In this example, we are deleting the record for the city with a cid of 20 from the cities table. The WHERE clause specifies that we want to DELETE the record WHERE the cid is 20. This allows us to remove a specific city from our database based on its unique identifier.


DELETE FROM cities WHERE population < 10000;
-- we can also DELETE records based on a condition. In this example, we are deleting all records from the cities table WHERE the population is less than 10000. This will remove all cities from our database that have a population below 10000. Be cautious when using conditions in your DELETE  statements, as it can result in the removal of multiple records if the condition matches multiple rows in the table. Always double-check your conditions to ensure you are deleting the intended records.


-- to avoid accidental deletion of all records in the cities table, we can use a condition in our DELETE statement to specify which records we want to DELETE. For example, if we want to DELETE all cities with a population less than 10000, we can use the following statement:
DELETE FROM cities WHERE population < 10000;



--challange write the delete statment without repeating the population < 10000 part of the statement . 
?>

