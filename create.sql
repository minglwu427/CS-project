# % mysql CS143 < load.sql
# use this command to run sql files



CREATE TABLE  Movie (
id INT,
title VARCHAR(100),
year INT,
rating VARCHAR(100),
company VARCHAR(50),
PRIMARY KEY (id),
CHECK (year <= 2018 AND year >= 1850)
);
#Movie must have a unique primary key ID
#The movie can not be released at time before camera is made.  We use 1850 to be safe.  Also, the movie cant be release after current year when database is uploaded

CREATE TABLE  Actor (
id INT,
last VARCHAR(20),
first VARCHAR(20),
sex VARCHAR(6),
dob  DATE,
dod  DATE,
PRIMARY KEY (id),
CHECK (sex <=> "Female" OR sex <=> "Male"),
CHECK (dob <= CURDATE())
); 
#Actor must have a unique primary key ID
#The actor must be male or female and they cant not have date of birth after current year when database is uploaded

CREATE TABLE  Director (
id INT,
last VARCHAR(20),
first VARCHAR(20),
dob  DATE,
dod  DATE,
PRIMARY KEY (id)
);
#Director must have a unique primary key ID


CREATE TABLE  MovieGenre (
mid INT,
genre VARCHAR(20),
PRIMARY KEY (mid),
FOREIGN KEY (mid) references Movie(id)
) ENGINE=INNODB;
#Movie must have a unique primary key mid
#The mid here is refer to the ID in the movie table.

CREATE TABLE MovieDirector (
mid INT,
did INT,
PRIMARY KEY (mid,did),
FOREIGN KEY (mid) references Movie(id),
FOREIGN KEY (did) references Director(id)
) ENGINE=INNODB;
#Here the unique primary key is composite of mid and did.
#The mid here is refer to the ID in the movie table.
#The did here is refer to the ID in the director table.



CREATE TABLE MovieActor (
mid INT,
aid INT,
role VARCHAR(50),
PRIMARY KEY (mid,aid),
FOREIGN KEY (mid) references Movie(id),
FOREIGN KEY (aid) references Actor(id)
) ENGINE=INNODB;
#Here the unique primary key is composite of mid and aid.
#The mid here is refer to the ID in the movie table.
#The aid here is refer to the ID in the Actor table.

CREATE TABLE Review(
name VARCHAR(20),
time TIMESTAMP,
mid INT,
rating INT,
comment VARCHAR(500),
PRIMARY KEY (name,mid,comment),
FOREIGN KEY (mid) references Movie(id)
)ENGINE=INNODB;
#Here the unique primary key is composite of mid and name of the reviewer
#The mid here is refer to the ID in the movie table.

CREATE TABLE MaxPersonID (
id INT,
PRIMARY KEY (id)
);

CREATE TABLE MaxMovieID (
id INT,
PRIMARY KEY (id)
);
