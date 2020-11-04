CREATE TABLE CUSTOMER
(
  DOB DATE NOT NULL,
  TelNumber INT NOT NULL,
  FanID INT NOT NULL,
  Email VARCHAR(255) NOT NULL,
  Nationality VARCHAR(255) NOT NULL,
  Fname VARCHAR(255) NOT NULL,
  LName VARCHAR(255) NOT NULL,
  Password VARCHAR(255) NOT NULL,
  Address VARCHAR(255) NOT NULL,
  PRIMARY KEY (FanID)
)Engine=InnoDB;

CREATE TABLE CCDetails
(
  CCType VARCHAR(255) NOT NULL,
  CCNumber INT NOT NULL,
  CCFname VARCHAR(255) NOT NULL,
  CCLname VARCHAR(255) NOT NULL,
  CCExpiryMonth INT NOT NULL,
  CCExpiryYear INT(4) NOT NULL,
  FanID INT NOT NULL,
  PRIMARY KEY (CCNumber),
  FOREIGN KEY (FanID) REFERENCES CUSTOMER(FanID) on update cascade on delete cascade,
  CHECK (CCExpiryMonth > 0 AND CCExpiryMonth < 13) -- Months are from 1 to 12
  CHECK (CCExpiryYear > 2020 AND CCExpiryYear < 9999) -- Card must have valid expiry (> 2020) and it cannot be more than 4 digits (hence < 9999)
)Engine=InnoDB;

CREATE TABLE STADIUM
(
  Category1Capacity INT NOT NULL,
  Category2Capacity INT NOT NULL,
  Name VARCHAR(255) NOT NULL,
  Address VARCHAR(255) NOT NULL,
  City VARCHAR(255) NOT NULL,
  Category3Capacity INT NOT NULL,
  Category4Capacity INT NOT NULL,
  PRIMARY KEY (Name)
)Engine=InnoDB;

CREATE TABLE TEAM
(
  TeamName VARCHAR(255) NOT NULL,
  PRIMARY KEY (TeamName)
)Engine=InnoDB;

CREATE TABLE GUEST
(
  GuestFanID INT NOT NULL,
  Nationalty VARCHAR(255) NOT NULL,
  DOB DATE NOT NULL,
  Fname VARCHAR(255) NOT NULL,
  Lname VARCHAR(255) NOT NULL,
  CustomerFanID INT NOT NULL,
  PRIMARY KEY (GuestFanID),
  FOREIGN KEY (CustomerFanID) REFERENCES CUSTOMER(FanID) on update cascade on delete cascade
)Engine=InnoDB;

CREATE TABLE MATCH
(
  KickOffDate DATE NOT NULL, -- Date format is YYYY-MM-DD
  KickOffTime TIME NOT NULL, -- Time format is hh:mm:ss
  MatchNumber INT NOT NULL,
  Team1 VARCHAR(255) NOT NULL,
  Team2 VARCHAR(255) NOT NULL,
  StadiumName VARCHAR(255) NOT NULL,
  PRIMARY KEY (MatchNumber),
  FOREIGN KEY (StadiumName) REFERENCES STADIUM(Name) on update cascade on delete cascade,
  CHECK (MatchNumber >= 1 AND MatchNumber <= 65) -- 64 matches are played in FIFA World Cup, so matchnumber can be between 1 and 65 
)Engine=InnoDB;

CREATE TABLE SEAT
(
  Category INT NOT NULL,
  Pavillion INT NOT NULL,
  Level INT NOT NULL,
  Block VARCHAR(255) NOT NULL,
  Row INT NOT NULL,
  SeatNumber INT NOT NULL,
  StadiumName VARCHAR(255) NOT NULL,
  PRIMARY KEY (Pavillion, Level, Block, Row, SeatNumber, StadiumName),
  FOREIGN KEY (StadiumName) REFERENCES STADIUM(Name) on update cascade on delete cascade,
  CHECK (Category >= 1 AND Category <= 4), -- There are 4 categories only
  CHECK (Pavillion > 0 AND Level > 0 AND Row > 0 AND SeatNumber > 0) -- These columns cannot be negative
)Engine=InnoDB;

CREATE TABLE TICKET
(
  TicketID INT NOT NULL,
  Cateogry INT NOT NULL,
  TicketType VARCHAR(255) NOT NULL,
  Price INT NOT NULL,
  FanID INT NOT NULL,
  TeamName VARCHAR(255), -- NOT NULL if team specific ticket
  StadiumName VARCHAR(255), -- NOT NULL if venue specific ticket
  SeatPavillion INT NOT NULL,
  SeatLevel INT NOT NULL,
  SeatBlock VARCHAR(255) NOT NULL,
  SeatRow INT NOT NULL,
  SeatNumber INT NOT NULL,
  SeatStadiumName INT NOT NULL,
  CCNumber INT,
  PRIMARY KEY (TicketID),
  FOREIGN KEY (FanID) REFERENCES CUSTOMER(FanID) on update cascade on delete cascade,
  FOREIGN KEY (TeamName) REFERENCES TEAM(TeamName) on update cascade on delete cascade,
  FOREIGN KEY (StadiumName) REFERENCES STADIUM(Name) on update cascade on delete cascade,
  FOREIGN KEY (SeatPavillion, SeatLevel, SeatBlock, SeatRow, SeatNumber, SeatStadiumName) REFERENCES SEAT(Pavillion, Level, Block, Row, SeatNumber, StadiumName) on update cascade on delete cascade,
  FOREIGN KEY (CCNumber) REFERENCES CCDetails(CCNumber) on update cascade on delete cascade
)Engine=InnoDB;

CREATE TABLE Plays_in
(
  TeamName VARCHAR(255) NOT NULL,
  MatchNumber INT NOT NULL,
  PRIMARY KEY (TeamName, MatchNumber),
  FOREIGN KEY (TeamName) REFERENCES TEAM(TeamName) on update cascade on delete cascade,
  FOREIGN KEY (MatchNumber) REFERENCES MATCH(MatchNumber) on update cascade on delete cascade
)Engine=InnoDB;

CREATE TABLE Is_for
(
  MatchNumber INT NOT NULL,
  TicketID INT NOT NULL,
  PRIMARY KEY (MatchNumber, TicketID),
  FOREIGN KEY (MatchNumber) REFERENCES MATCH(MatchNumber) on update cascade on delete cascade,
  FOREIGN KEY (TicketID) REFERENCES TICKET(TicketID) on update cascade on delete cascade
)Engine=InnoDB;