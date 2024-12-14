
CREATE DATABASE IF NOT EXISTS web_uas;

USE web_uas;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  role ENUM('pelanggan', 'admin') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Contoh data awal
INSERT INTO users (username, password, email, role) 
VALUES 
('admin', 'admin123', 'admin@example.com', 'admin'), 
('pelanggan', 'pelanggan123', 'pelanggan@example.com', 'pelanggan');

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100),
    no_hp VARCHAR(20),
    tanggal DATE,
    total_amount DECIMAL(10, 2)
);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    menu_item VARCHAR(100),
    quantity INT,
    price DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES orders(id)
);

DESCRIBE order_items;

DESCRIBE orders;

ALTER TABLE orders ADD COLUMN menu_items TEXT;

ALTER TABLE orders ADD COLUMN status_reservasi ENUM('dibayar','belum dibayar') DEFAULT 'belum dibayar';



