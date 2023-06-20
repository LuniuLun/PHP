CREATE TABLE feedback(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    body TEXT DEFAULT '',
    date DATETIME
);


INSERT INTO feedback(name, email, body, date) VALUES 
('John', 'john@gmail.com', 'i like it', current_timestamp()),
('Van', 'van@gmail.com', 'please add more videos', current_timestamp()),
('Nhi', 'nhi@gmail.com', 'Let do Laravel project', current_timestamp());