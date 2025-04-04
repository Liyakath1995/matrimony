CREATE DATABASE modern_matrimony;

USE modern_matrimony;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    gender ENUM('male', 'female', 'other') NOT NULL,
    religion VARCHAR(255),
    caste VARCHAR(255),
    education VARCHAR(255),
    career VARCHAR(255),
    family TEXT,
    partner_age INT,
    partner_religion VARCHAR(255),
    partner_caste VARCHAR(255),
    profile_photo VARCHAR(255),
    privacy ENUM('public', 'private') DEFAULT 'public',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    gender ENUM('male', 'female', 'other') NOT NULL,
    location VARCHAR(255),
    religion VARCHAR(255),
    profession VARCHAR(255),
    education VARCHAR(255),
    family TEXT,
    partner_preferences TEXT,
    profile_photo VARCHAR(255),
    privacy ENUM('public', 'private') DEFAULT 'public',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE matches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    matched_user_id INT NOT NULL,
    match_percentage INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (matched_user_id) REFERENCES users(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    message TEXT NOT NULL,
    FOREIGN KEY (sender_id) REFERENCES users(id),
    FOREIGN KEY (receiver_id) REFERENCES users(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE preferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    age INT,
    location VARCHAR(255),
    religion VARCHAR(255),
    profession VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample data for testing
INSERT INTO users (name, email, password, age, gender, religion, caste, education, career, family, partner_age, partner_religion, partner_caste, profile_photo, privacy) VALUES
('John Doe', 'john@example.com', 'hashed_password', 30, 'male', 'Christianity', 'None', 'Bachelor\'s Degree', 'Engineer', 'Details about family', 25, 'Christianity', 'None', 'profile-photo.jpg', 'public'),
('Jane Smith', 'jane@example.com', 'hashed_password', 28, 'female', 'Judaism', 'None', 'Doctorate', 'Doctor', 'Details about family', 30, 'Judaism', 'None', 'profile-photo.jpg', 'public');

INSERT INTO profiles (user_id, name, age, gender, location, religion, profession, education, family, partner_preferences, profile_photo, privacy) VALUES
(1, 'John Doe', 30, 'male', 'New York', 'Christianity', 'Engineer', 'Bachelor\'s Degree', 'Details about family', 'Details about partner preferences', 'profile-photo.jpg', 'public'),
(2, 'Jane Smith', 28, 'female', 'Los Angeles', 'Judaism', 'Doctor', 'Doctorate', 'Details about family', 'Details about partner preferences', 'profile-photo.jpg', 'public');

INSERT INTO matches (user_id, matched_user_id, match_percentage) VALUES
(1, 2, 85),
(2, 1, 90);

INSERT INTO messages (sender_id, receiver_id, message) VALUES
(1, 2, 'Hello Jane!'),
(2, 1, 'Hi John!');

INSERT INTO preferences (user_id, age, location, religion, profession) VALUES
(1, 25, 'New York', 'Christianity', 'Engineer'),
(2, 30, 'Los Angeles', 'Judaism', 'Doctor');
