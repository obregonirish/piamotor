CREATE DATABASE IF NOT EXISTS pia_motor_rental CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pia_motor_rental;

CREATE TABLE IF NOT EXISTS users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(120) NOT NULL,
 email VARCHAR(190) NOT NULL UNIQUE,
 phone VARCHAR(40) NULL,
 password VARCHAR(255) NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS admins (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(120) NOT NULL,
 email VARCHAR(190) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS motorcycles (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(120) NOT NULL,
 category VARCHAR(80) NOT NULL DEFAULT 'Scooter',
 transmission VARCHAR(50) NOT NULL DEFAULT 'Automatic',
 price_per_day DECIMAL(10,2) NOT NULL DEFAULT 500,
 description TEXT NULL,
 image VARCHAR(255) NULL,
 availability ENUM('available','unavailable') NOT NULL DEFAULT 'available',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS bookings (
 id INT AUTO_INCREMENT PRIMARY KEY,
 user_id INT NOT NULL,
 motorcycle_id INT NOT NULL,
 start_date DATE NOT NULL,
 end_date DATE NOT NULL,
 total_amount DECIMAL(10,2) NOT NULL,
 notes TEXT NULL,
 status ENUM('pending','approved','rejected','completed') NOT NULL DEFAULT 'pending',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 CONSTRAINT fk_booking_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
 CONSTRAINT fk_booking_motorcycle FOREIGN KEY (motorcycle_id) REFERENCES motorcycles(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS messages (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(120) NOT NULL,
 email VARCHAR(190) NOT NULL,
 message TEXT NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO motorcycles (name,category,transmission,price_per_day,description,image,availability) VALUES
('Honda Click 125i','Scooter','Automatic',500,'Comfortable automatic scooter for everyday rides.','assets/images/hero-motorcycle.svg','available'),
('Yamaha Mio i 125','Scooter','Automatic',450,'Lightweight scooter for convenient city travel.','assets/images/hero-motorcycle.svg','available'),
('Honda TMX 125','Standard','Manual',550,'Practical manual motorcycle for longer routes.','assets/images/hero-motorcycle.svg','available'),
('Yamaha NMAX','Premium Scooter','Automatic',850,'A comfortable premium scooter for relaxed trips.','assets/images/hero-motorcycle.svg','available'),
('Honda ADV 160','Adventure Scooter','Automatic',950,'Adventure-inspired scooter with a comfortable ride.','assets/images/hero-motorcycle.svg','available'),
('Suzuki Raider R150','Sport','Manual',700,'Sporty motorcycle for riders who prefer a manual transmission.','assets/images/hero-motorcycle.svg','available');

-- Create the first admin using admin/create_admin.php after importing this database.
