-- database/mamunadda.sql
CREATE DATABASE IF NOT EXISTS mamunadda_demo CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE mamunadda_demo;

CREATE TABLE IF NOT EXISTS menu_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  description TEXT,
  image VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(100),
  phone VARCHAR(20),
  address TEXT,
  items JSON,
  total_price DECIMAL(10,2),
  status ENUM('Pending','Processing','Delivered') DEFAULT 'Pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO menu_items (name, price, description, image) VALUES
('Chicken Burger', 180.00, 'Juicy chicken patty with fresh veggies.', 'placeholder.png'),
('Beef Burger', 220.00, 'Grilled beef, cheese, and house sauce.', 'placeholder.png'),
('French Fries', 100.00, 'Crispy golden fries.', 'placeholder.png'),
('Cold Coffee', 150.00, 'Iced coffee with milk foam.', 'placeholder.png');
