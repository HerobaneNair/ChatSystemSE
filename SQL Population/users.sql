-- TRUNCATE TABLE Users;

-- Creating the users from Alice to Zach with corresponding password_hash
INSERT INTO Users (username, password_hash)
VALUES 
  ('Alice', 'Alice1'),
  ('Bob', 'Bob2'),
  ('Charlie', 'Charlie3'),
  ('David', 'David4'),
  ('Eve', 'Eve5'),
  ('Frank', 'Frank6'),
  ('Grace', 'Grace7'),
  ('Hannah', 'Hannah8'),
  ('Ivy', 'Ivy9'),
  ('Jack', 'Jack10'),
  ('Katherine', 'Katherine11'),
  ('Liam', 'Liam12'),
  ('Mia', 'Mia13'),
  ('Nina', 'Nina14'),
  ('Oliver', 'Oliver15'),
  ('Paul', 'Paul16'),
  ('Quincy', 'Quincy17'),
  ('Rachel', 'Rachel18'),
  ('Sam', 'Sam19'),
  ('Tom', 'Tom20'),
  ('Ursula', 'Ursula21'),
  ('Victor', 'Victor22'),
  ('Wendy', 'Wendy23'),
  ('Xander', 'Xander24'),
  ('Yara', 'Yara25'),
  ('Zach', 'Zach26');

-- SELECT * FROM Users