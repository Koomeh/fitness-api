CREATE TABLE meals (
    MealId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Type varchar(100) NOT NULL,
    Calories varchar(50) NOT NULL,
    Day varchar(50) NOT NULL,
    CreatedDate datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;