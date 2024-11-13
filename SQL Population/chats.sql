-- TRUNCATE TABLE Message
-- TRUNCATE TABLE CHATS

-- Insert 20 dummy messages between Alice (uuid=1) and Bob (uuid=2) in a single chat
-- First, create a chat between Alice and Bob (user1_id = 1, user2_id = 2)
INSERT INTO Chats (user1_id, user2_id) VALUES (1, 2);

-- Get the chat_id of the newly created chat
SET @chat_id = LAST_INSERT_ID();

-- Insert messages alternating between Alice (sender_id=1) and Bob (sender_id=2)
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'I think pancakes are way better than waffles.'),
    (@chat_id, 2, 'No way, waffles have that perfect crispy texture.'),
    (@chat_id, 1, 'But pancakes are so fluffy and delicious!'),
    (@chat_id, 2, 'Waffles hold syrup so well in the little pockets!'),
    (@chat_id, 1, 'Pancakes soak up the syrup. Isn\'t that better?'),
    (@chat_id, 2, 'I don\'t know... but waffles just feel more structured.'),
    (@chat_id, 1, 'True, but pancakes are easier to make.'),
    (@chat_id, 2, 'Easier doesn\'t mean tastier!'),
    (@chat_id, 1, 'I just love the simplicity of pancakes.'),
    (@chat_id, 2, 'Waffles can be simple too, plus you can add toppings!'),
    (@chat_id, 1, 'Pancakes with fruit are unbeatable though.'),
    (@chat_id, 2, 'Waffles with whipped cream and strawberries are amazing.'),
    (@chat_id, 1, 'I\'ll admit, that sounds pretty good.'),
    (@chat_id, 2, 'See! Waffles might just be better.'),
    (@chat_id, 1, 'I still think pancakes are classic.'),
    (@chat_id, 2, 'Waffles feel more like a treat though.'),
    (@chat_id, 1, 'Both are delicious, but pancakes are comfort food.'),
    (@chat_id, 2, 'Maybe we can agree they\'re both great breakfast choices.'),
    (@chat_id, 1, 'Okay, I can settle for that!'),
    (@chat_id, 2, 'Deal! Pancakes and waffles for everyone.');

-- SELECT * FROM MESSAGE
-- SELECT * FROM CHATS