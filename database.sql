-- =============================================
-- G7 E-Commerce Database
-- RCS 212: Development of Web Applications
-- =============================================
CREATE DATABASE IF NOT EXISTS g7_ecommerce
  DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE g7_ecommerce;

-- USERS TABLE
CREATE TABLE IF NOT EXISTS users (
  user_id    INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(50)  NOT NULL,
  last_name  VARCHAR(50)  NOT NULL,
  email      VARCHAR(100) NOT NULL UNIQUE,
  username   VARCHAR(50)  NOT NULL UNIQUE,
  password   VARCHAR(255) NOT NULL,
  phone      VARCHAR(25)  DEFAULT NULL,
  role       ENUM('admin','staff') NOT NULL DEFAULT 'staff',
  is_active  TINYINT(1)  NOT NULL DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- PRODUCTS TABLE
CREATE TABLE IF NOT EXISTS products (
  product_id  INT AUTO_INCREMENT PRIMARY KEY,
  name        VARCHAR(200)   NOT NULL,
  brand       VARCHAR(100)   NOT NULL,
  price       DECIMAL(12,2)  NOT NULL,
  quantity    INT            NOT NULL DEFAULT 0,
  description TEXT,
  image_url   VARCHAR(255)   DEFAULT NULL,
  category    VARCHAR(100)   DEFAULT 'General',
  created_by  INT            DEFAULT NULL,
  created_at  TIMESTAMP      DEFAULT CURRENT_TIMESTAMP,
  updated_at  TIMESTAMP      NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (created_by) REFERENCES users(user_id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ── SEED DATA ──────────────────────────────────────────────

-- Admin user  (password: Zumba@2002)
INSERT INTO users (first_name, last_name, email, username, password, phone, role)
VALUES ('Israel', 'Zumba', 'zumbaemanuel2@gmail.com', 'israelzumba',
  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
  '+255 700 000 000', 'admin');

-- Staff user  (password: Staff@123)
INSERT INTO users (first_name, last_name, email, username, password, phone, role)
VALUES ('Demo', 'Staff', 'staff@g7store.co.tz', 'demostaff',
  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
  '+255 711 111 111', 'staff');

-- Sample products
INSERT INTO products (name, brand, price, quantity, description, image_url, category, created_by) VALUES
('Wireless Bluetooth Headphones','Sony',120000,50,'Premium noise-cancelling, 30 hr battery, Hi-Res Audio.','https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=600','Electronics',1),
('Smart Watch Series 5','Samsung',350000,30,'Health monitoring, GPS, AMOLED display, 40mm.','https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=600','Electronics',1),
('Men\'s Casual Shirt','Zara',45000,100,'100% breathable cotton, slim fit, available S–3XL.','https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=600','Fashion',1),
('Women\'s Running Shoes','Nike',85000,75,'Lightweight, React foam cushioning, mesh upper.','https://images.unsplash.com/photo-1460353581641-37baddab0fa2?w=600','Fashion',1),
('Non-Stick Cookware Set 10pc','Tefal',180000,25,'Titanium coating, induction compatible, oven safe.','https://images.unsplash.com/photo-1556911220-bff31c812dba?w=600','Home',1),
('Robot Vacuum Cleaner','Xiaomi',450000,20,'Smart mapping, auto-recharge, 3000 Pa suction.','https://images.unsplash.com/photo-1558317374-067fb5f30001?w=600','Home',1),
('Yoga Mat Premium','Adidas',35000,60,'Eco-friendly, non-slip surface, 6mm thickness.','https://images.unsplash.com/photo-1601925260368-ae2f83cf8b7f?w=600','Sports',1),
('Mountain Bike Pro','Trek',850000,10,'21-speed Shimano, hydraulic disc brakes, 27.5" wheels.','https://images.unsplash.com/photo-1576435728678-68d0fbf94e91?w=600','Sports',1),
('Laptop Pro 16"','HP',2800000,15,'Core i7-12th Gen, 16 GB RAM, 512 GB NVMe SSD, Win 11.','https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=600','Electronics',1),
('Winter Jacket','Puma',220000,80,'Waterproof shell, 600-fill down insulation, YKK zips.','https://images.unsplash.com/photo-1551028719-00167b16eac5?w=600','Fashion',1),
('Air Fryer XL','Philips',250000,35,'5.8 L, digital touchscreen, 8 preset programs.','https://images.unsplash.com/photo-1585515320310-259814833379?w=600','Home',1),
('Adjustable Dumbbell Set','PowerTech',95000,40,'2–20 kg adjustable, quick-lock mechanism, anti-roll base.','https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=600','Sports',1);
