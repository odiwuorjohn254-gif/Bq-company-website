CREATE DATABASE IF NOT EXISTS bq_company
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE bq_company;

CREATE TABLE IF NOT EXISTS company (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    location VARCHAR(150) NOT NULL,
    description TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL
);

INSERT INTO company (name, phone, location, description)
SELECT 'BQ Company Limited','0794045525','Parklands, Nairobi',
'BQ Company Limited provides professional Tax, Audit and Advisory services.'
WHERE NOT EXISTS (SELECT 1 FROM company);

INSERT INTO services (service_name, description)
SELECT 'Tax','Professional tax services and tax compliance support.'
WHERE NOT EXISTS (SELECT 1 FROM services WHERE service_name='Tax');

INSERT INTO services (service_name, description)
SELECT 'Audit','Reliable audit and assurance services for businesses.'
WHERE NOT EXISTS (SELECT 1 FROM services WHERE service_name='Audit');

INSERT INTO services (service_name, description)
SELECT 'Advisory','Business and financial advisory services to support better decisions.'
WHERE NOT EXISTS (SELECT 1 FROM services WHERE service_name='Advisory');