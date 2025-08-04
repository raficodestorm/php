-- Create the database
CREATE DATABASE IF NOT EXISTS `fahico`;
USE `fahico`;

-- 1. Role Table
CREATE TABLE role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) UNIQUE NOT NULL
);

-- owner table -=---
CREATE TABLE owner (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone INT(20) NOT NULL,
    password VARCHAR(200) NOT NULL
);

-- TENANT Table ----
CREATE TABLE tenant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone INT(20) NOT NULL,
    password VARCHAR(200) NOT NULL
);

-- House Table ----
CREATE TABLE house (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    address TEXT,
    rent INT(20) NOT NULL,
    owner_id INT DEFAULT 1,
    FOREIGN KEY (owner_id) REFERENCES owner(id)
);

-- Ranting table -----
CREATE TABLE ranting (
    id INT AUTO_INCREMENT PRIMARY KEY,
    house_id INT(100) NOT NULL,
    tenant_id INT(20) NOT NULL,
    rating_value int(100) NOT NULL,
    comment TEXT,
    FOREIGN KEY (tenant_id) REFERENCES tenant(id),
    FOREIGN KEY (house_id) REFERENCES house(id)
);

-- Booking table ---
CREATE TABLE booking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    house_id INT(100) NOT NULL,
    tenant_id INT(100) NOT NULL,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    duration VARCHAR(100) NOT NULL
    FOREIGN KEY (tenant_id) REFERENCES tenant(id),
    FOREIGN KEY (house_id) REFERENCES house(id)
);

--- Merber table ---- 
CREATE TABLE member (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    relation VARCHAR(100) NOT NULL,
    tenant_id INT(100) NOT NULL,
    FOREIGN KEY (tenant_id) REFERENCES tenant(id)
);