-- -----------------------------------------------------
-- Trainee Manufacturer-Product System
-- -----------------------------------------------------

-- DROP & CREATE DB fresh
DROP DATABASE IF EXISTS trainee_project;
CREATE DATABASE trainee_project CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE trainee_project;

-- -----------------------------------------------------
-- Manufacturer Table
-- -----------------------------------------------------
CREATE TABLE manufacturer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    contact VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- -----------------------------------------------------
-- Product Table
-- -----------------------------------------------------
CREATE TABLE product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    manufacturer_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (manufacturer_id) REFERENCES manufacturer(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- -----------------------------------------------------
-- Stored Procedure: Insert Manufacturer
-- -----------------------------------------------------
DELIMITER //
CREATE PROCEDURE insert_manufacturer(
    IN p_name VARCHAR(100),
    IN p_address VARCHAR(255),
    IN p_contact VARCHAR(50)
)
BEGIN
    INSERT INTO manufacturer (name, address, contact)
    VALUES (p_name, p_address, p_contact);
END //
DELIMITER ;

-- -----------------------------------------------------
-- Stored Procedure: Insert Product
-- -----------------------------------------------------
DELIMITER //
CREATE PROCEDURE insert_productss(
    IN p_name VARCHAR(100),
    IN p_price DECIMAL(10,2),
    IN p_manufacturer_id INT
)
BEGIN
    INSERT INTO product (name, price, manufacturer_id)
    VALUES (p_name, p_price, p_manufacturer_id);
END //
DELIMITER ;

-- -----------------------------------------------------
-- View: Expensive Products (Price > 5000)
-- -----------------------------------------------------
CREATE OR REPLACE VIEW expensive_products AS
SELECT
    p.id AS product_id,
    p.name AS product_name,
    p.price,
    m.id AS manufacturer_id,
    m.name AS manufacturer_name
FROM product p
INNER JOIN manufacturer m ON p.manufacturer_id = m.id
WHERE p.price > 5000;

-- -----------------------------------------------------
-- ✅ Optional Test Data (remove if you want a clean start)
-- -----------------------------------------------------
INSERT INTO manufacturer (name, address, contact)
VALUES 
('ABC Industries', 'Dhaka, Bangladesh', '017XXXXXXXX'),
('XYZ Corp', 'Chittagong, Bangladesh', '018XXXXXXXX');

INSERT INTO product (name, price, manufacturer_id)
VALUES 
('Luxury Laptop', 6500.00, 1),
('Basic Mouse', 300.00, 1),
('Premium Smartphone', 12000.00, 2);
