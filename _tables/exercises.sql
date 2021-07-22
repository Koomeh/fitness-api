CREATE TABLE exercises (
  ExerciseId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ExerciseName varchar(50) NOT NULL,
  Description text NOT NULL,
  Image varchar(255) NOT NULL,
  CreatedDate datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;