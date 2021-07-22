CREATE TABLE personalactivities (
  PersonalActivityId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  UserEmail varchar(100),
  Name varchar(50) NOT NULL,
  Description varchar(255),
  Met int(11),
  Weight int(11),
  Duration int(11) NOT NULL,
  BurnedCalories int(11) NOT NULL,
  Image varchar(255) NOT NULL,
  CreatedDate datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;