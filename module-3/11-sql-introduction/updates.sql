UPDATE cities SET population = 2 WHERE city_name = 'Paris'

-- update trivia for id 20

UPDATE cities 
    SET trivia = 'I can\'t think of any trivia right now. It is too early on a Monday' ,
    population = 200
    
    WHERE cid = 20;



update cities set population = population + 1000 where province = 'AB' or province = 'sk'

update cities set population = population + 1000 where province in ('ab','sk')

