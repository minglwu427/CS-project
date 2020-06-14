/*

Constraints:
- Every movie has a unique id number.
- Every movie must have a title.
- Every movie must have a release year.
- Every movie must have a production company.

- Every actor must have a date of birth.
- Every actor must have a first and last name.
- Every actor must have a sex.
- Every actor must have a unique id number.

- Every director must have a date of birth.
- Every director must have a first and last name.
- Every director must have a sex.
- Every director must have a unique id number.
- The movie director's foreign key is the movie id number and it is a reference to the movie id in the movie table.
- The movie director's foreign key is the director id number and it is a reference to the director id in the director table.

- Every movie in the genre table must have a genre.

- The movie actor's foreign key is the mid number and it is a reference to the id in the movie table.
- The movie actor's foreign key is the did number and it is a reference to the id in the director table.
- The movie genre's foreign key is the mid number and it is a reference to the id in the movie table.
- The movie genre's foreign key is the did number and it is a reference to the id in the director table.

- The sex in the actor table needs to be either male or female.
- The release year in the movie table must be between 1850 and 2018 or the current year that this is being read.
- The actor's dob in the actor table cannot be after 2018 or the current year that this is being read.

Primary Key Constraints:
1. Every movie has a unique id number.
2. Every director must have a unique id number.
3. Every actor must have a unique id number.

Referential Integrity Constraints:
4. The movie director's foreign key is the mid number and it is a reference to the id in the movie table.
5. The movie director's foreign key is the did number and it is a reference to the id in the director table.
6. The movie actor's foreign key is the mid number and it is a reference to the id in the movie table.
7. The movie actor's foreign key is the aid number and it is a reference to the id in the actor table.
8. The movie genre's foreign key is the mid number and it is a reference to the id in the movie table.
9. The movie review's foreign key is the mid number and it is a reference to the id in the movie table.

CHECK Constraints:
10. The sex in the actor table needs to be either male or female.
11. The release year in the movie table must be between 1850 and 2018 or the current year that this is being read.
12. The actor's dob in the actor table cannot be after 2018 or the current year that this is being read.
*/

#Constraint: #1 (look above)
#Why: This code attempts to insert a new movie into the Movie table, even though there is already a movie with the same ID.
#Output: ERROR 1062 (23000): Duplicate entry '3' for key 'PRIMARY'
INSERT INTO Movie
VALUES (3, "Hi I am a Movie", 2017, "R", "Jaret Entertainment");

#Constraint: #2
#Why: This code attempts to add a new director to the director table, though there is already one with the same id.
#Output: ERROR 1062 (23000): Duplicate entry '63' for key 'PRIMARY'
INSERT INTO Director
VALUES (63, "Chawla", "Simran", "1996-12-20", "2017-12-20");

#Constraint: #3
#Why: This code attempts to add a new actor with an id that matches one which already exists.
#Output: ERROR 1062 (23000): Duplicate entry '10' for key 'PRIMARY'
INSERT INTO Actor
VALUES (10, "Simran", "Chawla", "Female", "1996-12-20", "2017-12-20");

#Constraint: #4
#Why: This code attempts to insert an entry in the MovieDirector table, which has an mid number that does not match any id in the movie table, hence not satisfying the foreign key.
#Output: ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))
INSERT INTO MovieDirector
VALUES (9999999, 13699);

#Constraint: #5
#Why: This code attempts to insert an entry in the MovieDirector table, which has a did number that does not match any director in the director table.
#Output: ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_2` FOREIGN KEY (`did`) REFERENCES `Director` (`id`))
INSERT INTO MovieDirector
VALUES (9, 9999999);

#Constraint: #6
#Why: The code attempts to add an entry into the MovieActor table with an mid that does not match any movie in the movie table.
#Output: ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))
INSERT INTO MovieActor
VALUES (7777777, 20327, "Sophia Monroe");

#Constraint: #7
#Why: The code attempts to add an entry into the MovieActor table with an aid number that does not match any actor in the actor table.
#Output: ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `Actor` (`id`))
INSERT INTO MovieActor
VALUES (2, 8888888, "Gregory");

#Constraint: #8
#Why: The code attempts to add an entry into the MovieGenre table with an mid that does not match any movie in the movie table.
#Output: ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieGenre`, CONSTRAINT `MovieGenre_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))
INSERT INTO MovieGenre
VALUES (6666666, "Drama");

#Constraint: #9
#Why: The code attempts to add an entry into the Review table with an mid that does not match any movie in the movie table, hence not satisfying the foreign key property.
#Output: ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`CS143`.`Review`, CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))
INSERT INTO Review
VALUES ("Simran", "2018-01-01 00:00:00", 88889999, 9, "gud");

#Constraint: #10
#Why: This code attempts to add a new actor to the actor table with an invalid value for the 'sex' attribute, which is not Male or Female.
#Output: N/A bc CHECK constraints do not work
INSERT INTO Actor
VALUES (888888888, "Simran", "Chawla", "Hi", "1996-12-20", "2017-12-20");

#Constraint: #11
#Why: This code attempts to add a new movie with a release year that is before 1850, which is not possible.
#Output: N/A bc CHECK constraints do not work
INSERT INTO Movie
VALUES (999999799, "HIIIII", 1001, "R", "Jaret Entertainment");

#Constraint: #12
#Why: The code attempts to add a new actor to the actor table with a birth date which is after the current year, which does not make sense.
#Output: N/A bc CHECK constraints do not work
INSERT INTO Actor
VALUES (777777777, "Simran", "Chawla", "Female", "2020-01-01", "2017-12-20");















