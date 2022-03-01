CREATE DATABASE store;

CREATE TABLE users (
    user_id INT(11) NOT NULL AUTO_INCREMENT,
    role_id INT NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE roles (
    role_id INT NOT NULL,
    role_name VARCHAR(20),
    PRIMARY KEY (role_id)
);

CREATE TABLE customers (
    customer_id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    contact_no INT(10) NOT NULL,
    city VARCHAR(50),
    country VARCHAR(50),
    address VARCHAR(200),
    PRIMARY KEY (customer_id)
);

CREATE TABLE suppliers (
    supplier_id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    contact_no INT(10) NOT NULL,
    address VARCHAR(200),
    license VARCHAR(20),
    PRIMARY KEY (supplier_id)
);

CREATE TABLE products (
    product_id INT(11) NOT NULL AUTO_INCREMENT,
    category_id INT NOT NULL,
    supplier_id INT(11) NOT NULL,
    product_name VARCHAR(50) NOT NULL,
    stock INT NOT NULL,
    original_price INT NOT NULL,
    discounted_price INT NOT NULL,
    product_info VARCHAR(100),
    PRIMARY KEY (product_id)
);

CREATE TABLE product_category (
    category_id INT NOT NULL AUTO_INCREMENT,
    category_name VARCHAR(20) NOT NULL,
    PRIMARY KEY (category_id)
);

CREATE TABLE cart_items (
    cart_id INT(11) NOT NULL AUTO_INCREMENT,
    transaction_id INT NOT NULL,
    customer_id INT(11) NOT NULL,
    product_id INT(11) NOT NULL,
    quantity INT NOT NULL,
    PRIMARY KEY (cart_id)
);

CREATE TABLE transactions (
    transaction_id INT NOT NULL AUTO_INCREMENT,
    amount_payable INT NOT NULL,
    transaction_timestamp DATETIME NOT NULL,
    PRIMARY KEY (transaction_id)
);
