DROP TABLE IF EXISTS `User`;
DROP TABLE IF EXISTS Post;
DROP TABLE IF EXISTS Tag;
DROP TABLE IF EXISTS Comment;


CREATE TABLE `User` (
    userId              INT NOT NULL AUTO_INCREMENT,
    firstName           VARCHAR(40),
    lastName            VARCHAR(40),
    email               VARCHAR(50),
    phoneNum            VARCHAR(20),
    address             VARCHAR(50),
    city                VARCHAR(40),
    state               VARCHAR(20),
    postalCode          VARCHAR(20),
    country             VARCHAR(40),
    username            VARCHAR(100),
    password            VARCHAR(1000),
    isAdmin             VARCHAR(3),
    enabled             VARCHAR(3),
    PRIMARY KEY (userId)
);

CREATE TABLE Post (
    postId              INT NOT NULL AUTO_INCREMENT,
    postTitle           VARCHAR(100),
    content             VARCHAR(20000),
    postDate            DATE,
    likeCount           INT,
    postImage           VARCHAR(100),
    userId              INT,
    PRIMARY KEY (postId),
    FOREIGN KEY (userId) REFERENCES `User`(userId)
        ON UPDATE CASCADE ON DELETE CASCADE 
);

CREATE TABLE Tag (
    tagId               INT NOT NULL AUTO_INCREMENT,
    tagName             VARCHAR(50),
    PRIMARY KEY (tagId)
);

CREATE TABLE Related (
    tagId               INT NOT NULL AUTO_INCREMENT,
    postId              INT,
    FOREIGN KEY (tagId) REFERENCES Tag(tagId)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (postId) REFERENCES Post(postId)
        ON UPDATE CASCADE ON DELETE CASCADE 
);

CREATE TABLE Comment (
    commentId           INT NOT NULL AUTO_INCREMENT,
    content             VARCHAR(1000),
    commentDate         DATE,
    postId              INT,
    userId              INT,    
    PRIMARY KEY (commentId),
    FOREIGN KEY (postId) REFERENCES Post(postId)
        ON UPDATE CASCADE ON DELETE NO ACTION,
    FOREIGN KEY (userId) REFERENCES `User`(userId)
        ON UPDATE CASCADE ON DELETE NO ACTION
);

CREATE TABLE ContactUs (
    contactId           INT NOT NULL AUTO_INCREMENT,
    firstName           VARCHAR(40),
    lastName            VARCHAR(40),
    email               VARCHAR(100),
    message             VARCHAR(10000),   
    PRIMARY KEY (contactId)
);


INSERT INTO `User` (firstName, lastName, email, phoneNum, address, city, state, postalCode, country, username, password, isAdmin, enabled) VALUES ('Arnold', 'Anderson', 'a.anderson@gmail.com', '204-111-2222', '103 AnyWhere Street', 'Winnipeg', 'MB', 'R3X 45T', 'Canada', 'arnold' , '5f4dcc3b5aa765d61d8327deb882cf99', 'no', 'yes');
INSERT INTO `User` (firstName, lastName, email, phoneNum, address, city, state, postalCode, country, username, password, isAdmin, enabled) VALUES ('Bobby', 'Brown', 'bobby.brown@hotmail.ca', '572-342-8911', '222 Bush Avenue', 'Boston', 'MA', '22222', 'United States', 'bobby' , 'a9c4cef5735770e657b7c25b9dcb807b', 'yes', 'yes');
INSERT INTO `User` (firstName, lastName, email, phoneNum, address, city, state, postalCode, country, username, password, isAdmin, enabled) VALUES ('Candace', 'Cole', 'cole@charity.org', '333-444-5555', '333 Central Crescent', 'Chicago', 'IL', '33333', 'United States', 'candace' , '5f4dcc3b5aa765d61d8327deb882cf99', 'no', 'yes');
INSERT INTO `User` (firstName, lastName, email, phoneNum, address, city, state, postalCode, country, username, password, isAdmin, enabled) VALUES ('Darren', 'Doe', 'oe@doe.com', '250-807-2222', '444 Dover Lane', 'Kelowna', 'BC', 'V1V 2X9', 'Canada', 'darren' , '5f4dcc3b5aa765d61d8327deb882cf99', 'no', 'no');
INSERT INTO `User` (firstName, lastName, email, phoneNum, address, city, state, postalCode, country, username, password, isAdmin, enabled) VALUES ('Elizabeth', 'Elliott', 'engel@uiowa.edu', '555-666-7777', '555 Everwood Street', 'Iowa City', 'IA', '52241', 'United States', 'beth' , '5f4dcc3b5aa765d61d8327deb882cf99', 'no', 'yes');


INSERT INTO Tag (tagId, tagName) VALUES (1, "lifestyle");
INSERT INTO Tag (tagId, tagName) VALUES (2, "food");
INSERT INTO Tag (tagId, tagName) VALUES (3, "music");
INSERT INTO Tag (tagId, tagName) VALUES (4, "news");
INSERT INTO Tag (tagId, tagName) VALUES (5, "politics");
INSERT INTO Tag (tagId, tagName) VALUES (6, "covid");
INSERT INTO Tag (tagId, tagName) VALUES (7, "animals");


INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Power of videos', '2020-10-15 10:25:55', 5, 1, "../images/posts/1.jpg");
INSERT INTO Related (tagId, postId) VALUES (1, 1);
INSERT INTO Related (tagId, postId) VALUES (2, 1);
INSERT INTO Related (tagId, postId) VALUES (3, 1);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Professionality', '2020-10-16 18:00:00', 25, 1, "../images/posts/2.jpg");
INSERT INTO Related (tagId, postId) VALUES (1, 2);
INSERT INTO Related (tagId, postId) VALUES (4, 2);
INSERT INTO Related (tagId, postId) VALUES (5, 2);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Themes and styles', '2020-10-15 3:30:22', 47, 1, "../images/posts/3.jpg");
INSERT INTO Related (tagId, postId) VALUES (4, 3);
INSERT INTO Related (tagId, postId) VALUES (6, 3);
INSERT INTO Related (tagId, postId) VALUES (7, 3);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('New buttons', '2020-10-17 05:45:11', 35, 3, "../images/posts/4.jpg");
INSERT INTO Related (tagId, postId) VALUES (4, 4);
INSERT INTO Related (tagId, postId) VALUES (2, 4);
INSERT INTO Related (tagId, postId) VALUES (7, 4);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Easy reading', '2020-10-15 10:25:55', 48, 3, "../images/posts/5.jpg");
INSERT INTO Related (tagId, postId) VALUES (4, 5);
INSERT INTO Related (tagId, postId) VALUES (6, 5);
INSERT INTO Related (tagId, postId) VALUES (7, 5);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Quick brown fox', '2020-10-15 10:25:55', 26, 3, "../images/posts/6.jpg");
INSERT INTO Related (tagId, postId) VALUES (1, 6);
INSERT INTO Related (tagId, postId) VALUES (2, 6);
INSERT INTO Related (tagId, postId) VALUES (3, 6);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Heading styles', '2020-10-16 18:00:00', 53, 5, "../images/posts/7.jpg");
INSERT INTO Related (tagId, postId) VALUES (1, 7);
INSERT INTO Related (tagId, postId) VALUES (4, 7);
INSERT INTO Related (tagId, postId) VALUES (5, 7);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Stop reading before the end', '2020-10-15 3:30:22', 7, 5, "../images/posts/8.jpg");
INSERT INTO Related (tagId, postId) VALUES (4, 8);
INSERT INTO Related (tagId, postId) VALUES (2, 8);
INSERT INTO Related (tagId, postId) VALUES (7, 8);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Keyword searches', '2020-10-17 05:45:11', 19, 5, "../images/posts/9.jpg");
INSERT INTO Related (tagId, postId) VALUES (1, 9);
INSERT INTO Related (tagId, postId) VALUES (2, 9);
INSERT INTO Related (tagId, postId) VALUES (3, 9);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Element selections', '2020-10-15 10:29:55', 59, 4, "../images/posts/10.jpg");
INSERT INTO Related (tagId, postId) VALUES (4, 10);
INSERT INTO Related (tagId, postId) VALUES (6, 10);
INSERT INTO Related (tagId, postId) VALUES (7, 10);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Lorem ipsum', '2020-10-15 11:25:55', 7, 1, "../images/posts/11.jpg");
INSERT INTO Related (tagId, postId) VALUES (1, 11);
INSERT INTO Related (tagId, postId) VALUES (4, 11);
INSERT INTO Related (tagId, postId) VALUES (5, 11);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Pellentesque', '2020-10-16 18:56:20', 35, 1, "../images/posts/12.jpg");
INSERT INTO Related (tagId, postId) VALUES (4, 12);
INSERT INTO Related (tagId, postId) VALUES (2, 12);
INSERT INTO Related (tagId, postId) VALUES (7, 12);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Suspendisse', '2020-10-15 9:31:22', 27, 1, "../images/posts/13.jpg");
INSERT INTO Related (tagId, postId) VALUES (4, 13);
INSERT INTO Related (tagId, postId) VALUES (1, 13);
INSERT INTO Related (tagId, postId) VALUES (5, 13);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Nunc viverra', '2020-10-17 15:45:18', 45, 3, "../images/posts/14.jpg");
INSERT INTO Related (tagId, postId) VALUES (5, 14);
INSERT INTO Related (tagId, postId) VALUES (2, 14);
INSERT INTO Related (tagId, postId) VALUES (7, 14);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Donec laoreet', '2020-10-15 13:45:25', 38, 3, "../images/posts/15.jpg");
INSERT INTO Related (tagId, postId) VALUES (4, 15);
INSERT INTO Related (tagId, postId) VALUES (1, 15);
INSERT INTO Related (tagId, postId) VALUES (6, 15);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Laoreet nonummy', '2020-10-16 18:45:51', 27, 3, "../images/posts/16.jpg");
INSERT INTO Related (tagId, postId) VALUES (6, 16);
INSERT INTO Related (tagId, postId) VALUES (1, 16);
INSERT INTO Related (tagId, postId) VALUES (5, 16);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Mauris eget neque', '2020-10-16 12:26:48', 43, 5, "../images/posts/17.jpg");
INSERT INTO Related (tagId, postId) VALUES (4, 17);
INSERT INTO Related (tagId, postId) VALUES (6, 17);
INSERT INTO Related (tagId, postId) VALUES (5, 17);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Save time in Word', '2020-10-15 8:33:21', 9, 5, "../images/posts/18.jpg");
INSERT INTO Related (tagId, postId) VALUES (4, 18);
INSERT INTO Related (tagId, postId) VALUES (7, 18);
INSERT INTO Related (tagId, postId) VALUES (5, 18);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Lazy dog', '2020-10-17 11:25:13', 27, 5, "../images/posts/19.jpg");
INSERT INTO Related (tagId, postId) VALUES (6, 19);
INSERT INTO Related (tagId, postId) VALUES (1, 19);
INSERT INTO Related (tagId, postId) VALUES (7, 19);

INSERT INTO Post(postTitle, postDate, likeCount, userId, postImage) VALUES ('Heading changes', '2020-10-15 17:28:14', 67, 4, "../images/posts/20.jpg");
INSERT INTO Related (tagId, postId) VALUES (1, 20);
INSERT INTO Related (tagId, postId) VALUES (6, 20);
INSERT INTO Related (tagId, postId) VALUES (2, 20);


INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("That was great!", '2020-10-19 19:25:52', 1, 4);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("That was GOOD!", '2020-10-18 14:44:34', 1, 3);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("I did not like that.", '2020-10-19 13:43:37', 2, 4);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("I like that.", '2020-10-20 15:23:38', 2, 5);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("That is so stupid.", '2020-10-20 17:52:31', 3, 4);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("So good!", '2020-10-21 16:43:37', 3, 3);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Good work!", '2020-10-20 15:12:16', 4, 1);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("That was amazing!", '2020-10-19 17:23:51', 4, 4);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Good thoughts", '2020-10-18 14:32:41', 5, 4);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Nice effort!", '2020-10-19 14:43:43', 5, 5);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Good thoughts!", '2020-10-18 14:43:14', 6, 4);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Great effort.", '2020-10-19 21:23:47', 6, 1);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Mind blowing!", '2020-10-20 12:42:07', 7, 1);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("I loved that.", '2020-10-22 12:12:04', 7, 3);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Mind numbingly stupid!", '2020-10-20 11:33:40', 8, 3);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("You are a genius!", '2020-10-20 14:11:49', 8, 4);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Nerd!", '2020-10-20 14:22:48', 9, 3);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Had a good laugh.", '2020-10-20 13:32:11', 9, 1);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("NICE WORK!", '2020-10-20 16:23:12', 10, 1);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("You should post more often.", '2020-10-20 15:14:13', 10, 5);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("You are a genius.", '2020-10-20 17:51:25', 11, 3);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("You sound arrogant.", '2020-10-19 17:55:26', 11, 5);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Loved the personifications!", '2020-10-19 11:42:21', 12, 5);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Outstanding!", '2020-10-18 12:13:23', 12, 3);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Brilliant!", '2020-10-21 12:17:18', 13, 3);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Very good!", '2020-10-19 11:16:16', 13, 5);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("You suck.", '2020-10-20 14:32:13', 14, 1);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("I did not like that.", '2020-10-18 14:37:15', 14, 4);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Thanks for all the info.", '2020-10-19 15:47:25', 15, 5);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Woah! nice work.", '2020-10-20 13:49:42', 15, 1);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Crazy good.", '2020-10-19 16:59:32', 16, 1);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("You should post more than once a day!", '2020-10-18 14:38:52', 16, 5);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("How can someone write  like this?", '2020-10-19 20:43:53', 17, 3);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("I love your writing style!", '2020-10-20 19:18:42', 17, 1);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("I agree with that!", '2020-10-20 16:27:48', 18, 1);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Super good!", '2020-10-21 16:28:56', 18, 4);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("No good points.", '2020-10-19 4:15:43', 19, 1);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Love the image.", '2020-10-18 11:55:54', 19, 3);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Hahaha! been there.", '2020-10-19 9:29:22', 20, 5);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("You must be banned.", '2020-10-20 7:59:23', 20, 3);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Reported you.", '2020-10-21 5C:34:15', 1, 3);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Inspiring!", '2020-10-19 9:54:11', 3, 5);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("This opened my eyes.", '2020-10-18 12:25:12', 5, 1);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Absolutely wonderful.", '2020-10-20 11:47:54', 7, 3);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Good work!", '2020-10-21 13:26:34', 9, 1);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("I want more posts like this.", '2020-10-21 14:34:45', 11, 5);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("You should have more likes.", '2020-10-20 14:37:38', 13, 3);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Very nice!", '2020-10-18 14:48:14', 15, 5);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Worth the read.", '2020-10-19 13:15:37', 17, 1);
INSERT INTO Comment (content, commentDate, postId, userId) VALUES ("Great writing!", '2020-10-20 16:36:18', 19, 1);


UPDATE Post SET content = "Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document." WHERE postId = 1;
UPDATE Post SET content = "To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries." WHERE postId = 2;
UPDATE Post SET content = "Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme." WHERE postId = 3;
UPDATE Post SET content = "Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign." WHERE postId = 4;
UPDATE Post SET content = "Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device." WHERE postId = 5;
UPDATE Post SET content = "The quick brown fox jumps over the lazy dog. The quick brown fox jumps over the lazy dog. The quick brown fox jumps over the lazy dog." WHERE postId = 6;
UPDATE Post SET content = "When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them." WHERE postId = 7;
UPDATE Post SET content = "If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other." WHERE postId = 8;
UPDATE Post SET content = "You can also type a keyword to search online for the video that best fits your document. Themes and styles also help keep your document coordinated." WHERE postId = 9;
UPDATE Post SET content = "Click Insert and then choose the elements you want from the different galleries. The quick brown fox jumps over the lazy dog." WHERE postId = 10;
UPDATE Post SET content = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna." WHERE postId = 11;
UPDATE Post SET content = "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci." WHERE postId = 12;
UPDATE Post SET content = "Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy." WHERE postId = 13;
UPDATE Post SET content = "Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna." WHERE postId = 14;
UPDATE Post SET content = "Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci." WHERE postId = 15;
UPDATE Post SET content = "Donec laoreet nonummy augue. Nunc viverra imperdiet enim. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna." WHERE postId = 16;
UPDATE Post SET content = "Mauris eget neque at sem venenatis eleifend. Ut nonummy. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec laoreet nonummy augue." WHERE postId = 17;
UPDATE Post SET content = "Save time in Word with new buttons that show up where you need them. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna." WHERE postId = 18;
UPDATE Post SET content = "The quick brown fox jumps over the lazy dog.Donec laoreet nonummy augue. Nunc viverra imperdiet enim. Mauris eget neque at sem venenatis eleifend." WHERE postId = 19;
UPDATE Post SET content = "When you apply styles, your headings change to match the new theme. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas." WHERE postId = 20;

