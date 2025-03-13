CREATE DATABASE inventory;

USE inventory;

CREATE TABLE borrow_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    item_name VARCHAR(100),
    item_type ENUM('consumable', 'non-consumable'),
    date_needed DATE,
    return_date DATE,
    quantity INT,
    purpose TEXT,
    notes TEXT,
    status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
    request_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
