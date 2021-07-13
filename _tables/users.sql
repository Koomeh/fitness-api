CREATE TABLE users (
    UserId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    MembershipId varchar(50) NOT NULL,
    Name varchar(50) NOT NULL,
    UserType varchar(50) NOT NULL,
    Email varchar(50) NOT NULL,
    Password varchar(256) NOT NULL,
    MobileNo varchar(50) NOT NULL,
    Age int(11) NOT NULL,
    Weight double(5,2) NOT NULL,
    Height double(5,2) NOT NULL,
    BMI double(5,2) NOT NULL,
    CreatedDate datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;