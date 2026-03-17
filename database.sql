CREATE DATABASE login_system;

USE login_system;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
);

-- Example data for testing
INSERT INTO users (username, password, role) VALUES 
('admin', MD5('adminpassword'), 'admin'),
('user', MD5('userpassword'), 'user');