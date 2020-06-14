load data local infile '~/data/movie.del' into table Movie   FIELDS TERMINATED BY ',' enclosed by """"   ;

load data local infile '~/data/actor1.del' into table Actor   FIELDS TERMINATED BY ',' enclosed by """"   ;

load data local infile '~/data/actor2.del' into table Actor   FIELDS TERMINATED BY ',' enclosed by """"   ;

load data local infile '~/data/actor3.del' into table Actor   FIELDS TERMINATED BY ',' enclosed by """"   ;

load data local infile '~/data/director.del' into table Director   FIELDS TERMINATED BY ',' enclosed by """"   ;

load data local infile '~/data/moviegenre.del' into table MovieGenre   FIELDS TERMINATED BY ',' enclosed by """"   ;

load data local infile '~/data/moviedirector.del' into table MovieDirector   FIELDS TERMINATED BY ',' enclosed by """"   ;

load data local infile '~/data/movieactor1.del' into table MovieActor   FIELDS TERMINATED BY ',' enclosed by """"   ;

load data local infile '~/data/movieactor2.del' into table MovieActor   FIELDS TERMINATED BY ',' enclosed by """"   ;

INSERT INTO MaxPersonID (id) VALUES (69000);


INSERT INTO MaxMovieID (id) VALUES (4735);

