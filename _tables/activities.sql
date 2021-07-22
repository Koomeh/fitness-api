CREATE TABLE activities (
  ActivityId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Name varchar(50) NOT NULL,
  Description text NOT NULL,
  Duration int(11) NOT NULL,
  BurnedCalories int(11) NOT NULL,
  Image varchar(255) NOT NULL,
  CreatedDate datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;