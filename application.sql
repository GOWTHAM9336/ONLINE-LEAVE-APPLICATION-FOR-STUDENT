CREATE DATABASE leave_management;
USE leave_management;

-- Table for storing login counts
CREATE TABLE roll_number_logins (
    roll_no INT PRIMARY KEY,
    login_count INT DEFAULT 0
);

-- Table for storing leave applications
CREATE TABLE leave_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    roll_no INT NOT NULL,
    dept_email VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    ava_leave VARCHAR(50) NOT NULL,
    department VARCHAR(100) NOT NULL,
    class_name VARCHAR(50) NOT NULL,
    section_name VARCHAR(50) NOT NULL,
    leave_type VARCHAR(50) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    reason TEXT NOT NULL,
    submission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
