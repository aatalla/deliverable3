CREATE TABLE CUSTOMER
(
  DOB INT NOT NULL,
  TelNumber INT NOT NULL,
  FanID INT NOT NULL,
  Email INT NOT NULL,
  Nationality INT NOT NULL,
  Fname INT NOT NULL,
  LName INT NOT NULL,
  Password INT NOT NULL,
  Address INT NOT NULL,
  PRIMARY KEY (FanID)
)Engine=InnoDB;

CREATE TABLE CCDetails
(
  CCType INT NOT NULL,
  CCNumber INT NOT NULL,
  CCFname INT NOT NULL,
  CCLname INT NOT NULL,
  CCExpiryMonth INT NOT NULL,
  CCExpiryYear INT NOT NULL,
  FanID INT NOT NULL,
  PRIMARY KEY (CCNumber),
  FOREIGN KEY (FanID) REFERENCES CUSTOMER(FanID)
)Engine=InnoDB;

CREATE TABLE STADIUM
(
  Category1Capacity INT NOT NULL,
  Category2Capacity INT NOT NULL,
  Name INT NOT NULL,
  Address INT NOT NULL,
  City INT NOT NULL,
  Category3Capacity INT NOT NULL,
  Category4Capacity INT NOT NULL,
  PRIMARY KEY (Name)
)Engine=InnoDB;

CREATE TABLE TEAM
(
  TeamName INT NOT NULL,
  PRIMARY KEY (TeamName)
)Engine=InnoDB;

CREATE TABLE GUEST
(
  FanID INT NOT NULL,
  Nationalty INT NOT NULL,
  DOB INT NOT NULL,
  Fname INT NOT NULL,
  Lname INT NOT NULL,
  FanID INT NOT NULL,
  PRIMARY KEY (FanID),
  FOREIGN KEY (FanID) REFERENCES CUSTOMER(FanID)
)Engine=InnoDB;

CREATE TABLE MATCH
(
  KickOffDate INT NOT NULL,
  KickOffTime INT NOT NULL,
  MatchNumber INT NOT NULL,
  Team1 INT NOT NULL,
  Team2 INT NOT NULL,
  Name INT NOT NULL,
  PRIMARY KEY (MatchNumber),
  FOREIGN KEY (Name) REFERENCES STADIUM(Name)
)Engine=InnoDB;

CREATE TABLE SEAT
(
  Category INT NOT NULL,
  Pavillion INT NOT NULL,
  Level INT NOT NULL,
  Block INT NOT NULL,
  Row INT NOT NULL,
  SeatNumber INT NOT NULL,
  Name INT NOT NULL,
  PRIMARY KEY (Pavillion, Level, Block, Row, SeatNumber, Name),
  FOREIGN KEY (Name) REFERENCES STADIUM(Name)
)Engine=InnoDB;

CREATE TABLE TICKET
(
  TicketID INT NOT NULL,
  Cateogry INT NOT NULL,
  TicketType INT NOT NULL,
  Price INT NOT NULL,
  FanID INT NOT NULL,
  BooksFanID INT NOT NULL,
  TeamName INT,
  Name INT,
  Pavillion INT NOT NULL,
  Level INT NOT NULL,
  Block INT NOT NULL,
  Row INT NOT NULL,
  SeatNumber INT NOT NULL,
  Name INT NOT NULL,
  CCNumber INT,
  PRIMARY KEY (TicketID),
  FOREIGN KEY (FanID) REFERENCES CUSTOMER(FanID),
  FOREIGN KEY (BooksFanID) REFERENCES CUSTOMER(FanID),
  FOREIGN KEY (TeamName) REFERENCES TEAM(TeamName),
  FOREIGN KEY (Name) REFERENCES STADIUM(Name),
  FOREIGN KEY (Pavillion, Level, Block, Row, SeatNumber, Name) REFERENCES SEAT(Pavillion, Level, Block, Row, SeatNumber, Name),
  FOREIGN KEY (CCNumber) REFERENCES CCDetails(CCNumber)
)Engine=InnoDB;

CREATE TABLE Plays_in
(
  TeamName INT NOT NULL,
  MatchNumber INT NOT NULL,
  PRIMARY KEY (TeamName, MatchNumber),
  FOREIGN KEY (TeamName) REFERENCES TEAM(TeamName),
  FOREIGN KEY (MatchNumber) REFERENCES MATCH(MatchNumber)
)Engine=InnoDB;

CREATE TABLE Is_for
(
  MatchNumber INT NOT NULL,
  TicketID INT NOT NULL,
  PRIMARY KEY (MatchNumber, TicketID),
  FOREIGN KEY (MatchNumber) REFERENCES MATCH(MatchNumber),
  FOREIGN KEY (TicketID) REFERENCES TICKET(TicketID)
)Engine=InnoDB;