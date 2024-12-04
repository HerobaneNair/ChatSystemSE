-- Clear existing data
TRUNCATE TABLE Message;
TRUNCATE TABLE Chats;

-- Create chat and messages for users 2-20 with user 1
INSERT INTO Chats (user1_id, user2_id) VALUES (1, 2);
SET @chat_id = LAST_INSERT_ID();
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'Have you tried that new Italian restaurant downtown?'),
    (@chat_id, 2, 'Not yet, is it any good?'),
    (@chat_id, 1, 'The pasta is amazing! You should definitely try it.'),
    (@chat_id, 2, 'What did you order there?'),
    (@chat_id, 1, 'I had the fettuccine alfredo, it was perfect.'),
    (@chat_id, 2, 'I love a good alfredo! Maybe this weekend?'),
    (@chat_id, 1, 'Yes! Let me know when you want to go.'),
    (@chat_id, 2, 'How about Saturday at 7?'),
    (@chat_id, 1, 'Sounds perfect! Should we invite others?'),
    (@chat_id, 2, 'Good idea, I can ask Sarah and Mike.'),
    (@chat_id, 1, 'Great! The more the merrier.'),
    (@chat_id, 2, 'I will make a reservation for 4 then.'),
    (@chat_id, 1, 'Perfect! Looking forward to it.'),
    (@chat_id, 2, 'Me too! Their menu looked great online.'),
    (@chat_id, 1, 'Oh, try the tiramisu for dessert!'),
    (@chat_id, 2, 'I definitely will! Love tiramisu.'),
    (@chat_id, 1, 'The serving size is huge too.'),
    (@chat_id, 2, 'Even better! Cannot wait for Saturday.'),
    (@chat_id, 1, 'See you then!'),
    (@chat_id, 2, 'Bye!');

INSERT INTO Chats (user1_id, user2_id) VALUES (1, 3);
SET @chat_id = LAST_INSERT_ID();
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'Did you catch the game last night?'),
    (@chat_id, 3, 'Yeah, what an amazing finish!'),
    (@chat_id, 1, 'That last-minute goal was incredible.'),
    (@chat_id, 3, 'I could not believe it went in!'),
    (@chat_id, 1, 'The crowd went absolutely wild.'),
    (@chat_id, 3, 'Best game I have watched this season.'),
    (@chat_id, 1, 'Are you watching the next match?'),
    (@chat_id, 3, 'Definitely! Want to watch together?'),
    (@chat_id, 1, 'Sure! My place or yours?'),
    (@chat_id, 3, 'I can host, I have got the big screen.'),
    (@chat_id, 1, 'Perfect! I will bring snacks.'),
    (@chat_id, 3, 'Cool, I will get some drinks.'),
    (@chat_id, 1, 'What time does it start?'),
    (@chat_id, 3, 'Kickoff is at 8:30.'),
    (@chat_id, 1, 'I will come by around 8 then.'),
    (@chat_id, 3, 'Sounds good! Cannot wait.'),
    (@chat_id, 1, 'Should be another great match.'),
    (@chat_id, 3, 'Hope we win this one too!'),
    (@chat_id, 1, 'We have got a good chance.'),
    (@chat_id, 3, 'See you tomorrow!');

INSERT INTO Chats (user1_id, user2_id) VALUES (1, 4);
SET @chat_id = LAST_INSERT_ID();
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'Hows the new job going?'),
    (@chat_id, 4, 'Really well! The team is great.'),
    (@chat_id, 1, 'Thats awesome! What projects are you working on?'),
    (@chat_id, 4, 'Mostly web development right now.'),
    (@chat_id, 1, 'Frontend or backend?'),
    (@chat_id, 4, 'Full stack, but focusing on frontend.'),
    (@chat_id, 1, 'Nice! Using any new technologies?'),
    (@chat_id, 4, 'Yeah, learning React and TypeScript.'),
    (@chat_id, 1, 'Those are great skills to have!'),
    (@chat_id, 4, 'Definitely! The learning curve is worth it.'),
    (@chat_id, 1, 'Hows the work-life balance?'),
    (@chat_id, 4, 'Pretty good, flexible hours help.'),
    (@chat_id, 1, 'Thats important! Glad its working out.'),
    (@chat_id, 4, 'Me too! Way better than my last job.'),
    (@chat_id, 1, 'We should celebrate soon!'),
    (@chat_id, 4, 'Definitely! Coffee this weekend?'),
    (@chat_id, 1, 'Perfect! Saturday morning?'),
    (@chat_id, 4, 'Works for me! The usual place?'),
    (@chat_id, 1, 'Yes, 10am good for you?'),
    (@chat_id, 4, 'See you then!');

INSERT INTO Chats (user1_id, user2_id) VALUES (1, 5);
SET @chat_id = LAST_INSERT_ID();
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'Ready for the hiking trip?'),
    (@chat_id, 5, 'Almost! Just need to pack my gear.'),
    (@chat_id, 1, 'Dont forget extra water!'),
    (@chat_id, 5, 'Good reminder! Weather looks perfect.'),
    (@chat_id, 1, 'Yeah, sunny but not too hot.'),
    (@chat_id, 5, 'Did you check the trail map?'),
    (@chat_id, 1, 'Yes, its about 8 miles round trip.'),
    (@chat_id, 5, 'Perfect distance for a day hike.'),
    (@chat_id, 1, 'Should we pack lunch?'),
    (@chat_id, 5, 'Definitely! I will bring sandwiches.'),
    (@chat_id, 1, 'I will bring trail mix and fruit.'),
    (@chat_id, 5, 'Great! What time should we start?'),
    (@chat_id, 1, 'Early is better, maybe 7am?'),
    (@chat_id, 5, 'Sounds good! I will pick you up.'),
    (@chat_id, 1, 'Perfect! Are we taking the north trail?'),
    (@chat_id, 5, 'Yes, I heard the views are amazing.'),
    (@chat_id, 1, 'Cannot wait to see them!'),
    (@chat_id, 5, 'Dont forget your camera!'),
    (@chat_id, 1, 'Already charged and packed!'),
    (@chat_id, 5, 'This will be awesome!');

INSERT INTO Chats (user1_id, user2_id) VALUES (1, 6);
SET @chat_id = LAST_INSERT_ID();
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'How was your vacation?'),
    (@chat_id, 6, 'Amazing! The beaches were perfect.'),
    (@chat_id, 1, 'Did you try snorkeling?'),
    (@chat_id, 6, 'Yes! Saw so many colorful fish.'),
    (@chat_id, 1, 'That sounds incredible!'),
    (@chat_id, 6, 'It was! The coral reefs were beautiful.'),
    (@chat_id, 1, 'Did you take any photos?'),
    (@chat_id, 6, 'Tons! I will show you at dinner.'),
    (@chat_id, 1, 'Cannot wait to see them!'),
    (@chat_id, 6, 'The sunset pictures are stunning.'),
    (@chat_id, 1, 'How was the local food?'),
    (@chat_id, 6, 'Delicious! Lots of fresh seafood.'),
    (@chat_id, 1, 'Brought any souvenirs?'),
    (@chat_id, 6, 'Yes, got you something special!'),
    (@chat_id, 1, 'You did not have to!'),
    (@chat_id, 6, 'I wanted to! You will love it.'),
    (@chat_id, 1, 'Thanks! When are you free?'),
    (@chat_id, 6, 'Tomorrow evening work?'),
    (@chat_id, 1, 'Perfect! Your place?'),
    (@chat_id, 6, 'Yes, come by at 7!');

INSERT INTO Chats (user1_id, user2_id) VALUES (1, 7);
SET @chat_id = LAST_INSERT_ID();
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'Book club meeting tomorrow?'),
    (@chat_id, 7, 'Yes! Did you finish the book?'),
    (@chat_id, 1, 'Just finished it last night!'),
    (@chat_id, 7, 'What did you think of the ending?'),
    (@chat_id, 1, 'Did not see that twist coming!'),
    (@chat_id, 7, 'Me neither! So well written.'),
    (@chat_id, 1, 'The character development was amazing.'),
    (@chat_id, 7, 'Especially the main characters arc.'),
    (@chat_id, 1, 'Whats next months book?'),
    (@chat_id, 7, 'We are voting tomorrow.'),
    (@chat_id, 1, 'Any good suggestions?'),
    (@chat_id, 7, 'I have a few in mind.'),
    (@chat_id, 1, 'Cannot wait to hear them!'),
    (@chat_id, 7, 'Bringing snacks tomorrow?'),
    (@chat_id, 1, 'Yes, will bring cookies!'),
    (@chat_id, 7, 'Perfect! See you then!'),
    (@chat_id, 1, 'Looking forward to it!'),
    (@chat_id, 7, 'Me too! Should be fun!'),
    (@chat_id, 1, 'What time again?'),
    (@chat_id, 7, 'Seven PM at my place!');
INSERT INTO Chats (user1_id, user2_id) VALUES (1, 8);
SET @chat_id = LAST_INSERT_ID();
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'Are you going to the concert next week?'),
    (@chat_id, 8, 'Yes! I got tickets yesterday!'),
    (@chat_id, 1, 'Which section are you in?'),
    (@chat_id, 8, 'Section B, row 10!'),
    (@chat_id, 1, 'No way! Im in row 11!'),
    (@chat_id, 8, 'That is awesome! We can meet up!'),
    (@chat_id, 1, 'Definitely! Getting there early?'),
    (@chat_id, 8, 'Yeah, want to grab food first?'),
    (@chat_id, 1, 'Good idea! That new burger place?'),
    (@chat_id, 8, 'Perfect! Meet at 6?'),
    (@chat_id, 1, 'Works for me! Cannot wait!'),
    (@chat_id, 8, 'Have you seen them live before?'),
    (@chat_id, 1, 'Never! First time!'),
    (@chat_id, 8, 'They are amazing live!'),
    (@chat_id, 1, 'So excited!'),
    (@chat_id, 8, 'The light show is incredible!'),
    (@chat_id, 1, 'Heard they play for 3 hours!'),
    (@chat_id, 8, 'Yeah, full setlist plus encore!'),
    (@chat_id, 1, 'Best concert of the year!'),
    (@chat_id, 8, 'For sure! See you Tuesday!');

INSERT INTO Chats (user1_id, user2_id) VALUES (1, 9);
SET @chat_id = LAST_INSERT_ID();
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'How is the gardening going?'),
    (@chat_id, 9, 'Great! Tomatoes are growing well!'),
    (@chat_id, 1, 'When will they be ready?'),
    (@chat_id, 9, 'Probably in two weeks!'),
    (@chat_id, 1, 'Save some for me!'),
    (@chat_id, 9, 'Of course! The herbs are ready now.'),
    (@chat_id, 1, 'Which ones did you plant?'),
    (@chat_id, 9, 'Basil, mint, and rosemary.'),
    (@chat_id, 1, 'Perfect for cooking!'),
    (@chat_id, 9, 'Want some basil for pizza?'),
    (@chat_id, 1, 'Yes please! So much better fresh!'),
    (@chat_id, 9, 'Come by tomorrow to pick some!'),
    (@chat_id, 1, 'Thanks! Need gardening help?'),
    (@chat_id, 9, 'Could use help with weeding!'),
    (@chat_id, 1, 'Happy to help next weekend!'),
    (@chat_id, 9, 'Thanks! Will make lunch for us!'),
    (@chat_id, 1, 'Sounds like a plan!'),
    (@chat_id, 9, 'The zucchini will be ready too!'),
    (@chat_id, 1, 'Your garden is amazing!'),
    (@chat_id, 9, 'Thanks to all your help!');

INSERT INTO Chats (user1_id, user2_id) VALUES (1, 10);
SET @chat_id = LAST_INSERT_ID();
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'Ready for game night?'),
    (@chat_id, 10, 'Yes! Which games are we playing?'),
    (@chat_id, 1, 'Brought Monopoly and Uno!'),
    (@chat_id, 10, 'Great! I have Cards Against Humanity.'),
    (@chat_id, 1, 'Perfect! Who else is coming?'),
    (@chat_id, 10, 'Mark and Lisa confirmed.'),
    (@chat_id, 1, 'Should we order pizza?'),
    (@chat_id, 10, 'Already on it! The usual?'),
    (@chat_id, 1, 'You know it! Extra cheese!'),
    (@chat_id, 10, 'And garlic bread?'),
    (@chat_id, 1, 'Obviously! Starting at 7?'),
    (@chat_id, 10, 'Yep! Everyone confirmed.'),
    (@chat_id, 1, 'Need me to bring anything?'),
    (@chat_id, 10, 'Just drinks if you want!'),
    (@chat_id, 1, 'Will grab some sodas.'),
    (@chat_id, 10, 'Perfect! All set then!'),
    (@chat_id, 1, 'This will be fun!'),
    (@chat_id, 10, 'Last time was hilarious!'),
    (@chat_id, 1, 'No mercy in Monopoly!'),
    (@chat_id, 10, 'Game on! See you at 7!');

INSERT INTO Chats (user1_id, user2_id) VALUES (1, 11);
SET @chat_id = LAST_INSERT_ID();
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'Gym session tomorrow?'),
    (@chat_id, 11, 'Yes! Leg day?'),
    (@chat_id, 1, 'Sounds good! Early morning?'),
    (@chat_id, 11, '6 AM as usual?'),
    (@chat_id, 1, 'Perfect! Need a ride?'),
    (@chat_id, 11, 'Yes please! Still car shopping.'),
    (@chat_id, 1, 'No problem! Will pick you up at 5:45.'),
    (@chat_id, 11, 'Thanks! Found any good deals?'),
    (@chat_id, 1, 'Saw some on AutoTrader.'),
    (@chat_id, 11, 'Will check it out tonight.'),
    (@chat_id, 1, 'Let me know if you need help looking!'),
    (@chat_id, 11, 'Thanks! You know your cars!'),
    (@chat_id, 1, 'Happy to help! Ready for squats?'),
    (@chat_id, 11, 'Always! Going for a new PR!'),
    (@chat_id, 1, 'You got this! Will spot you.'),
    (@chat_id, 11, 'Thanks! Need to beat 225!'),
    (@chat_id, 1, 'Easy work! You will crush it!'),
    (@chat_id, 11, 'Hope so! See you tomorrow!'),
    (@chat_id, 1, 'Get good sleep!'),
    (@chat_id, 11, 'You too! Thanks again!');

INSERT INTO Chats (user1_id, user2_id) VALUES (1, 12);
SET @chat_id = LAST_INSERT_ID();
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'Photography class was great!'),
    (@chat_id, 12, 'Learn any new techniques?'),
    (@chat_id, 1, 'Yes! Long exposure shots!'),
    (@chat_id, 12, 'Those are tricky! Show me sometime?'),
    (@chat_id, 1, 'Sure! Want to practice together?'),
    (@chat_id, 12, 'Definitely! This weekend?'),
    (@chat_id, 1, 'Perfect! Sunrise shoot?'),
    (@chat_id, 12, 'Love it! Where should we go?'),
    (@chat_id, 1, 'The waterfall trail?'),
    (@chat_id, 12, 'Great idea! Lots of opportunities!'),
    (@chat_id, 1, 'Bring your tripod!'),
    (@chat_id, 12, 'Got it! ND filters too?'),
    (@chat_id, 1, 'Yes! Essential for waterfalls!'),
    (@chat_id, 12, 'This will be fun!'),
    (@chat_id, 1, 'Meet at parking lot?'),
    (@chat_id, 12, 'Yes! 5:30 AM sharp!'),
    (@chat_id, 1, 'Will bring coffee!'),
    (@chat_id, 12, 'My hero! See you then!'),
    (@chat_id, 1, 'Weather should be perfect!'),
    (@chat_id, 12, 'Fingers crossed for clouds!');

INSERT INTO Chats (user1_id, user2_id) VALUES (1, 13);
SET @chat_id = LAST_INSERT_ID();
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'Cooking class tonight?'),
    (@chat_id, 13, 'Yes! Making pasta from scratch!'),
    (@chat_id, 1, 'Excited to learn that!'),
    (@chat_id, 13, 'Me too! Fresh pasta is the best!'),
    (@chat_id, 1, 'What sauce are we making?'),
    (@chat_id, 13, 'Classic marinara I think.'),
    (@chat_id, 1, 'Perfect! Basic but important!'),
    (@chat_id, 13, 'Exactly! Foundation recipe.'),
    (@chat_id, 1, 'Need to carpool?'),
    (@chat_id, 13, 'Please! Parking is terrible.'),
    (@chat_id, 1, 'Will pick you up at 6!'),
    (@chat_id, 13, 'Thanks! Class starts at 6:30.'),
    (@chat_id, 1, 'Plenty of time then!'),
    (@chat_id, 13, 'Bringing containers?'),
    (@chat_id, 1, 'Yes! For leftovers!'),
    (@chat_id, 13, 'Smart! Always too much food!'),
    (@chat_id, 1, 'Thats the best part!'),
    (@chat_id, 13, 'Lunch tomorrow sorted!'),
    (@chat_id, 1, 'Exactly! See you at 6!'),
    (@chat_id, 13, 'Cannot wait! Thanks!');

INSERT INTO Chats (user1_id, user2_id) VALUES (1, 14);
SET @chat_id = LAST_INSERT_ID();
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'Movie night still on?'),
    (@chat_id, 14, 'Yes! Found any good ones?'),
    (@chat_id, 1, 'That new sci-fi looks cool!'),
    (@chat_id, 14, 'Reviews are great too!'),
    (@chat_id, 1, 'Showtime at 8:30?'),
    (@chat_id, 14, 'Perfect! Dinner before?'),
    (@chat_id, 1, 'Sure! The new Thai place?'),
    (@chat_id, 14, 'Heard good things about it!'),
    (@chat_id, 1, 'Meet there at 7?'),
    (@chat_id, 14, 'Works for me! Reserved tickets?'),
    (@chat_id, 1, 'Doing it now! Center seats?'),
    (@chat_id, 14, 'Yes please! Not too close.'),
    (@chat_id, 1, 'Got them! Row J center!'),
    (@chat_id, 14, 'Perfect spot! Thanks!'),
    (@chat_id, 1, 'Want butter on popcorn?'),
    (@chat_id, 14, 'Always! Extra butter!'),
    (@chat_id, 1, 'Noted! See you at 7!'),
    (@chat_id, 14, 'Cannot wait! Been ages!'),
    (@chat_id, 1, 'Too long! Missed movie nights!'),
    (@chat_id, 14, 'Same! See you then!');

INSERT INTO Chats (user1_id, user2_id) VALUES (1, 15);
SET @chat_id = LAST_INSERT_ID();
INSERT INTO Message (chat_id, sender_id, content) VALUES
    (@chat_id, 1, 'Tennis tomorrow morning?'),
    (@chat_id, 15, 'Weather looks perfect for it!'),
    (@chat_id, 1, 'Usual court at 9?'),
    (@chat_id, 15, 'Booked it already!'),
    (@chat_id, 1, 'Awesome! Bringing new racket?'),
    (@chat_id, 15, 'Yes! Need to break it in!'),
    (@chat_id, 1, 'How does it feel so far?'),
    (@chat_id, 15, 'Great! Better control!'),
    (@chat_id, 1, 'Nice! Ready to lose?'),
    (@chat_id, 15, 'In your dreams! Been practicing!'),
    (@chat_id, 1, 'Bring your A game then!'),
    (@chat_id, 15, 'Always do! Best of three?'),
    (@chat_id, 1, 'You are on! Loser buys lunch?'),
    (@chat_id, 15, 'Deal! The usual place?'),
    (@chat_id, 1, 'Perfect! Their smoothies rock!'),
    (@chat_id, 15, 'Post-game fuel!'),
    (@chat_id, 1, 'Need new tennis balls?'),
    (@chat_id, 15, 'Got fresh ones yesterday!'),
    (@chat_id, 1, 'All set then! See you at 9!'),
    (@chat_id, 15, 'Bright and early! Ready to win!');

-- SELECT * FROM Users
-- SELECT * FROM Chats
-- SELECT * FROM Message