-- DROP TABLE IF EXISTS Message, Chats, Users; 
-- Above is only to recreate as needed
CREATE DATABASE IF NOT EXISTS chat_system
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

USE chat_system;

CREATE TABLE Users (
    uuid SERIAL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL
);

CREATE TABLE Chats (
    chat_id SERIAL PRIMARY KEY AUTO_INCREMENT,
    user1_id INT REFERENCES Users(uuid) ON DELETE CASCADE, 
    user2_id INT REFERENCES Users(uuid) ON DELETE CASCADE, 
    CONSTRAINT chk_users CHECK (user1_id <> user2_id),  -- Ensures two different users

    -- Storing for constraints
    user_pair_min INT GENERATED ALWAYS AS (LEAST(user1_id, user2_id)) STORED,
    user_pair_max INT GENERATED ALWAYS AS (GREATEST(user1_id, user2_id)) STORED,

    CONSTRAINT unique_user_pair UNIQUE (user_pair_min, user_pair_max)
);


CREATE TABLE Message (
    message_id SERIAL PRIMARY KEY AUTO_INCREMENT,       
    chat_id INT REFERENCES Chats(chat_id) ON DELETE CASCADE, 
    sender_id INT REFERENCES Users(uuid) ON DELETE CASCADE, 
    content TEXT
);

CREATE INDEX idx_username ON Users (username);