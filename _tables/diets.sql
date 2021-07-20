CREATE TABLE diets (
  DietId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Name varchar(50) NOT NULL,
  Type varchar(50) NOT NULL,
  Description text NOT NULL,
  Image varchar(255) NOT NULL,
  Calories int(11) NOT NULL,
  Day varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
