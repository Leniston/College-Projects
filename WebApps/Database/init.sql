CREATE DATABASE webapp_db;

USE webapp_db;

    Create TABLE  users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        EMAIL VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

ALTER TABLE users
    ADD first_name VARCHAR(50) AFTER password,
ADD last_name VARCHAR(50) AFTER first_name,
ADD address TEXT AFTER last_name,
ADD contact_number VARCHAR(20) AFTER address;


USE webapp_db;

-- Create the products table
USE webapp_db;

CREATE TABLE products (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image_path VARCHAR(255),
    member_only BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Regular books from Shop.php identified with a 0
INSERT INTO products (title, author, description, price, image_path, member_only) VALUES
('Dubliners', 'James Joyce', 'A collection of short stories depicting the everyday life of Dublin\'s residents, capturing moments of epiphany and personal reflection.', 12.99, '/Views/Images/shop/dubliners.jpg', 0),
('Four Tragedies', 'William Shakespeare', 'A compilation of Shakespeare\'s tragic plays, exploring themes of ambition, jealousy, madness, and betrayal.', 12.99, '/Views/Images/shop/fours_tragedies.jpg', 0),
('The Phantom of the Opera', 'Gaston Leroux', 'A mysterious figure haunts the Paris Opera House, obsessing over a young soprano and leading to dramatic consequences.', 14.25, '/Views/Images/shop/the_phantom_of_the_opera.jpg', 0),
('My Brilliant Career', 'Miles Franklin', 'A headstrong young woman in rural Australia strives for independence and literary success, challenging societal expectations.', 12.99, '/Views/Images/shop/my_brilliant_career.jpg', 0),
('The Haunting of Hill House', 'Shirley Jackson', 'A group investigates a notoriously haunted mansion, confronting both supernatural and psychological terrors.', 15.00, '/Views/Images/shop/Haunting_of_hill_house.jpg', 0),
('Jane Eyre', 'Charlotte Bronte', 'An orphaned governess falls in love with her enigmatic employer, uncovering dark secrets in his mansion.', 12.99, '/Views/Images/shop/jane_eyre.jpg', 0),
('Pride and Prejudice', 'Jane Austin', 'Elizabeth Bennet navigates love, family, and societal expectations in 19th-century England.', 15.50, '/Views/Images/shop/Pride_prejudice.jpg', 0),
('Moby-Dick', 'Herman Melville', 'Captain Ahab obsessively hunts the elusive white whale, leading his crew on a perilous journey.', 18.99, '/Views/Images/shop/moby_dick.jpg', 0),
('Great Expectations', 'Charles Dickens', 'An orphan named Pip rises through society, grappling with love, wealth, and personal growth.', 20.99, '/Views/Images/shop/great_expectations.jpg', 0);

-- Member-only books inentified with a 1
INSERT INTO products (title, author, description, price, image_path, member_only) VALUES
('Wuthering Heights', 'Emily Bronte', 'A tale of intense and destructive love set on the Yorkshire moors.', 13.75, '/Views/Images/shop/wuthering_heights.jpg', 1),
('Frankenstein', 'Mary Shelly', 'A scientist creates life, leading to tragic consequences as his creature seeks acceptance.', 12.99, '/Views/Images/shop/frank.jpg', 1),
('Crime and Punishment', 'Fyodor Dostoevsky', 'A destitute student commits murder, exploring themes of guilt and redemption.', 17.15, '/Views/Images/shop/crime_punishment.jpg', 1),
('The Picture of Dorian Gray', 'Oscar Wilde', 'A young man\'s portrait ages while he remains youthful, reflecting his moral decay.', 12.99, '/Views/Images/shop/dorian_gray.jpg', 1),
('Anna Karenina', 'Leo Tolstoy', 'A married woman embarks on a doomed affair, examining the complexities of Russian society.', 16.99, '/Views/Images/shop/anna_karenina.jpg', 1),
('The Odyssey', 'Homer', 'The epic journey of Odysseus as he returns home from the Trojan War, facing numerous trials.', 13.75, '/Views/Images/shop/odyssey.jpg', 1),
('The War of the Worlds', 'H.G. Wells', 'Earth faces an invasion by ruthless Martians, showcasing humanity\'s struggle for survival.', 18.99, '/Views/Images/shop/war_of_the_worlds.jpg', 1),
('Madame Bovary', 'Gustave Flaubert', 'A doctor\'s wife seeks escape from provincial life through romantic escapades, leading to her downfall.', 14.00, '/Views/Images/shop/Madame_bovary.jpg', 1),
('The Canterbury Tales', 'Geoffrey Chaucer', 'A collection of stories told by pilgrims journeying to Canterbury, offering a vivid portrait of medieval society.', 15.50, '/Views/Images/shop/canterbury_tales.jpg', 1);