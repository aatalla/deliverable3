CREATE TABLE CUSTOMER
(
  CustDOB DATE NOT NULL,
  CustTelNumber INT NOT NULL,
  CustFanID INT NOT NULL,
  CustEmail VARCHAR(255) NOT NULL,
  CustNationality VARCHAR(255) NOT NULL,
  CustFname VARCHAR(255) NOT NULL,
  CustLName VARCHAR(255) NOT NULL,
  CustPassword VARCHAR(255) NOT NULL,
  CustAddress VARCHAR(255) NOT NULL,
  PRIMARY KEY (CustFanID)
)Engine=InnoDB;

CREATE TABLE CCDetails
(
  CCType VARCHAR(255) NOT NULL,
  CCNumber VARCHAR(16) NOT NULL,
  CCV INT NOT NULL,
  CCFname VARCHAR(255) NOT NULL,
  CCLname VARCHAR(255) NOT NULL,
  CCExpiryMonth INT NOT NULL,
  CCExpiryYear INT(4) NOT NULL,
  FanID INT NOT NULL,
  PRIMARY KEY (CCNumber),
  FOREIGN KEY (FanID) REFERENCES CUSTOMER(CustFanID) on update cascade on delete cascade,
  CHECK (CCExpiryMonth > 0 AND CCExpiryMonth < 13), -- Months are from 1 to 12
  CHECK (CCExpiryYear > 2020 AND CCExpiryYear < 9999) -- Card must have valid expiry (> 2020) and it cannot be more than 4 digits (hence < 9999)
)Engine=InnoDB;

CREATE TABLE STADIUM
(
  Category1Capacity INT NOT NULL,
  Category2Capacity INT NOT NULL,
  StadiumName VARCHAR(255) NOT NULL,
  StadiumAddress VARCHAR(255) NOT NULL,
  StadiumCity VARCHAR(255) NOT NULL,
  Category3Capacity INT NOT NULL,
  Category4Capacity INT NOT NULL,
  PRIMARY KEY (StadiumName)
)Engine=InnoDB;

CREATE TABLE TEAM
(
  TeamName VARCHAR(255) NOT NULL,
  PRIMARY KEY (TeamName)
)Engine=InnoDB;

CREATE TABLE GUEST
(
  GuestFanID INT NOT NULL,
  GuestNationalty VARCHAR(255) NOT NULL,
  GuestDOB DATE NOT NULL,
  GuestFname VARCHAR(255) NOT NULL,
  GuestLname VARCHAR(255) NOT NULL,
  CustFanID INT NOT NULL,
  PRIMARY KEY (GuestFanID),
  FOREIGN KEY (CustFanID) REFERENCES CUSTOMER(CustFanID) on update cascade on delete cascade
)Engine=InnoDB;

CREATE TABLE FOOTBALL_MATCH
(
  KickOffDate DATE NOT NULL, -- Date format is YYYY-MM-DD
  KickOffTime TIME NOT NULL, -- Time format is hh:mm:ss
  MatchNumber INT NOT NULL,
  Team1 VARCHAR(255) NOT NULL,
  Team2 VARCHAR(255) NOT NULL,
  StadiumName VARCHAR(255) NOT NULL,
  PRIMARY KEY (MatchNumber),
  FOREIGN KEY (StadiumName) REFERENCES STADIUM(StadiumName) on update cascade on delete cascade,
  CHECK (MatchNumber >= 1 AND MatchNumber <= 65) -- 64 matches are played in FIFA World Cup, so matchnumber can be between 1 and 65 
)Engine=InnoDB;

CREATE TABLE SEAT
(
  SeatCategory INT NOT NULL,
  SeatPavillion INT NOT NULL,
  SeatLevel INT NOT NULL,
  SeatPrice INT NOT NULL,
  SeatBlock VARCHAR(255) NOT NULL,
  SeatRow INT NOT NULL,
  SeatNumber INT NOT NULL,
  StadiumName VARCHAR(255) NOT NULL,
  PRIMARY KEY (SeatCategory, SeatPavillion, SeatLevel, SeatBlock, SeatRow, SeatNumber, StadiumName, SeatPrice),
  FOREIGN KEY (StadiumName) REFERENCES STADIUM(StadiumName) on update cascade on delete cascade,
  CHECK (SeatCategory >= 1 AND SeatCategory <= 4), -- There are 4 categories only
  CHECK (SeatPavillion > 0 AND SeatLevel > 0 AND SeatRow > 0 AND SeatNumber > 0) -- These columns cannot be negative
)Engine=InnoDB;

CREATE TABLE TICKET
(
  TicketID VARCHAR(255) NOT NULL,
  SeatCategory INT NOT NULL,
  TicketType VARCHAR(255) NOT NULL,
  Price INT NOT NULL,
  FanID INT NOT NULL,
  TeamName VARCHAR(255), -- NOT NULL if team specific ticket
  SpecificStadiumName VARCHAR(255), -- NOT NULL if venue specific ticket
  SeatPavillion INT NOT NULL,
  SeatLevel INT NOT NULL,
  SeatBlock VARCHAR(255) NOT NULL,
  SeatRow INT NOT NULL,
  SeatNumber INT NOT NULL,
  StadiumName VARCHAR(255) NOT NULL,
  CCNumber VARCHAR(16), -- Can pay in cash
  PRIMARY KEY (TicketID),
  FOREIGN KEY (FanID) REFERENCES CUSTOMER(CustFanID) on update cascade on delete cascade,
  FOREIGN KEY (TeamName) REFERENCES TEAM(TeamName) on update cascade on delete cascade,
  FOREIGN KEY (StadiumName) REFERENCES STADIUM(StadiumName) on update cascade on delete cascade,
  FOREIGN KEY (SeatCategory, SeatPavillion, SeatLevel, SeatBlock, SeatRow, SeatNumber, StadiumName, Price) REFERENCES SEAT(SeatCategory, SeatPavillion, SeatLevel, SeatBlock, SeatRow, SeatNumber, StadiumName, SeatPrice) on update cascade on delete cascade,
  FOREIGN KEY (CCNumber) REFERENCES CCDetails(CCNumber) on update cascade on delete cascade
)Engine=InnoDB;

CREATE TABLE Plays_in
(
  TeamName VARCHAR(255) NOT NULL,
  MatchNumber INT NOT NULL,
  PRIMARY KEY (TeamName, MatchNumber),
  FOREIGN KEY (TeamName) REFERENCES TEAM(TeamName) on update cascade on delete cascade,
  FOREIGN KEY (MatchNumber) REFERENCES FOOTBALL_MATCH(MatchNumber) on update cascade on delete cascade
)Engine=InnoDB;

CREATE TABLE Is_for
(
  MatchNumber INT NOT NULL,
  TicketID VARCHAR(255) NOT NULL,
  PRIMARY KEY (MatchNumber, TicketID),
  FOREIGN KEY (MatchNumber) REFERENCES FOOTBALL_MATCH(MatchNumber) on update cascade on delete cascade,
  FOREIGN KEY (TicketID) REFERENCES TICKET(TicketID) on update cascade on delete cascade
)Engine=InnoDB;