CREATE DATABASE IF NOT EXISTS itb_alumni;
USE itb_alumni;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    department VARCHAR(100) NOT NULL,
    place VARCHAR(100) NOT NULL,
    planning ENUM('YES', 'NO') NOT NULL,
    family_size INT NOT NULL
);

