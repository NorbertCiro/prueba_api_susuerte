-- schema.sql
CREATE DATABASE IF NOT EXISTS prueba_api_susuerte;
USE prueba_api_susuerte;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY,
    name VARCHAR(100),
    username VARCHAR(50),
    email VARCHAR(100),
    address_street VARCHAR(100),
    address_suite VARCHAR(100),
    address_city VARCHAR(50),
    address_zipcode VARCHAR(20),
    address_lat FLOAT,
    address_lng FLOAT,
    phone VARCHAR(20),
    website VARCHAR(100),
    company_name VARCHAR(100),
    company_catchPhrase VARCHAR(255),
    company_bs VARCHAR(255)
);
