CREATE DATABASE rent_system;

USE rent_system;

CREATE TABLE flats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    flat_no VARCHAR(50),
    floor VARCHAR(50),
    rent INT,
    status VARCHAR(50)
);

CREATE TABLE tenants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    phone VARCHAR(20),
    flat_id INT,
    FOREIGN KEY(flat_id) REFERENCES flats(id)
    ON DELETE CASCADE
);

CREATE TABLE monthly_bills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT,
    month_name VARCHAR(50),
    electricity_units INT,
    electricity_rate INT,
    electricity_bill INT,
    water_bill INT,
    rent_amount INT,
    total_bill INT,
    payment_date DATE,

    FOREIGN KEY(tenant_id)
    REFERENCES tenants(id)
    ON DELETE CASCADE
);