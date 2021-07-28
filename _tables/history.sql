CREATE TABLE history (
    HistoryId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Email varchar(50) NOT NULL,
    Age int(11) NOT NULL,
    Weight double(5,2) NOT NULL,
    Height double(5,2) NOT NULL,
    BMI double(5,2) NOT NULL,
    CreatedDate datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;