CREATE TABLE Items (
    itemNo INT AUTO_INCREMENT PRIMARY KEY,
    itemName VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    quantity INT NOT NULL,
    unit VARCHAR(50) NOT NULL,
    status ENUM('In Stock', 'Out of Stock', 'Damaged', 'Donated') NOT NULL,
    lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    modelNo VARCHAR(100),
    itemCategory VARCHAR(100),
    itemLocation VARCHAR(255),
    expiration DATE,
    brand VARCHAR(100),
    supplier VARCHAR(255),
    pricePerItem DECIMAL(10, 2)
);

-- Example data insertion (optional)
INSERT INTO Items (itemName, description, quantity, unit, status, modelNo, itemCategory, itemLocation, expiration, brand, supplier, pricePerItem) VALUES
('Laptop', 'Dell Inspiron 15 3000', 5, 'Units', 'In Stock', 'INSPIRON-15-3000', 'Electronics', 'Warehouse A', '2025-12-31', 'Dell', 'Dell Inc.', 45000.00),
('Printer', 'HP LaserJet Pro', 2, 'Units', 'Out of Stock', 'LaserJet-Pro', 'Office Equipment', 'Warehouse B', '2024-10-15', 'HP', 'HP Inc.', 12000.00),
('Monitor', '24-inch LED Monitor', 10, 'Units', 'In Stock', 'LED-24-MON', 'Electronics', 'Warehouse A', NULL, 'Samsung', 'Samsung Electronics', 8000.00);