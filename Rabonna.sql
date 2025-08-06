
---Hello Rafia !--- 
--I created the file for you.--
---you can use this file for your project

-- Create the database
CREATE DATABASE IF NOT EXISTS `rabonna_supershop`;
USE `rabonna_supershop`;

-- 1. Role Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) UNIQUE NOT NULL
);

-- 2. Admin Table
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    phone INT(20) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES users(id)
);

-- 3. manager Table
CREATE TABLE manager (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    password VARCHAR(255) NOT NULL,
    role_name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_name) REFERENCES users(role_name)
);

-- 4. Supplier Table
CREATE TABLE vendor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    contact_person VARCHAR(100),
    phone VARCHAR(20),
    email VARCHAR(100),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 5. product category Table
CREATE TABLE product_category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(100) NOT NULL
);

-- 6. Stock Table
CREATE TABLE stock (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    product_category_id INT,
    quantity INT DEFAULT 0,
    purchase_price DECIMAL(10,2),
    sale_price DECIMAL(10,2),
    manufacture_date DATE,
    expiry_date DATE,
    vendor_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_category_id) REFERENCES product_category(id),
    FOREIGN KEY (vendor_id) REFERENCES vendor(id)
);

-- 7. Customers Table
CREATE TABLE reg_customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(100),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 8. Sales Table
CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    manager_id INT,
    total_amount DECIMAL(10,2),
    sale_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES reg_customers(id),
    FOREIGN KEY (manager_id) REFERENCES manager(id)
);

-- 9. Sale Items Table (Details of products sold in a sale)
CREATE TABLE sale_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sale_id INT,
    stock_id INT,
    quantity INT NOT NULL,
    unit_price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (sale_id) REFERENCES sales(id),
    FOREIGN KEY (stock_id) REFERENCES stock(id)
);

-- 10. Return Table (Customer returns after sale)
CREATE TABLE return_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sale_id INT,
    stock_id INT,
    quantity INT NOT NULL,
    unit_price DECIMAL(10,2) NOT NULL,
    reason TEXT,
    return_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sale_id) REFERENCES sales(id),
    FOREIGN KEY (stock_id) REFERENCES stock(id)
);

-- 11. Purchases Table
CREATE TABLE purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vendor_id INT,
    total_amount DECIMAL(10,2),
    purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (vendor_id) REFERENCES vendor(id)
);

-- 12. Purchase Items Table
CREATE TABLE purchase_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    purchase_id INT,
    stock_id INT,
    quantity INT,
    unit_price DECIMAL(10,2),
    FOREIGN KEY (purchase_id) REFERENCES purchases(id),
    FOREIGN KEY (stock_id) REFERENCES stock(id)
);

-- 13. Purchase Return Table
CREATE TABLE purchase_return (
    id INT AUTO_INCREMENT PRIMARY KEY,
    purchase_id INT,
    stock_id INT,
    quantity INT,
    reason TEXT,
    return_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (purchase_id) REFERENCES purchases(id),
    FOREIGN KEY (stock_id) REFERENCES stock(id)
);

-- 14. Expired product Table
CREATE TABLE expired_product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    stock_id INT,
    expiry_date DATE,
    noted_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (stock_id) REFERENCES stock(id)
);

-- Insert default roles
INSERT INTO role (role_name) VALUES ('Admin'), ('Manager');