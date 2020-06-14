

#1
#Taking the columns 'first' and 'last' from the actor table, concatenating them into one string with a space in between.
#We then match the Actors from the Actor table, to the movies they are in using inner join to the Movie Actor table based on mid and aid.
#Then we use the mid of the MovieActor table and associate it with the movie title in the Movie table using mid and id.
#Then we filter by only showing the movies with the movie title: 'Die Another Day'.
SELECT concat(first, " " ,last)  
FROM Actor
INNER JOIN MovieActor ON
    Actor.id <=> MovieActor.aid
INNER JOIN Movie on
    MovieActor.mid <=> Movie.id
WHERE Movie.title <=> 'Die Another Day';

#2
#Create a new table that groups the table MovieActor by aid and creates an additional column with the frequency of the aid in the table.
#Count the number of aids in the new table.
Select Count(aid) as ActorCount 
from(
    Select aid, Count(aid) as MovieIn
    from MovieActor
    Group by aid
    Having count(aid)>1
    ) as SumActMov;

#3
#I want to only watch movies that are younger than me.
#Select titles from the Movie table that have the year attribute greater than 1992.
SELECT title
FROM Movie
WHERE year >= 1992;
