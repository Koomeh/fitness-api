CREATE TABLE meals (
    MealId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Type varchar(100) NOT NULL,
    Calories varchar(50) NOT NULL,
    Day varchar(50) NOT NULL,
    IngredientId int(11),
    IngredientName varchar(255),
    Quantity int(11),
    UserId int(11) NOT NULL,
    UserEmail varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;